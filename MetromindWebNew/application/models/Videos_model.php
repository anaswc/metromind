<?php

class  Videos_model extends CI_Model
{

	public function __construct()
	{

		$this->videoId       	=	"";
		$this->title    		=	"";
		// $this->catTitle    		=	"";
		$this->id    			=	"";
		$this->category    		=	"";
		$this->status          	=	"";
		$this->sortColumn 	  	= 	'';
		$this->sortDirection  	= 	'';
		$this->load->database();
		$this->load->library('upload');
		$this->setPostGetVars();
	}
	public function setPostGetVars()
	{
		$this->videoId						= 	$this->input->post_get('videoId');
		$this->title						= 	trim($this->input->post_get('title'));
		// $this->title						= 	trim($this->input->post_get('title'));
		$this->category						= 	trim($this->input->post_get('category'));
		$this->id							= 	trim($this->input->post_get('id'));
		$this->sortColumn					= 	$this->input->post_get('sortColumn');
		$this->sortDirection				= 	$this->input->post_get('sortDirection');
	}




	public function setVideos()
	{
		$this->load->helper('url');

		//$seoUri = url_title($this->input->post('adminName'), 'dash', TRUE);
		$createdDate = date('Y-m-d H:i:s');
		$status = 1;
		$data = array(
			'title' => $this->input->post('title'),
			'videoId'    => $this->input->post('videoId'),
			'category'    => $this->input->post('category')
		);
		$this->db->insert('axvideos', $data);
		$this->id  = $this->db->insert_id();
		$id = $this->id;
		// echo "fjhdg";exit;
		if ($_FILES["videoImgUrl"]['name'] <> '') {
			
			$this->videos_model->uploadImage($id);
		}
		return $id;
	}
	public function uploadImage($id)
	{
		
		$config['upload_path']   = AXUPLOADVIDEOPATH;
		$config['allowed_types'] = 'jpg|png|jpeg';
		//$config['max_size']      = 100; 
		$config['overwrite'] 	  = TRUE;
		$config['max_width']     = 1300;
		$config['max_height']    = 800;
		$filename 		= $_FILES["videoImgUrl"]['name'];
		$type    		= substr(strrchr(trim($filename), "."), 1);
		$videoImgUrl	= $id . "." . $type;
		$config['file_name'] = $videoImgUrl;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('videoImgUrl')) {
		// print_r($config);exit;

			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', $error['error']);
			return $error;
		} else {
			// echo $videoImgUrl;exit;

			$data1 = array('upload_data' => $this->upload->data());
			$data = array(
				'videoImgUrl' => $videoImgUrl
			);
			// print_r($data);
			$this->db->set($data);
			$this->db->where("id", $id);
			$this->db->update("axvideos", $data);
			return $id;
		}
	}


	public function getvideo_table_id($id = FALSE)
	{
		if ($id === FALSE) {
			return 0;
		}
		$query = $this->db->get_where('axvideos', array('id' => $id));
		return $query->row_array();
	}
	public function get_Admin_seoUri($seoUri = FALSE)
	{
		if ($seoUri === FALSE) {
			return 0;
		}
		$result_array = $this->db->get_where('axadmin', array('seoUri' => $seoUri));
		return $result_array->row_array();
	}
	public function updateVideo($id)
	{
		$this->load->helper('url');
		$data = array(
			'videoId' => $this->input->post('videoId'),
			'title'    => $this->input->post('title'),
			'status'    => 1,
			'category'    => $this->input->post('category'),
		);
		$this->db->set($data);
		$this->db->where("id", $id);
		$this->db->update("axvideos", $data);
		$this->id = $id;
		if ($_FILES["videoImgUrl"]['name'] <> '') {
			// echo "fjhdg";exit;
			$this->videos_model->uploadImage($id);
		}
		return $id;
	}


	//  public function activate_Video($ids) { 

	// 		$this->db->where_in("id", $id); 
	// 		$status = 1;
	// 		$data = array(
	// 			'status' => $status
	// 		);
	// 		$this->db->update("axvideos", $data);  
	// 	} 

	// 	public function deactivate_Video($ids) { 

	// 		$this->db->where_in("id", $ids); 
	// 		$status = 0;
	// 		$data = array(
	// 			'status' => $status
	// 		);
	// 		//print_r($data);exit;
	// 		$this->db->update("axvideos", $data);  
	// 		//echo $this->db->last_query();exit;
	// 	} 
	public function getVideos($limit = NULL, $start = NULL)
	{
		$this->db->limit($limit, $start);
		$this->db->select('*,axcategories.title as category,axvideos.title as title');
		$this->db->from('axvideos');
		$this->db->join('axcategories', 'axvideos.category=axcategories.catId', 'left');

		if ($this->videoId != "")
			$this->db->where('videoId', $this->videoId);
		if (trim($this->title) != "")
			$this->db->like('title ', $this->title);


		if ($this->sortColumn == '')
			$this->sortColumn = "videoId";

		if ($this->sortDirection == '')
			$this->sortDirection = "DESC";

		$this->db->order_by("$this->sortColumn", "$this->sortDirection");

		$query = $this->db->get();
		// echo $this->db->last_query(); exit; 
		return $query->result_array();
	}
	public function delete_video($ids)
	{
		$imageId = explode(',', $ids);
		$this->db->select('videoImgUrl');
		$this->db->from('axvideos');
		$this->db->where_in('id', $imageId);
		$query = $this->db->get();
		$result = $query->result_array();

		if (count($result)) {
			foreach ($result as $res) {
				unlink(FCPATH . AXUPLOADVIDEOPATH . $res['videoImgUrl']);
			}
		}
		if ($this->db->delete("axvideos", "id IN ( " . $ids . ")")) {
			return true;
		}
	}
	public function setPageNumber($pageNumber)
	{
		$this->_pageNumber = $pageNumber;
	}

	public function setOffset($offset)
	{
		$this->_offset = $offset;
	}
	public function get_count()
	{

		if ($this->videoId != "")
			$this->db->where('videoId', $this->videoId);
		if (trim($this->title) != "")
			$this->db->like('title', $this->title);
		$this->db->from("axvideos");
		return $this->db->count_all_results();
	}
	public function validateVideos()
	{
		$this->db->select('*');
		$this->db->from('axvideos');
		if ($this->id != "")
			$this->db->where('id  != ', $this->id);
		if (trim($this->videoId) != "")
			$this->db->where('id', $this->videoId);
		$query 	= $this->db->get();
		// echo $this->db->last_query();exit;
		if ($query->num_rows() > 0) {
			return 0;
		}
		return 1;
	}

	public function retrieveAdmin($seoUri = FALSE)
	{
		if ($seoUri === FALSE) {
			return 0;
		}
		$this->db->select('*');
		$this->db->from('axadmin');
		$this->db->like('seoUri', $seoUri);
		$result_array = $this->db->get()->result_array();
		$this->adminId				    = $result_array[0]["adminId"];
		$this->adminName				= $result_array[0]["adminName"];
		$this->AdminImageUrl				    = $result_array[0]["AdminImageUrl"];
		$this->description		            = $result_array[0]["description"];
		$this->allotedTime		            = $result_array[0]["allotedTime"];
		$this->status					= $result_array[0]["status"];
		$this->createdDate	            = $result_array[0]["createdDate"];
		$this->seoUri				    = $result_array[0]["seoUri"];
		return 1;
	}
	/*** */
	public function getCategories()
	{
		$this->db->select('*');
		$this->db->from('axcategories');
		if ($this->catId != "")
			$this->db->where('catId', $this->catId);
		if (trim($this->title) != "")
			$this->db->like('title', $this->title);
		if ($this->sortColumn == '')
			$this->sortColumn = "catId";
		if ($this->sortDirection == '')
			$this->sortDirection = "DESC";
		$this->db->order_by("$this->sortColumn", "$this->sortDirection");
		$query = $this->db->get();
		return $query->result_array();
	}
	/** */
	public function video_count($ids)
	{
		$categoryId = explode(',', $ids);
		$this->db->select('id');
		$this->db->from('axvideos');
		$this->db->where_in('category', $categoryId);
		// return $this->db->count_all_results();
		$query = $this->db->get();
		//echo $this->db->last_query(); exit; 
		return $query->result_array();
	}
	public function video_category_delete($ids)
	{
		if ($this->db->delete("axvideos", "category IN ( " . $ids . ")")) {
			return true;
		}
	}
}
