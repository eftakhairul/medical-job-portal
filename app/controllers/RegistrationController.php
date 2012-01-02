<?php 
/**
 * Description of Registration Controller
 *
 * @package     Controller
 * @author      Eftakhairul Islam <eftakhairul@gmail.com>
 * @website     http://eftakhairul.com
 * @copyright   Copyright (c) 2011 Eftakhairul Islam
 */

include_once APPPATH . "controllers/BaseController.php";
class RegistrationController extends BaseController
{
    public function __construct()
	{
		parent::__construct();

        $this->load->model('employers');
        $this->load->model('applicants');
        $this->load->library('form_validation');
    }

    public function createEmployer()
    {
        $this->form_validation->setRulesForCreateUser();
        $this->form_validation->setRulesForCreateEmployer();

        if (!empty ($_POST)) {

            if ($this->form_validation->run()) {

                if($result = $this->employers->save($_POST)) {

                    $this->redirectForSuccess('auth/login', 'Registration is successful');

                } else {
                    $this->redirectForSuccess('registration/createEmployer', 'Data is not saved');
                }
            } else {
                $this->data['error'] = 'Enter required information.';
            }
        }

        $this->load->view('registration/create-employer', $this->data);
    }

    public function createApplicant()
    {
        $this->form_validation->setRulesForCreateUser();
        $this->form_validation->setRulesForCreateApplicant();

        if (!empty ($_POST)) {

            if ($this->form_validation->run() AND $this->applicantCVUpload())  {

                if($result = $this->applicants->save($_POST)) {

                    $this->redirectForSuccess('auth/login', 'Registration is successful');
                    } else {
                    $this->redirectForSuccess('registration/createApplicant', 'Data is not saved');
                    }
                } else {
                    if(empty($this->data['error'])) {
                        $this->data['error'] = 'Enter required information.';
                    }
                }
            }

        $this->load->view('registration/create-applicant', $this->data);
    }

    private function applicantCVUpload()
    {
        if(!empty($_FILES['uploadedfile'])) {

            if(($_FILES['uploadedfile']['type'] == 'application/pdf') AND ($_FILES['uploadedfile']['size'] < 1000001))  {
                $targetPath = "public/CV/";
                $targetPath = $targetPath . basename( $_FILES['uploadedfile']['name']);
                $_POST['cv'] = $targetPath;

                if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $targetPath)) {
                    return true;
                } else{
                    $this->data['error'] =  "There was an error uploading the file, please try again!";
                    return false;
                }
            } else {
                $this->data['error'] =  "There are something wrong in type and size, please try again!";
                return false;
            }
        }

        return true;
    }

}