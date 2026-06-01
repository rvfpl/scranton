
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Azeem Ullah — Full Stack Developer & AI Engineer</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=JetBrains+Mono:wght@300;400;500;600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<style>
  :root {
    --bg: #030712;
    --surface: #0f1629;
    --surface2: #151e35;
    --border: rgba(99,179,237,0.12);
    --cyan: #22d3ee;
    --cyan-dim: rgba(34,211,238,0.15);
    --violet: #818cf8;
    --violet-dim: rgba(129,140,248,0.15);
    --green: #34d399;
    --amber: #fbbf24;
    --text: #e2e8f0;
    --muted: #64748b;
    --card-bg: rgba(15,22,41,0.7);
  }
  *{margin:0;padding:0;box-sizing:border-box;}
  html{scroll-behavior:smooth;}
  body{background:var(--bg);color:var(--text);font-family:'Outfit',sans-serif;overflow-x:hidden;min-height:100vh;}

  /* Canvas */
  #bg-canvas{position:fixed;top:0;left:0;width:100%;height:100%;z-index:0;opacity:0.45;}

  /* Grain overlay */
  body::before{
    content:'';position:fixed;inset:0;z-index:1;pointer-events:none;
    background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
    opacity:0.4;
  }

  /* Nav */
  nav{
    position:fixed;top:0;left:0;right:0;z-index:100;
    display:flex;justify-content:space-between;align-items:center;
    padding:1.25rem 4rem;
    backdrop-filter:blur(20px) saturate(1.8);
    background:rgba(3,7,18,0.75);
    border-bottom:1px solid var(--border);
    transition:all 0.3s;
  }
  .nav-logo{
    font-family:'Syne',sans-serif;font-weight:800;font-size:1.2rem;
    background:linear-gradient(135deg,var(--cyan),var(--violet));
    -webkit-background-clip:text;-webkit-text-fill-color:transparent;
    letter-spacing:-0.02em;
  }
  .nav-links{display:flex;gap:2.5rem;align-items:center;}
  .nav-links a{
    font-family:'JetBrains Mono',monospace;font-size:0.75rem;
    color:var(--muted);text-decoration:none;letter-spacing:0.05em;
    transition:color 0.2s;position:relative;
  }
  .nav-links a::before{content:attr(data-num);margin-right:0.2rem;color:var(--cyan);opacity:0.6;}
  .nav-links a:hover{color:var(--cyan);}
  .nav-cta{
    padding:0.5rem 1.25rem;border-radius:6px;border:1px solid var(--cyan);
    color:var(--cyan);font-family:'JetBrains Mono',monospace;font-size:0.75rem;
    text-decoration:none;letter-spacing:0.05em;
    transition:all 0.3s;
  }
  .nav-cta:hover{background:var(--cyan);color:var(--bg);}

  /* Sections */
  section{position:relative;z-index:2;}

  /* Hero */
  #hero{
    min-height:100vh;display:flex;flex-direction:column;justify-content:center;
    padding:0 4rem;padding-top:5rem;
  }
  .hero-eyebrow{
    font-family:'JetBrains Mono',monospace;font-size:0.8rem;
    color:var(--cyan);letter-spacing:0.15em;
    display:flex;align-items:center;gap:0.75rem;margin-bottom:1.5rem;
    opacity:0;
  }
  .hero-eyebrow::before{content:'';width:2.5rem;height:1px;background:var(--cyan);}
  .hero-title{
    font-family:'Syne',sans-serif;font-size:clamp(3rem,7vw,6.5rem);
    font-weight:800;line-height:1.0;letter-spacing:-0.03em;
    margin-bottom:1.5rem;opacity:0;
  }
  .hero-title .line1{display:block;color:var(--text);}
  .hero-title .line2{
    display:block;
    background:linear-gradient(135deg,var(--cyan) 0%,var(--violet) 60%);
    -webkit-background-clip:text;-webkit-text-fill-color:transparent;
  }
  .hero-sub{
    font-size:1.15rem;color:var(--muted);max-width:560px;line-height:1.75;
    margin-bottom:2.5rem;opacity:0;
  }
  .hero-actions{display:flex;gap:1rem;align-items:center;opacity:0;}
  .btn-primary{
    padding:0.85rem 2rem;border-radius:8px;
    background:linear-gradient(135deg,var(--cyan),var(--violet));
    color:#030712;font-weight:600;font-size:0.9rem;
    text-decoration:none;transition:all 0.3s;
    box-shadow:0 0 30px rgba(34,211,238,0.2);
    display:inline-flex;align-items:center;gap:0.5rem;
  }
  .btn-primary:hover{box-shadow:0 0 50px rgba(34,211,238,0.45);transform:translateY(-2px);}
  .btn-outline{
    padding:0.85rem 2rem;border-radius:8px;
    border:1px solid rgba(99,179,237,0.3);
    color:var(--text);font-size:0.9rem;
    text-decoration:none;transition:all 0.3s;
    display:inline-flex;align-items:center;gap:0.5rem;
  }
  .btn-outline:hover{border-color:var(--cyan);color:var(--cyan);}

  .hero-stats{
    display:flex;gap:3rem;margin-top:4rem;padding-top:2rem;
    border-top:1px solid var(--border);opacity:0;
  }
  .stat-num{
    font-family:'Syne',sans-serif;font-size:2.5rem;font-weight:800;
    background:linear-gradient(135deg,var(--cyan),var(--violet));
    -webkit-background-clip:text;-webkit-text-fill-color:transparent;
  }
  .stat-label{font-size:0.8rem;color:var(--muted);margin-top:0.25rem;letter-spacing:0.05em;}

  /* Scroll indicator */
  .scroll-indicator{
    position:absolute;bottom:2.5rem;left:50%;transform:translateX(-50%);
    display:flex;flex-direction:column;align-items:center;gap:0.5rem;
    opacity:0;animation:fadeIn 1s 2.5s forwards;
  }
  .scroll-indicator span{font-family:'JetBrains Mono',monospace;font-size:0.65rem;color:var(--muted);letter-spacing:0.15em;}
  .scroll-line{width:1px;height:50px;background:linear-gradient(to bottom,var(--cyan),transparent);animation:scrollPulse 2s infinite;}

  /* About */
  #about{padding:7rem 4rem;}
  .section-label{
    font-family:'JetBrains Mono',monospace;font-size:0.75rem;
    color:var(--cyan);letter-spacing:0.2em;margin-bottom:0.75rem;
    display:flex;align-items:center;gap:0.75rem;
  }
  .section-label::after{content:'';flex:1;height:1px;background:var(--border);max-width:60px;}
  .section-title{
    font-family:'Syne',sans-serif;font-size:clamp(2rem,4vw,3.5rem);
    font-weight:800;line-height:1.1;letter-spacing:-0.02em;margin-bottom:1.5rem;
  }
  .about-grid{display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center;}
  .about-text{font-size:1rem;color:var(--muted);line-height:1.9;}
  .about-text p{margin-bottom:1.25rem;}
  .about-text strong{color:var(--text);}

  .about-card-grid{display:grid;grid-template-columns:1fr 1fr;gap:1rem;}
  .about-card{
    background:var(--card-bg);border:1px solid var(--border);
    border-radius:12px;padding:1.5rem;
    backdrop-filter:blur(12px);
    transition:all 0.3s;position:relative;overflow:hidden;
  }
  .about-card::before{
    content:'';position:absolute;inset:0;
    background:linear-gradient(135deg,var(--cyan-dim),transparent);
    opacity:0;transition:opacity 0.3s;
  }
  .about-card:hover::before{opacity:1;}
  .about-card:hover{border-color:rgba(34,211,238,0.3);transform:translateY(-3px);}
  .card-icon{font-size:1.75rem;margin-bottom:0.75rem;}
  .card-title{font-family:'Syne',sans-serif;font-weight:700;font-size:1rem;margin-bottom:0.4rem;}
  .card-desc{font-size:0.8rem;color:var(--muted);line-height:1.6;}

  /* Skills */
  #skills{padding:7rem 4rem;background:linear-gradient(180deg,transparent,rgba(15,22,41,0.4),transparent);}
  .skills-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;margin-top:3rem;}
  .skill-category{
    background:var(--card-bg);border:1px solid var(--border);
    border-radius:16px;padding:2rem;backdrop-filter:blur(12px);
    transition:all 0.4s;
  }
  .skill-category:hover{border-color:rgba(34,211,238,0.25);box-shadow:0 20px 60px rgba(0,0,0,0.4);}
  .cat-header{display:flex;align-items:center;gap:0.75rem;margin-bottom:1.5rem;}
  .cat-icon{
    width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;
    font-size:1.1rem;
  }
  .cat-icon.cyan{background:var(--cyan-dim);}
  .cat-icon.violet{background:var(--violet-dim);}
  .cat-icon.green{background:rgba(52,211,153,0.15);}
  .cat-icon.amber{background:rgba(251,191,36,0.15);}
  .cat-name{font-family:'Syne',sans-serif;font-weight:700;font-size:0.95rem;}
  .skill-tags{display:flex;flex-wrap:wrap;gap:0.5rem;}
  .skill-tag{
    padding:0.3rem 0.75rem;border-radius:20px;font-size:0.72rem;
    font-family:'JetBrains Mono',monospace;letter-spacing:0.03em;
    border:1px solid var(--border);color:var(--muted);
    background:rgba(255,255,255,0.03);
    transition:all 0.2s;cursor:default;
  }
  .skill-tag:hover{border-color:var(--cyan);color:var(--cyan);background:var(--cyan-dim);}

  /* Experience */
  #experience{padding:7rem 4rem;}
  .exp-grid{display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;margin-top:3rem;}
  .exp-card{
    background:var(--card-bg);border:1px solid var(--border);
    border-radius:16px;padding:2rem;backdrop-filter:blur(12px);
    position:relative;overflow:hidden;transition:all 0.4s;
  }
  .exp-card::after{
    content:'';position:absolute;top:0;left:0;right:0;height:2px;
    background:linear-gradient(90deg,var(--cyan),var(--violet));
    transform:scaleX(0);transform-origin:left;transition:transform 0.4s;
  }
  .exp-card:hover::after{transform:scaleX(1);}
  .exp-card:hover{border-color:rgba(34,211,238,0.2);transform:translateY(-4px);box-shadow:0 25px 60px rgba(0,0,0,0.5);}
  .exp-badge{
    display:inline-flex;align-items:center;gap:0.4rem;
    padding:0.3rem 0.75rem;border-radius:20px;font-size:0.7rem;
    font-family:'JetBrains Mono',monospace;margin-bottom:1rem;
    border:1px solid rgba(34,211,238,0.2);color:var(--cyan);background:var(--cyan-dim);
  }
  .exp-title{font-family:'Syne',sans-serif;font-weight:700;font-size:1.2rem;margin-bottom:0.5rem;}
  .exp-desc{font-size:0.85rem;color:var(--muted);line-height:1.7;margin-bottom:1.25rem;}
  .exp-highlights{list-style:none;}
  .exp-highlights li{
    font-size:0.8rem;color:var(--muted);padding:0.35rem 0;
    display:flex;align-items:flex-start;gap:0.6rem;line-height:1.5;
    border-bottom:1px solid rgba(255,255,255,0.04);
  }
  .exp-highlights li:last-child{border:none;}
  .exp-highlights li::before{content:'▸';color:var(--cyan);flex-shrink:0;margin-top:0.05rem;}

  /* Contact */
  #contact{padding:7rem 4rem 5rem;}
  .contact-inner{
    max-width:700px;margin:0 auto;text-align:center;
  }
  .contact-title{font-family:'Syne',sans-serif;font-size:clamp(2.5rem,5vw,4.5rem);font-weight:800;line-height:1.1;margin-bottom:1.25rem;}
  .contact-title span{
    background:linear-gradient(135deg,var(--cyan),var(--violet));
    -webkit-background-clip:text;-webkit-text-fill-color:transparent;
  }
  .contact-sub{color:var(--muted);font-size:1rem;line-height:1.75;margin-bottom:3rem;}

  .contact-links{display:flex;justify-content:center;flex-wrap:wrap;gap:1rem;margin-bottom:3rem;}
  .contact-link{
    display:flex;align-items:center;gap:0.6rem;
    padding:0.8rem 1.5rem;border-radius:10px;
    border:1px solid var(--border);background:var(--card-bg);
    color:var(--text);text-decoration:none;font-size:0.85rem;
    backdrop-filter:blur(12px);transition:all 0.3s;
  }
  .contact-link:hover{border-color:var(--cyan);color:var(--cyan);transform:translateY(-2px);box-shadow:0 10px 30px rgba(34,211,238,0.1);}
  .contact-link .link-icon{font-size:1.1rem;}

  /* Footer */
  footer{
    border-top:1px solid var(--border);padding:2rem 4rem;
    display:flex;justify-content:space-between;align-items:center;
    position:relative;z-index:2;
  }
  footer p{font-size:0.8rem;color:var(--muted);}
  .footer-logo{font-family:'Syne',sans-serif;font-weight:800;font-size:1rem;
    background:linear-gradient(135deg,var(--cyan),var(--violet));
    -webkit-background-clip:text;-webkit-text-fill-color:transparent;}

  /* Floating badge */
  .avail-badge{
    display:inline-flex;align-items:center;gap:0.5rem;
    padding:0.4rem 1rem;border-radius:100px;font-size:0.75rem;
    border:1px solid rgba(52,211,153,0.3);color:var(--green);background:rgba(52,211,153,0.08);
    font-family:'JetBrains Mono',monospace;margin-bottom:2rem;
    animation:pulse 2s infinite;
  }
  .avail-dot{width:7px;height:7px;border-radius:50%;background:var(--green);animation:blink 1.5s infinite;}

  /* Cursor dot */
  .cursor{
    position:fixed;width:8px;height:8px;border-radius:50%;
    background:var(--cyan);pointer-events:none;z-index:9999;
    transform:translate(-50%,-50%);transition:transform 0.1s;
    mix-blend-mode:screen;
  }
  .cursor-ring{
    position:fixed;width:32px;height:32px;border-radius:50%;
    border:1px solid rgba(34,211,238,0.4);pointer-events:none;z-index:9998;
    transform:translate(-50%,-50%);transition:all 0.2s ease;
    mix-blend-mode:screen;
  }

  /* Animations */
  @keyframes fadeIn{from{opacity:0}to{opacity:1}}
  @keyframes scrollPulse{0%,100%{opacity:1}50%{opacity:0.3}}
  @keyframes blink{0%,100%{opacity:1}50%{opacity:0.3}}
  @keyframes pulse{0%,100%{box-shadow:0 0 0 0 rgba(52,211,153,0.2)}50%{box-shadow:0 0 0 8px rgba(52,211,153,0)}}
  @keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-12px)}}
  @keyframes gridScroll{from{transform:translateY(0)}to{transform:translateY(60px)}}

  .reveal{opacity:0;transform:translateY(30px);transition:all 0.7s cubic-bezier(0.16,1,0.3,1);}
  .reveal.visible{opacity:1;transform:translateY(0);}

  /* Typing cursor */
  .typed-cursor{
    display:inline-block;width:3px;height:0.85em;background:var(--cyan);
    margin-left:4px;animation:blink 1s infinite;vertical-align:middle;
  }

  /* Mobile hamburger */
  .menu-btn{display:none;flex-direction:column;gap:5px;cursor:pointer;padding:5px;}
  .menu-btn span{width:22px;height:2px;background:var(--text);border-radius:2px;transition:all 0.3s;}

  /* Responsive */
  @media(max-width:1024px){
    .skills-grid{grid-template-columns:repeat(2,1fr);}
    .exp-grid{grid-template-columns:1fr;}
  }
  @media(max-width:768px){
    nav{padding:1rem 1.5rem;}
    .nav-links{display:none;}
    .menu-btn{display:flex;}
    #hero,#about,#skills,#experience,#contact{padding-left:1.5rem;padding-right:1.5rem;}
    .about-grid{grid-template-columns:1fr;}
    .skills-grid{grid-template-columns:1fr;}
    .hero-stats{gap:1.5rem;flex-wrap:wrap;}
    footer{flex-direction:column;gap:1rem;text-align:center;padding:1.5rem;}
    .contact-links{flex-direction:column;}
    .contact-link{justify-content:center;}
  }

  /* Progress bar */
  .skill-bar-wrap{margin-bottom:1rem;}
  .skill-bar-label{display:flex;justify-content:space-between;margin-bottom:0.4rem;font-size:0.78rem;font-family:'JetBrains Mono',monospace;}
  .skill-bar-bg{height:4px;background:rgba(255,255,255,0.06);border-radius:4px;overflow:hidden;}
  .skill-bar-fill{height:100%;border-radius:4px;background:linear-gradient(90deg,var(--cyan),var(--violet));width:0;transition:width 1.5s cubic-bezier(0.16,1,0.3,1);}

  .glow-line{
    width:100%;height:1px;margin:2rem 0;
    background:linear-gradient(90deg,transparent,var(--cyan),transparent);
    opacity:0.3;
  }
