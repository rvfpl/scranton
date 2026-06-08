{{--
    ╔══════════════════════════════════════════════════════════════╗
    ║           JOB BLASTER — Laravel Blade Single Page            ║
    ║  Original work. No third-party IP / assets used.             ║
    ║  All sprites drawn programmatically via Canvas API.          ║
    ║  © 2026 — MIT License. Freely usable & modifiable.           ║
    ╚══════════════════════════════════════════════════════════════╝

    BLADE USAGE
    ───────────
    Route::get('/game', fn() => view('game'));

    DB INTEGRATION (when ready)
    ──────────────────────────
    Replace the JS `JOB_DATA` array below with:
        const JOB_DATA = @json($jobs);   ← pass from controller
    Controller: $jobs = Job::active()->get(['id','title','company','salary','location','type']);

    SCOREBOARD
    ──────────
    The "C25" insert-coin scoreboard stores scores in localStorage.
    For a real persistent leaderboard, wire the /api/scores endpoints
    to a `scores` table: id, name, score, jobs_collected, created_at.
--}}
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>JOB BLASTER — Insert C0.25</title>

<!-- Press Start 2P — authentic 8-bit pixel font (Google Fonts, OFL license) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

<style>
/* ═══════════════════════════════════════════════
   ROOT & RESET
═══════════════════════════════════════════════ */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --black:   #000000;
    --bg:      #050510;
    --green:   #00ff41;
    --cyan:    #00e5ff;
    --yellow:  #ffe600;
    --red:     #ff3131;
    --magenta: #ff00ff;
    --white:   #e8e8ff;
    --dim:     #1a1a3a;
    --glow-g:  0 0 8px #00ff41, 0 0 20px #00ff4180;
    --glow-c:  0 0 8px #00e5ff, 0 0 20px #00e5ff80;
    --glow-y:  0 0 8px #ffe600, 0 0 20px #ffe60080;
    --glow-r:  0 0 8px #ff3131, 0 0 20px #ff313180;
    --glow-m:  0 0 8px #ff00ff, 0 0 20px #ff00ff80;
    --pixel:   'Press Start 2P', monospace;
}

html, body {
    width: 100%; height: 100%;
    background: var(--black);
    font-family: var(--pixel);
    color: var(--green);
    overflow: hidden;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
}

/* ═══════════════════════════════════════════════
   CRT OVERLAY
═══════════════════════════════════════════════ */
body::before {
    content: '';
    position: fixed; inset: 0; z-index: 9999;
    pointer-events: none;
    background:
        repeating-linear-gradient(
            0deg,
            transparent,
            transparent 2px,
            rgba(0,0,0,0.18) 2px,
            rgba(0,0,0,0.18) 4px
        );
    animation: flicker 8s infinite;
}
body::after {
    content: '';
    position: fixed; inset: 0; z-index: 9998;
    pointer-events: none;
    background: radial-gradient(ellipse at center,
        transparent 60%,
        rgba(0,0,0,0.55) 100%
    );
}
@keyframes flicker {
    0%,96%,100% { opacity: 1; }
    97% { opacity: 0.92; }
    98% { opacity: 1; }
    99% { opacity: 0.88; }
}

/* ═══════════════════════════════════════════════
   WRAPPER + ARCADE CABINET FRAME
═══════════════════════════════════════════════ */
#cabinet {
    position: fixed; inset: 0;
    display: flex; align-items: center; justify-content: center;
    background:
        radial-gradient(ellipse 80% 80% at 50% 50%, #0a0a1e 0%, #000 100%);
}

#screen-wrap {
    position: relative;
    width: min(420px, 98vw);
    aspect-ratio: 9/16;
    border: 3px solid var(--cyan);
    box-shadow: var(--glow-c), inset 0 0 30px rgba(0,229,255,0.06);
    background: var(--bg);
    overflow: hidden;
}

/* ═══════════════════════════════════════════════
   CANVAS
═══════════════════════════════════════════════ */
#gameCanvas {
    display: block;
    width: 100%; height: 100%;
    image-rendering: pixelated;
}

/* ═══════════════════════════════════════════════
   UI OVERLAYS (HTML layers over canvas)
═══════════════════════════════════════════════ */
.overlay {
    position: absolute; inset: 0;
    display: none; flex-direction: column;
    align-items: center; justify-content: center;
    background: rgba(0,0,0,0.88);
    padding: 24px 20px;
    text-align: center;
    overflow-y: auto;
}
.overlay.active { display: flex; }

/* ── Titles ── */
.big-title {
    font-size: clamp(18px, 4vw, 28px);
    color: var(--yellow);
    text-shadow: var(--glow-y);
    line-height: 1.5;
    letter-spacing: 2px;
}
.sub-title {
    font-size: clamp(7px, 1.6vw, 11px);
    color: var(--cyan);
    text-shadow: var(--glow-c);
    margin-top: 8px;
    line-height: 1.8;
}
.blink {
    animation: blink 1s step-end infinite;
}
@keyframes blink { 50% { opacity: 0; } }

/* ── Divider ── */
.px-divider {
    width: 90%; height: 2px;
    background: repeating-linear-gradient(
        90deg, var(--green) 0px, var(--green) 6px,
        transparent 6px, transparent 12px
    );
    margin: 14px 0;
    box-shadow: var(--glow-g);
}

/* ── Buttons ── */
.btn {
    font-family: var(--pixel);
    font-size: clamp(7px, 1.5vw, 10px);
    padding: 10px 20px;
    border: 2px solid currentColor;
    background: transparent;
    cursor: pointer;
    letter-spacing: 1px;
    transition: background .15s, box-shadow .15s;
    margin: 6px 4px;
}
.btn-green  { color: var(--green);   }
.btn-cyan   { color: var(--cyan);    }
.btn-yellow { color: var(--yellow);  }
.btn-red    { color: var(--red);     }
.btn:hover, .btn:focus {
    background: rgba(255,255,255,0.08);
    box-shadow: 0 0 12px currentColor;
    outline: none;
}
.btn:active { transform: scale(0.96); }

/* ── Input ── */
.px-input {
    font-family: var(--pixel);
    font-size: clamp(8px, 1.6vw, 11px);
    background: #000;
    border: 2px solid var(--green);
    color: var(--green);
    padding: 8px 12px;
    width: 200px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 2px;
    box-shadow: var(--glow-g);
    outline: none;
    margin: 8px 0;
}
.px-input:focus { border-color: var(--cyan); box-shadow: var(--glow-c); }

/* ── Scoreboard table ── */
.score-table {
    width: 100%;
    border-collapse: collapse;
    font-size: clamp(6px, 1.3vw, 9px);
    margin-top: 8px;
}
.score-table th {
    color: var(--yellow);
    padding: 6px 4px;
    border-bottom: 1px solid var(--dim);
    text-align: left;
}
.score-table td {
    color: var(--white);
    padding: 5px 4px;
    border-bottom: 1px solid #111;
}
.score-table tr.highlight td { color: var(--green); text-shadow: var(--glow-g); }
.score-table tr:nth-child(1) td:first-child::before { content: '🥇 '; }
.score-table tr:nth-child(2) td:first-child::before { content: '🥈 '; }
.score-table tr:nth-child(3) td:first-child::before { content: '🥉 '; }

