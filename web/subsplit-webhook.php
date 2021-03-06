<?php

require __DIR__.'/../vendor/autoload.php';

$configFilename = file_exists(__DIR__.'/../config.json')
    ? __DIR__.'/../config.json'
    : __DIR__.'/../config.json.dist';

$config = json_decode(file_get_contents($configFilename), true);

$redis = new Predis\Client();

$redis->lpush('dflydev-git-subsplit:incoming', file_get_contents('php://input'));

echo "Thanks.\n";
