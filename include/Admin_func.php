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
?>