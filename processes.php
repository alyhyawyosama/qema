<?php

use DeepCopy\Filter\ReplaceFilter;

session_start();

include ("connect.php"); 

function check_input($data){
  global $connect;
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($connect,$data);
  return $data;
}
$error= [];
function check_num($num){
  $check =  (is_numeric($num))?true:false;
  $check = ($num > 0)?true:false ;
  if ($check == false) {
    $error['num'] = 'لديك خطا في خانة المبلغ الرجاء التاكد من المدخل';
    return $error['num'];
  }else return $num;
   
}

?>

    



<?php


  function show_worker_details(){
    if (isset($_GET['id'])) {
      global $connect;
      $worker_id1= $_GET['id'];
      $worker_id =(int)$worker_id1;
      $query = "SELECT amount_money, `duration`,
      REPLACE(REPLACE(REPLACE(duration,'half_day','نص'),'day','يوم'),'nWork','لم يشتغل') AS eduration,
       details,`date`,details_id FROM `worker_details` where worker_id= '".$worker_id."';   ";
      $show  = mysqli_query($connect,$query) or die("ERROR".mysqli_error($connect));
      $dsalary =" SELECT `amount_daily`  FROM workers WHERE `worker_id` = $worker_id;";
      $res  = mysqli_query($connect,$dsalary) or die("ERROR".mysqli_error($connect));
      $row1=mysqli_fetch_assoc($res);
      $amount_daily = $row1['amount_daily'];
      $baqy2  =$n= 1;$baqy1 = 0;
      if ($show) {
        while ($row=mysqli_fetch_assoc($show)) {
          /* cheak if the duration is day or half day or empty  */
          if ($row['duration']=='day') {
            $baqy1 = $amount_daily -  $row['amount_money'];
          }elseif($row['duration']=='half_day'){
            $baqy1 = ($amount_daily /2 ) -  $row['amount_money'];
          }else $baqy1 = 0;
          $baqy2 += $baqy1;
          /*  End  */
          echo"
          <tr>
          


          <td class='d-none'>".$row['details_id'] ."  </td>
          <td>$n</td>
          <td style='width: 30px;' >".  $row['amount_money'] ."  </td>
          <td style='width:30px;'  > ".  $baqy1 ." </td>
          <td> ".$row['eduration'] ."  </td>
          <td> ".$row['details'] ." </td>
          <td>".$row['date'] ."  </td>

          <td>

          <a title='تعديل' class='edit_worker_details_btn' data-toggle='modal' name='edit_worker_details_btn' data-target='#modal_edit_worker_details' >
          <span>
          <img src='images/svg/edit.svg' >
          </span> 
          </a>
          <a title='Delete' class='delete_worker_details_btn' data-toggle='modal' name='delete_worker_details_btn' data-target='#modal_delete_worker_details' >
          <span>
          <img src='images/svg/delete.svg' >
          </span>
          </a>
          
          </td>


          "; $n++;

        }

        
      }
      echo   '</tr>';
      
      

    }  
  } 
  function show_workers(){
      global $connect;
      $query = "SELECT worker_id, `name`,`occupation`,`phone`,`amount_daily`,`date` FROM `workers`  ";
      $show  = mysqli_query($connect,$query);
      $n =1;
      if ($show) {
        while ($row=mysqli_fetch_assoc($show)) {
          echo"
          <tr >
            
          <td class='d-none'>".$row['worker_id']."</td>
          <td>".$n."</td>
          <td>".  $row['name'] ."  </td>
          <td> ".$row['occupation'] ."  </td>
          <td> ".$row['phone'] ." </td>
          <td>".$row['amount_daily'] ."  </td>
          <td> ".$row['date'] ." </td>  
          <td>

          <a  class='editbtn' id='worker_btn' title='تعديل ' data-toggle='tooltip' name='update_worker' data-target='#show_worker_details' >
          <span>
          <img src='images/svg/edit.svg' >
          </span> 
          </a>
          <a class='delete_worker_btn'  class='manage_account' title='حذف ' data-toggle='tooltip' data-target='#delete_worker_btn' >
          <span>
          <img src='images/svg/delete.svg' >
          </span>
          </a>
          <a href='worker_details?id=".check_input($row['worker_id'])." ' class='manage_account' title='ادارة' data-toggle='tooltip'>
          <span>
              <img src='images/svg/manage_account.svg'>
          </span>
          </a>
          
          </td>

          "; $n++;

        }
      }
      echo   '</tr>';
    }   
  
    if (isset($_POST['sure_deleteWorker_btn'])) {
      $id = check_input($_POST['delete_id']);
  
      $sql = "DELETE FROM  `workers` WHERE `workers`.`worker_id` =  $id   ";
      $res = mysqli_query($connect , $sql) ; ($res)?$_SESSION['msg']="success":$_SESSION['msg']="error";
;
      header("location:workers");#replaced
  }
  function show_builds(){
    global $connect;
    $query = "SELECT build_id, `name`,phone,details,`date` FROM `builds`  ";
    $show  = mysqli_query($connect,$query);
    $n =1;
    if ($show) {
      while ($row=mysqli_fetch_assoc($show)) {
        echo"
        <tr >
          
        <td class='d-none'>".$row['build_id']."</td>
        <td>".$n."</td>
        <td>".  $row['name'] ."  </td>
        <td> ".$row['phone'] ."  </td>
        <td> ".$row['details'] ." </td>
        <td> ".$row['date'] ." </td>  
        <td>

        <a title='تعديل' class='edit_build_btn' id='edit_build_btn' data-toggle='modal' name='edit_build_btn' data-target='#show_build_details' >
        <span>
        <img src='images/svg/edit.svg' >
        </span> 
        </a>
        <a class='delete_build_btn' title='Delete' data-toggle='modal' data-target='#delete_build_btn' >
        <span>
        <img src='images/svg/delete.svg' >
        </span>
        </a>
        <a href='build_details?id="/*replaced*/.check_input($row['build_id'])." ' class='manage_account' title='ادارة' data-toggle='tooltip'>
        <span>
            <img src='images/svg/manage_account.svg'>
        </span>
        </a>
        
        </td>

        "; $n++;

      }
    }
    echo   '</tr>';
  }
  function show_build_details() {

    if (isset($_GET['id'])) {
      global $connect;
      $build_id = check_input($_GET['id']) ;
      $query =  "SELECT build_details_id,details, `on_him` , `for_him` ,`date` FROM `build_details` WHERE build_id= '$build_id'";
      $show  = mysqli_query($connect,$query) or die("ERROR".mysqli_error($connect));
      $total = 0;
      $style = "";$temp1 = 0;
      if ($show) {
        while ($row=mysqli_fetch_assoc($show)) {
          $total = ($total+$row['for_him'])-$row['on_him'];
          
          if ($total < 0 ){
            $temp1 = -1 * $total;
            $style = " <span id='total' style='font-weight: 900;color:red; '> ع "; 
          }
          else{
            $temp1 = $total;
            $style = "   <span id='total' style='font-weight: 900;color:green'> ل  " ;
          }
          echo"
          <tr>
          
  
  
          <td class='d-none'>".$row['build_details_id'] ."  </td>
          <td>".$row['date'] ."  </td>  
          <td style='font-weight: 900;color:green'  > ".  $row['for_him'] ." </td>
          <td style='font-weight: 900;color:red' >".  $row['on_him'] ."  </td>
          <td> ".$row['details']." </td>
  
          <td  > $style". $temp1 ." </span></td>
  
          <td>
  
          <a title='تعديل' class='edit_build_details_btn' data-toggle='modal' name='edit_build_details_btn' data-target='#modal_edit_build_details' >
          <span>
          <img src='images/svg/edit.svg' >
          </span> 
          </a>
          <a title='Delete' class='delete_worker_details_btn' data-toggle='modal' name='delete_worker_details_btn' data-target='#modal_delete_worker_details' >
          <span>
          <img src='images/svg/delete.svg' >
          </span>
          </a>
  
          
          </td>
  
  
          "; 
  
        }
  
        
      }
      echo   '</tr>';
      
      
  
    }
  
  }
  
  function show_merchants(){
    global $connect;
    $query = "SELECT merchant_id, `name`,phone,details,`date` FROM `merchants`  ";
    $show  = mysqli_query($connect,$query);
    $n =1;
    if ($show) {
      while ($row=mysqli_fetch_assoc($show)) {
        echo"
        <tr >
          
        <td class='d-none'>".$row['merchant_id']."</td>
        <td>".$n."</td>
        <td>".  $row['name'] ."  </td>
        <td> ".$row['phone'] ."  </td>
        <td> ".$row['details'] ." </td>
        <td> ".$row['date'] ." </td>  
        <td>

        <a title='تعديل' class='edit_merchant_btn' id='edit_merchant_btn' data-toggle='modal' name='edit_merchant_btn' data-target='#show_build_details' >
        <span>
        <img src='images/svg/edit.svg' >
        </span> 
        </a>
        <a class='delete_merchant_btn' title='Delete' data-toggle='modal' data-target='#delete_merchant_modal' >
        <span>
        <img src='images/svg/delete.svg' >
        </span>
        </a>
        <a href='merchant_details?id="/*replaced*/.check_input($row['merchant_id'])." ' class='manage_account' title='ادارة' data-toggle='tooltip'>
        <span>
            <img src='images/svg/manage_account.svg'>
        </span>
        </a>
        
        </td>

        "; $n++;

      }
    }
    echo   '</tr>';
  }

  function show_merchant_details() {

    if (isset($_GET['id'])) {
      global $connect;
      $merchant_id = check_input($_GET['id']) ;
      $query =  "SELECT merchant_details_id,details, `on_him` , `for_him` ,`date` FROM `merchant_details` WHERE merchant_id= '$merchant_id'";
      $show  = mysqli_query($connect,$query) or die("ERROR".mysqli_error($connect));
      $total = 0;
      $style = "";$temp1 = 0;
      if ($show) {
        while ($row=mysqli_fetch_assoc($show)) {
          $total = ($total+$row['for_him'])-$row['on_him'];
          
          if ($total < 0 ){
            $temp1 = -1 * $total;
            $style = " <span id='total' style='font-weight: 900;color:red; '> ع "; 
          }
          else{
            $temp1 = $total;
            $style = "   <span id='total' style='font-weight: 900;color:green'> ل  " ;
          }
          echo"
          <tr>
          
  
  
          <td class='d-none'>".$row['merchant_details_id'] ."  </td>
          <td>".$row['date'] ."  </td>  
          <td style='font-weight: 900;color:green'  > ".  $row['for_him'] ." </td>
          <td style='font-weight: 900;color:red' >".  $row['on_him'] ."  </td>
          <td> ".$row['details']." </td>
  
          <td  > ".$style . $temp1 ." </span></td>
          <td>
  
          <a title='تعديل' class='edit_merchant_details_btn' data-toggle='modal' name='edit_merchant_details_btn' data-target='#modal_edit_bmerchant_details' >
          <span>
          <img src='images/svg/edit.svg' >
          </span> 
          </a>
          <a title='Delete' class='delete_merchant_details_btn' data-toggle='modal' name='delete_merchant_details_btn' data-target='#delete_merchant_details_btn' >
          <span>
          <img src='images/svg/delete.svg' >
          </span>
          </a>
  
          
          </td>
  
  
          "; 
  
        }
  
        
      }
      echo   '</tr>';
      
      
  
    }
  
  }

