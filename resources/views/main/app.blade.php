<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }} " />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }} " />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }} " />

    <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }} " />

    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.5/datatables.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('vendor/css/pages/page-auth.css') }}" />

    <!-- Page CSS -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.5/datatables.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">
    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>


    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('js/config.js') }}"></script>
    <script>
        const base_url = '{{ url('') }}';
        const web_token = '{{ csrf_token() }}';

    </script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('main.sidebar')
            <div class="layout-page">
                @include('main.navbar')
                <main class="content-wrapper" id="main">
                    @yield('content')
                    @include('sweetalert::alert')
                </main>
                @include('main.footer')
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.5/datatables.min.js"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                tabsize: 10,
                height: 100,
                toolbar: [
                    ['style', ['style','bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert',['link']],
                    ['height', ['height']]
                ],
            });
        });
    </script>
    <script>
        function initApproveButton() {
            $('.approve-button').click(function (event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Setujui permintaan ruang rapat",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#52a807',
                    cancelButtonColor: '#8c8c8c',
                    confirmButtonText: 'Ya, setujui!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#approve-form').submit();
                    }
                });
            });
        }

        function initRejectButton() {
            $('.reject-button').click(function (event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Menolak permintaan ruang rapat",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#8c8c8c',
                    confirmButtonText: 'Ya, tolak!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#reject-form').submit();
                    }
                });
            })
        }

        function initDeleteButton() {
            $('.delete-button').click(function (event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Data tidak dapat dikembalikan",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var form = document.createElement('form');
                        form.action = $(this).attr('href');
                        form.method = 'POST';
                        form.innerHTML = `
        @csrf
        @method('DELETE')
        `;
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        }

        function initCancelButton() {
            $('.cancel-button').click(function (event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "Membatalkan permintaan ruang rapat",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#8c8c8c',
                    confirmButtonText: 'Ya, tolak!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#cancel-form').submit();
                    }
                });
            })
        }

    </script>

    @yield('main-js')
</body>

</html>
