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
            <div class="row">
                <div class="col-6"><p class="step-title">Шаг 1: Личные данные</p></div>
                <div class="col-6 text-right"><span class="pseudo-link help">Описание полей формы регистрации</span></div>
            </div>
            <div class="first-step" data-status="active" data-step="first">
                <form>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control full-name" data-placeholder ="Фамилия Имя Отчество"  placeholder="Фамилия Имя Отчество" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control email" data-placeholder ="Email"  placeholder="Email" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control login" data-placeholder ="Логин"  placeholder="Логин" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control password" data-placeholder ="Пароль"  placeholder="Пароль" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control confirm-password" data-placeholder ="Подтверждение пароля"  placeholder="Подтверждение пароля" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
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
                    </div>
                </form>
            </div >
            <div class="second-step" data-status="disabled" data-step="second"  style="display: none">
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
                                <input type="text" class="form-control organization-name" data-placeholder ="Название организации"  placeholder="Название организации" value="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control director-name" data-placeholder ="ФИО руководителя"  placeholder="ФИО руководителя" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control inn-kpp" data-placeholder ="ИНН"  placeholder="ИНН/КПП" value="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control ogrn" data-placeholder ="ОГРН"  placeholder="ОГРН" value="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control juridical-address" data-placeholder ="Адрес юридический"  placeholder="Адрес юридический" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control postal-address" data-placeholder ="Адрес почтовый"  placeholder="Адрес почтовый" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control settlement-account" data-placeholder ="Расчетный счет"  placeholder="Расчетные счет" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control bank-name" data-placeholder ="Наименование банка"  placeholder="Наименование банка" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control correction-account" data-placeholder ="Корреспондентский счет"  placeholder="Корреспондентский счет" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control bik" data-placeholder ="БИК"  placeholder="БИК" value="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control okpo" data-placeholder ="ОКПО"  placeholder="ОКПО" value="">
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
            <div class="third-step" data-status="disabled" data-step="third" style="display: none">
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
        <span class="badge badge-primary rule-field" hidden style="cursor: pointer; font-size: 16px">правила заполнения полей</span>
    </div>
    <script>
        /*setInterval(function () {
            let percent = $('.progress-bar').attr('aria-valuenow');
            percent = Math.random()*100;
            $('.progress-bar').attr('aria-valuenow', percent);
            $('.progress-bar').css('width', percent);
        }, 1000)*/
        function set_mask(){
            $('.inn-kpp').mask('9999999999?/999999999');
            $('.ogrn').mask('9999999999999');
            $('.settlement-account').mask('99999999999999999999');
            $('.correction-account').mask('99999999999999999999');
            $('.bik').mask('999999999');
            $('.okpo').mask('99999999');
        }

        function change_register_form_handler(e){

        }
        $(document).ready(function () {
            let pre_register_msg = '<div class=text-left>\n' +
                '<p>Для активации Вашей учетной записи необходимо выполнить три шага регистрации:</p>\n' +
                '                <ul style="list-style:  none">\n' +
                '                    <li>Шаг 1: Заполнение личной информации о директоре</li>\n' +
                '                    <li>Шаг 2: Заполнение информации об организации</li>\n' +
                '                    <li>Шаг 3: Заполнение информации о магазине</li>\n' +
                '                </ul>\n' +
                '                <p>Вы можете попустить шаг 2 и шаг 3 нажав на кнопку "Пропустить" под формой ввода личных данных</p>\n' +
                '                <p>В случае пропуска Ваша учетная запись не будет активирована!</p>\n' +
                '                <p> </p>\n' +
                '                <p>Настоятельно рекомендуем ознакомиться с описанием полей форм регистрации</p>\n' +
                '<div class=text-left>';
            set_mask();
            create_modal_message(pre_register_msg);
            let register_handler = $('.register-box');
/*

            register_handler.on('focus', 'input',  focus_border_handler);

            */
            register_handler.on('focus', 'input',  function focus_border_handler(event) {
                $(event.target).removeClass('placeholder-color');
                $(event.target).attr('placeholder', $(event.target).attr('data-placeholder'));

                $(event.target).css('border-color', '#dc3545');
                $($(event.target).next().children()).css('border-color', '#dc3545')
                $($(event.target).next().children().children().removeClass().addClass('fas'))
            });

            register_handler.on('focusout', 'input', function (event) {
                $(event.target).css('border-color', '#ced4da');
                $($(event.target).next().children()).css('border-color', '#ced4da')

            });



            register_handler.on('change', '.type', function (e) {
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
                    $('.inn-kpp').mask('9999999999?/999999999');
                    $('.ogrn').mask('9999999999999');
                    $('.okpo').val('');
                    $('.okpo').mask('99999999');
                }
            });
            register_handler.on('click', '.help', function (e) {
                let step = $('div[data-status="active"]').attr('data-step');
                let rule_field_first_step;
                switch (step) {
                    case 'first':
                        rule_field_first_step = '<h3>Шаг 1:</h3>\n' +
                            '<h4>Регистрация директора</h4>'+
                            '<ul class="text-left" style="list-style: none"> \n' +
                            ' <li><span style="font-size: 16px " class="badge badge-danger">"Фамилия Имя Отчество"</span> - длина от 6 символов, необходимо указать полную фамилию, имя и отчество, например: "Иванов Иван Иванович, Петов Петр Петрович"</li>\n' +
                            ' <li><span style="font-size: 16px " class="badge badge-danger">"Email"</span> - от 9 до 32 символов, необходимо указать достоверный электронный адрес, например: "example@mail.ru, example@gmail.com"</li>\n' +
                            ' <li><span style="font-size: 16px " class="badge badge-danger">"Логин"</span> - от 3 до 32 символов, латинские строчные и заглавные буквы, цифры, тире(-) и нижнее подчеркивание(_), например: "login, login1, Login1, login-1, login_1"</li>\n' +
                            ' <li><span style="font-size: 16px " class="badge badge-danger">"Пароль"</span> - от 6 до 32 символов, цифры, латинские строчные и заглавные буквы, например: "password, password1, Password111"</li>\n' +
                            '</ul>';
                        create_modal_message(rule_field_first_step);
                        break;
                    case 'second':
                        rule_field_first_step = '<h3>Шаг 2:</h3>' +
                            '<h4>Регистрация организации</h4>'+
                            '<ul class="text-left" style="list-style: none"> \n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Название организации"</span> - в зависимости от выбранного типа формируется название для ООО или ИП, название для ООО должно быть длиной от 2 символов, без кавычек, название для ИП формируется автоматически, исходя из ФИО руководителя, например: Рога и копыта, Иванов Иван Иванович</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"ФИО руководителя"</span> - длина от 6 символов, необходимо указать полную фамилию, имя и отчество, например: "Иванов Иван Иванович, Петов Петр Петрович"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"ИНН/КПП(ИНН)"</span> - для ООО формируется поле вида ИНН/КПП, длина ИНН - 10 символов, длина КПП - 9 символов, для ИП формируется поле ИНН длинной в 12 симвоов, например: ИНН/КПП - 1234567891/123456789, ИНН - 123456789112"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"ОГРН(ОГРНИП)"</span> - для ООО фомируется ОГРН длинной 13 символов, для ИП - 15 символов, например: ОГРН - 1234567891123, ОГРНИП - 123456789112345"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Юридический адрес"</span> - необходимо указать адрес регистрации Вашей организации или ИП, рекомендуется писать адрес в виде: область, город, улица, дом/корпус/здание, например: Ростовская область, город Ростов-на-дону, улица Ленина, дом 1; Московская обл., г. Москва, ул. Ленина, к. 1"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Почтовый адрес"</span> - необходимо указать почтовый адрес Вашей организации или ИП на который приходит корреспонденция, рекомендуется писать адрес в виде: область, город, улица, дом/корпус/здание, индекс, например: Ростовская область, город Ростов-на-дону, улица Ленина, дом 1, 111111; Московская обл., г. Москва, ул. Ленина, к. 1,  111111"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Расчетный счет"</span> - Ваш 20 символьный банковский счет для проведения банковских операций, например: 12345678911234567892"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Название банка"</span> - Название Вашего банка, например: Сбербанк, ВТБ"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Корреспондентский счет"</span> - 20 символьный счет Вашего банка, например: 12345678911234567892"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"БИК"</span> - идентификатор Вашего банка длинной в 9 символов, например: 123456789"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"ОКПО"</span> - восьми- или десятизначный номер юридического лица, например: 12345678; 1234567891"</li>\n' +
                            '</ul>';
                        create_modal_message(rule_field_first_step);
                        break;
                    case 'third':
                        rule_field_first_step = '<h3>Шаг 3:</h3>' +
                            '<h4>Регистрация магазина</h4>'+
                            '<ul class="text-left" style="list-style: none"> \n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Название магазина"</span> - минимальная длина 3 символа, например: Рога и копыта"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Email директора"</span> - актуальная почта директора мгазина, например: mail@mail.ru"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Телефон директора"</span> - восьми- или десятизначный номер юридического лица, например: 12345678; 1234567891"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Адрес магазина"</span> - восьми- или десятизначный номер юридического лица, например: 12345678; 1234567891"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Рабочее время"</span> - рабочее время магазина, рекомендуется писать в формате: рабочие дни: рабочие часы, например: пн-пт: 10-18; пн-пт: 10-18, сб: 10-17"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Email магазина"</span> - актуальная почта магазина, например: mail@mail.ru"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Телефон магазина"</span> - актуальный телефон магазина, например: 89897263140; 79897263140; +79897263140"</li>\n' +
                            '</ul>';
                        create_modal_message(rule_field_first_step);
                        break;
                }
            });
            register_handler.on('click', '.back-to-login', function (e) {
                document.location.href = '/login';
            });
            register_handler.on('click', '.button-back', function (event) {
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
            });
            register_handler.on('click', '.button-next', function (event) {
                if($($(event.target).parents()[3]).hasClass('first-step')){
                    let full_name = $('.full-name');
                    let email = $('.email');
                    let login = $('.login');
                    let password = $('.password');
                    let confirm_password = $('.confirm-password');
                    let form = {
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
                                full_name: {valid: valid_field(form.full_name.value, {type: 'string', min_length: '5', regexp: /^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}|([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}$/}), field: form.full_name.field},
                                email: {valid: valid_field(form.email.value, {type: 'string', min_length: '6', max_length: 254, regexp: /^([A-Za-z0-9_\.-]+\@[\dA-Za-z\.-]+\.[A-Za-z\.]{2,6})$/}), field: form.email.field},
                                login: {valid: valid_field(form.login.value, {type: 'string', min_length: '3', max_length: '32'}), field: form.login.field},
                                password: {valid: valid_field(form.password.value, {type: 'string', min_length: '6', max_length: '32'}), field: form.password.field}
                            };
                        let error = false;
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
                        if(error){
                            let rule_field_first_step = '<h3>Шаг 1:</h3>\n' +
                                '<h4>Регистрация директора</h4>'+
                                '<ul class="text-left" style="list-style: none"> \n' +
                                ' <li><span style="font-size: 16px " class="badge badge-danger">"Фамилия Имя Отчество"</span> - длина от 6 символов, необходимо указать полную фамилию, имя и отчество, например: "Иванов Иван Иванович, Петов Петр Петрович"</li>\n' +
                                ' <li><span style="font-size: 16px " class="badge badge-danger">"Email"</span> - от 9 до 32 символов, необходимо указать достоверный электронный адрес, например: "example@mail.ru, example@gmail.com"</li>\n' +
                                ' <li><span style="font-size: 16px " class="badge badge-danger">"Логин"</span> - от 3 до 32 символов, латинские строчные и заглавные буквы, цифры, тире(-) и нижнее подчеркивание(_), например: "login, login1, Login1, login-1, login_1"</li>\n' +
                                ' <li><span style="font-size: 16px " class="badge badge-danger">"Пароль"</span> - от 6 до 32 символов, цифры, латинские строчные и заглавные буквы, например: "password, password1, Password111"</li>\n' +
                                '</ul>';
                            Swal.fire({
                                toast: true,
                                timer: 10000,
                                html: '<span style="color: #fff; font-weight: 700">Возникли проблемы при заполнении формы? Прочтите <span class="badge badge-primary rule-field" style="cursor: pointer; font-size: 16px">правила заполнения полей</span></span>',
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
                        else{

                            $('.first-step').attr('data-status', 'disabled').hide();
                            $('.second-step').attr('data-status', 'active').show();
                            $('.step-title').text('Шаг 2: Данные об организации')
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
                    let type;
                    if($('.type').val() === 'ИП'){
                        type = 'ИП '+director_name.val().trim();
                    }
                    else{
                        type = 'ООО '+'"'+organization_name.val().trim()+'"';
                    }
                    let form = {
                        organization_name: {field: organization_name, value: type},
                        director_name: {field: director_name, value: director_name.val().trim()},
                        inn_kpp: {field: inn_kpp, value: inn_kpp.val().trim()},
                        ogrn: {field: ogrn, value: ogrn.val().trim()},
                        juridical_address: {field: juridical_address, value: juridical_address.val().trim()},
                        postal_address: {field: postal_address, value: postal_address.val().trim()},
                        settlement_account: {field: settlement_account, value: settlement_account.val().trim()},
                        bank_name: {field: bank_name, value: bank_name.val().trim()},
                        correction_account: {field: correction_account, value: correction_account.val().trim()},
                        bik: {field: bik, value: bik.val().trim()},
                        okpo: {field: okpo, value: okpo.val().trim()}
                    };
                    let error = false;
                    let valid_result = {
                        organization_name: {valid: valid_field(form.organization_name.value, {type: 'string', min_length: '2', regexp: /^(ООО\s["][A-ZА-Я0-9].+(\s.+|)["]|ООО\s[A-ZА-Я0-9].+(\s.+|)|ИП\s[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+)$/ }), field: form.organization_name.field},
                        director_name: {valid: valid_field(form.director_name.value, {type: 'string', min_length: '6', regexp: /^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}$/ }), field: form.director_name.field},
                        inn_kpp: {valid: valid_field(form.inn_kpp.value, {type: 'string', min_length: 12, max_length: 20, regexp: /^[0-9]{12}|([0-9]{10}\/[0-9]{9})$/ }), field: form.inn_kpp.field},
                        ogrn: {valid: valid_field(form.ogrn.value, {type: 'string', min_length: 13, max_length: 15, regexp: /^[0-9]{13,15}$/ }), field: form.ogrn.field},
                        juridical_address: {valid: valid_field(form.juridical_address.value, {type: 'string', min_length: '5'}), field: form.juridical_address.field},
                        postal_address: {valid: valid_field(form.postal_address.value, {type: 'string', min_length: '5'}), field: form.postal_address.field},
                        settlement_account: {valid: valid_field(form.settlement_account.value, {type: 'string', min_length: 20, max_length: 20, regexp: /^[0-9]{20}$/ }), field: form.settlement_account.field},
                        bank_name: {valid: valid_field(form.bank_name.value, {type: 'string', min_length: '2'}), field: form.bank_name.field},
                        correction_account: {valid: valid_field(form.correction_account.value, {type: 'string', min_length: 20, max_length: 20, regexp: /^[0-9]{20}$/ }), field: form.correction_account.field},
                        bik: {valid: valid_field(form.bik.value, {type: 'string', min_length: 9, max_length: 9, regexp: /^[0-9]{9}$/ }), field: form.bik.field},
                        okpo: {valid: valid_field(form.okpo.value, {type: 'string', min_length: 8, max_length: 10, regexp: /^[0-9]{8,10}$/ }), field: form.okpo.field},
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
                    if(error){
                        let rule_field_first_step = '<h3>Шаг 2:</h3>' +
                            '<h4>Регистрация организации</h4>'+
                            '<ul class="text-left" style="list-style: none"> \n' +
                            ' <li style="margin-bottom: 5px"><span style="font-size: 16px " class="badge badge-danger">"Название организации"</span> - в зависимости от выбранного типа формируется название для ООО или ИП, название для ООО должно быть длиной от 2 символов, без кавычек, название для ИП формируется автоматически, исходя из ФИО руководителя, например: Рога и копыта, Иванов Иван Иванович</li>\n' +
                            ' <li style="margin-bottom: 5px"><span style="font-size: 16px " class="badge badge-danger">"ФИО руководителя"</span> - длина от 6 символов, необходимо указать полную фамилию, имя и отчество, например: "Иванов Иван Иванович, Петов Петр Петрович"</li>\n' +
                            ' <li style="margin-bottom: 5px"><span style="font-size: 16px " class="badge badge-danger">"ИНН/КПП(ИНН)"</span> - для ООО формируется поле вида ИНН/КПП, длина ИНН - 10 символов, длина КПП - 9 символов, для ИП формируется поле ИНН длинной в 12 симвоов, например: ИНН/КПП - 1234567891/123456789, ИНН - 123456789112"</li>\n' +
                            ' <li style="margin-bottom: 5px"><span style="font-size: 16px " class="badge badge-danger">"ОГРН(ОГРНИП)"</span> - для ООО фомируется ОГРН длинной 13 символов, для ИП - 15 символов, например: ОГРН - 1234567891123, ОГРНИП - 123456789112345"</li>\n' +
                            ' <li style="margin-bottom: 5px"><span style="font-size: 16px " class="badge badge-danger">"Юридический адрес"</span> - необходимо указать адрес регистрации Вашей организации или ИП, рекомендуется писать адрес в виде: область, город, улица, дом/корпус/здание, например: Ростовская область, город Ростов-на-дону, улица Ленина, дом 1; Московская обл., г. Москва, ул. Ленина, к. 1"</li>\n' +
                            ' <li style="margin-bottom: 5px"><span style="font-size: 16px " class="badge badge-danger">"Почтовый адрес"</span> - необходимо указать почтовый адрес Вашей организации или ИП на который приходит корреспонденция, рекомендуется писать адрес в виде: область, город, улица, дом/корпус/здание, индекс, например: Ростовская область, город Ростов-на-дону, улица Ленина, дом 1, 111111; Московская обл., г. Москва, ул. Ленина, к. 1,  111111"</li>\n' +
                            ' <li style="margin-bottom: 5px"><span style="font-size: 16px " class="badge badge-danger">"Расчетный счет"</span> - Ваш 20 символьный банковский счет для проведения банковских операций, например: 12345678911234567892"</li>\n' +
                            ' <li style="margin-bottom: 5px"><span style="font-size: 16px " class="badge badge-danger">"Название банка"</span> - Название Вашего банка, например: Сбербанк, ВТБ"</li>\n' +
                            ' <li style="margin-bottom: 5px"><span style="font-size: 16px " class="badge badge-danger">"Корреспондентский счет"</span> - 20 символьный счет Вашего банка, например: 12345678911234567892"</li>\n' +
                            ' <li style="margin-bottom: 5px"><span style="font-size: 16px " class="badge badge-danger">"БИК"</span> - идентификатор Вашего банка длинной в 9 символов, например: 123456789"</li>\n' +
                            ' <li style="margin-bottom: 5px"><span style="font-size: 16px " class="badge badge-danger">"ОКПО"</span> - восьми- или десятизначный номер юридического лица, например: 12345678; 1234567891"</li>\n' +
                            '</ul>';
                        Swal.fire({
                            toast: true,
                            timer: 10000,
                            html: '<span style="color: #fff; font-weight: 700">Возникли проблемы при заполнении формы? Прочтите <span class="badge badge-primary rule-field" style="cursor: pointer; font-size: 16px">правила заполнения полей</span></span>',
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
                    else{
                        $('.second-step').attr('data-status', 'disabled').hide();
                        $('.third-step').attr('data-status', 'active').show();
                        $('.step-title').text('Шаг 3: Данные о магазине')
                    }
                }
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
                        full_name: {valid: valid_field(form.full_name.value, {type: 'string', min_length: '5', regexp: /^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}|([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}$/}), field: form.full_name.field},
                        email: {valid: valid_field(form.email.value, {type: 'string', min_length: '6', max_length: 254, regexp: /^([A-Za-z0-9_\.-]+\@[\dA-Za-z\.-]+\.[A-Za-z\.]{2,6})$/}), field: form.email.field},
                        login: {valid: valid_field(form.login.value, {type: 'string', min_length: '5', max_length: '32', regexp: /^([a-z]|[A-Z][a-z]|[A-Z])+([-_]?[a-z0-9]+){0,2}$/}), field: form.login.field},
                        password: {valid: valid_field(form.password.value, {type: 'string', min_length: '6', max_length: '32'}), field: form.password.field}
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
                            html: '<span style="color: #fff; font-weight: 700">Возникли проблемы при заполнении формы? Прочтите <span class="badge badge-primary rule-field" style="cursor: pointer; font-size: 16px">правила заполнения полей</span></span>',
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
                                            ' <li><span style="font-size: 16px " class="badge badge-danger">"Фамилия Имя Отчество"</span> - длина от 5 символов, необходимо указать полную фамилию, имя и отчество, например: "Иванов Иван Иванович, Петов Петр Петрович"</li>\n' +
                                            ' <li><span style="font-size: 16px " class="badge badge-danger">"Email"</span> - от 9 до 32 символов, необходимо указать достоверный электронный адрес, например: "example@mail.ru, example@gmail.com"</li>\n' +
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
            register_handler.on('click', '.submit-register', function (e) {
                let shop_name = $('.shop_name');
                let director_email = $('.director-email');
                let director_phone = $('.director-phone');
                let shop_address = $('.shop-address');
                let work_time = $('.work-time');
                let shop_email = $('.shop-email');
                let shop_phone = $('.shop-phone');
                let full_name = $('.full-name');
                let email = $('.email');
                let login = $('.login');
                let password = $('.password');
                let confirm_password = $('.confirm-password');
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
                let type;
                if($('.type').val() === 'ИП'){
                    type = 'ИП '+director_name.val().trim();
                }
                else{
                    type = 'ООО '+'"'+organization_name.val().trim()+'"';
                }
                let form = {
                    full_name: {field: full_name, value: full_name.val().trim(), step: 1},
                    email: {field: email, value: email.val().trim(), step: 1},
                    login: {field: login, value: login.val().trim(), step: 1},
                    password: {field: password, value: password.val().trim(), step: 1},
                    confirm_password: {field: confirm_password, value: confirm_password.val().trim(), step: 1},
                    organization_name: {field: organization_name, value: type, step: 2},
                    director_name: {field: director_name, value: director_name.val().trim(), step: 2},
                    inn_kpp: {field: inn_kpp, value: inn_kpp.val().trim(), step: 2},
                    ogrn: {field: ogrn, value: ogrn.val().trim(), step: 2},
                    juridical_address: {field: juridical_address, value: juridical_address.val().trim(), step: 2},
                    postal_address: {field: postal_address, value: postal_address.val().trim(), step: 2},
                    settlement_account: {field: settlement_account, value: settlement_account.val().trim(), step: 2},
                    bank_name: {field: bank_name, value: bank_name.val().trim(), step: 2},
                    correction_account: {field: correction_account, value: correction_account.val().trim(), step: 2},
                    bik: {field: bik, value: bik.val().trim(), step: 2},
                    okpo: {field: okpo, value: okpo.val().trim(), step: 2},
                    shop_name: {field: shop_name, value: '"'+shop_name.val().trim()+'"', step: 3},
                    director_email: {field: director_email, value: director_email.val().trim(), step: 3},
                    director_phone: {field: director_phone, value: director_phone.val().trim(), step: 3},
                    shop_address: {field: shop_address, value: shop_address.val().trim(), step: 3},
                    work_time: {field: work_time, value: work_time.val().trim(), step: 3},
                    shop_email: {field: shop_email, value: shop_email.val().trim(), step: 3},
                    shop_phone: {field: shop_phone, value: shop_phone.val().trim(), step: 3}
                };
                let error = false;
                let valid_result = {
                    full_name: {valid: valid_field(form.full_name.value, {type: 'string', min_length: '5', regexp: /^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}$/ }), field: form.full_name.field},
                    email: {valid: valid_field(form.email.value, {type: 'string', min_length: 6, max_length: 254, regexp: /^([A-Za-z0-9_\.-]+\@[\dA-Za-z\.-]+\.[A-Za-z\.]{2,6})$/}), field: form.email.field},
                    login: {valid: valid_field(form.login.value, {type: 'string', min_length: 3, max_length: 32}), field: form.login.field},
                    password: {valid: valid_field(form.password.value, {type: 'string', min_length: 6, max_length: 32}), field: form.password.field},
                    organization_name: {valid: valid_field(form.organization_name.value, {type: 'string', min_length: 2, regexp: /^(ООО\s["][A-ZА-Я0-9].+(\s.+|)["]|ИП\s[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+)$/ }), field: form.organization_name.field},
                    director_name: {valid: valid_field(form.director_name.value, {type: 'string', min_length: 6, regexp: /^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}$/ }), field: form.director_name.field},
                    inn_kpp: {valid: valid_field(form.inn_kpp.value, {type: 'string', min_length: 12, max_length: 20, regexp: /^[0-9]{12}|([0-9]{10}\/[0-9]{9})$/ }), field: form.inn_kpp.field},
                    ogrn: {valid: valid_field(form.ogrn.value, {type: 'string', min_length: 13, max_length: 15, regexp: /^[0-9]{13,15}$/ }), field: form.ogrn.field},
                    juridical_address: {valid: valid_field(form.juridical_address.value, {type: 'string', min_length: 5 }), field: form.juridical_address.field},
                    postal_address: {valid: valid_field(form.postal_address.value, {type: 'string', min_length: 5}), field: form.postal_address.field},
                    settlement_account: {valid: valid_field(form.settlement_account.value, {type: 'string', min_length: 20, max_length: 20, regexp: /^[0-9]{20}$/ }), field: form.settlement_account.field},
                    bank_name: {valid: valid_field(form.bank_name.value, {type: 'string', min_length: '2'}), field: form.bank_name.field},
                    correction_account: {valid: valid_field(form.correction_account.value, {type: 'string', min_length: 20, max_length: 20, regexp: /^[0-9]{20}$/ }), field: form.correction_account.field},
                    bik: {valid: valid_field(form.bik.value, {type: 'string', min_length: 9, max_length: 9, regexp: /^[0-9]{9}$/ }), field: form.bik.field},
                    okpo: {valid: valid_field(form.okpo.value, {type: 'string', min_length: 8, max_length: 10, regexp: /^[0-9]{8,10}$/ }), field: form.okpo.field},
                    shop_name: {valid: valid_field(form.shop_name.value, {type: 'string', min_length: 3}), field: form.shop_name.field},
                    director_email: {valid: valid_field(form.director_email.value, {type: 'string', min_length: 6, max_length: 254, regexp: /^([A-Za-z0-9_\.-]+\@[\dA-Za-z\.-]+\.[A-Za-z\.]{2,6})$/}), field: form.director_email.field},
                    director_phone: {valid: valid_field(form.director_phone.value, {type: 'string', min_length: 11, max_length: 12, regexp: /^([+][7]|[7]|[8])[0-9]{10}$/ }), field: form.director_phone.field},
                    shop_address: {valid: valid_field(form.shop_address.value, {type: 'string', min_length: 5}), field: form.shop_address.field},
                    work_time: {valid: valid_field(form.work_time.value, {type: 'string', min_length: 3}), field: form.work_time.field},
                    shop_email: {valid: valid_field(form.shop_email.value,  {type: 'string', min_length: '6', max_length: 254, regexp: /^([A-Za-z0-9_\.-]+\@[\dA-Za-z\.-]+\.[A-Za-z\.]{2,6})$/}), field: form.shop_email.field},
                    shop_phone: {valid: valid_field(form.shop_phone.value, {type: 'string', min_length: 11, max_length: 12, regexp: /^([+][7]|[7]|[8])[0-9]{10}$/ }), field: form.shop_phone.field},
                };
                let step = {first: false, second: false, third: false};
                $.each(valid_result, function (key, item) {
                    if (item.valid.error) {
                        if (key === 'full_name') {
                            field_reaction(item.field, 'Некореектное ФИО', item.valid.error);
                        } else {
                            field_reaction(item.field, item.valid.message, item.valid.error);
                        }
                        switch (form[key].step) {
                            case 1:
                                step.first = true;
                                break;
                            case 2:
                                step.second = true;
                                break;
                            case 3:
                                step.third = true;
                                break;
                        }
                        error = true;
                    } else {
                        field_reaction(item.field, item.valid.message, item.valid.error);
                    }
                });

                if(error){
                    let rule_field_first_step;
                    if(step.first){
                        $('.third-step').attr('data-status', 'disabled').hide();
                        $('.first-step').attr('data-status', 'active').show();
                        $('.step-title').text('Шаг 1: Данные о директоре');
                        rule_field_first_step = '<h3>Шаг 1:</h3>\n' +
                        '<ul class="text-left" style="list-style: none"> \n' +
                        ' <li><span style="font-size: 16px " class="badge badge-danger">"Фамилия Имя Отчество"</span> - длина от 5 символов, необходимо указать полную фамилию, имя и отчество, например: "Иванов Иван Иванович, Петов Петр Петрович"</li>\n' +
                        ' <li><span style="font-size: 16px " class="badge badge-danger">"Email"</span> - от 9 до 32 символов, необходимо указать достоверный электронный адрес, например: "example@mail.ru, example@gmail.com"</li>\n' +
                        ' <li><span style="font-size: 16px " class="badge badge-danger">"Логин"</span> - от 3 до 32 символов, латинские строчные и заглавные буквы, цифры, тире(-) и нижнее подчеркивание(_), например: "login, login1, Login1, login-1, login_1"</li>\n' +
                        ' <li><span style="font-size: 16px " class="badge badge-danger">"Пароль"</span> - от 6 до 32 символов, цифры, латинские строчные и заглавные буквы, например: "password, password1, Password111"</li>\n' +
                        '</ul>';
                    }
                    else if(step.second){
                        $('.third-step').attr('data-status', 'disabled').hide();
                        $('.second-step').attr('data-status', 'active').show();
                        $('.step-title').text('Шаг 2: Данные об организации');
                        rule_field_first_step = '<h3>Шаг 2:</h3>' +
                            '<h4>Регистрация организации</h4>'+
                            '<ul class="text-left" style="list-style: none"> \n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Название организации"</span> - в зависимости от выбранного типа формируется название для ООО или ИП, название для ООО должно быть длиной от 2 символов, без кавычек, название для ИП формируется автоматически, исходя из ФИО руководителя, например: Рога и копыта, Иванов Иван Иванович</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"ФИО руководителя"</span> - длина от 6 символов, необходимо указать полную фамилию, имя и отчество, например: "Иванов Иван Иванович, Петов Петр Петрович"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"ИНН/КПП(ИНН)"</span> - для ООО формируется поле вида ИНН/КПП, длина ИНН - 10 символов, длина КПП - 9 символов, для ИП формируется поле ИНН длинной в 12 симвоов, например: ИНН/КПП - 1234567891/123456789, ИНН - 123456789112"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"ОГРН(ОГРНИП)"</span> - для ООО фомируется ОГРН длинной 13 символов, для ИП - 15 символов, например: ОГРН - 1234567891123, ОГРНИП - 123456789112345"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Юридический адрес"</span> - необходимо указать адрес регистрации Вашей организации или ИП, рекомендуется писать адрес в виде: область, город, улица, дом/корпус/здание, например: Ростовская область, город Ростов-на-дону, улица Ленина, дом 1; Московская обл., г. Москва, ул. Ленина, к. 1"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Почтовый адрес"</span> - необходимо указать почтовый адрес Вашей организации или ИП на который приходит корреспонденция, рекомендуется писать адрес в виде: область, город, улица, дом/корпус/здание, индекс, например: Ростовская область, город Ростов-на-дону, улица Ленина, дом 1, 111111; Московская обл., г. Москва, ул. Ленина, к. 1,  111111"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Расчетный счет"</span> - Ваш 20 символьный банковский счет для проведения банковских операций, например: 12345678911234567892"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Название банка"</span> - Название Вашего банка, например: Сбербанк, ВТБ"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Корреспондентский счет"</span> - 20 символьный счет Вашего банка, например: 12345678911234567892"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"БИК"</span> - идентификатор Вашего банка длинной в 9 символов, например: 123456789"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"ОКПО"</span> - восьми- или десятизначный номер юридического лица, например: 12345678; 1234567891"</li>\n' +
                            '</ul>';
                    }
                    else if(step.third){
                        rule_field_first_step = '<h3>Шаг 3:</h3>' +
                            '<h4>Регистрация магазина</h4>'+
                            '<ul class="text-left" style="list-style: none"> \n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Название магазина"</span> - минимальная длина 3 символа, например: Рога и копыта"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Email директора"</span> - актуальная почта директора мгазина, например: mail@mail.ru"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Телефон директора"</span> - актуальный  номер телефона директора магазина, например: 89999999999; 79999999999; +79999999999"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Адрес магазина"</span> - восьми- или десятизначный номер юридического лица, например: 12345678; 1234567891"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Рабочее время"</span> - рабочее время магазина, рекомендуется писать в формате: рабочие дни: рабочие часы, например: пн-пт: 10-18; пн-пт: 10-18, сб: 10-17"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Email магазина"</span> - актуальная почта магазина, например: mail@mail.ru"</li>\n' +
                            ' <li style="margin-bottom: 15px"><span style="font-size: 16px " class="badge badge-danger">"Телефон магазина"</span> - актуальный телефон магазина, например: 89999999999; 79999999999; +79999999999"</li>\n' +
                            '</ul>';
                    }

                    Swal.fire({
                        toast: true,
                        timer: 10000,
                        html: '<span style="color: #fff; font-weight: 700">Возникли проблемы при заполнении формы? Прочтите <span class="badge badge-primary rule-field" style="cursor: pointer; font-size: 16px">правила заполнения полей</span></span>',
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
                else{
                    $.ajax({
                        url: '/register/full_registration',
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            full_name: form.full_name.value,
                            email: form.email.value,
                            login: form.login.value,
                            password: form.password.value,
                            organization_name: form.organization_name.value,
                            director_name: form.director_name.value,
                            inn_kpp: form.inn_kpp.value,
                            ogrn: form.ogrn.value,
                            juridical_address: form.juridical_address.value,
                            postal_address: form.postal_address.value,
                            settlement_account: form.settlement_account.value,
                            bank_name: form.bank_name.value,
                            correction_account: form.correction_account.value,
                            bik: form.bik.value,
                            okpo: form.okpo.value,
                            shop_name: form.shop_name.value,
                            director_email: form.director_email.value,
                            director_phone: form.director_phone.value,
                            shop_address: form.shop_address.value,
                            work_time: form.work_time.value,
                            shop_email: form.shop_email.value,
                            shop_phone: form.shop_phone.value
                        },
                        success: function (add_user) {
                            if(add_user.error){
                                console.log(add_user)
                                switch(add_user.status) {
                                    case 'valid error':
                                        $.each(add_user.field, function(key, item){
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
                                            field_reaction(form[key].field, message, item.error);
                                        });
                                        break;
                                    case 'all exist':
                                        field_reaction(form.inn_kpp.field, 'Компания с таким ИНН уже существует', true);
                                        field_reaction(form.ogrn.field, 'Компания с таким ОГРН(ОГРНИП) уже существует', true);
                                        field_reaction(form.settlement_account.field, 'Компания с таким расчетным счетом уже существует', true);
                                        $('.third-step').attr('data-status', 'disabled').hide();
                                        $('.second-step').attr('data-status', 'active').show();
                                        $('.step-title').text('Шаг 2: Данные о компании');
                                        break;
                                    case 'inn exist':
                                        field_reaction(form.inn_kpp.field, 'Компания с таким ИНН уже сузествует', true);
                                        $('.third-step').attr('data-status', 'disabled').hide();
                                        $('.second-step').attr('data-status', 'active').show();
                                        $('.step-title').text('Шаг 2: Данные о компании');
                                        break;
                                    case 'ogrn exist':
                                        field_reaction(form.ogrn.field, 'Компания с таким ОГРН(ОГРНИП) уже существует', true);
                                        $('.third-step').attr('data-status', 'disabled').hide();
                                        $('.second-step').attr('data-status', 'active').show();
                                        $('.step-title').text('Шаг 2: Данные о компании');
                                        break;
                                    case 'settlement account exist':
                                        field_reaction(form.settlement_account.field, 'Компания с таким расчетным счетом уже существует', true);
                                        $('.third-step').attr('data-status', 'disabled').hide();
                                        $('.second-step').attr('data-status', 'active').show();
                                        $('.step-title').text('Шаг 2: Данные о компании');
                                        break;
                                    case 'login and email exist':
                                        field_reaction(form.login.field, 'Такой логин уже существует', true);
                                        field_reaction(form.email.field, 'Такой email уже существует', true);
                                        $('.third-step').attr('data-status', 'disabled').hide();
                                        $('.first-step').attr('data-status', 'active').show();
                                        $('.step-title').text('Шаг 1: Данные о директоре');
                                        break;
                                    case 'email exist':
                                        field_reaction(form.email.field, 'Такой email уже существует', true);
                                        $('.third-step').attr('data-status', 'disabled').hide();
                                        $('.first-step').attr('data-status', 'active').show();
                                        $('.step-title').text('Шаг 1: Данные о директоре');
                                            break;
                                    case 'login exist':
                                        field_reaction(form.login.field, 'Такой логин уже существует', true);
                                        $('.third-step').attr('data-status', 'disabled').hide();
                                        $('.first-step').attr('data-status', 'active').show();
                                        $('.step-title').text('Шаг 1: Данные о директоре');
                                            break;
                                }
                            }
                            else{
                                document.location.href = "/login";
                            }
                        }
                    })
                }
            });
        });
    </script>
</div>
