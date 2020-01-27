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

        if(!option.regexp.exec(field)){
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
            'border-color': '#dc3545'
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
        field.css({
            'border-color': '#00bb32'
        });
        field.next().children().css('border-color', '#00bb32');
        field.attr('class','fas fa-check');
        field.css({
            color: '#00bb32'
        })
    }
}



let app_handler = $('.handler');

/*app_handler.on('click', '.fa-times', function (e) {
    clear_field(e.target);
});*/
app_handler.on('click', '.modal-link', modal_link_handler);
$(window).resize(function () {
    let modal_list = $('[data-type]');
    let content_width = $('.content-wrapper').width()-82;
    let content_height = $('.content-wrapper').height();
    let sidebar_width = $('.sidebar').width()+20;
    let header_width = $('.main-header').height()+20;
    $.each(modal_list, function (key, item) {
        $(item).draggable( "option", "containment",  [sidebar_width, header_width, content_width, content_height]);
    })
});



function parse_authentication_error(data) {
    if(data.error){
        if(data.status === 'authorization user not exist'){
            get_login_module();
        }
    }
    else{
        get_app_module();
    }
}


function get_register_module() {
    $.ajax({
        url: '/app/get_module_register',
        method: 'POST',
        dataType: 'html',
        success: load_register
    })
}

function parse_authentification_response(data) {
    let login = $('.login');
    let password = $('.password');
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
                field_reaction(login, 'Не правиьный логин', data.error);
                field_reaction(password,'Не правильный пароль', data.error);
                break;
            case 'unexpected error':
                login.val('');
                password.val('');
                field_reaction(login, 'Неожиданная ошибка', data.error);
                field_reaction(password, 'Неожиданная ошибка', data.error);
                break;
            case 'something wrong':
                login.val('');
                password.val('');
                field_reaction(login, 'Что-то пошло не так', data.error);
                field_reaction(password, 'Что-то пошло не так', data.error);
                break;
            case 'wrong login or password':
                field_reaction(login, 'Не правильный логин', data.error);
                field_reaction(password, 'Не правильный пароль', data.error);
                break;
        }
    }
    else{
        field_reaction(login, 'success', data.error);
        field_reaction(password, 'success', data.error);
        check_authorization();
    }
}

function load_login(login_html){
    clear_app_handler();
    $('body').removeClass('app-page').addClass('login-page');
    app_handler.append(login_html);
    $('.login-box').fadeIn(500);
}
function load_register(register_html) {
    $('.dropdown-settings').removeClass('dropdown-open').addClass('dropdown-close');
    app_handler.append(register_html);
    $('.login-box').fadeOut(300, function () {
        $('.login-box').remove();
        $('.register-box').fadeIn(300);

    })
}
function load_app(app_html){
    $.ajax({
        url: '/company',
        method: 'POST',
        dataType: 'html',
        success: load_company
    });
    $('.login-box').remove();
    $('body').removeClass('login-page').addClass('app-page');
    $('.handler').append(app_html);
    $('.wrapper').show();

}
function load_modal(modal_html, modal_type, id) {

}
/*function load_company(company_html) {
    $('.content').append(company_html);
    $('.submodule_title').text('Компании')
}*/


function valid_group_field(data) {
    let valid_result = {};
    $.each(data.field, function (key, item) {
        let class_key = flip_line(key);
        let valid_option = {};
        let valid_status = valid_field(item, data.option[key]);
        if(valid_status.error_flag){
            valid_result[class_key] = true
        }
        field_reaction($('.'+class_key), valid_status.message, valid_status.error_flag)
    });
    return valid_result;
}

function valid_login_form(login, password) {
    let login_valid_status = valid_field(login, {type: 'string', min_length: '5', max_length: '15'});
    let password_valid_status = valid_field(password, {type: 'string', min_length: '5', max_length: '15'});
    return {login_status: login_valid_status, password_status: password_valid_status}
}
function parse_login_form_error(status) {
    field_reaction(status.login_status.input, status.login_status.message, status.login_status.error_flag);
    field_reaction(status.password_status.input, status.password_status.message, status.password_status.error_flag);
}
function submit_login_handler(event){
    event.preventDefault();
    let login_input = $('.login');
    let password_input = $('.password');
    let login_val = login_input.val().trim();
    let password_val = password_input.val().trim();

    let login_valid_status = valid_field(login_input, {type: 'string', min_length: '5', max_length: '15'});
    let password_valid_status = valid_field(password_input, {type: 'string', min_length: '5', max_length: '15'});

    let valid_status = valid_login_form(login_input, password_input);

    if(!valid_status.login_status.error_flag && !valid_status.password_status.error_flag){
        let message = '';
        $.ajax({
            url: '/app/authentication',
            method: 'POST',
            dataType: 'json',
            data: {'login': login_val, 'password': password_val},
            success: parse_authentification_response
        })
    }
    else{
        parse_login_form_error(valid_status)
    }
}
$(document).on('click', '.remove-modal', function (e) {
    let target = $(e.target);
    let parent = target.parents('.modal-close');
    $(parent).remove();
});
function login_settings_handler(event) {
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
}

