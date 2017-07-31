<ul class="top_nav">
<?php 
foreach ($getAllMenu as $val_menu) {
?>
  <li><a <?php echo 'href="'. $pathweb.$val_menu->menu_slug.'"' ;?>><?php echo $val_menu->menu_name; ?></a></li>

<?php } ?>
</ul>


