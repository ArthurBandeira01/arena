<?php
    if(isset($_POST['atualizar'])){
        include_once('../config.php');

        $fut11 = $_POST['fut11'];
        $fut7 = $_POST['fut7'];
        $society = $_POST['society'];
        $futsal = $_POST['futsal'];
        $volei = $_POST['volei'];
        $futvolei = $_POST['futvolei'];
        $handebol = $_POST['handebol'];

        $sqlCotacao = "UPDATE esportes SET fut_11='$fut11', fut_7='$fut7',
        society='$society', futsal='$futsal', volei='$volei',
        futvolei='$futvolei', handebol='$handebol' WHERE id = 1";

        $result = $conn->query($sqlCotacao);
    }
    header('Location: cotacao_edit.php');
?>