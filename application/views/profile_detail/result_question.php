
<?php foreach($feed_back_detail as $fe):?>
<p>
  <?php if($tambahan=='question') { ?>
  <?php echo $fe->question; ?>
<?php }elseif($tambahan=='advantages'){?>
  Kelebihan :
  <br><?php echo $fe->kelebihan; ?>
  <br>
  Kekurangan :
  <br>
  <?php echo $fe->kekurangan; ?>
<?php } ?>
</p>

<?php endforeach;?>