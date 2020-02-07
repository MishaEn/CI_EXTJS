<div class="submodule company" data-status="active" data-submoudle-appliaction = "company">
    <input type="text" data-type="director-id" hidden value="<?php echo $_SESSION['user']['director_id'];?>">
    <?php if($data['error']):?>
        <?php if($data['status'] === 'fetch error'):?>
            <div class="row" style="padding-top: 10px">
                <div class="col-md-12">
                    <div class="tab-wrapper" style="z-index: 2000; padding-bottom: 4px">
                        <div class="tab-btn-dis" style="display: inline; z-index: <?php echo 1200-$i;?>" data-status = "disabled" data-tab-name = "add-company">
                            <span><i style="color: #e2e4e7" class="fas fa-plus"></i></span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body company-card" style="height: 73vh;!important;">
                            <h1>Добавьте свою первую компанию!</h1>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
    <?php else:?>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-wrapper" style="z-index: 2000;">
                    <div class="tab-btn" style="display: inline; z-index: 1200" data-status = "active" data-tab-count="1" data-tab-name = "<?php echo $data['data'][0]['organization_name'];?>">
                        <span><?php echo $data['data'][0]['organization_name'];?></span>
                    </div>
                    <?php $count = 1; for($i = 1; $i<count($data['data']); $i++):?>
                        <div class="tab-btn-dis" style="display: inline; margin-left: -6px; z-index: <?php echo 1200-$i;?>" data-status = "disabled" data-tab-count="<?php echo ++$count?>" data-tab-name = "<?php echo $data['data'][$i]['organization_name'];?>">
                            <span><?php echo $data['data'][$i]['organization_name'];?></span>
                        </div>
                    <?php endfor;?>
                    <?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['company']['create'])):?>
                        <div class="tab-btn-dis" style="display: inline; margin-left: -6px; z-index: <?php echo 1200-$i;?>" data-status = "disabled" data-tab-name = "add-company">
                            <span><i style="color: #e2e4e7" class="fas fa-plus"></i></span>
                        </div>
                    <?php endif;?>

                </div>
                <div class="card" style="z-index: 500; margin-top: 9px">
                    <div class="card-body company-card" style="height: 75.5vh; overflow-y: scroll">

                        <div class="tab-panel" data-panel-status="active" data-panel-name="<?php echo $data['data'][0]['organization_name'];?>">
                            <?php
                            $delete = 'false';
                            $edit = 'false';
                            $block = 'false';
                            if($data['data'][0]['status'] === 1){
                                $color = '#28a745';
                                $text = 'Активирована';
                            }
                            elseif($data['data'][0]['status'] === 2){
                                $color = '#6c757d';
                                $text = 'Заблокирована';
                            }
                            elseif($data['data'][0]['status'] === 0){
                                $color = '#fd7e14';
                                $text = 'Не активирована';
                            }
                            else if($data['data'][0]['status'] === 3){
                                $color = '#dc3545';
                                $text = 'Запрос на удаление';
                                $delete = 'true';
                            }
                            else if($data['data'][0]['status'] === 4){
                                $color = '#6c757d';
                                $text = 'Запрос на блокировку';
                                $block = 'true';
                            }
                            else if($data['data'][0]['status'] === 5){
                                $color = '#6c757d';
                                $text = 'На модерации';
                            }
                            ?>
                            <div class="row">
                                <div class="col-5">
                                    <h1><?php echo $data['data'][0]['organization_name'];?></h1>
                                </div>
                                <div class="col-3 text-left" style="padding-top: 10px; padding-left: 0">
                                    <span data-type="company-status" data-id="<?php echo $data['data'][0]['id']?>"  data-status="<?php echo $data['data'][0]['status'];?>" style="font-size: 25px; color: <?php echo $color;?>;"><?php echo $text;?></span>
                                </div>
                                <?php
                                switch($data['data'][0]['status']){
                                    case 3:
                                        echo   '<div class="col-2 offset-2 text-center" style="margin-top:10px; padding-top: 10px">
                                                        <i data-type="disabled-edit" data-edit="'.$delete.'" data-id="'.$data['data'][0]['id'].'" style="color: #6c757d; font-size: 1.31em; cursor: default; margin-right: 10px" class="fas fa-edit"></i>
                                                        <i data-type="disabled-block" data-block="'.$block.'" data-id="'.$data['data'][0]['id'].'" style="color: #6c757d; font-size: 1.31em; cursor: default; margin-right: 10px" class="fas fa-lock"></i>
                                                        <i data-type="checked-delete" data-delete="'.$delete.'" data-id="'.$data['data'][0]['id'].'" style="color: #DC3545; font-size: 1.31em; cursor: pointer; margin-right: 10px" class="fas fa-trash-alt"></i>
                                                    </div>';
                                        break;
                                    case 4:
                                        echo   '<div class="col-2 offset-2 text-center" style="margin-top:10px; padding-top: 10px">
                                                        <i data-type="disabled-edit" data-edit="'.$delete.'" data-id="'.$data['data'][0]['id'].'" style="color: #6c757d; font-size: 1.31em; cursor: default; margin-right: 10px" class="fas fa-edit"></i>
                                                        <i data-type="checked-block" data-block="'.$block.'" data-id="'.$data['data'][0]['id'].'" style="color: #333333; font-size: 1.31em; cursor: pointer; margin-right: 10px" class="fas fa-lock"></i>
                                                        <i data-type="disabled-delete" data-delete="'.$delete.'" data-id="'.$data['data'][0]['id'].'" style="color: #6c757d; font-size: 1.31em; cursor: default; margin-right: 10px" class="fas fa-trash-alt"></i>
                                                    </div>';
                                        break;
                                    default:
                                        echo   '<div class="col-2 offset-2 text-center" style="margin-top:10px; padding-top: 10px">
                                                        <i data-type="checked-edit" data-edit="'.$delete.'" data-id="'.$data['data'][0]['id'].'" style="color: #28a745; font-size: 1.31em; cursor: pointer; margin-right: 10px" class="fas fa-edit"></i>
                                                        <i data-type="checked-block" data-block="'.$block.'" data-id="'.$data['data'][0]['id'].'" style="color: #333333; font-size: 1.31em; cursor: pointer; margin-right: 10px" class="fas fa-lock"></i>
                                                        <i data-type="checked-delete" data-delete="'.$delete.'" data-id="'.$data['data'][0]['id'].'" style="color: #DC3545; font-size: 1.31em; cursor: pointer; margin-right: 10px" class="fas fa-trash-alt"></i>
                                                    </div>';
                                        break;
                                }
                                ?>
                            </div>
                            <h2>Основная информация</h2>
                            <hr>
                            <div class="row row-description">
                                <div class="col-2">
                                    <span>Директор:</span>
                                </div>
                                <div class="col-10">
                                    <span data-type="editable" data-id="<?php echo $data['data'][0]['id']?>" data-option="1" data-edit-status="false"><?php echo $data['data'][0]['director_name'];?></span>
                                </div>
                            </div>
                            <div class="row row-description">
                                <div class="col-2">
                                    <span>ИНН/КПП:</span>
                                </div>
                                <div class="col-10">
                                    <span data-type="editable" data-id="<?php echo $data['data'][0]['id']?>" data-option="2" data-edit-status="false"><?php echo $data['data'][0]['inn_kpp'];?></span>
                                </div>

                            </div>
                            <div class="row row-description">
                                <div class="col-2">
                                    <span>ОГРН:</span>
                                </div>
                                <div class="col-10">
                                    <span data-type="editable" data-id="<?php echo $data['data'][0]['id']?>" data-option="3" data-edit-status="false"><?php echo $data['data'][0]['ogrn'];?></span>
                                </div>
                            </div>
                            <hr>
                            <h2>Адреса компании</h2>
                            <hr>
                            <div class="row row-description">
                                <div class="col-2">
                                    <span>Юридический адрес:</span>
                                </div>
                                <div class="col-10">
                                    <span data-type="editable" data-id="<?php echo $data['data'][0]['id']?>" data-option="4" data-edit-status="false"><?php echo $data['data'][0]['juridical_address'];?></span>
                                </div>
                            </div>
                            <div class="row row-description">
                                <div class="col-2">
                                    <span>Почтовый адрес:</span>
                                </div>
                                <div class="col-10">
                                    <span data-type="editable" data-id="<?php echo $data['data'][0]['id']?>" data-option="5" data-edit-status="false"><?php echo $data['data'][0]['postal_adress'];?></span>
                                </div>
                            </div>
                            <hr>
                            <h2>Банк и счета</h2>
                            <hr>
                            <div class="row row-description">
                                <div class="col-2">
                                    <span>Рассчетный счет:</span>
                                </div>
                                <div class="col-10">
                                    <span data-type="editable" data-id="<?php echo $data['data'][0]['id']?>" data-option="6" data-edit-status="false"><?php echo $data['data'][0]['settlement_account'];?></span>
                                </div>
                            </div>
                            <div class="row row-description">
                                <div class="col-2">
                                    <span>Корреспондентский счет:</span>
                                </div>
                                <div class="col-10">
                                    <span data-type="editable" data-id="<?php echo $data['data'][0]['id']?>" data-option="8" data-edit-status="false"><?php echo $data['data'][0]['correction_account'];?></span>
                                </div>
                            </div>
                            <div class="row row-description">
                                <div class="col-2">
                                    <span>Название банка:</span>
                                </div>
                                <div class="col-10">
                                    <span data-type="editable" data-id="<?php echo $data['data'][0]['id']?>" data-option="7" data-edit-status="false"><?php echo $data['data'][0]['bank_name'];?></span>
                                </div>
                            </div>
                            <div class="row row-description">
                                <div class="col-2">
                                    <span>БИК:</span>
                                </div>
                                <div class="col-10">
                                    <span data-type="editable" data-id="<?php echo $data['data'][0]['id']?>" data-option="9" data-edit-status="false"><?php echo $data['data'][0]['bik'];?></span>
                                </div>
                            </div>
                            <div class="row row-description">
                                <div class="col-2">
                                    <span>ОКПО:</span>
                                </div>
                                <div class="col-10">
                                    <span data-type="editable" data-id="<?php echo $data['data'][0]['id']?>"  data-option="10"data-edit-status="false"><?php echo $data['data'][0]['okpo'];?></span>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($data['data']  as $key => $item):?>
                            <?php   if ($key === 0)continue?>
                            <div class="tab-panel" data-panel-status="disabled" style="display: none" data-panel-name="<?php echo $item['organization_name'];?>">
                                <?php
                                $delete = 'false';
                                $edit = 'false';
                                $block = 'false';
                                if($data['data'][0]['status'] === 1){
                                    $color = '#28a745';
                                    $text = 'Активирована';
                                }
                                elseif($data['data'][0]['status'] === 2){
                                    $color = '#6c757d';
                                    $text = 'Заблокирована';
                                }
                                elseif($data['data'][0]['status'] === 0){
                                    $color = '#fd7e14';
                                    $text = 'Не активирована';
                                }
                                else if($data['data'][0]['status'] === 3){
                                    $color = '#dc3545';
                                    $text = 'Запрос на удаление';
                                    $delete = 'true';
                                }
                                else if($data['data'][0]['status'] === 4){
                                    $color = '#6c757d';
                                    $text = 'Запрос на блокировку';
                                    $block = 'true';
                                }
                                else if($data['data'][0]['status'] === 5){
                                    $color = '#6c757d';
                                    $text = 'На модерации';
                                }
                                ?>
                                <div class="row">
                                    <div class="col-5">
                                        <h1><?php echo $item['organization_name'];?></h1>
                                    </div>
                                    <div class="col-3 text-left" style="padding-top: 10px; padding-left: 0">
                                        <span data-type="company-status" data-id="<?php echo $item['id']?>" data-status="<?php echo $item['status'];?>" style="font-size: 25px; color: <?php echo $color;?>;"><?php echo $text;?></span>
                                    </div>
                                    <?php
                                    switch($item['status']){
                                        case 3:
                                            echo   '<div class="col-2 offset-2 text-center" style="margin-top:10px; padding-top: 10px">
                                                        <i data-type="disabled-edit" data-edit="'.$delete.'" data-id="'.$item['id'].'" style="color: #6c757d; font-size: 1.31em; cursor: default; margin-right: 10px" class="fas fa-edit"></i>
                                                        <i data-type="disabled-block" data-block="'.$block.'" data-id="'.$item['id'].'" style="color: #6c757d; font-size: 1.31em; cursor: default; margin-right: 10px" class="fas fa-lock"></i>
                                                        <i data-type="checked-delete" data-delete="'.$delete.'" data-id="'.$item['id'].'" style="color: #DC3545; font-size: 1.31em; cursor: pointer; margin-right: 10px" class="fas fa-trash-alt"></i>
                                                    </div>';
                                            break;
                                        case 4:
                                            echo   '<div class="col-2 offset-2 text-center" style="margin-top:10px; padding-top: 10px">
                                                        <i data-type="disabled-edit" data-edit="'.$delete.'" data-id="'.$item['id'].'" style="color: #6c757d; font-size: 1.31em; cursor: default; margin-right: 10px" class="fas fa-edit"></i>
                                                        <i data-type="checked-block" data-block="'.$block.'" data-id="'.$item['id'].'" style="color: #333333; font-size: 1.31em; cursor: pointer; margin-right: 10px" class="fas fa-lock"></i>
                                                        <i data-type="disabled-delete" data-delete="'.$delete.'" data-id="'.$item['id'].'" style="color: #6c757d; font-size: 1.31em; cursor: default; margin-right: 10px" class="fas fa-trash-alt"></i>
                                                    </div>';
                                            break;
                                        default:
                                            echo   '<div class="col-2 offset-2 text-center" style="margin-top:10px; padding-top: 10px">
                                                        <i data-type="checked-edit" data-edit="'.$delete.'" data-id="'.$item['id'].'" style="color: #28a745; font-size: 1.31em; cursor: pointer; margin-right: 10px" class="fas fa-edit"></i>
                                                        <i data-type="checked-block" data-block="'.$block.'" data-id="'.$item['id'].'" style="color: #333333; font-size: 1.31em; cursor: pointer; margin-right: 10px" class="fas fa-lock"></i>
                                                        <i data-type="checked-delete" data-delete="'.$delete.'" data-id="'.$item['id'].'" style="color: #DC3545; font-size: 1.31em; cursor: pointer; margin-right: 10px" class="fas fa-trash-alt"></i>
                                                    </div>';
                                            break;
                                    }
                                    ?>
                                </div>
                                <hr>
                                <h2>Основная информация</h2>
                                <hr>
                                <div class="row row-description">
                                    <div class="col-2">
                                        <span>Директор:</span>
                                    </div>
                                    <div class="col-5">
                                        <span data-type="editable" data-id="<?php echo $item['id']?>" data-option="1" data-edit-status="false"><?php echo  $item['director_name'];?></span>
                                    </div>
                                </div>
                                <div class="row row-description">
                                    <div class="col-2">
                                        <span>ИНН/КПП:</span>
                                    </div>
                                    <div class="col-5">
                                        <span data-type="editable" data-id="<?php echo $item['id']?>" data-option="2" data-edit-status="false"><?php echo  $item['inn_kpp'];?></span>
                                    </div>

                                </div>
                                <div class="row row-description">
                                    <div class="col-2">
                                        <span>ОГРН:</span>
                                    </div>
                                    <div class="col-5">
                                        <span data-type="editable" data-id="<?php echo $item['id']?>" data-option="3" data-edit-status="false"><?php echo $item['ogrn'];?></span>
                                    </div>
                                </div>
                                <hr>
                                <h2>Адреса компании</h2>
                                <hr>
                                <div class="row row-description">
                                    <div class="col-2">
                                        <span>Юридический адрес:</span>
                                    </div>
                                    <div class="col-5">
                                        <span data-type="editable" data-id="<?php echo $item['id']?>" data-option="4" data-edit-status="false"><?php echo $item['juridical_address'];?></span>
                                    </div>
                                </div>
                                <div class="row row-description">
                                    <div class="col-2">
                                        <span>Почтовый адрес:</span>
                                    </div>
                                    <div class="col-5">
                                        <span data-type="editable" data-id="<?php echo $item['id']?>" data-option="5" data-edit-status="false"><?php echo $item['postal_adress'];?></span>
                                    </div>
                                </div>
                                <hr>
                                <h2>Банк и счета</h2>
                                <hr>
                                <div class="row row-description">
                                    <div class="col-2">
                                        <span>Рассчетный счет:</span>
                                    </div>
                                    <div class="col-5">
                                        <span data-type="editable" data-id="<?php echo $item['id']?>" data-option="6" data-edit-status="false"><?php echo $item['settlement_account'];?></span>
                                    </div>
                                </div>
                                <div class="row row-description">
                                    <div class="col-2">
                                        <span>Корреспондентский счет:</span>
                                    </div>
                                    <div class="col-5">
                                        <span data-type="editable" data-id="<?php echo $item['id']?>" data-option="8" data-edit-status="false"><?php echo $item['correction_account'];?></span>
                                    </div>
                                </div>
                                <div class="row row-description">
                                    <div class="col-2">
                                        <span>Название банка:</span>
                                    </div>
                                    <div class="col-5">
                                        <span data-type="editable" data-id="<?php echo $item['id']?>" data-option="7" data-edit-status="false"><?php echo $item['bank_name'];?></span>
                                    </div>
                                </div>
                                <div class="row row-description">
                                    <div class="col-2">
                                        <span>БИК:</span>
                                    </div>
                                    <div class="col-5">
                                        <span data-type="editable" data-id="<?php echo $item['id']?>" data-option="9" data-edit-status="false"><?php echo $item['bik'];?></span>
                                    </div>
                                </div>
                                <div class="row row-description">
                                    <div class="col-2">
                                        <span>ОКПО:</span>
                                    </div>
                                    <div class="col-5">
                                        <span data-type="editable" data-id="<?php echo $item['id']?>" data-option="10" data-edit-status="false"><?php echo $item['okpo'];?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>
