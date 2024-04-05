<!DOCTYPE html>
<html lang="en">
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
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css"/>
	<?php $titulo = "Lista General de Eventos";?>
	<?php $opciones = $this->session->userdata("Permisos_Opcion");?>
	<?php
	$months = array(
		array("id" => 0, "name" => "TODOS"),
		array("id" => 1, "name" => "Enero"),
		array("id" => 2, "name" => "Febrero"),
		array("id" => 3, "name" => "Marzo"),
		array("id" => 4, "name" => "Abril"),
		array("id" => 5, "name" => "Mayo"),
		array("id" => 6, "name" => "Junio"),
		array("id" => 7, "name" => "Julio"),
		array("id" => 8, "name" => "Agosto"),
		array("id" => 9, "name" => "Septiembre"),
		array("id" => 10, "name" => "Octubre"),
		array("id" => 11, "name" => "Noviembre"),
		array("id" => 12, "name" => "Diciembre"),
	);
	?>
      <link rel="stylesheet" href="<?=base_url()?>public/css/eventos/listaEventos.css?v=<?=date(" s")?>" />
</head>

<body>
	<div id="loading">
        <div id="loading-center">
        </div>
    </div>
	<div class="wrapper">
	   <?php $this->load->view("inc/nav-template");?>
		<div id="content-page" class="content-page">
		  <?php $this->load->view("inc/nav-top-template");?>
		  	<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="iq-card">
							<div class="iq-card-header d-flex justify-content-between">
								<div class="iq-header-title">
									<h4 class="card-title">Lista de Servicios </h4>
								</div>
							</div>
                        	<div class="iq-card-body">
								<div class="container-fluid">

													<?php $message = $this->session->flashdata('messageOK');?>
													<?php if ($message) {?>
														<div
															class="alert alert-success">
															<p><?=$message?></p>
														</div>
													<?php }?>

													<?php $message = $this->session->flashdata('messageError');?>
													<?php if ($message) {?>
														<div
															class="alert alert-danger">
															<p><?=$message?></p>
														</div>
													<?php }?>
													<?php $idrol = $this->session->userdata("idrol");?>
													<input type="hidden" id="Tipo_Accion" />
													<div class="clearfix"></div>
													<div class="row">
															<div class="col-xs-12">

															<div class="form-group row">
																<label class="col-sm-12 col-form-label">Aplicar Filtros por Año y Mes del Evento</label>
																<div class="col-sm-3">
																	<select class="form-control" name="anio" id="anio">
																	<?php foreach ($listaAnioEjecucion->result() as $row): ?>
																	<option value="<?=$row->Anio_Ejecucion?>" <?=($row->Anio_Ejecucion == $anio) ? "selected" : ""?>><?=$row->Anio_Ejecucion?></option>
																	<?php endforeach;?>
																	</select>
																</div>
																<div class="col-sm-3">
																	<select class="form-control" name="mes" id="mes">
																	<?php foreach ($months as $row): ?>
																	<option value="<?=$row["id"]?>" <?=($row["id"] == $mes) ? "selected" : ""?>><?=$row["name"]?></option>
																	<?php endforeach;?>
																	</select>
																</div>

															</div>


															</div>
													</div>
													<div class="table-responsive">
														<table class="table table-bordered table-hover tbLista">
																<!-- dataTables-example -->
																<thead class="thead-template">
																	<tr>
																		<th class="text-center" >ID</th>
																		<th>Tipo de servicio</th>
																		<th>Dirección</th>
																		<th style="width: 100px;">Fecha y Hora</th>
																		<th>Tipo documento</th>
																		<th class="text-center" style="width: 80px;">N. documento</th>
																		<th class="text-center" style="width: 40px;">Nombres</th>
																		<th class="text-center" style="width: 40px;">Apellidos</th>
																		<th>Estado</th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																	$n = 1;
																	foreach ($lista as $row):
																	?>
																	<tr>
																		<td align="center"><?=$row["idservicio"]?></td>
																		<td><?=$row["descservicio"]?></td>
																		<td><?=$row["direccion"]?></td>
																		<td><?=$row["fecregistro"]?></td>
																		<td class="text-center">
																			<?php if ($row["tipodocumento"] == "1") {?>
																			<span>DNI</span>
																			<?php } else {?>
																			<?php if (validarPermisosOpciones(2, $opciones)) {?>
																				<span>Otros</span><?php }?>
																			<?php }?>
																		</td>
																		<td><?=$row["documento"]?></td>
																		<td><?=$row["nombres"]?></td>
																		<td><?=$row["ape_paterno"]?> <?=$row["ape_materno"]?></td>
																		<td><?=$row["estado"]?></td>
																	</tr>
																		<?php
																		$n++;
																		endforeach
																		;
																		?>
																</tbody>
														</table>
													</div>
								</div>
							</div>
						</div>					
					</div>
				</div>	<!-- Aqui cierra row-->		

				
				<?php $this->load->view("inc/footer-template");?>
		   	</div>
		</div>
	</div>
	<?php $this->load->view("inc/resource-template");?>													
	<script src="<?=base_url()?>public/js/eventos/listaEventos.js?v=<?=date("s")?>"></script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key=<?=getenv('MAP_KEY')?>&libraries=places" async defer></script>
	<script>
    listaEventos("<?=base_url()?>");
	</script>

</body>

</html>
