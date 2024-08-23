<?php

session_start();

include 'includes/_config.php';
include 'includes/functions.php';
include 'includes/_database.php';

global $success;
global $errors;

$inputData = json_decode(file_get_contents('php://input'), true);
preventCSRFAPI($inputData);
stripTagsArray($inputData);

if (!isset($_REQUEST['action']) && !isset($inputData['action'])) {
    redirectTo('../index.php');
}

// Sign Up
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $inputData['action'] === "signUp") {
    $error = isAValidUserConection($inputData);

    if (count($error) > 0) {
        echo json_encode($error);
    } else {
        $insert = $dbCo->prepare(
            "INSERT INTO `user_` (`conection_id`, `password`)
            VALUES (:user, :password);"
        );
        $isInsertOk = $insert->execute([
            'user' => $inputData['user'],
            'password' => password_hash($inputData['password'], PASSWORD_BCRYPT)
        ]);
        if (!$isInsertOk) $result = ['isOk' => $isInsertOk];
        else {
            $result = [
                'isOk' => $isInsertOk,
                'user' => $inputData['user']
            ];
        }
        echo json_encode($result);
    }
}

//Connection
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $inputData['action'] === "logIn") {
    $error = isAValidUserConection($inputData);

    if (count($error) > 0) {
        echo json_encode($error);
    } else {
        $query = $dbCo->prepare(
            "SELECT password FROM user_ WHERE conection_id = :user;"
        );
        $query->execute([
            'user' => $inputData['user']
        ]);
        $result = $query->fetch();
        if($result === false){
            echo json_encode(
                ['isOk' => 'true']
            );
        }
        elseif (!password_verify($inputData['password'], $result['password'])) {
            echo json_encode([
                'isOk' => 'false',
                'error' => $errors['connectionFail']
            ]);
        }
        else {
            $_SESSION['userId'] = $inputData['user'];
            echo json_encode(
                ['isOk' => 'true']
            );
        }
    }
}

//deconection
if($inputData['action'] === 'deco'){
    unset($_SESSION['userId']);
}



//     $query = $dbCo->prepare('SELECT c.text AS choice, id_body_text_leads_to AS id, b.text
//     FROM choice c
//     JOIN possess USING (id_choice)
//     JOIN body_text b USING (id_body_text)
//     WHERE id_body_text = :id;');
//     $query->execute(['id' => intval($inputData['id'])]);
//     $result = $query->fetchAll();
//     echo json_encode($result);
