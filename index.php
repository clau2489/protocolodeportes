<!DOCTYPE html>
<html lang="en">

<!-- Head --> 
<?php include("layout/head.php"); ?>


<body id="page-top">

  <!-- Header -->
  <header class="masthead d-flex">
    <div class="container text-center my-auto">
      <img src="assets/img/mmpblanco.png" width="300px">
      <br><br><br>
      <!--<h1 class="mb-1">Compro en mi Pueblo</h1> -->
      <!--<h3 class="mb-5">
        <em style="color: white;">Una forma diferente de comprar</em>
      </h3> -->
      <a class="btn btn-primary btn-sm js-scroll-trigger" href="#about">Accedé al programa</a>
    </div>
    <div class="overlay"></div>
  </header>


  <!-- About -->
  <section class="content-section" id="about">
    <div class="container">
      <div class="row"> 
          <div class="offset-md-2 col-md-8 p2 text-center">
            <img src="assets/img/ddjj.jpeg" width="100%;">
            <br>
            <br>
            <h4 class="alert-heading">Declaración Jurada de Actividades Deportivas o Actividades Físicas</h4>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="offset-md-2 col-md-8">
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Declaración Jurada Actividades Deportivas</h4>  
              <p>Complete este formulario para realizar la Declaración Jurada de Actividades Deportivas o Actividades Físicas. </p>
              <hr>
              <p class="mb-0">Luego descargue un PDF que puede presentar en caso de ser necesario.</p>
            </div>   
          </div>                                                                      
          <br>
          <div class="offset-md-2 col-md-8">
            <div class="alert alert-primary" role="alert">
              <h4 class="alert-heading">Descargá el decreto y el protocolo COVID-19</h4> 
              <hr> 
              <a href="decreto1489.pdf" target="_blank" class="bolder mb-0"><i class="fa fa-file-pdf-o"></i> DECRETO 1489</a>
              <br>              
              <a href="anexo2.pdf" target="_blank" class="bolder mb-0"><i class="fa fa-file-pdf-o"></i> PROTOCOLO COVID-19</a>
            </div>
          </div> 
          <br>          
          <div class="offset-md-2 col-md-8">
            <br>
            <form action="enviarmail.php" method="post" class="formulario">
              <h3>Completá el formulario con tus datos personales y luego seleccioná el tipo de actividad deportiva que realices</h3>
              <div class="form-group">
                <label>Apellido/s: </label>
                <input type="text" class="form-control" id="apellido" name="apellido" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
              </div>
              <div class="form-group">
                <label>Nombres: </label>
                <input type="text" class="form-control" id="nombre" name="nombre" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
              </div>
              <div class="form-group">
                <label>Número de Documento: (Sin puntos ni guiones)</label>
                <input type="number" class="form-control" id="documento" name="documento" required>
              </div>
              <div class="form-group">
                <label>Número de CUIL:  (Sin puntos ni guiones)</label>
                <input type="number" class="form-control" id="cuil" name="cuil" required>
              </div>
              <div class="form-group">
                <label>Numero de Celular: (sin 0 y 15)</label>
                <input type="number" class="form-control" id="telefono" name="telefono" maxlength="10" required>
              </div>
              <div class="form-group">
                <label>Dirección de correo electrónico: </label>
                <input type="email" class="form-control" id="mail" name="mail" required>
              </div>                         
              <div class="form-group">
                <label>Dirección y Altura: </label>
                <input type="text" class="form-control" id="direccion" name="direccion" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
              </div>
              <div class="form-group">
                <label>Barrio: </label>
                <select class="form-control" id="barrio" name="barrio" required>
                <option>Seleccionar..</option>
                  <?php
                  include("config/db.php");
                  include("config/conexion.php");
                  $id = $_GET['id'];
                  $consulta=mysqli_query($con,"select * from barrios order by nombre_barrio");
                  while($campo=mysqli_fetch_array($consulta)){
                  ?>                
                  <option value="<?php echo utf8_encode($campo[1])?>"><?php echo utf8_encode($campo[1])?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Localidad: </label>
                <select class="form-control" id="localidad" name="localidad" required>
                  <option>Seleccionar..</option>
                  <option value="Marcos Paz">Marcos Paz</option>
                </select>
              </div>
              <div class="form-group">
                <label>Deporte/ Actividad: </label>
                <select class="form-control" id="condicion" name="condicion" required>
                  <option>Seleccionar..</option>
                  <option value="DEPORTISTA FEDERADO">DEPORTISTA FEDERADO</option>
                  <option value="DEPORTISTA AMATEUR">DEPORTISTA AMATEUR</option>
                  <option value="PARTICULAR CON PROFESOR">PARTICULAR CON PROFESOR</option>
                  <option value="ENTRENADOR">ENTRENADOR</option>
                  <option value="ACTIVIDAD FISICA SIN ESPECIFICAR">ACTIVIDAD FISICA SIN ESPECIFICAR</option>
                  <option value="INSTITUCION PRIVADA O PÚBLICA">INSTITUCION PRIVADA O PÚBLICA</option>
                </select>
              </div>
              <div style="font-size: 11px">
                <h6 style="font-size: 11px"><input type="checkbox" value="1"> A) CONOCER Y NOTIFICARME:</h6>
                <p>Los Decretos Nacionales, Provinciales, Resoluciones y Decretos del DEM que se han emitido con posterioridad a la declaración de la emergencia sanitaria nacional, y sus consecuentes a nivel provincial y municipal, y la normativa que exceptúa actividades en función del aislamiento social, preventivo y obligatorio, y/o los que se dicten en el futuro </p>
                <hr>
                <h6 style="font-size: 11px"><input type="checkbox" value="1"> B) ADHERIRME y OBLIGARME AL CUPLIMIENTO:</h6>
                <p>Expresamente las “Recomendaciones para la vuelta a las actividades deportivas individuales en contexto de la pandemia” aprobadas por autoridad sanitaria nacional, los parámetros enunciados en el decreto que aprueba la presente DDJJ ACTIVIDADES DEPORTIVAS, y los protocolos aprobados y/o desarrollados en particular para la actividad que pretendo realizar</p>
                <hr>
                <h6 style="font-size: 11px"><input type="checkbox" value="1"> C) ME RESPONSABILIZO: </h6>
                <p>De cumplir con los protocolos específicos aprobados a nivel nacional y/o provincial y/o municipal que rige la actividad deportiva; y cumplir con los lineamientos, recomendaciones, e instrucciones de la autoridad sanitaria nacional, provincial y/o municipal así como también las diferentes indicaciones impartidas por el Municipio de Marcos Paz a lo largo del desarrollo de la pandemia.-<br>
                Las personas que se encontraren alcanzadas por las autorizaciones deberán tramitar el Certificado Único Habilitante para Circulación- Emergencia Covid-19 y de corresponder, el Permiso Local de Circulación en Implementación.-<br>
                Las entidades o ámbitos donde se desarrolle la actividad deportiva deberán garantizar las condiciones de higiene, sanidad, seguridad y traslado. La actividad deberá ser atendida o realizada, que no requieran el traslado en transporte público.<br>
                La autorización del desarrollo de la actividad, podrá revocarse en cualquier momento cuando medien circunstancias epidemiológicas que lo ameriten y/o se constate el incumplimiento de los protocolos sanitarios.-<br>
                </p>
                <hr>
                <h6 style="font-size: 11px"><input type="checkbox" value="1"> D) TOMAR RAZON Y ASUMIR PLENA RESPONSABILIDAD: </h6>
                <p>De que la falta de adhesión y cumplimiento de los PROTOCOLOS SANITARIOS aprobados a nivel nacional, provincial y/o municipal o de la presentación del PROTOCOLO ESPECÍFICO PARA EL MANEJO SANITARIO DERIVADO DE LA PANDEMIA COVID 19, me hace PENALMENTE RESPONSABLE del desarrollo de la actividad sin el mencionado Protocolo y los riesgos derivados de ello. Asimismo de las sanciones que pudiere acarrear mi incumplimiento, y de la responsabilidad civil que pudiere corresponder.-</p>
                <hr>                                          
                <br>
                <p style="font-size: 11px; font-weight: 400"><input type="checkbox" value="1" name="pepe" onclick="boton.disabled = !this.checked"> Declaro bajo juramento que los datos consignados en este formulario son veraces, reales y completos sin omitir ni falsear dato alguno que deba contener, siendo fiel expresión de la verdad. La presente reviste el carácter de Declaración Jurada que sirve de herramienta de prevención y cuidado, el falseamiento de los datos informados será pasible de las sanciones previstas en el artículo 292 del Código Penal de la Nación. Cualquier falsedad u omisión lo hará civil y penalmente responsable, en el marco de la normativa nacional y provincial vigente</p>                                
              </div>

              <input type="submit" class="btn btn-success btn-block" name="boton" value="Imprimir PDF y Finalizar" disabled>
            </form>
            <br>
            <a href="mailconfirmado.php" class="btn btn-primary btn-block">Clic aqui para cerrar</a>             
          </div>                             
        </div>          
        </div>          
        </div>
      </div>
    </div>
  </section> 
  <div class="text-center">
    <a href="../index.php"><i class="fa fa-arrow-circle-left" style="font-size: 40px"></i></a>
  </div>

  <?php include("layout/footer.php"); ?>

  <?php include("layout/script.php"); ?>

</body>

</html>