<?php include_once "public/header.php" ?>

  <div class="container">
        <div class="row">
          <div class="col-2 d-sm-none"></div>
          <div class="col-2    mb-3">
            <a title='اضافة تاجر جديد' id='new_merchant_btn' style="font-family: janna lt;cursor: pointer; border:1px solid #3e64ff;width:200px; border-radius:4px;font-weight:600 ;color:#3e64ff" class='addNewBuildBtn btn bg-light mb-2 '  data-toggle='modal'  data-target='#modelmerchant' >
              اضافة تاجر جديد  
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        
        
 <!-- ----------------- Start Modal to ADD new merchant--------------- -->            

 <div class="modal fade" id="modelmerchant" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content" id="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">اضافة تاجر جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="processes.php" id="add_new_merchant_form" method="POST"   >
                            <label for="merchant_name">الاسم:</label>
                            <input type="text" class="form-control"
                              data-parsley-error-message="<span style='color:red;'>لايمكنك تركه فارغا</span>"
                               name="merchant_name" class="form-control" required placeholder="اسم التاجر "
                              id="merchant_name"
                              > 
                            <label for="merchant_phone">رقم الهاتف:</label>
                            <input type="number" name="merchant_phone" class="form-control " placeholder="ادخل رقم الهاتف" id="merchant_phone">                            
                            <label for="merchant_details">التفاصيل:</label>
                            <textarea class="form-control " name="merchant_details" rows="1" id="merchant_details"></textarea>
                            <label for="merchant_date" class="p-2">التاريخ:</label>
                            <input type="date" class='input-group date '  name="merchant_date" id="merchant_date" >
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء </button>
                              <button type="submit" class="btn btn-primary" name=" add_new_merchant_btn">اضافة</button>
                          </div>   

                      </div>
                </form>

              </div>
            </div>
          </div>
          <!-- ----------------- End modal to ADD new merchant--------------- --> 

 <!-- ----------------- Start Modal to edit merchant data--------------- -->            


          
 <div class="modal fade" id="model_edit_merchant" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">تعديل بيانات التاجر</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="processes.php"  method="POST" id="edit_new_merchant_form">
                            <input type="hidden" name="update_merchant_id" id="update_merchant_id">
                              <label for="edit_merchant_name">الاسم:</label>
                              <input type="text" name="edit_merchant_name" required
                                data-parsley-error-message="<span style='color:red;'>لايمكنك تركه فارغا</span>"
                                class="form-control" placeholder="ادخل اسم صاحب المبنى" id="edit_merchant_name"
                              >
                         
                            <label for="edit_merchant_phone">رقم الهاتف:</label>
                            <input type="number" name="edit_merchant_phone" class="form-control " placeholder="ادخل رقم الهاتف" id="edit_merchant_phone">
                            <label for="edit_merchant_details">التفاصيل:</label>
                            <textarea class="form-control" name="edit_merchant_details" rows="1" id="edit_merchant_details"></textarea>
                            <label for="edit_merchant_date" class="p-2">التاريخ:</label>
                            <input type="date" class='input-group date ' name="edit_merchant_date" id="edit_merchant_date" >
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء </button>
                                <button type="submit" class="btn btn-primary" name="sure_edit_merchant_btn">تعديل</button>
                            </div>   

                    </form>
                </div>
              </div>
            </div>
          </div>
          <!-- ----------------- End modal to edit merchants data--------------- --> 


        
    <div class="table-responsive-sm">
      <table id="show_merchants" class="table  table-responsive-md  " style="width: 100%;" >
        <thead>
            <tr>
                <th style="display:none"> </th>
                <th style="width:10px"> </th>
                <th>الاسم</th>
                <th>الهاتف</th>
                <th>التفاصيل </th>
                <th>التاريخ </th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>


          <?php
            show_merchants();
          ?>

      
         
         

      
        
          <!-- ----------------- Start modal to Delete merchant--------------- --> 
          <div class="modal fade" id="delete_merchant_modal" class="delete_merchant_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">اشعار حذف </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <h4 > هل انت متاكد من حذف  
                      { <span id="delete_merchant"></span> }
                  
                  </h4>
                  <form action="processes.php" method="POST">
                    <input type="hidden" name="delete_merchant_id" id="delete_merchant_id">
                    <div class="modal-footer">
                  <button type="button" class="btn btn-secondary"  data-dismiss="modal">الغاء</button>
                  <button type="submit" class="btn btn-danger" name="sure_deleteMerchant_btn">نعم </button>
                </div>
                  </form>
                  
                </div>
                
              </div>
            </div>
          </div>

          <!-- ----------------- End modal to Delete worker--------------- --> 

        </tbody>
        
      </table>
    </div>
  </div>

  </div>
  </div>
    


   


 

    




  <?php include_once "public/footer.php"; ?>

  <script>

    /* */
    $(document).ready(function(){
      $('#add_new_merchant_form').parsley();
      $('#edit_new_merchant_form').parsley();
        $('#new_merchant_btn').on('click',function(){
          $('#modelmerchant').modal('show')
         /* Start insert current date to the input */
          var d = new Date();
          var month = d.getMonth()+1;
          var day = d.getDate();
          var output = d.getFullYear() + '-' +
              (month<10 ? '0' : '') + month + '-' +
              (day<10 ? '0' : '') + day;
          $('#merchant_date').val(output.trim());
          /* End insert current date to the input */

        });
          
        $('.edit_merchant_btn ').on('click',function(){
          $('#model_edit_merchant').modal('show');
          $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();
            console.log(data);
            $('#update_merchant_id').val(data[0].trim());
            $('#edit_merchant_name').val(data[2].trim());
            $('#edit_merchant_phone').val(data[3].trim());
            $('#edit_merchant_details').val(data[4].trim());
            $('#edit_merchant_date').val(data[5].trim());


        });  
        $('.delete_merchant_btn ').on('click',function(){
          $('#delete_merchant_modal').modal('show');
          $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();
            console.log(data);
            $('#delete_merchant').text(data[2].trim())
            $('#delete_merchant_id').val(data[0].trim());
        });


    });

    $(document).ready(function() {
      $('#show_merchants').DataTable();
  } );  

	















  </script>

  
</body>
</html>
