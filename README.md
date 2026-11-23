# The Quads Gym — website

PHP site for The Quads Gym, Manimajra, Chandigarh. Styled with Tailwind CSS, compiled to
one small stylesheet. Upload the folder to any host that runs PHP — Hostinger, cPanel,
almost any shared host. Nothing else to install.

## Pages

| File | What it is |
|---|---|
| `index.php` | Home — hero slideshow, offer, six training cards, about, what's inside, photos, tools, map, FAQ |
| `about.php` | The story, six rules, the trainers, what the rebuild added |
| `programs.php` | Six programs, each anchored, with a quick-jump bar |
| `fitness.php` | Free tools: BMI, calories & protein, one-rep max, plus workout plans and guides |
| `gallery.php` | 32 photos with a lightbox |
| `contact.php` | Address, hours, **working enquiry form**, map, quick FAQ |

## Where the content lives

**Everything you would want to change is in `inc/config.php`** — phone number, address,
opening hours, the offer, the six programs, the gallery list and every FAQ. Change it once
there and it updates on every page.

```php
'tel_h' => '+91 75088 64945',   // shown on screen
'tel'   => '+917508864945',     // used in tel: links
```

The other files in `inc/` are the shared furniture:

| File | What it does |
|---|---|
| `config.php` | All the content and settings |
| `helpers.php` | Icons and the blocks every page is built from |
| `head.php` | `<head>`, fonts, stylesheet, page title |
| `header.php` | Top bar and the mobile menu |
| `footer.php` | Footer, sticky offer bar, scripts |
| `enquiry.php` | Handles the contact form |

Because the header and footer are includes, you edit them once and all six pages change.

## The enquiry form

It is a real form POST, so it works even if JavaScript is off.

- **Leave `'email'` blank in config** (how it is now) and the form forwards the visitor to
  WhatsApp with the message already written out.
- **Put an address in `'email'`** and the enquiry is emailed to you instead, and the
  visitor sees a thank-you message.

```php
'email' => 'you@thequadsfitness.com',
```

It checks the name and phone number, keeps what was typed if something is wrong, and has a
hidden field that catches spam bots. Nothing is stored on the server.

> `mail()` works on most shared hosts. If your host blocks it, use an SMTP plugin or leave
> `'email'` blank and keep the WhatsApp route.

## Design

Dark base (`#0A0A0C`), one brand red (`#E11225`) taken from the wall art, and bone-coloured
sections for contrast. Fonts: **Archivo** headings, **Inter** body, **JetBrains Mono** labels.

The home hero sets the visual language and every other section follows it:

- a small red rule and a mono label opening each section
- icons in brand red next to labels, list items and stats
- photo panels that fade into the background instead of ending on a hard edge
- the stat strip, reused on the About page
- outlined numerals behind the numbered lists

Headings are sentence case at a moderate size. The one piece of heavy italic display type
is the hero headline, with the last word in red over an SVG brush stroke.

Mobile first — single column by default, widening at `sm:`, `md:` and `lg:`. There is a
sticky red offer bar on phones and a full-screen drawer menu.

### Page width

Content sits in `.wrap`, capped at **1920px** (`maxWidth.site` in `tailwind.config.js`).
The side gutter is one fluid value rather than a set of breakpoints:

```css
padding-inline: clamp(1.25rem, 4.2vw, 4rem);
```

That is 20px on a phone, **60px at 1440** and 64px at the widest. The 60px figure is taken
from ambiorahotels.cc, which this layout follows.

### Layout patterns

These come from the same reference site and are defined in `src/input.css`:

| Class | Where it is used |
|---|---|
| `.tallcard` | The four-across training cards on the home page — photo, caption over it, red arrow |
| `.tile` | The home photo grid. Fixed row heights (`auto-rows-[clamp(140px,14vw,210px)]`) with `col-span` / `row-span`, so every row lines up |
| `.credo` | The home About block — a centred statement with two captioned photos staggered either side |
| `.spot` | The offer — a photo running the full width of the screen, a scrim, and a cream card floating over it |
| `.banner` | The wide closing call to action — one big word over a photo, a thin bar of buttons beneath |
| `.dash` | List items marked with a short red dash instead of a tick |
| `.seeall` | The small "View all →" link sitting to the right of a section heading |

