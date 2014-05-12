<?php

class Friend_link extends CActiveRecord
{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{friend_link}}';
	}

	public function rules()
	{
		return array(
			array('name,link,menu_id,photo1,webmaster,email,content,audit,create_time','default'),
			array('name,link,menu_id','required','on'=>'insert,update'),
			array('menu_id','numerical','integerOnly'=>true,'min'=>1,'on'=>'insert,update'),
			array('link','url','on'=>'insert,update'),
			array('email','email','on'=>'insert,update'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '链接名称',
			'link' => '链接地址',
			'menu_id' => '所属导航',
			'photo1' => '图片1',
			'webmaster'=> '站长姓名',
			'email' => '站长邮箱',
			'content' => '备注',
			'audit' => '审核',
			'create_time' => '创建时间'
		);
	}

	public function relations()
	{
		return array(
			'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
		);
	}

	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->create_time=time();
			}
			return true;
		}else{
			return false;
		}
	}

}