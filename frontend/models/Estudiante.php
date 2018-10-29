<?php

namespace frontend\models;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "estudiantes".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $telefono
 */
class Estudiante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estudiantes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido'], 'required'],
            //[['email', 'telefono'], 'string'],
            [['nombre', 'apellido', 'email', 'telefono'], 'string', 'max' => 255],
            //[['nombre', 'apellido'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'email' => 'Email',
            'telefono' => 'Telefono',
        ];
    }
}
