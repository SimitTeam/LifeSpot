<?php 
if(!isset($errors)){
	$errors=[];
}
if(isset($validation)){
	$temp=array_values($validation->getErrors());
	if(isset($errors)){
		$errors=array_merge($temp, $errors);
	}
}
?>

<div class="alert alert-danger" role="alert">
    <ul>
    <?php foreach ($errors as $error) : ?>
        <li><?= esc($error) ?></li>
    <?php endforeach ?>
    </ul>
</div>
