
function idioma_mostrar(){
	document.getElementById('seleccionar_idioma1').style.display="block";
}

function idioma_ocultar(){
	document.getElementById('seleccionar_idioma1').style.display="none";
}

function idioma_mostrar1(){
	document.getElementById('seleccionar_idioma2').style.display="block";
}

function idioma_ocultar1(){
	document.getElementById('seleccionar_idioma2').style.display="none";
}

function idioma_mostrar2(){
	document.getElementById('seleccionar_idioma3').style.display="block";
}

function idioma_ocultar2(){
	document.getElementById('seleccionar_idioma3').style.display="none";
}

function horario_asesorias_mostrar(){
	document.getElementById('horariosAsesorias').style.display="block";
}

function horario_asesorias_ocultar(){
	document.getElementById('horariosAsesorias').style.display="none";
}

function botones_asesores_mostrar(){
	document.getElementById('btnsAsesoresDiv').style.display="block";
}

function botones_asesores_ocultar(){
	document.getElementById('btnsAsesoresDiv').style.display="none";
}








function horario_editar_mostrar(id,time){
	document.getElementById('horarios_asesorias_editar').style.display="block";
	
	$("#actualizar_horario_id").val(id);
	$("#tiempo_hora_asesoria").val(time);
	
		if($("#tiempo_hora_asesoria").val()=="1"){
			document.getElementById('horario_asesoria_edit2').style.display="block";
			document.getElementById('horario_asesoria_edit').style.display="none";
	    }else{	        
			document.getElementById('horario_asesoria_edit').style.display="block";
			document.getElementById('horario_asesoria_edit2').style.display="none";

	    }

}

function horario_editar_ocultar(){
	document.getElementById('horarios_asesorias_editar').style.display="none";
}

function div_asesorias_mostrar(id){
	document.getElementById('seleccionarAsesoria').style.display="block";
	$("#select_asesorias").val(id);
	$.ajax({type: "POST", data: {'id':id}, url:"../../ajax/asesoriasAjax.php", success: function(result){
		$("#tBody_asesorias").html(result);
		//$("[name='FormularioAjaxAgendar']").addClass("FormularioAjax");

					  }});

}

function asesoresCoordinacion(){


	// $.ajax({type: "POST", data: {'id':id}, url:"../../ajax/asesoriasAjax.php", success: function(result){
	// 	$("#asesor_arreglo_dispo_coor").html(result);
	// 	//$("[name='FormularioAjaxAgendar']").addClass("FormularioAjax");

	// 				  }});
	if($("#idioma_arreglo_dispo_coor").val()!="0"){
		// $("#idioma_arreglo_dispo_coor").val();
	 	$("#profesores_nombre_idioma").html('');
	 	$.each(idiomas_asesores_cambio,function(key,value){
		  	if(value["idioma_asesor"]==$("#idioma_arreglo_dispo_coor").val()){
		  
		 	$('#profesores_nombre_idioma').append('<option value="'+value['id_persona']+'" selected="selected">'+value['nombre']+' '+value['apellido_paterno']+'</option>');

				 //console.log("1");
	  		}
	  	});
	}
}
/*
function botonesAsesoresIdiomaAgendar(){

	if($("#idioma_sesion_alumno").val()!="0"){
		// $("#idioma_arreglo_dispo_coor").val();
	 
	 	$.each(idiomas_asesores_cambio2,function(key,value){
		  	if(value["idioma_asesor"]==$("#idioma_sesion_alumno").val()){
		  
		 	$('#profesores_nombre_idioma').append('<option value="'+value['id_persona']+'" selected="selected">'+value['nombre']+' '+value['apellido_paterno']+'</option>');

				 //console.log("1");
	  		}
	  	});
	}
}
*/

