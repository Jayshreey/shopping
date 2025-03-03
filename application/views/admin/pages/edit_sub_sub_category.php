<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo base_url('edit/sub_sub_category/'.$category_info_by_id->id)?>">Edit Sub sub category</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Sub sub category</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('update/sub_sub_category/'.$category_info_by_id->id);?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Sub sub category Name</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $category_info_by_id->category_name;?>" id="category_name" name="category_name" type="text"/>
                            </div>
                        </div>          
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Sub sub category Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="category_description" name="category_description" rows="3">
                                    <?php echo $category_info_by_id->category_description;?>
                                </textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Sub Category Image</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="sub_category_image" id="fileInput" type="file"/>
                                <input class="span6 typeahead" name="sub_category_delete_image" value="<?php echo base_url('uploads/sub_sub_category/'.$category_info_by_id->sub_category_image);?>" type="hidden"/>
                            </div>
                        </div> 
                        <?php if(!empty($category_info_by_id->sub_category_image))
                        { ?> 
                        <div class="control-group">
                            <div class="controls">
                                <img src="<?php echo base_url('uploads/sub_sub_category/'.$category_info_by_id->sub_category_image);?>" style="width:500px;height:200px"/>
                            </div>
                        </div> 
                        <?php } ?>       
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Publication Status</label>
                            <div class="controls">
                                 <select id="slect" name="publication_status">
                                    <option value="1" <?php if($category_info_by_id->publication_status == 1) echo 'selected'; ?>>Published</option>
                                    <option value="0" <?php if($category_info_by_id->publication_status == 0) echo 'selected'; ?>>UnPublished</option>
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