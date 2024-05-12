<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once dirname(__FILE__) . '/payment.php';

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = "SB-Mid-server-SgbVDrr7PP9faXSRj96GSiec";
\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

$orderId = rand();
$calculated_total = 0;
$localData = json_decode($_POST['localData'], true);

// Validasi dan struktur ulang data item_details
$item_details = [];
foreach ($localData as $item) {
    $item_details[] = [
        'id' => 'item' . rand(),  // ID unik untuk setiap item, sesuaikan bila diperlukan
        'name' => $item['kamar'], // 'kamar' sebagai nama item
        'quantity' => 1, // Jumlah total item dalam localData
        'price' => $item['total'] // 'total' sebagai harga item
    ];
}

foreach ($item_details as $item) {
    $calculated_total += $item['price'];
}


$params = [
    'transaction_details' => [
        'order_id' => $orderId,
        'gross_amount' =>  $calculated_total // Gunakan total yang dihitung ulang
    ],
    'item_details' => $item_details,
    'customer_details' => [
        'first_name' => $_POST['nama'] ?? 'Guest',
        'nik' => $_POST['nik'] ?? '',
        'email' => $_POST['email'] ?? '',
        'phone' => $_POST['kontak'] ?? '',
        'address' => $_POST['alamat'] ?? ''
    ],
];



$snapToken = \Midtrans\Snap::getSnapToken($params);
echo json_encode($snapToken);
