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
?>
<?php foreach($data['data'] as $item):?>
    <tr data-show="true" data-type="order" class="show">
        <td class="text-center" style="border: 1px solid #dee2e6"><?php echo $item['n_order_se'];?><input type="text" value="<?php echo $item['order_id'];?>" hidden></td>
        <td class="text-center" style="border: 1px solid #dee2e6"><?php echo $item['n_order_ne'];?><input type="text" value="<?php echo $item['order_id'];?>" hidden></td>
        <td class="text-center" style="border: 1px solid #dee2e6"><?php echo humanity_date($item['n_date_con']);?><input type="text" value="<?php echo $item['order_id'];?>" hidden></td>
        <td class="text-center" <?php if(in_array($_SESSION['user']['role_id'], $_SESSION['app']['role_policy']['order']['update'])){echo 'data-type="change-status-order"';}?> style="font-weight: 700; border: 1px solid #dee2e6; color: #fff!important; background: <?php echo status_translate($item['n_status'])['color'];?>"><?php echo status_translate($item['n_status'])['text'];?> <input type="text" value="<?php echo $item['order_id'];?>" hidden></td>
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