<?php
class Blogs extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('adminId'))
			redirect('admin/login');
		$this->load->model('blogs_model');
		$this->load->model('category_model');
		$this->load->helper('url_helper');
		$this->load->library('pagination');
		$this->load->helper('date');
		$this->load->library("pagination");
		$this->pageSize = 50;
		if ($this->input->post_get('pageSize')) $this->pageSize = $this->input->post_get('pageSize');
		if ($this->input->post_get('returnUrl')) $this->returnUrl = $this->input->post_get('returnUrl');
		if ($this->input->post_get('returnUrl') <> '') {
			$this->returnUrl = $this->input->post_get('returnUrl');
		} else {
			$this->returnUrl = base_url('admin/blogs/');
		}
	}
	public function index()
	{
		global $arrPageRange, $arrStatusList;
		$data["pageRange"]						= 	HTMLOptionKeyValArray($this->config->item('arrPageRange'), $this->pageSize);
		$config["base_url"] 					= 	base_url() . "admin/blogs/";
		$config["total_rows"] 					= 	$this->blogs_model->get_count();
		$config["per_page"]   					= 	$this->pageSize;
		$config["uri_segment"] 					= 	4;
		$config['enable_query_strings'] 		= 	TRUE;
		$config['use_page_numbers'] 			= 	TRUE;
		$config['query_string_segment'] 		= 	'page';
		$config['page_query_string'] 			= 	TRUE;
		$this->pagination->initialize($config);
		$start									= 	1;
		$data["links"] 							= 	$this->pagination->create_links();
		$limit 									= 	$config["per_page"];
		if ($this->input->get('page')) {
			$start 								= 	(int) trim($this->input->get('page'));
			$limit 								= 	$config['per_page'];
		}
		if ($start <> 1)
			$data["cnt"]	 					= 	$limit * ($start - 1) + 1;
		else
			$data["cnt"] 						= 	$start;
		$data['blogs'] 						= 	$this->blogs_model->getBlogs($limit, $limit * ($start - 1)); //echo "<pre>";print_r($data['adminuser']);echo "</pre>";exit;
		$data['title'] 							= 	'Videos LIST';
		if ($this->input->post_get('category') <> '') {
			$data['category'] 					= 	$this->input->post_get('category');
		} else {
			$data['category'] 					= '';
		}	
		$data['extraParameters']				= "";
		$data['extraParameters']	.= "pageSize=$this->pageSize&submitted=1";
		$this->load->view('admin/blogs/index', $data);
	}





	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['categories'] = $this->category_model->getCategories();
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('author', 'author', 'required');
		$this->form_validation->set_rules('category', 'category', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/blogs/create', $data);
		} else {
			$this->blogs_model->setBlogs();
			$this->session->set_flashdata('success', 'Blogs added Successfully');
			redirect(base_url('admin/blogs'));
		}
	}

	public function update($id = NULL)
	{
		// global $arrAdminType;

		$this->load->helper('form');
		$this->load->library('form_validation');

		if ($id == NULL) {
			$id = $this->input->post('id');
		}
		// echo $id;exit;
		$data['categories'] = $this->category_model->getCategories();
		// $data['categories'] 	= $this->videos_model->getCategories();
		$data['blogs_item'] 	= $this->blogs_model->getBlog_id($id);
		$data['title'] = 'update a Admin item';
		
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('category', 'category', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/blogs/update', $data);
		} else {
			// echo $this->returnUrl;exit;
			$this->blogs_model->updateBlog($id);
			$this->session->set_flashdata('success', 'Blog updated Successfully');
			if($this->returnUrl <> '')
					redirect(base_url().'admin/'.$this->returnUrl); 
			// if ($this->returnUrl <> '') {
			// 	redirect(base_url() . 'admin/' . $this->returnUrl);
			// } 
			// else {
			// 	redirect(base_url() . 'admin/blogs');
			// }
		}
	}


	public function delete($ids = NULL)
	{
		if ($ids == NULL) {
			$ids = $this->input->post('ids');
		}

		if ($ids === FALSE) {
			redirect(base_url('admin/blogs'));
		} else {
			$this->blogs_model->delete_blog($ids);
			$this->session->set_flashdata('success', 'Blog deleted Successfully');
			redirect(base_url('admin/blogs'));
		}
	}

	//status live
	public function activate($ids = NULL)
	{
		if ($ids == NULL) {
			$ids = $this->input->post('ids');
			$ids = explode(",", $ids);
		}

		if ($ids === FALSE) {
			redirect(base_url('admin/videos'));
		} else {
			$this->videos_model->activate_Video($ids);
			$this->session->set_flashdata('success', 'Video activated Successfully');
			redirect(base_url('admin/videos'));
		}
	}


	//status Expired
	public function deactivate($ids = NULL)
	{
		if ($ids == NULL) {
			$ids = $this->input->post('ids');
			$ids = explode(",", $ids);
		}

		if ($ids === FALSE) {
			redirect(base_url('admin/videos'));
		} else {
			$this->videos_model->deactivate_Video($ids);
			$this->session->set_flashdata('success', 'Video deactivated Successfully');
			redirect(base_url('admin/videos'));
		}
	}

	//status Cancelled
	public function cancelled($adminIds = NULL)
	{
		if ($adminIds == NULL) {
			$adminIds = $this->input->post('adminIds');
			$adminIds = explode(",", $adminIds);
		}

		if ($adminIds === FALSE) {
			redirect(base_url('admin/videos'));
		} else {
			$this->adminuser_model->cancelled_Admin($adminIds);
			$this->session->set_flashdata('success', 'Admin cancelled Successfully');
			if ($this->input->get('returnUrl') <> '')
				redirect(base_url('admin/videos' . $this->input->get('returnUrl')));
			else {
				redirect(base_url('admin/videos'));
			}
		}
	}

	public function checkVideoId()
	{
		$this->videos_model->videoId = $this->input->post_get('videoId');


		$data = $this->videos_model->validateVideos($this->videos_model->videoId);
		echo json_encode($data);
	}
}
