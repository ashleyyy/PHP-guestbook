<h2>
  <?php echo $entry['user']."'s comments:";?>
</h2>

<div class="comments">
  <?php echo $entry['comments']; ?>
</div>

<div class ="timestamp">
  (<?php echo $entry['t']; ?>)
</div>

<?php echo form_open('entries/delete/'.$entry['id']); ?>
  <input type="submit" name="delete" value="Delete Entry" />
</form>

<?php echo form_open('entries/'); ?>
  <input type="submit" name="index" value="Back to Guestbook" />
</form>

