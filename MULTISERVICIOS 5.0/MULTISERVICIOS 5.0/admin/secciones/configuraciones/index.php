<?php 
include("../../bd.php");

if (isset($_GET['txtid'])) {
    //borrar dicho registro con el id correspondiente
    $txtid=(isset($_GET['txtid']))?$_GET['txtid']:'';
    $sentencia=$conexion->prepare("DELETE FROM tbl_configuraciones WHERE id=:id");
    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute();    
}

//seleccionar registros
$sentencia=$conexion->prepare("SELECT * FROM `tbl_configuraciones`");
$sentencia->execute();
$lista_configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php"); 
?>

<div class="card">
    <div class="card-header">
     <!--boton solo para desarrolladores-->   
    <!-- <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a> -->
    Configuracion
    </div>
    <div class="card-body">

    <div
        class="table-responsive-sm"
    >
        <table
            class="table "
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre de la Configuracion</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lista_configuraciones as $registros){ ?>
                <tr class="">
                    <td><?php echo $registros['id'];?></td>
                    <td><?php echo $registros['nombreconfiguracion'];?></td>
                    <td><?php echo $registros['valor'];?></td>
                    <td>
                        <a name="" id="" class="btn btn-info" href="editar.php?txtid=<?php echo $registros['id'];?>" role="button">Editar</a>
                          <!--boton solo para desarrolladores-->
                        <!-- |<a name="" id="" class="btn btn-danger" href="index.php?txtid=<?php echo $registros['id'];?>" role="button">Borrar</a> -->
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    
        

    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include("../../templates/footer.php"); ?>