function mostrar_dispo_dif_asesores(){
	if($("#profesores_nombre_idioma").val()!="0"){
	// console.log("1");

	// 	$.ajax({type: "POST", data: {'id_asesor_recargar':$("#profesores_nombre_idioma").val()}, url:"dispoAsesorias/", success: function(result){
	// 	location.href="";

	// }});
	//$.post( "dispoAsesorias/", {id_asesor_recargar:"#profesores_nombre_idioma").val()} );
	$.post( "../../controladores/asesoriasControlador.php", {
		id_asesor_recargar:"#profesores_nombre_idioma".val($(this).val()), 
	});
		// location.href="";
	
	//$.post( "test.php", { name: "John", time: "2pm" } );

		// $("#tBody_asesorias").html(result);
		//$("[name='FormularioAjaxAgendar']").addClass("FormularioAjax");
	}
}

function div_asesorias_ocultar(){
	document.getElementById('seleccionarAsesoria').style.display="none";
}

function agendarAsesoria(agendar_asesoria_id,fecha_asesoria){
	$("#agendar_asesoria_id").val(agendar_asesoria_id);
	$("#fecha_asesoria").val(fecha_asesoria);
	$("#id_curso_as").val($("#idioma_sesion_alumno").val());
	$("#idioma_slct80").val(idiomas_array[$("#idioma_sesion_alumno").val()]);
	
	$("#submitAgendar").click();
}



