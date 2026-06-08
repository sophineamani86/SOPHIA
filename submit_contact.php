<?php
/**
 * Submit Contact Form - BARCO MILY COMPANY
 */

session_start();

$jina = $_POST['jina'] ?? '';
$email = $_POST['email'] ?? '';
$simu = $_POST['simu'] ?? '';
$ujumbe = $_POST['ujumbe'] ?? '';

$errors = [];

if (empty($jina)) $errors[] = 'Jina nilo nyingi';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email sio sahihi';
if (empty($simu)) $errors[] = 'Simu nilo nyingi';
if (empty($ujumbe)) $errors[] = 'Ujumbe nilo nyingi';

if (!empty($errors)) {
    $_SESSION['contact_error'] = implode(', ', $errors);
    header('Location: mawasiliano.html');
    exit;
}

// In a real application, you would save this to database or send email
// For now, just show success message

$_SESSION['contact_success'] = 'Ujumbe wako umekubali! Tutakupatia ndani ya 24 saa.';
header('Location: mawasiliano.html');
exit;
?>
