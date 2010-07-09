<?php

class kmWidgetFormMooToolsDateTime extends kmWidgetFormMooToolsDate
{
  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('time', array());
    parent::configure($options, $attributes);
  } 
       
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
  	
    return parent::render($name.'[date]', $value, $attributes, $errors).$this->getTimeWidget($attributes)->render($name, $value); 
  }
  
  protected function getTimeWidget($attributes = array())
  {
    return new sfWidgetFormTime($this->getOptionsFor('time'), $this->getAttributesFor('time', $attributes));
  }  
  
  protected function getOptionsFor($type)
  {
    $options = $this->getOption($type);
    if (!is_array($options))
    {
      throw new InvalidArgumentException(sprintf('You must pass an array for the %s option.', $type));
    }

    return $options;
  }

  protected function getAttributesFor($type, $attributes)
  {
    $defaults = isset($this->attributes[$type]) ? $this->attributes[$type] : array();

    return isset($attributes[$type]) ? array_merge($defaults, $attributes[$type]) : $defaults;
  }  
}
