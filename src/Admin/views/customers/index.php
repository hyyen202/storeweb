<!-- End Navbar -->
<?php 
    $customer_list = customer_list($db);
    $i = 1;
    foreach($customer_list as $customer){

    
?>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Danh sách khách hàng</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        STT</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tên</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Liên lạc</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ngày sinh</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Địa chỉ</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Lượt mua hàng</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class ="align-items-center">
                                        <p class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 "><?php echo $i; ?></p>
                                    </td>
                                    <td>
                                        <a href= "?p=profile&i=<?php echo $customer['id'] ?>"class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?php echo $customer['name'] ?></h6>
                                            </div>
</a>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?php echo $customer['phone'] ?></p>
                                        <p class="text-xs text-secondary mb-0"><?php echo $customer['email'] ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold"><?php echo date('d/m/Y', strtotime($customer['birthday'])) ?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs text-secondary mb-0"><?php echo $customer['address'] ?></p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs text-secondary mb-0"><?php echo $customer['count'] ?></p>
                                    </td>
                                    <td class="align-middle">
                                        <a href="/store/quanly/?p=historic_orders&i=<?php echo $customer['id'] ?>" class="text-secondary font-weight-bold text-xs"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                           Đơn hàng
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $i++;
    } ?>
    <div id="pagination" class="text-center my-4"></div>