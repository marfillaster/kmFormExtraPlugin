kmFormExtraPlugin
=================

The `kmFormExtraPlugin` packages useful validators, and widgets.

Installation
------------

  * PEAR

        $ symfony plugin:install kmFormExtraPlugin
        $ symfony cache:clear

  * git
  
        $ git clone git://github.com/marfillaster/kmFormExtraPlugin.git plugins/kmFormExtraPlugin
        $ symfony cache:clear
        
Mootools Datepicker
-------------------

This plugin provides `kmWidgetFormMooToolsDate` and `kmWidgetFormMooToolsDateTime`. It uses [Mootools Datepicker](http://github.com/arian/mootools-datepicker) for client-side datepicker widget.

`kmWidgetFormMooToolsDateTime` requires `kmValidatorDateTimeCompact` as validator.    


  * installation         
        
        $ git clone git://github.com/arian/mootools-datepicker.git plugins/kmFormExtraPlugin/web/mootools-datepicker        
        $ php symfony plugin:publish-assets
        

  * globally replace default date and datetime widgets  

		class BaseForm extends sfFormSymfony
		{
		  public function setup()
		  {
	
			foreach($this as $name => $field)
			{
			  $widget = $field->getWidget(); 
			  if($widget instanceof sfWidgetFormDate)
			  {
				$this->widgetSchema[$name] = new kmWidgetFormMooToolsDate();
			  }
			  if($widget instanceof sfWidgetFormDateTime)
			  {
				$this->widgetSchema[$name] = new kmWidgetFormMooToolsDateTime();
				$this->validatorSchema[$name] = new kmValidatorDateTimeCompact(array('required' => false));
			  }
			  if($widget instanceof sfWidgetFormFilterDate)
			  {
				$widget->setOption('from_date', new kmWidgetFormMooToolsDate());
				$widget->setOption('to_date', new kmWidgetFormMooToolsDate());
				$widget->setOption('template', '%from_date%%to_date%');
				$widget->setOption('with_empty', false);
			  }
			}
			
			parent::setup();
		  }
		}
     