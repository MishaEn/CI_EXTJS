<?php
    $explode_date = explode('-', explode(' ', $data['register_date'])[0]);
    $explode_time = explode(' ', $data['register_date'])[1];
    $register_date = $explode_date[2].'.'.$explode_date[1].'.'.$explode_date[0].' г. в '.$explode_time;
?>
<div class="card card-danger card-outline">
    <div class="card-header">
        <h3 class="card-title" style="font-weight: 700;"><?= $data['organization_name'];?></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body text-left">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-5 text-left">
                        <span>ФИО директора</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['director_name'];?></span>
                    </div>
                </div>
                <hr></hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>ИНН/КПП</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['inn_kpp'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>ОГРН</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['ogrn'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Юридический адрес</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['juridical_address'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Почтовый адрес</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['postal_adress'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Название банка</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['bank_name'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Расчетный счет</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['settlement_account'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Корреспондентский счет</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['correction_account'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>БИК</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['bik'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>ОКПО</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['okpo'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Зарегистрировал</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span class="pseudo-link" data-modal="director" data-action="get_director_modal" data-data="<?= $data['director_id']?>"><?= $data['full_name']?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Дата регистрации</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $register_date;?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>