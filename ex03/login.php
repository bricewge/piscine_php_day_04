<?PHP

include("./auth.php");

$login = $_GET["login"];
$passwd = $_GET["passwd"];

if ($login == NULL or $passwd == NULL) {
    echo "ERROR\n";
    return;
}

session_start();
if (auth($login, $passwd)) {
    $_SESSION["loggued_on_user"] = $login;
    echo "OK\n";
}
else {
    $_SESSION["loggued_on_user"] = "";
    echo "ERROR\n";
}

?>