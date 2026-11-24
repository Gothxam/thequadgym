<?php
declare(strict_types=1);

/* ============================================================
   Icons and reusable blocks.
   Every section on the site is built from these, so the whole
   site keeps one visual language.
   ============================================================ */

function e(?string $s): string
{
    return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
}

/** Inline SVG icons, keyed by name. */
function icon(string $name, string $cls = ''): string
{
    static $set = null;
    if ($set === null) {
        $set = [
            'arrow'    => '<path d="M2 8h11M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
            'check'    => '<path d="M2.5 8.5 6 12l7.5-8" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>',
            'phone'    => '<path d="M5.2 2.5 6.6 5 5.3 6.5c.7 1.4 1.8 2.5 3.2 3.2L10 8.4l2.5 1.4v2.4c0 .6-.5 1.1-1.1 1-5-.5-8.7-4.2-9.2-9.2 0-.6.4-1.1 1-1.1z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/>',
            'play'     => '<circle cx="8" cy="8" r="6.6" stroke="currentColor" stroke-width="1.4"/><path d="M6.6 5.5v5l4-2.5z" fill="currentColor"/>',
            'pin'      => '<path d="M8 14.5s5-4.4 5-7.9A5 5 0 0 0 3 6.6c0 3.5 5 7.9 5 7.9z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><circle cx="8" cy="6.5" r="1.9" stroke="currentColor" stroke-width="1.5"/>',
            'clock'    => '<circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.5"/><path d="M8 4.8V8l2.2 1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
            'music'    => '<path d="M6 11.5V3.8l6.5-1.3v7.7" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/><circle cx="4.4" cy="11.6" r="1.8" stroke="currentColor" stroke-width="1.5"/><circle cx="10.9" cy="10.2" r="1.8" stroke="currentColor" stroke-width="1.5"/>',
            'people'   => '<circle cx="6" cy="5.5" r="2.4" stroke="currentColor" stroke-width="1.5"/><path d="M1.8 13.2c.3-2.2 2.1-3.5 4.2-3.5s3.9 1.3 4.2 3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><path d="M11 3.4a2.4 2.4 0 0 1 0 4.3M12.1 9.9c1.3.4 2.2 1.6 2.4 3.3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
            'park'     => '<rect x="2" y="2" width="12" height="12" rx="3" stroke="currentColor" stroke-width="1.5"/><path d="M6.2 11.5V4.8h2.2a2.1 2.1 0 1 1 0 4.2H6.2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>',
        ];
    }
    static $set24 = null;
    if ($set24 === null) {
        $set24 = [
            'dumbbell' => '<path d="M3 9v6M6 7.5v9M18 7.5v9M21 9v6M6 12h12"/>',
            'tread'    => '<path d="M3 18h14l2.5-2.5"/><rect x="2" y="17" width="16" height="3.2" rx="1.6"/><path d="M19 4.5v9"/><path d="M19 5.5 14 8"/>',
            'trophy'   => '<path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M7 5.5H4.5v1A3.5 3.5 0 0 0 7 9.8M17 5.5h2.5v1A3.5 3.5 0 0 1 17 9.8"/><path d="M12 14v3M9 20h6l-.6-3H9.6z"/>',
            'calendar' => '<rect x="3" y="5.5" width="18" height="15" rx="2.5"/><path d="M3 10h18M8 3v4.5M16 3v4.5"/>',
            'clock2'   => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5.2l3.3 2"/>',
            'people2'  => '<circle cx="9" cy="8" r="3.4"/><path d="M2.8 19.4c.5-3.2 3.1-5 6.2-5s5.7 1.8 6.2 5"/><path d="M16 5a3.4 3.4 0 0 1 0 6.1M17.4 14.8c2 .6 3.3 2.3 3.6 4.6"/>',
            'heart'    => '<path d="M12 20s-7.5-4.6-7.5-9.6A4.4 4.4 0 0 1 12 7.4a4.4 4.4 0 0 1 7.5 3c0 5-7.5 9.6-7.5 9.6z"/>',
            'bolt'     => '<path d="M13.5 3 5 13.5h5.5L10 21l8.5-10.5H13z"/>',
            'user'     => '<circle cx="12" cy="8" r="3.6"/><path d="M4.8 20c.5-3.6 3.4-5.6 7.2-5.6s6.7 2 7.2 5.6"/>',
            'star'     => '<path d="m12 3.6 2.6 5.3 5.9.9-4.3 4.1 1 5.8-5.2-2.7-5.2 2.7 1-5.8L3.5 9.8l5.9-.9z"/>',
        ];
    }

    if (isset($set[$name])) {
        return '<svg class="' . $cls . '" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">' . $set[$name] . '</svg>';
    }
    if (isset($set24[$name])) {
        return '<svg class="' . $cls . '" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $set24[$name] . '</svg>';
    }
    return '';
}

