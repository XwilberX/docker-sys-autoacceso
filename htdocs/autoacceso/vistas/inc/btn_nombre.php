<script>
	
			var logged='<?php echo ($_SESSION['logged']); ?>';
			

function btn_cerrar_sesion(){
	
	if (logged==1) {
		document.getElementById('salirBtn').innerText = 'Cerrar sesión';

	}
}

	
</script>