if(isset($_POST['edit_worker_btn'])){
    
    $id = check_input($_POST['update_id']);
    $name = check_input($_POST['wname']);
    $phone = check_input($_POST['wphone']);
    $amount = check_num( check_input($_POST['wamount']));
    $date = check_input($_POST['wdate']);
    $jop = check_input($_POST['wjop']);
    
    $sql = "UPDATE `workers` SET `name` = '$name', `phone` = '$phone', `amount_daily` = '$amount', `date` = '$date', `occupation` = '$jop' WHERE `workers`.`worker_id` = $id";
    $result = mysqli_query($connect , $sql);
    ($result)?$_SESSION['msg']="success":$_SESSION['msg']="error";
    header("location:workers") ;/*replaced*/
}

if(isset($_POST['add_new_worker_btn'])){
  $wname= check_input($_POST['wname']);
  $wphone=check_input($_POST['wphone']);
  $wprice = check_input($_POST['wprice']);
  $wdate = check_input($_POST['wdate']);
  $wjop = check_input($_POST['wjop']);
  $user_id= $_SESSION['user_id'];
  $query1="INSERT INTO `workers` (`worker_id`,`user_id`, `name`, `phone`,`amount_daily`,`occupation`,`date`) VALUES (NULL,'$user_id', '$wname', '$wphone','$wprice','$wjop','$wdate')";
  $result = mysqli_query($connect,$query1) ;
  ($result)?$_SESSION['msg']="success":$_SESSION['msg']="error";
  header("location:workers");/*replaced*/
}

