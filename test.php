<?php
if (function_exists('mysqli_connect')) {
	echo "MySQLi is available.";
} else {
	echo "MySQLi is not available.";
}
?>
