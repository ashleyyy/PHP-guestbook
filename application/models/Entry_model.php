<?php
class Entry_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function get_entries($id = FALSE)
  {
    if ($id === FALSE)
    {
      $query = $this->db->get('entries');
      return $query->result_array();
    }

    $query = $this->db->get_where('entries', array('id' => $id));
    return $query->row_array();
  }

  public function set_news()
  {
    $data = array(
      'user' => $this->input->post('user'),
      'email' => $this->input->post('email'),
      'comments' => $this->input->post('comments')
    );

    return $this->db->insert('entries', $data);
  }
}