/* ---------- small pieces ---------- */

/** Red rule + mono label — opens most sections. */
function kicker(string $text, bool $light = false): string
{
    return '<p class="flex items-center gap-3 font-mono text-2xs uppercase tracking-label text-brand" data-up>'
         . '<span class="tick-sm"></span>' . $text . '</p>';
}

/** Section heading: kicker, title, optional note on the right. */
function sec_head(string $label, string $title, string $note = '', array $more = []): string
{
    $h  = '<div class="mb-10 md:mb-14">';
    $h .= '<div class="flex flex-wrap items-end justify-between gap-5">';
    $h .= '<div class="max-w-[22ch]">' . kicker($label)
        . '<h2 class="h-lg mt-4 text-balance" data-up data-d="1">' . $title . '</h2></div>';
    if ($more) {
        $h .= '<a href="' . $more[1] . '" class="seeall" data-up data-d="2">' . $more[0] . ' &rarr;</a>';
    }
    $h .= '</div>';
    if ($note !== '') {
        $h .= '<p class="lead mt-6 max-w-[52ch]" data-up data-d="2">' . $note . '</p>';
    }
    return $h . '</div>';
}

/** A tick list in brand red. */
function tick_list(array $items, string $tone = 'dark'): string
{
    $c = $tone === 'light' ? 'text-ink/70' : 'text-white/65';
    $o = '<ul class="dash ' . $c . '">';
    foreach ($items as $t) {
        $o .= '<li>' . $t . '</li>';
    }
    return $o . '</ul>';
}

/** The icon + number + label strip used in the hero and on About. */
function stat_strip(array $stats): string
{
    $o = '<div class="statbar" data-up>';
    foreach ($stats as [$ic, $n, $sfx, $k]) {
        $o .= '<div><span class="ic">' . icon($ic) . '</span><span>'
            . '<span class="block font-display font-bold text-[1.4rem] sm:text-[1.6rem] leading-none tracking-[-0.03em]">' . $n . $sfx . '</span>'
            . '<span class="block text-xs text-white/50 mt-1.5">' . $k . '</span></span></div>';
    }
    return $o . '</div>';
}

/** Icon labels divided by rules — under the hero buttons. */
function feat_row(array $items): string
{
    $o = '<div class="feat-row" data-up data-d="4">';
    foreach ($items as [$ic, $t]) {
        $o .= '<span>' . icon($ic) . $t . '</span>';
    }
    return $o . '</div>';
}

