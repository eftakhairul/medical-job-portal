<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Medical Jobs Portal</title>

        <style type="text/css" media="all">
            @import url("<?php echo site_url('assets/css/style.css'); ?>");
            @import url("<?php echo site_url('assets/css/jquery.wysiwyg.css'); ?>");
            @import url("<?php echo site_url('assets/css/facebox.css'); ?>");
            @import url("<?php echo site_url('assets/css/visualize.css'); ?>");
            @import url("<?php echo site_url('assets/css/date_input.css'); ?>");
        </style>

        <link rel="stylesheet" href="<?php echo site_url('assets/css/print.css'); ?>" media="print" />

        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.img.preload.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.filestyle.mini.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.wysiwyg.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.date_input.pack.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/facebox.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/excanvas.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.visualize.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.select_skin.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.pngfix.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/custom.js') ?>"></script>
    </head>
<body>

    <div id="hld">

        <div class="wrapper">		<!-- wrapper begins -->
<div class="block">
    <?php if (!empty($errorMessage)) : ?>
          <div class="message errormsg">
              <?php echo $errorMessage ?>
          </div>
          <?php endif ?>

      <div class="block_head">
          <h2>New Employer Account</h2>
      </div>

      <div class="block_content">

        <form action="" method="POST">
        <fieldset>
                  <legend>Registration</legend>

                  <p>
                      <label for="username">Username: <span style="color:red">*</span>
                      </label>

                      <input type="text" class="text small" name="username" value="<?php echo set_value('title'); ?>"/>
                      <span class='note error'>
                         <?php echo form_error('username'); ?>
                     </span>
                      <br/>
                      [Manimum 6 Characters.]
                  </p>

                  <p>
                      <label for="password">Password: <span style="color:red">*</span>
                      </label>
                      <input type="password" class="text small" name="password" value="<?php echo set_value('password'); ?>" />
                      <span class='note error'>
                         <?php echo form_error('password'); ?>
                     </span>
                  </p>

                  <p>
                      <label for="confirmedPassword">Confirm Password: <span style="color:red">*</span>
                      </label>
                      <input type="password" class="text small" name="confirmedPassword"
                             value="<?php echo set_value('confirmedPassword'); ?>" />
                      <span class='note error'>
                         <?php echo form_error('confirmedPassword'); ?>
                     </span>
                  </p>
              </fieldset>

              <fieldset>
                  <legend>Company Detail</legend>

                  <p>
                      <label for="doctor_name">Doctor Name: <span style="color:red">*</span></label>
                      <input type="text" class="text" name="doctor_name" value="<?php echo set_value('doctor_name'); ?>" />
                      <span class='note error'>
                         <?php echo form_error('doctor_name'); ?>
                     </span>
                  </p>

                  <p>
                      <label for="designation">Designation: <span style="color:red">*</span></label>

                      <input type="text" class="text" name="designation" value="<?php echo set_value('designation'); ?>" />
                      <span class='note error'>
                         <?php echo form_error('designation'); ?>
                      </span>
                  </p>

                  <p>
                      <label for="company Name">Company Name: </label>
                      <input type="text" class="text" name="company Name" value="<?php echo set_value('company_name'); ?>" />
                  </p>

                  <p>
                      <label for="address">Contact Address: <span style="color:red">*</span></label>

                      <input type="text" class="text" name="address" value="<?php echo set_value('address'); ?>" />
                      <span class='note error'>
                         <?php echo form_error('address'); ?>
                      </span>
                  </p>
                  <p>
                      <label for="contact_number">Contact Phone Number: <span style="color:red">*</span>
                      </label>
                      <input type="text" class="text" name="contact_number" value="<?php echo set_value('contact_number'); ?>" />
                      <span class='note error'>
                         <?php echo form_error('contact_number'); ?>
                      </span>
                  </p>

                  <p>
                      <label for="email">Email Address: <span style="color:red">*</span>
                      </label>
                      <input type="text" class="text" name="email" value="<?php echo set_value('email'); ?>" />
                      <span class='note error'>
                         <?php echo form_error('email'); ?>
                      </span>
                  </p>

                  <p>
                      <label for="website">Web Address: </label>
                      <input type="text" class="text" name="website" value="<?php echo set_value('website'); ?>" />
                  </p>
              </fieldset>

          <p>
               <input type="checkbox" name="agree" value="yes" />&nbsp;I have read the terms and conditions & accept it. <br/>
               <input type="submit" value="Submit" class="submit small" />
          </p>

          </form>

      </div>		<!-- .block_content ends -->
  </div>		<!-- .block ends -->
        </div>						<!-- wrapper ends -->

               </div>		<!-- #hld ends -->

           </body>
           </html>
