<?php
function status_translate($str){
    $text = '';
    $color = '#fff';
    $response = [];
    switch ($str){
        case 'default':
            $text = 'Поступил';
            $color = '#dc3545';
            break;
        case 'work':
            $text = 'Изготавливается';
            $color = '#ffc107';
            break;
        case 'confirm':
            $text = 'Готов';
            $color = '#007bff';
            break;
        case 'out':
            $text = 'Отгрузили';
            $color = '#28a745';
            break;
        case 'wait':
            $text = 'Задержка';
            $color = '#6c757d';
            break;
    }
    $response = ['text' => $text, 'color' => $color];
    return $response;
}
function get_status_title(){
    return '
СТАТУС:
    Поступил: 	        заказ получен на фабрике, проверка не происходила
    Изготавливается: 	все вопросы по заказу решены, отдан для изготовления на производство
    Готов: 	            заказ готов для отгрузки на фабрике
    Отгружен: 	        заказ отгружен с фабрики
        ';
}
function formate_month($month){
    $name = 'Январь';
    switch($month){
        case 1:
            $name = 'Январь';
            break;
        case 2:
            $name = 'Февраль';
            break;
        case 3:
            $name = 'Март';
            break;
        case 4:
            $name = 'Апрель';
            break;
        case 5:
            $name = 'Май';
            break;
        case 6:
            $name = 'Июнь';
            break;
        case 7:
            $name = 'Июль';
            break;
        case 8:
            $name = 'Август';
            break;
        case 9:
            $name = 'Сентябрь';
            break;
        case 10:
            $name = 'Октябрь';
            break;
        case 11:
            $name = 'Ноябрь';
            break;
        case 12:
            $name = 'Деакбрь';
            break;
    }
    return $name;
}
function get_option_month(){
    $month = date('m');
    var_dump(substr($month, 1, 1));
    $selected = '';
    for($i=1; $i<=12; $i++){
        if($i == substr($month, 1, 1)){
            $selected = 'selected';
        }
        else{
            $selected = '';
        }
        if($i < 10){
            $value = '0'.$i;

        }
        else{
            $value = $i;
        }
        echo '<option '.$selected.' value="'.$value.'">'.formate_month($i).'</option>';
    }
}

