<?php

class MY_Controller extends CI_Controller
{
    public $title = '';

    public function __construct()
    {
        $flg = 0;
        parent::__construct();
        $controller = $this->router->class;
        $method = $this->router->method;

        // $this->folderpath = trim($this->session->userdata('folderpath'),'./');

        date_default_timezone_set('Europe/Dublin');
        $pages = array(
            array('c' => 'welcome', 'm' => 'index'),
            array('c' => 'website', 'm' => 'contactus'),
            array('c' => 'welcome', 'm' => 'signinauthentication'),

        );

        foreach ($pages as $page) {

            if ($controller == $page['c'] && $method == $page['m']) {
                $flg = 1;

                break;

            } else {

                $flg = 0;

            }
        }
        if ($flg == 0) {

        }

    }

    public function render($content, $view = 'signindashboard/basic_view')
    {

        $data['content'] = &$content;

        $this->load->view("$view", $data);

    }

    public function dashboardrender($content, $view = 'userdashboard/base_view')
    {

        $data['content'] = &$content;

        $this->load->view("$view", $data);

    }

}