/* ── Collected jobs panel ── */
.job-card {
    width: 100%;
    border: 1px solid var(--dim);
    padding: 10px 12px;
    margin: 5px 0;
    text-align: left;
    background: rgba(0,229,255,0.04);
}
.job-card .jc-title  { font-size: clamp(7px,1.5vw,9px); color: var(--cyan); margin-bottom: 4px; }
.job-card .jc-co     { font-size: clamp(6px,1.3vw,8px); color: var(--yellow); }
.job-card .jc-meta   { font-size: clamp(5px,1.1vw,7px); color: #888; margin-top: 3px; }

/* ── HUD bar (in-game, HTML over canvas) ── */
#hud {
    position: absolute; top: 0; left: 0; right: 0;
    display: none;
    justify-content: space-between;
    align-items: center;
    padding: 6px 10px;
    font-size: clamp(6px, 1.2vw, 8px);
    color: var(--green);
    background: rgba(0,0,0,0.6);
    border-bottom: 1px solid #0f3;
    pointer-events: none;
    z-index: 10;
}
#hud.active { display: flex; }
.hud-lives { color: var(--red); text-shadow: var(--glow-r); }
.hud-score { color: var(--yellow); text-shadow: var(--glow-y); }
.hud-jobs  { color: var(--cyan);   text-shadow: var(--glow-c); }

/* ── Mobile controls ── */
#mobile-ctrl {
    position: absolute; bottom: 0; left: 0; right: 0;
    display: none;
    justify-content: space-between;
    align-items: center;
    padding: 8px 12px;
    background: rgba(0,0,0,0.5);
    border-top: 1px solid #0f3;
    z-index: 10;
    pointer-events: all;
}
#mobile-ctrl.active { display: flex; }
.ctrl-group { display: flex; gap: 6px; }
.ctrl-btn {
    font-family: var(--pixel);
    font-size: 10px;
    width: 48px; height: 40px;
    background: rgba(0,255,65,0.08);
    border: 2px solid var(--green);
    color: var(--green);
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    border-radius: 3px;
    -webkit-tap-highlight-color: transparent;
}
.ctrl-btn.fire-btn {
    border-color: var(--red);
    color: var(--red);
    background: rgba(255,49,49,0.08);
    width: 56px;
}
.ctrl-btn:active { opacity: 0.6; transform: scale(0.93); }

/* ── All-jobs modal ── */
#all-jobs-modal {
    position: absolute; inset: 0;
    display: none;
    flex-direction: column;
    background: rgba(0,0,0,0.95);
    z-index: 200;
    overflow-y: auto;
    padding: 20px 16px;
}
#all-jobs-modal.active { display: flex; }
#all-jobs-modal .job-card { cursor: pointer; }
#all-jobs-modal .job-card:hover { border-color: var(--cyan); }

/* ── Coin insert screen ── */
#coin-sparkle {
    font-size: clamp(30px, 7vw, 48px);
    animation: spin 0.6s linear infinite;
    display: inline-block;
}
@keyframes spin { to { transform: rotate(360deg); } }

/* ── Pixel stars background for title ── */
#star-canvas {
    position: absolute; inset: 0;
    pointer-events: none;
    z-index: 0;
}
.overlay > * { position: relative; z-index: 1; }
</style>
</head>
<body>

