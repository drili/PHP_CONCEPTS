<?php 
    // *** Prereq
    $root_directory = $_SERVER['DOCUMENT_ROOT'] . "/PHP_CONCEPTS";

    require '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable($root_directory);
    $dotenv->load();

    $HOSTNAME = $_ENV["HOSTNAME"];
    $USERNAME = $_ENV["USERNAME"];
    $PASSWORD = $_ENV["PASSWORD"];
    $DATABASE = $_ENV["DATABASE"];

    $db_connection = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        printf("::: Connect failed: %s\n", mysqli_connect_error()); 
        exit();
    } else {
        echo "<script>console.log('::: Database connected...')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.7.5/js/foundation.min.js" integrity="sha512-xpawU2EKh0HLTLWu8khGczejw+OaWWr+JBcbFBWtRUIkkhuMRZZeEFxY0n51aeC9YF4jxOMzd0pTR9m0tiSvsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.7.5/css/foundation-float.min.css" integrity="sha512-COhcCg6IPtpBb4rDu3fJb+MOVP8vjJmoASF9jl8KoPQwQTlh3pKBE7FHPBPLnd3jV/ZJ77g+8haAFlNwtkOi1Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .grid-container {
            padding: 0 20%;
        }
        section {
            margin-bottom: 60px;
        }
        code {
            width: 100%;
            float: left;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="grid-container">
        <div class="grid-x">

            <div class="cell small-12">
                <section>
                    <h1>Array Chunks - Project Test</h1>
                    <hr>
                </section>  
            </div>

            <div class="cell small-12">
                <section>
                    <h5>Output</h5>

                    <div class="output">
                        <?php
                            // *** Method 1 using only PHP
                            // $sql = "SELECT * FROM `time_registrations`";
                            // $sql_res = $db_connection->query($sql);
                            // $rows = $sql_res->fetch_all();

                            // // var_dump($rows);

                            // $chunks = array_chunk($rows, 10);

                            // foreach ($chunks as $chunk) {
                            //     $row = $chunk[0];

                            //     var_dump($row);
                            // }
                        ?>
                    </div>
                </section>
            </div>

        </div>
    </div>

    <script>
        // *** Method 2 using PHP & AJAX
        <?php
            $sql = "SELECT * FROM `time_registrations`";
            $sql_res = $db_connection->query($sql);
            $rows = $sql_res->fetch_all();

            $chunks = array_chunk($rows, 10);
        ?>

        <?php foreach ($chunks as $chunk) : ?>
            <?php $row = $chunk[0] ?>
            $(".output").append("<div class='response-data'>"+ <?php echo $row[0]; ?> +"</div>");
            
        <?php endforeach; ?>
    </script>
</body>
</html>