function modal_link_handler(event) {
    event.preventDefault();
    let id = $(event.target).next().val();
    let modal_type = $(event.target).attr('data-modal');
    let url = '/modal/get_modal_'+modal_type;
    $.ajax({
        url: url,
        method: 'POST',
        data: {id: id},
        dataType: 'html',
        success: function (modal_html) {
            let type_list = $("div[data-modal-type="+'"'+modal_type+'"]');
            let number;
            let modal = $(modal_html)[0];
            let error_modal = false;
            if($("div[data-modal-number]").length>0) {
                if(type_list.length>0){
                    $.each(type_list, function (key, item) {
                        if($(item).children('input').val() === id){
                            error_modal = true;
                        }
                    })
                }
                number = $('div[data-modal-number]').length + 1;
            }
            else{
                number = 1;
            }
            if(!error_modal){
                let content_width = $('.content-wrapper').width()-82;
                let content_height = $('.content-wrapper').height();
                let sidebar_width = $('.sidebar').width()+20;
                let header_width = $('.main-header').height()+20+$('.content-header').height();

                $(modal).attr('data-modal-number', number);
                $('.modal-holder').append(modal);
                $(modal).draggable({
                    "containment": [sidebar_width, header_width, content_width, content_height],
                    create: function () {
                        $('div[data-type="modal"]').on('click', '.tab-button', function (e) {
                            let target = e.target;
                            let tab_button = $(target).parent().parent().children();
                            let content = $(target).attr('data-tab-name');
                            let tab_content = $($(tab_button).parent().parent()).next().children();
                            $.each(tab_button, function (key, item) {
                                let button = $($(item).children());
                                if(button.attr('data-tab-name') === content){
                                    if(!button.hasClass('tab-active')){
                                        $('.tab-active').removeClass('tab-active');
                                        button.addClass('tab-active')
                                    }
                                }
                            });

                            $.each(tab_content, function (key, item) {
                                if($(item).attr('data-tab-content-name') === content){

                                    $(item).show();
                                }
                                else{
                                    $(item).hide();
                                }
                            })
                        });
                        
                    }
                });
                $(modal).on('removed.lte.cardwidget', function () {
                    let modal_list = $('[data-modal-number]');
                    $.each(modal_list, function (key, item) {
                        if($(modal).attr('data-modal-number')<$(item).attr('data-modal-number')){
                            $(item).attr('data-modal-number', $(item).attr('data-modal-number')-1)
                        }
                    });
                    $(modal).remove();
                })
            }
        }
    })
}


function add_cross_input(field){
    let icon = $($(field).next()).children().children();
    $(icon).attr('class','fas fa-times');
}

function back_to_login_handler(){
    get_login_module();
}

function parse_input_error(field, message){
    let input = $('.'+field);
    input.css({
        'border-color': '#dc3545'
    });
    input.addClass('placeholder-color');
    input.val('');
    input.attr('placeholder', message);
}

function flip_line(field){
    return field.replace(/_/g,"-")
}



function clear_app_handler(){
    app_handler.empty();
}


app_handler.on('focus', 'input', focus_border_handler);
app_handler.on('focusout', 'input', function (event) {
    $(event.target).css('border-color', '#ced4da');
    $($(event.target).next().children()).css('border-color', '#ced4da')
});


function focus_border_handler(event) {
    $(event.target).removeClass('placeholder-color');
    $(event.target).attr('placeholder');
    $(event.target).css('border-color', '#dc3545');
    $($(event.target).next().children()).css('border-color', '#dc3545')
}

function create_modal_message(html){
    Swal.fire({
        title: 'Обратите внимание!',
        position: 'top',
        html: html,
        confirmButtonColor: '#dc3545'
    });
}

function create_popup_message(html){
    Swal.fire({
        toast: true,
        timer: 3000,
        html: html,
        background: '#dc3545',
        position: 'top-end',
        showConfirmButton: false
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
});