<div id="cabinet">
<div id="screen-wrap">

    <!-- STAR BACKGROUND (title only) -->
    <canvas id="star-canvas"></canvas>

    <!-- GAME CANVAS -->
    <canvas id="gameCanvas"></canvas>

    <!-- HUD (in-game) -->
    <div id="hud">
        <span class="hud-lives" id="hud-lives">♥♥♥</span>
        <span class="hud-score" id="hud-score">00000</span>
        <span class="hud-jobs"  id="hud-jobs">JOBS: 0</span>
    </div>

    <!-- MOBILE CONTROLS -->
    <div id="mobile-ctrl">
        <div class="ctrl-group">
            <button class="ctrl-btn" id="btn-left">◀</button>
            <button class="ctrl-btn" id="btn-right">▶</button>
        </div>
        <button class="ctrl-btn fire-btn" id="btn-fire">FIRE</button>
    </div>

    <!-- ══════════ OVERLAY: TITLE / ATTRACT ══════════ -->
    <div class="overlay active" id="screen-title">
        <div class="big-title">JOB<br>BLASTER</div>
        <div class="sub-title">◈ BLAST THROUGH THE JOB MARKET ◈</div>
        <div class="px-divider"></div>
        <div style="font-size:clamp(6px,1.3vw,8px); color:var(--white); line-height:2.2; margin:4px 0 12px;">
            ◀▶ MOVE &nbsp;|&nbsp; SPACE / ↑ SHOOT<br>
            ★ COLLECT JOB OFFERS<br>
            ✕ DODGE REJECTION LETTERS
        </div>
        <div class="px-divider"></div>
        <div style="font-size:clamp(5px,1.1vw,7px); color:#888; margin-bottom:12px; line-height:1.9;">
            HIGH SCORES · WAVE SYSTEM<br>
            ORIGINAL WORK — ALL ASSETS HAND-CODED
        </div>
        <button class="btn btn-yellow blink" onclick="Game.gotoInsertCoin()">▶ INSERT C0.25 ◀</button>
        <button class="btn btn-cyan" onclick="Scores.show()">🏆 HIGH SCORES</button>
        <div style="font-size:clamp(4px,1vw,6px); color:#555; margin-top:14px;">
            © 2026 JOB BLASTER — ORIGINAL WORK<br>
            NO THIRD-PARTY IP USED · MIT LICENSE
        </div>
    </div>

    <!-- ══════════ OVERLAY: INSERT COIN ══════════ -->
    <div class="overlay" id="screen-coin">
        <span id="coin-sparkle">🪙</span>
        <div class="big-title" style="margin-top:12px; font-size:clamp(14px,3vw,20px);">INSERT COIN</div>
        <div class="sub-title">C0.25 TO PLAY</div>
        <div class="px-divider"></div>
        <div style="font-size:clamp(7px,1.4vw,9px); color:var(--white); margin-bottom:12px;">ENTER YOUR NAME</div>
        <input class="px-input" id="player-name" type="text" maxlength="10"
               placeholder="PLAYER1" autocomplete="off"
               onkeydown="if(event.key==='Enter') Game.startGame()">
        <div style="font-size:clamp(5px,1vw,7px); color:#666; margin:6px 0 14px;">MAX 10 CHARS · UPPERCASE</div>
        <button class="btn btn-yellow" onclick="Game.startGame()">► PLAY ◄</button>
        <button class="btn btn-red"    onclick="Game.gotoTitle()">✕ BACK</button>
        <div style="font-size:clamp(4px,.9vw,6px); color:#444; margin-top:14px;">
            * SIMULATED PAYMENT · NO REAL CHARGE *<br>
            FOR DEMO PURPOSES ONLY
        </div>
    </div>

    <!-- ══════════ OVERLAY: HIGH SCORES ══════════ -->
    <div class="overlay" id="screen-scores">
        <div class="big-title" style="font-size:clamp(12px,2.5vw,18px);">HIGH SCORES</div>
        <div class="sub-title">TOP PLAYERS</div>
        <div class="px-divider"></div>
        <table class="score-table" id="score-table">
            <thead>
                <tr>
                    <th>#&nbsp;NAME</th>
                    <th>SCORE</th>
                    <th>JOBS</th>
                </tr>
            </thead>
            <tbody id="score-tbody"></tbody>
        </table>
        <div class="px-divider"></div>
        <button class="btn btn-cyan"   onclick="Game.gotoInsertCoin()">► PLAY</button>
        <button class="btn btn-green"  onclick="Game.gotoTitle()">← TITLE</button>
    </div>

    <!-- ══════════ OVERLAY: GAME OVER ══════════ -->
    <div class="overlay" id="screen-gameover">
        <div class="big-title" style="color:var(--red); text-shadow:var(--glow-r);">
            GAME<br>OVER
        </div>
        <div class="px-divider"></div>
        <div style="font-size:clamp(7px,1.4vw,9px); color:var(--yellow); line-height:2.2;" id="go-stats"></div>
        <div class="px-divider"></div>
        <div style="font-size:clamp(7px,1.3vw,9px); color:var(--cyan); margin-bottom:8px;">COLLECTED JOBS:</div>
        <div id="go-jobs" style="width:100%; max-height:200px; overflow-y:auto;"></div>
        <div class="px-divider"></div>
        <button class="btn btn-green"  onclick="Game.startGame()">► PLAY AGAIN</button>
        <button class="btn btn-cyan"   onclick="AllJobs.show()">📋 ALL JOBS</button>
        <button class="btn btn-yellow" onclick="Scores.show()">🏆 HIGH SCORES</button>
        <button class="btn btn-red"    onclick="Game.gotoTitle()">← TITLE</button>
    </div>

    <!-- ══════════ OVERLAY: WAVE CLEAR ══════════ -->
    <div class="overlay" id="screen-wave">
        <div class="big-title" style="color:var(--green); font-size:clamp(14px,3vw,22px);" id="wave-title">
            WAVE 1<br>CLEAR!
        </div>
        <div class="sub-title blink" id="wave-bonus"></div>
        <div class="px-divider"></div>
        <div style="font-size:clamp(6px,1.3vw,8px); color:var(--white);" id="wave-job-pick"></div>
    </div>

    <!-- ══════════ ALL JOBS MODAL ══════════ -->
    <div id="all-jobs-modal">
        <div style="font-family:var(--pixel); font-size:clamp(8px,1.6vw,11px); color:var(--cyan);
                    text-shadow:var(--glow-c); margin-bottom:12px; text-align:center;">
            📋 ALL JOB LISTINGS
        </div>
        <div id="all-jobs-list"></div>
        <div style="margin-top:14px; text-align:center;">
            <button class="btn btn-red" onclick="AllJobs.hide()">✕ CLOSE</button>
        </div>
    </div>

</div><!-- /screen-wrap -->
</div><!-- /cabinet -->

<script>
/* ═══════════════════════════════════════════════════════════════
   JOB BLASTER — Game Engine
   Original work, no third-party game engine or IP used.
   All sprite rendering via Canvas 2D API.
   ═══════════════════════════════════════════════════════════════ */

'use strict';

/* ──────────────────────────────────────────────────────
   0. DUMMY JOB DATA
   Replace with: const JOB_DATA = @json($jobs);
   Expected fields: id, title, company, salary, location, type
─────────────────────────────────────────────────────── */
const JOB_DATA = [
    { id:1,  title:'Frontend Developer',       company:'PixelForge Studio',     salary:'$75k–$95k',   location:'Remote',        type:'Full-time'  },
    { id:2,  title:'Backend Engineer',          company:'Nexus Systems',          salary:'$85k–$110k',  location:'Warsaw, PL',    type:'Full-time'  },
    { id:3,  title:'UX Designer',               company:'Vivid Labs',             salary:'$70k–$90k',   location:'Hybrid',        type:'Full-time'  },
    { id:4,  title:'DevOps Engineer',           company:'CloudStack Inc.',        salary:'$90k–$120k',  location:'Remote',        type:'Full-time'  },
    { id:5,  title:'Data Analyst',              company:'Insight Corp',           salary:'$60k–$80k',   location:'Berlin, DE',    type:'Full-time'  },
    { id:6,  title:'Product Manager',           company:'LaunchPad HQ',           salary:'$95k–$130k',  location:'Remote',        type:'Full-time'  },
    { id:7,  title:'iOS Developer',             company:'AppCraft Mobile',        salary:'$80k–$105k',  location:'Remote',        type:'Contract'   },
    { id:8,  title:'ML Engineer',               company:'SynapseAI',              salary:'$100k–$140k', location:'San Francisco',  type:'Full-time'  },
    { id:9,  title:'QA Automation Eng.',        company:'TestPilot GmbH',         salary:'$55k–$75k',   location:'Remote',        type:'Full-time'  },
    { id:10, title:'Tech Lead',                 company:'GridPoint Software',     salary:'$115k–$150k', location:'Warsaw, PL',    type:'Full-time'  },
    { id:11, title:'Graphic Designer',          company:'Chromatic Agency',       salary:'$50k–$68k',   location:'Hybrid',        type:'Part-time'  },
    { id:12, title:'Cybersecurity Analyst',     company:'IronShield Security',    salary:'$88k–$115k',  location:'Remote',        type:'Full-time'  },
    { id:13, title:'React Native Dev',          company:'MobileCraft Co.',        salary:'$78k–$100k',  location:'Remote',        type:'Contract'   },
    { id:14, title:'Cloud Architect',           company:'SkyNode Infra',          salary:'$120k–$160k', location:'Remote',        type:'Full-time'  },
    { id:15, title:'SEO Specialist',            company:'RankBoost Digital',      salary:'$45k–$60k',   location:'Kraków, PL',    type:'Full-time'  },
    { id:16, title:'Laravel Developer',         company:'WebCraft Solutions',     salary:'$65k–$90k',   location:'Remote',        type:'Full-time'  },
    { id:17, title:'Game Developer',            company:'8BitDreams Studio',      salary:'$70k–$95k',   location:'Remote',        type:'Full-time'  },
    { id:18, title:'Blockchain Developer',      company:'ChainLedger DAO',        salary:'$100k–$145k', location:'Remote',        type:'Contract'   },
    { id:19, title:'Technical Writer',          company:'DocuMind Inc.',          salary:'$55k–$72k',   location:'Remote',        type:'Full-time'  },
    { id:20, title:'Embedded Systems Eng.',     company:'CircuitBase GmbH',       salary:'$82k–$108k',  location:'Munich, DE',    type:'Full-time'  },
];

