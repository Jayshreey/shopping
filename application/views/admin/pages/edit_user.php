<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard'); ?>">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo base_url('Userdetails/edit_user/'.$user_info_by_id->user_id); ?>">Edit User</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit User</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message');?></p>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo base_url('Userdetails/update_user/'.$user_info_by_id->user_id);?>" method="post">
                    <fieldset>

                       <div class="control-group">
                            <label class="control-label" for="fileInput">Name</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $user_info_by_id->user_name;?>" id="user_name" name="user_name" type="text" required>
                            </div>
                        </div> 
						<div class="control-group">
                            <label class="control-label" for="fileInput">Email</label>
                            <div class="controls">
								<input class="span6 typeahead" value="<?php echo $user_info_by_id->user_email;?>" id="user_email" name="user_email" type="text"required>
                            </div>
                        </div>						
						<div class="control-group">
                            <label class="control-label" for="fileInput">Password</label>
                            <div class="controls">
							<input type="password" value="<?php echo $user_info_by_id->user_password;?>" class="span6 typeahead" name="user_password" id="user_password" value="" required>    
                            </div>
                        </div>
                        
                       <div class="control-group">
                            <label class="control-label" for="fileInput">Mobile No</label>
                            <div class="controls">
								<input class="span6 typeahead" value="<?php echo $user_info_by_id->mobileno;?>" id="mobileno" name="mobileno" type="text" required>
                            </div>
                        </div> 
						<div class="control-group">
                            <label class="control-label" for="fileInput">Assigned City</label>
                            <div class="controls">
							<select class="span6 typeahead" name="city" id="city" required>
								<option value="<?php echo $user_info_by_id->city;?>" <?php if($cities_list == '0'){ echo 'selected';} ?>>Assigned city </option>
								<?php foreach($cities_list as $cit) { ?>
								<option value="<?=$cit->id?>" <?php if($cit->id == $user_info_by_id->city){ echo 'selected';} ?>><?=$cit->city?></option>
							<?php } ?>
						</select>
                            </div>
                            </div>
					<div class="control-group">
                            <label class="control-label" for="fileInput">User Role</label>
                            <div class="controls">
								<select class="span6 typeahead"  name="user_role" required>
								<option value="<?php echo $user_info_by_id->user_role;?>" <?php if($user_role == '0'){ echo 'selected';} ?>>User Role</option>
								<?php foreach($user_role as $ur) { ?>
								<option value="<?=$ur->role_id?>" <?php if($ur->role_id == $user_info_by_id->user_role){ echo 'selected';} ?>><?=$ur->role_name?></option>
							<?php } ?>
									
                    </select>
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label" for="fileInput">Status</label>
                            <div class="controls">
								<select name="status" required>
								<option value="1" <?php if($user_info_by_id->status == '1'){ echo 'selected';} ?>>Active</option>
                                <option value="0" <?php if($user_info_by_id->status == '0'){ echo 'selected'; }?>>Inactive</option>
                            </select>
									
                    </select>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" id="save_category" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

   
    
</div><!--/.fluid-container-->

<!-- end: Content -->