<?php

    require_once '../source/config.php';
    require_once SOURCE_ROOT . 'database.php';
    $connection = database_connect();
    $sql = 'SELECT * FROM WeersomstandighedenPerDag WHERE plaats LIKE ? ORDER BY datum'; 
    $stmt = $connection->prepare($sql);
    $plaats = $_GET['search'] . '%';
    $stmt->bind_param('s', $plaats);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($weersomstandigheden = mysqli_fetch_assoc($result)) {
        echo '<h2>' . $weersomstandigheden['Plaats'] . '</h2>';
        echo '<h2>' . $weersomstandigheden['datum'] . '</h2>';
        echo '<h2>' . $weersomstandigheden['aantalGraden'] . '</h2>';
        echo '<h2>' .$weersomstandigheden['windKracht'] . '</h2>';
        echo '<h2>' . $weersomstandigheden['regenInMilimeters'] . '</h2>';
    };