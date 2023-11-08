<?php
/*
	CRUD creado por Oscar Amado
	Contacto: oscarfamado@gmail.com
*/
class administratorController extends Administrator{

	function index(){
		require_once('views/all/header.php');
		require_once('views/all/nav.php');
		require_once('views/index/index.php');
		require_once('views/index/modals.php');
		require_once('views/all/footer.php');
	}

	function table_users(){
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
				<th>Id Preso</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Fecha Nacimiento</th>
				<th>Opciones</th>
				</tr>
			</thead>
			<tbody >		
		<?php
		foreach (parent::get_view_users()	as $data) {
		?>
		<tr>
			<td><?php echo $data->idpreso; ?> </td>
			<td><?php echo $data->nombre; ?> </td>
			<td><?php echo $data->apellido; ?> </td>
			<td><?php echo $data->fechaN; ?> </td>
			<td>
			  <div class="btn-group">
			    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			    Seleccionar <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu">
			      <li><a href="#" onclick="ModalUpdate('<?php echo $data->idpreso; ?>','<?php echo $data->nombre; ?>','<?php echo $data->apellido; ?>','<?php echo $data->fechaN; ?> ');">Actualizar</a></li>
			      <li><a href="#" onclick="deleteUser('<?php echo $data->idpreso; ?>');">Borrar</a></li>
			    </ul>
			  </div>
			</td>
		</tr>
		<?php
		}
		?>
			</tbody>
		</table>	
	<?php	
    }
    
	function deleteuser(){		
			parent::set_delete_user($_REQUEST['id']);		
    }

	function registeruser(){
		$data = array(
					'nombre' 		=> $_REQUEST['nombre'],
					'apellido' => $_REQUEST['apellido'],
					'fechaN'		=> $_REQUEST['fechaN']
					);		
					parent::set_register_user($data);		
    }    
    
	function updateuser(){
		$data = array(
					'idpreso'		=> $_REQUEST['idpreso'],
					'nombre' 		=> $_REQUEST['nombre'],
					'apellido' => $_REQUEST['apellido'],
					'fechaN'		=> $_REQUEST['fechaN']
					);		
			parent::set_update_user($data);		
	}    
    
}

