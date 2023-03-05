<?php
namespace Dmitry\SweetchTest;

use DateTime;
use Dotenv\Dotenv;
use PDO;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Throwable;

require __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

$pdo = new PDO("{$_ENV['db_driver']}:dbname={$_ENV['db_schema']};host={$_ENV['db_host']}",
    $_ENV["db_user"],
    $_ENV["db_password"]
);

$log = new Logger('main_log');
$log->pushHandler(new StreamHandler(__DIR__ . '/logs/app.log', Logger::WARNING));

$conf = require 'config.php';

$startTime = new DateTime();
echo "start:" . $startTime->format(DateTime::W3C) . "\n";

foreach ($conf as $table => $props) {
    $reader = new FileReader(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $props['path']);
    $builder = new QueryBuilder($table, $props['columns'], $_ENV['lines_per_query'], $reader);
    $loader = new DbCsvLoader($builder, $pdo);
    try {
        $loader->load();
    } catch (Throwable $e) {
        $log->error($e);
    }
}

$endTime = new DateTime();
echo "finish:" . $endTime->format(DateTime::W3C) . "\n";

$delta = $endTime->diff($startTime);

echo "elapsed:" . $delta->format("%H:%I:%S,%F");