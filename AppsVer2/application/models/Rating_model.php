<?php

class Rating_model extends CI_Model {



	public function __construct()

	{

		$this->sortColumn 						= 'ratingId';

		$this->sortDirection 					= 'ASC';

		$this->ratingId							= "";	

		$this->patientId						= "";	

		$this->doctorId							= "";	

		$this->rating							= "";

		$this->review							= "";	

		$this->insDate							= "";

		

		$this->ratingIds						= "";	

		

		

	}

		

	public function setPostGetVars(){	

	

		$this->ratingId							= trim($this->input->post_get('ratingId'));

		$this->patientId						= trim($this->input->post_get('patientId'));	

		$this->doctorId							= trim($this->input->post_get('doctorId'));

		$this->rating							= trim($this->input->post_get('rating'));

		$this->review							= trim($this->input->post_get('review'));

		$this->insDate							= trim($this->input->post_get('insDate'));

	

		$this->ratingIds						= trim($this->input->post_get('ratingIds'));			

	

	}

		

		

	public function get_rating($limit = NULL, $start = NULL)

	{	

		$this->db->limit($limit, $start);

		

		$this->db->select('

							CONCAT(axpatient.firstName , " ", axpatient.lastName) AS patientName,

							axpatient.profileImgUrl,

							axrating.rating,

							axrating.review,

							DATE_FORMAT(axrating.insDate, "%d-%b-%Y") AS insDate

							

						  ');

		

		$this->db->from('axrating');



		$this->db->join('axpatient', 'axpatient.patientId = axrating.patientId', 'left');

		

		if(trim($this->ratingId) != "")

			$this->db->where('axrating.ratingId', $this->ratingId);

			

		/*if(trim($this->patientId) != "")

			$this->db->where('axrating.patientId', $this->patientId);*/

			

		if(trim($this->doctorId) != "")

			$this->db->where('axrating.doctorId', $this->doctorId);		

		

		if(trim($this->review) != "")

			$this->db->like('axrating.review', $this->review,'none');

			

		if(trim($this->rating) != "")

			$this->db->like('axrating.rating', $this->rating,'none');

			

		if(trim($this->insDate) != "")

			$this->db->like('axrating.insDate', $this->insDate,'none');	

		

			

			

		if(trim($this->ratingIds) != ""){

			$ratingIds = explode(",",$this->ratingIds);

			$this->db->where_in('axrating.ratingId', $ratingIds);	

		}		

		

		if($this->sortColumn == '')

			$this->sortColumn = "ratingId";

		

		if($this->sortDirection == '')

			$this->sortDirection = "DESC";	

										

		$this->db->order_by("$this->sortColumn", "$this->sortDirection");

		

		$query = $this->db->get();

		

		return $query->result_array();

	

	}

		

	public function validate_rating(){

		

		$valid = 1;

		

		if($this->patientId == '')

			$valid =  0;	

		if($this->doctorId == '')

			$valid =  0;		

		// if($this->rating == '' || $this->rating < 1)
		if($this->rating == '')

			$valid =  0;		

		

		return $valid;								

			

	}

		

	public function set_rating()

	{

		

		$insDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		

		$data = array(

			'patientId' 		=> $this->patientId,

			'doctorId' 			=> $this->doctorId,

			'rating' 			=> $this->rating,

			'review' 			=> $this->review,

			'insDate' 			=> $insDate



		);

		

		$this->db->insert('axrating', $data);

		

		$this->ratingId = $this->db->insert_id();

		

		$ratingId = $this->ratingId ;

		

		return $ratingId;

	}

		

	public function update_rating($ratingId) { 

	

		if($ratingId == '')

			return 0;

		

		$data = array(

			'patientId' 		=> $this->patientId,

			'rating' 			=> $this->rating,

			'doctorId' 			=> $this->doctorId,

			'review' 			=> $this->review

		);

		

		$this->db->set($data); 

		

		$this->db->where("ratingId", $ratingId); 

		

		$this->db->update("axrating", $data); 

		

		$this->ratingId = $ratingId;

		

		return $ratingId;

		

	} 

	

	public function get_rating_id($ratingId = FALSE)

	{

		if ($ratingId === FALSE)

		{

				return 0;

		}

	

		$query = $this->db->get_where('axrating', array('ratingId' => $ratingId));

		

		return $query->row_array();

	}

		

	

	public function delete_rating($ratingIds) { 

	

		 if ($this->db->delete("axrating", "ratingId IN ( ".$ratingIds.")")) { 

		 

			return true; 

			

		 } 

	} 

		

	  

	public function get_count() {

		

		if(trim($this->ratingId) != "")

			$this->db->where('ratingId', $this->ratingId);

			

		if(trim($this->patientId) != "")

			$this->db->where('patientId', $this->patientId);

			

		if(trim($this->doctorId) != "")

			$this->db->where('doctorId', $this->doctorId);		

		

		if(trim($this->review) != "")

			$this->db->like('review', $this->review,'none');

			

		if(trim($this->rating) != "")

			$this->db->like('rating', $this->rating,'none');

			

		if(trim($this->insDate) != "")

			$this->db->like('insDate', $this->insDate,'none');	

		

			

			

		if(trim($this->ratingIds) != ""){

			$ratingIds = explode(",",$ratingIds);

			$this->db->where_in('ratingId', $ratingIds);	

		}

		

		$this->db->from("axrating");

		

		return $this->db->count_all_results();

	}

	

	

	public function get_rating_count($doctorId) {

		

		if($doctorId == '') return 0;



		$this->db->where('doctorId', $doctorId);		

		

		$this->db->from("axrating");

		

		return $this->db->count_all_results();

	}

	

	public function setPageNumber($pageNumber) {

		$this->_pageNumber = $pageNumber;

	}

	

	public function setOffset($offset) {

		$this->_offset = $offset;

	}

	

	

	public function get_total_rating($doctorId)

	{	

		if($doctorId == '') return 0;

		

		$this->db->select('SUM(rating) AS total_rating');

		

		$this->db->from('axrating');

			

		$this->db->where('doctorId', $doctorId);		

		

		$query = $this->db->get();



		if($query->num_rows() > 0){	



			$result = $query->row_array();



			return $result['total_rating'];	



		}

		

		return 0;	

	

	}

	

	

}

?>