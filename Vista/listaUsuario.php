<?php include_once 'header.php';?>
<div class="container">
    <br>
    <table class="timetable_sub">
	<thead>
            <tr>
        		<th>ID</th>
        		<th>USUARIO</th>
        		<th>NOMBRE</th>
                <th>APELLIDO</th>
        		<th>EMAIL</th>
        		<th>CELULAR</th>
                <th>DIRRECION</th>
                <th>ACCESO</th>
                <th>ESTADO</th>
                <th colspan="2">ACCIONES</th>           
            </tr>
        </thead>
        <tbody>
            <?php
             foreach($datos as $fila){
            ?>
                <tr class="rem1">
                        <td class="invert"><?php echo $fila['ID_LOG'] ?></td>
                        <td class="invert"><?php echo $fila['NOM_USU'] ?></td>
                        <td class="invert"><?php echo $fila['NOMBRE'] ?></td>
                        <td class="invert"><?php echo $fila['APELLIDO'] ?></td>
                        <td class="invert"><?php echo $fila['EMAIL'] ?></td>
                        <td class="invert"><?php echo $fila['CELULAR'] ?></td>
                        <td class="invert"><?php echo $fila['DIRRECION'] ?></td>
                        <td class="invert">
                            <?php 
                                if ($fila['ID_ROL'] == 1) {
                                   echo "Admintrador";
                                }else{
                                    echo "Usuario";
                                }
                            ?>                            
                        </td>
                         <td class="invert"><?php echo $fila['ESTADO'] ?></td>
                        <td class="invert"><a href="../Controlador/controlador_usuAdmin.php?op=3&id=<?php echo $fila['ID_LOG'] ?>">Editar</a></td>
                        <td class="invert"><a href="../Controlador/controlador_usuario.php?op=5&id=<?php echo $fila['ID_LOG'] ?>">Eliminar</a></td>                 
                </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
    <BR>
</div>
<?php include_once 'footer.php'; ?>
