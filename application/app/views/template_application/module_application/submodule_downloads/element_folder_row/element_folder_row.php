<?php
    $directory_array = [];
    $file_array = [];
    foreach ($data['data'] as $key => $item){
        if(isset($item['type'])){
            if($item['type'] == 'directory'){
                $directory_array[$key] = $item;
            }
            else{
                $file_array[$key] = $item;
            }
        }
    }
    $result_array = $directory_array + $file_array;
?>

<div class="row folder-row" data-folder-name="<?= $data['data']['path'];?>" data-level="0">
<?php $count = 1; foreach ($result_array as $key => $item):?>
    <?php if($key !== '.' and  $key !== '..'):?>
        <?php if(isset(explode('.', $key)[1])):?>
            <?php $file_data = parse_format(explode('.', $key)[1]);?>
            <div class="col-1 folder-hover text-center"style="margin-bottom: 15px">
                <i style="display: block; cursor: pointer; color: <?= $file_data['color'];?>; font-size: 3.5em" data-type="file" data-folder-path = "<?= $data['data']['path'];?>/<?= $key;?>" data-user-id="<?= $_SESSION['user']['id']?>" data-size="<?= $item['size']?>"  class="fas <?= 'fa-'.$file_data['format'];?>"></i>
                <span style="margin-top: 5px; font-weight: 400;" class="folder"><?php if(strlen($key) > 10){echo substr($key, 0, 8).'..'.substr($key, strlen($key) - 4, 4);}else{echo $key;}?></span>
            </div>
        <?php else:?>
            <?php $file_data = parse_format('');?>
            <div class="col-1 folder-hover text-center"style="margin-bottom: 15px">
                <i style="display: block; cursor: pointer; color: <?= $file_data['color'];?>; font-size: 3.5em" data-type="folder" data-folder-path = "<?= $data['data']['path'];?>/<?= $key;?>" data-user-id="<?= $_SESSION['user']['id']?>" data-size="<?= $item['size']?>" class="fas <?= 'fa-'.$file_data['format'];?>"></i>
                <span style="margin-top: 5px; font-weight: 400;" class="folder"><?php if(strlen($key) > 10){echo substr($key, 0, 8).'..';}else{echo $key;}?></span>
            </div>
        <?php endif;?>
    <?php endif;?>
<?php $count++; endforeach;?>
</div>
