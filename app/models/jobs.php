<?php

/**
 * Description of Users
 *
 * @package     Model
 * @author      Eftakhairul Islam <eftakhairul@gmail.com> http://eftakhairul.com
 */

class Jobs extends MY_Model
{
    public function  __construct ()
    {
        parent::__construct();
        $this->loadTable('jobs', 'job_id');
    }

    public function save(array $data)
    {
        if(empty($data)) {
            return false;
        }

        $data['job_type'] = 1;
        $data['user_id'] = $this->session->userdata('user_id');
        $data['create_date'] = date('Y-m-d');
        $this->insert($data);

        return $data['user_id'];

    }

    public function validateUser($data)
    {
        $data = $this->removeNonAttributeFields($data);
        $data['password'] = md5($data['password']);
        return $this->find($data, 'username, user_id');
    }
    

    public function getAll($offset = 0)
    {
        $limit = $this->config->item('rowsPerPage');
        $this->db->select();
        $this->db->from($this->table);
        $this->db->join('profiles', "profiles.{$this->primaryKey}={$this->table}.{$this->primaryKey}");
        $this->db->join('user_types', "user_types.user_type_id={$this->table}.user_type_id");
        $this->db->limit($limit, $offset);

        return $this->db->get()->result_array();
    }

    public function countAllUsers()
    {
        return $this->db->count_all("{$this->table}");
    }

    public function getDetail($userId)
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->join('profiles', "profiles.{$this->primaryKey}={$this->table}.{$this->primaryKey}");
        $this->db->join('user_types', "user_types.user_type_id={$this->table}.user_type_id");
        $this->db->where("{$this->table}.{$this->primaryKey}", $userId);

        return $this->db->get()->row_array();
    }

    public function checkUsernameExisted($username)
    {
        $result = $this->find(array('username' => $username), $this->primaryKey);
        return $result;
    }

    public function previousPasswordExisted($previous_password)
    {
        $previous_password = md5($previous_password);
        $result = $this->find(array('password' => $previous_password), $this->primaryKey);
        
        return $result;
    }

    public function modify(array $data)
    {
        if(!empty($data['password'])){
            $data['password'] = md5($data['password']);
        }

        return $this->update($data, $data['user_id']);
    }

    public function getUserTypes()
    {
        $this->db->select('*');
        $this->db->from('user_types');
        return $this->db->get()->result_array();
    }
}