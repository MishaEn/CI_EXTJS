<?php foreach($data as $item):?>
    <tr class="show">
        <td  style="border: 1px solid #dee2e6"><span data-modal = "director" data-action="get_director_modal" data-data="<?= $item['id']?>" class="pseudo-link"><?php echo $item['user_id'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
        <td  style="border: 1px solid #dee2e6"><span data-modal = "director" data-action="get_director_modal" data-data="<?= $item['id']?>" class="pseudo-link"><?php echo $item['full_name'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
        <td class="" style="border: 1px solid #dee2e6"><span data-modal = "director" data-action="get_director_modal" data-data="<?= $item['id']?>" class="pseudo-link"><?php echo $item['login'];?></span><input type="text" value="<?php echo $item['id'];?>" hidden></td>
        <!--<td class="" style="border: 1px solid #dee2e6"><span data-modal = "user" class="pseudo-link"><?php /*echo $item['email'];*/?></span><input type="text" value="<?php /*echo $item['id'];*/?>" hidden></td>-->
        <td class="" style="border: 1px solid #dee2e6"><span data-modal = "director" data-action="get_director_modal" data-data="<?= $item['id']?>" class="pseudo-link"><?php echo $item['code'];?></span> <input type="text" value="<?php echo $item['id'];?>" hidden></td>
        <td class="" style="border: 1px solid #dee2e6"><?php echo $item['markup'];?></td>
        <td class="" style="border: 1px solid #dee2e6"><?php echo $item['activation_count'];?></td>
        <td class="" style="border: 1px solid #dee2e6"><?php
            switch ($item['brand']){
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
            ?></td>
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
                <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Запрос на бокировку</td>
                <?php break; case 5:?>
                <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Модерация</td>
                <?php break; endswitch;?>
        <td style="border: 1px solid #dee2e6" class="text-center">
            <i style="color: #2d2e2c; font-size: 18px; cursor: pointer" data-toggle="close" class="fa fa-cog director-settings"></i><input type="text" value="<?php echo $item['id'];?>" hidden>
            <div class="option-holder" style="display: none; position: absolute;">
                <?php switch($item['status']):
                    case 0:?>
                        <ul class="drop-menu">
                            <li><span class="menu-button" data-target = "director" data-action="get_activate_director">Активировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                            <li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                            <li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                        </ul>
                        <?php break;
                    case 1:?>
                        <ul class="drop-menu">
                            <li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                            <li><span class="menu-button" data-target = "director" data-action="deactivate_director">Деактивировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                            <li><span class="menu-button" data-target = "director" data-action="block_director">Заблокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                            <li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                        </ul>
                        <?php break;
                    case 2:?>
                        <ul class="drop-menu">
                            <li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                            <li><span class="menu-button" data-target = "director" data-action="deactivate_director">Деактивировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                            <li><span class="menu-button" data-target = "director" data-action="unlock_director">Разбокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                            <li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                        </ul>
                        <?php break;
                    case 3:?>
                        <ul class="drop-menu">
                            <li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                            <li><span class="menu-button" data-target = "director" data-action="block_director">Заблокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                            <li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                        </ul>
                        <?php break;
                    case 4:?>
                        <ul class="drop-menu">
                            <li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                            <li><span class="menu-button" data-target = "director" data-action="block_director">Заблокировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                            <li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                        </ul>
                        <?php break;
                    case 5:?>
                        <ul class="drop-menu">
                            <li><span class="menu-button" data-target = "director" data-action="get_update_director">Редактировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                            <li><span class="menu-button" data-target = "director" data-action="get_activate_director">Подтвердить и активировать</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
                            <li><span class="menu-button" data-target = "director" data-action="delete_director">Удалить</span><input type="text" value="<?php echo $item['id'];?>" hidden></li>
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