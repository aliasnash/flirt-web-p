<div class="text-muted too-small">
	© <?=date('Y')?> mobi-flirt.ru | <a href="index.php">Главная</a>
</div>

<div class="text-muted too-small">
	<a href="<?=WEB_APP?>/info?i=offer&o=mts">Правила предоставления Подписки на Контент</a>
	|
	<a href="<?=WEB_APP?>/unsubscribe?o=mts">Управление Подпиской на Контент</a>
	|
	<?php if(!$logged) {?>
		<a href="<?=WEB_APP?>/enter">Получить контент</a>
		|
	<?php }?>
	<a href="<?=WEB_APP?>/info?i=price&o=mts">Стоимость услуги</a>
</div>

<div class="text-muted too-small">
	<?=file_get_contents("./resources/footer/footer_mts.txt", true);?>
</div>

<div class="text-muted too-small">
	<a href="<?=WEB_APP?>/info?i=offer&o=beeline">Правила предоставления Подписки на Контент</a>
	|
	<a href="<?=WEB_APP?>/unsubscribe?o=beeline">Управление Подпиской на Контент</a>
	|
	<a href="<?=WEB_APP?>/info?i=price&o=beeline">Стоимость услуги</a>
</div>

<div class="text-muted too-small">
	<?=file_get_contents("./resources/footer/footer_beeline.txt", true);?>
</div>

<div class="text-muted too-small">
	<a href="<?=WEB_APP?>/info?i=offer&o=tele2">Правила предоставления услуги</a>
	|
	<a href="<?=WEB_APP?>/unsubscribe?o=tele2">Отключить подписку</a>
	|
	<a href="<?=WEB_APP?>/info?i=price&o=tele2">Стоимость услуги</a>
</div>

<div class="text-muted too-small">
	<?=file_get_contents("./resources/footer/footer_tele2.txt", true);?>
</div>

