<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Issue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->textInput() ?>

    <?= $form->field($model, 'type_id')->dropDownList($model->typeArray) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descr')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'status_id')->textInput() ?>

    <?//= $form->field($model, 'assigned_to_id')->textInput() ?>

    <?//= $form->field($model, 'author_id')->textInput() ?>

    <?//= $form->field($model, 'created_on')->textInput() ?>

    <?//= $form->field($model, 'updated_on')->textInput() ?>

    <?//= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'due_date')->textInput() ?>

    <?//= $form->field($model, 'closed_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
