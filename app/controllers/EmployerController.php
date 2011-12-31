<?php 
/**
 * Description of Employer Controller
 *
 * @package     Controller
 * @author      Eftakhairul Islam <eftakhairul@gmail.com> http://eftakhairul.com
 */

include_once APPPATH . "controllers/BaseController.php";
class EmployerController extends BaseController
{
    public function __construct()
	{
		parent::__construct();

        $this->load->model('employers');
        $this->load->library('form_validation');
    }

    public function editEmployer()
    {
        $employerId = $this->session->userdata('user_id');
        $this->form_validation->setRulesForCreateEmployer();

        if (!empty ($_POST)) {

           if ($this->form_validation->run()) {

               if ($result  = $this->employers->modify($_POST, $employerId)) {
                    $this->redirectForSuccess('season', 'Your information has been updated successfully');
               } else {
                   $this->data['error'] = 'Data is not save';
               }
           } else {
               $this->data['error'] = 'Enter required information.';
               $this->data['employer'] = $_POST;
           }

       } else {
          $this->data['employer'] = $this->employers->getDetailsByApplicantId($employerId);
       }

        $this->layout->view('employer/edit-employer', $this->data);
    }
}