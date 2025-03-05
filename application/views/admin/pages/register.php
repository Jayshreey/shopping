<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/registrations/registration-6/assets/css/registration-6.css">
<!-- Registration 6 - Bootstrap Brain Component -->

<section class=" p-3 p-md-4 p-xl-5" style="background-color:rosybrown">
  <div class="container">
    <div class="row justify-content-center" style="background-color:rosybrown">
      <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
        <div class="card border-0 shadow-sm rounded-4">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  <h2 class="h3">Registration</h2>
                  <h3 class="fs-6 fw-normal text-secondary m-0">Enter your details to register</h3>
                </div>
              </div>
            </div>
            <form id="adminlogincheck" class="form-horizontal" action="<?php echo base_url().'index.php/Registration/user_info'; ?>" method="post">
              <div class="row gy-3 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="user_name" required>
                    <label for="firstName" class="form-label">Name</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email" required>
                    <label for="email" class="form-label">Email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="user_password" id="user_password" value="" placeholder="Password" required>
                    <label for="password" class="form-label">Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="" placeholder="Password" required>
                    <label for="password" class="form-label">Confirm Password</label>
                  </div>
                </div>
				<div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="mobileno" id="mobileno" minlength="10" maxlength="10" value="" placeholder="Mobile No" required>
                    <label for="password" class="form-label">Contact No</label>
                  </div>
                </div>
				<div class="col-12">
                  <div class="form-floating mb-3">
                   <select class="col-12" name="user_role" placeholder="User Role" class="user-role">
									<option>Select User role</option>
                                    <option value="1">Account</option>
                                    <option value="2">Sales</option>
									<option value="3">Packaging</option>
                    </select>
                  </div>
                </div>
		
				<div class="col-12">
                  <div class="form-floating mb-3">
                    <select class="col-12" id="city" name="city" required>
												<option value="">Assigned City</option>
												<?php foreach ($cities_list as $cit) : ?>
													<option value="<?php echo $cit->id; ?>"><?php echo $cit->city; ?></option>
												<?php endforeach; ?>
											</select>
                  </div>
                </div>
                
				<div class="button-register" style="text-align:center">	
                        <button type="submit" class="btn btn-primary register" >Register</button>
                </div>
              </div>
            </form>
           
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>