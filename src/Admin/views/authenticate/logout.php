<?php
    unset($_COOKIE[session_name()]); 
    $session->destroy();
    header('location:/store/quanly');
?>
