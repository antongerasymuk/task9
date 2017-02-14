<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use \common\helpers\ModelMapHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = 'Update Country: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="country-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="country-form">

		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'department_id')->widget(Select2::classname(), [
			'data'          => ModelMapHelper::getIdTitleMap(\common\models\Department::class),
			'language'      => 'en',
			'options'       => ['placeholder' => 'Select a state ...'],
			'pluginOptions' => [
			'allowClear' => true
			],
			])->label('Departament');
		?>
		<?= $form->field($model, 'teacherIds')->widget(Select2::classname(), [
			'data'          => ModelMapHelper::getIdTitleMap(\common\models\Teacher::class),
			'language'      => 'en',
			'options'       => ['multiple' => true, 'placeholder' => 'Select a state ...'],
			'pluginOptions' => [
			'allowClear' => true
			],
			])->label('Teachers');
		?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>

</div>
