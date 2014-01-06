<?php

/**
 * This is the model class for table "weixin_media".
 *
 * The followings are the available columns in table 'weixin_media':
 * @property integer $id
 * @property integer $user_id
 * @property integer $type
 * @property string $sign
 * @property string $title
 * @property string $desc
 * @property string $source
 * @property string $ext
 * @property string $created
 * @property string $updated
 * @property integer $delflag
 */
class WeixinMedia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'weixin_media';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, type, sign, title, source, ext', 'required'),
			array('user_id, type, delflag', 'numerical', 'integerOnly'=>true),
			array('sign', 'length', 'max'=>32),
			array('title, source', 'length', 'max'=>100),
			array('desc', 'length', 'max'=>200),
			array('ext', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, type, sign, title, desc, source, ext, created, updated, delflag', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '主键',
			'user_id' => '用户',
			'type' => '类型',
			'sign' => 'Sign',
			'title' => '标题',
			'desc' => '描述',
			'source' => '源文件',
			'ext' => '后缀',
			'created' => '创建时间',
			'updated' => '更新时间',
			'delflag' => ' 是否删除',
		);
	}

	public function beforeSave()
	{
        if ($this->isNewRecord){
			$this->created = new CDbExpression('NOW()');
			$this->updated = new CDbExpression('NOW()');
        }
	   	else
			$this->updated = new CDbExpression('NOW()');
		
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
		$criteria->compare('sign',$this->sign,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('ext',$this->ext,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('delflag',$this->delflag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WeixinMedia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
