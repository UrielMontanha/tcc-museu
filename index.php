<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Página Inicial </title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <style>
    .image-button-container {
      display: flex;
      align-items: flex-start;
      justify-content: flex-start;
      gap: 20px;
    }

    .image-container {
      flex-shrink: 0;
    }

    img.responsive-img {
      max-width: 100%;
      height: auto;
    }

    .btn {
      margin-top: 10px;
    }
  </style>
</head>

<body>

  <?php include_once "header.php"; ?>

  <div class="container wrapper" style="margin-top: 5%;">
    <h2>Centro Cultural Dr. Pedro Martini</h2>
    <p>O Centro Cultural Dr. Pedro Martini é um importante ponto histórico e cultural em Uruguaiana, Rio Grande do Sul. Construído em 1913 por Domingo Francisco Rocco,
      o edifício serviu como quartel-general do Exército de 1930 a 19761. Localizado na Rua Santana, no centro da cidade, o prédio é um marco arquitetônico e cultural1.
    </p>
    <p>O centro cultural oferece exposições que destacam a história e a cultura da região, incluindo uma interessante coleção de
      armas antigas e jogos tradicionais2. Recentemente, o prédio passou por uma renovação, o que foi muito bem recebido pela comunidade local2.
    </p>

    <div class="image-button-container">
      <div class="image-container">
        <img src="css/imagens/1museu.jpg" alt="museu" style="max-width: 440px; width: 160%;" class="img-fluid responsive-img">
      </div>
      <br><br>
      <a href="https://www.google.com.br/maps/@-29.7569684,-57.0864313,3a,75y,217.91h,102.6t/data=!3m7!1e1!3m5!1sEodfnbAmV2WFCLQ3-71kWw!2e0!6shttps:%2F%2Fstreetviewpixels-pa.googleapis.com%2Fv1%2Fthumbnail%3Fcb_client%3Dmaps_sv.tactile%26w%3D900%26h%3D600%26pitch%3D-12.599228323589614%26panoid%3DEodfnbAmV2WFCLQ3-71kWw%26yaw%3D217.90709762929632!7i16384!8i8192?entry=ttu&g_ep=EgoyMDI1MDExNC4wIKXMDSoASAFQAw%3D%3D" class="btn waves-effect waves-light #fafafa grey lighten-5 black-text"><i class="material-icons right">location_on</i>Local do museu</a>
    </div>

  </div>

  <?php
  // Verifica se o usuário está logado e exibe o toast
  if (isset($_SESSION['usuario'])) {
    echo "<script>
              M.toast({html: 'Você está logado como " . $_SESSION['usuario'] . "'});
            </script>";
  }
  ?>

</body>

</html>