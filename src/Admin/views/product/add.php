<?php
    $category_list = category_list($db);
    $type_list = type_list($db);
 ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div id="results"></div>
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">THÊM SẢN PHẨM</p>
                    <button class="btn btn-danger btn-sm ms-auto" id ="cancel" >Hủy</button>
                </div>
            </div>
            <div class="card-body">
                <form id="add" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type_choose" class="form-control-label">Loại sản phẩm</label>
                                <select class="form-control" id="type_choose" name ="type_choose">
                                    <option value="">Chọn loại sản phẩm</option>
                                    <?php 
                                        foreach($type_list as $type){
                                           echo '<option value="'.$type["id"].'">'.$type['name'].'</option>';
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
                                           echo '<option value="'.$category["id"].'">'.$category['name'].'</option>';
                                        }
                                        
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product" class="form-control-label">Tên sản phẩm</label>
                                <input class="form-control" type="text" id="product" placeholder="Nhập tên sản phẩm..."
                                    >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qty" class="form-control-label">Số lượng</label>
                                <input class="form-control" type="number" min="1" id="qty" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img[]" class="form-control-label">Hình ảnh sản phẩm</label>
                                <input class="form-control" type="file" id="img[]" multiple="multiple">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price" class="form-control-label">Giá</label>
                                <input class="form-control" type="number" min="1" id="price" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount" class="form-control-label">Giảm giá(%)</label>
                                <input class="form-control" type="number" min="0" max="100" id="discount">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="detail" class="form-control-label">Chi tiết sản phẩm</label>
                                <textarea class="form-control" id = "detail" rows ="4"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3 text-end">
                            <button class="btn btn-primary btn-sm ms-auto " id="add_p" type="submit">Thêm</button>
                        </div>
                    </div>
                </form>
                <hr class="horizontal dark">
                <div class="d-flex align-items-center">
                    <p class="mb-3">THÊM DANH MỤC VÀ LOẠI SẢN PHẨM</p>
                </div>
                <div id="result"></div>
                <form id="add_category_form" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="cate" class="form-control-label">Tên danh mục</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" id="category" placeholder="Nhập tên danh mục..."
                                        required>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary btn-sm ms-auto" id="add_category"
                                        type="submit">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form id="add_type_form" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="type" class="form-control-label">Tên loại</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" id="type" placeholder="Nhập tên loại...">
                                </div>
                                <div class="col-md-2 ">
                                    <button class="btn btn-primary btn-sm ms-auto" id="add_type"
                                        type="submit">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                </form>
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
    $('#add_p').click(function(e) {
        e.preventDefault();
        let type_choose = $('#type_choose').val(),
                    category_choose = $('#category_choose').val(),
                    product = $('#product').val(),
                    qty = $('#qty').val(),
                    price = $('#price').val(),
                    discount = $('#discount').val(),
                    detail = $('#detail').val();

                var formData = new FormData();
                var img = $('#img\\[\\]')[0].files;

                for (var i = 0; i < img.length; i++) {
                    formData.append('img[]', img[i]);
                }
                // Append other form data
                formData.append('type_choose', type_choose);
                formData.append('category_choose', category_choose);
                formData.append('product', product);
                formData.append('qty', qty);
                formData.append('price', price);
                formData.append('discount', discount);
                formData.append('detail', detail);

        $.ajax({
            url: '../src/Admin/views/product/action.php?act=add',
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
                    $("#add")[0].reset();
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // Thêm danh mục
    $('#add_category_form').submit(function(e) {
        e.preventDefault();
        let category = $('#category').val();
        $.ajax({
            url: '../src/Admin/views/product/action.php?act=add_category',
            type: 'POST',
            data: {
                category: category
            },
            success: function(response) {
                let res = JSON.parse(response);
                $('#result').html(
                    `<div class="alert alert-${res.type}" role="alert">${res.message}</div>`
                    );
                $('#result').fadeIn('slow', function() {
                    $('#result').delay(5000).fadeOut();
                });
                if (res.type == "success") {
                    $("#add_category_form")[0].reset();
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // Thêm loại
    $('#add_type_form').submit(function(e) {
        e.preventDefault();
        let type = $('#type').val();
        $.ajax({
            url: '../src/Admin/views/product/action.php?act=add_type',
            type: 'POST',
            data: {
                type: type
            },
            success: function(response) {
                let res = JSON.parse(response);
                $('#result').html(
                    `<div class="alert alert-${res.type}" role="alert">${res.message}</div>`
                    );
                $('#result').fadeIn('slow', function() {
                    $('#result').delay(5000).fadeOut();
                });
                if (res.type == "success") {
                    $("#add_type_form")[0].reset();
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