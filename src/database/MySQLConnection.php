<?php
namespace App\database;

use Dotenv\Dotenv;
use PDO;

class MySQLConnection
{
    private static ?MySQLConnection $instance = null;
    private $connection;
    private $host;
    private $dbname = 'bestloc';
    private $username;
    private $password;

    private function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $this->host = $_ENV['MYSQL_SRV'];
        $this->username = $_ENV['MYSQL_USER'];
        $this->password = $_ENV['MYSQL_PASS'];

        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public static function getInstance(): mixed
    {
        if (self::$instance === null) {
            self::$instance = new MySQLConnection();
        }
        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}

$db = MySQLConnection::getInstance()->getConnection();
