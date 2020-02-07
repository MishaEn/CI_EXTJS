<tr class="show">
    <td  style="border: 1px solid #dee2e6"><span data-modal = "employee" class="pseudo-link"><?php echo $data['data']['full_name'];?></span><input type="text" value="<?php echo $data['data']['id'];?>" hidden></td>
    <td  style="border: 1px solid #dee2e6"><span><?php echo $data['data']['login'];?></span><input type="text" value="<?php echo $data['data']['id'];?>" hidden></td>
    <td class="" style="border: 1px solid #dee2e6"><span><?php echo $data['data']['email'];?></span><input type="text" value="<?php echo $data['data']['director_id'];?>" hidden></td>
    <?php switch($data['data']['status']):
    case 0:?>
        <td class="text-center" style="border: 1px solid #dee2e6; background: #dc3545; color: #fff; font-weight: 700;">Не активирован</td>
        <?php break; case 1:?>
        <td class="text-center" style="border: 1px solid #dee2e6; background: #28a745; color: #fff; font-weight: 700;">Активирован</td>
        <?php break; case 2:?>
    <td class="text-center" style="border: 1px solid #dee2e6; background: #6c757d; color: #fff; font-weight: 700;">Заблокирована/td>
        <?php break; endswitch;?>
    <td style="border: 1px solid #dee2e6" class="text-center">
        <i style="color: #2d2e2c; font-size: 18px; cursor: pointer" data-toggle="close" class="fa fa-cog employee-settings"></i><input type="text" value="<?php echo $data['data']['id'];?>" hidden>
        <div class="option-holder" style="display: none; position: absolute;">
            <ul class="drop-menu">
                <li><span class="menu-button" data-target = "modal" data-action="get_update_employee">Редактировать</span><input type="text" value="<?php echo $data['data']['id'];?>" hidden></li>
                <li><span class="menu-button" data-target = "employee" data-action="delete">Удалить</span><input type="text" value="<?php echo $data['data']['id'];?>" hidden></li>
            </ul>
        </div>
    </td>
    <td hidden>
        <input type="text" value="<?php echo $data['data']['id'];?>" hidden>
    </td>
</tr>-->
