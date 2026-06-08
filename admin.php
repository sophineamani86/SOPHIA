<?php
/**
 * Admin Dashboard - BARCO MILY COMPANY
 */

session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: admin_login.php');
    exit;
}

require_once __DIR__ . '/db.php';

$action = $_GET['action'] ?? '';
$message = '';
$error = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if ($action === 'add_bidhaa') {
            $jina = $_POST['jina'] ?? '';
            $aina = $_POST['aina'] ?? 'asili';
            $bei = $_POST['bei'] ?? 0;
            $kiwango = $_POST['kiwango'] ?? 0;
            $maelezo = $_POST['maelezo'] ?? '';

            // Handle image upload
            $picha_path = null;
            if (!empty($_FILES['picha']) && $_FILES['picha']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/images/products';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
                $tmpName = $_FILES['picha']['tmp_name'];
                $origName = basename($_FILES['picha']['name']);
                $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
                $allowed = ['jpg','jpeg','png','gif','webp'];
                if (in_array($ext, $allowed)) {
                    $filename = uniqid('prod_') . '.' . $ext;
                    $dest = $uploadDir . '/' . $filename;
                    if (move_uploaded_file($tmpName, $dest)) {
                        $picha_path = 'images/products/' . $filename;
                    }
                }
            }

            $stmt = $pdo->prepare("INSERT INTO bidhaa (jina, aina, bei, kiwango, maelezo, picha) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$jina, $aina, $bei, $kiwango, $maelezo, $picha_path]);
            $message = 'Bidhaa imeongezwa!';
            
        } elseif ($action === 'add_ufugaji') {
            $tarehe = $_POST['tarehe'] ?? date('Y-m-d');
            $idadi = $_POST['idadi_mbuzi'] ?? 0;
            $asali_zal = $_POST['asali_kuzaliana'] ?? 0;
            $asali_uz = $_POST['asali_kuuzwa'] ?? 0;
            $asali_bei = $_POST['asali_bei'] ?? 0;
            $chakula_bei = $_POST['chakula_bei'] ?? 0;
            $maelezo = $_POST['maelezo'] ?? '';
            
            $stmt = $pdo->prepare("INSERT INTO ufugaji (tarehe, idadi_mbuzi, asali_kuzaliana, asali_kuuzwa, asali_bei, chakula_bei, maelezo) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$tarehe, $idadi, $asali_zal, $asali_uz, $asali_bei, $chakula_bei, $maelezo]);
            $message = 'Rekodi ya ufugaji imeongezwa!';
            
        } elseif ($action === 'add_kilimo') {
            $tarehe = $_POST['tarehe'] ?? date('Y-m-d');
            $zao = $_POST['zao'] ?? '';
            $sehemu = $_POST['sehemu'] ?? 0;
            $kiwango = $_POST['kiwango_inchi'] ?? 0;
            $asali = $_POST['asali_kuzaliana'] ?? 0;
            $bei = $_POST['bei_kwa_kilo'] ?? 0;
            $maelezo = $_POST['maelezo'] ?? '';
            
            $stmt = $pdo->prepare("INSERT INTO kilimo (tarehe, zao, sehemu, kiwango_inchi, asali_kuzaliana, bei_kwa_kilo, maelezo) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$tarehe, $zao, $sehemu, $kiwango, $asali, $bei, $maelezo]);
            $message = 'Rekodi ya kilimo imeongezwa!';
        }
    } catch (Exception $e) {
        $error = 'Kosa: ' . $e->getMessage();
    }
}

// Get statistics
$stmt = $pdo->query("SELECT COUNT(*) as count FROM bidhaa");
$total_bidhaa = $stmt->fetch()['count'];

$stmt = $pdo->query("SELECT COUNT(*) as count FROM amri WHERE hali != 'imeghairiwa'");
$total_amri = $stmt->fetch()['count'];

$stmt = $pdo->query("SELECT COUNT(*) as count FROM ufugaji");
$total_ufugaji = $stmt->fetch()['count'];

$stmt = $pdo->query("SELECT COUNT(*) as count FROM kilimo");
$total_kilimo = $stmt->fetch()['count'];
?>
<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | BARCO MILY</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .admin-header {
            background: #333;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .admin-header h1 {
            margin: 0;
            font-size: 20px;
        }
        .admin-header a {
            color: white;
            text-decoration: none;
            background: #ff9800;
            padding: 8px 15px;
            border-radius: 4px;
        }
        .admin-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            border-left: 4px solid #ff9800;
        }
        .stat-card h3 {
            margin: 0 0 10px 0;
            color: #666;
            font-size: 14px;
        }
        .stat-card .number {
            font-size: 32px;
            font-weight: bold;
            color: #ff9800;
        }
        .section {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .section h2 {
            margin-top: 0;
            color: #333;
            border-bottom: 2px solid #ff9800;
            padding-bottom: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #555;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
            font-family: inherit;
        }
        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: background 0.3s;
        }
        .btn-primary {
            background: #ff9800;
            color: white;
        }
        .btn-primary:hover {
            background: #f57c00;
        }
        .message {
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .message.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .message.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        .tab {
            padding: 10px 20px;
            background: none;
            border: none;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            font-weight: 600;
            color: #666;
            transition: all 0.3s;
        }
        .tab.active {
            color: #ff9800;
            border-bottom-color: #ff9800;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="admin-header">
        <h1>🐝 BARCO MILY - Admin Dashboard</h1>
        <a href="admin_logout.php">Logout</a>
    </div>
    
    <div class="admin-container">
        <?php if ($message): ?>
            <div class="message success"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="message error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <div class="stats">
            <div class="stat-card">
                <h3>Bidhaa</h3>
                <div class="number"><?= $total_bidhaa ?></div>
            </div>
            <div class="stat-card">
                <h3>Amri za Mteja</h3>
                <div class="number"><?= $total_amri ?></div>
            </div>
            <div class="stat-card">
                <h3>Rekodi za Ufugaji</h3>
                <div class="number"><?= $total_ufugaji ?></div>
            </div>
            <div class="stat-card">
                <h3>Rekodi za Kilimo</h3>
                <div class="number"><?= $total_kilimo ?></div>
            </div>
        </div>
        
        <div class="section">
            <div class="tabs">
                <button class="tab active" onclick="switchTab(event, 'bidhaa')">➕ Ongeza Bidhaa</button>
                <button class="tab" onclick="switchTab(event, 'ufugaji')">🐝 Ongeza Ufugaji</button>
                <button class="tab" onclick="switchTab(event, 'kilimo')">🌾 Ongeza Kilimo</button>
            </div>
            
            <!-- Bidhaa Form -->
            <form id="bidhaa" class="tab-content active" method="POST" action="?action=add_bidhaa">
                <form id="bidhaa" class="tab-content active" method="POST" action="?action=add_bidhaa" enctype="multipart/form-data">
                <h2>Ongeza Bidhaa Mpya</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="jina">Jina la Bidhaa:</label>
                        <input type="text" id="jina" name="jina" required>
                    </div>
                    <div class="form-group">
                        <label for="aina">Aina:</label>
                        <select id="aina" name="aina">
                            <option value="asili">Asili</option>
                            <option value="vifaa">Vifaa</option>
                            <option value="nektari">Nektari</option>
                                <option value="kilimo">Kilimo</option>
                                <option value="kuku">Kuku</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="bei">Bei (Tsh):</label>
                        <input type="number" id="bei" name="bei" required min="0">
                    </div>
                    <div class="form-group">
                        <label for="kiwango">Kiwango Katika Ghala:</label>
                        <input type="number" id="kiwango" name="kiwango" min="0">
                    </div>
                </div>
                <div class="form-group">
                    <label for="maelezo">Maelezo:</label>
                    <textarea id="maelezo" name="maelezo"></textarea>
                </div>
                    <div class="form-group">
                        <label for="picha">Picha ya Bidhaa (jpg, png):</label>
                        <input type="file" id="picha" name="picha" accept="image/*">
                    </div>
                <button type="submit" class="btn btn-primary">Hifadhi Bidhaa</button>
            </form>
            
            <!-- Ufugaji Form -->
            <form id="ufugaji" class="tab-content" method="POST" action="?action=add_ufugaji">
                <h2>Ongeza Rekodi ya Ufugaji</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="tarehe_uf">Tarehe:</label>
                        <input type="date" id="tarehe_uf" name="tarehe" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="form-group">
                        <label for="idadi_mbuzi">Idadi ya Mbuzi:</label>
                        <input type="number" id="idadi_mbuzi" name="idadi_mbuzi" min="0">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="asali_zal">Asali Kuzaliana:</label>
                        <input type="number" id="asali_zal" name="asali_kuzaliana" min="0">
                    </div>
                    <div class="form-group">
                        <label for="asali_uz">Asali Kuuzwa:</label>
                        <input type="number" id="asali_uz" name="asali_kuuzwa" min="0">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="asali_bei">Bei ya Asali (Tsh/Kg):</label>
                        <input type="number" id="asali_bei" name="asali_bei" min="0">
                    </div>
                    <div class="form-group">
                        <label for="chakula_bei">Bei ya Chakula (Tsh):</label>
                        <input type="number" id="chakula_bei" name="chakula_bei" min="0">
                    </div>
                </div>
                <div class="form-group">
                    <label for="maelezo_uf">Maelezo:</label>
                    <textarea id="maelezo_uf" name="maelezo"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Hifadhi Ufugaji</button>
            </form>
            
            <!-- Kilimo Form -->
            <form id="kilimo" class="tab-content" method="POST" action="?action=add_kilimo">
                <h2>Ongeza Rekodi ya Kilimo</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="tarehe_kil">Tarehe:</label>
                        <input type="date" id="tarehe_kil" name="tarehe" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="form-group">
                        <label for="zao">Zao:</label>
                        <input type="text" id="zao" name="zao" placeholder="e.g. Mahindi, Maharagwe">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="sehemu">Sehemu (acres):</label>
                        <input type="number" id="sehemu" name="sehemu" min="0" step="0.1">
                    </div>
                    <div class="form-group">
                        <label for="kiwango_inchi">Kiwango (inchi):</label>
                        <input type="number" id="kiwango_inchi" name="kiwango_inchi" min="0">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="asali_kil">Asali Kuzaliana (kg):</label>
                        <input type="number" id="asali_kil" name="asali_kuzaliana" min="0" step="0.1">
                    </div>
                    <div class="form-group">
                        <label for="bei_kil">Bei kwa Kilo (Tsh):</label>
                        <input type="number" id="bei_kil" name="bei_kwa_kilo" min="0">
                    </div>
                </div>
                <div class="form-group">
                    <label for="maelezo_kil">Maelezo:</label>
                    <textarea id="maelezo_kil" name="maelezo"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Hifadhi Kilimo</button>
            </form>
        </div>
    </div>
    
    <script>
        function switchTab(e, tabName) {
            e.preventDefault();
            
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.tab').forEach(el => el.classList.remove('active'));
            
            // Show selected tab
            document.getElementById(tabName).classList.add('active');
            e.target.classList.add('active');
        }
    </script>
</body>
</html>
