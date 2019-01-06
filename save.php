
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
  <link rel="stylesheet" href="css/style2.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	
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
                 $servername = "localhost";
                 $username = "root";
                 $password = "";
                 $dbname = "ware_house";
                  // Create connection
                  $conn = mysqli_connect($servername, $username, $password, $dbname);
                  mysqli_set_charset($conn, "utf8");

                   $perpage = 10;
                   if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                   } else {
                      $page = 1;
                     }

                   $start = ($page - 1) * $perpage;
                  


                  $sql = "SELECT 
                  order_product.order_id,order_product.LastUpdate,order_product.weight,order_user.cusname,order_user.Phonnumber,order_user.cuslive,
                  SUM(total_all) AS totalsal,SUM(total_quantity)as totalsal2
                  FROM order_product  JOIN order_user 
                  ON order_product.order_id = order_user.order_id 
                  GROUP BY order_product.order_id,order_product.LastUpdate,order_product.weight,order_user.cusname,order_user.Phonnumber,order_user.cuslive
                  ORDER BY id_order_product desc limit {$start} , {$perpage} ";

                  $query = mysqli_query($conn,$sql);
                    // Check connection
                     if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                      }
                   ?>
                  <center>
                  <div style="overflow-x:auto;" style="width: 1150px;">
                  <table   id="search_table" >
                  <tr bgcolor="#372754">
                   <th width="508"> <div align="center">รหัสลูกค้า </div></th>
                      <th width="580"> <div align="center">วันที่ขอเช่า </div></th>
                   <th width="598"> <div align="center">ลูกค้า </div></th>
                   <th width="598"> <div align="center">เบอร์โทร </div></th>
                   <th width="598"> <div align="center">ที่อยู่ </div></th>
             
                         <th width="150"> <div align="center">จำนวน </div></th>
                          <th width="350"> <div align="center">ราคารวม </div></th>
                          <th width="450"> <div align="center">พิมพ์ใบเสร็จ </div></th>
                           <th width="350"> <div align="center">จัดเก็บ </div></th>

    
                         </tr>
                           <?php
                            $total = 0;
                           $total2 = 0;
                            $item = 1;
                       while($objResult = mysqli_fetch_array($query,MYSQLI_ASSOC))

                      {
                          if($objResult["weight"] == ''){
                        $totalsal  = $objResult['totalsal'] == 0 ? '' : number_format($objResult['totalsal']);
                        $total = $total + ($objResult["totalsal2"]);  
                          $total2 = $total2 + ($objResult["totalsal"]); 
                     ?>
                        
                        <tr>
                         <td><div align="center">SO-61<?php echo $objResult["order_id"];?></div></td>
                          <td><div align="center"><?php echo ''. thai_date_fullmonth(strtotime($objResult['LastUpdate'])) . '';?></div></td>
                         <td><div align="center"><?php echo substr($objResult["cusname"] ,3);?></div></td>
                         <td><div align="center"><?php echo $objResult["Phonnumber"];?></div></td>
                         <td><div align="center"><?php echo $objResult["cuslive"];?></div></td>
                 

                         <td><div align="right"><?php echo $objResult["totalsal2"];?></td>
                         <td><div align="right"><?php echo ''.$totalsal.'';?></td>
                       
                        <td align="center"><div align="center"><a class='button2  confirmation' href="print.php?order_id=<?php echo $objResult["order_id"];?>"><i class="fas fa-print  " style="font-size:36px"></i></a></div>
                         </td>
             
                         <td align="center"><div align="center"><a class='button2  confirmation' href="save2.php?order_id=<?php echo $objResult["order_id"];?>"><i class="fa fa-edit" style="font-size:36px"></i></a></div>
                         </td>


                         

                       </tr>

                     <?php
                      }
                      $item++;
                     }
                      ?>
    
                     </table>
                 </div>
                    <?php
                   $sql2 = "SELECT 
                   order_product.order_id,order_product.LastUpdate,order_product.weight,order_user.cusname,order_user.Phonnumber,order_user.cuslive,
                  SUM(total_all) AS totalsal,SUM(total_quantity)as totalsal2
                  FROM order_product  JOIN order_user 
                  ON order_product.order_id = order_user.order_id 
                  GROUP BY order_product.order_id,order_product.LastUpdate,order_product.weight,order_user.cusname,order_user.Phonnumber,order_user.cuslive
                   ORDER BY id_order_product desc ";
                  $query2 = mysqli_query($conn, $sql2);
                  $total_record = mysqli_num_rows($query2);
                  $total_page = ceil($total_record / $perpage);
                    ?>

                  <nav>
                  <ul class="pagination">

                     <a  aria-label="Previous">
                    <span aria-hidden="true"> แสดงหน้าที่ <?php echo $page; ?></span>
                    </a>

                   <a href="save.php?page=1" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>

                  <?php for($i=1;$i<=$total_page;$i++){ ?>
                   <a href="save.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                     <?php } ?>

                   <a href="save.php?page=<?php echo $total_page;?>" aria-label="Next">
                   <span aria-hidden="true">&raquo;</span>
                   </a>

                   </ul>
                    </center>
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

