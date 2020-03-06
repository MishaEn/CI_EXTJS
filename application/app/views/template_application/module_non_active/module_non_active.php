<div class="row">
    <div class="col-4 offset-4" style="margin-top: 10vh">
        <div class="card card-danger card-outline">
            <div class="card-header">
                <h3 class="card-title">Ваш аккаунт не активирован</h3>
            </div>
            <div class="card-body  text-left">
                <p>
                    Ваш аккаунт не был активирован по одной из причин:
                </p>
                <ol>
                    <li>Вы недавно зарегистрировались</li>
                    <li>При проверке аккаунта были найдены ошибки</li>
                </ol>
                Ваш аккаунт будет активирован в ближайшее время.
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-4">
                        <button class="btn-danger btn btn-block">Назад</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.btn', function (e) {
                document.location.href='/login'
            })
        })
    </script>
</div>