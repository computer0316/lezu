<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 * utf-8 中文
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $uploadtime
 * @property integer $userid
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'uploadtime', 'userid'], 'required'],
            [['id', 'userid'], 'integer'],
            [['uploadtime'], 'safe'],
            [['title'], 'string', 'max' => 256],
            [['content'], 'string', 'max' => 60000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '正文',
            'uploadtime' => '时间',
            'userid' => 'Userid',
        ];
    }
}
