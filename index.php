

<?php

include_once "public/header.php";
?>
<style>
  .card {
    background-color: #fff;
    border-radius: 10px;
    border: none;
    position: relative;
    margin-bottom: 30px;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
  }
  .l-bg-cherry {
      background: linear-gradient(to bottom, #006DE2, #3DEAFF) !important;
      color: #fff;
  }

  .l-bg-blue-dark {
      background: linear-gradient(to bottom, #006DE2, #3DEAFF) !important;
      color: #fff;
  }

  .l-bg-green-dark {
      background: linear-gradient(to bottom, #006DE2, #3DEAFF) !important;
      color: #fff;
  }

  .l-bg-orange-dark {
      background: linear-gradient(to right, #a86008, #ffba56) !important;
      color: #fff;
  }

  .card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
      font-size: 110px;
  }

  .card .card-statistic-3 .card-icon {
      text-align: center;
      line-height: 50px;
      margin-left: 15px;
      color: #000;
      position: absolute;
      right: -5px;
      top: 20px;
      opacity: 0.1;
  }

  .l-bg-cyan {
      background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
      color: #fff;
  }

  .l-bg-green {
      background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
      color: #fff;
  }

  .l-bg-orange {
      background: linear-gradient(to right, #f9900e, #ffba56) !important;
      color: #fff;
  }

  .l-bg-cyan {
      background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
      color: #fff;
  }
  .card-title{
    font-size: 25px;
    color: #fff;
    font-family: "janna Lt";
    font-weight: 700;
  }
  .card:hover{
    width: 400px;
    height: 200px;
    z-index: 1;
    cursor: pointer;
    box-shadow: 0 0.46875rem 9.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 1.125rem 0.1875rem rgba(90,97,105,0.1);
 
  }
</style>
        <h2 class="mb-4 text-center" id="main-title">القـمــة للمقاولات والاستشارات الهندسية</h2>

        
<div class="col-md-12 ">
    <div class="row text-center">
    <div class="col-xl-4 col-lg-6">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0"> العمـــال </h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex  border border-primary rounded-lg" style="background-color:#013b78a6">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                15.07k
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>9.23% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 ">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-city"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0"> المبانـــي </h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex border border-primary rounded-lg" style="background-color:#013b78a6">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center  mb-0">
                               <?php $result=  bProcess() ;
                                $ch= ($result > 0)?true:false;
                               echo ($ch)?"<span style='color:#22ff55'>".$result." </span>":"<span style='color:#ff9ea8' >".(str_replace('-','',$result))."  </span>";
                               ?>
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span><?php echo ($ch)? "<span style='color:#22ff55'>لك  <i class='fa fa-arrow-up'></i></span>":"<span style='color:#ff9ea8'  > عليك  <i class='fa fa-arrow-down'></i> </span>  "?> 
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-poll"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">التجــار</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex  border border-primary rounded-lg" style="background-color:#013b78a6">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php $mResult=  mProcess() ;
                                $Mch= ($mResult > 0)?true:false;
                               echo ($Mch)?"<span style='color:#22ff55'>".$mResult." </span>":"<span style='color:#ff9ea8' >".(str_replace('-','',$mResult))."  </span>";
                               ?>
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                        <span><?php echo ($Mch)? "<span style='color:#22ff55'>لك  <i class='fa fa-arrow-up'></i></span>":"<span  style='color:#ff9ea8' > عليك  <i class='fa fa-arrow-down'></i> </span>  "?> 
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
       
    </div>
</div>


    <?php include_once "public/footer.php" ?>








  </body>
</html>