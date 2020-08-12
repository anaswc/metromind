<?php

class ReportIssue_model extends CI_Model {

	public function __construct()

	{

		$this->sortColumn 						= 'reportIssueId';

		$this->sortDirection 					= 'DESC';

		$this->reportIssueId					= "";	

		$this->patientId						= "";	

		$this->reportIssueTitle					= "";

		$this->reportIssueDescription			= "";	

		$this->InsDate							= "";

		$this->reportIssueIds					= "";	

	}

	public function setPostGetVars(){	

		$this->reportIssueId					= trim($this->input->post_get('reportIssueId'));

		$this->patientId							= trim($this->input->post_get('patientId'));	

		$this->reportIssueTitle					= trim($this->input->post_get('reportIssueTitle'));

		$this->reportIssueDescription			= trim($this->input->post_get('reportIssueDescription'));

		$this->InsDate							= trim($this->input->post_get('InsDate'));

		$this->reportIssueIds					= trim($this->input->post_get('reportIssueIds'));			

	}

	public function get_reportIssue($limit = NULL, $start = NULL)

	{	

		$this->db->limit($limit, $start);

		$this->db->select('*');

		$this->db->from('axreportissues');

		if(trim($this->reportIssueId) != "")

			$this->db->where('reportIssueId', $this->reportIssueId);

		if(trim($this->patientId) != "")

			$this->db->where('patientId', $this->patientId);	

		if(trim($this->reportIssueDescription) != "")

			$this->db->like('reportIssueDescription', $this->reportIssueDescription,'none');

		if(trim($this->reportIssueTitle) != "")

			$this->db->like('reportIssueTitle', $this->reportIssueTitle,'none');

		if(trim($this->InsDate) != "")

			$this->db->like('InsDate', $this->InsDate,'none');	

		if(trim($this->reportIssueIds) != ""){

			$reportIssueIds = explode(",",$this->reportIssueIds);

			$this->db->where_in('reportIssueId', $reportIssueIds);	

		}		

		if($this->sortColumn == '')

			$this->sortColumn = "reportIssueId";

		if($this->sortDirection == '')

			$this->sortDirection = "DESC";	

										

		$this->db->order_by("$this->sortColumn", "$this->sortDirection");

		$query = $this->db->get();

		return $query->result_array();

	}

	public function validate_reportIssue(){

		$valid = 1;

		if($this->patientId == '')

			$valid =  0;		

		if($this->reportIssueTitle == '')

			$valid =  0;	

		return $valid;								

	}

	public function set_reportIssue()

	{

		$insDate = date("Y-m-d H:i:s", now('Asia/Kolkata'));

		$data = array(

			'patientId' 					=> $this->patientId,

			'reportIssueTitle' 				=> $this->reportIssueTitle,

			'reportIssueDescription' 		=> $this->reportIssueDescription,

			'InsDate' 						=> $insDate

		);

		$this->db->insert('axreportissues', $data);

		$this->reportIssueId = $this->db->insert_id();

		$reportIssueId = $this->reportIssueId ;

		return $reportIssueId;

	}

	public function update_reportIssue($reportIssueId) { 

		if($reportIssueId == '')

			return 0;

		$data = array(

			'patientId' 					=> $this->patientId,

			'reportIssueTitle' 			=> $this->reportIssueTitle,

			'reportIssueDescription' 		=> $this->reportIssueDescription

		);

		$this->db->set($data); 

		$this->db->where("reportIssueId", $reportIssueId); 

		$this->db->update("axreportissues", $data); 

		$this->reportIssueId = $reportIssueId;

		return $reportIssueId;

	} 

	public function get_reportIssue_id($reportIssueId = FALSE)

	{

		if ($reportIssueId === FALSE)

		{

				return 0;

		}

		$query = $this->db->get_where('axreportissues', array('reportIssueId' => $reportIssueId));

		return $query->row_array();

	}

	public function delete_reportIssue($reportIssueIds) { 

		 if ($this->db->delete("axreportissues", "reportIssueId IN ( ".$reportIssueIds.")")) { 

			return true; 

		 } 

	} 

	  

	public function get_count() {

		if(trim($this->reportIssueId) != "")

			$this->db->where('reportIssueId', $this->reportIssueId);

		if(trim($this->patientId) != "")

			$this->db->where('patientId', $this->patientId);
		if(trim($this->reportIssueDescription) != "")

			$this->db->like('reportIssueDescription', $this->reportIssueDescription,'none');

		if(trim($this->reportIssueTitle) != "")

			$this->db->like('reportIssueTitle', $this->reportIssueTitle,'none');

		if(trim($this->InsDate) != "")

			$this->db->like('InsDate', $this->InsDate,'none');	

		if(trim($this->reportIssueIds) != ""){

			$reportIssueIds = explode(",",$this->reportIssueIds);

			$this->db->where_in('reportIssueId', $reportIssueIds);	

		}

		$this->db->from("axreportissues");

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