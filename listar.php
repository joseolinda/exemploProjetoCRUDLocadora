<?php
$pagina = null;
if ( isset( $_GET["p"]) ) {
    $pagina = $_GET["p"];
} else {
    header("location: index.php");
}
// Importar autoload
require_once __DIR__ . "/App/autoload.php";

// Importar página a ser listada
include "Inc/lista_de_{$pagina}.php"
?>