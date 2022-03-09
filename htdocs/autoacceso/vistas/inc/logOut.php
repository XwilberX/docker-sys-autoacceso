<script>
	let btn_salir=document.querySelector(".btnLog2");

	btn_salir.addEventListener('click', function(e){
		e.preventDefault();

Swal.fire({
				title: '¿Estás seguro que deseas salir?',
  				text: "La sesión se cerrará y saldrás del sistema",
  				type: 'question',
  				showCancelButton: true,
  				confirmButtonColor: '#D3AA2C', 
  				cancelButtonColor: '#203552',
  				confirmButtonText: 'Sí, salir',
  				cancelButtonText: 'No, cancelar'  				
			}).then((result) => {
		if(result.value){
			
			let url="<?php echo SERVERURL; ?>ajax/loginAjax.php";
			let token='<?php echo $lc->encryption($_SESSION['token_scaa']); ?>';
			let curp='<?php echo $lc->encryption($_SESSION['curp_scaa']); ?>';

			let datos= new FormData();
			datos.append("token",token);
			datos.append("curp",curp);

			fetch(url,{
				method:'POST',
				body: datos
			})
			.then(respuesta => respuesta.json())
			.then(respuesta => {
				return alertas_ajax(respuesta);
			});
		}
	});

	});
</script>