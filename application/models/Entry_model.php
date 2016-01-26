<?php
class Entry_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function get_entries($limit, $start)
  {
      $this->db->order_by("t", "desc");
      $this->db->limit($limit, $start);
      $query = $this->db->get('entries');
      $result = $query->result_array();
      return $result;
  }

  public function get_entry($id) {
    $query = $this->db->get_where('entries', array('id' => $id));
    return $query->row_array();;
  }

  public function set_entry()
  {
    $data = array(
      'user' => $this->input->post('user'),
      'email' => $this->input->post('email'),
      'comments' => $this->input->post('comments')
    );

    return $this->db->insert('entries', $data);
  }

  public function delete_entry($id)
  {
    return $this->db->delete('entries', array('id' => $id));
  }
}