<?php



class Speciality_model extends CI_Model {



	public function __construct()

	{



		$this->sortColumn 						= 'specialityName';



		$this->sortDirection 					= 'ASC';



		$this->specialityId						= "";	



		$this->specialityName					= "";	



		$this->description						= "";	



		$this->specialityImageUrl				= "";	



		$this->status							= "";

		

		$this->createdDate						= "";



		$this->seoUri							= "";



		$this->specialityIds					= "";	



	}



	public function setPostGetVars(){	



		$this->specialityId						= trim($this->input->post_get('specialityId'));



		$this->specialityName					= trim($this->input->post_get('specialityName'));	



		$this->description						= trim($this->input->post_get('description'));



		$this->specialityImageUrl				= trim($this->input->post_get('specialityImageUrl'));



		$this->status							= trim($this->input->post_get('status'));



		$this->seoUri							= trim($this->input->post_get('seoUri'));

		

		$this->createdDate						= trim($this->input->post_get('createdDate'));



		$this->specialityIds					= trim($this->input->post_get('specialityIds'));			



	}



	public function get_speciality($limit = NULL, $start = NULL)



	{	



		$this->db->limit($limit, $start);



		$this->db->select('	specialityId,

							specialityName,

							specialityImageUrl,

							description

						  ');



		$this->db->from('axspeciality');



		if(trim($this->specialityId) != "")



			$this->db->where('specialityId', $this->specialityId);



		if(trim($this->seoUri) != "")



			$this->db->where('seoUri', $this->seoUri);



		if(trim($this->specialityImageUrl) != "")



			$this->db->where('specialityImageUrl', $this->specialityImageUrl);	



		if(trim($this->status) != "")



			$this->db->where('status', $this->status);

			

		if(trim($this->createdDate) != "")



			$this->db->where('createdDate', $this->createdDate);	

			

		if(trim($this->description) != "")



			$this->db->where('description', $this->description);



		if(trim($this->specialityName) != "")



			$this->db->like('specialityName', $this->specialityName,'none');

			

		if(trim($this->specialityIds) != ""){



			$specialityIds = explode(",",$this->specialityIds);



			$this->db->where_in('specialityId', $specialityIds);	



		}		


		$this->sortColumn = "specialityId";
		if($this->sortColumn == '')



			$this->sortColumn = "specialityId";



		if($this->sortDirection == '')



			$this->sortDirection = "DESC";	



		$this->db->order_by("$this->sortColumn", "$this->sortDirection");



		$query = $this->db->get();

		//echo 	$this->db->last_query();die();	

		return $query->result_array();



	}

	

	public function get_speciality_dropdown()

	{	





		$this->db->select('	specialityId,

							specialityName

						  ');



		$this->db->from('axspeciality');



		if(trim($this->specialityId) != "")



			$this->db->where('specialityId', $this->specialityId);



		if(trim($this->status) != "")



			$this->db->where('status', $this->status);

			

		

			

		if(trim($this->specialityIds) != ""){



			$specialityIds = explode(",",$this->specialityIds);



			$this->db->where_in('specialityId', $specialityIds);	



		}		



		if($this->sortColumn == '')



			$this->sortColumn = "specialityId";



		if($this->sortDirection == '')



			$this->sortDirection = "DESC";	



		$this->db->order_by("$this->sortColumn", "$this->sortDirection");



		$query = $this->db->get();



		return $query->result_array();



	}



	public function validate_speciality(){



		$valid = 1;



		if($this->specialityName == '')



			$valid =  0;	



		if($this->specialityImageUrl == '')



			$valid =  0;	

	



		return $valid;								



	}



	public function set_speciality()

	{



		$status =  1;



		$createdDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));



		$data = array(



			'specialityName' 				=> $this->specialityName,

			

			'description' 					=> $this->description,



			'status' 						=> $status,

			

			'createdDate' 					=> $createdDate

	

		);



		$this->db->insert('axspeciality', $data);



		$this->specialityId = $this->db->insert_id();



		$specialityId = $this->specialityId ;

		

		$seoUri 	=	$this->specialityName;



		$seoUri 	= 	url_title($seoUri, 'dash', TRUE);	



		if($this->checkIfSeoUriExistsNew($seoUri,$specialityId)){ //If another participants exists on the same seo uri



			$seoUri = $seoUri."-".trim($this->specialityId);



		}

		

		$data = array(



			'seoUri' 			=> $seoUri



		);



		$this->db->set($data); 



		$this->db->where("specialityId", $this->specialityId); 



		$this->db->update("axspeciality", $data); 

		

		if(isset($_FILES["specialityImageUrl"])){



			$specialityId = $this->upload_image($this->specialityId);



		}	



		return $specialityId;



	}



