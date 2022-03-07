<?php

namespace Illuminate\Trait\Models;

trait GetQueryDataBase
{

    static function all($column = 'id', $sort = 'desc')
    {
        try {
            $_THIS = new static();
            $model = $_THIS->connect->prepare("select * from " . $_THIS->table . " order by $column $sort");
            $model->execute();
            return $model->fetchAll();
        } catch (\Throwable $th) {
            echo $th;
            die;
        }
    }

    public function get()
    {
        try {

            if ($this->data) return $this->data;
            $model = $this->connect->prepare($this->q);
            $model->execute();
            return  $model->fetchAll();
        } catch (\Throwable $th) {
            echo $th;
            die;
        }
    }

    public function first()
    {
        try {
            if ($this->data) return $this->data[0];
            $model = $this->connect->prepare($this->q);
            $model->execute();
            return  $model->fetch();
        } catch (\Throwable $th) {
            echo $th;
            die;
        }
    }

    public function orderBy($arr)
    {
        try {
            $this->q .= " order by $arr[0] $arr[1]";
            return $this;
        } catch (\Throwable $th) {
            echo $th;
            die;
        }
    }

    public function paginate($limit = 0, $page = 0)
    {
        try {
            $this->q .= " limit $page , $limit";
            return $this;
        } catch (\Throwable $th) {
            echo $th;
            die;
        }
    }

    static function find($id)
    {

        try {
            $_THIS = new static();
            //code...
            $model = $_THIS->connect->prepare(" select * from " . $_THIS->table . " where id = '$id'");
            $model->execute();
            return $model->fetch();
        } catch (\PDOException $e) {
            echo $e;
        }
    }

    static function where($array = [])
    {

        try {
            $_THIS = new static();

            if (count($array) == 2) {
                $_THIS->q = "select *from " . $_THIS->table . " where $array[0] = '$array[1]' ";
            } elseif (count($array) == 3) {
                $_THIS->q = "select *from " . $_THIS->table . " where $array[0] $array[1] '$array[2]' ";
            }

            return $_THIS;
        } catch (\PDOException $e) {
            echo $e;
            die;
        }
    }

    public function andWhere($array = [])
    {

        try {

            if (count($array) == 2) {
                $this->q .= " and $array[0] = '$array[1]' ";
            } elseif (count($array) == 3) {
                $this->q .= " and $array[0] $array[1] '$array[2]' ";
            }

            return $this;
        } catch (\PDOException $e) {
            echo $e;
            die;
        }
    }


    public function orWhere($array = [])
    {

        try {


            if (count($array) == 2) {
                $this->q .= " or $array[0] = '$array[1]' ";
            } elseif (count($array) == 3) {
                $this->q .= " or $array[0] $array[1] '$array[2]' ";
            }

            return $this;
        } catch (\PDOException $e) {
            echo $e;
            die;
        }
    }
};