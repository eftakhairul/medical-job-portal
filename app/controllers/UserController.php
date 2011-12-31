<?php 
/**
 * Description of User Controller
 *
 * @package     Controller
 * @author      Eftakhairul Islam <eftakhairul@gmail.com>
 * @website     http://eftakhairul.com
 * @copyright   Copyright (c) 2011 Eftakhairul Islam
 */

include_once APPPATH . "controllers/BaseController.php";
class UserController extends BaseController
{
    private $userId;

    public function __construct()
	{
		parent::__construct();
        $this->prepareLogin();
        $this->load->model('users');
        $this->prepareLogin();
    }

    public function index()
    {
        $this->processPagination();
        $this->layout->view('user/index', $this->data);
    }

    public function delete()
    {
        $data = $this->uri->uri_to_assoc();

        if (empty ($data['id'])) {
            $this->redirectForFailure('user', 'User is not found');
        } else {
            $this->jobs->delete($data['id']);
            $this->redirectForSuccess('User', 'User is deleted successfully');
        }
    }

    private function processPagination()
    {
        $url = site_url('user/index');

        $uriAssoc = $this->uri->uri_to_assoc();
        $page = empty ($uriAssoc['page']) ? 0 : $uriAssoc['page'];
        $this->data['user'] = $this->users->getAll($page);

        $paginationOptions = array(
            'baseUrl' => $url . '/page/',
            'segmentValue' => $this->uri->getSegmentIndex('page') + 1,
            'numRows' => $this->users->countAll()
        );

        $this->pagination->setOptions($paginationOptions);
    }
}