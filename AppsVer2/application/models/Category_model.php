<?php

class Category_model extends CI_Model {
	public function __construct()
	{
		$this->sortColumn 						= 'catId';
		$this->sortDirection 					= 'ASC';
		$this->catId							= "";	
		$this->title							= "";	
	}
	/** */
	public function setPostGetVars()
	{	
		$this->catId							= trim($this->input->post_get('catId'));
		$this->title							= trim($this->input->post_get('title'));	
	}
	/** */
	public function get_category($limit = NULL, $start = NULL)
	{	
		$this->db->limit($limit, $start);
		$this->db->select('catId,title');
		$this->db->from('axcategories');
		if(trim($this->catId) != "")
			$this->db->where('catId', $this->catId);
		if(trim($this->title) != "")
			$this->db->like('title', $this->title,'none');	
		if($this->sortColumn == '')
			$this->sortColumn = "catId";
		if($this->sortDirection == '')
			$this->sortDirection = "DESC";	
		$this->db->order_by("$this->sortColumn", "$this->sortDirection");
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>