if(isset($_POST['sure_edit_worker_details'])){  
  $id = check_input($_POST['edit_details_id']);
  $worker_id = check_input($_POST['worker_id']);
  $amount_deliver = check_input($_POST['edit_amount_deliverd']);
  $duration = check_input($_POST['edit_duration']);
  $details = check_input($_POST['edit_details']);
  $date = check_input($_POST['edit_date']);

  $sql =" UPDATE `worker_details` SET `amount_money` = '$amount_deliver', `duration` = '$duration', `details` = '$details ', `date` = '$date' WHERE `worker_details`.`details_id` = $id";
  $result = mysqli_query($connect , $sql);
  ($result)?$_SESSION['msg']="success":$_SESSION['msg']="error";
  header("location:worker_details?id=$worker_id");/*replaced*/
}

if (isset($_POST['sure_delete_build_details_btn'])) {
  $details_id = check_input($_POST['delete_details_id']);
  $build_id = check_input($_POST['build_id']);

  $sql = "DELETE FROM `build_details` WHERE `build_details`.`build_details_id`  =  $details_id";
  
  $res = mysqli_query($connect , $sql) ;
  ($res)?$_SESSION['msg']="success":$_SESSION['msg']="error";
  header("location:build_details.php?id=$build_id");
}
if (isset($_POST['sure_delete_merchant_details_btn'])) {
  $details_id = check_input($_POST['delete_details_id']);
  $merchant_id = check_input($_POST['merchant_id']);
  $sql = "DELETE FROM `merchant_details` WHERE `merchant_details`.`merchant_details_id`  = ' $details_id'";
  
  $res = mysqli_query($connect , $sql) ;
  ($res)?$_SESSION['msg']="success":$_SESSION['msg']="error";

  header("location:merchant_details.php?id=$merchant_id");
}

