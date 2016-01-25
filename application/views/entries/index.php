<?php foreach ($entries as $entry): ?>

  <h3><?php echo $entry['user']; ?></h3>
  <?php echo $entry['t']; ?>
  <div class="comments">
    <?php echo $entry['comments']; ?>
  </div>

  <a href="<?php echo site_url('entries/'.$entry['id']); ?>">View on single page</a>

<?php 
  $id = $entry['id'];
  echo form_open('entries/delete/'.$id); 
?>

<input type="submit" name="delete" value="Delete Entry" /></form>

<?php endforeach; ?>