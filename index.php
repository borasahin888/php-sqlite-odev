<?php
$db = new PDO('sqlite:' . __DIR__ . '/veritabani.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sorgu = $db->query("SELECT * FROM oyuncular ORDER BY ad ASC");
$oyuncular = $sorgu->fetchAll(PDO::FETCH_ASSOC);
$toplam = count($oyuncular);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Futbolcular Veritabanı</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 20px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 12px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Oyuncular (<?= $toplam ?>)</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ad</th>
                <th>Soyad</th>
                <th>Takım</th>
                <th>Lig</th>
                <th>Mevki</th>
                <th>Piyasa Değeri (€)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($oyuncular as $oyuncu): ?>
            <tr>
                <td><?= htmlspecialchars((string)$oyuncu['id']) ?></td>
                <td><?= htmlspecialchars($oyuncu['ad']) ?></td>
                <td><?= htmlspecialchars($oyuncu['soyad']) ?></td>
                <td><?= htmlspecialchars($oyuncu['takim']) ?></td>
                <td><?= htmlspecialchars($oyuncu['lig']) ?></td>
                <td><?= htmlspecialchars($oyuncu['mevki']) ?></td>
                <td><?= number_format((int)$oyuncu['piyasa_degeri'], 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
