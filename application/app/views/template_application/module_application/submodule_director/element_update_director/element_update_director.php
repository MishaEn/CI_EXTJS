<div class="card card-danger card-outline">
    <div class="card-header">
        <h3 class="card-title"><?= $data['full_name'];?></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body text-left">
        <form action="">
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control full_name" data-placeholder ="ФИО"  placeholder="ФИО" value="<?= $data['full_name']?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control login" data-placeholder ="Логин"  placeholder="Логин" value="<?= $data['login']?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control email" data-placeholder ="Email"  placeholder="Email" value="<?= $data['email']?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control password" data-placeholder ="Новый пароль"  placeholder="Новый пароль" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control code" data-placeholder ="Код"  placeholder="Код" value="<?= $data['code']?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control markup" data-placeholder ="Наценка"  placeholder="Наценка" value="<?= $data['markup']?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control activation_count" data-placeholder ="Кол-во активаций"  placeholder="Кол-во активаций" value="<?= $data['activation_count']?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <select class="form-control brand" data-placeholder ="Бренд"  selected="<?= $data['brand']?>">
                            <?php
                                switch ($data['brand']){
                                    case '1':
                                        echo '
                                            <option selected value="1">Дедал</option>
                                            <option value="2">Аветти</option>
                                            <option value="3">Малина</option>
                                        ';
                                        break;
                                    case '2':
                                        echo '
                                            <option value="1">Дедал</option>
                                            <option selected value="2">Аветти</option>
                                            <option value="3">Малина</option>
                                        ';
                                        break;
                                    case '3':
                                        echo '
                                            <option value="1">Дедал</option>
                                            <option value="2">Аветти</option>
                                            <option selected value="3">Малина</option>
                                        ';
                                        break;
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <button class="btn update-director btn-block btn-danger">
                    Сохранить
                </button>
            </div>
        </div>
    </div>
</div>