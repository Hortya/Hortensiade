<?php

session_start();

include 'includes/_config.php';
include 'functions.php';
include 'includes/_database.php';

global $success;
global $errors;

$inputData = json_decode(file_get_contents('php://input'), true);

    $query = $dbCo->prepare('SELECT c.text AS choice, id_body_text_leads_to AS id, b.text
    FROM choice c
    JOIN possess USING (id_choice)
    JOIN body_text b USING (id_body_text)
    WHERE id_body_text = :id;');
    $query->execute(['id' => intval($inputData['id'])]);
    $result = $query->fetchAll();
    echo json_encode($result);


