<div class="recover-box" style="margin-top: 5vh;">
    <div class="module-email">
        <div class="card elevation-1">
            <div class="card-header" style="background: #dc3545">
                <div class="row">
                    <div class="col-10">
                        <img src="/public/img/top_logo.png" alt="">
                    </div>
                </div>
            </div>
            <div class="card-body login-card-body">
                <h3 class="login-box-msg">Восстановление пароля</h3>
                <h5 class="login-box-msg">Для восстановления пароя введите Ваш email</h5>

                <form>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas" icon="fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-block submit submit-send-email btn-primary btn-block">Далее</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            $(document).on('click', '.submit-send-email', function (e) {
                e.preventDefault();
                let email = $('.email');
                let form = {
                    email: {field: email, value: email.val().trim(), step: 1}
                };
                let valid = {
                    email: {valid: valid_field(form.email.value, {type: 'string', min_length: 6, max_length: 254, regexp: /^([A-Za-z0-9_\.-]+\@[\dA-Za-z\.-]+\.[A-Za-z\.]{2,6})$/}), field: form.email.field}
                };

                if(valid.email.valid.error){
                    field_reaction(form.email.field, valid.email.valid.message, valid.email.valid.error);
                }
                else{
                    field_reaction(form.email.field, valid.email.valid.message, valid.email.valid.error);
                    $.ajax({
                        url: '/login/recover_code',
                        method: 'post',
                        data: {email: form.email.value},
                        dataType: 'html',
                        success: function (data) {
                            if(data.error){

                            }
                            else{
                                $('.module-email').fadeOut(300, function () {
                                    $('.module-email').remove();
                                    $('.recover-box').append(data);
                                    $('.module-activate').fadeIn(300);
                                })
                            }
                        }
                    })
                }
            })
        </script>
    </div>

</div>


