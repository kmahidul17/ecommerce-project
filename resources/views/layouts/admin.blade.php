<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BD Purchase | Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('/backend')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('/backend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/backend')}}/dist/css/adminlte.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('/backend')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('/backend')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

{{--    <link rel="stylesheet" href="{{asset('/backend')}}/plugins/sweetalert2/sweetalert2.css">--}}
    <link rel="stylesheet" href="{{asset('/backend')}}/plugins/toastr/toastr.css">

    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('/backend')}}/plugins/summernote/summernote-bs4.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('/backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('/backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('/backend')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>
<body>
<div class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    @guest

    @else


<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{asset('/backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    @include('layouts.admin_partial.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.admin_partial.sidebar')

@endguest
    <!-- Content Wrapper. Contains page content -->
    @yield('admin_content')
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2021 <a href="#">BD Purchase | E-Commerce</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 0.0.1
        </div>
    </footer>
</div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('/backend')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('/backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/backend')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/backend')}}/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('/backend')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('/backend')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('/backend')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('/backend')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('/backend')}}/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('/backend')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/backend')}}/dist/js/pages/dashboard2.js"></script>

{{--<script src="{{asset('/backend')}}/plugins/sweetalert2/sweetalert2.js"></script>--}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('/backend')}}/plugins/toastr/toastr.min.js"></script>

<script>
    $(document).on("click","#delete",function (e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Do you want to delete?",
            text: "Once deleted, this will be permanently deleted!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete)=>{
            if (willDelete){
                window.location.href = link;
            }else {
                swal("Safe Data");
            }
        });
    });
</script>

{{--showing message before logout--}}
{{--<script>--}}
{{--    $(document).on("click","#logout",function (e){--}}
{{--        e.preventDefault();--}}
{{--        var link = $(this).attr("href");--}}
{{--        swal.fire({--}}
{{--            title: "Do you want to log out?",--}}
{{--            text: "",--}}
{{--            icon: "warning",--}}
{{--            buttons: true,--}}
{{--            dangerMode: true,--}}
{{--        })--}}
{{--            .then((willDelete)=>{--}}
{{--                if (willDelete){--}}
{{--                    window.location.href = link;--}}
{{--                }else {--}}
{{--                    swal.fire("Log out unsuccessful");--}}
{{--                }--}}
{{--            });--}}
{{--    });--}}
{{--</script>--}}

<script>
    $(document).on('click',"#logout", function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Do you want to log out?',
            text: '',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }else {
                swal("log out unsuccessful");
            }
        });
    });
</script>

<script>
    @if(Session::has('message'))
        var type = "{{Session::get('alert-type', 'info')}}"
    switch (type){
            case 'info':
                toastr.info("{{Session::get('message')}}");
                break;
            case 'success':
                toastr.success("{{Session::get('message')}}");
                break;
            case 'warning':
                toastr.warning("{{Session::get('message')}}");
                break;
            case 'error':
                toastr.error("{{Session::get('message')}}");
                break;
    }
    @endif
</script>

<!-- DataTables  & Plugins -->
<script src="{{asset('/backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('/backend')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('/backend')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('/backend')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/backend')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Select2 -->
<script src="{{asset('/backend')}}/plugins/select2/js/select2.full.min.js"></script>

<!-- Summernote -->
<script src="{{asset('/backend')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
$(function () {
// Summernote
$('#summernote').summernote()

})

//Initialize Select2 Elements
$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
})
</script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
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
    });
</script>


</body>
</html>
