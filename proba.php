<?php
    session_start();

    require_once "config.php";
?>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Gdyńska Sieć Szkolna</title>
    <link rel="stylesheet" href="style.css?version=51">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<script src="jquery.js"></script>
    </head>
    <body>
        <div id="content">
        <form action="" method="POST">
                    <?php
                            $admin = mysqli_query($link, "SELECT * FROM uzytkownicy WHERE username = '".$_SESSION['username']."'");
                            $permissions = mysqli_fetch_assoc($admin);
                                if ($permissions["admin"] == true) {
                                    echo '<h1>Aktualizuj bazę "komputery"</h1>';
                                    echo '<select name="update_id2" onChange="update(this)">';
                                } else {
                                    echo '<p id="error">Nie posiadasz uprawnień!</p>';
                                    echo '<select name="update_id2" onChange="update(this)" style="visibility: hidden">';
                                }
                    ?>
                    
                        <option selected hidden></option>
                        <?php
                            
                            $sql = "SELECT * FROM komputery";
                            $result = mysqli_query($link,$sql);
                            $admin = mysqli_query($link, "SELECT * FROM uzytkownicy WHERE username = '".$_SESSION['username']."'");
                            $permissions = mysqli_fetch_assoc($admin);
                                if ($permissions["admin"] == true) {
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='".$row["ID"]."'>".$row["ID"]."</option>"; 
                                        }                            } 
                                    else {
                                        echo "0 wyników";
                                    }
                                }
                            
                            /* Database credentials. Assuming you are running MySQL
                            server with default setting (user 'root' with no password) */
                            define('DB_SERVER', 'localhost');
                            define('DB_USERNAME', 'root');
                            define('DB_PASSWORD', '');
                            define('DB_NAME', 'gss');
                            
                            /* Attempt to connect to MySQL database */
                            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                            $ID = $_POST['update_id2'];
                            $lookup = "SELECT * FROM komputery WHERE ID = '$ID'";
                            $result = mysqli_query($link, $lookup);
                            $row = mysqli_fetch_assoc($result);
                            $komputer_id = $row["ID"];
                            $_SESSION["komputer_id"] = $komputer_id;
                            ?>
                </form>
                        <?php
                            //$ID = $_POST["update_id2"];
                            //$_SESSION["update_id"] = $ID;
                            //$update_id = $_SESSION["update_id"];
                            //$sql = "SELECT * FROM komputery WHERE ID = '$update_id'";
                        ?>
                        <script>
                            function update(select) {
                                var id = select.options[select.selectedIndex].getAttribute('value');
                                document.getElementById("content").innerHTML = "<h1>Aktualizujesz komputer o ID. " + id + 
                                "</h1><table id='output'><tr><th>ID szkoły</th><td><form action='../Gdynska-Siec-Szkolna-main/update/szkola_id_k.php' method='POST'><span>Aktualna wartość: 000</span>";
                            }
                        </script>
                        
            </div>
            <?php
                session_start();
                echo $_SESSION["komputer_id"];
            ?> 
    </body>
</html>