/* ──────────────────────────────────────────────────────
   1. CANVAS SETUP
─────────────────────────────────────────────────────── */
const canvas  = document.getElementById('gameCanvas');
const ctx     = canvas.getContext('2d');
const wrap    = document.getElementById('screen-wrap');

function resizeCanvas() {
    canvas.width  = wrap.clientWidth;
    canvas.height = wrap.clientHeight;
}
resizeCanvas();
window.addEventListener('resize', resizeCanvas);

/* ──────────────────────────────────────────────────────
   2. STAR BACKGROUND (title screen)
─────────────────────────────────────────────────────── */
const starCvs = document.getElementById('star-canvas');
const starCtx = starCvs.getContext('2d');
let stars = [];

function initStars() {
    starCvs.width  = wrap.clientWidth;
    starCvs.height = wrap.clientHeight;
    stars = Array.from({length:80}, () => ({
        x: Math.random() * starCvs.width,
        y: Math.random() * starCvs.height,
        r: Math.random() * 1.5 + 0.3,
        speed: Math.random() * 0.4 + 0.1,
        brightness: Math.random()
    }));
}
initStars();

function animateStars() {
    if (!document.getElementById('screen-title').classList.contains('active')) {
        starCtx.clearRect(0,0,starCvs.width,starCvs.height);
        requestAnimationFrame(animateStars);
        return;
    }
    starCtx.clearRect(0,0,starCvs.width,starCvs.height);
    stars.forEach(s => {
        s.y += s.speed;
        s.brightness += 0.02;
        if (s.y > starCvs.height) { s.y = 0; s.x = Math.random() * starCvs.width; }
        const alpha = 0.4 + 0.5 * Math.abs(Math.sin(s.brightness));
        starCtx.fillStyle = `rgba(200,220,255,${alpha})`;
        starCtx.beginPath();
        starCtx.arc(s.x, s.y, s.r, 0, Math.PI*2);
        starCtx.fill();
    });
    requestAnimationFrame(animateStars);
}
animateStars();

/* ──────────────────────────────────────────────────────
   3. COLOUR PALETTE HELPERS
─────────────────────────────────────────────────────── */
const C = {
    black:   '#000000',
    bg:      '#050510',
    green:   '#00ff41',
    cyan:    '#00e5ff',
    yellow:  '#ffe600',
    red:     '#ff3131',
    magenta: '#ff00ff',
    white:   '#e8e8ff',
    orange:  '#ff8c00',
    ltGreen: '#88ffaa',
    ltBlue:  '#aaddff',
};
function hex(col, alpha=1) {
    if (alpha === 1) return col;
    const r = parseInt(col.slice(1,3),16);
    const g = parseInt(col.slice(3,5),16);
    const b = parseInt(col.slice(5,7),16);
    return `rgba(${r},${g},${b},${alpha})`;
}

/* ──────────────────────────────────────────────────────
   4. PIXEL-ART SPRITE RENDERER
   All sprites are 16×16 or 24×24 pixel maps — no external assets.
─────────────────────────────────────────────────────── */
function drawSprite(cx, sprite, x, y, scale=1, palette={}) {
    const cols = sprite[0].length;
    const rows = sprite.length;
    sprite.forEach((row, ri) => {
        [...row].forEach((ch, ci) => {
            const col = palette[ch] || null;
            if (!col || ch === '.') return;
            cx.fillStyle = col;
            cx.fillRect(
                Math.round(x + ci*scale),
                Math.round(y + ri*scale),
                scale, scale
            );
        });
    });
}

// ── Player Ship (16×16) ──
const SHIP_SPRITE = [
    '........',
    '...SS...',
    '..SSSS..',
    '.SSSSSS.',
    'SSSSSSSS',
    '.SHHSHS.',  // cockpit
    '..SSSS..',
    '.EEESSE.',  // engine
    '.E.SS.E.',
    '........',
];
const SHIP_PAL = { S: C.cyan, H: C.white, E: C.yellow };

// ── Enemy (rejection letter, 12×12) ──
const ENEMY_SPRITE = [
    '............',
    '.RRRRRRRRRR.',
    '.RWWWWWWWWR.',
    '.RWRRWWRRWR.',
    '.RWRWWWWRWR.',
    '.RWWRRRRWWR.',
    '.RWWWWWWWWR.',
    '.RRRRRRRRRR.',
    '............',
];
const ENEMY_PAL = { R: C.red, W: C.white };

// ── Job Offer (star/envelope, 14×14) ──
const JOB_SPRITE = [
    '.....GG.....',
    '....GGGG....',
    '...GGGGGG...',
    'GGGGGGGGGGGG',
    'GGGGGGGGGGGG',
    '.GGGGGGGGGG.',
    '..GGGGGGGG..',
    '...GGGGGG...',
    '....GGGG....',
    '.....GG.....',
];
const JOB_PAL = { G: C.yellow };

// ── Bullet ──
const BULLET_SPRITE = [
    '.B.',
    'BBB',
    'BBB',
    '.B.',
];
const BULLET_PAL = { B: C.green };

// ── Enemy Bullet ──
const EBULLET_SPRITE = [
    '.E.',
    'EEE',
    '.E.',
];
const EBULLET_PAL = { E: C.red };

// ── Power-up: shield ──
const SHIELD_SPRITE = [
    '.PPPP.',
    'PPPPPP',
    'PPPPPP',
    '.PPPP.',
    '..PP..',
];
const SHIELD_PAL = { P: C.magenta };

/* ──────────────────────────────────────────────────────
   5. PARTICLE SYSTEM
─────────────────────────────────────────────────────── */
const particles = [];
function spawnExplosion(x, y, col, count=12) {
    for (let i=0; i<count; i++) {
        const angle = (Math.PI*2/count)*i + Math.random()*0.5;
        const speed = 1.5 + Math.random()*2.5;
        particles.push({
            x, y,
            vx: Math.cos(angle)*speed,
            vy: Math.sin(angle)*speed,
            life: 1,
            decay: 0.04 + Math.random()*0.04,
            r: 2 + Math.random()*3,
            col
        });
    }
}
function spawnCollect(x, y) {
    for (let i=0; i<20; i++) {
        const angle = Math.random()*Math.PI*2;
        particles.push({
            x, y,
            vx: Math.cos(angle)*(0.5+Math.random()*3),
            vy: Math.sin(angle)*(0.5+Math.random()*3),
            life: 1,
            decay: 0.025,
            r: 3,
            col: Math.random()>0.5 ? C.yellow : C.white,
        });
    }
}
function updateParticles() {
    for (let i = particles.length-1; i>=0; i--) {
        const p = particles[i];
        p.x += p.vx; p.y += p.vy;
        p.vy += 0.05;
        p.life -= p.decay;
        if (p.life <= 0) { particles.splice(i,1); continue; }
        ctx.globalAlpha = p.life;
        ctx.fillStyle = p.col;
        ctx.fillRect(p.x, p.y, p.r, p.r);
    }
    ctx.globalAlpha = 1;
}

