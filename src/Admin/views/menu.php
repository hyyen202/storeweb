
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <a href ="#buy">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <a href ="?p=bought">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Đã bán</p>
                                <h5 class="font-weight-bolder">
                                <?php 
                                    $count_orders = count_orders($db);
                                    foreach($count_orders as $count)
                                        {
                                            echo $count['count'];
                                        }
                                ?>
                                </h5>
                                
                            </div>
                        </a>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <a href="#new_orders">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Đơn hàng mới</p>
                            <h5 class="font-weight-bolder">
                            <?php 
                                $count_new_orders = count_new_orders($db);
                                foreach($count_new_orders as $count)
                                    {
                                        echo $count['count'];
                                    }
                            ?>
                            </h5>
                            
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                            <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Sản phẩm kho</p>
                        <h5 class="font-weight-bolder">
                        <?php 
                            $count_product = count_product($db);
                            foreach($count_product as $count)
                                {
                                    echo $count['count'];
                                }
                        ?>
                        </h5>
                        
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-sm-6">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Tổng doanh thu</p>
                        <h5 class="font-weight-bolder">
                            $103,090
                        </h5>
                        
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>