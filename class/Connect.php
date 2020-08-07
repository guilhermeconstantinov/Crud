<?php

    class Connect{
        public static $PDO;

        public static function Connect(){

            if(!isset(self::$PDO)) {
                self::$PDO = new PDO("mysql:host=localhost;dbname=crud;charset=utf8", 'root', '');
            }
                return self::$PDO;
        }

    }
