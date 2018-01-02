<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
use yii\base\Exception;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $mobile
 * @property string $password
 * @property integer $firsttime
 * @property integer $updatetime
 * @property string $ip
 */
class User extends \yii\db\ActiveRecord
{
	public $password1 = '';
	public $password2 = '';

	// 取得用户 ID
	public static function getId(){
		$userid = Yii::$app->session->get('userid');
		if(isset($userid)){
			return $userid;
		}
		else{
			return false;
		}
	}

	// 用户登录
	public function login(){
		$user = User::findOne(['mobile' => $this->mobile, 'password' => md5($this->password)]);
		if($user){
			Yii::$app->session->set('userid', $user->id);
			return  true;
		}
		else{
			return false;
		}
	}

	// 检查用户是否登录，如果登录返回用户对象，如果没登录返回false
	public function checkLogin(){
		$userid = Yii::$app->session->get('userid');
		if(isset($userid)){
			$user = $this->findOne($userid);
			if($user){
				return $user;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	public function changePassword($userLoad){
		if($this->password != md5($userLoad->password)){
			throw new Exception('原始密码不对');
		}
		if($userLoad->password1 == $userLoad->password2){
			$this->password = md5($userLoad->password1);
			if($this->save()){
				return true;
			}
			else{
				throw new Exception('新密码保存失败');
			}
		}
		else{
			throw new Exception('两次输入不一致');
		}
	}

	public static function logout(){
		Yii::$app->session->remove('userid');
	}

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'user';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			//[['name', 'mobile', 'password', 'firsttime', 'updatetime', 'ip'], 'required'],
			[['name', 'mobile', 'password', 'firsttime', 'updatetime', 'ip'], 'required'],
			[['password', 'password1', 'password2'], 'required', 'on' => 'changepassword'],
			[['firsttime', 'updatetime'], 'integer'],
			[['name', 'mobile'], 'string', 'max' => 16],
			[['password'], 'string', 'max' => 64],
			[['ip'], 'string', 'max' => 32]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => '姓名',
			'mobile' => '手机号',
			'password' => '密码',
			'firsttime' => 'Firsttime',
			'updatetime' => 'Updatetime',
			'ip' => 'Ip',
			'password1'	=> '新密码',
			'password2'	=> '确认新密码',
		];
	}
}
