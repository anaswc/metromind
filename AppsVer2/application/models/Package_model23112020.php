<?php



class Package_model extends CI_Model {



	public function __construct()

	{



		$this->sortColumn 						= 'packageName';



		$this->sortDirection 					= 'ASC';



		$this->packageId						= "";	

		

		$this->doctorId							= "";



		$this->packageName						= "";	



		$this->packageDescription				= "";	



		$this->packageDuration					= "";	

		

		$this->noOfSession						= "";



		$this->packagePrize						= "";



		$this->status							= "";



		$this->packageIds						= "";	



	}



	public function setPostGetVars(){	



		$this->packageId						= trim($this->input->post_get('packageId'));

		

		$this->doctorId							= trim($this->input->post_get('doctorId'));



		$this->packageName						= trim($this->input->post_get('packageName'));	



		$this->packageDescription				= trim($this->input->post_get('packageDescription'));



		$this->packageDuration					= trim($this->input->post_get('packageDuration'));



		$this->noOfSession						= trim($this->input->post_get('noOfSession'));

		

		$this->packagePrize						= trim($this->input->post_get('packagePrize'));

		

		$this->status							= trim($this->input->post_get('status'));



		$this->packageIds						= trim($this->input->post_get('packageIds'));			



	}



	public function get_package($limit = NULL, $start = NULL)



	{	



		$this->db->limit($limit, $start);



		$this->db->select('	packageId,

							doctorId,

							packageName,

							packageDuration,
							
							packagePrize,
							
							noOfSession,

							packageDescription

						  ');



		$this->db->from('axpackages');



		if(trim($this->packageId) != "")



			$this->db->where('packageId', $this->packageId);



		if(trim($this->noOfSession) != "")



			$this->db->where('noOfSession', $this->noOfSession);



		if(trim($this->packageDuration) != "")



			$this->db->where('packageDuration', $this->packageDuration);	



		if(trim($this->status) != "")



			$this->db->where('status', $this->status);

			

		if(trim($this->doctorId) != "")



			$this->db->where('doctorId', $this->doctorId);	

			

		if(trim($this->packageDescription) != "")



			$this->db->where('packageDescription', $this->packageDescription);



		if(trim($this->packageName) != "")



			$this->db->like('packageName', $this->packageName,'none');

			

		if(trim($this->packageIds) != ""){



			$packageIds = explode(",",$this->packageIds);



			$this->db->where_in('packageId', $packageIds);	



		}		



		if($this->sortColumn == '')



			$this->sortColumn = "packageId";



		if($this->sortDirection == '')



			$this->sortDirection = "DESC";	



		$this->db->order_by("$this->sortColumn", "$this->sortDirection");



		$query = $this->db->get();

		//echo 	$this->db->last_query();die();	

		return $query->result_array();



	}



	public function validate_package(){



		$valid = 1;



		if($this->packageName == '')



			$valid =  0;	



		if($this->packageDuration == '')



			$valid =  0;	

	



		return $valid;								



	}



	public function set_package()

	{



		$status =  1;



		$data = array(



			'packageName' 				=> $this->packageName,

			

			'doctorId' 					=> $this->doctorId,

			

			'packageDuration' 			=> $this->packageDuration,

			

			'packageDescription' 		=> $this->packageDescription,

			

			'noOfSession' 				=> $this->noOfSession,

			

			'packagePrize' 				=> $this->packagePrize,

			

			'status' 					=> $status

	

		);



		$this->db->insert('axpackages', $data);



		$this->packageId = $this->db->insert_id();



		$packageId = $this->packageId ;



		return $packageId;



	}



	public function update_package($packageId) { 



		if($packageId == '')



			return 0;



		$data = array(



			'packageName' 				=> $this->packageName,

			

			'doctorId' 					=> $this->doctorId,

			

			'packageDuration' 			=> $this->packageDuration,

			

			'packageDescription' 		=> $this->packageDescription,

			

			'noOfSession' 				=> $this->noOfSession,

			

			'packagePrize' 				=> $this->packagePrize



		);



		$this->db->set($data); 



		$this->db->where("packageId", $packageId); 



		$this->db->update("axpackages", $data); 



		$this->packageId = $packageId;

		

		return $packageId;



	} 

	



	public function get_package_id($packageId = FALSE)

	{



		if ($packageId === FALSE)



		{



				return 0;



		}



		$query = $this->db->get_where('axpackages', array('packageId' => $packageId));



		return $query->row_array();



	}



	public function delete_package($packageIds) { 



		 if ($this->db->delete("axpackages", "packageId IN ( ".$packageIds.")")) { 



			return true; 



		 } 



	} 



	  



	public function get_count() {



		if(trim($this->packageId) != "")



			$this->db->where('packageId', $this->packageId);



		if(trim($this->noOfSession) != "")



			$this->db->where('noOfSession', $this->noOfSession);



		if(trim($this->packageDuration) != "")



			$this->db->where('packageDuration', $this->packageDuration);	



		if(trim($this->status) != "")



			$this->db->where('status', $this->status);	

			

		if(trim($this->doctorId) != "")



			$this->db->where('doctorId', $this->doctorId);	



		if(trim($this->packageDescription) != "")



			$this->db->where('packageDescription', $this->packageDescription);



		if(trim($this->packageName) != "")



			$this->db->like('packageName', $this->packageName);



		if(trim($this->packageIds) != ""){



			$packageIds = explode(",",$this->packageIds);



			$this->db->where_in('packageId', $packageIds);	



		}



		$this->db->from("axpackages");



		return $this->db->count_all_results();



	}



	public function setPageNumber($pageNumber) {



		$this->_pageNumber = $pageNumber;



	}



	public function setOffset($offset) {



		$this->_offset = $offset;



	}

	

	

	public function get_default_session_duration(){

		

		$this->db->select('defaultSessionDuration');

			

		$this->db->from("axsetting");

		

		$this->db->where('settingId', 1);

		

		$query = $this->db->get();

		

		$defaultSessionDuration = 0;

		

		if($query->num_rows() > 0){	

		

			$row_array = $query->row_array();



			$defaultSessionDuration =  $row_array['defaultSessionDuration'];

		}

		

		return $defaultSessionDuration;	

	}

	



}



?>