/* ──────────────────────────────────────────────────────
   6. SCROLLING STAR BACKGROUND (in-game)
─────────────────────────────────────────────────────── */
const bgStars = Array.from({length:100}, () => ({
    x: Math.random()*420,
    y: Math.random()*750,
    r: Math.random()*1.5+0.3,
    speed: Math.random()*0.8+0.3,
    alpha: Math.random()*0.6+0.2,
}));
function drawBgStars() {
    bgStars.forEach(s => {
        s.y += s.speed * G.speed;
        if (s.y > canvas.height) { s.y = 0; s.x = Math.random()*canvas.width; }
        ctx.globalAlpha = s.alpha;
        ctx.fillStyle = '#aaddff';
        ctx.beginPath();
        ctx.arc(s.x * (canvas.width/420), s.y * (canvas.height/750), s.r, 0, Math.PI*2);
        ctx.fill();
    });
    ctx.globalAlpha = 1;
}

/* ──────────────────────────────────────────────────────
   7. GAME STATE
─────────────────────────────────────────────────────── */
const G = {
    running:       false,
    playerName:    'PLAYER1',
    score:         0,
    lives:         3,
    wave:          1,
    speed:         1,
    // Player
    px: 0, py: 0,
    pScale: 3,
    invincible:    0,
    shield:        false,
    shieldTimer:   0,
    // Enemies
    enemies:       [],
    enemyDir:       1,
    enemyTimer:    0,
    enemyShootTimer: 0,
    // Projectiles
    bullets:       [],
    eBullets:      [],
    // Collectibles
    jobs:          [],
    shields:       [],
    collectedJobs: [],
    // Input
    keys: { left:false, right:false, fire:false },
    fireThrottle:  0,
    // Misc
    frameCount:    0,
    gameover:      false,
    waveClearing:  false,
    waveClearTimer:0,
    flashMsg:      '',
    flashTimer:    0,
};

/* ──────────────────────────────────────────────────────
   8. ENEMY WAVE CONFIGURATION
─────────────────────────────────────────────────────── */
function buildWave(wave) {
    G.enemies = [];
    G.eBullets = [];
    const W = canvas.width;
    const cols = Math.min(5 + wave, 9);
    const rows = Math.min(2 + Math.floor(wave/2), 5);
    const scale = G.pScale;
    const sw = ENEMY_SPRITE[0].length * scale;
    const sh = ENEMY_SPRITE.length   * scale;
    const gapX = (W - cols*(sw+6)) / 2;
    for (let r=0; r<rows; r++) {
        for (let c=0; c<cols; c++) {
            G.enemies.push({
                x: gapX + c*(sw+6),
                y: 40 + r*(sh+8),
                w: sw, h: sh,
                alive: true,
                phase: Math.random()*Math.PI*2,
            });
        }
    }
    G.enemyDir   = 1;
    G.enemyTimer = 0;
    G.speed      = 1 + (wave-1)*0.15;
    G.jobs       = [];
    G.shields    = [];
}

/* ──────────────────────────────────────────────────────
   9. SPAWN HELPERS
─────────────────────────────────────────────────────── */
function spawnJob() {
    const jscale = 2;
    const jw = JOB_SPRITE[0].length * jscale;
    const jh = JOB_SPRITE.length    * jscale;
    const job = JOB_DATA[Math.floor(Math.random()*JOB_DATA.length)];
    G.jobs.push({
        x: Math.random()*(canvas.width - jw),
        y: -jh,
        w: jw, h: jh,
        speed: 0.8 + Math.random()*0.5,
        data: job,
        pulse: 0,
    });
}
function spawnShield() {
    const sscale = 3;
    const sw = SHIELD_SPRITE[0].length * sscale;
    const sh = SHIELD_SPRITE.length    * sscale;
    G.shields.push({
        x: Math.random()*(canvas.width - sw),
        y: -sh,
        w: sw, h: sh,
        speed: 0.6 + Math.random()*0.4,
    });
}

/* ──────────────────────────────────────────────────────
   10. COLLISION DETECTION (AABB)
─────────────────────────────────────────────────────── */
function aabb(ax, ay, aw, ah, bx, by, bw, bh) {
    return ax < bx+bw && ax+aw > bx && ay < by+bh && ay+ah > by;
}

/* ──────────────────────────────────────────────────────
   11. HUD UPDATE
─────────────────────────────────────────────────────── */
function updateHUD() {
    document.getElementById('hud-lives').textContent = '♥'.repeat(Math.max(0,G.lives));
    document.getElementById('hud-score').textContent = String(G.score).padStart(6,'0');
    document.getElementById('hud-jobs').textContent  = 'JOBS:' + G.collectedJobs.length;
}

