<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from adminlte.io/themes/v3/pages/UI/modals.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2023 10:36:02 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Modals & Alerts</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/toastr/toastr.min.css')}}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="card card-warning card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    Toastr Examples
                </h3>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-success btn-toastr">
                    Launch Success Toast
                </button>
            </div>
        </div>
    </div>
    <script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/toastr/toastr.min.js')}}"></script>
    <script>
    $(function() {

        $('.btn-toastr').click(function() {
            toastr.success('Redwan')
        });
    });

    </script>
</body>
<!-- Mirrored from adminlte.io/themes/v3/pages/UI/modals.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2023 10:36:04 GMT -->

</html>
