<?php
/**
 * TbDatePicker widget class
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * @copyright Copyright &copy; Clevertech 2012-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package YiiBooster bootstrap.widgets
 */
class TbDateTimePicker extends CInputWidget
{
	/**
	 * @var TbActiveForm when created via TbActiveForm, this attribute is set to the form that renders the widget
	 * @see TbActionForm->inputRow
	 */
	public $form;
	/**
	 * @var array the options for the Bootstrap JavaScript plugin.
	 */
	public $options = array();
	/**
	 * @var string[] the JavaScript event handlers.
	 */
	public $events = array();

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		$this->htmlOptions['type'] = 'text';
		$this->htmlOptions['autocomplete'] = 'off';

		if (!isset($this->options['language']))
			$this->options['language'] = Yii::app()->language;

		if (!isset($this->options['format']))
			$this->options['format'] = 'yyyy-mm-dd';

		if (!isset($this->options['maskInput']))
			$this->options['maskInput'] = true;
		if (!isset($this->options['pickDate']))
			$this->options['pickDate'] = true;
		if (!isset($this->options['pickTime']))
			$this->options['pickTime'] = true;
		if (!isset($this->options['pick12HourFormat']))
			$this->options['pick12HourFormat'] = true;
		if (!isset($this->options['pickSeconds']))
			$this->options['pickSeconds'] = false;
		if (!isset($this->options['startDate']))
			$this->options['startDate'] = '-Infinity';
		if (!isset($this->options['endData']))
			$this->options['endData'] = 'Infinity';
	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		list($name, $id) = $this->resolveNameID();

		if ($this->hasModel())
		{
			if($this->form)
				echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
			else
				echo CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);

		} else
			echo CHtml::textField($name, $this->value, $this->htmlOptions);

		$this->registerClientScript($id);
	}

	/**
	 * Registers required client script for bootstrap datepicker. It is not used through bootstrap->registerPlugin
	 * in order to attach events if any
	 */
	public function registerClientScript($id)
	{
		Yii::app()->bootstrap->registerAssetCss('bootstrap-datetimepicker.css');
		Yii::app()->bootstrap->registerAssetJs('bootstrap.datetimepicker.js');
		if(isset($this->options['language']))
		{
			//Yii::app()->bootstrap->registerAssetJs('locales/bootstrap-datetimepicker.'.$this->options['language'].'.js', CClientScript::POS_END);
		}
		$options = !empty($this->options) ? CJavaScript::encode($this->options) : '';

		ob_start();
		echo "jQuery('#{$id}_dt').datetimepicker({$options})";
		foreach ($this->events as $event => $handler)
			echo ".on('{$event}', " . CJavaScript::encode($handler) . ")";

		Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $this->getId(), ob_get_clean() . ';');

	}
}
