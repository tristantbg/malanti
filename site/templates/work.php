<?php snippet('header') ?>

<div id="container-left" class="container"></div>

<?php $projects = $pages->find('work')->children()->visible() ?>

<div id="container" class="container">

<div class="inner project">
	
	<div id="slider">
		<div class="section" data-anchor="work">
			<?php foreach ($projects as $key => $project): ?>
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
			<?php endforeach ?>
		</div>
	</div>

	<ul id="projects-menu">
		<?php foreach ($projects as $key => $project): ?>
			<li class="menu-item">
			<a href="#work/<?= $project->uid() ?>"><?= str_pad($project->sort(), 2, '0', STR_PAD_LEFT); ?></a>
			</li>
		<?php endforeach ?>
	</ul>

</div>
	
</div>

<div id="container-right" class="container"></div>

<?php snippet('footer') ?>