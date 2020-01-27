<?php if($_SESSION['user']['role_id'] == 2):?>

    <div class="submodule company" data-status="active" data-submoudle-appliaction = "company">
        <!--    --><?php
        /*        if(in_array('2', $_SESSION['role_policy']['company']['read'][0])){
                    echo 'Доступ разрешен';
                }
            */?>
        <?php if($data['error']):?>
            <?php if($data['status'] === 'fetch error'):?>
                <div class="row">
                    <div class="col-2" >
                        <button class="btn btn-block submit create-company btn-primary btn-block">Добавить</button>
                    </div>
                </div>
                <div class="row" style="padding-top: 10px">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body company-card" style="height: 73vh;!important;">

                                <h1>У Вас нет зарегистрированных команий</h1>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        <?php else:?>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-wrapper" style="z-index: 2000;">
                        <div class="tab-btn" style="display: inline; z-index: 1200" data-status = "active" data-tab-name = "<?php echo $data['data'][0]['organization_name'];?>">
                            <span><?php echo $data['data'][0]['organization_name'];?></span>
                        </div>
                        <?php for($i = 1; $i<count($data['data']); $i++):?>
                            <div class="tab-btn-dis" style="display: inline; margin-left: -6px; z-index: <?php echo 1200-$i;?>" data-status = "disabled" data-tab-name = "<?php echo $data['data'][$i]['organization_name'];?>">
                                <span><?php echo $data['data'][$i]['organization_name'];?></span>
                            </div>
                        <?php endfor;?>
                    </div>
                    <div class="card" style="z-index: 1100; margin-top: 9px">
                        <div class="card-body company-card" style="height: 65vh;">
                            <div class="tab-panel" data-panel-status="active" data-panel-name="<?php echo $data['data'][0]['organization_name'];?>">
                                <?php
                                if($data['data'][0]['status'] === 1){
                                    $color = '#28a745';
                                    $text = 'Активирована';
                                }
                                elseif($data['data'][0]['status'] === 2){
                                    $color = '#6c757d';
                                    $text = 'Заблокирована';
                                }
                                else{
                                    $color = '#dc3545';
                                    $text = 'Не активирована';
                                }
                                ?>
                                <h1><?php echo $data['data'][0]['organization_name'];?> <span style="font-size: 20px; color: <?php echo $color;?>;margin-left: 30px"><?php echo $text;?></span></h1>
                                <h2>Основная информация</h2>
                                <div class="span">
                                    <span>Директор:</span>
                                    <span><?php echo $data['data'][0]['director_name'];?></span>
                                </div>
                                <div class="span">
                                    <span>ИНН/КПП:</span>
                                    <span><?php echo $data['data'][0]['inn_kpp'];?></span>
                                </div>
                                <div class="span">
                                    <span>ОГРН:</span>
                                    <span><?php echo $data['data'][0]['ogrn'];?></span>
                                </div>
                                <h2>Адреса компании</h2>
                                <div class="span">
                                    <span>Юридический адрес:</span>
                                    <span><?php echo $data['data'][0]['juridical_address'];?></span>
                                </div>
                                <div class="span">
                                    <span>Почтовый адрес:</span>
                                    <span><?php echo $data['data'][0]['postal_adress'];?></span>
                                </div>
                                <h2>Банки и счета</h2>
                                <div class="span">
                                    <span>Рассчетный счет:</span>
                                    <span><?php echo $data['data'][0]['settlement_account'];?></span>
                                </div>
                                <div class="span">
                                    <span>Корреспондентский счет:</span>
                                    <span><?php echo $data['data'][0]['correction_account'];?></span>
                                </div>
                                <div class="span">
                                    <span>Название банка:</span>
                                    <span><?php echo $data['data'][0]['bank_name'];?></span>
                                </div>
                                <div class="span">
                                    <span>БИК:</span>
                                    <span><?php echo $data['data'][0]['bik'];?></span>
                                </div>
                                <div class="span">
                                    <span>ОКПО:</span>
                                    <span><?php echo $data['data'][0]['okpo'];?></span>
                                </div>
                            </div>
                            <?php foreach ($data['data']  as $key => $item):?>
                                <?php   if ($key === 0)continue?>
                                <div class="tab-panel" data-panel-status="disabled" style="display: none" data-panel-name="<?php echo $item['organization_name'];?>">
                                    <?php
                                    if($item['status'] === 1){
                                        $color = '#28a745';
                                        $text = 'Активирована';
                                    }
                                    elseif($item['status'] === 2){
                                        $color = '#6c757d';
                                        $text = 'Заблокирована';
                                    }
                                    else{
                                        $color = '#dc3545';
                                        $text = 'Не активирована';
                                    }
                                    ?>
                                    <h1><?php echo $item['organization_name'];?> <span style="font-size: 20px; color: <?php echo $color;?>;margin-left: 30px"><?php echo $text;?></span></h1>
                                    <h2>Основная информация</h2>
                                    <div class="span">
                                        <span>Директор:</span>
                                        <span><?php echo $item['director_name'];?></span>
                                    </div>
                                    <div class="span">
                                        <span>ИНН/КПП:</span>
                                        <span><?php echo $item['inn_kpp'];?></span>
                                    </div>
                                    <div class="span">
                                        <span>ОГРН:</span>
                                        <span><?php echo $item['ogrn'];?></span>
                                    </div>
                                    <h2>Адреса компании</h2>
                                    <div class="span">
                                        <span>Юридический адрес:</span>
                                        <span><?php echo $item['juridical_address'];?></span>
                                    </div>
                                    <div class="span">
                                        <span>Почтовый адрес:</span>
                                        <span><?php echo $item['postal_adress'];?></span>
                                    </div>
                                    <h2>Банк и счета</h2>
                                    <div class="span">
                                        <span>Рассчетный счет:</span>
                                        <span><?php echo $item['settlement_account'];?></span>
                                    </div>
                                    <div class="span">
                                        <span>Корреспондентский счет:</span>
                                        <span><?php echo $item['correction_account'];?></span>
                                    </div>
                                    <div class="span">
                                        <span>Название банка:</span>
                                        <span><?php echo $item['bank_name'];?></span>
                                    </div>
                                    <div class="span">
                                        <span>БИК:</span>
                                        <span><?php echo $item['bik'];?></span>
                                    </div>
                                    <div class="span">
                                        <span>ОКПО:</span>
                                        <span><?php echo $item['okpo'];?></span>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                        <div class="card-footer clearfix">

                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
    </div>
