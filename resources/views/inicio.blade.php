<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de archivos</title>
</head>
<body>
    <form action="{{route('listado')}}">
    
        @csrf
        <input type="submit" value="Listado de archivos">
    </form>
    <br>
    <br>
    
    <form action="" method="POST" enctype="multipart/form-data">
    
        @csrf
        <input type="file" name="archivo" required>
        <br>
        <br>
        <input type="text" name="nombre" placeholder="Nombre del archivo" required>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>