</style>
</head>
<body>

<canvas id="bg-canvas"></canvas>
<div class="cursor" id="cursor"></div>
<div class="cursor-ring" id="cursorRing"></div>

<!-- NAV -->
<nav id="navbar">
  <div class="nav-logo">College<br>Station</div>
  <div class="nav-links">
    <a href="#about" data-num="01">About</a>
    <a href="#skills" data-num="02">Skills</a>
    <a href="#experience" data-num="03">Work</a>
    <a href="#contact" data-num="04">Contact</a>
  </div>
  <a href="mailto:mazeemrehan@gmail.com" class="nav-cta">Let's Talk →</a>
  <div class="menu-btn" id="menuBtn">
    <span></span><span></span><span></span>
  </div>
</nav>

<!-- HERO -->
<section id="hero">
  <div style="max-width:900px;">
    <div class="avail-badge">
      <div class="avail-dot"></div>
      Available for Projects
    </div>
    <div class="hero-eyebrow">Full Stack Developer & AI Automation Engineer</div>
    <h1 class="hero-title">
      <span class="line1">Building the</span>
      <span class="line2" id="typed-line">Future of Software.</span>
    </h1>
    <p class="hero-sub">
      10+ years crafting scalable web apps, AI automation systems, blockchain tools, and SaaS platforms. I turn complex ideas into elegant, production-ready solutions.
    </p>
    <div class="hero-actions">
      <a href="#experience" class="btn-primary">View My Work ↓</a>
      <a href="#contact" class="btn-outline">Get In Touch</a>
    </div>
    <div class="hero-stats">
      <div>
        <div class="stat-num">10+</div>
        <div class="stat-label">YEARS EXPERIENCE</div>
      </div>
      <div>
        <div class="stat-num">50+</div>
        <div class="stat-label">PROJECTS BUILT</div>
      </div>
      <div>
        <div class="stat-num">8+</div>
        <div class="stat-label">TECH DOMAINS</div>
      </div>
      <div>
        <div class="stat-num">∞</div>
        <div class="stat-label">PASSION FOR CODE</div>
      </div>
    </div>
  </div>
  <div class="scroll-indicator">
    <span>SCROLL</span>
    <div class="scroll-line"></div>
  </div>
