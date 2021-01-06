<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Country extends MY_Model {

    public $_table = 'ck_countries';
    public $protected_attributes = array('countryid');
    public $primary_key='countryid';

  

}

?>
