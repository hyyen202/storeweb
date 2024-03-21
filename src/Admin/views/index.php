<?php require('../src/Admin/layouts/header.php') ?>


<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <?php require('../src/Admin/layouts/sidebar.php') ?>

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <?php require('../src/Admin/layouts/navbar.php') ?>

    <!-- End Navbar -->
    <div class="container-fluid py-4">
       
    <?php require('../src/Admin/views/home.php') ?>
    <?php //require('../controller/pages.php') ?>
    
<?php require('../src/Admin/layouts/footer.php') ?>