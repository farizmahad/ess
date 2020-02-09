
<?php foreach($history as $fe):?>
<p>
  <?php if($tambahan=='question') { ?>
  <?php echo $fe->question; ?>
<?php }elseif($tambahan=='advantages'){?>
  <?php echo $fe->reason; ?>
<?php } ?>
</p>

<?php endforeach;?>





