<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/helpers.php';

/* Each page sets these before including this file. */
$page  = $page  ?? 'index.php';
$title = $title ?? SITE['name'];
$desc  = $desc  ?? '';
$ld    = $ld    ?? null;

$canonical = SITE['url'] . '/' . ($page === 'index.php' ? '' : $page);
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title><?= $title ?></title>
<meta name="description" content="<?= e($desc) ?>">
<link rel="canonical" href="<?= e($canonical) ?>">
<meta property="og:title" content="<?= $title ?>">
<meta property="og:description" content="<?= e($desc) ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:image" content="<?= e(SITE['url']) ?>/assets/img/hero-wall.jpg">
<meta name="theme-color" content="#0A0A0C">
<link rel="icon" type="image/png" href="assets/img/logo.png">
<link rel="apple-touch-icon" href="assets/img/logo.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wdth,wght@0,62..125,100..900;1,62..125,100..900&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= asset('assets/css/tailwind.css') ?>">
<?php if ($ld): ?>
<script type="application/ld+json"><?= json_encode($ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
<?php endif; ?>
</head>
<body>