</section>

<!-- ABOUT -->
<section id="about">
  <div class="about-grid">
    <div class="reveal">
      <div class="section-label">WHO I AM</div>
      <h2 class="section-title">Developer.<br>Thinker.<br>Builder.</h2>
      <div class="about-text">
        <p>Hi, I'm <strong>Azeem Ullah</strong> — a Software Developer with 10+ years of experience building everything from elegant web interfaces to complex AI automation pipelines.</p>
        <p>My work spans <strong>full-stack development</strong>, AI agents, blockchain systems, trading bots, and SaaS platforms. I thrive at the intersection of engineering and creativity, turning ambitious ideas into production-grade software.</p>
        <p>I believe great software is <strong>fast, beautiful, and purposeful</strong> — and I obsess over every detail to make that happen.</p>
      </div>
    </div>
    <div class="reveal" style="transition-delay:0.15s;">
      <div class="about-card-grid">
        <div class="about-card">
          <div class="card-icon">🌐</div>
          <div class="card-title">Full Stack Web</div>
          <div class="card-desc">MERN, Next.js, Laravel — scalable SaaS & enterprise platforms</div>
        </div>
        <div class="about-card">
          <div class="card-icon">🤖</div>
          <div class="card-title">AI Automation</div>
          <div class="card-desc">AI agents, n8n workflows, YouTube pipelines & LLM integrations</div>
        </div>
        <div class="about-card">
          <div class="card-icon">⛓️</div>
          <div class="card-title">Blockchain</div>
          <div class="card-desc">Solana bots, DeFi automation, trading systems & wallet trackers</div>
        </div>
        <div class="about-card">
          <div class="card-icon">📱</div>
          <div class="card-title">Mobile Apps</div>
          <div class="card-desc">Flutter & Dart cross-platform apps with Firebase & clean UX</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SKILLS -->
