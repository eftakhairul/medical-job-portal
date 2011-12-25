<?php 
/**
 * Description of Auth Controller
 *
 * @package     Controller
 * @author      Eftakhairul Islam <eftakhairul@gmail.com> http://eftakhairul.com
 */

include_once APPPATH . "controllers/BaseController.php";

class HomeController extends BaseController
{
    public function __construct()
	{
		parent::__construct();
        $this->load->model('jobs');
	}

    public function index()
    {
        $this->load->view('layouts/fontend');
    }

    public function employerDeashboard()
    {
        $this->processPagination();
        $this->layout->view('home/employer-deashboard', $this->data);
    }

    public function applicantDeashboard()
    {
        $this->layout->view('home/applicant-deashboard', $this->data);
    }

    public function adminDeashboard()
    {
        $this->layout->view('home/admin-deashboard');
    }

    private function processPagination()
    {
        $this->load->library('pagination');
        $userId = $this->session->userdata('user_id');
        $url = site_url('jobs');

        $uriAssoc           = $this->uri->uri_to_assoc();
        $page               = empty ($uriAssoc['page']) ? 0 : $uriAssoc['page'];
        $this->data['jobs'] = $this->jobs->getAll($page, $userId);

        $paginationOptions = array(
            'baseUrl'       => $url . '/page/',
            'segmentValue'  => $this->uri->getSegmentIndex('page') + 1,
            'numRows'       => $this->jobs->countAll($userId)
        );

        $this->pagination->setOptions($paginationOptions);
    }
}