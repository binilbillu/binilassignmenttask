<?php
class Filedata extends My_model
{
    protected $table = "filedata";

    public function totalrows(){
   
       
        $querydata = $this->input->get('search');
        
        
        $this->db->select('*');
        $this->db->from('filedata');  
     
        if($this->input->get('search')!="") { 
            $sq = $this->db->escape('[[:<:]]'.strtolower($querydata).'[[:>:]]');
     
        $this->db->where('LOWER(filerealname) REGEXP ', $sq, false); 
    }
    
        $query = $this->db->get();
       return $query->num_rows();

   

    }

    public function fetch_filedata($limit, $start) {
        
        

        $querydata = $this->input->get('search');
        $this->db->select('*');
        $this->db->from('filedata');  
        if($this->input->get('search')!="") { 
            $sq = $this->db->escape('[[:<:]]'.strtolower($querydata).'[[:>:]]');
            $this->db->where('LOWER(filerealname) REGEXP ', $sq, false); 
      
    }
        $this->db->limit($limit, $start);
        $query = $this->db->get();



        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}

?>