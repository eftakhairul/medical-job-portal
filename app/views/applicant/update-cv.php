 <div class="block">
    <?php if (!empty($errorMessage)) : ?>
       <div class="message errormsg">
           <?php echo $errorMessage ?>
       </div>
       <?php endif ?>

      <div class="block_head">
          <h2>Update CV</h2>
      </div>

      <div class="block_content">

          <p>Current CV: <a href="<?php echo site_url($applicant['cv'])?>">Download Here</a></p>
          <p>Last Update: <?php  echo (($applicant['create_date'] > $applicant['update_date'])? DateHelper::mysqlToHuman($applicant['create_date']):DateHelper::mysqlToHuman($applicant['update_date'] )); ?></p>
          <br/>

          <form enctype="multipart/form-data" action="" method="POST" >

           <p class='fileupload'>
              <label >Upload New CV:
              </label>
              <input name="uploadedfile" type="file" />
          </p>

          <p>
              <input type="hidden" name='nothing' value ='true'/>
              <input type="submit" value="Submit" class="submit small" />
              <input type="button" value="Cancel" class="submit small" onclick="window.location='/home/applicantDeashboard'"/>
          </p>

          </form>
      </div>		<!-- .block_content ends -->
  </div>		<!-- .block ends -->