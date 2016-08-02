<?php 
	namespace App\Services;

	use Collective\Html\FormBuilder;
	
	class Macros extends FormBuilder {
		public function deleteButton($url, $button_label="Delete", $form_parameters = array(), $button_options=array()) {
			if(empty($form_parameters)){
				$form_parameters = array(
					'method'=>'DELETE',
					'class' =>'delete-form',
					'url'   =>$url
				);
    		} else {
				$form_parameters['url'] = $url;
				$form_parameters['method'] = 'DELETE';
			};
			
			$button_options = array_merge(array("class"=>"btn btn-danger btn-sm"), $button_options);
			
			return \Form::open($form_parameters)
				. \Form::submit($button_label, $button_options)
				. \Form::close();
		}
		public function selectState($name, $selected = null, $options = array()) {
			$list = [
				'' => 'Select One...',
				'AL' => 'Alabama',
				'AK' => 'Alaska',
				'AZ' => 'Arizona',
				'AR' => 'Arkansas',
				'CA' => 'California',
				'CO' => 'Colorado',
				'CT' => 'Connecticut',
				'DE' => 'Delaware',
				'DC' => 'District of Columbia',
				'FL' => 'Florida',
				'GA' => 'Georgia',
				'HI' => 'Hawaii',
				'ID' => 'Idaho',
				'IL' => 'Illinois',
				'IN' => 'Indiana',
				'IA' => 'Iowa',
				'KS' => 'Kansas',
				'KY' => 'Kentucky',
				'LA' => 'Louisiana',
				'ME' => 'Maine',
				'MD' => 'Maryland',
				'MA' => 'Massachusetts',
				'MI' => 'Michigan',
				'MN' => 'Minnesota',
				'MS' => 'Mississippi',
				'MO' => 'Missouri',
				'MT' => 'Montana',
				'NE' => 'Nebraska',
				'NV' => 'Nevada',
				'NH' => 'New Hampshire',
				'NJ' => 'New Jersey',
				'NM' => 'New Mexico',
				'NY' => 'New York',
				'NC' => 'North Carolina',
				'ND' => 'North Dakota',
				'OH' => 'Ohio',
				'OK' => 'Oklahoma',
				'OR' => 'Oregon',
				'PA' => 'Pennsylvania',
				'RI' => 'Rhode Island',
				'SC' => 'South Carolina',
				'SD' => 'South Dakota',
				'TN' => 'Tennessee',
				'TX' => 'Texas',
				'UT' => 'Utah',
				'VT' => 'Vermont',
				'VA' => 'Virginia',
				'WA' => 'Washington',
				'WV' => 'West Virginia',
				'WI' => 'Wisconsin',
				'WY' => 'Wyoming'
			];
		
			return $this->select($name, $list, $selected, $options);
		}
	}