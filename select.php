<?php
include('config.php');

?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>SELECT</title>
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
    <h2>Команда SELECT</h2>
    <form action="select.php" method="POST">

        <div>
            <label for="name">name:</label>
            <input type="text" id="name" name="users_name">
        </div>
        <div>
            <label for="phone">phone:</label>
            <input type="text" id="phone" name="users_phone">
        </div>
        <div>
            <label for="email">email:</label>
            <input type="text" id="email" name="users_email">
        </div>
        <div>
            <label for="password">passwd:</label>
            <input type="text" id="password" name="users_password">
        </div>
        <div>
            <label for="LIMIT">LIMIT:</label>
            <input type="number" id="LIMIT" name="LIMIT">
        </div>
        <input type="submit" value="вивести на екран">
    </form>
    </body>
    <a href="select.php">Повернутися до пошуку</a><br/><br/>
<?php
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

   // $sql = "SELECT id, name, email, phone, password FROM users LIMIT 25";
    $sql = "SELECT * FROM users  WHERE name='$users_name' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

                      echo "id: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";

        }
    } else {
        echo "0 results";
    }
    $conn->close();
}