<?php include_once "public/header.php" ?>

    
  <div class="container">
        <div class="row">
          <div class="col-2 d-sm-none"></div>
          <div class="col-2    mb-3">
            <a title='اضافة عامل جديد' id='new_worker_btn'  style="font-family: janna lt;cursor: pointer; border:1px solid #3e64ff;width:200px; border-radius:4px;font-weight:600 ;color:#3e64ff" class='addNewWorkerBtn btn bg-light mb-2 ' data-toggle='modal' name='addNewWorkerBtn' data-target='#addNewWorkerBtn' >
              اضافة عامل جديد  
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        
        


        <!-- ----------------- Start Modal to ADD new worker--------------- -->            

        <div class="modal fade" id="modelNew" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">اضافة عامل جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="processes.php" id="validate" method="POST"                     >
                          <label for="wname">الاسم:</label>
                          <input type="text" name="wname" class="form-control" 
                          data-parsley-error-message="<span class='text-danger'>لايمكنك تركه فارغا</span>"
                          placeholder="ادخل اسم العامل"  id="wname1" required >
                          <label for="wjop">المهنه:</label>
                          <input type="text" name="wjop" class="form-control " 
                          data-parsley-error-message="<span class='text-danger'>لايمكنك تركه فارغا</span>"
                          placeholder="ادخل مهنة العامل" id="wjop1" required>

                          <label for="wphone">رقم الهاتف:</label>
                          <input type="number" name="wphone"  class="form-control " 
                            placeholder="ادخل رقم الهاتف" id="wphone1"                             
                          >
                          <label for="wprice">المبلغ اليومي:</label>
                          <input type="number" name="wprice"  class="form-control " placeholder="تكلفة العامل اليومية"
                            data-parsley-type="integer"
                            data-parsley-pattern = "^[0-9]\d*(\.\d+)?$"
                            data-parsley-error-message="<span class='text-danger'>ادخل التكلفه بشكل صحيح</span>"
                          id="wprice1" required>
                        
                          <label for="date" class=" p-2">التاريخ:</label>
                          <input type="date"  class="input-group date " name="wdate" id="wdate1" >

                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء </button>
                              <button type="submit" class="btn btn-primary" name="add_new_worker_btn">اضافة</button>
                          </div>   

                      </div>
                </form>

              </div>
            </div>
          </div>
          <!-- ----------------- End modal to ADD new worker--------------- --> 



        
    <div class="table-responsivesm">
      <table id="show_workers" class="table  table-responsive-md  " style="width: 100%;" >
        <thead>
            <tr>
                <th style="width:10px"></th>
                <th class='d-none' > </th>
                <th>الاسم</th>
                <th>المهنه</th>
                <th>رقم الهاتف</th>
                <th>المبلغ المستحق</th>
                <th>تاريخ الاضافة</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>


          <?php
            show_workers();
          ?>

      
          <!-- ----------------- Start Modal to edit users data--------------- -->            


          
          <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">تعديل بيانات العامل</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="processes.php"  method="POST">
                        <input type="hidden" name="update_id" id="update_id">
                          <label for="wname">الاسم:</label>
                          <input type="text" name="wname" class="form-control" placeholder="ادخل اسم العامل"  id="wname" required>
                          <label for="wjop">المهنه:</label>
                          <input type="text" name="wjop" class="form-control " placeholder="ادخل مهنة العامل" id="wjop" required> 

                          <label for="wphone">رقم الهاتف:</label>
                          <input type="phone" name="wphone"  class="form-control " placeholder="ادخل رقم الهاتف" id="wphone" >
                          <label for="wprice">المبلغ اليومي:</label>
                          <input type="number" name="wamount"  class="form-control " placeholder="تكلفة العامل اليومية" id="wamount" required>
                        
                          <label for="date" class=" p-2">التاريخ:</label>
                          <input type="date"  class="input-group date " name="wdate" id="wdate" >

                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء </button>
                              <button type="submit" class="btn btn-primary" name="edit_worker_btn">تعديل</button>
                          </div>   

                      </div>
                </form>

              </div>
            </div>
          </div>
          <!-- ----------------- End modal to edit users data--------------- --> 

          

      
        
          <!-- ----------------- Start modal to Delete worker--------------- --> 
          <div class="modal fade" id="delete_worker_btn" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                      { <span id="delete_name1"></span> }
                  
                  </h4>
                  <form action="processes.php" method="POST">
                    <input type="hidden" name="delete_id" id="delete_id">
                    <div class="modal-footer">
                  <button type="button" class="btn btn-secondary"  data-dismiss="modal">الغاء</button>
                  <button type="submit" class="btn btn-danger" name="sure_deleteWorker_btn">نعم </button>
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
      <?php if(isset($_SESSION['msg'])){
        if ($_SESSION['msg']=="success") {
         ?> Notiflix.Notify.Success('تمت العملية بنجاح');
         <?php unset ($_SESSION["msg"]);
        }elseif ($_SESSION['msg']=="error") {
          ?>
          Notiflix.Notify.Failure('اعد المحاولة لقد حدث خطأ ما');
          <?php unset ($_SESSION["msg"]);
        }
      } ?>

      $('#validate').parsley();

        $('#new_worker_btn ').on('click',function(){
          $('#modelNew').modal('show')});
           /* Start insert current date to the input */
           var d = new Date();
          var month = d.getMonth()+1;
          var day = d.getDate();
          var output = d.getFullYear() + '-' +
              (month<10 ? '0' : '') + month + '-' +
              (day<10 ? '0' : '') + day;
          $('#wdate1').val(output.trim());
          /* End insert current date to the input */
        $('.editbtn ').on('click',function(){
          $('#modelId').modal('show');
          $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();
            console.log(data);
            $('#update_id').val(data[0].trim());
            $('#wname').val(data[2].trim());
            $('#wjop').val(data[3].trim());
            $('#wphone').val(data[4].trim());
            $('#wamount').val(Number(data[5]));/* هنا حولنا من سترينج الى نص  */
            $('#wdate').val(data[6].trim());


        });  
        $('.delete_worker_btn ').on('click',function(){
          $('#delete_worker_btn').modal('show');
          $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
              return $(this).text();
            }).get();
            console.log(data);
            $('#delete_name1').text(data[2].trim())
            $('#delete_id').val(data[0].trim());
        });


    });

    $(document).ready(function() {
      $('#show_workers').DataTable();
  } );  


  </script>

  
</body>
</html>
