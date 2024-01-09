<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Fabric</li>
        <?php if($this->session->userdata('userid') && $this->session->userdata('user_type')=='1')
		{?>
       
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
            			<li><a href="<?php echo base_url();?>Dashboard/factory_insert_form"><i class="fa fa-circle-o"></i> Add Factory Info</a></li>
                		<li><a href="<?php echo base_url();?>Dashboard/factory_list"><i class="fa fa-circle-o"></i> Factory List</a></li>
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
            			<li><a href="<?php echo base_url();?>Dashboard/department_insert_form"><i class="fa fa-circle-o"></i> Add Department Info</a></li>
                		<li><a href="<?php echo base_url();?>Dashboard/department_list"><i class="fa fa-circle-o"></i> Department List</a></li>
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
            			<li><a href="<?php echo base_url();?>Dashboard/designation_insert_form"><i class="fa fa-circle-o"></i> Add Designation</a></li>
                		<li><a href="<?php echo base_url();?>Dashboard/designation_list"><i class="fa fa-circle-o"></i>Designation List</a></li>
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
            			<li><a href="<?php echo base_url();?>Dashboard/usertype_insert_form"><i class="fa fa-circle-o"></i> Add User Type</a></li>
                		<li><a href="<?php echo base_url();?>Dashboard/usertype_list"><i class="fa fa-circle-o"></i>User Type List</a></li>
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
            			<li><a href="<?php echo base_url();?>Dashboard/userstatus_insert_form"><i class="fa fa-circle-o"></i> Add User Status</a></li>
                		<li><a href="<?php echo base_url();?>Dashboard/userstatus_list"><i class="fa fa-circle-o"></i>User Status List</a></li>
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
            			<li><a href="<?php echo base_url();?>Dashboard/user_insert_form"><i class="fa fa-circle-o"></i> Add User Info</a></li>
                		
                		<li><a href="<?php echo base_url();?>Dashboard/user_list"><i class="fa fa-circle-o"></i> User List</a></li>
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
                    	<li><a href="<?php echo base_url();?>Dashboard/buyer_insert_form"><i class="fa fa-circle-o"></i>Add Buyer</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/buyer_list"><i class="fa fa-circle-o"></i>Buyer List</a></li>
            		</ul>
        		</li>
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Job No Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
                    	<li><a href="<?php echo base_url();?>Dashboard/jobno_insert_form"><i class="fa fa-circle-o"></i>Add Job No</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/jobno_list"><i class="fa fa-circle-o"></i>Job No List</a></li>
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
                    	<li><a href="<?php echo base_url();?>Dashboard/style_insert_form"><i class="fa fa-circle-o"></i>Add Style</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/style_list"><i class="fa fa-circle-o"></i>Style List</a></li>
            		</ul>
        		</li>
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Order Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
                    	<li><a href="<?php echo base_url();?>Dashboard/order_insert_form"><i class="fa fa-circle-o"></i>Add Order</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/order_list"><i class="fa fa-circle-o"></i>Order List</a></li>
            		</ul>
        		</li>
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Color Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
                    	<li><a href="<?php echo base_url();?>Dashboard/color_insert_form"><i class="fa fa-circle-o"></i>Add Color</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/color_list"><i class="fa fa-circle-o"></i>Color List</a></li>
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
                    	<li><a href="<?php echo base_url();?>Dashboard/product_uom_insert_form"><i class="fa fa-circle-o"></i>Add UOM</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/product_uom_list"><i class="fa fa-circle-o"></i>Product UOM List</a></li>
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
                    	<li><a href="<?php echo base_url();?>Dashboard/fabric_type_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Type</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/fabric_type_list"><i class="fa fa-circle-o"></i>Fabric Type List</a></li>
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
                        <li><a href="<?php echo base_url();?>Dashboard/fabric_part_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Part</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/fabric_part_list"><i class="fa fa-circle-o"></i>Fabric Part List</a></li>
            		</ul>
        		</li>
            </ul>
            
        </li>
        
        <li class="treeview">
        	<a href="#">
            	<i class="fa fa-shirtsinbulk" aria-hidden="true"></i><span>Fabric</span>
            	<span class="pull-right-container">
              		<i class="fa fa-angle-left pull-right"></i>
            	</span>
          	</a>
          	<ul class="treeview-menu">
            	<li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Fabric Pre Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
                    	
                        
                        <li><a href="<?php echo base_url();?>Dashboard/rackno_insert_form"><i class="fa fa-circle-o"></i>Add Rack No</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/rackno_list"><i class="fa fa-circle-o"></i>Rack No List</a></li>
                       
            		</ul>
        		</li>
                
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Fabric Info/Movement</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
                    	
                        <li><a href="<?php echo base_url();?>Dashboard/fabric_received_insert_form"><i class="fa fa-circle-o"></i>Fabric Receive</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/date_wise_fabric_received_form"><i class="fa fa-circle-o"></i>Date Wise Fabric Received</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/rack_wise_fabric_received_form"><i class="fa fa-circle-o"></i>Rack Wise Fabric</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/jobno_wise_fabric_received_form"><i class="fa fa-circle-o"></i>Job No Wise Fabric</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/order_wise_fabric_report_form"><i class="fa fa-circle-o"></i>Order Wise Fabric Report</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/lot_wise_fabric_report_form"><i class="fa fa-circle-o"></i>Batch Wise Fabric Report</a></li>
            		</ul>
        		</li>
            </ul>
        </li>
        
		
       
        
      
        <?php } ?>
        
        <?php if($this->session->userdata('userid') && $this->session->userdata('user_type')=='2')
		{?>
       

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
                    	<li><a href="<?php echo base_url();?>Dashboard/buyer_insert_form"><i class="fa fa-circle-o"></i>Add Buyer</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/buyer_list"><i class="fa fa-circle-o"></i>Buyer List</a></li>
            		</ul>
        		</li>
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Job No Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
                    	<li><a href="<?php echo base_url();?>Dashboard/jobno_insert_form"><i class="fa fa-circle-o"></i>Add Job No</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/jobno_list"><i class="fa fa-circle-o"></i>Job No List</a></li>
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
                    	<li><a href="<?php echo base_url();?>Dashboard/style_insert_form"><i class="fa fa-circle-o"></i>Add Style</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/style_list"><i class="fa fa-circle-o"></i>Style List</a></li>
            		</ul>
        		</li>
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Order Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
                    	<li><a href="<?php echo base_url();?>Dashboard/order_insert_form"><i class="fa fa-circle-o"></i>Add Order</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/order_list"><i class="fa fa-circle-o"></i>Order List</a></li>
            		</ul>
        		</li>
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Color Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
                    	<li><a href="<?php echo base_url();?>Dashboard/color_insert_form"><i class="fa fa-circle-o"></i>Add Color</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/color_list"><i class="fa fa-circle-o"></i>Color List</a></li>
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
                    	<li><a href="<?php echo base_url();?>Dashboard/product_uom_insert_form"><i class="fa fa-circle-o"></i>Add UOM</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/product_uom_list"><i class="fa fa-circle-o"></i>Product UOM List</a></li>
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
                    	<li><a href="<?php echo base_url();?>Dashboard/fabric_type_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Type</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/fabric_type_list"><i class="fa fa-circle-o"></i>Fabric Type List</a></li>
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
                        <li><a href="<?php echo base_url();?>Dashboard/fabric_part_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Part</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/fabric_part_list"><i class="fa fa-circle-o"></i>Fabric Part List</a></li>
            		</ul>
        		</li>
            </ul>
            
        </li>
        
        <li class="treeview">
        	<a href="#">
            	<i class="fa fa-shirtsinbulk" aria-hidden="true"></i><span>Fabric</span>
            	<span class="pull-right-container">
              		<i class="fa fa-angle-left pull-right"></i>
            	</span>
          	</a>
          	<ul class="treeview-menu">
            	<li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Fabric Pre Info</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
                    	
                       <?php /*?> <li><a href="<?php echo base_url();?>Dashboard/fabric_type_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Type</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/fabric_type_list"><i class="fa fa-circle-o"></i>Fabric Type List</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/fabric_part_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Part</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/fabric_part_list"><i class="fa fa-circle-o"></i>Fabric Part List</a></li><?php */?>
                        <li><a href="<?php echo base_url();?>Dashboard/rackno_insert_form"><i class="fa fa-circle-o"></i>Add Rack No</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/rackno_list"><i class="fa fa-circle-o"></i>Rack No List</a></li>
                        <?php /*?><li><a href="<?php echo base_url();?>Dashboard/fabric_received_insert_form"><i class="fa fa-circle-o"></i>Fabric Receive</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/date_wise_fabric_received_form"><i class="fa fa-circle-o"></i>Date Wise Fabric Received</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/rack_wise_fabric_received_form"><i class="fa fa-circle-o"></i>Rack Wise Fabric Received/Delivery</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/order_wise_fabric_report_form"><i class="fa fa-circle-o"></i>Order Wise Fabric Report</a></li><?php */?>
            		</ul>
        		</li>
                
                <li class="treeview">
        			<a href="#">
            			<i class="fa fa-id-card" aria-hidden="true"></i> <span>Fabric Info/Movement</span>
            				<span class="pull-right-container">
              					<i class="fa fa-angle-left pull-right"></i>
            				</span>
          			</a>
          			<ul class="treeview-menu">
                    	<?php /*?><li><a href="<?php echo base_url();?>Dashboard/product_uom_insert_form"><i class="fa fa-circle-o"></i>Add UOM</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/product_uom_list"><i class="fa fa-circle-o"></i>Product UOM List</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/fabric_type_insert_form"><i class="fa fa-circle-o"></i>Add Fabric Type</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/fabric_type_list"><i class="fa fa-circle-o"></i>Fabric Type List</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/rackno_insert_form"><i class="fa fa-circle-o"></i>Add Rack No</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/rackno_list"><i class="fa fa-circle-o"></i>Rack No List</a></li><?php */?>
                        <li><a href="<?php echo base_url();?>Dashboard/fabric_received_insert_form"><i class="fa fa-circle-o"></i>Fabric Receive</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/date_wise_fabric_received_form"><i class="fa fa-circle-o"></i>Date Wise Fabric Received</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/rack_wise_fabric_received_form"><i class="fa fa-circle-o"></i>Rack Wise Fabric <br/> Received/Delivery</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/jobno_wise_fabric_received_form"><i class="fa fa-circle-o"></i>Job No Wise Fabric <br/> Received/Delivery</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/order_wise_fabric_report_form"><i class="fa fa-circle-o"></i>Order Wise Fabric Report</a></li>
                        <li><a href="<?php echo base_url();?>Dashboard/lot_wise_fabric_report_form"><i class="fa fa-circle-o"></i>Batch/Lot Wise Fabric Report</a></li>
            		</ul>
        		</li>
            </ul>
        </li>
        
		
       
        
      
        <?php } ?>
       
        <?php //endif;?>
        
        												
        
        
     </ul>
  </section>
    <!-- /.sidebar -->
  </aside>