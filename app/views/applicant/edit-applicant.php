 <div class="block">
    <?php if (!empty($errorMessage)) : ?>
       <div class="message errormsg">
           <?php echo $errorMessage ?>
       </div>
       <?php endif ?>

      <div class="block_head">
          <h2>Edit Applicant</h2>
      </div>

      <div class="block_content">

        <form action="" method="POST" >
            <p>
                <label for="full_name">Full Name: <span style="color:red">*</span></label>
                <input type="text" class="text" name="full_name" value="<?php echo $applicant['full_name']; ?>" />
                <span class='note error'>
                   <?php echo form_error('full_name'); ?>
               </span>
            </p>

            <p>
                <label for="address">Contact Address: <span style="color:red">*</span></label>

                <input type="text" class="text" name="address" value="<?php echo $applicant['address']; ?>" />
                <span class='note error'>
                   <?php echo form_error('address'); ?>
                </span>
            </p>

            <p>
               <label for="contact_number">Contact Phone Number: <span style="color:red">*</span>
               </label>
               <input type="text" class="text" name="contact_number" value="<?php echo $applicant['contact_number']; ?>" />
               <span class='note error'>
                 <?php echo form_error('contact_number'); ?>
               </span>
            </p>

            <p>
               <label for="email">Email Address: <span style="color:red">*</span>
               </label>
               <input type="text" class="text" name="email" value="<?php echo $applicant['email']; ?>" />
               <span class='note error'>
                  <?php echo form_error('email'); ?>
               </span>
            </p>

            <p>
                 <input type="checkbox" name="agree" value="yes" />&nbsp;I have read the terms and conditions & accept it. <br/>
                 <input type="submit" value="Submit" class="submit small" />
            </p>

          </form>
      </div>		<!-- .block_content ends -->
  </div>		<!-- .block ends -->