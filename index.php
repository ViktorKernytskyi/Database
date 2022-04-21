<?php
if($_SESSION['id']){
    include ('select.php');
}else{
    header('Location: /select.php');
}
