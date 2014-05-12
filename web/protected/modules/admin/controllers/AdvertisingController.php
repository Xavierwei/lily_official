<?php

class AdvertisingController extends Controller
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
        $this->actionList();
    }

    public function actionList()
    {
        $criteria = new CDbCriteria();
        $criteria->order = 'lft ASC'; 
        $data = Advertising::model()->findAll($criteria);

        foreach($data as $key=>$item){
            $item->space='';
            for($i=1;$i<=$item->depth;$i++){
                if($item->depth==$i){
                    if($item->rgt-$item->lft==1&&$item->parent>0){
                        $item->space.='┗&nbsp;&nbsp;';
                    }else{
                        $item->space.='┣&nbsp;&nbsp;';
                    }
                }else{
                    $item->space.='┃&nbsp;&nbsp;';
                }
            }
            if($item->parent>0){
                $item->parent_node = Advertising::model()->findByPk($item->parent);
            }
            $item->last_brother = Advertising::model()->find('parent =:parent order by rgt desc',array(':parent'=>$item->parent));
        }

        $this->render('list',array('data'=>$data,'model'=>Advertising::model())); 
    }

    public function actionCreat()
    {
        $model = new Advertising();
        if(Yii::app()->request->getParam('Advertising'))
        {
            $model->attributes=Yii::app()->request->getParam('Advertising');

            $criteria = new CDbCriteria();
            $criteria->order = 'rgt DESC';
            $max = Advertising::model()->find($criteria);
            $model->lft = $max!=''?$max->rgt+1:1;
            $model->rgt = $max!=''?$max->rgt+2:2;
            $model->depth = 1;

            if($model->save()){
                Yii::app()->user->setFlash('submit','信息提交成功！');
                $this->redirect(array('list'));
            }else{
                Yii::app()->user->setFlash('submit','信息提交失败！');
            }
        }
        $this->render('edit', array('model'=>$model));
    }

    public function actionEdit()
    {
        $model=$this->loadModel();
        if(Yii::app()->request->getParam('Advertising'))
        {
            $model->attributes=Yii::app()->request->getParam('Advertising');
            if($model->save()){
                Yii::app()->user->setFlash('submit','信息提交成功！');
            }else{
                Yii::app()->user->setFlash('submit','信息提交失败！');
            }
            $this->redirect(array('list'));
        }
        $this->render('edit',array('model'=>$model));
    }

    public function actionAudit(){
        $model=$this->loadModel();
        $model->audit=1-$model->audit;
        if($model->update()){
            Yii::app()->user->setFlash('submit','审核提交成功！');
        }else{
            Yii::app()->user->setFlash('submit','审核提交失败！');
        }
        $this->redirect(array('list'));
    }

    public function actionAuditAll()
    {
        if(Yii::app()->request->getParam('id')&&is_array(Yii::app()->request->getParam('id'))){
            $id = implode("','",Yii::app()->request->getParam('id'));
            $count=Advertising::model()->updateAll(array("audit"=>1)," `id` in ('".$id."')");
            if($count){
                Yii::app()->user->setFlash('submit','审核提交成功！');
            }else{
                Yii::app()->user->setFlash('submit','审核提交失败！');
            }
        }
        $this->redirect(array('list'));
    }

    public function actionUnAuditAll()
    {
        if(Yii::app()->request->getParam('id')&&is_array(Yii::app()->request->getParam('id'))){
            $id = implode("','",Yii::app()->request->getParam('id'));
            $count=Advertising::model()->updateAll(array("audit"=>0)," `id` in ('".$id."')");
            if($count){
                Yii::app()->user->setFlash('submit','审核提交成功！');
            }else{
                Yii::app()->user->setFlash('submit','审核提交失败！');
            }
        }
        $this->redirect(array('list'));
    }

    public function actionMoveUp()
    {
        $model = $this->loadModel();
        $previous_Advertising = Advertising::model()->find('rgt=:rgt',array(':rgt'=>$model->lft-1));
        $tree_Advertising = Advertising::model()->findAll('lft >=:lft and rgt <=:rgt',array(':lft'=>$model->lft,':rgt'=>$model->rgt));
        $tree_id='';
        foreach($tree_Advertising as $key=>$item){
            $tree_id.=$item->id."','";
        }
        Advertising::model()->updateCounters(array('lft'=>$model->rgt-$model->lft+1,'rgt'=>$model->rgt-$model->lft+1),'lft>=:lft and rgt<=:rgt',array(':lft'=>$previous_Advertising->lft,':rgt'=>$previous_Advertising->rgt));
        Advertising::model()->updateCounters(array('lft'=>-($previous_Advertising->rgt-$previous_Advertising->lft+1),'rgt'=>-($previous_Advertising->rgt-$previous_Advertising->lft+1)),"id in ('".substr($tree_id,0,-3)."')");
        Yii::app()->user->setFlash('submit','排序提交成功！');
        $this->redirect(array('list'));
    }

    public function actionMoveDown()
    {   
        
        $model = $this->loadModel();
        $next_Advertising = Advertising::model()->find('lft=:lft',array(':lft'=>$model->rgt+1));
        $tree_Advertising = Advertising::model()->findAll('lft >=:lft and rgt <=:rgt',array(':lft'=>$model->lft,':rgt'=>$model->rgt));
        $tree_id='';
        foreach($tree_Advertising as $key=>$item){
            $tree_id.=$item->id."','";
        }
        Advertising::model()->updateCounters(array('lft'=>-($model->rgt-$model->lft+1),'rgt'=>-($model->rgt-$model->lft+1)),'lft>=:lft and rgt<=:rgt',array(':lft'=>$next_Advertising->lft,':rgt'=>$next_Advertising->rgt));
        Advertising::model()->updateCounters(array('lft'=>$next_Advertising->rgt-$next_Advertising->lft+1,'rgt'=>$next_Advertising->rgt-$next_Advertising->lft+1),"id in ('".substr($tree_id,0,-3)."')");
        
        Yii::app()->user->setFlash('submit','排序提交成功！');
        $this->redirect(array('list'));
    } 

    public function actionDelete()
    {
        $model=$this->loadModel();
        Advertising::model()->deleteAll('lft >=:lft and rgt <=:rgt',array(':lft'=>$model->lft,':rgt'=>$model->rgt));
        Advertising::model()->updateCounters(array('lft'=>-($model->rgt-$model->lft+1)),'lft>:lft',array(':lft'=>$model->lft));
        Advertising::model()->updateCounters(array('rgt'=>-($model->rgt-$model->lft+1)),'rgt>:rgt',array(':rgt'=>$model->rgt));
        Yii::app()->user->setFlash('submit','删除提交成功！');
        $this->redirect(array('list'));
    }

    public function loadModel()
    {
        if($this->_model===null)
        {
            if(Yii::app()->request->getParam('id'))
            {
                $this->_model=Advertising::model()->findByPk(Yii::app()->request->getParam('id'));
            }
            if($this->_model===null){
                throw new CHttpException(404,'LoadModel无法加载模型');
            }
        }
        return $this->_model;
    }
}