<section id="skills">
  <div class="section-label reveal">CAPABILITIES</div>
  <h2 class="section-title reveal">My Technical Stack</h2>
  <div class="skills-grid">

    <div class="skill-category reveal">
      <div class="cat-header">
        <div class="cat-icon cyan">⚡</div>
        <div class="cat-name">Frontend</div>
      </div>
      <div class="skill-tags">
        <span class="skill-tag">React.js</span>
        <span class="skill-tag">Next.js</span>
        <span class="skill-tag">Flutter</span>
        <span class="skill-tag">TypeScript</span>
        <span class="skill-tag">Tailwind CSS</span>
        <span class="skill-tag">HTML5 / CSS3</span>
        <span class="skill-tag">Dart</span>
      </div>
      <div class="glow-line"></div>
      <div class="skill-bar-wrap">
        <div class="skill-bar-label"><span>React / Next.js</span><span class="muted-text" style="color:var(--muted)">95%</span></div>
        <div class="skill-bar-bg"><div class="skill-bar-fill" data-w="95"></div></div>
      </div>
      <div class="skill-bar-wrap">
        <div class="skill-bar-label"><span>Flutter</span><span style="color:var(--muted)">88%</span></div>
        <div class="skill-bar-bg"><div class="skill-bar-fill" data-w="88"></div></div>
      </div>
    </div>

    <div class="skill-category reveal" style="transition-delay:0.1s;">
      <div class="cat-header">
        <div class="cat-icon violet">🔧</div>
        <div class="cat-name">Backend</div>
      </div>
      <div class="skill-tags">
        <span class="skill-tag">Node.js</span>
        <span class="skill-tag">Express.js</span>
        <span class="skill-tag">Laravel</span>
        <span class="skill-tag">Python</span>
        <span class="skill-tag">REST APIs</span>
        <span class="skill-tag">Prisma ORM</span>
        <span class="skill-tag">PostgreSQL</span>
        <span class="skill-tag">MongoDB</span>
      </div>
      <div class="glow-line"></div>
      <div class="skill-bar-wrap">
        <div class="skill-bar-label"><span>Node.js / Express</span><span style="color:var(--muted)">93%</span></div>
        <div class="skill-bar-bg"><div class="skill-bar-fill" data-w="93"></div></div>
      </div>
      <div class="skill-bar-wrap">
        <div class="skill-bar-label"><span>Laravel / PHP</span><span style="color:var(--muted)">90%</span></div>
        <div class="skill-bar-bg"><div class="skill-bar-fill" data-w="90"></div></div>
      </div>
    </div>

    <div class="skill-category reveal" style="transition-delay:0.2s;">
      <div class="cat-header">
        <div class="cat-icon green">🤖</div>
        <div class="cat-name">AI & Automation</div>
      </div>
      <div class="skill-tags">
        <span class="skill-tag">AI Agents</span>
        <span class="skill-tag">n8n</span>
        <span class="skill-tag">OpenAI APIs</span>
        <span class="skill-tag">LangChain</span>
        <span class="skill-tag">Prompt Engineering</span>
        <span class="skill-tag">Stable Diffusion</span>
        <span class="skill-tag">Voice Cloning</span>
        <span class="skill-tag">YouTube Automation</span>
      </div>
      <div class="glow-line"></div>
      <div class="skill-bar-wrap">
        <div class="skill-bar-label"><span>AI Automation</span><span style="color:var(--muted)">91%</span></div>
        <div class="skill-bar-bg"><div class="skill-bar-fill" data-w="91"></div></div>
      </div>
      <div class="skill-bar-wrap">
        <div class="skill-bar-label"><span>Prompt Engineering</span><span style="color:var(--muted)">89%</span></div>
        <div class="skill-bar-bg"><div class="skill-bar-fill" data-w="89"></div></div>
      </div>
    </div>

    <div class="skill-category reveal" style="transition-delay:0.1s;">
      <div class="cat-header">
        <div class="cat-icon amber">⛓️</div>
        <div class="cat-name">Blockchain</div>
      </div>
      <div class="skill-tags">
        <span class="skill-tag">Solana</span>
        <span class="skill-tag">Web3.js</span>
        <span class="skill-tag">Jupiter API</span>
        <span class="skill-tag">Raydium</span>
        <span class="skill-tag">DeFi</span>
        <span class="skill-tag">Trading Bots</span>
        <span class="skill-tag">Wallet Tracking</span>
      </div>
      <div class="glow-line"></div>
      <div class="skill-bar-wrap">
        <div class="skill-bar-label"><span>Solana Dev</span><span style="color:var(--muted)">85%</span></div>
        <div class="skill-bar-bg"><div class="skill-bar-fill" data-w="85"></div></div>
      </div>
      <div class="skill-bar-wrap">
        <div class="skill-bar-label"><span>Trading Systems</span><span style="color:var(--muted)">87%</span></div>
        <div class="skill-bar-bg"><div class="skill-bar-fill" data-w="87"></div></div>
      </div>
    </div>

    <div class="skill-category reveal" style="transition-delay:0.2s;">
      <div class="cat-header">
        <div class="cat-icon cyan">🕷️</div>
        <div class="cat-name">Automation & Scraping</div>
      </div>
      <div class="skill-tags">
        <span class="skill-tag">Puppeteer</span>
        <span class="skill-tag">Browser Automation</span>
        <span class="skill-tag">Proxy Management</span>
        <span class="skill-tag">Fingerprint Rotation</span>
        <span class="skill-tag">Web Scraping</span>
        <span class="skill-tag">Multi-threading</span>
      </div>
      <div class="glow-line"></div>
      <div class="skill-bar-wrap">
        <div class="skill-bar-label"><span>Browser Automation</span><span style="color:var(--muted)">90%</span></div>
        <div class="skill-bar-bg"><div class="skill-bar-fill" data-w="90"></div></div>
      </div>
    </div>

    <div class="skill-category reveal" style="transition-delay:0.3s;">
      <div class="cat-header">
        <div class="cat-icon violet">🛠️</div>
        <div class="cat-name">Tools & DevOps</div>
      </div>
      <div class="skill-tags">
        <span class="skill-tag">Git & GitHub</span>
        <span class="skill-tag">Docker</span>
        <span class="skill-tag">Vercel</span>
        <span class="skill-tag">Firebase</span>
        <span class="skill-tag">Linux Server</span>
        <span class="skill-tag">API Integrations</span>
        <span class="skill-tag">PostgreSQL</span>
      </div>
      <div class="glow-line"></div>
      <div class="skill-bar-wrap">
        <div class="skill-bar-label"><span>DevOps / Deployment</span><span style="color:var(--muted)">83%</span></div>
        <div class="skill-bar-bg"><div class="skill-bar-fill" data-w="83"></div></div>
      </div>
    </div>

  </div>
