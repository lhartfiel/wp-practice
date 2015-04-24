<?php
/**
 * Button Module
 *
 * @package My Theme
 */ 
?>

<?php  //define variables
$button = get_field('button');
$button_url = get_field('button_link');
?>


 <a href="<?php echo $button_url; ?>" class="button"><?php echo $button; ?></a>