<?php
namespace App\database;

use Dotenv\Dotenv;
use MongoDB\Client;
use MongoDB\Exception\Exception;

class MongodbConnection
{
    private static ?MongodbConnection $instance = null;
    private $connection;
    private $host;
    private $dbname = 'bestloc';
    private $username;
    private $password;

    private function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $this->host = $_ENV['MONGO_SRV'];
        $this->username = $_ENV['MONGO_USER'];
        $this->password = $_ENV['MONGO_PASS'];

        try {
            $uri = "mongodb://{$this->username}:{$this->password}@{$this->host}";
            $client = new Client($uri);
            $this->connection = $client->selectDatabase($this->dbname);
        } catch (Exception $e) {
            die("Erreur de connexion à MongoDB : " . $e->getMessage());
        }
    }

    public static function getInstance(): mixed
    {
        if (self::$instance === null) {
            self::$instance = new MongodbConnection();
        }
        return self::$instance;
    }

    public function getConnection(): \MongoDB\Database
    {
        return $this->connection;
    }
}
