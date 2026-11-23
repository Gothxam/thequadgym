<?php declare(strict_types=1); ?>
<header class="hdr fixed inset-x-0 top-0 z-[900] transition-[background,transform,border-color] duration-500 ease-smooth border-b border-transparent">
  <div class="wrap flex items-center gap-4 h-16 lg:h-[72px]">

    <a href="index.php" class="flex items-center gap-2.5 flex-none mr-auto" aria-label="<?= e(SITE['name']) ?> — home">
      <img src="assets/img/logo.png" alt="" width="512" height="512" decoding="async"
           class="w-10 h-10 lg:w-11 lg:h-11 flex-none select-none">
      <span class="font-display font-extrabold italic uppercase leading-[0.9] text-[0.6rem] tracking-wide text-white/50">The<b class="block text-[1.1rem] font-black tracking-tightest text-white">Quads</b>Gym</span>
    </a>

    <nav class="hidden lg:flex items-center gap-7" aria-label="Primary">
      <?php foreach (NAV as $file => $label): $on = $file === $page; ?>
        <a href="<?= $file ?>" class="relative text-[0.86rem] font-medium py-1 transition-colors duration-300 <?= $on ? 'text-white' : 'text-white/55 hover:text-white' ?>"<?= $on ? ' aria-current="page"' : '' ?>>
          <?= $label ?><span class="absolute inset-x-0 -bottom-px h-[2px] bg-brand origin-left transition-transform duration-300 ease-out <?= $on ? 'scale-x-100' : 'scale-x-0' ?>"></span>
        </a>
      <?php endforeach; ?>
    </nav>

    <a href="tel:<?= e(SITE['tel']) ?>" class="hidden xl:flex items-center gap-1.5 text-[0.84rem] font-medium text-white/55 hover:text-white transition-colors whitespace-nowrap">
      <?= icon('phone') ?> <?= SITE['tel_h'] ?>
    </a>
    <a href="index.php#offer" class="hidden sm:inline-flex btn btn-brand btn-sm">Join now</a>

    <button class="burger lg:hidden w-11 h-11 rounded-xl border border-white/20 flex flex-col items-center justify-center gap-[5px] flex-none" aria-label="Open menu" aria-expanded="false" aria-controls="drawer">
      <i class="block w-4 h-[1.6px] bg-white rounded-full transition-transform duration-300"></i>
      <i class="block w-4 h-[1.6px] bg-white rounded-full transition-opacity duration-200"></i>
      <i class="block w-4 h-[1.6px] bg-white rounded-full transition-transform duration-300"></i>
    </button>
  </div>
</header>

<div id="drawer" class="drawer fixed inset-0 z-[890] bg-ink flex flex-col px-5 pt-24 pb-8 overflow-y-auto invisible opacity-0 -translate-y-2 transition-[opacity,transform,visibility] duration-300 ease-out lg:hidden">
  <nav class="grid" aria-label="Mobile">
    <?php foreach (NAV as $file => $label): ?>
      <a href="<?= $file ?>" class="flex items-center justify-between font-display font-bold text-2xl tracking-tightest py-4 border-b border-white/10 transition-colors <?= $file === $page ? 'text-brand' : 'hover:text-brand' ?>">
        <?= $label ?><span class="text-white/25 text-base">&rarr;</span>
      </a>
    <?php endforeach; ?>
  </nav>
  <div class="mt-auto pt-8 grid gap-3">
    <a href="tel:<?= e(SITE['tel']) ?>" class="btn btn-brand w-full"><?= icon('phone') ?> <?= SITE['tel_h'] ?></a>
    <a href="<?= e(SITE['wa']) ?>" target="_blank" rel="noopener" class="btn btn-ghost w-full">WhatsApp us</a>
    <p class="text-xs text-white/40 leading-relaxed mt-2"><?= SITE['addr'] ?><br><?= SITE['hours'] ?></p>
  </div>
</div>
