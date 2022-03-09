<?php 
		
			require_once "../reportes/conexion.php";
			require_once "../PHPEXCEL/Classes/PHPExcel.php";

			$añoActual=date("Y", strtotime("this Year"));
			$enero=date("Y-m-01", strtotime("January"));
			$febrero=date("Y-m-01", strtotime("February"));
			$marzo=date("Y-m-01", strtotime("March"));
			$abril=date("Y-m-01", strtotime("April"));
			$mayo=date("Y-m-01", strtotime("May"));
			$junio=date("Y-m-01", strtotime("June"));
			$julio=date("Y-m-01", strtotime("July"));
			$agosto=date("Y-m-01", strtotime("August"));
			$septiembre=date("Y-m-01", strtotime("September"));
			$octubre=date("Y-m-01", strtotime("October"));
			$noviembre=date("Y-m-01", strtotime("November"));
			$diciembre=date("Y-m-01", strtotime("December"));

			$enero2=date("Y-m-t", strtotime("January"));
			$febrero2=date("Y-m-t", strtotime("February"));
			$marzo2=date("Y-m-t", strtotime("March"));
			$abril2=date("Y-m-t", strtotime("April"));
			$mayo2=date("Y-m-t", strtotime("May"));
			$junio2=date("Y-m-t", strtotime("June"));
			$julio2=date("Y-m-t", strtotime("July"));
			$agosto2=date("Y-m-t", strtotime("August"));
			$septiembre2=date("Y-m-t", strtotime("September"));
			$octubre2=date("Y-m-t", strtotime("October"));
			$noviembre2=date("Y-m-t", strtotime("November"));
			$diciembre2=date("Y-m-t", strtotime("December"));

			$consulta=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta->execute();
			$dato = $consulta->fetch();

			$consulta2=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta2->execute();
			$dato2 = $consulta2->fetch();

			$consulta3=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta3->execute();
			$dato3 = $consulta3->fetch();

			$consulta4=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta4->execute();
			$dato4 = $consulta4->fetch();

			$consulta5=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta5->execute();
			$dato5 = $consulta5->fetch();

			$consulta6=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta6->execute();
			$dato6 = $consulta6->fetch();


			$consulta7=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta7->execute();
			$dato7 = $consulta7->fetch();

			$consulta8=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta8->execute();
			$dato8 = $consulta8->fetch();

			$consulta9=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta9->execute();
			$dato9 = $consulta9->fetch();

			$consulta10=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta10->execute();
			$dato10 = $consulta10->fetch();

			$consulta11=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta11->execute();
			$dato11 = $consulta11->fetch();

			$consulta12=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta12->execute();
			$dato12 = $consulta12->fetch();


			$consulta13=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta13->execute();
			$dato13= $consulta13->fetch();

			$consulta14=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta14->execute();
			$dato14 = $consulta14->fetch();

			$consulta15=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta15->execute();
			$dato15 = $consulta15->fetch();

			$consulta16=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta16->execute();
			$dato16 = $consulta16->fetch();

			$consulta17=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta17->execute();
			$dato17 = $consulta17->fetch();

			$consulta18=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta18->execute();
			$dato18 = $consulta18->fetch();


			$consulta19=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta19->execute();
			$dato19= $consulta19->fetch();

			$consulta20=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta20->execute();
			$dato20 = $consulta20->fetch();

			$consulta21=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta21->execute();
			$dato21 = $consulta21->fetch();

			$consulta22=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta22->execute();
			$dato22 = $consulta22->fetch();

			$consulta23=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta23->execute();
			$dato23 = $consulta23->fetch();

			$consulta24=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta24->execute();
			$dato24 = $consulta24->fetch();


			$consulta25=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta25->execute();
			$dato25= $consulta25->fetch();

			$consulta26=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta26->execute();
			$dato26 = $consulta26->fetch();

			$consulta27=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta27->execute();
			$dato27 = $consulta27->fetch();

			$consulta28=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta28->execute();
			$dato28 = $consulta28->fetch();

			$consulta29=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta29->execute();
			$dato29 = $consulta29->fetch();

			$consulta30=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta30->execute();
			$dato30 = $consulta30->fetch();
			

			$consulta31=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta31->execute();
			$dato31= $consulta31->fetch();

			$consulta32=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta32->execute();
			$dato32 = $consulta32->fetch();

			$consulta33=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta33->execute();
			$dato33 = $consulta33->fetch();

			$consulta34=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta34->execute();
			$dato34 = $consulta34->fetch();

			$consulta35=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta35->execute();
			$dato35 = $consulta35->fetch();

			$consulta36=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta36->execute();
			$dato36 = $consulta36->fetch();


			$consulta37=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta37->execute();
			$dato37= $consulta37->fetch();

			$consulta38=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta38->execute();
			$dato38 = $consulta38->fetch();

			$consulta39=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta39->execute();
			$dato39 = $consulta39->fetch();

			$consulta40=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta40->execute();
			$dato40 = $consulta40->fetch();

			$consulta41=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta41->execute();
			$dato41 = $consulta41->fetch();

			$consulta42=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta42->execute();
			$dato42 = $consulta42->fetch();


			$consulta43=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta43->execute();
			$dato43= $consulta43->fetch();

			$consulta44=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta44->execute();
			$dato44 = $consulta44->fetch();

			$consulta45=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta45->execute();
			$dato45 = $consulta45->fetch();

			$consulta46=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta46->execute();
			$dato46 = $consulta46->fetch();

			$consulta47=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta47->execute();
			$dato47 = $consulta47->fetch();

			$consulta48=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta48->execute();
			$dato48 = $consulta48->fetch();


			$consulta49=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta49->execute();
			$dato49= $consulta49->fetch();

			$consulta50=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta50->execute();
			$dato50 = $consulta50->fetch();

			$consulta51=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta51->execute();
			$dato51 = $consulta51->fetch();

			$consulta52=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta52->execute();
			$dato52 = $consulta52->fetch();

			$consulta53=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta53->execute();
			$dato53 = $consulta53->fetch();

			$consulta54=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta54->execute();
			$dato54 = $consulta54->fetch();


			$consulta55=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta55->execute();
			$dato55= $consulta55->fetch();

			$consulta56=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta56->execute();
			$dato56 = $consulta56->fetch();

			$consulta57=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta57->execute();
			$dato57 = $consulta57->fetch();

			$consulta58=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta58->execute();
			$dato58 = $consulta58->fetch();

			$consulta59=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta59->execute();
			$dato59 = $consulta59->fetch();

			$consulta60=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta60->execute();
			$dato60 = $consulta60->fetch();


			$consulta61=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta61->execute();
			$dato61= $consulta61->fetch();

			$consulta62=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta62->execute();
			$dato62 = $consulta62->fetch();

			$consulta63=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta63->execute();
			$dato63 = $consulta63->fetch();

			$consulta64=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta64->execute();
			$dato64 = $consulta64->fetch();

			$consulta65=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta65->execute();
			$dato65 = $consulta65->fetch();

			$consulta66=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta66->execute();
			$dato66 = $consulta66->fetch();


			$consulta67=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta67->execute();
			$dato67= $consulta67->fetch();

			$consulta68=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta68->execute();
			$dato68 = $consulta68->fetch();

			$consulta69=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta69->execute();
			$dato69 = $consulta69->fetch();

			$consulta70=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta70->execute();
			$dato70 = $consulta70->fetch();

			$consulta71=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta71->execute();
			$dato71 = $consulta71->fetch();

			$consulta72=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta72->execute();
			$dato72 = $consulta72->fetch();

				/* TOTALES POR IDIOMA */

			$consulta73=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=1 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta73->execute();
			$dato73= $consulta73->fetch();

			$consulta74=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=2 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta74->execute();
			$dato74 = $consulta74->fetch();

			$consulta75=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=3 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta75->execute();
			$dato75 = $consulta75->fetch();

			$consulta76=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=4 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta76->execute();
			$dato76 = $consulta76->fetch();

			$consulta77=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=5 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta77->execute();
			$dato77 = $consulta77->fetch();

			$consulta78=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE curso_asesorias.id_idioma=6 AND asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta78->execute();
			$dato78 = $consulta78->fetch();

			/* TOTALES POR MES */

			$consulta79=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta79->execute();
			$dato79 = $consulta79->fetch();

			$consulta80=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta80->execute();
			$dato80 = $consulta80->fetch();

			$consulta81=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta81->execute();
			$dato81 = $consulta81->fetch();

			$consulta82=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta82->execute();
			$dato82 = $consulta82->fetch();

			$consulta83=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta83->execute();
			$dato83 = $consulta83->fetch();

			$consulta84=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta84->execute();
			$dato84 = $consulta84->fetch();

			$consulta85=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta85->execute();
			$dato85 = $consulta85->fetch();

			$consulta86=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta86->execute();
			$dato86 = $consulta86->fetch();

			$consulta87=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta87->execute();
			$dato87 = $consulta87->fetch();

			$consulta88=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta88->execute();
			$dato88 = $consulta88->fetch();

			$consulta89=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta89->execute();
			$dato89 = $consulta89->fetch();

			$consulta90=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta90->execute();
			$dato90 = $consulta90->fetch();

			$consulta91=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria WHERE asesorias.completada=1 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta91->execute();
			$dato91 = $consulta91->fetch();

			/* ASISTENCIA MENSUAL CAA */

			$consulta92=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=17 AND persona.carrera_unach!=74 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta92->execute();
			$dato92 = $consulta92->fetch();

			$consulta93=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=17 AND persona.carrera_unach!=74 AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta93->execute();
			$dato93 = $consulta93->fetch();

			$consulta94=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=17 AND persona.carrera_unach!=74 AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta94->execute();
			$dato94 = $consulta94->fetch();

			$consulta95=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=17 AND persona.carrera_unach!=74 AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta95->execute();
			$dato95 = $consulta95->fetch();

			$consulta96=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=17 AND persona.carrera_unach!=74 AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta96->execute();
			$dato96 = $consulta96->fetch();

			$consulta97=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=17 AND persona.carrera_unach!=74 AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta97->execute();
			$dato97 = $consulta97->fetch();

			$consulta98=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=17 AND persona.carrera_unach!=74 AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta98->execute();
			$dato98 = $consulta98->fetch();

			$consulta99=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=17 AND persona.carrera_unach!=74 AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta99->execute();
			$dato99 = $consulta99->fetch();

			$consulta100=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=17 AND persona.carrera_unach!=74 AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta100->execute();
			$dato100 = $consulta100->fetch();

			$consulta101=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=17 AND persona.carrera_unach!=74 AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta101->execute();
			$dato101 = $consulta101->fetch();

			$consulta102=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=17 AND persona.carrera_unach!=74 AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta102->execute();
			$dato102 = $consulta102->fetch();

			$consulta103=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=17 AND persona.carrera_unach!=74 AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta103->execute();
			$dato103 = $consulta103->fetch();

			/* ASISTENCIA MENSUAL LEI */


			$consulta104=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$enero2'");
			$consulta104->execute();
			$dato104 = $consulta104->fetch();

			$consulta105=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$febrero' AND '$febrero2'");
			$consulta105->execute();
			$dato105 = $consulta105->fetch();

			$consulta106=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$marzo' AND '$marzo2'");
			$consulta106->execute();
			$dato106 = $consulta106->fetch();

			$consulta107=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$abril' AND '$abril2'");
			$consulta107->execute();
			$dato107 = $consulta107->fetch();

			$consulta108=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$mayo' AND '$mayo2'");
			$consulta108->execute();
			$dato108 = $consulta108->fetch();

			$consulta109=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$junio' AND '$junio2'");
			$consulta109->execute();
			$dato109 = $consulta109->fetch();

			$consulta110=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$julio' AND '$julio2'");
			$consulta110->execute();
			$dato110 = $consulta110->fetch();

			$consulta111=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$agosto' AND '$agosto2'");
			$consulta111->execute();
			$dato111 = $consulta111->fetch();

			$consulta112=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$septiembre' AND '$septiembre2'");
			$consulta112->execute();
			$dato112 = $consulta112->fetch();

			$consulta113=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$octubre' AND '$octubre2'");
			$consulta113->execute();
			$dato113 = $consulta113->fetch();

			$consulta114=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$noviembre' AND '$noviembre2'");
			$consulta114->execute();
			$dato114 = $consulta114->fetch();

			$consulta115=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$diciembre' AND '$diciembre2'");
			$consulta115->execute();
			$dato115 = $consulta115->fetch();

			/* ASISTENCIA TOTAL CAA */

			$consulta116=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND persona.carrera_unach!=17 AND persona.carrera_unach!=74 AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta116->execute();
			$dato116 = $consulta116->fetch();

			/* ASISTENCIA TOTAL LEI */

			$consulta117=$mbd->prepare("SELECT COUNT(completada) FROM asesorias JOIN curso_asesorias ON asesorias.id_curso=curso_asesorias.id_curso_asesoria JOIN persona ON curso_asesorias.id_persona_alumno=persona.id_persona WHERE asesorias.completada=1 AND (persona.carrera_unach=17 OR persona.carrera_unach=74) AND asesorias.fecha_asesoria BETWEEN '$enero' AND '$diciembre2'");
			$consulta117->execute();
			$dato117 = $consulta117->fetch();
			

				$fila=2;

				$objPHPExcel = new PHPExcel();

				function cellColor($cells,$color){
				    global $objPHPExcel;

				       $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
				           'type' => PHPExcel_Style_Fill::FILL_SOLID,
				           'startcolor' => array(
				                'rgb' => $color
				           )
				       ));
				}

				cellColor('A9:M9', 'c8e4b4');
				cellColor('B26:M26', 'c8e4b4');

				cellColor('N9:N15', 'F4D03F');
				cellColor('N26:N28', 'F4D03F');

				cellColor('N16', 'FFFF00');
				cellColor('N29', 'FFFF00');
				
				$styleArray = array(
					    'font'  => array(
					        'bold'  => false,
					        'color' => array('rgb' => 'FF0000'),
					        'size'  => 11,
					        'name'  => 'Calibri'
					    ));

					
					$objPHPExcel->getActiveSheet()->getStyle('B19:AA19')->applyFromArray($styleArray);
					$objPHPExcel->getActiveSheet()->getStyle('A20')->applyFromArray($styleArray);
					
				
				$objPHPExcel->getProperties()->setCreator("Centro de AutoAcceso") ->setDescription("Reporte de inscritos.");

				$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->setTitle('Reportes');

				$objPHPExcel->getActiveSheet()->setCellValue('F2','UNIVERSIDAD AUTÓNOMA DE CHIAPAS');
				$objPHPExcel->getActiveSheet()->setCellValue('F3','FACULTAD DE LENGUAS CAMPUS TUXTLA');
				$objPHPExcel->getActiveSheet()->setCellValue('F4','CENTRO DE AUTOACCESO');
				$objPHPExcel->getActiveSheet()->setCellValue('F6','CONCENTRADO DE ASISTENCIA MENSUAL POR IDIOMA '.$añoActual.'');

				$objPHPExcel->getActiveSheet()->mergeCells('F5:J5');
				$objPHPExcel->getActiveSheet()->mergeCells('F6:J6');
				$objPHPExcel->getActiveSheet()->mergeCells('F7:J7');
				$objPHPExcel->getActiveSheet()->mergeCells('F8:J8');
				

				$objPHPExcel->getActiveSheet()->setCellValue('A9', 'IDIOMA');
				$objPHPExcel->getActiveSheet()->setCellValue('A10', 'INGLÉS');
				$objPHPExcel->getActiveSheet()->setCellValue('A11', 'FRANCÉS');
				$objPHPExcel->getActiveSheet()->setCellValue('A12', 'ALEMÁN');
				$objPHPExcel->getActiveSheet()->setCellValue('A13', 'ITALIANO');
				$objPHPExcel->getActiveSheet()->setCellValue('A14', 'CHINO');
				$objPHPExcel->getActiveSheet()->setCellValue('A15', 'ESPAÑOL');
				$objPHPExcel->getActiveSheet()->setCellValue('A16', 'TOTAL');

				$objPHPExcel->getActiveSheet()->setCellValue('A27', 'CAA');
				$objPHPExcel->getActiveSheet()->setCellValue('A28', 'LEI');
				$objPHPExcel->getActiveSheet()->setCellValue('A29', 'TOTAL');

				$objPHPExcel->getActiveSheet()->setCellValue('B9', 'ENERO');
				$objPHPExcel->getActiveSheet()->setCellValue('C9', 'FEBRERO');
				$objPHPExcel->getActiveSheet()->setCellValue('D9', 'MARZO');
				$objPHPExcel->getActiveSheet()->setCellValue('E9', 'ABRIL');
				$objPHPExcel->getActiveSheet()->setCellValue('F9', 'MAYO');
				$objPHPExcel->getActiveSheet()->setCellValue('G9', 'JUNIO');
				$objPHPExcel->getActiveSheet()->setCellValue('H9', 'JULIO');
				$objPHPExcel->getActiveSheet()->setCellValue('I9', 'AGOSTO');
				$objPHPExcel->getActiveSheet()->setCellValue('J9', 'SEPTIEMBRE');
				$objPHPExcel->getActiveSheet()->setCellValue('K9', 'OCTUBRE');
				$objPHPExcel->getActiveSheet()->setCellValue('L9', 'NOVIEMBRE');
				$objPHPExcel->getActiveSheet()->setCellValue('M9', 'DICIEMBRE');
				$objPHPExcel->getActiveSheet()->setCellValue('N9', 'TOTAL');

				$objPHPExcel->getActiveSheet()->setCellValue('B26', 'ENERO');
				$objPHPExcel->getActiveSheet()->setCellValue('C26', 'FEBRERO');
				$objPHPExcel->getActiveSheet()->setCellValue('D26', 'MARZO');
				$objPHPExcel->getActiveSheet()->setCellValue('E26', 'ABRIL');
				$objPHPExcel->getActiveSheet()->setCellValue('F26', 'MAYO');
				$objPHPExcel->getActiveSheet()->setCellValue('G26', 'JUNIO');
				$objPHPExcel->getActiveSheet()->setCellValue('H26', 'JULIO');
				$objPHPExcel->getActiveSheet()->setCellValue('I26', 'AGOSTO');
				$objPHPExcel->getActiveSheet()->setCellValue('J26', 'SEPTIEMBRE');
				$objPHPExcel->getActiveSheet()->setCellValue('K26', 'OCTUBRE');
				$objPHPExcel->getActiveSheet()->setCellValue('L26', 'NOVIEMBRE');
				$objPHPExcel->getActiveSheet()->setCellValue('M26', 'DICIEMBRE');
				$objPHPExcel->getActiveSheet()->setCellValue('N26', 'TOTAL');


				$objPHPExcel->getActiveSheet()->setCellValue('B10', $dato[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('B11', $dato2[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('B12', $dato3[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('B13', $dato4[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('B14', $dato5[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('B15', $dato6[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('B16', $dato79[0]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('C10', $dato7[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C11', $dato8[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C12', $dato9[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C13', $dato10[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C14', $dato11[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C15', $dato12[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C16', $dato80[0]);
				

				$objPHPExcel->getActiveSheet()->setCellValue('D10', $dato13[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D11', $dato14[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D12', $dato15[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D13', $dato16[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D14', $dato17[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D15', $dato18[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D16', $dato81[0]);
				

				$objPHPExcel->getActiveSheet()->setCellValue('E10', $dato19[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E11', $dato20[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E12', $dato21[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E13', $dato22[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E14', $dato23[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E15', $dato24[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E16', $dato82[0]);
				

				$objPHPExcel->getActiveSheet()->setCellValue('F10', $dato25[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F11', $dato26[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F12', $dato27[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F13', $dato28[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F14', $dato29[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F15', $dato30[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F16', $dato83[0]);
				

				$objPHPExcel->getActiveSheet()->setCellValue('G10', $dato31[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G11', $dato32[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G12', $dato33[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G13', $dato34[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G14', $dato35[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G15', $dato36[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G16', $dato84[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('H10', $dato37[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H11', $dato38[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H12', $dato39[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H13', $dato40[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H14', $dato41[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H15', $dato42[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H16', $dato85[0]);
				
				$objPHPExcel->getActiveSheet()->setCellValue('I10', $dato43[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I11', $dato44[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I12', $dato45[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I13', $dato46[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I14', $dato47[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I15', $dato48[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I16', $dato86[0]);
				

				$objPHPExcel->getActiveSheet()->setCellValue('J10', $dato49[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J11', $dato50[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J12', $dato51[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J13', $dato52[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J14', $dato53[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J15', $dato54[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J16', $dato87[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('K10', $dato55[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K11', $dato56[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K12', $dato57[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K13', $dato58[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K14', $dato59[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K15', $dato60[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K16', $dato88[0]);
				

				$objPHPExcel->getActiveSheet()->setCellValue('L10', $dato61[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L11', $dato62[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L12', $dato63[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L13', $dato64[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L14', $dato65[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L15', $dato66[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L16', $dato89[0]);
				

				$objPHPExcel->getActiveSheet()->setCellValue('M10', $dato67[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M11', $dato68[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M12', $dato69[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M13', $dato70[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M14', $dato71[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M15', $dato72[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M16', $dato90[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('N10', $dato73[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N11', $dato74[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N12', $dato75[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N13', $dato76[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N14', $dato77[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N15', $dato78[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N16', $dato91[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('B27', $dato92[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C27', $dato93[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D27', $dato94[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E27', $dato95[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F27', $dato96[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G27', $dato97[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H27', $dato98[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I27', $dato99[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J27', $dato100[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K27', $dato101[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L27', $dato102[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M27', $dato103[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N27', $dato116[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('B28', $dato104[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C28', $dato105[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D28', $dato106[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E28', $dato107[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F28', $dato108[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G28', $dato109[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H28', $dato110[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I28', $dato111[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J28', $dato112[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K28', $dato113[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L28', $dato114[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M28', $dato115[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N28', $dato117[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('B29', $dato79[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C29', $dato80[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D29', $dato81[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E29', $dato82[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F29', $dato83[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G29', $dato84[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H29', $dato85[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I29', $dato86[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('J29', $dato87[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('K29', $dato88[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('L29', $dato89[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('M29', $dato90[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('N29', $dato91[0]);


				

				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment;filename="Reporte Asistencia '.$añoActual.'.xlsx"');
				header('Cache-Control: max-age=0');

				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				$objWriter->save('php://output');
				exit;
	
