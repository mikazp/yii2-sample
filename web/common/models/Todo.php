<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "Todos".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $created_at
 * @property integer $updated_at
 */
class Todo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Todos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 15],
            [['text'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }

    /**
     * Get created at in date format
     *
     * @return string
     */
    public function getCreated()
    {
        return Yii::$app->formatter->asDatetime($this->created_at);
    }

    /**
     * Get updated at in date format
     *
     * @return string
     */
    public function getUpdated()
    {
        return Yii::$app->formatter->asDatetime($this->updated_at);
    }
}
