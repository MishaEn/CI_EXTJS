<div class="module-activate" style="display: none;">
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
                    <h3 class="login-box-msg">Введите код потверждения</h3>
                    <h5 class="login-box-msg">На Ваш почтовый ящик было отправлено письмо с кодом подтверждения</h5>

                    <form>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control code" placeholder="Код потверждения">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas" icon="fa-key"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-block submit submit-confirm-code btn-primary btn-block">Далее</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '.submit-confirm-code', function (e) {
            e.preventDefault();
            let code = $('.code');
            let form = {
                code: {field: code, value: code.val().trim(), step: 1}
            };
            let valid = {
                code: {valid: valid_field(form.code.value, {type: 'string', min_length: 5, max_length: 5}), field: form.code.field}
                };
            if(valid.code.valid.error){
                field_reaction(form.code.field, valid.code.valid.message, valid.code.valid.error);
            }
            else{
                field_reaction(form.code.field, valid.code.valid.message, valid.code.valid.error);
                $.ajax({
                    url: '/login/recover_password',
                    method: 'post',
                    data: {code: form.code.value},
                    dataType: 'html',
                    success: function (data) {
                        $('.module-activate').fadeOut(300, function () {
                            $('.module-activate').remove();
                            $('.recover-box').append(data);
                            $('.module-password').fadeIn(300);
                        })
                    }
                })
            }
        })
    </script>
</div>