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
}