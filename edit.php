<?php
include('config.php');

?>
<html>
<body>
<table border="1" align="center" cellspacing="0">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>phone</th>
                <th>дійство</th>
        <th>дійство</th>
    </tr>
    <?php
    $conn = new mysqli($dblocation, $dbuser, $dbpasswd, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$id = $_POST['users_id'];
$users_name = trim($_POST['users_name']);
$users_email = trim($_POST['users_email']);
$users_phone = trim($_POST['users_phone']);
$users_password = trim($_POST['users_password']);

  $sql = $conn->prepare('SELECT * FROM users WHERE 1');
//$sql->bind_param('ssss',  $id, $users_name, $users_email, $users_phone ); // 's' SELECT * FROM users WHEREspecifies the variable type => 'string'
$sql->execute();

$result = $sql->get_result();
if ($sql->execute()) {
    while ($row = $result->fetch_assoc()) {

            echo '<tr>

<td>' . $row['id'] . '</td> 

<td>' . $row['name'] . '</td>
 <td>' .$row['email']. '</td> 
<td>' . $row['phone'] . '</td>
              
                <td><a href="/update.php?id=' . $row['id'] . '">редагування</a></td>' . '
               <td>
               <form method="post" action="/delete.php">
                <input hidden value="' . $row['id'] . '" name="item">               
               <button type="submit">
               delete
</button>
</form>
</td>
               </tr>';

        }
    } else {
        echo "0 results";
    }
    $conn->close();
