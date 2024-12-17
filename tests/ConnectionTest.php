<?php

namespace App\Tests;

use App\database\MySQLConnection;
use App\database\MongodbConnection;
use PHPUnit\Framework\TestCase;

final class ConnectionTest extends TestCase
{
    public function testMySQLConnection(): void
    {
        $connection = MySQLConnection::getInstance()->getConnection();
        $this->assertNotNull($connection);
    }
    public function testMongodbConnection(): void
    {
        $connection = MongodbConnection::getInstance()->getConnection();
        $this->assertNotNull($connection);
    }
}