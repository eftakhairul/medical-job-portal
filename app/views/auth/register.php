<div class="block">

    <?php if (!empty($errorMessage)) : ?>
    <div class="message errormsg">
        <?php echo $errorMessage ?>
    </div>
    <?php endif ?>

    <div class="block_head">
        <h2>Add User</h2>
    </div>

    <div class="block_content">
        
        <form action=""" method="POST">

            <p>
                <label for="name">
                    Name: <span class="required">*</span>
                </label>

                <input id="name" type="text" name="name" class="text small"
                       value= "<?php echo set_value('name') ?>" /><br />
                <span class='note error'>
                    <?php echo form_error('name') ?>
                </span>
            </p>

            <p>
                <label for="email_address">Email Address:</label>
                <input id="email_address" type="text" name="email_address" class="text small"
                       value= "<?php echo $this->input->post('email_address') ?>" /><br />
                <span class='note error'>
                    <?php echo form_error('email_address') ?>
                </span>
            </p>

            <p>
                <label for="username">
                    Username: <span class="required">*</span>
                </label>

                <input id="username" type="text" name="username" class="text small"
                       value="<?php echo set_value('username') ?>" /><br />
                <span class='note error'>
                    <?php echo form_error('username') ?>
                </span>
            </p>

            <p>
                <label for="password">
                    Password: <span class="required">*</span>
                </label>

                <input id="password" type="password" name="password" class="text small"
                       value= "<?php echo set_value('password') ?>" /><br />
                <span class='note error'>
                    <?php echo form_error('password') ?>
                </span>
            </p>

            <p>
                <label for="confirmedPassword">
                    Confirmed Password: <span class="required">*</span>
                </label>

                <input id="confirmedPassword" type="password" name="confirmedPassword"
                       class="text small" value= "<?php echo set_value('confirmedPassword') ?>" /><br />
                <span class='note error'>
                    <?php echo form_error('confirmedPassword') ?>
                </span>
            </p>

            <p>
                <input type="submit" value="Save" class="submit small" />
                <input type="button" value ="Exit" class="submit small"
                       onClick = "window.location='<?php echo site_url('auth/login') ?>'" />
            </p>

        </form>

    </div>		<!-- .block_content ends -->
</div>		<!-- .block ends -->