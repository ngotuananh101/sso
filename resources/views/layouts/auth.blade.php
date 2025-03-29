@extends('layouts.app')

@section('app_content')
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-grow-1 justify-content-center align-items-center" id="kt_app_page">
            <div class="row w-100 h-100 m-0 justify-content-center align-items-center">
                <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 col-sm-12 col-12">
                    <div class="card shadow-sm" style="border-radius: 1.5rem;">
                        <div class="card-body min-h-350px">
                            <div class="logo mb-5">
                                <img src="{{ asset(config('settings.logo')) }}" alt="Logo" class="w-60px"/>
                            </div>
                            @yield('content')
                        </div>
                    </div>
                    <div
                        class="d-flex flex-md-row flex-column justify-content-md-between justify-content-center align-items-center mt-2">
                        <div class="py-8 py-md-0">
                            @include('components.translate_plugin')
                        </div>
                        <div class="text-center text-muted d-flex gap-8">
                            <a href="#" class="link-warning fw-semibold fs-6">
                                Help
                            </a>
                            <a href="#" class="link-warning fw-semibold fs-6">
                                Privacy
                            </a>
                            <a href="#" class="link-warning fw-semibold fs-6">
                                Terms
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Page-->
    </div>
@endsection
