<?php 
/**
 * Description of Registration Controller
 *
 * @package     Controller
 * @author      Eftakhairul Islam <eftakhairul@gmail.com> http://eftakhairul.com
 */

include_once APPPATH . "controllers/BaseController.php";
class JobsController extends BaseController
{
    public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('jobs');
    }

    public function create()
    {

        $this->form_validation->setRulesForCreateJobs();

        if (!empty ($_POST)) {

            if ($this->form_validation->run()) {


                if($result = $this->jobs->save($_POST)) {

                    $this->redirectForSuccess('home/employerDeashboard', 'Job is successful');
                    } else {
                    $this->redirectForSuccess('jobs/create', 'Data is not saved');
                    }
                } else {
                    $this->data['error'] = 'Enter required information.';
                }
            }

        $this->layout->view('jobs/create', $this->data);
    }

        public function edit($Id)
        {
            $this->form_validation->setRulesForCreateSeason();

            if (!empty ($_POST)) {


                if ($this->form_validation->run()) {

                    if ($result  = $this->seasons->update($_POST, $Id)) {
                         $this->redirectForSuccess('season', 'Season has been updated successfully');
                    } else {
                        $this->data['error'] = 'Data is not save';
                    }


                } else {
                    $this->data['error'] = 'Enter required information.';

                    $this->data['season'] = $_POST;
                }

            } else {
               $this->data['season'] = $this->seasons->getAllBySeasionId($Id);
            }

            $this->layout->view('season/edit', $this->data);
        }
}