<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use \common\helpers\ModelMapHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = 'Create Department';
$this->params['breadcrumbs'][] = ['label' => 'Department', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<div class="country-form">

		<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

		
		<?= $form->field($model, 'university_id')->widget(Select2::classname(), [
			'data'          => ModelMapHelper::getIdTitleMap(\common\models\University::class),
			'language'      => 'en',
			'options'       => ['placeholder' => 'Select a state ...'],
			'pluginOptions' => [
			'allowClear' => true
			],
			])->label('University');
		?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>
</div>
