<?PHP

if ($_POST["submit"] !== "OK" or $_POST["passwd"] == NULL) {
    echo "ERROR\n";
    return;
}

$passwd_file = "../private/passwd";
$login = $_POST["login"];
$passwd = hash("sha256", $_POST["passwd"]);

if (file_exists($passwd_file)) {
    $accounts = file_get_contents($passwd_file);
    $accounts = unserialize($accounts);
    foreach ($accounts as $account) {
        if ($account["login"] === $login) {
            echo "ERROR\n";
            return;
        }
    }
}
if (!file_exists("../private/"))
    @mkdir("../private/", 0700);

$accounts[] = array("login" => $login, "passwd" => $passwd);
$accounts = serialize($accounts);
if (@file_put_contents($passwd_file, $accounts))
    echo "OK\n";
else
    echo "ERROR\n";

?>