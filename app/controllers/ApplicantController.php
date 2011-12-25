<?php 
/**
 * Description of Registration Controller
 *
 * @package     Controller
 * @author      Eftakhairul Islam <eftakhairul@gmail.com> http://eftakhairul.com
 */

include_once APPPATH . "controllers/BaseController.php";
class ApplicantController extends BaseController
{
    public function __construct()
	{
		parent::__construct();
        $this->load->model('applicants');
        $this->load->library('form_validation');
    }

    public function editApplicant()
    {
        $applicantId = $this->session->userdata('user_id');
        $this->form_validation->setRulesForCreateEmployer();

        if (!empty ($_POST)) {

           if ($this->form_validation->run()) {

               if ($result  = $this->applicants->modify($_POST, $applicantId)) {
                    $this->redirectForSuccess('season', 'Your information has been updated successfully');
               } else {
                   $this->data['error'] = 'Data is not save';
               }
           } else {
               $this->data['error'] = 'Enter required information.';
               $this->data['applicant'] = $_POST;
           }

       } else {
          $this->data['applicant'] = $this->applicants->getDetailsByApplicantId($applicantId);
       }

        $this->layout->view('applicant/edit-applicant', $this->data);
    }
}