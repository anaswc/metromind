<?php

class Country_model extends CI_Model {

	public function __construct()

	{

		$this->sortColumn 						= 'country';

		$this->sortDirection 					= 'ASC';

		$this->countryCode						= "";	

		$this->country							= "";	

		$this->countryId						= "";	

		$this->capital							= "";	

		$this->smallFlag						= "";	

		$this->currencyCode						= "";

		$this->countryIds						= "";	

		

	}

	public function setPostGetVars(){	

		$this->countryCode						= trim($this->input->post_get('countryCode'));

		$this->country							= trim($this->input->post_get('country'));	

		$this->countryId						= trim($this->input->post_get('countryId'));

		$this->capital							= trim($this->input->post_get('capital'));

		$this->smallFlag						= trim($this->input->post_get('smallFlag'));

		$this->currencyCode						= trim($this->input->post_get('currencyCode'));

		$this->countryIds						= trim($this->input->post_get('countryIds'));			

	}

		

	public function get_country($limit = NULL, $start = NULL)

	{	

		$this->db->limit($limit, $start);

		$this->db->select('countryId,country,phonePrefix,bigFlag as countryFlag');

		$this->db->from('axcountries');
		
		if(trim($this->countryId) != "")

			$this->db->where('countryId', $this->countryId);

		if(trim($this->countryCode) != "")

			$this->db->like('countryCode', $this->countryCode,'none');	

		if(trim($this->smallFlag) != "")

			$this->db->like('smallFlag', $this->smallFlag,'none');	

		if(trim($this->currencyCode) != "")

			$this->db->like('currencyCode', $this->currencyCode,'none');		

		if(trim($this->capital) != "")

			$this->db->like('capital', $this->capital,'none');

		if(trim($this->country) != "")

			$this->db->like('country', $this->country,'none');

		if($this->sortColumn == '')

			$this->sortColumn = "country";

		if($this->sortDirection == '')

			$this->sortDirection = "ASC";	

		if(trim($this->countryIds) != ""){

			$countryIds = explode(",",$countryIds);

			$this->db->where_in('countryCode', $countryIds);	

		}	

		$this->db->order_by("$this->sortColumn", "$this->sortDirection");

		$query = $this->db->get();

		return $query->result_array();

	}
	
	public function get_country_dropdown()
	{	

		$this->db->select('countryId,country,bigFlag as countryFlag');

		$this->db->from('axcountries');
		
		if(trim($this->countryId) != "")

			$this->db->where('countryId', $this->countryId);

		if(trim($this->countryCode) != "")

			$this->db->like('countryCode', $this->countryCode,'none');	

		if(trim($this->country) != "")

			$this->db->like('country', $this->country,'none');

		if($this->sortColumn == '')

			$this->sortColumn = "country";

		if($this->sortDirection == '')

			$this->sortDirection = "ASC";	

		if(trim($this->countryIds) != ""){

			$countryIds = explode(",",$countryIds);

			$this->db->where_in('countryCode', $countryIds);	

		}	

		$this->db->order_by("$this->sortColumn", "$this->sortDirection");

		$query = $this->db->get();

		return $query->result_array();

	}

	public function validate_country(){

		$valid = 1;

		if($this->country == '')

			$valid =  0;	

		if($this->smallFlag == '')

			$valid =  0;	

		return $valid;								

	}

	public function set_country()

	{

		$currencyCode =  1;

		$data = array(

			'countryCode' 				=> $this->countryCode,

			'country' 					=> $this->country,

			'smallFlag' 				=> $this->smallFlag,

			'countryId' 			=> $this->countryId,

			'globalZoneCode' 			=> $this->globalZoneCode,

			'capital' 					=> $this->capital,

			'currencyCode' 				=> $this->currencyCode

		);

		$this->db->insert('axcountries', $data);

		$this->countryCode = $this->db->insert_id();

		$countryCode = $this->countryCode ;

		return $countryCode;

	}

	public function update_country($countryCode) { 

		if($countryCode == '')

			return 0;

		$data = array(

			'country' 					=> $this->country,

			'smallFlag' 				=> $this->smallFlag,

			'countryId' 			=> $this->countryId,

			'globalZoneCode' 			=> $this->globalZoneCode,

			'capital' 					=> $this->capital

		);

		$this->db->set($data); 

		$this->db->like('countryCode', $this->countryCode,'none');	

		$this->db->update("axcountries", $data); 

		$this->countryCode = $countryCode;

		return $countryCode;

	} 

	public function get_country_id($countryCode = FALSE)

	{

		if ($countryCode === FALSE)

		{

				return 0;

		}

		$query = $this->db->get_where('axcountries', array('countryCode' => $countryCode));

		return $query->row_array();

	}

	public function get_country_flag($countryCode){
		
		if($countryCode == '') return 0;
		
		$this->db->select('bigFlag');

		$this->db->from('axcountries');
		
		$this->db->where('countryCode', $countryCode);	
		
		$result_array = $this->db->get()->row_array();
		
		if(count($result_array)>0){
			
			$bigFlag	=	$result_array['bigFlag'];
		}
		
		return $bigFlag;
	}

	public function delete_country($countryIds) { 

		 if ($this->db->delete("axcountries", "countryCode IN ( ".$countryIds.")")) { 

			return true; 

		 } 

	} 

	  

	public function get_count() {
		
		if(trim($this->countryId) != "")

			$this->db->where('countryId', $this->countryId);

		if(trim($this->countryCode) != "")

			$this->db->where('countryCode', $this->countryCode);

		if(trim($this->smallFlag) != "")

			$this->db->where('smallFlag', $this->smallFlag);

		if(trim($this->currencyCode) != "")

			$this->db->where('currencyCode', $this->currencyCode);	

		if(trim($this->country) != "")

			$this->db->like('country', $this->country,'none');
			
		if(trim($this->capital) != "")

			$this->db->like('capital', $this->capital,'none');	

		if(trim($this->countryIds) != ""){

			$countryIds = explode(",",$countryIds);

			$this->db->where_in('countryCode', $countryIds);	

		}

		$this->db->from("axcountries");

		return $this->db->count_all_results();

	}

	public function setPageNumber($pageNumber) {

		$this->_pageNumber = $pageNumber;

	}

	public function setOffset($offset) {

		$this->_offset = $offset;

	}
	
	public function get_country_code_by_name($country = FALSE){

		if ($country === FALSE){
				return 0;
		}

		$query = $this->db->get_where('axcountries', array('country' => $country));

		return $query->row_array();

	}	

}

?>