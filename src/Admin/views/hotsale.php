<div class="col-lg-12 mb-lg-0 mb-4" id="new_orders">
    <div class="card">
        <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
                <h6 class="mb-2">Đơn hàng mới</h6>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead>
                    <tr>
                        <th class="text-xs font-weight-bold mb-0">STT</th>
                        <th class="text-xs font-weight-bold mb-0">Sản phẩm</th>
                        <th class="text-xs font-weight-bold mb-0">Giá</th>
                        <th class="text-xs font-weight-bold mb-0">Sale</th>
                        <th class="text-xs font-weight-bold mb-0">Số lượng</th>
                        <th class="text-xs font-weight-bold mb-0">Tổng</th>
                        <th class="text-xs font-weight-bold mb-0">KH</th>
                        <th class="text-xs font-weight-bold mb-0">SDT</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $new_orders = new_orders_list($db);
                        if (isset($new_orders) && !empty($new_orders)) {
                            $i = 1;
                            foreach ($new_orders as $item) {
                    ?>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1 align-items-center">
                                    <div class="ms-4">
                                        <h6 class="text-sm mb-0"><?php echo htmlspecialchars($i); ?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1 align-items-center">
                                    <div class="ms-4">
                                        <h6 class="text-sm mb-0"><?php echo htmlspecialchars($item['product']); ?></h6>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <h6 class="text-sm mb-0"><?php echo htmlspecialchars($item['price']); ?></h6>
                            </td>
                            <td class="text-center">
                                <h6 class="text-sm mb-0"><?php echo htmlspecialchars($item['discount']); ?></h6>
                            </td>
                            <td class="text-center">
                                <h6 class="text-sm mb-0"><?php echo htmlspecialchars($item['qty']); ?></h6>
                            </td>
                            <td class="text-center">
                                <h6 class="text-sm mb-0"><?php echo htmlspecialchars($item['total']); ?></h6>
                            </td>
                            <td class="text-center">
                                <h6 class="text-sm mb-0"><?php echo htmlspecialchars($item['customer']); ?></h6>
                            </td>
                            <td class="text-center">
                                <h6 class="text-sm mb-0"><?php echo htmlspecialchars($item['phone']); ?></h6>
                            </td>
                            <td class="text-center">
                                <a href="/store/quanly/?p=orders&i=<?php echo htmlspecialchars($item['id']); ?>">Edit</a>
                            </td>
                        </tr>  
                    <?php 
                                $i++;
                            }
                        } else {
                            echo '<tr><td colspan="9" class="text-center">Không có đơn hàng mới</td></tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