<?php else:?>
    <div class="submodule company" data-status="active">
        <!--    --><?php
        /*        if(in_array('2', $_SESSION['role_policy']['company']['read'][0])){
                    echo 'Доступ разрешен';
                }
            */?>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-2">
                        <button class="btn btn-block submit create-company btn-primary btn-block">Добавить</button>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4 text-right">
                                <span class="align-middle">Фильтровать по:</span>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select class="custom-select filter-type">
                                        <option value="Название">Названию</option>
                                        <option value="Директор">Директору</option>
                                        <option value="Код">Коду</option>
                                        <option value="Комментарий">Комментарию</option>
                                        <option value="Статус">Статусу</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control filter-input" data-placeholder ="Значение фильтра"  placeholder="Значение фильтра">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body company-card" style="height: 65vh;!important; overflow-y: scroll; overflow-x: hidden">
                        <?php if(!$data['error']):?>
                            <table class="table table-borderless table-hover">
                                <thead>
                                <tr>
                                    <th class="col-3" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Название</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-2" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Директор</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-1" style="border: 1px solid #dee2e6"><div class="row"><div class="col-9"><span>Код</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-3" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Комментарий</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-2" style="border: 1px solid #dee2e6"><div class="row"><div class="col-9"><span>Статус</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-1"></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach($data['data'] as $item):?>
                                    <tr class="show">
                                        <td  style="border: 1px solid #dee2e6"><span data-modal = "company" class="pseudo-link"><?php echo $item['organization_name'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                        <td class="" style="border: 1px solid #dee2e6"><span data-modal = "director" class="pseudo-link"><?php echo $item['director_name'];?></span><input type="text" value="<?php echo $item['director_id'];?>" hidden></td>
                                        <td class="" style="border: 1px solid #dee2e6"><span data-modal = "company" class="pseudo-link"><?php echo $item['code'];?></span> <input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                        <td class="" style="border: 1px solid #dee2e6"><?php echo $item['comment'];?></td>
                                        <?php switch($item['status']):
                                            case 0:?>
                                                <td class="text-center" style="border: 1px solid #dee2e6; background: #dc3545; color: #fff; font-weight: 700;">Не активирована</td>
                                                <?php break; case 1:?>
                                                <td class="text-center" style="border: 1px solid #dee2e6; background: #28a745; color: #fff; font-weight: 700;">Активирована</td>
                                                <?php break; case 2:?>
                                                <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Заблокирована</td>
                                                <?php break; endswitch;?>
                                        <td style="border: 1px solid #dee2e6" class="text-center">
                                            <i style="color: #2d2e2c; font-size: 18px; cursor: pointer" data-toggle="close" class="fa fa-cog company-settings"></i><input type="text" value="<?php echo $item['id'];?>" hidden>
                                            <div class="option-holder" style="display: none; position: absolute;">
                                                <?php switch($item['status']):
                                                    case 0:?>
                                                        <ul class="drop-menu">
                                                            <li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Активировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                        </ul>
                                                        <?php break;
                                                    case 1:?>
                                                        <ul class="drop-menu">
                                                            <li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "company" data-action="deactivate">Деактивировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                        </ul>
                                                        <?php break;
                                                    case 2:?>
                                                        <ul class="drop-menu">
                                                            <li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "company" data-action="deactivate">Деактивировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "company" data-action="unlock">Разбокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                        </ul>
                                                        <?php break;
                                                endswitch;?>
                                            </div>
                                        </td>
                                        <td hidden>
                                            <input type="text" value="<?php echo $item['id'];?>" hidden>
                                        </td>
                                    </tr>

                                <?php endforeach;?>
                                </tbody>
                            </table>
                        <?php else:?>
                            <h1>Список компаний пуст. Добавьте новую компанию.</h1>
                        <?php endif;?>

                    </div>
                    <div class="card-footer clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div></div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate" style="margin-left: 100px">
                                    <ul class="pagination justify-content-end">
                                        <li class="paginate_button page-item previous disabled" id="example2_previous">
                                            <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link link-red">«</a>
                                        </li>
                                        <li class="paginate_button page-item next" id="example2_next">
                                            <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link link-red">»</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php endif;?>
        <script>

</script>
    </div>
