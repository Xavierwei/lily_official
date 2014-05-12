<?php

class Advertisement extends CActiveRecord
{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '{{advertisement}}';
    }

    public function rules()
    {
        return array(
            array('name','unique','on'=>'insert,update'),
            array('name,link,advertising_id,photo1,code,audit,deadline,create_time','default'),
            array('name,link,advertising_id,photo1,deadline','required','on'=>'insert,update'),
            array('advertising_id','numerical','integerOnly'=>true,'min'=>1,'on'=>'insert,update'),
            array('link','url','on'=>'insert,update'),
            array('deadline','date','format'=>'yyyy-mm-dd','message'=>'下线时间格式为'.date("Y-m-d"),'on'=>'insert,update'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => '广告标题',
            'link' => '广告链接',
            'advertising_id' => '所属广告位',
            'photo1' => '图片1',
            'code'=> '广告代码',
            'audit' => '审核',
            'deadline' => '下线时间',
            'create_time' => '创建时间',
        );
    }

    public function relations()
    {
        return array(
            'advertising' => array(self::BELONGS_TO, 'Advertising', 'advertising_id'),
        );
    }

    public function afterFind(){
        parent::afterFind();
        $this->deadline=date('Y-m-d',$this->deadline);
    }

    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            $this->deadline=strtotime($this->deadline);
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