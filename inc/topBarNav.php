 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav">
            <div class="container-fluid">
                <a class="navbar-brand" href="#page-top"><span class="text-waring">ZIR AA Fashion House</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link text-dark" href="<?php echo $page !='home' ? './':''  ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="./?page=packages">Apparel</a></li>
                        <!-- <li class="nav-item"><a class="nav-link text-dark" href="./?page=packages">Search</a></li> -->
                        <li class="nav-item"><a class="nav-link text-dark" href="<?php echo $page !='home' ? './':''  ?>#about">About</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="<?php echo $page !='home' ? './':''  ?>#contact">Contact</a></li>
                        
                        <?php if(isset($_SESSION['userdata'])): ?>
                        <li class="nav-item dropdown">
                          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link text-dark dropdown-toggle"><i class="fa fa-user"></i> <?php  echo $_settings->userdata('firstname') ?>!</a>
                          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow bg-dark">
                            <li><a href="./?page=my_reservation" class="dropdown-item  text-white ">My Reservation </a></li>
                            <li><a href="./?page=my_rent" class="dropdown-item  text-white ">My Rent</a></li>

                            <li class="dropdown-divider"></li>
                            <li class="nav-item"><a href="./?page=edit_account" class="dropdown-item  text-dark">Profile</a></li>
                            <li class="nav-item"><a class=" dropdown-item  text-dark " href="logout.php"> Logout <i class=" text-dark fa fa-sign-out-alt"></i></a></li>
                            <?php else: ?>
                              <li class="nav-item"><a class="nav-link text-dark" href="javascript:void(0)" id="login_btn">Login</a></li>
                            <?php endif; ?>
                          </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<script>
  $(function(){
    $('#login_btn').click(function(){
      uni_modal("","login.php","small")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if($('body').offset.top == 0)
          $('#mainNav').removeClass('navbar-shrink')
    })
  })
</script>
<style>
     body, table, .navbar-dark{
        /* color:black; */
        background: #000000;
    background: -moz-linear-gradient(-45deg,  #000000 20%, #fbbf3b 80%);
    background: -webkit-linear-gradient(-45deg,  #000000 20%,#fbbf3b 80%);
    background: linear-gradient(155deg,  #000000 20%,#fbbf3b 80%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000', endColorstr='#fbbf3b',GradientType=1 );
    
    }
</style>