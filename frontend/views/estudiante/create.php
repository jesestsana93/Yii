<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Estudiante */

$this->title = 'Create Estudiante';
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
?>

<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/js/addTelefonos.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>


<div class="container-fluid">

<div class="empresa-create">

<h3><?= Html::encode($this->title) ?></h3>
<?php
	$form = ActiveForm::begin([
    'id' => 'estudiante-create-form',
    'options' => ['class' => 'form-horizontal'],
	]) 
?> 


<h5>Datos de Cuenta</h5>
 <?= $form->field($model, 'nombre')->textInput(['maxlength' => 255]) ?>
 <?= $form->field($model, 'apellido')->textInput(['maxlength' => 255]) ?>
 <?= $form->field($model, 'email')->textInput(['maxlength' => 200]) ?>

 <div> 
Teléfono    

<a id="agregarTelefono" class="btn-floating btn-small waves-effect waves-light "><i class="material-icons">add</i></a>

</div>
<div id="contenedorTels">
    <div class="added">
        <input type="text" name="mitexto[]" id="campo_1" placeholder="Teléfono 1"/><a href="#" class="eliminar">&times;</a>
    </div>
</div>

<?= $form->field($model, 'telefono')->hiddenInput(['id' => 'inputTel'])->label(false); ?>


<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'id'=> 'crearEstudiante']) ?>
    </div>
</div>

 <?php ActiveForm::end(); ?>

</div>
</div>
