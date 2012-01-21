<?php

/**
 * Description of Job Boards
 *
 * @package     Model
 * @author      Eftakhairul Islam <eftakhairul@gmail.com>
 * @website     http://eftakhairul.com
 * @copyright   Copyright (c) 2011 Eftakhairul Islam
 */

class JobBoards extends MY_Model
{
    public function  __construct ()
    {
        parent::__construct();
        $this->loadTable('job_boards', 'job_board_id');
    }

    public function countAll()
    {
        return $this->db->count_all("{$this->table}");
    }

    public function processApplication($jobsId = null, $applicantId = null)
    {
        if(empty($jobsId) OR empty($applicantId)) {
            return false;
        }

        $application = array(
            'applicant_id' => $applicantId,
            'job_id'       => $jobsId,
            'create_date'  => date('Y-m-d')
        );

        return $this->insert($application);
    }

    public function countAllApplicants($employerId = null)
    {
        if(empty($employerId)) {
            return false;
        }

        $sql = "SELECT COUNT(job_board_id) AS total
                FROM  `job_boards`
                WHERE `job_id` in ( SELECT `job_id`
                                           FROM `jobs`
                                            WHERE `user_id` = {$employerId} )";

        $result = $this->db->query($sql)->row_array();

        if(empty($result)) {
            return 0;
        }

        return $result['total'];
    }

    public function getAllApplications($offset=0, $employerId = null)
    {
        if(empty($employerId)) {
                return false;
            }

        $limit = $this->config->item('rowsPerPage');

        $this->db->select("`applicants`.*, {$this->table}.`create_date` AS application_date");
        $this->db->from($this->table);
        $this->db->join("applicants", "applicants.user_id = {$this->table}.applicant_id");
        $this->db->join("jobs", "jobs.job_id = {$this->table}.job_id");
        $this->db->where("jobs.user_id = {$employerId}");
        $this->db->limit($limit, $offset);
        $result = $this->db->get()->result_array();

        if(empty($result)) {
            return false;
        }

        return $result;
    }

    public function countAllAppliedJobs($applicantId = null)
    {
        if(empty($applicantId)) {
            return false;
        }

        $sql = "SELECT COUNT(job_board_id) AS total
                FROM  `job_boards`
                WHERE `applicant_id` = '{$applicantId}'";

        $result = $this->db->query($sql)->row_array();

        if(empty($result)) {
            return 0;
        }

        return $result['total'];
    }

    public function getAllAppliedJobs($offset=0, $applicantId = null)
    {
        if(empty($applicantId)) {
                return false;
            }

        $limit = $this->config->item('rowsPerPage');

        $sql = "SELECT `jobs`.*, {$this->table}.`create_date` AS application_date
                FROM  {$this->table}
                Join `jobs` ON `jobs`.`job_id` = {$this->table}.`job_id`
                WHERE `applicant_id` = '{$applicantId}'
                LIMIT $offset, {$limit}";

        $result =  $this->db->query($sql)->result_array();

        if(empty($result)) {
            return false;
        }

        return $result;
    }
}