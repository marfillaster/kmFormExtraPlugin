<?php
class kmValidatorDateTimeCompact extends sfValidatorDateTime
{
  protected function convertDateArrayToString($value)
  {
  	if($value['date'] != '')
  	{
	  	$v = new sfValidatorDate(array_merge($this->getOptions(), array('with_time' => false)));	
	  	$date = new DateTime($v->clean($value['date']));
	  	$value['year'] = $date->format('Y');
	  	$value['month'] = $date->format('n');
	  	$value['day'] = $date->format('j');
  	}
  	
    unset($value['date']);
  	
  	return parent::convertDateArrayToString(array_merge(
  	array(
  	 'year' => '',
  	 'month' => '',
  	 'day' => ''
  	),
  	 $value));
  }
}