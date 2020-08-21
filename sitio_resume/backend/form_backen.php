<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Resumenes de libros">
    <meta name="keywords" content="libros, resumenes, resumenes de libros, reseñas, reseñas de libros">
    <title>Resumenes</title>
</head>

<body>
    <?php
        try{
            $bbdd=new PDO("mysql:host=localhost; dbname=resumenes", "root", "");
            $bbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query="SELECT * FROM USUARIOS WHERE NOMBRE=:usuario AND PASSWORD=:password";
            $result=$bbdd->prepare($query);
            $usuario=htmlentities(addslashes($_GET["usuario"]));
            $password=htmlentities(addslashes($_GET["password"]));
            $result->bindValue(":usuario", $usuario);
            $result->bindValue(":password", $password);
            $result->execute();
            $numero_usuario=$result->rowCount();
            if($numero_usuario!=0){
                header("location:../html/index.html");
            }else{
                header("location:../html/formulario.html");             
            }
        }catch(Exception $e){
          die("Error: " . $e->getMessage());
        }
    ?>
</body>
</html>