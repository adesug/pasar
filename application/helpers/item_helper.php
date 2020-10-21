<?php 
    function check_item($id,$isAvailable)
    {
        $ci = get_instance();
        $ci->db->where('id', $id);
        $ci->db->where('isAvailable', $isAvailable);
        $result = $ci->db->get('item');
        if($result->num_rows() > 0){
            return "checked='checked'";
        }
    }