if (isset($_POST['sure_delete_worker_details_btn'])) {
  $details_id = check_input($_POST['delete_details_id']);
  $worker_id = check_input($_POST['worker_id']);

  $sql = "DELETE FROM `worker_details` WHERE `worker_details`.`details_id`  =  $details_id";
  
  $res = mysqli_query($connect , $sql) ;
  ($res)?$_SESSION['msg']="success":$_SESSION['msg']="error";
  header("location:worker_details?id=$worker_id");/*replaced*/
}

if (isset($_POST['add_new_details'])) {
  $amount_deliverd =check_input($_POST['amount_deliverd']);
  $duration =check_input($_POST['duration']);
  $details = check_input($_POST['details']);
  $date = check_input($_POST['date']);
  $user_id=$_SESSION['user_id'];
  $worker_id =  check_input($_POST['worker_id']);
  $sql = "INSERT INTO `worker_details` (`details_id`, `worker_id`,`user_id`, `amount_money`, `duration`, `details`, `date`) VALUES (NULL, '$worker_id','$user_id', '$amount_deliverd', '$duration', '$details ', '$date')";
  $result = mysqli_query($connect,$sql) ;
  ($result)?$_SESSION['msg']="success":$_SESSION['msg']="error";
  header("location:worker_details?id=$worker_id") ;/*replaced*/


}

