<div class="module-password" style="display: none">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card elevation-1">
                <div class="card-header" style="background: #dc3545">
                    <div class="row">
                        <div class="col-10">
                            <img src="/public/img/top_logo.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="card-body login-card-body">
                    <h3 class="login-box-msg">Введите новый пароль</h3>
                    <h5 class="login-box-msg">Введите надежный пароль от 6 до 32 символов. Запомните его или запишите куда-нибудь.</h5>
                    <form>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control password" placeholder="Новый пароль">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas" icon="fa-key"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control confirm-password" placeholder="Подтвердите новый пароль">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas" icon="fa-key"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-block submit submit-update-password btn-primary btn-block">Отправить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '.submit-update-password', function (e) {
            e.preventDefault();
            let password = $('.password');
            let confirm_password = $('.confirm-password');
            let form =
                {
                    password: {field: password, value: password.val().trim()},
                    confirm_password: {field: confirm_password, value: confirm_password.val().trim()}
                };
            if(form.confirm_password.value !== form.password.value){
                field_reaction(form.password.field, 'Пароли не совпадают', true);
                field_reaction(form.confirm_password.field, 'Пароли не совпадают', true);
            }
            else {
                field_reaction(form.password.field, 'Пароли не совпадают', false);
                field_reaction(form.confirm_password.field, 'Пароли не совпадают', false);
                let valid_result = {password: {valid: valid_field(form.password.value, {type: 'string', min_length: '6', max_length: '32'}), field: form.password.field}};
                let error = false;
                if (valid_result.password.valid.error) {
                    field_reaction(form.password.field, valid_result.password.valid.message, valid_result.password.valid.error);
                    field_reaction(form.confirm_password.field, valid_result.password.valid.message, valid_result.password.valid.error);
                    error = true;
                }
                else {
                    field_reaction(form.password.field, valid_result.password.valid.message, valid_result.password.valid.error)
                    field_reaction(form.confirm_password.field, 'Пароли не совпадают', false);
                }
                if(!error){
                    console.log(111);
                    $.ajax({
                        url: '/login/update_password',
                        method: 'post',
                        data: {password: form.password.value},
                        dataType: 'json',
                        success: function (data) {
                            console.log(222);
                            if(data.error){
                                document.location.href = '/login'
                            }
                            else{
                                console.log(333);
                                let html =  '<h3>Ваш пароль успешно изменен</h>'+
                                            '<h5>После закрытия данного окна вы будете перенаправлены на страницу авторизации</h5>';
                                Swal.fire({
                                    title: 'Обратите внимание!',
                                    position: 'top',
                                    timer: 3000,
                                    html: html,
                                    width: '45%',
                                    confirmButtonColor: '#dc3545',
                                    onClose: function () {
                                        document.location.href = '/login'
                                    }
                                });
                            }
                        }
                    })
                }
            }
        })
    </script>
</div>