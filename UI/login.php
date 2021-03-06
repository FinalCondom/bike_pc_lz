<!DOCTYPE html>
<?php
include_once "../BLL/changeLanguage.php";
if(isset($_SESSION['userId'])) {
    header('Location: '."./index.php");
}

//This page is used for the login

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title><?php echo $lang['LOGIN'];?></title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

<?php include("menus.php"); ?>
<main>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center deep-orange-text"><?php echo $lang['CONNECT'];?></h1>
        <br><br>
        <form class="col s12" action="#" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">person</i>
                    <input type="text" name="name"required>
                    <label for="name"><?php echo $lang['NAME'];?></label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" name="password" required>
                    <label for="password"><?php echo $lang['PASSWORD'];?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                </div>
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light orange" type="submit" name="submit"><?php echo $lang['LOGIN'];?>
                        <i class="material-icons right">check</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

    <?php
    require_once "../BLL/userManager.php";
    $userManager = new UserManager();
    if(isset($_POST['submit'])){
        $user = $userManager->getUsersByNameAndPassword($_POST['name'], $_POST['password']);
        if(!is_null($user)){
            $_SESSION['userId'] = $user->getId();
            header('Location: '."./index.php");
        }
    }
    ?>
</main>
<?php include("footer.php"); ?>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="../js/init.js"></script>

</body>
</html>
