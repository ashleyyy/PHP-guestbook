<div class = "well">
  <h2>
    <?php echo $entry['user']."'s comments:";?>
  </h2>

  <div class="comments">
    <?php echo $entry['comments']; ?>
  </div>

  <div class ="timestamp">
    (<?php echo $entry['t']; ?>)
  </div>

  <form action="mailto:<?php echo $entry['email'] ?>">
    <input type="submit" name="email" value="Email" />
  </form>

  <?php echo form_open('entries/delete/'.$entry['id']); ?>
    <input type="submit" name="delete" value="Delete" />
  </form>
</div>