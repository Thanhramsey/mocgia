<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=mocgia;charset=utf8mb4', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $newSettings = [
        'company_name'             => 'Nội thất Ngân Gia Nguyễn',
        'company_name_en'          => 'Ngan Gia Nguyen Interior',
        'address'                  => '126 Lý Thái Tổ, phường Diên Hồng, Gia Lai',
        'office_address'           => '126 Lý Thái Tổ, phường Diên Hồng, Gia Lai',
        'factory_address'          => '772 Nguyễn Chí Thanh, phường An Phú, Gia Lai',
        'about_address'            => '126 Lý Thái Tổ, phường Diên Hồng, Gia Lai',
        'home_intro_card_address'  => 'VP: 126 Lý Thái Tổ, P. Diên Hồng | Xưởng: 772 Nguyễn Chí Thanh, P. An Phú, Gia Lai',
        'phone'                    => '0916113169',
        'zalo'                     => '0916113169',
        'zalo_phone'               => '0916113169',
        'facebook'                 => 'https://www.facebook.com/noithatngangianguyen',
    ];

    $now = date('Y-m-d H:i:s');

    foreach ($newSettings as $key => $val) {
        $stmt = $pdo->prepare("SELECT id FROM settings WHERE `key` = ?");
        $stmt->execute([$key]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $update = $pdo->prepare("UPDATE settings SET `value` = ?, `updated_at` = ? WHERE `key` = ?");
            $update->execute([$val, $now, $key]);
            echo "Updated {$key} => {$val}\n";
        } else {
            $insert = $pdo->prepare("INSERT INTO settings (`key`, `value`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?)");
            $insert->execute([$key, $val, $now, $now]);
            echo "Inserted {$key} => {$val}\n";
        }
    }

    echo "Database settings updated successfully!\n";
} catch (\Exception $e) {
    echo "DB Error: " . $e->getMessage() . "\n";
}
