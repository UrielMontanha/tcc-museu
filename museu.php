<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Objetos </title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        .card {
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.03);
            z-index: 1000;
        }
    </style>

</head>

<body>

    <?php include_once "header.php"; ?>

    <h6><a href="index.php">Voltar a página inicial</a></h6>

    <br> <br> <br>
    <hr>
    <br> <br>

    <main>

        <div class="row">
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="css/imagens/espada.jpg">
                        <span class="card-title">Carroça medieval</span>
                    </div>
                    <div class="card-content">
                        <p>Carroça Medieval, carroça modelo viking... djfiafjef</p>
                    </div>
                    <div class="card-action">
                        <a href="d.php">Ver carroça medieval</a>
                    </div>
                </div>
            </div>

            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="css/imagens/1museu.jpg">
                        <span class="card-title">Casa cultural</span>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
        </div>

    </main>



    </main>

</body>

</html>