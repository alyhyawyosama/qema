<?php
require_once __DIR__ . '/../pdf/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8' ,'format ' => [290,100]]);
$host='localhost';
$userdb = 'root';
$passdb='';
$dbname='alqema2';
$connect=mysqli_connect($host,$userdb,$passdb,$dbname);
$type =" ";

$html = " ";
      
if ($_GET['type']=="builds" ) {
  $type = print_build_details();
}
else if ($_GET['type']=="workers" ) {
  $type = print_worker_details();
}
else if ($_GET['type']=="merchants" ) {
  $type = print_merchant_details();
}

      

function print_worker_details(){

  $html='
            <tr>
                <th style="width:30px;" >-</th>
                <th>المسلم</th>
                <th >الباقي</th>
                <th>المده</th>
                <th>التفاصيل</th>
                <th>التاريخ</th>
            </tr>
                        
                    '; 
                    global $connect;
                    $worker = htmlspecialchars(trim($_GET["ids"]));
                    $worker_id =$worker;
                    $query = "SELECT amount_money, `duration`,

                    REPLACE(REPLACE(REPLACE(duration,'half_day','نص'),'day','يوم'),'nWork','لم يشتغل') AS eduration,
                    details,`date`,details_id FROM `worker_details` where worker_id= $worker_id  ORDER BY `date`;
    ";
                    $show  = mysqli_query($connect,$query) or die("ERROR".mysqli_error($connect));
                    $dsalary =" SELECT `amount_daily`  FROM workers WHERE `worker_id` = $worker_id;";
                    $res  = mysqli_query($connect,$dsalary) or die("ERROR".mysqli_error($connect));
                    $row1=mysqli_fetch_assoc($res);
                    $amount_daily = $row1["amount_daily"];
                    $baqy2  =$n= 1;$baqy1 = 0;
                    while ($row=mysqli_fetch_assoc($show)) {
                    /* cheak if the duration is day or half day or empty  */
                    if ($row["duration"]=="day") {
                        $baqy1 = $amount_daily -  $row["amount_money"];
                    }elseif($row["duration"]=="half_day"){
                        $baqy1 = ($amount_daily /2 ) -  $row["amount_money"];
                    }else $baqy1 = 0;
                    $baqy2 += $baqy1;
                    /*  End  */

                    

                    $html .='
                    <tr>
                    <td>'.$n.'</td>
                    <td  >'.  $row["amount_money"] .'  </td>
                    <td  > '.  $baqy1 .' </td>
                    <td> '.$row["eduration"] .'  </td>
                    <td> '.$row["details"] .' </td>
                    <td>'.$row["date"] .'  </td>
                </tr>
                    


                    '; $n++;

                    }



                    ;
                    $worker_id =$worker;
                    /* */
                    $sql_day  = "SELECT COUNT(duration) AS day FROM worker_details WHERE `duration` IN ('day')  AND worker_id =$worker_id";
                    $show_day  = mysqli_query($connect,$sql_day) or die("ERROR".mysqli_error($connect));
                    $days=mysqli_fetch_assoc($show_day);
                    /*  */
                    $sql_hday  = "SELECT COUNT(duration) AS hday FROM worker_details WHERE `duration` IN ('half_day') AND worker_id =$worker_id";
                    $show_hday  = mysqli_query($connect,$sql_hday) or die("ERROR".mysqli_error($connect));
                    $hdays=mysqli_fetch_assoc($show_hday);
                    /* */
                    $dsalary =" SELECT `amount_daily`  AS amount_daily FROM workers WHERE `worker_id` = $worker_id;";
                    $res  = mysqli_query($connect,$dsalary) or die("ERROR".mysqli_error($connect));
                    $row1=mysqli_fetch_assoc($res);
                    /* */
                    $query1 = "SELECT sum(amount_money) AS collect  FROM `worker_details` where worker_id= $worker_id   ";
                    $show1  = mysqli_query($connect,$query1) or die("ERROR".mysqli_error($connect));
                    $row=mysqli_fetch_assoc($show1);
                    /*   */
                    $amount_daily  = $row1['amount_daily'];
                    $baqy = (($days['day'] * $amount_daily)  + ($hdays['hday'] * ($amount_daily/2))- $row["collect"]) ;
                    
        
                        
                    
                            
                            
                            
                        
                    $html.='    
                    <tr>    
                    <td colspan="3" id="for_him"  >اجمالي المسلم  = <span >'.number_format( $row["collect"]) .' </span></td>
                    <td colspan="2" >اجمالي الباقي  = <span  > '.number_format($baqy).' </span></td>
                    </tr>
    
    '

    ;
    return $html;



}
function print_build_details(){
  $id= htmlspecialchars(trim($_GET['ids']));
  $print_build_id =$id;
  $html = 
      '<tr>
        <th style="width:30px;" >-</th>
        <th>التاريخ</th>
        <th >لة</th>
        <th>علية</th>
        <th>التفاصيل</th>
        <th>الرصيـد</th>
      </tr>
        
    '; 

        global $connect;
        $query =  "SELECT details, `on_him` , `for_him` ,`date` FROM `build_details` WHERE build_id= '$print_build_id'";
        $show  = mysqli_query($connect,$query) or die("ERROR".mysqli_error($connect));
        $total = 0;
        $n=1;
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
            
    
            $html .='
                <tr>
                <td>'.$n.'</td>
                <td  >'.  $row["date"] .'  </td>
                <td  style="font-weight: 900;color:green"  > '.  $row['for_him'] .'</td>
                <td  style="font-weight: 900;color:red"  > '.  $row['on_him'] .'</td>
                <td> '.$row["details"] .' </td>
                <td>'.$style. $temp1 .' </span> </td>
                </tr>
    


    '; $n++;
            
    
        }
    
        
        }
        
        
        
    
    


    

    



        /* */
    
        $query1 = "SELECT sum(on_him) AS on_him , sum(for_him) AS for_him FROM `build_details` where build_id = $print_build_id   ";
        $show1  = mysqli_query($connect,$query1) or die("ERROR".mysqli_error($connect));
        $row=mysqli_fetch_assoc($show1);
        $baqy=$row['for_him']-$row['on_him'];
        if($baqy < 0){
        $baqy = $baqy *-1;
        $style = " <span id='total' style='font-weight: 900;color:red; ' > ع "; 
        }
        else $style = " <span id='total' style='font-weight: 900;color:green; ' > ل " ; 
    $html.='    

    <tr>    
      <td colspan="3" id="for_him"  >اجمالي المسلم  = <span >'. $row["for_him"].' ريال</span></td>
      <td colspan="2" >اجمالي الباقي  = <span  > '.$style.$baqy.'ريال </span></td>
    </tr>';

    return $html;
           
}