if (isset($_POST['add_new_build_details'])) {
  $build_id =  check_input($_POST['build_id']);
  $amount_deliverd =check_input($_POST['build_amount_deliverd']);
  $type_amount_deliverd =check_input($_POST['type_amount_deliverd']);
  $details = check_input($_POST['details']);
  $date = check_input($_POST['date']);
  $sql = "INSERT INTO `build_details` (`build_details_id`, `build_id`, `$type_amount_deliverd`,  `details`, `date`) VALUES (NULL, '$build_id', '$amount_deliverd',  '$details ', '$date')";
  $result = mysqli_query($connect,$sql) ;
  ($result)?$_SESSION['msg']="success":$_SESSION['msg']="error";
  header("location:build_details?id=$build_id") ;/*replaced*/

}

if (isset($_POST['sure_deleteBuild_btn'])) {
  $id = check_input($_POST['delete_build_id']);

  $sql = "DELETE FROM `builds` WHERE `builds`.`id` =  $id   ";
  $res = mysqli_query($connect , $sql) 
  ($res)?$_SESSION['msg']="success":$_SESSION['msg']="error";
  header("location:builds");/*replaced*/
}

if(isset($_POST['sure_edit_build_btn'])){
    
  $id = check_input($_POST['update_build_id']);
  $name = check_input($_POST['edit_build_name']);
  $phone = check_input($_POST['edit_build_phone']);
  $details = check_input($_POST['edit_build_details']);
  $date = check_input($_POST['edit_build_date']);
  
  $sql = "UPDATE `builds` SET `name` = '$name', `phone` = '$phone', `details` = '$details', `date` = '$date' WHERE `builds`.`build_id` = '$id'";
  $result = mysqli_query($connect , $sql);
  ($result)?$_SESSION['msg']="success":$_SESSION['msg']="error";
 header("location:builds") ;/*replaced*/
}

if(isset($_POST['add_new_build_btn'])){
  $bname= check_input($_POST['bname']);
  $bphone= check_input($_POST['bphone']);
  $bdetails = check_input($_POST['bdetails']);
  $bdate = check_input($_POST['bdate']);
  $query1="INSERT INTO `builds` (`build_id`, `name`, `phone`,`details`,`date`) VALUES (NULL, '$bname', '$bphone','$bdetails','$bdate')";
  $result = mysqli_query($connect,$query1) ;
  ($result)?$_SESSION['msg']="success":$_SESSION['msg']="error";
  header("location:builds");/*replaced*/
}

if(isset($_POST['sure_edit_build_details'])){  
  $id = check_input($_POST['edit_build_details_id']);
  $build_id = check_input($_POST['build_id']);
  $amount_deliverd = check_input($_POST['edit_amount_deliverd']);
  $type_amount_deliverd = check_input($_POST['type_amount_deliverd']);
  $details = check_input($_POST['edit_details']);
  $date = check_input($_POST['edit_date']);
  $delete_previous_amount = ( $type_amount_deliverd=="for_him" )?"on_him" :"for_him"; /* هذا المتغير يحمل المبلغ السابق الذي تم ادخاله سواء لعمود عليه او للعمود له  */
  $sql ="UPDATE `build_details` SET `$delete_previous_amount` =0 , `$type_amount_deliverd` = '$amount_deliverd', `details` = '$details', `date` = '$date' WHERE `build_details`.`build_details_id` = '$id';";
  $result = mysqli_query($connect , $sql);
  ($result)?$_SESSION['msg']="success":$_SESSION['msg']="error";
  header("location:build_details?id=$build_id") ;/*replaced*/
}

