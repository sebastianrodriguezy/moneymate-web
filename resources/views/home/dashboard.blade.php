<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dashboard</title>
</head>

<body>
  <h1>Bienvenido, este es el inicio</h1>
  <form action="/logout" method="POST">
    @csrf
    <input type="submit" value="Cerrar Sesión" />
  </form>
</body>

</html>