$(document).ready(function(){

	$('ul.tabsReportes li a:first').addClass('active');
	$('.ContenidoPestañaReportes article').hide();
	$('.ContenidoPestañaReportes article:first').show();
	$('ul.tabsReportes li a').click(function() {
		$('ul.tabsReportes li a').removeClass('active');
		$(this).addClass('active');
		$('.ContenidoPestañaReportes article').hide();

		var activeTab = $(this).attr('href');
		$(activeTab).show();
		return false;
	});


	$("#profesores_nombre_idioma").change(function() {

    	mostrar_dispo_dif_asesores();

	});

	$("#idioma_arreglo_dispo_coor").change(function() {

    	asesoresCoordinacion();

	});


	$("#tipo_asesoria").change(function() {

    	if($("#tipo_asesoria").val()=="1"){
            $('#slct15').show();
            $('#slct30').hide();
	    }else{
	        $('#slct30').show();
            $('#slct15').hide();
	    }

	});

	$("#idioma_sesion_alumno").change(function() {
		if($("#idioma_sesion_alumno").val()!="0"){
            $('#btnsAsesoresDiv').show();
	    }else{
	        $('#btnsAsesoresDiv').hide();
	    }

	});


	$("#nivel").change(function() {
		if($("#nivel").val()=="Estudiante UNACH"){
            $('#elegir_carrera').show();
	    }else{
	        $('#elegir_carrera').hide();
	    }

	});

	$("#residencia").change(function() {
		if($("#residencia").val()=="Nacional"){
            $('#residencia_datos').show();
	    }else{
	        $('#residencia_datos').hide();
	    }

	});

		$("#privilegios").change(function() {
		if($("#privilegios").val()=="4"){
            $('#idioma_asesor').show();
	    }else{
	        $('#idioma_asesor').hide();
	    }

	});

		$("#condicion_uno_reg").change(function() {
		if($("#condicion_uno_reg").val()=="Refuerzo"){
            $('#refuerzo1').prop('disabled', '');
	    }else{
	       $('#refuerzo1').prop('disabled', 'false');
	    }

	});

		$("#condicion_dos_reg").change(function() {
		if($("#condicion_dos_reg").val()=="Refuerzo"){
            $('#refuerzo2').prop('disabled', '');
	    }else{
	       $('#refuerzo2').prop('disabled', 'false');
	    }

	});

		$("#condicion_tres_reg").change(function() {
		if($("#condicion_tres_reg").val()=="Refuerzo"){
            $('#refuerzo3').prop('disabled', '');
	    }else{
	       $('#refuerzo3').prop('disabled', 'false');
	    }

	});

		$("#condicion_cuatro_reg").change(function() {
		if($("#condicion_cuatro_reg").val()=="Refuerzo"){
            $('#refuerzo4').prop('disabled', '');
	    }else{
	       $('#refuerzo4').prop('disabled', 'false');
	    }

	});

		$("#nivel1").change(function() {
		if($("#nivel1").val()=="1" || $("#nivel1").val()=="Ubicación" || $("#nivel1").val()==""){
	       $('#fecha_termino_reg1').prop('disabled', 'false');
	    }else{
            $('#fecha_termino_reg1').prop('disabled', '');
	    }

	});

		$("#nivel2").change(function() {
		if($("#nivel2").val()=="1" || $("#nivel2").val()=="Ubicación" || $("#nivel2").val()==""){
	       $('#fecha_termino_reg2').prop('disabled', 'false');
	    }else{
            $('#fecha_termino_reg2').prop('disabled', '');
	    }

	});

		$("#nivel3").change(function() {
		if($("#nivel3").val()=="1" || $("#nivel3").val()=="Ubicación" || $("#nivel3").val()==""){
	       $('#fecha_termino_reg3').prop('disabled', 'false');
	    }else{
            $('#fecha_termino_reg3').prop('disabled', '');
	    }

	});

		$("#nivel4").change(function() {
		if($("#nivel4").val()=="1" || $("#nivel4").val()=="Ubicación" || $("#nivel4").val()==""){
	       $('#fecha_termino_reg4').prop('disabled', 'false');
	    }else{
            $('#fecha_termino_reg4').prop('disabled', '');
	    }

	});

		$('input[type=radio][name=activarLink]').change(function() {

		if(this.value=="activate"){
			//alert(this.value);
	       $('#inputLink').prop('disabled', false);
	       $('#btnLink').prop('disabled', false);
	    }else{
            $('#inputLink').prop('disabled', true);
            $('#btnLink').prop('disabled', true);
	    }

	});


		$('input[type=radio][name=unico_rango]').change(function() {

		if(this.value=="Rango"){
			//alert(this.value);
	       $('#horarios_asesorias2').prop('disabled', false);
	    }else{
            $('#horarios_asesorias2').prop('disabled', true);
            $('#horarios_asesorias2').val($('#horarios_asesorias').val());
	    }

	});

				$('input[type=radio][name=unico_rango]').change(function() {

		if(this.value=="Rango"){
			//alert(this.value);
	       $('#horarios_asesorias2_1').prop('disabled', false);
	    }else{
            $('#horarios_asesorias2_1').prop('disabled', true);
            $('#horarios_asesorias2_1').val($('#horarios_asesorias_1').val());
	    }

	});


	$("select").change(function(){
$(this).find("option:selected").each(function() {
	var optionValue= $(this).attr("value");
	if(optionValue){
		$(".box").not("."+optionValue).hide();
		$("."+ optionValue).show();
	} 	
	else
			{
			$(".box").hide();
			}
		});
	}).change();

});

function idioma_mostrar(){
	document.getElementById('seleccionar_idioma1').style.display="block";
}

function idioma_ocultar(){
	document.getElementById('seleccionar_idioma1').style.display="none";
}

function idioma_mostrar1(){
	document.getElementById('seleccionar_idioma2').style.display="block";
}

function idioma_ocultar1(){
	document.getElementById('seleccionar_idioma2').style.display="none";
}

function idioma_mostrar2(){
	document.getElementById('seleccionar_idioma3').style.display="block";
}

function idioma_ocultar2(){
	document.getElementById('seleccionar_idioma3').style.display="none";
}


