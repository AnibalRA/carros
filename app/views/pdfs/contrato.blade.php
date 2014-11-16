<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Contrato de renta</title>
		<link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
		<style>
	    	 @page { margin: 100px 50px;}
	    	 * { font-size: 11px;}
	    	#header{position: absolute; margin-top: -70px; width: 100%;}
	     	.left {position: absolute; float: left;}
	     	.right {position: absolute; right: 10px;}
			.center {position: absolute; width: 40%;}
			.borde { border-bottom: 1px solid #ccc; }
			.page-break {page-break-before: always; }
	     	#footer {margin: 0px; position: fixed; left: 0px; top: 600px; right: 0px;  text-align: center; }
	     	#footer { position: fixed; left: 0px; bottom: -140px; right: 0px; height: 150px;  }
	     	#footer .page:after { content: counter(page, upper-roman); }
	     	#contenido {position: absolute;text-align:justify; line-height: 15px; width: 100%}
	     	.titulo{text-align:center; margin-bottom:0px; font-size: 16px;}
	     	.table, th {border: 1px solid black; margin: 0px; padding: 5px; font-size: 14px;}
	     	.table, td {border: 1px solid black; margin: 0px; padding: 5px; font-size: 13px;}
	   </style>
	</head>
	<body>
		{{-- PAGINA 1 --}}
		<header id="header">
			<div style="width:30%;" class="left">
				<img alt="600x300" src="assets/img/logo-multiautos1.png">
			</div>
			<center class="center" style="left: 210px;">
				<h3>MULTIAUTOS S.A DE C.V</h3>
				4a. Calle Poniente Barrio San Nicolás No. 10,
				media cuadra arriab de Selectos Market
				Cojutepeque, Cuscatlán, Tel.: 2312-7350
				e-mail: multiautos.sv@gmail.com
			</center>
			<div style="width:30%;" class="right">
				<h3 class="right">CONTRATO DE ARRENDAMIENTO</h3>
				<br/>
				<p class="right">N° {{$prestamo->id}}</p>
			</div>
		</header>
		<br><br><br>
		<div id="contenido">
			<div>
				<span class="left" style="width: 50%;">{{ $prestamo->cliente->targeta_credito }}</span>
				<span class="right" style="width: 50%;">{{ date('d-m-Y', strtotime($prestamo->cliente->fecha_ven_cre)) }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 50%;">[1] TARJ.CRED.</span>
				<span class="right" style="width: 50%;">[2] FECHA DE VENCIMIENTO.</span>
			</div>
			<br/>
			<div>
				<span class="left" style="width: 50%;">{{ $prestamo->cliente->nombre }}</span>
				<span class="right" style="width: 50%;">{{ $prestamo->cliente->email }}</span>
				<br/>
				<span class="left" style="width: 50%;">[3] NOMBRE DEL CLIENTE.</span>
				<span class="right" style="width: 50%;">[4] E-mail.</span>
				<div class="borde"></div>
			</div>
			<br/>
			<div>
				<span class="left" style="width: 30%;">{{ $prestamo->cliente->fecha_nac }}</span>
				<span class="center" style="left: 210px;">{{ $prestamo->cliente->pasaporte }}</span>
				<span class="right" style="width: 30%;">{{ $prestamo->cliente->doc_unico }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 30%;">[5] FECHA DE NACIMIENTO.</span>
				<span class="center" style="left: 210px;">[6]PASAPORTE N°.</span>
				<span class="right" style="width: 30%;">[7] DOCUMENTO DE INDENTIDAD.</span>
			</div>
			<br/>
			<div>
				<span class="left" style="width: 30%;">{{ $prestamo->cliente->licencia }}</span>
				<span class="center" style="left: 210px;">{{ $prestamo->cliente->fecha_emi_lic }}</span>
				<span class="right" style="width: 30%;">{{ $prestamo->cliente->fecha_ven_lic }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 30%;">[8] LICENCIA N°.</span>
				<span class="center" style="left: 210px;">[9] FECHA DE EMISION.</span>
				<span class="right" style="width: 30%;">[10] FECHA DE VENCIMIENTO.</span>
			</div>
			<br/>
			<div>
				<span class="left">{{ $prestamo->cliente->direccion }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left">[11] DOMICIOLIO LOCAL.</span>
			</div>
			<br/>
			<div>
				<span class="left" style="width: 50%;">{{ $prestamo->cliente->telefono }}</span>
				<span class="right" style="width: 50%;">{{ $prestamo->cliente->celular }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 50%;">[12] TELEFONO.</span>
				<span class="right" style="width: 50%;">[13] CELULAR.</span>
			</div>
			<br/>
			<div>
				<span class="left">{{ $prestamo->cliente->adicional_nombre }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left">[14] DOMICIOLIO PERMANENTE.</span>
			</div>
			<br/>
			<div>
				<span class="left">{{ $prestamo->cliente->telefono_2 }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left">[15] TELEFONO.</span>
			</div>
			<br/>
			<div>
				<span class="left" style="width: 50%;">{{ $prestamo->cliente->adicional_nombre }}</span>
				<span class="right" style="width: 50%;">{{ $prestamo->cliente->doc_unico_2 }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 50%;">[16] CONDUCTOR ADICIONAL.</span>
				<span class="right" style="width: 50%;">[17] DOCUMENTO DE IDENTIDAD.</span>
			</div>
			<br/>
			<div>
				<span class="left" style="width: 30%;">{{ $prestamo->cliente->adicional_licencia }}</span>
				<span class="center" style="left: 210px;">{{ $prestamo->cliente->adicional_femilic }}</span>
				<span class="right" style="width: 30%;">{{ $prestamo->cliente->adicional_fevenlic }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 30%;">[18] LICENCIA N°.</span>
				<span class="center" style="left: 210px;">[19] FECHA DE EMISION.</span>
				<span class="right" style="width: 30%;">[20] FECHA DE VENCIMIENTO.</span>
			</div>
			<br/><br/>
			<center>
				<strong>DATOS DEL VEHICULO</strong>
			</center>
			<div class="borde"></div>
			<div>
				<span class="left" style="width: 25%;">{{ $prestamo->modelo->marca->marca }}</span>
				<span class="center" style="width: 25%; left: 179px;">{{ $prestamo->modelo->tipo->tipo }}</span>
				<span class="center" style="width: 25%;  left: 350px;">{{ $prestamo->modelo->modelo }}</span>
				<span class="right" style="width: 25%;">{{ $prestamo->modelo->año }}</span>
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 25%;">[21] MARCA.</span>
				<span class="center" style="width: 25%; left: 179px;">[22] TIPO.</span>
				<span class="center" style="width: 25%; left: 350px;">[23] MODELO.</span>
				<span class="right" style="width: 25%;">[24] AÑO.</span>
			</div>
			<br/>
			<div>
				<span class="left" style="width: 50%;">{{ $prestamo->modelo->color }}</span>
				
				<br/>
				<div class="borde"></div>
				<span class="left" style="width: 50%;">[25] COLOR.</span>
				
			</div>
			<br/>
			<ul>
				<li>TODAS LAS COBERTURAS PARA SER EFECTIVAS Y APLICABLES DEBEN CONTAR CON LA INSPECCIÓN DE LAS AUTORIDADES COMPETENTES (ASEGURADORA Y LA ARENDADA) Y CON LA INSPECCIÓN DE LA PNC.</li>
				<li>NINGUN SEGURO CUBRE PERDIDA DE TARJETA DE CIRCULACIÓN O PLACAS, NI OTROS QUE NO ESTEN SEÑALADOS DENTRO DE ESTE</li>
				<li>EL DEDUCIBLE POR PERDIDA TOTAL O ROBO ES EL 50% MÁS EL LUCRO CESANTE</li>
				<li>EL ESTADO Y CONDICIONES DEL VEHICULO SE ENCUENTRAN DETALLADOS EN LA HORA DE CONTROL ENTREDA/SALIDA</li>
				<li>ES OBLIGACIÓN DEL CLIENTE ESTAR DOS HORAS ANTES DE LA HORA Y FECHA DE DEVOLUCIÓN DEL VEHICULO, YA QUE LA INSPECCIÓN Y EN CASO DE COTIZACIÓN EN DAÑOS DEL VEHICULO PUEDEN DEMORAR</li>
			</ul>
			<br/>
			<div>
				<span class="left">[26] HA RENTADO UN VEHICULO ANTERIORMENTE EN ESTA EMPRESA.</span>
				<br/>
				<span class="left" style="width: 50%;">SI__ NO__</span>
				<span class="right" style="width: 50%;">EN QUE FECHA &nbsp;__/__/____</span>
				&nbsp; &nbsp;
			</div>
			<div>
				<span class="left">[27] EN QUE OTRA EMPRESA HA RENTADO VEHICULOS ANTERIORMENTE____________________________________________________</span>
				<br>
				<span class="left" style="width: 50%;">FECHA &nbsp;__/__/____</span>
				<span class="right" style="width: 50%;">QUE TIPO DE VEHICULO:____________________________________</span>
			</div>
			<br/>
			<span class="left" style="width: 50%;">[28] REFERENCIA PERSONAL:________________________________</span>
			<span class="right" style="width: 50%;">_______________________________TELEFONO FIJO:(___)____-____</span>
			<br/>
			<span class="left" style="width: 50%;">[29] REFERENCIA FAMILIAR:_________________________________</span>
			<span class="right" style="width: 50%;">_______________________________TELEFONO FIJO:(___)____-____</span>
			<br/>
			<span class="left" style="width: 50%;">[30] OBSERVACIONES:______________________________________</span>
			<span class="right" style="width: 50%;">___________________________________________________________</span>
			<br/>
			<span class="left" style="width: 50%;">___________________________________________________________</span>
			<span class="right" style="width: 50%;">___________________________________________________________</span>
			<br/><br/><br/>
			<div>
				<span class="left" style="width: 30%;">F._________________________________</span>
				<span class="right" style="width: 30%;">F._________________________________</span>
				<br/>
				<span class="left" style="width: 30%;"><center>Nombre y Firmade quien entrega</center></span>
				<span class="right" style="width: 30%;"><center>Nombre y Firma de quien acepta y recibe el vehículo</center></span>
			</div>
			<br/><br/>
			<div>
				<span class="center" style="left: 210px;">F._____________________________________________</span>
				<br/>
				<span class="center" style="left: 210px;"><center>Nombre y Firma de codeudor</center></span>
			</div>
			<br/><br/>
			<center>
				<strong>PAGARE SIN PROTESTO</strong>
			</center>
			<p>
				<span class="left" style="width: 50%;">Yo,________________________________________________________</span>
				<span class="right" style="width: 50%;">___________________________________________________________</span>
				<br/>
				He leído los términos y condiciones del presente contrato y lo firmo de conformidad. Debo y pagare incondicionalmente, a la orden de MULTIACTIVOS SOCIEDAD ANONIMA DE CAPITAL VARIABLE. La cantidad señalada en el apartado del valor de reposición del vehículo y en el apartado de otros cargos, ambos del presente contrato, suscrito en esta ciudad y en la fecha señalada en la página uno y cualquier otra responsabilidad que surgiera producto del presente contrato.
			</p>
			<p>
				POR ESTE COCUMENTO QUE ES UN PAGARE RECONOZCO DEBER Y ME (NOS) COMPROMETO (EMOS) A PAGAR INCODICIONALMENTE A LA ORDEN DE MUTIACTIVOS, SOCIEDAD ANONIMA DE CAPITAL VARIABLE. LA CANTIDAD QUE SE INDICA EN EL LOS APARTADOS DE VALOR DE REPOSICIÓN DEL VEHÍCULO Y EN EL APARTADO DE OTROS CARGOS EN LA FECHA SEÑALADA COMO VENCIMIENTO DEL CONTRATO ESTIPULADO EN EL MISMO, ASI MISMO DECLARO QUE HE LEIDO Y ACEPTO LOS TERMINOS Y CONDICIONES DEL CONTRATO DE RENTA, DE CUYAS CLAUSULAS RECIBO UNA COPIA (<STRONG>TERMINOS Y CONDICIONES DE ESTE CONTRATO</STRONG>) Y QUE TODOS LOS IMPORTES POR RENTA, INFRACCIONES DE TRANCITO, DAÑOS Y FALTANTES, ROBO TOTAL Y PARCIAL DEL AUTOMOVIL, LUCRO CESANTE Y CUALQUIER OTRO DERIVADO DE ESTE CONTRATO, ME PUEDE SER CARGADO Y EXIGIDO INMEDIATAMENTE EN EFECTIVO O CARGADOS A LA TARJETA DE CREDITO QUE PRESENTO EN ESTE ACTO, Y MI FIRMA AQUÍ SUSCRITA SERÁ CONSIDERADA COMO HECHA TAMBIEN EN EL PAGARE DE LA INSTITUCIÓN O CLUB DE CRÉDITO EMISORA DE DICHA TARJETA.
			</p>
			<br/><br/>
			<div>
				<span class="left" style="width: 50%;">F.______________________________________________________</span>
				<span class="right" style="width: 50%; text-align: right;">F.______________________________________________________</span>
				<br/>
				<span class="left" style="width: 50%;"><center>Nombre y Firmade quien entrega</center></span>
				<span class="right" style="width: 50%;"><center>Nombre y Firma de quien acepta y recibe el vehículo</center></span>
			</div>
			<div class="page-break"></div>
			{{-- PAGINA 2 --}}
			<center>CONTRATO DE ARRENDAMIENTO</center>
			<div>
				<ol type=I>
					<li>Multiactivos sociedad anónima de capital variable que a partir de este momento se denominara “la arrendadora” da al “arrendatario” cuyo nombre aparece  en la pagina uno de este contrato, en depósito, bajo su total responsabilidad, el vehículo y accesorios descritos en el mismo.</li>
					<li>El plazo del siguiente contrato  es el asignado en la pagina uno de este contrato, en el cual se computara en base a horas y días completos. El “arrendatario” se obliga a devolver dentro del plazo convenido el vehículo dado en depósito en la oficina de “La arrendadora” donde lo recibe , o si estuviese autorizado en las oficinas centrales o en  cualquier de sus sucursales si las hubiese o en el lugar que acordaren en el contrato. El “arrendatario” incurrirá en el delito de apropiación indebida si no devuelve el vehículo en el tiempo estipulado y desde ese momento faculta a “La arrendadora, para que pueda recoger dicho vehículo en el lugar donde se encuentre sin previa autorización judicial y queda convenido que el monto de la renta correrá hasta el momento que “la arrendadora” reciba el vehículo a su entera satisfacción y en las mismas condiciones en que se le entrego al arrendatario.</li>
					<li>El “Arrendatario” está en la obligación de depositar en la oficina central de “La Arrendadora” o en cualquiera de sus sucursales, una cantidad de dinero o la firma de uno o más pagares,  para garantizar a esta última, la reposición de faltantes o desperfectos del auto o cualquier daño  que resultare del mal uso del vehículo incluso esquelas de transito o cualquier otro. El “arrendatario” deberá cancelar cualquier cantidad de dinero que la arrendante le exija por las razones mencionadas en este mismo numeral en el momento de la devolución del vehículo para poder liquidar este contrato. </li>
					<li>El presente contrato consta de cuatropágina divida en Uno, Dos, Tres y Cuatro.</li>
					<li>El vehículo objeto de este contrato únicamente podrá ser manejado por el “arrendatario” o por el(los) conductor(es) adicional(es) autorizado(s) por él, en el apartado descrito como “conductor adicional”, pero siempre bajo la responsabilidad total de el “Arrendatario”.</li>
					<li>
						El vehículo se destinara exclusivamente al transporte del “Arrendatario” y personas que lo acompañen quedando obligados tanto El “Arrendatario” como el(los) conductor(es) adicional(es) a:
						<ol type=a>
							<li>No permitir que ninguna otra persona no autorizada por la arrendadora maneje el vehículo.</li>
							<li>No manejar sin portar su licencia de conducir vigente la cual deberá ser acorde al vehículo rentado.</li>
							<li>No manejar bajo la influencia del alcohol o efectos de estupefacientes (drogado) lícitos o ilícitos.</li>
							<li>No conducir el vehículo por caminos de difícil acceso o terrenos no apropiados al tránsito público.</li>
							<li>No hacer uso del vehículo en forma lucrativa, ya sea transportando personas o artículos salvo autorización escrita de “la arrendadora”.</li>
							<li>Obedecer la Ley General De Transito. Queda convenido que cualquier infracción cometida será pagada por cuenta del “Arrendatario”.</li>
							<li>No salir con el vehículo fuera de los limites de El Salvador, salvo autorización escrita de “La  Arrendadora”.</li>
							<li>No conducir a velocidades mayores que las permitidas de acuerdo a la ley general de transcrito vigente; Y/o violaciones al reglamento general de transito vigente.</li>
							<li>No utilizar el vehículo para remolcar otro vehículo.</li>
							<li>No sobre cargar el vehículo con relación a su capacidad o resistencia.</li>
							<li>Revisar los niveles de aceite en el motor, agua en el radiador y presión de las llantas.</li>
							<li>No utilizar el vehículo en carreras, competencias o pruebas de cualquier naturaleza o uso distinto del que se especifica en este contrato, ni para enseñanza de manejo.</li>
							<li>El “Arrendatario” deberá ser mayor de edad, igual el(los) conductor(es) adicional(es).</li>
							<li>
								Suministrar: nombre, edad, dirección e información adicional verificable.
								<br>
								Cualquier violación al uso autorizado y no respetar las obligaciones descritas anteriormente, dará por terminado automáticamente el presente contrato, así como cualquier cobertura de seguro contratado por el “Arrendatario” a “La Arrendadora”.
							</li>
						</ol>
					</li>
					<li>El “Arrendatario” responderá por los daños ocasionados al vehículo mientras este se encuentre en su poder física o jurídicamente, así como por los daños causados a personas que viajasen con el arrendatario o conductor designado en el vehículo</li>
					<li>De ocurrir un accidente, robo, desperfecto o cualquier siniestro al vehículo que amerite inspección o una alteración en cualquier taller, el “Arrendatario” tendrá que dar aviso a “La Arrendadora”, de forma prioritaria a mas tardar dos horas después de ocurrido el hecho.</li>
					<li>En caso de accidente el arrendatario no debe mover el vehículo de su posición hasta después de realizadas las inspecciones pertinentes tanto por parte policial, como  por parte de la aseguradora y por parte de la empresa caso contrario el arrendatario será responsable total de todos los daños, perjuicios y gastos asociados al siniestro o accidente sin gozar del beneficio del seguro contratado indistintamente de la cobertura que el “Arrendatario” haya contratado.</li>
					<li>En caso de robo el arrendatario debe dar aviso inmediatamente después de ocurrido el hecho a “La Arrendadora” a la aseguradora y al servicio de emergencias 911.</li>
					<li>Sera responsabilidad de“el arrendatario” pagar la renta del periodo que el vehículo pase en reparación o en trámites de reposición en concepto de lucro cesante a consecuencia de un accidente o robo.</li>
					<li>“La Arrendadora” no será responsable por pérdidas o daños de cualquier objeto que el arrendatario o cualquier otra persona deje, almacene o transporte en el vehículo, ya sea antes, durante o después de la devolución del mismo. El “Arrendatario” por este medio, asume todo riesgo por la pérdida o daño y renuncia a todo derecho o juicio en contra de “La Arrendadora” por motivo de ello y conviene en liberar a “La Arrendadora” de toda responsabilidad por todo reclamo, basado en tal perdida.</li>
					<li>El “Arrendatario” es responsable por los robos parciales y accesorios del vehículo objeto de este contrato.</li>
					<li>
						El “Arrendatario” será responsable por la pérdida de la tarjeta de circulación y placas del vehículo rentado, así como por el pago equivalente a los días de renta por el tiempo que dure su reposición en concepto de lucro cesante.
						<br>
						Autorizo a  “La Arrendadora” a realizar dichos cargos a mi tarjeta de crédito o a exigirlo por medio de pagare aun sin mi firma, bastando la aceptación de este contrato de renta.
					</li>
					<li>El arrendatario será responsable civil y penalmente de todo daño que ocasione el vehículo objeto de este contrato, en consecuencia de accidente de tránsito que intervenga este vehículo, en violación al literal VII de este contrato.</li>
					<li>En caso de desperfectos del contador del kilometraje (odómetro) en el vehículo objeto de este contrato, el “Arrendatario” debe avisar de inmediato a “La Arrendadora”para que se corrija dicho desperfecto; ambas partes convienen en que la cuota correspondiente a la renta en kilometraje se computara base de calcular un uso promedio de cuatrocientos kilómetros durante el tiempo en que el vehículo este en posesión del “Arrendatario”. Esta estipulación no será aplicable cuando la “Arrendadora” compruebe fehacientemente que el desperfecto del contador de kilometraje fue originado por causa no imputable al “Arrendatario” y que se haya recibido el aviso de dicho desperfecto en las oficinas de “La Arrendadora”.</li>
					<li>
						<strong>COBERTURA DE SEGURO.</strong> La cobertura de seguro cubre daños al vehículo arrendado. El Arrendatario acepta la protección de seguros de acuerdos a las condiciones del presente contrato, y  de las pólizas que cubren a “La Arrendadora” según sus condiciones, limitaciones y restricciones, renunciando por lo tanto a reclamaciones mayores que las indicadas en la póliza respectiva.
						<ol type=a>
							<li>El seguro cubre en caso de, hurto y/o robo y tiene un deducible estipulado por la empresa aseguradora acorde al vehículo arrendado, de 20% de participación en caso esta cobertura aplica únicamente si es comprada la cobertura adicional que cubre estos.</li>
							<li>El seguro cubre en caso de daños materiales, accidentes con automotores, pérdida total y cristales, y tiene un deducible estipulado por la empresa aseguradora acorde al vehículo arrendado, de 10% de participación. Esta cobertura aplica únicamente si es comprada la cobertura adicional que cubre estos.</li>
							<div class="page-break"></div>
							{{--PAGINA 3--}}
							<li>La cobertura cubre daños al vehículo ocasionados por accidentes de tránsito, siempre que este ocurra en circunstancias que no violan las clausulas del presente contrato y las estipuladas en los usos prohibido en el numeral VI y al igual tiene un deducible estipulado por la empresa acorde al vehículo arrendado, de 10% de participación, esta cobertura aplica únicamente si es comprada la cobertura adicional que cubre estos.</li>
							<li>La cobertura cubre daños personales, responsabilidad civil, únicamente si es comprado la cobertura adicional que cubre estos daños.</li>
							<li>Daños que el “Arrendatario” pueda ocasionar a terceros (lesiones corporales,  daños a la propiedad ajena) durante la vigencia del contrato esta cobertura aplica únicamente si es comprada la cobertura adicional que cubre estos.</li>
							<li>La cobertura no cubre daños por mal uso, abuso, ignorancia, descuido o negligencia del “Arrendatario”.</li>
							<li>La cobertura de seguro básica cubre los daños a los que se refiere el literal “a” de este numeral.</li>
							<li>La cobertura de seguro Half Cover cubre los daños a los que se refiere el literal “a y b” de este numeral.</li>
							<li>La cobertura de seguro Full Cover cubre los daños a los que se refiere el literal “a, b, c, d y e” de este numeral.</li>
						</ol>
					</li>
					<li>Ninguna cobertura cubre daños ocasionados en la parte de abajo del vehículo, ni por robo parcial de sus piezas o accesorios, o por daños ocultos, por lo que el “Arrendatario” se hace responsable de cubrir todo los gastos de reparación provenientes de dichas causas, responsabilizándose además por el pago de la renta durante los días que el vehículo permanezca en reparación por los mismos motivos, en concepto de lucro cesante mas los costos de traslado.</li>
					<li>
						Este seguro quedara sin efecto si los daños o perdidas ocurren:
						<ol type=a>
							<li>Porque el(los) conductor(es) intencionalmente cause(n) la pérdida o daño del vehículo.</li>
							<li>Si el vehículo es manejado por un conductor no autorizado.</li>
							<li>Durante cualquier uso prohibido del vehículo.</li>
							<li>Por proporcionar nombre, edad, dirección o información falsa.</li>
							<li>Por violar cualquier clausula de este contrato.</li>
							<li>Por estar vencido este contrato. El “Arrendatario” será responsable por cualquier daño ocurrido al vehículo, después de la fecha de vencimiento si este aun no ha devuelto el vehículo arrendado a la empresa; así como cualquier otro daño causado por este a terceras personas en sus bienes y personas por la cuales el “Arrendatario” será responsable civil y penalmente.</li>
						</ol>
					</li>
					<li>
						Queda entendido y aceptado por las partes que:
						<ol type=a>
							<li>Los daños que el “Arrendatario”pueda ocasionar a terceros (lesiones corporales,  daños a la propiedad ajena) durante la vigencia del contrato o tenencia del vehículo, será responsabilidad y a cuenta del “Arrendatario”, librando este a “La Arrendadora”, de las consecuencias que puedan originarse.</li>
							<li>La cobertura de daños por colisión y robo no cubre a él “Arrendatario” en los siguientes casos: 1) Que no presente “el arrendatario”parte policial o reporte de inspección del accidente, aun en el caso que el accidenteno sea responsabilidad de “el arrendatario” salvo que contrate el seguro Full Cober. 2) Colisión contra semovientes. 3) Colisión y fuga. 4) Danos al vehículo por caso fortuito y/o fuerza mayor. 5) Si es manejado por personas distinta a la(s) autorizada(s) en el presente contrato. 6) Si el arrendatario y/o las personas autorizadas conducen en estado de embriaguez, aliento alcohólico o bajo el efecto de drogas licitas o no que lo incapacitan. 7) Si el vehículo sufre daños causados mientras sea utilizado en violación de cualquiera de los términos y condiciones de este contrato. En estos caso el “Arrendatario” pagara a “La Arrendadora” y a terceros afectados a solicitud de estos, las sumas resultantes de todas las perdidas y gastos de los vehículos afectados, incluyendo el lucro cesante y/o los daños y perjuicios respectivos.8) Colisión contra objetos físicos (árbol, auto, auto estacionado, postes, hidrante, vuelco o volcadura, paredes, paredones, etc.)</li>
							<li>Ninguna cobertura que contrate cubre los casos de perdida parciales del vehículo o accesorios indistintamente estas sean consecuencia de hurto y/o robo Y/o apropiación indebida del vehículo. En estos casos el “Arrendatario” es único y total responsable y queda sujeto a los procedimientos que establezca “La Arrendadora” y a las disposiciones legales aplicables por los tribunales competentes nacionales o extranjeros</li>
							<li>a)	La cobertura de daños por colisión y robo no cubre danos de cualquier naturaleza o índole producidos por golpes, objetos que caigan o se encuentren en la carretera o en las vías públicas o propiedad privada sobre el automóvil, astilladuras, reventones o ponches de neumáticos y desperfectos o problemas en los rines.</li>
						</ol>
					</li>
					<li>En caso que el automóvil sea objeto de hurto y/o robo durante la duración del presente contrato y el “Arrendatario” no ah adquirido ninguna cobertura de seguro adicional, serán solidariamente responsables el “Arrendatario” y/o la compañía suscriptora de la tarjeta de crédito a cuyos seguros se haya acogido.</li>
					<li>Para toda la controversia que se suscite con motivo de la interpretación y cumplimiento de este contrato las partes se someten a la jurisdicción de los tribunales de la ciudad donde se rente el vehículo o a consideración de “La arrendante” a los de la ciudad de San Salvador, renunciando por lo tanto a cualquier otro fuero.</li>
					<li>El “Arrendatario”  es responsable de cubrir en su totalidad los gastos en que “La arrendante” pueda incurrir producto de manchas rasguños, averías o desperfectos de cualquier índole en el interior o exterior del vehículo incluyendo malos olores u otros.</li>
					<li>El “Arrendatario” no puede usar el vehículo fuera ni a los alrededores cercanos a los limites de las fronteras de El salvador salvo previa autorización de “La Arrendadora”</li>
					<li>Yo el “Arrendatario”  autorizo cualquier tipo de monitoreo eventual o permanente relacionado al vehículo que hoy recibo de “La Arrendadora”  y soy consciente y sabedor de este.</li>
					<li>“La Arrendadora”  puede dar por terminado el presente contrato bajo cualquier sospecha o cualquier otro motivo, sin  previa notificación y desde ya queda facultada “La arrendadora”, para que pueda recoger dicho vehículo en el lugar donde se encuentre y sin previa autorización judicial quedando convenido que el monto de la renta correrá hasta el momento que “la arrendadora” reciba el vehículo a su entera satisfacción y en las mismas condiciones en que se le entrego al arrendatario.</li>
					<li>El  “Arrendatario”  está obligado a no intervenir ni obstruir cualquier tipo de verificación del vehículo que la  “La Arrendadora” estime necesaria por cualquier causa.</li>
					<li>El conductor adicional también acepta y asume como codeudor solidario todas las responsabilidades que se contraen o puedan derivarse de este contrato así mismo y reconoce como suyas las responsabilidades y obligaciones producto del presente contrato.</li>
				</ol>
				<span class="left" style="width: 50%;">Yo (Nosotros),______________________________________________</span>
				<span class="right" style="width: 50%;">___________________________________________________________</span>
				<br/>
				He (Hemos) leído, entiendo y acepto las condiciones detalladas en el presente contrato.
				<br/><br/><br/><br/>
				<div>
					<span class="left" style="width: 50%;">F.______________________________________________________</span>
					<span class="right" style="width: 50%; text-align: right;">F.______________________________________________________</span>
					<br/>
					<span class="left" style="width: 50%;"><center>ARRENDATARIO</center></span>
					<span class="right" style="width: 50%;"><center>CONDUCTOR ADICIONAL</center></span>
				</div>
			</div>
		</div>
	</body>
</html>