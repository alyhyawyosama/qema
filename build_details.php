<?php

use Mpdf\Tag\Tr;

include "public/header.php" ?>


  <div class="container" style="font-family: janna lt;">

        <div class="col-2 d-sm-none"></div>
          <div class="col-2    mb-3">
            <a title='اضافة عامل جديد' id='new_build_details_btn'  style="font-family: janna lt;cursor: pointer; border:1px solid #3e64ff;width:200px; border-radius:4px;font-weight:600 ;color:#3e64ff" class='addNewWorkerBtn btn bg-light mb-2 ' data-toggle='modal'  data-target='#modal_add_build_details' >
              اضافة تفاصيل جديدة  
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
          </div>
        </div>
   
              

          
    <h4 class="mt-4" style="font-family: janna lt; font-weight: 600;">تفاصيل عمارة 
        <?php
        if(isset($_GET['id']))
        {
          $id=check_input(trim($_GET['id']));
          $show_name=mysqli_query($connect,"SELECT `name` FROM `builds` WHERE build_id = '$id'") or die(header("location:builds.php")."ERROR".mysqli_error($connect));
          $row = mysqli_fetch_assoc($show_name);
          echo htmlspecialchars( $row['name']);
        }
        
        ?>
            <a href="pdf.php?type=builds&ids=<?php echo check_input(trim($_GET['id'])) ?> " target="_blank" style="font-size: 15px;"> طباعة <i  class="fa fa-print ml-2 " aria-hidden="true"></i></a>


    </h4>

    <div class="bg-primary mb-4" style="width: 300px;height: 1px;" > - </div>


 <!-- ----------------- Start Modal to update data--------------- -->            

 <div class="modal fade" id="modal_edit_build_details" tabindex="-1" role="dialog" aria-labelledby="modal_build_worker_details" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">تعديل تفاصيل من حساب العماره </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form action="processes.php"  method="POST" id="validate2" >
                        <input type="hidden" name="build_id" value="<?php echo check_input($_GET['id'])  ?>">
                        <input type="hidden" name="edit_build_details_id" id="edit_build_details_id">                
                        <label for="money">المبلغ المسلم:</label>
                        <input type="number" name="edit_amount_deliverd"  class="form-control"
                        data-parsley-type="integer"
                        data-parsley-pattern = "^[0-9]\d*(\.\d+)?$"
                        data-parsley-error-message="<span class='text-danger'>ادخل المبلغ بشكل صحيح</span>"   required 
                        placeholder="ادخل المبلغ المسلم" id="edit_amount_deliverd" 
                        >
                        <div class="form-check-inline  mt-2 " style="font-size: 15px;">
                          <label class="form-check-label text-primary  font-weight-bold"  style="cursor: pointer;">
                            لـــة  <input type="radio"  class="form-check-input m-1"  id="for_him" name="type_amount_deliverd" value="for_him" required>
                          </label>
                          <label class="form-check-label text-danger font-weight-bold  m-2" style="cursor: pointer;">
                            علـيـة <input type="radio" class="form-check-input m-1" id="on_him" name="type_amount_deliverd" value="on_him"  >
                          </label>
                        </div>
                        <label for="details" class="ml-2 d-block">التفاصيل:</label>
                        <textarea class="form-control m-2" name="edit_details" rows="1" id="edit_details"></textarea>
                        <label for="date" class="ml-2">التاريخ:</label>
                        <input type="date" class="input-group date formata" id="edit_date" name="edit_date" required>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء </button>
                              <button type="submit" class="btn btn-primary mr-3 " id="sure_edit_build_details" name="sure_edit_build_details">تعديل</button>
                        </div>   

                      
                  </form>
                </div>

              </div>
            </div>
          </div>
          <!-- ----------------- End modal to update data--------------- --> 




           <!-- ----------------- Start Modal to insert data--------------- -->            

           <div class="modal fade" id="modal_add_build_details" tabindex="-1" role="dialog" aria-labelledby="modal_add_build_details" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">  اضافة تفاصيل جديدة </h5>
                  <div class="bg-primary text-light" id="success" style="display:none">تم الاضافة <i class="fa fa-check-circle" aria-hidden="true"></i></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form action="processes.php"  method="POST" id="validate" >

                        <input type="hidden" name="build_id" value="<?php echo check_input($_GET['id'])  ?>">
                        <input type="hidden" name="edit_build_details_id" id="edit_build_details_id">                
                        <label for="money">المبلغ المسلم:</label>
                        <input type="number" name="build_amount_deliverd" class="form-control" 
                        data-parsley-type="integer"
                        data-parsley-pattern = "^[0-9]\d*(\.\d+)?$"
                        data-parsley-error-message="<span class='text-danger'>ادخل المبلغ بشكل صحيح</span>"    
                        required
                        placeholder="ادخل المبلغ المسلم" id="build_amount_deliverd" required>
                        <div class="form-check-inline  mt-2 " id="radioCheck" style="font-size: 15px;">
                          <label class="form-check-label text-primary font-weight-bold  "  style="cursor: pointer;">
                            لـــة  <input type="radio"  class="form-check-input m-1 " id="fhim"  name="type_amount_deliverd" value="for_him" >
                          </label>
                          <label class="form-check-label text-danger font-weight-bold  m-2" style="cursor: pointer;">
                            علـيـة <input type="radio" class="form-check-input m-1 " id="ohim" name="type_amount_deliverd"  value="on_him"  >
                          </label>
                          <small id="faild" class="text-dark"></small>
                        </div>
                        <textarea class="form-control  m-2" name="details" placeholder="التفاصيل" rows="1" id="details"></textarea>
                        <label for="date" class="ml-2">التاريخ:</label>
                        <input type="date" name="date"   class="input-group date" id="bdate" required>
                        <input type="hidden" id="finish" value="0">
                        <input type="hidden" name="add_new_build_details">
                        <div class="modal-footer">
                              <button type="submit" class="btn btn-primary mr-3 " id="add_new_build_details" name=" add_new_build_details">اضافه</button>
                              <button type="submit" class="btn btn-info mr-3 " id="saveNewDetails">حفظ</button>

                              <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء </button>

                            </div>   

                      
                  </form>
                </div>

              </div>
            </div>
          </div>
          <!-- ----------------- End modal to insert data--------------- --> 




      <table id="show_worker_details" class="table  table-responsive-md  " style="width: 100%;" >
        <thead>
          <tr>
            <th class="d-none" ></th>
            <th>التاريخ</th>
            <th>له</th>
            <th>علية</th>
            <th>التفاصيل</th>
            <th>الرصيد</th>
            <th>-</th>
          </tr>
        </thead>
        <tbody>


          <?php show_build_details(); ?>
            
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
                    <input type="hidden" name="build_id" value="<?php echo check_input($_GET['id']) ?>">  
                    <input type="hidden" name="delete_details_id" id="delete_details_id" >
                    <div class="modal-footer">
                  <button type="button" class="btn btn-secondary"  data-dismiss="modal">الغاء</button>
                  <button type="submit" class="btn btn-danger" name="sure_delete_build_details_btn">نعم </button>
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
          $build_id = check_input( $_GET['id']);
          /* */
         
          $query1 = "SELECT sum(on_him) AS on_him , sum(for_him) AS for_him FROM `build_details` where build_id = $build_id   ";
          $show1  = mysqli_query($connect,$query1) or die("ERROR".mysqli_error($connect));
          $row=mysqli_fetch_assoc($show1);
          $baqy=$row['for_him']-$row['on_him'];
          if($baqy < 0){
            $baqy = $baqy *-1;
            $style = " <span id='total' style='font-weight: 900;color:red; ' > ع "; 
          }
          else $style = " <span id='total' style='font-weight: 900;color:green; ' > ل " ; 

          /*   */
         

                
            echo"
                  
                  <td class='bg-white' >اجمالي المسلم  = <span class='text-success  '  style='font-weight: 900; ' id='collection'>". $row['for_him']." ريال </span></td>
                  <td class='bg-white' >اجمالي الباقي  = $style ".$baqy." ريال </span></td>
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

    $('#validate2').parsley();
  $('#validate').parsley();
 
    
  $("#saveNewDetails").click(function()
  {
    if(( $('#validate').parsley().isValid() ) && (($('#fhim').is(':checked')) || ($('#ohim').is(':checked') )) ){
      $("#finish").attr("value","1")
    }
  })
  
  $('#validate').on("submit",function(event){
  event.preventDefault();

  if($('#validate').parsley().isValid())
  {
    if(($('#fhim').is(':checked')) || ($('#ohim').is(':checked') )){
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
      $('#bdate').val(output.trim());
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
  else{ 
    $('#radioCheck').attr("style","background-color:#dc35452e!important;width: 100%;border-radius: 3px;height: 35px;");
      $('#faild').text("لايمكنك تركه بشكل فارغ");
    setTimeout(function() {
      $('#radioCheck').attr("style","");
      $('#faild').text('');
      }, 3000); 
     
  }
    }
 });




        $('.edit_build_details_btn ').on('click',function(){
          $('#modal_edit_build_details').modal('show');
          $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
              return $(this).text();
            
            }).get();
            var check_type = (data[3]!= 0)? "on_him":"for_him"; 
            $("#"+check_type+"").attr('checked', true ); 
            console.log(data);
            console.log(check_type );
            $('#edit_build_details_id').val( data[0].trim());
            $('#edit_details').val(data[4].trim());
            $('#edit_date').val(data[1].trim());
            $('#edit_amount_deliverd').val(Number(data[2]) + Number(data[3]));/* هنا حولنا من سترينج الى نص  */

        });  
        /*  */
        $('#new_build_details_btn').on('click', function () {
          $('#modal_add_build_details').modal('show');
          /* Start insert current date to the input */
      var d = new Date();
      var month = d.getMonth()+1;
      var day = d.getDate();
      var output = d.getFullYear() + '-' +
          (month<10 ? '0' : '') + month + '-' +
          (day<10 ? '0' : '') + day;
      $('#bdate').val(output.trim());
      /* End insert current date to the input */

        });
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