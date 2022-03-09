<?php 
		
			require_once "../reportes/conexion.php";
			require_once "../PHPEXCEL/Classes/PHPExcel.php";

			$periodo1='ENERO '.date("Y", strtotime("this Year")).' - AGOSTO '.date("Y", strtotime("this Year"));
			$periodo2='ABRIL '.date("Y", strtotime("this Year")).' - OCTUBRE '.date("Y", strtotime("this Year"));
			$periodo3='AGOSTO '.date("Y", strtotime("this Year")).' - ENERO '.date("Y", strtotime("next Year"));
			$periodo4='OCTUBRE '.date("Y", strtotime("this Year")).' - ABRIL '.date("Y", strtotime("next Year"));

			
			$consulta=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=1 AND lc=0 AND periodo='$periodo1'");
				$consulta->execute();
				$dato = $consulta->fetch();
			
			$consulta2=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=2 AND lc=0 AND periodo='$periodo1'");
				$consulta2->execute();
				$dato2 = $consulta2->fetch();
				
			
			$consulta3=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=3 AND lc=0 AND periodo='$periodo1'");
				$consulta3->execute();
				$dato3 = $consulta3->fetch();
				
			
			$consulta4=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=4 AND lc=0 AND periodo='$periodo1'");
				$consulta4->execute();
				$dato4 = $consulta4->fetch();
				
			
			$consulta5=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=5 AND lc=0 AND periodo='$periodo1'");
				$consulta5->execute();
				$dato5 = $consulta5->fetch();
				
			
			$consulta6=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=6 AND lc=0 AND periodo='$periodo1'");
				$consulta6->execute();
				$dato6 = $consulta6->fetch();
				


			$consulta7=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=1 AND lc=0 AND periodo='$periodo2'");
				$consulta7->execute();
				$dato7 = $consulta7->fetch();
				
			
			$consulta8=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=2 AND lc=0 AND periodo='$periodo2'");
				$consulta8->execute();
				$dato8 = $consulta8->fetch();
				
			
			$consulta9=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=3 AND lc=0 AND periodo='$periodo2'");
				$consulta9->execute();
				$dato9 = $consulta9->fetch();
				
			
			$consulta10=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=4 AND lc=0 AND periodo='$periodo2'");
				$consulta10->execute();
				$dato10 = $consulta10->fetch();
				
			
			$consulta11=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=5 AND lc=0 AND periodo='$periodo2'");
				$consulta11->execute();
				$dato11 = $consulta11->fetch();
				
			
			$consulta12=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=6 AND lc=0 AND periodo='$periodo2'");
				$consulta12->execute();
				$dato12 = $consulta12->fetch();
				

						
			$consulta13=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=1 AND lc=0 AND periodo='$periodo3'");
				$consulta13->execute();
				$dato13 = $consulta13->fetch();
				
			
			$consulta14=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=2 AND lc=0 AND periodo='$periodo3'");
				$consulta14->execute();
				$dato14 = $consulta14->fetch();
				
			
			$consulta15=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=3 AND lc=0 AND periodo='$periodo3'");
				$consulta15->execute();
				$dato15 = $consulta15->fetch();
				
			
			$consulta16=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=4 AND lc=0 AND periodo='$periodo3'");
				$consulta16->execute();
				$dato16 = $consulta16->fetch();
				
			
			$consulta17=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=5 AND lc=0 AND periodo='$periodo3'");
				$consulta17->execute();
				$dato17 = $consulta17->fetch();
				
			
			$consulta18=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=6 AND lc=0 AND periodo='$periodo3'");
				$consulta18->execute();
				$dato18 = $consulta18->fetch();
				


			$consulta19=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=1 AND lc=0 AND periodo='$periodo4'");
				$consulta19->execute();
				$dato19 = $consulta19->fetch();
				
			
			$consulta20=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=2 AND lc=0 AND periodo='$periodo4'");
				$consulta20->execute();
				$dato20 = $consulta20->fetch();
				
			
			$consulta21=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=3 AND lc=0 AND periodo='$periodo4'");
				$consulta21->execute();
				$dato21 = $consulta21->fetch();
				
			
			$consulta22=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=4 AND lc=0 AND periodo='$periodo4'");
				$consulta22->execute();
				$dato22 = $consulta22->fetch();
				
			
			$consulta23=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=5 AND lc=0 AND periodo='$periodo4'");
				$consulta23->execute();
				$dato23 = $consulta23->fetch();
				
			
			$consulta24=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=6 AND lc=0 AND periodo='$periodo4'");
				$consulta24->execute();
				$dato24 = $consulta24->fetch();

			$consulta25=$mbd->prepare("SELECT COUNT(lc) FROM curso_asesorias WHERE id_idioma=1 AND lc=1 AND periodo='$periodo1'");
				$consulta25->execute();
				$dato25 = $consulta25->fetch();
			$consulta26=$mbd->prepare("SELECT COUNT(lc) FROM curso_asesorias WHERE id_idioma=1 AND lc=1 AND periodo='$periodo2'");
				$consulta26->execute();
				$dato26 = $consulta26->fetch();
			$consulta27=$mbd->prepare("SELECT COUNT(lc) FROM curso_asesorias WHERE id_idioma=1 AND lc=1 AND periodo='$periodo3'");
				$consulta27->execute();
				$dato27 = $consulta27->fetch();
			$consulta28=$mbd->prepare("SELECT COUNT(lc) FROM curso_asesorias WHERE id_idioma=1 AND lc=1 AND periodo='$periodo4'");
				$consulta28->execute();
				$dato28 = $consulta28->fetch();

			$consulta29=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE periodo='$periodo1'");
				$consulta29->execute();
				$dato29 = $consulta29->fetch();
			$consulta30=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE periodo='$periodo2'");
				$consulta30->execute();
				$dato30 = $consulta30->fetch();
			$consulta31=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE periodo='$periodo3'");
				$consulta31->execute();
				$dato31 = $consulta31->fetch();
			$consulta32=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE periodo='$periodo4'");
				$consulta32->execute();
				$dato32 = $consulta32->fetch();

				$consulta33=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=1 AND lc=0 AND  periodo!='null'");
				$consulta33->execute();
				$dato33 = $consulta33->fetch();
				
				$consulta34=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=2 AND lc=0 AND  periodo!='null'");
				$consulta34->execute();
				$dato34 = $consulta34->fetch();
				
				$consulta35=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=3 AND lc=0 AND  periodo!='null'");
				$consulta35->execute();
				$dato35 = $consulta35->fetch();
				
				$consulta36=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=4 AND lc=0 AND  periodo!='null'");
				$consulta36->execute();
				$dato36 = $consulta36->fetch();
				
				$consulta37=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=5 AND lc=0 AND  periodo!='null'");
				$consulta37->execute();
				$dato37 = $consulta37->fetch();
				
				$consulta38=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=6 AND lc=0 AND  periodo!='null'");
				$consulta38->execute();
				$dato38 = $consulta38->fetch();

				$consulta39=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma=1 AND lc=1 AND  periodo!='null'");
				$consulta39->execute();
				$dato39 = $consulta39->fetch();

				$consulta40=$mbd->prepare("SELECT COUNT(id_curso_asesoria) FROM curso_asesorias WHERE id_idioma<=6 AND periodo!='null'");
				$consulta40->execute();
				$dato40 = $consulta40->fetch();

				$fila=2;

				$objPHPExcel = new PHPExcel();
				$objPHPExcel->getProperties()->setCreator("Centro de AutoAcceso") ->setDescription("Reporte de inscritos.");

				$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->setTitle('Reportes');

				$objPHPExcel->getActiveSheet()->setCellValue('C1','UNIVERSIDAD AUTÓNOMA DE CHIAPAS');
				$objPHPExcel->getActiveSheet()->setCellValue('C2','FACULTAD DE LENGUAS CAMPUS TUXTLA');
				$objPHPExcel->getActiveSheet()->setCellValue('D3','CENTRO DE AUTOACCESO');
				$objPHPExcel->getActiveSheet()->setCellValue('C5','CONCENTRADO DE INSCRITOS POR IDIOMA 2020');

				$objPHPExcel->getActiveSheet()->setCellValue('A8', 'Periodo');
				$objPHPExcel->getActiveSheet()->setCellValue('B8', 'Inglés');
				$objPHPExcel->getActiveSheet()->setCellValue('C8', 'Francés');
				$objPHPExcel->getActiveSheet()->setCellValue('D8', 'Alemán');
				$objPHPExcel->getActiveSheet()->setCellValue('E8', 'Italiano');
				$objPHPExcel->getActiveSheet()->setCellValue('F8', 'Chino');
				$objPHPExcel->getActiveSheet()->setCellValue('G8', 'Español');
				$objPHPExcel->getActiveSheet()->setCellValue('H8', 'Conversación Inglés (Depto.)');
				$objPHPExcel->getActiveSheet()->setCellValue('I8', 'Total');

				$objPHPExcel->getActiveSheet()->setCellValue('A9', $periodo1);
				$objPHPExcel->getActiveSheet()->setCellValue('A10', $periodo2);
				$objPHPExcel->getActiveSheet()->setCellValue('A11', $periodo3);
				$objPHPExcel->getActiveSheet()->setCellValue('A12', $periodo4);
				$objPHPExcel->getActiveSheet()->setCellValue('A13', 'Total');

				$objPHPExcel->getActiveSheet()->setCellValue('B9', $dato[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C9', $dato2[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D9', $dato3[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E9', $dato4[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F9', $dato5[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G9', $dato6[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H9', $dato25[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I9', $dato29[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('B10', $dato7[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C10', $dato8[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D10', $dato9[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E10', $dato10[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F10', $dato11[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G10', $dato12[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H10', $dato26[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I10', $dato30[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('B11', $dato13[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C11', $dato14[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D11', $dato15[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E11', $dato16[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F11', $dato17[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G11', $dato18[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H11', $dato27[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I11', $dato31[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('B12', $dato19[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C12', $dato20[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D12', $dato21[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E12', $dato22[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F12', $dato23[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G12', $dato24[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H12', $dato28[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I12', $dato32[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('B13', $dato33[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('C13', $dato34[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('D13', $dato35[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('E13', $dato36[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('F13', $dato37[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('G13', $dato38[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('H13', $dato39[0]);
				$objPHPExcel->getActiveSheet()->setCellValue('I13', $dato40[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('A16', 'IDIOMAS');
				$objPHPExcel->getActiveSheet()->setCellValue('B16', 'TOTAL');

				$objPHPExcel->getActiveSheet()->setCellValue('A17', 'Inglés');
				$objPHPExcel->getActiveSheet()->setCellValue('B17', $dato33[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('A18', 'Francés');
				$objPHPExcel->getActiveSheet()->setCellValue('B18', $dato34[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('A19', 'Alemán');
				$objPHPExcel->getActiveSheet()->setCellValue('B19', $dato35[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('A20', 'Italiano');
				$objPHPExcel->getActiveSheet()->setCellValue('B20', $dato36[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('A21', 'Chino');
				$objPHPExcel->getActiveSheet()->setCellValue('B21', $dato37[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('A22', 'Español');
				$objPHPExcel->getActiveSheet()->setCellValue('B22', $dato38[0]);

				$objPHPExcel->getActiveSheet()->setCellValue('A23', 'Conversación Inglés (Depto.)');
				$objPHPExcel->getActiveSheet()->setCellValue('B23', $dato39[0]);

				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment;filename="Reporte Inscritos '.date("Y", strtotime("this Year")).'.xlsx"');
				header('Cache-Control: max-age=0');

				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				$objWriter->save('php://output');
				exit;
	
