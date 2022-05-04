<?php
    class Connection extends PDO {

        const HOSTNAME = "ec2-3-230-122-20.compute-1.amazonaws.com";
        const USERNAME = "kvlleqbwatmxym";
        const PASSWORD = "7b2c6b53e535a6c5ef8838237c285da7a7040547b2359f6f2427365805a852ed";
        const SCHEMA = "d28pe78kkckjpl";
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