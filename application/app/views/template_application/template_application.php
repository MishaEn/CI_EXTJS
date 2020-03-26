<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Дедал сервис | Административная панель</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/public/plugins/pace-progress/themes/red/pace-theme-flash.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/public/css/adminlte.min.css">
    <link rel="stylesheet" href="/public/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="/public/css/app.css">
    <link rel="stylesheet" href="/public/css/animate.css">
    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js", "ym"); ym(61345816, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/61345816" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

<!--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/adminlte.min.css">
    <link rel="stylesheet" href="/public/css/animate.css">-->
    <script src="/public/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition template-app sidebar-mini layout-fixed" style="user-select: none; overflow-y: hidden">

    <?php $_SESSION['app']['module_name'] = 'application';  submodule_loader('preloader', 'preloader', null);?>
    <div class="handler" style="">
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

    <!--<script src="/public/plugins/pace-progress/pace.js"></script>-->

    <script src="/public/js/maskedinput.js"></script>
    <script src="/public/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/public/js/adminlte.min.js"></script>
    <script src="/public/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="/public/plugins/tablesort/tablesort.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.min.js"></script>
    <script src="https://cdn.socket.io/socket.io-1.2.1.js"></script>
    <script src="/public/js/app.js"></script>
</body>
<script>
    $(window).on('load', function () {
        $('.preloader-wrapper').delay(1000).fadeOut(1000, function () {
            $('.preloader-wrapper').remove();
        });
        $(document).click(function () {
            $('div[data-type="context-menu"]').removeClass('fadeInLeft').addClass('fadeOutRight');
            setTimeout(function () {
                $('div[data-type="context-menu"]').remove();
            }, 300);
        })
    });
</script>
</html>
