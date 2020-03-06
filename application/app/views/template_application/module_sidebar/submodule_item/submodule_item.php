<li class="nav-item">
    <a href="#" class="nav-link module-loader-button" data-ru-name-module="<?php echo $data['ru_name']?>" data-module-name="<?php echo $data['name']?>"
        data-status="<?php echo $data['status']?>" <?php if($data['status']==='active'){ echo 'style="color: rgb(255, 255, 255); background: rgb(220, 53, 69) none repeat scroll 0% 0%;"';}?> >
        <i class="nav-icon fas fa-<?php echo $data['fa']?>"></i>
        <p>
            <?php echo $data['ru_name']?>
        </p>
        <p class="right">
            <span data-type="add" data-name="<?php echo $data['ru_name']?>" class="badge-success badge"></span>
            <span data-type="moderation" data-name="<?php echo $data['ru_name']?>" class="badge-secondary badge"></span>
            <span data-type="delete" data-name="<?php echo $data['ru_name']?>" class="badge-danger badge"></span>
        </p>
    </a>

</li>