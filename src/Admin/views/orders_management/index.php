<div class="row">
        <div class="col-md-5 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Xác nhận đơn hàng</h6>
              <sub >*Check vào ô để cập nhật đã nhận</sub>
            </div>
            <?php 
                $accept_bill = accept_bill($db);
                if(!empty($accept_bill)){
                
                foreach($accept_bill as $item){
                   
            ?>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            <h6 class="mb-3 text-sm">Mã hóa đơn: <?php echo $item['id']; ?></h6>
                            <span class="mb-2 text-xs">Sản phẩm: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $item['product']; ?></span></span>
                            <span class="mb-2 text-xs">Số lượng: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $item['qty']; ?></span></span>
                            <span class="mb-2 text-xs">Tổng: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $item['total']; ?>vnd</span></span>
                            <span class="text-xs">Thời gian: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $item['create_at']; ?></span></span>
                        </div>
                        <div class="ms-auto text-end">
                        <?php 
                            echo '<input type = "checkbox" id = "check" value ="" id_bill ='.$item['id'].' class="btn btn-link text-danger text-gradient px-3 mb-0 danhan">';
                            echo '<a class="btn btn-link text-danger text-gradient px-3 mb-0 danhan">Xác nhận</a>';
                        
                        ?>
                        </div>
                    </li>
                </ul>
            </div>
            <?php }}
            else{
                echo '<div class="text-gradient px-3 mb-0">Không có đơn hàng đang giao</div>';
            }
             ?>
        
          </div>
        </div>
        <?php include("filter.php")?>
      </div>
<script>
document.getElementById('check').onclick = function(e){
                if (this.checked){
                    var idBill = $(this).attr('id_bill'); // Lấy ID của hóa đơn hiện tại
                    var xacnhan = confirm("Sau khi đồng ý bạn sẽ không được thay đổi lại.");
                    if (xacnhan) {
                        $.ajax({
                            url: "../src/Admin/views/orders_management/action.php?act=xacnhan",
                            type: "POST",
                            data: {
                                idBill: idBill // Truyền ID của hóa đơn đến server
                            },
                            success: function(response) {
                                let res = JSON.parse(response);
                                $('#results').html(
                                    `<div class="alert alert-${res.type}" role="alert">${res.message}</div>`
                                );
                                $('#results').fadeIn('slow', function() {
                                    $('#results').delay(5000).fadeOut();
                                });
                                if (res.type == "success") {
                                    window.location.href = '/store/quanly/?p=orders_management'; 
                                }
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    } else {
                        // Nếu không đồng ý, hãy huỷ chọn checkbox
                        $(this).prop('checked', false);
                    }
                }

            };
            

</script>