<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('entries/create'); ?>

  <label for="user">Your Name</label>
  <input type="input" name="user" /><br />

  <label for="email">Your Email Address</label>
  <input type="input" name="email" /><br />

  <label for="comments">Your Comments</label>
  <textarea name="comments"></textarea><br />

  <input type="submit" name="submit" value="Submit Entry" />

</form>