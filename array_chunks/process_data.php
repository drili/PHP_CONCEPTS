<?php
    if (isset($_POST["data"])) {
        $data = json_decode($_POST["data"]);

        echo "Received data: " . implode(",", $data);
    } else {
        echo "Error: No data received.";
    }
?>