if(isset($_POST['add_new_merchant_btn'])){
  /*merchant_phone*/
  $merchant_name= check_input($_POST['merchant_name']);
  $merchant_phone= check_input($_POST['merchant_phone']);
  $merchant_details = check_input($_POST['merchant_details']);
  $merchant_date = check_input($_POST['merchant_date']);
  $query1="INSERT INTO `merchants` (`merchant_id`, `name`, `phone`,`details`,`date`) VALUES (NULL, '$merchant_name', '$merchant_phone','$merchant_details','$merchant_date')";
  $result = mysqli_query($connect,$query1);
  ($result)?$_SESSION['msg']="success":$_SESSION['msg']="error";
  header("location:merchants");/*replaced*/
}

if(isset($_POST['sure_edit_merchant_btn'])){
    
  $id = check_input($_POST['update_merchant_id']);
  $name = check_input($_POST['edit_merchant_name']);
  $phone = check_input($_POST['edit_merchant_phone']);
  $details = check_input($_POST['edit_merchant_details']);
  $date = check_input($_POST['edit_merchant_date']);
  
  $sql = "UPDATE `merchants` SET `name` = '$name', `phone` = '$phone', `details` = '$details', `date` = '$date' WHERE `merchants`.`merchant_id` = '$id'";
  $result = mysqli_query($connect , $sql);
  ($result)?$_SESSION['msg']="success":$_SESSION['msg']="error";
  header("location:merchants") ;/*replaced*/
}
if (isset($_POST['sure_deleteMerchant_btn'])) {
  $id = check_input($_POST['delete_merchant_id']);

  $sql = "DELETE FROM `merchants` WHERE `merchants`.`merchant_id` =  $id   ";
  $res = mysqli_query($connect , $sql) ; 
  ($res)?$_SESSION['msg']="success":$_SESSION['msg']="error";
  header("location:merchants");/*replaced*/
}


if (isset($_POST['add_new_merchant_details'])) {
  $merchant_id =  check_input($_POST['merchant_id']);
  $amount_deliverd =check_input($_POST['merchant_amount_deliverd']);
  $type_amount_deliverd =check_input($_POST['type_amount_deliverd']);
  $details = check_input($_POST['merchant_detalis_details']);
  $date = check_input($_POST['merchant_detalis_date']);
  $sql = "INSERT INTO `merchant_details` (`merchant_details_id`, `merchant_id`, `$type_amount_deliverd`,  `details`, `date`) VALUES (NULL, '$merchant_id', '$amount_deliverd',  '$details ', '$date')";
  $result = mysqli_query($connect,$sql)  ;
  ($result)?$_SESSION['msg']="success":$_SESSION['msg']="error";
    header("location:merchant_details?id=$merchant_id") ;/*replaced*/
}

if(isset($_POST['sure_edit_merchant_details'])){  
  $id = check_input($_POST['edit_merchant_details_id']);
  $merchant_id = check_input($_POST['merchant_id']);
  $amount_deliverd = check_input($_POST['edit_amount_deliverd']);
  $type_amount_deliverd = check_input($_POST['type_amount_deliverd']);
  $details = check_input($_POST['edit_merchant_details']);
  $date = check_input($_POST['edit_merchant_date']);
  $delete_previous_amount = ( $type_amount_deliverd=="for_him" )?"on_him" :"for_him"; /* هذا المتغير يحمل المبلغ السابق الذي تم ادخاله سواء لعمود عليه او للعمود له  */
  $sql ="UPDATE `merchant_details` SET `$delete_previous_amount` =0 , `$type_amount_deliverd` = '$amount_deliverd', `details` = '$details', `date` = '$date' WHERE `merchant_details`.`merchant_details_id` = '$id';";
  $result = mysqli_query($connect , $sql);
  ($result)?$_SESSION['msg']="success":$_SESSION['msg']="error";

  header("location:merchant_details?id=$merchant_id") ;/*replaced*/
}

