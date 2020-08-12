<?php



class Symptom_model extends CI_Model {



	public function __construct()

	{



		$this->sortColumn 						= 'symptomName';



		$this->sortDirection 					= 'ASC';



		$this->symptomId						= "";	



		$this->symptomName						= "";	



		$this->description						= "";	



		$this->symptomImage						= "";	



		$this->status							= "";

		

		$this->specialityId						= "";



		$this->seoUri							= "";



		$this->symptomIds						= "";	



	}



	public function setPostGetVars(){	



		$this->symptomId						= trim($this->input->post_get('symptomId'));



		$this->symptomName						= trim($this->input->post_get('symptomName'));	



		$this->description						= trim($this->input->post_get('description'));



		$this->symptomImage						= trim($this->input->post_get('symptomImage'));



		$this->status							= trim($this->input->post_get('status'));



		$this->seoUri							= trim($this->input->post_get('seoUri'));

		

		$this->specialityId						= trim($this->input->post_get('specialityId'));



		$this->symptomIds						= trim($this->input->post_get('symptomIds'));			



	}



	public function get_symptom($limit = NULL, $start = NULL)



	{	



		$this->db->limit($limit, $start);



		$this->db->select('	symptomId,

							symptomName,

							symptomImage,
							
							colorCode,
							
							opacity,

							description

						  ');



		$this->db->from('axsymptoms');



		if(trim($this->symptomId) != "")



			$this->db->where('symptomId', $this->symptomId);



		if(trim($this->seoUri) != "")



			$this->db->where('seoUri', $this->seoUri);



		if(trim($this->symptomImage) != "")



			$this->db->where('symptomImage', $this->symptomImage);	



		if(trim($this->status) != "")



			$this->db->where('status', $this->status);

			

		if(trim($this->specialityId) != "")



			$this->db->where('specialityId', $this->specialityId);	

			

		if(trim($this->description) != "")



			$this->db->where('description', $this->description);



		if(trim($this->symptomName) != "")



			$this->db->like('symptomName', $this->symptomName,'none');

			

		if(trim($this->symptomIds) != ""){



			$symptomIds = explode(",",$this->symptomIds);



			$this->db->where_in('symptomId', $symptomIds);	



		}		



		if($this->sortColumn == '')



			$this->sortColumn = "symptomId";



		if($this->sortDirection == '')



			$this->sortDirection = "DESC";	



		$this->db->order_by("$this->sortColumn", "$this->sortDirection");



		$query = $this->db->get();

		//echo 	$this->db->last_query();die();	

		return $query->result_array();



	}



	public function validate_symptom(){



		$valid = 1;



		if($this->symptomName == '')



			$valid =  0;	



		if($this->symptomImage == '')



			$valid =  0;	

	



		return $valid;								



	}



	public function set_symptom()

	{



		$status =  1;



		$data = array(



			'symptomName' 				=> $this->symptomName,

			

			'description' 				=> $this->description,



			'status' 					=> $status,

			

			'specialityId' 				=> $this->specialityId

	

		);



		$this->db->insert('axsymptoms', $data);



		$this->symptomId = $this->db->insert_id();



		$symptomId = $this->symptomId ;

		

		$seoUri 	=	$this->symptomName;



		$seoUri 	= 	url_title($seoUri, 'dash', TRUE);	



		if($this->checkIfSeoUriExistsNew($seoUri,$symptomId)){ //If another participants exists on the same seo uri



			$seoUri = $seoUri."-".trim($this->symptomId);



		}

		

		$data = array(



			'seoUri' 			=> $seoUri



		);



		$this->db->set($data); 



		$this->db->where("symptomId", $this->symptomId); 



		$this->db->update("axsymptoms", $data); 

		

		if(isset($_FILES["symptomImage"])){



			$symptomId = $this->upload_image($this->symptomId);



		}	



		return $symptomId;



	}



	public function update_symptom($symptomId) { 



		if($symptomId == '')



			return 0;



		$data = array(



			'symptomName' 		=> $this->symptomName,

			

			'description' 			=> $this->description



		);



		$this->db->set($data); 



		$this->db->where("symptomId", $symptomId); 



		$this->db->update("axsymptoms", $data); 



		$this->symptomId = $symptomId;

		

		

		$seoUri 	=	$this->symptomName;



		$seoUri 	= 	url_title($seoUri, 'dash', TRUE);	



		if($this->checkIfSeoUriExistsNew($seoUri,$symptomId)){ //If another participants exists on the same seo uri



			$seoUri = $seoUri."-".trim($this->symptomId);



		}

		

		$data = array(



			'seoUri' 			=> $seoUri



		);



		$this->db->set($data); 



		$this->db->where("symptomId", $this->symptomId); 



		$this->db->update("axsymptoms", $data); 

		

		

		if(isset($_FILES["symptomImage"])){



			$symptomId = $this->upload_image($this->symptomId);



		}



		return $symptomId;



	} 

	

	public function upload_image($symptomId) {

		

		if($symptomId == '') return 0; 



		$config['upload_path']   	= './uploads/symptoms/'; 



		$config['allowed_types'] 	= 'jpg|gif|png|jpeg|JPG|PNG'; 



		//$config['max_size']      	= 2048; 



		$config['overwrite'] 	  	= TRUE;



		//$config['max_width']     	= 1300; 



		//$config['max_height']    	= 800;  



		$filename 					= $_FILES["symptomImage"]['name'];



		$type    					= substr(strrchr(trim($filename), "."),1);



		$symptomImage			= "SYMPTOMS_".$symptomId.".".$type;



		$config['file_name']		= $symptomImage;



		$this->load->library('upload', $config);



		$this->upload->initialize($config);



		if ( ! $this->upload->do_upload('symptomImage')) {



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



			'symptomImage' => $symptomImage



		);



		$this->db->set($data); 



		$this->db->where("symptomId", $symptomId); 



		$this->db->update("axsymptoms", $data);



		return $symptomId;



		} 

	}

	

