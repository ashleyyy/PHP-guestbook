

<?php foreach ($entries as $entry): ?>

        <h3><a href="<?php echo site_url('entries/'.$entry['id']); ?>"><?php echo $entry['user']; ?></a></h3>
        <div class="main">
          <?php echo $entry['comments']; ?>
        </div>

        <?php 
  $id = $entry['id'];
  echo form_open('entries/delete/'.$id); 
?>

<input type="submit" name="delete" value="Delete Entry" />


</form>


<?php endforeach; ?>