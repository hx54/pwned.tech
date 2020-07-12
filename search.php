<?php
    $servername = "localhost";
    $username = "username";
    $password = "passoword";
    $dbname = "base";


        // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "connection error";
    }


    if($_POST['target'] == ""){
        header("Location: index.php?error=You need to input a target");
        exit();
    } elseif ($_POST['key'] == ""){
        header("Location: index.php?error=You need to input your auth key");
        exit();
    } else {
        $keylol = $_POST['key'];
        $sql = "SELECT user, userkey, valid FROM users WHERE userkey='$keylol'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row["valid"] == "yes"){
            $target = $_POST["target"];
            $cookie_name = "key";
            $cookie_value = $row['userkey'];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            function find($target)
            {

                $file = "C:\\xampp\\htdocs\\wyciek\\$target.txt";
                $myfile = fopen($file, "r");
                $openfile = fread($myfile, filesize($file));

                return $openfile;
            }

            error_reporting(E_ERROR | E_PARSE);
            $output = find($target);
            if (strlen($output) <= 0){
                header("Location: index.php?error=No results found in DB");
                exit();
            } else {
                ?>
                <!DOCTYPE html>
                <html>
                <head>
                    <title>DB Results</title>
                    <link rel="stylesheet" href="style.css">
                </head>
                <body>
                <center>
                <div class="container">
                    <h2>Results found in db: </h2><br>
                    <?php
                    copy('https://minotar.net/avatar/'.$target, 'image.jpg');
                    echo "<img src='image.jpg'>";
                    ?>
                    <?php echo nl2br($output);?>
                </div></center>
                </body>
                </html>
<?php
            }


        } else {
            header("Location: index.php?error=Invalid auth key");
            exit();
        }
        $conn->close();
    }
?>

