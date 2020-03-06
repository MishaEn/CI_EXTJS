<?php
$explode_date = explode('-', explode(' ', $data['director']['register_date'])[0]);
$explode_time = explode(' ', $data['director']['register_date'])[1];
$register_date = $explode_date[2].'.'.$explode_date[1].'.'.$explode_date[0].' г. в '.$explode_time;
?>
<div class="card card-danger card-outline">
    <div class="card-header">
        <h3 class="card-title" style="font-weight: 700;"><?= $data['director']['full_name'];?></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body text-left">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Логин</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['director']['login'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Email</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['director']['email'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Комментарий</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['director']['comment'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Код</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['director']['code'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Наценка</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['director']['markup'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Кол-во активаций</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?= $data['director']['activation_count'];?></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Бренд</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <span><?php
                                switch($data['director']['brand']){
                                    case '1':
                                        echo 'Дедал';
                                        break;
                                    case '2':
                                        echo 'Аветти';
                                        break;
                                    case '3':
                                        echo 'Малина';
                                        break;
                                }
                            ?></span>
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
                <hr>
                <div class="row">
                    <div class="col-5 text-left">
                        <span>Список компаний</span>
                    </div>
                    <div class="col-1">
                        <span>-</span>
                    </div>
                    <div class="col-6 text-left">
                        <? if (isset($data['company'])):?>
                            <?php foreach($data['company'] as $item):?>
                                <span style="display: block" class="pseudo-link" data-modal="company" data-action="get_company_modal" data-data="<?= $item['id']?>"><?= $item['organization_name'];?></span>
                            <?php endforeach;?>
                        <? endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>