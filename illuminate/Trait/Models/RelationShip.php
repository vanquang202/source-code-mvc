<?php

namespace Illuminate\Trait\Models;

trait RelationShip
{

    public  function with($array = [])
    {
        try {

            $model =  $this->connect->prepare($this->q);
            $model->execute();
            $model = $model->fetchAll();
            $arr = [];
            $arrCheck = [];
            foreach ($model as $key =>  $m) {
                array_push($arr, $m);

                foreach ($array  as $a) {
                    $sql = $this->connect->prepare(" select * from $a ");
                    $sql->execute();
                    $mod = $sql->fetchAll();

                    if ($this->$a()[0] == 'hasOne') {

                        foreach ($mod as $mo) {
                            if ($mo[$this->$a()[1]] === $m[$this->$a()[2] ?? 'id']) {
                                if (!isset($arr[$key][$a])) $arr[$key][$a] = [];
                                $arr[$key][$a] = $mo;
                            }
                        }
                    }

                    if ($this->$a()[0] == 'hasMany') {

                        foreach ($mod as $mo) {
                            if ($mo[$this->$a()[1]] === $m[$this->$a()[2] ?? 'id']) {
                                if (!isset($arr[$key][$a])) $arr[$key][$a] = [];
                                array_push($arr[$key][$a], $mo);
                            }
                        }
                    }

                    if ($this->$a()[0] == 'belongsTo') {

                        foreach ($mod as $mo) {
                            if ($mo[$this->$a()[2] ?? 'id']  === $m[$this->$a()[1]]) {
                                if (!isset($arr[$key][$a])) $arr[$key][$a] = [];
                                $arr[$key][$a] = $mo;
                            }
                        }
                    }
                }
            }
            $this->data = $arr;
            return $this;
        } catch (\Throwable $th) {
            echo $th;
            die;
        }
    }
}