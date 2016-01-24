<?php
class Entries extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('entry_model');
    $this->load->helper('url_helper');
  }

  public function index()
  {
    $data['entries'] = $this->entry_model->get_entries();
    $data['title'] = 'Guestbook';

    $this->load->view('templates/header', $data);
    $this->load->view('entries/index', $data);
    $this->load->view('templates/footer');
  }

  public function view($id = NULL)
  {
    $data['entry'] = $this->entry_model->get_entries($id);

    if (empty($data['entry']))
    {
      show_404();
    }

    $data['title'] = $data['entry']['user']."'s comments";

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
      $this->news_model->set_entries();
      //redirect?
      $this->load->view('entries/index');
    }
  } 

}