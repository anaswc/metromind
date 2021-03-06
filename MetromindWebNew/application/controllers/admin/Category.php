<?php
class Category extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('adminId'))
			redirect('admin/login');
		$this->load->model('category_model');
		$this->load->model('blogs_model');
		$this->load->model('videos_model');

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
			$this->returnUrl = base_url('admin/category/');
		}
	}
	public function index()
	{
		// global $arrPageRange,$arrStatusList,$arrAdminType;
		$data["pageRange"]	= 	HTMLOptionKeyValArray($this->config->item('arrPageRange'), $this->pageSize);
		$config["base_url"] = base_url() . "admin/category/";
		$config["total_rows"] = $this->category_model->get_count();
		$config["per_page"]   = $this->pageSize;
		$config["uri_segment"] = 4;
		$config['enable_query_strings'] = TRUE;
		$config['use_page_numbers'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['page_query_string'] = TRUE;
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
		$data['categories'] = $this->category_model->getCategories($limit, $limit * ($start - 1)); //echo "<pre>";print_r($data['adminuser']);echo "</pre>";exit;
		$data['title'] = 'Category LIST';
		if ($this->input->post_get('title') <> '') {
			$data['title'] = $this->input->post_get('title');
		} else {
			$data['title'] = '';
		}
		$data['extraParameters']	= "";
		$data['extraParameters']	.= "pageSize=$this->pageSize&submitted=1";
		$this->load->view('admin/category/index', $data);
	}

	/**create category */
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'status', 'required');
		if ($this->form_validation->run() === FALSE) {
			// echo $this->form_validation->run();exit;

			$this->load->view('admin/category/create');
		} else {
			$id  = $this->category_model->setCategory();
			$this->session->set_flashdata('success', 'Category added Successfully');
			redirect(base_url('admin/category'));
		}
	}

	public function update($id = NULL)
	{
		// echo $id;
		$this->load->helper('form');
		$this->load->library('form_validation');
		if ($id == NULL) {
			$id = $this->input->post('id');
		}
		$data['category_item'] = $this->category_model->getCategory_id($id);
		$data['title'] = 'update category item';
		$this->form_validation->set_rules('title', 'id', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/category/update', $data);
		} else {
			// echo $this->returnUrl;

			$this->category_model->updateCategory($id);
			$this->session->set_flashdata('success', 'category updated Successfully');
			// exit;
			if ($this->returnUrl <> '') {
				redirect(base_url() . 'admin/' . $this->returnUrl);
			} else {
				redirect(base_url() . 'admin/category');
			}
		}
	}
	public function checkTitle()
	{
		$this->category_model->title = $this->input->post_get('title');
		$data = $this->category_model->validateTitle($this->category_model->title);
		echo json_encode($data);
	}

	public function delete($ids = NULL)
	{
		// $appointmentId=$this->input->post_get('ids');

		if ($ids == NULL) {
			$ids = $this->input->post_get('ids');
		}

		if ($ids === FALSE) {
			redirect(base_url('admin/category'));
		} else {
			$blog = $this->blogs_model->blog_count($ids);
			// $result['data']=$blog;
			$video_count = $this->videos_model->video_count($ids);
			$datas = [];
			$datas = array_merge($blog, $video_count);
			if (empty($datas)) {
				$this->category_model->delete_category($ids);
				$result = json_encode(array(
					'data' => [],
					'status' => 0,
				));
			} else {
				$result = json_encode(array(
					'data' => $datas,
					'status' => 1,
				));
			}
			echo $result;
		}
	}
	public function category_delete($ids = NULL)
	{
		// $appointmentId=$this->input->post_get('ids');
		if ($ids == NULL) {
			$ids = $this->input->post_get('ids');
		}
		if ($ids === FALSE) {
			redirect(base_url('admin/category'));
		} else {
			$this->blogs_model->blog_category_delete($ids);
			$this->videos_model->video_category_delete($ids);
			$cat = $this->category_model->delete_category($ids);

			echo json_encode($cat);
		}
	}
}
