<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Estudiante */

?>
<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/js/addCels.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>

<?php 
$this->title = 'Actualizar Estudiante: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>

<div class="container-fluid">

  <h1><?= Html::encode($this->title) ?></h1>
<?php
	$form = ActiveForm::begin([
    'id' => 'estudiante-update-form',
    'options' => ['class' => 'form-horizontal'],
	]) 
?> 

<h3>Datos personales</h3>

<?= $form->field($model, 'nombre')->textInput(['maxlength' => 250]) ?>
<?= $form->field($model, 'apellido')->textInput(['maxlength' => 250]) ?>
<?= $form->field($model, 'email')->textInput(['maxlength' => 250]) ?>

<a id="agregarTelefono" class="btn btn-info" href="#">Agregar Teléfono</a>
<div id="contenedorTels">
   
</div>
<?= $form->field($model, 'telefono')->hiddenInput(['id' => 'inputTel'])->label(false); ?>


<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'id'=> 'actualizarEstudiante']) ?>
    </div>
</div>

 <?php ActiveForm::end(); ?>

</div>