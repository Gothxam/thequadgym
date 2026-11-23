<?php
declare(strict_types=1);

/* ============================================================
   Static build — renders the six PHP pages to plain HTML so the
   site can go on free hosting that does not run PHP.

   Usage:  php build-static.php [base-url] [out-dir]

   The live site should still be hosted as PHP. This build is for
   demos: it is marked noindex, and the enquiry form posts to
   WhatsApp from the browser instead of through PHP.
   ============================================================ */

$base = rtrim($argv[1] ?? 'https://gothxam.github.io/thequadgym', '/');
$out  = $argv[2] ?? __DIR__ . '/_site';
$root = __DIR__;
$php  = PHP_BINARY;

const PAGES  = ['index.php', 'about.php', 'programs.php', 'fitness.php', 'gallery.php', 'contact.php'];
const ASSETS = ['assets/css', 'assets/img', 'assets/js', 'assets/video'];

/* ---------- helpers ---------- */

function wipe(string $dir): void {
    if (!is_dir($dir)) return;
    foreach (scandir($dir) as $f) {
        if ($f === '.' || $f === '..') continue;
        $p = "$dir/$f";
        is_dir($p) ? wipe($p) : unlink($p);
    }
    rmdir($dir);
}

function copy_tree(string $from, string $to): int {
    @mkdir($to, 0777, true);
    $n = 0;
    foreach (scandir($from) as $f) {
        if ($f === '.' || $f === '..') continue;
        $n += is_dir("$from/$f")
            ? copy_tree("$from/$f", "$to/$f")
            : (int) copy("$from/$f", "$to/$f");
    }
    return $n;
}

/* The WhatsApp hand-off that inc/enquiry.php normally does server-side.
   Nowdoc on purpose: PHP must not touch the \n or \D escapes in the JS. */
function form_script(string $wa): string {
    $js = <<<'JS'
<script>
/* Static build: the enquiry form goes straight to WhatsApp, which is what
   inc/enquiry.php does on the PHP site while SITE['email'] is blank. */
(function () {
  var f = document.querySelector('#enquiry form');
  if (!f) return;
  var el = function (n) { return f.elements.namedItem(n); };
  f.setAttribute('action', '#enquiry');
  f.addEventListener('submit', function (ev) {
    ev.preventDefault();

    var honey = el('website');
    if (honey && honey.value.trim() !== '') return;                  // bot

    var name  = el('name').value.trim(),
        phone = el('phone').value.trim(),
        goal  = el('goal').value,
        msg   = el('message').value.trim(),
        bad   = [];

    if (name.length < 2 || name.length > 80) bad.push('name');
    if (phone.replace(/\D+/g, '').length < 7 ||
        phone.replace(/\D+/g, '').length > 15) bad.push('phone');
    if (msg.length > 2000) bad.push('message');

    [].forEach.call(f.elements, function (c) { c.removeAttribute('aria-invalid'); });
    if (bad.length) {
      bad.forEach(function (n) { el(n).setAttribute('aria-invalid', 'true'); });
      el(bad[0]).focus();
      return;
    }

    var nl = '\n';
    var lines = ['Name: ' + name, 'Phone: ' + phone, 'Interested in: ' + goal];
    if (msg) lines.push('Message: ' + msg);
    window.location.href = 'WHATSAPP_URL?text=' +
      encodeURIComponent('Hi The Quads Gym!' + nl + nl + lines.join(nl));
  });
})();
</script>
JS;

    return str_replace('WHATSAPP_URL', $wa, $js);
}

/* ---------- build ---------- */

require_once __DIR__ . '/inc/config.php';

wipe($out);
@mkdir($out, 0777, true);
echo "building into $out\n  base url: $base\n\n";

foreach (PAGES as $page) {
    // One process per page: head.php falls back on $title/$desc/$ld with ??,
    // so rendering them all in one process would leak the previous page's.
    $cmd  = escapeshellarg($php) . ' ' . escapeshellarg("$root/$page");
    $html = shell_exec("cd " . escapeshellarg($root) . " && $cmd");

    if (!is_string($html) || stripos($html, '</html>') === false) {
        fwrite(STDERR, "FAILED: $page\n");
        exit(1);
    }

    // absolute URLs (canonical, og:url, og:image) point at the demo host
    $html = str_replace(rtrim(SITE['url'], '/'), $base, $html);

    // internal links: .php -> .html, relative and absolute alike
    $html = preg_replace(
        '/(href|action|content)="([^"]*?)([a-z0-9_-]+)\.php(#[^"]*)?"/i',
        '$1="$2$3.html$4"',
        $html
    );

    // a demo must not compete with the real site in search
    $html = str_replace(
        '<meta charset="utf-8">',
        "<meta charset=\"utf-8\">\n<meta name=\"robots\" content=\"noindex,nofollow\">",
        $html
    );

    if ($page === 'contact.php') {
        $html = str_replace('</body>', form_script(SITE['wa']) . "\n</body>", $html);
    }

    $name = preg_replace('/\.php$/', '.html', $page);
    file_put_contents("$out/$name", $html);
    printf("  %-14s %6.1f KB\n", $name, strlen($html) / 1024);
}

echo "\n";
foreach (ASSETS as $dir) {
    printf("  %-14s %d files\n", $dir, copy_tree("$root/$dir", "$out/$dir"));
}

file_put_contents("$out/robots.txt", "User-agent: *\nDisallow: /\n");
file_put_contents("$out/.nojekyll", '');
echo "  robots.txt     noindex\n\ndone\n";
