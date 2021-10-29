<script src="js/jq.js"></script>
<script src="js/parsley.js"></script>
    <script src="DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
<script src="DataTables/DataTables-1.10.21/js/dataTables.bootstrap4.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/notiflix-aio-2.7.0.min.js"></script>
    
    <script>
        $(document).ready(function(){
      <?php if(isset($_SESSION['msg'])   ){
            if ($_SESSION['msg']=="success") {
            ?> Notiflix.Notify.Success('تمت العملية بنجاح');
            <?php unset ($_SESSION["msg"]);
            }elseif ($_SESSION['msg']=="error") {
            ?>
            Notiflix.Notify.Failure('اعد المحاولة لقد حدث خطأ ما');
            <?php unset ($_SESSION["msg"]);
            }
        }
       
        
        ?>
        });
    </script>
