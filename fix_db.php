<?php

function update_query($old_value, $new_value, $conn)
{
    $update_query = "UPDATE RiskRegistry SET original_risk_id='$new_value' WHERE original_risk_id='$old_value'";

    if ($conn->query($update_query) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$store = array();
$server_name = 'localhost';
$username = 'root';
$password = 'toor';
$database = 'riskregister_prod';

// create connection
$conn = new mysqli($server_name, $username, $password, $database);

// checking connection
if($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!</br>";

// run query
$query = 'SELECT * FROM RiskRegistry WHERE Subproject_subproject_id = 48';
$results = $conn->query($query);

if($results) 
{
    while($row = $results->fetch_assoc())
    {
        $new_risk_id = str_replace('error', '0', $row["original_risk_id"]);
        update_query($row["original_risk_id"], $new_risk_id, $conn);
    }
}
else
{
    echo "No results";
}

// close connection to mysql
mysqli_close($conn);