Buttons are `rounded-lg` (8px), uppercase, with wide letter spacing — again matching the
reference.

Programs on `programs.php` each get an oversized outline numeral, a wide photo band and a
two-column row of text beneath, rather than six identical left/right splits.

## Media

- `assets/img/logo.png` — the full badge, 512&times;512 with a transparent background,
  cut square from your high-resolution artwork. Used whole everywhere: header (40px on
  phones, 44px on desktop), footer (80px) and the browser-tab icon.
- `assets/_originals/logo-hires.webp` — your original 1261&times;1247 file, in case the
  sizes ever need re-cutting.
- `assets/img/` — 39 photos, max 1600–1920px (~12 MB)
- `assets/video/` — 6 clips, 1280×720 H.264, 6.4 MB total, used on the inner page headers
- `assets/_originals/` — your untouched 4K originals, **717 MB**

> **Do not upload `assets/_originals/`.** It is kept only so you can re-crop later.
> `.gitignore` already keeps it, `node_modules/` and the stray zip out of git.
>
> After cloning, run `npm install` only if you need to rebuild the stylesheet — the
> compiled `assets/css/tailwind.css` is committed, so the site runs straight away.

The home hero is five photos crossfading every 6 seconds. Inner pages use one looping clip.

## Changing the styles

Tailwind scans the PHP files, so after changing any class or editing `src/input.css`:

```bash
npx tailwindcss -i src/input.css -o assets/css/tailwind.css --minify
```

You only need this for **style** changes. Editing text or content in `inc/config.php`
needs no build at all — just save and reload.

## Free demo build

`build-static.php` renders the six pages to plain HTML so the site can sit on
hosting that does not run PHP — handy for showing a client before the real host
is sorted.

```bash
php build-static.php
```

That writes `_site/`, which is only for checking the build locally — it is
gitignored.

**The demo rebuilds itself.** It is live at
<https://gothxam.github.io/thequadgym/>, and `.github/workflows/demo.yml`
rebuilds and republishes it on every push to `main`:

```bash
git push
```

That is the whole process. The workflow runs the same `build-static.php`, checks
all six pages came out non-empty with no `.php` links left behind, then
publishes. It takes about a minute, and you can watch it under the repo's
**Actions** tab or trigger it by hand there with **Run workflow**.

What the static build changes, and nothing else:

- internal links become `.html`
- every page is marked `noindex` and `robots.txt` disallows everything, so the
  demo cannot compete with the real site in Google
- the enquiry form hands off to WhatsApp **from the browser** rather than
  through `inc/enquiry.php`, which is the same thing the PHP site does while
  `'email'` is blank

> The demo is a convenience, not the plan. Host the real site as PHP so
> `inc/config.php` stays the one place you edit content, and so the form can be
> switched to email later by filling in `'email'`.

## Local preview

```bash
php -S localhost:5599
```

Then open <http://localhost:5599>. XAMPP's PHP is at `C:/xampp/php/php.exe`.

## Still to add

- **Membership plans** — no pricing table yet, by design. Send the plans and they get their
  own section.
- **Real reviews** — nothing is shown, because inventing them would be dishonest. Once you
  have Google reviews they can be quoted with names.
- **Social links** — Instagram and Facebook point at the generic homepages. Set them in
  `inc/config.php`.
- **Class timetable** — `programs.php` currently tells people to call for batch timings.

## Notes

- The fitness calculators run in the browser. Nothing is sent or saved.
- The fitness page carries a visible note that its content is general guidance, not medical
  advice. Please leave that in.
- Everything respects `prefers-reduced-motion`.
- `robots.txt` and `sitemap.xml` are set up for Google.
