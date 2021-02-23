<?php

class Video_model extends CI_Model {
	public function __construct()
	{
		$this->sortColumn 						= 'video_id';
		$this->sortDirection 					= 'ASC';
		$this->video_id							= "";	
		$this->title							= "";	
	}
	/** */
	public function setPostGetVars()
	{	
		$this->video_id							= trim($this->input->post_get('video_id'));
		$this->title							= trim($this->input->post_get('title'));	
	}
	/** */
	public function get_video($limit = NULL, $start = NULL)
	{	
		$this->db->limit($limit, $start);
		$this->db->select('video_id,title');
		$this->db->from('axvideos');
		if(trim($this->video_id) != "")
			$this->db->where('video_id', $this->video_id);
		if(trim($this->title) != "")
			$this->db->like('title', $this->title,'none');	
		if($this->sortColumn == '')
			$this->sortColumn = "video_id";
		if($this->sortDirection == '')
			$this->sortDirection = "DESC";	
		$this->db->order_by("$this->sortColumn", "$this->sortDirection");
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>