<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh mục</h1>
    </div>
    <?php if(isset($_SESSION['message'])):?>
        <div><?php echo $_SESSION['message'];?></div>
    <?php endif;?>
    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Danh mục</h6>
            <a href="/shop-php/index.php?area=admin&con=CategoryController&act=add" class="btn btn-primary">Thêm</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>id cha</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach($cat as $i):?>
                        <tr>
                            <td><?php echo $i['ten']?></td>
                            <td><?php echo $i['parent_id']?></td>
                            <td><a href="/shop-php/index.php?area=admin&con=CategoryController&act=edit&id=<?php echo $i['id'];?>">Sửa</a> | 
                            <a href="/shop-php/index.php?area=admin&con=CategoryController&act=delete&id=<?php echo $i['id'];?>">Xóa</a></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->