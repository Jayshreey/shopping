<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard') ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('Userdetails/user_info') ?>">User Details</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <!-- <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Category</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div> -->
            <style type="text/css">
                #result{color:red;padding:5px}
                #result p{color:red}
            </style>
             <a class="btn btn-primary" href="<?php echo base_url('Userdetails/add_user'); ?>">
                Add user
            </a>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable display nowrap">
                    <thead>
                        <tr>
                            <th>User id</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Role</th>
							<th>Mobile No</th>
							<th>City</th>
							<th>Status</th>
							<th>Actions</th>
                        </tr>
                    </thead> 
<tbody>
				
				<?php 
					foreach($user_detail as $u) : ?>

						<tr>
							<td> <?php echo $u['user_id']; ?> </td>
							<td> <?php echo $u['user_name']; ?> </td>
							<td> <?php echo $u['user_email']; ?> </td>
							<td> <?php echo $u['role_name']; ?> </td>
							<td> <?php echo $u['mobileno']; ?> </td>
							<td> <?php echo $u['city']; ?> </td>	
							<td> <?php if($u['status']== 1){ echo 'Active'; }else { echo 'Inactive'; } ?> </td>								
							<td><a class="btn btn-info" href="<?php echo base_url(). 'Userdetails/edit_user/'.$u['user_id'];?>">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
							<a class="btn btn-danger" href="<?php echo base_url(). 'Userdetails/delete_user/'.$u['user_id'];?>"><i class="halflings-icon white trash"></i></a></td>
						</tr>


					<?php endforeach; ?>
				</tbody>						
                    <?php /*<tbody>
                        <?php
                        $i = 0;
                        foreach ($all_categroy as $single_category) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $single_category->category_name ?></td>
                                <td><?php echo $single_category->category_description ?></td>
                                <td class="center">
                                    <?php if ($single_category->publication_status == 1) { ?>
                                        <span class="label label-success">Published</span>
                                    <?php } else {
                                        ?>
                                        <span class="label label-danger" style="background:red">Unpublished</span>
                                        <?php }
                                    ?>
                                </td>
                                <td class="center">
                                    <?php if ($single_category->publication_status == 0) { ?>
                                        <a class="btn btn-success" href="<?php echo base_url('published/category/' . $single_category->id); ?>">
                                            <i class="halflings-icon white thumbs-up"></i>  
                                        </a>
                                    <?php } else {
                                        ?>
                                        <a class="btn btn-danger" href="<?php echo base_url('unpublished/category/' . $single_category->id); ?>">
                                            <i class="halflings-icon white thumbs-down"></i>  
                                        </a>
                                        <?php }
                                    ?>

                                    <a class="btn btn-info" href="<?php echo base_url('edit/category/' . $single_category->id); ?>">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url('delete/category/' . $single_category->id); ?>">
                                        <i class="halflings-icon white trash"></i> 
                                    </a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>*/?>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->