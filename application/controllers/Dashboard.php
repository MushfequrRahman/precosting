<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->load->library('session');

		if (!$this->session->userdata('userid')) {
			redirect('User_Login');
		}
	}
	public function index()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Dashboard';
		$this->load->view('admin/head', $data);
		$userid = $this->session->userdata('userid');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		$this->load->view('admin/toprightnav', $data);
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/dashboard', $data);
	}
	public function factory_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/factory_insert_form', $data);
	}
	public function fac_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$facid = $this->form_validation->set_rules('facid', 'Factory ID', 'required');
			$facname = $this->form_validation->set_rules('facname', 'Factory Name', 'required');
			$fac_address = $this->form_validation->set_rules('fac_address', 'Factory Address', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->fac_insert_form();
			} else {
				$facid = $this->input->post('facid');
				$facname = $this->input->post('facname');
				$fac_address = $this->input->post('fac_address');
				$ins = $this->Admin->fac_insert($facid, $facname, $fac_address);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/factory_insert_form', 'refresh');
			}
		}
	}
	public function factory_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl'] = $this->Admin->factory_list();
		$this->load->view('admin/factory_list', $data);
	}
	public function factory_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory Info Update';
		$facid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['all_line']=$this->Admin->all_line();
		//$data['opskill']=$this->Admin->opskill($opid);
		$data['flup'] = $this->Admin->factory_list_up($facid);
		$this->load->view('admin/factory_list_up', $data);
	}
	public function flup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$fid = $this->input->post('fid');
			$facid = $this->input->post('facid');
			$factoryname = $this->input->post('factoryname');
			$factory_address = $this->input->post('factory_address');

			$ins = $this->Admin->flup($fid, $facid, $factoryname, $factory_address);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/factory_list', 'refresh');
		}
	}
	public function department_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Department Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/department_insert_form', $data);
	}
	public function department_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$department = $this->form_validation->set_rules('department', 'Department Name', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->department_insert_form();
			} else {
				$department = $this->input->post('department');
				$ins = $this->Admin->department_insert($department);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/department_insert_form', 'refresh');
			}
		}
	}
	public function department_list()
	{

		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Department List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->department_list();
		$this->load->view('admin/department_list', $data);
	}
	public function department_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Department Info Update';
		$deptid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup'] = $this->Admin->department_list_up($deptid);
		$this->load->view('admin/department_list_up', $data);
	}
	public function departmentlup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$deptid = $this->input->post('deptid');
			$departmentname = $this->input->post('departmentname');

			$ins = $this->Admin->departmentlup($deptid, $departmentname);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/department_list', 'refresh');
		}
	}
	public function designation_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Designation Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/designation_insert_form', $data);
	}
	public function designation_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$designation = $this->form_validation->set_rules('designation', 'Designation', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->designation_insert_form();
			} else {
				$designation = $this->input->post('designation');
				$ins = $this->Admin->designation_insert($designation);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/designation_insert_form', 'refresh');
			}
		}
	}
	public function designation_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Designation List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->designation_list();
		$this->load->view('admin/designation_list', $data);
	}
	public function designation_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Designation Update';
		$designationid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup'] = $this->Admin->designation_list_up($designationid);
		$this->load->view('admin/designation_list_up', $data);
	}
	public function designationlup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$designation = $this->input->post('edesignation');
			$ins = $this->Admin->parentdesignationlup($designationid, $designation);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/designation_list', 'refresh');
		}
	}
	public function usertype_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/usertype_insert_form', $data);
	}
	public function usertype_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$usertype = $this->form_validation->set_rules('usertype', 'User type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->usertype_insert_form();
			} else {
				$usertype = $this->input->post('usertype');
				$ins = $this->Admin->usertype_insert($usertype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/usertype_insert_form', 'refresh');
			}
		}
	}
	public function usertype_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->usertype_list();
		$this->load->view('admin/usertype_list', $data);
	}
	public function usertype_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Type Update';
		$usertypeid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');

		$data['dlup'] = $this->Admin->usertype_list_up($usertypeid);
		$this->load->view('admin/usertype_list_up', $data);
	}
	public function usertypelup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$usertypeid = $this->input->post('usertypeid');
			$usertype = $this->input->post('usertype');

			$ins = $this->Admin->usertypelup($usertypeid, $usertype);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/usertype_list', 'refresh');
		}
	}
	public function userstatus_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Status Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/userstatus_insert_form', $data);
	}
	public function userstatus_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$userstatus = $this->form_validation->set_rules('userstatus', 'User Status', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->userstatus_insert_form();
			} else {
				$userstatus = $this->input->post('userstatus');

				$ins = $this->Admin->userstatus_insert($userstatus);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/userstatus_insert_form', 'refresh');
			}
		}
	}
	public function userstatus_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Status List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->userstatus_list();
		$this->load->view('admin/userstatus_list', $data);
	}
	public function userstatus_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Status Info Update';
		$userstatusid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup'] = $this->Admin->userstatus_list_up($userstatusid);
		$this->load->view('admin/userstatus_list_up', $data);
	}
	public function userstatuslup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$userstatusid = $this->input->post('userstatusid');
			$userstatus = $this->input->post('userstatus');

			$ins = $this->Admin->userstatuslup($userstatusid, $userstatus);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/userstatus_list', 'refresh');
		}
	}
	public function user_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Info Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->factory_list();
		$data['ul1'] = $this->Admin->department_list();
		$data['ul2'] = $this->Admin->designation_list();
		$data['ul3'] = $this->Admin->usertype_list();
		$data['ul4'] = $this->Admin->checked_by_user_list();
		$data['ul5'] = $this->Admin->authorized_by_user_list();
		$data['ul6'] = $this->Admin->approved_by_user_list();
		$data['ul7'] = $this->Admin->accounts_by_user_list();
		$this->load->view('admin/user_insert_form', $data);
	}
	public function user_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$factoryid = $this->input->post('factoryid');
			$departmentid = $this->input->post('departmentid');
			$name = $this->input->post('name');
			$designationid = $this->input->post('designationid');
			$oemail = $this->input->post('oemail');
			$pmobile = $this->input->post('pmobile');
			$usertypeid = $this->input->post('usertypeid');
			$kamuserid = $this->input->post('kamuserid');
			$authuserid = $this->input->post('authuserid');
			$appuserid = $this->input->post('appuserid');
			$accuserid = $this->input->post('accuserid');
			$userid = $this->input->post('userid');
			$password = $this->input->post('password');
			$ins = $this->Admin->user_insert($factoryid, $departmentid, $designationid, $name, $oemail, $pmobile, $usertypeid,$kamuserid,$authuserid,$appuserid,$accuserid, $userid, $password);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Inserted');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Inserted');
			}
			redirect('Dashboard/user_insert_form', 'refresh');
		}
	}
	public function user_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl'] = $this->Admin->factory_list();
		$this->load->view('admin/user_list', $data);
	}
	public function factorywise_user_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User List';
		$factoryid = $this->input->post('factoryid');
		$data['ul'] = $this->Admin->factorywise_user_list($factoryid);
		$this->load->view('admin/factorywise_user_list', $data);
	}


	public function user_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Info Update';
		$userid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->factory_list();
		$data['ul1'] = $this->Admin->department_list();
		$data['ul2'] = $this->Admin->designation_list();
		$data['ul3'] = $this->Admin->usertype_list();
		$data['ul4'] = $this->Admin->userstatus_list();
		$data['ulup'] = $this->Admin->user_list_up($userid);
		$this->load->view('admin/user_list_up', $data);
	}
	public function ulup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$factoryid = $this->input->post('factoryid');
			$departmentid = $this->input->post('departmentid');
			$name = $this->input->post('name');
			$designationid = $this->input->post('designationid');
			$email = $this->input->post('email');
			$mobile = $this->input->post('mobile');
			$usertypeid = $this->input->post('usertypeid');
			$userstatusid = $this->input->post('userstatusid');
			$userid = $this->input->post('userid');
			$password = $this->input->post('password');
			$indate = $this->input->post('indate');
			$userid = $this->input->post('userid');


			$ins = $this->Admin->ulup($factoryid, $departmentid, $designationid, $name, $email, $mobile, $usertypeid, $userstatusid, $userid, $password, $indate);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/user_list', 'refresh');
		}
	}

	///////////////////////////////////////////////////////PRODUCT UOM/////////////////////////////////////////////

	public function product_uom_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Product UOM Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/product_uom_insert_form', $data);
	}

	public function product_uom_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$puom = $this->form_validation->set_rules('puom', 'Product UOM', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->product_uom_insert_form();
			} else {
				$puom = $this->input->post('puom');
				$ins = $this->Admin->product_uom_insert($puom);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/product_uom_insert_form', 'refresh');
			}
		}
	}
	public function product_uom_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Product UOM List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->product_uom_list();
		$this->load->view('admin/product_uom_list', $data);
	}
	public function product_uom_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Product UOM Update';
		$puomid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['plup'] = $this->Admin->product_uom_list_up($puomid);
		$this->load->view('admin/product_uom_list_up', $data);
	}
	public function productuomlup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$puomid = $this->input->post('puomid');
			$puom = $this->input->post('puom');

			$ins = $this->Admin->productuomlup($puomid, $puom);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/product_uom_list', 'refresh');
		}
	}

	///////////////////////////////////////////////////////FABRIC TYPE/////////////////////////////////////////////

	public function fabric_type_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/fabric_type_insert_form', $data);
	}

	public function fabric_type_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$fabrictype = $this->form_validation->set_rules('fabrictype', 'Fabric Type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->fabric_type_insert_form();
			} else {
				$fabrictype = $this->input->post('fabrictype');
				$ins = $this->Admin->fabric_type_insert($fabrictype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/fabric_type_insert_form', 'refresh');
			}
		}
	}
	public function fabric_type_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->fabric_type_list();
		$this->load->view('admin/fabric_type_list', $data);
	}



	///////////////////////////////////////////////////////FABRIC PART/////////////////////////////////////////////

	public function fabric_part_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Part Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/fabric_part_insert_form', $data);
	}

	public function fabric_part_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$fabricpart = $this->form_validation->set_rules('fabricpart', 'Fabric Part', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->fabric_part_insert_form();
			} else {
				$fabricpart = $this->input->post('fabricpart');
				$ins = $this->Admin->fabric_part_insert($fabricpart);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/fabric_part_insert_form', 'refresh');
			}
		}
	}
	public function fabric_part_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Part List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->fabric_part_list();
		$this->load->view('admin/fabric_part_list', $data);
	}

	///////////////////////////////////////////////////////GARMENTS TYPE/////////////////////////////////////////////

	public function garments_type_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Garments Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/garments_type_insert_form', $data);
	}

	public function garments_type_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$garmentstype = $this->form_validation->set_rules('garmentstype', 'Garments Type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->garments_type_insert_form();
			} else {
				$garmentstype = $this->input->post('garmentstype');
				$ins = $this->Admin->garments_type_insert($garmentstype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/garments_type_insert_form', 'refresh');
			}
		}
	}
	public function garments_type_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Garments Type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->garments_type_list();
		$this->load->view('admin/garments_type_list', $data);
	}

	///////////////////////////////////////////////////////NOMINATION /////////////////////////////////////////////

	public function nomination_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Nomination Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/nomination_insert_form', $data);
	}

	public function nomination_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$nominame = $this->form_validation->set_rules('nominame', 'Nomination', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->nomination_insert_form();
			} else {
				$nominame = $this->input->post('nominame');
				$ins = $this->Admin->nomination_insert($nominame);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/nomination_insert_form', 'refresh');
			}
		}
	}
	public function nomination_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Nomination List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->nomination_list();
		$this->load->view('admin/nomination_list', $data);
	}


	///////////////////////////////////////////////////////FABRIC ITEM/////////////////////////////////////////////

	public function fabric_item_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Item Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/fabric_item_insert_form', $data);
	}

	public function fabric_item_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$fabricitem = $this->form_validation->set_rules('fabricitem', 'Fabric Item', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->fabric_item_insert_form();
			} else {
				$fabricitem = $this->input->post('fabricitem');
				$ins = $this->Admin->fabric_item_insert($fabricitem);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/fabric_item_insert_form', 'refresh');
			}
		}
	}
	public function fabric_item_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Item List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->fabric_item_list();
		$this->load->view('admin/fabric_item_list', $data);
	}

	///////////////////////////////////////////////////////TRIMS ITEM/////////////////////////////////////////////

	public function trims_item_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Trims Item Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/trims_item_insert_form', $data);
	}
	public function trims_item_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$trimsitem = $this->form_validation->set_rules('trimsitem', 'Trims Item', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->fabric_item_insert_form();
			} else {
				$trimsitem = $this->input->post('trimsitem');
				$ins = $this->Admin->trims_item_insert($trimsitem);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/trims_item_insert_form', 'refresh');
			}
		}
	}
	public function trims_item_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Trims Item List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->trims_item_list();
		$this->load->view('admin/trims_item_list', $data);
	}
	///////////////////////////////////////////////////////TRIMS TYPE/////////////////////////////////////////////

	public function trims_type_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Trims Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/trims_type_insert_form', $data);
	}

	public function trims_type_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$trimstype = $this->form_validation->set_rules('trimstype', 'Trims Type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->trims_type_insert_form();
			} else {
				$trimstype = $this->input->post('trimstype');
				$ins = $this->Admin->trims_type_insert($trimstype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/trims_type_insert_form', 'refresh');
			}
		}
	}
	public function trims_type_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Trims Type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->trims_type_list();
		$this->load->view('admin/trims_type_list', $data);
	}

	///////////////////////////////////////////////////////Embellishment ITEM/////////////////////////////////////////////

	public function embellishment_item_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Embellishment Item Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/embellishment_item_insert_form', $data);
	}
	public function embellishment_item_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$embellishmentitem = $this->form_validation->set_rules('embellishmentitem', 'Embellishment Item', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->embellishment_item_insert_form();
			} else {
				$embellishmentitem = $this->input->post('embellishmentitem');
				$ins = $this->Admin->embellishment_item_insert($embellishmentitem);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/embellishment_item_insert_form', 'refresh');
			}
		}
	}
	public function embellishment_item_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Embellishment Item List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->embellishment_item_list();
		$this->load->view('admin/embellishment_item_list', $data);
	}

	///////////////////////////////////////////////////////EMBELLISHMENT TYPE/////////////////////////////////////////////

	public function embellishment_type_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Embellishment Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/embellishment_type_insert_form', $data);
	}

	public function embellishment_type_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$embellishmenttype = $this->form_validation->set_rules('embellishmenttype', 'Embellishment Type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->embellishment_type_insert_form();
			} else {
				$embellishmenttype = $this->input->post('embellishmenttype');
				$ins = $this->Admin->embellishment_type_insert($embellishmenttype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/embellishment_type_insert_form', 'refresh');
			}
		}
	}
	public function embellishment_type_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Embellishment Type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->embellishment_type_list();
		$this->load->view('admin/embellishment_type_list', $data);
	}
	///////////////////////////////////////////////////////DIRECT EXPENSE ITEM/////////////////////////////////////////////

	public function directexpense_item_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Direct Expense Item Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/directexpense_item_insert_form', $data);
	}
	public function directexpense_item_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$directexpenseitem = $this->form_validation->set_rules('directexpenseitem', 'Direct Expense Item', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->directexpense_item_insert_form();
			} else {
				$directexpenseitem = $this->input->post('directexpenseitem');
				$ins = $this->Admin->directexpense_item_insert($directexpenseitem);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/directexpense_item_insert_form', 'refresh');
			}
		}
	}
	public function directexpense_item_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Direct Expense Item List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->directexpense_item_list();
		$this->load->view('admin/directexpense_item_list', $data);
	}
	
	///////////////////////////////////////////////////////DIRECT EXPENSE TYPE/////////////////////////////////////////////

	public function directexpense_type_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Direct Expense Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/directexpense_type_insert_form', $data);
	}

	public function directexpense_type_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$directexpensetype = $this->form_validation->set_rules('directexpensetype', 'Direct Expense Type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->directexpense_type_insert_form();
			} else {
				$directexpensetype = $this->input->post('directexpensetype');
				$ins = $this->Admin->directexpense_type_insert($directexpensetype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/directexpense_type_insert_form', 'refresh');
			}
		}
	}
	public function directexpense_type_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Direct Expense Type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->directexpense_type_list();
		$this->load->view('admin/directexpense_type_list', $data);
	}

	///////////////////////////////////////////////////////PRODUCTION TYPE/////////////////////////////////////////////

	public function production_type_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Production Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/production_type_insert_form', $data);
	}

	public function production_type_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$productiontype = $this->form_validation->set_rules('productiontype', 'Production Type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->directexpense_type_insert_form();
			} else {
				$productiontype = $this->input->post('productiontype');
				$ins = $this->Admin->production_type_insert($productiontype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/production_type_insert_form', 'refresh');
			}
		}
	}
	public function production_type_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Production Type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->production_type_list();
		$this->load->view('admin/production_type_list', $data);
	}

	///////////////////////////////////////////////////////SUPPLIER/////////////////////////////////////////////

	public function supplier_type_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Supplier Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/supplier_type_insert_form', $data);
	}

	public function supplier_type_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$suppliertype = $this->form_validation->set_rules('suppliertype', 'Supplier Type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->supplier_type_insert_form();
			} else {
				$suppliertype = $this->input->post('suppliertype');
				$ins = $this->Admin->supplier_type_insert($suppliertype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/supplier_type_insert_form', 'refresh');
			}
		}
	}
	public function supplier_type_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Supplier Type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->supplier_type_list();
		$this->load->view('admin/supplier_type_list', $data);
	}
	public function supplier_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Supplier Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->supplier_type_list();
		$this->load->view('admin/supplier_insert_form', $data);
	}
	public function supplier_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$stiid = $this->form_validation->set_rules('stiid', 'Supplier Type', 'required');
			$supplier = $this->form_validation->set_rules('supplier', 'Supplier', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->supplier_insert_form();
			} else {
				$stiid = $this->input->post('stiid');
				$supplier = $this->input->post('supplier');
				$ins = $this->Admin->supplier_insert($stiid, $supplier);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/supplier_insert_form', 'refresh');
			}
		}
	}
	public function supplier_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Supplier List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->supplier_list();
		$this->load->view('admin/supplier_list', $data);
	}

	public function show_supplier()
	{
		$this->load->database();
		$this->load->model('Admin');
		$stiid = $this->input->get('stiid');
		$data = $this->Admin->show_supplier($stiid);
		echo json_encode($data);
	}

	/////////////////////////////////////////////////////////BUYER/////////////////////////////////////////////////////////////

	public function buyer_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Buyer Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/buyer_insert_form', $data);
	}
	public function buyer_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$buyeid = $this->form_validation->set_rules('buyerid', 'Buyer ID', 'required|min_length[3]|max_length[3]');
			$buyername = $this->form_validation->set_rules('buyername', 'Buyer', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->buyer_insert_form();
			} else {
				$buyerid = $this->input->post('buyerid');
				$buyername = $this->input->post('buyername');
				$ins = $this->Admin->buyer_insert($buyerid,$buyername);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/buyer_insert_form', 'refresh');
			}
		}
	}
	public function buyer_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Buyer List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->buyer_list();
		$this->load->view('admin/buyer_list', $data);
	}

	/////////////////////////////////////////////////////////STYLE/////////////////////////////////////////////////////////////

	public function style_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Style Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->buyer_list();
		$this->load->view('admin/style_insert_form', $data);
	}
	public function style_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$buyerid = $this->form_validation->set_rules('buyerid', 'Buyer', 'required');
			$stylename = $this->form_validation->set_rules('stylename', 'Style', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->style_insert_form();
			} else {
				$buyerid = $this->input->post('buyerid');
				$stylename = $this->input->post('stylename');
				$ins = $this->Admin->style_insert($stylename, $buyerid);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/style_insert_form', 'refresh');
			}
		}
	}
	public function style_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Style List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->style_list();
		$this->load->view('admin/style_list', $data);
	}
	public function show_styleno()
	{
		$this->load->database();
		$this->load->model('Admin');
		$buyerid = $this->input->get('buyerid');
		$data = $this->Admin->show_styleno($buyerid);
		echo json_encode($data);
	}

	/////////////////////////////////////////////////////////ORDER FOR/////////////////////////////////////////////////////////////

	public function orderfor_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Order For Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/orderfor_insert_form', $data);
	}
	public function orderfor_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$orderforid = $this->form_validation->set_rules('orderforid', 'Order For ID', 'required');
			$orderfor = $this->form_validation->set_rules('orderfor', 'Order For', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->orderfor_insert_form();
			} else {
				$orderforid = $this->input->post('orderforid');
				$orderfor = $this->input->post('orderfor');
				$ins = $this->Admin->orderfor_insert($orderforid, $orderfor);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/orderfor_insert_form', 'refresh');
			}
		}
	}
	public function orderfor_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Order For List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->orderfor_list();
		$this->load->view('admin/orderfor_list', $data);
	}


	/////////////////////////////////////////////////////////ACC SEASON/////////////////////////////////////////////////////////////

	public function accseason_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Season Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl'] = $this->Admin->factory_list();
		$this->load->view('admin/accseason_insert_form', $data);
	}
	public function accseason_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$accseason = $this->form_validation->set_rules('accseason', 'Season', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->accseason_insert_form();
			} else {
				$fid = $this->input->post('fid');
				$accseason = $this->input->post('accseason');
				$accdate = $this->input->post('accdate');
				$ins = $this->Admin->accseason_insert($fid,$accseason,$accdate);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/accseason_insert_form', 'refresh');
			}
		}
	}
	public function accseason_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Season List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->accseason_list();
		$this->load->view('admin/accseason_list', $data);
	}

	/////////////////////////////////////////////////////////ORDER SEASON/////////////////////////////////////////////////////////////

	public function orderseason_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Season Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/orderseason_insert_form', $data);
	}
	public function orderseason_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$ordsid = $this->form_validation->set_rules('ordsid', 'ID', 'required');
			$orderseason = $this->form_validation->set_rules('orderseason', 'Season', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->orderseason_insert_form();
			} else {
				$ordsid = $this->input->post('ordsid');
				$orderseason = $this->input->post('orderseason');
				$ins = $this->Admin->orderseason_insert($ordsid,$orderseason);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/orderseason_insert_form', 'refresh');
			}
		}
	}
	public function orderseason_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Season List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->orderseason_list();
		$this->load->view('admin/orderseason_list', $data);
	}

	/////////////////////////////////////////////////////////CPM/////////////////////////////////////////////////////////////

	public function cpm_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'CPM Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->accseason_list();
		$this->load->view('admin/cpm_insert_form', $data);
	}
	public function cpm_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$accseasonid = $this->form_validation->set_rules('accseasonid', 'Season', 'required');
			$cpm = $this->form_validation->set_rules('cpm', 'CPM', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->style_insert_form();
			} else {
				$accseasonid = $this->input->post('accseasonid');
				$cpm = $this->input->post('cpm');
				$ins = $this->Admin->cpm_insert($accseasonid,$cpm);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/cpm_insert_form', 'refresh');
			}
		}
	}
	public function cpm_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'CPM List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->cpm_list();
		$this->load->view('admin/cpm_list', $data);
	}

	/////////////////////////////////////////////////Administrative Overhead///////////////////////////////////////////

	public function aoh_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Administrative Overhead Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->accseason_list();
		$this->load->view('admin/aoh_insert_form', $data);
	}
	public function aoh_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$accseasonid = $this->form_validation->set_rules('accseasonid', 'Season', 'required');
			$aoh = $this->form_validation->set_rules('aoh', 'Administrative Overhead', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->aoh_insert_form();
			} else {
				$accseasonid = $this->input->post('accseasonid');
				$aoh = $this->input->post('aoh');
				$ins = $this->Admin->aoh_insert($accseasonid,$aoh);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/aoh_insert_form', 'refresh');
			}
		}
	}
	public function aoh_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Administrative Overhead List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->aoh_list();
		$this->load->view('admin/aoh_list', $data);
	}

	/////////////////////////////////////////////////////////Export Overhead/////////////////////////////////////////////////////////////

	public function exoh_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Export Overhead Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->accseason_list();
		$data['bl'] = $this->Admin->buyer_list();
		$this->load->view('admin/exoh_insert_form', $data);
	}
	public function exoh_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$accseasonid = $this->form_validation->set_rules('accseasonid', 'Season', 'required');
			$buyerid = $this->form_validation->set_rules('buyerid', 'Buyer', 'required');
			$exoh = $this->form_validation->set_rules('exoh', 'Export Overhead', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->exoh_insert_form();
			} else {
				$accseasonid = $this->input->post('accseasonid');
				$buyerid = $this->input->post('buyerid');
				$exoh = $this->input->post('exoh');
				$ins = $this->Admin->exoh_insert($accseasonid,$buyerid,$exoh);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/exoh_insert_form', 'refresh');
			}
		}
	}
	public function exoh_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Export Overhead List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->exoh_list();
		$this->load->view('admin/exoh_list', $data);
	}

	/////////////////////////////////////////////////////////Import Overhead/////////////////////////////////////////////////////////////

	public function imoh_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Import Overhead Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->accseason_list();
		$data['sl'] = $this->Admin->supplier_type_list();
		$this->load->view('admin/imoh_insert_form', $data);
	}
	public function imoh_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$accseasonid = $this->form_validation->set_rules('accseasonid', 'Season', 'required');
			$stiid = $this->form_validation->set_rules('stiid', 'Supplier Type', 'required');
			$imoh = $this->form_validation->set_rules('imoh', 'Import Overhead', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->imoh_insert_form();
			} else {
				$accseasonid = $this->input->post('accseasonid');
				$stiid = $this->input->post('stiid');
				$imoh = $this->input->post('imoh');
				$ins = $this->Admin->imoh_insert($accseasonid,$stiid,$imoh);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/imoh_insert_form', 'refresh');
			}
		}
	}
	public function imoh_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Import Overhead List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->imoh_list();
		$this->load->view('admin/imoh_list', $data);
	}

	////////////////////////////////////////////////Bill Discounting Commission////////////////////////////////////////////

	public function bidisc_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Bill Discounting Commission Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->accseason_list();
		$data['bl'] = $this->Admin->buyer_list();
		$this->load->view('admin/bidisc_insert_form', $data);
	}
	public function bidisc_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$accseasonid = $this->form_validation->set_rules('accseasonid', 'Season', 'required');
			$buyerid = $this->form_validation->set_rules('buyerid', 'Buyer', 'required');
			$bidisc = $this->form_validation->set_rules('bidisc', 'Bill Discounting Commission', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->bidisc_insert_form();
			} else {
				$accseasonid = $this->input->post('accseasonid');
				$buyerid = $this->input->post('buyerid');
				$bidisc = $this->input->post('bidisc');
				$ins = $this->Admin->bidisc_insert($accseasonid,$buyerid,$bidisc);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/bidisc_insert_form', 'refresh');
			}
		}
	}
	public function bidisc_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Bill Discounting Commission List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->bidisc_list();
		$this->load->view('admin/bidisc_list', $data);
	}
	/////////////////////////////////////////////////////////Interest Rate/////////////////////////////////////////////////////////////

	public function interestrate_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Interest Rate Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->accseason_list();
		$this->load->view('admin/interestrate_insert_form', $data);
	}
	public function interestrate_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$accseasonid = $this->form_validation->set_rules('accseasonid', 'Season', 'required');
			$intrate = $this->form_validation->set_rules('intrate', 'Interest Rate', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->interestrate_insert_form();
			} else {
				$accseasonid = $this->input->post('accseasonid');
				$intrate = $this->input->post('intrate');
				$ins = $this->Admin->interestrate_insert($accseasonid,$intrate);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/interestrate_insert_form', 'refresh');
			}
		}
	}
	public function interestrate_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Interest Rate List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->interestrate_list();
		$this->load->view('admin/interestrate_list', $data);
	}
	

	/////////////////////////////////////////////////////////PRECOST/////////////////////////////////////////////////////////////

	public function precost_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'PreCost Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$userid = $this->session->userdata('userid');
		$data['ul'] = $this->Admin->buyer_list();
		$data['ofl'] = $this->Admin->orderfor_list();
		$data['osl'] = $this->Admin->orderseason_list();
		$data['sl'] = $this->Admin->accseason_list();
		$data['fl'] = $this->Admin->factory_list();
		$data['gl'] = $this->Admin->garments_type_list();
		$data['usl'] = $this->Admin->user_pre_list($userid);
		$this->load->view('admin/precost_insert_form', $data);
	}
	public function precost_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			//$jobno = $this->form_validation->set_rules('jobno', 'Job No', 'required');
			$orderforid= $this->form_validation->set_rules('orderforid', 'Order For', 'required');
			$buyerid = $this->form_validation->set_rules('buyerid', 'Buyer', 'required');
			$styleid = $this->form_validation->set_rules('styleid', 'Style', 'required');
			$lc = $this->form_validation->set_rules('lc', 'LC', 'required');
			$mlc = $this->form_validation->set_rules('mlc', 'MLC/S. Cont. no.', 'required');
			$accseasonid = $this->form_validation->set_rules('accseasonid', 'Season', 'required');
			$oqty = $this->form_validation->set_rules('oqty', 'Order Qty', 'required');
			$cmdz = $this->form_validation->set_rules('cmdz', 'Negotiate CM/Dz', 'required');
			$fpc = $this->form_validation->set_rules('fpc', 'FOB', 'required');
			$dmlc = $this->form_validation->set_rules('dmlc', 'Deferred days of MLC', 'required');
			$btp = $this->form_validation->set_rules('btp', 'BTB Turnover Period', 'required');
			$garmentstypeid = $this->form_validation->set_rules('garmentstypeid', 'Garments Type', 'required');
			$orderseasonid = $this->form_validation->set_rules('orderseasonid', 'Order Season', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->precost_insert_form();
			} else {
				//$pcdate = $this->input->post('pcdate');
				//$jobno = $this->input->post('jobno');
				$orderforid = $this->input->post('orderforid');
				$buyerid = $this->input->post('buyerid');
				$styleid = $this->input->post('styleid');
				$lc = $this->input->post('lc');
				$mlc = $this->input->post('mlc');
				$cmdz = $this->input->post('cmdz');
				$accseasonid = $this->input->post('accseasonid');
				$oqty = $this->input->post('oqty');
				$fpc= $this->input->post('fpc');
				$dmlc = $this->input->post('dmlc');
				$finhdate = $this->input->post('finhdate');
				$prdate = $this->input->post('prdate');
				$fsdate = $this->input->post('fsdate');
				$btp = $this->input->post('btp');
				$garmentstypeid = $this->input->post('garmentstypeid');
				$orderseasonid = $this->input->post('orderseasonid');
				$userid = $this->session->userdata('userid');
				$kamuserid = $this->input->post('kamuserid');
				$authuserid = $this->input->post('authuserid');
				$appuserid = $this->input->post('appuserid');
				$accuserid = $this->input->post('accuserid');
				$config['upload_path']          = APPPATH . '../assets/uploads/sample';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['max_size']             = 1000000;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('sample')) {
					$error = array('error' => $this->upload->display_errors());
					//$this->load->view('upload_form', $error);
				}
				$upload_data = $this->upload->data();
				$sample = $upload_data['file_name'];
				$sample =  str_replace(' ', '_', $sample);
				$ins = $this->Admin->precost_insert($orderforid,$buyerid, $styleid,$lc,$mlc,$accseasonid, $oqty, $fpc,$cmdz,$dmlc,$finhdate,$prdate,$fsdate,$btp,$garmentstypeid,$orderseasonid,$sample, $userid,$kamuserid,$authuserid,$appuserid,$accuserid);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/precost_insert_form', 'refresh');
			}
		}
	}
	public function precost_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'PreCost List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$userid = $this->session->userdata('userid');
		if($this->session->userdata('user_type')=='1')
		{
			$data['ul'] = $this->Admin->precost_list_all();
			$this->load->view('admin/precost_list', $data);
		}
		if($this->session->userdata('user_type')=='2')
		{
			$data['ul'] = $this->Admin->precost_list($userid);
			$this->load->view('admin/precost_list', $data);
		}
		// if($this->session->userdata('user_type')=='3')
		// {
		// 	$data['ul'] = $this->Admin->precost_list_all();
		// 	$this->load->view('admin/precost_list_non_user', $data);
		// }
		if($this->session->userdata('user_type')=='4')
		{
			$data['ul'] = $this->Admin->precost_list_kamuser($userid);
			$this->load->view('admin/precost_list', $data);
		}
		if($this->session->userdata('user_type')=='5')
		{
			$data['ul'] = $this->Admin->precost_list_authuser($userid);
			$this->load->view('admin/precost_list', $data);
		}
		if($this->session->userdata('user_type')=='6')
		{
			$data['ul'] = $this->Admin->precost_list_appuser($userid);
			$this->load->view('admin/precost_list', $data);
		}
		if($this->session->userdata('user_type')=='3')
		{
			$data['ul'] = $this->Admin->precost_list_accuser($userid);
			$this->load->view('admin/precost_list', $data);
		}
	}
	///////////////////////////////////////////Precost Update/////////////////////////////
	
	public function precost_update_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Precost Update';
		$pcid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['bl'] = $this->Admin->buyer_list();
		$data['fl'] = $this->Admin->factory_list();
		$data['sl'] = $this->Admin->accseason_list();
		$data['gl'] = $this->Admin->garments_type_list();
		$data['ul'] = $this->Admin->precost_up($pcid);
		$data['pcid'] = $pcid;
		$this->load->view('admin/precost_update_form', $data);
	}
	public function precost_update()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
				$buyerid = $this->input->post('buyerid');
				$styleid = $this->input->post('styleid');
				$lc = $this->input->post('lc');
				$mlc = $this->input->post('mlc');
				$cmdz = $this->input->post('cmdz');
				$accseasonid = $this->input->post('accseasonid');
				$oqty = $this->input->post('oqty');
				$fpc= $this->input->post('fpc');
				$dmlc = $this->input->post('dmlc');
				$finhdate = $this->input->post('finhdate');
				$prdate = $this->input->post('prdate');
				$fsdate = $this->input->post('fsdate');
				$btp = $this->input->post('btp');
				$garmentstypeid = $this->input->post('garmentstypeid');
				$pcid = $this->input->post('pcid');
				$ins = $this->Admin->precost_update($buyerid, $styleid,$lc,$mlc,$accseasonid, $oqty, $fpc,$cmdz,$dmlc,$finhdate,$prdate,$fsdate,$btp,$garmentstypeid,$pcid);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Updated');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Updated');
				}
				redirect('Dashboard/precost_list', 'refresh');
			}
		
	}

	///////////////////////////////////////////Precost Confirm/////////////////////////////////

	public function precost_confirm_update()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		
		$pcid = $this->uri->segment(3);

		$ins = $this->Admin->precost_confirm_update($pcid);
		if ($ins == TRUE) 
			{
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} 
		else 
			{
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
		redirect('Dashboard/precost_list', 'refresh');
	}

	public function precost_confirm_comments_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'PreCost Confirm Comments';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$this->load->view('admin/precost_confirm_comments_form', $data);
	}

	public function precost_confirm_update_coo()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		
		$pcid = $this->input->post('pcid');
		$ccomments = $this->input->post('ccomments');

		$ins = $this->Admin->precost_confirm_update_coo($pcid,$ccomments);
		if ($ins == TRUE) 
			{
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} 
		else 
			{
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
		redirect('Dashboard/precost_list', 'refresh');
	}

	///////////////////////////////////////////Precost Reject/////////////////////////////////

	public function precost_reject_update()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		
		$pcid = $this->uri->segment(3);

		$ins = $this->Admin->precost_reject_update($pcid);
		if ($ins == TRUE) 
			{
				$this->session->set_flashdata('Successfully', 'Successfully Rejected');
			} 
		else 
			{
				$this->session->set_flashdata('Successfully', 'Failed To Rejected');
			}
		redirect('Dashboard/precost_list', 'refresh');
	}

	public function precost_reject_comments_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'PreCost Confirm Comments';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$this->load->view('admin/precost_reject_comments_form', $data);
	}

	public function precost_reject_update_coo()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		
		$pcid = $this->input->post('pcid');
		$rcomments = $this->input->post('rcomments');

		$ins = $this->Admin->precost_reject_update_coo($pcid,$rcomments);
		if ($ins == TRUE) 
			{
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} 
		else 
			{
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
		redirect('Dashboard/precost_list', 'refresh');
	}

	///////////////////////////////////////////Budget for Fabrics/////////////////////////////

	public function fabric_budget_create_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Fabrics';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->fabric_item_list();
		$data['ul1'] = $this->Admin->fabric_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['nl'] = $this->Admin->nomination_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['ul4'] = $this->Admin->precost_list_pcid($pcid);
		$this->load->view('admin/fabric_budget_create_form', $data);
	}
	public function fabric_budget_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		$fbcdate = $this->input->get('fbcdate');
		$pcid = $this->input->get('pcid');
		$fabricitemid = $this->input->get('fabricitemid');
		$fabrictypeid = $this->input->get('fabrictypeid');
		$supplierid = $this->input->get('supplierid');
		$nomiid = $this->input->get('nomiid');
		$orderqty = $this->input->get('orderqty');
		$cad = $this->input->get('cad');
		$allowance = $this->input->get('allowance');
		$puomid = $this->input->get('puomid');
		$rate = $this->input->get('rate');
		$btb = $this->input->get('btb');

		for ($i = 0; $i < count($fabricitemid); $i++) {
			$data["i"] = $i;
			$data["fbcdate"] = $fbcdate;
			$data["pcid"] = $pcid;
			$data["fabricitemid"] = $fabricitemid[$i];
			$data["fabrictypeid"] = $fabrictypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$data["btb"] = $btb[$i];
			$ins = $this->Admin->fabric_budget_insert($data);
		}
		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
		}
	}
	public function add_fabric_budget_create_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Fabric Budget';
		$pcid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->fabric_item_list();
		$data['ul1'] = $this->Admin->fabric_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['nl'] = $this->Admin->nomination_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['ul4'] = $this->Admin->precost_list_pcid($pcid);
		$this->load->view('admin/add_fabric_budget_create_form', $data);
	}
	public function add_fabric_budget_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		$fbcdate = $this->input->get('fbcdate');
		$pcid = $this->input->get('pcid');
		$fabricitemid = $this->input->get('fabricitemid');
		$fabrictypeid = $this->input->get('fabrictypeid');
		$supplierid = $this->input->get('supplierid');
		$nomiid = $this->input->get('nomiid');
		$orderqty = $this->input->get('orderqty');
		$cad = $this->input->get('cad');
		$allowance = $this->input->get('allowance');
		$puomid = $this->input->get('puomid');
		$rate = $this->input->get('rate');
		$btb = $this->input->get('btb');

		for ($i = 0; $i < count($fabricitemid); $i++) {
			$data["i"] = $i;
			$data["fbcdate"] = $fbcdate;
			$data["pcid"] = $pcid;
			$data["fabricitemid"] = $fabricitemid[$i];
			$data["fabrictypeid"] = $fabrictypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$data["btb"] = $btb[$i];
			$ins = $this->Admin->fabric_budget_insert($data);
		}
		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
		}
	}
	public function fabric_budget_update_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Fabrics Update';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		//$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->fabric_item_list();
		$data['ul1'] = $this->Admin->fabric_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['nl'] = $this->Admin->nomination_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['fbl'] = $this->Admin->precost_budget_fabric($pcid);
		$data['pcid'] = $pcid;
		$this->load->view('admin/fabric_budget_update_form', $data);
	}
	public function fabric_budget_update()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) 
			{
				//$pcid = $this->input->post('pcid');
				$fbid = $this->input->post('fbid');
				$fabricitemid = $this->input->post('fabricitemid');
				$fabrictypeid = $this->input->post('fabrictypeid');
				$supplierid = $this->input->post('supplierid');
				$nomiid = $this->input->post('nomiid');
				$orderqty = $this->input->post('orderqty');
				$cad = $this->input->post('cad');
				$allowance = $this->input->post('allowance');
				$puomid = $this->input->post('puomid');
				$rate = $this->input->post('rate');
				$btb = $this->input->post('btb');

				for ($i = 0; $i < count($fbid); $i++) 
					{
						$data["i"] = $i;
						//$data["pcid"] = $pcid;
						$data["fbid"] = $fbid[$i];
						$data["fabricitemid"] = $fabricitemid[$i];
						$data["fabrictypeid"] = $fabrictypeid[$i];
						$data["supplierid"] = $supplierid[$i];
						$data["nomiid"] = $nomiid[$i];
						$data["orderqty"] = $orderqty[$i];
						$data["cad"] = $cad[$i];
						$data["allowance"] = $allowance[$i];
						$data["puomid"] = $puomid[$i];
						$data["rate"] = $rate[$i];
						$data["btb"] = $btb[$i];
						$ins = $this->Admin->fabric_budget_update($data);
					}
				if ($ins == TRUE) 
					{
						$this->session->set_flashdata('Successfully', 'Successfully Updated');
					} 
				else 
					{
						$this->session->set_flashdata('Successfully', 'Failed To Updated');
					}
				redirect('Dashboard/precost_list', 'refresh');
		}
	}
	public function fabric_budget_copy_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Fabrics Copy';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['jl'] = $this->Admin->precost_jobno();
		$data['pcid'] = $pcid;
		$this->load->view('admin/fabric_budget_copy_form', $data);
	}
	public function fabric_budget_copy_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pcid = $this->input->post('jobno');
		$ppcid = $this->input->post('ppcid');
		$data['ppcid'] = $ppcid;
		$data['fbl'] = $this->Admin->precost_budget_fabric($pcid);
		$this->load->view('admin/fabric_budget_copy_list', $data);
	}
	public function fabric_budget_copy_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		//$fbcdate = $this->input->get('fbcdate');
		$pcid = $this->input->post('pcid');
		$fabricitemid = $this->input->post('fabricitemid');
		$fabrictypeid = $this->input->post('fabrictypeid');
		$supplierid = $this->input->post('supplierid');
		$nomiid = $this->input->post('nomiid');
		$orderqty = $this->input->post('orderqty');
		$cad = $this->input->post('cad');
		$allowance = $this->input->post('allowance');
		$puomid = $this->input->post('puomid');
		$rate = $this->input->post('rate');
		$btb = $this->input->post('btb');

		for ($i = 0; $i < count($fabricitemid); $i++) {
			$data["i"] = $i;
			//$data["fbcdate"] = $fbcdate;
			$data["pcid"] = $pcid;
			$data["fabricitemid"] = $fabricitemid[$i];
			$data["fabrictypeid"] = $fabrictypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$data["btb"] = $btb[$i];
			$ins = $this->Admin->fabric_budget_copy_insert($data);
		}
		if ($ins == TRUE) 
					{
						$this->session->set_flashdata('Successfully', 'Successfully Updated');
					} 
				else 
					{
						$this->session->set_flashdata('Successfully', 'Failed To Updated');
					}
				redirect('Dashboard/precost_list', 'refresh');
	}
	public function fabric_budget_delete_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Fabrics Delete';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		//$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->fabric_item_list();
		$data['ul1'] = $this->Admin->fabric_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['nl'] = $this->Admin->nomination_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['fbl'] = $this->Admin->precost_budget_fabric($pcid);
		$data['pcid'] = $pcid;
		$this->load->view('admin/fabric_budget_delete_form', $data);
	}
	public function fabric_budget_delete()
	{
		error_reporting(0);
		$this->load->database();
		$this->load->model('Admin');
		if($this->input->get('checkbox_value'))
			{
				$id = $this->input->get('checkbox_value');
				for($count=0;$count<count($id);$count++)
					{
						$this->Admin->fabric_budget_delete($id[$count]);
					}
			}
	}

								///////////////////////////////////////////Budget for Trims/////////////////////////////

	public function trims_budget_create_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Trims';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->trims_item_list();
		$data['ul1'] = $this->Admin->trims_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['nl'] = $this->Admin->nomination_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['ul4'] = $this->Admin->precost_list_pcid($pcid);
		$this->load->view('admin/trims_budget_create_form', $data);
	}
	public function trims_budget_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		$tbcdate = $this->input->get('tbcdate');
		$pcid = $this->input->get('pcid');
		$trimsitemid = $this->input->get('trimsitemid');
		$trimstypeid = $this->input->get('trimstypeid');
		$supplierid = $this->input->get('supplierid');
		$nomiid = $this->input->get('nomiid');
		$orderqty = $this->input->get('orderqty');
		$cad = $this->input->get('cad');
		$allowance = $this->input->get('allowance');
		$puomid = $this->input->get('puomid');
		$rate = $this->input->get('rate');
		$btb = $this->input->get('btb');

		for ($i = 0; $i < count($trimsitemid); $i++) {
			$data["i"] = $i;
			$data["tbcdate"] = $tbcdate;
			$data["pcid"] = $pcid;
			$data["trimsitemid"] = $trimsitemid[$i];
			$data["trimstypeid"] = $trimstypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$data["btb"] = $btb[$i];
			$ins = $this->Admin->trims_budget_insert($data);
		}
		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
		}
	}
	public function add_trims_budget_create_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Trims';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->trims_item_list();
		$data['ul1'] = $this->Admin->trims_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['nl'] = $this->Admin->nomination_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['ul4'] = $this->Admin->precost_list_pcid($pcid);
		$this->load->view('admin/add_trims_budget_create_form', $data);
	}
	public function add_trims_budget_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		$tbcdate = $this->input->get('tbcdate');
		$pcid = $this->input->get('pcid');
		$trimsitemid = $this->input->get('trimsitemid');
		$trimstypeid = $this->input->get('trimstypeid');
		$supplierid = $this->input->get('supplierid');
		$nomiid = $this->input->get('nomiid');
		$orderqty = $this->input->get('orderqty');
		$cad = $this->input->get('cad');
		$allowance = $this->input->get('allowance');
		$puomid = $this->input->get('puomid');
		$rate = $this->input->get('rate');
		$btb = $this->input->get('btb');

		for ($i = 0; $i < count($trimsitemid); $i++) {
			$data["i"] = $i;
			$data["tbcdate"] = $tbcdate;
			$data["pcid"] = $pcid;
			$data["trimsitemid"] = $trimsitemid[$i];
			$data["trimstypeid"] = $trimstypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$data["btb"] = $btb[$i];
			$ins = $this->Admin->trims_budget_insert($data);
		}
		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
		}
	}
	public function trims_budget_update_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Trims Update';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->trims_item_list();
		$data['ul1'] = $this->Admin->trims_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['nl'] = $this->Admin->nomination_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['tbl'] = $this->Admin->precost_budget_trims($pcid);
		$this->load->view('admin/trims_budget_update_form', $data);
	}
	public function trims_budget_update()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) 
			{
				//$pcid = $this->input->post('pcid');
				$tbid = $this->input->post('tbid');
				$trimsitemid = $this->input->post('trimsitemid');
				$trimstypeid = $this->input->post('trimstypeid');
				$supplierid = $this->input->post('supplierid');
				$nomiid = $this->input->post('nomiid');
				$orderqty = $this->input->post('orderqty');
				$cad = $this->input->post('cad');
				$allowance = $this->input->post('allowance');
				$puomid = $this->input->post('puomid');
				$rate = $this->input->post('rate');
				$btb = $this->input->post('btb');

				for ($i = 0; $i < count($tbid); $i++) 
					{
						$data["i"] = $i;
						//$data["pcid"] = $pcid;
						$data["tbid"] = $tbid[$i];
						$data["trimsitemid"] = $trimsitemid[$i];
						$data["trimstypeid"] = $trimstypeid[$i];
						$data["supplierid"] = $supplierid[$i];
						$data["nomiid"] = $nomiid[$i];
						$data["orderqty"] = $orderqty[$i];
						$data["cad"] = $cad[$i];
						$data["allowance"] = $allowance[$i];
						$data["puomid"] = $puomid[$i];
						$data["rate"] = $rate[$i];
						$data["btb"] = $btb[$i];
						$ins = $this->Admin->trims_budget_update($data);
					}
				if ($ins == TRUE) 
					{
						$this->session->set_flashdata('Successfully', 'Successfully Updated');
					} 
				else 
					{
						$this->session->set_flashdata('Successfully', 'Failed To Updated');
					}
				redirect('Dashboard/precost_list', 'refresh');
		}
	}
	public function trims_budget_copy_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Trims Copy';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['jl'] = $this->Admin->precost_jobno();
		$data['pcid'] = $pcid;
		$this->load->view('admin/trims_budget_copy_form', $data);
	}
	public function trims_budget_copy_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pcid = $this->input->post('jobno');
		$ppcid = $this->input->post('ppcid');
		$data['ppcid'] = $ppcid;
		$data['tbl'] = $this->Admin->precost_budget_trims($pcid);
		$this->load->view('admin/trims_budget_copy_list', $data);
	}
	public function trims_budget_copy_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		//$fbcdate = $this->input->get('fbcdate');
		$pcid = $this->input->post('pcid');
		$trimsitemid = $this->input->post('trimsitemid');
		$trimstypeid = $this->input->post('trimstypeid');
		$supplierid = $this->input->post('supplierid');
		$nomiid = $this->input->post('nomiid');
		$orderqty = $this->input->post('orderqty');
		$cad = $this->input->post('cad');
		$allowance = $this->input->post('allowance');
		$puomid = $this->input->post('puomid');
		$rate = $this->input->post('rate');
		$btb = $this->input->post('btb');

		for ($i = 0; $i < count($trimsitemid); $i++) {
			$data["i"] = $i;
			//$data["fbcdate"] = $fbcdate;
			$data["pcid"] = $pcid;
			$data["trimsitemid"] = $trimsitemid[$i];
			$data["trimstypeid"] = $trimstypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$data["btb"] = $btb[$i];
			$ins = $this->Admin->trims_budget_copy_insert($data);
		}
		if ($ins == TRUE) 
					{
						$this->session->set_flashdata('Successfully', 'Successfully Updated');
					} 
				else 
					{
						$this->session->set_flashdata('Successfully', 'Failed To Updated');
					}
				redirect('Dashboard/precost_list', 'refresh');
	}
	public function trims_budget_delete_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Trims Delete';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->trims_item_list();
		$data['ul1'] = $this->Admin->trims_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['tbl'] = $this->Admin->precost_budget_trims($pcid);
		$this->load->view('admin/trims_budget_delete_form', $data);
	}
	public function trims_budget_delete()
	{
		error_reporting(0);
		$this->load->database();
		$this->load->model('Admin');
		if($this->input->get('checkbox_value'))
			{
				$id = $this->input->get('checkbox_value');
				for($count=0;$count<count($id);$count++)
					{
						$this->Admin->trims_budget_delete($id[$count]);
					}
			}
	}

	///////////////////////////////////////////Budget for Embellishment/////////////////////////////

	public function embellishment_budget_create_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Embellishment';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->embellishment_item_list();
		$data['ul1'] = $this->Admin->embellishment_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['nl'] = $this->Admin->nomination_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['ul4'] = $this->Admin->precost_list_pcid($pcid);
		$this->load->view('admin/embellishment_budget_create_form', $data);
	}
	public function embellishment_budget_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		$ebcdate = $this->input->get('ebcdate');
		$pcid = $this->input->get('pcid');
		$embellishmentitemid = $this->input->get('embellishmentitemid');
		$embellishmenttypeid = $this->input->get('embellishmenttypeid');
		$supplierid = $this->input->get('supplierid');
		$nomiid = $this->input->get('nomiid');
		$orderqty = $this->input->get('orderqty');
		$cad = $this->input->get('cad');
		$allowance = $this->input->get('allowance');
		$puomid = $this->input->get('puomid');
		$rate = $this->input->get('rate');

		for ($i = 0; $i < count($embellishmentitemid); $i++) {
			$data["i"] = $i;
			$data["ebcdate"] = $ebcdate;
			$data["pcid"] = $pcid;
			$data["embellishmentitemid"] = $embellishmentitemid[$i];
			$data["embellishmenttypeid"] = $embellishmenttypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$ins = $this->Admin->embellishment_budget_insert($data);
		}
		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
		}
	}
	public function add_embellishment_budget_create_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Embellishment';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->embellishment_item_list();
		$data['ul1'] = $this->Admin->embellishment_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['nl'] = $this->Admin->nomination_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['ul4'] = $this->Admin->precost_list_pcid($pcid);
		$this->load->view('admin/add_embellishment_budget_create_form', $data);
	}
	public function add_embellishment_budget_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		$ebcdate = $this->input->get('ebcdate');
		$pcid = $this->input->get('pcid');
		$embellishmentitemid = $this->input->get('embellishmentitemid');
		$embellishmenttypeid = $this->input->get('embellishmenttypeid');
		$supplierid = $this->input->get('supplierid');
		$nomiid = $this->input->get('nomiid');
		$orderqty = $this->input->get('orderqty');
		$cad = $this->input->get('cad');
		$allowance = $this->input->get('allowance');
		$puomid = $this->input->get('puomid');
		$rate = $this->input->get('rate');

		for ($i = 0; $i < count($embellishmentitemid); $i++) {
			$data["i"] = $i;
			$data["ebcdate"] = $ebcdate;
			$data["pcid"] = $pcid;
			$data["embellishmentitemid"] = $embellishmentitemid[$i];
			$data["embellishmenttypeid"] = $embellishmenttypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$ins = $this->Admin->embellishment_budget_insert($data);
		}
		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
		}
	}
	public function embellishment_budget_update_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Embellishment Update';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->embellishment_item_list();
		$data['ul1'] = $this->Admin->embellishment_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['nl'] = $this->Admin->nomination_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['ebl'] = $this->Admin->precost_budget_embellishment($pcid);
		$this->load->view('admin/embellishment_budget_update_form', $data);
	}
	public function embellishment_budget_update()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) 
			{
				//$pcid = $this->input->post('pcid');
				$ebid = $this->input->post('ebid');
				$embellishmentitemid = $this->input->post('embellishmentitemid');
				$embellishmenttypeid = $this->input->post('embellishmenttypeid');
				$supplierid = $this->input->post('supplierid');
				$nomiid = $this->input->post('nomiid');
				$orderqty = $this->input->post('orderqty');
				$cad = $this->input->post('cad');
				$allowance = $this->input->post('allowance');
				$puomid = $this->input->post('puomid');
				$rate = $this->input->post('rate');

				for ($i = 0; $i < count($ebid); $i++) 
					{
						$data["i"] = $i;
						//$data["pcid"] = $pcid;
						$data["ebid"] = $ebid[$i];
						$data["embellishmentitemid"] = $embellishmentitemid[$i];
						$data["embellishmenttypeid"] = $embellishmenttypeid[$i];
						$data["supplierid"] = $supplierid[$i];
						$data["nomiid"] = $nomiid[$i];
						$data["orderqty"] = $orderqty[$i];
						$data["cad"] = $cad[$i];
						$data["allowance"] = $allowance[$i];
						$data["puomid"] = $puomid[$i];
						$data["rate"] = $rate[$i];
						$ins = $this->Admin->embellishment_budget_update($data);
					}
				if ($ins == TRUE) 
					{
						$this->session->set_flashdata('Successfully', 'Successfully Updated');
					} 
				else 
					{
						$this->session->set_flashdata('Successfully', 'Failed To Updated');
					}
				redirect('Dashboard/precost_list', 'refresh');
		}
	}
	public function embellishment_budget_copy_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Embellishment Copy';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['jl'] = $this->Admin->precost_jobno();
		$data['pcid'] = $pcid;
		$this->load->view('admin/embellishment_budget_copy_form', $data);
	}
	public function embellishment_budget_copy_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pcid = $this->input->post('jobno');
		$ppcid = $this->input->post('ppcid');
		$data['ppcid'] = $ppcid;
		$data['ebl'] = $this->Admin->precost_budget_embellishment($pcid);
		$this->load->view('admin/embellishment_budget_copy_list', $data);
	}
	public function embellishment_budget_copy_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		//$fbcdate = $this->input->get('fbcdate');
		$pcid = $this->input->post('pcid');
		$embellishmentitemid = $this->input->post('embellishmentitemid');
		$embellishmenttypeid = $this->input->post('embellishmenttypeid');
		$supplierid = $this->input->post('supplierid');
		$nomiid = $this->input->post('nomiid');
		$orderqty = $this->input->post('orderqty');
		$cad = $this->input->post('cad');
		$allowance = $this->input->post('allowance');
		$puomid = $this->input->post('puomid');
		$rate = $this->input->post('rate');

		for ($i = 0; $i < count($embellishmentitemid); $i++) {
			$data["i"] = $i;
			//$data["fbcdate"] = $fbcdate;
			$data["pcid"] = $pcid;
			$data["embellishmentitemid"] = $embellishmentitemid[$i];
			$data["embellishmenttypeid"] = $embellishmenttypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$ins = $this->Admin->embellishment_budget_copy_insert($data);
		}
		if ($ins == TRUE) 
					{
						$this->session->set_flashdata('Successfully', 'Successfully Updated');
					} 
				else 
					{
						$this->session->set_flashdata('Successfully', 'Failed To Updated');
					}
				redirect('Dashboard/precost_list', 'refresh');
	}
	public function embellishment_budget_delete_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Embellishment Update';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->embellishment_item_list();
		$data['ul1'] = $this->Admin->embellishment_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['ebl'] = $this->Admin->precost_budget_embellishment($pcid);
		$this->load->view('admin/embellishment_budget_delete_form', $data);
	}
	public function embellishment_budget_delete()
	{
		error_reporting(0);
		$this->load->database();
		$this->load->model('Admin');
		if($this->input->get('checkbox_value'))
			{
				$id = $this->input->get('checkbox_value');
				for($count=0;$count<count($id);$count++)
					{
						$this->Admin->embellishment_budget_delete($id[$count]);
					}
			}
	}

	///////////////////////////////////////////Budget for Direct Expense/////////////////////////////

	public function directexpense_budget_create_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Direct Expense';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->directexpense_item_list();
		$data['ul1'] = $this->Admin->directexpense_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['nl'] = $this->Admin->nomination_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['ul4'] = $this->Admin->precost_list_pcid($pcid);
		$this->load->view('admin/directexpense_budget_create_form', $data);
	}
	public function directexpense_budget_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		$debcdate = $this->input->get('debcdate');
		$pcid = $this->input->get('pcid');
		$directexpenseitemid = $this->input->get('directexpenseitemid');
		$directexpensetypeid = $this->input->get('directexpensetypeid');
		$supplierid = $this->input->get('supplierid');
		$nomiid = $this->input->get('nomiid');
		$orderqty = $this->input->get('orderqty');
		$cad = $this->input->get('cad');
		$allowance = $this->input->get('allowance');
		$puomid = $this->input->get('puomid');
		$rate = $this->input->get('rate');

		for ($i = 0; $i < count($directexpenseitemid); $i++) {
			$data["i"] = $i;
			$data["debcdate"] = $debcdate;
			$data["pcid"] = $pcid;
			$data["directexpenseitemid"] = $directexpenseitemid[$i];
			$data["directexpensetypeid"] = $directexpensetypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$ins = $this->Admin->directexpense_budget_insert($data);
		}
		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
		}
	}
	public function add_directexpense_budget_create_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Direct Expense';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->directexpense_item_list();
		$data['ul1'] = $this->Admin->directexpense_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['nl'] = $this->Admin->nomination_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['ul4'] = $this->Admin->precost_list_pcid($pcid);
		$this->load->view('admin/add_directexpense_budget_create_form', $data);
	}
	public function add_directexpense_budget_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		$debcdate = $this->input->get('debcdate');
		$pcid = $this->input->get('pcid');
		$directexpenseitemid = $this->input->get('directexpenseitemid');
		$directexpensetypeid = $this->input->get('directexpensetypeid');
		$supplierid = $this->input->get('supplierid');
		$nomiid = $this->input->get('nomiid');
		$orderqty = $this->input->get('orderqty');
		$cad = $this->input->get('cad');
		$allowance = $this->input->get('allowance');
		$puomid = $this->input->get('puomid');
		$rate = $this->input->get('rate');

		for ($i = 0; $i < count($directexpenseitemid); $i++) {
			$data["i"] = $i;
			$data["debcdate"] = $debcdate;
			$data["pcid"] = $pcid;
			$data["directexpenseitemid"] = $directexpenseitemid[$i];
			$data["directexpensetypeid"] = $directexpensetypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$ins = $this->Admin->directexpense_budget_insert($data);
		}
		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
		}
	}
	public function directexpense_budget_update_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Direct Expense Update';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->directexpense_item_list();
		$data['ul1'] = $this->Admin->directexpense_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['nl'] = $this->Admin->nomination_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['debl'] = $this->Admin->precost_budget_directexpense($pcid);
		$this->load->view('admin/directexpense_budget_update_form', $data);
	}
	public function directexpense_budget_update()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) 
			{
				//$pcid = $this->input->post('pcid');
				$debid = $this->input->post('debid');
				$directexpenseitemid = $this->input->post('directexpenseitemid');
				$directexpensetypeid = $this->input->post('directexpensetypeid');
				$supplierid = $this->input->post('supplierid');
				$nomiid = $this->input->post('nomiid');
				$orderqty = $this->input->post('orderqty');
				$cad = $this->input->post('cad');
				$allowance = $this->input->post('allowance');
				$puomid = $this->input->post('puomid');
				$rate = $this->input->post('rate');

				for ($i = 0; $i < count($debid); $i++) 
					{
						$data["i"] = $i;
						//$data["pcid"] = $pcid;
						$data["debid"] = $debid[$i];
						$data["directexpenseitemid"] = $directexpenseitemid[$i];
						$data["directexpensetypeid"] = $directexpensetypeid[$i];
						$data["supplierid"] = $supplierid[$i];
						$data["nomiid"] = $nomiid[$i];
						$data["orderqty"] = $orderqty[$i];
						$data["cad"] = $cad[$i];
						$data["allowance"] = $allowance[$i];
						$data["puomid"] = $puomid[$i];
						$data["rate"] = $rate[$i];
						$ins = $this->Admin->directexpense_budget_update($data);
					}
				if ($ins == TRUE) 
					{
						$this->session->set_flashdata('Successfully', 'Successfully Updated');
					} 
				else 
					{
						$this->session->set_flashdata('Successfully', 'Failed To Updated');
					}
				redirect('Dashboard/precost_list', 'refresh');
		}
	}
	public function directexpense_budget_copy_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Directexpense Copy';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['jl'] = $this->Admin->precost_jobno();
		$data['pcid'] = $pcid;
		$this->load->view('admin/directexpense_budget_copy_form', $data);
	}
	public function directexpense_budget_copy_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pcid = $this->input->post('jobno');
		$ppcid = $this->input->post('ppcid');
		$data['ppcid'] = $ppcid;
		$data['debl'] = $this->Admin->precost_budget_directexpense($pcid);
		$this->load->view('admin/directexpense_budget_copy_list', $data);
	}
	public function directexpense_budget_copy_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		//$fbcdate = $this->input->get('fbcdate');
		$pcid = $this->input->post('pcid');
		$directexpenseitemid = $this->input->post('directexpenseitemid');
		$directexpensetypeid = $this->input->post('directexpensetypeid');
		$supplierid = $this->input->post('supplierid');
		$nomiid = $this->input->post('nomiid');
		$orderqty = $this->input->post('orderqty');
		$cad = $this->input->post('cad');
		$allowance = $this->input->post('allowance');
		$puomid = $this->input->post('puomid');
		$rate = $this->input->post('rate');

		for ($i = 0; $i < count($directexpenseitemid); $i++) {
			$data["i"] = $i;
			//$data["fbcdate"] = $fbcdate;
			$data["pcid"] = $pcid;
			$data["directexpenseitemid"] = $directexpenseitemid[$i];
			$data["directexpensetypeid"] = $directexpensetypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$ins = $this->Admin->directexpense_budget_copy_insert($data);
		}
		if ($ins == TRUE) 
					{
						$this->session->set_flashdata('Successfully', 'Successfully Updated');
					} 
				else 
					{
						$this->session->set_flashdata('Successfully', 'Failed To Updated');
					}
				redirect('Dashboard/precost_list', 'refresh');
	}
	public function directexpense_budget_delete_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Budget for Direct Expense Update';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->directexpense_item_list();
		$data['ul1'] = $this->Admin->directexpense_type_list();
		$data['ul2'] = $this->Admin->supplier_list();
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['debl'] = $this->Admin->precost_budget_directexpense($pcid);
		$this->load->view('admin/directexpense_budget_delete_form', $data);
	}
	public function directexpense_budget_delete()
	{
		error_reporting(0);
		$this->load->database();
		$this->load->model('Admin');
		if($this->input->get('checkbox_value'))
			{
				$id = $this->input->get('checkbox_value');
				for($count=0;$count<count($id);$count++)
					{
						$this->Admin->directexpense_budget_delete($id[$count]);
					}
			}
	}
	
	///////////////////////////////////////////IE ANALYSIS/////////////////////////////

	public function ie_analysis_create_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'IE Analysis';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->production_type_list();
		$this->load->view('admin/ie_analysis_create_form', $data);
	}
	public function ie_analysis_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');

		$iecdate = $this->input->get('iecdate');
		$pcid = $this->input->get('pcid');
		$productiontypeid = $this->input->get('productiontypeid');
		$man = $this->input->get('man');
		$machine = $this->input->get('machine');
		$ph = $this->input->get('ph');
		$sm = $this->input->get('sm');

		for ($i = 0; $i < count($productiontypeid); $i++) {
			$data["i"] = $i;
			$data["iecdate"] = $iecdate;
			$data["pcid"] = $pcid;
			$data["productiontypeid"] = $productiontypeid[$i];
			$data["man"] = $man[$i];
			$data["machine"] = $machine[$i];;
			$data["ph"] = $ph[$i];
			$data["sm"] = $sm[$i];
			$ins = $this->Admin->ie_analysis_insert($data);
		}
		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
		}
	}
	public function ie_analysis_update_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'IE Analysis Update';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$data['pcid'] = $pcid;
		$data['ul'] = $this->Admin->production_type_list();
		$data['iel'] = $this->Admin->ie_analysis($pcid);
		$this->load->view('admin/ie_analysis_update_form', $data);
	}
	public function ie_analysis_update()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) 
			{
				//$pcid = $this->input->post('pcid');
				$ieaid = $this->input->post('ieaid');
				//$productiontypeid = $this->input->post('productiontypeid');
				$man = $this->input->post('man');
				$machine = $this->input->post('machine');
				$ph = $this->input->post('ph');
				$sm = $this->input->post('sm');
		
				for ($i = 0; $i < count($ieaid); $i++) 
					{
						$data["i"] = $i;
						//$data["pcid"] = $pcid;
						$data["ieaid"] = $ieaid[$i];
						//$data["productiontypeid"] = $productiontypeid[$i];
						$data["man"] = $man[$i];
						$data["machine"] = $machine[$i];
						$data["ph"] = $ph[$i];
						$data["sm"] = $sm[$i];
						$ins = $this->Admin->ie_analysis_update($data);
					}
				if ($ins == TRUE) 
					{
						$this->session->set_flashdata('Successfully', 'Successfully Updated');
					} 
				else 
					{
						$this->session->set_flashdata('Successfully', 'Failed To Updated');
					}
				redirect('Dashboard/precost_list', 'refresh');
		}
	}

	///////////////////////////PRECOST BUDGET DETAILS////////////////////////////

	public function precost_budget_details()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'PreCost Budget Details';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$pcid = $this->uri->segment(3);
		$cs = $this->uri->segment(4);
		$data['ul'] = $this->Admin->precost_list_pcid($pcid);
		$data['ul1'] = $this->Admin->precost_budget_fabric($pcid);
		$data['fl'] = $this->Admin->precost_budget_fabric_local($pcid);
		$data['ff'] = $this->Admin->precost_budget_fabric_foreign($pcid);
		$data['ul2'] = $this->Admin->precost_budget_trims($pcid);
		$data['tl'] = $this->Admin->precost_budget_trims_local($pcid);
		$data['tf'] = $this->Admin->precost_budget_trims_foreign($pcid);
		$data['ul3'] = $this->Admin->precost_budget_embellishment($pcid);
		$data['el'] = $this->Admin->precost_budget_embellishment_local($pcid);
		$data['ef'] = $this->Admin->precost_budget_embellishment_foreign($pcid);
		$data['ul4'] = $this->Admin->precost_budget_directexpense($pcid);
		$data['dl'] = $this->Admin->precost_budget_directexpense_local($pcid);
		$data['df'] = $this->Admin->precost_budget_directexpense_foreign($pcid);
		$data['ul5'] = $this->Admin->ie_analysis($pcid);
		if($this->session->userdata('user_type')=='1')
		{
			$this->load->view('admin/precost_list_details', $data);
		}
		if($this->session->userdata('user_type')=='2')
		{
			$this->load->view('admin/precost_list_details', $data);
		}
		if($this->session->userdata('user_type')=='3')
		{
			$this->load->view('admin/precost_list_details_non_user', $data);
		}
		if($this->session->userdata('user_type')=='4')
		{
			$this->load->view('admin/precost_list_details_non_user', $data);
		}
		if($this->session->userdata('user_type')=='5')
		{
			$this->load->view('admin/precost_list_details_non_user', $data);
		}
		if($this->session->userdata('user_type')=='6')
		{
			$this->load->view('admin/precost_list_details_non_user', $data);
		}
	}
	
	
	////////////////////////////////////////////////////////PRE COST COPY///////////////////////////////////////////
	
	public function precost_copy_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'PreCost Copy';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$pcid = $this->uri->segment(3);
		$data['jl'] = $this->Admin->precost_jobno();
		//$data['pcid'] = $pcid;
		$this->load->view('admin/precost_copy_form', $data);
	}
	
	public function precost_copy_list()
	{
		error_reporting('0');
		$this->load->database();
		$this->load->model('Admin');
		$pcid = $this->input->post('jobno');
		$userid = $this->session->userdata('userid');
		$data['bl'] = $this->Admin->buyer_list();
		$data['ofl'] = $this->Admin->orderfor_list();
		$data['osl'] = $this->Admin->orderseason_list();
		$data['sl'] = $this->Admin->accseason_list();
		$data['ffl'] = $this->Admin->factory_list();
		$data['gl'] = $this->Admin->garments_type_list();
		$data['sl'] = $this->Admin->supplier_list();
		$data['nl'] = $this->Admin->nomination_list();
		$data['usl'] = $this->Admin->user_pre_list($userid);
		$data['ul'] = $this->Admin->precost_list_pcid($pcid);
		$data['ul3'] = $this->Admin->product_uom_list();
		$data['fbl'] = $this->Admin->precost_budget_fabric($pcid);
		$data['fbil'] = $this->Admin->fabric_item_list();
		$data['fbtl'] = $this->Admin->fabric_type_list();
		

		$data['tbl'] = $this->Admin->precost_budget_trims($pcid);
		$data['tbil'] = $this->Admin->trims_item_list();
		$data['tbt1'] = $this->Admin->trims_type_list();

		$data['ebl'] = $this->Admin->precost_budget_embellishment($pcid);
		$data['ebil'] = $this->Admin->embellishment_item_list();
		$data['ebt1'] = $this->Admin->embellishment_type_list();
		
		$data['debl'] = $this->Admin->precost_budget_directexpense($pcid);
		$data['debil'] = $this->Admin->directexpense_item_list();
		$data['debt1'] = $this->Admin->directexpense_type_list();
		
		$data['iel'] = $this->Admin->ie_analysis($pcid);
		$data['ielp'] = $this->Admin->production_type_list();
		$this->load->view('admin/precost_copy_list', $data);
	}
	
	public function precost_copy_insert()
	{
		date_default_timezone_set('Asia/Dhaka');
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		
				$orderforid = $this->input->post('orderforid');
				$buyerid = $this->input->post('buyerid');
				$styleid = $this->input->post('styleid');
				$lc = $this->input->post('lc');
				$mlc = $this->input->post('mlc');
				$cmdz = $this->input->post('cmdz');
				$accseasonid = $this->input->post('accseasonid');
				$oqty = $this->input->post('oqty');
				$fpc= $this->input->post('fpc');
				$dmlc = $this->input->post('dmlc');
				$finhdate = $this->input->post('finhdate');
				$prdate = $this->input->post('prdate');
				$fsdate = $this->input->post('fsdate');
				$btp = $this->input->post('btp');
				$garmentstypeid = $this->input->post('garmentstypeid');
				$orderseasonid = $this->input->post('orderseasonid');
				$userid = $this->session->userdata('userid');
				$kamuserid = $this->input->post('kamuserid');
				$authuserid = $this->input->post('authuserid');
				$appuserid = $this->input->post('appuserid');
				$accuserid = $this->input->post('accuserid');
				$config['upload_path']          = APPPATH . '../assets/uploads/sample';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['max_size']             = 1000000;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('sample')) {
					$error = array('error' => $this->upload->display_errors());
					//$this->load->view('upload_form', $error);
				}
				$upload_data = $this->upload->data();
				$sample = $upload_data['file_name'];
				$sample =  str_replace(' ', '_', $sample);
				
				$ins = $this->Admin->precost_copy_insert($ccid,$d,$orderforid,$buyerid, $styleid,$lc,$mlc,$accseasonid, $oqty, $fpc,$cmdz,$dmlc,$finhdate,$prdate,$fsdate,$btp,$garmentstypeid,$orderseasonid,$sample, $userid,$kamuserid,$authuserid,$appuserid,$accuserid);
				
				
				
		/////////////////////////////////////////////////////////FABRIC/////////////////////////////////////////////////		
				
				
				
		$fabricitemid = $this->input->post('fabricitemid');
		$fabrictypeid = $this->input->post('fabrictypeid');
		$supplierid = $this->input->post('supplierid');
		$nomiid = $this->input->post('nomiid');
		$orderqty = $this->input->post('orderqty');
		$cad = $this->input->post('cad');
		$allowance = $this->input->post('allowance');
		$puomid = $this->input->post('puomid');
		$rate = $this->input->post('rate');
		$btb = $this->input->post('btb');

		for ($i = 0; $i < count($fabricitemid); $i++) {
			$data["i"] = $i;
			//$data["fbcdate"] = $fbcdate;
			//$data["pcid"] = $pcid;
			$data["ccid"] = $ccid;
			$data["d"] = $d;
			$data["fabricitemid"] = $fabricitemid[$i];
			$data["fabrictypeid"] = $fabrictypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$data["btb"] = $btb[$i];
			$insb = $this->Admin->precost_fabric_budget_copy_insert($data);
		}
		
		
		
		/////////////////////////////////////////////////TRIMS/////////////////////////////
		
		
		$trimsitemid = $this->input->post('trimsitemid');
		$trimstypeid = $this->input->post('trimstypeid');
		$supplierid = $this->input->post('supplierid');
		$nomiid = $this->input->post('nomiid');
		$orderqty = $this->input->post('orderqty');
		$cad = $this->input->post('cad');
		$allowance = $this->input->post('allowance');
		$puomid = $this->input->post('puomid');
		$rate = $this->input->post('rate');
		$btb = $this->input->post('btb');

		for ($i = 0; $i < count($trimsitemid); $i++) {
			$data["i"] = $i;
			//$data["tbcdate"] = $tbcdate;
			//$data["pcid"] = $pcid;
			$data["ccid"] = $ccid;
			$data["d"] = $d;
			$data["trimsitemid"] = $trimsitemid[$i];
			$data["trimstypeid"] = $trimstypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$data["btb"] = $btb[$i];
			$inst = $this->Admin->precost_trims_budget_copy_insert($data);
		}
		
		
		
		/////////////////////////////////////////////////EMBELLISHMENT/////////////////////////////
		
		
		
		$embellishmentitemid = $this->input->post('embellishmentitemid');
		$embellishmenttypeid = $this->input->post('embellishmenttypeid');
		$supplierid = $this->input->post('supplierid');
		$nomiid = $this->input->post('nomiid');
		$orderqty = $this->input->post('orderqty');
		$cad = $this->input->post('cad');
		$allowance = $this->input->post('allowance');
		$puomid = $this->input->post('puomid');
		$rate = $this->input->post('rate');

		for ($i = 0; $i < count($embellishmentitemid); $i++) {
			$data["i"] = $i;
			//$data["fbcdate"] = $fbcdate;
			$data["ccid"] = $ccid;
			$data["d"] = $d;
			$data["embellishmentitemid"] = $embellishmentitemid[$i];
			$data["embellishmenttypeid"] = $embellishmenttypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$inse = $this->Admin->precost_embellishment_budget_copy_insert($data);
		}
		
		
		/////////////////////////////////////////////////DIRECT EXPENSE/////////////////////////////
		
		$directexpenseitemid = $this->input->post('directexpenseitemid');
		$directexpensetypeid = $this->input->post('directexpensetypeid');
		$supplierid = $this->input->post('supplierid');
		$nomiid = $this->input->post('nomiid');
		$orderqty = $this->input->post('orderqty');
		$cad = $this->input->post('cad');
		$allowance = $this->input->post('allowance');
		$puomid = $this->input->post('puomid');
		$rate = $this->input->post('rate');

		for ($i = 0; $i < count($directexpenseitemid); $i++) {
			$data["i"] = $i;
			//$data["fbcdate"] = $fbcdate;
			$data["ccid"] = $ccid;
			$data["d"] = $d;
			$data["directexpenseitemid"] = $directexpenseitemid[$i];
			$data["directexpensetypeid"] = $directexpensetypeid[$i];
			$data["supplierid"] = $supplierid[$i];
			$data["nomiid"] = $nomiid[$i];
			$data["orderqty"] = $orderqty[$i];
			$data["cad"] = $cad[$i];
			$data["allowance"] = $allowance[$i];
			$data["puomid"] = $puomid[$i];
			$data["rate"] = $rate[$i];
			$insd = $this->Admin->precost_directexpense_budget_copy_insert($data);
		}
		
		
		////////////////////////////////////////////////////////IE ANALYSIS/////////////////////////////////////////////////
		
		$iecdate = $this->input->post('iecdate');
		$productiontypeid = $this->input->post('productiontypeid');
		$man = $this->input->post('man');
		$machine = $this->input->post('machine');
		$ph = $this->input->post('ph');
		$sm = $this->input->post('sm');

		for ($i = 0; $i < count($productiontypeid); $i++) {
			$data["i"] = $i;
			//$data["iecdate"] = $iecdate;
			$data["ccid"] = $ccid;
			$data["d"] = $d;
			$data["productiontypeid"] = $productiontypeid[$i];
			$data["man"] = $man[$i];
			$data["machine"] = $machine[$i];;
			$data["ph"] = $ph[$i];
			$data["sm"] = $sm[$i];
			$insi = $this->Admin->precost_ie_analysis_copy_insert($data);
		}
				
				
		if ($ins == TRUE && $insb == TRUE && $inst == TRUE && $inse == TRUE && $insd == TRUE && $insi == TRUE) 
					{
						$this->session->set_flashdata('Successfully', 'Successfully Updated');
					} 
				else 
					{
						$this->session->set_flashdata('Successfully', 'Failed To Updated');
					}
				redirect('Dashboard/precost_list', 'refresh');		
				
				
				
				
				
				
				
				
				
				

				
		
	}
	
	////////////////////////////////////////////////////////PRE COST PRINT///////////////////////////////////////////

	public function precost_budget_details_print()
	{
		error_reporting('0');
		$this->load->database();
		$this->load->model('Admin');
		$this->load->library('pdf');
		$data['title'] = 'PreCost';
		//$this->load->library('numbertowordconvertsconver');
		$pcid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		
		$data['ul'] = $this->Admin->precost_list_pcid($pcid);
		$data['ul1'] = $this->Admin->precost_budget_fabric($pcid);
		$data['fl'] = $this->Admin->precost_budget_fabric_local($pcid);
		$data['ff'] = $this->Admin->precost_budget_fabric_foreign($pcid);
		$data['ul2'] = $this->Admin->precost_budget_trims($pcid);
		$data['tl'] = $this->Admin->precost_budget_trims_local($pcid);
		$data['tf'] = $this->Admin->precost_budget_trims_foreign($pcid);
		$data['ul3'] = $this->Admin->precost_budget_embellishment($pcid);
		$data['el'] = $this->Admin->precost_budget_embellishment_local($pcid);
		$data['ef'] = $this->Admin->precost_budget_embellishment_foreign($pcid);
		$data['ul4'] = $this->Admin->precost_budget_directexpense($pcid);
		$data['dl'] = $this->Admin->precost_budget_directexpense_local($pcid);
		$data['df'] = $this->Admin->precost_budget_directexpense_foreign($pcid);
		$data['ul5'] = $this->Admin->ie_analysis($pcid);
		$html = $this->load->view('admin/precostpdf', $data, true);
		$this->pdf->createPDF($html, 'PreCost', false);
	}
}
