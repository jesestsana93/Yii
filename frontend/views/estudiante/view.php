<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use \macgyer\yii2materializecss\widgets\Nav;

/* @var $this yii\web\View */
/* @var $model frontend\models\Estudiante */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?= 
\macgyer\yii2materializecss\widgets\form\SwitchButton::widget([
    'name' => 'defaultSwitchButton',
]); 
?>


<div class="estudiante-view">

    <h1><?= Html::encode("Estudiante ". $this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'apellido',
            'email:ntext',
            'telefono:ntext',
        ],
    ]) ?>
<?= 
\macgyer\yii2materializecss\widgets\form\SwitchButton::widget([
    'name' => 'defaultSwitchButton',
]); 
?>



</div>
