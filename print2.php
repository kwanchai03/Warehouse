<?php
@session_start();
	//เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
	require_once __DIR__ . '/MPDF/vendor/autoload.php';
	
	//ตั้งค่าการเชื่อมต่อฐานข้อมูล
	ini_set('display_errors', 1);
   error_reporting(~0);

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "ware_house";

   $strCustomerID = null;

   if(isset($_GET["order_id"]))
   {
     $strCustomerID = $_GET["order_id"];
   }


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ware_house";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($conn, "utf8");
    $sql = "SELECT * FROM order_product_rogis WHERE order_id = '".$strCustomerID."' ";
       
    $query = mysqli_query($conn,$sql);
       // Check connection
       if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
        }

	
	$content = "";
	
	
	while($objResult = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
     if($objResult["total_quantity"] !== '0'){
     $price2  = $objResult['product_price'] == null ? '' : number_format($objResult['product_price'],2);

   $toto = $objResult["product_price"] * $objResult["total_quantity"];
   $price3  = $toto == null ? '' : number_format($toto,2);
			$content .= '<tr style="border:1px solid #000;">
          <td style="border-right:1px solid #000;padding:3px;text-align:left;"  >IE-'.$objResult['id_order_product'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:left;"  >'.$objResult['product_name'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:left;"  >'.$objResult['weight'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:left;" >'.$objResult['warehouse_row'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$objResult['warehouse_column'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:right;"  >'.$objResult['total_quantity'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:right;"  >'.$price2.'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:right;"  >'.$price3.'</td>
			</tr>';
	}
		}
	
?>
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
      <?= $titi = thai_date_fullmonth(time())?>
<?php

   ini_set('display_errors', 1);
   error_reporting(~0);

   $serverName2 = "localhost";
   $userName2 = "root";
   $userPassword2 = "";
   $dbName2 = "ware_house";

   $strCustomerID2 = null;

   if(isset($_GET["order_id"]))
   {
     $strCustomerID2 = $_GET["order_id"];
   }


       $servername2 = "localhost";
       $username2 = "root";
       $password2 = "";
       $dbname2 = "ware_house";
       // Create connection
       $conn2 = mysqli_connect($servername2, $username2, $password2, $dbname2);
       mysqli_set_charset($conn2, "utf8");
       $sql2 = "SELECT * FROM order_user_rogis WHERE order_id = '".$strCustomerID2."' ";
       
       $query2 = mysqli_query($conn2,$sql2);
       // Check connection
       if (!$conn2) {
           die("Connection failed: " . mysqli_connect_error());
        }

    $content2 = "";
	
	
	while($objResult2 = mysqli_fetch_array($query2,MYSQLI_ASSOC)) {
			$content2 .= '<br><br><br>

  <table  width="100%"   >
  <tr  >

        <th> <div align="left">รหัสใบเสร็จ :SO-61'.$strCustomerID2.'</div></th>
<th > <div align="right">วันที่ส่งออก :'. thai_date_fullmonth(strtotime($objResult2['LastUpdate'])) . '</div></th>
         </tr>
         <tr>
        <th > <div align="left">ลูกค้า :'.substr($objResult2['cusname'] ,3).'</div></th>

         <th> <div align="right">ที่อยู่ลูกค้า :'.$objResult2['cuslive'].'</div></th>
        </tr>
         <tr>
        <th > <div align="left">เบอร์โทร :'.$objResult2['Phonnumber'].'</div></th>

        <th > <div align="right">ผู้ส่ง :'.$objResult2['empname'].'</div></th>
         </tr>


        
   
</table >';
	
		}


?>

<?php

   ini_set('display_errors', 1);
   error_reporting(~0);

   $servername3 = "localhost";
   $username3 = "root";
   $password3 = "";
   $dbname3 = "ware_house";

   $strCustomerID2 = null;

   if(isset($_GET["order_id"]))
   {
     $strCustomerID2 = $_GET["order_id"];
   }

  $servername3 = "localhost";
  $username3 = "root";
  $password3 = "";
  $dbname3 = "ware_house";
  // Create connection
  $conn3 = mysqli_connect($servername3, $username3, $password3, $dbname3);
  mysqli_set_charset($conn3, "utf8");
   $sql3 = "SELECT * FROM order_product_rogis WHERE order_id = '".$strCustomerID2."' ";

   $query3 = mysqli_query($conn3,$sql3);
    // Check connection
    if (!$conn3) {
    die("Connection failed: " . mysqli_connect_error());
    }

$content3 = "";
	$total = 0;
  $total2 = 0;
	
	while($objResult3 = mysqli_fetch_array($query3,MYSQLI_ASSOC)) {
    $price  = $objResult3['total_all'] == null ? '' : number_format($objResult3['total_all'],2);
			$content3 .= '

      ';
   $total = $total + ($objResult3["total_quantity"]);  
   $total2 = $total2 + ($objResult3["total_all"]);  
    
   $content7 = "";
   $content7 .= '<table >

   <tr style="padding:4px;">
        <td  style="padding:4px;text-align:center;"   width="20%"></td>
        <td  style="padding:4px;text-align:center;"  width="15%"></td>
        <td  style="padding:4px;text-align:center;"  width="8%"></td>
      
    </tr>



  <tr width="100">
  <td colspan="3" align="right" ><h3>จำนวนรวม: '.$total.' ราคาผลรวมทั้งหมด: '.number_format($total2,2).'</h3></td>
  </tr>

  
   </table>';

	
		}









	
	mysqli_close($conn);
	
$mpdf = new \Mpdf\Mpdf();

$jj = '
<style>

	body{
		font-family: "Garuda";//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
	}
</style>

<h2 style="text-align:center"><img src="logowarehouse.png" alt="center"><br><br>Ware house ส่งออกสินค้า

</h2>';

$head = '

<br>

<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
    <tr style="border:1px solid #000;padding:4px;">
       <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="15%">รหัสสินค้า</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="15%">สินค้า</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">น้ำหนัก</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="10%">พื้นที่จัดเก็บ(r)</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="10%">พื้นที่จัดเก็บ(c)</td>
  
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">จำนวน</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">ราคา</td>
        <td  style="border-right:1px solid #000;padding:4px;text-align:center; font-size:20px;" width="15%">ราคารวม</td>
    </tr>

</thead>
	<tbody>';


  $head2 = '
<table  width="100%"   >
  <tr  >
<br>
<br><br><br><br><br><br><br>


        <th> <div align="left"><br>
<br><br><br><br><br><br><br>(...............................................) </div></th>


<th > <div align="right"><br>
<br><br><br><br><br><br><br>(...............................................) </div></th>
         </tr>
         <tr>
        <th > <div align="left"><br>วันที่......./......../.......</div></th>

         <th> <div align="right"><br>วันที่......./......../.......</div></th>
        </tr>
         <tr>
        <th > <div align="left"><br>ผู้ออกใบเสร็จ</div></th>

        <th > <div align="right"><br>ผู้รับใบเสร็จ</div></th>
         </tr>


        
   
</table >
';
	
$end = "</tbody>
</table>";

$mpdf->WriteHTML($jj);

$mpdf->WriteHTML($content2);

$mpdf->WriteHTML($head);




$mpdf->WriteHTML($content);



$mpdf->WriteHTML($end);

$mpdf->WriteHTML($content3);


$mpdf->WriteHTML($content7);

$mpdf->WriteHTML($head2);

$mpdf->Output();