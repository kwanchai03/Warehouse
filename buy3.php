<?php
          @session_start();
          require_once("conn.php");

          if(!isset($_SESSION['UserID']))
          {
            echo "Please Login!";
             echo "<meta http-equiv='refresh' content='2;URL=index.html' />";
            exit();
          }
  
          //*** Update Last Stay in Login System
           $sql = "UPDATE member SET LastUpdate = NOW() WHERE UserID = '".$_SESSION["UserID"]."' ";
            $query = mysqli_query($con,$sql);

  //*** Get User Login
          $strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
          $objQuery = mysqli_query($con,$strSQL);
          $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
          ?>
          <?php  $jj = $objResult["Name"];?>
    
  
         <?
         mysqli_close($con);
          ?>
  <?php
  $serverName = "localhost";
  $userName = "root";
  $userPassword = "";
  $dbName = "ware_house";

  $objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);

  $strSQL = "SELECT * FROM member WHERE Password = '".mysqli_real_escape_string($objCon,$_POST['txtPassword'])."'";
  $objQuery = mysqli_query($objCon,$strSQL);
  $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
  if(!$objResult)
  {
      echo "***รหัสผ่านผิดพลาด";
      echo "<meta http-equiv='refresh' content='3;url=รายการขาย.php'/>";
  }
  else
  {
                   ini_set('display_errors', 1);
                   error_reporting(~0);
                   $servername = "localhost";
                   $username = "root";
                   $password = "";
                    $dbname = "ware_house";
                     // Create connection
                     $objCon = mysqli_connect($servername, $username, $password, $dbname);
                     mysqli_set_charset($objCon, "utf8");
                    // Check connection

                     $member_id=$_POST['txtid'];
                     $product_name=$_POST['product_name'];
                     $txtweight=$_POST['txtweight'];
                     $txtalignr=$_POST['txtalignr'];
                     $txtalignc=$_POST['txtalignc'];
                     $txtquantity=$_POST['txtquantity'];
                     $txtprice=$_POST['txtprice'];





                     $N = count($member_id);

                     for($i=0; $i < $N; $i++)
                    {
        
                    $sql = "UPDATE order_product_rogis SET member_warehouse ='$jj' , status='รอส่งสินค้า' where id_order_product='$member_id[$i]'";

                       $query = mysqli_query($objCon,$sql);
                       if($query){
                       
                                 echo "<meta http-equiv='refresh' content='2;url=buy.php'/>";
                       }
                       else
                       {
                        echo "Error Save [".mysqli_error($objCon)."]";
                       }

                     } 

                       }                           
                    mysqli_close($objCon);
                   ?>
             