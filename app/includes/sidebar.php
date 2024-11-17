<?php
  require('session.php');
  confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Elify Sales and Inventory System</title>
  <link rel="icon" href="https://www.freeiconspng.com/uploads/sales-icon-7.png">

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<script type="text/javascript" src="jquery.min.js"></script>
<body id="page-top">
          
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="margin-top: -2.1em">

      <!-- Sidebar - Brand --><br>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Elify SIS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Tables
      </div>
      <!-- Tables Buttons -->

<?php  

      $customer = '<li class="nav-item">
        <a class="nav-link" href="customer.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Customer</span></a>
      </li>';
      $employee = '<li class="nav-item">
        <a class="nav-link" href="employee.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Employee</span></a>
      </li>';
      $product_entry = '<li class="nav-item">
        <a class="nav-link" href="product.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Product Entry</span></a>
      </li>';
      $sale_entry = '<li class="nav-item">
        <a class="nav-link" href="purchase.php">
          <i class="fas fa-fw fa-crown"></i>
          <span>Sale Entry</span></a>
      </li>';
      $sales_checker = '<li class="nav-item">
        <a class="nav-link" href="sales_checker.php">
          <i class="fas fa-fw fa-crown"></i>
          <span>Sales Checker</span></a>
      </li>';
      $cashier = '<li class="nav-item">
        <a class="nav-link" href="cashier.php">
          <i class="fas fa-fw fa-tv"></i>
          <span>Cashier</span></a>
      </li>';
      $cashier_checker = '<li class="nav-item">
        <a class="nav-link" href="cashier_checker.php">
          <i class="fas fa-fw fa-tv"></i>
          <span>Cashier Checker</span></a>
      </li>';
      $add_stock_quantity = '<li class="nav-item">
        <a class="nav-link" href="addq.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Add Stock Quantity</span></a>
      </li>';
      $supplier = '<li class="nav-item">
        <a class="nav-link" href="supplier.php">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Supplier</span></a>
      </li>';
      $product_description = '<li class="nav-item">
        <a class="nav-link" href="productd.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Product Description</span></a>
      </li>';
      $cash_flow = '<li class="nav-item">
        <a class="nav-link" href="cashy.php">
          <i class="fas fa-fw fa-water"></i>
          <span>Cash Flow</span></a>
      </li>';
      $stock_flow = '<li class="nav-item">
        <a class="nav-link" href="stocky.php">
          <i class="fas fa-fw fa-ring"></i>
          <span>Stock Flow</span></a>
      </li>';
      $expenditure = '<li class="nav-item">
        <a class="nav-link" href="expenses.php">
          <i class="fas fa-fw fa-fire"></i>
          <span>Expenditure</span></a>
      </li>';
      $net_profit = '      <li class="nav-item">
        <a class="nav-link" href="proloss.php">
          <i class="fas fa-fw fa-coins"></i>
          <span>Net Profit</span></a>
      </li>';
      $account = '      <li class="nav-item">
        <a class="nav-link" href="user.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Accounts</span></a>
      </li>';
    

?>



<?php
include'connection.php';
  $query = 'SELECT ID,PRIVILEGE 
            FROM users WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['PRIVILEGE'];
                   
 if ($Aa=='all'){
           
              echo $customer;
              echo $employee;
              echo $product_entry;
              echo $sale_entry;
              echo $sales_checker;
              echo $cashier;
              echo $cashier_checker;
              echo $add_stock_quantity;
              echo $supplier;
              echo $product_description;
              echo $cash_flow;
              echo $stock_flow;
              echo $expenditure;
              echo $net_profit;
              echo $account;


}elseif($Aa == 'sale'){
              echo $sale_entry;
              echo $sales_checker;
              echo $product_description;
}elseif($Aa == 'cashier'){
              echo $customer;
              echo $cashier;
              echo $cashier_checker;
}else{
}





}

?>






      <!--
      <li class="nav-item">
        <a class="nav-link" href="inventory.php">
          <i class="fas fa-fw fa-archive"></i>
          <span>Inventory</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="transaction.php">
          <i class="fas fa-fw fa-retweet"></i>
          <span>Transaction</span></a>
      </li>
      -->
     
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <?php include_once 'topbar.php'; ?>