/* ──────────────────────────────────────────────────────
   12. MAIN GAME LOOP
─────────────────────────────────────────────────────── */
let raf = null;
function gameLoop() {
    if (!G.running) return;
    raf = requestAnimationFrame(gameLoop);
    G.frameCount++;

    const W = canvas.width, H = canvas.height;
    const pScale = G.pScale;
    const pw = SHIP_SPRITE[0].length * pScale;
    const ph = SHIP_SPRITE.length    * pScale;

    // ── Clear ──
    ctx.fillStyle = C.bg;
    ctx.fillRect(0, 0, W, H);
    drawBgStars();

    if (G.waveClearing) {
        G.waveClearTimer--;
        if (G.waveClearTimer <= 0) {
            G.waveClearing = false;
            hideOverlay('screen-wave');
            G.wave++;
            buildWave(G.wave);
            document.getElementById('hud').classList.add('active');
            if (isMobile()) document.getElementById('mobile-ctrl').classList.add('active');
        }
        updateParticles();
        return;
    }

    // ═══ INPUT ═══
    const speed = 2.5 * G.speed * 0.7;
    if (G.keys.left)  G.px = Math.max(0, G.px - speed);
    if (G.keys.right) G.px = Math.min(W - pw, G.px + speed);
    if (G.keys.fire && G.fireThrottle <= 0) {
        G.bullets.push({
            x: G.px + pw/2 - 1,
            y: G.py,
            w: BULLET_SPRITE[0].length * 2,
            h: BULLET_SPRITE.length    * 2,
            speed: 7,
        });
        G.fireThrottle = 12;
    }
    if (G.fireThrottle > 0) G.fireThrottle--;

    // ═══ ENEMY MOVEMENT ═══
    G.enemyTimer++;
    const moveInterval = Math.max(6, 22 - G.wave*2);
    if (G.enemyTimer >= moveInterval) {
        G.enemyTimer = 0;
        const alive = G.enemies.filter(e=>e.alive);
        if (alive.length === 0) {
            // Wave cleared!
            G.waveClearing = true;
            G.waveClearTimer = 140;
            const bonus = G.wave * 500;
            G.score += bonus;
            showWaveClear(G.wave, bonus);
            return;
        }
        const leftmost  = Math.min(...alive.map(e=>e.x));
        const rightmost = Math.max(...alive.map(e=>e.x+e.w));
        const step = 8 + G.wave;
        let descend = false;
        if (G.enemyDir > 0 && rightmost + step > W-4) { G.enemyDir=-1; descend=true; }
        if (G.enemyDir < 0 && leftmost  - step < 4)   { G.enemyDir= 1; descend=true; }
        G.enemies.forEach(e => {
            if (!e.alive) return;
            e.x += G.enemyDir * step;
            if (descend) e.y += 14;
        });
    }

    // ═══ ENEMY SHOOTING ═══
    G.enemyShootTimer++;
    const shootInterval = Math.max(30, 90 - G.wave*8);
    if (G.enemyShootTimer >= shootInterval) {
        G.enemyShootTimer = 0;
        const alive = G.enemies.filter(e=>e.alive);
        if (alive.length) {
            const shooter = alive[Math.floor(Math.random()*alive.length)];
            G.eBullets.push({
                x: shooter.x + shooter.w/2,
                y: shooter.y + shooter.h,
                w: EBULLET_SPRITE[0].length * 2,
                h: EBULLET_SPRITE.length    * 2,
                speed: 3 + G.wave*0.3,
            });
        }
    }

    // ═══ SPAWN COLLECTIBLES ═══
    if (G.frameCount % (220 - G.wave*10 > 60 ? 220 - G.wave*10 : 60) === 0) spawnJob();
    if (G.frameCount % 480 === 0) spawnShield();

    // ═══ UPDATE BULLETS ═══
    for (let i=G.bullets.length-1; i>=0; i--) {
        const b = G.bullets[i];
        b.y -= b.speed;
        if (b.y < -10) { G.bullets.splice(i,1); continue; }

        // bullet vs enemy
        let hit = false;
        for (let j=G.enemies.length-1; j>=0; j--) {
            const e = G.enemies[j];
            if (!e.alive) continue;
            if (aabb(b.x,b.y,b.w,b.h, e.x,e.y,e.w,e.h)) {
                e.alive = false;
                spawnExplosion(e.x+e.w/2, e.y+e.h/2, C.red, 14);
                const pts = 100 * G.wave;
                G.score += pts;
                G.flashMsg = '+'+pts;
                G.flashTimer = 25;
                G.bullets.splice(i,1);
                hit = true;
                break;
            }
        }
        if (hit) continue;
    }

    // ═══ UPDATE ENEMY BULLETS ═══
    for (let i=G.eBullets.length-1; i>=0; i--) {
        const b = G.eBullets[i];
        b.y += b.speed;
        if (b.y > H+10) { G.eBullets.splice(i,1); continue; }

        // enemy bullet vs player
        if (!G.invincible && aabb(b.x,b.y,b.w,b.h, G.px,G.py,pw,ph)) {
            G.eBullets.splice(i,1);
            playerHit();
            if (G.gameover) return;
        }
    }

    // ═══ UPDATE JOB OFFERS ═══
    for (let i=G.jobs.length-1; i>=0; i--) {
        const j = G.jobs[i];
        j.y += j.speed;
        j.pulse += 0.1;
        if (j.y > H+20) { G.jobs.splice(i,1); continue; }
        // player collect
        if (aabb(j.x,j.y,j.w,j.h, G.px,G.py,pw,ph)) {
            G.collectedJobs.push(j.data);
            spawnCollect(j.x+j.w/2, j.y+j.h/2);
            G.score += 300 * G.wave;
            G.flashMsg = 'JOB OFFER!';
            G.flashTimer = 40;
            G.jobs.splice(i,1);
        }
    }

    // ═══ UPDATE SHIELDS ═══
    for (let i=G.shields.length-1; i>=0; i--) {
        const s = G.shields[i];
        s.y += s.speed;
        if (s.y > H+20) { G.shields.splice(i,1); continue; }
        if (aabb(s.x,s.y,s.w,s.h, G.px,G.py,pw,ph)) {
            G.shield = true;
            G.shieldTimer = 300;
            G.flashMsg = 'SHIELD!';
            G.flashTimer = 35;
            spawnExplosion(s.x+s.w/2, s.y+s.h/2, C.magenta, 10);
            G.shields.splice(i,1);
        }
    }

    // ═══ ENEMY REACHES PLAYER ROW ═══
    G.enemies.forEach(e => {
        if (!e.alive) return;
        if (e.y + e.h >= G.py && !G.invincible) {
            G.lives = 0;
            triggerGameOver();
        }
        // direct collision
        if (aabb(e.x,e.y,e.w,e.h, G.px,G.py,pw,ph) && !G.invincible) {
            playerHit();
        }
    });

    if (G.gameover) return;

    // ═══ SHIELD TIMER ═══
    if (G.shield) {
        G.shieldTimer--;
        if (G.shieldTimer <= 0) G.shield = false;
    }
    if (G.invincible > 0) G.invincible--;

    // ════════════════════════════════════
    //  DRAW EVERYTHING
    // ════════════════════════════════════

    // enemies
    G.enemies.forEach(e => {
        if (!e.alive) return;
        ctx.globalAlpha = 0.85 + 0.15*Math.sin(e.phase + G.frameCount*0.05);
        drawSprite(ctx, ENEMY_SPRITE, e.x, e.y, pScale, ENEMY_PAL);
        ctx.globalAlpha = 1;
    });

    // job offers
    G.jobs.forEach(j => {
        const pulse = 0.7 + 0.3*Math.abs(Math.sin(j.pulse));
        ctx.globalAlpha = pulse;
        drawSprite(ctx, JOB_SPRITE, j.x, j.y, 2, JOB_PAL);
        ctx.globalAlpha = 1;
        // label
        ctx.font = '5px "Press Start 2P"';
        ctx.fillStyle = C.yellow;
        ctx.textAlign = 'center';
        ctx.fillText('JOB', j.x+j.w/2, j.y+j.h+8);
    });

    // shields
    G.shields.forEach(s => {
        ctx.globalAlpha = 0.8;
        drawSprite(ctx, SHIELD_SPRITE, s.x, s.y, 3, SHIELD_PAL);
        ctx.globalAlpha = 1;
        ctx.font = '5px "Press Start 2P"';
        ctx.fillStyle = C.magenta;
        ctx.textAlign = 'center';
        ctx.fillText('SHLD', s.x+s.w/2, s.y+s.h+8);
    });

    // player bullets
    G.bullets.forEach(b => {
        drawSprite(ctx, BULLET_SPRITE, b.x, b.y, 2, BULLET_PAL);
        // glow
        ctx.shadowColor = C.green;
        ctx.shadowBlur  = 6;
        ctx.fillStyle   = C.green;
        ctx.fillRect(b.x+1, b.y, 4, 8);
        ctx.shadowBlur = 0;
    });

    // enemy bullets
    G.eBullets.forEach(b => {
        drawSprite(ctx, EBULLET_SPRITE, b.x, b.y, 2, EBULLET_PAL);
    });

    // player (blink when invincible)
    const showPlayer = !G.invincible || (G.frameCount % 6 < 3);
    if (showPlayer) {
        if (G.shield) {
            ctx.shadowColor = C.magenta;
            ctx.shadowBlur  = 18;
            ctx.beginPath();
            ctx.arc(G.px+pw/2, G.py+ph/2, pw*0.7, 0, Math.PI*2);
            ctx.strokeStyle = hex(C.magenta, 0.5);
            ctx.lineWidth = 3;
            ctx.stroke();
            ctx.shadowBlur = 0;
        }
        ctx.shadowColor = C.cyan;
        ctx.shadowBlur  = 10;
        drawSprite(ctx, SHIP_SPRITE, G.px, G.py, pScale, SHIP_PAL);
        ctx.shadowBlur = 0;

        // engine flame
        const fh = 4 + Math.random()*4;
        const grad = ctx.createLinearGradient(0, G.py+ph, 0, G.py+ph+fh);
        grad.addColorStop(0, C.yellow);
        grad.addColorStop(1, 'transparent');
        ctx.fillStyle = grad;
        ctx.fillRect(G.px + pw*0.3, G.py+ph, pw*0.4, fh);
    }

    // particles
    updateParticles();

    // flash message
    if (G.flashTimer > 0) {
        ctx.globalAlpha = G.flashTimer / 40;
        ctx.font = '9px "Press Start 2P"';
        ctx.fillStyle = C.yellow;
        ctx.textAlign = 'center';
        ctx.shadowColor = C.yellow;
        ctx.shadowBlur  = 12;
        ctx.fillText(G.flashMsg, W/2, H/2 - 40);
        ctx.shadowBlur = 0;
        ctx.globalAlpha = 1;
        G.flashTimer--;
    }

    // bottom danger line
    ctx.strokeStyle = hex(C.red, 0.15);
    ctx.lineWidth   = 1;
    ctx.setLineDash([4,4]);
    ctx.beginPath();
    ctx.moveTo(0, G.py - 2);
    ctx.lineTo(W, G.py - 2);
    ctx.stroke();
    ctx.setLineDash([]);

    updateHUD();
}

