<!-- <!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Sistema Kenko</title>
	<link rel="shortcut icon" type="image/png" href="<?=base_url()?>public/images/favicon.jpg"/>
	<?php echo link_tag("public/css/font-awesome.min.css"); ?>
	<?php echo link_tag("public/css/bootstrap.min.css"); ?>
	<?php echo link_tag("public/css/login.css"); ?>
</head>
<body>
<section id="login">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 login-content">
				<div class="form-wrap">
				<h2>Ingreso al sistema. Inicia Sesi&oacute;n</h2>
				<img class="logo-header" src="<?php echo base_url(''); ?>" alt="Minsa" />
					<form role="form" action="<?=base_url()?>doLogin" method="post" id="login-form">
						<div class="bordered-input form-group">
							<input type="text" name="usuario" id="usuario" class="form-control box" required=""
							value="<?=($this->session->userdata('usuarioError')!=null)?$this->session->userdata('usuarioError'):""?>" autocomplete="off" />
								<span for="usuario">Usuario</span>
						</div>
						<div class="bordered-input form-group">
							<input type="password" name="key" id="key" class="form-control box" required=""	autocomplete="new-password" />
								<span for="key">Contrase&ntilde;a</span>
						</div>
						<button type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block">Iniciar Sesi&oacute;n</button>
						<?php
						if($this->session->userdata('error_session')!=null) echo "<div class='text-center'>".$this->session->userdata('error_session')."</div>";
						?>
					</form>
					<?php $message = $this->session->flashdata('loginError'); ?>
	                <?php if($message){ ?>
	                    <p style="color:#dc8b89;margin:auto;text-align:center;"><?= $message ?></p>
	                <?php } ?>
				</div>
	                <div class="clearfix"></div>
	                <div class="logo-footer pull-center">
	                	<img src="<?=base_url()?>public/images/logo.jpg" />
	                </div>
			</div>
		</div>
	</div>
