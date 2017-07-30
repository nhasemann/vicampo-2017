<?php
include_once './shared/config.php';

class DatabaseAbstract
{
    protected $db;

    protected function __construct()
    {
        try {
            $this->db = new PDO(DB_HOST.DB_NAME, DB_USER, DB_PASSWORD);
            // force prepare emulation
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // utf8-encoding
            $stmt = $this->db->prepare("SET NAMES utf8");
            $stmt->execute();
            $stmt = $this->db->prepare("SET CHARACTER SET utf8");
            $stmt->execute();

            // strict mode for constraints and transactions
            $stmt = $this->db->prepare("SET sql_mode = STRICT_TRANS_TABLES");
            $stmt->execute();

        } catch (PDOException $e) {
            echo "Fehler: " . $e->getMessage();
            echo "Fehler:" . $test;
        }
    }

    private function prepareStatement($sql)
    {
        return $this->db->prepare($sql);
    }

    public function getLastId(){
        return $this->db->lastInsertId();
    }

    protected function doStatement($sql, $values = null)
    {
        $stmt = $this->prepareStatement($sql);
        $stmt->closeCursor();
        if (is_null($values)) {
            $stmt->execute();
        } else {
            $stmt->execute($values);
        }
        return $stmt;
    }
}