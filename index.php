<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php program</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
        crossorigin="anonymous">
    <style>
        @import url('https://fonts.cdnfonts.com/css/poppins');

        * {
            padding: 0;
            margin: 0;

            font-family: 'Poppins', sans-serif;
        }

        body {
            display: grid;
            place-items: center;

            text-align: center;
        }
        .green { color: rgb(16, 231, 100); }

        .min-h-screen { min-height: 100vh; }
    </style>
</head>

<body>
    <div class='bg-primary container-fluid text-white p-4'>        
        <h1>PHP program!!</h1>
        <h3>By <?php $name = "TheUnquiet"; echo $name;?></h3>
    </div>

    <?php
    $servername = "localhost";
    $username = "TheUnquiet";
    $password = "Z@ne7521";
    $dbname = "ninja";

    // Connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "<h2 class='text-success m-3'>" . "Connection success" . "<br> </h2>";

    // Adding a record
    $sql = "INSERT INTO entries (name, element)
    VALUES ('Lloyd', 'Energy')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3 class='text-warning'>" ."Record added successfully.". "</h3>". "<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $sql = "SELECT ninjaID, name, element FROM entries";
    $result = $conn->query($sql);

    // Check for data
    if ($result->num_rows > 0) {
        // Output all data
        echo "<table class='table table-bordered container'>"
        ."<caption>List of Ninja's and their elements</caption>"
        ."<tr class='table-success'>"
        ."<th scope='col'>#</th>"
        ."<th scope='col'>Name</th>"
        ."<th scope='col'>Element</th>"
        ."</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>". 
            "<td>". $row["ninjaID"] . "</td>".
            "<td>". $row["name"] . "</td>".
            "<td>". $row["element"] ."</td>". 
            "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results :(";
    }

    $conn->close();

    ?>
</body>

</html>