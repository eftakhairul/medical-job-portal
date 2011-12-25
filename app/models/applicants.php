<?php

/**
 * Description of Applicants
 *
 * @package     Model
 * @author      Eftakhairul Islam <eftakhairul@gmail.com>
 * @website     http://eftakhairul.com
 * @copyright   Copyright (c) 2011 Eftakhairul Islam
 */

class Applicants extends MY_Model
{
    public function  __construct ()
    {
        parent::__construct();
        $this->loadTable('applicants', 'user_id');
    }

    public function save(array $data)
    {
        if(empty($data)) {
            return false;
        }

        $CI = get_instance();
        $CI->load->model('users');

        $user = array(
          'username' =>  $data['username'],
          'types'    => APPLICANT
        );

        $data['user_id'] = $CI->users->save($user);
        $this->insert($data);
        return $data['user_id'];
    }

    public function getDetailsByApplicantId($applicantId = null)
    {
        if(empty($applicantId)) {
            return false;
        }

        return $this->find("{$this->table}.{$this->primaryKey} = {$applicantId}");
    }

    public function countAll()
    {
        return $this->db->count_all("{$this->table}");
    }

    public function modify(array $data, $applicantId)
    {
        if(empty($data) OR empty($applicantId)){
            return false;
        }

        return $this->update($data, $applicantId);
    }
}