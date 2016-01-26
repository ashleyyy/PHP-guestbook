<?php
class Entries extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('entry_model');
    $this->load->helper('url_helper');
    $this->load->helper("url");
  }

  public function index()
  {
    $this->load->helper('form');
    $this->load->library('pagination');

    $config = array(
          'base_url' => 'http://localhost:8000/entries/index',
          'per_page' => 5,    
          'uri_segment' => 3,
          'total_rows' => $this->db->count_all('entries'),
          'display_pages' => FALSE,
          'next_link' => '| previous 5',
          'prev_link' => 'next 5 |',
          'attributes' => array('class' => 'pages')
        );

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['links'] = $this->pagination->create_links();

    $data['entries'] = $this->entry_model->get_entries($config['per_page'], $page);
    $data['title'] = 'Read the Guestbook';

    $this->load->view('templates/header', $data);
    $this->load->view('entries/create', $data);
    $this->load->view('entries/index', $data);
    $this->load->view('templates/footer');
  }

  public function view($id = NULL)
  {
    $this->load->helper('form');
    $data['entry'] = $this->entry_model->get_entry($id);

    if (empty($data['entry']))
    {
      show_404();
    }

    $data['title'] = $data['entry']['user'];

    $this->load->view('templates/header', $data);
    $this->load->view('entries/view', $data);
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Sign the Guestbook';

    $this->form_validation->set_rules('user', 'User Name', 'required');
    $this->form_validation->set_rules('email', 'Email Address', 'required');
    $this->form_validation->set_rules('empty', 'Empty', 'callback_empty_check');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('templates/header', $data);
      $this->load->view('entries/create');
      $this->load->view('templates/footer');
    }
    else
    {
      $this->entry_model->set_entry();
      //TODO: get $id back from new object
      redirect('entries/', $data);
    }
  } 

  public function empty_check($str)
  //if the hidden field has something in it, the form won't validate
  {
    if ($str != null)
    {
      return FALSE;
    }
    else
    {
      return TRUE;
    }
  }

  public function delete($id = NULL)
  {
    $this->load->helper('form');

    $data['title'] = 'View Entry';

    $this->entry_model->delete_entry($id);
    //TODO: success flash (needs sessions to work)
    redirect($this->input->post('redirect'));
  } 

}