</section>

<!-- EXPERIENCE / WORK -->
<section id="experience">
  <div class="section-label reveal">WHAT I'VE BUILT</div>
  <h2 class="section-title reveal">Areas of Expertise</h2>
  <div class="exp-grid">

    <div class="exp-card reveal">
      <div class="exp-badge">🌐 Web Development</div>
      <div class="exp-title">Full Stack Web Applications</div>
      <div class="exp-desc">Scalable, responsive web applications using modern JavaScript frameworks and robust backend architectures for SaaS platforms, dashboards, and enterprise tools.</div>
      <ul class="exp-highlights">
        <li>Built SaaS platforms with Next.js, React.js, Prisma & Node.js</li>
        <li>Developed POS systems with inventory, HR & reporting modules</li>
        <li>Created dynamic blogging systems optimized for SEO & AdSense</li>
        <li>Implemented secure REST APIs & scalable backend services</li>
        <li>Built Crystal Reports–style reporting systems using Next.js</li>
      </ul>
    </div>

    <div class="exp-card reveal" style="transition-delay:0.1s;">
      <div class="exp-badge">📱 Mobile</div>
      <div class="exp-title">Cross-Platform Mobile Apps</div>
      <div class="exp-desc">Modern Android and cross-platform mobile applications with Flutter, focusing on performance, clean UI/UX, and production-ready scalable architecture.</div>
      <ul class="exp-highlights">
        <li>Finance calculator apps published on app stores</li>
        <li>Flutter apps with complex animations & state management</li>
        <li>Firebase authentication, notifications & cloud storage</li>
        <li>Thermal printer integrations for mobile POS</li>
        <li>Modern UX principles with accessibility focus</li>
      </ul>
    </div>

    <div class="exp-card reveal" style="transition-delay:0.1s;">
      <div class="exp-badge">🤖 AI & Automation</div>
      <div class="exp-title">AI Systems & Automation Pipelines</div>
      <div class="exp-desc">End-to-end AI-powered workflows including content generation, trading signals, proposal automation, and intelligent agent systems built with modern LLM APIs.</div>
      <ul class="exp-highlights">
        <li>YouTube automation: scripts, voiceovers, images & publishing</li>
        <li>AI storytelling for long-form & short-form video content</li>
        <li>Forex trading signal agents using OHLC & news analysis</li>
        <li>Stable Diffusion & voice cloning production pipelines</li>
        <li>Conversational AI systems for behavioral understanding</li>
      </ul>
    </div>

    <div class="exp-card reveal" style="transition-delay:0.2s;">
      <div class="exp-badge">⛓️ Blockchain</div>
      <div class="exp-title">Solana Trading & DeFi Systems</div>
      <div class="exp-desc">Automated Solana trading infrastructure including memecoin sniping bots, wallet copy-trading systems, and AI-assisted DeFi automation with real-time execution.</div>
      <ul class="exp-highlights">
        <li>Solana wallet tracking & trade-copying bots</li>
        <li>Memecoin sniping via Jupiter & Raydium integrations</li>
        <li>Scam filtering, stop-loss & auto-selling logic</li>
        <li>Optimized transaction speed for blockchain execution</li>
        <li>Telegram notifications & profit tracking systems</li>
      </ul>
    </div>

    <div class="exp-card reveal" style="transition-delay:0.1s;">
      <div class="exp-badge">🕷️ Browser Automation</div>
      <div class="exp-title">Stealth Automation & Scraping</div>
      <div class="exp-desc">Sophisticated browser automation systems that mimic human browsing behavior at scale, with advanced proxy rotation and fingerprint management.</div>
      <ul class="exp-highlights">
        <li>Stealth browser systems with fingerprint rotation</li>
        <li>AI-driven navigation behavior for scraping</li>
        <li>Mobile & desktop browser simulation</li>
        <li>Multi-threaded systems for large-scale operations</li>
        <li>Puppeteer & anti-detection technique implementations</li>
      </ul>
    </div>

    <div class="exp-card reveal" style="transition-delay:0.2s;" style="border-color:rgba(129,140,248,0.2);">
      <div class="exp-badge" style="border-color:rgba(129,140,248,0.2);color:var(--violet);background:var(--violet-dim);">💡 Core Strengths</div>
      <div class="exp-title">Professional Philosophy</div>
      <div class="exp-desc">What drives my engineering approach and how I approach every project from requirements to deployment.</div>
      <ul class="exp-highlights">
        <li>Strong problem-solving & systems thinking mindset</li>
        <li>Fast learner — self-driven across new domains</li>
        <li>Convert ideas into production-ready applications quickly</li>
        <li>Cross-domain expertise: AI, blockchain, SaaS, automation</li>
        <li>Scalable architecture, performance & clean code obsession</li>
      </ul>
    </div>

  </div>
