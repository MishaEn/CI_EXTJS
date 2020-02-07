<div class="login-box" style="margin-top: 5vh;">
    <div class="card elevation-1">
        <div class="card-header" style="background: #dc3545">
            <div class="row">
                <div class="col-10">
                    <img src="/public/img/top_logo.png" alt="">
                </div>
                <div class="col-2 text-right">
                    <i class="fa fa-cog  login-settings"></i>
                </div>
            </div>
        </div>
        <div class="card-body login-card-body">
            <h3 class="login-box-msg">Авторизация</h3>

            <form>
                <div class="input-group mb-3">
                    <input type="text" class="form-control login" placeholder="Логин">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user" icon="fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control password" placeholder="Пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key" icon="fa-key"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-block submit submit-login btn-primary btn-block">Войти</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <?php submodule_loader('setting', null);?>
        </div>
    </div>
</div>
<script>
</script>

