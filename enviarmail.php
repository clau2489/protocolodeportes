<?php
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$documento = $_POST['documento'];
$cuil = $_POST['cuil'];
$telefono = $_POST['telefono'];
$email = $_POST['mail'];
$direccion = $_POST['direccion'];
$barrio = $_POST['barrio'];
$localidad = $_POST['localidad'];
$condicion = $_POST['condicion'];


$apellido_registrado = $_POST['apellido'];
$nombre_registrado = $_POST['nombre'];
$documento_registrado = $_POST['documento'];
$direccion_registrado = $_POST['direccion'];
$condicion_registrado = $_POST['condicion'];


//librerias
require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();

//Configuracion servidor mail
$mail->From = "modernizacionmmp@gmail.com"; //remitente
$mail->FromName = "Sub-Secretaria de Modernizacion e Innovacion"; //remitente
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "smtp.gmail.com"; // servidor smtp
$mail->Port = 587; //puerto
$mail->Username ='modernizacionmmp@gmail.com'; //nombre usuario
$mail->Password = 'modernizacionmarcospaz55'; //contraseña


//Agregar destinatario	
$mail->AddAddress('clau_coronelmilla@hotmail.com');
$mail->Subject = "DDJJ Actividades Deportivas | Marcos Paz digital";
$mail->Body = " \n
Recibiste una DDJJ de Actividades Deportivas a través de http://marcospazdigital.gob.ar: \n
Apellido/s: ". $apellido ."\n
Nombre/s: ". $nombre ."\n
Documento: ". $documento ."\n
CUIL: ". $documento ."\n
Telefono de Contacto: ". $telefono ."\n
Mail: ". $email ."\n
Direccion: ". $direccion ."\n
Barrio: ". $barrio ."\n
Localidad: ". $localidad ."\n
Actividad/ Deporte: ". $condicion ."\n\n\n

Agradecemos que por favor, comparta esta información con los responsables del área\n
Muchas Gracias.

"
;
	
//le activamos el charset utf8
$mail->CharSet = 'UTF-8';
//Avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {

	require('fpdf/fpdf.php');
	error_reporting(1);
	class PDF extends FPDF
	{
		// Cabecera de página
		function Header()
		{
		    $this->Image('mmpverde.png',70,10,60,'C');
		    // Arial bold 15
		    $this->SetFont('Arial','B',28);
		    // Movernos a la derecha
		    $this->Cell(100);
		    // Salto de línea
		    $this->Ln(20);
		}

		// Pie de página
		function Footer()
		{   
		    // Posición: a 1,5 cm del final
		    $this->SetY(-12);
		    // Arial italic 8
		    $this->SetFont('Arial','B',10);
		    $this->Cell(0,10,'Municipio de Marcos Paz - Subsecretaria de Deportes ',0,0,'C');
		}
	}

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,30,'',0,1);
    $pdf->Cell(0,10,'Anexo I',0,1);
    $pdf->Cell(0,10,'DDJJ ACTIVIDADES DEPORTIVAS',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,10,'El que suscribe: '. $apellido_registrado.', '. $nombre_registrado.'  Documento Nacional de Identidad: '. $documento_registrado.' con domicilio en:  '. $direccion_registrado.' en el marco ACTIVIDADES DEPORTIVAS o ACTIVIDADES FISICAS, y en mi condicion de : '. $condicion_registrado.' encontrandome en pleno uso de mis facultades DECLARO BAJO JURAMENTO:',0,1);

	$pdf->SetFont('Arial','',8);
	$pdf->Cell(0,8,'A) CONOCER Y NOTIFICARME:',0,1);    
    $pdf->MultiCell(0,6,'Los Decretos Nacionales, Provinciales, Resoluciones y Decretos del DEM que se han emitido con posterioridad a la declaracion de la emergencia sanitaria nacional, y sus consecuentes a nivel provincial y municipal, y la normativa que exceptua actividades en funcion del aislamiento social, preventivo y obligatorio, y/o los que se dicten en el futuro',0,1);

	$pdf->Cell(0,8,'B) ADHERIRME y OBLIGARME AL CUPLIMIENTO:',0,1);    
    $pdf->MultiCell(0,6,'Expresamente las Recomendaciones para la vuelta a las actividades deportivas individuales en contexto de la pandemia aprobadas por autoridad sanitaria nacional, los parametros enunciados en el decreto que aprueba la presente DDJJ ACTIVIDADES DEPORTIVAS, y los protocolos aprobados y/o desarrollados en particular para la actividad que pretendo realizar',0,1);   

	$pdf->Cell(0,8,'C) ME RESPONSABILIZO: ',0,1);    
    $pdf->MultiCell(0,6,'De cumplir con los protocolos especificos aprobados a nivel nacional y/o provincial y/o municipal que rige la actividad deportiva; y cumplir con los lineamientos, recomendaciones, e instrucciones de la autoridad sanitaria nacional, provincial y/o municipal asi como tambien las diferentes indicaciones impartidas por el Municipio de Marcos Paz a lo largo del desarrollo de la pandemia. Las personas que se encontraren alcanzadas por las autorizaciones deberan tramitar el Certificado Unico Habilitante para Circulacion - Emergencia Covid-19 y de corresponder, el Permiso Local de Circulacion en Implementacion. Las entidades o ambitos donde se desarrolle la actividad deportiva deberan garantizar las condiciones de higiene, sanidad, seguridad y traslado. La actividad debera ser atendida o realizada, que no requieran el traslado en transporte publico. La autorizacion del desarrollo de la actividad, podra revocarse en cualquier momento cuando medien circunstancias epidemiologicas que lo ameriten y/o se constate el incumplimiento de los protocolos sanitarios.-',0,1); 

	$pdf->Cell(0,8,'D) TOMAR RAZON Y ASUMIR PLENA RESPONSABILIDAD: ',0,1);    
    $pdf->MultiCell(0,6,'De que la falta de adhesion y cumplimiento de los PROTOCOLOS SANITARIOS aprobados a nivel nacional, provincial y/o municipal o de la presentacion del PROTOCOLO ESPECIFICO PARA EL MANEJO SANITARIO DERIVADO DE LA PANDEMIA COVID 19, me hace PENALMENTE RESPONSABLE del desarrollo de la actividad sin el mencionado Protocolo y los riesgos derivados de ello. Asimismo de las sanciones que pudiere acarrear mi incumplimiento, y de la responsabilidad civil que pudiere corresponder.-',0,1);


    $fileName = 'Permiso.pdf';
    $pdf->Output($fileName, 'D');

	//header("Location:mailconfirmado.php");
} else {
	header("Location:mailnoconfirmado.php");
}

?>