</section>

<!-- CONTACT -->
<section id="contact">
  <div class="contact-inner">
    <div class="section-label reveal" style="justify-content:center;">GET IN TOUCH</div>
    <h2 class="contact-title reveal">Let's Build Something <span>Remarkable.</span></h2>
    <p class="contact-sub reveal">
      Have a project in mind? Whether it's a SaaS platform, AI automation system, blockchain tool, or mobile app — I'd love to hear about it and explore how we can work together.
    </p>
    <div class="contact-links reveal">
      <a href="mailto:mazeemrehan@gmail.com" class="contact-link">
        <span class="link-icon">✉️</span>
        <div>
          <div style="font-size:0.7rem;color:var(--muted);margin-bottom:2px;font-family:'JetBrains Mono',monospace;">EMAIL</div>
          <div>mazeemrehan@gmail.com</div>
        </div>
      </a>
      <a href="https://www.linkedin.com/in/mazeemrehan/" target="_blank" class="contact-link">
        <span class="link-icon">💼</span>
        <div>
          <div style="font-size:0.7rem;color:var(--muted);margin-bottom:2px;font-family:'JetBrains Mono',monospace;">LINKEDIN</div>
          <div>linkedin.com/in/mazeemrehan</div>
        </div>
      </a>
      <a href="https://github.com/mianazeemdaula" target="_blank" class="contact-link">
        <span class="link-icon">🐙</span>
        <div>
          <div style="font-size:0.7rem;color:var(--muted);margin-bottom:2px;font-family:'JetBrains Mono',monospace;">GITHUB</div>
          <div>github.com/mianazeemdaula</div>
        </div>
      </a>
    </div>
    <a href="mailto:azeem@example.com" class="btn-primary reveal" style="display:inline-flex;margin:0 auto;">
      Start a Conversation →
    </a>
  </div>
