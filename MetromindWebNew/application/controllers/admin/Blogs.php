<?php
class Blogs extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('adminId'))
			redirect('admin/login');
		$this->load->model('blogs_model');
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
		$data["pageRange"]							= 	HTMLOptionKeyValArray($this->config->item('arrPageRange'), $this->pageSize);
		$config["base_url"] 						= base_url() . "admin/blogs/";
		$config["total_rows"] 					= $this->blogs_model->get_count();
		$config["per_page"]   					= $this->pageSize;
		$config["uri_segment"] 					= 4;
		$config['enable_query_strings'] = TRUE;
		$config['use_page_numbers'] 		= TRUE;
		$config['query_string_segment'] = 'page';
		$config['page_query_string'] 		= TRUE;
		$this->pagination->initialize($config);
		$start = 1;

		$data["links"] = $this->pagination->create_links();

		$limit = $config["per_page"];

		if ($this->input->get('page')) {
			$start = (int) trim($this->input->get('page'));
			$limit = $config['per_page'];
		}

		if ($start <> 1)
			$data["cnt"] = $limit * ($start - 1) + 1;
		else
			$data["cnt"] = $start;


		$data['videos'] = $this->videos_model->getVideos($limit, $limit * ($start - 1)); //echo "<pre>";print_r($data['adminuser']);echo "</pre>";exit;
		$data['title'] = 'Videos LIST';
		if ($this->input->post_get('videoId') <> '') {
			$data['videoId'] = $this->input->post_get('videoId');
		} else {
			$data['videoId'] = '';
		}

		// if ($this->input->post_get('adminType') <> ''){	

		// 				$data["adminTypeList"]	= 	HTMLOptionKeyValArray($arrAdminType,$this->input->post_get('adminType'));		

		// 			}else{				
		// 				$data["adminTypeList"]	= 	HTMLOptionKeyValArray($arrAdminType,'');			
		// 			}

		$data['extraParameters']	= "";

		// $data['extraParameters']	.="adminName=".$this->input->post_get('adminName')."&";

		$data['extraParameters']	.= "pageSize=$this->pageSize&submitted=1";





		$this->load->view('admin/videos/index', $data);
	}





	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['categories'] = $this->videos_model->getCategories();
		$this->form_validation->set_rules('title', 'videoId', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/videos/create', $data);
		} else {
			$this->videos_model->setVideos();
			$this->session->set_flashdata('success', 'Video added Successfully');
			redirect(base_url('admin/videos'));
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
		$data['categories'] 	= $this->videos_model->getCategories();
		$data['videos_item'] 	= $this->videos_model->getvideo_table_id($id);
		$data['title'] = 'update a Admin item';
		$this->form_validation->set_rules('videoId', 'title', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/videos/update', $data);
		} else {
			// echo $id;exit;
			$this->videos_model->updateVideo($id);
			$this->session->set_flashdata('success', 'videos updated Successfully');
			if ($this->returnUrl <> '') {
				redirect(base_url() . 'admin/' . $this->returnUrl);
			} else {
				redirect(base_url() . 'admin/videos');
			}
		}
	}


	public function delete($ids = NULL)
	{
		if ($ids == NULL) {
			$ids = $this->input->post('ids');
		}

		if ($ids === FALSE) {
			redirect(base_url('admin/videos'));
		} else {
			$this->videos_model->delete_video($ids);
			$this->session->set_flashdata('success', 'Admin user deleted Successfully');
			redirect(base_url('admin/videos'));
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
