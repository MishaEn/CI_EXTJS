<?php
    function get_short_full_name($full_name){
        $string_array = explode(' ', $full_name);
        if(!empty($full_name)){
            $short_ful_name = $string_array[0].' '.substr($string_array[1], 0, 2).'. '.substr($string_array[2], 0, 2).'.';
        }
        else{
            $short_ful_name = 'Администратор';
        }

        return $short_ful_name;
    }
    $module = [
            ['name' => 'company', 'ru_name' => 'Компании', 'fa' =>'globe-europe', 'status' => 'active'],
            ['name' => 'director', 'ru_name' => 'Директора', 'fa' =>'user', 'status' => 'disabled'],
            ['name' => 'employee', 'ru_name' => 'Сотрудники', 'fa' =>'users', 'status' => 'disabled'],
            ['name' => 'shop', 'ru_name' => 'Магазины', 'fa' =>'shopping-basket', 'status' => 'disabled'],
            ['name' => 'order', 'ru_name' => 'Заказы', 'fa' =>'money-check', 'status' => 'disabled'],
            ['name' => 'letter', 'ru_name' => 'Письма', 'fa' =>'envelope', 'status' => 'disabled'],
            ['name' => 'downloads', 'ru_name' => 'Загрузки', 'fa' =>'download', 'status' => 'disabled'],
            ['name' => 'information', 'ru_name' => 'Информация', 'fa' =>'info', 'status' => 'disabled']
    ];
    $short_name = get_short_full_name($data['data']['full_name']);
    switch ($data['data']['status']){
        case 0:
            $data['data']['status'] = 'Не активирован';
            break;
        case 1:
            $data['data']['status'] = 'Активирован';
            break;
        case 2:
            $data['data']['status'] = 'Заблокирован';
            break;
    }
    $explode_date = explode('-', explode(' ', $data['data']['register_date'])[0]);
    $register_date = $explode_date[2].'.'.$explode_date[1].'.'.$explode_date[0].' г.';
?>
<aside class="main-sidebar sidebar-light-primary elevation-1">
    <!-- todo: логотип в sidebar -->
    <div class="logo" style="background: #dc3545; padding: 11px 11px 11px 35px;">
        <a href="/" class="custom-logo">
            <img src="/public/img/top_logo.png"
                 class="custom-logo"
                 alt="AdminLTE Logo"
            >
        </a>
    </div>
    <!-- todo: конец логотип в sidebar -->
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/public/img/user2-160x160.jpg" class="img-bordered-sm elevation-1" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?php
                        if($_SESSION['user']['role_id'] == 1){
                            echo 'Администратор';
                        }
                        else{
                            echo $short_name;
                        }
                    ?>
                </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php
                    foreach($module as $key => $item){
                        if(array_key_exists($item['name'], $_SESSION['app']['role_policy'])){
                            if(!check_role_policy($item['name'], 'read')['error']){
                                submodule_loader('item', $item);
                            }
                        }
                    }
                ?>
                <?php if($_SESSION['user']['role_id'] == 1):?>
                    <li class="nav-item">
                        <a href="#" class="nav-link module-loader-button" data-ru-name-module="Настройка приложения" data-module-name="app/get_module_setting" data-status="disabled">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Настройки приложения
                            </p>
                        </a>
                    </li>
                <?php endif;?>
            </ul>
        </nav>
    </div>
    <script>
        $(document).on('click', '.module-loader-button', function (e) {
            e.preventDefault();
            let button;
            if ($(e.target).hasClass('module-loader-button')){
                button = $(e.target);
            }
            else{
                button = $(e.target).parent();
            }
            let target = button.attr('data-module-name');
            let ru_name = button.attr('data-ru-name-module');
            let active_button = $('a[data-status="active"]');
            if(!(button.attr('data-status')==='active')){
                active_button.attr('data-status', 'disabled');
                active_button.css({
                    color: '#343a40',
                    background: '#ffffff'
                });
                button.attr('data-status', 'active');
                button.css({
                    color: '#ffffff',
                    background: '#dc3545'
                });
                $.ajax({
                    url:'/'+target,
                    method: 'post',
                    dataType: 'html',
                    success: function (data) {
                        $('.submodule_title').fadeOut(150, function () {
                            $('.submodule_title').text(ru_name);
                            $(this).fadeIn(150);
                        });

                        $('.submodule').fadeOut(300, function () {
                            $(this).remove();
                            $('.content').append(data);
                            $('.submodule').fadeIn(300);

                        })
                    }
                })
            }
        });

        $(document).on('click', '.info', function (e) {
            let title = '<strong>Информация о пользователе</strong>';
            let html =
                '<div class="card card-danger card-outline">'+
                    '<div class="card-header">'+
                    '<h3 class="card-title">'+title+'</h3>'+
                        '<div class="card-tools">'+
                            '<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>'+
                        '</div>'+
                    '</div>'+
                    ' <div class="card-body text-left"> ' +
                        '  ' +
                        '<b>ФИО</b> <a class="float-right"><?php echo $data['data']['full_name'];?></a>' +
                        '<ul style="margin-top: 12px;" class="list-group text-left list-group-unbordered mb-3">' +
                            '<li class="list-group-item">' +
                                '<b>Статус</b> <a class="float-right"><?php echo $data['data']['status'];?></a>' +
                            '</li>' +
                            '<li class="list-group-item">' +
                                '<b>Логин</b> <a class="float-right"><?php echo $data['data']['login'];?></a>' +
                            '</li>' +
                            '<li class="list-group-item">' +
                                '<b>Email</b> <a class="float-right"><?php echo $data['data']['email'];?></a>' +
                            '</li>' +
                            '<li class="list-group-item">' +
                                '<b>Дата регистрации</b> <a class="float-right"><?php echo $register_date;?></a>' +
                            '</li>' +
                        '</ul>' +
                    '</div>'+
                    ' <div class="card-footer"> ' +
                        '<div class="row">' +
                            '<div class="col-3">' +
                                '<button class="btn logout btn-block btn-danger">' +
                                    'Выход' +
                                '</button>' +
                            '</div>' +
                        '</div>' +
                    ' </div> ' +
                '</div>';
            Swal.fire({
                html: html,
                background: 'rgba(0,0,0,0)',
                position: 'top',
                showCloseButton: false,
                showConfirmButton: false,
                showCancelButton: false,
                focusConfirm: false,
                onBeforeOpen: () => {
                    $('button[data-card-widget="remove"]').on('click', function (e) {
                        Swal.close();
                    });
                    $('.logout').on('click', function (e) {
                        $.ajax({
                            url: '/login/logout',
                            method: 'post',
                            dataType: 'json',
                            success: function (data) {
                                if(!data.error){
                                    document.location.href = '/login'
                                }
                            }
                        })
                    })
                }
            })
        })
    </script>
</aside>
