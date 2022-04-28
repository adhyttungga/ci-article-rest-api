<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Articles extends RestController
{
  function __construct($config = 'rest')
  {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() 
  {
    $id = $this->get('id');
    if ($id == '') {
      $article = $this->db->get('posts')->result();
    } else {
      $this->db->where('id', $id);
      $article = $this->db->get('posts')->result();
    }
    $this->response($article, 200);
  }
}