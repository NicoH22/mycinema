<?php
function connect($query) {
    $bdd = new PDO("mysql:host=localhost;dbname=wac_exam;charset=utf8", "phpmyadmin", "alohastitch");
    $res = $bdd->query("SELECT * FROM $query");