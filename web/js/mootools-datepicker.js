window.addEvent('domready', function() {
	var inputs = $$('.datepicker');
	
    new DatePicker(inputs, {
    	  startDay: 0,
    	  format: '%Y-%m-%d',
    	  allowEmpty: true,
    	  pickerClass: 'datepicker_vista',
    	  toggleElements: '.datepicker_button'
    });    
});