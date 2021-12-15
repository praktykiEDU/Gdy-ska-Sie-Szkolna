<?php
    session_start();

    require_once "config.php";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Gdyńska Sieć Szkolna</title>
    <link rel="stylesheet" href="style.css?version=51">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<script src="jquery.js"></script>
</head>
<body>
    <div id="logo">
        <a href="index.php" title="Przejdź na stronę główną">
            <img src="logo.png" alt="logo" height="100px" width="400px">
        </a>
    </div>
    <div id="menu">
        <div id="przegladaj">
            <button type="button" onclick="window.location.href='select.php'" class="menu">Przegladaj</button>
        </div>
        <div id="dodaj">
            <button type="button" onclick="window.location.href='insert.php'" class="menu">Dodaj</Button>
        </div>
        <div id="aktualizuj">
            <button type="button" onclick="window.location.href='update.php'" class="menu">Aktualizuj</button>
        </div>
        <div id="lan">
            <button type="button" onclick="window.location.href='lan.php'" class="menu">LAN</button>
        </div>
        <div id="logowanie">
            <button type='button' onclick='window.location.href=`panel_sterowania.php`' class='menu'>Panel sterowania</button>
        </div>
    </div>
    <div id="content">
    <?php
                error_reporting(0);
                $super_admin = mysqli_query($link, "SELECT * FROM uzytkownicy WHERE username = '".$_SESSION['username']."'");
                $permissions = mysqli_fetch_assoc($super_admin);
                    if ($permissions["super_admin"] == true) {
                        echo '<h1>Aktualizuj bazę "użytkownicy"</h1>';
                        echo '<select onChange="update(this)">';
                    } else {
                        echo '<p id="error">Nie posiadasz uprawnień!</p>';
                        echo '<select onChange="update(this)" style="visibility: hidden">';
                    }
        ?>
            <option selected hidden></option>
                <?php
                    $sql = "SELECT * FROM uzytkownicy";
                    $result = mysqli_query($link,$sql);
                    $super_admin = mysqli_query($link, "SELECT * FROM uzytkownicy WHERE username = '".$_SESSION['username']."'");
                    $permissions = mysqli_fetch_assoc($super_admin);
                        if ($permissions["super_admin"] == true) {
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='".$row["id"]."'>".$row["id"]."</option>"; 
                                }                            } 
                            else {
                                echo "0 wyników";
                            }
                        }
                ?>
                <script>
                    function update(select) {
                        var id = select.options[select.selectedIndex].getAttribute('value');
                        document.getElementById("content").innerHTML = "<h1>Aktualizujesz użytkownika o ID. " + id + 
                        "</h1><table id='output'><tr><th>Nazwa użytkownika</th><td><form action='../Gdynska-Siec-Szkolna-main/update/nazwa_uzytkownika_u.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='nazwa_uzytkownika'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Hasło</th><td><form action='../Gdynska-Siec-Szkolna-main/update/haslo_u.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='haslo'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>E-Mail</th><td><form action='../Gdynska-Siec-Szkolna-main/update/email_u.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='email'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>ID szkoły</th><td><form action='../Gdynska-Siec-Szkolna-main/update/szkola_id_u.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='szkola_id'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Szkoła</th><td><form action='../Gdynska-Siec-Szkolna-main/update/szkola_u.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='szkola'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Admin</th><td><form action='../Gdynska-Siec-Szkolna-main/update/admin_u.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='admin'> <button type='submit'>Zaktualizuj</button></form></td></tr><tr><th>Super admin</th><td><form action='../Gdynska-Siec-Szkolna-main/update/super_admin_u.php' method='POST'><input type='hidden' name='id' value='" + id + 
                        "' readonly> <input type='text' name='super_admin'> <button type='submit'>Zaktualizuj</button></form></td></tr></table><div class='back'><a href='panel_sterowania.php' title='Przejdź na stronę główną'><img src='back.png' alt='Powrót do poprzedniej strony' height='100px' width='100px'></img></a></div>";
                    }
                </script>
            </select>
        <br>
        <div class="back">
            <a href="panel_sterowania.php" title="Przejdź na stronę główną">
                <img src="back.png" alt="Powrót do poprzedniej strony" height="100px" width="100px"></img>
            </a>
        </div>
    </div>
    <footer>
        <div id="uzytkownik">
            <p>
                <?php
                    if (isset($_SESSION["username"])) {
                        $logout = '"logout.php"';
                        echo "Jesteś zalogowany jako: ". $_SESSION["username"]. "<br><a href=". $logout. ">Wyloguj się</a>";
                    } else {
                        echo "Nie jesteś zalogowany";
                    }
                ?>
            </p>
        </div>
        <div id="kontakt">
            <h2>Kontakt</h2>
            <p style="color:#8287b5;">Wydział Edukacji<br>ul. Śląska 35-37<br>81-314 Gdynia</p>
            <ul>
                <li><a href="mailto:wydz.edukacji@gdynia.pl" title="Wyślij e-mail na adres wydz.edukacji@gdynia.pl"><span>wydz.edukacji@gdynia.pl</span></a></li>
                <li><a href="tel:+587617700" title="Zadzwoń na numer +58 7617700"><span>+58 761 77 00</span></a></li>
            </ul>
        </div>
    </footer>
    <script>
        window.onload = function() {
            if(!window.location.hash) {
                window.location = window.location + '#loaded';
                window.location.reload();
            }
        }
    </script>
</body>
</html>