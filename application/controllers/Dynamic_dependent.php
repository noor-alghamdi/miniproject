<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dynamic_dependent extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('dynamic_dependent_model');
 }

 function index()
 {
  $data['ecommerce'] = $this->dynamic_dependent_model->fetch_ecommerce();
  $this->load->view('dynamic_dependent', $data);
 }

 function fetch_category()
 {
  if($this->input->post('ecommerce_id'))
  {
   echo $this->dynamic_dependent_model->fetch_category($this->input->post('ecommerce_id'));
  }
 }

 function fetch_item()
 {
  if($this->input->post('category_id'))
  {
   echo $this->dynamic_dependent_model->fetch_item($this->input->post('category_id'));
  }
 }
  
}
?>