/* ──────────────────────────────────────────────────────
   13. PLAYER HIT
─────────────────────────────────────────────────────── */
function playerHit() {
    if (G.shield) {
        G.shield = false;
        G.shieldTimer = 0;
        G.invincible = 60;
        spawnExplosion(G.px + SHIP_SPRITE[0].length*G.pScale/2,
                       G.py + SHIP_SPRITE.length*G.pScale/2, C.magenta, 8);
        G.flashMsg = 'SHIELD BROKEN!';
        G.flashTimer = 35;
        return;
    }
    G.lives--;
    spawnExplosion(G.px + SHIP_SPRITE[0].length*G.pScale/2,
                   G.py + SHIP_SPRITE.length*G.pScale/2, C.cyan, 16);
    G.invincible = 90;
    if (G.lives <= 0) { triggerGameOver(); }
}

/* ──────────────────────────────────────────────────────
   14. GAME OVER
─────────────────────────────────────────────────────── */
function triggerGameOver() {
    G.running  = false;
    G.gameover = true;
    cancelAnimationFrame(raf);
    Scores.save(G.playerName, G.score, G.collectedJobs.length);
    document.getElementById('hud').classList.remove('active');
    document.getElementById('mobile-ctrl').classList.remove('active');

    document.getElementById('go-stats').innerHTML =
        `SCORE: <span style="color:var(--yellow)">${String(G.score).padStart(6,'0')}</span><br>` +
        `WAVE:  <span style="color:var(--cyan)">${G.wave}</span><br>` +
        `JOBS COLLECTED: <span style="color:var(--green)">${G.collectedJobs.length}</span>`;

    const goJobs = document.getElementById('go-jobs');
    goJobs.innerHTML = '';
    if (G.collectedJobs.length === 0) {
        goJobs.innerHTML = '<div style="font-size:7px;color:#666;padding:8px;">NONE — KEEP BLASTING!</div>';
    } else {
        G.collectedJobs.forEach(j => {
            goJobs.innerHTML += jobCardHTML(j);
        });
    }
    showOverlay('screen-gameover');
}

/* ──────────────────────────────────────────────────────
   15. WAVE CLEAR SCREEN
─────────────────────────────────────────────────────── */
function showWaveClear(wave, bonus) {
    document.getElementById('wave-title').textContent = `WAVE ${wave}\nCLEAR!`;
    document.getElementById('wave-bonus').textContent = `+${bonus} BONUS PTS`;
    document.getElementById('wave-job-pick').innerHTML =
        G.collectedJobs.length
        ? `★ JOBS BAGGED: ${G.collectedJobs.length}`
        : `COLLECT JOB OFFERS NEXT WAVE!`;
    showOverlay('screen-wave');
    document.getElementById('hud').classList.remove('active');
    document.getElementById('mobile-ctrl').classList.remove('active');
    setTimeout(() => {
        hideOverlay('screen-wave');
        document.getElementById('hud').classList.add('active');
        if (isMobile()) document.getElementById('mobile-ctrl').classList.add('active');
    }, 3000);
}

/* ──────────────────────────────────────────────────────
   16. JOB CARD HTML
─────────────────────────────────────────────────────── */
function jobCardHTML(j) {
    return `
    <div class="job-card">
        <div class="jc-title">${j.title}</div>
        <div class="jc-co">${j.company}</div>
        <div class="jc-meta">${j.salary} · ${j.location} · ${j.type}</div>
    </div>`;
}

/* ──────────────────────────────────────────────────────
   17. OVERLAY HELPERS
─────────────────────────────────────────────────────── */
function showOverlay(id) {
    document.querySelectorAll('.overlay').forEach(o => o.classList.remove('active'));
    document.getElementById(id).classList.add('active');
}
function hideOverlay(id) {
    document.getElementById(id).classList.remove('active');
}

