<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "issues".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $type_id
 * @property string $subject
 * @property string $descr
 * @property integer $status_id
 * @property integer $assigned_to_id
 * @property integer $author_id
 * @property string $created_on
 * @property string $updated_on
 * @property integer $parent_id
 * @property string $start_date
 * @property string $due_date
 * @property string $closed_on
 */
class Issue extends \yii\db\ActiveRecord
{




    /**
     * @inheritdoc
     */
    public function getStartedAt()
    {
        return date('d.m.Y', strtotime($this->start_date));
    }

    /**
     * @inheritdoc
     */
    public function getTypeArray()
    {
        return Type::find()->select(['name', 'id'])->indexBy('id')->column();
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'issues';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'type_id'], 'required'],
            [['project_id', 'type_id', 'status_id', 'assigned_to_id', 'author_id', 'parent_id'], 'integer'],
            [['descr'], 'string'],
            [['created_on', 'updated_on', 'start_date', 'due_date', 'closed_on'], 'safe'],
            [['subject'], 'string', 'max' => 255],
            [['type_id'], 'default', 'value' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'project_id' => 'Проект',
            'type_id' => 'Тип',
            'subject' => 'Тема',
            'descr' => 'Описание',
            'status_id' => 'Статус',
            'assigned_to_id' => 'Назначена',
            'author_id' => 'Author ID',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
            'parent_id' => 'Parent ID',
            'start_date' => 'Начата',
            'due_date' => 'Дата выполнения',
            'closed_on' => 'Closed On',
        ];
    }
}