</section>

<footer>
  <div class="footer-logo">AZ.</div>
  <p>© 2025 Azeem Ullah. Built with passion & precision.</p>
  <p style="font-family:'JetBrains Mono',monospace;font-size:0.7rem;">
    <span style="color:var(--cyan)">Azeem Ullah</span> · Pakistan
  </p>
</footer>

<script>
// ─── Three.js Particle Background ───────────────────────────────────────────
const canvas = document.getElementById('bg-canvas');
const renderer = new THREE.WebGLRenderer({canvas, alpha:true, antialias:true});
renderer.setPixelRatio(Math.min(window.devicePixelRatio,2));
renderer.setSize(window.innerWidth,window.innerHeight);

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75,window.innerWidth/window.innerHeight,0.1,1000);
camera.position.z = 30;

// Particles
const geo = new THREE.BufferGeometry();
const count = 1800;
const pos = new Float32Array(count*3);
for(let i=0;i<count*3;i++) pos[i]=(Math.random()-0.5)*100;
geo.setAttribute('position',new THREE.BufferAttribute(pos,3));
const mat = new THREE.PointsMaterial({color:0x22d3ee,size:0.12,transparent:true,opacity:0.6});
const particles = new THREE.Points(geo,mat);
scene.add(particles);

// Grid lines
const gridMat = new THREE.LineBasicMaterial({color:0x818cf8,transparent:true,opacity:0.04});
for(let i=-10;i<=10;i++){
  const hGeo = new THREE.BufferGeometry().setFromPoints([
    new THREE.Vector3(-50,i*3,-20),new THREE.Vector3(50,i*3,-20)
  ]);
  scene.add(new THREE.Line(hGeo,gridMat));
  const vGeo = new THREE.BufferGeometry().setFromPoints([
    new THREE.Vector3(i*5,-30,-20),new THREE.Vector3(i*5,30,-20)
  ]);
  scene.add(new THREE.Line(vGeo,gridMat));
}

let mouseX=0,mouseY=0;
document.addEventListener('mousemove',e=>{
  mouseX=(e.clientX/window.innerWidth-0.5)*0.3;
  mouseY=(e.clientY/window.innerHeight-0.5)*0.3;
});

function animate(){
  requestAnimationFrame(animate);
  particles.rotation.y+=0.0008;
  particles.rotation.x+=0.0003;
  camera.position.x+=(mouseX-camera.position.x)*0.05;
  camera.position.y+=(-mouseY-camera.position.y)*0.05;
  renderer.render(scene,camera);
}
animate();

window.addEventListener('resize',()=>{
  camera.aspect=window.innerWidth/window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth,window.innerHeight);
});

