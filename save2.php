
 <html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ware House System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/warehouse.png"/>
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
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
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>

	</head>
		<style type="text/css">
		

	</style>
	<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary">

			<h1 id="fh5co-logo"><a href="index.html">Ware House System</a></h1>
			<nav id="fh5co-main-menu" role="navigation">
        <ul>
          <li class="fh5co-active"><i class='fas fa-download' style='font-size:15px;color: #000;'></i><a href="save.php">ข้อมูลการจัดเก็บ</a></li>
          <li><i class='fas fa-upload' style='font-size:15px;color: #000;'></i><a href="buy.php">ข้อมูลการสั่งซื้อ</a></li>
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

		</aside>
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

		<div id="fh5co-main">

			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">ข้อมูลการจัดเก็บ</h2>
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
   $strSQL = "SELECT * FROM order_user WHERE order_id = '".$strCustomerID2."' ";
  $objQuery = mysqli_query($con,$strSQL);
  $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>

      <img src="images/<?php echo $objResult["img_user"];?>" class="gallery-avatar" >

    
  
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
       $sql2 = "SELECT * FROM order_user WHERE order_id = '".$strCustomerID2."' ";
       
       $query2 = mysqli_query($conn,$sql2);
   
       // Check connection
       if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
        }
?>
<form action="save3.php" name="frmAdd" method="post">
<div class="d2" style="overflow-x:auto;" >
<table >
<?php

while($objResult2 = mysqli_fetch_array($query2,MYSQLI_ASSOC))
{
?>


 
  <tr>
     <th width="130"><div align="">รหัสลูกค้า </div></th> <th ><div align=""><input type="hidden" name="txtpp[]" value="<?php echo $objResult["order_id"];?>">:SO-61<?php  echo "$strCustomerID2";?></div></th><th> <div align="">เบอร์โทร </div></th> <th> <div align="">:<?php echo $objResult2["Phonnumber"];?></div></th>
   
  </tr> 
    <tr width="130">
       <th> <div align="">ลูกค้า </div></th><th> <div align="">:<?php echo substr($objResult2["cusname"] ,3);?></div></th> <th> <div align="">ผู้ส่ง </div></th> <th> <div align="">:<?php echo $objResult2["empname"];?></div></th>
   
  </tr>
   <tr width="130">
    <th> <div align="">ที่อยู่ลูกค้า </div></th> <th> <div align="">:<?php echo $objResult2["cuslive"];?></div></th><th> <div align="">วันที่ขอเช่า </div></th> <th><div align="">:<?php echo ''. thai_date_fullmonth(strtotime($objResult2['LastUpdate'])) . '';?></div></th>
  
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




      $sql = "SELECT * FROM order_product WHERE order_id = '".$strCustomerID."' ";
       
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

  <tr class="txtMult">
    <td><div align="center"><input type="hidden" name="txtid[]" value="<?php echo $objResult["id_order_product"];?>">IE-<?php echo $objResult["id_order_product"];?> </div></td>
     <td><div  align="center"><img src="images/<?php echo $objResult["img_product"]; ?>" class="gallery-items" /></div></td>
     <td><div align="center"><?php echo $objResult["product_name"];?></div></td>

   <td><div align="center"><input type="text" name="txtweight[]"  style="width:70px;" required onkeyup="javascript:intOnly2(this);" value="<?php echo $objResult["weight"];?>">&nbsp;กิโลกรัม</div></td>

    <td>
      <div align="center">
             <select name="txtalignr[]" style="width: 120px;">     
              <option value="">เลือกจัดเก็บ</option>        
              <option value="A1">A1</option>
              <option value="A2">A2</option>
              <option value="A3">A3</option>
              <option value="A4">A4</option>
              <option value="A5">A5</option>
              <option value="A6">A6</option>
              <option value="A7">A7</option>
              <option value="A8">A8</option>
              <option value="A9">A9</option>
              <option value="A10">A10</option>
              <option value="A11">A11</option>
              <option value="A12">A12</option>
              <option value="A13">A13</option>
              <option value="A14">A14</option>
             </select>

    </div>
  </td>

  <td>
      <div align="center">
             <select name="txtalignc[]" style="width: 120px;">     
                <option value="">เลือกจัดเก็บ</option>        
              <option value="1">A1</option>
              <option value="2">A2</option>
              <option value="3">A3</option>
              <option value="4">A4</option>
              <option value="5">A5</option>
              <option value="6">A6</option>
              <option value="7">A7</option>
              <option value="8">A8</option>
              <option value="9">A9</option>
              <option value="10">A10</option>
              <option value="11">A11</option>
              <option value="12">A12</option>
              <option value="13">A13</option>
              <option value="14">A14</option>

              
             </select>

    </div>
  </td>
 
    <td><div align="center"><?php echo $objResult["total_quantity"];?></div></td>
    <td><div align="center"><?php echo $objResult["product_price"];?></div></td>
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

 


 <a href="save.php" type="submit" class="button1">ยกเลิก</a>
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
    <script language="JavaScript">
function intOnly(input){
var regExp = /^[0-9]{0,3}$/;
if(!regExp.test(input.value)){
input.value = "";
}
}
</script>


<script language="JavaScript">
function intOnly2(input){
var regExp = /^[0-9]*$/;
if(!regExp.test(input.value)){
input.value = "";
}
}
</script>
  <!-- jQuery -->
   <script>
  $(document).ready(function () {
       $(".txtMult input").keyup(multInputs);

       function multInputs() {
           var mult = 0;
           // for each row:
           $("tr.txtMult").each(function () {
               // get the values from this row:
               var $val1 = $('.val1', this).val();
               var $val2 = $('.val2', this).val();
               var $total = ($val1 * 1) * ($val2 * 1);
               // set total for the row
               $('.multTotal', this).text($total);
               mult += $total;
           });
           $("#grandTotal").text(mult);
       }
  });
</script>
<script>
  $(document).ready(function(){

    //iterate through each textboxes and add keyup
    //handler to trigger sum event
    $(".val2").each(function() {

      $(this).keyup(function(){
        calculateSum();
      });
    });

  });

  function calculateSum() {

    var sum = 0;
    //iterate through each textboxes and add the values
    $(".val2").each(function() {

      //add only if the value is number
      if(!isNaN(this.value) && this.value.length!=0) {
        sum += parseInt(this.value);
      }

    });
    //.toFixed() method will roundoff the final sum to 2 decimal places
    $("#sum").html(sum.toFixed());
  }
</script>

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

     <script type="text/javascript">

    $(function () {
    var viewer = ImageViewer();
    $('.gallery-items').click(function () {
        var imgSrc = this.src,
            highResolutionImage = $(this).data('high-res-img');
 
        viewer.show(imgSrc, highResolutionImage);
    });
    });
</script>

	</body>
</html>

