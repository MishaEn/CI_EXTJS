<?php if($_SESSION['user']['role_id'] == 2):?>
    <div class="submodule employee" data-status="disabled" data-submoudle-appliaction = "employee">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-2">
                        <button class="btn btn-block submit create-employee btn-primary btn-block">Добавить</button>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4 text-right">
                                <span class="align-middle">Фильтровать по:</span>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select class="custom-select filter-type">
                                        <option value="ФИО">ФИО</option>
                                        <option value="Логин">Логин</option>
                                        <option value="Email">Email</option>
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
                    <div class="card-body order-card" style="height: 80vh;!important; overflow-y: scroll; overflow-x: hidden">
                        <?php if(!$data['error']):?>
                            <table class="table table-borderless table-hover">
                                <thead>
                                <tr>
                                    <th class="col-3" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>ФИО</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-3" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Логин</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-2" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Email</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-2" style="border: 1px solid #dee2e6"><div class="row"><div class="col-9"><span>Статус</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-1"></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php for ($i = 1; $i<= 1; $i++):?>
                                    <?php foreach($data['data'] as $item):?>
                                        <tr class="show">
                                            <td  style="border: 1px solid #dee2e6"><span data-modal = "employee" class="pseudo-link"><?php echo $item['full_name'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                            <td  style="border: 1px solid #dee2e6"><span><?php echo $item['login'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                            <td class="" style="border: 1px solid #dee2e6"><span><?php echo $item['email'];?></span><input type="text" value="<?php echo $item['director_id'];?>" hidden></td>
                                            <?php switch($item['status']):
                                            case 0:?>
                                                <td class="text-center" style="border: 1px solid #dee2e6; background: #dc3545; color: #fff; font-weight: 700;">Не активирован</td>
                                                <?php break; case 1:?>
                                                <td class="text-center" style="border: 1px solid #dee2e6; background: #28a745; color: #fff; font-weight: 700;">Активирован</td>
                                                <?php break; case 2:?>
                                            <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Заблокирована/td>
                                                <?php break; endswitch;?>
                                            <td style="border: 1px solid #dee2e6" class="text-center">
                                                <i style="color: #2d2e2c; font-size: 18px; cursor: pointer" data-toggle="close" class="fa fa-cog employee-settings"></i><input type="text" value="<?php echo $item['id'];?>" hidden>
                                                <div class="option-holder" style="display: none; position: absolute;">
                                                    <?php switch($item['status']):
                                                        case 0:?>
                                                            <ul class="drop-menu">
                                                                <li><span class="menu-button" data-target = "modal" data-action="get_activate_employee">Активировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "modal" data-action="get_update_employee">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "employee" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            </ul>
                                                            <?php break;
                                                        case 1:?>
                                                            <ul class="drop-menu">
                                                                <li><span class="menu-button" data-target = "modal" data-action="get_update_employee">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "employee" data-action="deactivate">Деактивировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "employee" data-action="block">Заблокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "employee" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            </ul>
                                                            <?php break;
                                                        case 2:?>
                                                            <ul class="drop-menu">
                                                                <li><span class="menu-button" data-target = "modal" data-action="get_update_employee">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "employee" data-action="deactivate">Деактивировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "employee" data-action="unlock">Разбокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "employee" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
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
                            <h1>Список компаний пуст. Добавьте новую компанию.</h1>
                        <?php endif;?>

                    </div>
                    <div class="card-footer clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div></div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate" style="margin-left: 100px">
                                    <ul class="pagination justify-content-end">
                                        <li class="paginate_button page-item previous disabled" id="example2_previous">
                                            <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link link-red">«</a>
                                        </li>
                                        <li class="paginate_button page-item next" id="example2_next">
                                            <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link link-red">»</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {

                let row_list = $('.card-body table tbody tr');
                let row_count = row_list.length;
                if(row_count<=10){
                    $('.dataTables_info').text('Показаны все записи');
                }
                else{
                    $('.dataTables_info').text('Показано 1 до 10 из '+row_count+' записей');
                }
                let button_number;
                let company_handler = $('.employee');
                $.each(row_list, function (key, item) {
                    if(key >= 10){
                        $(this).hide()
                    }
                    if(key % 10 === 0){
                        button_number = key/10 + 1;
                        if(key/10 === 0){
                            $('.next').before(
                                '<li data-dt-idx="'+button_number+'" class="paginate_button index-button page-item active">\n' +
                                '<a href="#" aria-controls="example2" data-dt-idx="'+button_number+'" tabindex="0" class="page-link  link-red">'+button_number+'</a>\n' +
                                '</li>')
                        }
                        else{
                            $('.next').before(
                                '<li data-dt-idx="'+button_number+'" class="paginate_button index-button page-item">\n' +
                                '<a href="#" aria-controls="example2" data-dt-idx="'+button_number+'" tabindex="0" class="page-link  link-red">'+button_number+'</a>\n' +
                                '</li>')
                        }

                    }
                });
                company_handler.on('click', '.pseudo-link', modal_link_handler);
                company_handler.on('click', '.index-button', function (event) {
                    let prev_button = $('.previous');
                    let next_button = $('.next');
                    let page_number =  $(event.target).attr('data-dt-idx');
                    $(prev_button).attr('data-dt-idx', --page_number);
                    $(next_button).attr('data-dt-idx', ++page_number);
                    $('.previous a').attr('data-dt-idx', --page_number);
                    $('.next a').attr('data-dt-idx', ++page_number);
                    $('.active').removeClass('active');

                    if($(event.target).hasClass('paginate_button')){
                        $(event.target).addClass('active');
                    }
                    else{
                        $(event.target).parent().addClass('active');
                    }
                    let start_view_count;
                    let end_view_count;
                    if( $(event.target).attr('data-dt-idx')===1){
                        start_view_count = 0;
                        end_view_count = 10;
                    }
                    else {
                        start_view_count = ($(event.target).attr('data-dt-idx')-1)*10;
                        end_view_count = start_view_count + 10;
                    }
                    let span_start = start_view_count+1;
                    let span_end;
                    if(row_count > end_view_count){
                        span_end = end_view_count;
                    }
                    else{
                        span_end = row_count;
                    }
                    $.each(row_list, function (key, item) {
                        if(key === 1){
                            $(this).show();
                        }
                        if(key >= start_view_count && key < end_view_count){
                            $('.dataTables_info').text('Показано от '+span_start+' до '+span_end+' из '+row_count+' записей');
                            $(this).show();
                        }
                        else{
                            $(this).hide();
                        }
                    });
                });
                $(document).mouseup(function (e){ // событие клика по веб-документу
                    let menu = $(".option-holder"); // тут указываем ID элемента
                    if (!menu.is(e.target) // если клик был не по нашему блоку
                        && menu.has(e.target).length === 0) { // и не по его дочерним элементам
                        menu.hide(); // скрываем его
                    }
                });

                company_handler.on('click', '.create-employee', function (e) {
                    $.ajax({
                        url: '/modal/get_create_employee',
                        method: 'post',
                        dataType: 'html',
                        success: function (data) {
                            Swal.fire({
                                html: data,
                                position: 'center',
                                width: '30rem',
                                padding: '0',
                                background: 'transparent',
                                closeButtonHtml: '<button style="color: #fff" type="button" class="btn remove-modal btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>',
                                showCloseButton: true,
                                showCancelButton: false,
                                showConfirmButton: false,
                                onBeforeOpen: function (e) {
                                    $(document).on('change', '.type', change_register_form_handler);
                                    function change_register_form_handler(e){
                                        if($(this).val() === 'ИП'){
                                            $('.step-title').text('Шаг 2: Данные об индивидуальном предпринимателе');
                                            $('.organization-name').attr({
                                                disabled: true,
                                                placeholder: 'Индивидуальный предприниматель'
                                            });
                                            $('.organization-name').val($('.director-name').val());
                                            $('.inn-kpp').attr('placeholder', 'ИНН');
                                            $('.ogrn').attr('placeholder', 'ОГРНИП');
                                            $('.okpo').val('');
                                            $('.ogrn').val('');
                                            $('.inn-kpp').val('');
                                            $('.inn-kpp').mask('999999999999');
                                            $('.ogrn').mask('999999999999999');
                                            $('.okpo').mask('9999999999');
                                            $(document).on('input', '.director-name', function (e) {
                                                $('.organization-name').val($('.director-name').val());
                                            });
                                        }
                                        else{
                                            $('.step-title').text('Шаг 2: Данные об организации');
                                            $('.organization-name').attr({
                                                disabled: false,
                                                placeholder: 'Название организации'
                                            });
                                            $('.organization-name').val('');
                                            $('.inn-kpp').attr('placeholder', 'ИНН/КПП');
                                            $('.ogrn').attr('placeholder', 'ОГРН');
                                            $('.ogrn').val('');
                                            $('.inn-kpp').val('');
                                            $('.inn-kpp').mask('999999999?/999999999');
                                            $('.ogrn').mask('9999999999999');
                                            $('.okpo').val('');
                                            $('.okpo').mask('99999999');
                                        }
                                    }
                                    $(document).on('click', '.create-company', function (e) {
                                        let organization_name = $('.organization-name');
                                        let director_name = $('.director-name');
                                        let inn_kpp = $('.inn-kpp');
                                        let ogrn = $('.ogrn');
                                        let juridical_address = $('.juridical-address');
                                        let postal_address = $('.postal-address');
                                        let settlement_account = $('.settlement-account');
                                        let bank_name = $('.bank-name');
                                        let correction_account = $('.correction-account');
                                        let bik = $('.bik');
                                        let okpo = $('.okpo');
                                        let valid_company_result = valid_group_field({
                                            field: {
                                                organization_name: organization_name,
                                                director_name: director_name,
                                                inn_kpp: inn_kpp,
                                                ogrn: ogrn,
                                                juridical_address: juridical_address,
                                                postal_address: postal_address,
                                                settlement_account: settlement_account,
                                                bank_name: bank_name,
                                                correction_account: correction_account,
                                                bik: bik,
                                                okpo: okpo
                                            },
                                            option: {
                                                organization_name: {min_length:1, max_length:255},
                                                director_name: {min_length:6, max_length:255},
                                                inn_kpp: {min_length:12, max_length:20},
                                                ogrn: {min_length:13, max_length:15},
                                                juridical_address: {min_length:5, max_length:255},
                                                postal_address: {min_length:5, max_length:255},
                                                settlement_account: {min_length:20, max_length:25},
                                                bank_name: {min_length:3, max_length:255},
                                                correction_account: {min_length:20, max_length:25},
                                                bik: {min_length:9, max_length:9},
                                                okpo: {min_length:8, max_length:10}
                                            }
                                        });
                                        if($.isEmptyObject(valid_company_result)) {
                                            $.ajax({
                                                url: '/company/create_company',
                                                method: 'post',
                                                dataType: 'json',
                                                data: {},
                                                success: function (data) {

                                                }
                                            })
                                        }
                                        else {
                                            Swal.fire({
                                                toast: true,
                                                timer: 10000,
                                                html: '<span style="color: #fff; font-weight: 700">Возникли проблемы при заполнении формы? Прочтите <span class="badge badge-primary rule-field" style="cursor: pointer; font-size: 16px">парвила заполнения полей</span></span>',
                                                background: '#dc3545',
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                onBeforeOpen: function () {
                                                    $(document).on('click', '.rule-field', function () {
                                                        Swal.fire({
                                                            title: 'Правила заполнения полей формы "Регистрация"',
                                                            position: 'top',
                                                            html:
                                                                '<h3>Шаг 1:</h3>\n' +
                                                                '<ul class="text-left" style="list-style: none"> \n' +
                                                                ' <li><span style="font-size: 16px " class="badge badge-danger">"Фамилия Имя Отчество"</span> - длина от 6 символов, необходимо указать поную фамилию, имя и отчество, например: "Иванов Иван Иванович, Петов Петр Петрович"</li>\n' +
                                                                ' <li><span style="font-size: 16px " class="badge badge-danger">"Email"</span> - от 9 до 32 символов, необходимо указать достовернный электронный адрес, например: "example@mail.ru, example@gmail.com"</li>\n' +
                                                                ' <li><span style="font-size: 16px " class="badge badge-danger">"Логин"</span> - от 3 до 32 символов, латинские строчные и заглавные буквы, цифры, тире(-) и нижнее подчеркивание(_), например: "login, login1, Login1, login-1, login_1"</li>\n' +
                                                                ' <li><span style="font-size: 16px " class="badge badge-danger">"Пароль"</span> - от 6 до 32 символов, цифры, латинские строчные и заглавные буквы, например: "password, password1, Password111"</li>\n' +
                                                                '</ul>',
                                                            confirmButtonColor: '#dc3545'
                                                        });
                                                    });
                                                }
                                            });
                                        }
                                    });
                                }
                            });
                            //$('.modal-holder').append(data);

                        }
                    })
                });

                company_handler.on('click', '.employee-settings', function (event) {
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
                company_handler.on('click', '.option-close', function (event) {
                    let target = $(event.target);
                    target.parents('.option-holder').hide();
                    target.parents('.option-holder').prevAll('.fa-cog').show()
                });

                company_handler.on('click', '.menu-button', function (e) {
                    let id = $(e.target).next().val();
                    let target = $(e.target).attr('data-target');
                    let action = $(e.target).attr('data-action');
                    let menu = $(e.target).parents('.option-holder');
                    console.log('id = ' + id + ', target = ' + target + ', action = ' + target+'_'+action);
                    if(target === 'modal'){
                        $.ajax({
                            url: '/'+target+'/' + action,
                            data: {id: id},
                            method: 'post',
                            dataType: 'html',
                            success: function (data) {
                                Swal.fire({
                                    html: data,
                                    position: 'center',
                                    width: '30rem',
                                    padding: '0',
                                    background: 'transparent',
                                    closeButtonHtml: '<button style="color: #fff" type="button" class="btn remove-modal btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>',
                                    showCloseButton: true,
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    onBeforeOpen: function (e) {
                                        $(document).on('click', '.activate-company', function (e) {
                                            let id =  $(e.target).next().val();
                                            let company_code = $('.company-code').val();
                                            let company_comment = $('#company-comment').val();
                                            $.ajax({
                                                url: '/company/activate_company',
                                                data: {id: id, code: company_code, comment: company_comment},
                                                method: 'post',
                                                dataType: 'json',
                                                success: function (data) {
                                                    if(!data.error){
                                                        let target = $(e.target);
                                                        let parent = target.parents('.modal-close');
                                                        $(parent).remove();
                                                        let tr_list = $('tr');
                                                        $.each(tr_list, function (key, item) {
                                                            let hidden_id = $(item).find('td[hidden]').children().val();
                                                            if(id === hidden_id){
                                                                $.ajax({
                                                                    url: '/company/update_table_row',
                                                                    data: {id: id},
                                                                    method: 'post',
                                                                    dataType: 'html',
                                                                    success: function (data) {
                                                                        $(item).replaceWith(data);
                                                                        Swal.fire({
                                                                            toast: true,
                                                                            timer: 3000,
                                                                            html: '<span style="color: #fff; font-weight: 700">Компания успешно активирована!</span>',
                                                                            background: '#28a745',
                                                                            position: 'top-end',
                                                                            showConfirmButton: false
                                                                        });
                                                                    }
                                                                })
                                                                /*$($(item).find('td')[2]).text(company_code);
                                                                $($(item).find('td')[3]).text(company_comment);
                                                                $($(item).find('td')[4]).text('Активирована');*/
                                                            }
                                                        })

                                                    }
                                                }
                                            })
                                        })
                                    }
                                });
                            }
                        });
                    }
                    else{
                        $.ajax({
                            url: '/'+target+'/' + action+'_'+target,
                            method: 'post',
                            data: {id: id},
                            dataType: 'json',
                            success: function (data) {
                                switch (action) {
                                    case 'delete':
                                        remove_row(id);
                                        if($('tr').length === 1){
                                            $('table').remove();
                                            $('.company-card').append('<h1 style="display: none" class="table-replace-text">Список компаний пуст. Добавьте новую компанию.</h1>');
                                            $('.table-replace-text').fadeIn(300);
                                        }
                                        Swal.fire({
                                            toast: true,
                                            timer: 3000,
                                            html: '<span style="color: #fff; font-weight: 700">Компания удалена!</span>',
                                            background: '#dc3545',
                                            target: '.popup-handler',
                                            position: 'top-end',
                                            showConfirmButton: false
                                        });
                                        break;
                                    case 'block':
                                        let block_msg = '<span style="color: #fff; font-weight: 700">Компания заблокирована!</span>'
                                        update_table_row(e, id, block_msg, '#dc3545', '/company/update_table_row');
                                        break;
                                    case 'unlock':
                                        let unlock_msg = '<span style="color: #fff; font-weight: 700">Компания разблокирована!</span>'
                                        update_table_row(e, id, unlock_msg, '#28a745', '/company/update_table_row');
                                        break;
                                    case 'deactivate':
                                        let deactivate_msg = '<span style="color: #fff; font-weight: 700">Компания деактивирована!</span>'
                                        update_table_row(e, id, deactivate_msg, '#dc3545', '/company/update_table_row');
                                        break;
                                }
                            }
                        });
                    }
                    menu.prev().prev().attr('data-toggle', 'close');
                    menu.hide();
                });
                company_handler.on('click', '.sort-button', function (e) {
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
                company_handler.on('input', '.filter-input', function (e) {
                    let input = e.target;
                    let sort_type = $('.filter-type').val();
                    let head_row_list = $('table thead tr');
                    let body_row_list = $('table tbody tr');
                    let head_column_list = head_row_list.children();
                    let body_column_list = body_row_list.children();
                    let paginate_button = $('.index-button');
                    let show_count = 0;
                    let column_number = 0;
                    console.log(sort_type+' '+head_row_list+' '+body_row_list+' '+head_column_list+' '+body_column_list+' '+paginate_button)
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
                company_handler.on('change', '.filter-type', function (e) {
                    $('.filter-input').val('')
                })
            })
        </script>
    </div>
<?php else:?>
    <div class="submodule employee" data-status="disabled" data-submoudle-appliaction = "employee">
        <div class="submodule employee">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-2">
                            <button class="btn btn-block submit create-employee btn-primary btn-block">Добавить</button>
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-4 text-right">
                                    <span class="align-middle">Фильтровать по:</span>
                                </div>
                                <div class="col-2">
                                    <div class="input-group mb-3">
                                        <select class="custom-select filter-type">
                                            <option value="ФИО">ФИО</option>
                                            <option value="Логин">Логин</option>
                                            <option value="Email">Email</option>
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
                        <div class="card-body order-card" style="height: 80vh;!important; overflow-y: scroll; overflow-x: hidden">
                            <?php if(!$data['error']):?>
                                <table class="table table-borderless table-hover">
                                    <thead>
                                    <tr>
                                        <th class="col-3" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>ФИО</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                        <th class="col-3" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Логин</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                        <th class="col-2" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Email</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                        <th class="col-2" style="border: 1px solid #dee2e6"><div class="row"><div class="col-9"><span>Статус</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                        <th class="col-1"></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php for ($i = 1; $i<= 1; $i++):?>
                                        <?php foreach($data['data'] as $item):?>
                                            <tr class="show">
                                                <td  style="border: 1px solid #dee2e6"><span data-modal = "employee" class="pseudo-link"><?php echo $item['full_name'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                                <td  style="border: 1px solid #dee2e6"><span><?php echo $item['login'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                                <td class="" style="border: 1px solid #dee2e6"><span><?php echo $item['email'];?></span><input type="text" value="<?php echo $item['director_id'];?>" hidden></td>
                                                <?php switch($item['status']):
                                                case 0:?>
                                                    <td class="text-center" style="border: 1px solid #dee2e6; background: #dc3545; color: #fff; font-weight: 700;">Не активирован</td>
                                                    <?php break; case 1:?>
                                                    <td class="text-center" style="border: 1px solid #dee2e6; background: #28a745; color: #fff; font-weight: 700;">Активирован</td>
                                                    <?php break; case 2:?>
                                                <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Заблокирована/td>
                                                    <?php break; endswitch;?>
                                                <td style="border: 1px solid #dee2e6" class="text-center">
                                                    <i style="color: #2d2e2c; font-size: 18px; cursor: pointer" data-toggle="close" class="fa fa-cog employee-settings"></i><input type="text" value="<?php echo $item['id'];?>" hidden>
                                                    <div class="option-holder" style="display: none; position: absolute;">
                                                        <?php switch($item['status']):
                                                            case 0:?>
                                                                <ul class="drop-menu">
                                                                    <li><span class="menu-button" data-target = "modal" data-action="get_activate_employee">Активировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                    <li><span class="menu-button" data-target = "modal" data-action="get_update_employee">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                    <li><span class="menu-button" data-target = "employee" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                </ul>
                                                                <?php break;
                                                            case 1:?>
                                                                <ul class="drop-menu">
                                                                    <li><span class="menu-button" data-target = "modal" data-action="get_update_employee">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                    <li><span class="menu-button" data-target = "employee" data-action="deactivate">Деактивировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                    <li><span class="menu-button" data-target = "employee" data-action="block">Заблокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                    <li><span class="menu-button" data-target = "employee" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                </ul>
                                                                <?php break;
                                                            case 2:?>
                                                                <ul class="drop-menu">
                                                                    <li><span class="menu-button" data-target = "modal" data-action="get_update_employee">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                    <li><span class="menu-button" data-target = "employee" data-action="deactivate">Деактивировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                    <li><span class="menu-button" data-target = "employee" data-action="unlock">Разбокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                    <li><span class="menu-button" data-target = "employee" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
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
                                <h1>Список компаний пуст. Добавьте новую компанию.</h1>
                            <?php endif;?>

                        </div>
                        <div class="card-footer clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div></div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate" style="margin-left: 100px">
                                        <ul class="pagination justify-content-end">
                                            <li class="paginate_button page-item previous disabled" id="example2_previous">
                                                <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link link-red">«</a>
                                            </li>
                                            <li class="paginate_button page-item next" id="example2_next">
                                                <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link link-red">»</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function () {

                    let row_list = $('.card-body table tbody tr');
                    let row_count = row_list.length;
                    if(row_count<=10){
                        $('.dataTables_info').text('Показаны все записи');
                    }
                    else{
                        $('.dataTables_info').text('Показано 1 до 10 из '+row_count+' записей');
                    }
                    let button_number;
                    let company_handler = $('.employee');
                    $.each(row_list, function (key, item) {
                        if(key >= 10){
                            $(this).hide()
                        }
                        if(key % 10 === 0){
                            button_number = key/10 + 1;
                            if(key/10 === 0){
                                $('.next').before(
                                    '<li data-dt-idx="'+button_number+'" class="paginate_button index-button page-item active">\n' +
                                    '<a href="#" aria-controls="example2" data-dt-idx="'+button_number+'" tabindex="0" class="page-link  link-red">'+button_number+'</a>\n' +
                                    '</li>')
                            }
                            else{
                                $('.next').before(
                                    '<li data-dt-idx="'+button_number+'" class="paginate_button index-button page-item">\n' +
                                    '<a href="#" aria-controls="example2" data-dt-idx="'+button_number+'" tabindex="0" class="page-link  link-red">'+button_number+'</a>\n' +
                                    '</li>')
                            }

                        }
                    });
                    company_handler.on('click', '.pseudo-link', modal_link_handler);
                    company_handler.on('click', '.index-button', function (event) {
                        let prev_button = $('.previous');
                        let next_button = $('.next');
                        let page_number =  $(event.target).attr('data-dt-idx');
                        $(prev_button).attr('data-dt-idx', --page_number);
                        $(next_button).attr('data-dt-idx', ++page_number);
                        $('.previous a').attr('data-dt-idx', --page_number);
                        $('.next a').attr('data-dt-idx', ++page_number);
                        $('.active').removeClass('active');

                        if($(event.target).hasClass('paginate_button')){
                            $(event.target).addClass('active');
                        }
                        else{
                            $(event.target).parent().addClass('active');
                        }
                        let start_view_count;
                        let end_view_count;
                        if( $(event.target).attr('data-dt-idx')===1){
                            start_view_count = 0;
                            end_view_count = 10;
                        }
                        else {
                            start_view_count = ($(event.target).attr('data-dt-idx')-1)*10;
                            end_view_count = start_view_count + 10;
                        }
                        let span_start = start_view_count+1;
                        let span_end;
                        if(row_count > end_view_count){
                            span_end = end_view_count;
                        }
                        else{
                            span_end = row_count;
                        }
                        $.each(row_list, function (key, item) {
                            if(key === 1){
                                $(this).show();
                            }
                            if(key >= start_view_count && key < end_view_count){
                                $('.dataTables_info').text('Показано от '+span_start+' до '+span_end+' из '+row_count+' записей');
                                $(this).show();
                            }
                            else{
                                $(this).hide();
                            }
                        });
                    });
                    $(document).mouseup(function (e){ // событие клика по веб-документу
                        let menu = $(".option-holder"); // тут указываем ID элемента
                        if (!menu.is(e.target) // если клик был не по нашему блоку
                            && menu.has(e.target).length === 0) { // и не по его дочерним элементам
                            menu.hide(); // скрываем его
                        }
                    });

                    company_handler.on('click', '.create-employee', function (e) {
                        $.ajax({
                            url: '/modal/get_create_employee',
                            method: 'post',
                            dataType: 'html',
                            success: function (data) {
                                Swal.fire({
                                    html: data,
                                    position: 'center',
                                    width: '30rem',
                                    padding: '0',
                                    background: 'transparent',
                                    closeButtonHtml: '<button style="color: #fff" type="button" class="btn remove-modal btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>',
                                    showCloseButton: true,
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                    onBeforeOpen: function (e) {
                                        $(document).on('change', '.type', change_register_form_handler);
                                        function change_register_form_handler(e){
                                            if($(this).val() === 'ИП'){
                                                $('.step-title').text('Шаг 2: Данные об индивидуальном предпринимателе');
                                                $('.organization-name').attr({
                                                    disabled: true,
                                                    placeholder: 'Индивидуальный предприниматель'
                                                });
                                                $('.organization-name').val($('.director-name').val());
                                                $('.inn-kpp').attr('placeholder', 'ИНН');
                                                $('.ogrn').attr('placeholder', 'ОГРНИП');
                                                $('.okpo').val('');
                                                $('.ogrn').val('');
                                                $('.inn-kpp').val('');
                                                $('.inn-kpp').mask('999999999999');
                                                $('.ogrn').mask('999999999999999');
                                                $('.okpo').mask('9999999999');
                                                $(document).on('input', '.director-name', function (e) {
                                                    $('.organization-name').val($('.director-name').val());
                                                });
                                            }
                                            else{
                                                $('.step-title').text('Шаг 2: Данные об организации');
                                                $('.organization-name').attr({
                                                    disabled: false,
                                                    placeholder: 'Название организации'
                                                });
                                                $('.organization-name').val('');
                                                $('.inn-kpp').attr('placeholder', 'ИНН/КПП');
                                                $('.ogrn').attr('placeholder', 'ОГРН');
                                                $('.ogrn').val('');
                                                $('.inn-kpp').val('');
                                                $('.inn-kpp').mask('999999999?/999999999');
                                                $('.ogrn').mask('9999999999999');
                                                $('.okpo').val('');
                                                $('.okpo').mask('99999999');
                                            }
                                        }
                                        $(document).on('click', '.create-company', function (e) {
                                            let organization_name = $('.organization-name');
                                            let director_name = $('.director-name');
                                            let inn_kpp = $('.inn-kpp');
                                            let ogrn = $('.ogrn');
                                            let juridical_address = $('.juridical-address');
                                            let postal_address = $('.postal-address');
                                            let settlement_account = $('.settlement-account');
                                            let bank_name = $('.bank-name');
                                            let correction_account = $('.correction-account');
                                            let bik = $('.bik');
                                            let okpo = $('.okpo');
                                            let valid_company_result = valid_group_field({
                                                field: {
                                                    organization_name: organization_name,
                                                    director_name: director_name,
                                                    inn_kpp: inn_kpp,
                                                    ogrn: ogrn,
                                                    juridical_address: juridical_address,
                                                    postal_address: postal_address,
                                                    settlement_account: settlement_account,
                                                    bank_name: bank_name,
                                                    correction_account: correction_account,
                                                    bik: bik,
                                                    okpo: okpo
                                                },
                                                option: {
                                                    organization_name: {min_length:1, max_length:255},
                                                    director_name: {min_length:6, max_length:255},
                                                    inn_kpp: {min_length:12, max_length:20},
                                                    ogrn: {min_length:13, max_length:15},
                                                    juridical_address: {min_length:5, max_length:255},
                                                    postal_address: {min_length:5, max_length:255},
                                                    settlement_account: {min_length:20, max_length:25},
                                                    bank_name: {min_length:3, max_length:255},
                                                    correction_account: {min_length:20, max_length:25},
                                                    bik: {min_length:9, max_length:9},
                                                    okpo: {min_length:8, max_length:10}
                                                }
                                            });
                                            if($.isEmptyObject(valid_company_result)) {
                                                $.ajax({
                                                    url: '/company/create_company',
                                                    method: 'post',
                                                    dataType: 'json',
                                                    data: {},
                                                    success: function (data) {

                                                    }
                                                })
                                            }
                                            else {
                                                Swal.fire({
                                                    toast: true,
                                                    timer: 10000,
                                                    html: '<span style="color: #fff; font-weight: 700">Возникли проблемы при заполнении формы? Прочтите <span class="badge badge-primary rule-field" style="cursor: pointer; font-size: 16px">парвила заполнения полей</span></span>',
                                                    background: '#dc3545',
                                                    position: 'top-end',
                                                    showConfirmButton: false,
                                                    onBeforeOpen: function () {
                                                        $(document).on('click', '.rule-field', function () {
                                                            Swal.fire({
                                                                title: 'Правила заполнения полей формы "Регистрация"',
                                                                position: 'top',
                                                                html:
                                                                    '<h3>Шаг 1:</h3>\n' +
                                                                    '<ul class="text-left" style="list-style: none"> \n' +
                                                                    ' <li><span style="font-size: 16px " class="badge badge-danger">"Фамилия Имя Отчество"</span> - длина от 6 символов, необходимо указать поную фамилию, имя и отчество, например: "Иванов Иван Иванович, Петов Петр Петрович"</li>\n' +
                                                                    ' <li><span style="font-size: 16px " class="badge badge-danger">"Email"</span> - от 9 до 32 символов, необходимо указать достовернный электронный адрес, например: "example@mail.ru, example@gmail.com"</li>\n' +
                                                                    ' <li><span style="font-size: 16px " class="badge badge-danger">"Логин"</span> - от 3 до 32 символов, латинские строчные и заглавные буквы, цифры, тире(-) и нижнее подчеркивание(_), например: "login, login1, Login1, login-1, login_1"</li>\n' +
                                                                    ' <li><span style="font-size: 16px " class="badge badge-danger">"Пароль"</span> - от 6 до 32 символов, цифры, латинские строчные и заглавные буквы, например: "password, password1, Password111"</li>\n' +
                                                                    '</ul>',
                                                                confirmButtonColor: '#dc3545'
                                                            });
                                                        });
                                                    }
                                                });
                                            }
                                        });
                                    }
                                });
                                //$('.modal-holder').append(data);

                            }
                        })
                    });

                    company_handler.on('click', '.employee-settings', function (event) {
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
                    company_handler.on('click', '.option-close', function (event) {
                        let target = $(event.target);
                        target.parents('.option-holder').hide();
                        target.parents('.option-holder').prevAll('.fa-cog').show()
                    });

                    company_handler.on('click', '.menu-button', function (e) {
                        let id = $(e.target).next().val();
                        let target = $(e.target).attr('data-target');
                        let action = $(e.target).attr('data-action');
                        let menu = $(e.target).parents('.option-holder');
                        console.log('id = ' + id + ', target = ' + target + ', action = ' + target+'_'+action);
                        if(target === 'modal'){
                            $.ajax({
                                url: '/'+target+'/' + action,
                                data: {id: id},
                                method: 'post',
                                dataType: 'html',
                                success: function (data) {
                                    Swal.fire({
                                        html: data,
                                        position: 'center',
                                        width: '30rem',
                                        padding: '0',
                                        background: 'transparent',
                                        closeButtonHtml: '<button style="color: #fff" type="button" class="btn remove-modal btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>',
                                        showCloseButton: true,
                                        showCancelButton: false,
                                        showConfirmButton: false,
                                        onBeforeOpen: function (e) {
                                            $(document).on('click', '.activate-company', function (e) {
                                                let id =  $(e.target).next().val();
                                                let company_code = $('.company-code').val();
                                                let company_comment = $('#company-comment').val();
                                                $.ajax({
                                                    url: '/company/activate_company',
                                                    data: {id: id, code: company_code, comment: company_comment},
                                                    method: 'post',
                                                    dataType: 'json',
                                                    success: function (data) {
                                                        if(!data.error){
                                                            let target = $(e.target);
                                                            let parent = target.parents('.modal-close');
                                                            $(parent).remove();
                                                            let tr_list = $('tr');
                                                            $.each(tr_list, function (key, item) {
                                                                let hidden_id = $(item).find('td[hidden]').children().val();
                                                                if(id === hidden_id){
                                                                    $.ajax({
                                                                        url: '/company/update_table_row',
                                                                        data: {id: id},
                                                                        method: 'post',
                                                                        dataType: 'html',
                                                                        success: function (data) {
                                                                            $(item).replaceWith(data);
                                                                            Swal.fire({
                                                                                toast: true,
                                                                                timer: 3000,
                                                                                html: '<span style="color: #fff; font-weight: 700">Компания успешно активирована!</span>',
                                                                                background: '#28a745',
                                                                                position: 'top-end',
                                                                                showConfirmButton: false
                                                                            });
                                                                        }
                                                                    })
                                                                    /*$($(item).find('td')[2]).text(company_code);
                                                                    $($(item).find('td')[3]).text(company_comment);
                                                                    $($(item).find('td')[4]).text('Активирована');*/
                                                                }
                                                            })

                                                        }
                                                    }
                                                })
                                            })
                                        }
                                    });
                                }
                            });
                        }
                        else{
                            $.ajax({
                                url: '/'+target+'/' + action+'_'+target,
                                method: 'post',
                                data: {id: id},
                                dataType: 'json',
                                success: function (data) {
                                    switch (action) {
                                        case 'delete':
                                            remove_row(id);
                                            if($('tr').length === 1){
                                                $('table').remove();
                                                $('.company-card').append('<h1 style="display: none" class="table-replace-text">Список компаний пуст. Добавьте новую компанию.</h1>');
                                                $('.table-replace-text').fadeIn(300);
                                            }
                                            Swal.fire({
                                                toast: true,
                                                timer: 3000,
                                                html: '<span style="color: #fff; font-weight: 700">Компания удалена!</span>',
                                                background: '#dc3545',
                                                target: '.popup-handler',
                                                position: 'top-end',
                                                showConfirmButton: false
                                            });
                                            break;
                                        case 'block':
                                            let block_msg = '<span style="color: #fff; font-weight: 700">Компания заблокирована!</span>'
                                            update_table_row(e, id, block_msg, '#dc3545', '/company/update_table_row');
                                            break;
                                        case 'unlock':
                                            let unlock_msg = '<span style="color: #fff; font-weight: 700">Компания разблокирована!</span>'
                                            update_table_row(e, id, unlock_msg, '#28a745', '/company/update_table_row');
                                            break;
                                        case 'deactivate':
                                            let deactivate_msg = '<span style="color: #fff; font-weight: 700">Компания деактивирована!</span>'
                                            update_table_row(e, id, deactivate_msg, '#dc3545', '/company/update_table_row');
                                            break;
                                    }
                                }
                            });
                        }
                        menu.prev().prev().attr('data-toggle', 'close');
                        menu.hide();
                    });
                    company_handler.on('click', '.sort-button', function (e) {
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
                    company_handler.on('input', '.filter-input', function (e) {
                        let input = e.target;
                        let sort_type = $('.filter-type').val();
                        let head_row_list = $('table thead tr');
                        let body_row_list = $('table tbody tr');
                        let head_column_list = head_row_list.children();
                        let body_column_list = body_row_list.children();
                        let paginate_button = $('.index-button');
                        let show_count = 0;
                        let column_number = 0;
                        console.log(sort_type+' '+head_row_list+' '+body_row_list+' '+head_column_list+' '+body_column_list+' '+paginate_button)
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
                    company_handler.on('change', '.filter-type', function (e) {
                        $('.filter-input').val('')
                    })
                })
            </script>
        </div>
    </div>
<?php endif;?>
