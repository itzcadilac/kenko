
var globalResources = {}
function registroEvento(URI, EVENTO_CODIGO_REGION) {

	
	$(document).ready(function () {

		document.querySelectorAll('.radio-group').forEach(group => {
			group.querySelectorAll('input[type="radio"]').forEach(radio => {
				radio.addEventListener('change', function() {
					group.querySelectorAll('.radio-item').forEach(item => {
						item.classList.remove('active');
					});
					this.closest('.radio-item').classList.add('active');
				});
			});
		});

		
		var tableArticuloIngresos = $('.tableArticuloIngresos').DataTable(
			{
			  pageLength: 5,
			  lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
			  dom: 'Bfrt<"col-sm-12 inline"i> <"col-sm-12 inline"p>',
			  language: languageDatatable,
			  autoWidth: true,
			  data: [],
			  columns: [
				{ data: "idTipoParihuela" },
				{ data: "idTipoJaba" },
				{ data: "idTipoFruta" },
				{ data: "peso" },
				{ data: "jabas" },
				{
				  data: null,
				  className: "center",
				  defaultContent: `<button class="btn btn-danger btn-circle actionDelete" title="ELIMINAR" type="button">
					<i class="fa fa-trash" aria-hidden="true"></i>
				  </button>`,
				  orderable: false
				}
			  ],
			  buttons: {
				dom: {
				  container: {
					tag: 'div',
					className: 'flexcontent'
				  },
				  buttonLiner: {
					tag: null
				  }
				},
				buttons: [
				  {
					extend: 'pageLength',
					titleAttr: 'Registros a mostrar',
					className: 'selectTable'
				  }
				]
			  }
			});

		$('body').on('click', 'td button.actionDelete', function (e) {
			e.preventDefault();
			tableArticuloIngresos.row($(this).parents('tr')).remove().draw(false);
			const data = tableArticuloIngresos.rows().data();
			// if (data.length === 0) {
			// 	$('#almacen').removeAttr("disabled");
			// 	$('.btn-buscar').removeAttr("disabled");
			// }
		});
		
		$(".btn-buscar").on('click', function (event) {
			let items = {};
			var formData = ($("#formEvento").serializeArray());
			formData.forEach(element => {
				items[element.name] = element.value;
			});
			tableArticuloIngresos.rows.add([items]).draw();
        	// $("#formEvento")[0].reset();
			$("#idTipoParihuela").val("")
			$("#idTipoJaba").val("")
			$("#idTipoFruta").val("")
			$("#peso").val("")
			$("#jabas").val("")
			if(!globalResources.idCliente)
				globalResources = {
					idCliente: formData.idCliente,
					idTipoServicio: formData.idTipoServicio,
					direccion: formData.direccion,
				}
		});

		$(".btnclientSearch").on('click', function (event) {
			$("#clientData").val("");
			$("#documentType").val("");
			$("#clientId").val("");
			$("#tableArticuloModal").modal('show');
		});
		
		$(".btnActionClient").on('click', function (event) {
			const identifier = $("#clientId").val()
			$("#idCliente").val(identifier);
		});

		$("#btnDocumentSearch").on('click', function (event) {
			var documentNumber = $("#documentNumber").val();

			$.ajax({
				url: URI + "eventos/cliente",
				data: {
					type: '01',
					document: documentNumber
				},
				method: 'post',
				dataType: 'json',
				beforeSend: function () {
				},
				success: function (data) {
					const { data: { listaCliente } } = data;
					const { ape_materno, ape_paterno, documento, estado, nombres, tipdocumento, idecliente } = listaCliente[0]
					if(idecliente) {
						$("#clientData").val(nombres + ' ' + ape_paterno + ' ' + ape_materno);
						$("#clientId").val(idecliente);
						$("#documentType").val(tipdocumento);
						$("#nombcliente").val(nombres + ' ' + ape_paterno + ' ' + ape_materno);						
					}
				}
			});
		});
		
		$("#datetimepicker").datetimepicker({
			locale: 'ru',
			maxDate: moment(),
			keepOpen: false
		});
		$("#formEvento").validate({
			rules: {
				tipoEvento: { required: function () { if ($("#tipoEvento").css("display") != "none") return true; else return false; } },
				evento: { required: function () { if ($("#evento").css("display") != "none") return true; else return false; } },
				eventoDetalle: { required: function () { if ($("#eventoDetalle").css("display") != "none") return true; else return false; } },
				fechaEvento: { required: function () { if ($("#fechaEvento").css("display") != "none") return true; else return false; } },
				nivelEmergencia: { required: function () { if ($("#nivelEmergencia").css("display") != "none") return true; else return false; } },
				fuenteInicial: { required: function () { if ($("#fuenteInicial").css("display") != "none") return true; else return false; } },

				descripcionGeneral: { required: function () { if ($("#descripcionGeneral").css("display") != "none") return true; else return false; } },
				departamento: { required: function () { if ($("#departamento").css("display") != "none") return true; else return false; } },
				provincia: { required: function () { if ($("#provincia").css("display") != "none") return true; else return false; } },
				distritio: { required: function () { if ($("#distritio").css("display") != "none") return true; else return false; } },
				latitudsismo: { required: function () { if ($(".seismo").css("display") != "none") return true; else return false; } },
				longitudsismo: { required: function () { if ($(".seismo").css("display") != "none") return true; else return false; } },
				referencia: { required: function () { if ($(".seismo").css("display") != "none") return true; else return false; } },
				profundidad: { required: function () { if ($(".seismo").css("display") != "none") return true; else return false; } },
				magnitud: { required: function () { if ($(".seismo").css("display") != "none") return true; else return false; } },
				intensidad: { required: function () { if ($(".seismo").css("display") != "none") return true; else return false; } },
				eventoAsociado: { required: function () { if ($("#eventoAsociado").css("display") != "none") return true; else return false; } }
			},
			messages: {
				peso: { required: "(*) Campo Requerido" }, // tienes que agregar campos
				direccion: { required: "(*) Campo Requerido" },
				idTipoServicio: { required: "(*) Campo Requerido" },
				cantjabas: { required: "(*) Campo Requerido" },
				nombcliente: { required: "(*) Campo Requerido" },
			},
			submitHandler: function (form, event) {

				event.preventDefault();
				// var step1 = $("#v-pills-home").css("display");
				// var step2 = $("#v-pills-profile").css("display");
				// if (step1 != "none" && step2 == "none") {

				// 	$("#v-pills-home").css("display", "none");
				// 	$("#v-pills-profile").css("display", "block");
				// 	$("#v-pills-profile").addClass("show");
					
				// 	$(".nav-pills a:eq(0)").removeClass("active").addClass("disable");
				// 	$(".nav-pills a:eq(1)").removeClass("disable").addClass("active");
				// 	$("#btnEventoFinal").text("Registrar Servicio");
				// 	return false;

				// }

				var formData = ($("#formEvento").serializeArray());

				var data = {};
				formData.forEach((item, index) => {
					data[item.name] = item.value;
				});

				console.log(formData)

				// const tableDataArticulos = tableArticuloIngresos.rows().data().toArray();
				// data["idTipoParihuela"] = tableDataArticulos.map((item) => item.idTipoParihuela).join('|');
				// data["idTipoJaba"] = tableDataArticulos.map((item) => item.idTipoJaba).join('|');
				// data["idTipoFruta"] = tableDataArticulos.map((item) => item.idTipoFruta).join('|');
				// data["peso"] = tableDataArticulos.map((item) => item.peso).join('|');
				// data["jabas"] = tableDataArticulos.map((item) => item.jabas).join('|');

				const toQueryString = (params) => {
					const query = Object.keys(params).map(key => key + '=' + params[key]).join('&');
					return query;
				};

				console.log(data)


				$.ajax({
					data: toQueryString(data),
					url: URI + "eventos/eventos/registroticket",
					method: "POST",
					dataType: "json",
					beforeSend: function () {
						$("#cargando").html("<i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>");
						$("#btnEventoFinal").addClass("disabled");
						$("#message").html("");

					},
					success: function (data) {
						$("#cargando").html("<i></i>");
						var $message = "";
						if (parseInt(data.status) == 200) $message = '<div class="alert alert-success"><h4 style="margin:0">Servicio Registrado exitosamente</h4></div>';
						else $message = '<div class="alert alert-error"><h4 style="margin:0">No se pudo registrar el Servicio</h4></div>';

						$('html, body').animate({ scrollTop: 0 }, 'fast');
						$("#message").html($message);
						setTimeout(function () { $("#message").slideUp(); location.href = URI + "eventos/listaticket"; }, 3500);
					}
				});

			}
		});

		var ejecutarDepa = EVENTO_CODIGO_REGION;

		if (ejecutarDepa.length > 0) {

			$.ajax({
				data: { departamento: ejecutarDepa },
				url: URI + "eventos/main/cargarProvincias",
				method: "POST",
				dataType: "json",
				beforeSend: function () {
					$("#provincia").html('<option value="">Cargando...</option>');
					$("#distrito").html('<option value="">--Seleccione Distrito--</option>');
				},
				success: function (data) {

					var $html = '<option value="">--Seleccione Provincia--</option>';
					$.each(data.lista, function (i, e) {

						$html += '<option value="' + e.Codigo_Provincia + '">' + e.Nombre + '</option>';

					});
					$("#provincia").html($html);

				}
			});

		}

		$("#departamento").change(function () {

			var id = $(this).val();

			if (id.length > 0) {

				$.ajax({
					data: { departamento: id },
					url: URI + "eventos/main/cargarProvincias",
					method: "POST",
					dataType: "json",
					beforeSend: function () {
						$("#provincia").html('<option value="">Cargando...</option>');
						$("#distrito").html('<option value="">--Seleccione Provincia--</option>');
					},
					success: function (data) {

						var $html = '<option value="">--Seleccione Provincia--</option>';
						$.each(data.lista, function (i, e) {

							$html += '<option value="' + e.Codigo_Provincia + '">' + e.Nombre + '</option>';

						});
						$("#provincia").html($html);

					}
				});

			}
		});

		$("#provincia").change(function () {

			var id = $(this).val();
			var departamento = $("#departamento").val();

			if (id.length > 0 && departamento.length > 0) {

				$.ajax({
					data: { departamento: departamento, provincia: id },
					url: URI + "eventos/main/cargarDistritos",
					method: "POST",
					dataType: "json",
					beforeSend: function () {
						$("#distrito").html('<option value="">Cargando...</option>');
					},
					success: function (data) {

						var $html = '<option value="">--Seleccione Distrito--</option>';
						$.each(data.lista, function (i, e) {

							$html += '<option value="' + e.Codigo_Distrito + '">' + e.Nombre + '</option>';

						});
						$("#distrito").html($html);

					}
				});

			}
		});

		$("#distrito").change(function () {

			var id = $(this).val();

			if (id.length > 0) {

				$("input[name=hDepartamento]").val($("#departamento option:selected").text());
				$("input[name=hProvincia]").val($("#provincia option:selected").text());
				$("input[name=hDistrito]").val($("#distrito option:selected").text());

			}

		});

		$("#tipoEvento").change(function () {

			id = $(this).val();

			if (id.length > 0) {

				$.ajax({
					data: { tipoEvento: id },
					url: URI + "eventos/eventos/cargarEvento",
					method: "POST",
					dataType: "json",
					beforeSend: function () {
						$("#evento").html('<option value="">Cargando...</option>');
						$("#eventoDetalle").html('<option value="">-- Seleccione Detalle de Evento --</option>');
					},
					success: function (data) {

						var $html = '<option value="">--Seleccione--</option>';
						$.each(data.lista, function (i, e) {

							$html += '<option value="' + e.Evento_Codigo + '">' + e.Evento_Nombre + '</option>';

						});
						$("#evento").html($html);

					}
				});

			}

		});

		$("#evento").change(function () {

			var id = $(this).val();
			var tipoEvento = $("#tipoEvento").val();

			if (id.length > 0 && tipoEvento.length) {

				if (id == "26" && (tipoEvento == "01" || tipoEvento == "04")) $(".seismo").css("display", "inline-block");
				else $(".seismo").css("display", "none");

				$.ajax({
					data: { evento: id, tipoEvento: tipoEvento },
					url: URI + "eventos/eventos/cargarEventoDetalle",
					method: "POST",
					dataType: "json",
					beforeSend: function () {
						$("#eventoDetalle").html('<option value="">Cargando...</option>');
					},
					success: function (data) {

						var $html = '<option value="">--Seleccione--</option>';
						$.each(data.lista, function (i, e) {

							$html += '<option value="' + e.Evento_Detalle_Codigo + '">' + e.Evento_Detalle_Nombre + '</option>';

						});
						$("#eventoDetalle").html($html);

					}
				});

			}

		});

		var navListItems = $('div.setup-panel div a');
		var allWells = $(".setup-content");

		navListItems.on("click", function (e) {
			e.preventDefault();
			var $target = $($(this).attr('href')),
				$item = $(this);

			if (!$item.hasClass('disabled')) {
				navListItems.removeClass('active');
				$item.addClass('active');
				allWells.hide();
				$target.show();
			}
		});

		$("#btnCancelar").on("click", function () {

			location.href = URI + "eventos/lista";

		});

	});

}