/** Numbered accordion. */
function faq_block(array $items): string
{
    $o = '<div class="border-t hair" data-up>';
    $i = 1;
    foreach ($items as [$q, $a]) {
        $n  = str_pad((string) $i, 2, '0', STR_PAD_LEFT);
        $o .= '<details class="group border-b hair">'
            . '<summary class="flex items-center gap-4 sm:gap-6 py-5 cursor-pointer transition-colors hover:text-brand group-open:text-brand">'
            . '<span class="font-mono text-2xs text-brand/70 pt-1 flex-none">' . $n . '</span>'
            . '<span class="font-display font-bold text-base sm:text-lg tracking-[-0.015em] flex-1">' . $q . '</span>'
            . '<span class="relative flex-none w-5 h-5">'
            . '<i class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3 h-[1.7px] bg-current"></i>'
            . '<i class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[1.7px] h-3 bg-current transition-transform duration-300 group-open:rotate-90"></i>'
            . '</span></summary>'
            . '<div class="pb-5 pl-9 sm:pl-11"><p class="body max-w-[66ch]">' . $a . '</p></div></details>';
        $i++;
    }
    return $o . '</div>';
}

/* ---------- big blocks ---------- */

/** Scrolling red strip with the offer. */
function ticker(): string
{
    $unit = '<div class="flex items-center gap-8 pr-8 font-display font-extrabold uppercase italic text-base sm:text-xl tracking-tightest whitespace-nowrap">'
          . '<span>&#8377;' . OFFER['price'] . ' for 6 months</span><span class="w-2 h-2 bg-white rotate-45 flex-none"></span>'
          . '<span>1 free month on hold</span><span class="w-2 h-2 bg-white rotate-45 flex-none"></span>'
          . '<span>Zumba &amp; aerobics included</span><span class="w-2 h-2 bg-white rotate-45 flex-none"></span></div>';
    return '<div class="bg-brand text-white overflow-hidden py-3 select-none" aria-hidden="true">'
         . '<div class="flex w-max animate-marquee">' . str_repeat($unit, 4) . '</div></div>';
}

/** Four facts under the nav. */
function fact_bar(): string
{
    $o = '<div class="bg-ink-2 border-y border-white/[0.07]"><div class="wrap grid grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-4 py-5">';
    foreach (FACTS as [$ic, $t]) {
        $o .= '<p class="flex items-center gap-2.5 text-[0.84rem] text-white/65"><span class="text-brand flex-none">' . icon($ic) . '</span>' . $t . '</p>';
    }
    return $o . '</div></div>';
}

/**
 * The offer. Same shape as the "spot" blocks on ambiorahotels.cc:
 * a photo running the full width of the screen, a scrim darkening the
 * side the card sits on, and a cream card floating over it.
 */
/**
 * Asset URL with the file's own timestamp attached, so a browser never serves
 * a stale stylesheet or script after a rebuild. Only worth it for the two
 * files that actually change; photos keep their plain paths.
 */
function asset(string $path): string
{
    $stamp = @filemtime(__DIR__ . '/../' . $path);
    return $stamp ? $path . '?v=' . $stamp : $path;
}

/** Amber note marking a section that is still showing sample content. */
function sample_note(string $what): string
{
    return '<div class="sample" data-up>'
         . '<svg width="15" height="15" viewBox="0 0 16 16" fill="none" aria-hidden="true">'
         . '<circle cx="8" cy="8" r="6.4" stroke="currentColor" stroke-width="1.4"/>'
         . '<path d="M8 4.8v4M8 11.1v.1" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>'
         . '</svg><span>' . $what . '</span></div>';
}

/** Up to two initials, for a trainer card with no photograph yet. */
function initials(string $name): string
{
    $parts = array_slice(array_values(array_filter(preg_split('/\s+/u', trim($name)) ?: [])), 0, 2);
    $out   = '';
    foreach ($parts as $part) {
        $out .= function_exists('mb_substr')
            ? mb_strtoupper(mb_substr($part, 0, 1, 'UTF-8'), 'UTF-8')
            : strtoupper(substr($part, 0, 1));
    }
    return $out;
}

