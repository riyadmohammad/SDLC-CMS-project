<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from adminlte.io/themes/v3/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2023 10:35:54 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Team14</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/dist/css/adminlte.min2167.css?v=3.2.0')}}">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/toastr/toastr.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/select2/css/select2.min.css')}}">
     <link rel="stylesheet" href="{{asset('public/backend/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark">
            @include('backend.layouts.navbar')
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('backend.layouts.sidebar')
        </aside>
        <div class="content-wrapper">
            @yield('content')
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        <footer class="main-footer">
            <strong>Copyright &copy; {{Date('Y')}} <a href="#">Team14</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 2.0.0
            </div>
        </footer>
    </div>
    <script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('public/backend/dist/js/adminlte2167.js?v=3.2.0')}}"></script>
    <script src="{{asset('public/backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('public/backend/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- <script src="{{asset('public/backend/dist/js/demo.js')}}"></script> -->
    <script src="{{asset('public/backend/dist/js/pages/dashboard2.js')}}"></script>
    <!-- Table -->
    <script src="{{asset('public/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/backend/plugins/toastr/toastr.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script src="{{asset('public/backend/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- Time -->
    <script src="{{asset('public/backend/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
     <!-- Notifyjs -->
    <script src="{{asset('public/backend/js/notify.js')}}"></script>
    <!-- <script src="{{asset('public/backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script> -->
    <!-- <script src="{{asset('public/backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script> -->
    <!-- <script src="{{asset('public/backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script> -->
    <!-- <script src="{{asset('public/backend/dist/js/adminlte.min2167.js?v=3.2.0')}}"></script> -->
    <!-- <script src="{{asset('public/backend/dist/js/demo.js')}}"></script> -->
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        // $('.btn-toastr').click(function() {
        //     toastr.success('Redwan')
        // });

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

    });


    </script>
    <script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
    </script>
    <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })

    </script>
    <script type="text/javascript">
    $(document).on('click', '.delete', function() {
        var btn = this;
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var url = $(this).data('route');
                var id = $(this).data('id');

                $.get(url, { id: id }, function(result) {
                    Swal.fire(
                        'Deleted!',
                        'Record has been deleted.',
                        'success'
                    );
                    $(btn).closest('tr').fadeOut(1500);
                });
            }

        })
    });

    </script>
    @include('backend.layouts.notification')
</body>
<!-- Mirrored from adminlte.io/themes/v3/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2023 10:35:56 GMT -->

</html>
