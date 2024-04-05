--Procedimiento que Devuelve el Listado de Atenciones General Debe Ejecutarse en el Boton "Ver Consolidado"
Create Procedure Listar_Consolidado_Atenciones
@Evento_Ficha_Atencion_ID Int
As
Begin
SELECT        
Convert(VarChar(10),Evento_Ficha_Atencion_Fecha,103) As Fecha,Evento_Ficha_Atencion_Detalle_Id As ID, Evento_Ficha_Atencion_Detalle_Paciente As Paciente, Evento_Ficha_Atencion_Detalle_DNI As DNI, Evento_Ficha_Atencion_Detalle_Edad As Edad, Genero, Evento_Ficha_Atencion_Detalle_Gestante As G, 
                         Evento_Ficha_Atencion_Detalle_Personal_Salud As PS, Evento_Ficha_Atencion_Detalle_Procedencia As Procedencia, Clasificacion, Evento_Ficha_Atencion_Detalle_Inicio_Sintomas As [Inicio Sintomas], Evento_Ficha_Atencion_Detalle_Dignostico As Disnostico, CIE10, 
                         CIE10_Descripcion, Evento_Ficha_Atencion_Detalle_Hora_Atencion As [Hora Atencion], Evento_Tipo_Entidad_Atencion_Nombre As Entidad, Evento_Tipo_Entidad_Atencion_Oferta_Movil_Nombre As [Oferta Movil], Evento_Ficha_Atencion_Detalle_Vacuna, 
                         Evento_Ficha_Atencion_Detalle_Quimioprofilaxis, Evento_Ficha_Atencion_Detalle_Medicamentos, Destino, Evento_Ficha_Atencion_Detalle_Lugar_Traslado As [Lugar Traslado], Evento_Ficha_Atencion_Detalle_Responsable as Responsable
FROM            Lista_Atenciones_Eventos
Where Evento_Ficha_Atencion_ID = @Evento_Ficha_Atencion_ID 
 End

 --Dentro del Consolidado que se vera en pantalla dicho sea de paso tiene que poder exportarse en Excel, debe haber un Boton para Editar el Registro en caso que se produzca un error.

 -- El Boton Reportar Ficha Debe Lanzar una Ventaba que muestre los resutados de los siguientes Scrips.
 --Un Cuadro Pequeño para esto.
Create Procedure Listar_Cantidades_Atenciones_Oferta_Movil
@Evento_Ficha_Atencion_ID Int
As
BEGIN
SELECT       
Evento_Tipo_Entidad_Atencion_Nombre As Entidad, Evento_Tipo_Entidad_Atencion_Oferta_Movil_Nombre As [Oferta Movil] ,Count(*) As Atenciones
FROM            Lista_Atenciones_Eventos
Where Evento_Ficha_Atencion_ID=@Evento_Ficha_Atencion_ID
Group By Evento_Tipo_Entidad_Atencion_Nombre,Evento_Tipo_Entidad_Atencion_Oferta_Movil_Nombre
END
--Otro Cuadro para los diagosticos.
--Este Cuadro tiene que arrojar un grafico de barras tambien
Create Procedure Listar_Cantidades_Atenciones_Diagnosticos
@Evento_Ficha_Atencion_ID Int
As
BEGIN
SELECT       
CIE10,Cie10_Descripcion ,Count(*) As Cantidad
FROM            Lista_Atenciones_Eventos
Where Evento_Ficha_Atencion_ID=@Evento_Ficha_Atencion_ID
Group By CIE10,Cie10_Descripcion
END