$(document).ready(function(){
	$("#nivel").change(function() {
		if($("#nivel").val()=="Estudiante UNACH"){
            $('#elegir_carrera').show();
	    }else{
	        $('#elegir_carrera').hide();
	    }

	});

	$("#residencia").change(function() {
		if($("#residencia").val()=="Nacional"){
            $('#residencia_datos').show();
	    }else{
	        $('#residencia_datos').hide();
	    }

	});

		$("#privilegios").change(function() {
		if($("#privilegios").val()=="4"){
            $('#idioma_asesor').show();
	    }else{
	        $('#idioma_asesor').hide();
	    }

	});

		$("#condicion_uno_reg").change(function() {
		if($("#condicion_uno_reg").val()=="Refuerzo"){
            $('#refuerzo1').prop('disabled', '');
	    }else{
	       $('#refuerzo1').prop('disabled', 'false');
	    }

	});

		$("#condicion_dos_reg").change(function() {
		if($("#condicion_dos_reg").val()=="Refuerzo"){
            $('#refuerzo2').prop('disabled', '');
	    }else{
	       $('#refuerzo2').prop('disabled', 'false');
	    }

	});

		$("#condicion_tres_reg").change(function() {
		if($("#condicion_tres_reg").val()=="Refuerzo"){
            $('#refuerzo3').prop('disabled', '');
	    }else{
	       $('#refuerzo3').prop('disabled', 'false');
	    }

	});

		$("#condicion_cuatro_reg").change(function() {
		if($("#condicion_cuatro_reg").val()=="Refuerzo"){
            $('#refuerzo4').prop('disabled', '');
	    }else{
	       $('#refuerzo4').prop('disabled', 'false');
	    }

	});

		$("#nivel1").change(function() {
		if($("#nivel1").val()=="1" || $("#nivel1").val()=="Ubicación" || $("#nivel1").val()==""){
	       $('#fecha_termino_reg1').prop('disabled', 'false');
	    }else{
            $('#fecha_termino_reg1').prop('disabled', '');
	    }

	});

		$("#nivel2").change(function() {
		if($("#nivel2").val()=="1" || $("#nivel2").val()=="Ubicación" || $("#nivel2").val()==""){
	       $('#fecha_termino_reg2').prop('disabled', 'false');
	    }else{
            $('#fecha_termino_reg2').prop('disabled', '');
	    }

	});

		$("#nivel3").change(function() {
		if($("#nivel3").val()=="1" || $("#nivel3").val()=="Ubicación" || $("#nivel3").val()==""){
	       $('#fecha_termino_reg3').prop('disabled', 'false');
	    }else{
            $('#fecha_termino_reg3').prop('disabled', '');
	    }

	});

		$("#nivel4").change(function() {
		if($("#nivel4").val()=="1" || $("#nivel4").val()=="Ubicación" || $("#nivel4").val()==""){
	       $('#fecha_termino_reg4').prop('disabled', 'false');
	    }else{
            $('#fecha_termino_reg4').prop('disabled', '');
	    }

	});


	$("select").change(function(){
$(this).find("option:selected").each(function() {
	var optionValue= $(this).attr("value");
	if(optionValue){
		$(".box").not("."+optionValue).hide();
		$("."+ optionValue).show();
	} 	
	else
			{
			$(".box").hide();
			}
		});
	}).change();

});

$('#cp_ins_Reg').keyup(function(e){

			  if (/\D/g.test(this.value)){
				// Filter non-digits from input value.
				this.value = this.value.replace(/\D/g, '');
			  }else{
			  	
			  	if(this.value.length==5){
			  
					  $.ajax({  type: "POST", data: {'cp':$('#cp_ins_Reg').val()}, url: "../ajax/preinscritoAjax.php", success: function(result){
					   $('#col_reg').empty();
					   $("#col_reg").append(new Option("Elige una opcion", "0"));
					   var a=result.split("&");
					   $('#municipio_ins_Reg').val(a[0]);
					   $('#estado_ins_Reg').val(a[1]);
					   console.log(a[2]);
					   var b=a[2].split("*");
					   b.pop();
					   $.each(b,function(index,value){
					   	$("#col_reg").append(new Option(value, value));
					   });
					  }});
					}
				}
			});

