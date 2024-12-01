<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh mục</h1>
    </div>

    <?php if(isset($message)):?>
        <div><?php echo $message;?></div>
    <?php endif;?>
    <!-- Content Row -->
    <form method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary d-inline-block">Thêm mới</h6>
                <div class="float-right">
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group">
                            <div class="input-group-append">
                                <label class="btn btn-primary">
                                    Tên category
                                </label>
                            </div>
                            <input name="ten" value="<?php echo $cat['ten']?>" type="text" class="form-control bg-light border-0 small">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <div class="input-group-append">
                                <label class="btn btn-primary">
                                    Chuyên mục cha
                                </label>
                            </div>
                            <select name="parent_id" class="custom-select" id="inputGroupSelect01">
                                <option selected>Chọn</option>
                                <?php foreach($cats as $i):?>
                                    <?php if($cat['parent_id'] == $i['id']):?>
                                        <option value="<?php echo $i['id'];?>" selected ><?php echo $i['ten'];?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $i['id'];?>"><?php echo $i['ten'];?></option>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div><label>Mô tả</label></div>
                        <div>
                            <textarea id="myArea1" name="mota" style="width: 100%;" rows="5"><?php echo $cat['mota'];?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


<!-- /.container-fluid -->