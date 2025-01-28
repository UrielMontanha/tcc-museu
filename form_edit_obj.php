<?php
include_once "header.php";
include_once "conecta.php";
include("permadm.php");

$conexao = conectar();

$id_obj = $_GET['id_obj'];

$sql = "SELECT * FROM objeto WHERE id_obj = $id_obj";

$resultado = executarSQL($conexao, $sql);


$objeto = mysqli_fetch_assoc($resultado);

$foto = $objeto['arquivo'];

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="">

    <style>
        /* tamanho da fonte */
        .input-field label {
            font-size: 16px !important;
            /* Forçando o tamanho com !important */
        }



        /* cor label focus  */
        .input-field input:focus+label {
            color: black !important
        }

        /* cor label underline focus  */
        .row .input-field input:focus {
            border-bottom: 1px solid black !important;
            box-shadow: 0 1px 0 0 black !important
        }

        .material-icons {
            color: black !important;
        }

        .material-icons.active {
            color: black !important;
        }

        /* cor checkbox */
        .checkbox-black[type="checkbox"].filled-in:checked+span:not(.lever):after {
            border: 2px solid #607d8b;
            background-color: #607d8b;
        }

        /* cores do radio */
        [type="radio"]:checked+span:after,
        [type="radio"].with-gap:checked+span:after {
            background-color: black;
        }

        [type="radio"]:checked+span:after,
        [type="radio"].with-gap:checked+span:before,
        [type="radio"].with-gap:checked+span:after {
            border: 2px solid black;
        }

        /*cores do select */
        ul.dropdown-content li>a,
        ul.dropdown-content li>span {
            color: #000000;
            /* Cor do texto das opções */
            /* background-color: #f1f1f1;  Cor de fundo das opções */
        }


        /* Altera a cor do fundo do cabeçalho do Datepicker */
        .datepicker-date-display {
            background-color: #00aaff;
            /* Cor do cabeçalho */
        }

        /* Altera a cor do texto da data selecionada no cabeçalho */
        .datepicker-date-display .year-text,
        .datepicker-date-display .date-text {
            color: #fff;
            /* Cor do texto da data no cabeçalho */
        }

        /* Altera a cor dos dias do calendário */
        .datepicker-table td div {
            color: #333;
            /* Cor dos dias */
        }

        /* Altera a cor de fundo dos dias ao passar o mouse */
        .datepicker-table td div:hover {
            background-color: #ffcc00;
            /* Cor de fundo ao passar o mouse */
            color: #fff;
        }

        /* Altera a cor do dia selecionado */
        .is-selected {
            background-color: #00aaff;
            /* Cor de fundo do dia selecionado */
            color: #fff;
            /* Cor do texto do dia selecionado */
        }

        /* Altera a cor dos botões de navegação (próximo e anterior) */
        .datepicker-controls .datepicker-prev,
        .datepicker-controls .datepicker-next {
            color: #00aaff;
            /* Cor das setas de navegação */
        }
    </style>

</head>

<body>

    <main class="container" style="margin-top: 3%;">

        <h1 class="center-align">Editar objetos</h1>
        <form action="edit_obj.php" enctype="multipart/form-data" method="post">

            <!-- <div class="card-panel"> -->

                <input type="hidden" name="id_obj" value="<?php echo $objeto['id_obj'] ?>">

                Nome do objeto: <?php $nome ?><input type="text" name="nome" style="color: black;" value="<?php echo $objeto['nome']; ?>" class="validate" placeholder="Nome do objeto">
                <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                <br> <br>

                Data de criação: <input type="date" name="data_criacao" style="color: black;" value="<?php echo $objeto['data_criacao'] ?>" class="validate" placeholder="Data de criação">
                <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                <br> <br>

                Data de chegada: <input type="date" name="data_chegada" style="color: black;" value="<?php echo $objeto['data_chegada'] ?>" class="validate" placeholder="Data de chegada">
                <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                <br> <br>

                Condição: <input type="text" name="condicao" style="color: black;" value="<?php echo $objeto['condicao'] ?>" class="validate" placeholder="Condição do objeto">
                <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                <br> <br>

                País: <input type="text" name="pais_origem" style="color: black;" value="<?php echo $objeto['pais_origem'] ?>" class="validate" placeholder="País de origem">
                <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                <br> <br>

                História: <br>
                <textarea name="historia" style="color: black;" value="<?php echo $objeto['historia'] ?>" id="10" cols="30" rows="10" placeholder="História do objeto"><?php echo $objeto['historia'] ?></textarea>
                <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                <br> <br> <br>

                <!-- Este input hidden é para que o arquivo que já está no banco continue, quando o usuário não quiser trocar -->
                <input type="hidden" name="nome_arquivo" value="<?= $foto ?>">






                <!-- <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light #0d47a1 blue darken-4" type="submit" name="action"><input type="file" value=" <? //= //$objeto['arquivo']; ?>" name="arquivo"></button>
                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div> -->




                <div class="input-field col s12">
                    <!-- Label do botão de envio -->
                    <div class="file-field input-field">
                        <div class="btn waves-effect waves-light #01579b light-blue darken-4 white-text">
                            <span>Selecione um Arquivo</span>
                            <!-- Input de Arquivo -->
                            <input type="file" name="arquivo" value="<?= $objeto['arquivo']; ?>">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Nenhum arquivo selecionado" readonly>
                        </div>
                    </div>
                    <!-- Helper Text (mensagem de erro) -->
                    <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                </div>



<br><br>



                <div class="row">
                    <div class="col s12">
                        <p class="center-align">
                            <a href="adm_form_museu.php" class="btn waves-effect waves-light red darken-4 white-text left">Voltar</a>
                            <button class="btn waves-effect waves-light #01579b light-blue darken-4 white-text right" type="submit" name="action">Editar</button>
                        </p>
                    </div>
                </div>

            <!-- </div> -->

        </form>

    </main>

</body>

</html>