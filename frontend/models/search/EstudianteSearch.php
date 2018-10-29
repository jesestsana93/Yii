<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Estudiante;

/**
 * EstudianteSearch represents the model behind the search form about `frontend\models\Estudiante`.
 */
class EstudianteSearch extends Estudiante
{
    //variable agregada para realizar busquedas generales 
    public $searchstring;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombre', 'apellido', 'email', 'telefono'], 'safe'],
            [['searchstring'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Estudiante::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        // $query->andFilterWhere(['like', 'nombre', $this->nombre])
        //     ->andFilterWhere(['like', 'apellido', $this->apellido])
        //     ->andFilterWhere(['like', 'email', $this->email])
        //     ->andFilterWhere(['like', 'telefono', $this->telefono]);

        $query->orFilterWhere(['like', 'nombre', $this->searchstring])
              ->orFilterWhere(['like', 'apellido', $this->searchstring])
              ->orFilterWhere(['like', 'email', $this->searchstring])
              ->orFilterWhere(['like', 'telefono', $this->searchstring]);


        return $dataProvider;
    }

    /*
     Otro metodo search!!!
     */
    public function searchgeneral($params)
    {
        $query = Estudiante::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

         $query->andFilterWhere(['like', 'nombre', $this->nombre])
             ->andFilterWhere(['like', 'apellido', $this->apellido])
             ->andFilterWhere(['like', 'email', $this->email])
             ->andFilterWhere(['like', 'telefono', $this->telefono]);

        return $dataProvider;
    }

}
