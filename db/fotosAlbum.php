<?php

$user = $_SESSION['username'];
if(isset($_GET['id'])){
    $idalbum = $_GET['id'];
    setcookie('idalbum',$idalbum);
}
$idUser;
//echo "otro id: " . $_COOKIE['id'];

if(isset($_GET['page'])){
    if($_GET['page']>=1){
        // Si page es >1, obtenemos el id del usuario y del album por cookie
        $id=$_COOKIE['id'];
        $idalbum=$_COOKIE['idalbum'];
    }
}

require_once('connect.php');

if($connectDB){
    $query = 
        "SELECT f.Titulo as fTitulo, a.Titulo as aTitulo, IdFoto, Fichero, f.Fecha, NomPais, u.userName, u.IdUsuario as id
        FROM Fotos f, Albumes a, Paises p, usuarios u
        WHERE a.IdAlbum = '$idalbum' and f.Album = a.IdAlbum AND p.IdPais = f.Pais AND u.userName = '$user' AND a.Usuario = u.IdUsuario";


    $result = mysqli_query($connectDB, $query);
   
    if (!$result) {
        die(mysqli_error($connectDB));
    }
    else{
        $row_cnt = mysqli_num_rows($result);
    }
    if ($row_cnt >= 1) {
        $filaid = mysqli_fetch_assoc($result);
        $id = $filaid['id'];
        setcookie('id',$id);
        try {

            // Total elementos
            $total = $row_cnt;
            // Fotos por pag
            $limit = 5;
            // Cantidad de paginas
            $pages = ceil($total / $limit);
            // Pagina actual?
            $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
                'options' => array(
                    'default'   => 1,
                    'min_range' => 1,
                ),
            )));
        
            // Offset para la query
            $offset = ($page - 1)  * $limit;
        
            // Primera y ult pagina
            $start = $offset + 1;
            $end = min(($offset + $limit), $total);
        
            // The "back" link
            $prevlink = ($page > 1) ? '<a href="?page=1" class="button" title="Primera página">&laquo;</a> <a class="button" href="?page=' . ($page - 1) . '" title="Página anterior">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
        
            // The "forward" link
            $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" class="button" title="Siguiente página">&rsaquo;</a> <a class="button" href="?page=' . $pages . '" title="Última página">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
        
            // Display the paging information
            echo '<div style="text-align: center;"><p>', $prevlink, ' Página ', $page, ' de ', $pages, ' páginas, mostrando ', $start, '-', $end, ' de ', $total, ' resultados ', $nextlink, ' </p></div>';
        
            // Prepare the paged query
            /*$stmt = $connectDB->prepare('
                SELECT f.Titulo as fTitulo, a.Titulo as aTitulo, IdFoto, Fichero, f.Fecha, NomPais, u.userName 
                FROM Fotos f, Albumes a, Paises p, usuarios u
                WHERE a.IdAlbum = ' . $id . ' and f.Album = a.IdAlbum 
                AND p.IdPais = f.Pais AND u.userName = ' . $user . ' AND a.Usuario = u.IdUsuario 
                LIMIT
                    :limit
                OFFSET
                    :offset
            ');*/
            $ssql = '
                SELECT f.Titulo as fTitulo, a.Titulo as aTitulo, IdFoto, f.FRegistro, Fichero, f.Fecha, NomPais, u.userName 
                FROM Fotos f, Albumes a, Paises p, usuarios u
                WHERE a.IdAlbum = ' . $idalbum . ' and f.Album = a.IdAlbum
                and p.IdPais = f.Pais and u.userName = "' . $user . '" and a.Usuario = u.IdUsuario
                ORDER BY
                    FRegistro
                LIMIT
                    '.$limit.'
                OFFSET
                    '.$offset.' 
            ';
            $stmt = mysqli_query($connectDB, $ssql);
           // echo "query " . ( $stmt ? "true" : "false");
        
            // Do we have any results?
            if (mysqli_num_rows($stmt) > 0) {
                // Define how we want to fetch the results
                $rows = mysqli_fetch_assoc($stmt);
                //$stmt->setFetchMode(PDO::FETCH_ASSOC);
                $iterator = new IteratorIterator($stmt);
        
                // Display the results
                foreach ($iterator as $fila) {
                    //echo '<p>', $row['name'], '</p>';

                    if($fila['userName'] != $user)
                        die("No puedes acceder al contenido de otro usuario");     
                    echo '
                        <li class="foto">
                        
                        <h2>' . $fila["fTitulo"] . ' </h2>
                        <a href="' . $urlLocal . 'zonaPrivada/infIMG.php?id=' . $fila["IdFoto"] . '">
                            <img src="' . $urlLocal . "images/Albumes/" . $fila["Fichero"] . '" alt="Imagen"/>
                        </a>
                        <p>
                        ' . $fila["Fecha"] . '
                        </p>
                        <p>
                        ' . $fila["NomPais"] . '
                        </p>
                        
                        </li>
                    ';
                }
        
            } else {
                echo '<p>No results could be displayed.</p>';
            }
        
        } catch (Exception $e) {
            echo '<p>', $e->getMessage(), '</p>';
        }
     
    
    /*
    // Muestra resultados de la consulta (sin paginar)
    $fila = mysqli_fetch_assoc($result);
        echo "<div class='card' style='text-align: center;'> <b>Álbum:</b> " . $fila['aTitulo'] . "</div>";
        if($fila['userName'] == $user){
            do {
                if($fila['userName'] != $user)
                    die("No puedes acceder al contenido de otro usuario");     
                echo '
                    <li class="foto">
                    
                    <h2>' . $fila["fTitulo"] . ' </h2>
                    <a href="' . $urlLocal . 'zonaPrivada/infIMG.php?id=' . $fila["IdFoto"] . '">
                        <img src="' . $urlLocal . "images/Albumes/" . $fila["Fichero"] . '" alt="Imagen"/>
                    </a>
                    <p>
                    ' . $fila["Fecha"] . '
                    </p>
                    <p>
                    ' . $fila["NomPais"] . '
                    </p>
                    
                    </li>
                ';
                
            }while($fila = mysqli_fetch_assoc($result));
        } else {
            echo 'No puedes acceder al contenido de otro usuario.';
        }*/
    } else {
    //Fail
        echo '<div class="card" ><p> No hay fotos en este álbum. </p><a href=" ' . $urlLocal .'zonaPrivada/misAlbumes.php" class="button">Atrás</a></div>';
        echo "";     
        die();   
    }
    mysqli_close($connectDB);
}
?>