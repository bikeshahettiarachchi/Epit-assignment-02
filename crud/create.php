<?php

$sname = "localhost";
$unmae = "root";
$password = "Bikesha@14!";
$db_name = "user_system";

$connection = mysqli_connect($sname, $unmae, $password, $db_name);

$first_name = "";
$last_name = "";
$email = "";
$password = "";
$phone_number = "";
$status = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $status = $_POST['status'];

    do {
        if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($phone_number) || empty($status)) {
            $errorMessage  = "All the fields are required";
            break;
        }

        $sql = "INSERT INTO user_list (first_name, last_name, email, password, phone_number, status) " .
            "VALUES ('$first_name', '$last_name', '$email', '$password', '$phone_number', '$status')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $first_name = "";
        $last_name = "";
        $email = "";
        $password = "";
        $phone_number = "";
        $status = "";

        $successMessage = "Client added correctly";

        header("Location: /crud/home.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="create-background">
    <div class="container my-5">
        <h2 class="newuser">Add New User</h2>
        <?php if (!empty($errorMessage)) { ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-6">
                    <div class="alert alert-warning alert-dismissible fade show error-alert" role="alert">
                        <strong><?php echo $errorMessage; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if (!empty($successMessage)) { ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-6">
                    <div class="alert alert-success alert-dismissible fade show done-alert" role="alert">
                        <strong><?php echo $successMessage; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php } ?>

    

        <form class="newuser-form" method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label list" ></label>
                <div class="col-sm-6">
                    <input type="text" placeholder="First name" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label list"></label>
                <div class="col-sm-6">
                    <input type="text" placeholder="Last name" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label list"></label>
                <div class="col-sm-6">
                    <input type="text" placeholder="Email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label list"></label>
                <div class="col-sm-6">
                    <input type="text" placeholder="Password" class="form-control" name="password" value="<?php echo $password; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label list"></label>
                <div class="col-sm-6">
                    <input type="text" placeholder="Phone number" class="form-control" name="phone_number" value="<?php echo $phone_number; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label list"></label>
                <div class="col-sm-6">
                    <select class="form-control" name="status">
                        <option value="">Select Status </option>
                        <option value="Active" <?php if ($status == 'Active')
                            echo 'selected'; ?>>Active</option>
                        <option value="Inactive" <?php if ($status == 'Inactive')
                            echo 'selected'; ?>>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-light" href="/crud/home.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>