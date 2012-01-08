<?php

/**
 * Description of Jobs
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

    public function countAllByJobsCategory()
    {
        $condition = "";

        if(!$this->session->userdata('category')) {
            $condition = "{$this->table}.types = {$this->session->userdata('category')}";
        }

        return $this->findCount($condition);
    }

    public function countAllByApplicantId($applicantId = null)
    {
        if(empty($applicantId)) {
            return false;
        }

        $sql = "SELECT COUNT(job_id) AS total
                FROM  `jobs`
                WHERE `job_id` not in (SELECT `job_id`
                                           FROM `job_boards`
                                            WHERE `applicant_id` = {$applicantId})";

        $result = $this->db->query($sql)->row_array();

        if(empty($result)) {
            return 0;
        }

        return $result['total'];
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

    public function getAllByJobsCategory($offset = 0)
    {
        $condition = "";
        $limit = $this->config->item('rowsPerPage');

        if(!$this->session->userdata('category')) {
            $condition = "{$this->table}.types = {$this->session->userdata('category')}";
        }

        return $this->findAll($condition, '*', null, $offset, $limit);
    }

    public function getAllByApplicantId($offset = 0, $applicantId = null)
    {
        if(empty($applicantId)) {
            return false;
        }

        $limit = $this->config->item('rowsPerPage');

        $sql = "SELECT *
                FROM  `jobs`
                WHERE `job_id` not in (SELECT `job_id`
                                           FROM `job_boards`
                                            WHERE `applicant_id` = {$applicantId})
                LIMIT $offset , {$limit}";

        $result =  $this->db->query($sql)->result_array();

        if(empty($result)) {
            return false;
        }

        return $result;
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