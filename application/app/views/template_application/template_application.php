<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Дедал сервис | Административная панель</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/public/css/adminlte.min.css">
    <link rel="stylesheet" href="/public/css/animate.css">
    <link rel="stylesheet" href="/public/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="/public/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="/public/plugins/jquery/jquery.min.js"></script>
    <script src="/public/js/maskedinput.js"></script>
    <script src="/public/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/public/js/adminlte.min.js"></script>
    <script src="/public/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/public/js/demo.js"></script>
    <script src="/public/js/app.js"></script>
</head>
<body class="hold-transition template-app sidebar-mini" style="user-select: none">
    <div class="handler">
        <?php module_loader('header');?>
        <?php module_loader('sidebar', $data['user']);?>
        <?php module_loader('application');?>
        <?php module_loader('footer');?>
    </div>
<!-- ./wrapper -->

<!-- jQuery -->

</body>
</html>
