<!DOCTYPE html>
<html lang="en" class="no-js">
<head>

	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="dns-prefetch" href="//www.google-analytics.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="canonical" href="<?php echo html($page->url()) ?>" />
	<?php if($page->isHomepage()): ?>
		<title><?= $site->title()->html() ?></title>
	<?php else: ?>
		<title><?= $page->title()->html() ?> | <?= $site->title()->html() ?></title>
	<?php endif ?>
	<?php if($page->isHomepage()): ?>
		<meta name="description" content="<?= $site->description()->html() ?>">
	<?php else: ?>
		<meta name="DC.Title" content="<?= $page->title()->html() ?>" />
		<?php if(!$page->text()->empty()): ?>
			<meta name="description" content="<?= $page->text()->excerpt(250) ?>">
			<meta name="DC.Description" content="<?= $page->text()->excerpt(250) ?>"/ >
			<meta property="og:description" content="<?= $page->text()->excerpt(250) ?>" />
		<?php else: ?>
			<meta name="description" content="">
			<meta name="DC.Description" content=""/ >
			<meta property="og:description" content="" />
		<?php endif ?>
	<?php endif ?>
	<meta name="robots" content="index,follow" />
	<meta name="keywords" content="<?= $site->keywords()->html() ?>">
	<?php if($page->isHomepage()): ?>
		<meta itemprop="name" content="<?= $site->title()->html() ?>">
		<meta property="og:title" content="<?= $site->title()->html() ?>" />
	<?php else: ?>
		<meta itemprop="name" content="<?= $page->title()->html() ?> | <?= $site->title()->html() ?>">
		<meta property="og:title" content="<?= $page->title()->html() ?> | <?= $site->title()->html() ?>" />
	<?php endif ?>
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?= html($page->url()) ?>" />
	<?php if($page->content()->name() == "project"): ?>
		<?php if (!$page->featured()->empty()): ?>
			<meta property="og:image" content="<?= resizeOnDemand($page->image($page->featured()), 1200) ?>"/>
		<?php endif ?>
	<?php else: ?>
		<?php if(!$site->ogimage()->empty()): ?>
			<meta property="og:image" content="<?= $site->ogimage()->toFile()->width(1200)->url() ?>"/>
		<?php endif ?>
	<?php endif ?>

	<meta itemprop="description" content="<?= $site->description()->html() ?>">
	<!-- <link rel="shortcut icon" href="<?php //url('assets/images/favicon.ico') ?>">
	<link rel="icon" href="<?php //url('assets/images/favicon.ico') ?>" type="image/x-icon"> -->

	<?php 
	echo css('assets/css/build/build.min.css');
	echo js('assets/js/vendor/modernizr.min.js');
	?>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?= url('assets/js/vendor/jquery.min.js') ?>">\x3C/script>')</script>

	<?php if(!$site->customcss()->empty()): ?>
		<style type="text/css">
			<?php echo $site->customcss()->html() ?>
		</style>
	<?php endif ?>

</head>
<body<?php e($page->template() != "work", ' class="page"') ?>>

<div id="loader">
	<div class="spinner">
		<svg class="circular" viewBox="25 25 50 50">
		<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="1" stroke-miterlimit="10"></circle>
		</svg>
	</div>
</div>

<div id="intro">
	<span>
		<img src="<?= $site->logosvg()->toFile()->url() ?>" onerror="this.src='<?= $site->image($site->logopng())->url() ?>'; this.onerror=null;" alt="<?= $site->title()->html() ?>" width="100%" height="auto">
	</span>
</div>

<header>
	<a id="site-title" href="<?= $site->url() ?>" data-title="<?= $site->title()->html() ?>" data-target="index">
		<img src="<?= $site->logosvg()->toFile()->url() ?>" onerror="this.src='<?= $site->image($site->logopng())->url() ?>'; this.onerror=null;" alt="<?= $site->title()->html() ?>" width="100%" height="auto">
	</a>
</header>

<nav>
	<?php $menuleft = $pages->find($site->menuleft()) ?>
	<a class="menu-item" href="<?= $menuleft->url() ?>" data-title="<?= $menuleft->title()->html() ?>" data-target="page-left">
	<span><?= $menuleft->title()->html() ?></span>
	</a>
	<?php $menuright = $pages->find($site->menuright()) ?>
	<a class="menu-item" href="<?= $menuright->url() ?>" data-title="<?= $menuright->title()->html() ?>" data-target="page-right">
	<span><?= $menuright->title()->html() ?></span>
	</a>
</nav>

<div id="wrapper">

<div id="close" data-target="index">
<a data-target="index"><span></span><span></span></a>
</div>