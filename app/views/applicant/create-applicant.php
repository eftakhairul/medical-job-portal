<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Medical Job Portal</title>

<!--    @import url("http://local.rbs-exam.tld/css/style.css");-->
    <style type="text/css" media="all">
        @import url("http://local.rbs-exam.tld/assets/css/style.css");
        @import url("http://local.rbs-exam.tld/assets/css/jquery.wysiwyg.css");
        @import url("http://local.rbs-exam.tld/assets/css/facebox.css");
        @import url("http://local.rbs-exam.tld/assets/css/visualize.css");
        @import url("http://local.rbs-exam.tld/assets/css/date_input.css");
    </style>

    <!--[if lt IE 8]><style type="text/css" media="all">@import url("css/ie.css");</style><![endif]-->

    <script type="text/javascript" src="http://local.rbs-exam.tld/assets/js/jquery.js"></script>
    <script type="text/javascript" src="http://local.rbs-exam.tld/assets/js/jquery.img.preload.js"></script>
    <script type="text/javascript" src="http://local.rbs-exam.tld/assets/js/jquery.filestyle.mini.js"></script>
    <script type="text/javascript" src="http://local.rbs-exam.tld/assets/js/jquery.wysiwyg.js"></script>
    <script type="text/javascript" src="http://local.rbs-exam.tld/assets/js/jquery.date_input.pack.js"></script>

    <script type="text/javascript" src="http://local.rbs-exam.tld/assets/js/facebox.js"></script>
    <script type="text/javascript" src="http://local.rbs-exam.tld/assets/js/excanvas.js"></script>
    <script type="text/javascript" src="http://local.rbs-exam.tld/assets/js/jquery.visualize.js"></script>
    <script type="text/javascript" src="http://local.rbs-exam.tld/assets/js/jquery.select_skin.js"></script>
    <script type="text/javascript" src="http://local.rbs-exam.tld/assets/js/jquery.pngfix.js"></script>
    <script type="text/javascript" src="http://local.rbs-exam.tld/assets/js/custom.js"></script>

</head>

<body>

    <div id="hld">

        <div class="wrapper">		<!-- wrapper begins -->
<div class="block">

      <div class="block_head">
          <h2>New Applicant</h2>
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
                  <legend>Personal Information</legend>

                  <p>
                      <label for="name">Full Name: <span style="color:red">*</span></label>
                      <input type="text" class="text" name="name" value="<?php echo set_value('name'); ?>" />
                      <span class='note error'>
                         <?php echo form_error('name'); ?>
                     </span>
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
