<?php
session_start();

require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Podaj nazwę użytkownika";
    } elseif(!preg_match('/^[a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Nazwa użytkownika może zawierać tylko litery, liczby i podkreślenia";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM uzytkownicy WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Ta nazwa użytkownika jest już zajęta";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Coś poszło nie tak... spróbuj ponownie";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Podaj hasło";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Hasło musi mieć co najmniej 6 znaków";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Potwierdź hasło";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Hasła się nie zgadzają";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO uzytkownicy (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Coś poszło nie tak... spróbuj ponownie";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
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
        <div class="login">
            <h2>Zarejestruj się</h2>
            <p>Uzupełnij ten formularz, aby utworzyć konto</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" placeholder="Nazwa użytkownika:">
                    <br>
                    <span class="invalid-feedback" style="color: red; font-size: small;"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group">
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Hasło:">
                    <br>
                    <span class="invalid-feedback" style="color: red; font-size: small;"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" placeholder="Potwierdź hasło:">
                    <br>
                    <span class="invalid-feedback" style="color: red; font-size: small;"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Zarejestruj się">
                </div>
                <p>Masz już konto? <a href="login.php">Zaloguj się!</a></p>
            </form>
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