if(isset($_POST['save_information_btn'])){
  $project_name = check_input($_POST['project_name']);
  $address = check_input($_POST['address']);
  $user_number = check_input($_POST['user_number']);
  
    if(isset($_FILES['img']) && !empty($_FILES['img']['name']) ){
      global $img_error;
      $fileDir= "uploads/";
      $ftarget = $fileDir . basename($_FILES["img"]['name']);
      $uploadOk = 1;
      $itype = strtolower(pathinfo($ftarget,PATHINFO_EXTENSION));
      $avilabe_extension = ['jpg','png','jpeg','GIF'];
      $check = getimagesize($_FILES["img"]['tmp_name']);
    
      if ($check !== false )$uploadOk = 1;
      
      
      elseif ($_FILES["img"]['size'] > 500000 )
      {
          $img_error[] = "الصورة كبيرة جدا ";
          $uploadOk = 0;
      }

      elseif(!in_array($itype,$avilabe_extension) ) 
      {
          $img_error[] = " عفوا الصيغ المسموحة هي  JPG JPEG PNG GIF ";
          $uploadOk = 0;
      }
      else
      {
          $img_error[] = "الملف المختار ليس صورة ";
          $uploadOk = 0;
      }


      $_SESSION['error']=implode("<br>- ",$img_error);
      if ($uploadOk == 0  )
      {
        $_SESSION['error']=implode("<br>- ",$img_error);
        header("location:setting.php");
          // if everything is ok, try to upload file
      } 
      else 
      {
        move_uploaded_file($_FILES["img"]["tmp_name"], $ftarget);
      }

    
      if (empty($img_error)) 
        {
          $id= $_SESSION['user_id'];
          $fname = check_input($ftarget); 
          
          $sql = "UPDATE  `users`  SET `name`='$project_name',`phone`='$user_number', `address` = '$address',`path`='$fname'  WHERE  `users`.`user_id` =$id";
          $result1 = mysqli_query($connect,$sql) OR die(mysqli_error($connect));
          if ($result1)
          {
            $_SESSION['success']= "تم التعديل بنجـاح  ";
            header("location:setting.php");
          }
          else  echo "<br>- Error".mysqli_error($connect);
        }
    }
    else{
    $id= $_SESSION['user_id'];
    $sql = "UPDATE  `users`  SET `name`='$project_name',`phone`='$user_number', `address` = '$address'  WHERE  `users`.`user_id` =$id";
    $result1 = mysqli_query($connect,$sql) OR die(mysqli_error($connect));
    if ($result1)
    {
        $_SESSION['success']= "تم التعديل بنجـاح ";
        header("location:setting.php");
    }
  }
}

if (isset($_POST['saveGoingSettingBtn'])) {
  $id= $_SESSION['user_id'];
  $username = check_input($_POST['username']);
  $email = check_input($_POST['email']);
  $password = md5(check_input($_POST['password'])) ;
  $sql_a = "SELECT * FROM users WHERE `user_id` = $id AND `password`='$password';";
  $sql_s = mysqli_query($connect,$sql_a);
  if (mysqli_num_rows($sql_s) > 0) {
    $sql_u = "SELECT * FROM users WHERE `username`='$username'";
  	$sql_e = "SELECT * FROM users WHERE `email`='$email'";
  	$res_u = mysqli_query($connect, $sql_u);
  	$res_e = mysqli_query($connect, $sql_e);
    if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "اسم المستخدم موجود من قبل "; 	
      $_SESSION['error']=$name_error;
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "البريد الالكتروني موجود من قبل "; 	
      $_SESSION['error']=$email_error;
  	}
    else
      {
        $sql2 = "UPDATE  `users`  SET username='$username',`email`='$email' WHERE  `users`.`user_id` =$id";
        $result3 = mysqli_query($connect,$sql2);
        if ($result3)
        {
            $_SESSION['success']= " تم تعديل بيانات الدخول بنجـاح ";
        }
      }
  }else{
    $_SESSION['error']= " كلمة السر التي ادخلتها غير صحيحة ";
  }
}

