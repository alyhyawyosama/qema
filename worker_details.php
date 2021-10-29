<?php include "public/header.php" ?>


  <div class="container" style="font-family: janna lt;">

 
    <div class="row">
          <div class="col-2 d-sm-none"></div>
          <div class="col-2    mb-3">
            <a title='اضافة عامل جديد' id='new_worker_details_btn'  style="font-family: janna lt;cursor: pointer; border:1px solid #3e64ff;width:200px; border-radius:4px;font-weight:600 ;color:#3e64ff" class='addNewWorkerBtn btn bg-light mb-2 ' data-toggle='modal'  data-target='#modal_add_worker_details' >
              اضافة تفاصيل جديدة  
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
          </div>
        </div>

              

          
    <h4 class="mt-2" style="font-family: janna lt; font-weight: 600;">تفاصيل حساب 
        <?php
        if(isset($_GET['id']))
        {
          $id=htmlspecialchars($_GET['id']);
          $show_name=mysqli_query($connect,"SELECT name FROM `workers` WHERE worker_id = $id") or die(header("location:workers.php")."ERROR".mysqli_error($connect));}
          $row = mysqli_fetch_assoc($show_name);
          echo htmlspecialchars( $row['name']);
        ?>
        <a href="pdf.php?type=workers&ids=<?php echo trim(htmlspecialchars($_GET['id'])) ?>" target="_blank" style="font-size: 15px;"> طباعة <i  class="fa fa-print ml-2 " aria-hidden="true"></i></a>
    </h4>

    <div class="bg-primary mb-4" style="width: 300px;height: 1px;" > - </div>


     
        <!-- ----------------- Start Modal to update data--------------- -->            

        <div class="modal fade" id="modal_edit_worker_details" tabindex="-1" role="dialog" aria-labelledby="modal_edit_worker_details" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">تعديل تفاصيل العامل</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="processes.php" id="validate2"  method="POST">
                    <input type="hidden" name="worker_id" value="<?php echo htmlspecialchars($_GET['id'])  ?>">
                        <input type="hidden" name="edit_details_id" id="edit_details_id">                
                        <label for="money">المبلغ المسلم:</label>
                        <input type="number" name="edit_amount_deliverd" class="form-control"
                        data-parsley-type="integer"
                        data-parsley-pattern = "^[0-9]\d*(\.\d+)?$"
                        data-parsley-error-message="<span class='text-danger'>ادخل المبلغ بشكل صحيح</span>"    
                        required
                        placeholder="ادخل المبلغ المسلم" id="edit_amount_deliverd">
                        <label for="duration" class="ml-up2"> المدة: </label>
                        <select class="form-control" name="edit_duration" id="edit_duration"
                        data-parsley-error-message="<span class='text-danger'>لايمكنك تركه فارغا</span>"                
                        required>
                            <option value="nWork">لم يشتغل</option>
                            <option value="day"> يوم </option>
                            <option value="half_day" >نص </option>
                        </select>
                        <label for="details" class="ml-2">التفاصيل:</label>
                        <textarea class="form-control m-2" name="edit_details" rows="1" id="edit_details"></textarea>
                        <label for="date" class="ml-2">التاريخ:</label>
                        <input type="date" class="input-group date" name="edit_date" id="edit_date">
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء </button>
                              <button type="submit" class="btn btn-primary mr-3 " id="sure_edit_worker_details" name="sure_edit_worker_details">تعديل</button>
                          </div>   

                      </div>
                </form>

              </div>
            </div>
          </div>
          <!-- ----------------- End modal to update data--------------- --> 


           
          <!-- ----------------- Sart modal to insert new data--------------- --> 

        <div class="modal fade" id="modal_add_worker_details" tabindex="-1" role="dialog" aria-labelledby="modal_add_worker_details" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">اضافة تفاصيل جديدة</h5>
                  <div class="bg-primary text-light" id="success" style="display:none">تم الاضافة <i class="fa fa-check-circle" aria-hidden="true"></i></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="processes.php" id="validate" method="POST">
                      <input type="hidden" name="worker_id" value="<?php echo htmlspecialchars($_GET['id'])  ?>">
                      <label for="money">المبلغ المسلم:</label>
                      <input type="number"  name="amount_deliverd" class="form-control" placeholder="ادخل المبلغ المسلم"
                      data-parsley-type="integer"
                      data-parsley-pattern = "^[0-9]\d*(\.\d+)?$"
                      data-parsley-error-message="<span class='text-danger'>ادخل المبلغ بشكل صحيح</span>"    
            
                      id="amount_deliverd" required>
                      <label for="duration" class="ml-up2"> المدة: </label>
                      <select class="form-control" name="duration" id="duration" required                       
                        data-parsley-error-message="<span class='text-danger'>لايمكنك تركه فارغا</span>"                
                      >
                        <option value="" > - </option>
                        <option value="nWork">لم يشتغل</option>
                        <option value="day"> يوم </option>
                        <option value="half_day" >نص </option>
                      </select>
                      <label for="details" class="ml-2">التفاصيل:</label>
                      <textarea class="form-control m-2" name="details" rows="1" id="details"></textarea>
                      <label for="date" class="ml-2">التاريخ:</label>
                      <input type="date" class="input-group date"type="date" name="date" id="wDetailsDate">
                      <input type="hidden" name="add_new_details">
                      <input type="hidden" id="finish" value="0">
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary mr-3 " id="submit" name="add_new_details">اضافه</button>
                          <button  type="submit"  class="btn btn-info  mr-3 "  id="saveNewDetails" name="">حفظ </button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء </button>
                      </div>   

                      
                    </form>
                </div>
              </div>
            </div>
          </div>
          <!-- ----------------- End modal to insert new data--------------- --> 




      <table id="show_worker_details" class="table  table-responsive-md  " style="width: 100%;" >
        <thead>
          <tr>
            <th class="d-none" > </th>
            <th style = 'width:17px' >-</th>
            <th style='width:30;' >المسلم</th>
            <th style='width:30px;' >الباقي</th>
            <th>المده</th>
            <th>التفاصيل</th>
            <th>التاريخ</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>


          <?php show_worker_details(); ?>
            
        </tbody>
         

          <!-- ----------------- Start modal to Delete worker details--------------- --> 
          <div class="modal fade" id="modal_delete_worker_details" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">اشعار حذف </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <h4 > هل انت متاكد من الحذف  
                  </h4>
                  <form action="processes.php" method="POST">
                    <input type="hidden" name="worker_id" value="<?php echo htmlspecialchars($_GET['id']) ?>">  
                    <input type="hidden" name="delete_details_id" id="delete_details_id" >
                    <div class="modal-footer">
                  <button type="button" class="btn btn-secondary"  data-dismiss="modal">الغاء</button>
                  <button type="submit" class="btn btn-danger" name="sure_delete_worker_details_btn">نعم </button>
                </div>
                  </form>
                  
                </div>
                
              </div>
            </div>
          </div>

            <!-- ----------------- End modal to Delete worker details--------------- --> 
      </table>
      <?php 
        if (isset($_GET['id'])) {
          $worker_id = htmlspecialchars( $_GET['id']);
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
          $query1 = "SELECT sum(amount_money) AS collect FROM `worker_details` where worker_id= $worker_id   ";
          $show1  = mysqli_query($connect,$query1) or die("ERROR".mysqli_error($connect));
          $row=mysqli_fetch_assoc($show1);
          /*   */
          $amount_daily  = $row1['amount_daily'];
          $baqy = ($days['day'] * $amount_daily)  + ($hdays['hday'] * ($amount_daily/2)) -$row['collect'];
          

                
            echo"
                  
                  <td class='bg-white' >اجمالي المسلم  = <span class='text-success ' id='collection'>".number_format( $row['collect'])." </span></td>
                  <td class='bg-white' >اجمالي الباقي  = <span class='text-danger ' id='collection'> ".number_format($baqy)." </span></td>
                  ";
              }
                
          ?>

  </div>

  </div>
  </div>

        



