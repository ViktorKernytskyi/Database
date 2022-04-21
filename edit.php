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

    $sql = "SELECT id, name, email, phone FROM users LIMIT 15";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            // echo "id: " . $row["id"]. " - Name: " . $row["name"].  "<br>";
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
