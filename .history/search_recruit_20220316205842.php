<?php
// (A) DATABASE CONFIG - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "D00239311");
define("DB_CHARSET", "utf8");
define("DB_USER", "D00239311");
define("DB_PASSWORD", "TKJKbRa2");

// (B) CONNECT TO DATABASE
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASSWORD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (Exception $ex) {
    exit($ex->getMessage());
}

// (C) SEARCH
$stmt = $pdo->prepare("SELECT * FROM `recruits` WHERE `recruitName` LIKE ?");
$stmt->execute(["%" . $_POST["search"] . "%"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) {
    echo json_encode($results);
}
?>