function print_merchant_details(){
  $id= htmlspecialchars(trim($_GET['id']));
  $html = 
      '<tr>
        <th style="width:30px;" >-</th>
        <th>التاريخ</th>
        <th >لة</th>
        <th>علية</th>
        <th>التفاصيل</th>
        <th>الرصيـد</th>
      </tr>
        
    '; 

        global $connect;
      $merchant = htmlspecialchars(trim( $_GET['ids'])) ;
      $merchant_id = $merchant;
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
          $n= 1;
            
    
            $html .='
                <tr>
                  <td>'.$n.'</td>
                  <td  >'.  $row["date"] .'  </td>
                  <td  style="font-weight: 900;color:green"  > '.  $row['for_him'] .'</td>
                  <td  style="font-weight: 900;color:red"  > '.  $row['on_him'] .'</td>
                  <td> '.$row['details'] .' </td>
                  <td>'.$style. $temp1 .' </span> </td>
                </tr>



          '; $n++;
            
    
        }
    
       
      }
        
        
        
    
    


    

    



        /* */
        $merchant_id = $merchant;
        $query1 = "SELECT sum(on_him) AS on_him , sum(for_him) AS for_him FROM `merchant_details` where merchant_id = $merchant_id   ";
          $show1  = mysqli_query($connect,$query1) or die("ERROR".mysqli_error($connect));
          $row=mysqli_fetch_assoc($show1);
          $baqy=$row['for_him']-$row['on_him'];
          if($baqy < 0){
            $baqy = $baqy *-1;
            $style = " <span id='total' style='font-weight: 900;color:red; ' > ع "; 
          }
          else $style = " <span id='total' style='font-weight: 900;color:green; ' > ل " ; 

          /*   */



        
        $html.='    

        <tr>    
          <td colspan="3" id="for_him"  > المسلم  = <span >'. $row["on_him"].' ريال</span></td>
          <td colspan="2" > الباقي  = <span  > '.$style.$baqy.'ريال </span></td>
        </tr>';

    return $html;
           
}



if(isset($_GET['type']) && isset($_GET['ids']) ){

          $print_type= htmlspecialchars($_GET['type']);
          $col_name="";
          if($print_type == "builds")$col_name="build_id";
          else if($print_type == "workers")$col_name="worker_id";
          else $col_name="merchant_id";
          global $connect;
          $get_id = htmlspecialchars($_GET['ids']);
          $print_build_ids=trim(htmlspecialchars($_GET['ids']));
          $sql_name = mysqli_query($connect,"SELECT `name` FROM $print_type WHERE $col_name='$get_id'") or die("ERROR".mysqli_error($connect));
          $name = mysqli_fetch_assoc($sql_name) ;
          $address = " اب  -  القاعدة ";
          $number = "777762583";
          $company_name ="عبدالحق اليحيوي للمقاولات العامة";
          $logo_src="logo.png";
          
          $html =
      
      $html =
          '   
          <!DOCTYPE html>
          <html lang="en" >
          <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>'.$name['name']."_".date("Y/m/d").'</title>
          </head>
        <body >
      

                  <table class="table-header" >
                  <tr style="">
                      <th style="background-color:none;color:black;font-weight:700;font-size:16px;width:180px"> جوال : <span style="color:#3e64ff ;">'.$number ."</span>  <br> العنوان : <span style='color:#3e64ff;font-size: 13px;'>" .$address.'</span></th>
                      <th style="background-color:none !important;color:black;text-align:center  ">
                        <img src="'.$logo_src.'" style="width:100px;" >
                        <h4 style="font-weight:600px;" > '.$company_name.' </h4>
                      </th >
                      <th style="background-color:white !important;color:black  "></th>
                    </tr>
                  </table>

          <h4 style="font-weight:600; font-size:16px ">كشـف حســاب / <span style="color:#3e64ff">'. $name['name'] .'</span>
      
          <div style="width:100% ;margin-top:2px; border-top:1px solid black  "></div>
      
          </h4>
          <table>

            '.$type.'

          </table>
          <div style="width:100% ;margin-top:25px; border-top:1px solid black  "></div>
      
          <footer style="margin-top:5px;">
          <div style="float:right;width:75%" > '.date("Y/m/d").' </div>
          <div style="float:right;width:25% ;font-size:12px" > Designed BY YhyawyTech  </div>
      
          </footer>
      
        </body>
          </html>
          '
      
          ;

}







$mpdf->autoScriptToLang = true;
$mpdf->autoLangToFont = true;
$css = file_get_contents('scc.css');
$mpdf->WriteHTML($css,1);

$mpdf->Output("pdf","I");

?>