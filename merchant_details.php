<?php include "public/header.php" ?>


  <div class="container" style="font-family: janna lt;">

  <div class="row">
          <div class="col-2 d-sm-none"></div>
          <div class="col-2   ">
            <a title=' اضافة تفاصيل جديدة ' id='new_merchant_details_btn' style="font-family: janna lt;cursor: pointer; border:1px solid #3e64ff;width:200px; border-radius:4px;font-weight:600 ;color:#3e64ff" class=' btn bg-light mb-2 '  data-toggle='modal'  data-target='#modelMerchantDetails' >
            اضافة تفاصيل جديدة  
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
          </div>
        </div>



          
    <h4 class="mt-4" style="font-family: janna lt; font-weight: 600;">تفاصيل حساب التاجر : 
        <?php
        if(isset($_GET['id']))
        {
          $id=htmlspecialchars(trim($_GET['id']));
          $show_name=mysqli_query($connect,"SELECT `name` FROM `merchants` WHERE merchant_id = '$id'") or die(header("location:builds.php")."ERROR".mysqli_error($connect));
          $row = mysqli_fetch_assoc($show_name);
          echo htmlspecialchars( $row['name']);
        }
        
        ?>

        <a href="pdf.php?type=merchants&ids=<?php echo htmlspecialchars(trim($_GET['id'])) ?>" target="_blank" style="font-size: 15px;"> طباعة <i  class="fa fa-print ml-2 " aria-hidden="true"></i></a>

    </h4>

    <div class="bg-primary mb-4" style="width: 300px;height: 1px;" > - </div>

<!-- ----------------- Start Modal to insert new data--------------- -->            

<div class="modal fade" id="modelMerchantDetails" tabindex="-1" role="dialog" aria-labelledby="modal_edit_merchant_details" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">اضافة تفاصيل جديدة   </h5>
                  <div class="bg-primary text-light" id="success" style="display:none">تم الاضافة <i class="fa fa-check-circle" aria-hidden="true"></i></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="validate" data-parsley-validate=""	>
                  <input type="hidden" name="merchant_id" value="<?php echo htmlspecialchars($_GET['id']) ?>">
                  <label for="money">المبلغ المسلم:</label>
                  <input type="number" name="merchant_amount_deliverd" class="form-control" 
                  data-parsley-type="integer"  data-parsley-pattern = "^[0-9]\d*(\.\d+)?$" data-parsley-error-message="<span class='text-danger'>ادخل المبلغ بشكل صحيح</span>"
                  placeholder="ادخل المبلغ المسلم" id="merchant_amount_deliverd" required>
                  
                    
                      <div class="form-check-inline  mt-2 p-1" id="radioCheck">
                        <label class="form-check-label text-primary font-weight-bold"  style="cursor: pointer;">
                          لـــة  
                          <input type="radio" class="form-check-input m-1 " id="fhim" name="type_amount_deliverd"    value="for_him" >
                        </label>
                       
                        <label class="form-check-label text-danger font-weight-bold  m-2"  style="cursor: pointer;">
                          علـيـة  
                          <input type="radio"  class="form-check-input m-1 " id="ohim"  name="type_amount_deliverd"   value="on_him" >
                        </label>
                       <small id="faild" class="text-dark"></small>
                    </div>
                    <input type="hidden" name="add_new_merchant_details">
                    <label for="details" class="ml-2 d-block">التفاصيل:</label>
                    <textarea class="form-control  m-2"   name="merchant_detalis_details" placeholder="التفاصيل" rows="1" id="details"></textarea>
                  <label for="date" class="ml-2">التاريخ:</label>
                  <input type="date" name="merchant_detalis_date" style="direction: rtl;"  class="input-group date" id="merchant_details_date" >
                <div class="modal-footer rtl">
                  <input type="hidden" id="finish" value="0">
                <input type="submit" value="اضافة" class="btn btn-primary mr-3 " id="addNewDetails" name="add_new_merchant_details">
                <button  type="submit"  class="btn btn-info  mr-3 "  id="saveNewDetails" name="">حفظ </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء </button>
                </div>
                </form>
                </div>

              </div>
            </div>
          </div>
          <!-- ----------------- End modal to insert new data--------------- --> 


<!-- ----------------- Start Modal to update data--------------- -->            

