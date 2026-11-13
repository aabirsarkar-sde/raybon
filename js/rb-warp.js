/* =============================================================
   Raybon home hero: warp ring of product cards.

   A dependency-free port of "Warp Carousel" by Louis Studios
   (https://studios.lou15.com, via 21st.dev). The ring geometry, the spin
   curve and the WebGL lens shader are theirs. Changes for this site:
     - no React; the hero slider in index.php drives it through go()
     - each card is a product card (photo, category, name, summary,
       Know more) instead of a stat card
     - the stage is transparent so the hero photo shows through, and the
       glow bands are drawn as light over it
     - WebGL2 only: without it, init() returns null and the hero keeps
       its plain product picture
   ============================================================= */
(function () {
    "use strict";

    var CW = 256, CH = 320, CR = 10, FOCAL = 734.103;
    /* Stage height the cards are fitted into. The reference uses 440, leaving wide
       margins for the glow bands; 400 makes the cards bigger in the same hero. */
    var STAGE_H = 400;
    var G = {
        qA: 0.46401, XLA: 165.774, zA: 35.354, psiA: 1.44638, a1: 1.31454, a2: 1.10948,
        qB: 0.74999, XB: 204.525, ZB: 355.405, bB: 0.69311, bE: 0.04614, vC: 203.134,
        aC: 229.260, kB: 0.01087, bP: 0.99129, qPR: 1.01828, bPL: 1.00920, qPL: 1.07139
    };

    /* Pose of a card at ring offset q (0 front, +1 right, -1 left): [x, depth, yaw]. */
    function poseAt(q0) {
        var q = q0;
        if (Math.abs(q) < 1) q -= G.kB * Math.pow(Math.sin(Math.PI * q), 2);
        var s = q < 0 ? -1 : 1, a = Math.abs(q), half = CW / 2;
        if (a <= G.qA) {
            var t0 = a / G.qA;
            var xl = -half + (G.XLA + half) * Math.pow(t0, G.a1);
            var zl = G.zA * Math.pow(t0, 4);
            var ps = G.psiA * Math.pow(t0, G.a2);
            return [s * (xl + half * Math.cos(ps)), zl + half * Math.sin(ps), s * ps];
        }
        var dXL = ((G.XLA + half) * G.a1) / G.qA, dZL = (G.zA * 4) / G.qA, dps = (G.psiA * G.a2) / G.qA;
        var Hx, Hz;
        if (a <= G.qB) {
            var L = G.qB - G.qA, t = (a - G.qA) / L;
            var hx = G.XLA + CW * Math.cos(G.psiA), hz = G.zA + CW * Math.sin(G.psiA);
            var dhx = dXL - CW * Math.sin(G.psiA) * dps, dhz = dZL + CW * Math.cos(G.psiA) * dps;
            var h00 = 2 * t * t * t - 3 * t * t + 1, h10 = t * t * t - 2 * t * t + t;
            var h01 = -2 * t * t * t + 3 * t * t, h11 = t * t * t - t * t;
            Hx = h00 * hx + h10 * L * dhx * G.bB + h01 * G.XB + h11 * L * G.vC * G.bE;
            Hz = h00 * hz + h10 * L * dhz * G.bB + h01 * G.ZB;
        } else {
            var d = a - G.qB;
            Hx = G.XB + G.vC * d + G.aC * d * d;
            Hz = G.ZB;
        }
        var qP = s < 0 ? G.qPL : G.qPR, bP = s < 0 ? G.bPL : G.bP, LP = qP - G.qA;
        var tp = Math.min(1, (a - G.qA) / LP);
        var psi = (2 * tp * tp * tp - 3 * tp * tp + 1) * G.psiA +
            (tp * tp * tp - 2 * tp * tp + tp) * LP * dps * bP +
            (-2 * tp * tp * tp + 3 * tp * tp) * Math.PI;
        return [s * (Hx - half * Math.cos(psi)), Hz - half * Math.sin(psi), s * psi];
    }

    /* Spin curve over one step, in 30 fps frames. */
    var TK = [0, 3, 6, 8, 10, 11, 12, 13, 14, 16, 18, 21, 25, 30, 36, 45, 55, 70, 88, 110];
    var TB = [0, 0.02175, 0.12069, 0.22549, 0.35493, 0.43254, 0.51436, 0.5952, 0.6751, 0.83199, 0.9709, 1.12669, 1.27958, 1.40975, 1.53561, 1.68385, 1.79183, 1.89191, 1.95233, 2];
    var STEP_FRAMES = 110;
    var SLOPES = (function () {
        var n = TK.length, h = [], dl = [], d = [], k;
        for (k = 0; k < n - 1; k++) { h.push(TK[k + 1] - TK[k]); dl.push((TB[k + 1] - TB[k]) / h[k]); }
        for (k = 0; k < n; k++) d.push(0);
        for (k = 1; k < n - 1; k++) {
            if (dl[k - 1] * dl[k] <= 0) continue;
            var w1 = 2 * h[k] + h[k - 1], w2 = h[k] + 2 * h[k - 1];
            d[k] = (w1 + w2) / (w1 / dl[k - 1] + w2 / dl[k]);
        }
        d[0] = d[n - 1] = (dl[0] + dl[n - 2]) / 2;
        return d;
    })();
    function spin(f) {
        if (f <= 0) return 0;
        if (f >= STEP_FRAMES) return 1;
        var i = 0;
        while (i < TK.length - 2 && f > TK[i + 1]) i++;
        var h = TK[i + 1] - TK[i], t = (f - TK[i]) / h;
        var h00 = 2 * t * t * t - 3 * t * t + 1, h10 = t * t * t - 2 * t * t + t;
        var h01 = -2 * t * t * t + 3 * t * t, h11 = t * t * t - t * t;
        return (h00 * TB[i] + h10 * h * SLOPES[i] + h01 * TB[i + 1] + h11 * h * SLOPES[i + 1]) / 2;
    }

    /* The glow a card casts above and below the ring: [centre u, half width, strength]. */
    function glowShape(pose) {
        var px = pose[0], pz = pose[1], ps = pose[2];
        var c = Math.cos(ps), sn = Math.sin(ps);
        if (c <= 0.02) return [0, 1, 0];
        var A = px, B = FOCAL + pz, tNear = B - 0.5 * CW * Math.abs(sn);
        var m = 0, mx = 0, mxx = 0;
        for (var u = -360; u <= 360; u += 3) {
            var hh = Math.exp(-Math.pow(Math.abs(u - 9) / 138, 4));
            if (hh < 0.003) continue;
            var k = u / 1.8 / FOCAL, den = sn * k - c;
            if (Math.abs(den) < 1e-4) continue;
            var s = (A - B * k) / den, t = B + s * sn;
            if (t < 4) continue;
            if (k * t * sn - t * c >= 0) continue;
            var dsdk = (B * c - A * sn) / (den * den);
            var soft = Math.min(Math.abs(dsdk / FOCAL) * 2.2, 40) + 0.5;
            var cov = Math.max(0, Math.min(1, (CW * 0.5 - Math.abs(s)) / soft + 0.5));
            if (cov <= 0) continue;
            var near = Math.min(1, FOCAL / t);
            var rel = Math.exp(-Math.pow(Math.max(t - tNear, 0) / 36, 1.5));
            var w = cov * near * near * rel * c * hh;
            m += w; mx += w * u; mxx += w * u * u;
        }
        if (m < 0.5) return [0, 1, 0];
        var mu = mx / m, sd = Math.sqrt(Math.max(1, mxx / m - mu * mu));
        var r = Math.max(6, sd / 0.581);
        return [mu, r, (m * 3) / (1.813 * r)];
    }

    var VERT = "#version 300 es\nin vec2 aPos;\nvoid main(){ gl_Position = vec4(aPos, 0.0, 1.0); }";

    var FRAG = [
        "#version 300 es",
        "precision highp float;",
        "precision highp sampler2DArray;",
        "uniform sampler2DArray uTex;",
        "uniform vec2 uRes;",
        "uniform float uUnit;",
        "uniform vec4 uPose[4];",
        "uniform vec3 uGlowShape[4];",
        "uniform vec3 uGlowCol;",
        "uniform float uWarp;",
        "uniform float uLens;", // where the flare starts, in stage units from the centre
        "out vec4 outColor;",
        "const float F = " + FOCAL.toFixed(2) + ";",
        "const float CW = " + CW.toFixed(1) + ";",
        "const float CH = " + CH.toFixed(1) + ";",
        "const float CR = " + CR.toFixed(1) + ";",
        "float lensH(float a){",
        "  if (a <= 232.0) return a;",
        "  float k[9] = float[9](232.0, 238.0, 245.0, 253.0, 262.0, 275.0, 295.0, 325.0, 360.0);",
        "  float d[9] = float[9](1.1759, 1.0671, 1.0156, 1.0965, 0.6487, 0.2700, -0.1991, -0.4782, -0.0318);",
        "  float s = 232.0;",
        "  for (int i = 0; i < 8; i++){",
        "    if (a <= k[i]) break;",
        "    float x = min(a, k[i+1]);",
        "    float t = (x - k[i]) / (k[i+1] - k[i]);",
        "    s += (x - k[i]) * mix(1.0, mix(d[i], d[i+1], t * 0.5), uWarp);",
        "  }",
        "  if (a > 360.0) s += (a - 360.0) * mix(1.0, d[8], uWarp);",
        "  return s;",
        "}",
        "float lensS(float a){",
        "  float t = clamp((a - 262.0) / 93.0, 0.0, 2.0);",
        "  return 1.0 + uWarp * (0.42 * pow(t, 1.5) + 0.045 * smoothstep(320.0, 360.0, a));",
        "}",
        "float sdRound(vec2 p, vec2 b, float r){",
        "  vec2 q = abs(p) - b + r;",
        "  return min(max(q.x, q.y), 0.0) + length(max(q, 0.0)) - r;",
        "}",
        "vec4 shadeCard(vec4 pose, vec2 ps, float fx, float fy, out float depth){",
        "  depth = 1e9;",
        "  if (pose.w < 0.0) return vec4(0.0);",
        "  float k = ps.x / F;",
        "  float c = cos(pose.z), sn = sin(pose.z);",
        "  float den = sn * k - c;",
        "  if (abs(den) < 1e-5) return vec4(0.0);",
        "  float A = pose.x, B = F + pose.y;",
        "  float s = (A - B * k) / den;",
        "  float t = B + s * sn;",
        "  if (t < 4.0) return vec4(0.0);",
        "  float y = t * ps.y / F;",
        "  float dsdk = (B * c - A * sn) / (den * den);",
        "  float fs = min(abs(dsdk / F) * fx, 48.0);",
        "  float fyc = min(t / F * fy, 48.0);",
        "  vec2 p = vec2(s, y);",
        "  float d = sdRound(p, vec2(CW, CH) * 0.5, CR);",
        "  vec2 q = abs(p) - vec2(CW, CH) * 0.5 + CR;",
        "  vec2 n = q.x > q.y ? vec2(1.0, 0.0) : vec2(0.0, 1.0);",
        "  if (q.x > 0.0 && q.y > 0.0) n = normalize(q);",
        "  float fp = length(vec2(fs * n.x, fyc * n.y)) + 1e-4;",
        "  if (d > fp) return vec4(0.0);",
        "  float cov = clamp(0.5 - d / fp, 0.0, 1.0);",
        "  if (cov <= 0.0) return vec4(0.0);",
        "  vec2 uv = vec2(s / CW + 0.5, 0.5 - y / CH);",
        /* A card turned past side-on shows its back; read it the right way round. */
        "  if (B * c - A * sn < 0.0) uv.x = 1.0 - uv.x;",
        "  vec4 tex = textureGrad(uTex, vec3(uv, pose.w), vec2(fs / CW, 0.0), vec2(0.0, fyc / CH));",
        "  depth = t;",
        "  return vec4(tex.rgb, 1.0) * cov;",
        "}",
        "vec4 scene(vec2 ps, float fx, float fy){",
        "  vec4 col[4];",
        "  float dep[4];",
        "  for (int i = 0; i < 4; i++) col[i] = shadeCard(uPose[i], ps, fx, fy, dep[i]);",
        "  for (int i = 0; i < 3; i++)",
        "    for (int j = 0; j < 3; j++)",
        "      if (j < 3 - i && dep[j] > dep[j+1]) {",
        "        float td = dep[j]; dep[j] = dep[j+1]; dep[j+1] = td;",
        "        vec4 tc = col[j]; col[j] = col[j+1]; col[j+1] = tc;",
        "      }",
        "  vec4 acc = vec4(0.0);",
        "  for (int i = 0; i < 4; i++) acc += (1.0 - acc.a) * col[i];",
        "  return acc;",
        "}",
        /* Glow bands as premultiplied light over a transparent stage. */
        "vec4 glowAt(vec2 pu, float halfH){",
        "  float gH = min(halfH, 288.0);",
        "  float dy = min(abs((gH - 11.0) - pu.y), abs(pu.y + (gH - 12.0)));",
        "  if (dy > 40.0) return vec4(0.0);",
        "  float sum = 0.0;",
        "  for (int i = 0; i < 4; i++){",
        "    vec3 sh = uGlowShape[i];",
        "    if (sh.z <= 0.0) continue;",
        "    float E = exp(-pow(abs(pu.x - sh.x) / sh.y, 4.0));",
        "    if (E < 0.002) continue;",
        "    float v = exp(-pow(dy / (18.5 * (0.45 + 0.55 * sqrt(E))), 3.0));",
        "    sum += sh.z * E * v;",
        "  }",
        "  float I = clamp(sum, 0.0, 1.0) * 0.85;",
        "  return vec4(uGlowCol * I, I);",
        "}",
        "vec4 render(vec2 pu, float halfH){",
        "  float ax = abs(pu.x);",
        "  float px = 1.0 / uUnit;",
        "  vec4 bg = glowAt(pu, halfH);",
        "  if (ax < uLens || uWarp <= 0.0) {",
        "    vec4 c = scene(pu, px, px);",
        "    return c + (1.0 - c.a) * bg;",
        "  }",
        /* The reference lens runs 232 to 360 units and then smears its last column out
           to the edge. Here the whole lens is squeezed into uLens..edge instead, so it
           starts later and the side cards show more before they warp. */
        "  float halfW = 0.5 * uRes.x / uUnit;",
        "  float k = 128.0 / max(halfW - uLens, 1.0);",
        "  float au = min(232.0 + (ax - uLens) * k, 360.0);",
        "  float shift = uLens - 232.0;",
        "  float e = 0.064 * uWarp * smoothstep(275.0, 360.0, au);",
        "  float S0 = lensS(au);",
        "  float sg = pu.x < 0.0 ? -1.0 : 1.0;",
        "  float blur = 1.0 + 30.0 * pow(smoothstep(240.0, 340.0, au), 1.5) * uWarp;",
        "  float fyb = 1.0 + 15.0 * smoothstep(280.0, 352.0, au) * uWarp;",
        "  float gain = 1.0 + 0.17 * smoothstep(285.0, 350.0, au) * uWarp;",
        "  vec3 acc; float alpha = 0.0;",
        "  for (int ch = 0; ch < 3; ch++){",
        "    float off = uWarp * (ch == 0 ? -20.92 : (ch == 1 ? 0.0 : 11.91));",
        "    float h = shift + lensH(au) + off * smoothstep(289.8, 344.9, au);",
        "    float h0 = shift + lensH(au - 0.5 * k) + off * smoothstep(289.8, 344.9, au - 0.5 * k);",
        "    float h1 = shift + lensH(au + 0.5 * k) + off * smoothstep(289.8, 344.9, au + 0.5 * k);",
        "    float fx = px * max(abs(h1 - h0), 0.02) * blur;",
        "    float S = S0 * (ch == 0 ? 1.0 + e : (ch == 1 ? 1.0 : 1.0 - e));",
        "    vec4 c = scene(vec2(sg * h, pu.y / S), fx, px / S * fyb);",
        "    c.rgb = min(c.rgb * gain, vec3(c.a));",
        "    vec4 o = c + (1.0 - c.a) * bg;",
        "    acc[ch] = o[ch];",
        "    alpha = max(alpha, o.a);",
        "  }",
        "  return vec4(acc, alpha);",
        "}",
        "void main(){",
        "  vec2 pu = (gl_FragCoord.xy - 0.5 * uRes) / uUnit;",
        "  outColor = render(pu, 0.5 * uRes.y / uUnit);",
        "}"
    ].join("\n");

    function createGL(canvas) {
        var gl = canvas.getContext("webgl2", { antialias: false, alpha: true, premultipliedAlpha: true });
        if (!gl) return null;
        function sh(type, src) {
            var s = gl.createShader(type);
            gl.shaderSource(s, src);
            gl.compileShader(s);
            if (!gl.getShaderParameter(s, gl.COMPILE_STATUS)) { console.warn(gl.getShaderInfoLog(s)); return null; }
            return s;
        }
        var vs = sh(gl.VERTEX_SHADER, VERT), fs = sh(gl.FRAGMENT_SHADER, FRAG);
        if (!vs || !fs) return null;
        var prog = gl.createProgram();
        gl.attachShader(prog, vs);
        gl.attachShader(prog, fs);
        gl.bindAttribLocation(prog, 0, "aPos");
        gl.linkProgram(prog);
        if (!gl.getProgramParameter(prog, gl.LINK_STATUS)) { console.warn(gl.getProgramInfoLog(prog)); return null; }
        gl.bindBuffer(gl.ARRAY_BUFFER, gl.createBuffer());
        gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1, -1, 3, -1, -1, 3]), gl.STATIC_DRAW);
        gl.enableVertexAttribArray(0);
        gl.vertexAttribPointer(0, 2, gl.FLOAT, false, 0, 0);
        var loc = {};
        ["uTex", "uRes", "uUnit", "uPose", "uGlowShape", "uGlowCol", "uWarp", "uLens"].forEach(function (n) {
            loc[n] = gl.getUniformLocation(prog, n);
        });
        return { gl: gl, prog: prog, tex: gl.createTexture(), loc: loc,
            aniso: gl.getExtension("EXT_texture_filter_anisotropic") };
    }

    /* Wrap `text` into at most `max` lines of `width` units; the last line gets an ellipsis if cut. */
    function wrapLines(ctx, text, width, max) {
        var words = (text || "").split(/\s+/), lines = [], line = "";
        for (var i = 0; i < words.length; i++) {
            var test = line ? line + " " + words[i] : words[i];
            if (ctx.measureText(test).width > width && line) {
                lines.push(line);
                line = words[i];
                if (lines.length === max) { line = ""; break; }
            } else line = test;
        }
        if (line) lines.push(line);
        if (lines.length === max && i < words.length) {
            var last = lines[max - 1];
            while (last && ctx.measureText(last + "…").width > width) last = last.replace(/\s*\S+$/, "");
            lines[max - 1] = last + "…";
        }
        return lines;
    }

    /* One card: product photo on top, then category, name, summary and "Know more". */
    function paintCard(cv, card, font) {
        var w = cv.width, h = cv.height, ctx = cv.getContext("2d"), k = w / CW;
        var PH = 150; // photo height in card units
        ctx.setTransform(1, 0, 0, 1, 0, 0);
        var bg = ctx.createLinearGradient(0, 0, 0, h);
        bg.addColorStop(0, "#14315a");
        bg.addColorStop(1, "#0a1a33");
        ctx.fillStyle = bg;
        ctx.fillRect(0, 0, w, h);
        var img = card.img, ph = PH * k;
        if (img && img.complete && img.naturalWidth) {
            var sc = Math.max(w / img.naturalWidth, ph / img.naturalHeight);
            var dw = img.naturalWidth * sc, dh = img.naturalHeight * sc;
            ctx.save();
            ctx.beginPath();
            ctx.rect(0, 0, w, ph);
            ctx.clip();
            ctx.drawImage(img, (w - dw) / 2, (ph - dh) / 2, dw, dh);
            ctx.restore();
        }
        var fade = ctx.createLinearGradient(0, ph * 0.6, 0, ph);
        fade.addColorStop(0, "rgba(20, 49, 90, 0)");
        fade.addColorStop(1, "rgba(20, 49, 90, 1)");
        ctx.fillStyle = fade;
        ctx.fillRect(0, ph * 0.6, w, ph * 0.4 + 1);

        ctx.setTransform(k, 0, 0, k, 0, 0);
        ctx.textBaseline = "alphabetic";
        var x = 16, tw = CW - 32;

        if (card.eyebrow) {
            ctx.fillStyle = "#4d8ff0";
            ctx.fillRect(x, 163, 2.5, 12);
            ctx.font = "700 9px " + font;
            ctx.fillStyle = "#a8c8f5";
            if ("letterSpacing" in ctx) ctx.letterSpacing = "1.2px";
            ctx.fillText(card.eyebrow.toUpperCase(), x + 8, 172.5);
            if ("letterSpacing" in ctx) ctx.letterSpacing = "0px";
        }

        var px = 26;
        ctx.font = "700 " + px + "px " + font;
        while (px > 15 && ctx.measureText(card.title).width > tw) {
            px -= 1;
            ctx.font = "700 " + px + "px " + font;
        }
        ctx.fillStyle = "#ffffff";
        ctx.fillText(card.title, x, 200);

        ctx.font = "400 11.4px " + font;
        ctx.fillStyle = "rgba(255, 255, 255, 0.78)";
        wrapLines(ctx, card.desc, tw, 4).forEach(function (ln, i) { ctx.fillText(ln, x, 221 + i * 15); });

        ctx.fillStyle = "#2b5699";
        ctx.fillRect(x, 279, 108, 26);
        ctx.font = "700 9.5px " + font;
        ctx.fillStyle = "#ffffff";
        if ("letterSpacing" in ctx) ctx.letterSpacing = "0.6px";
        ctx.fillText((card.more || "Know more").toUpperCase() + "  ›", x + 11, 296);
        if ("letterSpacing" in ctx) ctx.letterSpacing = "0px";
        ctx.setTransform(1, 0, 0, 1, 0, 0);
    }

    function mod(a, n) { return ((a % n) + n) % n; }

    /**
     * Mount the ring in `el`. cards: [{ img: HTMLImageElement, eyebrow, title, desc, more }].
     * opts.onPick(index, dir): the user dragged or clicked a side card.
     * opts.onOpen(): the user clicked the front card.
     * opts.onSettle(index): the ring has come to rest on `index`.
     * Returns { go(index, dir), anchor(q) } or null when WebGL2 is unavailable.
     */
    function init(el, cards, opts) {
        opts = opts || {};
        var N = cards.length;
        if (N < 3) return null;
        var canvas = document.createElement("canvas");
        canvas.setAttribute("aria-hidden", "true");
        el.appendChild(canvas);
        var st = createGL(canvas);
        if (!st) { el.removeChild(canvas); return null; }

        var font = opts.font || '"Titillium Web", Arial, sans-serif';
        var glowCol = opts.glow || [0.36, 0.62, 1.0];
        var reduced = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
        var W = 2, H = 2, unit = 1, texW = 0, raf = 0, visible = true;
        var L = { P: 0, target: 0, from: 0, to: 0, t0: 0, v: 0, mode: "rest",
            dragX: 0, dragP: 0, downX: 0, moved: false, lastT: 0 };

        function upload() {
            var gl = st.gl, w = texW, h = Math.round((texW * CH) / CW);
            var cv = document.createElement("canvas");
            cv.width = w;
            cv.height = h;
            gl.bindTexture(gl.TEXTURE_2D_ARRAY, st.tex);
            gl.texImage3D(gl.TEXTURE_2D_ARRAY, 0, gl.RGBA8, w, h, N, 0, gl.RGBA, gl.UNSIGNED_BYTE, null);
            for (var i = 0; i < N; i++) {
                paintCard(cv, cards[i], font);
                gl.texSubImage3D(gl.TEXTURE_2D_ARRAY, 0, 0, 0, i, w, h, 1, gl.RGBA, gl.UNSIGNED_BYTE, cv);
            }
            gl.generateMipmap(gl.TEXTURE_2D_ARRAY);
            gl.texParameteri(gl.TEXTURE_2D_ARRAY, gl.TEXTURE_MIN_FILTER, gl.LINEAR_MIPMAP_LINEAR);
            gl.texParameteri(gl.TEXTURE_2D_ARRAY, gl.TEXTURE_MAG_FILTER, gl.LINEAR);
            gl.texParameteri(gl.TEXTURE_2D_ARRAY, gl.TEXTURE_WRAP_S, gl.CLAMP_TO_EDGE);
            gl.texParameteri(gl.TEXTURE_2D_ARRAY, gl.TEXTURE_WRAP_T, gl.CLAMP_TO_EDGE);
            if (st.aniso) gl.texParameterf(gl.TEXTURE_2D_ARRAY, st.aniso.TEXTURE_MAX_ANISOTROPY_EXT, 8);
        }

        function resize(force) {
            var r = el.getBoundingClientRect();
            var dpr = Math.min(window.devicePixelRatio || 1, 2);
            W = Math.max(2, Math.round(r.width * dpr));
            H = Math.max(2, Math.round(r.height * dpr));
            if (canvas.width !== W) canvas.width = W;
            if (canvas.height !== H) canvas.height = H;
            unit = Math.min(W / 720, H / STAGE_H);
            layout(W / 2 / unit);
            var want = Math.min(1024, Math.max(256, Math.round(CW * unit * 1.25)));
            if (force || want !== texW) { texW = want; upload(); }
        }

        /* Lens start and side-card spread for a stage `halfW` units wide. The flare
           is a narrow band at the hero's left and right edges (16% of the half
           width), and the side cards stop just inside it, so the page edges warp
           while the cards and their text stay whole. The left card's text sits on
           its outer side, which is why none of a card may reach the flare. */
        var lens = 232, spread = 1;
        /* How far out the card at rest offset q reaches on screen, in stage units, when
           card centres are pushed out by `sp`. The two sides are not mirror images. */
        function outerEdge(q, sp) {
            var pose = poseAt(q), c = Math.cos(pose[2]), sn = Math.sin(pose[2]), m = 0;
            for (var e = -1; e <= 1; e += 2) {
                var X = pose[0] * sp + e * (CW / 2) * c, D = FOCAL + pose[1] + e * (CW / 2) * sn;
                if (D > 10) m = Math.max(m, Math.abs(X * FOCAL / D));
            }
            return m;
        }
        function layout(halfW) {
            var band = Math.max(40, 0.16 * halfW);
            lens = Math.max(236, halfW - band);
            // largest spread at which neither side card's outer edge reaches the flare
            var lo = 0.6, hi = 3;
            for (var it = 0; it < 30; it++) {
                var mid = (lo + hi) / 2;
                if (Math.max(outerEdge(1, mid), outerEdge(-1, mid)) < lens - 4) lo = mid; else hi = mid;
            }
            spread = lo;
        }

        var told = null;
        /* Tell the page once per stop, as soon as the ring is most of the way there. */
        function notify() {
            if (told === L.target) return;
            told = L.target;
            if (opts.onSettle) opts.onSettle(mod(L.target, N));
        }
        function settle() {
            L.mode = "rest";
            notify();
        }

        /* Where the card `q` places from the front sits at rest, in CSS px from the
           top-left of `el`: its centre x, and the y of its top and bottom edges. */
        function anchor(q) {
            var r = el.getBoundingClientRect(), u = Math.min(r.width / 720, r.height / STAGE_H);
            var pose = poseAt(q), D = FOCAL + pose[1];
            var half = (CH / 2) * (FOCAL / D) * u;
            return { x: r.width / 2 + pose[0] * spread * (FOCAL / D) * u, top: r.height / 2 - half, bottom: r.height / 2 + half };
        }

        var poseArr = new Float32Array(16), shapeArr = new Float32Array(12);
        function draw(now) {
            if (L.mode === "spin") {
                var f = (now - L.t0) * 30;
                L.P = L.from + (L.to - L.from) * spin(f);
                if (f >= 36) notify(); // past the fast part of the spin
                if (f >= STEP_FRAMES) settle();
            } else if (L.mode === "spring") {
                var dt = Math.min(0.034, Math.max(0, now - L.lastT));
                L.lastT = now;
                for (var s = 0; s < 4; s++) {
                    var acc = -60 * (L.P - L.to) - 13 * L.v;
                    L.v += (acc * dt) / 4;
                    L.P += (L.v * dt) / 4;
                }
                if (Math.abs(L.P - L.to) < 4e-4 && Math.abs(L.v) < 3e-3) { L.P = L.to; L.v = 0; settle(); }
            }
            var ids = [];
            for (var c = 0; c < N; c++) ids.push({ c: c, q: mod(c - L.P + N / 2, N) - N / 2 });
            ids.sort(function (a, b) { return Math.abs(a.q) - Math.abs(b.q); });
            for (var i = 0; i < 4; i++) {
                var it = ids[i], far = Math.abs(it.q) > 2.05;
                var pose = far ? [0, 0, 0] : poseAt(it.q);
                pose[0] *= spread;
                var gs = far ? [0, 1, 0] : glowShape(pose);
                poseArr.set([pose[0], pose[1], pose[2], far ? -1 : it.c], i * 4);
                shapeArr.set(gs, i * 3);
            }
            var gl = st.gl, loc = st.loc;
            gl.viewport(0, 0, W, H);
            gl.useProgram(st.prog);
            gl.activeTexture(gl.TEXTURE0);
            gl.bindTexture(gl.TEXTURE_2D_ARRAY, st.tex);
            gl.uniform1i(loc.uTex, 0);
            gl.uniform2f(loc.uRes, W, H);
            gl.uniform1f(loc.uUnit, unit);
            gl.uniform4fv(loc.uPose, poseArr);
            gl.uniform3fv(loc.uGlowShape, shapeArr);
            gl.uniform3f(loc.uGlowCol, glowCol[0], glowCol[1], glowCol[2]);
            gl.uniform1f(loc.uWarp, 1);
            gl.uniform1f(loc.uLens, lens);
            gl.drawArrays(gl.TRIANGLES, 0, 3);
        }

        function loop() {
            raf = 0;
            if (!visible) return;
            draw(performance.now() / 1000);
            if (L.mode !== "rest") raf = requestAnimationFrame(loop);
        }
        function kick() { if (!raf && visible) raf = requestAnimationFrame(loop); }

        /* Turn to `index`. dir +1/-1 forces the way round; omitted takes the short way. */
        function go(index, dir) {
            var cur = mod(L.target, N), delta;
            if (dir > 0) delta = mod(index - cur, N);
            else if (dir < 0) delta = -mod(cur - index, N);
            else { delta = mod(index - cur, N); if (delta > N / 2) delta -= N; }
            if (!delta || L.mode === "drag") return;
            L.target += delta;
            told = null;
            if (reduced) { L.P = L.target; settle(); }
            else {
                L.from = L.P;
                L.to = L.target;
                L.t0 = performance.now() / 1000;
                L.v = 0;
                L.mode = "spin";
            }
            kick();
        }

        el.addEventListener("pointerdown", function (e) {
            if (e.button > 0) return;
            el.setPointerCapture && el.setPointerCapture(e.pointerId);
            L.mode = "drag";
            L.dragX = L.downX = e.clientX;
            L.dragP = L.P;
            L.v = 0;
            L.moved = false;
            L.lastT = performance.now() / 1000;
        });
        el.addEventListener("pointermove", function (e) {
            if (L.mode !== "drag") return;
            var r = el.getBoundingClientRect();
            var u = Math.min(r.width / 720, r.height / STAGE_H), now = performance.now() / 1000;
            var P = L.dragP - (e.clientX - L.dragX) / (u * 300);
            var dt = Math.max(1 / 240, now - L.lastT);
            L.v = 0.6 * L.v + 0.4 * ((P - L.P) / dt);
            L.P = P;
            L.lastT = now;
            if (Math.abs(e.clientX - L.downX) > 5) L.moved = true;
            draw(now);
        });
        function release(e) {
            if (L.mode !== "drag") return;
            var now = performance.now() / 1000;
            if (!L.moved) {
                L.mode = "rest";
                var r = el.getBoundingClientRect();
                var u = (e.clientX - r.left - r.width / 2) / Math.min(r.width / 720, r.height / STAGE_H);
                if (u > 168) opts.onPick && opts.onPick(mod(L.target + 1, N), 1);
                else if (u < -168) opts.onPick && opts.onPick(mod(L.target - 1, N), -1);
                else if (Math.abs(u) < 128 && e.type === "pointerup") opts.onOpen && opts.onOpen();
                return;
            }
            if (now - L.lastT > 0.08) L.v = 0;
            var target = Math.round(L.P + L.v * 0.16);
            var delta = target - L.target;
            if (target !== L.target) told = null;
            L.target = target;
            L.to = target;
            L.mode = "spring";
            L.lastT = now;
            kick();
            if (delta && opts.onPick) opts.onPick(mod(target, N), delta > 0 ? 1 : -1);
        }
        el.addEventListener("pointerup", release);
        el.addEventListener("pointercancel", release);

        resize(true);
        draw(performance.now() / 1000);

        if (window.ResizeObserver) {
            new ResizeObserver(function () { resize(false); draw(performance.now() / 1000); }).observe(el);
        }
        if (window.IntersectionObserver) {
            new IntersectionObserver(function (ents) {
                visible = ents.some(function (x) { return x.isIntersecting; });
                if (visible) kick();
            }).observe(el);
        }
        /* Repaint the cards once photos and the web font have arrived. */
        function repaint() { resize(true); draw(performance.now() / 1000); }
        cards.forEach(function (cd) {
            if (cd.img && !cd.img.complete) cd.img.addEventListener("load", repaint);
        });
        if (document.fonts && document.fonts.ready) document.fonts.ready.then(repaint);

        return { go: go, anchor: anchor };
    }

    window.RbWarp = { init: init };
})();
