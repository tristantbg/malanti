<?php snippet('header') ?>

<div id="container">

	<div class="page inner">
	
	<section id="imagefeed">
	<?php foreach ($page->medias()->toStructure() as $key => $image): ?>
		<?php $image = $image->toFile(); ?>
			<div class="content">
				<?php 
				$srcset = '';
				for ($i = 500; $i <= 3000; $i += 500) $srcset .= resizeOnDemand($image, $i) . ' ' . $i . 'w,';
				?>

				<img 
				srcset="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
				data-src="<?= resizeOnDemand($image, 1500) ?>" 
				data-srcset="<?= $srcset ?>" 
				data-sizes="auto" 
				data-optimumx="1.5" 
				class="lazyimg lazyload" 
				alt="<?= $page->title()->html().' — © '.$site->title()->html(); ?>" 
				height="100%" width="auto">
				<noscript>
					<img src="<?= resizeOnDemand($image, 1500) ?>" alt="<?= $page->title()->html().' — © '.$site->title()->html(); ?>" height="100%" width="auto" />
				</noscript>
			</div>
	<?php endforeach ?>
	</section>

	</div>
	
</div>

<?php snippet('footer') ?>