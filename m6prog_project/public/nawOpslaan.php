<?php
    include '../source/database.php';
    $data = file_get_contents('php://input');
    $json = json_decode($data);

    $postcode = substr($json->postcode, 0, 5);
    
    $conn = database_connect();
    $q = "insert into naw (naam, email, straat, huisnummer, postcode) values (?, ?, ?, ?, ?); ";
    $stmt = $conn->prepare($q);
    $stmt->bind_param("sssss",
                        $json->naam,
                        $json->email,
                        $json->straat,
                        $json->huisnummer,
                        $postcode
                    );
    $result = $stmt->execute();

    $sql = 'SELECT COUNT(1) as count FROM naw WHERE email=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $json->email);
    $stmt->execute();
    $result_count = $stmt->get_result();
    $count = mysqli_fetch_assoc($result_count);
    $insert_id = $stmt->insert_id;

    $response = [
        'succeeded' => $result,
        'success' => $count['count'] === 0,
        'count' => $count['count']
    ];

    if ($count['count'] > 0) {
        $response['error'] = 'Dit email adres komt al voor in de database';
    }

    echo json_encode($response);