</section>
<script src="<?=base_url()?>public/js/jquery.min.js"></script>
<script src="<?=base_url()?>public/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>public/js/jquery.validate.min.js"></script>
<script src="<?=base_url()?>public/js/additional-methods.min.js"></script>
<script src="<?=base_url()?>public/js/login.js?v=<?=date("is")?>"></script>
</body>
</html> -->
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Sistema Kenko</title>
      <link rel="shortcut icon" type="image/png" href=""/>
      <link rel="stylesheet" href="<?=base_url()?>public/template/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?=base_url()?>public/template/css/typography.css">
      <link rel="stylesheet" href="<?=base_url()?>public/template/css/style.css">
      <link rel="stylesheet" href="<?=base_url()?>public/template/css/responsive.css">
	  <!-- <?php echo link_tag("public/css/login.css"); ?> -->
   </head>
   <body style="background-color:#244B5A;">
      <div id="loading">
         <div id="loading-center">
		</div>
      </div>
        <section class="sign-in-page" style="margin:-50px">
            <div class="container sign-in-page-bg mt-5 p-0">
                <div class="row no-gutters">
                    <div class="col-md-6 text-center">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-3" href="#"><img style="width:700px; height:250px" src="<?php echo base_url('public/images/logo_kenko.png'); ?>" alt="Minsa" class="img-fluid"  ></a>
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="<?=base_url()?>public/template/images/login/Foto1.jpg" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">DISTRIBUCIÓN EFICIENTE</h4>
                                    <p>Nuestro servicio de Procesamiento realiza una distribución eficiente de los productos que nos entregan.</p>
                                </div>
                                <div class="item">
                                    <img src="<?=base_url()?>public/template/images/login/Foto2.webp" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">ALMACENAMIENTO CONTROLADO</h4>
                                    <p>Una vez procesado, el producto es almacenado de forma controlada y a medida en nuestros almacenes.</p>
                                </div>
                                <div class="item">
                                    <img src="<?=base_url()?>public/template/images/login/Foto3.jpg" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">LIMPIEZA IDEAL</h4>
                                    <p>Ejecutamos un alto desempeño y rendimiento en la limpieza de sus productos, para así entregarles un producto de calidad.</p>
								</div>
                                <div class="item">
                                    <img src="<?=base_url()?>public/template/images/login/Foto4.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">RIGUROSO CONTROL DE CALIDAD</h4>
                                    <p>Nuestro proceso de control de calidad es altamente riguroso.</p>
								</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <div class="sign-in-from">
                            <h1 class="mb-0">Iniciar Sesión</h1>
                            <p>Digite sus datos para ingresar al Sistema</p>
                            <form class="mt-4" action="<?=base_url()?>doLogin" method="post" id="login-form">
                                <div class="form-group">
                                    <label for="usuario">Usuario</label>
                                    <input type="text" class="form-control mb-0" id="usuario" name="usuario" placeholder="Ingrese su usuario" 
									value="<?=($this->session->userdata('usuarioError')!=null)?$this->session->userdata('usuarioError'):""?>" autocomplete="off" >
                                </div>
                                <div class="form-group">
                                    <label for="key">Contraseña</label>
                                    <input type="password" class="form-control mb-0" name="key" id="key" placeholder="Ingrese su contraseña" autocomplete="new-password" >
                                </div>
                                <div class="d-inline-block w-100">
                                    <button type="submit" class="btn btn-primary float-right">Iniciar Sesi&oacute;n </button>
									<?php
									if($this->session->userdata('error_session')!=null) echo "<div class='text-center'>".$this->session->userdata('error_session')."</div>";
									?>
                                </div>
                                <div class="sign-info">
								Acceso directo a nuestras Redes Sociales
                                    <ul class="iq-social-media">
									    <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                        <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                    </ul>
                                </div>
                            </form>
							<?php $message = $this->session->flashdata('loginError'); ?>
							<?php if($message){ ?>
								<p style="color:#dc8b89;margin:auto;text-align:center;"><?= $message ?></p>
							<?php } ?>
							<br/>
							<br/><br/>
							<!--<div class="media" style="width: 100%;">
								<img class="align-self-end  " src="<?=base_url()?>public/images/logo.jpg" 
								style="width: auto;height: 70px;margin: 0 auto;" />
							</div>-->
 
                        </div>
												
                    </div>
                </div>
            </div>
        </section>
      <script src="<?=base_url()?>public/template/js/jquery.min.js"></script>
      <script src="<?=base_url()?>public/template/js/popper.min.js"></script>
      <script src="<?=base_url()?>public/template/js/bootstrap.min.js"></script>
      <script src="<?=base_url()?>public/template/js/jquery.appear.js"></script>
      <!-- <script src="<?=base_url()?>public/template/js/countdown.min.js"></script> -->
      <script src="<?=base_url()?>public/template/js/waypoints.min.js"></script>
      <script src="<?=base_url()?>public/template/js/jquery.counterup.min.js"></script>
      <script src="<?=base_url()?>public/template/js/wow.min.js"></script>
      <!-- <script src="<?=base_url()?>public/template/js/apexcharts.js"></script> -->
      <script src="<?=base_url()?>public/template/js/slick.min.js"></script>
      <script src="<?=base_url()?>public/template/js/select2.min.js"></script>
      <script src="<?=base_url()?>public/template/js/owl.carousel.min.js"></script>
      <script src="<?=base_url()?>public/template/js/jquery.magnific-popup.min.js"></script>
      <script src="<?=base_url()?>public/template/js/smooth-scrollbar.js"></script>
      <!-- <script src="<?=base_url()?>public/template/js/chart-custom.js"></script> -->
      <script src="<?=base_url()?>public/template/js/custom.js"></script>
	  <script src="<?=base_url()?>public/js/jquery.validate.min.js"></script>
	  <script src="<?=base_url()?>public/js/login.js?v=<?=date("is")?>"></script>
   </body>
</html>