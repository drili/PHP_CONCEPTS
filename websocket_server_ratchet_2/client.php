<?php

require __DIR__ . '/vendor/autoload.php';

use Ratchet\Client\Connector;
use Ratchet\Client\WebSocket;
use React\EventLoop\Factory;

$loop = Factory::create();
$connector = new Connector($loop);

$connector('ws://localhost:8080')->then(function (WebSocket $conn) {
    $conn->on('message', function ($msg) use ($conn) {
        echo "Received: {$msg}\n";
        $conn->close();
    });

    $conn->send('Hello, world!');
}, function (\Exception $e) use ($loop) {
    echo "Could not connect: {$e->getMessage()}\n";
    $loop->stop();
});

$loop->run();