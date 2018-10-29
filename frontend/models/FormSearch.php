<?php

namespace frontend\models;

use Yii;
use yii\base\model;

class FormSearch extends model{
    
    public $q;
    
    public function rules()
    {
        return [
            ["q", "match", "pattern" => "/^[0-9@a-záéíóúñ\s.]+$/i", "message" => "Sólo se aceptan letras y números"]
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'q' => "Buscar:",
        ];
    }
}