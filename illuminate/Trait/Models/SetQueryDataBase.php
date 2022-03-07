<?php

namespace Illuminate\Trait\Models;

trait SetQueryDataBase
{

    static function create($arr)
    {
        try {

            $_THIS = new static();
            $sql = " insert into " . $_THIS->table;
            $keySql = " ( ";
            $valSql = " ( ";
            array_walk($arr, function ($val, $key) use (&$keySql, &$valSql) {
                $keySql .= " $key ,";
                $valSql .= " '$val' ,";
            });
            $keySql = rtrim($keySql, ",");
            $valSql = rtrim($valSql, ",");
            $keySql .= " ) ";
            $valSql .= " ) ";
            $sql .= $keySql . " values " . $valSql;
            $model = $_THIS->connect->prepare($sql);
            $model->execute();
            return $_THIS->connect->lastInsertId();
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    static function update($arr, $id)
    {
        try {

            $_THIS = new static();
            $sql = "update " . $_THIS->table . " set ";

            array_walk($arr, function ($val, $key) use (&$sql) {
                $sql .= " $key = '$val' ,";
            });

            $sql = rtrim($sql, ",");
            $sql .= " where id = " . $id;
            $model = $_THIS->connect->prepare($sql);
            $model->execute();
            return $_THIS->connect->lastInsertId();
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    static function destroy($id)
    {
        try {
            $_THIS = new static();
            $model = $_THIS->connect->prepare(" delete from " . $_THIS->table . " where id = '$id'");
            return $model->execute();
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    static function rawQuery($sql)
    {
        try {
            $_THIS = new static();
            $model = $_THIS->connect->prepare($sql);
            $model->execute();
            return $model->fetchAll();
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    static function query()
    {
        try {
            $_THIS = new static();
            $_THIS->q = " select * from $_THIS->table ";
            return $_THIS;
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}