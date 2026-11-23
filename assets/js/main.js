/* ============================================================
   THE QUADS GYM — interactions. Vanilla, no dependencies.
   ============================================================ */
(function () {
  'use strict';

  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return [].slice.call((c || document).querySelectorAll(s)); };

  /* ---------- header ---------- */
  var hdr = $('.hdr'), lastY = window.scrollY, tick = false;
  function onScroll() {
    var y = window.scrollY;
    if (hdr) {
      hdr.classList.toggle('stuck', y > 30);
      if (!document.body.classList.contains('menu-open')) {
        hdr.classList.toggle('hide', y > 520 && y > lastY + 4);
      }
    }
    var ob = $('.obar');
    if (ob) ob.classList.toggle('show', y > 560);
    lastY = y; tick = false;
  }
  window.addEventListener('scroll', function () {
    if (!tick) { requestAnimationFrame(onScroll); tick = true; }
  }, { passive: true });
  onScroll();

  /* ---------- mobile drawer ---------- */
  var burger = $('.burger');
  if (burger) {
    burger.addEventListener('click', function () {
      var open = document.body.classList.toggle('menu-open');
      burger.setAttribute('aria-expanded', open ? 'true' : 'false');
      document.documentElement.style.overflow = open ? 'hidden' : '';
      if (open && hdr) hdr.classList.remove('hide');
    });
    $$('.drawer a').forEach(function (a) {
      a.addEventListener('click', function () {
        document.body.classList.remove('menu-open');
        burger.setAttribute('aria-expanded', 'false');
        document.documentElement.style.overflow = '';
      });
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && document.body.classList.contains('menu-open')) burger.click();
    });
  }

  /* ---------- reveal on scroll ---------- */
  var ups = $$('[data-up]');
  if (reduced || !('IntersectionObserver' in window)) {
    ups.forEach(function (el) { el.classList.add('in'); });
  } else {
    var io = new IntersectionObserver(function (es) {
      es.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -6% 0px' });
    ups.forEach(function (el) { io.observe(el); });
  }

  /* ---------- counters ---------- */
  function count(el) {
    var to = parseFloat(el.dataset.count), sfx = el.dataset.suffix || '';
    var fmt = function (n) { return Math.round(n).toLocaleString('en-IN'); };
    if (reduced) { el.textContent = fmt(to) + sfx; return; }
    var t0 = null;
    (function step(t) {
      if (!t0) t0 = t;
      var p = Math.min((t - t0) / 1400, 1), e = 1 - Math.pow(1 - p, 3);
      el.textContent = fmt(to * e) + sfx;
      if (p < 1) requestAnimationFrame(step);
    })(performance.now());
  }
  var cs = $$('[data-count]');
  if (cs.length && 'IntersectionObserver' in window) {
    var cio = new IntersectionObserver(function (es) {
      es.forEach(function (e) { if (e.isIntersecting) { count(e.target); cio.unobserve(e.target); } });
    }, { threshold: 0.6 });
    cs.forEach(function (el) { cio.observe(el); });
  } else {
    cs.forEach(count);
  }

  /* ---------- hero slideshow ----------
     Crossfades between clips. Only the clip about to be shown is
     loaded, so the page starts with one video, not five. */
  var show = $('[data-slides]');
  if (show) {
    var slides = $$('.slide', show);
    var dots = $$('.dot', show.parentNode) ;
    var hold = parseInt(show.dataset.slides, 10) || 6000;
    var at = 0;
    var timer = null;

    function load(slide) {
      var v = $('video', slide);
      if (v && v.dataset.src && !v.getAttribute('src')) {
        v.setAttribute('src', v.dataset.src);
        v.load();
      }
      return v;
    }
    function go(next) {
      if (next === at || slides.length < 2) return;
      var from = slides[at], to = slides[next];
      var toV = load(to);
      if (toV) { var p = toV.play(); if (p && p.catch) p.catch(function () {}); }

      to.classList.add('is-on');
      from.classList.remove('is-on');
      dots.forEach(function (d, i) { d.classList.toggle('is-on', i === next); });

      // stop the outgoing clip once it has faded out
      window.setTimeout(function () {
        var fv = $('video', from);
        if (fv && !fv.paused) fv.pause();
      }, 1500);

      at = next;
      queue();
    }
    function queue() {
      window.clearTimeout(timer);
      timer = window.setTimeout(function () { go((at + 1) % slides.length); }, hold);
    }

    // preload the next clip a little before it is needed
    function warm() { load(slides[(at + 1) % slides.length]); }

    if (!reduced && slides.length > 1) {
      dots.forEach(function (d, i) {
        d.addEventListener('click', function () { go(i); });
      });
      var firstV = $('video', slides[0]);
      if (firstV) { var fp = firstV.play(); if (fp && fp.catch) fp.catch(function () {}); }
      dots.forEach(function (d, i) { d.classList.toggle('is-on', i === 0); });
      queue();
      window.setTimeout(warm, 1500);

      // pause the whole thing while the hero is off screen
      if ('IntersectionObserver' in window) {
        new IntersectionObserver(function (es) {
          es.forEach(function (e) {
            if (e.isIntersecting) { queue(); }
            else {
              window.clearTimeout(timer);
              slides.forEach(function (s) { var v = $('video', s); if (v && !v.paused) v.pause(); });
            }
          });
        }, { threshold: 0.15 }).observe(show);
      }
    } else {
      slides[0].classList.add('is-on');
      dots.forEach(function (d, i) { d.classList.toggle('is-on', i === 0); });
    }
  }

  /* ---------- lazy video ---------- */
  function hydrate(v) {
    if (v.dataset.src && !v.getAttribute('src')) { v.setAttribute('src', v.dataset.src); v.load(); }
  }
  var vids = $$('video[data-src]');
  if ('IntersectionObserver' in window) {
    var vio = new IntersectionObserver(function (es) {
      es.forEach(function (e) {
        var v = e.target;
        if (e.isIntersecting) { hydrate(v); var p = v.play(); if (p && p.catch) p.catch(function () {}); }
        else if (!v.paused) v.pause();
      });
    }, { threshold: 0.2, rootMargin: '200px 0px' });
    vids.forEach(function (v) { vio.observe(v); });
  } else {
    vids.forEach(hydrate);
  }

  /* ---------- lightbox (images + video) ---------- */
  var items = $$('[data-full]');
  if (items.length) {
    var lb = document.createElement('div');
    lb.className = 'lb';
    lb.setAttribute('role', 'dialog');
    lb.setAttribute('aria-modal', 'true');
    lb.setAttribute('aria-label', 'Gallery viewer');
    lb.innerHTML =
      '<button class="lb__x" aria-label="Close">&times;</button>' +
      '<button class="lb__nav lb__prev" aria-label="Previous">&#8592;</button>' +
      '<div class="lb__slot"></div>' +
      '<button class="lb__nav lb__next" aria-label="Next">&#8594;</button>' +
      '<p class="lb__cap"></p>';
    document.body.appendChild(lb);
    var slot = $('.lb__slot', lb), cap = $('.lb__cap', lb), i = 0;

    function show(n) {
      i = (n + items.length) % items.length;
      var it = items[i], src = it.dataset.full;
      slot.innerHTML = '';
      var el;
      if (/\.mp4$/i.test(src)) {
        el = document.createElement('video');
        el.src = src; el.muted = true; el.loop = true; el.playsInline = true; el.controls = true;
        var p = el.play(); if (p && p.catch) p.catch(function () {});
      } else {
        el = document.createElement('img');
        el.src = src; el.alt = it.dataset.cap || '';
      }
      el.className = 'lb__m';
      slot.appendChild(el);
      cap.textContent = it.dataset.cap || '';
    }
    function open(n) { show(n); lb.classList.add('on'); document.documentElement.style.overflow = 'hidden'; }
    function close() { lb.classList.remove('on'); slot.innerHTML = ''; document.documentElement.style.overflow = ''; }

    items.forEach(function (it, n) {
      it.style.cursor = 'pointer';
      it.setAttribute('tabindex', '0');
      it.setAttribute('role', 'button');
      it.addEventListener('click', function () { open(n); });
      it.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); open(n); }
      });
    });
    $('.lb__x', lb).addEventListener('click', close);
    $('.lb__prev', lb).addEventListener('click', function () { show(i - 1); });
    $('.lb__next', lb).addEventListener('click', function () { show(i + 1); });
    lb.addEventListener('click', function (e) { if (e.target === lb) close(); });
    document.addEventListener('keydown', function (e) {
      if (!lb.classList.contains('on')) return;
      if (e.key === 'Escape') close();
      if (e.key === 'ArrowRight') show(i + 1);
      if (e.key === 'ArrowLeft') show(i - 1);
    });
  }

  /* The enquiry form posts to contact.php, which emails it or
     forwards to WhatsApp. No JavaScript needed for it to work. */

  /* ============================================================
     FITNESS TOOLS
     ============================================================ */

  /* --- BMI --- */
  var bmiForm = $('#bmi-form');
  if (bmiForm) {
    bmiForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var h = parseFloat($('#bmi-h').value) / 100;
      var w = parseFloat($('#bmi-w').value);
      var out = $('#bmi-out');
      if (!(h > 0.5 && h < 2.6) || !(w > 20 && w < 350)) {
        out.className = 'result on';
        out.innerHTML = '<p class="note">Enter a height in centimetres and a weight in kilograms.</p>';
        return;
      }
      var bmi = w / (h * h);
      var cat, cls, note;
      if (bmi < 18.5) {
        cat = 'Underweight'; cls = 'warn';
        note = 'Eating more is the priority. Strength training plus a calorie surplus will add weight as muscle rather than fat. Ask a coach for a gaining plan.';
      } else if (bmi < 25) {
        cat = 'Healthy range'; cls = 'ok';
        note = 'Good starting point. From here it is about body composition, not the scale — strength training two to four times a week will change how you look more than the number will.';
      } else if (bmi < 30) {
        cat = 'Overweight'; cls = 'warn';
        note = 'Very common and very fixable. A small calorie deficit, walking every day and three weight sessions a week is enough for most people. No crash diet needed.';
      } else {
        cat = 'Obese'; cls = 'bad';
        note = 'Worth starting with low-impact work — walking, cycling, machine-based training — and a diet plan from a coach. Talk to your doctor first if you have any medical condition.';
      }
      var ideal = (18.5 * h * h).toFixed(0) + '–' + (24.9 * h * h).toFixed(0);
      out.className = 'result on';
      out.innerHTML =
        '<p class="lbl plain dim">Your BMI</p>' +
        '<p class="big">' + bmi.toFixed(1) + '</p>' +
        '<span class="cat ' + cls + '">' + cat + '</span>' +
        '<div class="scale" aria-hidden="true"><i></i><i></i><i></i><i></i></div>' +
        '<div class="scale__k"><span>Under 18.5</span><span>18.5–24.9</span><span>25–29.9</span><span>30+</span></div>' +
        '<p class="note">' + note + '</p>' +
        '<p class="note">A healthy weight for your height is roughly <strong>' + ideal + ' kg</strong>. ' +
        'BMI ignores muscle, so if you already lift, treat it as a rough guide only.</p>';
      out.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
    });
  }

  /* --- Calories + protein --- */
  var calForm = $('#cal-form');
  if (calForm) {
    calForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var sex = $('#cal-sex').value;
      var age = parseFloat($('#cal-age').value);
      var h = parseFloat($('#cal-h').value);
      var w = parseFloat($('#cal-w').value);
      var act = parseFloat($('#cal-act').value);
      var goal = $('#cal-goal').value;
      var out = $('#cal-out');

      if (!(age > 10 && age < 100) || !(h > 90 && h < 250) || !(w > 25 && w < 350)) {
        out.className = 'result on';
        out.innerHTML = '<p class="note">Check the numbers — age in years, height in cm, weight in kg.</p>';
        return;
      }
      // Mifflin–St Jeor
      var bmr = 10 * w + 6.25 * h - 5 * age + (sex === 'm' ? 5 : -161);
      var tdee = bmr * act;
      var target = goal === 'lose' ? tdee - 450 : goal === 'gain' ? tdee + 350 : tdee;
      target = Math.max(target, sex === 'm' ? 1500 : 1200);

      var protein = Math.round(w * (goal === 'lose' ? 2.0 : 1.8));
      var fat = Math.round(w * 0.8);
      var carbs = Math.max(Math.round((target - protein * 4 - fat * 9) / 4), 50);

      var line = goal === 'lose'
        ? 'Aim for about half a kilo of fat loss a week. Slower than that is fine; faster usually costs you muscle.'
        : goal === 'gain'
          ? 'A small surplus adds muscle without much fat. Expect roughly two to three kilos a month at most.'
          : 'This keeps your weight steady while you get stronger — a good place to sit for your first few months.';

      out.className = 'result on';
      out.innerHTML =
        '<p class="lbl plain dim">Daily target</p>' +
        '<p class="big">' + Math.round(target).toLocaleString('en-IN') + ' <span style="font-size:.4em;font-weight:600">kcal</span></p>' +
        '<div class="macros">' +
          '<div class="macro"><p class="v">' + protein + 'g</p><p class="k">Protein</p></div>' +
          '<div class="macro"><p class="v">' + carbs + 'g</p><p class="k">Carbs</p></div>' +
          '<div class="macro"><p class="v">' + fat + 'g</p><p class="k">Fat</p></div>' +
        '</div>' +
        '<p class="note">' + line + ' Your body burns roughly <strong>' +
          Math.round(tdee).toLocaleString('en-IN') + ' kcal</strong> a day at this activity level.</p>' +
        '<p class="note">Rough protein guide in everyday food: 100 g paneer ≈ 18 g, 2 eggs ≈ 12 g, ' +
          '1 katori dal ≈ 7 g, 100 g chicken ≈ 27 g, 1 cup curd ≈ 9 g.</p>';
      out.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
    });
  }

  /* --- 1RM --- */
  var rmForm = $('#rm-form');
  if (rmForm) {
    rmForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var w = parseFloat($('#rm-w').value), r = parseFloat($('#rm-r').value);
      var out = $('#rm-out');
      if (!(w > 0) || !(r >= 1 && r <= 12)) {
        out.className = 'result on';
        out.innerHTML = '<p class="note">Enter the weight you lifted and how many reps you got (1 to 12).</p>';
        return;
      }
      var rm = r === 1 ? w : w * (1 + r / 30); // Epley
      var pct = [[95, 2], [90, 4], [85, 6], [80, 8], [75, 10], [70, 12]];
      out.className = 'result on';
      out.innerHTML =
        '<p class="lbl plain dim">Estimated one-rep max</p>' +
        '<p class="big">' + rm.toFixed(1) + ' <span style="font-size:.4em;font-weight:600">kg</span></p>' +
        '<div class="macros" style="grid-template-columns:repeat(3,1fr)">' +
          pct.slice(0, 3).map(function (p) {
            return '<div class="macro"><p class="v">' + (rm * p[0] / 100).toFixed(1) + '</p><p class="k">' + p[0] + '% · ~' + p[1] + ' reps</p></div>';
          }).join('') +
        '</div>' +
        '<div class="macros" style="grid-template-columns:repeat(3,1fr);margin-top:.7rem">' +
          pct.slice(3).map(function (p) {
            return '<div class="macro"><p class="v">' + (rm * p[0] / 100).toFixed(1) + '</p><p class="k">' + p[0] + '% · ~' + p[1] + ' reps</p></div>';
          }).join('') +
        '</div>' +
        '<p class="note">An estimate, not a target. Do not attempt a true one-rep max without a coach and a spotter.</p>';
      out.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
    });
  }

  /* ---------- year ---------- */
  $$('[data-year]').forEach(function (el) { el.textContent = new Date().getFullYear(); });
})();
