<?php
/**
 * Database Configuration - Ufungaji na Kilimo System
 * BARCO MILY COMPANY - Ufungaji wa Asili na Kilimo
 */

$dbHost = 'localhost';
$dbName = 'barco_mily_db';
$dbUser = 'root';
$dbPass = '';

try {
    $pdo = new PDO(
        "mysql:host=$dbHost;charset=utf8mb4",
        $dbUser,
        $dbPass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `$dbName`");
    
    // Table: Bidhaa (Products)
    $pdo->exec(
        "CREATE TABLE IF NOT EXISTS bidhaa (
            id INT AUTO_INCREMENT PRIMARY KEY,
            jina VARCHAR(255) NOT NULL UNIQUE,
            aina ENUM('asili', 'vifaa', 'nektari', 'kilimo') NOT NULL DEFAULT 'asili',
            bei INT NOT NULL,
            kiwango INT NOT NULL DEFAULT 0,
            maelezo TEXT,
            picha VARCHAR(255),
            imeundwa DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            imebadilishwa DATETIME ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
    );
    
    // Table: Ufugaji (Beekeeping Records)
    $pdo->exec(
        "CREATE TABLE IF NOT EXISTS ufugaji (
            id INT AUTO_INCREMENT PRIMARY KEY,
            tarehe DATE NOT NULL,
            idadi_mbuzi INT NOT NULL DEFAULT 0,
            asili_kuzaliana INT NOT NULL DEFAULT 0,
            asili_kuuzwa INT NOT NULL DEFAULT 0,
            asili_bei INT NOT NULL DEFAULT 0,
            chakula_bei INT NOT NULL DEFAULT 0,
            maelezo TEXT,
            imeundwa DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
    );
    
    // Table: Kilimo (Agriculture Records)
    $pdo->exec(
        "CREATE TABLE IF NOT EXISTS kilimo (
            id INT AUTO_INCREMENT PRIMARY KEY,
            tarehe DATE NOT NULL,
            zao VARCHAR(255) NOT NULL,
            sehemu DECIMAL(10, 2) NOT NULL,
            kiwango_inchi INT NOT NULL,
            asili_kuzaliana DECIMAL(10, 2) NOT NULL DEFAULT 0,
            bei_kwa_kilo INT NOT NULL DEFAULT 0,
            maelezo TEXT,
            imeundwa DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
    );
    
    // Table: Amri (Orders)
    $pdo->exec(
        "CREATE TABLE IF NOT EXISTS amri (
            id INT AUTO_INCREMENT PRIMARY KEY,
            jina_mteja VARCHAR(255) NOT NULL,
            barua_pepe VARCHAR(255) NOT NULL,
            simu VARCHAR(20),
            bidhaa_ids JSON NOT NULL,
            idadi_bidhaa JSON NOT NULL,
            bei_jumla INT NOT NULL,
            hali ENUM('mpya', 'inaandaliwa', 'imetumwa', 'imekamilika', 'imeghairiwa') NOT NULL DEFAULT 'mpya',
            imeundwa DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            imebadilishwa DATETIME ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
    );

} catch (PDOException $error) {
    die('Database connection failed: ' . htmlspecialchars($error->getMessage(), ENT_QUOTES, 'UTF-8'));
}
?>
