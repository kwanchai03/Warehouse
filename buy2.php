
 <html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ware House System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
  <link rel="icon" type="image/png" href="images/warehouse.png"/>
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>

	</head>
		<style type="text/css">
	</style>
	<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" >

			<h1 id="fh5co-logo"><a href="save.php">Ware House System</a></h1>
			<nav id="fh5co-main-menu" role="navigation">
        <ul>
          <li><i class='fas fa-download' style='font-size:15px;color: #000;'></i><a href="save.php">ข้อมูลการจัดเก็บ</a></li>
          <li class="fh5co-active"><i class='fas fa-upload' style='font-size:15px;color: #000;'></i><a href="buy.php">ข้อมูลการสั่งซื้อ</a></li>
          <li><i class='fas fa-history' style='font-size:15px;color: #000;'></i><a href="logis.php">ประวัติการส่งออก</a></li>
          <li><i class='fas fa-archive' style='font-size:15px;color: #000;'></i><a href="contact.php">พื้นที่คลังสินค้า</a></li>
          <li><i class='fas fa-search' style='font-size:15px;color: #000;'></i><a href="search.php">ค้นหา</a></li>
        </ul>
      </nav>

        <div class="fh5co-footer">
          <span>ผู้ใช้งาน
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
          <?php echo $objResult["Name"];?>
    
  
         <?
         mysqli_close($con);
          ?>
        </span> 
        <a href="logout.php" type="submit" class="button1">Logout</a>
      </div>
	 <?php
                       $thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");   
                      $thai_month_arr=array(   
                       "0"=>"",   
                       "1"=>"มกราคม",   
                       "2"=>"กุมภาพันธ์",   
                       "3"=>"มีนาคม",   
                       "4"=>"เมษายน",   
                       "5"=>"พฤษภาคม",   
                           "6"=>"มิถุนายน",    
                           "7"=>"กรกฎาคม",   
                           "8"=>"สิงหาคม",   
                           "9"=>"กันยายน",   
                           "10"=>"ตุลาคม",   
                           "11"=>"พฤศจิกายน",   
                           "12"=>"ธันวาคม"                    
                       );   
                       


                       function thai_date_fullmonth($time){   // 19 ธันวาคม 2556
                           global $thai_day_arr,$thai_month_arr;   
                           $thai_date_return = date("j",$time);   
                           $thai_date_return.=" ".$thai_month_arr[date("n",$time)];   
                           $thai_date_return.= " ".(date("Y",$time)+543);   
                           return $thai_date_return;   
                       } 


                       ?>
			

		</aside>

		<div id="fh5co-main">

			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">ข้อมูลการสั่งซื้อ</h2>
	      <?php

 ini_set('display_errors', 1);
   error_reporting(~0);

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "ware_house";

   $strCustomerID2 = null;

   if(isset($_GET["order_id"]))
   {
     $strCustomerID2 = $_GET["order_id"];
   }

?>

<h6>
<br>


</h6>
    <?php

        $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "ware_house";
       // Create connection
       $con = mysqli_connect($servername, $username, $password, $dbname);
       mysqli_set_charset($con, "utf8");
      
  

  //*** Get User Login
   $strSQL = "SELECT * FROM order_user_rogis WHERE order_id = '".$strCustomerID2."' ";
  $objQuery = mysqli_query($con,$strSQL);
  $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
      <img src="images/<?php echo $objResult["img_emp"];?>" class="gallery-avatar" >
    
  
<?
  mysqli_close($con);
?>

<br>
<br>
<?php

    ini_set('display_errors', 1);
   error_reporting(~0);

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "ware_house";

   $strCustomerID2 = null;

   if(isset($_GET["order_id"]))
   {
     $strCustomerID2 = $_GET["order_id"];
   }


       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "ware_house";
       // Create connection
       $conn = mysqli_connect($servername, $username, $password, $dbname);
       mysqli_set_charset($conn, "utf8");
       $sql2 = "SELECT * FROM order_user_rogis WHERE order_id = '".$strCustomerID2."' ";
       
       $query2 = mysqli_query($conn,$sql2);
   
       // Check connection
       if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
        }
?>

<div class="d2" style="overflow-x:auto;" >
<table >
<?php

