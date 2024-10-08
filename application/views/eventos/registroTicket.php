<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= TITULO_PRINCIPAL ?></title>
	<meta name="author" content="<?= AUTOR ?>">
	<link rel="shortcut icon" href="<?= base_url() ?>public/images/logo_kenko.png">
	<link rel="icon" href="<?= base_url() ?>public/images/logo_kenko.png" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url() ?>public/template/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>public/template/css/typography.css">
	<link rel="stylesheet" href="<?= base_url() ?>public/template/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>public/template/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css" />
	<?php echo link_tag("public/css/mapa.css"); ?>
	<link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>public/css/eventos/registroTicket.css?v=<?= date("his") ?>" />
	<?php $titulo = "Registro de servicios"; ?>
	<style>
		.half-rule {
			margin-left: 0;
			text-align: left;
			width: 50%;
		}

		.statis {
			color: #EEE;
			margin-top: 15px;
		}

		h3 {
			color: #EEE;
			font-size: 20px;
		}

		.statis .box {
			position: relative;
			padding: 15px;
			overflow: hidden;
			border-radius: 3px;
			margin-bottom: 25px;
		}

		.statis .box h3:after {
			content: "";
			height: 2px;
			width: 70%;
			margin: auto;
			background-color: rgba(255, 255, 255, 0.12);
			display: block;
			margin-top: 10px;
		}

		.statis .box i {
			position: absolute;
			height: 70px;
			width: 70px;
			font-size: 22px;
			padding: 15px;
			top: -25px;
			left: -25px;
			background-color: rgba(255, 255, 255, 0.15);
			line-height: 60px;
			text-align: right;
			border-radius: 50%;
		}

		.warning {
			background-color: #f0ad4e
		}

		.danger {
			background-color: #d9534f
		}

		.success {
			background-color: #5cb85c
		}

		.inf {
			background-color: #5bc0de
		}
	</style>
	<link rel="stylesheet" href="<?= base_url() ?>public/css/tablero/gestionarTablero.css?v=<?= date(" s") ?>" />
	<?php $opciones = $this->session->userdata("Permisos_Opcion"); ?>
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
					<div class="col-lg-12">

					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="iq-card">
							<div class="iq-card-header d-flex justify-content-between">
								<div class="iq-header-title">
									<h4 class="card-title">Registro de Ingreso</h4>
								</div>
							</div>
							<div class="iq-card-body">
								<div class="container-fluid">

									<?php $message = $this->session->flashdata('messageOK'); ?>
									<?php if ($message) { ?>
										<div class="alert alert-success">
											<p><?= $message ?></p>
										</div>
									<?php } ?>

									<?php $message = $this->session->flashdata('messageError'); ?>
									<?php if ($message) { ?>
										<div class="alert alert-danger">
											<p><?= $message ?></p>
										</div>
									<?php } ?>
									<?php $idrol = $this->session->userdata("idrol"); ?>
									<input type="hidden" id="Tipo_Accion" />

									<div class="iq-card">
										<div class="iq-card-header d-flex justify-content-between">
											<div class="iq-header-title">
												<h5 class="card-title">Ingrese los datos solicitados para poder registrar el ingreso y generar ticket</h5>
											</div>
										</div>
										<div class="iq-card-body">
											<p></p>
											<div class="row">
												<!-- <div class="col-sm-3">
																<div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
																	<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Datos del Servicio</a>
																	<br>
																	<a class="nav-link disable" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Detalle de servicio</a>
																</div>
															</div> -->

												<div class="col-sm-12">
													<form id="formEvento" name="formEvento" method="POST" action="" autocomplete="off">
														<input id="idCliente" type="hidden" name="idCliente"/>
														<div class="tab-content mt-0" id="v-pills-tabContent">
														
															<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
																<div class="form-group row">
																	<label for="idCliente" class="col-sm-2 col-form-label tag-name">Cliente</label>
																	<div class="col-sm-8">
																		<button type="button" class="btn btn-primary col-sm-12 btnclientSearch">Buscar Cliente</button>
																	</div>
																</div>
																<div class="form-group row">
																	<label for="idCliente" class="col-sm-2 col-form-label tag-name"></label>
																	<div class="col-sm-8">
																		<input id="nombcliente" name="nombcliente" class="form-control" type="text" placeholder="" disabled/>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-sm-2 col-form-label tag-name">Alias</label>
																	<div class="col-sm-8">
																		<input id="apodo" name="apodo" class="form-control" type="text" placeholder="Ingrese Alias" />
																	</div>
																</div>
																<div class="form-group row">
																	<label for="idTipoServicio" class="col-sm-2 col-form-label tag-name">Servicio</label>
																	<div class="row col-sm-8 radio-group pl-0">
																		<?php foreach ($tiposervicio as $row) : ?>
																			<div class="radio-item col pl-0">
																				<input type="radio" name="idTipoServicio" value="<?= $row->idtipservicio ?>" id="optserv<?= $row->idtipservicio ?>">
																				<label class="btn btn-default" for="optserv<?=$row->idtipservicio?>">
																					<?= $row->descservicio ?>
																				</label>
																			</div>
																		<?php endforeach; ?>
																	</div>
																</div>
																<div class="form-group row">
																	<label for="idTipoFruta" class="col-sm-2 col-form-label tag-name">Tipo de Fruta</label>
																	<div class="row col-sm-8 radio-group pl-0">
																		<?php foreach ($tipofruta as $row) : ?>
																			<div class="radio-item col pl-0">
																				<input type="radio" name="idTipoFruta" value="<?=$row->idtipfruta?>" id="optfrut<?=$row->idtipfruta?>">
																				<label class="btn btn-default" for="optfrut<?=$row->idtipfruta?>">
																					<?= $row->descripcionfruta ?>
																				</label>
																			</div>
																		<?php endforeach; ?>
																	</div>

																</div>
																<div class="form-group row">
																	<label for="idTipoJabas" class="col-sm-2 col-form-label tag-name">Tipo de Jabas</label>
																	<div class="row col-sm-8 radio-group pl-0">
																		<?php foreach ($tipojaba as $row) : ?>
																			<div class="radio-item col pl-0">
																				<input type="radio" name="idtipjaba" value="<?=$row->idtipjaba?>" id="optjab<?=$row->idtipjaba?>">
																				<label class="btn btn-default" for="optjab<?=$row->idtipjaba?>">
																					<?= $row->descripcionjaba ?>
																				</label>
																			</div>
																		<?php endforeach; ?>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-sm-2 col-form-label tag-name">Cantidad Jabas</label>
																	<div class="col-sm-8">
																		<input id="cantjabas" name="cantjabas" class="form-control" type="text" placeholder="Ingrese cantidad jabas" />
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-sm-2 col-form-label tag-name">Peso Bruto</label>
																	<div class="col-sm-8">
																		<input id="peso" name="peso" class="form-control" type="text" placeholder="Ingrese peso" />
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-sm-2 col-form-label tag-name">Destino</label>
																	<div class="col-sm-8">
																		<input id="direccion" name="direccion" class="form-control" type="text" placeholder="Ingrese destino" />
																	</div>
																</div>
															</div>
															<!-- <!-- <?php
																		$region = $this->session->userdata("Codigo_Region");
																		$idrol = $this->session->userdata("idrol");
																		$listaDepartamento = array();
																		if ($idrol == "01") {
																			foreach ($departamentos as $row) :
																				$listaDepartamento[] = array(
																					"Codigo_Departamento" => $row->Codigo_Departamento,
																					"Nombre" => $row->Nombre
																				);
																			endforeach;
																		} else {
																			foreach ($departamentos as $row) :
																				if ($region == $row->Codigo_Departamento) {
																					$listaDepartamento[] = array(
																						"Codigo_Departamento" => $row->Codigo_Departamento,
																						"Nombre" => $row->Nombre
																					);
																				}
																			endforeach;
																		}

																		//	
																		?>
															<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
																<div class="form-group row">
																	<label for="idTipoParihuela" class="col-sm-4 col-form-label">Parihuela</label>
																	<div class="col-sm-8">
																		<select class="form-control" name="idTipoParihuela" id="idTipoParihuela">
																			<option value="">-- Seleccione --</option>
																			<?php foreach ($tipoparihuela as $row) : ?>
																				<option value="<?= $row->idtipoparihuela ?>"><?= $row->descripcionparihuela ?></option>
																			<?php endforeach; ?>
																		</select>
																	</div>
																</div>
																<div class="form-group row">
																	<label for="idTipoJaba" class="col-sm-4 col-form-label">Jaba</label>
																	<div class="col-sm-8">
																		<select class="form-control" name="idTipoJaba" id="idTipoJaba">
																			<option value="">-- Seleccione --</option>
																			<?php foreach ($tipojaba as $row) : ?>
																				<option value="<?= $row->idtipjaba ?>"><?= $row->descripcionjaba ?></option>
																			<?php endforeach; ?>
																		</select>
																	</div>
																</div>
																<div class="form-group row">
																	<label for="idTipoFruta" class="col-sm-4 col-form-label">Med. Fruta</label>
																	<div class="col-sm-8">
																		<select class="form-control" name="idTipoFruta" id="idTipoFruta">
																			<option value="">-- Seleccione --</option>
																			<?php foreach ($medidafruta as $row) : ?>
																				<option value="<?= $row->idtamfruta ?>"><?= $row->desctamfruta ?></option>
																			<?php endforeach; ?>
																		</select>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-sm-4 col-form-label">Peso</label>
																	<div class="col-sm-8">
																		<input id="peso" name="peso" class="form-control" type="number" placeholder="Ingrese el peso" />
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-sm-4 col-form-label">Jabas</label>
																	<div class="col-sm-8">
																		<input id="jabas" name="jabas" class="form-control" type="number" placeholder="Ingrese número de jabas" />
																	</div>
																</div>
																<div class="form-group row">
																	<button type="button" class="btn btn-primary col-sm-12 btn-buscar">Agregar detalle</button>
																</div>
																<div class="form-group row">
																	<div class="table-responsive">
																		<table class="tableArticuloIngresos table table-striped table-bordered" cellspacing="0" width="100%">
																			<thead>
																				<tr>
																					<th>Tipo de parihuela</th>
																					<th>Tipo de Jaba</th>
																					<th>Medida de fruta</th>
																					<th>Peso</th>
																					<th>Número de jabas</th>
																					<th></th>
																				</tr>
																			</thead>
																		</table>
																	</div>
																</div>

															</div>
														</div> -->
																			</br>
															<div class="col-sm-12 text-right">
																<button type="submit" id="btnEventoFinal" class="btn btn-primary">Generar Ticket ></button>
																<button type="button" id="btnCancelar" class="btn btn-danger">Cancelar</button>
															</div>
															<div class="col-md-12 " id="cargando"></div>
													</form>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div> <!-- Aqui cierra row-->
				<div class="modal fade" id="tableArticuloModal" tabindex="-1" role="dialog" aria-labelledby="tableArticuloLabel" aria-hidden="false" style="z-index: 1600;">
					<div class="modal-dialog modal-lg" role="document" style="padding-top: 10px;">
					<div class="modal-content">
						<div class="modal-header">
						<h5 class="modal-title" id="registrarTableroModalLabel">Buscar Cliente</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- <form id="formDocument" name="formDocument"> -->
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Documento de cliente</label>
								<div class="col-sm-8">
									<input id="documentNumber" name="documentNumber" class="form-control" type="text" placeholder="Ingrese el número de documento" value=""/>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-8">
									<button id="btnDocumentSearch" class="btn btn-primary">Buscar</button>
								</div>
							</div>
							<input id="clientId" type="hidden" name="clientId"/>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Datos de cliente</label>
								<div class="col-sm-8">
									<input id="clientData" name="clientData" class="form-control" type="text" disabled/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Tipo de documento</label>
								<div class="col-sm-8">
									<input id="documentType" name="documentType" class="form-control" type="text" disabled/>
								</div>
							</div>
						<!-- </form> -->
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary btnActionClient" data-dismiss="modal">Agregar</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					</div>
					</div>
					</div>
				</div>																	
				<?php $this->load->view("inc/footer-template"); ?>
			</div>
		</div>
	</div>
	<?php $this->load->view("inc/resource-template"); ?>
	<script src="<?= base_url() ?>public/js/moment.min.js"></script>
	<script src="<?= base_url() ?>public/js/locale.es.js"></script>
	<script src="<?= base_url() ?>public/js/bootstrap-datetimepicker.min.js"></script>
	<script>
		var generalZoom = 13;
	</script>
	<script src="<?= base_url() ?>public/js/eventos/initMapRegistro.js"></script>
	<script src="<?= base_url() ?>public/js/eventos/registroTicket.js?v=<?= date("his") ?>"></script>
	<script>
		registroEvento("<?= base_url() ?>", "<?= $region ?>");
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=<?= getenv('MAP_KEY') ?>&libraries=places&callback=initMap" async defer></script>


</body>

</html>