<?php
    class Connection extends PDO {

        const HOSTNAME = "ec2-52-86-115-245.compute-1.amazonaws.com";
        const USERNAME = "xlqzketxveplje";
        const PASSWORD = "7085d5105b246fa62ac864df80d3eea005136cd4076a6664738495c55624cef1";
        const SCHEMA = "darmfv85c1nab0";
        const PORT = 5432;

        private $conn;

        # magic method
        public function __construct() {
            $key = "strval";
            $dsn = "pgsql:host={$key(self::HOSTNAME)};dbname={$key(self::SCHEMA)};port={$key(self::PORT)}";
            $this->conn = new PDO($dsn, self::USERNAME, self::PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }

        public function getConnection() {
            $this->conn->query("SET timezone TO 'America/Sao_Paulo'");
            return $this->conn;
        }
    } 