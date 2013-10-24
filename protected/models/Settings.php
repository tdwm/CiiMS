<?php

/**
 * WebSettings class.
 * WebSettings is the data structure for keeping
 */
class Settings extends CFormModel
{

    public $publicNames;

    public $type = 'webset';

    private $attributeLabelsArray = array();

    public function __construct($type = 'webset')
    {
        $this->type = $type;
        $this->setValue();
    }
    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        $rules['webset'] = array(
            array('name,dateFormat,timeFormat,timezone ', 'required'),
            array('defaultLanguage', 'length', 'max'=>50),
            array('sphinxHost,sphinxSource', 'length', 'max'=>50),
            array('sphinxPort,searchPaginationSize,bcrypt_cost,offline,sphinxPort,autoApproveComments,notifyAuthorOnComment,contentPaginationSize,categoryPaginationSize,sphinx_enabled', 'numerical', 'integerOnly'=>true),
        );
        $rules['social'] = array(
            array('socialQQ,socialSINA', 'required'),
            array('socialQQ,socialSINA', 'numerical', 'integerOnly'=>true),
            array('socialSINAredirecturi,socialSINAclientid,socialQQreturnurl,socialQQappkey,socialQQappid', 'length', 'max'=>150),
        );
        return $rules[$this->type];
    }

    protected function getKeyNames()
    {
        $settings['webset'] = array(
            'disqus_shortname',
            'useDisqusComments',
            'contentPaginationSize',
            'categoryPaginationSize',
            'searchPaginationSize',
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
        $settings['social'] = array(
            'socialSINAredirecturi',
            'socialSINAclientid',
            'socialSINA',
            'socialQQreturnurl',
            'socialQQappkey',
            'socialQQappid',
            'socialQQ',
        );


        $setting = $settings[$this->type];
        return $setting;
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
        $this->publicNames = $values;
        $this->setAttributes($values);
        $this->attributeLabelsArray = $labels;
    }

    public function __get($name) 
    {
        if(property_exists($this,$name))
            return $this->$name;
        elseif (array_key_exists($name,$this->publicNames))
            return $this->publicNames[$name];
        else return parent::__get($name);
    }

    public function attributes()
    {
        return $this->publicNames;
    }
        
    public function __set($name,$value) 
    { 
        if(property_exists($this,$name))
            $this->$name=$value;
        elseif (array_key_exists($name,$this->publicNames))
            return $this->publicNames[$name] = $value;
        else parent::__set($name,$value);
    }

    public function save()
    {
        $datas = $this->publicNames; 
        foreach($datas as $key => $value){
            if($value == null) continue;
            $flag = Configuration::model()->updateByPk($key,array('value'=>$value));
        }
        return true;
    }

}
