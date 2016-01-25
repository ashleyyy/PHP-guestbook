<h2><?php echo $title; ?></h2>

<?php foreach ($entries as $entry): ?>

        <h3><?php echo $entry['user']; ?></h3>
        <div class="main">
          <?php echo $entry['comments']; ?>
        </div>
        <p><a href="<?php echo site_url('entries/'.$entry['id']); ?>">View more...</a></p>

<?php endforeach; ?>