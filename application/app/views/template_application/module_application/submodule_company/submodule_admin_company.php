<div class="submodule company" data-status="disabled">
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
                <div class="card-body company-card" style="height: 70vh;!important; overflow-y: scroll; overflow-x: hidden">
                    <?php if(!$data['error']):?>
                        <table class="table table-borderless table-hover">
                            <thead>
                            <tr>
                                <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Название</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Директор</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-9"><span>Код</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Комментарий</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6"><div class="row"><div class="col-9"><span>Статус</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>
                                <th class=""></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach($data['data'] as $item):?>
                                <tr class="show" data-id="<?php echo $item['id']?>">
                                    <td  style="border: 1px solid #dee2e6"><span data-modal = "company" data-action="get_company_modal" data-data="<?php echo $item['id']?>" class="pseudo-link"><?php echo $item['organization_name'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                    <td class="" style="border: 1px solid #dee2e6"><span data-modal = "director" data-action="get_director_modal" data-data="<?php echo $item['director_id']?>" class="pseudo-link"><?php echo $item['director_name'];?></span><input type="text" value="<?php echo $item['director_id'];?>" hidden></td>
                                    <td class="" style="border: 1px solid #dee2e6"><span data-modal = "company"  data-action="get_company_modal" data-data="<?php echo $item['id']?>" class="pseudo-link"><?php echo $item['code'];?></span> <input type="text" value="<?php echo $item['id'];?>" hidden></td>
                                    <td class="" style="border: 1px solid #dee2e6"><?php echo $item['comment'];?></td>
                                    <?php switch($item['status']):
                                        case 0:?>
                                            <td class="text-center" data-type ="status" data-status="<?php echo $item['status'];?>" style="border: 1px solid #dee2e6; background: #fd7e14; color: #fff; font-weight: 700;">Не активирована</td>
                                            <?php break; case 1:?>
                                            <td class="text-center" data-type ="status" data-status="<?php echo $item['status'];?>" style="border: 1px solid #dee2e6; background: #28a745; color: #fff; font-weight: 700;">Активирована</td>
                                            <?php break; case 2:?>
                                            <td class="text-center" data-type ="status" data-status="<?php echo $item['status'];?>" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Заблокирована</td>
                                            <?php break; case 3:?>
                                            <td class="text-center" data-type ="status" data-status="<?php echo $item['status'];?>" style="border: 1px solid #dee2e6; background: #DC3545; color: #fff; font-weight: 700;">Запрос на удаление</td>
                                            <?php break; case 4:?>
                                            <td class="text-center" data-type ="status" data-status="<?php echo $item['status'];?>" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Запрос на бокировку</td>
                                            <?php break; case 5:?>
                                            <td class="text-center" data-type ="status" data-status="<?php echo $item['status'];?>" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Модерация</td>
                                            <?php break; endswitch;?>
                                    <?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['company']['update']) or in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['company']['delete'])):?>
                                        <td style="border: 1px solid #dee2e6" class="text-center">
                                            <i style="color: #2d2e2c; font-size: 18px; cursor: pointer" data-toggle="close" class="fa fa-cog company-settings"></i><input type="text" value="<?php echo $item['id'];?>" hidden>
                                            <div class="option-holder" style="display: none; position: absolute;">
                                                <?php switch($item['status']):
                                                    case 0:?>
                                                        <ul class="drop-menu">
                                                            <?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['company']['update'])):?>
                                                                <li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Активировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                                <li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <?php endif;?>
                                                            <?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['company']['delete'])):?>
                                                                <li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <?php endif;?>
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
                                                            <li><span class="menu-button" data-target = "company" data-action="unlock">Разблокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                        </ul>
                                                        <?php break;
                                                    case 3:?>
                                                        <ul class="drop-menu">
                                                            <li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                        </ul>
                                                        <?php break;
                                                    case 4:?>
                                                        <ul class="drop-menu">
                                                            <li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                        </ul>
                                                        <?php break;
                                                    case 5:?>
                                                        <ul class="drop-menu">
                                                            <li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Подтвердить и активировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                            <li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                                                        </ul>
                                                        <?php break;
                                                endswitch;?>
                                            </div>
                                        </td>
                                    <?php endif?>

                                    <td hidden>
                                        <input data-type="id-holder" type="text" value="<?php echo $item['id'];?>" hidden>
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

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            //Проверка новых пользователей
            let company_handler = $('.company');
            setInterval(function () {
                let date = new Date().toISOString().slice(0, 19).replace('T', ' ');
                let updated = JSON.parse('<?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['company']['update'])){echo json_encode(true);}else{echo  json_encode(false);}?>');
                let deleted = JSON.parse('<?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['company']['delete'])){echo json_encode(true);}else{echo  json_encode(false);}?>');
                $.ajax({
                    url: '/company/check_new_company',
                    dataType: 'json',
                    method: 'post',
                    success: function (data) {
                        if(!data.error){
                            if($('table').is('.table')){
                                $.each(data.data, function (key, item) {
                                    let menu;
                                    let color;
                                    let text;
                                    let badge = $('.badge[data-type="add"][data-name="Компании"]');
                                    if(badge.text() == ''){
                                        badge.text(1)
                                    }
                                    else{
                                        badge.text(parseInt(badge.text(), 10) + 1);
                                    }
                                    switch (item.status) {
                                        case 0:
                                            if(updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Активировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted && updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Активировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            color = '#fd7e14';
                                            text = 'Не активирована';
                                            break;
                                        case 1:
                                            if(updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="deactivate">Деактивировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted && updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="deactivate">Деактивировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            color = '#28a745';
                                            text = 'Активирована';
                                            break;
                                        case 2:
                                            if(updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="unlock">Разблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted && updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="unlock">Разблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }

                                            color = '#6c757d';
                                            text = 'Заблокирована';
                                            break;
                                        case 3:
                                            if(updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted && updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }

                                            color = '#DC3545';
                                            text = 'Запрос на удаление';
                                            break;
                                        case 4:
                                            if(updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted && updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }

                                            color = '#6c757d';
                                            text = 'Запрос на бокировку';
                                            break;
                                        case 5:
                                            if(updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Подтвердить и активировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted && updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Подтвердить и активировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }

                                            color = '#6c757d';
                                            text = 'Модерация';
                                            break;
                                    }
                                    if(updated || deleted){
                                        $('table').prepend(
                                            '<tr class="show">'+
                                            '<td  style="border: 1px solid #dee2e6"><span data-modal = "company" class="pseudo-link">'+item.organization_name+'</span><input type="text" value="'+item.id+'" hidden></td>'+
                                            '<td class="" style="border: 1px solid #dee2e6"><span data-modal = "director" class="pseudo-link">'+item.director_name+'</span><input type="text" value="'+item.id+'" hidden></td>'+
                                            '<td class="" style="border: 1px solid #dee2e6"><span data-modal = "company" class="pseudo-link">'+item.code+'</span> <input type="text" value="'+item.id+'" hidden></td>'+
                                            '<td class="" style="border: 1px solid #dee2e6">'+item.comment+'</td>'+
                                            '<td class="text-center" data-type ="status" style="border: 1px solid #dee2e6; background: '+color+'; color: #fff; font-weight: 700;">'+text+'</td>'+
                                            '<td style="border: 1px solid #dee2e6" class="text-center">'+
                                            '<i style="color: #2d2e2c; font-size: 18px; cursor: pointer" data-toggle="close" class="fa fa-cog company-settings"></i><input type="text" value="'+item.id+'" hidden>'+
                                            '<div class="option-holder" style="display: none; position: absolute;">'+
                                            menu+
                                            '</div>'+
                                            '</td>'+
                                            '<td hidden>'+
                                            '<input data-type="id-holder" type="text" value="'+item.id+'" hidden>'+
                                            '</td>'+
                                            '</tr>'
                                        );
                                    }
                                });
                            }
                            else{
                                $('h1').fadeOut(300, function () {
                                    $(this).remove()
                                    $('.company-card').append(
                                        '<table style="display: none" class="table table-borderless table-hover">'+
                                        '<thead>'+
                                        '<tr>'+
                                        '<th class="col-3" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Название</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>'+
                                        '<th class="col-2" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Директор</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>'+
                                        '<th class="col-1" style="border: 1px solid #dee2e6"><div class="row"><div class="col-9"><span>Код</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>'+
                                        '<th class="col-3" style="border: 1px solid #dee2e6"><div class="row"><div class="col-11"><span>Комментарий</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>'+
                                        '<th class="col-2" style="border: 1px solid #dee2e6"><div class="row"><div class="col-9"><span>Статус</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button"></i><input type="text" value="" hidden></div></div></th>'+
                                        '<th class="col-1"></th>'+
                                        '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+

                                        '</tbody>'+
                                        '</table>'
                                    )
                                    $('table').fadeIn(300, function () {
                                        $.each(data.data, function (key, item) {
                                            let menu;
                                            let color;
                                            let text;
                                            let badge = $('.badge[data-type="add"][data-name="Компании"]');
                                            if(badge.text() == ''){
                                                badge.text(1)
                                            }
                                            else{
                                                badge.text(parseInt(badge.text(), 10) + 1);
                                            }
                                            switch (item.status) {
                                                case 0:
                                                    if(updated){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Активировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }
                                                    else if(deleted){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }
                                                    else if(deleted && updated){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Активировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }
                                                    color = '#fd7e14';
                                                    text = 'Не активирована';
                                                    break;
                                                case 1:
                                                    if(updated){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="deactivate">Деактивировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }
                                                    else if(deleted){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }
                                                    else if(deleted && updated){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="deactivate">Деактивировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }
                                                    color = '#28a745';
                                                    text = 'Активирована';
                                                    break;
                                                case 2:
                                                    if(updated){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="unlock">Разблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }
                                                    else if(deleted){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }
                                                    else if(deleted && updated){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="unlock">Разблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }

                                                    color = '#6c757d';
                                                    text = 'Заблокирована';
                                                    break;
                                                case 3:
                                                    if(updated){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }
                                                    else if(deleted){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }
                                                    else if(deleted && updated){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }

                                                    color = '#DC3545';
                                                    text = 'Запрос на удаление';
                                                    break;
                                                case 4:
                                                    if(updated){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }
                                                    else if(deleted){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }
                                                    else if(deleted && updated){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }

                                                    color = '#6c757d';
                                                    text = 'Запрос на бокировку';
                                                    break;
                                                case 5:
                                                    if(updated){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Подтвердить и активировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }
                                                    else if(deleted){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }
                                                    else if(deleted && updated){
                                                        menu =
                                                            '<ul class="drop-menu">'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Подтвердить и активировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                            '</ul>';
                                                    }

                                                    color = '#6c757d';
                                                    text = 'Модерация';
                                                    break;
                                            }
                                            if(deleted || updated){
                                                $('table').prepend(
                                                    '<tr class="show">'+
                                                    '<td  style="border: 1px solid #dee2e6"><span data-modal = "company" class="pseudo-link">'+item.organization_name+'</span><input type="text" value="'+item.id+'" hidden></td>'+
                                                    '<td class="" style="border: 1px solid #dee2e6"><span data-modal = "director" class="pseudo-link">'+item.director_name+'</span><input type="text" value="'+item.id+'" hidden></td>'+
                                                    '<td class="" style="border: 1px solid #dee2e6"><span data-modal = "company" class="pseudo-link">'+item.code+'</span> <input type="text" value="'+item.id+'" hidden></td>'+
                                                    '<td class="" style="border: 1px solid #dee2e6">'+item.comment+'</td>'+
                                                    '<td class="text-center" data-type ="status" style="border: 1px solid #dee2e6; background: '+color+'; color: #fff; font-weight: 700;">'+text+'</td>'+
                                                    '<td style="border: 1px solid #dee2e6" class="text-center">'+
                                                    '<i style="color: #2d2e2c; font-size: 18px; cursor: pointer" data-toggle="close" class="fa fa-cog company-settings"></i><input type="text" value="'+item.id+'" hidden>'+
                                                    '<div class="option-holder" style="display: none; position: absolute;">'+
                                                    menu+
                                                    '</div>'+
                                                    '</td>'+
                                                    '<td hidden>'+
                                                    '<input data-type="id-holder" type="text" value="'+item.id+'" hidden>'+
                                                    '</td>'+
                                                    '</tr>'
                                                );
                                            }
                                        });
                                    });
                                });

                                /**/
                            }
                        }
                    }
                })
            },300000);
            setInterval(function () {
                let id_list='';
                $('.show').find('input[data-type="id-holder"]').each(function (key, item) {
                    id_list = id_list+','+item.value
                });
                $.ajax({
                    url: '/company/check_company_status',
                    method: 'post',
                    dataType: 'json',
                    data: {id: id_list.substr(1), type: 'list'},
                    success: function (data) {
                        let updated = JSON.parse('<?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['company']['update'])){echo json_encode(true);}else{echo  json_encode(false);}?>');
                        let deleted = JSON.parse('<?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['company']['delete'])){echo json_encode(true);}else{echo  json_encode(false);}?>');
                        let mod_badge = $('.badge[data-type="moderation"][data-name="Компании"]');
                        let delete_badge = $('.badge[data-type="delete"][data-name="Компании"]')
                        if(!data.error){
                            $.each(data.data, function (key, item) {
                                let td = $('table').find('tr[data-id="'+item.id+'"]').find('td[data-type="status"]');
                                let company_status = td.attr('data-status');
                                let color;
                                let status;
                                let menu;
                                if(parseInt(item.status, 10) !== parseInt(company_status, 10)){
                                    switch (item.status) {
                                        case 0:
                                            if(updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Активировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted && updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Активировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            color = '#fd7e14';
                                            status = 'Не активирована';
                                            break;
                                        case 1:
                                            if(updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="deactivate">Деактивировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted && updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="deactivate">Деактивировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            color = '#28a745';
                                            status = 'Активирован';
                                            break;
                                        case 2:
                                            if(updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="unlock">Разблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted && updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="unlock">Разблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }

                                            color = '#6c757d';
                                            status = 'Заблокирован';
                                            break;
                                        case 3:
                                            if(updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted && updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }

                                            color = '#DC3545';
                                            status = 'Запрос на удаление';
                                            break;
                                        case 4:
                                            if(updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted && updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }

                                            color = '#6c757d';
                                            status = 'Запрос на бокировку';
                                            break;
                                        case 5:
                                            if(updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Подтвердить и активировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }
                                            else if(deleted && updated){
                                                menu =
                                                    '<ul class="drop-menu">'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Подтвердить и активировать</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+item.id+'" hidden></li>'+
                                                    '</ul>';
                                            }

                                            color = '#6c757d';
                                            status = 'Модерация';
                                            break;
                                    }
                                    $(td).attr('data-status', item.status);
                                    $(td).css('background', color).text(status);
                                    $(td).next().find('.option-holder').children().remove();
                                    $(td).next().find('.option-holder').append(menu);
                                }
                            })
                        }

                    }
                })
            }, 1000*10);
            $(document).on('click', '.create-company', function(){
                let title = 'Добавить новую компанию';
                let html =
                    '<div class="card card-danger card-outline">'+
                    '<div class="card-header">'+
                    '<h3 class="card-title">'+title+'</h3>'+
                    '<div class="card-tools">'+
                    '<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>'+
                    '</div>'+
                    '</div>'+
                    ' <div class="card-body text-left"> ' +
                    '<form action="">'+
                    '<div class="row">'+
                    '<div class="col-12">'+
                    '<div class="input-group mb-3">'+
                    '<select class="custom-select director-id">'+

                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="col-2">'+
                    '<div class="input-group mb-3">'+
                    '<select class="custom-select type">'+
                    '<option>ООО</option>'+
                    '<option>ИП</option>'+
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-10">'+
                    '<div class="input-group mb-3">'+
                    '<input type="text" class="form-control organization-name" data-placeholder ="Название организации"  placeholder="Название организации" value="Орг">'+
                    '<div class="input-group-append">'+
                    '<div class="input-group-text">'+
                    '<span class="fas"></span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+

                    '</div>'+
                    '<div class="row">'+
                    '<div class="col-12">'+
                    '<div class="input-group mb-3">'+
                    '<input type="text" class="form-control director-name" data-placeholder ="ФИО руководителя"  placeholder="ФИО руководителя" value="Вы Вы Вы">'+
                    '<div class="input-group-append">'+
                    '<div class="input-group-text">'+
                    '<span class="fas"></span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+

                    '<div class="row">'+
                    '<div class="col-6">'+
                    '<div class="input-group mb-3">'+
                    '<input type="text" class="form-control inn-kpp" data-placeholder ="ИНН"  placeholder="ИНН/КПП" value="123456789112">'+
                    '<div class="input-group-append">'+
                    '<div class="input-group-text">'+
                    '<span class="fas"></span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-6">'+
                    '<div class="input-group mb-3">'+
                    '<input type="text" class="form-control ogrn" data-placeholder ="ОГРН"  placeholder="ОГРН" value="1234567891123">'+
                    '<div class="input-group-append">'+
                    '<div class="input-group-text">'+
                    '<span class="fas"></span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="col-12">'+
                    '<div class="input-group mb-3">'+
                    '<input type="text" class="form-control juridical-address" data-placeholder ="Адрес юредический"  placeholder="Адрес юредический" value="12345678911234567892">'+
                    '<div class="input-group-append">'+
                    '<div class="input-group-text">'+
                    '<span class="fas"></span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="col-12">'+
                    '<div class="input-group mb-3">'+
                    '<input type="text" class="form-control postal-address" data-placeholder ="Адрес почтовый"  placeholder="Адрес почтовый" value="12345678911234567892">'+
                    '<div class="input-group-append">'+
                    '<div class="input-group-text">'+
                    '<span class="fas"></span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="col-12">'+
                    '<div class="input-group mb-3">'+
                    '<input type="text" class="form-control settlement-account" data-placeholder ="Расчетные счет"  placeholder="Расчетные счет" value="12345678911234567892">'+
                    '<div class="input-group-append">'+
                    '<div class="input-group-text">'+
                    '<span class="fas"></span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="col-12">'+
                    '<div class="input-group mb-3">'+
                    '<input type="text" class="form-control bank-name" data-placeholder ="Наименование банка"  placeholder="Наименование банка" value="12345678911234567892">'+
                    '<div class="input-group-append">'+
                    '<div class="input-group-text">'+
                    '<span class="fas"></span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="col-12">'+
                    '<div class="input-group mb-3">'+
                    '<input type="text" class="form-control correction-account" data-placeholder ="Корреспондентский счет"  placeholder="Корреспондентский счет" value="12345678911234567892">'+
                    '<div class="input-group-append">'+
                    '<div class="input-group-text">'+
                    '<span class="fas"></span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+

                    '<div class="row">'+
                    '<div class="col-6">'+
                    '<div class="input-group mb-3">'+
                    '<input type="text" class="form-control bik" data-placeholder ="БИК"  placeholder="БИК" value="999999999">'+
                    '<div class="input-group-append">'+
                    '<div class="input-group-text">'+
                    '<span class="fas"></span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-6">'+
                    '<div class="input-group mb-3">'+
                    '<input type="text" class="form-control okpo" data-placeholder ="ОКПО"  placeholder="ОКПО" value="88888888">'+
                    '<div class="input-group-append">'+
                    '<div class="input-group-text">'+
                    '<span class="fas"></span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</form>'+
                    '<div class="row">' +
                    '<div class="col-12">' +
                    '<button class="btn add-company btn-block btn-danger">' +
                    'Добавить' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>'+

                    '</div>';
                Swal.fire({
                    html: html,
                    background: 'rgba(0,0,0,0)',
                    position: 'top',
                    showCloseButton: false,
                    showConfirmButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                    onBeforeOpen: () => {
                        $('button[data-card-widget="remove"]').on('click', function (e) {
                            Swal.close();
                        });
                        $.ajax({
                            url: '/company/get_directors_id',
                            method: 'post',
                            dataType: 'json',
                            success: function (data) {
                                $.each(data['data'], function (key, item) {
                                    $('.director-id').append('<option value="'+item.id+'">'+item.code+ ' - '+item.full_name+'</option>')
                                })
                            }
                        });
                        $('.add-company').click(function (e) {
                            let organization_name = $('.organization-name');
                            let director_name = $('.director-name');
                            let inn_kpp = $('.inn-kpp');
                            let ogrn = $('.ogrn');
                            let juridical_address = $('.juridical-address');
                            let postal_address = $('.postal-address');
                            let settlement_account = $('.settlement-account');
                            let bank_name = $('.bank-name');
                            let correction_account = $('.correction-account');
                            let bik = $('.bik');
                            let okpo = $('.okpo');
                            let type;
                            if($('.type').val() === 'ИП'){
                                type = 'ИП '+director_name.val().trim();
                            }
                            else{
                                type = 'ООО '+'"'+organization_name.val().trim()+'"';
                            }
                            let form = {
                                director_id: {field: $('.director-id'), value: $('.director-id').val().trim()},
                                organization_name: {field: organization_name, value: type},
                                director_name: {field: director_name, value: director_name.val().trim()},
                                inn_kpp: {field: inn_kpp, value: inn_kpp.val().trim()},
                                ogrn: {field: ogrn, value: ogrn.val().trim()},
                                juridical_address: {field: juridical_address, value: juridical_address.val().trim()},
                                postal_address: {field: postal_address, value: postal_address.val().trim()},
                                settlement_account: {field: settlement_account, value: settlement_account.val().trim()},
                                bank_name: {field: bank_name, value: bank_name.val().trim()},
                                correction_account: {field: correction_account, value: correction_account.val().trim()},
                                bik: {field: bik, value: bik.val().trim()},
                                okpo: {field: okpo, value: okpo.val().trim()}
                            };
                            let error = false;
                            let valid_result = {
                                organization_name: {valid: valid_field(form.organization_name.value, {type: 'string', min_length: '2', regexp: /^(ООО\s["][A-ZА-Я0-9].+(\s.+|)["]|ИП\s[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+)$/ }), field: form.organization_name.field},
                                director_name: {valid: valid_field(form.director_name.value, {type: 'string', min_length: '6', regexp: /^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}$/ }), field: form.director_name.field},
                                inn_kpp: {valid: valid_field(form.inn_kpp.value, {type: 'string', min_length: 12, max_length: 20, regexp: /^[0-9]{12}|([0-9]{10}\/[0-9]{9})$/ }), field: form.inn_kpp.field},
                                ogrn: {valid: valid_field(form.ogrn.value, {type: 'string', min_length: 13, max_length: 15, regexp: /^[0-9]{13,15}$/ }), field: form.ogrn.field},
                                juridical_address: {valid: valid_field(form.juridical_address.value, {type: 'string', min_length: '5'}), field: form.juridical_address.field},
                                postal_address: {valid: valid_field(form.postal_address.value, {type: 'string', min_length: '5'}), field: form.postal_address.field},
                                settlement_account: {valid: valid_field(form.settlement_account.value, {type: 'string', min_length: 20, max_length: 20, regexp: /^[0-9]{20}$/ }), field: form.settlement_account.field},
                                bank_name: {valid: valid_field(form.bank_name.value, {type: 'string', min_length: '2'}), field: form.bank_name.field},
                                correction_account: {valid: valid_field(form.correction_account.value, {type: 'string', min_length: 20, max_length: 20, regexp: /^[0-9]{20}$/ }), field: form.correction_account.field},
                                bik: {valid: valid_field(form.bik.value, {type: 'string', min_length: 9, max_length: 9, regexp: /^[0-9]{9}$/ }), field: form.bik.field},
                                okpo: {valid: valid_field(form.okpo.value, {type: 'string', min_length: 8, max_length: 10, regexp: /^[0-9]{8,10}$/ }), field: form.okpo.field},
                            };
                            $.each(valid_result, function (key, item) {
                                if (item.valid.error) {
                                    if (key === 'full_name') {
                                        field_reaction(item.field, 'Некореектное ФИО', item.valid.error);
                                    } else {
                                        field_reaction(item.field, item.valid.message, item.valid.error);
                                    }
                                    error = true;
                                } else {
                                    field_reaction(item.field, item.valid.message, item.valid.error);
                                }
                            });
                            if(!error){
                                console.log($('.director-id'))
                                $.ajax({
                                    url: '/company/add_company',
                                    method: 'POST',
                                    dataType: 'json',
                                    data: {data:
                                            {
                                                director_id: $('.director-id').val(),
                                                organization_name: form.organization_name.value,
                                                director_name: form.director_name.value,
                                                inn_kpp: form.inn_kpp.value,
                                                ogrn: form.ogrn.value,
                                                juridical_address: form.juridical_address.value,
                                                postal_address: form.postal_address.value,
                                                settlement_account: form.settlement_account.value,
                                                bank_name: form.bank_name.value,
                                                correction_account: form.correction_account.value,
                                                bik: form.bik.value,
                                                okpo: form.okpo.value}
                                    },
                                    success: function (data) {
                                        if(data.error){

                                        }
                                        else{
                                            Swal.close();
                                            Swal.fire({
                                                toast: true,
                                                timer: 10000,
                                                html: '<span style="color: #fff; font-weight: 700">Компания добавлена</span>',
                                                background: '#dc3545',
                                                position: 'top-end',
                                                showConfirmButton: false
                                            });
                                            $('table').prepend('' +
                                                '<tr class="show">' +
                                                '<td  style="border: 1px solid #dee2e6"><span data-modal = "company" class="pseudo-link">'+form.organization_name.value+'</span><input type="text" value="'+data.data+'" hidden></td>' +
                                                '<td class="" style="border: 1px solid #dee2e6"><span data-modal = "director" class="pseudo-link">'+form.director_name.value+'</span><input type="text" value="'+form.director_id.value+'" hidden></td>' +
                                                '<td class="" style="border: 1px solid #dee2e6"><span data-modal = "company" class="pseudo-link"></span> <input type="text" value="'+data.data+'" hidden></td>' +
                                                '<td class="" style="border: 1px solid #dee2e6"></td>' +
                                                '<td class="text-center" style="border: 1px solid #dee2e6; background: #fd7e14; color: #fff; font-weight: 700;">Не активирована</td>' +
                                                '<td style="border: 1px solid #dee2e6" class="text-center">' +
                                                '<i style="color: #2d2e2c; font-size: 18px; cursor: pointer" data-toggle="close" class="fa fa-cog company-settings"></i><input type="text" value="'+data.data+'" hidden>' +
                                                '<div class="option-holder" style="display: none; position: absolute;">' +
                                                '<ul class="drop-menu">' +
                                                '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Активировать</span><input type="text" value="'+data.data+'" hidden></li>' +
                                                '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+data.data+'" hidden></li>' +
                                                '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+data.data+'" hidden></li>' +
                                                '</ul>' +
                                                '</div>' +
                                                '</td>' +
                                                '<td hidden>' +
                                                '<input type="text" value="'+data.data+'" hidden>' +
                                                '</td>' +
                                                '</tr>'
                                            )

                                        }

                                    }
                                });
                            }
                        })
                    }
                })
            })
            company_handler.on('click', '.company-settings', function (event) {
                let target = $(event.target);
                let menu = $(target.next().next());
                let td = $(target.parent());
                menu.offset({
                    top: 0,
                    left: 0
                });
                if(target.attr('data-toggle') === 'close'){
                    target.attr('data-toggle', 'open');
                    menu.show();
                    menu.offset({
                        top: td.offset().top + td.outerHeight()-1,
                        left: td.offset().left - (menu.outerWidth() - td.outerWidth())
                    });
                }
                else{
                    target.attr('data-toggle', 'close');
                    menu.hide()
                }
            });
            company_handler.on('click', '.option-close', function (event) {
                let target = $(event.target);
                target.parents('.option-holder').hide();
                target.parents('.option-holder').prevAll('.fa-cog').show()
            });
            company_handler.on('click', '.menu-button', function (e) {
                let status = $(e.target).parents('td').prev();
                let comment = $(status).prev();
                let code = $(comment).prev();
                let id = $(e.target).next().val();
                let target = $(e.target).attr('data-target');
                let action = $(e.target).attr('data-action');
                let menu = $(e.target).parents('.option-holder');
                if(target === 'modal'){
                    $.ajax({
                        url: '/company/' + action,
                        data: {id: id},
                        method: 'post',
                        dataType: 'html',
                        success: function (data) {
                            Swal.fire({
                                html: data,
                                background: 'rgba(0,0,0,0)',
                                position: 'top',
                                showCloseButton: false,
                                showConfirmButton: false,
                                showCancelButton: false,
                                focusConfirm: false,
                                onBeforeOpen: () => {
                                    $('.active-company').unbind();
                                    $('.update-company').unbind();
                                    if(action === 'update'){
                                        if($('.organization-name').val().trim().substr(0, 3) === 'ООО'){
                                            $('.inn-kpp').mask('9999999999?/999999999');
                                        }
                                        else{
                                            $('.inn-kpp').mask('999999999999');
                                        }
                                        $('.ogrn').mask('9999999999999');
                                        $('.settlement-account').mask('99999999999999999999');
                                        $('.correction-account').mask('99999999999999999999');
                                        $('.bik').mask('999999999');
                                        $('.okpo').mask('99999999');
                                    }
                                    $('button[data-card-widget="remove"]').on('click', function (e) {
                                        Swal.close();
                                    });
                                    $('.active-company').click(function (e) {
                                        let data = {};
                                        if($('.code').val().trim() != '' && $('.comment').val().trim() != ''){
                                            data = {id: id, code: $('.code').val(), comment: $('.comment').val()};
                                        }
                                        else if($('.code').val().trim() != ''){
                                            data = {id: id, code: $('.code').val(), comment: null};
                                        }
                                        else if($('.comment').val().trim() != ''){
                                            data = {id: id, code: null, comment: $('.comment').val()};
                                        }
                                        else{
                                            data = {id: id, code: null, comment: null};
                                        }
                                        $.ajax({
                                            url: '/company/activate_company',
                                            data: data,
                                            method: 'post',
                                            dataType: 'html',
                                            success: function (data) {
                                                if(!data.error){
                                                    if($('.code').val().trim() != '' && $('.comment').val().trim() != ''){
                                                        $(code).text($('.code').val())
                                                        $(comment).text($('.comment').val())
                                                    }
                                                    else if($('.code').val().trim() != ''){
                                                        $(code).text($('.code').val())
                                                    }
                                                    else if($('.comment').val().trim() != ''){
                                                        $(comment).text($('.comment').val())
                                                    }
                                                    $(status).css('background', '#28a745').text('Активирована');
                                                    status.next().children('.option-holder').children().remove();
                                                    status.next().children('.option-holder').append(
                                                        '<ul class="drop-menu">'+
                                                        '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+id+'" hidden></li>'+
                                                        '<li><span class="menu-button" data-target = "company" data-action="deactivate">Деактивировать</span><input type="text" value="'+id+'" hidden></li>'+
                                                        '<li><span class="menu-button" data-target = "company" data-action="block">Заблокировать</span><input type="text" value="'+id+'" hidden></li>'+
                                                        '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+id+'" hidden></li>'+
                                                        '</ul>'
                                                    );
                                                    Swal.close();
                                                    Swal.fire({
                                                        toast: true,
                                                        timer: 10000,
                                                        html: '<span style="color: #fff; font-weight: 700">Компания активирована</span>',
                                                        background: '#dc3545',
                                                        position: 'top-end',
                                                        showConfirmButton: false
                                                    });
                                                }
                                            }
                                        })
                                    });
                                    $('.update-company').click(function (e) {

                                        let organization_name = $('.organization-name');
                                        let director_name = $('.director-name');
                                        let inn_kpp = $('.inn-kpp');
                                        let ogrn = $('.ogrn');
                                        let juridical_address = $('.juridical-address');
                                        let postal_address = $('.postal-address');
                                        let settlement_account = $('.settlement-account');
                                        let bank_name = $('.bank-name');
                                        let correction_account = $('.correction-account');
                                        let bik = $('.bik');
                                        let okpo = $('.okpo');
                                        let form = {
                                            organization_name: {field: organization_name, value: organization_name.val().trim()},
                                            director_name: {field: director_name, value: director_name.val().trim()},
                                            inn_kpp: {field: inn_kpp, value: inn_kpp.val().trim()},
                                            ogrn: {field: ogrn, value: ogrn.val().trim()},
                                            juridical_address: {field: juridical_address, value: juridical_address.val().trim()},
                                            postal_address: {field: postal_address, value: postal_address.val().trim()},
                                            settlement_account: {field: settlement_account, value: settlement_account.val().trim()},
                                            bank_name: {field: bank_name, value: bank_name.val().trim()},
                                            correction_account: {field: correction_account, value: correction_account.val().trim()},
                                            bik: {field: bik, value: bik.val().trim()},
                                            okpo: {field: okpo, value: okpo.val().trim()}
                                        };
                                        let error = false;
                                        let valid_result = {
                                            organization_name: {valid: valid_field(form.organization_name.value, {type: 'string', min_length: '2', regexp: /^(ООО\s["][A-ZА-Я0-9].+(\s.+|)["]|ООО\s[A-ZА-Я0-9].+(\s.+|)|ИП\s[А-Я][а-я]+\s[А-Я][а-я]+\s[А-Я][а-я]+)$/}), field: form.organization_name.field},
                                            director_name: {valid: valid_field(form.director_name.value, {type: 'string', min_length: '6', regexp: /^([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}\s[А-Я][а-я]{1,}|([А-Я][а-я]{1,}[-][А-Я][а-я]{1,}|[А-Я][а-я]{1,})\s[А-Я][а-я]{1,}$/ }), field: form.director_name.field},
                                            inn_kpp: {valid: valid_field(form.inn_kpp.value, {type: 'string', min_length: 12, max_length: 20, regexp: /^[0-9]{12}|([0-9]{10}\/[0-9]{9})$/ }), field: form.inn_kpp.field},
                                            ogrn: {valid: valid_field(form.ogrn.value, {type: 'string', min_length: 13, max_length: 15, regexp: /^[0-9]{13,15}$/ }), field: form.ogrn.field},
                                            juridical_address: {valid: valid_field(form.juridical_address.value, {type: 'string', min_length: '5'}), field: form.juridical_address.field},
                                            postal_address: {valid: valid_field(form.postal_address.value, {type: 'string', min_length: '5'}), field: form.postal_address.field},
                                            settlement_account: {valid: valid_field(form.settlement_account.value, {type: 'string', min_length: 20, max_length: 20, regexp: /^[0-9]{20}$/ }), field: form.settlement_account.field},
                                            bank_name: {valid: valid_field(form.bank_name.value, {type: 'string', min_length: '2'}), field: form.bank_name.field},
                                            correction_account: {valid: valid_field(form.correction_account.value, {type: 'string', min_length: 20, max_length: 20, regexp: /^[0-9]{20}$/ }), field: form.correction_account.field},
                                            bik: {valid: valid_field(form.bik.value, {type: 'string', min_length: 9, max_length: 9, regexp: /^[0-9]{9}$/ }), field: form.bik.field},
                                            okpo: {valid: valid_field(form.okpo.value, {type: 'string', min_length: 8, max_length: 10, regexp: /^[0-9]{8,10}$/ }), field: form.okpo.field},
                                        };
                                        $.each(valid_result, function (key, item) {
                                            if (item.valid.error) {
                                                if (key === 'full_name') {
                                                    field_reaction(item.field, 'Некореектное ФИО', item.valid.error);
                                                } else {
                                                    field_reaction(item.field, item.valid.message, item.valid.error);
                                                }
                                                error = true;
                                            } else {
                                                field_reaction(item.field, item.valid.message, item.valid.error);
                                            }
                                        });
                                        if(!error){
                                            console.log('ajax')
                                        }
                                    })
                                }
                            })
                        }
                    });
                }
                else{
                    $.ajax({
                        url: '/'+target+'/' + action+'_'+target,
                        method: 'post',
                        data: {id: id},
                        dataType: 'json',
                        success: function (data) {
                            switch (action) {
                                case 'delete':
                                    remove_row(id);
                                    if($('tr').length === 1){
                                        $('table').remove();
                                        $('.director-card').append('<h1 style="display: none" class="table-replace-text">Список директоров пуст. Добавьте нового директора.</h1>');
                                        $('.table-replace-text').fadeIn(300);
                                    }
                                    Swal.fire({
                                        toast: true,
                                        timer: 3000,
                                        html: '<span style="color: #fff; font-weight: 700">Компания удалена</span>',
                                        background: '#dc3545',
                                        position: 'top-end',
                                        showConfirmButton: false
                                    });
                                    break;
                                case 'block':
                                    let block_msg = '<span style="color: #fff; font-weight: 700">Компания заблокирована</span>'
                                    $(status).css('background', '#6c757d').text('Забокирована');
                                    status.next().children('.option-holder').children().remove();
                                    status.next().children('.option-holder').append(
                                        '<ul class="drop-menu">'+
                                        '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+id+'" hidden></li>'+
                                        '<li><span class="menu-button" data-target = "company" data-action="unlock">Разблокировать</span><input type="text" value="'+id+'" hidden></li>'+
                                        '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+id+'" hidden></li>'+
                                        '</ul>'
                                    )
                                    break;
                                case 'unlock':
                                    let unlock_msg = '<span style="color: #fff; font-weight: 700">Компания разблокирована</span>'
                                    $(status).css('background', '#fd7e14').text('Не активирована')
                                    status.next().children('.option-holder').children().remove()
                                    status.next().children('.option-holder').append(
                                        '<ul class="drop-menu">'+
                                        '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Активировать</span><input type="text" value="'+id+'" hidden></li>'+
                                        '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+id+'" hidden></li>'+
                                        '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+id+'" hidden></li>'+
                                        '</ul>'
                                    );
                                    break;
                                case 'deactivate':
                                    let deactivate_msg = '<span style="color: #fff; font-weight: 700">Компания деактивирована</span>'
                                    $(status).css('background', '#fd7e14').text('Не активирована')
                                    status.next().children('.option-holder').children().remove()
                                    status.next().children('.option-holder').append('' +
                                        '<ul class="drop-menu">'+
                                        '<li><span class="menu-button" data-target = "modal" data-action="get_activate_company">Активировать</span><input type="text" value="'+id+'" hidden></li>'+
                                        '<li><span class="menu-button" data-target = "modal" data-action="get_update_company">Редактировать</span><input type="text" value="'+id+'" hidden></li>'+
                                        '<li><span class="menu-button" data-target = "company" data-action="delete">Удалить</span><input type="text" value="'+id+'" hidden></li>'+
                                        '</ul>'
                                    );
                                    break;
                            }
                        }
                    });
                }
                menu.prev().prev().attr('data-toggle', 'close');
                menu.hide();
            });
        })
    </script>
</div>

