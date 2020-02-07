<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Дедал сервис | Административная панель</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/public/plugins/pace-progress/themes/red/pace-theme-flash.css" rel="stylesheet" />
    <link rel="stylesheet" href="/public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/public/css/adminlte.min.css">
    <link rel="stylesheet" href="/public/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="/public/css/app.css">


<!--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/adminlte.min.css">
    <link rel="stylesheet" href="/public/css/animate.css">-->
    <script src="/public/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition template-app sidebar-mini" style="user-select: none">
    <div class="handler">
        <?php
            if($_SESSION['user']['status'] == 1){
                module_loader('header');
                module_loader('sidebar', $data['user']);
                module_loader('application');
                module_loader('footer');
            }
            elseif($_SESSION['user']['status'] == 0){
                module_loader('non_active');
            }
            elseif($_SESSION['user']['status']==2){
                module_loader('blocked');
            }
        ?>

    <script src="/public/plugins/pace-progress/pace.js"></script>

    <script src="/public/js/maskedinput.js"></script>
    <script src="/public/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/public/js/adminlte.min.js"></script>
    <script src="/public/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="/public/plugins/tablesort/tablesort.min.js"></script>
    <script src="/public/js/app.js"></script>
</body>
</html>
