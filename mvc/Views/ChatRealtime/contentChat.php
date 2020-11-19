<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<?php foreach($data["message"] as $m){ ?>
		<li class="message clearfix" style="margin-bottom: 5px;">
			<?php $class = $m->from == $_SESSION["user_id"] ? "sent" : "received"; ?>
			<div class="<?php echo $class; ?>">
				<p><?php echo $m->message; ?></p>
			</div>
		</li>
	<?php } ?>

</body>
</html>