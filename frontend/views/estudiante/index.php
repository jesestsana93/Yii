<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\EstudianteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiante-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear un nuevo estudiante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<!-- -->
<?php $f = ActiveForm::begin([
    "method" => "get",
    "action" => Url::toRoute("estudiante/index"),
    "enableClientValidation" => true,
]);
?>

<div class="form-group">
    <?= $f->field($form, "q")->input("search",['class' => 'searchGen'])->label('Buscar',['class'=>'labelSearchGen']); ?>
</div>

<?= Html::submitButton("<i class='material-icons'>search</i>", ["class" => "btnSearch btn  "]) ?>



<?php $f->end() ?>

<h3><?= $search ?></h3>
<!-- -->

   
    
<ul class="collection">
    <?php $controller = Yii::$app->controller; ?>
    <?php foreach($model as $value):?>
    <li class="collection-item avatar">
      <i class="material-icons circle">account_box</i>
      <span class="title"><?= $value['nombre'] ; ?></span>
      <p> <?= "Estudiante: ". $value['nombre'] . "  ". $value['apellido'] ?><br>
          <?= "Email: ".$value['email'] . "  Teléfono: " . $value['telefono'] ; ?>
      </p>
      <?php $paramsURL = array_merge(["{$controller->id}/view"], ['id'=>$value['id']]); ?>
      <a href="<?= Yii::$app->urlManager->createUrl($paramsURL);?>" class="secondary-content"><i class="material-icons">visibility</i></a>
    </li>
    <?php endforeach; ?>

</ul> 

<ul>
<?php foreach($model  as $val):?>
    <li><?php echo $val['nombre']. " | ". $val['apellido']. " | ". $val['email']. " | ". $val['telefono']; ?></li>
<?php endforeach; ?>
</ul>
    

</div>
