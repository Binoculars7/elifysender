<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    //alert("Restricted Page! You will be redirected to POS");
    //window.location = "pos.php";
  </script>
<?php
  }           
}
$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$aaa = "<select class='form-control' name='category' required>
        <option disabled selected hidden>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $aaa .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$aaa .= "</select>";

$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($db, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier' required>
        <option disabled selected hidden>Select Supplier</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
  }

$sup .= "</select>";
?>


<link rel="stylesheet" type="text/css" href="print.css" media="print">

            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Sales Checker &nbsp;<!-- <a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a>--></h4>
            </div>

<!-- making fast date selection -->
            <div class="fast_date_selection" style="text-align:center; margin:1em 0 1.5em 0;">
              <button id="today" class="today" name="today" style="background: #224abe; color:white; border:none; border-radius: 20px; padding:0.4em 1em;">Today</button>
              <button id="week" class="week" name="week" style="background: #224abe; color:white; border:none; border-radius: 20px; padding:0.4em 1em;">This Week</button>

              <button id="month" class="month" name="month" style="background: #224abe; color:white; border:none; border-radius: 20px; padding:0.4em 1em;">This Month</button>

              <button id="year" class="year" name="year" style="background: #224abe; color:white; border:none; border-radius: 20px; padding:0.4em 1em;">This Year</button>
            </div>
<!-- end of making fast date selection -->


<?php

// This week date selection
$startOfWeek = date('Y-m-d', strtotime('today'));
$endOfWeek = date('Y-m-d', strtotime('today'));

echo "<script type='text/javascript'>
  $(document).ready(function(){
    $('#today').click(function(){
      $('#start').val('".$startOfWeek."');
      $('#end').val('".$endOfWeek."');
        
    });
  });
</script>";

// This week date selection
$startOfWeek = date('Y-m-d', strtotime('last Sunday'));
$endOfWeek = date('Y-m-d', strtotime('next Saturday'));

echo "<script type='text/javascript'>
  $(document).ready(function(){
    $('#week').click(function(){
      $('#start').val('".$startOfWeek."');
      $('#end').val('".$endOfWeek."');
        
    });
  });
</script>";

// this month date selection

$startOfMonth = date('Y-m-01');
$endOfMonth = date('Y-m-t');

echo "<script type='text/javascript'>
  $(document).ready(function(){
    $('#month').click(function(){
      $('#start').val('".$startOfMonth."');
      $('#end').val('".$endOfMonth."');
        
    });
  });
</script>";

// this year date selection

$startOfYear = date('Y-01-01');
$endOfYear = date('Y-12-t');

echo "<script type='text/javascript'>
  $(document).ready(function(){
    $('#year').click(function(){
      $('#start').val('".$startOfYear."');
      $('#end').val('".$endOfYear."');
        
    });
  });
</script>";

// last week date selection


// last month date selection


// last year date selection
?>





            <div style="width: 400px; text-align: center; margin: auto;">
              <form method="post" class="gotme">
                <input id="start" type="date" name="begin" style="background: white; font-family: arial; text-transform: lowercase; border:none; border-right:1px solid black; padding: 0.4em 0.5em;">
                <input id="end" type="date" name="end" style="background: white; font-family: arial; text-transform: lowercase; border:none; border-left:1px solid black; padding: 0.4em 0.5em;"><br>
                <input type="submit" name="fetching" value="Fetch" class="form-control" style="background: #224abe; width: 300px; margin: auto; color: white;">
              </form>
            </div>

            <?php 

            if (isset($_POST['fetching'])) {
                $beginDate = $_POST['begin'];
                $endDate = $_POST['end'];




                $query = "SELECT * FROM `sale_entry` WHERE `SALE_DATE` BETWEEN '$beginDate' and '$endDate' order by `SALE_DATE`";

                $queryz = "SELECT * FROM `sale_entry` WHERE `SALE_DATE` BETWEEN '$beginDate' and '$endDate' order by `SALE_DATE` ASC LIMIT 1";

                $querys = "SELECT SUM(PROFIT) AS sumprofits, SUM(PRICE) AS sumprices, SUM(QUANTITY) AS sumqty FROM `sale_entry` WHERE `SALE_DATE` BETWEEN '$beginDate' and '$endDate' order by `SALE_DATE`";

                $result = mysqli_query($db, $query) or die (mysqli_error($db));

                $resultz = mysqli_query($db, $queryz) or die (mysqli_error($db));

                $results = mysqli_query($db, $querys) or die (mysqli_error($db));

                $count = mysqli_num_rows($result);

                $rowz = mysqli_fetch_assoc($resultz);

                $idd = isset($rowz['ID']);

                  $idds = $idd - 1;
 

                

                $queryd = "SELECT * FROM `sale_entry` WHERE `ID`='$idds'";
                $resultd = mysqli_query($db, $queryd) or die (mysqli_error($db));



            }
            ?>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
            
                   
            
      

