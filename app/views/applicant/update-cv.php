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

          <form enctype="multipart/form-data" action="" method="POST" >

           <p class='fileupload'>
              <label >Upload Your CV:
              </label>
              <input name="uploadedfile" type="file" />
          </p>

          <p>
              <input type="hidden" name='nothing' value ='true'/>
              <input type="submit" value="Submit" class="submit small" />
          </p>

          </form>
      </div>		<!-- .block_content ends -->
  </div>		<!-- .block ends -->