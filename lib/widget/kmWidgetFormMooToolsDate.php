<?php

class kmWidgetFormMooToolsDate extends sfWidgetFormInput
{
  protected function configure($options = array(), $attributes = array())
  {
    $this->setAttribute('class', 'datepicker');

    parent::configure($options, $attributes);
  } 
  	
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
  	if (is_array($value))
  	{
      $value = $value['date'];
  	}
    
    return parent::render($name, $value, array_merge(array('size' => 6), $attributes), $errors).'<button type="button" class="'.$this->attributes['class'].'_button">...</button>'; 
  }
  
  public function getStylesheets()
  {
    return array(
      '/kmFormExtraPlugin/mootools-datepicker/Source/datepicker_vista/datepicker_vista.css' => 'all'
    );
  }

  public function getJavascripts()
  {
    return array(
     '/kmFormExtraPlugin/mootools-datepicker/Source/datepicker.js',
     '/kmFormExtraPlugin/js/mootools-datepicker.js'
    );
  }    
}