	public function checkIfSeoUriExistsNew($seoUri,$symptomId){



		if(trim($seoUri) == "") return 0;



		if(trim($symptomId) == "") return 0;



		$this->db->select('symptomId');



		$this->db->from('axsymptoms');



		$this->db->like('seoUri',$seoUri);



		if(trim($symptomId) != ""){	



			$this->db->where('symptomId != ',$symptomId);



		}



		$result_array = $this->db->get();



		if($result_array->num_rows()>0){



			return 1;



		}



	}



	public function get_symptom_id($symptomId = FALSE)

	{



		if ($symptomId === FALSE)



		{



				return 0;



		}



		$query = $this->db->get_where('axsymptoms', array('symptomId' => $symptomId));



		return $query->row_array();



	}



	public function delete_symptom($symptomIds) { 



		 if ($this->db->delete("axsymptoms", "symptomId IN ( ".$symptomIds.")")) { 



			return true; 



		 } 



	} 



	  



	public function get_count() {



		if(trim($this->symptomId) != "")



			$this->db->where('symptomId', $this->symptomId);



		if(trim($this->seoUri) != "")



			$this->db->where('seoUri', $this->seoUri);



		if(trim($this->symptomImage) != "")



			$this->db->where('symptomImage', $this->symptomImage);	



		if(trim($this->status) != "")



			$this->db->where('status', $this->status);	

			

		if(trim($this->specialityId) != "")



			$this->db->where('specialityId', $this->specialityId);	



		if(trim($this->description) != "")



			$this->db->where('description', $this->description);



		if(trim($this->symptomName) != "")



			$this->db->like('symptomName', $this->symptomName);



		if(trim($this->symptomIds) != ""){



			$symptomIds = explode(",",$this->symptomIds);



			$this->db->where_in('symptomId', $symptomIds);	



		}



		$this->db->from("axsymptoms");



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