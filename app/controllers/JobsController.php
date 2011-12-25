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
        $userId;
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('jobs');
        $this->userId = $this->session->userdata('user_id');
    }

    public function index()
    {
        $this->processPagination();
        $this->layout->view('jobs/index', $this->data);
    }


    public function create()
    {
        $this->load->model('jobtypes');
        $this->form_validation->setRulesForCreateJobs();

        if (!empty ($_POST)) {

            if ($this->form_validation->run()) {

                $_POST['user_id'] = $this->userId;
                if($result = $this->jobs->save($_POST)) {

                    $this->redirectForSuccess('home/employerDeashboard', 'Job is successful');
                    } else {
                    $this->redirectForSuccess('jobs/create', 'Data is not saved');
                    }
                } else {
                    $this->data['error'] = 'Enter required information.';
                }
            }

        $this->data['jobTypes']  = $this->jobtypes->getAll();
        $this->layout->view('jobs/create', $this->data);
    }

    public function edit($jobsId)
    {
        $this->load->model('jobtypes');
        $this->form_validation->setRulesForCreateJobs();

        if (!empty ($_POST)) {

            if ($this->form_validation->run()) {

                if ($result  = $this->jobs->modify($_POST, $jobsId)) {
                     $this->redirectForSuccess('jobs', 'Jobs has been updated successfully');
                } else {
                    $this->data['error'] = 'Data is not save';
                }

            } else {
                $this->data['error'] = 'Enter required information.';
                $this->data['jobs'] = $_POST;
            }
        } else {
           $this->data['jobs'] = $this->jobs->getDetailsByJobsId($jobsId);
        }

        $this->data['jobTypes'] = $this->jobtypes->getAll();
        $this->layout->view('jobs/edit', $this->data);
    }

    public function jobApply()
    {
        $data = $this->uri->uri_to_assoc();

        if (empty ($data['id'])) {
            $this->redirectForFailure('jobs', 'Jobs is not found');
        } else {
            $this->load->model('jobboards');
            $this->jobboards->processApplication($data['id'], $this->userId);
            $this->redirectForSuccess('Jobs', 'Applincation is accepted successfully');
        }
    }

    public function delete()
    {
        $data = $this->uri->uri_to_assoc();

        if (empty ($data['id'])) {
            $this->redirectForFailure('jobs', 'Jobs is not found');
        } else {
            $this->jobs->delete($data['id']);
            $this->redirectForSuccess('Jobs', 'Jobs is deleted successfully');
        }
    }

    private function processPagination()
    {
        $this->load->library('pagination');
        $url = site_url('jobs');

        $uriAssoc = $this->uri->uri_to_assoc();
        $page = empty ($uriAssoc['page']) ? 0 : $uriAssoc['page'];
        $this->data['jobs'] = $this->jobs->getAll($page, $this->userId);

        $paginationOptions = array(
            'baseUrl' => $url . '/page/',
            'segmentValue' => $this->uri->getSegmentIndex('page') + 1,
            'numRows' => $this->jobs->countAll()
        );

        $this->pagination->setOptions($paginationOptions);
    }
}