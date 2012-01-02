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
                <label for="name">Full Name: <span style="color:red">*</span></label>
                <input type="text" class="text" name="name" value="<?php echo $applicant['name']; ?>" />
                <span class='note error'>
                   <?php echo form_error('name'); ?>
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
               <label for="contact_no">Contact Number: <span style="color:red">*</span>
               </label>
               <input type="text" class="text" name="contact_no" value="<?php echo $applicant['contact_no']; ?>" />
               <span class='note error'>
                 <?php echo form_error('contact_no'); ?>
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
                 <input type="submit" value="Submit" class="submit small" />
            </p>

          </form>
      </div>		<!-- .block_content ends -->
  </div>		<!-- .block ends -->