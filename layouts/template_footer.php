<div class="text-muted too-small">
	© <?=date('Y')?> mobi-flirt.ru | <a href="index.php">Главная</a>
</div>

<div class="text-muted too-small">
	<a href="<?=WEB_APP?>/info?i=offer&o=2">Правила предоставления Подписки на Контент</a>
	|
	<a href="<?=WEB_APP?>/unsubscribe?o=2">Управление Подпиской на Контент</a>
	|
	<?php if(!$logged) {?>
		<a href="<?=WEB_APP?>/enter">Получить контент</a>
		|
	<?php }?>
	<a href="<?=WEB_APP?>/info?i=price&o=2">Стоимость услуги</a>
</div>

<div class="text-muted too-small">
	<?=file_get_contents("./resources/footer/footer_mts.txt", true);?>
</div>

<div class="text-muted too-small">
	<a href="<?=WEB_APP?>/info?i=offer&o=1">Правила предоставления Подписки на Контент</a>
	|
	<a href="<?=WEB_APP?>/unsubscribe?o=1">Управление Подпиской на Контент</a>
	|
	<a href="<?=WEB_APP?>/info?i=price&o=1">Стоимость услуги</a>
</div>

<div class="text-muted too-small">
	<?=file_get_contents("./resources/footer/footer_beeline.txt", true);?>
</div>

<div class="text-muted too-small">
	<a href="<?=WEB_APP?>/info?i=offer&o=4">Правила предоставления услуги</a>
	|
	<a href="<?=WEB_APP?>/unsubscribe?o=4">Отключить подписку</a>
	|
	<a href="<?=WEB_APP?>/info?i=price&o=4">Стоимость услуги</a>
</div>

<div class="text-muted too-small">
	<?=file_get_contents("./resources/footer/footer_tele2.txt", true);?>
</div>

