<?php
/**
 * Admin Logout - BARCO MILY COMPANY
 */

session_start();
session_destroy();
header('Location: index.html');
exit;
?>
