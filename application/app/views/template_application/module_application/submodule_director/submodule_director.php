<div class="submodule director" data-status="disabled" data-submoudle-appliaction = "director">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-2">
                    <button class="btn btn-block submit create-director btn-primary btn-block">Добавить</button>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-4 text-right">
                            <span class="align-middle">Фильтровать по:</span>
                        </div>
                        <div class="col-2">
                            <div class="input-group mb-3">
                                <select class="custom-select filter-type">
                                    <option value="query">Поисковому запросу</option>
                                    <option value="ФИО">ФИО</option>
                                    <option value="Логин">Логину</option>
                                    <option value="Email">Email</option>
                                    <option value="Код">Коду</option>
                                    <option value="Наценка">Наценке</option>
                                    <option value="Кол-во активаций">Кол-ву активаций</option>
                                    <option value="Бренд">Бренду</option>


                                    <option value="Статус">Статусу</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control filter-input" data-placeholder ="Значение фильтра"  placeholder="Значение фильтра">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body director-card" style="height: 70vh;!important; overflow-y: scroll; overflow-x: hidden">
                    <?php if(!$data['error']):?>
                        <table class="table table-borderless table-hover">
                            <thead>
                            <tr data-type="table-header">
                                <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-6"><span>ID</span></div><div class="col-6 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" data-type="director" data-field="id" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>ФИО</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" data-type="director" data-field="full_name" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-10"><span>Логин</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" data-type="director" data-field="login" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                <!--<th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-10"><span>Email</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>-->
                                <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-9"><span>Код</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" data-type="director" data-field="code" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-10"><span>Наценка</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" data-type="director" data-field="markup" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Кол-во активаций</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" data-type="director" data-field="activation_count" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-10"><span>Бренд</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" data-type="director" data-field="brand" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-9"><span>Статус</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" data-type="director" data-field="status" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                <th class=""></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php for ($i = 1; $i<= 1; $i++):?>
                                <?php foreach($data['data'] as $item):?>
                                    <tr class="show">
                                        <td  style="border: 1px solid #dee2e6"><span data-modal = "director" data-action="get_director_modal" data-data="<?= $item['id']?>" class="pseudo-link"><?php echo $item['user_id'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                        <td  style="border: 1px solid #dee2e6"><span data-modal = "director" data-action="get_director_modal" data-data="<?= $item['id']?>" class="pseudo-link"><?php echo $item['full_name'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                        <td class="" style="border: 1px solid #dee2e6"><span data-modal = "director" data-action="get_director_modal" data-data="<?= $item['id']?>" class="pseudo-link"><?php echo $item['login'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                        <!--<td class="" style="border: 1px solid #dee2e6"><span data-modal = "user" class="pseudo-link"><?php /*echo $item['email'];*/?></span><input type="text" value="<?php /*echo $item['id'];*/?>" hidden></td>-->
                                        <td class="" style="border: 1px solid #dee2e6"><span data-modal = "director" data-action="get_director_modal" data-data="<?= $item['id']?>" class="pseudo-link"><?php echo $item['code'];?></span> <input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                        <td class="" style="border: 1px solid #dee2e6"><?php echo $item['markup'];?></td>
                                        <td class="" style="border: 1px solid #dee2e6"><?php echo $item['activation_count'];?></td>
                                        <td class="" style="border: 1px solid #dee2e6"><?php
                                            switch ($item['brand']){
                                                case '1':
                                                    echo 'Дедал';
                                                    break;
                                                case '2':
                                                    echo 'Аветти';
                                                    break;
                                                case '3':
                                                    echo 'Малина';
                                                    break;
                                            }
                                            ?></td>
                                        <?php switch($item['status']):
                                            case 0:?>
                                                <td class="text-center" style="border: 1px solid #dee2e6; background: #fd7e14; color: #fff; font-weight: 700;">Не активирован</td>
                                                <?php break; case 1:?>
                                                <td class="text-center" style="border: 1px solid #dee2e6; background: #28a745; color: #fff; font-weight: 700;">Активирован</td>
                                                <?php break; case 2:?>
                                                <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Заблокирован</td>
                                                <?php break; case 3:?>
                                                <td class="text-center" style="border: 1px solid #dee2e6; background: #DC3545; color: #fff; font-weight: 700;">Запрос на удаление</td>
                                                <?php break; case 4:?>
                                                <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Запрос на бокировку</td>
                                                <?php break; case 5:?>
                                                <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Модерация</td>
                                                <?php break; endswitch;?>
                                        <td style="border: 1px solid #dee2e6" class="text-center">
                                            <i style="color: #2d2e2c; font-size: 18px; cursor: pointer" data-toggle="close" class="fa fa-cog director-settings"></i><input type="text" value="<?php echo $item['id'];?>" hidden>
                                            <div class="option-holder" style="display: none; position: absolute;">
                                                <?php switch($item['status']):
                                                    case 0:?>
                                                        <ul class="drop-menu">
                                                            <li><span class="menu-button" data-target = "director" data-action="get_activate_director">Активировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                        </ul>
                                                        <?php break;
                                                    case 1:?>
                                                        <ul class="drop-menu">
                                                            <li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "director" data-action="deactivate_director">Деактивировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "director" data-action="block_director">Заблокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                        </ul>
                                                        <?php break;
                                                    case 2:?>
                                                        <ul class="drop-menu">
                                                            <li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "director" data-action="deactivate_director">Деактивировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "director" data-action="unlock_director">Разбокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                        </ul>
                                                        <?php break;
                                                    case 3:?>
                                                        <ul class="drop-menu">
                                                            <li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "director" data-action="block_director">Заблокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                        </ul>
                                                        <?php break;
                                                    case 4:?>
                                                        <ul class="drop-menu">
                                                            <li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "director" data-action="block_director">Заблокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                        </ul>
                                                        <?php break;
                                                    case 5:?>
                                                        <ul class="drop-menu">
                                                            <li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "director" data-action="get_activate_director">Подтвердить и активировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                        </ul>
                                                        <?php break;
                                                endswitch;?>
                                            </div>
                                        </td>
                                        <td hidden>
                                            <input type="text" value="<?php echo $item['id'];?>" hidden>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endfor;?>
                            </tbody>
                        </table>
                    <?php else:?>
                        <h1>Список директоров пуст. Добавьте нового директора.</h1>
                    <?php endif;?>

                </div>
                <div class="card-footer clearfix">

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            let director_handler = $('.director');
            $(document).on('click', '.create-director', function () {
                let title = 'Добавить нового директора компанию';
                let html =
                    '<div class="card card-danger card-outline">'+
                        '<div class="card-header">'+
                            '<h3 class="card-title">'+title+'</h3>'+
                            '<div class="card-tools">'+
                                '<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>'+
                            '</div>'+
                        '</div>'+
                        ' <div class="card-body text-left"> ' +
                            '<form action="">'+
                                '<div class="row">'+
                                    '<div class="col-12">'+
                                        '<div class="input-group mb-3">'+
                                            '<input type="text" class="form-control full-name" data-placeholder ="Фамилия Имя Отчество"  placeholder="Фамилия Имя Отчество" value="Иванов Иван Иванович">'+
                                            '<div class="input-group-append">'+
                                                '<div class="input-group-text">'+
                                                    '<span class="fas"></span>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-12">'+
                                        '<div class="input-group mb-3">'+
                                            '<input type="email" class="form-control email" data-placeholder ="Email"  placeholder="Email" value="mishaenn@gmailc.com">'+
                                            '<div class="input-group-append">'+
                                                '<div class="input-group-text">'+
                                                    '<span class="fas"></span>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-12">'+
                                        '<div class="input-group mb-3">'+
                                            '<input type="text" class="form-control login" data-placeholder ="Логин"  placeholder="Логин" value="ddddddddd">'+
                                            '<div class="input-group-append">'+
                                                '<div class="input-group-text">'+
                                                    '<span class="fas"></span>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="row">'+
                                    '<div class="col-12">'+
                                        '<div class="input-group mb-3">'+
                                            '<input type="password" class="form-control password" data-placeholder ="Пароль"  placeholder="Пароль" value="dddddddddd">'+
                                            '<div class="input-group-append">'+
                                                '<div class="input-group-text">'+
                                                    '<span class="fas"></span>'+
                                                '</div>'+
                                            '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</form>'+
                            '<div class="row">' +
                                '<div class="col-12">' +
                                    '<button class="btn add-director btn-block btn-danger">' +
                                    'Добавить' +
                                    '</button>' +
                                '</div>' +
                            '</div>' +
                        '</div>'+
                    '</div>'
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
                        $('.add-director').click(function (e) {
                            let full_name = $('.full-name');
                            let email = $('.email');
                            let login = $('.login');
                            let password = $('.password');
                            let form = {
                                full_name: {field: full_name, value: full_name.val().trim()},
                                email: {field: email, value: email.val().trim()},
                                login: {field: login, value: login.val().trim()},
                                password: {field: password, value: password.val().trim()},
                            };
                            let error = false;
                            let valid_result =
                                {
                                    full_name: {valid: valid_field(form.full_name.value, {type: 'string', min_length: '5', regexp: /^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}|([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}$/ }), field: form.full_name.field},
                                    email: {valid: valid_field(form.email.value, {type: 'string', min_length: '6', max_length: 254, regexp: /^([A-Za-z0-9_\.-]+\@[\dA-Za-z\.-]+\.[A-Za-z\.]{2,6})$/}), field: form.email.field},
                                    login: {valid: valid_field(form.login.value, {type: 'string', min_length: '3', max_length: '32'}), field: form.login.field},
                                    password: {valid: valid_field(form.password.value, {type: 'string', min_length: '6', max_length: '32'}), field: form.password.field}
                                };
                            $.each(valid_result, function (key, item) {
                                if (item.valid.error) {
                                    if (key === 'full_name') {
                                        field_reaction(item.field, 'Некореектное ФИО', item.valid.error);
                                    } else {
                                        field_reaction(item.field, item.valid.message, item.valid.error);
                                    }
                                    error = true;
                                } else {
                                    field_reaction(item.field, item.valid.message, item.valid.error);
                                }
                            });
                            if(!error){
                                $.ajax({
                                    url: '/director/add_director',
                                    method: 'POST',
                                    dataType: 'json',
                                    data: {
                                            full_name: full_name.val().trim(),
                                            email: email.val().trim(),
                                            login: login.val().trim(),
                                            password: password.val().trim()
                                    },
                                    success: function (data) {
                                        if(data.error){
                                            console.log(123)
                                        }
                                        else{
                                            Swal.close();
                                            Swal.fire({
                                                toast: true,
                                                timer: 10000,
                                                html: '<span style="color: #fff; font-weight: 700">Директор добавлен</span>',
                                                background: '#dc3545',
                                                position: 'top-end',
                                                showConfirmButton: false
                                            });
                                            $('table').prepend('' +
                                                '<tr class="show">' +
                                                '<td class="" style="border: 1px solid #dee2e6"><span data-modal = "director" data-action="get_director_modal" data-data="" class="pseudo-link">'+data.user_id+'</span> <input type="text" value="'+data.director_id+'" hidden></td>'+
                                                '<td  style="border: 1px solid #dee2e6"><span data-modal = "director" data-action="get_director_modal" data-data="" class="pseudo-link">'+form.full_name.value+'</span><input type="text" value="'+data.director_id+'" hidden></td>'+
                                                '<td  style="border: 1px solid #dee2e6"><span data-modal = "director" data-action="get_director_modal" data-data="" class="pseudo-link">'+form.login.value+'</span><input type="text" value="'+data.director_id+'" hidden></td>'+
                                                '<td class="" style="border: 1px solid #dee2e6"><span data-modal = "director" data-action="get_director_modal" data-data="" class="pseudo-link"></span><input type="text" value="'+data.director_id+'" hidden></td>'+
                                                '<td class="" style="border: 1px solid #dee2e6"></td>'+
                                                '<td class="" style="border: 1px solid #dee2e6"></td>'+
                                                '<td class="" style="border: 1px solid #dee2e6"></td>'+
                                                '<td class="text-center" style="border: 1px solid #dee2e6; background: #fd7e14; color: #fff; font-weight: 700;">Не активирована</td>' +
                                                '<td style="border: 1px solid #dee2e6" class="text-center">' +
                                                '<i style="color: #2d2e2c; font-size: 18px; cursor: pointer" data-toggle="close" class="fa fa-cog director-settings"></i><input type="text" value="'+data.director_id+'" hidden>' +
                                                '<div class="option-holder" style="display: none; position: absolute;">' +
                                                '<ul class="drop-menu">' +
                                                '<li><span class="menu-button" data-target = "director" data-action="get_activate_director">Активировать</span><input type="text" value="'+data.director_id+'" hidden></li>' +
                                                '<li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="'+data.director_id+'" hidden></li>' +
                                                '<li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="'+data.director_id+'" hidden></li>' +
                                                '</ul>' +
                                                '</div>' +
                                                '</td>' +
                                                '<td hidden>' +
                                                '<input type="text" value="'+data.data+'" hidden>' +
                                                '</td>' +
                                                '</tr>'
                                            )

                                        }
                                    }
                                });
                            }
                        })
                    }
                })
            });

            let row_list = $('.card-body table tbody tr');
            let row_count = row_list.length;
            if(row_count<=10){
                $('.dataTables_info').text('Показаны все записи');
            }
            else{
                $('.dataTables_info').text('Показано 1 до 10 из '+row_count+' записей');
            }
            let button_number;



            /*director_handler.on('click', '.pseudo-link',*/
            $(document).mouseup(function (e){ // событие клика по веб-документу
                let menu = $(".option-holder"); // тут указываем ID элемента
                if (!menu.is(e.target) // если клик был не по нашему блоку
                    && menu.has(e.target).length === 0) { // и не по его дочерним элементам
                    menu.hide(); // скрываем его
                }
            });

            director_handler.on('click', '.director-settings', function (event) {
                let target = $(event.target);
                let menu = $(target.next().next());
                let td = $(target.parent());
                menu.offset({
                    top: 0,
                    left: 0
                });
                if(target.attr('data-toggle') === 'close'){
                    target.attr('data-toggle', 'open');
                    menu.show();
                    menu.offset({
                        top: td.offset().top + td.outerHeight()-1,
                        left: td.offset().left - (menu.outerWidth() - td.outerWidth())
                    });
                }
                else{
                    target.attr('data-toggle', 'close');
                    menu.hide()
                }
            });
            director_handler.on('click', '.option-close', function (event) {
                let target = $(event.target);
                target.parents('.option-holder').hide();
                target.parents('.option-holder').prevAll('.fa-cog').show()
            });

            director_handler.on('click', '.menu-button', function (e) {
                let status = $(e.target).parents('td').prev();
                let brand = $(status).prev();
                let activation_count = $(brand).prev();
                let markup = $(activation_count).prev();
                let code = $(markup).prev();
                let id = $(e.target).next().val();
                let target = $(e.target).attr('data-target');
                let action = $(e.target).attr('data-action');
                let menu = $(e.target).parents('.option-holder');
                if(action !== 'get_activate_director' && action !== 'get_update_director'){
                    $.ajax({
                        url: '/'+target+'/' + action,
                        method: 'post',
                        data: {id: id},
                        dataType: 'json',
                        success: function (data) {
                            switch (action) {
                                case 'delete_director':
                                    remove_row(id);
                                    if($('tr').length === 1){
                                        $('table').remove();
                                        $('.director-card').append('<h1 style="display: none" class="table-replace-text">Список директоров пуст. Добавьте нового директора.</h1>');
                                        $('.table-replace-text').fadeIn(300);
                                    }
                                    Swal.fire({
                                        toast: true,
                                        timer: 3000,
                                        html: '<span style="color: #fff; font-weight: 700">Директор удален</span>',
                                        background: '#dc3545',
                                        position: 'top-end',
                                        showConfirmButton: false
                                    });
                                    break;
                                case 'block_director':
                                    let block_msg = '<span style="color: #fff; font-weight: 700">Директор заблокирован</span>'
                                    $(status).css('background', '#6c757d').text('Забокирована');
                                    status.next().children('.option-holder').children().remove();
                                    status.next().children('.option-holder').append(
                                        '<ul class="drop-menu">'+
                                        '<li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="'+id+'" hidden></li>'+
                                        '<li><span class="menu-button" data-target = "director" data-action="unlock_director">Разблокировать</span><input type="text" value="'+id+'" hidden></li>'+
                                        '<li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="'+id+'" hidden></li>'+
                                        '</ul>'
                                    )
                                    break;
                                case 'unlock_director':
                                    let unlock_msg = '<span style="color: #fff; font-weight: 700">Директор разблокирован</span>'
                                    $(status).css('background', '#fd7e14').text('Не активирована')
                                    status.next().children('.option-holder').children().remove()
                                    status.next().children('.option-holder').append(
                                        '<ul class="drop-menu">'+
                                        '<li><span class="menu-button" data-target = "director" data-action="get_activate_director">Активировать</span><input type="text" value="'+id+'" hidden></li>'+
                                        '<li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="'+id+'" hidden></li>'+
                                        '<li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="'+id+'" hidden></li>'+
                                        '</ul>'
                                    );
                                    break;
                                case 'deactivate_director':
                                    let deactivate_msg = '<span style="color: #fff; font-weight: 700">Директор деактивирован</span>'
                                    $(status).css('background', '#fd7e14').text('Не активирована')
                                    status.next().children('.option-holder').children().remove()
                                    status.next().children('.option-holder').append('' +
                                        '<ul class="drop-menu">'+
                                        '<li><span class="menu-button" data-target = "director" data-action="get_activate_director">Активировать</span><input type="text" value="'+id+'" hidden></li>'+
                                        '<li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="'+id+'" hidden></li>'+
                                        '<li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="'+id+'" hidden></li>'+
                                        '</ul>'
                                    );
                                    break;
                            }
                        }
                    });
                }
                else{
                    $.ajax({
                        url: '/'+target+'/' + action,
                        method: 'post',
                        data: {id: id},
                        dataType: 'html',
                        success: function (data) {
                            Swal.fire({
                                html: data,
                                background: 'rgba(0,0,0,0)',
                                position: 'top',
                                showCloseButton: false,
                                showConfirmButton: false,
                                showCancelButton: false,
                                focusConfirm: false,
                                onBeforeOpen: () => {
                                    $('.active-director').unbind();
                                    $('.update-director').unbind();
                                    $('button[data-card-widget="remove"]').on('click', function (e) {
                                        Swal.close();
                                    });
                                    $('.active-director').click(function (e) {
                                        let data = {};
                                        if($('.code').val().trim() !== ''){data['code']=$('.code').val().trim()}else{data['code']=code.text()}
                                        if($('.comment').val().trim() !== ''){data['comment']=$('.comment').val().trim()}else{data['comment']=''}
                                        if($('.markup').val().trim() !== ''){data['markup']=$('.markup').val().trim()}else{data['markup']=markup.text()}
                                        if($('.activation_count').val().trim() !== ''){data['activation_count']=$('.activation_count').val().trim()}else{data['activation_count']=activation_count.text()}
                                        if($('.brand').val().trim() !== ''){data['brand']=$('.brand').val().trim()}else{data['brand']=brand.text()}
                                        data['id'] = id;
                                        data['status'] = 1;
                                        $.ajax({
                                            url: '/director/activate_director',
                                            data: data,
                                            method: 'post',
                                            dataType: 'json',
                                            success: function (data) {
                                                let brand_convert = '';
                                                if(!data.error){
                                                    if($('.code').val().trim() !== ''){'<span class="pseudo-link" data-modal="director" data-action="get_director_modal" data-data"'+id+'">'+code.text($('.code').val().trim())+'</span>'}
                                                    if($('.markup').val().trim() !== ''){markup.text($('.markup').val().trim())}
                                                    if($('.activation_count').val().trim() !== ''){activation_count.text($('.activation_count').val().trim())}
                                                    switch ($('.brand').val().trim()) {
                                                        case '1':
                                                            brand_convert = 'Дедал';
                                                            break
                                                        case '2':
                                                            brand_convert = 'Аветти';
                                                            break
                                                        case '3':
                                                            brand_convert = 'Малина';
                                                            break
                                                    }
                                                    if($('.brand').val().trim() !== ''){brand.text(brand_convert)}
                                                    status.css('background', '#28a745').text('Активирован');
                                                    status.next().children('.option-holder').children().remove();
                                                    status.next().children('.option-holder').append(
                                                        '<ul class="drop-menu">'+
                                                        '<li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="'+id+'" hidden></li>'+
                                                        '<li><span class="menu-button" data-target = "director" data-action="deactivate_director">Деактивировать</span><input type="text" value="'+id+'" hidden></li>'+
                                                        '<li><span class="menu-button" data-target = "director" data-action="block_director">Заблокировать</span><input type="text" value="'+id+'" hidden></li>'+
                                                        '<li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="'+id+'" hidden></li>'+
                                                        '</ul>'
                                                    );
                                                    Swal.close();
                                                    Swal.fire({
                                                        toast: true,
                                                        timer: 10000,
                                                        html: '<span style="color: #fff; font-weight: 700">Директор активирован</span>',
                                                        background: '#dc3545',
                                                        position: 'top-end',
                                                        showConfirmButton: false
                                                    });
                                                }
                                            }
                                        })
                                    });
                                    $('.update-director').click(function (e) {
                                        let full_name = $('.full_name');
                                        let email = $('.email');
                                        let login = $('.login');
                                        let password = $('.password');
                                        let code = $('.code');
                                        let markup = $('.markup');
                                        let activation_count = $('.activation_count');
                                        let brand = $('.brand');
                                        let form = {
                                            full_name: {field: full_name, value: full_name.val().trim()},
                                            email: {field: email, value: email.val().trim()},
                                            login: {field: login, value: login.val().trim()},
                                            password: {field: password, value: password.val().trim()},
                                            code: {field: code, value: code.val().trim()},
                                            markup: {field: markup, value: markup.val().trim()},
                                            activation_count: {field: activation_count, value: activation_count.val().trim()},
                                            brand: {field: brand, value: brand.val().trim()},
                                        };
                                        let error = false;
                                        let valid_result =
                                            {
                                                full_name: {valid: valid_field(form.full_name.value, {type: 'string', min_length: '5', regexp: /^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}|([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}$/ }), field: form.full_name.field},
                                                email: {valid: valid_field(form.email.value, {type: 'string', min_length: '6', max_length: 254, regexp: /^([A-Za-z0-9_\.-]+\@[\dA-Za-z\.-]+\.[A-Za-z\.]{2,6})$/}), field: form.email.field},
                                                login: {valid: valid_field(form.login.value, {type: 'string', min_length: '3', max_length: '32'}), field: form.login.field},
                                            };
                                        $.each(valid_result, function (key, item) {
                                            if (item.valid.error) {
                                                if (key === 'full_name') {
                                                    field_reaction(item.field, 'Некореектное ФИО', item.valid.error);
                                                } else {
                                                    field_reaction(item.field, item.valid.message, item.valid.error);
                                                }
                                                error = true;
                                            } else {
                                                field_reaction(item.field, item.valid.message, item.valid.error);
                                            }
                                        });
                                        if(!error){
                                            $.ajax({
                                                url: '/director/update_director',
                                                method: 'post',
                                                dataType: 'json',
                                                data: {id: id, data: {
                                                        full_name: form.full_name.value,
                                                        email: form.email.value,
                                                        login: form.login.value,
                                                        password: form.password.value,
                                                        code: form.code.value,
                                                        markup: form.markup.value,
                                                        activation_count: form.activation_count.value,
                                                        brand: form.brand.value
                                                    }},
                                                success: function (data) {
                                                    if(!data.error){
                                                        Swal.close();
                                                        Swal.fire({
                                                            toast: true,
                                                            timer: 10000,
                                                            html: '<span style="color: #fff; font-weight: 700">Директор отредактирован</span>',
                                                            background: '#dc3545',
                                                            position: 'top-end',
                                                            showConfirmButton: false
                                                        });
                                                    }
                                                }
                                            })
                                        }
                                    })
                                }
                            })
                        }
                    });
                }

                menu.prev().prev().attr('data-toggle', 'close');
                menu.hide();
            });
            director_handler.on('click', '.sort-button', function (e) {
                let icon = $(e.target);
                let sort_type = icon.parent().prev().text();
                let head_row_list = $('table thead tr');
                let body_row_list = $('table tbody tr');
                let head_column_list = head_row_list.children();
                let body_column_list = body_row_list.children();
                let column_number = 0;
                $.each(head_column_list, function (key, item) {
                    if($(item).children().children().children().text() === sort_type){
                        column_number = key;
                    }
                });
                if(!icon.hasClass('asc') && !$(e.target).hasClass('desc')){
                    icon.removeClass('fa-times').addClass('fa-chevron-up').addClass('asc');
                }
                else{
                    if(icon.hasClass('asc')){
                        icon.removeClass('fa-chevron-up').addClass('fa-chevron-down').removeClass('asc').addClass('desc');
                    }
                    else if(icon.hasClass('desc')){
                        icon.removeClass('fa-chevron-down').removeClass('desc').addClass('fa-times');
                    }
                }
            });
            director_handler.on('input', '.filter-input', function (e) {
                let input = e.target;
                let sort_type = $('.filter-type').val();
                let head_row_list = $('table thead tr');
                let body_row_list = $('table tbody tr');
                let head_column_list = head_row_list.children();
                let body_column_list = body_row_list.children();
                let paginate_button = $('.index-button');
                let show_count = 0;
                let column_number = 0;
                /*$.each(paginate_button, function (key, item) {
                    $(item).show();
                });*/
                $.each(head_column_list, function (key, item) {
                    if($(item).children().children().children().text() === sort_type){
                        column_number = key;
                    }
                });
                $.each(body_row_list, function (key, item) {
                    let value;
                    if($(item.children[column_number]).children().hasClass('pseudo-link')){
                        value = $(item.children[column_number]).children().text().trim();
                    }
                    else{
                        value = $(item.children[column_number]).text().trim();
                    }
                    if($(input).val() !== ''){
                        if(value.includes($(input).val())){
                            show_count++;
                            $(item).addClass('show');
                            $(item).show();
                        }
                        else{
                            $(item).removeClass('show');
                            $(item).hide();
                        }
                    }
                    else{
                        $(item).addClass('show');
                        $(item).show();
                    }


                });
                let button_count = Math.ceil(show_count/10);
                $.each(paginate_button, function (key, item) {
                    if(button_count===0){
                        $(item).show();
                    }
                    else{
                        if($(item).attr('data-dt-idx')>button_count){
                            $(item).hide();
                        }
                        else{
                            $(item).show();
                        }
                    }
                });
            });
            director_handler.on('change', '.filter-type', function (e) {
                $('.filter-input').val('')
            })
        })
    </script>
</div>