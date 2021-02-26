<?php

class  Blogs_model extends CI_Model
{

	public function __construct()
	{

		$this->blogId       	=	"";
		$this->title    		=	"";
		$this->description    	=	"";
		$this->category    		=	"";
		$this->image    		=	"";
		$this->status          	=	"";
		$this->sortColumn 	  	= 	'';
		$this->sortDirection  	= 	'';
		$this->load->database();
		$this->load->library('upload');
		$this->setPostGetVars();
	}
	public function setPostGetVars()
	{
		$this->blogId						= 	$this->input->post_get('blogId');
		$this->title						= 	trim($this->input->post_get('title'));
		$this->category						= 	trim($this->input->post_get('category'));
		$this->description					= 	trim($this->input->post_get('description'));
		$this->status						= 	trim($this->input->post_get('status'));
		$this->image						= 	trim($this->input->post_get('image'));
		$this->sortColumn					= 	$this->input->post_get('sortColumn');
		$this->sortDirection				= 	$this->input->post_get('sortDirection');
	}

	public function get_count()
	{
		if ($this->blogId != "")
			$this->db->where('blogId', $this->blogId);
		if ($this->title != "")
			$this->db->where('title', $this->title);
		if (trim($this->image) != "")
			$this->db->like('image', $this->image);
		if (trim($this->description) != "")
			$this->db->like('description', $this->description);
		if (trim($this->category) != "")
			$this->db->like('category', $this->category);
		$this->db->from("axblogs");
		return $this->db->count_all_results();
	}
	public function getBlogs($limit = NULL, $start = NULL)
	{
		$this->db->limit($limit, $start);
		$this->db->select('*,axcategories.title as category,axblogs.title as title');
		$this->db->from('axblogs');
		$this->db->join('axcategories', 'axblogs.category=axcategories.catId', 'left');
		if ($this->blogId != "")
			$this->db->where('blogId', $this->blogId);
		if ($this->title != "")
			$this->db->where('title', $this->title);
		if (trim($this->image) != "")
			$this->db->like('image', $this->image);
		if (trim($this->description) != "")
			$this->db->like('description', $this->description);
		if (trim($this->category) != "")
			$this->db->like('category', $this->category);
		if ($this->sortColumn == '')
			$this->sortColumn = "blogId";
		if ($this->sortDirection == '')
			$this->sortDirection = "DESC";
		$this->db->order_by("$this->sortColumn", "$this->sortDirection");
		$query = $this->db->get();
		// echo $this->db->last_query(); exit; 
		return $query->result_array();
	}



	public function setBlogs()
	{
		$this->load->helper('url');

		//$seoUri = url_title($this->input->post('adminName'), 'dash', TRUE);
		$createdDate = date('Y-m-d H:i:s');
		$status = 1;
		$data = array(
			'title' => $this->input->post('title'),
			'description'    => $this->input->post('description'),
			'category'    => $this->input->post('category')
		);
		$this->db->insert('axblogs', $data);
		// $this->blogId = $this->db->insert_id();
		// $blogId = $this->blogId;
		$this->id  = $this->db->insert_id();
		$id = $this->id;
		
		if ($_FILES["blogImgUrl"]['name'] <> '') {
			// echo "fjhdg";exit;
			$this->blogs_model->uploadImage($id);
		}
		return $id;
	}


	public function uploadImage($blogId)
	{
		// echo $blogId;exit;
		$config['upload_path']   = AXUPLOADBLOGPATH;
		$config['allowed_types'] = 'jpg|png|jpeg';
		//$config['max_size']      = 100; 
		$config['overwrite'] 	  = TRUE;
		$config['max_width']     = 1300;
		$config['max_height']    = 800;
		$filename 		= $_FILES["blogImgUrl"]['name'];
		$type    		= substr(strrchr(trim($filename), "."), 1);
		$blogImgUrl	= $blogId . "." . $type;
		$config['file_name'] = $blogImgUrl;
		// print_r($config);exit;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('blogImgUrl')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', $error['error']);
			return $error;
		} else {
		// echo $blogImgUrl;exit;

			$data1 = array('upload_data' => $this->upload->data());
			$data = array(
				'blogImgUrl' => $blogImgUrl
			);
			print_r($data);
			$this->db->set($data);
			$this->db->where("blogId", $blogId);
			$this->db->update("axblogs", $data);
			return $blogId;
		}
	}


	public function validateImage()
	{
		if ($_FILES["profileImgUrl"]['name'] <> '') {

			$config['upload_path']   = AXUPLOADPATIENTSPATH;
			$config['allowed_types'] = 'jpg|png|jpeg';
			//$config['max_size']      = 100; 
			$config['overwrite'] 	  = TRUE;
			$config['max_width']     = 1300;
			$config['max_height']    = 800;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('profileImgUrl')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $error['error']);
				return 0;
			} else {
				unlink(AXUPLOADPATIENTSPATH . $_FILES["profileImgUrl"]['name']);
				return 1;
			}
		} else {
			return 1;
		}
	}













	public function getBlog_id($id = FALSE)
	{
		if ($id === FALSE) {
			return 0;
		}
		$query = $this->db->get_where('axblogs', array('blogId' => $id));
		return $query->row_array();
	}

	public function updateBlog($id)
	{
		$this->load->helper('url');
		$data = array(
			'description' => $this->input->post('description'),
			'title'    => $this->input->post('title'),
			'category'    => $this->input->post('category'),
		);
		$this->db->set($data);
		$this->db->where("blogId", $id);
		$this->db->update("axblogs", $data);
		$this->id = $id;
		if ($_FILES["blogImgUrl"]['name'] <> '') {
			// echo "fjhdg";exit;
			$this->blogs_model->uploadImage($id);
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

	public function delete_blog($ids)
	{
		$imageId=explode(',',$ids);
		$this->db->select('blogImgUrl');
		$this->db->from('axblogs');
		$this->db->where_in('blogId',$imageId);
		$query=$this->db->get();
		$result=$query->result_array();
		
		if(count($result))
		{
			foreach($result as $res)
			{
				unlink(FCPATH.AXUPLOADBLOGPATH.$res['blogImgUrl']);
				}
			}
			 if ($this->db->delete("axblogs", "blogId IN ( ".$ids.")")) {
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

	public function validateVideos()
	{
		$this->db->select('*');
		$this->db->from('axvideos');
		if ($this->id != "")
			$this->db->where('id  != ', $this->id);
		if (trim($this->videoId) != "")
			$this->db->where('id', $this->videoId);
		$query 	= $this->db->get();
		//echo $this->db->last_query();exit;
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
}
