<div class="col-lg-6" id = "buy">
        <div class="card">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Danh mục</h6>
            </div>
            <div class="card-body p-3">
                <ul class="list-group">
                <?php 
                    $category = categories($db);
                    foreach($category as $row){

                 ?>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                <i class="ni ni-mobile-button text-white opacity-10"></i>
                            </div>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm"><?php echo $row['categories'] ?></h6>
                                <span class="text-xs"><?php echo $row['qty'] ?> sản phẩm</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button
                                class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                                    <a href="?p=category&i=<?php echo $row['id'] ?>"><i
                                    class="ni ni-bold-right" aria-hidden="true"></i></a></button>
                        </div>
                    </li>
                    <?php 
                    
                }
             ?>
                </ul>
            </div>
        </div>
    </div>