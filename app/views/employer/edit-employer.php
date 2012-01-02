<div class="block">
    <?php if (!empty($errorMessage)) : ?>
    <div class="message errormsg">
          <?php echo $errorMessage ?>
    </div>
    <?php endif ?>

    <div class="block_head">
          <h2>Edit Account Information</h2>
   </div>

   <div class="block_content">

      <form action="" method="POST">

          <p>
              <label for="doctor_name">Doctor Name: <span style="color:red">*</span></label>
              <input type="text" class="text" name="doctor_name" value="<?php echo $employer['doctor_name']; ?>" />
              <span class='note error'>
                 <?php echo form_error('doctor_name'); ?>
             </span>
          </p>

          <p>
              <label for="designation">Designation: <span style="color:red">*</span></label>

              <input type="text" class="text" name="designation" value="<?php echo $employer['designation']; ?>" />
              <span class='note error'>
                 <?php echo form_error('designation'); ?>
              </span>
          </p>

          <p>
              <label for="company Name">Company Name: </label>
              <input type="text" class="text" name="company_name" value="<?php echo $employer['company_name']; ?>" />
          </p>

          <p>
              <label for="address">Contact Address: <span style="color:red">*</span></label>

              <input type="text" class="text" name="address" value="<?php echo $employer['address']; ?>" />
              <span class='note error'>
                 <?php echo form_error('address'); ?>
              </span>
          </p>
          <p>
              <label for="contact_number">Contact Phone Number: <span style="color:red">*</span>
              </label>
              <input type="text" class="text" name="contact_number" value="<?php echo $employer['contact_number']; ?>" />
              <span class='note error'>
                 <?php echo form_error('contact_number'); ?>
              </span>
          </p>

          <p>
              <label for="email">Email Address: <span style="color:red">*</span>
              </label>
              <input type="text" class="text" name="email" value="<?php echo $employer['email']; ?>" />
              <span class='note error'>
                 <?php echo form_error('email'); ?>
              </span>
          </p>

          <p>
              <label for="website">Web Address: </label>
              <input type="text" class="text" name="website" value="<?php echo $employer['website']; ?>" />
          </p>

          <p>
               <input type="submit" value="Update" class="submit small" />
          </p>

      </form>
   </div>		<!-- .block_content ends -->
</div>		<!-- .block ends -->