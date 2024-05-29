<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="d-flex align-items-center card-header pb-0">
                <p class="">THÊM DANH MỤC</p>
            </div>
            <div id="result"></div>
            <form id="add_category_form" method="post" class="card-body pt-0 pb-0">
                <div class="row">
                    <div class="col-md-12 row">
                        <div class="form-group col-md-5 " style="padding-right: 0;">
                            <label for="cate" class="form-control-label">Tên</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" id="category" name="category" placeholder="Nhập tên danh mục..." >
                            </div>
                        </div>
                        <div class="form-group col-md-4" style="padding-right: 0;">
                            <label for="image" class="form-control-label">Hình ảnh</label>
                            <div class="col-md-12">
                                <input class="form-control" type="file" id="img" name="image" accept="image/*" required>
                            </div>
                        </div>
                        <div class="form-group col-md-3 " style="padding-top: 2rem; padding-right: 0;">
                            <div>
                                <button class="btn btn-secondary btn-sm ms-auto" type="submit" id="add_categories">Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-5 d-flex align-items-center"  style = "padding-right: 0;">
                                    <h6 class="mb-0">Danh sách danh mục:</h6>
                                </div>
                                <div class="col-7"  style = "padding: 5px;">
                                    <input type="text" class="form-control" id="categorySearch" placeholder="Tìm kiếm danh mục..." style = "padding: 5px;">
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table id="categoryTable" class="table align-items-center mb-3">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên danh mục</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Trạng thái</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hình ảnh</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $category_list = category_list($db);
                                            $i = 1;
                                            foreach($category_list as $item) {
                                        ?>
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-center"><?php echo $i;?></p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm limited-length"><?php echo $item['name'];?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $item['status'] == 1 ? "Đang hoạt động" : "Ngưng hoạt động";?></p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold"><?php echo $item['img'];?></span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="/store/quanly/?p=update_category&i=<?php echo $item['id'];?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <?php 
                                            $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="pagination" class="text-center my-4"></div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="d-flex align-items-center card-header pb-0">
                <p class="mb-3">THÊM LOẠI</p>
            </div>
            <div id="result_type"></div>
            <form id="add_type_form" method="post" class="card-body pt-0 pb-0">
                <div class="row">
                    <div class="col-md-12 row">
                        <div class="form-group col-md-9">
                            <label for="cate" class="form-control-label">Tên</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" id="type" name="type" placeholder="Nhập tên loại...">
                            </div>
                        </div>
                        <div class="form-group col-md-3" style="padding-top: 2.2rem;">
                            <div class="col-md-12">
                                <button class="btn btn-secondary btn-sm ms-auto" type="submit" id="add_type">Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-5 d-flex align-items-center" style = "padding-right: 0;">
                                    <h6 class="mb-0">Danh sách loại:</h6>
                                </div>
                                <div class="col-7" style = "padding:5px">
                                    <input type="text" class="form-control" id="typeSearch" placeholder="Tìm kiếm loại sản phẩm..." style = "padding:5px">
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table id="typeTable" class="table align-items-center mb-3">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên loại</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Trạng thái</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $type_list = type_list($db);
                                            $i = 1;
                                            foreach($type_list as $item) {
                                        ?>
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-center"><?php echo $i;?></p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm limited-length"><?php echo $item['name'];?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $item['status'] == 1 ? "Đang hoạt động" : "Ngưng hoạt động";?></p>
                                            </td>
                                            <td class="align-middle">
                                                <a href="/store/quanly/?p=update_type&i=<?php echo $item['id'];?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <?php 
                                            $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="typePagination" class="text-center my-4"></div>
        </div>
    </div>
</div>

<style>
.limited-length {
    max-width: 150px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Form submission
    $('#add_category_form').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission
        
        let category = $('#category').val();
        var formData = new FormData();
        var img = $('#img')[0].files; // Corrected selector

        for (var i = 0; i < img.length; i++) {
            formData.append('img[]', img[i]);
        }
        formData.append('category', category);

        $.ajax({
            url: '../src/Admin/views/product/action.php?act=add_category',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                let res = JSON.parse(response);
                $('#result').html(
                    `<div class="alert alert-${res.type}" role="alert">${res.message}</div>`
                );
                $('#result').fadeIn('slow', function() {
                    $('#result').delay(5000).fadeOut();
                });
                if (res.type == "success") {
                    $("#add_category_form")[0].reset(); // Reset the form after successful submission
                        window.location.href = '/store/quanly/?p=category'; // Reset the form after successful submission
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    $('#add_type_form').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission
        
        let type = $('#type').val();
        var formData = new FormData();
        formData.append('type', type);

        $.ajax({
            url: '../src/Admin/views/product/action.php?act=add_type',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                let res = JSON.parse(response);
                $('#result_type').html(
                    `<div class="alert alert-${res.type}" role="alert">${res.message}</div>`
                );
                $('#result_type').fadeIn('slow', function() {
                    $('#result_type').delay(5000).fadeOut();
                });
                if (res.type == "success") {
                    $("#add_type_form")[0].reset(); // Reset the form after successful submission
                    window.location.href = '/store/quanly/?p=category';
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    // Search functionality for category
    $('#categorySearch').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#categoryTable tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // Search functionality for type
    $('#typeSearch').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#typeTable tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // Pagination function (unchanged)
    function paginateTable(tableId, paginationId, pageNumber = 1) {
        var table = document.querySelector(tableId);
        var rows = table.rows;
        var pageSize = 8; // Số hàng trên mỗi trang
        var pageCount = Math.ceil((rows.length - 1) / pageSize); // Tính toán số trang

        // Ẩn tất cả các hàng
        for (var i = 1; i < rows.length; i++) {
            rows[i].style.display = 'none';
        }

        // Hiển thị trang được chọn
        var start = pageNumber * pageSize - pageSize + 1;
        var end = pageNumber * pageSize;
        for (var j = start; j <= end && j < rows.length; j++) {
            rows[j].style.display = '';
        }

        // Tạo các nút phân trang
        var pagination = document.getElementById(paginationId);
        pagination.innerHTML = ''; // Xóa nút phân trang cũ

        for (var i = 0; i < pageCount; i++) {
            var currentPageNumber = i + 1;
            var button = document.createElement('button');
            button.innerText = currentPageNumber;
            button.classList.add("btn", "btn-outline-secondary", "btn-sm", "me-2", "pagination-button");
            button.style.padding = "0.25rem 0.5rem";

            // Gắn sự kiện click cho từng nút để chuyển đến trang tương ứng
            button.addEventListener('click', function () {
                var selectedPageNumber = parseInt(this.innerText);
                paginateTable(tableId, paginationId, selectedPageNumber);
            });
            pagination.appendChild(button);
        }
    }

    // Gọi hàm phân trang với trang 1 khi tài liệu được tải
    window.onload = function () {
        paginateTable('#categoryTable', 'pagination', 1);
        paginateTable('#typeTable', 'typePagination', 1);
    };
});
</script>