/** The four membership cards, read straight from PLANS in config.php. */
function plans_block(): string
{
    $o = PLANS_ARE_SAMPLES
        ? sample_note('Sample prices, except the &#8377;' . OFFER['price']
            . ' six-month offer, which is the real one. Set your own in '
            . '<code class="font-mono text-2xs">inc/config.php</code>.')
        : '';

    $o .= '<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5 items-stretch">';

    foreach (PLANS as $i => $p) {
        $pick = $p['badge'] === 'Most popular';
        $wa   = SITE['wa'] . '?text=' . rawurlencode(
            'Hi, I would like to join The Quads Gym on the ' . $p['name'] . ' plan.'
        );

        $perks = '';
        foreach ($p['perks'] as $t) {
            $perks .= '<li>' . $t . '</li>';
        }

        $o .= '<div class="plan' . ($pick ? ' plan--pick' : '') . '" data-up data-d="' . min($i, 3) . '">';
        if ($p['badge'] !== '') {
            $o .= '<span class="plan__badge">' . $p['badge'] . '</span>';
        }
        $o .= '<p class="plan__name">' . $p['name'] . '</p>'
            . '<p class="plan__price"><span class="plan__cur">&#8377;</span>'
            . '<span class="plan__amt">' . $p['price'] . '</span></p>'
            . '<p class="plan__per">' . $p['per'] . '</p>';
        if ($p['rate'] !== '') {
            $o .= '<p class="plan__rate">' . $p['rate'] . '</p>';
        }
        $o .= '<p class="plan__note">' . $p['note'] . '</p>'
            . '<ul class="plan__perks">' . $perks . '</ul>'
            . '<div class="plan__cta">'
            . '<a href="' . $wa . '" target="_blank" rel="noopener" class="btn '
            . ($pick ? 'btn-brand' : 'btn-ghost') . ' w-full">Join on this plan</a>'
            . '</div></div>';
    }

    return $o . '</div>';
}

/** Personal training prices, charged on top of a membership. */
function pt_strip(): string
{
    $o = '<div class="grid sm:grid-cols-3 gap-4 md:gap-5">';
    foreach (PT_PLANS as $i => [$name, $price, $note]) {
        $o .= '<div class="rounded-xl border hair p-6 bg-ink-2" data-up data-d="' . $i . '">'
            . '<p class="plan__name">' . $name . '</p>'
            . '<p class="plan__price"><span class="plan__cur">&#8377;</span>'
            . '<span class="plan__amt text-[1.6rem]">' . $price . '</span></p>'
            . '<p class="plan__per">' . $note . '</p></div>';
    }
    return $o . '</div>';
}

/** The trainer grid. Uses a photo where TRAINERS gives one, initials otherwise. */
function trainers_block(): string
{
    $o = TRAINERS_ARE_SAMPLES
        ? sample_note('Sample people, so the section has something to show. Replace the names, '
            . 'roles and specialisms in <code class="font-mono text-2xs">inc/config.php</code> '
            . '&mdash; add a <code class="font-mono text-2xs">photo</code> and the initials give way to it.')
        : '';

    $o .= '<div class="grid grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">';

    foreach (TRAINERS as $i => $t) {
        $tags = '';
        foreach ($t['tags'] as $tag) {
            $tags .= '<span class="chip">' . $tag . '</span>';
        }

        $shot = $t['photo'] !== ''
            ? '<div class="person__shot"><img src="assets/img/' . $t['photo'] . '" alt="'
              . e($t['name']) . ', ' . e($t['role']) . ' at The Quads Gym" loading="lazy"></div>'
            : '<div class="person__shot person__shot--mono" role="img" aria-label="'
              . e($t['name']) . '"><span class="person__mono">' . initials($t['name']) . '</span>'
              . '<span class="person__yrs">' . $t['years'] . '</span></div>';

        $o .= '<article class="person" data-up data-d="' . min($i, 3) . '">'
            . $shot
            . '<div class="person__body">'
            . '<p class="person__role">' . $t['role'] . '</p>'
            . '<h3 class="person__name">' . $t['name'] . '</h3>'
            . '<p class="person__line">' . $t['line'] . '</p>'
            . '<div class="person__tags">' . $tags . '</div>'
            . '</div></article>';
    }

    return $o . '</div>';
}

