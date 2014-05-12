<?php

class Advertising extends CActiveRecord
{
    public $space;
    public $parent_node;
    public $last_brother;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '{{advertising}}';
    }

    public function rules()
    {
        return array(
            array('name,lft,rgt,parent,depth,audit,size,description,create_time','default'),
            array('name,size','required','on'=>'insert,update'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => '广告位名称',
            'lft' => '左值',
            'rgt' => '右值',
            'parent' => '父广告位ID',
            'depth'=> '广告位深度',
            'audit' => '审核',
            'size' => '广告尺寸',
            'description' => '描述',
            'create_time' => '创建时间'
        );
    }

    public function getAdvertisingList($index,$value)
    {
        $criteria = new CDbCriteria();
        $criteria->order = 'lft ASC'; 
        $data = Advertising::model()->findAll($criteria);
        $list = array($index=>$value);
        foreach($data as $key=>$item){
            $item->space='';
            for($i=1;$i<=$item->depth;$i++){
                if($item->depth==$i){
                    if($item->rgt-$item->lft==1&&$item->parent>0){
                        $item->space.='┗ ';
                    }else{
                        $item->space.='┣ ';
                    }
                }else{
                    $item->space.='┃ ';
                }
            }
            $list[$item->id] = $item->space.$item['name'].'['.$item['size'].']';
        }
        return $list;
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