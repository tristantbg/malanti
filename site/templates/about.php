<?php snippet('header') ?>

<div id="container">

	<div class="page inner">

		<div class="column fixed">
			<section id="news">
				<h2 class="section-title">News</h2>
				<?php $news = $page->news()->toStructure() ?>
				<?php foreach ($news as $key => $item): ?>
				<div class="news"><?= $item->newscontent()->kt() ?></div>
				<?php endforeach ?>
			</section>
			<section id="contact">
				<h2 class="section-title">Contacts</h2>
				<div class="drawer">
				<?= $page->contact()->kt() ?>
				<div id="credits">
					<p>
					© <?= date('Y') ?> All rights reserved — <?= $site->title()->html() ?>
					<br>Design & development — <a href="http://www.httb.eu" target="_blank">HTTB</a>
					</p>
				</div>
				</div>
			</section>
		</div>

		<div class="column">

		<?php $sections = $page->children()->visible() ?>
		<?php foreach ($sections as $key => $section): ?>

			<section class="text-content">
				<div class="section-title"><h2><?= $section->title()->html() ?></h2></div>
				<div class="section-content"><?= $section->text()->kt() ?></div>
			</section>

		<?php endforeach ?>
			
		</div>

</div>
	
</div>

<?php snippet('footer') ?>