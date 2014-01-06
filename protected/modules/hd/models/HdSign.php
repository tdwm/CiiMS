<?php

/**
 * This is the model class for table "hd_sign".
 *
 * The followings are the available columns in table 'hd_sign':
 * @property integer $id
 * @property integer $act_id
 * @property integer $user_id
 * @property string $info
 * @property integer $tel
 * @property string $remark
 * @property integer $iflead
 * @property integer $pass
 * @property string $created
 */
class HdSign extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hd_sign';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('act_id, user_id, info, tel, remark, iflead, pass, created', 'required'),
			array('act_id, user_id, tel, iflead, pass', 'numerical', 'integerOnly'=>true),
			array('info, remark', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, act_id, user_id, info, tel, remark, iflead, pass, created', 'safe', 'on'=>'search'),
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
            'user'=>array(self::MANY_MANY,'user','user_id','select'=>'username'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '主键',
			'act_id' => '活动',
			'user_id' => '参与者',
			'info' => '说明信息',
			'tel' => '电话',
			'remark' => '备注',
			'iflead' => '是否领队',
			'pass' => '是否通过',
			'created' => '报名时间',
		);
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
		$criteria->compare('act_id',$this->act_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('tel',$this->tel);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('iflead',$this->iflead);
		$criteria->compare('pass',$this->pass);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HdSign the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
