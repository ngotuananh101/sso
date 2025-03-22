<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Show the login form.
     *
     * @return View
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @return RedirectResponse
     */
    public function authenticate()
    {
        // Validate the request
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (auth()->attempt($credentials)) {
            // Redirect to the home page
            return redirect()->route('home');
        }

        // Redirect back to the login form
        return back()->withInput()->withErrors([
            'email' => __('auth.failed'),
        ]);
    }

    /**
     * Show the forgot password form.
     *
     * @return View
     */
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    /**
     * Send the password reset link.
     *
     * @return RedirectResponse
     */
    public function sendResetLinkEmail()
    {
        // Validate the request
        request()->validate([
            'email' => 'required|email',
        ]);

        // Send the password reset link
        $status = \Password::sendResetLink(request()->only('email'));

        // Redirect back to the forgot password form
        return back()->with('status', $status);
    }

    /**
     * Show the reset password form.
     *
     * @param  string  $token
     * @return View
     */
    public function resetPassword($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Reset the user's password.
     *
     * @return RedirectResponse
     */
    public function reset()
    {
        // Validate the request
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
            'token' => 'required',
        ]);

        // Reset the user's password
        $status = \Password::reset($credentials, function ($user, $password) {
            $user->forceFill([
                'password' => \Hash::make($password),
            ])->save();
        });

        // Redirect to the login form
        return redirect()->route('login')->with('status', $status);
    }

    /**
     * Show the register form.
     *
     * @return View
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Register the user.
     *
     * @return RedirectResponse
     */
    public function store()
    {
        // Validate the request
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Create the user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => \Hash::make($data['password']),
        ]);

        // Send the email verification notification
        $user->sendEmailVerificationNotification();

        // Redirect to the login form
        return redirect()->route('login')->with('status', __('auth.verify_email'));
    }

    /**
     * Log the user out.
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        // Log the user out
        auth()->logout();

        // Redirect to the login form
        return redirect()->route('login');
    }

    /**
     * Show the email verification notice.
     *
     * @return View
     */
    public function verifyEmail()
    {
        return view('auth.verify-email');
    }

    /**
     * Verify the user's email.
     *
     * @param  string  $id
     * @param  string  $hash
     * @return RedirectResponse
     */
    public function verify($id, $hash)
    {
        // Find the user
        $user = User::findOrFail($id);

        // Verify the user's email
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('home');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect()->route('home')->with('status', __('auth.verified'));
    }
}
