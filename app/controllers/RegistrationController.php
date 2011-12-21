<?php 
/**
 * Description of Registration Controller
 *
 * @package     Controller
 * @author      Eftakhairul Islam <eftakhairul@gmail.com> http://eftakhairul.com
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

        $this->form_validation->setRulesForCreateApplicant();

        if (!empty ($_POST)) {

            if ($this->form_validation->run() AND $this->applicantFileUpload())  {


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

    private function applicantFileUpload()
    {
        if(!empty($_FILES['uploadedfile'])) {

            if(($_FILES['uploadedfile']['type'] == 'application/pdf') AND ($_FILES['uploadedfile']['size'] < 1000001))  {
                $target_path = "uploads/";
                $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
                $_POST['cv'] = $target_path;

                if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
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

    public function username_check($username)
    {
        $this->load->model('users');
        if(!$this->users->checkUsernameExisted($username)){
             return true;
         } else {
             $this->form_validation->set_message('username_check', "The <strong>%s</strong> is already taken.");
             return false;
         }
    }
}