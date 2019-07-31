<?php
    $valid = false;
    if($_POST["name"] == "123") $valid = true;
    echo json_encode($valid);
?>