$('#cp_alu_reg').keyup(function(e){

			  if (/\D/g.test(this.value)){
				// Filter non-digits from input value.
				this.value = this.value.replace(/\D/g, '');
			  }else{
			  	
			  	if(this.value.length==5){
			  
					  $.ajax({  type: "POST", data: {'cp':$('#cp_alu_reg').val()}, url: "../ajax/alumnoAjax.php", success: function(result){
					   $('#col_alu_reg').empty();
					   $("#col_alu_reg").append(new Option("Elige una opcion", "0"));
					   var a=result.split("&");
					   $('#municipio_alu_reg').val(a[0]);
					   $('#estado_alu_reg').val(a[1]);
					   console.log(a[2]);
					   var b=a[2].split("*");
					   b.pop();
					   $.each(b,function(index,value){
					   	$("#col_alu_reg").append(new Option(value, value));
					   });
					  }});
					}
				}
			});


$('#cp_pers_reg').keyup(function(e){

			  if (/\D/g.test(this.value)){
				// Filter non-digits from input value.
				this.value = this.value.replace(/\D/g, '');
			  }else{
			  	
			  	if(this.value.length==5){
			  
					  $.ajax({  type: "POST", data: {'cp':$('#cp_pers_reg').val()}, url: "../ajax/usuarioAjax.php", success: function(result){
					   $('#col_reg').empty();
					   $("#col_reg").append(new Option("Elige una opcion", "0"));
					   var a=result.split("&");
					   
					   var b=a[2].split("*");
					   b.pop();
					   $.each(b,function(index,value){
					   	$("#col_reg").append(new Option(value, value));
					   });
					  }});
					}
				}
			});
/*
$("#fAjax").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    var id = $('#eliminarId').val();
    $.ajax({
           type: "POST",
           url: "../../ajax/cursoAjax.php",
           data: {'id':id}, // serializes the form's elements.
           //data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           }
         });
});
*/
function eliminar(id){
//$('#fAjax').attr("type","POST");
$('#eliminarId').val(id);
$('#eliminarIdSubm').click();
//$('#fAjax').attr("action","../../ajax/cursoAjax.php");
//$('#fAjax').submit(function(event) {
//	event.preventDefault();
//	console.log("lo que sea");
//});
//$.ajax({type: "POST", data: {'id':id}, url:"../../ajax/cursoAjax.php", success: function(result){
//		location.href="";
//alert(result);
//					  }});

}

var eye1 = document.getElementById('eye_boton1');
var eye2 = document.getElementById('eye_boton2');

var eye1_1 = document.getElementById('eye_boton1_1');
var eye2_1 = document.getElementById('eye_boton2_1');

var pass1 = document.getElementById('pass1');
var pass2 = document.getElementById('pass2');


function mostrarContraseña1(){
	if (pass1.type=="password"){ 
		pass1.type = "text";
		eye1.src = "../vistas/images/eye_ocultar.png";
	} else{
		pass1.type = "password";
		eye1.src = "../vistas/images/eye_icon.png";
	}
}

function mostrarContraseña2(){
	if (pass2.type=="password"){ 
		pass2.type = "text";
		eye2.src = "../vistas/images/eye_ocultar.png";
	} else{
		pass2.type = "password";
		eye2.src = "../vistas/images/eye_icon.png";
	}
	
}

function mostrarContraseña1_1(){
	if (pass1.type=="password"){ 
		pass1.type = "text";
		eye1_1.src = "../../vistas/images/eye_ocultar.png";
	} else{
		pass1.type = "password";
		eye1_1.src = "../../vistas/images/eye_icon.png";
	}
}

function mostrarContraseña2_1(){
	if (pass2.type=="password"){ 
		pass2.type = "text";
		eye2_1.src = "../../vistas/images/eye_ocultar.png";
	} else{
		pass2.type = "password";
		eye2_1.src = "../../vistas/images/eye_icon.png";
	}
	
}

function mostrarContraseña1_12(){
	if (pass1.type=="password"){ 
		pass1.type = "text";
		eye1_1.src = "../vistas/images/eye_ocultar.png";
	} else{
		pass1.type = "password";
		eye1_1.src = "../vistas/images/eye_icon.png";
	}
}

