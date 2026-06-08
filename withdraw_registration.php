<?php
include("db.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    mysqli_query($conn,
    "DELETE FROM registrations WHERE id='$id'");

    header("Location: my_registrations.php");
}
?>