</div>
<script>
    $(document).ready(function () {
        let company_handler = $('.company');
        setInterval(function () {
            let status_title = $('.tab-panel[data-panel-status="active"]').children().find('span[data-type="company-status"]');
            let edit_icon =  $('.tab-panel[data-panel-status="active"]').children().find('i[data-type="checked-edit"]');
            let block_icon =  $('.tab-panel[data-panel-status="active"]').children().find('i[data-type="checked-block"]');
            let delete_icon =  $('.tab-panel[data-panel-status="active"]').children().find('i[data-type="checked-delete"]');
            let disabled_edit_icon =  $('.tab-panel[data-panel-status="active"]').children().find('i[data-type="disabled-edit"]');
            let disabled_block_icon =  $('.tab-panel[data-panel-status="active"]').children().find('i[data-type="disabled-block"]');
            let disabled_delete_icon =  $('.tab-panel[data-panel-status="active"]').children().find('i[data-type="disabled-delete"]');
            $.ajax({
                url: '/company/check_company_status',
                method: 'post',
                dataType: 'json',
                data: {id: $(status_title).attr('data-id')},
                success: function (data) {
                    let color;
                    let status;
                    if(!data.error) {
                        switch (data.data) {
                            case 1:
                                color = '#28a745';
                                status = 'Активирована';
                                disabled_edit_icon.css({'color': '#28a745', cursor: 'pointer'}).attr('data-type', 'checked-edit');
                                disabled_block_icon.css({'color': '#333333', cursor: 'pointer'}).attr('data-type', 'checked-block');
                                disabled_delete_icon.css({'color': '#DC3545', cursor: 'pointer'}).attr('data-type', 'checked-delete');
                                break;
                            case 2:
                                edit_icon.css({'color': '#6c757d', cursor: 'default'}).attr('data-type', 'disabled-edit');
                                delete_icon.css({'color': '#6c757d', cursor: 'default'}).attr('data-type', 'disabled-delete');
                                disabled_block_icon.css({'color': '#333333', cursor: 'pointer'}).attr('data-type', 'checked-block');
                                color = '#6c757d';
                                status = 'Заблокирована';
                                break;
                            case 0:
                                color = '#ffc107';
                                status = 'Не активирована';
                                disabled_edit_icon.css({'color': '#28a745', cursor: 'pointer'}).attr('data-type', 'checked-edit');
                                disabled_block_icon.css({'color': '#333333', cursor: 'pointer'}).attr('data-type', 'checked-block');
                                disabled_delete_icon.css({'color': '#DC3545', cursor: 'pointer'}).attr('data-type', 'checked-delete');
                                break;
                            case 3:
                                color = '#DC3545';
                                status = 'Запрос на удаление';
                                edit_icon.css({'color': '#6c757d', cursor: 'default'}).attr('data-type', 'disabled-edit');
                                block_icon.css({'color': '#6c757d', cursor: 'default'}).attr('data-type', 'disabled-block');
                                disabled_delete_icon.css({'color': '#DC3545', cursor: 'pointer'}).attr('data-type', 'checked-delete');
                                break;
                            case 4:
                                color = '#6c757d';
                                status = 'Запрос на блокировку';
                                edit_icon.css({'color': '#6c757d', cursor: 'default'}).attr('data-type', 'disabled-edit');
                                delete_icon.css({'color': '#6c757d', cursor: 'default'}).attr('data-type', 'disabled-delete');
                                disabled_block_icon.css({'color': '#333333', cursor: 'pointer'}).attr('data-type', 'checked-block');
                                break;
                            case 5:
                                color = '#6c757d';
                                status = 'На модерации';
                                disabled_edit_icon.css({'color': '#28a745', cursor: 'pointer'}).attr('data-type', 'checked-edit');
                                disabled_block_icon.css({'color': '#333333', cursor: 'pointer'}).attr('data-type', 'checked-block');
                                disabled_delete_icon.css({'color': '#DC3545', cursor: 'pointer'}).attr('data-type', 'checked-delete');
                                break;
                        }
                        $(status_title).css('color', color).text(status)
                    }
                }
            })
        },2500);
        company_handler.on('click', '.tab-btn-dis', function (e) {
            let panel_name = $(this).attr('data-tab-name');
            let list = $('div[data-tab-count]');
            let count = $(list[list.length - 1]).attr('data-tab-count');
            if(panel_name !== 'add-company'){
                $('.tab-btn').removeClass('tab-btn').addClass('tab-btn-dis').attr('data-status', 'disabled');
                $(this).removeClass('tab-btn-dis').addClass('tab-btn').attr('data-status', 'active');
                $('[data-panel-status ="active"]').fadeOut(100, function () {
                    $('[data-panel-status ="active"]').attr('data-panel-status', 'disabled');
                    $('[data-panel-name="'+panel_name+'"]').fadeIn(100, function f() {
                        $(this).attr('data-panel-status', 'active');
                    })
                });
            }
            else{
                count++;
                let director_id = $('input[data-type="director-id"]').val();
                $.ajax({
                    url: '/company/add_company',
                    dataType: 'json',
                    method: 'post',
                    data: {id: director_id, count: count},
                    success: function (data) {
                        $('.company-card').append(
                            '<div class="tab-panel" data-panel-status="disabled" style="display: none" data-panel-name="new-company '+count+'">'+
                            '<div class="row">'+
                            '<div class="col-5">'+
                            '<h1>Новая компания '+count+'</h1>'+
                            '</div>'+
                            '<div class="col-3 text-left" style="padding-top: 10px; padding-left: 0">'+
                            '<span data-type="company-status" data-id="'+data.data+'" data-status="0" style="font-size: 25px; color: #fd7e14;">Не активирована</span>'+
                            '</div>'+
                            '<div class="col-2 offset-2 text-center" style="margin-top:10px; padding-top: 10px">'+
                            '<i data-type="checked-edit" data-edit="false" data-id="'+data.data+'" style="color: #28a745; font-size: 1.31em; cursor: pointer; margin-right: 10px" class="fas fa-edit"></i>'+
                            '<i data-type="checked-block" data-block="false" data-id="'+data.data+'" style="color: #333333; font-size: 1.31em; cursor: pointer; margin-right: 10px" class="fas fa-lock"></i>'+
                            '<i data-type="checked-delete" data-delete="false" data-id="'+data.data+'" style="color: #DC3545; font-size: 1.31em; cursor: pointer; margin-right: 10px" class="fas fa-trash-alt"></i>'+
                            '</div>'+
                            '</div>'+
                            '<hr>'+
                            '<h2>Основная информация</h2>'+
                            '<hr>'+
                            '<div class="row row-description">'+
                            '<div class="col-2">'+
                            '<span>Директор:</span>'+
                            '</div>'+
                            '<div class="col-5">'+
                            '<span data-type="editable" data-id="'+data.data+'" data-option="1" data-edit-status="false"></span>'+
                            '</div>'+
                            '</div>'+
                            '<div class="row row-description">'+
                            '<div class="col-2">'+
                            '<span>ИНН/КПП:</span>'+
                            '</div>'+
                            '<div class="col-5">'+
                            '<span data-type="editable" data-id="'+data.data+'" data-option="2" data-edit-status="false"></span>'+
                            '</div>'+
                            '</div>'+
                            '<div class="row row-description">'+
                            '<div class="col-2">'+
                            '<span>ОГРН:</span>'+
                            '</div>'+
                            '<div class="col-5">'+
                            '<span data-type="editable" data-id="'+data.data+'" data-option="3" data-edit-status="false"></span>'+
                            '</div>'+
                            '</div>'+
                            '<hr>'+
                            '<h2>Адреса компании</h2>'+
                            '<hr>'+
                            '<div class="row row-description">'+
                            '<div class="col-2">'+
                            '<span>Юридический адрес:</span>'+
                            '</div>'+
                            '<div class="col-5">'+
                            '<span data-type="editable" data-id="'+data.data+'" data-option="4" data-edit-status="false"></span>'+
                            '</div>'+
                            '</div>'+
                            '<div class="row row-description">'+
                            '<div class="col-2">'+
                            '<span>Почтовый адрес:</span>'+
                            '</div>'+
                            '<div class="col-5">'+
                            '<span data-type="editable" data-id="'+data.data+'" data-option="5" data-edit-status="false"></span>'+
                            '</div>'+
                            '</div>'+
                            '<hr>'+
                            '<h2>Банк и счета</h2>'+
                            '<hr>'+
                            '<div class="row row-description">'+
                            '<div class="col-2">'+
                            '<span>Рассчетный счет:</span>'+
                            '</div>'+
                            '<div class="col-5">'+
                            '<span data-type="editable" data-id="'+data.data+'" data-option="6" data-edit-status="false"></span>'+
                            '</div>'+
                            '</div>'+
                            '<div class="row row-description">'+
                            '<div class="col-2">'+
                            '<span>Корреспондентский счет:</span>'+
                            '</div>'+
                            '<div class="col-5">'+
                            '<span data-type="editable" data-id="'+data.data+'" data-option="7" data-edit-status="false"></span>'+
                            '</div>'+
                            '</div>'+
                            '<div class="row row-description">'+
                            '<div class="col-2">'+
                            '<span>Название банка:</span>'+
                            '</div>'+
                            '<div class="col-5">'+
                            '<span data-type="editable" data-id="'+data.data+'" data-option="8" data-edit-status="false"></span>'+
                            '</div>'+
                            '</div>'+
                            '<div class="row row-description">'+
                            '<div class="col-2">'+
                            '<span>БИК:</span>'+
                            '</div>'+
                            '<div class="col-5">'+
                            '<span data-type="editable" data-id="'+data.data+'" data-option="9" data-edit-status="false"></span>'+
                            '</div>'+
                            '</div>'+
                            '<div class="row row-description">'+
                            '<div class="col-2">'+
                            '<span>ОКПО:</span>'+
                            '</div>'+
                            '<div class="col-5">'+
                            '<span data-type="editable" data-id="'+data.data+'" data-option="10" data-edit-status="false"></span>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        );
                        $('.tab-btn').removeClass('tab-btn').addClass('tab-btn-dis').attr('data-status', 'disabled');
                        $('div[data-tab-name="add-company"]').before('<div class="tab-btn" style="display: inline; margin-left: -6px;" data-tab-count="'+ count +'" data-status = "active" data-tab-name = "new-company '+count+'"><span>Новая компания '+ count +'</span></div>');
                        $('.tab-panel[data-panel-status="active"]').fadeOut(300, function () {
                            $(this).attr('data-panel-status', 'disabled');
                            $('.tab-panel[data-panel-name="new-company '+count+'"]').fadeIn(300, function () {
                                $(this).attr('data-panel-status', 'active');
                            });
                        })
                    }
                })
            }

        });
        /*company_handler.on('mouseover', 'i[data-type="checked-edit"]', function (e) {
            $(e.target).addClass('animated wobble')
        });
        company_handler.on('mouseout', 'i[data-type="checked-edit"]', function (e) {
            setTimeout(function () {
                $(e.target).removeClass(' wobble')
            }, 500)

        });

        company_handler.on('mouseover', 'i[data-type="checked-block"]', function (e) {
            $(e.target).addClass('animated wobble')
        });
        company_handler.on('mouseout', '', function (e) {
            setTimeout(function () {
                $(e.target).removeClass(' wobble')
            }, 500)

        });

        company_handler.on('mouseover', 'i[data-type="checked-delete"]', function (e) {
            $(e.target).addClass('animated wobble')
        });
        company_handler.on('mouseout', '', function (e) {
            setTimeout(function () {
                $(e.target).removeClass(' wobble')
            }, 500)

        });*/

        company_handler.on('click', 'i[data-type="checked-edit"]', function (e) {
            let icon = $(this);
            let edit =  icon.attr('data-edit');
            let number = icon.parent().prev().children().attr('data-status');
            let status;
            let color;
            let text;
            switch (number) {
                case '1':
                    color = '#28a745';
                    status = 'Активирована';
                    break;
                case '2':
                    color = '#6c757d';
                    status = 'Заблокирована';
                    break;
                case '0':
                    color = '#ffc107';
                    status = 'Не активирована';
                    break;
                case '3':
                    color = '#DC3545';
                    status = 'Запрос на удаление';
                    break
                case '4':
                    color = '#6c757d';
                    status = 'Запрос на блокировкку';
                    break;
                case '5':
                    color = '#6c757d';
                    status = 'На модерации';
                    break;
            }
            //'#6c757d'
            if(edit === 'true'){
                $('i[data-type="disabled-block"]').css({'color': '#333333', cursor: 'pointer'}).attr('data-type', 'checked-block');
                $('i[data-type="disabled-delete"]').css({'color': '#DC3545', cursor: 'pointer'}).attr('data-type', 'checked-delete');
                icon.parent().prev().children().css({'color': color,
                    'stroke': '1px rgba(0,0,0,1)'
                }).text(status);
                let list = $('input[data-option]');
                $.each(list, function (key, item) {
                    text = $(item).val();
                    $(item).unbind();
                    $('.message').remove();
                    $(item).replaceWith('<span data-type="editable" data-option="'+$(item).attr('data-option')+'">'+text+'</span>')
                });
                icon.attr('data-edit', 'false')
            }
            else{
                $('i[data-type="checked-block"]').css({'color': '#6c757d', cursor: 'default'}).attr('data-type', 'disabled-block');
                $('i[data-type="checked-delete"]').css({'color': '#6c757d', cursor: 'default'}).attr('data-type', 'disabled-delete');
                icon.attr('data-edit', 'true');
                icon.parent().prev().children().css('color', '#6c757d').text('Редактирование');
                let list = icon.parent().parent().nextAll('.row-description').children().next().children();
                $.each(list, function (key, item) {
                    text = $(item).text();
                    $(item).replaceWith('<input class="btn-block" value="'+text+'" data-option="'+$(item).attr('data-option')+'" type="text">')
                });
                /*let organization_name = $('input[data-option="1"]');*/
                let director_name = $('input[data-option="1"]');
                let inn_kpp = $('input[data-option="2"]');
                let ogrn = $('input[data-option="3"]');
                let juridical_address = $('input[data-option="4"]');
                let postal_address = $('input[data-option="5"]');
                let settlement_account = $('input[data-option="6"]');
                let correction_account = $('input[data-option="8"]');
                let bank_name = $('input[data-option="7"]');
                let bik = $('input[data-option="9"]');
                let okpo = $('input[data-option="10"]');

                let form = {
                    director_name: {field: director_name, value: director_name.val().trim(), option: 1},
                    inn_kpp: {field: inn_kpp, value: inn_kpp.val().trim(), option: 2},
                    ogrn: {field: ogrn, value: ogrn.val().trim(), option: 3},
                    juridical_address: {field: juridical_address, value: juridical_address.val().trim(), option: 4},
                    postal_address: {field: postal_address, value: postal_address.val().trim(), option: 5},
                    settlement_account: {field: settlement_account, value: settlement_account.val().trim(), option: 6},
                    correction_account: {field: correction_account, value: correction_account.val().trim(), option: 8},
                    bank_name: {field: bank_name, value: bank_name.val().trim(), option: 7},
                    bik: {field: bik, value: bik.val().trim(), option: 9},
                    okpo: {field: okpo, value: okpo.val().trim(), option: 10}
                };
                let error = false;
                let status;
                let option = {
                    director_name : {type: 'string', min_length: '6', regexp: /^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}$/},
                    inn_kpp : {type: 'string', min_length: 12, max_length: 20, regexp: /^[0-9]{12}|([0-9]{10}\/[0-9]{9})$/ },
                    ogrn : {type: 'string', min_length: 13, max_length: 15, regexp: /^[0-9]{13,15}$/ },
                    juridical_address : {type: 'string', min_length: '5'},
                    postal_address : {type: 'string', min_length: '5'},
                    settlement_account : {type: 'string', min_length: 20, max_length: 20, regexp: /^[0-9]{20}$/},
                    correction_account :{type: 'string', min_length: 20, max_length: 20, regexp: /^[0-9]{20}$/},
                    bank_name : {type: 'string', min_length: '2'},
                    bik : {type: 'string', min_length: 9, max_length: 9, regexp: /^[0-9]{9}$/},
                    okpo : {type: 'string', min_length: 8, max_length: 10, regexp: /^[0-9]{8,10}$/},
                };
                let valid_result = {
                    director_name: {valid: valid_field(form.director_name.value, option.director_name), field: form.director_name.field},
                    inn_kpp : {valid: valid_field(form.inn_kpp.value, option.inn_kpp), field: form.inn_kpp.field},
                    ogrn : {valid: valid_field(form.ogrn.value, option.ogrn), field: form.ogrn.field},
                    juridical_address : {valid: valid_field(form.juridical_address.value, option.juridical_address), field: form.juridical_address.field},
                    postal_address : {valid: valid_field(form.postal_address.value, option.postal_address), field: form.postal_address.field},
                    settlement_account : {valid: valid_field(form.settlement_account.value, option.settlement_account), field: form.settlement_account.field},
                    correction_account : {valid: valid_field(form.correction_account.value, option.correction_account), field: form.correction_account.field},
                    bank_name : {valid: valid_field(form.bank_name.value, option.bank_name), field: form.bank_name.field},
                    bik : {valid: valid_field(form.bik.value, option.bik), field: form.bik.field},
                    okpo : {valid: valid_field(form.okpo.value, option.okpo), field: form.okpo.field},
                };
                $.each(valid_result, function (key, item) {

                    let delete_message = function () {
                        $(item.field).next().text('')
                    };
                    $(item.field).after('<span class="message" style="color: #DC3545; font-weight: 700; margin-left: 15px"></span>');
                    if(item.valid.error){
                        $(item.field).next().css('color', '#DC3545').text(item.valid.message)
                    }
                    $(item.field).keyup(function (e) {
                        status = valid_field(item.field.val(), option[key]);
                        if(status.error){
                            clearTimeout(delete_message);
                            $(item.field).next().css('color', '#DC3545').text(status.message)
                        }
                        else{
                            console.log( $(item.field).val() + ' ' + form[key].option);
                            $.ajax({
                                url: '/company/update_field',
                                method: 'post',
                                dataType: 'json',
                                data: {
                                    id: $(icon).attr('data-id'),
                                    data: $(item.field).val(),
                                    number: form[key].option
                                },
                                success: function (data) {
                                    if (data.error) {

                                    }
                                    else {
                                        icon.parent().prev().children().attr('data-status', 5);
                                        $(item.field).next().css('color', '#28a745').text('Запись сохранена');
                                        setTimeout(delete_message, 1500)
                                    }
                                }
                            });
                        }
                    })
                })

            }
        });
        company_handler.on('click', 'i[data-type="checked-block"]', function (e) {
            let trash = $(this);
            let deleted =  trash.attr('data-block');
            let status = trash.parent().prev().children().attr('data-status');
            let color;
            let text;
            switch (status) {
                case '1':
                    color = '#28a745';
                    text = 'Активирована';
                    break;
                case '2':
                    color = '#6c757d';
                    text = 'Заблокирована';
                    break;
                case '0':
                    color = '#ffc107';
                    text = 'Не активирована';
                    break;
                case '3':
                    color = '#DC3545';
                    text = 'Запрос на удаление';
                    break
                case '4':
                    color = '#6c757d';
                    text = 'Запрос на блокировку';
                    break;
                case '5':
                    color = '#6c757d';
                    text = 'На модерации';
                    break;
            }
            $.ajax({
                url: '/company/update_blocked_at',
                method: 'post',
                dataType: 'json',
                data: {delete: deleted, id: trash.attr('data-id'), status: status},
                success: function (data) {
                    if(!data.error){
                        if(deleted === 'true'){
                            $('i[data-type="disabled-edit"]').css({'color': '#28a745', cursor: 'pointer'}).attr('data-type', 'checked-edit');
                            $('i[data-type="disabled-delete"]').css({'color': '#DC3545', cursor: 'pointer'}).attr('data-type', 'checked-delete');
                            trash.parent().prev().children().css({'color': '#ffc107',
                                'stroke': '1px rgba(0,0,0,1)'
                            }).text('Не активирована');
                            trash.attr('data-block', 'false')
                        }
                        else{
                            $('i[data-type="checked-edit"]').css({'color': '#6c757d', cursor: 'default'}).attr('data-type', 'disabled-edit');
                            $('i[data-type="checked-delete"]').css({'color': '#6c757d', cursor: 'default'}).attr('data-type', 'disabled-delete');
                            trash.parent().prev().children().css('color', '#6c757d').text('Запрос на блокировку');
                            trash.attr('data-block', 'true')
                        }

                    }
                }
            })
        });
        company_handler.on('click', 'i[data-type="checked-delete"]', function (e) {
            let trash = $(this);
            let deleted =  trash.attr('data-delete');
            let status = trash.parent().prev().children().attr('data-status');
            let color;
            let text;
            switch (status) {
                case '1':
                    color = '#28a745';
                    text = 'Активирована';
                    break;
                case '2':
                    color = '#6c757d';
                    text = 'Заблокирована';
                    break;
                case '0':
                    color = '#ffc107';
                    text = 'Не активирована';
                    break;
                case '3':
                    status = 0;
                    color = '#ffc107';
                    text = 'Не активирована';
                    break;
            }
            $.ajax({
                url: '/company/update_deleted_at',
                method: 'post',
                dataType: 'json',
                data: {delete: deleted, id: trash.attr('data-id'), status: status},
                success: function (data) {
                    if(!data.error){
                        if(deleted === 'true'){
                            $('i[data-type="disabled-edit"]').css({'color': '#28a745', cursor: 'pointer'}).attr('data-type', 'checked-edit');
                            $('i[data-type="disabled-block"]').css({'color': '#333', cursor: 'pointer'}).attr('data-type', 'checked-block');
                            trash.parent().prev().children().css({'color': color,
                                'stroke': '1px rgba(0,0,0,1)'
                            }).text(text);
                            trash.attr('data-delete', 'false')
                        }
                        else{
                            $('i[data-type="checked-edit"]').css({'color': '#6c757d', cursor: 'default'}).attr('data-type', 'disabled-edit');
                            $('i[data-type="checked-block"]').css({'color': '#6c757d', cursor: 'default'}).attr('data-type', 'disabled-block');
                            trash.parent().prev().children().css('color', '#DC3545').text('Запрос на удаление');
                            trash.attr('data-delete', 'true')
                        }

                    }
                }
            })
        });
        company_handler.on('input', '.filter-input', function (e) {
            let input = e.target;
            let sort_type = $('.filter-type').val();
            let head_row_list = $('table thead tr');
            let body_row_list = $('table tbody tr');
            let head_column_list = head_row_list.children();
            let body_column_list = body_row_list.children();
            let paginate_button = $('.index-button');
            let show_count = 0;
            let column_number = 0;
            console.log(sort_type+' '+head_row_list+' '+body_row_list+' '+head_column_list+' '+body_column_list+' '+paginate_button)
            /*$.each(paginate_button, function (key, item) {
                $(item).show();
            });*/
            $.each(head_column_list, function (key, item) {
                if($(item).children().children().children().text() === sort_type){
                    column_number = key;
                }
            });
            $.each(body_row_list, function (key, item) {
                let value;
                if($(item.children[column_number]).children().hasClass('pseudo-link')){
                    value = $(item.children[column_number]).children().text().trim();
                }
                else{
                    value = $(item.children[column_number]).text().trim();
                }
                if($(input).val() !== ''){
                    if(value.includes($(input).val())){
                        show_count++;
                        $(item).addClass('show');
                        $(item).show();
                    }
                    else{
                        $(item).removeClass('show');
                        $(item).hide();
                    }
                }
                else{
                    $(item).addClass('show');
                    $(item).show();
                }


            });
            let button_count = Math.ceil(show_count/10);
            $.each(paginate_button, function (key, item) {
                if(button_count===0){
                    $(item).show();
                }
                else{
                    if($(item).attr('data-dt-idx')>button_count){
                        $(item).hide();
                    }
                    else{
                        $(item).show();
                    }
                }
            });
        });
    })
</script>
</div>