<?php
unset($_SESSION['logged_in']);
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

$logout = <<<EOT
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>VirtuOps&reg; Commander Logout</title>
        <link rel="stylesheet" href="libs/css/login.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  </head>

  <body>
    <div class="wrapper">
        <div class="container">
                <h1>You have logged out of VirtuOps<sup><span style="font-size: 10px;">&reg;</span></sup> Commander</h1>

        </div>

</div>
  </body>
</html>
EOT;
echo $logout;
header ("Refresh: 1; index.php");
?>
