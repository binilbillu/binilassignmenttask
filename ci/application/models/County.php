<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class County extends MY_Model {

    public $_table = 'ck_county';
    public $protected_attributes = array('stateid');
    public $primary_key='stateid';

  

}

?>
