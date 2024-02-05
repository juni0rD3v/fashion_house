<!-- <h1 class="text-white">Welcome to <?php echo $_settings->info('name') ?></h1> -->
<hr>
<!-- <div class="container">
  <?php 
    $files = array();
    $packages = $conn->query("SELECT * FROM `packages` order by rand() ");
    while($row = $packages->fetch_assoc()){
      if(!is_dir(base_app.'uploads/package_'.$row['id']))
      continue;
      $fopen = scandir(base_app.'uploads/package_'.$row['id']);
      foreach($fopen as $fname){
        if(in_array($fname,array('.','..')))
          continue;
        $files[]= validate_image('uploads/package_'.$row['id'].'/'.$fname);
      }
    }
  ?>
  <div id="tourCarousel"  class="carousel slide" data-ride="carousel" data-interval="3000">
      <div class="carousel-inner h-100">
          <?php foreach($files as $k => $img): ?>
          <div class="carousel-item  h-100 <?php echo $k == 0? 'active': '' ?>">
              <img class="d-block w-100  h-100" src="<?php echo $img ?>" alt="">
          </div>
          <?php endforeach; ?>
      </div>
      <a class="carousel-control-prev" href="#tourCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#tourCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>
</div> -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20"> Users</h6>
                    <h2 class="text-right"><i class="fa fa-users f-left"></i><span>
                    <?php 
                        $clients = $conn->query("SELECT count(id) as total FROM `users`")->fetch_assoc()['total'];
                        echo number_format($clients);
                    ?>
                    </span></h2>
                    <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Apparel List </h6>
                    <h2 class="text-right"><i class="fas fa-tshirt f-left"></i><span>
                    <?php 
                        $clients = $conn->query("SELECT count(id) as total FROM `packages`")->fetch_assoc()['total'];
                        echo number_format($clients);
                    ?>
                    </span></h2>
                    <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">All reservation </h6>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>
                    <?php 
                        $clients = $conn->query("SELECT count(id) as total FROM `book_list`")->fetch_assoc()['total'];
                        echo number_format($clients);
                    ?>
                    </span></h2>
                    <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">All Rent </h6>
                    <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>
                    <?php 
                        $clients = $conn->query("SELECT count(id) as total FROM `rent_list`")->fetch_assoc()['total'];
                        echo number_format($clients);
                    ?>
                    </span></h2>
                    <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-6">
            <div class="card bg-navy order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Inquiries </h6>
                    <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>
                    <?php 
                        $clients = $conn->query("SELECT count(id) as total FROM `rent_list`")->fetch_assoc()['total'];
                        echo number_format($clients);
                    ?>
                    </span></h2>
                    <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-6">
            <div class="card bg-navy order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Rate and Reviews </h6>
                    <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>
                    <?php 
                        $clients = $conn->query("SELECT count(id) as total FROM `rent_list`")->fetch_assoc()['total'];
                        echo number_format($clients);
                    ?>
                    </span></h2>
                    <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
                </div>
            </div>
        </div>
	</div>
</div>
<style>
  body{
    margin-top:20px;
    background:#FAFAFA;
}
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}
/* section{
        color:white;
        background: #000000;
    background: -moz-linear-gradient(-45deg,  #000000 20%, #fbbf3b 80%);
    background: -webkit-linear-gradient(-45deg,  #000000 20%,#fbbf3b 80%);
    background: linear-gradient(155deg,  #000000 20%,#fbbf3b 80%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000', endColorstr='#fbbf3b',GradientType=1 );
    
    } */
</style>