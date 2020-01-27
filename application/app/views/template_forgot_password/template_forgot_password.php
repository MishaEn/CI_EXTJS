<!doctype html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Вход в ичный кабинет</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/public/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="/public/css/adminlte.min.css">
        <link rel="stylesheet" href="/public/css/app.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <script src="/public/plugins/jquery/jquery.min.js"></script>
        <script src="/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/public/js/adminlte.min.js"></script>
        <script src="/public/js/app.js"></script>

    </head>
</head>
<body>
<body class="login-page" style="min-height: 512.8px;">
<div class="wrapper">
    <?php module_loader('forgot_password');?>
</div>
<script>
    $(document).ready(function (e) {
        let login = $('.wrapper');
        login.on('click', '.submit-login',    function (event) {
            event.preventDefault();
            let login_input = $('.login');
            let password_input = $('.password');
            let form =
                {
                    login: {field: login_input, value: login_input.val().trim()},
                    password: {field: password_input, value: password_input.val().trim()}
                };

            let valid_status =
                {
                    login: {valid: valid_field(form.login.value, {type: 'string', min_length: '5', max_length: '15'}), field: form.login.field},
                    password: {valid: valid_field(form.password.value, {type: 'string', min_length: '5', max_length: '15'}), field: form.password.field}
                };
            if(!valid_status.login.valid.error && !valid_status.password.valid.error){
                let message = '';
                $.ajax({
                    url: '/login/authentication',
                    method: 'POST',
                    dataType: 'json',
                    data: {'login': form.login.value, 'password': form.password.value},
                    success: function (data) {
                        if(data.error){
                            switch (data.status) {
                                case 'valid fail':
                                    $.each(data.field, function (key, item) {
                                        switch (item) {
                                            case 'field empty':
                                                message = 'Поле не может быть пустым';
                                                $('.append-border-'+key).css('border-color', '#dc3545');
                                                break;
                                            case 'min length error':
                                                break;
                                        }
                                        field_reaction($('.'+key), message, data.error);
                                    });
                                    break;
                                case 'user does not exist':
                                    login.val('');
                                    field_reaction(form.login.field, 'Не правиьный логин', data.error);
                                    field_reaction(form.password.field,'Не правильный пароль', data.error);
                                    break;
                                case 'unexpected error':
                                    login.val('');
                                    password.val('');
                                    field_reaction(form.login.field, 'Неожиданная ошибка', data.error);
                                    field_reaction(form.password.field, 'Неожиданная ошибка', data.error);
                                    break;
                                case 'something wrong':
                                    login.val('');
                                    password.val('');
                                    field_reaction(form.login.field, 'Что-то пошло не так', data.error);
                                    field_reaction(form.password.field, 'Что-то пошло не так', data.error);
                                    break;
                                case 'wrong login or password':
                                    field_reaction(form.login.field, 'Не правильный логин', data.error);
                                    field_reaction(form.password.field, 'Не правильный пароль', data.error);
                                    break;
                            }
                        }
                        else{
                            let status = {
                                login: {valid: {message: 'success', error: false}, field: form.login.field},
                                password: {valid: {message: 'success', error: false}, field: form.password.field}
                            };
                            form_reaction(status);
                            document.location.href = '/app'
                        }
                    }
                })
            }
            else{
                form_reaction(valid_status)
            }
        });



        login.on('click', '.login-settings', function (event) {
            let dropdown_menu = $('.dropdown-settings');
            if(dropdown_menu.hasClass('dropdown-close')){
                $(event.target).addClass('fa-spin');
                dropdown_menu.removeClass('dropdown-close');
                dropdown_menu.fadeIn(300);
            }
            else{
                $(event.target).removeClass('fa-spin');
                dropdown_menu.removeClass('dropdown-open');
                dropdown_menu.addClass('dropdown-close');
                dropdown_menu.fadeOut(300);
            }
        });
        login.on('click', '.register-link', function (event) {
            $.ajax({
                url: '/register/',
                method: 'POST',
                dataType: 'html',
                success: load_register
            })
        });
    });

    function load_register(register_html) {
        $('.dropdown-settings').removeClass('dropdown-open').addClass('dropdown-close');
        app_handler.append(register_html);
        $('.login-box').fadeOut(300, function () {
            history.pushState(null, null, '/register');
            $('.login-page').remove();
            $('.register-box').fadeIn(300);

        })
    }
</script>
</body>

</html>