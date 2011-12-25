<?php

/**
 * Description of Job Types
 *
 * @package     Model
 * @author      Eftakhairul Islam <eftakhairul@gmail.com>
 * @website     http://eftakhairul.com
 * @copyright   Copyright (c) 2011 Eftakhairul Islam
 */

class JobTypes extends MY_Model
{
    public function  __construct ()
    {
        parent::__construct();
        $this->loadTable('job_types', 'types');
    }

    public function getAll()
    {
        return $this->findAll();
    }

    public function save(array $data)
    {
        if(empty($data)) {
            return false;
        }

        return $this->insert($data);
    }
 }