<div class="col-lg-7 mb-lg-0 mb-4" id = "new_orders">
    <div class="card ">
        <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
                <h6 class="mb-2">Đơn hàng mới</h6>
            </div>
        </div>
        <?php 
            $new_orders = new_orders_list($db);
            $i = 1;
            foreach($new_orders as $item)
            {
                
        ?>
            <div class="table-responsive">
                <table class="table align-items-center ">
                    <thead>
                        <tr>

                            <th class ="text-xs font-weight-bold mb-0" >STT</th>
                            <th class ="text-xs font-weight-bold mb-0">Sản phẩm:</th>
                            <th class ="text-xs font-weight-bold mb-0">Giá</th>
                            <th class ="text-xs font-weight-bold mb-0">Sale</th>
                            <th class ="text-xs font-weight-bold mb-0">Số lượng</th>
                            <th class ="text-xs font-weight-bold mb-0">Tổng</th>
                            <th class ="text-xs font-weight-bold mb-0">KH</th>
                            <th class ="text-xs font-weight-bold mb-0">SDT</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1 align-items-center">
                                    <div class="ms-4">
                                        <h6 class="text-sm mb-0"> <?php echo $i;?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1 align-items-center">
                                    <div class="ms-4">
                                        <h6 class="text-sm mb-0"> <?php echo $item['product'];?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <h6 class="text-sm mb-0"><?php echo $item['price'];?></h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <h6 class="text-sm mb-0"><?php echo $item['discount'];?></h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <h6 class="text-sm mb-0"><?php echo $item['qty'];?></h6>
                                </div>
                            </td>
                            <td class="align-middle text-sm">
                                <div class="col text-center">
                                    <h6 class="text-sm mb-0"><?php echo $item['total'];?></h6>
                                </div>
                            </td>
                            <td class="align-middle text-sm">
                                <div class="col text-center">
                                    <h6 class="text-sm mb-0"><?php echo $item['customer'];?></h6>
                                </div>
                            </td>
                            <td class="align-middle text-sm">
                                <div class="col text-center">
                                    <h6 class="text-sm mb-0"><?php echo $item['phone'];?></h6>
                                </div>
                            </td>
                            <td class="align-middle text-sm">
                                <div class="col text-center">
                                    <a href="/store/quanly/?p=orders&i=<?php echo $item['id'];?>">Edit</a>
                                </div>
                            </td>
                        </tr>  
                    </tbody>
                </table>
            </div>
        <?php 
        $i++;
    }?>
    </div>
</div>