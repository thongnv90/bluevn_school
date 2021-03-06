<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_school".
 *
 * @property integer $user_school_id
 * @property integer $user_id
 * @property integer $school_id
 * @property integer $user_school_role
 */
class UserSchool extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_school';
    }
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'school_id', 'user_school_role'], 'required'],
            [['user_id', 'school_id', 'user_school_role'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_school_id' => 'User School ID',
            'user_id' => 'User ID',
            'school_id' => 'School ID',
            'user_school_role' => 'User School Role',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function getAllUserIdShool($id){
        $arr = array(0);
        $data= UserSchool::find()
                ->where(['school_id'=>$id])
                ->all();
        foreach ($data as $value) {
            $arr[] = $value->user_id;
        }
        return $arr;
    }
}
