<div class="card card-danger card-outline">
    <div class="card-header">
        <h3 class="card-title">Активировать директора</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control code" data-placeholder ="Код"  placeholder="Код" value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control markup" data-placeholder ="Наценка"  placeholder="Наценка" value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control activation_count" data-placeholder ="Количество активаций"  placeholder="Количество активаций" value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="input-group mb-3">
                    <select class="custom-select brand" data-placeholder ="Бренд" value="">
                        <option value="1">Дедал</option>
                        <option value="2">Аветти</option>
                        <option value="3">Малина</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="input-group mb-3">
                    <textarea class="form-control comment" name="comment" id="comment" placeholder="Комментарий" cols="30" rows="5"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-12">
                <button class="btn active-director btn-block btn-danger">
                    Активировать
                </button>
                <input type="text" hidden value="<?php echo $data?>">
            </div>
        </div>
    </div>
    <script>
    </script>
</div>