<div class="submodule downloads" data-status="disabled" data-submoudle-appliaction = "downloads">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-2 text-left" style="padding: 0">
                    <i style="color: #f8f9fa; cursor: not-allowed; font-size: 1.8em; display: inline" data-active="false" data-type="backward" data-folder-path='/LK/' class="fas fa-arrow-left" data-brand="<?= $_SESSION['user']['brand'];?>" data-id="<?= $_SESSION['user']['id']?>"></i>
                    <i style="color: #f8f9fa; cursor: not-allowed; font-size: 1.8em; display: inline" data-active="false" data-type="home" data-folder-path='/LK/' class="fas fa-home" data-brand="<?= $_SESSION['user']['brand'];?>" data-id="<?= $_SESSION['user']['id']?>"></i>
                </div>
                <div class="col-2">
                    <span>Выделить все</span>
                    <i style="display: inline; cursor: pointer; color: #262626; font-size: 1.8em" data-active="false" data-folder-path = '/file/A' data-type="select-all" class="far fa-square"></i>
                </div>
                <div class="col-2">
                    <span>Скачать</span>
                    <i style="display: inline; cursor: not-allowed; color: #f8f9fa; font-size: 1.8em" data-active="false" data-type="download" data-folder-path = '/file/A' class="fas fa-download"></i>
                    <span>Загрузить</span>
                    <i style="display: inline; cursor: not-allowed; color: #f8f9fa; margin-left: 5px; font-size: 1.8em" data-active="false" data-folder-path = '/file/A' class="fas fa-upload"></i>
                </div>
            </div>
        </div>
        <div class="card-body" style="overflow-y: scroll">
            <div class="file-manager" style="padding: 15px">
                <?php if($_SESSION['user']['role_id']==2):?>
                    <div class="row folder-row" data-folder-name="/" data-level="0">
                        <div class="col-1 folder-hover text-center">
                            <i style="display: block; cursor: pointer; color: #dc3545; font-size: 3.5em" data-type="folder" data-folder-path = '/LK/<?= $_SESSION['user']['brand'];?>' data-user-id="<?= $_SESSION['user']['id']?>" class="fas folder fa-folder"></i>
                            <span class="folder">Бренд</span>
                        </div>
                        <div class="col-1 folder-hover text-center">
                            <i style="display: block; cursor: pointer; color: #dc3545; font-size: 3.5em" data-type="folder" data-folder-path = '/LK/zakazi/' data-user-id="<?= $_SESSION['user']['id']?>" class="fas folder fa-folder"></i>
                            <span class="folder">Спецификации</span>
                        </div>
                        <div class="col-1 folder-hover text-center">
                            <i style="display: block; cursor: pointer; color: #dc3545; font-size: 3.5em" data-type="folder" data-folder-path = '/public/file/<?= $_SESSION['user']['id']?>' data-user-id="<?= $_SESSION['user']['id']?>" class="fas folder fa-folder"></i>
                            <span class="folder">Личные</span>
                        </div>
                    </div>
                <?php else:?>
                    <div class="row folder-row" data-folder-name="/" data-level="0">
                        <div class="col-1 folder-hover text-center">
                            <i style="display: block; color: #dc3545; font-size: 3.5em" data-type="folder" data-folder-path = '/LK/<?= $_SESSION['user']['brand'];?>' data-user-id="<?= $_SESSION['user']['id']?>" class="fas folder fa-folder"></i>
                            <span class="folder">Бренд</span>
                        </div>
                        <div class="col-1 folder-hover text-center">
                            <i style="display: block; color: #dc3545; font-size: 3.5em" data-type="folder" data-folder-path = '/LK/zakazi/' data-user-id="<?= $_SESSION['user']['id']?>" class="fas folder fa-folder"></i>
                            <span class="folder">Спецификации</span>
                        </div>
                        <div class="col-1 folder-hover text-center">
                            <i style="display: block; color: #dc3545; font-size: 3.5em" data-type="folder" data-folder-path = '/public/file/<?= $_SESSION['user']['id']?>' data-user-id="<?= $_SESSION['user']['id']?>" class="fas folder fa-folder"></i>
                            <span class="folder">Личные</span>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '.folder-hover', function (e){
            let wrapper = $('.folder-hover');
            let target = $(e.target).parent();
            if($('i[data-type="select-all"]').attr('data-checked') === 'true'){
                if(target.attr('data-selected') === 'true'){
                    target.attr('data-selected', false).css('background',  '#fff')
                }
                else{
                    target.attr('data-selected', true).css('background',  '#cde8ff')
                }
            }
            else{

                $('.folder-row').css('background', '#fff');
                wrapper.attr('data-selected', false).css('background', '#fff');
                if($(e.target).attr('data-type') === 'file'){
                    $('i[data-type="download"').css({
                        cursor: 'pointer',
                        color: '#262626'
                    })
                }
                else{
                    $('i[data-type="download"').css({
                        cursor: 'not-allowed',
                        color: '#f8f9fa'
                    })
                }
                target.attr('data-selected', true).css('background',  '#cde8ff')
            }
        });
        $(document).on('dblclick', 'i[data-type="folder"]', function (e){
            let wrapper = $('i[data-type="folder"]').parent();
            let target = $(e.target).parent();
            let backward_button = $('i[data-type="backward"]');
            let home_button = $('i[data-type="home"]');
            let forward_button = $('i[data-type="forward"]');
            wrapper.attr('data-selected', false).css('background', '#fff');
            target.attr('data-selected', true).css('background',  '#cde8ff');
            let path = $(e.target).attr('data-folder-path');
            let path_array = path.split('/');
            path_array.pop();
            $(e.target).addClass('animated jello');
            $.ajax({
                url: '/downloads/get_file_list',
                method: 'post',
                dataType: 'html',
                data: {path: path},
                success: function (data) {
                    let path_string = path_array.join('/');
                    forward_button.attr('data-folder-path', $(e.target).attr('data-folder-path'));
                    backward_button.attr('data-folder-path', path_string);
                    backward_button.css({
                        color: '#262626',
                        cursor: 'pointer',
                    });
                    home_button.css({
                        color: '#262626',
                        cursor: 'pointer',
                    });
                    backward_button.attr('data-active', true);
                    home_button.attr('data-active', true);
                    $('.folder-row').fadeOut(150, function () {
                        $('.folder-row').remove();
                        $('.file-manager').append(data);
                        $('.folder-row').fadeIn(150);
                    });
                }
            })
        });
        $(document).on('click', 'i[data-type="download"]', function (e) {
            let folder = $('.folder-row').attr('data-folder-name');
            let file_list='';
            $.each($($('i[data-type="file"]').parent()), function (key, item) {
                if($(item).attr('data-selected') === 'true'){
                    let array = $($(item).children()).attr('data-folder-path').split('/');
                    file_list += '/'+array[array.length -1]
                }

            });
            Swal.fire({
                background: 'rgba(0,0,0,0)',
                html:
                    '<div class="card card-danger card-outline">' +
                        '<div class="card-header">' +
                            '<h3 class="card-title">Ваши файлы архивируются и скоро будут доступны для скачивания</h3>' +
                        '</div>\n' +
                        '<div class="card-body">' +
                            'Ваши файлы архивируются. Как только Ваш архив будет готов, нажмите кнопку "Сохранить" или "Ок"' +
                        '</div>' +
                        '<div class="card-footer">' +
                            'Данное окно закроется автоматически'+
                        '</div>' +
                    '</div>',
                showConfirmButton: false,
                showCloseButton: false,
                showCancelButton: false
            });
            $.ajax({
                url: '/downloads/get_archive',
                method: 'post',
                data: {folder: folder, file_list: file_list.substr(1)},
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(data, status, xhr) {
                    Swal.close();
                    var a = document.createElement('a');
                    var url = window.URL.createObjectURL(data);
                    a.href = url;
                    a.download = 'файлы.zip';
                    document.body.append(a);
                    a.click();
                    a.remove();
                    window.URL.revokeObjectURL(url);
                }
            });
        });
        $(document).on('click', 'i[data-type="backward"]', function (e) {
            let target = $(e.target);
            let path = target.attr('data-folder-path');
            let brand = target.attr('data-brand');
            let active = target.attr('data-active');
            let id = target.attr('data-id');
            let path_array = path.split('/');
            path_array.pop();
            if(active === 'true'){
                if(path === '/LK'){
                    html =
                        '<div class="row folder-row" data-folder-name="/" data-level="0">'+
                        '<div class="col-1 folder-hover text-center">'+
                        '<i style="display: block; cursor: pointer; color: #dc3545; font-size: 3.5em" data-type="folder" data-folder-path = "/LK/'+brand+'" data-user-id="'+id+'" class="fas folder fa-folder"></i>'+
                        '<span class="folder">Бренд</span>'+
                        '</div>'+
                        '<div class="col-1 folder-hover text-center">'+
                        '<i style="display: block; cursor: pointer; color: #dc3545; font-size: 3.5em" data-type="folder" data-folder-path = "/LK/zakazi/" data-user-id="'+id+'" class="fas folder fa-folder"></i>'+
                        '<span class="folder">Спецификации</span>'+
                        '</div>'+
                        '<div class="col-1 folder-hover text-center">'+
                        '<i style="display: block; cursor: pointer; color: #dc3545; font-size: 3.5em" data-type="folder" data-folder-path = "/public/file'+id+'" data-user-id="'+id+'" class="fas folder fa-folder"></i>'+
                        '<span class="folder">Личные</span>'+
                        '</div>'+
                        '</div>'
                    $('.folder-row').fadeOut(150, function () {
                        $('.folder-row').remove();
                        $('.file-manager').append(html);
                        $('.folder-row').fadeIn(150);
                        target.css({
                            color: '#f8f9fa',
                            cursor: 'not-allowed'
                        });
                        $('i[data-type="home"]').css({
                            color: '#f8f9fa',
                            cursor: 'not-allowed'
                        });
                        target.attr('data-active', 'fasle');
                        $('i[data-type="home"]').attr('data-active', 'fasle')
                    });
                }
                else{

                    let backward_button = $('i[data-type="backward"]');
                    let home_button = $('i[data-type="home"]');
                    let forward_button = $('i[data-type="forward"]');
                    $.ajax({
                        url: '/downloads/get_file_list',
                        method: 'post',
                        dataType: 'html',
                        data: {path: $(e.target).attr('data-folder-path')},
                        success: function (data) {
                            let path_string = path_array.join('/');
                            target.attr('data-folder-path', path_string);
                            forward_button.attr('data-folder-path', $(e.target).attr('data-folder-path'));
                            backward_button.css({
                                color: '#262626',
                                cursor: 'pointer',
                            });
                            home_button.css({
                                color: '#262626',
                                cursor: 'pointer',
                            });
                            backward_button.attr('data-active', true);
                            home_button.attr('data-active', true);
                            $('.folder-row').fadeOut(300, function () {
                                $('.folder-row').remove();
                                $('.file-manager').append(data);
                                $('.folder-row').fadeIn(300);
                            });
                        }
                    })
                }
            }
        });
        $(document).on('click', 'i[data-type="home"]', function (e) {
            let target = $(e.target);
            let path = target.attr('data-folder-path');
            let brand = target.attr('data-brand');
            let active = target.attr('data-active');
            let id = target.attr('data-id');
            if(active === 'true'){
                html =
                    '<div class="row folder-row" data-folder-name="/" data-level="0">'+
                    '<div class="col-1 folder-hover text-center">'+
                    '<i style="display: block; cursor: pointer; color: #dc3545; font-size: 3.5em" data-type="folder" data-folder-path = "/LK/'+brand+'" data-user-id="'+id+'" class="fas folder fa-folder"></i>'+
                    '<span class="folder">Бренд</span>'+
                    '</div>'+
                    '<div class="col-1 folder-hover text-center">'+
                    '<i style="display: block; cursor: pointer; color: #dc3545; font-size: 3.5em" data-type="folder" data-folder-path = "/LK/zakazi/" data-user-id="'+id+'" class="fas folder fa-folder"></i>'+
                    '<span class="folder">Спецификации</span>'+
                    '</div>'+
                    '<div class="col-1 folder-hover text-center">'+
                    '<i style="display: block; cursor: pointer; color: #dc3545; font-size: 3.5em" data-type="folder" data-folder-path = "/public/file'+id+'" data-user-id="'+id+'" class="fas folder fa-folder"></i>'+
                    '<span class="folder">Личные</span>'+
                    '</div>'+
                    '</div>'
                target.addClass('animated pulse');
                $('.folder-row').fadeOut(300, function () {
                    $('.folder-row').remove();
                    $('.file-manager').append(html);
                    $('.folder-row').fadeIn(300);
                    target.css({
                        color: '#f8f9fa',
                        cursor: 'not-allowed'
                    });
                    $('i[data-type="backward"]').css({
                        color: '#f8f9fa',
                        cursor: 'not-allowed'
                    });
                    target.attr('data-active', 'fasle');

                    $('i[data-type="backward"]').attr('data-active', 'fasle')
                });
            }
        });
        $(document).on('dblclick', 'i[data-type="file"]', function (e){

            let path = $(e.target).attr('data-folder-path');
            let link = 'ftp://eCAD:3cadevolution@193.111.3.246:21'+path;
            window.open(link)
            console.log(link)
        });
        $(document).on('click', 'i[data-type="select-all"]', function (e){
            if($(e.target).attr('data-checked') === 'true'){
                $(e.target).attr('data-checked', 'false');
                $(e.target).removeClass('fa-check-square').addClass('fa-square')
                $($('i[data-type="file"]').parent()).attr('data-selected', false);
                $($('i[data-type="file"]').parent()).css({
                    background:  '#fff'
                })
                $('i[data-type="download"').css({
                    cursor: 'not-allowed',
                    color: '#f8f9fa'
                })
            }
            else{
                $('i[data-type="download"').css({
                    cursor: 'pointer',
                    color: '#262626'
                })
                $(e.target).removeClass('fa-square').addClass('fa-check-square');
                $(e.target).attr('data-checked', 'true');
                $($('i[data-type="file"]').parent()).attr('data-selected', true);
                $($('i[data-type="file"]').parent()).css({
                    background:  '#cde8ff'
                })
            }
        });
       /* $(document).on('dblclick', '.folder', function (e) {
            $.ajax({
                url: '/downloads/get_file_list',
                method: 'post',
                dataType: 'json',
                data: {path: $(e.target).attr('data-folder-path')},
                success: function (data) {
                    let folder_row = $('.folder-row');
                    $(folder_row[folder_row.length-1]).hide();
                    let prev_level = $(folder_row[folder_row.length-1]).attr('data-level');
                    if(data.folder.length+data.file.length-2 < 12){
                        $('.file-manager').append(
                            '<div class="row folder-row" data-level='+(++prev_level)+'></div>');
                    }
                    $.each(data.folder, function (key, item) {
                        if(item !== '.' && item !== '..'){
                            folder_row = $('.folder-row');
                            $(folder_row[folder_row.length-1]).append(
                                '<div class="col-1 folder-hover text-center">' +
                                '<i style="display: block; color: #dc3545; font-size: 3.5em" data-folder-path = "'+$(e.target).attr('data-folder-path')+'/'+item+'" class="fas folder fa-folder"></i>' +
                                '<span style="display: block;" class="folder">'+item+'</span>    ' +
                                '</div>'
                            )
                        }
                    });
                    /!*                    $.each(data.file, function (key, item) {
                                            $('.file-manager').append('<a download target="_blank" href="'+$(e.target).attr('data-folder-path')+'/'+item+'">'+item+'</a>');
                                        })*!/
                }
            })
        })*/
    </script>
</div>
