<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
error_reporting(-1);

include_once 'app/config.inc.php';
include_once 'app/conexion.inc.php';

$titulo = "Imagenes";

include_once 'plantillas/cabecera.inc.php';
include_once 'plantillas/navbar.inc.php';

?>

<div class="container">
<h1>Archivo imagenes de su negocio</h1>
<form enctype="multipart/form-data">
<div class="form-group">
<input id="file-1" type="file" class="file" multiple=true data-preview-file-type="any">
</div>
<div class="form-group">
<input id="file-1" type="file" class="file" multiple=true data-preview-file-type="any">
</div>
<div class="form-group">
<input id="file-1" type="file" class="file" multiple=true data-preview-file-type="any">
</div>
<div class="form-group">
<input id="file-1" type="file" class="file" multiple=true data-preview-file-type="any">
</div>

<div class="form-group">
<button class="btn btn-primary">Submit</button>
<button class="btn btn-default" type="reset">Reset</button>
</div>
</form>
</div>