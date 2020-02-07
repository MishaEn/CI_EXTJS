<div class="submodule employee" data-status="disabled" data-submoudle-appliaction = "employee">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-2">
                    <button class="btn btn-block submit create-employee btn-primary btn-block">Добавить</button>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-4 text-right">
                            <span class="align-middle">Фильтровать по:</span>
                        </div>
                        <div class="col-2">
                            <div class="input-group mb-3">
                                <select class="custom-select filter-type">
                                    <option value="ФИО">ФИО</option>
                                    <option value="Логин">Логин</option>
                                    <option value="Email">Email</option>
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
            <?php if($_SESSION['user']['role_id'] == 2):?>
                <div class="card">
                    <div class="card-body order-card" style="height: 65vh;!important; overflow-y: scroll; overflow-x: hidden">
                        <?php if(!$data['error']):?>
                            <table class="table table-borderless table-hover">
                                <thead>
                                <tr>
                                    <th class="col-3" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>ФИО</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-3" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Логин</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-2" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Email</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-2" style="border: 1px solid #dee2e6"><div class="row"><div class="col-9"><span>Статус</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-1"></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php for ($i = 1; $i<= 1; $i++):?>
                                    <?php foreach($data['data'] as $item):?>
                                        <tr class="show">
                                            <td  style="border: 1px solid #dee2e6"><span data-modal = "employee" class="pseudo-link"><?php echo $item['full_name'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                            <td  style="border: 1px solid #dee2e6"><span><?php echo $item['login'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                            <td class="" style="border: 1px solid #dee2e6"><span><?php echo $item['email'];?></span><input type="text" value="<?php echo $item['director_id'];?>" hidden></td>
                                            <?php switch($item['status']):
                                                case 0:?>
                                                    <td class="text-center" style="border: 1px solid #dee2e6; background: #fd7e14; color: #fff; font-weight: 700;">Не активирован</td>
                                                    <?php break; case 1:?>
                                                    <td class="text-center" style="border: 1px solid #dee2e6; background: #28a745; color: #fff; font-weight: 700;">Активирован</td>
                                                    <?php break; case 2:?>
                                                    <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Заблокирован</td>
                                                    <?php break; case 3:?>
                                                    <td class="text-center" style="border: 1px solid #dee2e6; background: #DC3545; color: #fff; font-weight: 700;">Запрос на удаление</td>
                                                    <?php break; case 4:?>
                                                    <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Запрос на блокировку</td>
                                                    <?php break; case 5:?>
                                                    <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">На модерации</td>
                                                    <?php break;
                                            endswitch;?>
                                            <td style="border: 1px solid #dee2e6" class="text-center">
                                                <i style="color: #2d2e2c; font-size: 18px; cursor: pointer" data-toggle="close" class="fa fa-cog employee-settings"></i><input type="text" value="<?php echo $item['id'];?>" hidden>
                                                <div class="option-holder" style="display: none; position: absolute;">
                                                    <ul class="drop-menu">
                                                        <li><span class="menu-button" data-target = "modal" data-action="get_update_employee">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                        <li><span class="menu-button" data-target = "employee" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td hidden>
                                                <input type="text" value="<?php echo $item['id'];?>" hidden>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endfor;?>
                                </tbody>
                            </table>
                        <?php else:?>
                            <h1>Список сотрудников пуст.</h1>
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
            <?php else:?>
                <div class="card">
                    <div class="card-body order-card" style="height: 65vh;!important; overflow-y: scroll; overflow-x: hidden">
                        <?php if(!$data['error']):?>
                            <table class="table table-borderless table-hover">
                                <thead>
                                <tr>
                                    <th class="col-3" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>ФИО</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-3" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Логин</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-2" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Email</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-2" style="border: 1px solid #dee2e6"><div class="row"><div class="col-9"><span>Статус</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="col-1"></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php for ($i = 1; $i<= 1; $i++):?>
                                    <?php foreach($data['data'] as $item):?>
                                        <tr class="show">
                                            <td  style="border: 1px solid #dee2e6"><span data-modal = "employee" class="pseudo-link"><?php echo $item['full_name'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                            <td  style="border: 1px solid #dee2e6"><span><?php echo $item['login'];?></span><input type="text" value="<?php echo printable($item).$item['id'];?>" hidden></td>
                                            <td class="" style="border: 1px solid #dee2e6"><span><?php echo $item['email'];?></span><input type="text" value="<?php echo $item['director_id'];?>" hidden></td>
                                            <?php switch($item['status']):
                                                case 0:?>
                                                    <td class="text-center" style="border: 1px solid #dee2e6; background: #fd7e14; color: #fff; font-weight: 700;">Не активирован</td>
                                                <?php break; case 1:?>
                                                    <td class="text-center" style="border: 1px solid #dee2e6; background: #28a745; color: #fff; font-weight: 700;">Активирован</td>
                                                <?php break; case 2:?>
                                                    <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Заблокирован</td>
                                                <?php break; case 3:?>
                                                    <td class="text-center" style="border: 1px solid #dee2e6; background: #DC3545; color: #fff; font-weight: 700;">Запрос на удаление</td>
                                                <?php break; case 4:?>
                                                    <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Запрос на блокировку</td>
                                                <?php break; case 5:?>
                                                    <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">На модерации</td>
                                                <?php break;
                                            endswitch;?>
                                            <td style="border: 1px solid #dee2e6" class="text-center">
                                                <i style="color: #2d2e2c; font-size: 18px; cursor: pointer" data-toggle="close" class="fa fa-cog employee-settings"></i><input type="text" value="<?php echo $item['id'];?>" hidden>
                                                <div class="option-holder" style="display: none; position: absolute;">
                                                    <?php switch($item['status']):
                                                        case 0:?>
                                                            <ul class="drop-menu">
                                                                <li><span class="menu-button" data-target = "modal" data-action="get_activate_employee">Активировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "modal" data-action="get_update_employee">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "employee" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            </ul>
                                                            <?php break;
                                                        case 1:?>
                                                            <ul class="drop-menu">
                                                                <li><span class="menu-button" data-target = "modal" data-action="get_update_employee">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "employee" data-action="deactivate">Деактивировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "employee" data-action="block">Заблокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "employee" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            </ul>
                                                            <?php break;
                                                        case 2:?>
                                                            <ul class="drop-menu">
                                                                <li><span class="menu-button" data-target = "modal" data-action="get_update_employee">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "employee" data-action="deactivate">Деактивировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "employee" data-action="unlock">Разбокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "employee" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
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
                                <?php endfor;?>
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
            <?php endif;?>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            setInterval(function () {
                let id_list =
                $.ajax({
                    url: '/employee/check_check_status',
                    method: 'post',
                    dataType: 'json',
                    data: {id: id_list,
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
        })
    </script>
</div>

