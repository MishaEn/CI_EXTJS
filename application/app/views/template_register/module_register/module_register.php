<div class="register-box" style="margin-top: 5vh;">
    <div class="card">
        <div class="card-header" style="background: #dc3545">
            <div class="row">
                <div class="col-10">
                    <img src="/public/img/top_logo.png" alt="">
                </div>
                <div class="col-2 text-right">
                    <i class="fa fa-arrow-left  back-to-login"></i>
                </div>
            </div>
        </div>
        <div class="card-body register-card-body">
            <h3 class="login-box-msg">Регистрация</h3>
            <p class="step-title">Шаг 1: Личные данные</p>
            <div class="first-step">
                <form>
                    <!--                    <div class="input-group mb-3">
                                            <input type="text" class="form-control organization-name" data-placeholder ="  placeholder="Название организации">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas"></span>
                                                </div>
                                            </div>
                                        </div>-->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control full-name" data-placeholder ="Фамилия Имя Отчество"  placeholder="Фамилия Имя Отчество" value="Иванов Иван Иванович">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control email" data-placeholder ="Email"  placeholder="Email" value="mishaen@gmail.com">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control login" data-placeholder ="Логин"  placeholder="Логин" value="mishaen">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas  fa-user-secret"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control password" data-placeholder ="Пароль"  placeholder="Пароль" value="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control confirm-password" data-placeholder ="Подтверждение пароля"  placeholder="Подтверждение пароля" value="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-check"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <button type="button" class="btn btn-block submit-skip btn-default btn-block" style="color: #b1b1b1">Пропустить</button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-block submit button-next btn-primary btn-block">Далее</button>
                        </div>

                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <div class="second-step" style="display: none">
                <form action="">
                    <div class="row">
                        <div class="col-2">
                            <div class="input-group mb-3">
                                <select class="custom-select type">
                                    <option>ООО</option>
                                    <option>ИП</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control organization-name" data-placeholder ="Название организации"  placeholder="Название организации" value="Рога и копыта">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control director-name" data-placeholder ="ФИО руководителя"  placeholder="ФИО руководителя" value="Иванов Иван Иванович">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control inn-kpp" data-placeholder ="ИНН"  placeholder="ИНН" value="1234567890/123456789">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control ogrn" data-placeholder ="ОГРН"  placeholder="ОГРН" value="1234567890123">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control juridical-address" data-placeholder ="Адрес юредический"  placeholder="Адрес юредический" value="ул. Пушкина, д. Колотушкина">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control postal-address" data-placeholder ="Адрес почтовый"  placeholder="Адрес почтовый" value="ул. Пушкина, д. Колотушкина">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control settlement-account" data-placeholder ="Расчетные счет"  placeholder="Расчетные счет" value="12345678901234567890">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control bank-name" data-placeholder ="Наименование банка"  placeholder="Наименование банка" value="Банк">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control correction-account" data-placeholder ="Корреспондентский счет"  placeholder="Корреспондентский счет" value="12345678901234567890">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control bik" data-placeholder ="БИК"  placeholder="БИК" value="999999999">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control okpo" data-placeholder ="ОКПО"  placeholder="ОКПО" value="12345678">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="button" class="btn btn-block button-back btn-secondary btn-block">Назад</button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-block submit button-next btn-primary btn-block">Далее</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="third-step" style="display: none">
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control shop_name"  data-placeholder ="Название магазина"  placeholder="Название магазина">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control director-email"  data-placeholder ="Email руководителя"  placeholder="Email руководителя">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control director-phone" data-placeholder ="Телефон руководителя"  placeholder="Телефон руководителя">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control shop-address" data-placeholder ="Адрес магазина"  placeholder="Адрес магазина">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control work-time" data-placeholder ="Режим работы"  placeholder="Режим работы">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control shop-email" data-placeholder ="Email магазина"  placeholder="Email магазина">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control shop-phone" data-placeholder ="Телефон магазина"  placeholder="Телефон магазина">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="button" class="btn btn-block button-back btn-secondary btn-block">Назад</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-block submit submit-register btn-primary btn-block">Регистрация</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <span class="badge badge-primary rule-field" hidden style="cursor: pointer; font-size: 16px">парвила заполнения полей</span>
    </div>
    <script>
        function set_mask(){
            $('.inn-kpp').mask('999999999?/9999999999');
            $('.ogrn').mask('9999999999999');
            $('.settlement-account').mask('99999999999999999999');
            $('.correction-account').mask('99999999999999999999');
            $('.bik').mask('999999999');
            $('.okpo').mask('99999999');
        }

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
                register_handler.on('input', '.director-name', function (e) {
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
        $(document).ready(function () {
            let pre_register_msg = '<div class=text-left>\n' +
                '<p>Для активации Вашей учетной записи необходимо выполнить три шага регистрации:</p>\n' +
                '                <ul style="list-style:  none">\n' +
                '                    <li>Шаг 1: Заполненние личной инфорации о директоре</li>\n' +
                '                    <li>Шаг 2: Заполненние инфорации об организации</li>\n' +
                '                    <li>Шаг 3: Заполненние инфорации о магазине</li>\n' +
                '                </ul>\n' +
                '                <p>Вы можете попустить шаг 2 и шаг 3 нажав на кнопку "Пропустить" под формой ввода личных данных</p>\n' +
                '                <p>В случае пропуска Ваша учетная запись не будет активирована!</p>\n' +
                '<div class=text-left>';
            set_mask();
            create_modal_message(pre_register_msg);
            let register_handler = $('.register-box');
/*
            register_handler.on('change', '.type', change_register_form_handler);
            register_handler.on('focus', 'input',  focus_border_handler);
            register_handler.on('click', '.button-next', pagination_next_button_handler);
            register_handler.on('click', '.button-back', pagination_back_button_handler);*/
            register_handler.on('click', '.back-to-login', function (e) {
                document.location.href = '/login';
            });
            register_handler.on('click', '.submit-skip', function (e) {
                let full_name = $('.full-name');
                let email = $('.email');
                let login = $('.login');
                let password = $('.password');
                let confirm_password = $('.confirm-password');
                let form =
                {
                    full_name: {field: full_name, value: full_name.val().trim()},
                    email: {field: email, value: email.val().trim()},
                    login: {field: login, value: login.val().trim()},
                    password: {field: password, value: password.val().trim()},
                    confirm_password: {field: confirm_password, value: confirm_password.val().trim()}
                };
                if(form.confirm_password.value !== form.password.value){
                    field_reaction(form.password.field, 'Пароли не совпадают', true);
                    field_reaction(form.confirm_password.field, 'Пароли не совпадают', true);
                    Swal.fire({
                        toast: true,
                        timer: 3000,
                        html: '<span style="color: #fff; font-weight: 700">Проверьте, совпадают ли введенные Вами пароли</span>',
                        background: '#dc3545',
                        position: 'top-end',
                        showConfirmButton: false
                    });
                }
                else{
                    field_reaction(form.password.field, 'Пароли не совпадают', false);
                    field_reaction(form.confirm_password.field, 'Пароли не совпадают', false);
                    let valid_result =
                    {
                        full_name: {valid: valid_field(form.full_name.value, {type: 'string', min_length: '5', regexp: /^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}$/}), field: form.full_name.field},
                        email: {valid: valid_field(form.email.value, {type: 'string', min_length: '6', max_length: 254, regexp: /^([a-z0-9_\.-]+\@[\da-z\.-]+\.[a-z\.]{2,6})$/}), field: form.email.field},
                        login: {valid: valid_field(form.login.value, {type: 'string', min_length: '3', max_length: '32', regexp: /^([a-z]|[A-Z][a-z]|[A-Z])+([-_]?[a-z0-9]+){0,2}$/}), field: form.login.field},
                        password: {valid: valid_field(form.password.value, {type: 'string', min_length: '6', max_length: '32', regexp: /^([a-z]|[A-Z][a-z]|[A-Z])+([-_]?[a-z0-9]+){0,2}$/}), field: form.password.field}
                    };
                    let error = false;
                    $.each(valid_result, function (key, item) {
                        if(item.valid.error){
                            if(key === 'full_name'){
                                field_reaction(item.field, 'Некореектное ФИО', item.valid.error);
                            }
                            else{
                                field_reaction(item.field, item.valid.message, item.valid.error);
                            }
                            error = true;
                        }
                        else{
                            field_reaction(item.field, item.valid.message, item.valid.error);
                        }
                    });
                    if(!error){
                        Swal.fire({
                            title: 'Вы уверены?',
                            text: "При прпопуске следующих шагов Ваш аккаунт не будет активирован",
                            cancelButtonText: 'Назад',
                            showCancelButton: true,
                            confirmButtonColor: '#dc3545',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Регистрация'
                        }).then((result) => {
                            if (result.value) {
                                $.ajax({
                                     url: '/register/add_user',
                                    method: 'POST',
                                    dataType: 'json',
                                    data: {
                                        full_name: form.full_name.value,
                                        email: form.email.value,
                                        login: form.login.value,
                                        password: form.password.value
                                    },
                                    success: function (data) {
                                        if (!data.error) {
                                            document.location.href = '/login';
                                        }
                                        else{
                                            switch (data.status) {
                                                case 'valid error':
                                                    $.each(data.field, function(key, item){
                                                        let message = '';
                                                        switch (item.status) {
                                                            case 'field empty':
                                                                message = 'Поле не может быть пустым';
                                                                break;
                                                            case 'min length error':
                                                                message = 'Не достаточная длина';
                                                                break;
                                                            case 'max length error':
                                                                message = 'Превышена макисмальная длина';
                                                                break;
                                                        }
                                                        console.log(item)
                                                        field_reaction($('.'+key), message, item.error);
                                                    });
                                                    break;
                                                case 'something wrong':
                                                    Swal.fire({
                                                        toast: true,
                                                        timer: 3000,
                                                        html: '<span style="color: #fff; font-weight: 700">Что-то пошло не так, повторите попытку</span>',
                                                        background: '#dc3545',
                                                        position: 'top-end',
                                                        showConfirmButton: false
                                                    });
                                                    break;
                                                case 'login exist':
                                                    field_reaction($('.login'), 'Такой логин уже существует', true);
                                                    break;
                                                case 'email exist':
                                                    field_reaction($('.email'), 'Такой email уже существует', true);
                                                    break;
                                                case 'login and email exist':
                                                    field_reaction($('.login'), 'Такой логин уже существует', true);
                                                    field_reaction($('.email'), 'Такой email уже существует', true);
                                            }
                                        }
                                    }
                                });
                            }
                        });
                    }
                    else{
                        Swal.fire({
                            toast: true,
                            timer: 10000,
                            html: '<span style="color: #fff; font-weight: 700">Возникли проблемы при заполнении формы? Прочтите <span class="badge badge-primary rule-field" style="cursor: pointer; font-size: 16px">парвила заполнения полей</span></span>',
                            background: '#dc3545',
                            position: 'top-end',
                            showConfirmButton: false,
                            onBeforeOpen: function () {
                                $(document).on('click', '.rule-field', function (e) {
                                    Swal.fire({
                                        title: 'Правила заполнения полей формы "Регистрация"',
                                        position: 'top',
                                        html:
                                            '<h3>Шаг 1:</h3>\n' +
                                            '<ul class="text-left" style="list-style: none"> \n' +
                                            ' <li><span style="font-size: 16px " class="badge badge-danger">"Фамилия Имя Отчество"</span> - длина от 5 символов, необходимо указать поную фамилию, имя и отчество, например: "Иванов Иван Иванович, Петов Петр Петрович"</li>\n' +
                                            ' <li><span style="font-size: 16px " class="badge badge-danger">"Email"</span> - от 9 до 32 символов, необходимо указать достовернный электронный адрес, например: "example@mail.ru, example@gmail.com"</li>\n' +
                                            ' <li><span style="font-size: 16px " class="badge badge-danger">"Логин"</span> - от 3 до 32 символов, латинские строчные и заглавные буквы, цифры, тире(-) и нижнее подчеркивание(_), например: "login, login1, Login1, login-1, login_1"</li>\n' +
                                            ' <li><span style="font-size: 16px " class="badge badge-danger">"Пароль"</span> - от 6 до 32 символов, цифры, латинские строчные и заглавные буквы, например: "password, password1, Password111"</li>\n' +
                                            '</ul>',
                                        confirmButtonColor: '#dc3545'
                                    });
                                });
                            }
                        })
                    }
                }
                e.preventDefault();
            });
            register_handler.on('click', '.submit-register', full_register);
        });
        function valid_register_form(field){
            let valid_result = {};
            $.each(field, function (key, item) {
                let class_key = flip_line(key);
                let valid_option = {};
                switch (key) {
                    case 'confirm_password':
                        valid_option = {type: 'string', min_length: 6, max_length: 32, regexp: /(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])|(?=.*[0-9])(?=.*[A-Z])|(?=.*[0-9])(?=.*[a-z])|(?=.*[0-9])|(?=.*[a-z])|(?=.*[A-Z]){6,}/g};
                        break;
                    case 'full_name':
                        valid_option = {type: 'string', min_length: 5, max_length: 255, regexp: /^.+\s.+\s.+\s?.*$/};
                        break;
                    case 'login':
                        valid_option = {type: 'string', min_length: 3, max_length: 32,regexp: /^[a-zA-Z][a-zA-Z0-9-_\.]{3,32}$/};
                        break;
                    case 'email':
                        valid_option = {type: 'string', min_length: 9, max_length: 32, regexp: /^(?!.*@.*@.*$)(?!.*@.*\-\-.*\..*$)(?!.*@.*\-\..*$)(?!.*@.*\-$)(.*@.+(\..{1,11})?)$/};
                        break;
                    case 'password':
                        valid_option = {type: 'string', min_length: 6, max_length: 32, regexp: /(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])|(?=.*[0-9])(?=.*[A-Z])|(?=.*[0-9])(?=.*[a-z])|(?=.*[0-9])|(?=.*[a-z])|(?=.*[A-Z]){6,}/g};
                        break;
                }
                let valid_status = valid_field(item, valid_option);
                if(valid_status.error_flag){
                    valid_result[class_key] = true
                }
                field_reaction($('.'+class_key), valid_status.message, valid_status.error_flag)
            });
            return valid_result;
        }


        function pagination_next_button_handler(event){
            if($($(event.target).parents()[3]).hasClass('first-step')){
                let full_name = $('.full-name');
                let email = $('.email');
                let login = $('.login');
                let password = $('.password');
                let confirm_password = $('.confirm-password');
                if(password.val() !== confirm_password.val()){
                    field_reaction($('.password'), 'Пароли не совпадают', true);
                    field_reaction($('.confirm-password'), 'Пароли не совпадают', true);
                    let popup_msg = '<span style="color: #fff; font-weight: 700">Проверьте, совпадают ли введенные Вами пароли</span>'
                    create_popup_message(popup_msg);
                }
                else{
                    field_reaction($('.password'), 'Пароли не совпадают', false);
                    field_reaction($('.confirm-password'), 'Пароли не совпадают', false);
                    let valid_result = valid_register_form({full_name: full_name, email: email, login: login, password: password, confirm_password: confirm_password});
                    if($.isEmptyObject(valid_result)) {
                        $('.first-step').hide();
                        $('.second-step').show();
                        $('.step-title').text('Шаг 2: Данные об организации')
                    }
                    else{
                        let rule_field_first_step = '<h3>Шаг 1:</h3>\n' +
                            '<ul class="text-left" style="list-style: none"> \n' +
                            ' <li><span style="font-size: 16px " class="badge badge-danger">"Фамилия Имя Отчество"</span> - длина от 6 символов, необходимо указать поную фамилию, имя и отчество, например: "Иванов Иван Иванович, Петов Петр Петрович"</li>\n' +
                            ' <li><span style="font-size: 16px " class="badge badge-danger">"Email"</span> - от 9 до 32 символов, необходимо указать достовернный электронный адрес, например: "example@mail.ru, example@gmail.com"</li>\n' +
                            ' <li><span style="font-size: 16px " class="badge badge-danger">"Логин"</span> - от 3 до 32 символов, латинские строчные и заглавные буквы, цифры, тире(-) и нижнее подчеркивание(_), например: "login, login1, Login1, login-1, login_1"</li>\n' +
                            ' <li><span style="font-size: 16px " class="badge badge-danger">"Пароль"</span> - от 6 до 32 символов, цифры, латинские строчные и заглавные буквы, например: "password, password1, Password111"</li>\n' +
                            '</ul>';
                        Swal.fire({
                            toast: true,
                            timer: 10000,
                            html: '<span style="color: #fff; font-weight: 700">Возникли проблемы при заполнении формы? Прочтите <span class="badge badge-primary rule-field" style="cursor: pointer; font-size: 16px">парвила заполнения полей</span></span>',
                            background: '#dc3545',
                            position: 'top-end',
                            showConfirmButton: false,
                            onBeforeOpen: function () {
                                $(document).on('click', '.rule-field', function () {
                                    create_modal_message(rule_field_first_step);
                                });
                            }
                        });
                    }
                }
            }
            else if($($(event.target).parents()[3]).hasClass('second-step')){
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
                    $('.second-step').hide();
                    $('.third-step').show();
                    $('.step-title').text('Шаг 3: Данные о магазине')
                }
                else{
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
            }
        }
        function pagination_back_button_handler(event) {
            if($($(event.target).parents()[3]).hasClass('third-step')){
                $('.third-step').hide();
                $('.second-step').show();
                $('.step-title').text('Шаг 2: Данные об организации')
            }
            else if($($(event.target).parents()[3]).hasClass('second-step')){
                $('.second-step').hide();
                $('.first-step').show();
                $('.step-title').text('Шаг 1: Личные данные')
            }
        }

        function full_register(e) {
            let shop_name = $('.shop_name');
            let director_email = $('.director-email');
            let director_phone = $('.director-phone');
            let shop_address = $('.shop-address');
            let work_time = $('.work-time');
            let shop_email = $('.shop-email');
            let shop_phone = $('.shop-phone');
            let valid_result = valid_group_field({
                field: {
                    shop_name: shop_name,
                    director_email: director_email,
                    director_phone: director_phone,
                    shop_address: shop_address,
                    work_time: work_time,
                    shop_email: shop_email,
                    shop_phone: shop_phone
                },
                option: {
                    shop_name: {min_length:5, max_length:255},
                    director_email: {min_length:9, max_length:255},
                    director_phone: {min_length:11, max_length:11},
                    shop_address:   {min_length:5, max_length:255},
                    work_time:  {min_length:5, max_length:255},
                    shop_email: {min_length:9, max_length:255},
                    shop_phone: {min_length:11, max_length:11}
                }
            });
            if($.isEmptyObject(valid_result)) {
                let full_name = $('.full-name');
                let email = $('.email');
                let login = $('.login');
                let password = $('.password');
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
                if($.isEmptyObject(valid_company_result)){
                    $.ajax({
                        url: '/user/full_register',
                        method: 'POST',
                        data_type: 'json',
                        data: {
                            data: {
                                full_name: full_name.val(),
                                email: email.val(),
                                login: login.val(),
                                password: password.val(),
                                organization_name: organization_name.val(),
                                director_name: director_name.val(),
                                inn_kpp: inn_kpp.val(),
                                ogrn: ogrn.val(),
                                juridical_address: juridical_address.val(),
                                postal_address: postal_address.val(),
                                settlement_account: settlement_account.val(),
                                bank_name: bank_name.val(),
                                correction_account: correction_account.val(),
                                bik: bik.val(),
                                okpo: okpo.val(),
                                shop_name: shop_name.val(),
                                director_email: director_email.val(),
                                director_phone: director_phone.val(),
                                shop_address:   shop_address.val(),
                                work_time: work_time.val(),
                                shop_email: shop_email.val(),
                                shop_phone: shop_phone.val()
                            }
                        },
                        success: function (data) {
                            let response_data = JSON.parse(data);
                            if(!response_data.error){
                                check_authorization();
                                Swal.fire({
                                    toast: true,
                                    html: '<span style="color: #fff; font-weight: 700"> Вы успешно зарегистрировались!</span>',
                                    background: '#dc3545',
                                    timer: 3000,
                                    position: 'top-end',
                                    showConfirmButton: false
                                })
                            }
                            else{
                                switch (response_data.status) {
                                    case 'valid error':
                                        $.each(response_data.field, function (key, item) {
                                            let message = '';
                                            switch (item.status) {
                                                case 'field empty':
                                                    message = 'Поле не может быть пустым';
                                                    break;
                                                case 'min length error':
                                                    message = 'Не достаточная длина';
                                                    break;
                                                case 'max length error':
                                                    message = 'Превышена макисмальная длина';
                                                    break;
                                            }
                                            field_reaction($('.' + key), message, item.error);
                                        });
                                        break;
                                    case 'something wrong':
                                        Swal.fire({
                                            toast: true,
                                            timer: 3000,
                                            html: '<span style="color: #fff; font-weight: 700">Что-то пошло не так, повторите попытку</span>',
                                            background: '#dc3545',
                                            position: 'top-end',
                                            showConfirmButton: false
                                        });
                                        break;
                                    case 'company name exist':
                                        field_reaction($('.organization-name'), 'Организация с таким названием уже существует', true);
                                        break;
                                    case 'inn exist':
                                        field_reaction($('.inn-kpp'), 'Организация с таким ИНН/КПП уже существует', true);
                                        break;
                                    case 'ogrn exist':
                                        field_reaction($('.ogrn'), 'Организация с таким ОГРН уже существует', true);
                                        break;
                                    case 'settlement account exist':
                                        field_reaction($('.settlement-account'), 'Организация с таким счетом уже существует', true);
                                        break;
                                    case 'company name, inn, ogrn, settlement account exist':
                                        field_reaction($('.organization-name'), 'Организация с таким названием уже существует', true);
                                        field_reaction($('.inn-kpp'), 'Организация с таким ИНН/КПП уже существует', true);
                                        field_reaction($('.ogrn'), 'Организация с таким ОГРН уже существует', true);
                                        field_reaction($('.settlement-account'), 'Организация с таким счетом уже существует', true);
                                }
                            }
                        }
                    })
                }

            }
            e.preventDefault();
        }
    </script>
</div>
