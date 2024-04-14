<!-- End Navbar -->

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Danh sách sản phẩm</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="?p=add_p"><i
                                    class="fas fa-plus"></i>&nbsp;&nbsp;Thêm</a>
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
                                        Tên sản phẩm</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Loại</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Danh mục</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Giá</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Số lượng</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Đã bán</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Trạng thái</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <?php 
                            $product_list = product_list($db);
                            $i = 1;
                             foreach($product_list as $item)
                             {

                            ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-center"><?php echo $i;?></p>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                        <?php 
                                                // Tách các tên file ảnh thành một mảng
                                                $image_names = explode(',', $item['img']);

                                                // Lấy tên file ảnh đầu tiên và hiển thị nó
                                                $first_image = reset($image_names);
                                            ?>
                                            <div>
                                                <img src="../assets/img/product/<?php echo $first_image; ?>" class="avatar avatar-sm me-3" alt="Product Image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm limited-length"><?php echo $item['product'];?></h6>
                                                <p class="text-xs text-secondary mb-0"><?php echo $item['create_at'];?></p>
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
                                        <span class="badge badge-sm font-weight-bold bg-gradient-success"><?php echo $item['price'].' vnd';?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><?php echo $item['qty'];?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><?php echo $item['qty'];?></span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><?php if($item['status']==0)
                                                                                                    {
                                                                                                        echo 'Hết hàng';
                                                                                                    }
                                                                                                    else{
                                                                                                        echo 'Còn hàng';
                                                                                                    }
                                                                                                 
                                                                                                 ?></span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="/store/quanly/?p=update_p&i=<?php echo $item['id'];?>" class="text-secondary font-weight-bold text-xs"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3"
                                                    alt="user2">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Alexa Liras</h6>
                                                <p class="text-xs text-secondary mb-0">alexa@creative-tim.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Programator</p>
                                        <p class="text-xs text-secondary mb-0">Developer</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">11/01/19</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr> -->
                            </tbody>
                            <?php 
                                $i++;
                             }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="pagination" class="text-center my-4"></div>
    <style>
    .limited-length {
        max-width: 150px; /* Đặt giới hạn chiều dài ở đây, ví dụ: 200px */
        overflow: hidden;
        text-overflow: ellipsis; /* Hiển thị dấu chấm (...) khi văn bản vượt quá chiều dài */
        white-space: nowrap; /* Ngăn không cho văn bản xuống dòng */
    }
</style>