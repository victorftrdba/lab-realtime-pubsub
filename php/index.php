<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $redis = new Redis();
    $redis->connect('redis', 6379);

    $payload = [
        "sen_code" => $_POST['c'] ?? 'unknown',
        "value" => $_POST['val'] ?? '0',
        "timestamp" => date('Y-m-d H:i:s')
    ];

    // This is the "Magic" - Publish to Redis
    $redis->publish('sensor_updates', json_encode($payload));

    echo json_encode(["status" => "Published to Redis"]);
}