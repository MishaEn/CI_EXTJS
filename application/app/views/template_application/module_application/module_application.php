<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <?php if($_SESSION['user']['role_id'] === 2):?>
                <h3 class="submodule_title">Мои компании</h3>
            <?php else:?>
                <h3 class="submodule_title">Компании</h3>
            <?php endif;?>
            <div class="popup-handler">

            </div>
        </div>
    </section>
    <section class="content">
<!--        <div class="preloader-holder"  style="z-index: 1501; left: 50%; top: 50%; position: absolute; background: rgba(255,40,49,0)">
            <div style="z-index: 1500" class="preloader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </div>
        <style>
            .preloader {
                /* size */
                width: 100px;
                height: 100px;

                transform: translateX(-50%) translateY(-50%);
                animation: rotatePreloader 2s infinite ease-in;
            }

            @keyframes rotatePreloader {
                0% {
                    transform: translateX(-50%) translateY(-50%) rotateZ(0deg);
                }
                100% {
                    transform: translateX(-50%) translateY(-50%) rotateZ(-360deg);
                }
            }
            .preloader div {
                position: absolute;
                width: 100%;
                height: 100%;
                opacity: 0;
            }

            .preloader div:before {
                content: "";
                position: absolute;
                left: 50%;
                top: 0%;
                width: 10%;
                height: 10%;
                background-color: #dc3545;
                transform: translateX(-50%);
                border-radius: 50%;
            }

            .preloader div:nth-child(1) {
                transform: rotateZ(0deg);
                animation: rotateCircle1 2s infinite linear;
                z-index: 9;
            }

            @keyframes rotateCircle1 {
                0% {
                    opacity: 0;
                }
                0% {
                    opacity: 1;
                    transform: rotateZ(36deg);
                }
                7% {
                    transform: rotateZ(0deg);
                }
                57% {
                    transform: rotateZ(0deg);
                }
                100% {
                    transform: rotateZ(-324deg);
                    opacity: 1;
                }
            }
            .preloader div:nth-child(2) {
                transform: rotateZ(36deg);
                animation: rotateCircle2 2s infinite linear;
                z-index: 8;
            }

            @keyframes rotateCircle2 {
                5% {
                    opacity: 0;
                }
                5.0001% {
                    opacity: 1;
                    transform: rotateZ(0deg);
                }
                12% {
                    transform: rotateZ(-36deg);
                }
                62% {
                    transform: rotateZ(-36deg);
                }
                100% {
                    transform: rotateZ(-324deg);
                    opacity: 1;
                }
            }
            .preloader div:nth-child(3) {
                transform: rotateZ(72deg);
                animation: rotateCircle3 2s infinite linear;
                z-index: 7;
            }

            @keyframes rotateCircle3 {
                10% {
                    opacity: 0;
                }
                10.0002% {
                    opacity: 1;
                    transform: rotateZ(-36deg);
                }
                17% {
                    transform: rotateZ(-72deg);
                }
                67% {
                    transform: rotateZ(-72deg);
                }
                100% {
                    transform: rotateZ(-324deg);
                    opacity: 1;
                }
            }
            .preloader div:nth-child(4) {
                transform: rotateZ(108deg);
                animation: rotateCircle4 2s infinite linear;
                z-index: 6;
            }

            @keyframes rotateCircle4 {
                15% {
                    opacity: 0;
                }
                15.0003% {
                    opacity: 1;
                    transform: rotateZ(-72deg);
                }
                22% {
                    transform: rotateZ(-108deg);
                }
                72% {
                    transform: rotateZ(-108deg);
                }
                100% {
                    transform: rotateZ(-324deg);
                    opacity: 1;
                }
            }
            .preloader div:nth-child(5) {
                transform: rotateZ(144deg);
                animation: rotateCircle5 2s infinite linear;
                z-index: 5;
            }

            @keyframes rotateCircle5 {
                20% {
                    opacity: 0;
                }
                20.0004% {
                    opacity: 1;
                    transform: rotateZ(-108deg);
                }
                27% {
                    transform: rotateZ(-144deg);
                }
                77% {
                    transform: rotateZ(-144deg);
                }
                100% {
                    transform: rotateZ(-324deg);
                    opacity: 1;
                }
            }
            .preloader div:nth-child(6) {
                transform: rotateZ(180deg);
                animation: rotateCircle6 2s infinite linear;
                z-index: 4;
            }

            @keyframes rotateCircle6 {
                25% {
                    opacity: 0;
                }
                25.0005% {
                    opacity: 1;
                    transform: rotateZ(-144deg);
                }
                32% {
                    transform: rotateZ(-180deg);
                }
                82% {
                    transform: rotateZ(-180deg);
                }
                100% {
                    transform: rotateZ(-324deg);
                    opacity: 1;
                }
            }
            .preloader div:nth-child(7) {
                transform: rotateZ(216deg);
                animation: rotateCircle7 2s infinite linear;
                z-index: 3;
            }

            @keyframes rotateCircle7 {
                30% {
                    opacity: 0;
                }
                30.0006% {
                    opacity: 1;
                    transform: rotateZ(-180deg);
                }
                37% {
                    transform: rotateZ(-216deg);
                }
                87% {
                    transform: rotateZ(-216deg);
                }
                100% {
                    transform: rotateZ(-324deg);
                    opacity: 1;
                }
            }
            .preloader div:nth-child(8) {
                transform: rotateZ(252deg);
                animation: rotateCircle8 2s infinite linear;
                z-index: 2;
            }

            @keyframes rotateCircle8 {
                35% {
                    opacity: 0;
                }
                35.0007% {
                    opacity: 1;
                    transform: rotateZ(-216deg);
                }
                42% {
                    transform: rotateZ(-252deg);
                }
                92% {
                    transform: rotateZ(-252deg);
                }
                100% {
                    transform: rotateZ(-324deg);
                    opacity: 1;
                }
            }
            .preloader div:nth-child(9) {
                transform: rotateZ(288deg);
                animation: rotateCircle9 2s infinite linear;
                z-index: 1;
            }

            @keyframes rotateCircle9 {
                40% {
                    opacity: 0;
                }
                40.0008% {
                    opacity: 1;
                    transform: rotateZ(-252deg);
                }
                47% {
                    transform: rotateZ(-288deg);
                }
                97% {
                    transform: rotateZ(-288deg);
                }
                100% {
                    transform: rotateZ(-324deg);
                    opacity: 1;
                }
            }
            .preloader div:nth-child(10) {
                transform: rotateZ(324deg);
                animation: rotateCircle10 2s infinite linear;
                z-index: 0;
            }

            @keyframes rotateCircle10 {
                45% {
                    opacity: 0;
                }
                45.0009% {
                    opacity: 1;
                    transform: rotateZ(-288deg);
                }
                52% {
                    transform: rotateZ(-324deg);
                }
                102% {
                    transform: rotateZ(-324deg);
                }
                100% {
                    transform: rotateZ(-324deg);
                    opacity: 1;
                }
            }

        </style>-->
        <div class="modal-holder"></div>
    </section>
    <script>
        $(document).ready(function (e) {
            let module_name = $('.module-loader-button[data-status="active"]').attr('data-module-name');
            $.ajax({
                url: '/company',
                method: 'post',
                dataType: 'html',
                success: function (data) {
                    $('.submodule').remove();
                    $('.content').append(data);
                }
            });
            $(document).on('input', '.filter-input', function (e) {
                let input = e.target;
                let sort_type = $('.filter-type').val();
                let head_row_list = $('table thead tr');
                let body_row_list = $('table tbody tr');
                let head_column_list = head_row_list.children();
                let body_column_list = body_row_list.children();
                let paginate_button = $('.index-button');
                let show_count = 0;
                let column_number = 0;
                /*$.each(paginate_button, function (key, item) {
                    $(item).show();
                });*/
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
                let button_count = Math.ceil(show_count/10);
                $.each(paginate_button, function (key, item) {
                    if(button_count===0){
                        $(item).show();
                    }
                    else{
                        if($(item).attr('data-dt-idx')>button_count){
                            $(item).hide();
                        }
                        else{
                            $(item).show();
                        }
                    }
                });
            });
        })
    </script>
</div>
