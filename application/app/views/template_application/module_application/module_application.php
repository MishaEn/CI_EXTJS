<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <?php if($_SESSION['user']['role_id'] === 2):?>
                <h3 class="submodule_title">Мои заказы</h3>
            <?php else:?>
                <h3 class="submodule_title">Заказы</h3>
            <?php endif;?>
            <div class="popup-handler">
                <i></i>
            </div>
        </div>
    </section>
    <section class="content">
        <!--<i style="color: #DC3545; font-size: 1.3rem; cursor: pointer" data-type="file" data-name="375_5316.zip" class="fas file-loader fa-file-pdf"></i><input type="text" value="" hidden>-->
        <div class="modal-holder"></div>
    </section>
    <script>
        $(document).ready(function (e) {
            let module_name = $('.module-loader-button[data-status="active"]').attr('data-module-name');
            $('.handler').ready(function () {
                $.ajax({
                    url: '/order',
                    method: 'post',
                    dataType: 'html',
                    success: function (data) {
                        $('.submodule').remove();
                        $('.content').append(data);
                    }
                });
            });
            $(document).on('input', '.filter-input', function (e) {
                let input = e.target;
                let value = $(input).val().trim();
                let query_part = value.split(';');

                let sort_type = $('.filter-type').val().trim();
                let head_row_list = $('table thead tr');
                let body_row_list = $('table tbody tr');
                let head_column_list = head_row_list.children();
                let body_column_list = body_row_list.children();
                let paginate_button = $('.index-button');
                let body_row_buffer = body_row_list;
                let show_count = 0;
                let column_number = 0;
                if(sort_type !== 'query'){
                    $.each(head_column_list, function (key, item) {
                        if($(item).children().children().children().text() === sort_type){
                            column_number = key;
                        }
                    });
                    $.each(body_row_list, function (key, item) {
                        let value;
                        if($(item.children[column_number]).children().hasClass('pseudo-link')){
                            value = $(item.children[column_number]).children().text().trim();
                        }
                        else{
                            value = $(item.children[column_number]).text().trim();
                        }
                        if($(input).val() !== ''){
                            if(value.includes($(input).val())){
                                show_count++;
                                $(item).addClass('show');
                                $(item).show();
                            }
                            else{
                                $(item).removeClass('show');
                                $(item).hide();
                            }
                        }
                        else{
                            $(item).addClass('show');
                            $(item).show();
                        }
                    });
                }
                else{
                    if(query_part[0] !== ''){
                        $.each(query_part, function (index, row_value) {
                            if(row_value !== ''){
                                $.each(head_column_list, function (key, item) {
                                    if($(item).children().children().children().text() === row_value.split(':')[0].replace(/"/g, '').trim()){
                                        column_number = key;
                                    }
                                });
                                $.each(body_row_buffer, function (key, item) {
                                    let value;
                                    if($(item.children[column_number]).children().hasClass('pseudo-link')){
                                        value = $(item.children[column_number]).children().text().trim();
                                    }
                                    else{
                                        value = $(item.children[column_number]).text().trim();
                                    }
                                    if($(input).val() !== ''){
                                        if(value.includes(row_value.split(':')[1].trim())){
                                            show_count++;
                                            $(item).addClass('show');
                                            $(item).attr('data-show', 'true');
                                            $(item).show();
                                        }
                                        else{
                                            $(item).removeClass('show');
                                            $(item).attr('data-show', 'false');
                                            $(item).hide();
                                        }
                                    }
                                    else{
                                        $(item).addClass('show');
                                        $(item).attr('data-show', 'true');
                                        $(item).show();
                                    }
                                });
                                body_row_buffer = [];
                            }
                            body_row_buffer = $('tr[data-show="true"]');
                        })
                    }
                    else{
                        $.each($('tbody tr'), function (key, item) {
                            $(item).attr('data-show', true);
                            $(item).show();
                        })
                    }

                }
            });
            $(document).on('click', '.filter-input', function (e) {
                let input = e.target;
                let sort_type = $('.filter-type').val();
                let head_row_list = $('table thead tr');
                let head_column_list = head_row_list.children();
                if(sort_type === 'query'){
                    if(!$('div').is('.filter-option')){
                        $(input).after('' +
                            '<div class="filter-option" style="position: absolute; z-index: 2000; background: #fff; width: '+$(input).outerWidth()+'px; border-radius: .25rem; border: 1px solid #ced4da">' +
                            '</div>' +
                            '');
                        $.each(head_column_list, function (key, item) {
                            $('.filter-option').append('' +
                                '<div data-type="filter-option-item" style="padding: 10px; list-style: none">' +
                                $(item).text()+
                                '</div>' +
                                '')
                        })
                    }
                    else{
                        $('.filter-option').show()
                    }
                }
            });
            $(document).on('focusout', '.filter-input', function (e) {
                setTimeout(function () {
                    $('.filter-option').hide();
                }, 200)
            });
            $(document).on('click', 'div[data-type="filter-option-item"]', function (e) {
                if(!$('.filter-input').val().includes($(e.target).text())){
                    if($('.filter-input').val().trim() === ''){
                        $('.filter-input').val('"'+$(e.target).text()+'" : ')
                    }
                    else{
                        $('.filter-input').val( $('.filter-input').val().trim()+'; '+'"'+$(e.target).text()+'" : ')
                    }
                }
                $('.filter-input').focus();
                //$('.filter-option').remove();
            });
            $(document).on('mouseover', 'div[data-type="filter-option-item"]', function (e) {
                $(e.target).css({
                    background: '#e8e8e8'
                })
            });
            $(document).on('mouseout', 'div[data-type="filter-option-item"]', function (e) {
                $(e.target).css({
                    background: '#FFF'
                })
            });
            $(document).on('click', 'i[data-type="clear-filter-input"]', function (e) {
                let body_row_list = $('table tbody tr');
                $.each(body_row_list, function (key, item) {
                    $(item).show()
                });
                $('.filter-input').val('')
            })
        })
        $(document).on('click', '.file-loader', function (e) {
            let type = $(e.target).attr('data-type');
            let file;
            if(type==='specification'){
                let id = $(e.target).next().val();
                let order_id = $(e.target).attr('data-order');
                file = id+'_'+order_id;

            }
            else{
                file = $(e.target).attr('data-name')
            }
            $.ajax({
                url:'/file_loader/get_'+type,
                method: 'post',
                data: {file: file},
                success: function (data) {
                    if(type === 'specification'){

                        if(JSON.parse(data)['error']){
                            $(e.target).addClass()
                        }
                        else{
                            $('body').append('<a hidden></a>');
                            let a = document.createElement('a');
                            a.href= "data:application/octet-stream;base64,"+JSON.parse(data)['data'];
                            a.target = '_blank';
                            a.download = 'спецификация_'+file+'.pdf';
                            a.click();
                        }
                    }
                    else{
                        if(JSON.parse(data)['error']){
                            $(e.target).addClass()
                        }
                        else{
                            $('body').append('<a></a>');
                            let a = document.createElement('a');
                            a.href= JSON.parse(data)['data'];
                            a.target = '_blank';
                            a.download = file;
                            a.click();
                        }
                    }
                }
            })
        });
        $(document).on('click', '.sort-button', function (e) {
            let icon = $(e.target);
            let icon_list = $('.sort-button');
            let sort_type = icon.attr('data-type');
            let column_number = 0;
            let direction;
            $.each(icon_list, function (key, item) {

                if(!$(icon).is($(item))){
                    if($(item).hasClass('asc')){
                        $(item).removeClass('fa-chevron-up').addClass('fa-times').removeClass('asc');
                    }
                    else if($(item).hasClass('desc')){
                        $(item).removeClass('fa-chevron-down').addClass('fa-times').removeClass('desc')
                    }
                }
            });
            if(!icon.hasClass('asc') && !$(e.target).hasClass('desc')){
                icon.removeClass('fa-times').addClass('fa-chevron-up').addClass('asc');
                direction = 1;
            }
            else{
                if(icon.hasClass('asc')){
                    icon.removeClass('fa-chevron-up').addClass('fa-chevron-down').removeClass('asc').addClass('desc');
                    direction = 2;
                }
                else if(icon.hasClass('desc')){
                    icon.removeClass('fa-chevron-down').addClass('fa-times').removeClass('desc').addClass('none');
                    direction = 0;
                }
            }
            console.log('/'+sort_type+'/get_sort_'+sort_type+', направление '+direction+', поле '+$(icon).attr('data-field'))
            $.ajax({
                url: '/'+sort_type+'/get_sort_'+sort_type,
                method: 'post',
                dataType: 'html',
                data: {direction: direction, field: $(icon).attr('data-field')},
                success: function (data) {
                    $('tbody').remove();
                    $('thead').after('<tbody></tbody>')
                    $('tbody').append(data)
                }
            })

        });
    </script>
</div>
