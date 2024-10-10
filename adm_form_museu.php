<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="adm_museu.php" method="post">

        <fieldset>
            <legend>
                <h1>Museu</h1>
            </legend>

            Nome do objeto: <input type="text" name="nome" placeholder="Nome do objeto">
            <br> <br>
            Data de criação: <input type="text" name="data" placeholder="Data de criação">
            <br> <br>
            Condição: <input type="text" name="condicao" placeholder="Condição do objeto">
            <br> <br>
            País: <input type="text" name="pais" placeholder="País de origem">
            <br> <br>
            <textarea name="historia" id="10" cols="30" rows="10" placeholder="História do objeto "></textarea>

            <br> <br> <br>

            <input type="submit">

        </fieldset>

    </form>

</body>

</html>