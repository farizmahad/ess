<?php 
   foreach($development as $dev):
?>


<p>


	<?php  
	if($tambahan=="poin"){


	echo $dev->development_items;}elseif($tambahan=="tambahan"){
    echo $dev->additional_information;
	}elseif($tambahan=="goal"){

	echo $dev->goal;
	} ?></p>

<?php endforeach;?>