<?php
echo "<h2><a href ='mailto:".$entry['email']."'>".$entry['user']."</a></h2>";
echo $entry['comments'];
?>

<?php 
  $id = $entry['id'];
  echo form_open('entries/delete/'.$id); 
?>

<input type="submit" name="delete" value="Delete Entry" />


</form>

