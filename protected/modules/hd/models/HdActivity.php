<?php

/**
 * This is the model class for table "hd_activity".
 *
 * The followings are the available columns in table 'hd_activity':
 * @property integer $act_id
 * @property integer $user_id
 * @property string $title
 * @property string $thumb
 * @property string $starttime
 * @property string $endtime
 * @property string $venue
 * @property integer $limitnum
 * @property integer $passed
 * @property string $content
 * @property integer $prechange
 * @property string $alipay
 * @property integer $pushed
 * @property string $created
 * @property string $updated
 */
class HdActivity extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hd_activity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, title, thumb, starttime,deadline, endtime, venue, limitnum', 'required'),
			array('user_id, limitnum, passed, prechange, pushed,province,city,area', 'numerical', 'integerOnly'=>true),
			array('title, venue', 'length', 'max'=>150),
			array('thumb', 'length', 'max'=>200),
			array('mappoi', 'length', 'max'=>50),
			array('alipay', 'length', 'max'=>100),
            array('desc_info,desc_trip,desc_need,desc_note,desc_declare','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('act_id, user_id, title, thumb, starttime, endtime, venue, limitnum, passed, content, prechange, alipay, pushed, created, updated', 'safe', 'on'=>'search'),
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
			'act_id' => '主键',
			'user_id' => '组织者',
			'title' => '活动名称',
			'thumb' => '缩略图',
			'starttime' => '开始时间',
			'deadline' => '报名截止',
			'endtime' => '结束时间',
			'province' => '省/直辖市',
			'city' => '市',
			'area' => '县/区',
			'mappoi' => '地图坐标',
			'venue' => '集合地点',
			'limitnum' => '人数限制',
			'passed' => '已通过',
			'desc_info' => '活动介绍',
            'desc_trip'  =>   '行程安排' ,
            'desc_need'  =>   '装备需求' ,
            'desc_note'  =>   '注意事项' ,
            'desc_declare'  =>   '免责声明' ,
			'prechange' => '预付费用',
			'alipay' => '支付宝',
			'pushed' => '发表',
			'created' => '创建时间',
			'updated' => '修改时间',
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

		$criteria->compare('act_id',$this->act_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('starttime',$this->starttime,true);
		$criteria->compare('endtime',$this->endtime,true);
		$criteria->compare('venue',$this->venue,true);
		$criteria->compare('limitnum',$this->limitnum);
		$criteria->compare('passed',$this->passed);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('prechange',$this->prechange);
		$criteria->compare('alipay',$this->alipay,true);
		$criteria->compare('pushed',$this->pushed);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HdActivity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
