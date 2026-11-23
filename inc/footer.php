<?php declare(strict_types=1); ?>
<footer class="bg-ink border-t border-white/10">
  <div class="wrap">
    <div class="grid md:grid-cols-12 gap-10 py-14 md:py-16">

      <div class="md:col-span-5 lg:col-span-4">
        <a href="index.php" class="flex items-center gap-2.5 flex-none mb-5 w-max" aria-label="<?= e(SITE['name']) ?> — home">
          <img src="assets/img/logo.png" alt="" width="512" height="512" loading="lazy" decoding="async"
               class="w-20 h-20 flex-none select-none">
          <span class="font-display font-extrabold italic uppercase leading-[0.9] text-[0.6rem] tracking-wide text-white/50">The<b class="block text-[1.1rem] font-black tracking-tightest text-white">Quads</b>Gym</span>
        </a>
        <p class="body max-w-[32ch]">A gym in Manimajra, rebuilt in 2026. Open six days a week, with trainers on the floor from 5 AM.</p>
        <div class="flex gap-2.5 mt-6">
          <a href="<?= e(SITE['instagram']) ?>" target="_blank" rel="noopener" aria-label="Instagram" class="w-11 h-11 rounded-xl border border-white/15 grid place-items-center text-white/70 hover:bg-brand hover:border-brand hover:text-white transition-colors"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="2.5" y="2.5" width="19" height="19" rx="5"/><circle cx="12" cy="12" r="4.2"/><circle cx="17.8" cy="6.2" r="1.1" fill="currentColor" stroke="none"/></svg></a>
          <a href="<?= e(SITE['facebook']) ?>" target="_blank" rel="noopener" aria-label="Facebook" class="w-11 h-11 rounded-xl border border-white/15 grid place-items-center text-white/70 hover:bg-brand hover:border-brand hover:text-white transition-colors"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.25-1.5 1.55-1.5h1.65V3.6c-.3 0-1.3-.1-2.45-.1-2.4 0-4.05 1.5-4.05 4.2v2.2H7.5V13h2.7v8z"/></svg></a>
          <a href="<?= e(SITE['wa']) ?>" target="_blank" rel="noopener" aria-label="WhatsApp" class="w-11 h-11 rounded-xl border border-white/15 grid place-items-center text-white/70 hover:bg-brand hover:border-brand hover:text-white transition-colors"><svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2m0 2a8 8 0 1 1-4.1 14.9l-.3-.2-2.6.7.7-2.5-.2-.3A8 8 0 0 1 12 4m-2.4 4c-.2 0-.5.1-.7.4-.3.3-.9.9-.9 2.1s.9 2.4 1 2.6c.1.2 1.7 2.8 4.3 3.8 2.1.8 2.5.7 3 .6.5-.1 1.5-.6 1.7-1.2.2-.6.2-1.1.2-1.2-.1-.1-.3-.2-.5-.3l-1.8-.9c-.3-.1-.5-.1-.6.1l-.7.9c-.1.2-.3.2-.5.1-.2-.1-1-.4-1.9-1.2-.7-.6-1.2-1.4-1.3-1.6-.1-.2 0-.4.1-.5l.4-.5c.1-.2.2-.3.2-.5s0-.3-.1-.4l-.8-1.9c-.2-.4-.4-.4-.6-.4z"/></svg></a>
        </div>
      </div>

      <div class="md:col-span-3 lg:col-span-2">
        <h4 class="font-mono text-2xs uppercase tracking-label text-white/35 mb-4">Pages</h4>
        <ul class="grid gap-2.5">
          <?php foreach (NAV as $file => $label): ?>
            <li><a href="<?= $file ?>" class="text-[0.92rem] text-white/60 hover:text-brand transition-colors"><?= $label ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="md:col-span-4 lg:col-span-2">
        <h4 class="font-mono text-2xs uppercase tracking-label text-white/35 mb-4">Training</h4>
        <ul class="grid gap-2.5">
          <?php foreach (PROGRAMS as $id => $p): ?>
            <li><a href="programs.php#<?= $id ?>" class="text-[0.92rem] text-white/60 hover:text-brand transition-colors"><?= $p['title'] ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="md:col-span-12 lg:col-span-4">
        <h4 class="font-mono text-2xs uppercase tracking-label text-white/35 mb-4">Visit us</h4>
        <ul class="grid gap-3 text-[0.92rem] text-white/60">
          <li class="flex gap-2.5"><span class="text-brand flex-none mt-0.5"><?= icon('pin') ?></span><?= SITE['addr'] ?></li>
          <li class="flex gap-2.5"><span class="text-brand flex-none mt-0.5"><?= icon('phone') ?></span><a href="tel:<?= e(SITE['tel']) ?>" class="hover:text-brand transition-colors"><?= SITE['tel_h'] ?></a></li>
          <li class="flex gap-2.5"><span class="text-brand flex-none mt-0.5"><?= icon('clock') ?></span><span><?= SITE['hours'] ?><br><span class="text-white/35"><?= SITE['closed'] ?></span></span></li>
        </ul>
      </div>
    </div>

    <div class="flex flex-wrap justify-between gap-3 border-t border-white/10 py-5">
      <p class="text-xs text-white/35">&copy; <?= date('Y') ?> <?= SITE['name'] ?>, <?= SITE['city'] ?></p>
      <p class="text-xs text-white/35">Lift &middot; Sweat &middot; Build &middot; Repeat</p>
    </div>
  </div>
</footer>

<div class="obar fixed inset-x-0 bottom-0 z-[880] lg:hidden translate-y-full transition-transform duration-500 ease-out bg-brand text-white">
  <div class="flex items-center gap-3 px-5 py-2.5 pb-[max(0.625rem,env(safe-area-inset-bottom))]">
    <div class="min-w-0 flex-1">
      <p class="font-display font-extrabold text-[0.92rem] leading-tight truncate">&#8377;<?= OFFER['price'] ?> for 6 months</p>
      <p class="text-[0.68rem] text-white/80 truncate">Plus 1 free month on hold</p>
    </div>
    <a href="tel:<?= e(SITE['tel']) ?>" class="flex-none bg-white text-ink rounded-full px-4 py-2.5 text-[0.82rem] font-bold">Call now</a>
  </div>
</div>

<script src="assets/js/main.js" defer></script>
</body>
</html>
