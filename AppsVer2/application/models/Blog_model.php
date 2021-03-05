<?php

class Blog_model extends CI_Model {
	public function __construct()
	{
		$this->sortColumn 						= 'blogId';
		$this->sortDirection 					= 'ASC';
		$this->description						= "";	
		$this->blogImgUrl						= "";	
		$this->title							= "";	
		$this->blogId							= "";	
		$this->category							= "";	
		$this->author							= "";
		$this->created_at							= "";	

	}
	/** */
	public function setPostGetVars()
	{	
		$this->description						= trim($this->input->post_get('description'));
		$this->title							= trim($this->input->post_get('title'));	
		$this->blogImgUrl						= trim($this->input->post_get('blogImgUrl'));	
		$this->blogId							= trim($this->input->post_get('blogId'));
		$this->category							= trim($this->input->post_get('category'));	
		$this->created_at							= trim($this->input->post_get('created_at'));	
		$this->author							= trim($this->input->post_get('author'));	

	}
	/** */
	public function get_blog( $limit = NULL, $start = NULL)
	{	
		$this->db->limit($limit, $start);
		$this->db->select('axblogs.blogId,axblogs.title,axblogs.blogImgUrl,axblogs.description,axcategories.title as category');
		$this->db->join('axcategories', 'axcategories.catId = axblogs.category', 'left');
		$this->db->from('axblogs');
		if(trim($this->blogId) != "")
			$this->db->where('blogId', $this->blogId);
			if(trim($this->category) != "")
			$this->db->where('category', $this->category);
		if(trim($this->title) != "")
			$this->db->like('title', $this->title,'none');
		if(trim($this->description) != "")
			$this->db->like('description', $this->description,'none');	
		if($this->sortColumn == '')
			$this->sortColumn = "blogId";
		if($this->sortDirection == '')
			$this->sortDirection = "DESC";	
		$this->db->order_by("$this->sortColumn", "$this->sortDirection");
		$query = $this->db->get();
		return $query->result_array();
	}
}
