<div class="submodule company" data-status="active">
    <input type="text" data-type="director-id" hidden value="<?php echo $_SESSION['user']['director_id'];?>">
    <div class="row">
        <div class="col-md-12">
            <?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['company']['create'])):?>
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
            <?php else:?>
                <div class="row">
                    <div class="col-10 offset-2">
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
            <?php endif;?>
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
                                            <td class="text-center" style="border: 1px solid #dee2e6; background: #fd7e14; color: #fff; font-weight: 700;">Не активирована</td>
                                            <?php break; case 1:?>
                                            <td class="text-center" style="border: 1px solid #dee2e6; background: #28a745; color: #fff; font-weight: 700;">Активирована</td>
                                            <?php break; case 2:?>
                                            <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Заблокирована</td>
                                            <?php break; case 3:?>
                                            <td class="text-center" style="border: 1px solid #dee2e6; background: #DC3545; color: #fff; font-weight: 700;">Запрос на удаление</td>
                                            <?php break; case 4:?>
                                            <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Запрос на бокировку</td>
                                            <?php break; case 5:?>
                                            <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Модерация</td>
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
</div>