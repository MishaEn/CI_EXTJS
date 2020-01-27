<div class="submodule downloads" data-status="disabled" data-submoudle-appliaction = "downloads">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-1 text-center" style="padding: 0">
                    <i style="display: inline; color: #262626; font-size: 2em" data-folder-path = '/file/A' class="fas backward fa-arrow-up"></i>
                    <i style="display: inline; color: #262626; margin-left: 5px; font-size: 2em" data-folder-path = '/file/A' class="fas forward fa-arrow-right"></i>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="file-manager" style="padding: 15px">
                <!--            <div class="folder" style="display: inline-block" data-folder-path = './public/file/266'>
                                <i style="display: block; color: #dc3545; font-size: 2.5em" data-folder-path = './public/file/266' class="fas fa-folder"></i>
                                <span class="folder">266</span>
                            </div>-->

                <div class="row folder-row" data-folder-name="/" data-level="1">
                    <div class="col-1 folder-hover text-center">
                        <i style="display: block; color: #dc3545; font-size: 3.5em" data-folder-path = '/file/266' class="fas folder fa-folder"></i>
                        <span class="folder">266</span>
                    </div>
                    <div class="col-1 folder-hover text-center">
                        <i style="display: block; color: #dc3545; font-size: 3.5em" data-folder-path = '/file/A' class="fas folder fa-folder"></i>
                        <span class="folder">A</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('dblclick', '.folder', function (e) {
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
                    /*                    $.each(data.file, function (key, item) {
                                            $('.file-manager').append('<a download target="_blank" href="'+$(e.target).attr('data-folder-path')+'/'+item+'">'+item+'</a>');
                                        })*/
                }
            })
        })
    </script>
</div>

<!--$(e.target).after('<a download target="_blank" href="'+$(e.target).attr('data-folder-path')+'/'+item+'">'+item+'</a>');-->

<!--$(e.target).after('<button class="folder" data-folder-path ="'+$(e.target).attr('data-folder-path')+'/'+item+'">'+item+'</button>');-->