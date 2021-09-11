<?php
class Dynamic_dependent_model extends CI_Model
{
 function fetch_ecommerce()
 {
  $this->db->order_by("ecommerce_name", "ASC");
  $query = $this->db->get("ecommerce");
  return $query->result();
 }

 function fetch_category($ecommerce_id)
 {
  $this->db->where('ecommerce_id', $ecommerce_id);
  $this->db->order_by('category_name', 'ASC');
  $query = $this->db->get('category');
  $output = '<option value="">Select category</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->category_id.'">'.$row->category_name.'</option>';
  }
  return $output;
 }

 function fetch_item($category_id)
 {
  $this->db->where('category_id', $category_id);
  $this->db->order_by('item_name', 'ASC');
  $query = $this->db->get('item');
  $output = '<option value="">Select item</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->item_id.'">'.$row->item_name.'</option>';
  }
  return $output;
 }
}

?>
