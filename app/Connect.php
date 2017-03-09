<?php
namespace app;

class Connect
{
    /**
     * @var null|\PDO
     */
    private static $pdo = null;
    /**
     * @var string
     */
    public static $class = 'Connect';

    /**
     * @return \PDO
     */
    public static function get()
    {
        if (is_null(self::$pdo)) {
            try{
                self::$pdo = new \PDO('mysql:host=localhost;dbname=bdd-avancees', 'root', 'root');
            } catch(\PDOException $exception) {
                echo($exception->getMessage());
                die(500);
            }
            self::$pdo->query('SET NAMES UTF8;');
        }
        return self::$pdo;
    }
}
