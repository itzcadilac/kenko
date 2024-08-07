<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?=TITULO_PRINCIPAL?></title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="<?=AUTOR?>">
	<?php $this->load->view("inc/resources"); ?>
	<?php echo link_tag("public/css/mapa.css"); ?>
   <link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" href="<?=base_url()?>public/css/ofertamovil/nuevo.css?v=<?=date("his")?>" />
  <?php $titulo = "Registro"; ?>
</head>
<body>
	<div class="wrapper theme-2-active horizontal-nav navbar-top-blue">
	<?php $this->load->view("inc/nav"); ?>
		<div class="page-wrapper" style="min-height: 710px;">
			<div class="container pt-30">
				<div class="row heading-bg">
					<div class="col-sm-6 col-xs-12">
						<h5 class="txt-dark"><?=$titulo?></h5>
					</div>
					<div class="col-md-6 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?=base_url()?>">Inicio</a></li>
							<li><a href="<?=base_url()?>ofertamovil"><span>Dashboard</span></a></li>
							<li class="active"><span>Nuevo Registro</span></li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-xs-12">
								<div class="panel panel-default card-view pa-0">
									<div class="panel-wrapper collapse in">
										<div class="panel-body pa-10">
											<div class="container-fluid">
												<form id="formRegistrar" name="formRegistrar" method="post" autocomplete="off">
                                        			<input type="hidden" name="Pais_Procedencia_Codigo">
													<input type="hidden" name="Nombre_Codigo">
                                        			<input type="hidden" name="Evento_Tipo_Entidad_Atencion_Registro_Profesionales_ID">
													<div id="message" class="col-xs-12"></div>
													<div class="col-xs-12 col-sm-10 col-sm-offset-1">
													<div class="setup-content" id="step-1">
													<div class="clearfix"></div>
													<br />
													<br />
														<div  class="row">
        													<div class="col-xs-12">
        														<div class="form-group">
            														<label class="col-xs-12 col-sm-2">Evento</label>
            														<div class="col-xs-12 col-sm-10">        														
                														<select class="form-control" name="Evento_Tipo_Entidad_Atencion_Registro_ID">
                															<option value=""> -- Seleccione -- </option>
                                            								<?php 
                                            								    foreach($lista->result() as $row):
                                            								?>
                                            									<option value="<?=$row->id?>"><?=$row->descripcion?></option>
                                            								<?php 
                                            								    endforeach;
                                            								?>
                                            							</select>
            														</div>            													
            													</div>
																<div class="clearfix"></div>
																<br />
																<br />
																<h4>Profesional de Salud</h4>
																<br />
																<div class="row">
    																<div class="col-xs-12 col-sm-6">
                    													<div class="form-group">            														
                                    										<label class="">Nro. Documento (*)</label> 
                                    										<div class="input-group" id="error_Documento_Numero">
                                    											<input type="text" class="form-control" name="Documento_Numero" autocomplete="off">
                                    											<span class="input-group-btn">
                                    												<button type="button" id="btn-profesional" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    											</span>
                                    										</div>     													
                    													</div>
    																</div>
                                    								<div class="col-xs-12 col-sm-6">
                                    									<div class="form-group profesionales">
                                    										<label class="">Nombre</label>
                                    										<input type="text" class="form-control text-uppercase" name="Nombre" /> 
																			<div id="profesionales"></div>
                                    									</div>
                                									</div>
                            									</div>
                            									<div class="row">
                                									<div class="col-xs-12 col-sm-6">
                                										<div class="row">
                                											<div class="col-xs-12 col-sm-6">
                                    											<div class="form-group">
                                            										<label class="">Profesión</label>
                                            										<select class="form-control" name="profesion">
                                            											<option value=""> -- Seleccione -- </option>
                                            											<?php foreach($listaProfesiones->result() as $row): ?>
                                                    										<option value="<?=$row->brigadistas_profesiones_id?>"><?=$row->profesion?></option>
                                                    									<?php endforeach; ?>
                                            										</select> 
                                            									</div>
                                											</div>
                                											<div class="col-xs-12 col-sm-6">
                                    											<div class="form-group">
                                            										<label class="">Nro. Colegiatura</label>
                                            										<input type="text" class="form-control" name="Colegiatura" /> 
                                            									</div>
                                											</div>
																			<div class="col-xs-12 col-sm-6">
                                    											<div class="form-group">
                                            										<label class="">Especialidad</label>
                                            										<select class="form-control" name="brigadistas_especialidad_id">
                                            											<option value=""> -- Seleccione Profesión -- </option>
                                            										</select> 
                                            									</div>
                                											</div>
                                											<div class="col-xs-12 col-sm-6">
                                    											<div class="form-group">
                                            										<label class="">R.N.E.</label>
                                            										<input type="text" class="form-control" name="RNE" /> 
                                            									</div>
                                											</div>
                                										</div>
																		<div class="col-xs-12 col-sm-12">
																		<h4>(MEDICO EXTRANJERO EN TRAMITE)</h4>
																		<div class="row">
                                											<div class="col-xs-12">
                                    											<div class="form-group">
                                        											<label class=""><input type="checkbox" class="" name="ind_med_extranjero" /></label>
                                        										</div>
                                											</div>
                                										</div>																	
																	</div>
                                									</div>
                                									<div class="col-xs-12 col-sm-6">
                                										<div class="row">

                                										</div>
                                									</div>
                            									</div>
                            									<div class="clearfix"></div>
																<br />
																<br />
																<h4>Tipo de Atención</h4>
																<br />
                            									<div class="row" id="error_tipoAtencion">
                                									<div class="col-xs-12 col-sm-6">
                                										<div class="row flex flex-middle">
                                											<div class="col-xs-12 col-sm-5">
                                    											<div class="form-group">
                                            										<label class=""><input type="radio" name="tipoAtencion" value="1"> Ambulancia</label>
                                            									</div>
                                											</div>
                                											<div class="col-xs-12 col-sm-7" id="showPre" style="display: none">
                                    											<div class="form-group">
                                            										<select class="form-control" name="PreHospitalario_Entidad">
                                            											<option value="0">[N/A]</option>
                                            											<option value="1">SAMU</option>
                                            											<option value="2">ESSALUD</option>
                                            											<option value="3">BOMBEROS</option>
                                            											<option value="4">FF. AA.</option>
                                            											<option value="5">PNP</option>
                                            											<option value="6">OTROS</option>
                                            										</select> 
                                            									</div>
                                											</div>
                                										</div>	
                                									</div>
                                									<div class="col-xs-12 col-sm-6">
                                										<div class="row flex flex-middle">
                                											<div class="col-xs-12 col-sm-5">
                                    											<div class="form-group">
                                            										<label class=""><input type="radio" name="tipoAtencion" value="2"> PMA/Oferta Movil</label>
                                            									</div>
                                											</div>
                                											<div class="col-xs-12 col-sm-7" id="showPMA" style="display: none">
                                    											<div class="form-group">
                                            										<select class="form-control" name="Evento_Tipo_Entidad_Atencion_Oferta_Movil_ID">
                                            											<option value=""> -- Seleccione Atención -- </option>
                                            										</select> 
                                            									</div>
                                											</div>
                                										</div>
                                									</div>
                            									</div>
																<div class="clearfix"></div>
																<br />
																<br />
																<h4>Datos del Paciente</h4>
																<br />
																<div class="row">
    																<div class="col-xs-12 col-sm-6">
                                										<div class="row flex flex-middle flex-direction-xs-column">
                                											<div class="col-xs-12 col-sm-6">
                                    											<div class="form-group">
                                        											<label class="">Tipo Documento</label> 
                                        											<select class="form-control" name="Tipo_Documento_Codigo">
                                                        							<?php foreach($tipodocumento->result() as $row): ?>
                                                            							<option value="<?=$row->Tipo_Documento_Codigo?>"><?=$row->Tipo_Documento_Nombre?></option>
                                                            							<?php endforeach; ?>
                                                            						</select>
                                        										</div>
                                											</div>
                                											<div class="col-xs-12 col-sm-6">
                                												<div class="form-group">
                                													<label class="">Nro. Documento</label> 
                                            										<div class="input-group" id="error_Tipo_Documento_Numero">
                                            											<input type="text" class="form-control" name="Tipo_Documento_Numero" autocomplete="off">
                                            											<span class="input-group-btn">
                                            												<button type="button" id="btn-buscar" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
                                            											</span>
                                            										</div>
                                												</div>
                                											</div>
                                										</div>
                                									</div>
                                									<div class="col-xs-12 col-sm-6">
                                										<div class="row flex flex-middle">                                											
                                											<div class="col-xs-12">
                                    											<div class="form-group">
                                            										<label>Nombres y Apellidos</label>
                                            										<input type="text" class="form-control" name="Paciente" />
                                            									</div>
                                											</div>
                                										</div>
                                									</div>
																</div>
																<div class="row">
																	<div class="col-xs-12 col-sm-6">
																		<div class="row flex flex-middle flex-direction-xs-column">
                                											<div class="col-xs-12 col-sm-6">
                                    											<div class="form-group">
                                        											<label class="">Fecha Nacimiento</label> 
                                        											<div class='input-group date fechanacimiento'>
                                        														<input type="text" class="form-control"name="Nacimiento" />
                                        														<span class="input-group-addon">
																									<span class="glyphicon glyphicon-calendar"></span>
                                        														</span>
                                        													</div>
                                        										</div>
                                											</div>
                                											<div class="col-xs-12 col-sm-6">
                                												<div class="form-group">
                                													<label class="">Edad</label> 
                                            										<input type="text" class="form-control" name="Edad">
                                												</div>
                                											</div>
                                										</div>
																	</div>
																	<div class="col-xs-12 col-sm-6">
																		<div class="row flex flex-middle flex-direction-xs-column">
                                											<div class="col-xs-12 col-sm-6">
                                    											<div class="form-group">
                                        											<label class="">Género</label> 
                                        											<select class="form-control" name="Genero">
                                        												<option value="">-- Seleccione --</option>
                                        												<option value="1">Masculino</option>
                                        												<option value="2">Femenino</option>
                                        											</select>
                                        										</div>
                                											</div>
                                											<div class="col-xs-12 col-sm-6">
                                												<div class="form-group flex flex-middle ma-0">
                                            										<label class="flex flex-middle mr-20"><input type="checkbox" class="ma-0" name="Discapacidad"> <span>Discapacitado</span></label>  
                                													<label class="flex flex-middle" id="Gestante" style="display: none!important;"><input type="checkbox" class="ma-0" name="Gestante"> <span>Gestante</span></label>                                           											
                                												</div>
                                											</div>
                                											<div class="col-xs-12 col-sm-6" id="comboDiscapacitado" style="display: none;">
                                												<label class="">T. Discapacidad</label> 
                                    											<select class="form-control" name="Tipo_Discapacidad">
                                    												<option value="0">[N/A]</option>
                                    												<option value="1">Intelectual</option>
                                    												<option value="2">Visual</option>
                                    												<option value="3">Auditiva</option>
                                    												<option value="4">Motora</option>
                                    												<option value="5">Otros</option>
                                    											</select>
                                											</div>
                                										</div>
																	</div>															
																</div>
																<div class="row">
																	<div class="col-xs-12 col-sm-6">
																	
																		<div class="row flex flex-middle">
                                											<div class="col-xs-12">
                                    											<div class="form-group">
                                        											<label class="">Apoderado</label> 
                                        											<input type="text" class="form-control" name="Apoderado">
                                        										</div>
                                											</div>
                                										</div>
																	</div>
                        											<div class="col-xs-12 col-sm-6">
																		<div class="row flex flex-middle flex-direction-xs-column">
                                											<div class="col-xs-12 col-sm-6">
                                    											<div class="form-group paises">
                                        											<label class="">País Procedencia</label>
                                        											<input type="text" class="form-control" name="Pais_Procedencia">
																					<div id="paises"></div>
                                        										</div>
                                											</div>
                                											<div class="col-xs-12 col-sm-6">
                                												<div class="form-group">
                                													<label class="">L. Residencia</label> 
                                            										<input type="text" class="form-control" name="Lugar_Residencia">
                                												</div>
                                											</div>
                                										</div>
																	</div>
																</div>
																<div class="clearfix"></div>
																<br />
																<br />
																<h4>EVALUACIÓN DEL PACIENTE</h4>
																<br />
																<div class="row">
																	<div class="col-xs-12">
																	<h4>TE</h4>
																		<div class="row">
																			<div class="col-xs-12 d-flex flex-middle justify-content-between">
    																			<div class="form-group mr-10">
        																			<label class="">Días</label>
        																			<input type="number" class="form-control" min="0" name="Enfermedad_Dias" />
        																		</div>
        																		<div class="form-group mr-10">
        																			<label class="">Meses</label>
        																			<input type="number" class="form-control" min="0" name="Enfermedad_Meses" />
        																		</div>
        																		<div class="form-group ma-0 mr-10">
        																			<label class="">Fecha y hora inicio de síntomas</label>
        																			<div class="input-group date" data-target-input="nearest">
                                        												<div class="form-group">
                                        													<div class='input-group date datetimepicker'>
                                        														<input type="text" class="form-control"name="Fecha_Hora_Sintomas" />
                                        														<span class="input-group-addon">
																									<span class="glyphicon glyphicon-calendar"></span>
                                        														</span>
                                        													</div>
                                        												</div>
                                        											</div>
        																		</div>
        																		<div class="form-group ma-0 mr-10">
        																			<label class="">Fecha y hora de atención</label>
        																			<div class="input-group date" data-target-input="nearest">
                                        												<div class="form-group">
                                        													<div class='input-group date datetimepicker'>
                                        														<input type="text" class="form-control"name="Fecha_Hora_Atencion" />
                                        														<span class="input-group-addon">
																									<span class="glyphicon glyphicon-calendar"></span>
                                        														</span>
                                        													</div>
                                        												</div>
                                        											</div>
        																		</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-xs-12">
																		<div class="row">
																			<div class="col-xs-12 col-sm-6 col-md-2 mb-10">
																				<span class="d-flex" id="error_PA">																				
    																				<label class="d-flex flex-middle mr-10">P.A.</label>
    																				<input type="text" class="form-control" name="PA" placeholder="/" />
																				</span>
																			</div>
																			<div class="col-xs-12 col-sm-6 col-md-2 d-flex mb-10">
																				<label class="d-flex flex-middle mr-10">F.C.</label>
																				<input type="text" class="form-control" name="FC" />
																			</div>
																			<div class="col-xs-12 col-sm-6 col-md-2 d-flex mb-10">
																				<label class="d-flex flex-middle mr-10">F.R.</label>
																				<input type="text" class="form-control" name="FR" />
																			</div>
																			<div class="col-xs-12 col-sm-6 col-md-2 d-flex flex-middle mb-10">
																				<label class="d-flex flex-middle mr-10">SO2</label>
																				<input type="text" class="form-control" name="SO2" /><span class="ml-10">%</span>
																			</div>
																			<div class="col-xs-12 col-sm-6 col-md-2 d-flex flex-middle mb-10">
																				<label class="d-flex flex-middle mr-10">FIO2</label>
																				<input type="text" class="form-control" name="FIO2" /><span class="ml-10">%</span>
																			</div>
																		</div>
																	</div>
																</div>
																<br />
																<div class="row">
																	<div class="col-xs-12 col-sm-6">
																		<h4>Síntomas Respiratorios</h4>
																		<br />
																		<div class="row flex flex-middle">
                                											<div class="col-xs-12">
                                    											<div class="form-group d-flex flex-middle flex-direction-xs-column">
                                        											<label class="d-flex flex-middle mr-20 w-100-xs"><input type="checkbox" class="ma-0" name="Dificultad_Respiratoria" />Dificultad respiratoria</label>
                                        											<label class="d-flex flex-middle mr-20 w-100-xs"><input type="checkbox" class="ma-0" name="Tos" />Tos</label>
                                        											<label class="d-flex flex-middle mr-20 w-100-xs"><input type="checkbox" class="ma-0" name="Rinorrea" />Congestión Nasal</label>
                                        											<label class="d-flex flex-middle mr-10 w-100-xs"><input type="checkbox" class="ma-0" name="Fiebre" />Fiebre</label>
                                        										</div>
                                											</div>
                                										</div>																	
																		<div class="row flex flex-middle">
                                											<div class="col-xs-12">
                                    											<div class="form-group d-flex flex-middle flex-direction-xs-column">
                                        											<label class="d-flex flex-middle mr-20 w-100-xs"><input type="checkbox" class="ma-0" name="alteracion_conciencia" />Alteración de Conciencia</label>
                                        											<label class="d-flex flex-middle mr-10 w-100-xs"><input type="checkbox" class="ma-0" name="dolor_pecho" />Dolor de Pecho</label>
                                        										</div>
                                											</div>
                                										</div>	
																	</div>
																	<div class="col-xs-12 col-sm-6">
																		<h4>Síntomas Gastrointestinales</h4>
																		<br />
																		<div class="row flex flex-middle">
                                											<div class="col-xs-12">
                                    											<div class="form-group d-flex flex-middle flex-direction-xs-column">
                                        											<label class="d-flex flex-middle mr-20 w-100-xs"><input type="checkbox" class="ma-0" name="Nauseas" />Nauseas</label>
                                        											<label class="d-flex flex-middle mr-20 w-100-xs"><input type="checkbox" class="ma-0" name="Vomitos" />Vómitos</label>
                                        											<label class="d-flex flex-middle mr-20 w-100-xs"><input type="checkbox" class="ma-0" name="Dolor_Abdominal" />Dolor abdominal</label>
                                        											<label class="d-flex flex-middle mr-10 w-100-xs"><input type="checkbox" class="ma-0" name="Diarrea" />Diarrea</label>
                                        										</div>
                                											</div>
                                										</div>
																	</div>
																</div>
																<div class="row mb-10">
																	<div class="col-xs-12">
																		<h4>Síntomas otros</h4>
																		<label>Especificar</label>
																		<input type="text" class="form-control" name="Otros" />
																	</div>																
																</div>
															</div>
        												</div>
													</div>
													<div class="clearfix"></div>
													<br /> <br />
													</div>
													<div class="col-xs-12 col-sm-10 col-sm-offset-1">
														<div class="row">
															<div class="col-xs-12">
																<div class="row mb-20">														
																	<div class="col-xs-12 col-sm-12">
																		<h4>Laboratorio (RESULTADO SALE POR PAGINA  LA PAGINA OFICIAL DE INS)</h4>
																		<div class="row flex flex-middle">
																			<div class="col-xs-12">
																				<div class="form-group d-flex flex-middle ">
    																				<div class="mt-10 mr-10">
                                            											<label class="">F. Toma muestra</label>
                                            											<div class='input-group date datetimepicker'>
                                    														<input type="text" class="form-control"name="Lab_Fecha_Toma" />
                                    														<span class="input-group-addon">
																								<span class="glyphicon glyphicon-calendar"></span>
                                    														</span>
                                    													</div>
                                        											</div>
    																				<div class="mt-10 mr-10">
                                            											<label class="">F. Envío Lab.</label>
                                            											<div class='input-group date datetimepicker'>
                                    														<input type="text" class="form-control"name="Lab_Fecha_Envio" />
                                    														<span class="input-group-addon">
																								<span class="glyphicon glyphicon-calendar"></span>
                                    														</span>
                                    													</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<br />
																<div class="row">
																	<div class="col-xs-12 col-sm-12">
																		<h4>DIAGNÓSTICO</h4>
																		<br />
																		<div class="row">
																			<div class="col-xs-12 col-sm-4">
																				<h4>DIAGNÓSTICO 01</h4>
																				<div class="form-group d-flex flex-middle ">
																					<div class="form-group d-flex flex-middle flex-direction-column">
                                    													<div class="w-100">
                                            												<label class=""><input type="checkbox" class="ma-0" name="dx1_covid_01"/>NO SOSPECHOSO DE COVID 19</label>
                                            												<label class=""><input type="checkbox" class="ma-0" name="dx1_covid_02"/>SOSPECHOSO DE COVID 19 (U 07.2)</label>
                                            												<label class=""><input type="checkbox" class="ma-0" name="dx1_covid_03"/>COVID 19 (U 07.1)</label>
                                        												</div>
                                        											</div>
																				</div>
																			</div>
																			<div class="col-xs-12 col-sm-4">
																				<h4>DIAGNÓSTICO 02</h4>
																				<div class="form-group">
																					<div class="form-group">
                                    													<div class="w-100">
                                            												<label class=""><input type="checkbox" class="ma-0" name="dx2_insuficiencia"/>INSUFICIENCIA RESPIRATORIA</label><br/>
                                            												<label class=""><input type="checkbox" class="ma-0" name="dx2_neumonia"/>NEUMONÍA</label><br/>
																							<label class=""><input type="checkbox" class="ma-0" name="dx2_faringitis"/>FARINGITIS</label><br/>
																							<label class=""><input type="checkbox" class="ma-0" name="dx2_shock"/>SHOCK</label>
                                        												</div>
                                        											</div>
																				</div>
																			</div>
																			<div class="col-xs-12 col-sm-4">
																				<h4>DIAGNÓSTICO 03</h4>
																				<div class="form-group d-flex flex-middle ">
																					<div class="form-group d-flex flex-middle flex-direction-column">
                                    													<div class="w-100">
                                            												<label class=""><input type="checkbox" class="ma-0" name="dx3_hta"/>HTA</label><br/>
                                            												<label class=""><input type="checkbox" class="ma-0" name="dx3_dm"/>DM</label><br/>
																							<label class=""><input type="checkbox" class="ma-0" name="dx3_obesidad"/>OBESIDAD</label><br/>
																							<label class=""><input type="checkbox" class="ma-0" name="dx3_insuficiencia_renal"/>INSUFICIENCIA RENAL</label><br/>
																							<label class=""><input type="checkbox" class="ma-0" name="dx3_otros"/>OTROS</label>
                                        												</div>
                                        											</div>
																				</div>
																			</div>

																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-xs-12 col-sm-12">
																		<h4>DESTINO DE ALTA</h4>
																		<br />
																		<div class="row">
																			<div class="col-xs-12 col-sm-3">
																				<div class="form-group d-flex flex-middle ">
																					<div class="form-group d-flex flex-middle flex-direction-column">
                                    													<div class="w-100">
                                            												<label class=""><input type="checkbox" class="ma-0" name="aislamiento"/>AISLAMIENTO DOMICILIARIO</label>
                                        												</div>
                                        											</div>
																				</div>
																			</div>
																			<div class="col-xs-12 col-sm-3">
																				<h4>HOSPITALIZACIÓN</h4>
																				<div class="form-group">
																					<div class="form-group">
                                    													<div class="w-100">
                                            												<label class=""><input type="checkbox" class="ma-0" name="hospitalizacion"/>HOSPITALIZACIÓN</label><br/>
                                            												<label class=""><input type="checkbox" class="ma-0" name="area_interna_01"/>AREA DE EXPANSIÓN INTERNA</label><br/>
																							<label class=""><input type="checkbox" class="ma-0" name="area_externa_01"/>AREA DE EXPANSIÓN EXTERNA</label><br/>
                                        												</div>
                                        											</div>
																				</div>
																			</div>
																			<div class="col-xs-12 col-sm-3">
																				<div class="form-group d-flex flex-middle ">
																					<div class="form-group d-flex flex-middle flex-direction-column">
                                    													<div class="w-100">
                                            												<label class=""><input type="checkbox" class="ma-0" name="shock_trauma"/>SHOCK TRAUMA</label><br/>
                                        												</div>
                                        											</div>
																				</div>
																			</div>
																			<div class="col-xs-12 col-sm-3">
																				<h4>UCI</h4>
																				<div class="form-group d-flex flex-middle ">
																					<div class="form-group d-flex flex-middle flex-direction-column">
                                    													<div class="w-100">
                                            												<label class=""><input type="checkbox" class="ma-0" name="uci"/>UCI</label><br/>
                                            												<label class=""><input type="checkbox" class="ma-0" name="area_interna_02"/>AREA DE EXPANSIÓN INTERNA</label><br/>
																							<label class=""><input type="checkbox" class="ma-0" name="area_externa_02"/>AREA DE EXPANSIÓN EXTERNA</label><br/>
                                        												</div>
                                        											</div>
																				</div>
																			</div>
																			<div class="col-xs-12 col-sm-4">
																				<h4>OBSERV. DE EMERGENCIA</h4>
																				<div class="form-group d-flex flex-middle ">
																					<div class="form-group d-flex flex-middle flex-direction-column">
                                    													<div class="w-100">
                                            												<label class=""><input type="checkbox" class="ma-0" name="observacion"/>OBSERVACIÓN</label><br/>
                                            												<label class=""><input type="checkbox" class="ma-0" name="area_interna_03"/>AREA DE EXPANSIÓN INTERNA</label><br/>
																							<label class=""><input type="checkbox" class="ma-0" name="area_externa_03"/>AREA DE EXPANSIÓN EXTERNA</label><br/>
                                        												</div>
                                        											</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>																
															</div>

														</div>
													</div>
													<div class="col-xs-12 text-center">
														<button type="submit" id="btnEventoFinal"
															class="btn btn-primary">Registrar</button>
														<button type="button" id="btnCancelar"
															class="btn btn-default">Cancelar</button>
													</div>
													<div class="col-md-12 text-center" id="cargando"></div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="tableEnfermedadesModal" tabindex="-1" role="dialog" aria-labelledby="tableEnfermedadesModalLabel" aria-hidden="true">
				<input type="hidden" name="cie10-number">
				<div class="modal-dialog modal-md pt-10" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<div class="table-responsive">
    							<table class="tableEnfermedades table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    								<thead>
    									<tr>
    										<th>C&oacute;digo</th>
    										<th>Descripci&oacute;n</th>    
    									</tr>
    								</thead>
    							</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="tratamientoModal" tabindex="-1" role="dialog" aria-labelledby="tratamientoModalLabel" style="margin-top: -15px;">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
            		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">Medicamentos</h5>
                  </div>
                  <div class="modal-body text-center">
            		<form id="formRegistrarMedicamento" name="formRegistrarMedicamento" method="post" action="">
        					<input type="hidden" name="id" />
        					<div class="modal-body">
        						<h4 class="text-left">Medicamento</h4>
        						<div class="col-xs-12">
        							<div class="form-group">
        								<label class="col-xs-4 pa-10">Nombre</label>
        								<div class="col-xs-8">
            								<input type="text" class="form-control" name="nombre_medicamento" readonly>
        								</div>
        								<div class="clearfix"></div>
        							</div>
        						</div>
        						<div class="col-xs-12">
        							<div class="form-group">
        								<label class="col-xs-4 pa-10">Und. Med.</label>
        								<div class="col-xs-8">
            								<input type="text" class="form-control" name="unidad_medida" readonly>
        								</div>
        								<div class="clearfix"></div>
        							</div>
        						</div>
        						<div class="col-xs-12">
        							<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#tableMedicamentosModal">Buscar</button>
        						</div>
								<div class="clearfix"></div>
								<br />								
        						<h4 class="text-left">Dosificación</h4>
        						<div class="col-xs-12">
        							<div class="form-group">
        								<label class="col-xs-4 pa-10">Total receta</label>
        								<div class="col-xs-8">
            								<input type="text" class="form-control" name="Total">
        								</div>
        								<div class="clearfix"></div>
        							</div>
        						</div>
        						<div class="col-xs-12">
        							<div class="form-group">
        								<label class="col-xs-4 pa-10">Cantidad</label>
        								<div class="col-xs-8">
            								<input type="text" class="form-control" name="Cantidad">
        								</div>
        								<div class="clearfix"></div>
        							</div>
        						</div>
        						<div class="col-xs-12">
        							<div class="form-group">
        								<label class="col-xs-4 pa-10">Frecuencia</label>
        								<div class="col-xs-8">
            								<select class="form-control" name="Frecuencia">
            									<option value="0">[N/A]</option>
            									<option value="1">C/4H</option>
            									<option value="2">C/6H</option>
            									<option value="3">C/8H</option>
            									<option value="4">C/12H</option>
            									<option value="5">C/24H</option>
            								</select>
        								</div>
        								<div class="clearfix"></div>
        							</div>
        						</div>
        						<div class="col-xs-12">
        							<div class="form-group">
        								<label class="col-xs-4 pa-10">Via</label>
        								<div class="col-xs-8">
            								<select class="form-control" name="Via">
            									<option value="0">[N/A]</option>
            									<option value="1">Oral</option>
            									<option value="2">Sublingual</option>
            									<option value="3">Topica</option>
            									<option value="4">Transdermica</option>
            									<option value="5">Oftalmica</option>
            									<option value="6">Otica</option>
            									<option value="7">Intranasal</option>
            									<option value="8">Inhalatoria</option>
            									<option value="9">Rectal</option>
            									<option value="10">Vaginal</option>
            									<option value="11">Parental</option>
            									<option value="12">Intravenosa</option>
            									<option value="13">Intramuscular</option>
            									<option value="14">Subcutanea</option>
            								</select>
            							</div>
            							<div class="clearfix"></div>
        							</div>
        						</div>
        						<div class="col-xs-12">
        							<div class="form-group">
        								<label class="col-xs-4 pa-10">Observaciones</label>
        								<div class="col-xs-8">
            								<textarea class="form-control" name="Observaciones"></textarea>
            							</div>
            							<div class="clearfix"></div>
        							</div>
        						</div>
        					</div>
        					<div class="modal-footer">
        						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        						<button class="btn btn-primary" type="submit">Agregar</button>
        					</div>
        				</form>
                  </div>
                </div>
              </div>
            </div>
			<div class="modal fade" id="tableMedicamentosModal" tabindex="-1" role="dialog" aria-labelledby="tableMedicamentosModalLabel" aria-hidden="true">
				<input type="hidden" name="cie10-number">
				<div class="modal-dialog modal-md pt-10" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<div class="table-responsive">
    							<table class="tableMedicamentos table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    								<thead>
    									<tr>
    										<th>C&oacute;digo</th>
    										<th>Descripci&oacute;n</th>
    										<th>Unidad</th>
    									</tr>
    								</thead>
    								<tbody>
    								<?php foreach($medicamentos->result() as $row): ?>
    									<tr>
    										<td><?=$row->id?></td>
    										<td><?=$row->descripcion?></td>
    										<td><?=$row->unidad?></td>
    									</tr>
    								<?php endforeach; ?>
    								</tbody>
    							</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view("inc/footer"); ?>
			<script src="<?=base_url()?>public/js/moment.min.js"></script>
			<script src="<?=base_url()?>public/js/locale.es.js"></script>
			<script src="<?=base_url()?>public/js/bootstrap-datetimepicker.min.js"></script>
		</div>
	<script src="<?=base_url()?>public/js/ofertamovil/nuevo.js?v=<?=date("his")?>"></script>
	<script>
		var paises = '<?=$paises?>';
		var profesionales = '<?=$profesionales?>';
		nuevo("<?=base_url()?>", JSON.parse(paises), JSON.parse(profesionales));
	</script>
</body>
</html>