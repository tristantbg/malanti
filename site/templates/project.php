<?php snippet('header') ?>

<script>
	window.location = window.location.href.replace("work", "#work");
</script>

<div id="container">

	<div class="inner project">
		
		<div id="slider">
			<div class="section" data-anchor="work">
				<?php $project = $page ?>
				<div class="project" data-anchor="<?= $project->uid() ?>">
					<div class="project-content">
						<?php foreach ($project->medias()->toStructure() as $key => $image): ?>
						<?php $image = $image->toFile(); ?>
							<div class="content<?= ' '.$image->contentsize() ?><?= ' '.$image->contentposition() ?>">
								<?php 
								$srcset = '';
								for ($i = 500; $i <= 3000; $i += 500) $srcset .= resizeOnDemand($image, $i) . ' ' . $i . 'w,';
								?>

								<img 
								src="<?= resizeOnDemand($image, 100) ?>" 
								data-src="<?= resizeOnDemand($image, 1500) ?>" 
								data-srcset="<?= $srcset ?>" 
								data-sizes="auto" 
								data-optimumx="1.5" 
								class="lazyimg lazyload" 
								alt="<?= $project->title()->html().' — © '.$project->date("Y").', '.$site->title()->html(); ?>" 
								width="100%" height="auto">
								<noscript>
									<img src="<?= resizeOnDemand($image, 1500) ?>" alt="<?= $project->title()->html().' - © '.$site->title()->html() ?>" width="100%" height="auto" />
								</noscript>
							</div>
					<?php endforeach ?>
					</div>
					<div class="project-infos">
						<div class="project-title"><?= $project->title()->html() ?></div>
						<div class="project-description">
						<?= $project->date('Y') ?>
						<br><?= $project->text()->kt() ?>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	
</div>

<?php snippet('footer') ?>