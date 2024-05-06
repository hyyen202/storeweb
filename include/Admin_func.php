<?php

function category_list($db){
    $sql = "SELECT * FROM `tbl_category`";
    $result = $db->fetch_assoc($sql, 0);
    if($result){
        return $result;
    }else{
        return 0;
    }
}
function type_list($db){
    $sql = "SELECT * FROM `tbl_type`";
    $result = $db->fetch_assoc($sql, 0);
    if($result){
        return $result;
    }else{
        return 0;
    }
}
function product_list($db){
    $sql = "SELECT *, tbl_category.name as category, tbl_type.name as type, tbl_products.name as product, tbl_products.id as id
            FROM `tbl_products`, `tbl_type`, `tbl_category` WHERE tbl_type.id = tbl_products.type AND tbl_products.category = tbl_category.id";
    $result = $db->fetch_assoc($sql, 0);
    if($result){
        return $result;
    }else{
        return 0;
    }
}
function product_items($db,$id){
    $sql = "SELECT * FROM `tbl_products` WHERE id = $id";
    $result = $db->fetch_assoc($sql, 0);
    if($result){
        return $result;
    }else{
        return 0;
    }
}
function count_new_orders($db){
    $sql = "SELECT COUNT(*) as count FROM `tbl_bill` WHERE status = 0"; // status = 0 == don hang chua ban
    $result = $db->fetch_assoc($sql, 0);
    if($result){
        return $result;
    }else{
        return 0;
    }
}
function count_orders($db){
    $sql = "SELECT COUNT(*) as count FROM `tbl_bill` WHERE status = 1";// status = 0 == don hang da ban
    $result = $db->fetch_assoc($sql, 0);
    if($result){
        return $result;
    }else{
        return 0;
    }
}
function count_product($db){
    $sql = "SELECT COUNT(*) as count FROM `tbl_products` WHERE status = 1";// status = 0 == san pham con hang 
    $result = $db->fetch_assoc($sql, 0);
    if($result){
        return $result;
    }else{
        return 0;
    }
}
function new_orders_list($db){
    $sql = "SELECT tbl_products.name as product, tbl_customers.name as customer, tbl_customers.phone as phone, tbl_bill.qty as qty,
            tbl_bill.price as price, tbl_bill.discount as discount, tbl_bill.total as total, tbl_bill.pay as pay, tbl_bill.id as id
            FROM `tbl_bill`, `tbl_customers`, `tbl_products` WHERE tbl_bill.status = 0 and tbl_products.id = tbl_bill.idProduct
            and tbl_bill.idCustomer = tbl_customers.id";// tbl_bill.status = 0 == hoa don moi
    $result = $db->fetch_assoc($sql, 0);
    if($result){
        return $result;
    }else{
        return 0;
    }
}
function new_orders($db, $id){
    $sql = "SELECT tbl_products.name as product, tbl_customers.name as customer, tbl_customers.phone as phone, tbl_bill.qty as qty,
            tbl_bill.price as price, tbl_bill.discount as discount, tbl_bill.total as total, tbl_bill.pay as pay, tbl_bill.id as id,
            email, birthday, note, address, tbl_bill.price as price, tbl_bill.create_at as create_at, tbl_bill.discount as discount
            FROM `tbl_bill`, `tbl_customers`, `tbl_products` WHERE tbl_bill.status = 0 and tbl_products.id = tbl_bill.idProduct
            and tbl_bill.idCustomer = tbl_customers.id and tbl_bill.id = $id";// tbl_bill.status = 0 == hoa don moi
    $result = $db->fetch_assoc($sql, 0);
    if($result){
        return $result;
    }else{
        return 0;
    }
}
function customer_list($db){
    $sql = "SELECT COUNT(tbl_bill.id) AS count, name, phone, birthday, address, email, tbl_customers.id as id
            FROM tbl_customers LEFT JOIN tbl_bill ON tbl_customers.id = tbl_bill.idCustomer 
            GROUP BY tbl_customers.id";
    $result = $db->fetch_assoc($sql, 0);
    if($result){
        return $result;
    }else{
        return 0;
    }
}
function historic_orders($db, $id){
    $sql = "SELECT tbl_customers.name as name, tbl_products.name as product, tbl_bill.qty as qty, 
    tbl_bill.price as price, total, tbl_bill.discount as discount, tbl_bill.id as id, tbl_bill.create_at as create_at
    FROM tbl_customers, tbl_products, tbl_bill
    WHERE tbl_customers.id = tbl_bill.idCustomer and tbl_products.id = tbl_bill.idProduct and tbl_customers.id = $id";// tbl_bill.status = 0 == hoa don moi
    $result = $db->fetch_assoc($sql, 0);
    if($result){
        return $result;
    }else{
        return 0;
    }
}





?>