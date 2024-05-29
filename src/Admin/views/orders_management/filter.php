<!-- End Navbar -->
<div class="col-md-7 mt-4">
    <div class="card h-100 mb-4">
        <div class="card-header pb-0 px-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="mb-0">Quản lý đơn hàng</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <select id="filter">
                        <option value="">Chọn phân loại</option>
                        <option value="0">Chưa nhận</option>
                        <option value="1">Đã nhận</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body" id="result">
            <ul class="list-group">
                <?php 
                $all_bill = all_bill($db);
                foreach($all_bill as $item){
                ?>
                <a href="?p=order&i=<?php echo $item['id']; ?>">
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg gr">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                <i class="fas fa-arrow-down"></i>
                            </button>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm"><?php echo $item['product']; ?></h6>
                                <span class="text-xs"><?php echo $item['create_at']; ?></span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                            - $ <?php echo $item['total']; ?>
                        </div>
                    </li>
                </a>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<script>
document.getElementById('filter').onchange = function(e) {
    var filterValue = $(this).val();
    $.ajax({
        type: "POST",
        url: "../src/Admin/views/orders_management/action.php?act=filter",
        data: {
            filterValue: filterValue
        },
        success: function(response) {
            var data = JSON.parse(response);
            
            if (data.length > 0) {
                var html = '<ul class="list-group">';
                
                data.forEach(function(item) {
                    html += '<a href="?p=order&i='+item.id+'">';
                    html += '<li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg gr">';
                    html += '<div class="d-flex align-items-center">';
                    html += '<button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">';
                    html += '<i class="fas fa-arrow-down"></i>';
                    html += '</button>';
                    html += '<div class="d-flex flex-column">';
                    html += '<h6 class="mb-1 text-dark text-sm">' + item.product + '</h6>';
                    html += '<span class="text-xs">' + item.create_at + '</span>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">';
                    html += '- $ ' + item.total;
                    html += '</div>';
                    html += '</li>';
                    html += '</a>';
                });
                
                html += '</ul>';
                
                // Thay thế nội dung của card-body hiện có thay vì thêm card-body mới
                $('#result .list-group').html(html);
            } else {
                $('#result .list-group').html('<div class="alert alert-warning" role="alert">Không có dữ liệu phù hợp.</div>');
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
};

</script>
