<?php
/**
 * API - BARCO MILY COMPANY
 * Frontend API Endpoints
 */

header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/db.php';

$action = $_GET['action'] ?? '';

try {
    if ($action === 'get_bidhaa') {
        $stmt = $pdo->query("SELECT * FROM bidhaa WHERE kiwango > 0 ORDER BY imeundwa DESC");
        $bidhaa = $stmt->fetchAll();
        echo json_encode(['success' => true, 'bidhaa' => $bidhaa]);
        
    } elseif ($action === 'submit_order') {
        $jina = $_POST['jina'] ?? '';
        $email = $_POST['email'] ?? '';
        $simu = $_POST['simu'] ?? '';
        $bidhaa_ids = $_POST['bidhaa_ids'] ?? '[]';
        $idadi = $_POST['idadi'] ?? '[]';
        $bei_jumla = $_POST['bei_jumla'] ?? 0;
        
        if (!$jina || !$email || !$simu) {
            throw new Exception('Tafadhali jaza sehemu zote');
        }
        
        $stmt = $pdo->prepare("INSERT INTO amri (jina_mteja, barua_pepe, simu, bidhaa_ids, idadi_bidhaa, bei_jumla) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$jina, $email, $simu, $bidhaa_ids, $idadi, $bei_jumla]);
        
        echo json_encode(['success' => true, 'message' => 'Amri iliyokubali. Tutakupatia haraka.']);
        
    } else {
        echo json_encode(['success' => false, 'message' => 'Action haijulikani']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
