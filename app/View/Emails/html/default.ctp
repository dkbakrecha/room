<?php
$content = explode("\n", $content);
?>
<div style="border-bottom: 1px solid #2ECC71; display: table; margin: 10px auto;width: 602px;">
	<div style="float: left; width: 100%; border-bottom: 2px solid #2ECC71; height: 60px; min-height: 60px; max-height: 60px;">
		<a target="_new" href="<?php echo Router::url('/', true)?>" style="text-decoration: none;">
			<img src="<?php echo Router::url('/', true)?>img/room-logo.png" alt="room247.in" style="border: none;"/>
		</a>
	</div>
	<div style="float: left; width: 600px;">
		<div style="float: left; width: 100%;">&nbsp;</div>
		<div style="display: table; width: 540px; margin: 0 auto;word-break: break-all;line-height: 25px; min-height: 100px;">
			<?php 
			//echo stripslashes($mailContents); 
			foreach ($content as $line):
				echo '<p> ' . $line . "</p>\n";
			endforeach;
			?>
		</div>
		<div style="float: left; width: 100%;">&nbsp;</div>
	</div>
	<div style="float: left; width: 100%; background: #999999;height: 42px;min-height: 42px;max-height: 42px;">
		<div style="text-align: center; float: left; margin-top: 12px; width: 100%;color: #FFF">
			<div style="text-align: center; margin: 0 auto;">&copy; <?php echo date('Y').__(" room247. All Rights Reserved");?></div>
		</div>	
	</div>
</div>