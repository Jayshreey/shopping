<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard') ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/bank_details') ?>">Bank Details</a></li>
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
             <!--<a class="btn btn-primary" href="<?php echo base_url('add/category'); ?>">
                Add catergory
            </a>-->
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>Account id</th>
                            <th>Account Name</th>
                            <th>Account No</th>
                            <th>Bank Name</th>
                            <th>Branch Name</th>
							<th>Ifsc code</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($all_bankdetails as $single_bankdetail) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $single_bankdetail->account_name ?></td>
								<td><?php echo $single_bankdetail->account_no ?></td>
								<td><?php echo $single_bankdetail->bank_name ?></td>
								<td><?php echo $single_bankdetail->branch_name ?></td>
								<td><?php echo $single_bankdetail->ifsc_code ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->