cla<?php
class vnpay_php extends controller
{
  public function __construct()
  {
    $data = array();
    parent::__construct();
  }
  public function index()
  {
    session::init();
  }
}
