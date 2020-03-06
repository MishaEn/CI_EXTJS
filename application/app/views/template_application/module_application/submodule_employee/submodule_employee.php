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
                                    <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>ФИО</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Логин</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Email</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-9"><span>Статус</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class=""></th>
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
                                    <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>ФИО</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Логин</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Email</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-9"><span>Статус</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                    <th class=""></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php for ($i = 1; $i<= 1; $i++):?>
                                    <?php foreach($data['data'] as $item):?>
                                        <tr class="show" data-id="<?php echo $item['id'];?>">
                                            <td  style="border: 1px solid #dee2e6"><span data-modal = "employee" class="pseudo-link"><?php echo $item['full_name'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                            <td  style="border: 1px solid #dee2e6"><span><?php echo $item['login'];?></span><input type="text" value="<?php echo printable($item).$item['id'];?>" hidden></td>
                                            <td class="" style="border: 1px solid #dee2e6"><span><?php echo $item['email'];?></span><input type="text" value="<?php echo $item['director_id'];?>" hidden></td>
                                            <?php switch($item['status']):
                                                case 0:?>
                                                    <td class="text-center" data-status="0" style="border: 1px solid #dee2e6; background: #fd7e14; color: #fff; font-weight: 700;">Не активирован</td>
                                                <?php break; case 1:?>
                                                    <td class="text-center" data-status="1" style="border: 1px solid #dee2e6; background: #28a745; color: #fff; font-weight: 700;">Активирован</td>
                                                <?php break; case 2:?>
                                                    <td class="text-center" data-status="2" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Заблокирован</td>
                                                <?php break; case 3:?>
                                                    <td class="text-center" data-status="3" style="border: 1px solid #dee2e6; background: #DC3545; color: #fff; font-weight: 700;">Запрос на удаление</td>
                                                <?php break; case 4:?>
                                                    <td class="text-center" data-status="4" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Запрос на блокировку</td>
                                                <?php break; case 5:?>
                                                    <td class="text-center" data-status="5" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">На модерации</td>
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
                let id_list = '';
                $('.show').each(function (key, item) {
                    id_list = id_list+','+$(item).attr('data-id')
                });
                $.ajax({
                    url: '/employee/check_employee_status',
                    method: 'post',
                    dataType: 'json',
                    data: {id: id_list.substr(1)},
                    success: function (data) {
                        let color;
                        let status;
                        if(!data.error) {
                            $.each(data.data, function (key, item) {
                                switch (item.status) {
                                    case 1:
                                        color = '#28a745';
                                        status = 'Активирована';
                                        break;
                                    case 2:
                                        color = '#6c757d';
                                        status = 'Заблокирована';
                                        break;
                                    case 0:
                                        color = '#ffc107';
                                        status = 'Не активирована';
                                        break;
                                    case 3:
                                        color = '#DC3545';
                                        status = 'Запрос на удаление';
                                        break
                                    case 4:
                                        color = '#6c757d';
                                        status = 'Запрос на блокировкку';
                                        break;
                                    case 5:
                                        color = '#6c757d';
                                        status = 'На модерации';
                                        break;
                                }
                                let td =  $('.show[data-id="'+item.id+'"]').children()[3];
                                $(td).css('background', color).text(status);
                                console.log(item.id)
                            })
                        }
                    }
                })
            },1000*30);
        });
/*
        director_handler.on('click', '.index-button', function (event) {
            let prev_button = $('.previous');
            let next_button = $('.next');
            let page_number =  $(event.target).attr('data-dt-idx');
            $(prev_button).attr('data-dt-idx', --page_number);
            $(next_button).attr('data-dt-idx', ++page_number);
            $('.previous a').attr('data-dt-idx', --page_number);
            $('.next a').attr('data-dt-idx', ++page_number);
            $('.active').removeClass('active');

            if($(event.target).hasClass('paginate_button')){
                $(event.target).addClass('active');
            }
            else{
                $(event.target).parent().addClass('active');
            }
            let start_view_count;
            let end_view_count;
            if( $(event.target).attr('data-dt-idx')===1){
                start_view_count = 0;
                end_view_count = 10;
            }
            else {
                start_view_count = ($(event.target).attr('data-dt-idx')-1)*10;
                end_view_count = start_view_count + 10;
            }
            let span_start = start_view_count+1;
            let span_end;
            if(row_count > end_view_count){
                span_end = end_view_count;
            }
            else{
                span_end = row_count;
            }
            $.each(row_list, function (key, item) {
                if(key === 1){
                    $(this).show();
                }
                if(key >= start_view_count && key < end_view_count){
                    $('.dataTables_info').text('Показано от '+span_start+' до '+span_end+' из '+row_count+' записей');
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
            });
        });*/
    </script>
</div>

