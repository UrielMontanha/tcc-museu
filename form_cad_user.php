<?php
include_once "header.php";
require_once "conecta.php";
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

        <h1 class="center-align"> Cadastrar usuario </h1>
        <form action="cad_user.php" enctype="multipart/form-data" method="post">

            <div class="card-panel">

                <div class="row">
                    <div class="input-field col s12">
                        <input id="nome" name="nome" type="text" class="validate" pattern="^[A-Za-zÀ-ÿ\s\-]+$" required>
                        <label for="nome">Nome do usuário</label>
                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div>



                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name="email" type="text" class="validate" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>
                        <label for="email">Email</label>
                        <span class="helper-text" data-error="Campo com preenchimento obrigatório."></span>
                    </div>
                </div>



                <div class="row">
                    <div class="input-field col s12">
                        <input id="data_nasc" name="data_nasc" type="date" class="validate" pattern="^\d{2}\/\d{2}\/\d{4}$" required>
                        <label for="data_nasc">Data de nascimento</label>
                        <span class="helper-text" data-error="A data precisa ser... XX/XX/XXXX"></span>
                    </div>
                </div>



                <div class="row">
                    <div class="input-field col s12">
                        <input id="cpf" name="cpf" type="text" class="validate" pattern="^\d{3}\.\d{3}\.\d{3}-\d{2}$" required>
                        <label for="cpf">CPF</label>
                        <span class="helper-text" data-error="Campo com preenchimento orbigatório XXX.XXX.XXX-XX"></span>
                    </div>
                </div>



                <div class="row">
                    <div class="input-field col s12">
                        <input id="status" name="status" type="number" class="validate" pattern="^[01]+$" required>
                        <label for="status">Status</label>
                        <span class="helper-text" data-error="Você pode usar 0 (para usuários comuns) ou 1 (para administradores). Campo com preenchimento obrigatório."></span>
                    </div>
                </div>



                <div class="row">
                    <div class="col s12">
                        <p class="center-align">
                            <a href="crud_users.php" class="btn waves-effect waves-light red darken-4 white-text left">Voltar</a>
                            <button class="btn waves-effect waves-light #01579b light-blue darken-4 white-text right" type="submit" name="action">Cadastrar</button>
                        </p>
                </div>
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
        
    </script>


</body>

</html>