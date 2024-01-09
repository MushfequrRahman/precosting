<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Model
{

	public function fac_insert($facid, $facname, $fac_address)
	{
		$sql = "SELECT * FROM factory WHERE factoryid='$facid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO factory VALUES ('$facid','$facname','$fac_address')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function factory_list()
	{
		$query = "SELECT * FROM factory";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_list_up($facid)
	{
		$sql1 = "SELECT * FROM factory WHERE factoryid='$facid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function flup($fid, $facid, $factoryname, $factory_address)
	{
		$sql = "UPDATE factory SET factoryid='$facid',factoryname='$factoryname',factory_address='$factory_address' WHERE factoryid='$fid'";
		$query = $this->db->query($sql);
	}
	public function department_insert($department)
	{
		$sql = "SELECT * FROM department WHERE departmentname='$department'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO department VALUES ('','$department')";
			$query = $this->db->query($sql);
			return $query;
		}
	}

	public function department_list()
	{
		$query = "SELECT * FROM department ORDER BY departmentname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function department_list_up($deptid)
	{
		$sql1 = "SELECT * FROM department 
		
		WHERE deptid='$deptid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function departmentlup($deptid, $departmentname)
	{
		$sql = "UPDATE department SET deptid='$deptid',departmentname='$departmentname' WHERE deptid='$deptid'";
		$query = $this->db->query($sql);
	}

	public function designation_insert($designation)
	{
		$sql = "SELECT * FROM designation WHERE designation='$designation'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO designation VALUES ('','$designation')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function designation_list()
	{
		$query = "SELECT * FROM designation ORDER BY designation ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function designation_list_up($designationid)
	{
		$sql1 = "SELECT * FROM designation WHERE designationid='$designationid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function designationlup($designationid, $designation)
	{

		$sql = "UPDATE designation SET designation='$designation' WHERE designationid='$designationid'";
		$query = $this->db->query($sql);
	}
	public function usertype_insert($usertype)
	{
		$sql = "SELECT * FROM usertype WHERE usertype='$usertype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO usertype VALUES ('','$usertype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function usertype_list()
	{
		$query = "SELECT * FROM usertype";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function usertype_list_up($usertypeid)
	{
		$sql1 = "SELECT * FROM usertype WHERE usertypeid='$usertypeid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function usertypelup($usertypeid, $usertype)
	{

		$sql = "UPDATE usertype SET usertype='$usertype' WHERE usertypeid='$usertypeid'";
		$query = $this->db->query($sql);
	}


	public function user_insert($factoryid, $departmentid, $name, $designationid, $oemail, $pmobile, $usertypeid, $userid, $password)
	{
		$sql = "SELECT * FROM user WHERE userid='$userid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO user VALUES ('$factoryid','$departmentid','$name','$designationid','$oemail','$pmobile','$usertypeid','$userid','$password','1')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function factorywise_user_list($factoryid)
	{
		$query = "SELECT * FROM user 
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN designation ON designation.desigid=user.designationid
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE user.factoryid='$factoryid' ORDER BY user.userid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function user_list_up($userid)
	{
		$sql1 = "SELECT * FROM user 
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN designation ON designation.desigid=user.designationid
		LEFT JOIN usertype ON usertype.usertypeid=user.user_type
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE userid='$userid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function ulup($factoryid, $departmentid, $designationid, $name, $email, $mobile, $usertypeid, $userstatusid, $userid, $password, $indate)
	{
		$indate = date("Y-m-d", strtotime($indate));
		$sql = "UPDATE user SET factoryid='$factoryid',departmentid='$departmentid',designationid='$designationid',name='$name',email='$email',mobile='$mobile',user_type='$usertypeid',password='$password',ustatus='$userstatusid',indate='$indate' WHERE userid='$userid'";
		return $query = $this->db->query($sql);
	}
	

	public function userstatus_insert($userstatus)
	{
		$sql = "SELECT * FROM userstatus WHERE userstatus='$userstatus'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO userstatus VALUES ('','$userstatus')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function userstatus_list()
	{
		$query = "SELECT * FROM userstatus";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function userstatus_list_up($userstatusid)
	{
		$sql1 = "SELECT * FROM userstatus WHERE userstatusid='$userstatusid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function userstatuslup($userstatusid, $userstatus)
	{
		$sql = "UPDATE userstatus SET userstatus='$userstatus' WHERE userstatusid='$userstatusid'";
		$query = $this->db->query($sql);
	}
	
	public function product_uom_insert($puom)
	{
		$sql = "SELECT * FROM product_uom_insert WHERE puom='$puom'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO product_uom_insert VALUES ('','$puom')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function product_uom_list()
	{
		$query = "SELECT * FROM product_uom_insert";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function product_uom_list_up($puomid)
	{
		$sql1 = "SELECT * FROM product_uom_insert WHERE puomid='$puomid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function productuomlup($puomid, $puom)
	{
		$sql = "UPDATE product_uom_insert SET puom='$puom' WHERE puomid='$puomid'";
		return $query = $this->db->query($sql);
	}
	
	//////////////////////////////////////FABRIC TYPE///////////////////////////

	public function fabric_type_insert($fabrictype)
	{
		$sql = "SELECT * FROM fabric_type WHERE fabrictype='$fabrictype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO fabric_type VALUES ('','$fabrictype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function fabric_type_list()
	{
		$query = "SELECT * FROM fabric_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	
	//////////////////////////////////////////FABRIC PART///////////////////////////

	public function fabric_part_insert($fabricpart)
	{
		$sql = "SELECT * FROM fabric_part WHERE fabricpart='$fabricpart'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO fabric_part VALUES ('','$fabricpart')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function fabric_part_list()
	{
		$query = "SELECT * FROM fabric_part";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	//////////////////////////////////////GARMENTS TYPE///////////////////////////

	public function garments_type_insert($garmentstype)
	{
		$sql = "SELECT * FROM garments_type WHERE garmentstype='$garmentstype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO garments_type VALUES ('','$garmentstype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function garments_type_list()
	{
		$query = "SELECT * FROM garments_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	//////////////////////////////////////////FABRIC ITEM///////////////////////////

	public function fabric_item_insert($fabricitem)
	{
		$sql = "SELECT * FROM fabric_item WHERE fabricitem='$fabricitem'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO fabric_item VALUES ('','$fabricitem')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function fabric_item_list()
	{
		$query = "SELECT * FROM fabric_item";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	//////////////////////////////////////////TRIMS ITEM///////////////////////////

	public function trims_item_insert($trimsitem)
	{
		$sql = "SELECT * FROM trims_item WHERE trimsitem='$trimsitem'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO trims_item VALUES ('','$trimsitem')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function trims_item_list()
	{
		$query = "SELECT * FROM trims_item";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	//////////////////////////////////////TRIMS TYPE///////////////////////////

	public function trims_type_insert($trimstype)
	{
		$sql = "SELECT * FROM trims_type WHERE trimstype='$trimstype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO trims_type VALUES ('','$trimstype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function trims_type_list()
	{
		$query = "SELECT * FROM trims_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	//////////////////////////////////////////EMBELLISHMENT ITEM///////////////////////////

	public function embellishment_item_insert($embellishmentitem)
	{
		$sql = "SELECT * FROM embellishment_item WHERE embellishmentitem='$embellishmentitem'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO embellishment_item VALUES ('','$embellishmentitem')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function embellishment_item_list()
	{
		$query = "SELECT * FROM embellishment_item";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	//////////////////////////////////////EMBELLISHMENT TYPE///////////////////////////

	public function embellishment_type_insert($embellishmenttype)
	{
		$sql = "SELECT * FROM embellishment_type WHERE embellishmenttype='$embellishmenttype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO embellishment_type VALUES ('','$embellishmenttype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function embellishment_type_list()
	{
		$query = "SELECT * FROM embellishment_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	
	//////////////////////////////////////////DIRECT EXPENSE ITEM///////////////////////////

	public function directexpense_item_insert($directexpenseitem)
	{
		$sql = "SELECT * FROM directexpense_item WHERE directexpenseitem='$directexpenseitem'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO directexpense_item VALUES ('','$directexpenseitem')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function directexpense_item_list()
	{
		$query = "SELECT * FROM directexpense_item";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	
	//////////////////////////////////////DIRECT EXPENSE TYPE///////////////////////////

	public function directexpense_type_insert($directexpensetype)
	{
		$sql = "SELECT * FROM directexpense_type WHERE directexpensetype='$directexpensetype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO directexpense_type VALUES ('','$directexpensetype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function directexpense_type_list()
	{
		$query = "SELECT * FROM directexpense_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	//////////////////////////////////////PRODUCTION TYPE///////////////////////////

	public function production_type_insert($productiontype)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM production_type WHERE productiontype='$productiontype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO production_type VALUES ('$ccid','$productiontype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function production_type_list()
	{
		$query = "SELECT * FROM production_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	
	//////////////////////////////////////////////SUPPLIER TYPE/////////////////////////////////

	public function supplier_type_insert($supplirtype)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM supplier_type WHERE suppliertype='$supplirtype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO supplier_type VALUES ('$ccid','$supplirtype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function supplier_type_list()
	{
		$query = "SELECT * FROM supplier_type";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function supplier_insert($stiid,$supplier)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM supplier WHERE supplier='$supplier'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO supplier VALUES ('$ccid','$stiid','$supplier')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function supplier_list()
	{
		$query = "SELECT supplier_type.stiid,suppliertype,supplierid,supplier
					FROM supplier JOIN supplier_type
					ON supplier_type.stiid=supplier.stiid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
		/////////////////////////////////////////////////////////BUYER/////////////////////////////////////////////////////////////
		
	public function buyer_insert($buyername)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM buyer WHERE buyername='$buyername'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO buyer VALUES ('$ccid','$buyername')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function buyer_list()
	{
		$query = "SELECT * FROM buyer";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	
	/////////////////////////////////////////////////////////STYLE/////////////////////////////////////////////////////////////
	
	public function style_insert($stylename,$buyerid)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM style WHERE stylename='$stylename'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO style VALUES ('$ccid','$stylename','$buyerid')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function style_list()
	{
		$query = "SELECT * FROM style
		JOIN buyer ON buyer.buyerid=style.buyerid
		ORDER BY stylename ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function show_styleno($buyerid)
	{
		$query="SELECT * FROM style WHERE buyerid='$buyerid' ORDER BY stylename ASC";
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	/////////////////////////////////////////////////////////ACC SEASON/////////////////////////////////////////////////////////////
		
	public function accseason_insert($fid,$accseason,$accdate)
	{
		$accdate = date("Y-m-d", strtotime($accdate));
		$year=date('Y', strtotime($accdate));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM accseason WHERE accseason='$accseason'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO accseason VALUES ('$ccid','$fid','$accseason','$accdate','$year','1')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function accseason_list()
	{
		$query = "SELECT * FROM accseason";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	/////////////////////////////////////////////////////////CPM/////////////////////////////////////////////////////////////
		
	public function cpm_insert($accseasonid,$cpm)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM cpm WHERE accseasonid='$accseasonid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO cpm VALUES ('$ccid','$accseasonid','$cpm')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function cpm_list()
	{
		$query = "SELECT * FROM cpm
		JOIN accseason ON accseason.accseasonid=cpm.accseasonid";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	/////////////////////////////////////////////////////////Administrative Overhead/////////////////////////////////////////////////////////////
		
	public function aoh_insert($accseasonid,$aoh)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM aoh WHERE accseasonid='$accseasonid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO aoh VALUES ('$ccid','$accseasonid','$aoh')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function aoh_list()
	{
		$query = "SELECT * FROM aoh
		JOIN accseason ON accseason.accseasonid=aoh.accseasonid";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	/////////////////////////////////////////////////////////Export Overhead/////////////////////////////////////////////////////////////
		
	public function exoh_insert($accseasonid,$buyerid,$exoh)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM exoh WHERE accseasonid='$accseasonid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO exoh VALUES ('$ccid','$accseasonid','$buyerid','$exoh')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function exoh_list()
	{
		$query = "SELECT * FROM exoh
		JOIN accseason ON accseason.accseasonid=exoh.accseasonid
		JOIN buyer ON buyer.buyerid=exoh.buyerid";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	/////////////////////////////////////////////////////////Import Overhead/////////////////////////////////////////////////////////////
		
	public function imoh_insert($accseasonid,$stiid,$imoh)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM imoh WHERE accseasonid='$accseasonid' AND stiid='$stiid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO imoh VALUES ('$ccid','$accseasonid','$stiid','$imoh')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function imoh_list()
	{
		$query = "SELECT * FROM imoh
		JOIN accseason ON accseason.accseasonid=imoh.accseasonid
		JOIN supplier_type ON supplier_type.stiid=imoh.stiid";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	/////////////////////////////////////////////////////////Bill Discounting Commission/////////////////////////////////////////////////////////////
		
	public function bidisc_insert($accseasonid,$buyerid,$bidisc)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM bill_disc_commission WHERE accseasonid='$accseasonid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO bill_disc_commission VALUES ('$ccid','$accseasonid','$buyerid','$bidisc')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function bidisc_list()
	{
		$query = "SELECT * FROM bill_disc_commission
		JOIN accseason ON accseason.accseasonid=bill_disc_commission.accseasonid
		JOIN buyer ON buyer.buyerid=bill_disc_commission.buyerid";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	/////////////////////////////////////////////////////////Interest Rate/////////////////////////////////////////////////////////////
		
	public function interestrate_insert($accseasonid,$intrate)
	{
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$sql = "SELECT * FROM interestrate WHERE accseasonid='$accseasonid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO interestrate VALUES ('$ccid','$accseasonid','$intrate')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function interestrate_list()
	{
		$query = "SELECT * FROM interestrate
		JOIN accseason ON accseason.accseasonid=interestrate.accseasonid";
		$result = $this->db->query($query);
		return $result->result_array();
	}


	/////////////////////////////////////////////////////////PRECOST/////////////////////////////////////////////////////////////
		
	public function precost_insert($pcdate,$buyerid, $styleid,$lc,$mlc,$accseasonid, $oqty, $fv,$cmdz,$dmlc,$finhdate,$prdate,$fsdate,$btp,$garmentstypeid,$sample, $userid)
	{
		$pcdate = date("Y-m-d", strtotime($pcdate));
		$finhdate = date("Y-m-d", strtotime($finhdate));
		$prdate = date("Y-m-d", strtotime($prdate));
		$fsdate = date("Y-m-d", strtotime($fsdate));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		// $sql = "SELECT * FROM precost_insert WHERE buyerid='$buyerid' AND styleid='$styleid' AND seasonid='$seasonid'";
		// $query = $this->db->query($sql);
		// if ($query->num_rows() == 1) {
		// 	return false;
		// } else {
			$sql = "INSERT INTO precost_insert VALUES ('$ccid','$pcdate','$buyerid','$styleid','$lc','$mlc','$accseasonid','$oqty','$fv','$cmdz','$dmlc','$finhdate','$prdate','$fsdate','$btp','$garmentstypeid','$sample','1','1','1','1','1','1','1','$userid')";
			$query = $this->db->query($sql);
			return $query;
		// }
	}
	public function precost_list($userid)
	{
		$query = "SELECT * FROM precost_insert
		JOIN buyer ON buyer.buyerid=precost_insert.buyerid
		JOIN style ON style.styleid=precost_insert.styleid 
		WHERE puserid='$userid' AND ship_status='1' AND confirm_status='1'
		ORDER BY pcid DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function fabric_budget_insert($data)
	{
		//$frcdate = date("Y-m-d", strtotime($frcdate));
		date_default_timezone_set('Asia/Dhaka');
		
		$data['fbcdate'] = date("Y-m-d", strtotime($data['fbcdate']));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$ccid = $ccid . $data['i'];
		$sql = "INSERT INTO fabric_budget VALUES ('$ccid','$data[fbcdate]','$data[pcid]','$data[fabricitemid]','$data[fabrictypeid]','$data[supplierid]','$data[orderqty]','$data[cad]','$data[allowance]','$data[puomid]','$data[rate]')";
		$query = $this->db->query($sql);

		$sql1 = "UPDATE precost_insert SET bf='0' WHERE pcid='$data[pcid]'";
		$this->db->query($sql1);
		return $query;
	}
	public function trims_budget_insert($data)
	{
		//$frcdate = date("Y-m-d", strtotime($frcdate));
		date_default_timezone_set('Asia/Dhaka');
		
		$data['tbcdate'] = date("Y-m-d", strtotime($data['tbcdate']));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$ccid = $ccid . $data['i'];
		$sql = "INSERT INTO trims_budget VALUES ('$ccid','$data[tbcdate]','$data[pcid]','$data[trimsitemid]','$data[trimstypeid]','$data[supplierid]','$data[orderqty]','$data[cad]','$data[allowance]','$data[puomid]','$data[rate]')";
		$query = $this->db->query($sql);

		$sql1 = "UPDATE precost_insert SET bt='0' WHERE pcid='$data[pcid]'";
		$this->db->query($sql1);
		return $query;
	}
	public function embellishment_budget_insert($data)
	{
		//$frcdate = date("Y-m-d", strtotime($frcdate));
		date_default_timezone_set('Asia/Dhaka');
		
		$data['ebcdate'] = date("Y-m-d", strtotime($data['ebcdate']));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$ccid = $ccid . $data['i'];
		$sql = "INSERT INTO embellishment_budget VALUES ('$ccid','$data[ebcdate]','$data[pcid]','$data[embellishmentitemid]','$data[embellishmenttypeid]','$data[supplierid]','$data[orderqty]','$data[cad]','$data[allowance]','$data[puomid]','$data[rate]')";
		$query = $this->db->query($sql);

		$sql1 = "UPDATE precost_insert SET be='0' WHERE pcid='$data[pcid]'";
		$this->db->query($sql1);
		return $query;
	}
	public function directexpense_budget_insert($data)
	{
		//$frcdate = date("Y-m-d", strtotime($frcdate));
		date_default_timezone_set('Asia/Dhaka');
		
		$data['debcdate'] = date("Y-m-d", strtotime($data['debcdate']));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$ccid = $ccid . $data['i'];
		$sql = "INSERT INTO directexpense_budget VALUES ('$ccid','$data[debcdate]','$data[pcid]','$data[directexpenseitemid]','$data[directexpensetypeid]','$data[supplierid]','$data[orderqty]','$data[cad]','$data[allowance]','$data[puomid]','$data[rate]')";
		$query = $this->db->query($sql);

		$sql1 = "UPDATE precost_insert SET bde='0' WHERE pcid='$data[pcid]'";
		$this->db->query($sql1);
		return $query;
	}
	public function ie_analysis_insert($data)
	{
		//$frcdate = date("Y-m-d", strtotime($frcdate));
		date_default_timezone_set('Asia/Dhaka');
		
		$data['iecdate'] = date("Y-m-d", strtotime($data['iecdate']));
		$d = date('Y-m-d');
		$t = date("H:i:s");
		$d1 = str_replace("-", "", $d);
		$t1 = str_replace(":", "", $t);
		$ccid = $d1 . $t1;
		$ccid = $ccid . $data['i'];
		$sql = "INSERT INTO ie_analysis VALUES ('$ccid','$data[iecdate]','$data[pcid]','$data[productiontypeid]','$data[man]','$data[machine]','$data[ph]','$data[sm]')";
		$query = $this->db->query($sql);

		$sql1 = "UPDATE precost_insert SET ie='0' WHERE pcid='$data[pcid]'";
		$this->db->query($sql1);
		return $query;
	}
	public function precost_list_pcid($pcid)
	{
		$query = "SELECT * FROM precost_insert
		JOIN buyer ON buyer.buyerid=precost_insert.buyerid
		JOIN style ON style.styleid=precost_insert.styleid
		JOIN accseason ON accseason.accseasonid=precost_insert.accseasonid
		JOIN garments_type ON garments_type.garmentstypeid=precost_insert.garmentstypeid
		JOIN cpm ON cpm.accseasonid=precost_insert.accseasonid
		JOIN aoh ON aoh.accseasonid=precost_insert.accseasonid 
		JOIN exoh ON exoh.accseasonid=precost_insert.accseasonid AND
					 exoh.buyerid=precost_insert.buyerid
		JOIN imoh_foreign ON imoh_foreign.accseasonid=precost_insert.accseasonid
		JOIN imoh_local ON imoh_local.accseasonid=precost_insert.accseasonid
		JOIN bill_disc_commission ON bill_disc_commission.accseasonid=precost_insert.accseasonid AND
									 bill_disc_commission.buyerid=precost_insert.buyerid
		JOIN interestrate ON interestrate.accseasonid=precost_insert.accseasonid
		WHERE pcid='$pcid'
		ORDER BY pcid DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function precost_budget_fabric($pcid)
	{
		$query = "SELECT * FROM precost_insert
		JOIN buyer ON buyer.buyerid=precost_insert.buyerid
		JOIN style ON style.styleid=precost_insert.styleid
		JOIN fabric_budget ON fabric_budget.pcid=precost_insert.pcid
		JOIN fabric_item ON fabric_item.fabricitemid=fabric_budget.fabricitemid
		JOIN fabric_type ON fabric_type.fabrictypeid=fabric_budget.fabrictypeid
		JOIN supplier_view ON supplier_view.supplierid=fabric_budget.supplierid
		JOIN product_uom_insert ON product_uom_insert.puomid=fabric_budget.puomid 
		WHERE precost_insert.pcid='$pcid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function precost_budget_fabric_local($pcid)
	{
		$query = "SELECT * FROM precost_insert
		JOIN buyer ON buyer.buyerid=precost_insert.buyerid
		JOIN style ON style.styleid=precost_insert.styleid
		JOIN fabric_budget ON fabric_budget.pcid=precost_insert.pcid
		JOIN fabric_item ON fabric_item.fabricitemid=fabric_budget.fabricitemid
		JOIN fabric_type ON fabric_type.fabrictypeid=fabric_budget.fabrictypeid
		JOIN supplier_view ON supplier_view.supplierid=fabric_budget.supplierid
		JOIN product_uom_insert ON product_uom_insert.puomid=fabric_budget.puomid 
		WHERE precost_insert.pcid='$pcid' AND stiid='20230413110653'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function precost_budget_fabric_foreign($pcid)
	{
		$query = "SELECT * FROM precost_insert
		JOIN buyer ON buyer.buyerid=precost_insert.buyerid
		JOIN style ON style.styleid=precost_insert.styleid
		JOIN fabric_budget ON fabric_budget.pcid=precost_insert.pcid
		JOIN fabric_item ON fabric_item.fabricitemid=fabric_budget.fabricitemid
		JOIN fabric_type ON fabric_type.fabrictypeid=fabric_budget.fabrictypeid
		JOIN supplier_view ON supplier_view.supplierid=fabric_budget.supplierid
		JOIN product_uom_insert ON product_uom_insert.puomid=fabric_budget.puomid 
		WHERE precost_insert.pcid='$pcid' AND stiid='20230413110659'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function precost_budget_trims($pcid)
	{
		$query = "SELECT * FROM precost_insert
		JOIN buyer ON buyer.buyerid=precost_insert.buyerid
		JOIN style ON style.styleid=precost_insert.styleid
		JOIN trims_budget ON trims_budget.pcid=precost_insert.pcid
		JOIN trims_item ON trims_item.trimsitemid=trims_budget.trimsitemid
		JOIN trims_type ON trims_type.trimstypeid=trims_budget.trimstypeid
		JOIN supplier_view ON supplier_view.supplierid=trims_budget.supplierid
		JOIN product_uom_insert ON product_uom_insert.puomid=trims_budget.puomid 
		WHERE precost_insert.pcid='$pcid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function precost_budget_trims_local($pcid)
	{
		$query = "SELECT * FROM precost_insert
		JOIN buyer ON buyer.buyerid=precost_insert.buyerid
		JOIN style ON style.styleid=precost_insert.styleid
		JOIN trims_budget ON trims_budget.pcid=precost_insert.pcid
		JOIN trims_item ON trims_item.trimsitemid=trims_budget.trimsitemid
		JOIN trims_type ON trims_type.trimstypeid=trims_budget.trimstypeid
		JOIN supplier_view ON supplier_view.supplierid=trims_budget.supplierid
		JOIN product_uom_insert ON product_uom_insert.puomid=trims_budget.puomid 
		WHERE precost_insert.pcid='$pcid' AND stiid='20230413110653'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function precost_budget_trims_foreign($pcid)
	{
		$query = "SELECT * FROM precost_insert
		JOIN buyer ON buyer.buyerid=precost_insert.buyerid
		JOIN style ON style.styleid=precost_insert.styleid
		JOIN trims_budget ON trims_budget.pcid=precost_insert.pcid
		JOIN trims_item ON trims_item.trimsitemid=trims_budget.trimsitemid
		JOIN trims_type ON trims_type.trimstypeid=trims_budget.trimstypeid
		JOIN supplier_view ON supplier_view.supplierid=trims_budget.supplierid
		JOIN product_uom_insert ON product_uom_insert.puomid=trims_budget.puomid 
		WHERE precost_insert.pcid='$pcid' AND stiid='20230413110659'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function precost_budget_embellishment($pcid)
	{
		$query = "SELECT * FROM precost_insert
		JOIN buyer ON buyer.buyerid=precost_insert.buyerid
		JOIN style ON style.styleid=precost_insert.styleid
		JOIN embellishment_budget ON embellishment_budget.pcid=precost_insert.pcid
		JOIN embellishment_item ON embellishment_item.embellishmentitemid=embellishment_budget.embellishmentitemid
		JOIN embellishment_type ON embellishment_type.embellishmenttypeid=embellishment_budget.embellishmenttypeid
		JOIN supplier_view ON supplier_view.supplierid=embellishment_budget.supplierid
		JOIN product_uom_insert ON product_uom_insert.puomid=embellishment_budget.puomid 
		WHERE precost_insert.pcid='$pcid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function precost_budget_embellishment_local($pcid)
	{
		$query = "SELECT * FROM precost_insert
		JOIN buyer ON buyer.buyerid=precost_insert.buyerid
		JOIN style ON style.styleid=precost_insert.styleid
		JOIN embellishment_budget ON embellishment_budget.pcid=precost_insert.pcid
		JOIN embellishment_item ON embellishment_item.embellishmentitemid=embellishment_budget.embellishmentitemid
		JOIN embellishment_type ON embellishment_type.embellishmenttypeid=embellishment_budget.embellishmenttypeid
		JOIN supplier_view ON supplier_view.supplierid=embellishment_budget.supplierid
		JOIN product_uom_insert ON product_uom_insert.puomid=embellishment_budget.puomid 
		WHERE precost_insert.pcid='$pcid' AND stiid='20230413110653'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function precost_budget_embellishment_foreign($pcid)
	{
		$query = "SELECT * FROM precost_insert
		JOIN buyer ON buyer.buyerid=precost_insert.buyerid
		JOIN style ON style.styleid=precost_insert.styleid
		JOIN embellishment_budget ON embellishment_budget.pcid=precost_insert.pcid
		JOIN embellishment_item ON embellishment_item.embellishmentitemid=embellishment_budget.embellishmentitemid
		JOIN embellishment_type ON embellishment_type.embellishmenttypeid=embellishment_budget.embellishmenttypeid
		JOIN supplier_view ON supplier_view.supplierid=embellishment_budget.supplierid
		JOIN product_uom_insert ON product_uom_insert.puomid=embellishment_budget.puomid 
		WHERE precost_insert.pcid='$pcid' AND stiid='20230413110659'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function precost_budget_directexpense($pcid)
	{
		$query = "SELECT * FROM precost_insert
		JOIN buyer ON buyer.buyerid=precost_insert.buyerid
		JOIN style ON style.styleid=precost_insert.styleid
		JOIN directexpense_budget ON directexpense_budget.pcid=precost_insert.pcid
		JOIN directexpense_item ON directexpense_item.directexpenseitemid=directexpense_budget.directexpenseitemid
		JOIN directexpense_type ON directexpense_type.directexpensetypeid=directexpense_budget.directexpensetypeid
		JOIN supplier_view ON supplier_view.supplierid=directexpense_budget.supplierid
		JOIN product_uom_insert ON product_uom_insert.puomid=directexpense_budget.puomid 
		WHERE precost_insert.pcid='$pcid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function precost_budget_directexpense_local($pcid)
	{
		$query = "SELECT * FROM precost_insert
		JOIN buyer ON buyer.buyerid=precost_insert.buyerid
		JOIN style ON style.styleid=precost_insert.styleid
		JOIN directexpense_budget ON directexpense_budget.pcid=precost_insert.pcid
		JOIN directexpense_item ON directexpense_item.directexpenseitemid=directexpense_budget.directexpenseitemid
		JOIN directexpense_type ON directexpense_type.directexpensetypeid=directexpense_budget.directexpensetypeid
		JOIN supplier_view ON supplier_view.supplierid=directexpense_budget.supplierid
		JOIN product_uom_insert ON product_uom_insert.puomid=directexpense_budget.puomid 
		WHERE precost_insert.pcid='$pcid' AND stiid='20230413110653'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function precost_budget_directexpense_foreign($pcid)
	{
		$query = "SELECT * FROM precost_insert
		JOIN buyer ON buyer.buyerid=precost_insert.buyerid
		JOIN style ON style.styleid=precost_insert.styleid
		JOIN directexpense_budget ON directexpense_budget.pcid=precost_insert.pcid
		JOIN directexpense_item ON directexpense_item.directexpenseitemid=directexpense_budget.directexpenseitemid
		JOIN directexpense_type ON directexpense_type.directexpensetypeid=directexpense_budget.directexpensetypeid
		JOIN supplier_view ON supplier_view.supplierid=directexpense_budget.supplierid
		JOIN product_uom_insert ON product_uom_insert.puomid=directexpense_budget.puomid 
		WHERE precost_insert.pcid='$pcid' AND stiid='20230413110659'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function ie_analysis($pcid)
	{
		$query = "SELECT * FROM ie_analysis
		JOIN production_type ON production_type.productiontypeid=ie_analysis.productiontypeid
		JOIN precost_insert ON precost_insert.pcid=ie_analysis.pcid
		WHERE precost_insert.pcid='$pcid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	
}
