
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


          <?php

            @session_start();
  

  
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
                       $txtpp=$_POST['txtpp'];
                     $member_id=$_POST['txtid'];
                     
                     $email=$_POST['txtweight'];
                     $address=$_POST['txtalignr'];
                     $address2=$_POST['txtalignc'];



                     $N = count($member_id);

                     for($i=0; $i < $N; $i++)
                    {
        
                    $sql = "UPDATE order_product SET weight='$email[$i]' , warehouse_row='$address[$i]' , warehouse_column='$address2[$i]' where id_order_product='$member_id[$i]'";

                       $query = mysqli_query($objCon,$sql);
                       if($query){
                    
                       echo "<meta http-equiv='refresh' content='2;url=save.php'/>";
                       }
                       else
                       {
                        echo "Error Save [".mysqli_error($objCon)."]";
                       }

                     } 
      
         
        
   

                    $B = count($address2);
               
                
                    for($i=0; $i < $B; $i++)
                    {                                            
                      $sql2 = "UPDATE contact SET $address[$i]='IE-$member_id[$i]'  where id_contact='$address2[$i]'";
                      $query = mysqli_query($objCon,$sql2);
                     
                     echo "<meta http-equiv='refresh' content='2;url=save.php'/>";      
                      
                    }
                  
                    mysqli_close($objCon);
                   ?>
             
