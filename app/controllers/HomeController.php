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
	}

    public function index()
    {
        $this->load->view('layouts/fontend');
    }

    public function employerDeashboard()
    {
        $this->layout->view('home/employer-deashboard');
    }

    public function applicantDeashboard()
    {
        $this->layout->view('home/applicant-deashboard');
    }

    public function adminDeashboard()
    {
        $this->layout->view('home/admin-deashboard');
    }
}