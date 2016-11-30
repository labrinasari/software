<?php

class Conexao {
    
    public static $instance;
    
    private function __construct() {
        //
    }
    
    public static function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = new PDO("mysql:host=127.0.0.1;"
            . "dbname=site",  "root",  "",array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        }
        return self::$instance;
    }
}
