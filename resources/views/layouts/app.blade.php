<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'HRM') . '-' . ($pageTitle ?? '') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset(AppConst::ASSET_FAVICON) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset(AppConst::ASSET_JS . '/hyper-config.js') }}"></script>
    <!-- App css -->
    <!-- <link href="{{ asset(AppConst::ASSET_CSS . '/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style" /> -->
    <link href="{{ asset(AppConst::ASSET_CSS . '/main.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset(AppConst::ASSET_CSS . '/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-tooltip@1.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <!-- Styles -->
    @livewireStyles
    @vite(['resources/js/app.js'])

    <script src="{{ asset(AppConst::ASSET_JS . '/vendor.min.js') }}"></script>
    @stack('below_css')


</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- ========== Topbar Start ========== -->
        @livewire('common.header')
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        @livewire('common.left-navigation')
        <!-- ========== Left Sidebar End ========== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <x-general.breadcrumbs :breadcrumbs="$breadcrumbs ?? []" :pageTitle="$pageTitle ?? ''" />
                    {{ $slot }}
                </div>
                <!-- container -->

            </div>

            <x-general.alerts />

            <!-- Footer Start -->
            @livewire('common.footer')
            <!-- end Footer -->
            <!-- content -->
        </div>

    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script  type="module">
        function showAlert(param) {
            let icons = {
                info: 'ri-information-fill',
                success: ' ri-information-fill',
                danger: 'ri-alert-fill',
                warning: "ri-error-warning-fill"
            };
            return html = `
            <div id="liveToast" class="toast hide  mt-2" role="alert"  aria-live="assertive" aria-atomic="true">
                 <div class="toast-header  text-white bg-${param['type']}">
                      <i aria-hidden="true" class="text-white font-24 mx-2 ${icons[param['type']]}"></i>
                      <strong class="me-auto font-22">${param['type']}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                     ${param['message']}
                    </div>
                 </div>
            </div>
        `;
        }
        Livewire.on('alert', ({
            param
        }) => {
            $('.append-alerts').empty();
            $('.append-alerts').append(showAlert(param));
            $('.toast').toast('show');
            var myToastEl = document.getElementById('liveToast')
            myToastEl.addEventListener('hidden.bs.toast', function() {
                $('.append-alerts').empty();
            })
        });
    </script>



    <script src="{{ asset(AppConst::ASSET_JS . '/app.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js " ></script>
    <script src="{!! asset(AppConst::ASSET_JS . '/custom/custom.js') !!}" type="text/javascript" ></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.min.js"
            integrity="sha512-P2W2rr8ikUPfa31PLBo5bcBQrsa+TNj8jiKadtaIrHQGMo6hQM6RdPjQYxlNguwHz8AwSQ28VkBK6kHBLgd/8g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset(AppConst::ASSET_JS . '/quill-image-resize.js') }}"></script>
    <script src="{{ asset(AppConst::ASSET_JS . '/quill-mentions.js') }}" ></script>
    <link href="
https://cdn.jsdelivr.net/npm/quill-mention@4.1.0/dist/quill.mention.min.css
" rel="stylesheet">
    @livewireScriptConfig
    @stack('below_script')
</body>

</html>