while($objResult2 = mysqli_fetch_array($query2,MYSQLI_ASSOC))
{
?>


 
  <tr>
     <th width="130"><div align="">รหัสใบเสร็จ </div></th> <th ><div align="">:TT<?php  echo "$strCustomerID2";?></div></th><th> <div align="">เบอร์โทร </div></th> <th> <div align="">:<?php echo $objResult2["Phonnumber"];?></div></th>
   
  </tr> 
    <tr width="130">
       <th> <div align="">ผู้จำหน่าย </div></th><th> <div align="">:<?php echo substr($objResult2["cusname"] ,3);?></div></th> <th> <div align="">ผู้ซื้อ </div></th> <th> <div align="">:<?php echo $objResult2["empname"];?></div></th>
   
  </tr>
   <tr width="130">
    <th> <div align="">ที่อยู่ลูกค้า </div></th> <th> <div align="">:<?php echo $objResult2["cuslive"];?></div></th><th> <div align="">วันที่สั่งซื้อ </div></th> <th><div align="">:<?php echo ''. thai_date_fullmonth(strtotime($objResult2['LastUpdate'])) . '';?></div></th>
  
    </tr>
   
    
  
<?php
}
?>

</table>
</div>

<br>
<?php

ini_set('display_errors', 1);
   error_reporting(~0);

   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "ware_house";

   $strCustomerID = null;

   if(isset($_GET["order_id"]))
   {
     $strCustomerID = $_GET["order_id"];
   }


       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "ware_house";
       // Create connection
       $conn = mysqli_connect($servername, $username, $password, $dbname);
       mysqli_set_charset($conn, "utf8");




      $sql = "SELECT * FROM order_product_rogis WHERE order_id = '".$strCustomerID."' ";
       
      $query = mysqli_query($conn,$sql);
      $count=mysqli_num_rows($query);

?>


<center>
  <div style="overflow-x:auto;">
<table style="width: 1200px;" >
 <tr bgcolor="#372754">
   <th width="188"> <div align="center">รหัสสินค้า </div></th>
     <th width="188"> <div align="center"> </div></th>
     <th width="188"> <div align="center">สินค้า </div></th>
       <th width="288"> <div align="center">น้ำหนัก </div></th>
      <th width="288"> <div align="center">ที่จัดเก็บ(r) </div></th>
       <th width="288"> <div align="center">ที่จัดเก็บ(c) </div></th>
   
    <th width="198"> <div align="center">จำนวน </div></th>
    <th width="198"> <div align="center">ราคา </div></th>
    <th width="250"> <div align="center">ราคารวม </div></th>
    
  </tr>

<?php
for($i=0; $i < $count; $i++)
      {
while($objResult = mysqli_fetch_array($query,MYSQLI_ASSOC))
{
  if($objResult["total_quantity"] !== '0'){
?>
<form action="buy3.php" name="frmAdd" method="post">
  <tr class="txtMult">
  <td><div align="center"><input type="hidden" name="txtid[]" value="<?php echo $objResult["id_order_product"];?>">IE-<?php echo $objResult["id_order_product"];?> </div></td>
     <td><div  align="center"><img src="images/<?php echo $objResult["img_product"]; ?>" class="gallery-items" /></div></td>

   <td><div align="center"><input type="hidden" name="product_name[]" value="<?php echo $objResult["product_name"];?>"><?php echo $objResult["product_name"];?> </div></td>
   

   <td><div align="center"><input type="hidden" name="txtweight[]" value="<?php echo $objResult["weight"];?>"><?php echo $objResult["weight"];?>&nbsp;กิโลกรัม </div></td>


      <td><div align="center"><input type="hidden" name="txtalignr[]" value="<?php echo $objResult["warehouse_row"];?>"><?php echo $objResult["warehouse_row"];?> </div></td>
      <td><div align="center"><input type="hidden" name="txtalignc[]" value="<?php echo $objResult["warehouse_column"];?>">A<?php echo $objResult["warehouse_column"];?> </div></td>

       <td><div align="center"><input type="hidden" name="txtquantity[]" value="<?php echo $objResult["total_quantity"];?>"><?php echo $objResult["total_quantity"];?> </div></td>

        <td><div align="center"><input type="hidden" name="txtprice[]" value="<?php echo $objResult["product_price"];?>"><?php echo $objResult["product_price"];?> </div></td>
     <td><div align="center"><span class="multTotal"><?php echo $total = $objResult["product_price"] * $objResult["total_quantity"];?></span> บาท</div></td>
   
  </tr>
  
  <?php
    }
   }
}

?>

</table>
</div>
</center>
<myHero2>

  <div class="wrap-input100 validate-input" data-validate="กรุณาใส่รหัสผ่าน">
           <br> <input class="input100" type="password" style="width:270px; " name="txtPassword" placeholder=" *กรุณาใส่รหัสผ่าน" required >
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>


 <a href="buy.php" type="submit" class="button1">ยกเลิก</a>
<input type="submit"  name="submit" id="submit" class="button" value="บันทึก"/>
      
</myHero2>
 </form>
</h4>
<?php
mysqli_close($conn);
?>
			</div>
			

		</div>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>

