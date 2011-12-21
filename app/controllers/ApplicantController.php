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
        $this->load->model('applicants');
        $this->load->library('form_validation');
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