<?php

class SiteController extends Controller
{
	public $layout='admin';
	private $_model;

	public function filters()
	{	
		return array(
			'accessControl',
		);
		
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}


	public function actionIndex()
	{
		$this->actionEdit();
	}

	public function actionEdit()
	{
		$model=$this->loadModel();
		if(Yii::app()->request->getParam('Site')){
			$model->attributes=Yii::app()->request->getParam('Site');

			if($model->save()){
				Yii::app()->user->setFlash('submit','信息提交成功！');
				$this->refresh();
			}
		}
		$this->render('edit',array('model'=>$model));
	}

	public function actionPhotoSave()
	{
		if(Yii::app()->request->isAjaxRequest){
			if(Yii::app()->request->getParam('id')>0){
				$name = Yii::app()->request->getParam('name');
				$root = YiiBase::getPathOfAlias('webroot').'/';
				$model=$this->loadModel();
				if($model->$name!='' && file_exists($root.$model->$name)){
					unlink($root.$model->$name);
				}
				$model->$name=strstr(Yii::app()->request->getParam('photo_url'),'/upload');
				$model->update();
			}
		}
	}

	public function actionPhotoDelete()
	{
		if(Yii::app()->request->isAjaxRequest){
			$root = YiiBase::getPathOfAlias('webroot').'/';
			if(Yii::app()->request->getParam('id')>0){
				$name = Yii::app()->request->getParam('name');
				$model=$this->loadModel();
				if($model->$name!='' && file_exists($root.$model->$name)){
					unlink($root.$model->$name);
				}
				$model->$name='';
				$model->update();
			}else{
				if(file_exists($root.Yii::app()->request->getParam('photo_url'))){
					unlink($root.Yii::app()->request->getParam('photo_url'));
				}
			}
		}
	}

	public function loadModel()
	{
		if($this->_model===null)
		{
			$this->_model=Site::model()->findByPk(1);
		}
		if($this->_model===null){
			throw new CHttpException(404,'LoadModel无法加载模型');
		}
		return $this->_model;
	}
}