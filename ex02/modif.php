<?PHP

if ($_POST["submit"] !== "OK" or $_POST["newpw"] == NULL) {
    echo "ERROR\n";
    return;
}

$passwd_file = "../private/passwd";
$login = $_POST["login"];
$newpw = hash("sha256", $_POST["newpw"]);
$oldpw = hash("sha256", $_POST["oldpw"]);

$accounts = file_get_contents($passwd_file);
$accounts = unserialize($accounts);
foreach ($accounts as $i => $account) {
    if ($login === $account["login"]) {
        if ($oldpw === $account["passwd"]) {
            $accounts[$i]["passwd"] = $newpw;
            $accounts = serialize($accounts);
            if (@file_put_contents($passwd_file, $accounts)) {
                echo "OK\n";
                return;
            }
            else {
                echo "ERROR\n";
                return;
            }
        }
        else {
            echo "ERROR\n";
            return;
        }
    }
}
echo "ERROR\n";

?>