<?PHP

session_start ();
if ($_GET["submit"] === "OK") {
    $_SESSION["login"] = $_GET["login"];
    $_SESSION["passwd"] = $_GET["passwd"];
}
$login = $_GET["login"] ? $_GET["login"] : $_SESSION["login"];
$passwd = $_GET["passwd"] ? $_GET["passwd"] : $_SESSION["passwd"];

echo '<html><body>
<form name="index.php" method="GET">
  Username: <input type="text" name="login" value="'.$login.'" />
  <br />
  Password: <input type="password" name="passwd" value="'.$passwd.'" />
  <input type="submit" name="submit" value="OK" />
</form>
</body></html>
';

?>