?>
<div class="submodule order" data-status="active" data-submoudle-appliaction = "order">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <!--<div class="col-2">
                    <button class="btn btn-block submit create-employee btn-primary btn-block">Добавить</button>
                </div>-->
                <?php if($_SESSION['user']['role_id'] == 2):?>
                    <div class="col-10 offset-2">
                        <div class="row">
                            <div class="col-4 text-right">
                                <span class="align-middle">Фильтровать по:</span>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select class="custom-select filter-type">
                                        <option value="query">Поисковому запосу</option>
                                        <option value="№ заказа отправителя">Номеру заказа отправителя</option>
                                        <option value="№ заказа 3cad">Номеру заказа 3cad</option>
                                        <option value="Дата принятия">Дате принятия</option>
                                        <option value="Статус">Статусу</option>
                                        <option value="Неделя">Неделе</option>
                                        <option value="Дата отгрузки">Дате отгрузки</option>
                                        <option value="ID/Код пользователя">ID/Коду пользователя</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control filter-input" data-placeholder ="Значение фильтра"  placeholder="Значение фильтра">
                            </div>
                        </div>
                    </div>
                <?php else:?>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <button data-type="refresh-order">Обновить</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 text-right">
                                <select class="form-control" name="year" id="year">
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                </select>
                            </div>
                            <div class="col-1 text-right">
                                <select class="form-control" name="year" id="month">
                                    <?php
                                        get_option_month();
                                    ?>
                                </select>
                            </div>
                            <div class="col-2 text-right">
                                <span class="align-middle">Фильтровать по:</span>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select class="custom-select filter-type">
                                        <option value="query">Поисковому запросу</option>
                                        <option value="№ заказа отправителя">Номеру заказа отправителя</option>
                                        <option value="№ заказа 3cad">Номеру заказа 3cad</option>
                                        <option value="Дата принятия">Дате принятия</option>
                                        <option value="Статус">Статусу</option>
                                        <option value="Неделя">Неделе</option>
                                        <option value="Дата отгрузки">Дате отгрузки</option>
                                        <option value="ID/Код директора">ID/Коду директора</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <i class="fas fa-times" data-type="clear-filter-input" style="position: absolute; left: 795px; top: 11px; color: #ccc; cursor: pointer"></i>
                                <input type="text" class="form-control filter-input" data-placeholder ="Значение фильтра"  placeholder="Значение фильтра">
                            </div>
                        </div>
                    </div>
                <?php endif;?>

            </div>
            <div class="card">
                <div class="card-body company-card" style="height: 70vh;!important; overflow-y: scroll; overflow-x: hidden">

                    <?php if(!$data['error']):?>
                        <table class="table table-borderless table-hover" style="word-break: break-word">
                            <thead>
                            <tr style="font-size: 0.9em;">
                                <th class="" style="width: 150px; border: 1px solid #dee2e6;"><div class="row"><div class="col-10"><span>№ заказа</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button" data-type="order" data-field="n_order_se"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6; width: auto"><div class="row"><div class="col-10"><span>№ заказа 3cad</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button" data-type="order" data-field="n_order_ne"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6; width: auto"><div class="row"><div class="col-11"><span>Дата принятия</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button" data-type="order" data-field="n_date_con"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6; width: auto"><div class="row"><div class="col-4"><span>Статус</span></div><div class="col-1"><i style="color: #dc3545" title="<?php echo get_status_title();?>" class="fas fa-question-circle"></i></div><div class="col-1 offset-6 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button" data-type="order" data-field="n_status"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6; width: auto"><div class="row"><div class="col-10"><span>Неделя</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button" data-type="order" data-field="n_week"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6; width: auto"><div class="row"><div class="col-11"><span>Дата отгрузки</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button" data-type="order" data-field="n_mount"></i><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6; width: auto"><div class="row"><div class="col-11"><span>Спецификация</span></div><div class="col-1 text-right"><input type="text" value="" hidden></div></div></th>
                                <th class="" style="border: 1px solid #dee2e6; width: auto"><div class="row"><div class="col-11"><span>ID/Код директора</span></div><div class="col-1 text-right"><i style="color: #2d2e2c; font-size: 16px; cursor: pointer" class="fa fa-times  sort-button" data-type="order" data-field="n_code_ord"></i><input type="text" value="" hidden></div></div></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $id_list =''; for ($i = 1; $i<= 1; $i++):?>
                                <?php foreach($data['data'] as $item):
                                    $id_list = $id_list.','.$item['order_id'];
                                    ?>
                                    <tr data-show="true" data-type="order" class="show">
                                        <td class="text-center" style="border: 1px solid #dee2e6"><?php echo $item['n_order_se'];?><input type="text" value="<?php echo $item['order_id'];?>" hidden></td>
                                        <td class="text-center" style="border: 1px solid #dee2e6"><?php echo $item['n_order_ne'];?><input type="text" value="<?php echo $item['order_id'];?>" hidden></td>
                                        <td class="text-center" style="border: 1px solid #dee2e6"><?php echo humanity_date($item['n_date_con']);?><input type="text" value="<?php echo $item['order_id'];?>" hidden></td>
                                        <td class="text-center" <?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['order']['update'])){echo 'data-type="change-status-order"';}?>  style="font-weight: 700; border: 1px solid #dee2e6; color: #fff!important; background: <?php echo status_translate($item['n_status'])['color'];?>"><?php echo status_translate($item['n_status'])['text'];?> <input type="text" value="<?php echo $item['order_id'];?>" hidden></td>

                                        <?php if($item['n_mount'] !== '0000-00-00'):?>
                                            <td class="text-center" data-id="<?php echo $item['order_id'];?>" style="cursor: pointer; border: 1px solid #dee2e6"<?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['order']['update'])){echo 'data-type="change-week-order"';}?>><?php echo $item['n_week'];?><input type="text" value="<?php echo $item['order_id'];?>" hidden></td>
                                            <td class="text-center" data-id="<?php echo $item['order_id'];?>" style="cursor: pointer; border: 1px solid #dee2e6"<?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['order']['update'])){echo 'data-type="change-date-order"';}?>><?php echo humanity_date($item['n_mount']);?><input type="text" data-type="change-date-order" value="<?php echo $item['order_id'];?>" style="visibility: hidden; position: absolute"></td>
                                        <?php else:?>
                                            <td class="text-center" data-id="<?php echo $item['order_id'];?>" style="cursor: pointer; border: 1px solid #dee2e6"<?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['order']['update'])){echo 'data-type="change-week-order"';}?>> - <input type="text" value="<?php echo $item['order_id'];?>" hidden></td>
                                            <td class="text-center" data-id="<?php echo $item['order_id'];?>" style="cursor: pointer; border: 1px solid #dee2e6"<?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['order']['update'])){echo 'data-type="change-date-order"';}?>> - <input type="text" data-type="change-date-order" value="<?php echo $item['order_id'];?>" style="visibility: hidden; position: absolute"><div class="trtigger"></div></td>
                                        <?php endif;?>
                                        <td class="text-center" style="border: 1px solid #dee2e6;"><i style="color: #DC3545; font-size: 1.3rem; cursor: pointer" data-type="specification" data-order="<?php echo $item['n_order_ne'];?>" class="fas file-loader fa-file-pdf"></i><input type="text" value="<?php echo $item['n_code_ord'];?>" hidden></td>
                                        <td class="text-center" style="border: 1px solid #dee2e6"><span data-modal = "director" data-action="get_director_by_user_id_modal" data-data="<?= $item['n_code_ord']?>" class="pseudo-link"><?php echo $item['n_code_ord'];?></span><span> / </span><span data-modal = "director" data-action="get_director_by_user_id_modal" data-data="<?= $item['n_code_ord']?>" class="pseudo-link"><?= $item['code']?></span><input type="text" value="<?php echo $item['order_id'];?>" hidden></td>
                                        <?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['order']['delete'])):?>
                                        <td class="text-center" style="border: 1px solid #dee2e6"><i style="color: #DC3545; font-size: 1.3rem; cursor: pointer" data-type="delete-order" data-id="<?php echo $item['order_id']?>" class="fas delete-order fa-trash"></i></td>
                                        <?php endif;?>
                                        <td hidden>
                                            <input type="text" value="<?php echo $item['order_id'];?>" hidden>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endfor;?>

                            </tbody>
                        </table>
                        <input type="text" hidden data-type="id-list" value="<?php echo substr($id_list, 1, strlen($id_list) -1);?>">
                    <?php else:?>
                        <h1>Список компаний пуст. Добавьте новую компанию.</h1>
                    <?php endif;?>

                </div>
                <div class="card-footer clearfix">
                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $.ajax({
                        url:'/order/get_all_order',
                        method: 'post',
                        dataType: 'html',
                        success: function (data) {
                            $('tbody').append(data);
                        }
                    });
                    function add_new_order(id_list){
                        let list = '';
                        $.each(id_list, function (key, item) {
                            if(key === 0){
                                list += item.order_id
                            }
                            else{
                                list += ', '+item.order_id;
                            }
                        });
                        $.ajax({
                            url: '/order/get_new_order',
                            method: 'post',
                            dataType: 'html',
                            data: {list: list},
                            success: function (data) {
                                console.log(list)
                                $('table tbody').prepend(data);
                            }
                        });
                    }
                    function update_order(data){

                    }
                    setInterval(function () {
                        $.ajax({
                            url: '/order/update_table',
                            method: 'post',
                            dataType: 'json',
                            success: function (data) {
                                if(!data.error){
                                    switch (data.status) {
                                        case 'new order success and update order success':
                                            add_new_order(data.data.new_order);
                                            update_order(data.data);
                                            break;
                                        case 'new order error and update order success':
                                            update_order(data.data);
                                            break;
                                        case 'new order success and update order error':
                                            add_new_order(data.data.new_order);
                                            break;
                                    }
                                }
                            }
                        })
                    }, 1000*60);
                    $('#year').change(function (e) {
                        let year = $(e.target).val();
                        let month = $('#month').val();
                        $.ajax({
                            url:'/order/get_all_order',
                            method: 'post',
                            dataType: 'html',
                            data: {year: year, month: month},
                            success: function (data) {
                                if(data === ''){
                                    $('table').hide();
                                    $('h1[data-type="empty-table"]').remove();
                                    $('.card-body').append('<h1 data-type="empty-table">За выбранный период не найдено ниодного заказа</h1>')
                                }
                                else{
                                    $('table').show();
                                    $('h1[data-type="empty-table"]').remove();
                                    $('tbody tr').remove();
                                    $('tbody').append(data);
                                    $('tbody tr').each(function (key, item) {
                                        if(key<9){
                                            $(item).show()
                                        }
                                        else{
                                            return
                                        }
                                    })
                                }


                            }
                        });
                    });
                    $('#month').change(function (e) {
                        let month = $(e.target).val();
                        let year = $('#year').val();
                        $.ajax({
                            url:'/order/get_all_order',
                            method: 'post',
                            dataType: 'html',
                            data: {year: year, month: month},
                            success: function (data) {
                                if(data === ''){
                                    $('table').hide();
                                    $('h1[data-type="empty-table"]').remove();
                                    $('.card-body').append('<h1 data-type="empty-table">За выбранный период не найдено ниодного заказа</h1>')
                                }
                                else{
                                    $('table').show();
                                    $('h1[data-type="empty-table"]').remove();
                                    $('tbody tr').remove();
                                    $('tbody').append(data);
                                    $('tbody tr').each(function (key, item) {
                                        if(key<9){
                                            $(item).show()
                                        }
                                        else{
                                            return
                                        }
                                    })
                                }
                            }
                        });
                    });

                    let row_list = $('.card-body table tbody tr');
                    let row_count = row_list.length;
                    if(row_count<=10){
                        $('.dataTables_info').text('Показаны все записи');
                    }
                    else{
                        $('.dataTables_info').text('Показано 1 до 10 из '+row_count+' записей');
                    }
                    let button_number;
                    let company_handler = $('.order');
                    $.each(row_list, function (key, item) {
                        if(key >= 10){
                            $(this).hide()
                        }
                        if(key % 10 === 0){
                            button_number = key/10 + 1;
                            if(key/10 === 0){
                                $('.next').before(
                                    '<li data-dt-idx="'+button_number+'" class="paginate_button index-button page-item active">\n' +
                                    '<a href="#" aria-controls="example2" data-dt-idx="'+button_number+'" tabindex="0" class="page-link  link-red">'+button_number+'</a>\n' +
                                    '</li>')
                            }
                            else{
                                $('.next').before(
                                    '<li data-dt-idx="'+button_number+'" class="paginate_button index-button page-item">\n' +
                                    '<a href="#" aria-controls="example2" data-dt-idx="'+button_number+'" tabindex="0" class="page-link  link-red">'+button_number+'</a>\n' +
                                    '</li>')
                            }

                        }
                    });
                    company_handler.on('click', '.index-button', function (event) {
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
                    });
                    $(document).mouseup(function (e){ // событие клика по веб-документу
                        let menu = $(".option-holder"); // тут указываем ID элемента
                        if (!menu.is(e.target) // если клик был не по нашему блоку
                            && menu.has(e.target).length === 0) { // и не по его дочерним элементам
                            menu.hide(); // скрываем его
                        }
                    });


                    company_handler.on('click', '.employee-settings', function (event) {
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
                        let id = $(e.target).next().val();
                        let target = $(e.target).attr('data-target');
                        let action = $(e.target).attr('data-action');
                        let menu = $(e.target).parents('.option-holder');
                        console.log('id = ' + id + ', target = ' + target + ', action = ' + target+'_'+action);
                        if(target === 'modal'){
                            $.ajax({
                                url: '/'+target+'/' + action,
                                data: {id: id},
                                method: 'post',
                                dataType: 'html',
                                success: function (data) {
                                    Swal.fire({
                                        html: data,
                                        position: 'center',
                                        width: '30rem',
                                        padding: '0',
                                        background: 'transparent',
                                        closeButtonHtml: '<button style="color: #fff" type="button" class="btn remove-modal btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>',
                                        showCloseButton: true,
                                        showCancelButton: false,
                                        showConfirmButton: false,
                                        onBeforeOpen: function (e) {
                                            $(document).on('click', '.activate-company', function (e) {
                                                let id =  $(e.target).next().val();
                                                let company_code = $('.company-code').val();
                                                let company_comment = $('#company-comment').val();
                                                $.ajax({
                                                    url: '/company/activate_company',
                                                    data: {id: id, code: company_code, comment: company_comment},
                                                    method: 'post',
                                                    dataType: 'json',
                                                    success: function (data) {
                                                        if(!data.error){
                                                            let target = $(e.target);
                                                            let parent = target.parents('.modal-close');
                                                            $(parent).remove();
                                                            let tr_list = $('tr');
                                                            $.each(tr_list, function (key, item) {
                                                                let hidden_id = $(item).find('td[hidden]').children().val();
                                                                if(id === hidden_id){
                                                                    $.ajax({
                                                                        url: '/company/update_table_row',
                                                                        data: {id: id},
                                                                        method: 'post',
                                                                        dataType: 'html',
                                                                        success: function (data) {
                                                                            $(item).replaceWith(data);
                                                                            Swal.fire({
                                                                                toast: true,
                                                                                timer: 3000,
                                                                                html: '<span style="color: #fff; font-weight: 700">Компания успешно активирована!</span>',
                                                                                background: '#28a745',
                                                                                position: 'top-end',
                                                                                showConfirmButton: false
                                                                            });
                                                                        }
                                                                    })
                                                                    /*$($(item).find('td')[2]).text(company_code);
                                                                    $($(item).find('td')[3]).text(company_comment);
                                                                    $($(item).find('td')[4]).text('Активирована');*/
                                                                }
                                                            })

                                                        }
                                                    }
                                                })
                                            })
                                        }
                                    });
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
                                                $('.company-card').append('<h1 style="display: none" class="table-replace-text">Список компаний пуст. Добавьте новую компанию.</h1>');
                                                $('.table-replace-text').fadeIn(300);
                                            }
                                            Swal.fire({
                                                toast: true,
                                                timer: 3000,
                                                html: '<span style="color: #fff; font-weight: 700">Компания удалена!</span>',
                                                background: '#dc3545',
                                                target: '.popup-handler',
                                                position: 'top-end',
                                                showConfirmButton: false
                                            });
                                            break;
                                        case 'block':
                                            let block_msg = '<span style="color: #fff; font-weight: 700">Компания заблокирована!</span>'
                                            update_table_row(e, id, block_msg, '#dc3545', '/company/update_table_row');
                                            break;
                                        case 'unlock':
                                            let unlock_msg = '<span style="color: #fff; font-weight: 700">Компания разблокирована!</span>'
                                            update_table_row(e, id, unlock_msg, '#28a745', '/company/update_table_row');
                                            break;
                                        case 'deactivate':
                                            let deactivate_msg = '<span style="color: #fff; font-weight: 700">Компания деактивирована!</span>'
                                            update_table_row(e, id, deactivate_msg, '#dc3545', '/company/update_table_row');
                                            break;
                                    }
                                }
                            });
                        }
                        menu.prev().prev().attr('data-toggle', 'close');
                        menu.hide();
                    });
                    company_handler.on('change', '.filter-type', function (e) {
                        $('.filter-input').val('')
                    })

                    $(document).on('dblclick', 'td[data-type="change-status-order"]', function (e) {
                        let td = $(e.target);
                        let id = $(td.children()[0]).val();
                        let color;
                        let option;
                        let status;
                        let text;
                        switch (td.text().trim()) {
                            case 'Поступил':
                                color = '#dc3545';
                                option = '<option value="default" data-type="selected-option" selected style="background: #fff; color: #000">Поступил</option>' +
                                    '<option value="work" style="background: #fff; color: #000">Изготавливается</option>' +
                                    '<option value="confirm" style="background: #fff; color: #000">Готов</option>' +
                                    '<option value="out" style="background: #fff; color: #000">Отгрузили</option>';
                                status = 'Поступил';
                                text = 'Поступил';
                                break;
                            case 'Изготавливается':
                                color = '#ffc107';
                                option = '<option value="default" style="background: #fff; color: #000">Поступил</option>' +
                                    '<option value="work" data-type="selected-option" selected style="background: #fff; color: #000">Изготавливается</option>' +
                                    '<option value="confirm" style="background: #fff; color: #000">Готов</option>' +
                                    '<option value="out" style="background: #fff; color: #000">Отгрузили</option>';
                                status = 'Изготавливается';
                                text = 'Изготавливается';
                                break;
                            case 'Готов':
                                color = '#007bff';
                                option = '<option value="default" style="background: #fff; color: #000">Поступил</option>' +
                                    '<option value="work" style="background: #fff; color: #000">Изготавливается</option>' +
                                    '<option value="confirm" data-type="selected-option" selected style="background: #fff; color: #000">Готов</option>' +
                                    '<option value="out"  style="background: #fff; color: #000">Отгрузили</option>';
                                status = 'Готов';
                                text = 'Готов';
                                break;
                            case 'Отгрузили':
                                color = '#28a745';
                                option = '<option value="default" style="background: #fff; color: #000">Поступил</option>' +
                                    '<option value="work" style="background: #fff; color: #000">Изготавливается</option>' +
                                    '<option value="confirm" style="background: #fff; color: #000">Готов</option>' +
                                    '<option value="out" data-type="selected-option" selected style="background: #fff; color: #000">Отгрузили</option>';
                                status = 'Отгрузили';
                                text = 'Отгрузили';
                                break;
                        }
                        td.replaceWith('<select data-id="'+id+'" data-type="change-order-status" class="text-center" style="width: 100%; color: #fff; font-weight: 700; height: '+td.innerHeight()+'px;   border: none; background-color: '+color+'">' +
                            option+
                            '</select>')

                    });
                    $(document).on('click', 'option[data-type="selected-option"]', function (e) {
                        let select =  $('select[data-type=change-order-status]');
                        let id = select.attr('data-id');
                        let color;
                        let text;
                        let status = $(e.target).val();
                        switch (status) {
                            case 'default':
                                color = '#dc3545';
                                text = 'Поступил';
                                break;
                            case 'work':
                                color = '#ffc107';
                                text = 'Изготавливается';
                                break;
                            case 'confirm':
                                color = '#007bff';
                                text = 'Готов';
                                break;
                            case 'out':
                                color = '#28a745';
                                text = 'Отгрузили';
                                break;
                        }
                        select.replaceWith('<td class="text-center" data-type="change-status-order" style="font-weight: 700; border: 1px solid #dee2e6; color: #fff!important; background: '+color+';"> '+text+' <input type="text" value="'+id+'" hidden></td>')
                    });
                    $(document).on('change','select[data-type="change-order-status"]', function (e) {
                        let select =  $(e.target);
                        let id = select.attr('data-id');
                        let status = select.val();
                        let color;
                        let text;
                        switch (status) {
                            case 'default':
                                color = '#dc3545';
                                select.css('background-color', color);
                                text = 'Поступил';
                                break;
                            case 'work':
                                color = '#ffc107';
                                select.css('background-color', color);
                                text = 'Изготавливается';
                                break;
                            case 'confirm':
                                color = '#007bff';
                                select.css('background-color', color);
                                text = 'Готов';
                                break;
                            case 'out':
                                color = '#28a745';
                                select.css('background-color', color);
                                text = 'Отгрузили';
                                break;
                        }
                        $.ajax({
                            url: '/order/update_order_status',
                            method: 'post',
                            dataType: 'json',
                            data: {status: status, id: id},
                            success: function (data) {
                                if(data.error){

                                }
                                else{
                                    Swal.fire({
                                        toast: true,
                                        timer: 10000,
                                        html: '<span style="color: #fff; font-weight: 700">Статус заказа обнавлен</span>',
                                        background: '#dc3545',
                                        position: 'top-end',
                                        showConfirmButton: false
                                    });
                                    select.replaceWith('<td class="text-center" data-type="change-status-order" style="font-weight: 700; border: 1px solid #dee2e6; color: #fff!important; background: '+color+';"> '+text+' <input type="text" value="'+id+'" hidden></td>')
                                }
                            }
                        });

                    });
                });
                $(document).on('dblclick', 'i[data-type="delete-order"]', function (e) {
                    let id = $(e.target).attr('data-id');
                    let row = $(e.target).parents('tr')

                    $.ajax({
                        url: '/order/delete_order',
                        method: 'post',
                        dataType: 'json',
                        data: {id: id},
                        success: function (data) {
                            if(!data.error){
                                row.remove();
                                Swal.fire({
                                    toast: true,
                                    timer: 10000,
                                    html: '<span style="color: #fff; font-weight: 700">Заказ удален</span>',
                                    background: '#dc3545',
                                    position: 'top-end',
                                    showConfirmButton: false
                                });
                            }
                        }
                    })
                })

                $(document).on('click', 'button[data-type="refresh-order"]', function () {
                    $.ajax({
                        url: '/order/refresh_order',
                        method: 'post',
                        dataType: 'json',
                        success: function (data) {
                            if(!data.error){
                                Swal.fire({
                                    toast: true,
                                    timer: 10000,
                                    html: '<span style="color: #fff; font-weight: 700">Заказы обнавлены</span>',
                                    background: '#dc3545',
                                    position: 'top-end',
                                    showConfirmButton: false
                                });
                            }
                        }
                    })
                });
                $(document).on('dblclick', 'td[data-type="change-week-order"]', function (e) {});
                $(document).on('click', 'td[data-type="change-date-order"]', function (e) {
                    let start_date = '';
                    let id = $(e.target).attr('data-id');
                    if($(e.target).text().trim() !== '-'){
                        start_date = $(e.target).text().trim();
                    }
                    let input = $(e.target).children()[0];
                    let date_picker = $(input).datepicker({
                        minDate: new Date(),
                        dateFormat: 'yyyy-mm-dd',
                        onSelect: function (fd, d, i) {
                            let date = fd.split('-');
                            if(date[1].substr(0,1) === '0'){
                                date[1] = date[1].substr(1,1)
                            }
                            if(date[2].substr(0,1) === '0'){
                                date[2] = date[2].substr(1,1)
                            }
                            switch (date[1]) {
                                case '1':
                                    date[1] = 'января';
                                    break;
                                case '2':
                                    date[1] = 'февраля';
                                    break;
                                case '3':
                                    date[1] = 'марта';
                                    break;
                                case '4':
                                    date[1] = 'апреля';
                                    break;
                                case '5':
                                    date[1] = 'мая';
                                    break;
                                case '6':
                                    date[1] = 'июня';
                                    break;
                                case '7':
                                    date[1] = 'июля';
                                    break;
                                case '8':
                                    date[1] = 'августа';
                                    break;
                                case '9':
                                    date[1] = 'сентября';
                                    break;
                                case '10':
                                    date[1] = 'октября';
                                    break;
                                case '11':
                                    date[1] = 'ноября';
                                    break;
                                case '12':
                                    date[1] = 'декабря';
                                    break;
                            };
                            $(e.target).prev().replaceWith('<input data-id="'+id+'" data-type="date-first-change" data-date="'+fd+'" placeholder="Неделя" style="width: '+$(e.target).innerWidth()/2+'px; height:'+$(e.target).innerHeight()+'px; border: none">');
                            $(e.target).text(date[2]+' '+date[1]+' '+date[0]+' г.');
                            $(e.target).append('<input type="text" data-type="change-date-order" value="'+id+'" style="visibility: hidden; position: absolute">');


                            i.hide();
                            $('.datepicker').remove();
                        }
                    });
                    $(input).focus();
                });

                $(document).on('focusout', 'input[data-type="date-first-change"]', function (e) {
                    let id = $(e.target).attr('data-id');
                    let date = $(e.target).attr('data-date');
                    let week = $(e.target).val().trim();
                    if(week !== '' && week !== '0'){
                        $(e.target).replaceWith('<td class="text-center" data-id="'+id+'" style="cursor: pointer; border: 1px solid #dee2e6" data-type="change-week-order">'+week+'<input type="text" value=""+id+"" hidden></td>');
                        console.log(id+ ' ' +date+' '+week)
                        $.ajax({
                            url:'/order/update_shipping_order',
                            method: 'post',
                            dataType: 'json',
                            data: {id: id, date: date, week: week},
                            success: function (data) {
                                if(!data.error){
                                    Swal.fire({
                                        toast: true,
                                        timer: 10000,
                                        html: '<span style="color: #fff; font-weight: 700">Дата отгрузки и неделя изменены</span>',
                                        background: '#dc3545',
                                        position: 'top-end',
                                        showConfirmButton: false
                                    });
                                }
                            }
                        });
                    }

                });
                $('.card-body').on('scroll',  function (e) {
                    //console.log();
                    let scroll = $(e.target).scrollTop();
                    let input_list = $('input[data-type="change-date-order"]');
                    let datepicker_list = $('.datepicker')
                    $.each(input_list, function (key, item) {
                        let top = $(item).css('top');
                        let position = $($(item).parent()).offset().top - 200
                        $(item).css({
                            top: position
                        })
                    });
                });
            </script>
        </div>
    </div>
</div>
