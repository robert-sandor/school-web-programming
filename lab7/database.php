<?php
    /**
     *
     */
    class Database
    {
        private static $dbname = 'secondcars';
        private static $dbhost = 'localhost';
        private static $dbuser = 'root';

        private static $cont = null;

        public function __construct()
        {
            die('Init is not allowed!');
        }

        public static function connect()
        {
            if (null == self::$cont) {
                try {
                    self::$cont = new PDO('mysql:host='.self::$dbhost.';dbname='.self::$dbname, self::$dbuser);
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            }

            return self::$cont;
        }

        public static function disconnect()
        {
            self::$cont = null;
        }
    }
