<?php 
//var_dump($dato); para saber si llega el dato nulo(no autoincrementable)
require_once ("layouts/header.php");?>
<a href="index.php?m=nuevo" class="btn">NUEVO</a>
<table>
	<tr>
		<td>Id</td>
		<td>Nombre</td>
		<td>Precio</td>
		<td>Acción</td>
	</tr>
	<tbody>
		<?php 
		//Pregunta si esta vacio para evitar error de los argumentos vacios
			if(!empty($dato)):
				foreach ($dato as $key => $value)
	        		foreach ($value as $v ):?>
					<tr>
						<td><?php echo $v['id']?> </td>
						<td><?php echo $v['nombre']?> </td>
						<td> 
							<a class="btn" href="index.php?m=editar&id=<?php echo $v['id']?>">EDITAR</a>
							<a class="btn" href="index.php?m=eliminar&id=<?php echo $v['id']?>" onclick="return confirm('ESTA SEGURO'); false">ELIMINAR</a>
						</td>	
					</tr>        	
	        		<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">NO HAY REGISTROS</td>
				</tr>
			<?php endif ?>
	</tbody>
</table>
<?php 