<?php
include "public/footer.php";
?>
<script>

  $(document).ready(function(){

    $("#saveNewDetails").click(function()
      {
      if($('#validate').parsley().isValid())
        {
          $("#finish").attr("value","1")
        }
      });


    $('#validate').parsley();
    $('#validate2').parsley();
          

    $('#validate').on("submit",function(event){
  event.preventDefault();
  $('#validate').parsley();

  if($('#validate').parsley().isValid())
  {
    $.ajax({
    url:"processes.php",
    method:"POST",
    data:$("#validate").serialize(),
    dataType:"text",
    beforeSend:function(){
     $('#submit').attr('disabled','disabled');
     $('#submit').val('جاري الاضافة ...');
    }    ,
    success:function(data)
    {
      if( $('#finish').attr('value') == '1')location.reload();
     $('#validate')[0].reset();
     $('#validate').parsley().reset();
      /* Start insert current date to the input */
      var d = new Date();
      var month = d.getMonth()+1;
      var day = d.getDate();
      var output = d.getFullYear() + '-' +
          (month<10 ? '0' : '') + month + '-' +
          (day<10 ? '0' : '') + day;
      $('#wDetailsDate').val(output.trim());
      /* End insert current date to the input */
     $('#submit').attr('disabled',false);
     
     $('#submit').val('اضافة');
     $('#success').attr('style',"border-radius:2px ;  width: 150px; height: 30px;text-align:center;font-size:17px ;");
setTimeout(function() {
    $('#success').fadeOut('fast');
}, 3000); 
  

    }
   });
  
    }
 });

        $('#new_worker_details_btn').on('click', function () {
          $('#modal_add_worker_details').modal('show');
          /* Start insert current date to the input */
          var d = new Date();
          var month = d.getMonth()+1;
          var day = d.getDate();
          var output = d.getFullYear() + '-' +
              (month<10 ? '0' : '') + month + '-' +
              (day<10 ? '0' : '') + day;
          $('#wDetailsDate').val(output.trim());
          /* End insert current date to the input */
        });
        $('.edit_worker_details_btn ').on('click',function(){
          $('#modal_edit_worker_details').modal('show');
          $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();
            console.log(data);
            $('#edit_details_id').val( data[0].trim());
            $('#edit_amount_deliverd').val(Number(data[2]));
            $('#edit_duration').val((data[4].trim()).replace("يوم","day").replace("لم يشتغل","nWork").replace("نص","half_day"));
            $('#edit_details').val(data[5].trim());
            $('#edit_date').val(data[6].trim());

            
        });  
        /*  */
        $('.delete_worker_details_btn ').on('click',function(){
        $('#modal_delete_worker_details').modal('show');
        $tr = $(this).closest('tr');
          var data = $tr.children('td').map(function(){
            return $(this).text();
          }).get();
          console.log(data);
          $('#delete_details_id').val(data[0].trim());
        });


    });




  $(document).ready(function() {
      $('#show_worker_details').DataTable();
  } );  


</script>


  
</body>
</html>