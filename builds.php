<?php include_once "public/header.php" ?>

    
  <div class="container">
        <div class="row">
          <div class="col-2 d-sm-none"></div>
          <div class="col-2    mb-3">
            <a title='اضافة مبنى جديد' id='new_builds_btn'  style="font-family: janna lt;cursor: pointer; border:1px solid #3e64ff;width:200px; border-radius:4px;font-weight:600 ;color:#3e64ff" class='addNewBuildBtn btn bg-light mb-2 ' data-toggle='modal' name='addNewBuildBtn' data-target='#addNewBuildBtn' >
              اضافة مبنى جديد  
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        
        
        <!-- ----------------- Start Modal to edit build data--------------- -->            


          
        <div class="modal fade" id="model_edit_build" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">تعديل بيانات المبنى</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="processes.php" id="data_validation2" method="POST">
                            <input type="hidden" name="update_build_id" id="update_build_id">
                            <label for="edit_build_name">الاسم:</label>
                            <input type="text" name="edit_build_name" class="form-control" required
                            data-parsley-error-message="<span class='text-danger'>لايمكنك تركه فارغا</span>" placeholder="ادخل اسم صاحب المبنى" id="edit_build_name">
                            <label for="edit_build_phone">رقم الهاتف:</label>
                            <input type="phone" name="edit_build_phone" class="form-control " placeholder="ادخل رقم الهاتف" id="edit_build_phone">
                            <label for="edit_build_details">التفاصيل:</label>
                            <textarea class="form-control" name="edit_build_details" rows="1" id="edit_build_details"></textarea>
                            <label for="edit_build_date" class="p-2">التاريخ:</label>
                            <input type="date" class='input-group date ' name="edit_build_date" id="edit_build_date" >
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء </button>
                                <button type="submit" class="btn btn-primary" name="sure_edit_build_btn">تعديل</button>
                            </div>   

                    </form>
                </div>
              </div>
            </div>
          </div>
          <!-- ----------------- End modal to edit users data--------------- --> 

          <!-- ----------------- Start Modal to ADD new builds--------------- -->            

          <div class="modal fade" id="modelbuild" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">اضافة مبنى جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="data_validation" action="processes.php"  method="POST">

                            <label for="bname">الاسم:</label>
                            <input type="text" name="bname" required 
                            data-parsley-error-message="<span class='text-danger'>لايمكنك تركه فارغا</span>"  class="form-control"
                             placeholder="ادخل اسم صاحب المبنى" id="bname">
                            <label for="bphone">رقم الهاتف:</label>
                            <input type="phone" name="bphone" class="form-control " placeholder="ادخل رقم الهاتف" id="bphone">
                            <label for="bdetails">التفاصيل:</label>
                            <textarea class="form-control " name="bdetails" rows="1" id="bdetails"></textarea>
                            <label for="bdate" class="p-2">التاريخ:</label>
                            <input type="date" class='input-group date ' name="bdate" id="bdate" >
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء </button>
                              <button type="submit" class="btn btn-primary" name=" add_new_build_btn">اضافة</button>
                          </div>   

                      </div>
                </form>

              </div>
            </div>
          </div>
          <!-- ----------------- End modal to ADD new build--------------- --> 


    <div class="table-responsive-sm">
      <table id="show_builds" class="table  table-responsive-md  " style="width: 100%;" >
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
            show_builds();
          ?>

      
          


      
        
          <!-- ----------------- Start modal to Delete build--------------- --> 
          <div class="modal fade" id="delete_build_btn" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                      { <span id="delete_build"></span> }
                  
                  </h4>
                  <form action="processes.php" method="POST">
                    <input type="hidden" name="delete_build_id" id="delete_build_id">
                    <div class="modal-footer">
                  <button type="button" class="btn btn-secondary"  data-dismiss="modal">الغاء</button>
                  <button type="submit" class="btn btn-danger" name="sure_deleteBuild_btn">نعم </button>
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
  <script src="js/parsley.js"></script>

  <script>
    
    /* */
    $(document).ready(function(){
      $('#data_validation').parsley();
      $('#data_validation2').parsley();

        $('#new_builds_btn').on('click',function(){
          $('#modelbuild').modal('show')});
           /* Start insert current date to the input */
           var d = new Date();
          var month = d.getMonth()+1;
          var day = d.getDate();
          var output = d.getFullYear() + '-' +
              (month<10 ? '0' : '') + month + '-' +
              (day<10 ? '0' : '') + day;
          $('#bdate').val(output.trim());
          /* End insert current date to the input */
        $('.edit_build_btn ').on('click',function(){
          $('#model_edit_build').modal('show');
          $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();
            console.log(data);
            $('#update_build_id').val(data[0].trim());
            $('#edit_build_name').val(data[2].trim());
            $('#edit_build_phone').val(data[3].trim());
            $('#edit_build_details').val(data[4].trim());
            $('#edit_build_date').val(data[5].trim());


        });  
        $('.delete_build_btn ').on('click',function(){
          $('#delete_build_btn').modal('show');
          $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();
            console.log(data);
            $('#delete_build').text(data[2].trim())
            $('#delete_build_id').val(data[0].trim());
        });


    });

    $(document).ready(function() {
      $('#show_builds').DataTable();
  } );  


  </script>

  
</body>
</html>
