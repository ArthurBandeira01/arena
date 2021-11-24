<?php

include_once('../config.php');

if(!empty($_GET['id'])){
    //Variável de erro caso tenho campos inválidos no cadastro:
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM quadras WHERE id=$id";

    $result = $conn->query($sqlSelect);
    if($result->num_rows > 0){
        $sqlDelete = "DELETE FROM quadras WHERE id=$id";
        $resultDelete = $conn->query($sqlDelete);
    }
    header('Location: quadras_edit.php');
}else{
    header('Location: quadras_edit.php');
}

?>