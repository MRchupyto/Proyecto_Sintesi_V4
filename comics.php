<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();
$sql = $con->prepare('SELECT ID_Comics, Titulo_Comic, precio_comic, img_comics FROM productos WHERE activo=1');
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prueba-DB</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/comics.css">
    </head>

    <body>
    <header class="header">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                <div class="logo">
                        <a href="">Comic & Manga</a>
                    </div>
                    <button type="button" class="nav-toggler">
               <span></span>
            </button>
                    <nav class="nav">
                        <ul>
                            <li><a href="./home/home.html">HOME</a></li>
                            <li><a href="./Noticias/Noticias.html">NEWS</a></li>
                            <li><a href="./comics.php"class="active">COMICS</a></li>
                            <li><a href="./index.html">INICIO</a></li>
                            <li><a href="./comentarios.html">SOPORTE</a></li>
                            <li><a href="./log_home.php">REGISTRO</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <header>
    <!--AQUI VA LA NAVBAR RESPONSIVE IMPLEMENTADA-->
    <div class="animated">
        <main>
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($resultado as $row) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php 
                                $id = $row['ID_Comics'];
                                $imagen = $row['img_comics'];
                                if (!file_exists($imagen))[
                                    $imagen = "img/no-foto.jpg"
                                    ]
                            ?>
                            <img class="img" src="<?php echo $imagen; ?>">
                            <div class="card-body">
                                <h5 class="card-tittle"><?php echo $row['Titulo_Comic']; ?></h5>
                                <p class="card-text">€<?php echo $row['precio_comic']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="details.php?id=<?php echo $row['ID_Comics']; ?>" class="btn btn-primary">Detalles</a>
                                    </div>
                                    <a href="" class="btn btn-success">Añadir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
    </div>
        </main>
    </body>

    </html>