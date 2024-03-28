<?php 
include("../../bd.php");

if (isset($_GET['txtid'])) {
    //Recuperar los datos del id correspondiente
    $txtid=(isset($_GET['txtid']))?$_GET['txtid']:'';
    $sentencia=$conexion->prepare("SELECT * FROM tbl_configuraciones WHERE id=:id");
    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
        
    $nombreconfiguracion=$registro['nombreconfiguracion'];
    $valor=$registro['valor'];

}

if($_POST){
    print_r($_POST);

    //recepcionamos los valores del formulario 
    $txtid=(isset($_POST['txtid']))?$_POST['txtid'] :"";   
    $nombreconfiguracion=(isset($_POST['nombreconfiguracion']))?$_POST['nombreconfiguracion'] :"";
    $valor=(isset($_POST['valor']))?$_POST['valor'] :"";


    $sentencia=$conexion->prepare("UPDATE tbl_configuraciones
    SET 
    nombreconfiguracion=:nombreconfiguracion, 
    valor=:valor
    WHERE id=:id");

    $sentencia->bindParam(":nombreconfiguracion",$nombreconfiguracion);
    $sentencia->bindParam(":valor",$valor);
    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute();
    $mensaje="Registro Modificado con Exito.";
    header("location:index.php?mensaje=".$mensaje);


}

include("../../templates/header.php"); 
?>

<div class="card">
    <div class="card-header">
        Configuracion
    </div>
    <div class="card-body">

    <form action="" method="post">
       
        <div class="mb-3">
            <label for="txtid" class="form-label">ID:</label>
            <input
                type="text"
                class="form-control" readonly value="<?php echo $txtid;?>"
                name="txtid"
                id="txtid"
                aria-describedby="helpId"
                placeholder="id"
            />
        </div>


        
        <div class="mb-3">
            <label for="nombreconfiguracion" class="form-label">Nombre:</label>
            <input
                type="text"
                class="form-control" value="<?php echo $nombreconfiguracion;?>"
                name="nombreconfiguracion"
                id="nombreconfiguracion"
                aria-describedby="helpId"
                placeholder="Nombre Configuracion"
            />
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor:</label>
            <input
                type="text"
                class="form-control" value="<?php echo $valor;?>"
                name="valor"
                id="valor"
                aria-describedby="helpId"
                placeholder="valor"
            />
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        
    </form>
        
    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include("../../templates/footer.php"); ?>