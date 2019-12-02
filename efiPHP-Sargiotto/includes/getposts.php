<?php include('includes/connection.php'); ?>
<?php
// en el primer if filtro query para traer determinado post, comparado por ID
if (isset($id)){

    $consultaPost = "SELECT users.firstname AS 'nombreUsuario',
    users.lastname AS 'apellidoUsuario',
    users.avatar AS 'avatarUsuario',
    publicaciones.id AS 'idPublicacion',
    publicaciones.titulo AS 'tituloPublicacion',
    publicaciones.image AS 'imagenPublicacion',
    publicaciones.descripcion AS 'descripcionPublicacion',
    publicaciones.creado AS 'creadoPublicacion',
    publicaciones.actualizado AS 'actualizadoPublicacion', 
    categorias.nombre AS 'nombreCategoria' 
    FROM (users
    INNER JOIN publicaciones
    ON users.id = publicaciones.user_id)
    INNER JOIN categorias
    ON categorias.id = publicaciones.categoria_id WHERE publicaciones.id = $id";
 }
// en el segundo if, hago la query para cuando necesito mostrar los posts de  determinada categoria
elseif (isset($idSection))
{
    $consulta = "SELECT users.firstname AS 'nombreUsuario',
    users.lastname AS 'apellidoUsuario',
    users.avatar AS 'avatarUsuario',
    users.id AS 'idUsuario',
    publicaciones.id AS 'idPublicacion',
    publicaciones.titulo AS 'tituloPublicacion',
    publicaciones.image AS 'imagenPublicacion',
    publicaciones.descripcion AS 'descripcionPublicacion',
    publicaciones.actualizado AS 'actualizadoPublicacion', 
    categorias.id AS 'idCategoria',
    categorias.nombre AS 'nombreCategoria' 
    FROM (users
    INNER JOIN publicaciones
    ON users.id = publicaciones.user_id)
    INNER JOIN categorias
    ON categorias.id = publicaciones.categoria_id 
    WHERE categorias.id = $idSection ORDER BY publicaciones.actualizado  DESC";
}
// en este IF traigo los posts de determinado USER
elseif (isset($idUser))
{  
    $consultaUser = "SELECT users.firstname AS 'nombreUsuario',
    users.lastname AS 'apellidoUsuario',
    users.avatar AS 'avatarUsuario',
    users.id AS 'idUsuario',
    publicaciones.id AS 'idPublicacion',
    publicaciones.titulo AS 'tituloPublicacion',
    publicaciones.image AS 'imagenPublicacion',
    publicaciones.descripcion AS 'descripcionPublicacion',
    publicaciones.creado AS 'creadoPublicacion',
    publicaciones.actualizado AS 'actualizadoPublicacion', 
    categorias.id AS 'idCategoria',
    categorias.nombre AS 'nombreCategoria' 
    FROM (users
    INNER JOIN publicaciones
    ON users.id = publicaciones.user_id)
    INNER JOIN categorias
    ON categorias.id = publicaciones.categoria_id 
    WHERE publicaciones.user_id = $idUser ORDER BY publicaciones.actualizado  DESC";
}
// en el else, hago la query para mostrar TODAS las publicaciones y su respectiva info
else
{   
    $consulta = "SELECT users.firstname AS 'nombreUsuario',
    users.lastname AS 'apellidoUsuario',
    users.id AS 'idUsuario',
    users.avatar AS 'avatarUsuario',
    publicaciones.id AS 'idPublicacion',
    publicaciones.titulo AS 'tituloPublicacion',
    publicaciones.image AS 'imagenPublicacion',
    publicaciones.descripcion AS 'descripcionPublicacion',
    publicaciones.actualizado AS 'actualizadoPublicacion', 
    categorias.id AS 'idCategoria',
    categorias.nombre AS 'nombreCategoria' 
    FROM (users
    INNER JOIN publicaciones
    ON users.id = publicaciones.user_id)
    INNER JOIN categorias
    ON categorias.id = publicaciones.categoria_id ORDER BY publicaciones.actualizado DESC";
}
 ?>