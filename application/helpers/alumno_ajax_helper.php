<script>
	
	$(document).ready(function(){

		mostrarAlumno();

		function mostrarAlumno(){

			$.ajax({

				type: 'ajax',
				url: '<?= base_url('alumno_controller/get_alumno') ?>',
				dataType: 'json',

				success: function(datos){

					var tabla = '';
					var i;
					var n = 1;

					for (i = 0; i < datos.length; i++) {

						tabla+=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].nombres+'</td>'+
						'<td>'+datos[i].apellidos+'</td>'+
						'<td>'+datos[i].nombre_sexo+'</td>'+
						'<td>'+datos[i].nombre_curso+'</td>'+
						'<td><a href="javascript:;" class="btn btn-danger btn-sm borrar" data="'+datos[i].id_alumno+'">Eliminar</a></td>'+
						'<td><a href="javascript:;" class="btn btn-info btn-sm item-edit" data="'+datos[i].id_alumno+'">Actualizar</a></td>'+
						'</td>';

						n++;
					}

					$('#tabla_alumno').html(tabla);
				}
			});
		};


		$('#tabla_alumno').on('click','.borrar',function(){

			var id = $(this).attr('action');

			$('#modalBorrar').modal('show');

			$('#btnBorrar').unbind().click(function(){

				$.ajax({

					type: 'ajax',
					method: 'post',
					url: '<?= base_url('alumno_controller/eliminar') ?>',
					data: {id:id},
					dataType: 'json',

					success: function(respuesta){

						$('#modalBorrar').modal('hide');

						if (respuesta == true) {

							alertify.notify('Se elimino exitosamente','success',10,null);
							mostrarAlumno();

						} else {

							alertify.notify('Error al eliminar','error',10,null);
						}
					}
				});
			});
		});

		$('#NuevoAlumno').click(function(){

			$('#modalGuardar').modal('show');

			$('#modalGuardar').find('.modal-title').text('Nuevo alumno');

			$('#formAlumno').attr('action','<?= base_url('alumno_controller/ingresar') ?>');
		});


		mostrarSexo();

		function mostrarSexo(){

			$.ajax({

				type: 'ajax',
				url: '<?= base_url('alumno_controller/get_sexo') ?>',
				dataType: 'json',

				success: function(datos){

					var op = '';
					var i;

					op+=
					'<option value="">--Seleccione sexo--</option>';

					for (i = 0; i < datos.length; i++) {
						
						op+=
						'<option value="'+datos[i].id_sexo+'">'+datos[i].nombre_sexo+'</option>';
					}

					$('#sexo').html(op);
				}
			});
		};



		mostrarCurso();

		function mostrarCurso(){

			$.ajax({

				type: 'ajax',
				url: '<?= base_url('alumno_controller/get_curso') ?>',
				dataType: 'json',

				success: function(datos){

					var op = '';
					var i;

					op+=
					'<option value="">--Seleccione curso--</option>';

					for (i = 0; i < datos.length; i++) {
						
						op+=
						'<option value="'+datos[i].id_curso+'">'+datos[i].nombre_curso+'</option>';
					}

					$('#curso').html(op);
				}
			});
		};


		$('#btnGuardar').click(function(){

			$url = $('#formAlumno').attr('action');
			$data = $('#formAlumno').serialize();

			$val = validacion();

			if($val == true){


				$.ajax({

					type: 'ajax',
					method: 'post',
					url: $url,
					data: $data,
					dataType: 'json',

					success: function(respuesta){

						$('#modalGuardar').modal('hide');

						if (respuesta == 'add') {

							alertify.notify('Se guardo exitosamente','success',10,null);

						} else if(respuesta == 'edi') {

							alertify.notify('Se modifico exitosamente','success',10,null);

						}else{

							alertify.notify('Error al realizar la acción','error',10,null);
						}
						$('#formAlumno')[0].reset();
						mostrarAlumno();
					}
				});
			}
		});



		$('#tabla_alumno').on('click','.item-edit', function(){

			var id = $(this).attr('data');

			$('#modalGuardar').modal('show');

			$('#modalGuardar').find('.modal-title').text('Actualizar alumno');

			$('#formAlumno').attr('action','<?= base_url('alumno_controller/actualizar') ?>');

			$.ajax({

				type: 'ajax',
				method: 'post',
				url: '<?= base_url('alumno_controller/get_datos') ?>',
				data: {id:id},
				dataType: 'json',

				success: function(datos){

					$('#id').val(datos.id_alumno);
					$('#nombres').val(datos.nombres);
					$('#apellidos').val(datos.apellidos);
					$('#sexo').val(datos.id_sexo);
					$('#curso').val(datos.id_curso);
				}
			});
		});



		function validacion(){

			var nombres = $('#nombres').val();
			var apellidos = $('#apellidos').val();
			var sexo = $('#sexo option:selected').val();
			var curso = $('#curso option:selected').val();

			if (nombres.length==0) {

				$('#nombres').css('boxShadow','inset 0 0 15px red');
				$('#nombres').attr('placeholder','Este campo es obligatorio');

				return false;
			} else {

				$('#nombres').css('boxShadow','inset 0 0 15px green');
			}

			if (apellidos.length==0) {

				$('#apellidos').css('boxShadow','inset 0 0 15px red');
				$('#apellidos').attr('placeholder','Este campo es obligatorio');

				return false;
			} else {

				$('#apellidos').css('boxShadow','inset 0 0 15px green');
			}

			if (sexo==0) {

				$('#sexo').css('boxShadow','inset 0 0 15px red');
				$('#sexo').attr('placeholder','Este campo es obligatorio');

				return false;
			} else {

				$('#sexo').css('boxShadow','inset 0 0 15px green');
			}

			if (curso==0) {

				$('#curso').css('boxShadow','inset 0 0 15px red');
				$('#curso').attr('placeholder','Este campo es obligatorio');

				return false;
			} else {

				$('#curso').css('boxShadow','inset 0 0 15px green');
			}

			return true;
		};



	});







</script>