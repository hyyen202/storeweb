<div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-3 d-flex align-items-center row" style="padding-right: 0;">
                            <h6 class="mb-0" style="padding-right: 0;">Danh sách sản phẩm:</h6>
                        </div>
                        <div class="col-6 row" style="padding-left: 0;">
                            <div class="col-6" style="padding-left: 0;">
                                <input type="text" class="form-control" id="productSearch" placeholder="Tìm kiếm sản phẩm..." style="padding:5px">
                            </div>
                            <div class="col-6"></div>
                        </div>
                        <div class="col-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="?p=add_p"><i class="fas fa-plus"></i>&nbsp;&nbsp;Thêm</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="productTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên sản phẩm</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Loại</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Danh mục</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Giá</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số lượng</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Đã bán</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $product_list = product_list($db);
                                $i = 1;
                                 foreach($product_list as $item)
                                 {
                                ?>
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-center"><?php echo $i;?></p>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm limited-length"><?php echo $item['product'];?></h6>
                                                <p class="text-xs text-secondary mb-0"><?php echo date('d/m/Y', strtotime($item['create_at'])); ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?php echo $item['type'];?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold"><?php echo $item['category'];?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><?php echo $item['price'].'đ';?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><?php echo $item['qty'];?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><?php echo $item['qty'];?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            <?php if($item['status'] == 0 ) {
                                                    echo 'Hết hàng';
                                                }else if($item['status'] == 1){
                                                    echo 'Còn hàng';
                                                }
                                            ?>
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="/store/quanly/?p=update_p&i=<?php echo $item['id'];?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
    <div id="noResults" class="text-center my-4" style="display: none;">Không có sản phẩm nào</div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Search functionality for products
            $('#productSearch').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#productTable tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
                checkNoResults(); // Check for no results after search
            });

            function checkNoResults() {
                var visibleRows = $('#productTable tbody tr:visible').length;
                if (visibleRows === 0) {
                    $('#noResults').show();
                } else {
                    $('#noResults').hide();
                }
            }

            // Pagination function
            function paginateTable(tableId, paginationId, pageNumber = 1) {
                var table = document.querySelector(tableId);
                var rows = table.querySelectorAll('tbody tr'); // Select rows within tbody
                var pageSize = 8; // Số hàng trên mỗi trang
                var pageCount = Math.ceil(rows.length / pageSize); // Tính toán số trang

                // Ẩn tất cả các hàng
                rows.forEach((row, index) => {
                    row.style.display = 'none';
                });

                // Hiển thị trang được chọn
                var start = (pageNumber - 1) * pageSize;
                var end = start + pageSize;
                for (var i = start; i < end && i < rows.length; i++) {
                    rows[i].style.display = '';
                }

                // Tạo các nút phân trang
                var pagination = document.getElementById(paginationId);
                pagination.innerHTML = ''; // Xóa nút phân trang cũ

                for (var i = 1; i <= pageCount; i++) {
                    var button = document.createElement('button');
                    button.innerText = i;
                    button.classList.add("btn", "btn-outline-secondary", "btn-sm", "me-2", "pagination-button");
                    button.style.padding = "0.25rem 0.5rem";

                    // Gắn sự kiện click cho từng nút để chuyển đến trang tương ứng
                    button.addEventListener('click', function () {
                        paginateTable(tableId, paginationId, parseInt(this.innerText));
                    });
                    pagination.appendChild(button);
                }
                checkNoResults(); // Check for no results after pagination
            }

            // Gọi hàm phân trang với trang 1 khi tài liệu được tải
            paginateTable('#productTable', 'pagination', 1);
        });
    </script>