<?php

class Video_model extends CI_Model {
	public function __construct()
	{
		$this->sortColumn 						= 'videoId';
		$this->sortDirection 					= 'ASC';
		$this->videoId							= "";	
		$this->title							= "";	
	}
	/** */
	public function setPostGetVars()
	{	
		$this->videoId							= trim($this->input->post_get('videoId'));
		$this->title							= trim($this->input->post_get('title'));	
	}
	/** */
	public function get_video($limit = NULL, $start = NULL)
	{	
		$this->db->limit($limit, $start);
		$this->db->select('videoId,title');
		$this->db->from('axvideos');
		if(trim($this->videoId) != "")
			$this->db->where('videoId', $this->videoId);
		if(trim($this->title) != "")
			$this->db->like('title', $this->title,'none');	
		if($this->sortColumn == '')
			$this->sortColumn = "videoId";
		if($this->sortDirection == '')
			$this->sortDirection = "DESC";	
		$this->db->order_by("$this->sortColumn", "$this->sortDirection");
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>