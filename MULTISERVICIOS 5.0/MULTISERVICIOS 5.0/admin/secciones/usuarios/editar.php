<?php 
include("../../bd.php");

if (isset($_GET['txtid'])) {
    //Recuperar los datos del id correspondiente
    $txtid=(isset($_GET['txtid']))?$_GET['txtid']:'';
    $sentencia=$conexion->prepare("SELECT * FROM tbl_usuarios WHERE id=:id");
    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
        
    $usuario=$registro['usuario'];
    $password=$registro['password'];
    $correo=$registro['correo'];

}

if($_POST){
    print_r($_POST);

    //recepcionamos los valores del formulario 
    $txtid=(isset($_POST['txtid']))?$_POST['txtid'] :"";   
    $usuario=(isset($_POST['usuario']))?$_POST['usuario'] :"";
    $password=(isset($_POST['password']))?$_POST['password'] :"";
    $correo=(isset($_POST['correo']))?$_POST['correo'] :"";


    $sentencia=$conexion->prepare("UPDATE tbl_usuarios
    SET 
    usuario=:usuario, 
    password=:password, 
    correo=:correo
    WHERE id=:id");

    $sentencia->bindParam(":usuario",$usuario);
    $sentencia->bindParam(":password",$password);
    $sentencia->bindParam(":correo",$correo);
    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute();
    $mensaje="Registro Modificado con Exito.";
    header("location:index.php?mensaje=".$mensaje);


}


include("../../templates/header.php"); 
?>

<div class="card">
    <div class="card-header">
        Usuario
    </div>
    <div class="card-body">

    <form action="" method="post">
    
        <div class="mb-3">
            <label for="txtid" class="form-label">ID:</label>
            <input readonly type="text"
                class="form-control" value="<?php echo $txtid;?>" name="txtid" id="txtid" aria-describedby="helpId" placeholder=""/>
            
        </div>


        <div class="mb-3">
            <label for="usuario" class="form-label">Nombre del Usuario:</label>
            <input type="text"
                class="form-control" value="<?php echo $usuario;?>" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Nombre del Usuario"/>
            
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input
                type="password"
                class="form-control" value="<?php echo $password;?>"
                name="password"
                id="password"
                aria-describedby="helpId"
                placeholder="Password"
            />
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo:</label>
            <input
                type="correo"
                class="form-control" value="<?php echo $correo;?>"
                name="correo"
                id="correo"
                aria-describedby="helpId"
                placeholder="correo"
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