function offer_block(string $img = 'dumbbells.jpg'): string
{
    $inc = '';
    foreach (OFFER['includes'] as $t) {
        $inc .= '<li>' . $t . '</li>';
    }
    $wa = SITE['wa'] . '?text=' . rawurlencode('Hi, I want the ₹' . OFFER['price'] . ' offer at The Quads Gym.');

    return '
<section id="offer" class="spot scroll-mt-16">
  <div class="spot__media">
    <img src="assets/img/' . $img . '" alt="The weights floor at The Quads Gym" loading="lazy">
  </div>
  <span class="spot__scrim"></span>

  <div class="spot__card" data-up>
    <p class="font-mono text-2xs uppercase tracking-label text-brand">Opening offer</p>

    <h2 class="font-display font-bold tracking-[-0.03em] leading-[1.05] mt-3
               text-[clamp(1.95rem,3.1vw,2.7rem)]">' . OFFER['headline'] . '</h2>

    <p class="text-[0.95rem] font-semibold text-brand mt-3">Plus 1 free month on hold.</p>

    <p class="text-[1rem] leading-relaxed text-ink/70 mt-3">' . OFFER['sub'] . '</p>

    <ul class="spot__points">' . $inc . '</ul>

    <div class="flex flex-col sm:flex-row gap-3 mt-7">
      <a href="tel:' . SITE['tel'] . '" class="btn btn-brand flex-1">Call to join</a>
      <a href="' . $wa . '" target="_blank" rel="noopener" class="btn btn-dark flex-1">WhatsApp</a>
    </div>

    <p class="text-xs text-ink/45 mt-5">' . OFFER['fine'] . '</p>
  </div>
</section>';
}

/** Wide banner: one big line over a photo, thin bar beneath. */
function cta_band(string $img, string $label, string $title, string $text, string $btns): string
{
    return '
<section class="banner py-20 md:py-28">
  <img src="assets/img/' . $img . '" alt="" loading="lazy">
  <div class="grain"></div>
  <div class="wrap relative z-10">
    <p class="font-mono text-2xs uppercase tracking-label text-brand" data-up>' . $label . '</p>
    <h2 class="banner__word mt-4 max-w-[18ch]" data-up data-d="1">' . $title . '</h2>
    <div class="banner__bar" data-up data-d="2">
      <p class="lead max-w-[46ch]">' . $text . '</p>
      <div class="flex flex-wrap gap-3">' . $btns . '</div>
    </div>
  </div>
</section>';
}

/**
 * Page header. Same split shape as the home hero: copy left,
 * media panel right that fades into the background.
 */
function page_head(string $video, string $label, string $title, string $sub, string $btns = ''): string
{
    return '
<section class="relative isolate overflow-hidden min-h-[62svh] flex items-center pt-28 pb-12">
  <div class="hero-media">
    <video class="w-full h-full object-cover" autoplay muted loop playsinline preload="auto"
      poster="assets/img/' . $video . '-poster.jpg" src="assets/video/' . $video . '.mp4" aria-hidden="true"></video>
  </div>
  <div class="grain"></div>
  <div class="wrap relative z-20 w-full">
    <div class="grid lg:grid-cols-12">
      <div class="lg:col-span-6 xl:col-span-5">
        ' . kicker($label) . '
        <h1 class="h-xl mt-5 text-balance" data-up data-d="1">' . $title . '</h1>
        <p class="lead mt-5 max-w-[46ch]" data-up data-d="2">' . $sub . '</p>
        ' . ($btns !== '' ? '<div class="flex flex-wrap gap-3 mt-7" data-up data-d="3">' . $btns . '</div>' : '') . '
      </div>
    </div>
  </div>
</section>';
}