function mostrarContraseña2_12(){
	if (pass2.type=="password"){ 
		pass2.type = "text";
		eye2_1.src = "../vistas/images/eye_ocultar.png";
	} else{
		pass2.type = "password";
		eye2_1.src = "../vistas/images/eye_icon.png";
	}
	
}

/*
$("#fAjax").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    var id = $('#eliminarId').val();
    $.ajax({
           type: "POST",
           url: "../../ajax/cursoAjax.php",
           data: {'id':id}, // serializes the form's elements.
           //data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           }
         });
});
*/
function eliminar(id){
//$('#fAjax').attr("type","POST");
$('#eliminarId').val(id);
$('#eliminarIdSubm').click();
//$('#fAjax').attr("action","../../ajax/cursoAjax.php");
//$('#fAjax').submit(function(event) {
//	event.preventDefault();
//	console.log("lo que sea");
//});
//$.ajax({type: "POST", data: {'id':id}, url:"../../ajax/cursoAjax.php", success: function(result){
//		location.href="";
//alert(result);
//					  }});

}

var eye1 = document.getElementById('eye_boton1');
var eye2 = document.getElementById('eye_boton2');

var eye1_1 = document.getElementById('eye_boton1_1');
var eye2_1 = document.getElementById('eye_boton2_1');

var pass1 = document.getElementById('pass1');
var pass2 = document.getElementById('pass2');

var pass3 = document.getElementById('pass_pre1');
var pass4 = document.getElementById('pass_pre2');


function mostrarContraseña1(){
	if (pass1.type=="password"){ 
		pass1.type = "text";
		eye1.src = "../vistas/images/eye_ocultar.png";
	} else{
		pass1.type = "password";
		eye1.src = "../vistas/images/eye_icon.png";
	}
}

function mostrarContraseña2(){
	if (pass2.type=="password"){ 
		pass2.type = "text";
		eye2.src = "../vistas/images/eye_ocultar.png";
	} else{
		pass2.type = "password";
		eye2.src = "../vistas/images/eye_icon.png";
	}
	
}

function mostrarContraseña1_1(){
	if (pass1.type=="password"){ 
		pass1.type = "text";
		eye1_1.src = "../../vistas/images/eye_ocultar.png";
	} else{
		pass1.type = "password";
		eye1_1.src = "../../vistas/images/eye_icon.png";
	}
}

function mostrarContraseña2_1(){
	if (pass2.type=="password"){ 
		pass2.type = "text";
		eye2_1.src = "../../vistas/images/eye_ocultar.png";
	} else{
		pass2.type = "password";
		eye2_1.src = "../../vistas/images/eye_icon.png";
	}
	
}

function mostrarContraseña1_12(){
	if (pass1.type=="password"){ 
		pass1.type = "text";
		eye1_1.src = "../vistas/images/eye_ocultar.png";
	} else{
		pass1.type = "password";
		eye1_1.src = "../vistas/images/eye_icon.png";
	}
}

function mostrarContraseña2_12(){
	if (pass2.type=="password"){ 
		pass2.type = "text";
		eye2_1.src = "../vistas/images/eye_ocultar.png";
	} else{
		pass2.type = "password";
		eye2_1.src = "../vistas/images/eye_icon.png";
	}
	
}

function mostrarContraseña_pre1(){
	if (pass3.type=="password"){ 
		pass3.type = "text";
		eye1.src = "../vistas/images/eye_ocultar.png";
	} else{
		pass3.type = "password";
		eye1.src = "../vistas/images/eye_icon.png";
	}
}

function mostrarContraseña_pre2(){
	if (pass4.type=="password"){ 
		pass4.type = "text";
		eye4.src = "../vistas/images/eye_ocultar.png";
	} else{
		pass4.type = "password";
		eye2.src = "../vistas/images/eye_icon.png";
	}
	
}

