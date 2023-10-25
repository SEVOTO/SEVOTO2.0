<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="vista/dist/img/sevoto.png" rel="icon" type="image/png" />
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>SEVOTO</title>
</head>
<body>
<script>
    function validateCedula() {
      var cedula = document.forms["loginForm"]["usuario"].value;
      if (cedula < 1000000) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'La cédula debe ser mayor a 1000000'
        });
      }
    }
    function validatePassword() {
      var password = document.forms["loginForm"]["password"].value;
      if (password == "") {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'La contraseña no puede estar vacía'
        });
      }
    }
</script>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="card mt-5 animate__animated animate__bounceIn">
          <div class="card-body">
            <img src="vista/dist/img/sevoto.png" class="img-fluid mb-3" alt="Logo">
            <form name="loginForm" action="controlador/loginctrl.php" method="POST">
              <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="number" class="form-control" id="usuario" name="usuario" onblur="validateCedula()" required required>
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass" onblur="validatePassword()" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>