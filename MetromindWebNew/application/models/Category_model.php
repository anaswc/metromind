<?php

class  Category_model extends CI_Model
{

    public function __construct()
    {

        $this->catId            =    "";
        $this->title            =    "";
        $this->status           =    "";
        $this->sortColumn       =    '';
        $this->sortDirection    =    '';
        $this->load->database();
        $this->load->library('upload');
        $this->setPostGetVars();
    }
    public function setPostGetVars()
    {
        $this->videoId              = $this->input->post_get('catId');
        $this->title                = trim($this->input->post_get('title'));
        $this->status               = trim($this->input->post_get('status'));
        $this->sortColumn           = $this->input->post_get('sortColumn');
        $this->sortDirection        = $this->input->post_get('sortDirection');
    }

    /**get categories count */
    public function get_count()
    {
        if ($this->catId != "")
            $this->db->where('catId', $this->catId);
        if (trim($this->title) != "")
            $this->db->like('title', $this->title);
        $this->db->from("axcategories");
        // echo $this->db->count_all_results();exit;
        return $this->db->count_all_results();
    }
    /**get categories */
    public function getCategories($limit = NULL, $start = NULL)
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('axcategories');
        if ($this->catId            != "")
            $this->db->where('catId', $this->catId);
        if (trim($this->title)      != "")
            $this->db->like('title ', $this->title);
        if ($this->sortColumn       == '')
            $this->sortColumn       = "catId";
        if ($this->sortDirection    == '')
            $this->sortDirection    = "ASC";
        $this->db->order_by("$this->sortColumn", "$this->sortDirection");
        $query = $this->db->get();
        return $query->result_array();
    }

    /**validate title */
    public function validateTitle()
    {
        $this->db->select('*');
        $this->db->from('axcategories');
        if ($this->id != "")
            $this->db->where('id  != ', $this->id);
        if ($this->title != "")
            $this->db->where('title', $this->title);
        $query     = $this->db->get();
        if ($query->num_rows() > 0) {
            return 0;
        }
        return 1;
    }
    /**store categories */
    public function setCategory()
    {
        // echo "hfgd";exit;
        $this->load->helper('url');
        $data = array(
            'title' => $this->input->post('title')
        );
        $this->db->insert('axcategories', $data);
        $this->id   = $this->db->insert_id();
        $id         = $this->id;
        return $id;
    }
    public function getCategory_id($catId = FALSE)
    {
        if ($catId === FALSE) {
            return 0;
        }
        $query = $this->db->get_where('axcategories', array('catId' => $catId));
        return $query->row_array();
    }
    /**update */
    public function updateCategory($catId)
    {
        $this->load->helper('url');
        $data = array(
            'title'    => $this->input->post('title')
        );
        $this->db->set($data);
        $this->db->where("catId", $catId);
        $this->db->update("axcategories", $data);
        $this->catId = $catId;
        return $catId;
    }
    public function delete_category($ids)
    {
        if ($this->db->delete("axcategories", "catId IN ( " . $ids . ")")) {
            return true;
        }
    }
}
