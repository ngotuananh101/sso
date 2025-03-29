<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->
<head>
    <title>
        @yield('title', config('app.name')) - {{ config('app.name') }}
    </title>
    <meta charset="utf-8"/>
    <!--begin::SEO-->
    <meta name="description" content="@yield('description', config('settings.description'))"/>
    <meta name="keywords" content="@yield('keywords', config('settings.keywords'))"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="{{ app()->getLocale() }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="@yield('title', config('app.name')) - {{ config('app.name') }}"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:site_name" content="{{ config('app.name') }}"/>
    <meta name="author" content="{{ config('settings.author') }}"/>
    <link rel="canonical" href="{{ url()->current() }}"/>
    <link rel="shortcut icon" href="{{ config('settings.favicon') }}"/>
    <!--end::SEO-->
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    @yield('styles')
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    @include('components.click_jacking')
    @vite('resources/js/app.js')
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_app_body" @yield('body_data') class="app-default">
<!--begin::Theme mode setup on page load-->
@include('components.theme_setup')
<!--end::Theme mode setup on page load-->
<!--begin::App-->
@yield('app_content')
<!--end::App-->
<!--begin::Javascript-->
<script>
    let hostUrl = "{{ asset('assets/') }}";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
@yield('scripts')
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