/* ──────────────────────────────────────────────────────
   18. SCOREBOARD (localStorage)
   For server persistence: POST to /api/scores, GET /api/scores/top
─────────────────────────────────────────────────────── */
const Scores = {
    KEY: 'jobblaster_scores_v1',

    load() {
        try { return JSON.parse(localStorage.getItem(this.KEY)) || []; }
        catch { return []; }
    },
    save(name, score, jobs) {
        const list = this.load();
        list.push({ name: name.toUpperCase().slice(0,10), score, jobs, date: new Date().toISOString().slice(0,10) });
        list.sort((a,b) => b.score - a.score);
        list.splice(10); // top 10 only
        try { localStorage.setItem(this.KEY, JSON.stringify(list)); } catch {}
    },
    show() {
        const list = this.load();
        const tbody = document.getElementById('score-tbody');
        if (list.length === 0) {
            tbody.innerHTML = '<tr><td colspan="3" style="color:#555; padding:12px; text-align:center;">NO SCORES YET</td></tr>';
        } else {
            tbody.innerHTML = list.map((s, i) => {
                const hl = s.name === G.playerName ? ' class="highlight"' : '';
                return `<tr${hl}><td>${s.name}</td><td>${String(s.score).padStart(6,'0')}</td><td>${s.jobs}</td></tr>`;
            }).join('');
        }
        showOverlay('screen-scores');
    },
};

/* ──────────────────────────────────────────────────────
   19. ALL JOBS MODAL
─────────────────────────────────────────────────────── */
const AllJobs = {
    show() {
        const list = document.getElementById('all-jobs-list');
        list.innerHTML = JOB_DATA.map(j => `
            <div class="job-card" onclick="AllJobs.hide()">
                ${jobCardHTML(j)}
            </div>`
        ).join('');
        document.getElementById('all-jobs-modal').classList.add('active');
    },
    hide() {
        document.getElementById('all-jobs-modal').classList.remove('active');
    },
};

/* ──────────────────────────────────────────────────────
   20. GAME CONTROLLER
─────────────────────────────────────────────────────── */
const Game = {
    gotoTitle() {
        G.running  = false;
        G.gameover = false;
        cancelAnimationFrame(raf);
        document.getElementById('hud').classList.remove('active');
        document.getElementById('mobile-ctrl').classList.remove('active');
        AllJobs.hide();
        showOverlay('screen-title');
    },

    gotoInsertCoin() {
        showOverlay('screen-coin');
        setTimeout(() => document.getElementById('player-name').focus(), 100);
    },

    startGame() {
        const inp = document.getElementById('player-name').value.trim().toUpperCase();
        G.playerName = inp || 'PLAYER1';

        // Reset state
        G.score          = 0;
        G.lives          = 3;
        G.wave           = 1;
        G.speed          = 1;
        G.gameover       = false;
        G.waveClearing   = false;
        G.bullets        = [];
        G.eBullets       = [];
        G.jobs           = [];
        G.shields        = [];
        G.collectedJobs  = [];
        G.keys           = { left:false, right:false, fire:false };
        G.fireThrottle   = 0;
        G.invincible     = 0;
        G.shield         = false;
        G.frameCount     = 0;
        G.flashTimer     = 0;
        G.flashMsg       = '';
        particles.length = 0;

        resizeCanvas();
        const W = canvas.width, H = canvas.height;
        const pScale = G.pScale;
        const pw = SHIP_SPRITE[0].length * pScale;
        const ph = SHIP_SPRITE.length    * pScale;
        G.px = W/2 - pw/2;
        G.py = H - ph - 30;

        buildWave(1);
        G.running = true;

        document.querySelectorAll('.overlay').forEach(o => o.classList.remove('active'));
        document.getElementById('all-jobs-modal').classList.remove('active');
        document.getElementById('hud').classList.add('active');
        if (isMobile()) document.getElementById('mobile-ctrl').classList.add('active');

        updateHUD();
        cancelAnimationFrame(raf);
        gameLoop();
    },
};

/* ──────────────────────────────────────────────────────
   21. KEYBOARD INPUT
─────────────────────────────────────────────────────── */
document.addEventListener('keydown', e => {
    if (['ArrowLeft','ArrowRight','ArrowUp','Space',' '].includes(e.key) ||
        e.code === 'Space') e.preventDefault();

    if (e.key === 'ArrowLeft'  || e.key === 'a' || e.key === 'A') G.keys.left  = true;
    if (e.key === 'ArrowRight' || e.key === 'd' || e.key === 'D') G.keys.right = true;
    if (e.key === 'ArrowUp' || e.key === ' ' || e.code === 'Space') G.keys.fire  = true;
});
document.addEventListener('keyup', e => {
    if (e.key === 'ArrowLeft'  || e.key === 'a' || e.key === 'A') G.keys.left  = false;
    if (e.key === 'ArrowRight' || e.key === 'd' || e.key === 'D') G.keys.right = false;
    if (e.key === 'ArrowUp' || e.key === ' ' || e.code === 'Space') G.keys.fire  = false;
});

/* ──────────────────────────────────────────────────────
   22. MOBILE / TOUCH CONTROLS
─────────────────────────────────────────────────────── */
function isMobile() {
    return window.matchMedia('(pointer:coarse)').matches || 'ontouchstart' in window;
}
function holdBtn(id, keyName) {
    const el = document.getElementById(id);
    el.addEventListener('touchstart',  e => { e.preventDefault(); G.keys[keyName]=true;  }, {passive:false});
    el.addEventListener('touchend',    e => { e.preventDefault(); G.keys[keyName]=false; }, {passive:false});
    el.addEventListener('touchcancel', e => { e.preventDefault(); G.keys[keyName]=false; }, {passive:false});
    el.addEventListener('mousedown',   ()=> G.keys[keyName]=true  );
    el.addEventListener('mouseup',     ()=> G.keys[keyName]=false );
}
holdBtn('btn-left',  'left');
holdBtn('btn-right', 'right');
holdBtn('btn-fire',  'fire');

/* ──────────────────────────────────────────────────────
   23. ATTRACT MODE TEXT CYCLING (title screen)
─────────────────────────────────────────────────────── */
const attractMsgs = [
    'BLAST REJECTION LETTERS!',
    'COLLECT JOB OFFERS!',
    'SURVIVE THE JOB MARKET!',
    'HOW MANY JOBS CAN U BAG?',
];
let attractIdx = 0;
setInterval(() => {
    if (!document.getElementById('screen-title').classList.contains('active')) return;
    attractIdx = (attractIdx + 1) % attractMsgs.length;
    const el = document.querySelector('#screen-title .sub-title');
    if (el) el.textContent = '◈ ' + attractMsgs[attractIdx] + ' ◈';
}, 2500);

/* ──────────────────────────────────────────────────────
   24. INITIAL CANVAS DRAW (idle frame)
─────────────────────────────────────────────────────── */
(function idleFrame() {
    ctx.fillStyle = C.bg;
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    // draw a few decorative ships on title screen
    [[.5, .55], [.2,.7], [.8,.6]].forEach(([rx,ry]) => {
        ctx.globalAlpha = 0.15;
        drawSprite(ctx, SHIP_SPRITE,
            canvas.width*rx - SHIP_SPRITE[0].length*2,
            canvas.height*ry - SHIP_SPRITE.length*2,
            2, SHIP_PAL);
        ctx.globalAlpha = 1;
    });
})();

</script>
</body>
</html>