<?php 

  if (isset($_POST['fetching']) && $count == "0") {
        echo "<h2 style='text-align:center; font-size:23px;'>No information found !!! </h2>";
  }elseif(isset($_POST['fetching']) && $count != "0"){                 
    #$query = "SELECT * FROM `sale_entry`";
        #$result = mysqli_query($db, $query) or die (mysqli_error($db));
    echo "<p style='background:#224abe; margin-bottom:0em; padding:0.3em 1em; color:white;'><big><b>Seadad Sales Checker</b></big></p>";
    echo "<p style='background:#e5ebff; margin-bottom:0em; padding:0.7em 1em; color:black;'>";
    echo "<b>Opening Date: ".$beginDate."</b><br>";
    echo "<b>Closing Date: ".$endDate."</b>";
    echo "</p>";

    $rowd = mysqli_fetch_assoc($resultd);

    #echo "<br><b>B/F: N".$rowd['NET_INCOME']."</b>";

    echo "

    <tr>
                    
                     <th>Name</th>
                     <th>Quantity</th> 
                     <th>Total Cost</th>
                     <th>Total Customer ID</th>
                     
                   </tr>

    ";
      
              $queryx = "SELECT `NAME` FROM `product`";
              $resultx = mysqli_query($db, $queryx) or die (mysqli_error($db));

        while ($rowx = mysqli_fetch_array($resultx)) {

                $pdnamer = $rowx['NAME'];


                $query = "SELECT * FROM `sale_entry` WHERE `SALE_DATE` BETWEEN '$beginDate' and '$endDate' and `NAME` = '$pdnamer' order by `SALE_DATE`";

                $queryz = "SELECT * FROM `sale_entry` WHERE `SALE_DATE` BETWEEN '$beginDate' and '$endDate' and `NAME` = '$pdnamer' order by `SALE_DATE` ASC LIMIT 1";

                $querys = "SELECT SUM(PROFIT) AS sumprofits, SUM(PRICE) AS sumprices, SUM(QUANTITY) AS sumqty FROM `sale_entry` WHERE `SALE_DATE` BETWEEN '$beginDate' and '$endDate' order by `SALE_DATE`";

                 $querymi = "SELECT SUM(QUANTITY) AS sumqmi, SUM(PRICE) AS sumpmi, SUM(PROFIT) AS sumfmi FROM `sale_entry` WHERE `SALE_DATE` BETWEEN '$beginDate' and '$endDate' and `NAME` = '$pdnamer' order by `SALE_DATE`";

                $result = mysqli_query($db, $query) or die (mysqli_error($db));

                $resultmi = mysqli_query($db, $querymi) or die (mysqli_error($db));

                $resultz = mysqli_query($db, $queryz) or die (mysqli_error($db));

                $results = mysqli_query($db, $querys) or die (mysqli_error($db));

                $count = mysqli_num_rows($result);

                $rowz = mysqli_fetch_assoc($resultz);

                $idd = isset($rowz['ID']);

                $idds = $idd - 1;

                $queryd = "SELECT * FROM `sale_entry` WHERE `ID`='$idds'";
                $resultd = mysqli_query($db, $queryd) or die (mysqli_error($db));





            if ($rowx['NAME'] == '') {
              
            }else{
              $rowmi = mysqli_fetch_assoc($resultmi);
           if($row = mysqli_fetch_assoc($result)){
                                 
                //echo '<tr>';
                //echo '<td>'. $row['NAME'].'</td>';
                //echo '<td>'. $rowmi['sumqmi'].'</td>';
                #$onePrice = $row['PRICE']/$row['QUANTITY'];
                #echo '<td>'.$onePrice.'</td>';
                //echo '<td>'. $rowmi['sumpmi'].'</td>';
                
                //echo '<td>'. $rowmi['sumfmi'].'</td>';
                #echo '<td>'. $row['PROFIT'].'</td>';
                #echo '<td>'. $row['SALE_DATE'].'</td>';
                     /* echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?action=edit & id='.$row['PRODUCT_CODE'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="pro_edit.php?action=edit & id='.$row['PRODUCT_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="background:grey; border-radius: 0px; border:1px solid;" href="pro_del.php?action=delete & id='.$row['PRODUCT_ID']. '">
                                    <i class="fas fa-fw fa-trash"></i> Delete
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';*/
                echo '</tr> ';
                        }
}
}

$queryi = "SELECT COUNT(DISTINCT `CID`) AS `cid_no` FROM `sale_entry` WHERE `SALE_DATE` BETWEEN '$beginDate' and '$endDate'";

$resulti = mysqli_query($db, $queryi) or die (mysqli_error($db));

$rowi = mysqli_fetch_assoc($resulti);
$cid_no = $rowi['cid_no'];

   while ($rows = mysqli_fetch_assoc($results)) {
    $qtys = $rows['sumqty'];

    
echo "<tr>                    
                     <th>TOTAL</th>
                     <th>".$qtys."</th>
                     
                     <th>".$rows['sumprices']."</th>
                     <th>".$cid_no."</th>
                   </tr>";
}

                      }

?> 
                                    
                         
                            </table>
                        </div>

<br>


                        <span class="printme" style='text-align:center; background:#224abe; color: white; padding:0.3em 0em; margin-left: 0.2em; width: 200px;'><a href='#' onclick="window.print()" style=" padding: 2em 1em; color: white;">Print</a></span>
                    </div>

                  </div>

<?php
include'../includes/footer.php';
?>

  <!-- Product Modal-->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="pro_transac.php?action=add">
          <!-- <div class="form-group">
             <input class="form-control" placeholder="Product Code" name="prodcode" required>
           </div> -->
           <div class="form-group">
             <input class="form-control" placeholder="Name" name="name" required>
           </div>
           <div class="form-group">
             <textarea rows="5" cols="50" texarea" class="form-control" placeholder="Description" name="description" required></textarea>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity" required>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="On Hand" name="onhand" required>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price" required>
           </div>
           <div class="form-group">
             <?php
               echo $aaa;
             ?>
           </div>
           <div class="form-group">
             <?php
               echo $sup;
             ?>
           </div>
           <div class="form-group">
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Date Stock In" name="datestock" required>
           </div>
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>