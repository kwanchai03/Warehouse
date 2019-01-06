
<!DOCTYPE html>
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


	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	

	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/icomoon.css">

	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<link rel="stylesheet" href="css/style.css">

	<script src="js/modernizr-2.6.2.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
	</head>
	<style type="text/css">

	</style>
	<body>

	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
		<aside id="fh5co-aside" role="complementary">

			<h1 id="fh5co-logo"><a href="save.php">Ware House System</a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li><i class='fas fa-download' style='font-size:15px;color: #000;'></i><a href="save.php">ข้อมูลการจัดเก็บ</a></li>
					<li><i class='fas fa-upload' style='font-size:15px;color: #000;'></i><a href="buy.php">ข้อมูลการสั่งซื้อ</a></li>
					<li ><i class='fas fa-history' style='font-size:15px;color: #000;'></i><a href="logis.php">ประวัติการส่งออก</a></li>
					<li class="fh5co-active"><i class='fas fa-archive' style='font-size:15px;color: #000;'></i><a href="contact.php">พื้นที่คลังสินค้า</a></li>
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
  
         
           $sql = "UPDATE member SET LastUpdate = NOW() WHERE UserID = '".$_SESSION["UserID"]."' ";
            $query = mysqli_query($con,$sql);


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


		<div id="fh5co-main">

			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">คลังสินค้า</h2>
				<div class="fh5co-counters" style="background-image: url(images/hero.jpg);" data-stellar-background-ratio="0.5" id="counter-animate">
				<div class="fh5co-narrow-content animate-box">
					<div class="row" >
						<div class="col-md-4 text-center">
							<span class="fh5co-counter js-counter" data-from="0" data-to="194" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">พื้นที่คงเหลือคลัง</span>
						</div>
						<div class="col-md-4 text-center">
							<span class="fh5co-counter js-counter" data-from="0" data-to="2" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">พื้นที่ใช้ไป</span>
						</div>
						<div class="col-md-4 text-center">
							<span class="fh5co-counter js-counter" data-from="0" data-to="0" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">สินค้าที่กำลังหมดอายุ</span>
						</div>
					</div>
				</div>
			</div>
		
				<div class="row animate-box" data-animate-effect="fadeInLeft">
					<?php
					@session_start();
                     ini_set('display_errors', 1);
                     error_reporting(~0);

                      $strKeyword = null;

                       if(isset($_POST["txtKeyword"]))
                       {
                        $strKeyword = $_POST["txtKeyword"];
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
                  $conn = mysqli_connect($servername, $username, $password, $dbname);
                  mysqli_set_charset($conn, "utf8");



                  $perpage = 5;
                   if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                   } else {
                      $page = 1;
                     }

                   $start = ($page - 1) * $perpage;
                  

                  $sql = "SELECT * FROM contact ORDER BY id_contact ";  
                 
                  $query = mysqli_query($conn,$sql);
                    // Check connection
                     if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());

                      }

                   ?>
					
			<table class="overflow-y">
					<thead>
						<tr>
							<th></th>
							<th width="150">A1/01</th>
							<th width="150">A1/02</th>
							<th width="150">A1/03</th>
							<th width="150">A1/04</th>
							<th width="150">A1/05</th>
							<th width="150">A1/06</th>
							<th width="150">A1/07</th>
							<th width="150">A1/08</th>
							<th width="150">A1/09</th>
							<th width="150">A1/010</th>
							<th width="150">A1/011</th>
							<th width="150">A1/012</th>
							<th width="150">A1/013</th>
							<th width="150">A1/014</th>
						</tr>
					</thead>
					<tbody>
						 <?php
              
                       while($objResult = mysqli_fetch_array($query,MYSQLI_ASSOC))
                      {
                        
                     ?>
						<tr>

							 <th><div align="left">A<?php echo $objResult["id_contact"];?></div></th>
                         
                         <td><div align="left"><?php echo $objResult["A1"];?></td>
                        <td><div align="left"><?php echo $objResult["A2"];?></td>
                         <td><div align="left"><?php echo $objResult["A3"];?></td>
                         <td><div align="left"><?php echo $objResult["A4"];?></td>
                        <td><div align="left"><?php echo $objResult["A5"];?></td>
                         <td><div align="left"><?php echo $objResult["A6"];?></td>
                        <td><div align="left"><?php echo $objResult["A7"];?></td>
                         <td><div align="left"><?php echo $objResult["A8"];?></td>
                         <td><div align="left"><?php echo $objResult["A9"];?></td>
                         <td><div align="left"><?php echo $objResult["A10"];?></td>
                         <td><div align="left"><?php echo $objResult["A11"];?></td>
                        <td><div align="left"><?php echo $objResult["A12"];?></td>
                         <td><div align="left"><?php echo $objResult["A13"];?></td>
                          <td><div align="left"><?php echo $objResult["A14"];?></td>


							
						</tr>

						

					</tbody>
					 <?php
               
                     }
                      ?>
				</table>								
				</div>
			</div>															
		</div>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
    <script src="js/jquery.stickyheader.js"></script>

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
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>

	
	
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>