if (isset($_POST['passwordSettingBtn'])) {
  $id= $_SESSION['user_id'];
  $old_password = md5(check_input($_POST['old_password'])) ;
  $new_password = check_input($_POST['new_password']) ;
  $sure_new_password = check_input($_POST['sure_new_password']) ;
  $sql_a = "SELECT * FROM users WHERE `user_id` = $id AND `password`='$old_password';";
  $sql_s = mysqli_query($connect,$sql_a);
  if (mysqli_num_rows($sql_s) > 0) {
    if (strlen($new_password) <  6 || empty($new_password)) 
    {
  	  $password_error = " كلمة السر صغيرة جدا لابد ان تكون اكثر من ستة اعداد "; 	
      $_SESSION['error']=$password_error;    
    }
    elseif($new_password !== $sure_new_password){
      $password_error = "كلمة السر غير متطابقة  "; 	
      $_SESSION['error']=$password_error;    
    }
    else{
        $password = md5($new_password);
        $sql2 = "UPDATE  `users`  SET `password`='$password' WHERE `users`.`user_id` =$id";
        $result3 = mysqli_query($connect,$sql2);
        if ($result3)
        {
            $_SESSION['success']= " تم تعديل كلمة المرور بنجـاح ";
        }
      }
    
  }else{
    $_SESSION['error']= " كلمة السر القديمة غير صحيحة ";
  }
}


function logged_in() {
return isset($_SESSION['user_id']);

}
function confirm_logged_in() {
  if (!logged_in()) {?>
  <script type="text/javascript">
  window.location = "login.php";
  </script>   
  <?php
  }
}

if (isset($_GET['action']) && $_GET['action']=='destory' ) {
  session_destroy();
  header('location:login');
}
  
if (isset($_POST['loginBtn'])) {
/*

*/
      $username = check_input($_POST['username']);
      $upass = check_input($_POST['password']);
      $h_upass = md5($upass);
    if ($upass == ''){
        ?>    <script type="text/javascript">
                    window.location = "login.php?err=empty";
                    </script>
            <?php
    }else{
    //create some sql statement             
            $sql = "SELECT * FROM  `users` WHERE  `username` =  '" . $username . "' AND  `password` =  '" . $h_upass . "'";
            $result = mysqli_query($connect, $sql);
    
            if ($result){
                //get the number of results based n the sql statement
            $numrows = mysqli_num_rows($result);
        
            //check the number of result, if equal to one   
            //IF theres a result
                if ($numrows == 1) {
                    //store the result to a array and passed to variable found_user
                    $found_user  = mysqli_fetch_array($result);
    
                    //fill the result to session variable
                    $_SESSION['user_id']  = $found_user['user_id']; 
                    $_SESSION['name'] = $found_user['name']; 
                    $_SESSION['username']  =  $found_user['username']; 
              
                ?>    <script type="text/javascript">
                          //then it will be redirected to index.php
                          window.location = "index.php";
                      </script>
                <?php        
              
            
                } else {
                //IF theres no result
                  ?>    <script type="text/javascript">
                    window.location = "login?err=uOp";
                    </script>
            <?php
    
                }
    
            } else {
                    # code...
            die("header('location:login?err=faield') " );
            }

        }       
} 
   

function bProcess(){

  global $connect;
  $query1 = "SELECT sum(for_him) AS 'for_him' , sum(on_him) AS 'on_him' FROM `build_details` ";
          $show1  = mysqli_query($connect,$query1) ;
          ($show1)?'':$_SESSION['msg']="error";
          $row=mysqli_fetch_assoc($show1);
          return number_format($row["on_him"]-$row["for_him"]);
}

function mProcess(){

  global $connect;
  $query1 = "SELECT sum(for_him) AS 'for_him' , sum(on_him) AS 'on_him' FROM `merchant_details` ";
          $show1  = mysqli_query($connect,$query1) ;
          ($show1)?'':$_SESSION['msg']="error";
          $row=mysqli_fetch_assoc($show1);
          return number_format($row["on_him"]-$row["for_him"]);
}



?>
