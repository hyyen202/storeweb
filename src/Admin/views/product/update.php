<?php
    $category_list = category_list($db);
    $type_list = type_list($db);
    if(isset($_GET['i'])){
        $id = $_GET['i'];
        $product_items = product_items($db, $id);
    }
    
 ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div id="results"></div>
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">CẬP NHẬT SẢN PHẨM</p>
                    <button class="btn btn-danger btn-sm ms-auto" id ="cancel" >Hủy</button>
                </div>
            </div>
            <div class="card-body">
                <?php foreach($product_items as $item)
                    {

                    
                ?>
                <form id="update_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type_choose" class="form-control-label">Loại sản phẩm</label>
                                <select class="form-control" id="type_choose" name ="type_choose">
                                    <option value="">Chọn loại sản phẩm</option>
                                    <?php 
                                        foreach($type_list as $type){
                                            $selected = ($type['id'] == $item['type']) ? 'selected' : '';
                                            echo '<option value="'.$type["id"].'" '.$selected.'>'.$type['name'].'</option>';
                                        }
                                        
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_choose" class="form-control-label">Danh mục sản phẩm</label>
                                <select class="form-control" id="category_choose" name ="category_choose">
                                    <option value="">Chọn danh mục sản phẩm</option>
                                    <?php 
                                       foreach($category_list as $category){
                                        $selected = ($category['id'] == $item['category']) ? 'selected' : '';
                                        echo '<option value="'.$category["id"].'" '.$selected.'>'.$category['name'].'</option>';
                                    }
                                        
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product" class="form-control-label">Tên sản phẩm</label>
                                <input class="form-control" type="text" id="product" placeholder="Nhập tên sản phẩm..." 
                                    value = "<?php echo $item['name']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qty" class="form-control-label">Số lượng</label>
                                <input class="form-control" type="number" min="1" id="qty" value = "<?php echo $item['qty']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img[]" class="form-control-label">Hình ảnh sản phẩm</label>
                                </br>
                                <!-- <input class="form-control" type="file" id="img[]" multiple="multiple" value = "<?php echo $item['img']?>" disabled> -->
                                <?php
                                    // Kiểm tra xem có tệp nào đã được chọn không
                                    if (!empty($item['img'])) {
                                        // Tách tên các tệp đã chọn thành mảng
                                        $fileNames = explode(',', $item['img']);
                                        // Hiển thị tên của từng tệp
                                        foreach ($fileNames as $fileName) {
                                            echo '<span>' . $fileName . '</span><br>';
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price" class="form-control-label">Giá</label>
                                <input class="form-control" type="number" min="1" id="price" value = "<?php echo $item['price']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount" class="form-control-label">Giảm giá(%)</label>
                                <input class="form-control" type="number" min="0" max="100" id="discount" value = "<?php echo $item['discount']?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="detail" class="form-control-label">Chi tiết sản phẩm</label>
                                <textarea class="form-control" id = "detail" rows ="4"><?php echo $item['detail']?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status_choose" class="form-control-label">Trạng thái</label>
                                <select class="form-control" id="status_choose" name="status_choose">
                                    <?php 
                                        $status = ($item['status'] == 1);
                                        if($status)
                                        {
                                            echo '<option value="1" selected>Còn hàng</option>';
                                            echo '<option value="0">Hết hàng</option>';
                                        }else{
                                            echo '<option value="1" >Còn hàng</option>';
                                            echo '<option value="0" selected >Hết hàng</option>';
                                        }
                                        
                                        
                                    ?>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3 text-end">
                            <button class="btn btn-primary btn-sm ms-auto " id="update_p" type="submit">Cập nhật</button>
                        </div>
                    </div>
                    
                </form>
                <?php 
                    } 
                ?>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/35.0.0/classic/ckeditor.js"></script> -->
<script>
// Khởi tạo CKEditor với ID của textarea là 'editor'
// ClassicEditor
//     .create(document.querySelector('#detail'))
//     .catch(error => {
//         console.error(error);
//     });

$(document).ready(function() {
    // Handling form submission for adding products
    $('#update_p').click(function(e) {
        e.preventDefault();
        let type_choose = $('#type_choose').val(),
                    category_choose = $('#category_choose').val(),
                    product = $('#product').val(),
                    qty = $('#qty').val(),
                    price = $('#price').val(),
                    discount = $('#discount').val(),
                    detail = $('#detail').val();
                    status= $('#status_choose').val();
                    sp = <?php echo $id?>;
                var formData = new FormData();
                // Append other form data
                formData.append('type_choose', type_choose);
                formData.append('category_choose', category_choose);
                formData.append('product', product);
                formData.append('qty', qty);
                formData.append('price', price);
                formData.append('discount', discount);
                formData.append('detail', detail);
                formData.append('sp', sp);
                formData.append('status', status);

        $.ajax({
            url: '../src/Admin/views/product/action.php?act=update_p',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                let res = JSON.parse(response);
                $('#results').html(
                    `<div class="alert alert-${res.type}" role="alert">${res.message}</div>`
                    );
                $('#results').fadeIn('slow', function() {
                    $('#results').delay(5000).fadeOut();
                });
                if (res.type == "success") {
                    $("#update_form")[0].reset();
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
    // Thêm loại
    $('#cancel').click(function(e) {
        window.location.href = "/store/quanly/?p=product"
    });

});
</script>