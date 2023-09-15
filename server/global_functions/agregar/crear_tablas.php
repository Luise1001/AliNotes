<?php 
$crear = $pdo->query("USE notas");

if(!$crear)
{
    exit ('No se ha Podido Seleccionar la base de datos');
}

$tablas = 
[
  ' CREATE TABLE IF NOT EXISTS usuarios
  (
    Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    User_name VARCHAR(40) NOT NULL,
    Correo VARCHAR(40) UNIQUE NOT NULL,
    Pass VARCHAR(100)  NOT NULL,
    Nivel INT UNSIGNED NOT NULL DEFAULT(0),
    Fecha DATE  NOT NULL,
    Actualizado TIMESTAMP NOT NULL DEFAULT(CURRENT_TIMESTAMP)
  )',
  ' CREATE TABLE IF NOT EXISTS notas
  (
    Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Titulo VARCHAR(50) NOT NULL,
    Contenido TEXT NOT NULL,
    Id_usuario INT UNSIGNED NOT NULL,
    Eliminado INT(2) NULL DEFAULT(0),
    Fecha DATE  NOT NULL,
    Actualizado TIMESTAMP NOT NULL DEFAULT(CURRENT_TIMESTAMP),
    FOREIGN KEY (Id_usuario) REFERENCES usuarios (Id)
  )',
  ' CREATE TABLE IF NOT EXISTS tareas
  (
    Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Tarea VARCHAR(100) NOT NULL,
    Id_usuario INT UNSIGNED NOT NULL,
    Completado INT(2) NOT NULL DEFAULT(0),
    Eliminado INT(2) NULL DEFAULT(0),
    Fecha DATE  NOT NULL,
    Actualizado TIMESTAMP NOT NULL DEFAULT(CURRENT_TIMESTAMP),
    FOREIGN KEY (Id_usuario) REFERENCES usuarios (Id)
  )',
  ' CREATE TABLE IF NOT EXISTS listas
  (
    Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Titulo VARCHAR(50) NOT NULL,
    Id_usuario INT UNSIGNED NOT NULL,
    Visible INT(2) NOT NULL DEFAULT(1),
    Eliminado INT(2) NULL DEFAULT(0),
    Fecha DATE  NOT NULL,
    Actualizado TIMESTAMP NOT NULL DEFAULT(CURRENT_TIMESTAMP),
    FOREIGN KEY (Id_usuario) REFERENCES usuarios (Id)
  )',
  ' CREATE TABLE IF NOT EXISTS seccion_lista
  (
    Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Titulo VARCHAR(50) NOT NULL,
    Id_lista INT UNSIGNED NOT NULL,
    Id_usuario INT UNSIGNED NOT NULL,
    Fecha DATE  NOT NULL,
    Actualizado TIMESTAMP NOT NULL DEFAULT(CURRENT_TIMESTAMP),
    FOREIGN KEY (Id_lista) REFERENCES listas (Id),
    FOREIGN KEY (Id_usuario) REFERENCES usuarios (Id)
  )',
  ' CREATE TABLE IF NOT EXISTS items_para_lista
  (
    Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Descripcion VARCHAR(100) NOT NULL,
    Tipo_unidad CHAR(10) NULL DEFAULT(NULL),
    Cantidad INT NULL DEFAULT(NULL),
    Id_usuario INT UNSIGNED NOT NULL,
    Fecha DATE  NOT NULL,
    Actualizado TIMESTAMP NOT NULL DEFAULT(CURRENT_TIMESTAMP),
    FOREIGN KEY (Id_usuario) REFERENCES usuarios (Id)
  )',
  ' CREATE TABLE IF NOT EXISTS item_lista
  (
    Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Id_item INT UNSIGNED NOT NULL,
    Observacion VARCHAR(100) NULL DEFAULT(NULL),
    Visible INT(2) NOT NULL DEFAULT(1),
    Id_seccion INT UNSIGNED NULL DEFAULT(NULL),
    Id_lista INT UNSIGNED NOT NULL,
    Id_usuario INT UNSIGNED NOT NULL,
    Fecha DATE  NOT NULL,
    Actualizado TIMESTAMP NOT NULL DEFAULT(CURRENT_TIMESTAMP),
    FOREIGN KEY (Id_item) REFERENCES items_para_lista (Id),
    FOREIGN KEY (Id_seccion) REFERENCES seccion_lista (Id),
    FOREIGN KEY (Id_lista) REFERENCES listas (Id),
    FOREIGN KEY (Id_usuario) REFERENCES usuarios (Id)
  )',
];

foreach($tablas as $tabla)
{
    $pdo->exec($tabla);
}

// $letra = 'G';
// $rif = '200168757';
// $empresa = 'Delivery Vargas, S.A';
// $firebase_key = 'AAAA3uBMB5E:APA91bFP04Q1Bj26OAkDJIsO7uY1FbTbtDhqFrnnZTyWwoDjixmM_e3QKUmYldp2gXcSVgNzC1G8zkEbUSCSBM5xZbGV64AFwrKmrnrjgO_uzVzGjFmort4oezDBoDWSf3A7zzHfkb4S';

// $consulta_sql = "SELECT * FROM datos_empresa WHERE Rif= ?";
// $preparar_sql = $pdo->prepare($consulta_sql);
// $preparar_sql->execute(array($rif));
// $resultado = $preparar_sql->fetchAll();

// if(!$resultado)
// {
//   $insert_sql = 'INSERT INTO datos_empresa (Letra, Rif, Empresa, Firebase_key) VALUES (?,?,?,?)';
//   $sent = $pdo->prepare($insert_sql);
//   $sent->execute(array($letra, $rif, $empresa, $firebase_key));
// }
// else
// {
//   $editsql = 'UPDATE datos_empresa SET Firebase_key=? WHERE Rif=?';
//   $editar_sentence = $pdo->prepare($editsql);
//   $editar_sentence->execute(array($firebase_key, $rif));
// }

?>

