<?php
    session_start();

    require_once "config.php";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Gdyńska Sieć Szkolna</title>
    <link rel="stylesheet" href="styleV2.css">
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
            <button type="button" onclick="window.location.href='select.php'" class="menu" >Przegladaj</button>
        </div>
        <div id="dodaj">
            <button type="button" onclick="window.location.href='insert.php'" class="menu" >Dodaj</Button>
        </div>
        <div id="aktualizuj">
            <button type="button" onclick="window.location.href='update.php'" class="menu" >Aktualizuj</button>
        </div>
        <div id="lan">
            <button type="button" onclick="window.location.href='lan.php'" class="menu" >LAN</button>
        </div>
        <div id="logowanie">
            <?php
                error_reporting(0);
                if (($_SESSION["loggedin"]) == true) {
                    echo "<button type='button' onclick='window.location.href=`panel_sterowania.php`' class='menu'>Panel sterowania</button>";
                } else {
                    echo "<button type='button' onclick='window.location.href=`login.php`' class='menu'>Zaloguj się</button>";
                }
            ?>
        </div>
    </div>
    <div id="content">
        <?php
                error_reporting(0);
                $admin = mysqli_query($link, "SELECT * FROM uzytkownicy WHERE username = '".$_SESSION['username']."'");
                $permissions = mysqli_fetch_assoc($admin);
                    if ($permissions["admin"] == true) {
                        echo '<table id="output">';
                    } else {
                        echo '<p id="error">Nie posiadasz uprawnień!</p>';
                        echo '<table id="output" style="visibility: hidden">';
                    }
        ?>
            <tr>
                <th>ID</th> <th>ID szkoły</th> <th>Piętro</th> <th>Pokój</th> <th>Typ komputera</th> <th>Producent komputera</th> 
                <th>Model komputera</th> <th>Numer seryjny komputera</th> <th>Part number komputera</th> <th>Data zakupu</th> <th>Gwarancja komputera</th> <th>Numer inwentarzowy komputera</th> <th>Nazwa hosta</th> 
                <th>System operacyjny</th> <th>Wersja bitowa</th> <th>Nazwa procesora</th> <th>Oznaczenie procesora</th> <th>RAM</th>
                <th>Typ dysku 1</th> <th>Wielkość dysku 1</th> <th>Typ dysku 2</th> <th>Wielkość dysku 2</th> <th>Typ dysku 3</th> 
                <th>Wielkość dysku 3</th> <th>Typ dysku 4</th> <th>Wielkość dysku 4</th> <th>RAID</th> <th>Producent monitora</th>
                <th>Model monitora</th> <th>Numer seryjny monitora</th> <th>Part number monitora</th> <th>Data zakupu monitora</th>
                <th>Numer inwentarzowy monitora</th> <th>Awarie</th> <th>Uwagi</th>
            </tr>
            <?php
                $href1 =  '<a class="href" href="szkoly.php">';
                $href2 = '</a>';
                $sql = "SELECT * FROM komputery WHERE Szkoła_ID = '".$_SESSION['szkola_id']."'";
                $result = mysqli_query($link,$sql);
                $admin = mysqli_query($link, "SELECT * FROM uzytkownicy WHERE username = '".$_SESSION['username']."'");
                $permissions = mysqli_fetch_assoc($admin);
                    if ($permissions["admin"] == true) {
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>"."<th> ".$row["ID"]."</th>"."<td>". $href1 .$row["Szkoła_ID"]. $href2. "</td>"."<td>".$row["Piętro"]."</td>"."<td>".$row["Pokój"]."</td>".
                            "<td>".$row["Typ_komputera"]."</td>"."<td>".$row["Producent_komputera"].
                            "</td>"."<td>".$row["Model_komputera"]."</td>"."<td>".$row["Numer_seryjny_komputera"]."</td>"."<td>".$row["Part_number_komputera"]."</td>".
                            "<td>".$row["Data_zakupu_komputera"]."</td>"."<td>".$row["Gwarancja_komputera"]."</td>"."<td>".$row["Numer_inwentarzowy_komputera"]."</td>".
                            "<td>".$row["Nazwa_hosta"]."</td>"."<td>".$row["System_operacyjny"]."</td>"."<td>".$row["Wersja_bitowa"]."</td>".
                            "<td>".$row["Nazwa_procesora"]."</td>"."<td>".$row["Oznaczenie_procesora"]."</td>"."<td>".$row["RAM"]."</td>"."<td>".$row["Typ_dysku_1"]."</td>".
                            "<td>".$row["Wielkość_dysku_1"]."</td>"."<td>".$row["Typ_dysku_2"]."</td>"."<td>".$row["Wielkość_dysku_2"]."</td>"."<td>".$row["Typ_dysku_3"]."</td>".
                            "<td>".$row["Wielkość_dysku_3"]."</td>"."<td>".$row["Typ_dysku_4"]."</td>"."<td>".$row["Wielkość_dysku_4"]."</td>"."<td>".$row["RAID"]."</td>".
                            "<td>".$row["Producent_monitora"]."</td>"."<td>".$row["Model_monitora"]."</td>"."<td>".$row["Numer_seryjny_monitora"]."</td>"."<td>".$row["Part_number_monitora"]."</td>".
                            "<td>".$row["Data_zakupu_monitora"]."</td>"."<td>".$row["Numer_inwentarzowy_monitora"]."</td>"."<td>".$row["Awarie"]."</td>".
                            "<td>".$row["Uwagi"]."</td>"."</tr>" ; 
                            }
                        } 
                        else {
                            echo "0 wyników";
                        }
                    }
                ?>
            
        </table>
        <div class="back">
            <a href="select.php" title="Przejdź na stronę główną">
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
</body>
</html>