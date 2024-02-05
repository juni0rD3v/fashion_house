<style>
  .sidebar li.nav-item *{
    color:white;
  }
</style>
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-light-dark elevation-4 bg-dark text-white">
        <!-- Brand Logo -->
        <a href="<?php echo base_url ?>admin" class="brand-link bg-dark text-sm">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 2.5rem;height: 2.5rem;max-height: unset">
        <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
                <!-- Sidebar Menu -->
                <nav class="mt-4">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item dropdown">
                      <a href="./" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>
                    </li> 
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=apparel" class="nav-link nav-apparel">
                        <i class="nav-icon fas fa-map-marked"></i>
                        <p>
                          Apparel
                        </p>
                      </a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=reserve" class="nav-link nav-reserve">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                          Reservation
                        </p>
                      </a>
                    </li> -->
                    <li class="nav-item dropdown">
                      <a id="dropdownSubMenu1" href="<?php echo base_url ?>admin/?page=reserve" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link nav-reserve dropdown-toggle">
                        <i class="nav-icon fas fa-th-list"></i>
                          <p>
                            Manage Reservation
                            </p> 
                            <span class="badge badge-warning"> <?php 
                                $apparel = $conn->query("SELECT count(id) as total FROM `book_list` where status='0' ")->fetch_assoc()['total'];
                                echo number_format($apparel);
                              ?>
                            </span>
                      </a>
                      <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu bg-dark border-0 ">
                        <li class="nav-item dropdown">
                          <a href="<?php echo base_url ?>admin/?page=reserve/pending" class="nav-link nav-reserve/pending">
                            <i class="nav-icon fas fa-spinner"></i>
                            <p>
                              Pending
                              </p> <span class="badge badge-warning"> <?php 
                                $apparel = $conn->query("SELECT count(id) as total FROM `book_list` where status='0' ")->fetch_assoc()['total'];
                                echo number_format($apparel);
                              ?></span>
                          </a>
                        </li>
                        <li class="nav-item dropdown">
                          <a href="<?php echo base_url ?>admin/?page=reserve/confirm" class="nav-link nav-reserve/confirm">
                            <i class="nav-icon fas fa-check"></i>
                            <p>
                              Confirmed
                            </p>
                          </a>
                        </li>
                        <li class="nav-item dropdown">
                          <a href="<?php echo base_url ?>admin/?page=reserve/cancel" class="nav-link nav-reserve/cancel">
                            <i class="nav-icon fas fa-exclamation-triangle"></i>
                            <p>
                              Cancelled
                            </p>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a id="dropdownSubMenu1" href="<?php echo base_url ?>admin/?page=rent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link nav-rent dropdown-toggle">
                        <i class="nav-icon fas fa-list"></i>
                          <p>
                            Manage Rent
                            </p> 
                            <span class="badge badge-warning"> <?php 
                                $apparel = $conn->query("SELECT count(id) as total FROM `rent_list` where status='0' ")->fetch_assoc()['total'];
                                echo number_format($apparel);
                              ?>
                            </span>
                      </a>
                      <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu bg-dark border-0 ">
                        <li class="nav-item dropdown">
                          <a href="<?php echo base_url ?>admin/?page=rent/pending" class="nav-link nav-rent/pending">
                            <i class="nav-icon fas fa-spinner"></i>
                            <p>
                              Pending
                              </p> <span class="badge badge-warning"> <?php 
                                $apparel = $conn->query("SELECT count(id) as total FROM `rent_list` where status='0' ")->fetch_assoc()['total'];
                                echo number_format($apparel);
                              ?></span>
                          </a>
                        </li>
                        <li class="nav-item dropdown">
                          <a href="<?php echo base_url ?>admin/?page=rent/confirm" class="nav-link nav-rent/confirm">
                            <i class="nav-icon fas fa-check"></i>
                            <p>
                              Confirmed
                            </p>
                          </a>
                        </li>
                        <li class="nav-item dropdown">
                          <a href="<?php echo base_url ?>admin/?page=rent/cancel" class="nav-link nav-rent/cancel">
                            <i class="nav-icon fas fa-exclamation-triangle"></i>
                            <p>
                              Cancelled
                            </p>
                          </a>
                        </li>
                        <li class="nav-item dropdown">
                          <a href="<?php echo base_url ?>admin/?page=rent/picked" class="nav-link nav-rent/picked">
                            <i class="nav-icon fas fa-arrow-left"></i>
                            <p>
                              Picked Up
                            </p>
                          </a>
                        </li>
                        <li class="nav-item dropdown">
                          <a href="<?php echo base_url ?>admin/?page=rent/return" class="nav-link nav-rent/return">
                            <i class="nav-icon fas fa-arrow-right"></i>
                            <p>
                              Returned
                            </p>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <!-- <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=rent" class="nav-link nav-rent">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                          Rent
                        </p>
                      </a>
                    </li> -->
                    <li class="nav-header text-white">Maintenance</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=inquiries" class="nav-link nav-inquiries">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                        Inquiries
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=review" class="nav-link nav-review">
                        <i class="nav-icon fas fa-comment-alt"></i>
                        <p>
                        Rate & Reviews
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                          Settings
                        </p>
                      </a>
                    </li>
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
      <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      page = page.split('/');
      page = page[0];
      if(s!='')
        page = page+'_'+s;

      if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
        if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

      }
     
    })
  </script>