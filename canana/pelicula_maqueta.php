<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	

	<title>
	Título
	</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="bjqs.css">
	<script type="text/javascript"  src="js/jquery-1.9.1.min.js"> </script>
	<script type="text/javascript"  src="js/funciones.js"> </script>
	 <script src="js/bjqs-1.3.min.js"></script>
</head>

<body>
<div class="contenido">
		<div id="pleca">
			<span>Entrar</span>
		</div>
	<div id="menuPrincipal">
		<img src="images/logo.gif" alt="logo" width="180" height="67" id="logo"/>
		<div id="redes">
		<div id="idioma">
		ES | EN
		</div>
			<div class="formulario">
			<div class="busca">
			<img src="images/lupa.jpg" alt="lupa" width="25" height="18" />
				<form>
					<input type="text" name="suscripcion" value="Buscar">
				</form>
			</div>
			<div class="registrate">
			<img src="images/sobre.jpg" alt="sobre" width="25" height="18" />
				<form>
					<input type="text" name="suscripcion" value="Newsletter">
				</form>
			</div>
			</div>
		<img src="images/redes.gif" alt="redes" width="176" height="16" id="iconoRedes" />
		</div>
		<div id="opcionesMenuP">
			<ul>
				<li><a href="#">CANANA</a></li>
				<li  class="activoM"><a href="#">DISTRIBUCIÓN</a></li>
				<li><a href="#">PRENSA</a></li>
				<li><a href="#">EQUIPO</a></li>
			</ul>
		</div>
	</div>
<div id="borde2">
	<div id="menuSeccion">
		<ul>
			<li id="btn_sobre" rel="sobreC" class="actual">Catalogo</li>
			<li id="btn_cine" rel="cineC">Estreno</li>
		</ul>
<?php //get_header(); 
?>

	</div>
</div>
<div id="contenido">
	<div class="contenidoTemaPelicula">
		<div class="col1Datos">
			<img src="images/la_caza.jpg" alt="la_caza" width="237" height="338" class="imagenPelicula" />
			<div class="colSinopsis">
				<div class="bordeBlanco">
					<div class="tituloDatos">
						<span class="tituloIndividual">
						La Caza
						</span>
						<span class="datos">
						“The Hunt” (2011) - 115 min
						</span>
						<span class="pais">
						Dinamarca
						</span> 
					</div>
				</div>
			
				<div class="bordeBlanco">
					<div class="txtSinopsis">
						A teacher lives a lonely life, all the while struggling over his son's custody. His life slowly gets better as he finds love and receives good news from his son, but his new luck is about to be brutally 							shattered by an innocent little lie.
					</div>
				</div>
			</div>
			<div class="menuPelicula" id="menuSeccion">
				<div id="borde3">
					<ul>
						<li id="btn_trailer" rel="trailer">Ver trailer</li>
						<li id="btn_compartir" rel="compartir">Compartir</li>
						<li id="btn_press" rel="press">Press Kit</li>
					</ul>
				</div>
			</div>
			<div class="infoExtra oculto" id="trailer">
			<img src="images/video_screen.jpg" alt="video_screen" width="557" height="310" />
			<div style="clear"></div>
			</div>
			<div class="infoExtra oculto" id="compartir">
			Contenido de Compartir
			</div>
			<div class="infoExtra oculto" id="press">
			Contenido de Prensa
			</div>					
		<div style="clear"></div>
		</div>
		<div style="clear"></div>
		<div  class="colFicha">
			<div class="bordeBlancoVert">
			<div class="bordeBlanco">
			<span class="tituloFT">FICHA TÉCNICA</span>
			</div>
				<div class="bordeTablaFicha1">
					<div class="bordeTablaFicha2">	
						<table id="tablaFicha">
							<tr>
								<td>
								Director:
								</td>
								<td>
								Thomas Vinterberg
								</td>
							</tr>
							<tr>
								<td>
								Escrito por:
								</td>
								<td>
								Tobias Lindholm
								Thomas Vinterberg
								</td>
							</tr>
							<tr>
								<td>
								Edición:
								</td>
								<td>
								Anne Østerud
								Janus Billeskov 
								</td>
							</tr>
							<tr>
								<td>
								Sonido:  
								</td>
								<td>
								Charlotte Bruus 
								</td>
							</tr>
							<tr>
								<td>
								Producción:
								</td>
								<td>
								Christensen
								Zentropa
								Morten Kaufmann
								</td>
							</tr>
							<tr>
								<td>
								Reparto:
								</td>
								<td>
								Sisse Graum Jørgensen
								Thomas Vinterberg
								Mads Mikkelsen
								Thomas Bo Larsen
								Lasse Fogelstrøm
								Annika Wedderkopp
								</td>
							</tr>
		
						</table>
					</div>
				</div>
				
			</div>
			
		</div>

	</div>
	
<?php //get_footer(); 
?>
<div class="clear"></div>
<footer id="peliculaFoot">
Aviso de privacidad
</footer>
<div class="clear"></div>
</div>

</body>
</html>