// ─── Custom Cursor ───────────────────────────────────────────────────────────
const cursor = document.getElementById('cursor');
const ring = document.getElementById('cursorRing');
let rx=0,ry=0;
document.addEventListener('mousemove',e=>{
  cursor.style.left=e.clientX+'px';cursor.style.top=e.clientY+'px';
  rx+=(e.clientX-rx)*0.12;ry+=(e.clientY-ry)*0.12;
  ring.style.left=rx+'px';ring.style.top=ry+'px';
});
document.querySelectorAll('a,button,.skill-tag,.exp-card,.about-card').forEach(el=>{
  el.addEventListener('mouseenter',()=>ring.style.transform='translate(-50%,-50%) scale(2)');
  el.addEventListener('mouseleave',()=>ring.style.transform='translate(-50%,-50%) scale(1)');
});

// ─── Hero Animations ─────────────────────────────────────────────────────────
(function heroAnimate(){
  const eyebrow=document.querySelector('.hero-eyebrow');
  const title=document.querySelector('.hero-title');
  const sub=document.querySelector('.hero-sub');
  const actions=document.querySelector('.hero-actions');
  const stats=document.querySelector('.hero-stats');

  setTimeout(()=>{eyebrow.style.cssText='opacity:1;transition:opacity 0.8s ease';},200);
  setTimeout(()=>{title.style.cssText='opacity:1;transform:translateY(0);transition:all 0.9s cubic-bezier(0.16,1,0.3,1)';},400);
  setTimeout(()=>{sub.style.cssText='opacity:1;transform:translateY(0);transition:all 0.9s cubic-bezier(0.16,1,0.3,1)';},600);
  setTimeout(()=>{actions.style.cssText='opacity:1;transform:translateY(0);transition:all 0.9s cubic-bezier(0.16,1,0.3,1)';},800);
  setTimeout(()=>{stats.style.cssText='opacity:1;transform:translateY(0);transition:all 0.9s cubic-bezier(0.16,1,0.3,1)';},1000);
})();

// ─── Typing Effect ───────────────────────────────────────────────────────────
(function typeEffect(){
  const el=document.getElementById('typed-line');
  const phrases=['Future of Software.','Next Big Platform.','AI-Powered Systems.','Web3 Ecosystem.','Your Dream Product.'];
  let pi=0,ci=0,del=false;
  const cursor=document.createElement('span');cursor.className='typed-cursor';el.after(cursor);
  function tick(){
    const phrase=phrases[pi];
    if(!del){
      el.textContent=phrase.slice(0,++ci);
      if(ci===phrase.length){del=true;setTimeout(tick,2000);return;}
    } else {
      el.textContent=phrase.slice(0,--ci);
      if(ci===0){del=false;pi=(pi+1)%phrases.length;}
    }
    setTimeout(tick,del?40:70);
  }
  setTimeout(tick,2000);
})();

// ─── Scroll Reveal ───────────────────────────────────────────────────────────
const obs=new IntersectionObserver((entries)=>{
  entries.forEach(e=>{
    if(e.isIntersecting){
      e.target.classList.add('visible');
      // Animate skill bars
      e.target.querySelectorAll('.skill-bar-fill').forEach(bar=>{
        bar.style.width=bar.dataset.w+'%';
      });
    }
  });
},{threshold:0.12});
document.querySelectorAll('.reveal,.skill-category').forEach(el=>{
  el.classList.add('reveal');obs.observe(el);
});

// Also observe skill bars independently
document.querySelectorAll('.skill-category').forEach(el=>obs.observe(el));
document.querySelectorAll('.skill-bar-fill').forEach(bar=>{
  const observer=new IntersectionObserver(entries=>{
    entries.forEach(e=>{if(e.isIntersecting)bar.style.width=bar.dataset.w+'%';});
  },{threshold:0.5});
  observer.observe(bar);
});

// ─── Nav scroll effect ───────────────────────────────────────────────────────
window.addEventListener('scroll',()=>{
  const nav=document.getElementById('navbar');
  if(window.scrollY>60){nav.style.padding='0.9rem 4rem';}
  else{nav.style.padding='1.25rem 4rem';}
});

// ─── Smooth cursor ring follow ────────────────────────────────────────────────
(function followRing(){
  let tx=0,ty=0,cx=0,cy=0;
  document.addEventListener('mousemove',e=>{tx=e.clientX;ty=e.clientY;});
  function loop(){
    cx+=(tx-cx)*0.15;cy+=(ty-cy)*0.15;
    ring.style.left=cx+'px';ring.style.top=cy+'px';
    requestAnimationFrame(loop);
  }
  loop();
})();
</script>


<script>
  const menuBtn = document.getElementById('menuBtn');
  const navLinks = document.querySelector('.nav-links');

  menuBtn.addEventListener('click', () => {
    // Toggle display between 'flex' and 'none'
    if (navLinks.style.display === 'flex') {
      navLinks.style.display = 'none';
    } else {
      navLinks.style.display = 'flex';
      // Style tweaks for mobile dropdown view
      navLinks.style.flexDirection = 'column';
      navLinks.style.position = 'absolute';
      navLinks.style.top = '100%';
      navLinks.style.left = '0';
      navLinks.style.width = '100%';
      navLinks.style.background = 'rgba(3, 7, 18, 0.95)';
      navLinks.style.padding = '2rem';
      navLinks.style.borderBottom = '1px solid var(--border)';
    }
  });
</script>
</body>
</html>
