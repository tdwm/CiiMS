<?php

/**
 * This is the model class for table "weixin_content".
 *
 * The followings are the available columns in table 'weixin_content':
 * @property integer $id
 * @property integer $user_id
 * @property integer $type
 * @property string $title
 * @property string $thumb
 * @property string $desc
 * @property string $content
 * @property string $created
 * @property integer $flag
 */
class WeixinContent extends CActiveRecord
{
    private $rulesConfig = array(
			array('user_id ', 'required'),
			array('user_id,thumb, type, flag,parent', 'numerical', 'integerOnly'=>true),
			array('title ', 'length', 'max'=>64),
			array('link ', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
            array('desc,link,author','safe'),
			array('id,parent, user_id, type, title, thumb, desc, content,link, created, flag', 'safe', 'on'=>'search'),
		);
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'weixin_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
        if (!$this->isNewRecord){
           $this->rulesConfig[] =  array('title,content','required');
        }
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
        return $this->rulesConfig;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'img'=>array(self::BELONGS_TO,'WeixinMedia','thumb','select'=>'source,title'),
            'childs'=>array(self::HAS_MANY,'WeixinContent','parent'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '主键',
			'parent' => '父级',
			'user_id' => '用户',
			'type' => '类型', //1，单图;2，多图
			'title' => '标题',
			'author' => '作者',
			'thumb' => '缩略图',
			'desc' => '摘要',
			'content' => '内容',
			'link' => '原文链接',
			'created' => 'create',
			'flag' => '标识',
		);
	}

	public function beforeSave()
	{
        if ($this->isNewRecord){
			$this->created = new CDbExpression('NOW()');
        }
		
	    return parent::beforeSave();
	}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('flag',$this->flag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WeixinContent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
