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
        $this->form_validation->setRulesForCreateApplicant();

        if (!empty ($_POST)) {


           if ($this->form_validation->run()) {



               if ($result  = $this->applicants->modify($_POST, $applicantId)) {
                    $this->redirectForSuccess('home/applicantDeashboard', 'Your information has been updated successfully');
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

    public function updateCV()
    {
        $applicantId = $this->session->userdata('user_id');
        $data = array();

        if (!empty ($_POST)){

            if($data['cv'] = $this->applicantCVUpload()){
                if ($this->applicants->modify($data, $applicantId)) {
                    $this->redirectForSuccess('home/applicantDeashboard', 'Your information has been updated successfully');
               }
            } else {
                $this->redirectForFailure('applicant/updateCV' ,"Please upload your CV correctly");
            }
        }

        $this->data['applicant'] = $this->applicants->getDetailsByApplicantId($applicantId);
        $this->layout->view('applicant/update-cv', $this->data);
    }

    private function applicantCVUpload()
    {
        if(!empty($_FILES['uploadedfile'])) {

            if(($_FILES['uploadedfile']['type'] == 'application/pdf') AND ($_FILES['uploadedfile']['size'] < 1000001))  {
                $targetPath = "public/CV/";
                $targetPath = $targetPath . basename( $_FILES['uploadedfile']['name']);

                if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $targetPath)) {
                    return $targetPath;
                } else{
                    $this->data['error'] =  "There was an error uploading the file, please try again!";
                    return false;
                }
            } else {
                $this->data['error'] =  "There are something wrong in type and size, please try again!";
                return false;
            }
        }
        return false;
    }
}