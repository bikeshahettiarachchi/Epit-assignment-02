<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List Table</title>


    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
" />

</head>


<body class="home_body">

    <div class="container my-5">

        <h2 class="homeheader"> List of Users </h2>
        </br>

        <a class="btn btn-info adduser_button" href="/crud/create.php" role="button"> + Add User</a>

        </br>

        </br>

        <table class="table custom-table">
            <thead >
                <tr>
                    <th>ID</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                    <th>PHONE NUMBER</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sname = "localhost";
                $unmae = "root";
                $password = "Bikesha@14!";
                $db_name = "user_system";

                $connection = mysqli_connect($sname, $unmae, $password, $db_name);

                if ($connection->connect_error) {
                    die("connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM user_list";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
        <tr>
        <td>$row[id]</td>
        <td>$row[first_name]</td>
        <td>$row[last_name]</td>
        <td>$row[email]</td>
        <td>$row[password]</td>
        <td>$row[phone_number]</td>
        <td>$row[status]</td>
        <td>
        <a class='btn btn-primary btn-sm editbutton' href='/crud/edit.php?id=$row[id]'>Edit</a>
        <a class='btn btn-danger btn-sm deletebutton' href='/crud/delete.php?id=$row[id]'>Delete</a>
        </td>
    </tr>
    ";
                }
                ?>

            </tbody>

        </table>

        </di>

</body>


</html>