<?php include ('config.php');

if (!empty($_POST)) {

    $conn = new mysqli($dblocation, $dbuser, $dbpasswd, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id = $_POST['users_id'];
    $users_name = trim($_POST['users_name']);
    $users_email = trim($_POST['users_email']);
    $users_phone = trim($_POST['users_phone']);
    $users_password = trim($_POST['users_password']);


    $sql = $conn->prepare("insert into users (`name`, `email` ,  `phone`, `password`) values (?, ?,?, ?)");
   $sql->bind_param("ssss", $users_name, $users_email, $users_phone, $users_password);

       if (   $sql->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error updating record";
    }

    $sql->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>UPDATE</title>
    <style>
        label {
            display: inline-block;
            width: 170px;
        }
        form > div {
            margin-bottom: 5px;
        }
        td:nth-child(5), td:nth-child(6) {
            text-align: center;
        }
        table {
            border-spacing: 0;
            border-collapse: collapse;
        }
        td, th {
            padding: 10px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
<h2>Команда INSERT</h2>
<form action="add.php" method="POST">
       <div>
        <label for="users_name">name:</label>
        <input type="text" id="users_name" name="users_name">
    </div>
    <div>
        <label for="email">email:</label>
        <input type="text" id="email" name="users_email">
    </div>
    <div>
        <label for="phone">phone:</label>
        <input type="text" id="phone" name="users_phone">
    </div>
       <div>
        <label for="password">passwd:</label>
        <input type="text" id="password" name="users_password">
    </div>
    <input type="submit" value="Отправить">
</form>
</body>
<a href="edit.php">Повернутися до списку</a><br/><br/>

