<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head>
        <meta charset=utf-8>
        <meta http-equiv=X-UA-Compatible content="IE=edge">
        <meta name=viewport content="width=device-width,initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Sam Mash - 07038020172">
        <title>{{ config('app.name') }}</title>

        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
        <!--end::Fonts-->

        <!--begin::Vendor Stylesheets(used for this page only)-->
        <link href="{{ asset('admin/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
              type="text/css"/>
        <link href="{{ asset('admin/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <!--end::Vendor Stylesheets-->

        <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
        <link href="{{ asset('admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <!--end::Global Stylesheets Bundle-->

        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="app-blank app-blank">
        <!--begin::Theme mode setup on page load-->
        <script>
            var defaultThemeMode = "light";
            var themeMode;

            if (document.documentElement) {
                if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                    themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
                } else {
                    if (localStorage.getItem("data-bs-theme") !== null) {
                        themeMode = localStorage.getItem("data-bs-theme");
                    } else {
                        themeMode = defaultThemeMode;
                    }
                }

                if (themeMode === "system") {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                }

                document.documentElement.setAttribute("data-bs-theme", themeMode);
            }
        </script>
        <!--end::Theme mode setup on page load-->

        <!--begin::Root-->
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <div class="d-flex flex-column flex-lg-row flex-column-fluid">
                <!--begin::Aside-->
                <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center"
                     style="background-image: url('{{ asset('admin/media/misc/auth-bg.png') }}')">
                    <!--begin::Content-->
                    <div class="d-flex flex-column p-6 p-lg-10 w-100">

                        <!--begin::Logo-->
                        <a href="#" class="mb-0 mt-10 pt-5 mb-lg-20 text-center">
                            <span class="text-white" style="font-size: 30px; font-family: sans-serif; font-weight: 700">SUPREME PAY</span>
                        </a>
                        <!--end::Logo-->
                        <!--begin::Image-->
                        <img class="d-none d-lg-block mx-auto w-300px w-lg-75 w-xl-500px mb-10 mb-lg-20" src="{{ asset('admin/media/misc/auth-screens.png') }}" alt=""/>
                        <!--end::Image-->
                        <!--begin::Title-->
                        <h1 class="d-none d-lg-block text-white fs-2qx fw-bold text-center mb-7">
                            Pay Quick and Easy
                        </h1>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <div class="d-none d-lg-block text-white fs-base text-center">
                            Make quick and secure <span class="text-warning">deposits</span> to your wallet <span class="text-warning">without hitch.</span><br>
                            On <span class="text-warning">Supreme Pay</span>, you can also make <span class="text-warning">swift, transfers</span> to several wallets with no charge.
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--begin::Aside-->
                <!--begin::Body-->
                <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10">
                    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                        <div class="w-lg-500px p-10">
                            {{ $slot }}
                        </div>
                    </div>
                    <!--begin::Footer-->
                    <div class="d-flex flex-center flex-wrap px-5">
                        <!--begin::Links-->
                        <div class="d-flex fw-semibold text-primary fs-base">
                            <a href="#" class="px-5">Home</a>
                            <a href="#" class="px-5">About Us</a>
                            <a href="#" class="px-5">Contact Us</a>
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Body-->
            </div>
        </div>
        <!--end::Root-->

        <!--begin::Global Javascript Bundle(mandatory for all pages)-->
        <script src="{{ asset('admin/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('admin/js/scripts.bundle.js') }}"></script>
        <!--end::Global Javascript Bundle-->

        <!--begin::Custom Javascript(used for this page only)-->
        <script src="{{ asset('admin/js/custom/authentication/sign-in/general.js') }}"></script>
        <script src="{{ asset('admin/js/custom/authentication/sign-up/general.js') }}"></script>

        @stack('scripts')

        <script src="https://unpkg.com/axios@1.4.0/dist/axios.min.js"></script>
        <script src="{{ asset("js/request.js") }}"></script>

    </body>
    <!--end::Body-->
</html>