	public function update_speciality($specialityId) { 



		if($specialityId == '')



			return 0;



		$data = array(



			'specialityName' 		=> $this->specialityName,

			

			'description' 			=> $this->description



		);



		$this->db->set($data); 



		$this->db->where("specialityId", $specialityId); 



		$this->db->update("axspeciality", $data); 



		$this->specialityId = $specialityId;

		

		

		$seoUri 	=	$this->specialityName;



		$seoUri 	= 	url_title($seoUri, 'dash', TRUE);	



		if($this->checkIfSeoUriExistsNew($seoUri,$specialityId)){ //If another participants exists on the same seo uri



			$seoUri = $seoUri."-".trim($this->specialityId);



		}

		

		$data = array(



			'seoUri' 			=> $seoUri



		);



		$this->db->set($data); 



		$this->db->where("specialityId", $this->specialityId); 



		$this->db->update("axspeciality", $data); 

		

		

		if(isset($_FILES["specialityImageUrl"])){



			$specialityId = $this->upload_image($this->specialityId);



		}



		return $specialityId;



	} 

	

	public function upload_image($specialityId) {

		

		if($specialityId == '') return 0; 



		$config['upload_path']   	= './uploads/speciality/'; 



		$config['allowed_types'] 	= 'jpg|gif|png|jpeg|JPG|PNG'; 



		//$config['max_size']      	= 2048; 



		$config['overwrite'] 	  	= TRUE;



		//$config['max_width']     	= 1300; 



		//$config['max_height']    	= 800;  



		$filename 					= $_FILES["specialityImageUrl"]['name'];



		$type    					= substr(strrchr(trim($filename), "."),1);



		$specialityImageUrl			= "SPECIALITY_".$specialityId.".".$type;



		$config['file_name']		= $specialityImageUrl;



		$this->load->library('upload', $config);



		$this->upload->initialize($config);



		if ( ! $this->upload->do_upload('specialityImageUrl')) {



		$error = array('error' => $this->upload->display_errors()); 

		

		if($error['error'] == "<p>The image you are attempting to upload doesn't fit into the allowed dimensions.</p>"){



			$this->errorMessage = 477;



		}else if($error['error'] == "<p>The filetype you are attempting to upload is not allowed.</p>"){

			

			$this->errorMessage = 476;

			

		}



		return 0;



		} else { 



		$data1 = array('upload_data' => $this->upload->data()); 



		$data = array(



			'specialityImageUrl' => $specialityImageUrl



		);



		$this->db->set($data); 



		$this->db->where("specialityId", $specialityId); 



		$this->db->update("axspeciality", $data);



		return $specialityId;



		} 

	}

	

	public function checkIfSeoUriExistsNew($seoUri,$specialityId){



		if(trim($seoUri) == "") return 0;



		if(trim($specialityId) == "") return 0;



		$this->db->select('specialityId');



		$this->db->from('axspeciality');



		$this->db->like('seoUri',$seoUri);



		if(trim($specialityId) != ""){	



			$this->db->where('specialityId != ',$specialityId);



		}



		$result_array = $this->db->get();



		if($result_array->num_rows()>0){



			return 1;



		}



	}



	public function get_speciality_id($specialityId = FALSE)

	{



		if ($specialityId === FALSE)



		{



				return 0;



		}



		$query = $this->db->get_where('axspeciality', array('specialityId' => $specialityId));



		return $query->row_array();



	}



	public function delete_speciality($specialityIds) { 



		 if ($this->db->delete("axspeciality", "specialityId IN ( ".$specialityIds.")")) { 



			return true; 



		 } 



	} 



	  



	public function get_count() {



		if(trim($this->specialityId) != "")



			$this->db->where('specialityId', $this->specialityId);



		if(trim($this->seoUri) != "")



			$this->db->where('seoUri', $this->seoUri);



		if(trim($this->specialityImageUrl) != "")



			$this->db->where('specialityImageUrl', $this->specialityImageUrl);	



		if(trim($this->status) != "")



			$this->db->where('status', $this->status);	

			

		if(trim($this->createdDate) != "")



			$this->db->where('createdDate', $this->createdDate);	



		if(trim($this->description) != "")



			$this->db->where('description', $this->description);



		if(trim($this->specialityName) != "")



			$this->db->like('specialityName', $this->specialityName);



		if(trim($this->specialityIds) != ""){



			$specialityIds = explode(",",$this->specialityIds);



			$this->db->where_in('specialityId', $specialityIds);	



		}



		$this->db->from("axspeciality");



		return $this->db->count_all_results();



	}



	public function setPageNumber($pageNumber) {



		$this->_pageNumber = $pageNumber;



	}



	public function setOffset($offset) {



		$this->_offset = $offset;



	}



}



?>