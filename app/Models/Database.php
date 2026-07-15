<?php


namespace App\Models;

use PDO;


class Database
{
    private static ?PDO $instance = null;

    private function __construct() {}
    private function __clone() {}

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $host = getenv('MYSQLHOST') ?: 'db';
            $db   = getenv('MYSQLDATABASE') ?: 'techart_news';
            $user = getenv('MYSQLUSER') ?: 'root';
            $pass = getenv('MYSQLPASSWORD') ?: 'root';
            $port = getenv('MYSQLPORT') ?: '3306';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";



            self::$instance = new PDO($dsn, $user, $pass);
        }

        return self::$instance;
    }
}
