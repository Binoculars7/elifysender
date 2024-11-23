<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              #$pc = rand(10000, 999999); 
              #$_POST['prodcode'];
              $name = htmlspecialchars($_POST['name']);
              #$desc = $_POST['description'];
              $qty = 0;
              #$oh = $_POST['onhand'];
              #$pr = $_POST['price']; 
              #$cat = $_POST['category'];
              #$supp = $_POST['supplier'];
              $dats = $_POST['datestock']; 


              $sqlz = "SELECT * FROM `product` where `NAME` = '$name'";

              $queryz = mysqli_query($db, $sqlz);

              $rowz = mysqli_fetch_assoc($queryz);

              
              $pdqty = 0;

              $pdqtyv = $pdqty + $qty;
    /*
              $pdprice = $rowz['PRICE'];

              $profits = $pr - $pdprice;
              $profit = $profits * $qty;


              $remqty = $pdqty - $qty;

              $prs = $pr * $qty;

*/

              $sqly = "UPDATE `product` SET `QTY_STOCK` = $pdqtyv WHERE `NAME` = '$name'";

              $queryy = mysqli_query($db, $sqly);

 /*

              $sqlx = "SELECT * FROM `sale_entry` order by `id` desc limit 1";

              $queryx = mysqli_query($db, $sqlx);

              $rowx = mysqli_fetch_assoc($queryx);

              $netprice = $rowx['NET_INCOME'];
              $netp = $rowx['NET_PROFIT'];
  
              $netincome = $prs + $netprice;

              $netprofit = $profit + $netp;
*/
        
              switch($_GET['action']){
                case 'add':  
                    $query = "INSERT INTO addqs
                              (NAME, ADD_Q, DATES)
                              VALUES ('{$name}',{$qty},'{$dats}')";
                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
                break;
              }
            ?>
              <script type="text/javascript">window.location = "addq.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>