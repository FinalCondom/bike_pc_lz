<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Home</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<body>
<?php include("menus.php");?>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center orange-text">Réservations</h1>
        <br><br>

        <table class="striped">
            <thead>
            <tr>
                <th>Date</th>
                <th>Trajet</th>
                <th>Vélo(s)</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>4.11.2017</td>
                <td>Zinal - Sierre</td>
                <td>2</td>
            </tr>
            <tr>
                <td>15.11.2017</td>
                <td>Ayer - Sierre</td>
                <td>8</td>
            </tr>
            <tr>
                <td>20.11.2017</td>
                <td>Sierre - St-Luc</td>
                <td>1</td>
            </tr>
            </tbody>
        </table>
        <br><br>
    </div>
</div>

<?php include("footer.php"); ?>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../js/init.js"></script>

</body>
</html>