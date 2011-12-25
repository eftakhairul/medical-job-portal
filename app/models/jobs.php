<?php

/**
 * Description of Users
 *
 * @package     Model
 * @author      Eftakhairul Islam <eftakhairul@gmail.com>
 * @website     http://eftakhairul.com
 * @copyright   Copyright (c) 2011 Eftakhairul Islam
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

        $data['create_date'] = date('Y-m-d');

        return $this->insert($data);
    }

    public function countAll($userId = null)
    {
        if(!empty($userId)) {
            return $this->findCount("{$this->table}.user_id = {$userId}");
        }

        return $this->db->count_all("{$this->table}");
    }

    public function getAll($offset = 0, $userId = null)
    {
        $limit = $this->config->item('rowsPerPage');

        if(empty($userId)) {
            return $this->findAll(null, '*', null, $offset, $limit);
        } else {
            return $this->findAll("user_id = {$userId}", '*', null, $offset, $limit);
        }
    }

    public function getDetailsByJobsId($jobsId = null)
    {
        if(empty($jobsId)) {
            return false;
        }

        return $this->find("{$this->table}.{$this->primaryKey} = {$jobsId}");
    }

    public function modify(array $data, $jobsId = null)
    {
        if(empty($data) OR empty($jobsId)){
            return false;
        }

        return $this->update($data, $jobsId);
    }

    public function delete($jobsId = null)
    {
        if(empty ($jobsId)) {
            return false;
        }

        $this->remove($jobsId);
        return true;
    }
}