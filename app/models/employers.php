<?php
/**
 * Description of Employers
 *
 * @package     Model
 * @author      Eftakhairul Islam <eftakhairul@gmail.com>
 * @website     http://eftakhairul.com
 * @copyright   Copyright (c) 2011 Eftakhairul Islam
 */

class Employers extends MY_Model
{
    public function  __construct ()
    {
        parent::__construct();
        $this->loadTable('employers', 'user_id');
    }

    public function save(array $data)
    {
        if(empty($data)) {
            return false;
        }

        $CI = get_instance();
        $CI->load->model('users');

        $user = array(
          'username'    => $data['username'],
          'types'       => EMPLOYER
        );

        $data['user_id'] = $CI->users->save($user);
        $this->insert($data);
        return $data['user_id'];
    }

    public function getDetailsByEmployerId($employerId = null)
    {
        if(empty($employerId)) {
            return false;
        }

        return $this->find("{$this->table}.{$this->primaryKey} = {$employerId}");
    }

    public function countAll()
    {
        return $this->db->count_all("{$this->table}");
    }

    public function modify(array $data, $employerId)
    {
        if(empty($data) OR empty($employerId)){
            return false;
        }

        return $this->update($data, $employerId);
    }
}