<?php
session_start();
include("permadm.php");

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

    <style>
        .text-a {
            border: 1px solid grey;
            border-radius: 5px;
        }

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
    <?php
    include_once "header.php";
    require_once "conecta.php";
    ?>

    <main class="container">

        <h1 class="center-align"> Cadastrar objeto </h1>
        <form action="cad_obj.php" enctype="multipart/form-data" method="post">

            <div class="card-panel">

                <div class="row">
                    <div class="input-field col s12">
                        <input id="nome" name="nome" type="text" class="validate" pattern="^[A-Za-z0-9\s'\\ -]+$" required>
                        <label for="nome">Nome do Objeto</label>
                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div>



                <div class="row">
                    <div class="input-field col s12">
                        <input id="data_criacao" name="data_criacao" type="date" class="validate" pattern="^\d{2}\/\d{2}\/\d{4}$" required>
                        <label for="data_criacao">Data de criação</label>
                        <span class="helper-text" data-error="A data precisa ser... XX/XX/XXXX"></span>
                    </div>
                </div>



                <div class="row">
                    <div class="input-field col s12">
                        <input id="data_chegada" name="data_chegada" type="date" class="validate" pattern="^\d{2}\/\d{2}\/\d{4}$" required>
                        <label for="data_chegada">Data de chegada</label>
                        <span class="helper-text" data-error="A data precisa ser... XX/XX/XXXX"></span>
                    </div>
                </div>



                <div class="row">
                    <div class="input-field col s12">
                        <input id="condicao" name="condicao" type="text" class="validate" pattern="^[A-Za-zÀ-ÿ\s\-]+$" required>
                        <label for="condicao">Condição</label>
                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div>



                <div class="row">
                    <div class="input-field col s12">
                        <input id="pais_origem" name="pais_origem" type="text" class="validate" pattern="^[A-Za-zÀ-ÿ\s\-]+$" required>
                        <label for="pais_origem">País</label>
                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div>



                <div class="row">
                    <div class="input-field col s12">
                        <p>História</p>
                        <textarea class="text-a" name="historia" id="10" cols="30" rows="10" placeholder="História do objeto"></textarea>
                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div>


                <div class="input-field col s12">
                    <!-- Label do botão de envio -->
                    <div class="file-field input-field">
                        <div class="btn waves-effect waves-light #0d47a1 blue darken-4">
                            <span>Selecione um Arquivo</span>
                            <!-- Input de Arquivo -->
                            <input type="file" name="arquivo">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Nenhum arquivo selecionado" readonly>
                        </div>
                    </div>
                    <!-- Helper Text (mensagem de erro) -->
                    <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                </div>

                <!-- <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light #0d47a1 blue darken-4" type="submit" name="action"><input type="file" name="arquivo"></button>
                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div> -->



                <div class="row">
                    <div class="col s12">
                        <p class="center-align">
                            <button class="#0d47a1 blue darken-4 waves-effect waves-light btn" type="submit" name="action">Cadastrar
                        </p>
                    </div>

                    <div class="col s2">
                        <p class="center-align">
                            <a href="adm_form_museu.php" class="btn waves-effect waves-light brown  lighten-3">Voltar</a>
                        </p>
                    </div>
                </div>


                <!-- <div class="row">
                    <div class="col s2">
                        <p class="center-align">
                            <button class="btn waves-effect waves-light brown  lighten-3" type="submit" name="action">Voltar
                                <i class="material-icons right">send</i> </button>
                        </p>
                    </div>
                </div> -->



        </form>




    </main>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script>
        // Inicializa o date picker
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            M.Datepicker.init(elems, {
                autoClose: true, // Fecha o date picker automaticamente após a seleção
                format: 'dd/mm/yyyy', // Define o formato da data
                yearRange: [1900, 2100], // Define o intervalo de anos


                onSelect: function(date) {
                    console.log('Data selecionada: ', date);
                }
            });
        });




        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });

        /*

        var CPF = document.getElementById("CPF");
        CPF.addEventListener("input", function (event) {
          if (CPF.validity) {
            CPF.setCustomValidity(" ");
          } else {
            CPF.setCustomValidity("");
          }
        }); */
    </script>


</body>

</html>