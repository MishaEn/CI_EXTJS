<div class="card card-danger card-outline">
    <div class="card-header">
        <h3 class="card-title"><?= $data['organization_name'];?></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body text-left">
        <form action="">
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control organization-name" data-placeholder ="Название организации"  placeholder="Название организации" value="<?= $data['organization_name']?>">
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
                        <input type="text" class="form-control director-name" data-placeholder ="ФИО руководителя"  placeholder="ФИО руководителя" value="<?= $data['director_name']?>">
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
                        <input type="text" class="form-control inn-kpp" data-placeholder ="ИНН"  placeholder="ИНН/КПП" value="<?= $data['inn_kpp']?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
            </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control ogrn" data-placeholder ="ОГРН"  placeholder="ОГРН" value="<?= $data['ogrn']?>">
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
                        <input type="text" class="form-control juridical-address" data-placeholder ="Адрес юредический"  placeholder="Адрес юредический" value="<?= $data['juridical_address']?>">
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
                        <input type="text" class="form-control postal-address" data-placeholder ="Адрес почтовый"  placeholder="Адрес почтовый" value="<?= $data['postal_adress']?>">
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
                        <input type="text" class="form-control settlement-account" data-placeholder ="Расчетные счет"  placeholder="Расчетные счет" value="<?= $data['settlement_account']?>">
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
                        <input type="text" class="form-control bank-name" data-placeholder ="Наименование банка"  placeholder="Наименование банка" value="<?= $data['bank_name']?>">
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
                        <input type="text" class="form-control correction-account" data-placeholder ="Корреспондентский счет"  placeholder="Корреспондентский счет" value="<?= $data['correction_account']?>">
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
                        <input type="text" class="form-control bik" data-placeholder ="БИК"  placeholder="БИК" value="<?= $data['bik']?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control okpo" data-placeholder ="ОКПО"  placeholder="ОКПО" value="<?= $data['okpo']?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <button class="btn update-company btn-block btn-danger">
                    Сохранить
                </button>
            </div>
        </div>
    </div>
</div>