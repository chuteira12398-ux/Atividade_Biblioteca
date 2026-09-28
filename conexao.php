<?php

$conexao = mysqli_connect(
    "localhost", 
    "root", 
    "root", 
    "biblioteca"
);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}