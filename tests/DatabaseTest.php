<?php
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    private $conn = null;

    final public function getConnection()
    {
        $dsn = 'mysql:dbname=vicampo;host=127.0.0.1:80';
        $user = 'root';
        $password = '';

        $this->conn = new PDO($dsn, $user, $password);

        return $this->conn;
    }

    protected function getDataSet()
    {
        return $this->createMySQLXMLDataSet('./xml/customers.xml');
    }

    public function testDatabaseConnection()
    {
        $queryTable = $this->getConnection()->createQueryTable(
            'customers', 'SELECT * FROM customers'
        );
        $expectedTable = $this->getDataSet()->getTable('customers');
        $this->assertTablesEqual($expectedTable, $queryTable);
    }
}

?>