<div class="modal fade" id="modal_edit_merchant_details" tabindex="-1" role="dialog" aria-labelledby="modal_edit_merchant_details" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">تعديل تفاصيل من حساب التاجر </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form action="processes.php"  method="POST" id="validate2" >
                        <input type="hidden" name="merchant_id" value="<?php echo htmlspecialchars($_GET['id'])  ?>">
                        <input type="hidden" name="edit_merchant_details_id" id="edit_merchant_details_id">                
                        <label for="money">المبلغ المسلم:</label>
                        <input type="number" name="edit_amount_deliverd"  class="form-control"
                         placeholder="ادخل المبلغ المسلم" id="edit_amount_deliverd"
                         data-parsley-type="integer " data-parsley-pattern = "^[0-9]\d*(\.\d+)?$"  data-parsley-error-message="<span class='text-danger'>ادخل المبلغ بشكل صحيح</span> " required>
                        <div class="form-check-inline  mt-2 " style="font-size: 15px;">
                          <label class="form-check-label text-primary  font-weight-bold"  style="cursor: pointer;">
                            لـــة  <input type="radio"  class="form-check-input m-1"  id="for_him" name="type_amount_deliverd" value="for_him" required>
                          </label>
                          <label class="form-check-label text-danger font-weight-bold  m-2" style="cursor: pointer;">
                            علـيـة <input type="radio" class="form-check-input m-1" id="on_him" name="type_amount_deliverd" value="on_him"  >
                          </label>
                        </div>
                        <label for="details" class="ml-2 d-block">التفاصيل:</label>
                        <textarea class="form-control m-2" name="edit_merchant_details" rows="1" id="edit_merchant_details"></textarea>
                        <label for="date" class="ml-2">التاريخ:</label>
                        <input type="date" class="input-group date formata" id="edit_merchant_date" name="edit_merchant_date" required>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء </button>
                              <button type="submit" class="btn btn-primary mr-3 " id="sure_edit_merchant_details" name="sure_edit_merchant_details">تعديل</button>
                        </div>   

                      
                  </form>
                </div>

              </div>
            </div>
          </div>
          <!-- ----------------- End modal to update data--------------- --> 



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
        <tbody id="merchantBody">


          <?php 
          show_merchant_details();
           ?>
            
        </tbody>
          
        

          <!-- ----------------- Start modal to Delete merchant details--------------- --> 
          <div class="modal fade" id="delete_merchant_details_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                    <input type="hidden" name="merchant_id" value="<?php echo htmlspecialchars($_GET['id']) ?>">  
                    <input type="hidden" name="delete_details_id" id="delete_details_id" >
                    <div class="modal-footer">
                  <button type="button" class="btn btn-secondary"  data-dismiss="modal">الغاء</button>
                  <button type="submit" class="btn btn-danger" name="sure_delete_merchant_details_btn">نعم </button>
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
          $merchant_id = htmlspecialchars( $_GET['id']);
          /* */
         
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
         

                
            echo"
                  
                  <td class='bg-white' >اجمالي المسلم  = <span class='text-success  '  style='font-weight: 900; ' id='collection'>". $row['on_him']." ريال </span></td>
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
    
  $("#saveNewDetails").click(function()
  {
    if(( $('#validate').parsley().isValid() ) && (($('#fhim').is(':checked')) || ($('#ohim').is(':checked') )) ){
      $("#finish").attr("value","1")
    }
  })
  $('#validate2').parsley();
  $('#validate').parsley();
  
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
      $('#merchant_details_date').val(output.trim());
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
          $('#new_merchant_details_btn ').on('click',function(){
            $('#modelMerchantDetails').modal('show');
          /* Start insert current date to the input */
          var d = new Date();
          var month = d.getMonth()+1;
          var day = d.getDate();
          var output = d.getFullYear() + '-' +
              (month<10 ? '0' : '') + month + '-' +
              (day<10 ? '0' : '') + day;
          $('#merchant_details_date').val(output.trim());
          /* End insert current date to the input */
          });

        $('.edit_merchant_details_btn ').on('click',function(){
          $('#modal_edit_merchant_details').modal('show');
          $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
              return $(this).text();
            
            }).get();
            var check_type = (data[3]!= 0)? "on_him":"for_him"; 
            $("#"+check_type+"").attr('checked', true ); 
            console.log(data);
            console.log(check_type );
            $('#edit_merchant_details_id').val( data[0].trim());
            $('#edit_merchant_details').val(data[4].trim());
            $('#edit_merchant_date').val(data[1].trim());
            $('#edit_amount_deliverd').val(Number(data[2]) + Number(data[3]));/* هنا حولنا من سترينج الى نص  */

        });  
        /*  */
        $('.delete_merchant_details_btn ').on('click',function(){
        $('#delete_merchant_details_modal').modal('show');
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