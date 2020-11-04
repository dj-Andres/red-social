$(document).ready(function () {
	$(document).on('click', '#registrar', (e) => {
		let correo = $('#correo').val();
		let nombre = $('#nombre').val();
		let usuario = $('#usuario').val();
		let clave = $('#clave').val();
		let funcion = "registrar";

		$.post('../controllers/controller-usuario.php', { funcion, correo, nombre, usuario, clave }, (response) => {
			if (response == 'crear') {
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: 'Bienvenido ' + usuario + '',
					showConfirmButton: false,
					timer: 2000
				})
				$('#registrar').trigger('reset');
			}else{
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'El usuario o el email ya se encuentran registrados!',
				})
			}
		})
		e.preventDefault();
	})
})