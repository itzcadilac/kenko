<!doctype html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?=TITULO_PRINCIPAL?></title>
      <meta name="author" content="<?=AUTOR?>">
      <link rel="shortcut icon" href="<?=base_url()?>public/images/favicon.jpg">
      <link rel="icon" href="<?=base_url()?>public/images/favicon.jpg" type="image/x-icon">
      <link rel="stylesheet" href="<?=base_url()?>public/template/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?=base_url()?>public/template/css/typography.css">
      <link rel="stylesheet" href="<?=base_url()?>public/template/css/style.css">
      <link rel="stylesheet" href="<?=base_url()?>public/template/css/responsive.css">
      <link href="<?=base_url()?>public/css/datatables.min.css" rel="stylesheet" type="text/css">
      <style>
         .dashboard__title{
            padding-top: 25px;
            font-size: 12px;
         }
      </style>
   </head>
   <body>
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <div class="wrapper">
      <?php $this->load->view("inc/nav-template"); ?>
         <div id="content-page" class="content-page">
            <?php $this->load->view("inc/nav-top-template"); ?>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 ">
                     <br>
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title card-body ">
                        <h3 style="font-size:22px;" class="text-center">
                    <b> SISTEMA DE PROCESAMIENTO DE FRUTAS KENKO   </b>
                         </h3>
                           </div>
                        </div>
                     </div>
				  </div>
				  <?php
					$listaModulos = $this->session->userdata("modulos");
					foreach($listaModulos as $row): ?>
					<!-- <div class="col-sm-6 col-md-3">
						<div class="iq-card">
						<?php if($row->estado==1){ ?>
							<?php if($row->imagen=="1"){ ?>
								<a href="<?=base_url()?><?=$row->url?>">
								<img src="<?=base_url()?>public/images/principal/<?=$row->icono?>" style="height: 60px" border="0" /></a>
							<?php }else{ ?>
								<a href="<?=base_url()?><?=$row->url?>">
								<i class="<?=$row->icono?>" aria-hidden="true"></i></a>
							<?php } ?>
							<p><?=$row->descripcion?></p>
						<?php }else{ ?>
							<?php if($row->imagen=="1"){ ?>
							<a href="javascript:;" style="cursor: default;"><img src="<?=base_url()?>public/images/principal/<?=$row->icono?>" class="opacidad" style="height: 60px" border="0" /></a>
							<?php }else{ ?>
							<i class="<?=$row->icono?> opacidad" aria-hidden="true"></i>
							<?php } ?>
							<p class="opacidad"><?=$row->descripcion?></p>
						<?php } ?>
						</div>
					</div> -->
          <div class="col-sm-6 col-md-3 dashboard__card">
            <a href="<?=base_url()?><?=$row->url?>">
              <div class="iq-card">
                <div class="iq-card-body text-center" style="background: #089eae; height : 230px; border-radius:20px; padding-top: 15px;">
                  <div style="margin-top: 15px;" class="doc-profile">
  								  <img class="img-fluid avatar-80" src="<?=base_url()?>public/images/principal/<?=$row->icono?>" alt="<?=$row->url?>">
  								</div>
                  <div class="dashboard__title">
  								  <h6 style="color: white;"> <?=$row->descripcion?></h6>
  								</div>
                </div>
              </div>
            </a>
          </div>
					<?php endforeach; ?>
				  <!-- <div class="col-sm-6 col-md-3">
                     <div class="iq-card">
                        <div class="iq-card-body text-center">
                           <div class="doc-profile">
                              <img class="rounded-circle img-fluid avatar-80" src="<?=base_url()?>public/template/images/user/12.jpg" alt="profile">
                           </div>
                           <div class="iq-doc-info mt-3">
                              <h4> Dr. Anna Mull</h4>
                              <p class="mb-0" >Cardiologists</p>
                              <a href="javascript:void();">www.demo.com</a>
                           </div>
                           <div class="iq-doc-description mt-2">
                              <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam auctor non erat non gravida. In id ipsum consequat</p>
                           </div>
                           <div class="iq-doc-social-info mt-3 mb-3">
                              <ul class="m-0 p-0 list-inline">
                                 <li><a href="#"><i class="ri-facebook-fill"></i></a></li>
                                 <li><a href="#"><i class="ri-twitter-fill"></i></a> </li>
                                 <li><a href="#"><i class="ri-google-fill"></i></a></li>
                              </ul>
                           </div>
                           <a href="profile.html" class="btn btn-primary">View Profile</a>
                        </div>
                     </div>
				  </div>  -->
               </div>
            </div>
            <?php $this->load->view("inc/footer-template"); ?>
         </div>
      </div>
      <script src="<?=base_url()?>public/template/js/jquery.min.js"></script>
      <script src="<?=base_url()?>public/template/js/popper.min.js"></script>
      <script src="<?=base_url()?>public/template/js/bootstrap.min.js"></script>
      <script src="<?=base_url()?>public/template/js/jquery.appear.js"></script>
      <script src="<?=base_url()?>public/template/js/countdown.min.js"></script>
      <script src="<?=base_url()?>public/template/js/waypoints.min.js"></script>
      <script src="<?=base_url()?>public/template/js/jquery.counterup.min.js"></script>
      <script src="<?=base_url()?>public/template/js/wow.min.js"></script>
      <script src="<?=base_url()?>public/template/js/apexcharts.js"></script>
      <script src="<?=base_url()?>public/template/js/slick.min.js"></script>
      <script src="<?=base_url()?>public/template/js/select2.min.js"></script>
      <script src="<?=base_url()?>public/template/js/owl.carousel.min.js"></script>
      <script src="<?=base_url()?>public/template/js/jquery.magnific-popup.min.js"></script>
      <script src="<?=base_url()?>public/template/js/smooth-scrollbar.js"></script>
      <script src="<?=base_url()?>public/template/js/lottie.js"></script>
      <script src="<?=base_url()?>public/template/js/chart-custom.js"></script>
      <script src="<?=base_url()?>public/template/js/custom.js"></script>
<script src="<?=base_url()?>public/js/datatables.min.js"></script>
<!--<script src="<?=base_url()?>public/js/main.js"></script>-->
<script>
   const canDelete = "1";
    const canEdit = "1";
    const canTracking = "1";
    const canHistory = "1";
    var URI = "<?=base_url()?>";
</script>
   </body>
</html>