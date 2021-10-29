<?php 
include "public/header.php" ;
global $connect;


?>

<div class="container-fluid">
	<?php
	
		
	
	?>
				<div class="panel-group personal-information">
					<div class="panel panel-default">
						<div class="panel-heading">

						<div class="state ">
					 		<a  data-toggle="collapse" href="#collapse1" href="javascript:void" class="status">- تغير المعلومات الشخصية  <i class="fa fa-angle-down " style="font-size: 20px;" aria-hidden="true"></i> </a> 
						</div>
						</div>
						<div id="collapse1" class="panel-collapse collapse mb-5">
									<form action="processes.php" method="POST" enctype="multipart/form-data">
									
									<?php 
									
											if (isset($_SESSION['user_id'])) {
												$user_id =$_SESSION['user_id'] ;
												$sql = "SELECT `name`,`address`,`phone`, `path` FROM users Where user_id =$user_id ; ";
												$res = mysqli_query($connect,$sql);
												$row = mysqli_fetch_assoc($res);
											}
											?>

										<div class="form-group">
											<label for="project_name">الاسم :</label>
											<input name="project_name"  class="form-control" value="<?php echo $row['name'] ?>"  type="text">
										</div><div class="form-group">
											<label for="address">العنوان :</label>
											<input name="address"  class="form-control" value="<?php echo $row['address'] ?>"  type="text">
										</div>
										<div class="form-group">
											<label for="user_number">رقم الهاتف</label>
											<input name="user_number"  class="form-control" value="<?php echo $row['phone'] ?>"  autocomplete="off" type="number">
										</div>
										
										<div class="form-group">
											<label for="" class="control-label">اللوجو</label>
											<div class="custom-file">
											<input class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))" type="file">
											<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
										</div>
										<div class="form-group d-flex justify-content-center">
											
											
											
											<img src="<?php echo $row['path']?>" alt="" id="cimg" class="img-fluid img-thumbnail">
											<?php
										
										 ?>
										</div>
										<input type="submit" value="حفظ" name="save_information_btn" class="btn btn-primary">
									</form>
						</div>
					</div>
				</div>


				<div class="panel-group going-setting">
					<div class="panel panel-default">
						<div class="panel-heading">
						<div class="state">
					 		<a  data-toggle="collapse" href="#collapse2" href="javascript:void" class="status">- تغييـر اعــــدادات الدخــــــــول <i class="fa fa-angle-down " style="font-size: 20px;" aria-hidden="true"></i> </a> 
						</div>
						</div>
						<div id="collapse2" class="panel-collapse collapse mb-5">
									<form action="#" method="post">
										<?php 
										
										if (isset($_SESSION['user_id'])) {
											$user_id =$_SESSION['user_id'] ;
											$sql = "SELECT `username`,`email` FROM users Where user_id =$user_id ; ";
											$res = mysqli_query($connect,$sql);
											$row = mysqli_fetch_assoc($res);
										}
									  ?>

										
									<div class="form-group">
										<label for="username">اسم المستخدم :</label>
										<input name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($row['username']) ?>" required autocomplete="off" type="text">
									</div>
										<div class="form-group">
											<label for="email">البريد  :</label>
											<input name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($row['email']) ?>"  required type="text">
										</div>
										<div class="form-group">
											<label for="password">كلمة السر: </label>
											<input name="password" id="password" class="form-control" value="" placeholder="ادخل كلمة السر " required autocomplete="off" type="password">
										</div>
										
										<input type="submit" value="حفظ" name="saveGoingSettingBtn" class="btn btn-primary">
									</form>
						</div>
					</div>
				</div>

				<div class="panel-group password-setting">
					<div class="panel panel-default">
						<div class="panel-heading">
						<div class="state">
					 		<a  data-toggle="collapse" href="#collapse3" href="javascript:void" class="status">- تغييـــر كلمة المرور <i class="fa fa-angle-up " aria-hidden="true"></i> </a> 
						</div>
						</div>
						<div id="collapse3" class="panel_collapse collapse mb-5">
									<form action="#" method="post">
										<div class="form-group">
											<label for="password">كلمة السر القديمة : </label>
											<input name="old_password" id="password" class="form-control" value="" placeholder=" " autocomplete="off" required type="password">
										</div>
										
										<div class="form-group">
											<label for="password">كلمة السر الجديدة : </label>
											<input name="new_password" id="password" class="form-control" value="" placeholder="" autocomplete="off" required type="password">
										</div>
										<div class="form-group">
											<label for="password">اعد كتابة كلمة السر الجديدة : </label>
											<input name="sure_new_password" id="password" class="form-control" value="" placeholder="  " required autocomplete="off" type="password">
										</div>
										
										<input type="submit" name="passwordSettingBtn" value="حفظ" class="btn btn-primary">
									</form>
						</div>
					</div>
				</div>


		<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<?php include "public/footer.php" ?>

<script>

	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$('.state a').click(function(){
    	$(this).find('i').toggleClass('fa fa-angle-up fa fa-angle-down')
	});
	$(document).ready(function(){
		<?php
			if ( isset($_SESSION['error']) || isset($_SESSION['success'])) {
				if (isset($_SESSION['error'])) {
					?>
					Notiflix.Notify.Failure("<?php echo $_SESSION['error']?>");
					<?php unset ($_SESSION["error"]);
				}
				elseif (isset($_SESSION['success'])) {
					?>
					Notiflix.Notify.Success("<?php echo $_SESSION['success']?>");
					<?php unset ($_SESSION["success"]);
				}
			}
		?>
    $('#collapse3').collapse('show');
});

	</script>
	
