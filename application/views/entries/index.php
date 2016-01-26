<h2><?php echo $title; ?></h2>


<?php foreach ($entries as $entry): ?>
  <div class = "well">

    <span class = "title"><?php echo $entry['user']; ?></span>
    <span class ="timestamp">(<?php echo $entry['t']; ?>)</span>

    <div class="comments">
      <?php echo $entry['comments']; ?>
    </div>

    <form action="mailto:<?php echo $entry['email'] ?>">
      <input type="submit" name="email" value="Email" />
    </form>

    <?php echo form_open('entries/'.$entry['id']); ?>
      <input type="submit" name="view" value="View" />
    </form>

    <?php echo form_open('entries/delete/'.$entry['id']); ?>
      <input name="redirect" type="hidden" value="<?= $this->uri->uri_string() ?>" />
      <input type="submit" name="delete" value="Delete" />
    </form>

  </div>
<?php endforeach; ?>

<div class="pull-right">
  <?php echo $links; ?>
</div>