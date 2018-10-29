<?=  GridView::widget([
         'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
             'nombre',
             'apellido',
             'email:ntext',
             'telefono:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
     ]); ?>


<ul class="collection">
    <?php $controller = Yii::$app->controller; ?>
    <?php foreach($dataProvider->getModels() as $value):?>
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
<?php foreach($dataProvider->getModels() as $value):?>
    <li><?php echo $value['nombre']. " | ". $value['apellido']. " | ". $value['email']. " | ". $value['telefono']; ?></li>
<?php endforeach; ?>
</ul>
 