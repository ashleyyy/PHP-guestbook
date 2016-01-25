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

    $config = array();
    $config['base_url'] = 'http://localhost:8000/entries/index';
    $config['per_page'] = 10;    
    $config['uri_segment'] = 3;
    // $config['use_page_numbers'] = TRUE;
    // $config['page_query_string'] = TRUE;
    $config['reuse_query_string'] = FALSE;
    $config['use_global_url_suffix'] = FALSE;
    $config['total_rows'] = $this->entry_model->record_count();

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['links'] = $this->pagination->create_links();

    $data['entries'] = $this->entry_model->get_entries($config['per_page'], $page);
    $data['title'] = 'Guestbook';

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
      redirect('entries/'.$id);
    }
  } 

  public function delete($id = NULL)
  {
    $this->load->helper('form');

    $data['title'] = 'View Entry';

    $this->entry_model->delete_entry($id);
    $data['message'] = "Entry Successfully Deleted";
    redirect('entries/', $data);
    
  } 

}