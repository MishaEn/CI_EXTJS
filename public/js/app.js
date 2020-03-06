function valid_field(field, option = null) {
    let message = 'success';
    let error_flag = false;
    if(field === ''){
        message = 'Поле не может быть пустым';
        error_flag = true;
        return {message: message, error: error_flag};
    }
    if(option.min_length){
        if(field.length < option.min_length){

            message = 'Не менее '+option.min_length+' символов';
            error_flag = true;

            return {message: message, error: error_flag};
        }
    }
    if(option.max_length){
        if(field.length > option.max_length){

            message = 'Не более '+option.max_length+' символов';
            error_flag = true;

            return {message: message, error: error_flag};
        }
    }
    if(option.regexp){
        if(!option.regexp.test(field)){
            message = 'Некорректное значение поля';
            error_flag = true;
            return {message: message, error: error_flag, input: field};
        }
    }
    return {message: message, error: error_flag};
}
function form_reaction(valid_status){
    $.each(valid_status, function (key, item) {
        if(item.valid.error){
            field_reaction(item.field, item.valid.message, item.valid.error);
        }
    })
}
function field_reaction(field, message, error) {
    let icon = $(field.next()).children().children();
    if(error){
        field.css({
            'border-color': '#dc3545',
            'text-decoration': 'none'
        });
        field.next().children().css('border-color', '#dc3545');
        field.addClass('placeholder-color');
        field.val('');
        field.attr('placeholder', message);

        icon.attr('class','fas fa-exclamation-triangle');
        icon.css({
            color: '#dc3545'
        })
    }
    else{
/*        field.css({
            'border-color': '#00bb32'
        });
        field.next().children().css('border-color', '#00bb32');
        field.attr('class','fas fa-check');
        field.css({
            color: '#00bb32'
        })*/


        field.css({
            'border-color': '#00bb32',
            'text-decoration': 'none'
        });
        field.next().children().css('border-color', '#00bb32');
        field.addClass('placeholder-color');

        icon.attr('class','fas fa-check');
        icon.css({
            color: '#00bb32'
        })
    }
}
function create_modal_message(html){
    Swal.fire({
        title: 'Обратите внимание!',
        position: 'top',
        html: html,
        width: '45%',
        confirmButtonColor: '#dc3545'
    });
}

function remove_row(id) {
    let tr_list = $('tr');
    $.each(tr_list, function (key, item) {
        let hidden_id = $(item).find('td[hidden]').children().val();
        if(id === hidden_id){
            $(item).remove();
        }
    })
}

function update_table_row(e, id, html, color, url){
    let target = $(e.target);
    let parent = target.parents('.modal-close');
    $(parent).remove();
    let tr_list = $('tr');
    $.each(tr_list, function (key, item) {
        let hidden_id = $(item).find('td[hidden]').children().val();
        if (id === hidden_id) {
            $.ajax({
                url: url,
                data: {id: id},
                method: 'post',
                dataType: 'html',
                success: function (data) {
                    $(item).replaceWith(data);
                    Swal.fire({
                        toast: true,
                        timer: 3000,
                        html: html,
                        target: '.popup-handler',
                        padding: '0.5rem',
                        animation: false,
                        customClass: 'animated fadeInRight faster',
/*                        showClass: {popup: 'animated fadeInDown faster'},
                        hideClass: {popup: 'animated fadeOutUp faster'},*/
                        background: color,
                        position: 'top-end',
                        showConfirmButton: false
                    });
                }
            });
        }
    })
}


/*----------------*/
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
    let company_handler = $('.company');
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
    /*company_handler.on('click', '.pseudo-link', modal_link_handler);*/
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

    company_handler.on('click', '.create-company', function (e) {
        $.ajax({
            url: '/modal/get_create_company',
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

    company_handler.on('click', '.company-settings', function (event) {
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
    company_handler.on('click', '.tab-btn-dis', function (e) {
        $('.tab-btn').removeClass('tab-btn').addClass('tab-btn-dis').attr('data-status', 'disabled');
        $(this).removeClass('tab-btn-dis').addClass('tab-btn').attr('data-status', 'active');
        let panel_name = $(this).attr('data-tab-name');
        $('[data-panel-status ="active"]').fadeOut(100, function () {
            $('[data-panel-status ="active"]').attr('data-panel-status', 'disabled');
            $('[data-panel-name="'+panel_name+'"]').fadeIn(100, function f() {
                $(this).attr('data-panel-status', 'active');
            })
        });
    });
    $(document).on('click', '.pseudo-link', function (e){
        let controller = $(e.target).attr('data-modal');
        let action = $(e.target).attr('data-action');
        let data = $(e.target).attr('data-data');
        console.log();
        $.ajax({
            url: '/'+controller+'/'+action,
            method: 'post',
            dataType: 'html',
            data: {id: data},
            success: function (data) {
                Swal.fire({
                    html: data,
                    background: 'rgba(0,0,0,0)',
                    position: 'top',
                    showCloseButton: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                    onBeforeOpen: () =>     {
                        if(action === 'update'){
                            if($('.organization-name').val().trim().substr(0, 3) === 'ООО'){
                                $('.inn-kpp').mask('9999999999?/999999999');
                            }
                            else{
                                $('.inn-kpp').mask('999999999999');
                            }
                            $('.ogrn').mask('9999999999999');
                            $('.settlement-account').mask('99999999999999999999');
                            $('.correction-account').mask('99999999999999999999');
                            $('.bik').mask('999999999');
                            $('.okpo').mask('99999999');
                        }
                        $('button[data-card-widget="remove"]').on('click', function (e) {
                            Swal.close();
                        });
                    }
                })
            }
        })
    })
});

function modal_link_handler() {

}