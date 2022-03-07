<?php

namespace Illuminate\Trait\Models;

use PDO;

trait MiddelMode
{
    //Query
    protected $q;

    //Connect
    protected $connect;

    //Data of null
    protected $data = null;

    private function checkTable()
    {
        if (!ctype_alnum($this->table)) {
            return false;
        };
    }

    public function __construct()
    {
        try {
            $this->checkTable();

            $DBNAME = env('DBNAME');
            $HOST = env('HOST');
            $USERNAME = env('USERNAME');
            $PASSWORD = env('PASSWORD');

            $this->connect = new PDO("mysql:host=$HOST;dbname=$DBNAME;charset=UTF8", $USERNAME, $PASSWORD, [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (\PDOException $e) {
            echo $e;
            die;
        }
    }
}