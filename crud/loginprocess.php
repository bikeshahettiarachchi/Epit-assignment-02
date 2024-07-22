<?php
include "connection.php";


if (isset($_POST['mail']) && isset($_POST['pw'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $mail = validate($_POST['mail']);
    $pw = validate($_POST['pw']);

    if (empty($mail)) {
        header("location: index.php?error=Email is required");
        exit();

    } else if (empty($pw)) {
        header("location: index.php?error=Password is required");
        exit();

    } else {
        $sql = "SELECT * FROM user_list WHERE email='$mail' AND password='$pw'";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $mail && $row['password'] === $pw) {

                header("location: home.php");
                exit();
            } else {
                header("location: index.php?error=Incorect email or password");
                exit();
            }
        } else {
            header("location: index.php?error=Incorect email or password");
            exit();
        }

    }

} else {
    header("location: index.php");
    exit();
}

