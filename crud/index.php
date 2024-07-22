<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loging</title>


    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">

</head>

<body class="body">

    <form class="form" method="POST" action="loginprocess.php">

        <h2 class="loging">LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?> </p>
        <?php } ?>

      
        <label class="label">Email</label>
        <input class="input" type="email" name="mail" placeholder="email">
        </br>

        <label class="label">Password</label>
        <input class="input" type="password" name="pw" placeholder="password">
        </br>

        <button class="submit_button" type="submit">Loging</button>

    </form>

</body>

</html>