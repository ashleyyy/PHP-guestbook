<h2>Sign the Guestbook</h2>

<?php echo validation_errors(); ?>
<div class="form-horizontal">
<?php echo form_open('entries/create'); ?>

  <div class="form-group">
    <label for="user" class="col-sm-2 control-label">Your Name</label>
    <div class="col-sm-10">
      <input type="input" name="user" class="form-control" placeholder="Name"/><br />
    </div>
  </div>

  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email Address</label>
    <div class="col-sm-10">
      <input type="input" name="email" class="form-control" placeholder="Email"/><br />
    </div>
  </div>

  <div class="form-group">
    <label for="comments" class="col-sm-2 control-label">Your Comments</label>
    <div class="col-sm-10">
      <textarea name="comments" class="form-control" placeholder="Wow, your site is really amazing"></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <!-- this hidden field is to check for bots that automatically fill all fields -->
      <input type="hidden" name="empty" />
      <input type="submit" name="submit" value="Sign Guestbook" />
    </div>
  </div> 
</div>
</form>