<?PHP


function auth($login, $passwd) {
    $passwd_file = "../private/passwd";
    $accounts = @file_get_contents($passwd_file);
    $accounts = unserialize($accounts);
    $passwd = hash("sha256", $passwd);
    foreach ($accounts as $i => $account) {
        if ($login === $account["login"]) {
            if ($passwd === $account["passwd"])
                return TRUE;
            else
                return FALSE;
        }
    }
    return FALSE;
}

?>