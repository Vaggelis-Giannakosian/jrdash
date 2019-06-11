<?php


class user_model extends CI_Model
{
    /**
     * @param null $userId
     * @return mixed
     * Single $this->>user_model->get(id);
     * all: $this->>user_model->get();
     */
    public function get($userId = null)
    {
        if($userId === null)
        {
            $query = $this->db->get('user');

        }else{
            $query = $this->db->get_where('user', array('user_id' => $userId));
        }
        return $query->result();
    }


    public function insertUser($user){

        $this->db->insert('user',$user);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function updateUser($id,$user){
        $this->db->where('user_id', $id);
        $result = $this->db->update('user',$user);
        if (!$result)
        {
            return 'there was an error';
        }
        else if (!$this->db->affected_rows())
        {
            return 'no error, but nothing changed';
        }
        else
        {
           return 'record changed';
        }

    }

    public function deleteUser($id){

       $result =  $this->db->delete('user',['user_id' => $id]);
       return $this->db->affected_rows();

    }


}