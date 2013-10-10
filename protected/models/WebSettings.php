<?php

/**
 * WebSettings class.
 * WebSettings is the data structure for keeping
 */
class WebSettings extends CFormModel
{
    public $disqus_shortname;
    public $useDisqusComments;
    public $contentPaginationSize;
    public $categoryPaginationSize;
    public $bcrypt_cost;
    public $offline;
    public $preferUEditor;
    public $name;
    public $sphinxSource;
    public $sphinxPort;
    public $sphinxHost;
    public $sphinx_enabled;
    public $defaultLanguage;
    public $timezone;
    public $timeFormat;
    public $dateFormat;
    public $autoApproveComments;
    public $notifyAuthorOnComment;

    private $attributeLabelsArray = array();

	public function __construct()
	{
        $this->setValue();
	}
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('name ', 'required'),
			array('bcrypt_cost,offline,sphinxPort,autoApproveComments,notifyAuthorOnComment,contentPaginationSize,categoryPaginationSize,sphinx_enabled', 'numerical', 'integerOnly'=>true),
		);
	}

    protected function getKeyNames()
    {
        
		return array(
            'disqus_shortname',
            'useDisqusComments',
            'contentPaginationSize',
            'categoryPaginationSize',
            'bcrypt_cost',
            'offline',
            'preferUEditor',
            'name',
            'sphinxSource',
            'sphinxPort',
            'sphinxHost',
            'sphinx_enabled',
            'defaultLanguage',
            'timezone',
            'timeFormat',
            'dateFormat',
            'autoApproveComments',
            'notifyAuthorOnComment',
		);
    }
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
        return $this->attributeLabelsArray;
	}

    protected function setValue()
    {
        $keys = $this->getKeyNames();
        $criteria = new CDbCriteria();
        $criteria->addInCondition("`key`", $keys);
        $result = Configuration::model()->findAll($criteria);
        $labels = $values = array();
        foreach($result as $obj){
            $row = $obj->attributes;
            $labels[$row['key']]=$row['hint'];
            $values[$row['key']]=$row['value'];
        }
        $this->setAttributes($values);
        $this->attributeLabelsArray = $labels;
    }

}
