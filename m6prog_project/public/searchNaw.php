<?php
include_once("../source/database.php");

function GetQueryResultAssoc($result){
    $results = [];
    if ($result){
        for ($i=0; $i < $result->num_rows; $i++){
            $row = $result->fetch_assoc();

            array_push($results,$row);
        }
    }
    return $results;
}

function FindPersoon($conn,$name){
            $q = "SELECT * FROM m6prog_db.naw WHERE naam = ?";
            $stmt = $conn->prepare($q);
            $stmt->bind_param("s", $name);
            $stmt->execute();
            $result = $stmt->get_result();
            $searchResult = GetQueryResultAssoc($result);
            return $searchResult;
        
}

$searchInput = $_GET['search'];

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_SCHEMA);
$searchResults = FindPersoon($conn, $searchInput);
$conn->close();

header('Content-type: application/json; charset=utf-8');
echo json_encode($searchResults);