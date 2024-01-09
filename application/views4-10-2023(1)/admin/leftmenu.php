<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">Pre Costing</li>
			<?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '1') { ?>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Configuration</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">

						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Factory Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/factory_insert_form"><i class="fa fa-circle-o"></i> Add Factory Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/factory_list"><i class="fa fa-circle-o"></i> Factory List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Department Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/department_insert_form"><i class="fa fa-circle-o"></i> Add Department Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/department_list"><i class="fa fa-circle-o"></i> Department List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Designation</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/designation_insert_form"><i class="fa fa-circle-o"></i> Add Designation</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/designation_list"><i class="fa fa-circle-o"></i>Designation List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/usertype_insert_form"><i class="fa fa-circle-o"></i> Add User Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/usertype_list"><i class="fa fa-circle-o"></i>User Type List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Status</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/userstatus_insert_form"><i class="fa fa-circle-o"></i> Add User Status</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/userstatus_list"><i class="fa fa-circle-o"></i>User Status List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Employee Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/user_insert_form"><i class="fa fa-circle-o"></i> Add User Info</a></li>

								<li><a href="<?php echo base_url(); ?>Dashboard/user_list"><i class="fa fa-circle-o"></i> User List</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Master Data</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Buyer Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/buyer_insert_form"><i class="fa fa-circle-o"></i>Add Buyer</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/buyer_list"><i class="fa fa-circle-o"></i>Buyer List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Style Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/style_insert_form"><i class="fa fa-circle-o"></i>Add Style</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/style_list"><i class="fa fa-circle-o"></i>Style List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Season</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/accseason_insert_form"><i class="fa fa-circle-o"></i>Add Season</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/accseason_list"><i class="fa fa-circle-o"></i>Season List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>UOM Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_insert_form"><i class="fa fa-circle-o"></i>Add UOM</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_list"><i class="fa fa-circle-o"></i>Product UOM List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Fabric Item</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_item_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Item</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_item_list"><i class="fa fa-circle-o"></i>Fabric Item List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Fabric Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_type_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_type_list"><i class="fa fa-circle-o"></i>Fabric Type List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Fabric Part</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_part_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Part</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_part_list"><i class="fa fa-circle-o"></i>Fabric Part List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Garments Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/garments_type_insert_form"><i class="fa fa-circle-o"></i>Add Garments Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/garments_type_list"><i class="fa fa-circle-o"></i>Garments Type List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Trims Item</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/trims_item_insert_form"><i class="fa fa-circle-o"></i>Add Trims Item</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/trims_item_list"><i class="fa fa-circle-o"></i>Trims Item List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Trims Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/trims_type_insert_form"><i class="fa fa-circle-o"></i>Add Trims Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/trims_type_list"><i class="fa fa-circle-o"></i>Trims List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Embellishment Item</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/embellishment_item_insert_form"><i class="fa fa-circle-o"></i>Add Embellishment Item</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/embellishment_item_list"><i class="fa fa-circle-o"></i>Embellishment Item List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Embellishment Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/embellishment_type_insert_form"><i class="fa fa-circle-o"></i>Add Embellishment Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/embellishment_type_list"><i class="fa fa-circle-o"></i>Embellishment List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Direct expense Item</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/directexpense_item_insert_form"><i class="fa fa-circle-o"></i>Add Direct Expense Item</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/directexpense_item_list"><i class="fa fa-circle-o"></i>Direct Expense Item List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Direct Expense Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/directexpense_type_insert_form"><i class="fa fa-circle-o"></i>Add Direct Expense Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/directexpense_type_list"><i class="fa fa-circle-o"></i>Direct Expense List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Production Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/production_type_insert_form"><i class="fa fa-circle-o"></i>Add Production Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/production_type_list"><i class="fa fa-circle-o"></i>Production List</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Supplier Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_type_insert_form"><i class="fa fa-circle-o"></i>Add Supplier Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_type_list"><i class="fa fa-circle-o"></i>Supplier Type List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_insert_form"><i class="fa fa-circle-o"></i>Add Supplier</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_list"><i class="fa fa-circle-o"></i>Supplier List</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Accounts Data</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>CPM Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/cpm_insert_form"><i class="fa fa-circle-o"></i>Add CPM</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/cpm_list"><i class="fa fa-circle-o"></i>CPM List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Administrative Overhead</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/aoh_insert_form"><i class="fa fa-circle-o"></i>Add AOH</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/aoh_list"><i class="fa fa-circle-o"></i>AOH List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Export Overhead</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/exoh_insert_form"><i class="fa fa-circle-o"></i>Add EXOH</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/exoh_list"><i class="fa fa-circle-o"></i>EXOH List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Import Overhead</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/imoh_insert_form"><i class="fa fa-circle-o"></i>Add IMOH</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/imoh_list"><i class="fa fa-circle-o"></i>IMOH List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Bill Disc. Commission</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/bidisc_insert_form"><i class="fa fa-circle-o"></i>Add Bill Disc.Commission</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/bidisc_list"><i class="fa fa-circle-o"></i>Bill Disc.Commission List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Interest Rate</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/interestrate_insert_form"><i class="fa fa-circle-o"></i>Add Interest Rate</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/interestrate_list"><i class="fa fa-circle-o"></i>Interest Rate List</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-shirtsinbulk" aria-hidden="true"></i><span>Pre Cost</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>PreCost Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/precost_insert_form"><i class="fa fa-circle-o"></i>Add PreCost</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/precost_list"><i class="fa fa-circle-o"></i>PreCost List</a></li>
							</ul>
						</li>
						
					</ul>
				</li>
			<?php } ?>

			<?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '2') { ?>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Configuration</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">

						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Factory Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/factory_insert_form"><i class="fa fa-circle-o"></i> Add Factory Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/factory_list"><i class="fa fa-circle-o"></i> Factory List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-industry" aria-hidden="true"></i><span>Department Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/department_insert_form"><i class="fa fa-circle-o"></i> Add Department Info</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/department_list"><i class="fa fa-circle-o"></i> Department List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Designation</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/designation_insert_form"><i class="fa fa-circle-o"></i> Add Designation</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/designation_list"><i class="fa fa-circle-o"></i>Designation List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/usertype_insert_form"><i class="fa fa-circle-o"></i> Add User Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/usertype_list"><i class="fa fa-circle-o"></i>User Type List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>User Status</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/userstatus_insert_form"><i class="fa fa-circle-o"></i> Add User Status</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/userstatus_list"><i class="fa fa-circle-o"></i>User Status List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Employee Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/user_insert_form"><i class="fa fa-circle-o"></i> Add User Info</a></li>

								<li><a href="<?php echo base_url(); ?>Dashboard/user_list"><i class="fa fa-circle-o"></i> User List</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Master Data</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Buyer Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/buyer_insert_form"><i class="fa fa-circle-o"></i>Add Buyer</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/buyer_list"><i class="fa fa-circle-o"></i>Buyer List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Style Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/style_insert_form"><i class="fa fa-circle-o"></i>Add Style</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/style_list"><i class="fa fa-circle-o"></i>Style List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Season</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/accseason_insert_form"><i class="fa fa-circle-o"></i>Add Season</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/accseason_list"><i class="fa fa-circle-o"></i>Season List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>UOM Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_insert_form"><i class="fa fa-circle-o"></i>Add UOM</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/product_uom_list"><i class="fa fa-circle-o"></i>Product UOM List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Fabric Item</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_item_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Item</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_item_list"><i class="fa fa-circle-o"></i>Fabric Item List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Fabric Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_type_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_type_list"><i class="fa fa-circle-o"></i>Fabric Type List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Fabric Part</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_part_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Part</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/fabric_part_list"><i class="fa fa-circle-o"></i>Fabric Part List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Garments Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/garments_type_insert_form"><i class="fa fa-circle-o"></i>Add Garments Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/garments_type_list"><i class="fa fa-circle-o"></i>Garments Type List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Trims Item</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/trims_item_insert_form"><i class="fa fa-circle-o"></i>Add Trims Item</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/trims_item_list"><i class="fa fa-circle-o"></i>Trims Item List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Trims Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/trims_type_insert_form"><i class="fa fa-circle-o"></i>Add Trims Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/trims_type_list"><i class="fa fa-circle-o"></i>Trims List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Embellishment Item</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/embellishment_item_insert_form"><i class="fa fa-circle-o"></i>Add Embellishment Item</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/embellishment_item_list"><i class="fa fa-circle-o"></i>Embellishment Item List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Embellishment Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/embellishment_type_insert_form"><i class="fa fa-circle-o"></i>Add Embellishment Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/embellishment_type_list"><i class="fa fa-circle-o"></i>Embellishment List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Direct expense Item</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/directexpense_item_insert_form"><i class="fa fa-circle-o"></i>Add Direct Expense Item</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/directexpense_item_list"><i class="fa fa-circle-o"></i>Direct Expense Item List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Direct Expense Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/directexpense_type_insert_form"><i class="fa fa-circle-o"></i>Add Direct Expense Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/directexpense_type_list"><i class="fa fa-circle-o"></i>Direct Expense List</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Production Type</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/production_type_insert_form"><i class="fa fa-circle-o"></i>Add Production Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/production_type_list"><i class="fa fa-circle-o"></i>Production List</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>Supplier Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_type_insert_form"><i class="fa fa-circle-o"></i>Add Supplier Type</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_type_list"><i class="fa fa-circle-o"></i>Supplier Type List</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_insert_form"><i class="fa fa-circle-o"></i>Add Supplier</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/supplier_list"><i class="fa fa-circle-o"></i>Supplier List</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-shirtsinbulk" aria-hidden="true"></i><span>Pre Cost</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>PreCost Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/precost_insert_form"><i class="fa fa-circle-o"></i>Add PreCost</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/precost_list"><i class="fa fa-circle-o"></i>PreCost List</a></li>
							</ul>
						</li>
					</ul>
				</li>
			<?php } ?>
			<?php if ($this->session->userdata('userid') && $this->session->userdata('user_type') == '3') { ?>

				
				<li class="treeview">
					<a href="#">
						<i class="fa fa-info" aria-hidden="true"></i><span>Accounts Data</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>CPM Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/cpm_insert_form"><i class="fa fa-circle-o"></i>Add CPM</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/cpm_list"><i class="fa fa-circle-o"></i>CPM List</a></li>
							</ul>
						</li>
						
						
						
						
						
						
						
						
						
						
						
						
						
						

						
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-shirtsinbulk" aria-hidden="true"></i><span>Pre Cost</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-id-card" aria-hidden="true"></i> <span>PreCost Info</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>Dashboard/precost_insert_form"><i class="fa fa-circle-o"></i>Add PreCost</a></li>
								<li><a href="<?php echo base_url(); ?>Dashboard/precost_list"><i class="fa fa-circle-o"></i>PreCost List</a></li>
							</ul>
						</li>
						
					</ul>
				</li>
			<?php } ?>
			<?php //endif;
			?>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>