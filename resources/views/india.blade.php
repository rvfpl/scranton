<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Bengaluru.dev – 256 Dev Club</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    :root {
      --bg: #050816;
      --bg-alt: #0b1020;
      --accent: #4f46e5;
      --accent-soft: rgba(79, 70, 229, 0.12);
      --text: #f9fafb;
      --muted: #9ca3af;
      --border: #1f2933;
      --danger: #ef4444;
      --card: #111827;
      --radius: 12px;
      --radius-lg: 18px;
      --shadow-soft: 0 18px 40px rgba(0, 0, 0, 0.45);
      --shadow-subtle: 0 10px 25px rgba(15, 23, 42, 0.6);
      --nav-h: 56px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "SF Pro Text",
        "Segoe UI", sans-serif;
      background: radial-gradient(circle at top, #111827 0, #020617 55%);
      color: var(--text);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    img {
      max-width: 100%;
      display: block;
    }

    .page {
      max-width: 1120px;
      margin: 0 auto;
      padding: 0 16px 40px;
    }

    /* NAVBAR */

    .nav {
      position: sticky;
      top: 0;
      z-index: 40;
      backdrop-filter: blur(16px);
      background: linear-gradient(
        to bottom,
        rgba(2, 6, 23, 0.92),
        rgba(2, 6, 23, 0.75),
        transparent
      );
      border-bottom: 1px solid rgba(15, 23, 42, 0.9);
    }

    .nav-inner {
      max-width: 1120px;
      margin: 0 auto;
      padding: 10px 16px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: var(--nav-h);
    }

    .nav-left {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .nav-logo {
      width: 32px;
      height: 32px;
      border-radius: 999px;
      background: radial-gradient(circle at 30% 20%, #4f46e5, #0ea5e9);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      font-weight: 700;
      color: #e5e7eb;
      box-shadow: 0 0 0 1px rgba(148, 163, 184, 0.4),
        0 12px 30px rgba(15, 23, 42, 0.9);
    }

    .nav-title {
      display: flex;
      flex-direction: column;
      line-height: 1.1;
    }

    .nav-title-main {
      font-size: 15px;
      font-weight: 600;
      letter-spacing: 0.02em;
    }

    .nav-title-sub {
      font-size: 11px;
      color: var(--muted);
    }

    .nav-links {
      display: none;
      gap: 18px;
      font-size: 14px;
      align-items: center;
    }

    .nav-link {
      color: var(--muted);
      padding: 4px 0;
    }

    .nav-link.active {
      color: #e5e7eb;
      position: relative;
    }

    .nav-link.active::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -4px;
      width: 18px;
      height: 2px;
      border-radius: 999px;
      background: linear-gradient(to right, #4f46e5, #0ea5e9);
    }

    .nav-cta {
      display: none;
      font-size: 13px;
      padding: 7px 14px;
      border-radius: 999px;
      background: linear-gradient(to right, #4f46e5, #0ea5e9);
      color: white;
      font-weight: 500;
      box-shadow: 0 10px 25px rgba(37, 99, 235, 0.5);
      border: none;
      cursor: pointer;
    }

    .nav-cta span {
      opacity: 0.9;
    }

    .nav-cta small {
      opacity: 0.7;
      margin-left: 6px;
      font-size: 11px;
    }

    .nav-menu-btn {
      width: 32px;
      height: 32px;
      border-radius: 999px;
      border: 1px solid rgba(51, 65, 85, 0.9);
      background: radial-gradient(circle at top, #020617, #020617);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      color: #e5e7eb;
    }

    .nav-menu-btn span {
      display: block;
      width: 16px;
      height: 2px;
      border-radius: 999px;
      background: #e5e7eb;
      position: relative;
    }

    .nav-menu-btn span::before,
    .nav-menu-btn span::after {
      content: "";
      position: absolute;
      left: 0;
      width: 16px;
      height: 2px;
      border-radius: 999px;
      background: #e5e7eb;
    }

    .nav-menu-btn span::before {
      top: -5px;
    }

    .nav-menu-btn span::after {
      top: 5px;
    }

    .nav-menu {
      display: none;
      flex-direction: column;
      gap: 10px;
      padding: 8px 16px 12px;
      border-top: 1px solid rgba(15, 23, 42, 0.9);
      background: radial-gradient(circle at top, #020617, #020617);
    }

    .nav-menu a {
      font-size: 14px;
      color: var(--muted);
      padding: 4px 0;
    }

    .nav-menu a strong {
      color: #e5e7eb;
      font-weight: 500;
    }

    .nav-menu .nav-menu-cta {
      margin-top: 4px;
      font-size: 13px;
      padding: 7px 14px;
      border-radius: 999px;
      background: linear-gradient(to right, #4f46e5, #0ea5e9);
      color: white;
      font-weight: 500;
      text-align: center;
    }

    .nav-menu.open {
      display: flex;
    }

    /* HERO */

    .hero {
      padding-top: 28px;
      padding-bottom: 24px;
      display: grid;
      grid-template-columns: minmax(0, 1.4fr);
      gap: 24px;
    }

    .hero-main {
      background: radial-gradient(circle at top left, #111827, #020617);
      border-radius: var(--radius-lg);
      padding: 18px 18px 18px;
      border: 1px solid rgba(31, 41, 55, 0.9);
      box-shadow: var(--shadow-soft);
      position: relative;
      overflow: hidden;
    }

    .hero-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 4px 10px;
      border-radius: 999px;
      background: rgba(15, 23, 42, 0.9);
      border: 1px solid rgba(55, 65, 81, 0.9);
      font-size: 11px;
      color: var(--muted);
      margin-bottom: 10px;
    }

    .hero-pill-dot {
      width: 7px;
      height: 7px;
      border-radius: 999px;
      background: radial-gradient(circle at center, #22c55e, #15803d);
      box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.18);
    }

    .hero-title {
      font-size: 26px;
      line-height: 1.15;
      letter-spacing: 0.01em;
      margin-bottom: 8px;
    }

    .hero-title span {
      background: linear-gradient(to right, #e5e7eb, #a5b4fc);
      -webkit-background-clip: text;
      color: transparent;
    }

    .hero-subtitle {
      font-size: 14px;
      color: var(--muted);
      max-width: 480px;
      margin-bottom: 14px;
    }

    .hero-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 16px;
      font-size: 12px;
      color: var(--muted);
    }

    .hero-meta span {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 4px 9px;
      border-radius: 999px;
      background: rgba(15, 23, 42, 0.9);
      border: 1px solid rgba(31, 41, 55, 0.9);
    }

    .hero-meta strong {
      color: #e5e7eb;
      font-weight: 500;
    }

    .hero-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 14px;
    }

    .btn-primary {
      padding: 9px 16px;
      border-radius: 999px;
      border: none;
      background: linear-gradient(to right, #4f46e5, #0ea5e9);
      color: white;
      font-size: 13px;
      font-weight: 500;
      cursor: pointer;
      box-shadow: 0 12px 30px rgba(37, 99, 235, 0.6);
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn-primary span {
      font-size: 14px;
    }

    .btn-secondary {
      padding: 8px 14px;
      border-radius: 999px;
      border: 1px solid rgba(55, 65, 81, 0.9);
      background: rgba(15, 23, 42, 0.9);
      color: var(--muted);
      font-size: 13px;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn-secondary strong {
      color: #e5e7eb;
      font-weight: 500;
    }

    .hero-footnote {
      font-size: 11px;
      color: var(--muted);
    }

    .hero-footnote strong {
      color: #e5e7eb;
      font-weight: 500;
    }

    .hero-badge {
      position: absolute;
      right: 16px;
      bottom: 16px;
      width: 120px;
      height: 120px;
      border-radius: 32px;
      background: radial-gradient(circle at 20% 10%, #4f46e5, #0ea5e9);
      box-shadow: 0 18px 45px rgba(15, 23, 42, 0.9);
      padding: 10px;
      display: none;
    }

    .hero-badge-inner {
      width: 100%;
      height: 100%;
      border-radius: 24px;
      border: 1px solid rgba(15, 23, 42, 0.9);
      background: radial-gradient(circle at bottom, #020617, #020617);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 4px;
      text-align: center;
    }

    .hero-badge-city {
      font-size: 11px;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: #9ca3af;
    }

    .hero-badge-number {
      font-size: 26px;
      font-weight: 700;
      color: #e5e7eb;
    }

    .hero-badge-label {
      font-size: 11px;
      color: #9ca3af;
    }

    /* SECTION WRAPPERS */

    .section {
      margin-bottom: 26px;
    }

    .section-header {
      display: flex;
      justify-content: space-between;
      align-items: baseline;
      gap: 10px;
      margin-bottom: 10px;
    }

    .section-title {
      font-size: 15px;
      font-weight: 600;
      letter-spacing: 0.03em;
      text-transform: uppercase;
      color: #9ca3af;
    }

    .section-subtitle {
      font-size: 12px;
      color: var(--muted);
    }

    .section-link {
      font-size: 12px;
      color: #a5b4fc;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      white-space: nowrap;
    }

    .section-link span {
      font-size: 14px;
    }

    /* JOBS */

    .jobs {
      background: radial-gradient(circle at top left, #020617, #020617);
      border-radius: var(--radius-lg);
      border: 1px solid rgba(31, 41, 55, 0.9);
      box-shadow: var(--shadow-subtle);
      padding: 14px 14px 10px;
    }

    .job-list {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-bottom: 6px;
    }

    .job-card {
      border-radius: var(--radius);
      padding: 10px 10px;
      background: linear-gradient(
        to bottom right,
        rgba(15, 23, 42, 0.98),
        rgba(15, 23, 42, 0.96)
      );
      border: 1px solid rgba(31, 41, 55, 0.9);
      display: grid;
      grid-template-columns: minmax(0, 1fr);
      gap: 6px;
    }

    .job-header {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .job-logo {
      width: 32px;
      height: 32px;
      border-radius: 10px;
      background: radial-gradient(circle at 30% 20%, #4f46e5, #0ea5e9);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
      font-weight: 600;
      color: #e5e7eb;
    }

    .job-title-wrap {
      display: flex;
      flex-direction: column;
      gap: 2px;
    }

    .job-title {
      font-size: 14px;
      font-weight: 500;
    }

    .job-company {
      font-size: 12px;
      color: var(--muted);
    }

    .job-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
      font-size: 11px;
      color: var(--muted);
    }

    .job-meta span {
      padding: 3px 7px;
      border-radius: 999px;
      background: rgba(15, 23, 42, 0.9);
      border: 1px solid rgba(31, 41, 55, 0.9);
    }

    .job-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 8px;
      font-size: 11px;
      color: var(--muted);
    }

    .job-footer strong {
      color: #e5e7eb;
      font-weight: 500;
    }

    .job-cta {
      font-size: 11px;
      padding: 5px 9px;
      border-radius: 999px;
      border: 1px solid rgba(55, 65, 81, 0.9);
      background: rgba(15, 23, 42, 0.9);
      color: #e5e7eb;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      white-space: nowrap;
    }

    /* LEADERBOARD */

    .leaderboard {
      background: radial-gradient(circle at top left, #020617, #020617);
      border-radius: var(--radius-lg);
      border: 1px solid rgba(31, 41, 55, 0.9);
      box-shadow: var(--shadow-subtle);
      padding: 14px 14px 12px;
    }

    .leaderboard-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 10px;
      margin-bottom: 8px;
    }

    .member-card {
      border-radius: var(--radius);
      padding: 8px 8px;
      background: linear-gradient(
        to bottom right,
        rgba(15, 23, 42, 0.98),
        rgba(15, 23, 42, 0.96)
      );
      border: 1px solid rgba(31, 41, 55, 0.9);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .member-avatar {
      width: 28px;
      height: 28px;
      border-radius: 999px;
      background: radial-gradient(circle at 30% 20%, #4f46e5, #0ea5e9);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      font-weight: 600;
      color: #e5e7eb;
    }

    .member-info {
      display: flex;
      flex-direction: column;
      gap: 2px;
    }

    .member-name {
      font-size: 12px;
      font-weight: 500;
    }

    .member-role {
      font-size: 11px;
      color: var(--muted);
    }

    .member-tag {
      font-size: 10px;
      color: #a5b4fc;
    }

    .leaderboard-footer {
      font-size: 11px;
      color: var(--muted);
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 8px;
    }

    .leaderboard-footer strong {
      color: #e5e7eb;
      font-weight: 500;
    }

    /* FOOTER */

    .footer {
      border-top: 1px solid rgba(15, 23, 42, 0.9);
      padding: 14px 16px 18px;
      font-size: 11px;
      color: var(--muted);
      background: radial-gradient(circle at bottom, #020617, #020617);
      margin-top: auto;
    }

    .footer-inner {
      max-width: 1120px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .footer-top {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      flex-wrap: wrap;
    }

    .footer-links {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .footer-links a {
      color: #6b7280;
    }

    .footer-note {
      font-size: 10px;
      color: #4b5563;
    }

    /* RESPONSIVE */

    @media (min-width: 640px) {
      .hero {
        grid-template-columns: minmax(0, 1.6fr);
      }

      .hero-main {
        padding: 20px 20px 20px;
      }

      .hero-title {
        font-size: 30px;
      }

      .hero-badge {
        display: block;
      }

      .leaderboard-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
      }
    }

    @media (min-width: 768px) {
      .nav-links {
        display: flex;
      }

      .nav-cta {
        display: inline-flex;
      }

      .nav-menu-btn {
        display: none;
      }

      .nav-menu {
        display: none !important;
      }

      .hero {
        grid-template-columns: minmax(0, 1.7fr);
      }

      .jobs {
        padding: 16px 16px 12px;
      }

      .leaderboard {
        padding: 16px 16px 12px;
      }

      .leaderboard-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
      }
    }

    @media (min-width: 1024px) {
      .hero {
        grid-template-columns: minmax(0, 1.7fr);
      }

      .page {
        padding-bottom: 48px;
      }
    }
  </style>
</head>
<body>
  <!-- NAVBAR -->
  <header class="nav">
    <div class="nav-inner">
      <div class="nav-left">
        <div class="nav-logo">B</div>
        <div class="nav-title">
          <div class="nav-title-main">Bengaluru.dev</div>
          <div class="nav-title-sub">256 Dev Club · India.dev Network</div>
        </div>
      </div>
      <nav class="nav-links">
        <a href="index.html" class="nav-link active">City</a>
        <a href="india-jobs" class="nav-link">Jobs</a>
        <a href="india-leaderboard" class="nav-link">Leaderboard</a>
      </nav>
      <button class="nav-cta">
        <span>Join the 256</span>
        <small>₹2026 / year</small>
      </button>
      <button class="nav-menu-btn" id="navMenuBtn" aria-label="Toggle menu">
        <span></span>
      </button>
    </div>
    <nav class="nav-menu" id="navMenu">
      <a href="index.html"><strong>City</strong> · Overview</a>
      <a href="india-jobs">Jobs · All openings</a>
      <a href="leaderboard">Leaderboard · 256 members</a>
      <a href="#" class="nav-menu-cta">Join the 256 · ₹2026 / year</a>
    </nav>
  </header>

  <main class="page">
    <!-- HERO -->
    <section class="hero">
      <div class="hero-main">
        <div class="hero-pill">
          <span class="hero-pill-dot"></span>
          Bengaluru · Live · 256 slots only
        </div>
        <h1 class="hero-title">
          <span>India’s tech capital,</span> distilled into 256 developers.
        </h1>
        <p class="hero-subtitle">
          Bengaluru.dev is a tiny, curated club of 256 working engineers who
          represent the city’s real shipping culture — not just LinkedIn titles.
        </p>
        <div class="hero-meta">
          <span><strong>256</strong> total slots</span>
          <span><strong>19</strong> filled · 237 left</span>
          <span>Avg exp: <strong>6.3 years</strong></span>
          <span>Stack: <strong>Backend · Product · Infra</strong></span>
        </div>
        <div class="hero-actions">
          <button class="btn-primary">
            <span>⚡</span>
            <span>Apply to join Bengaluru.dev</span>
          </button>
          <button class="btn-secondary">
            <span>👀</span>
            <span><strong>Browse members</strong> · see who’s in</span>
          </button>
        </div>
        <p class="hero-footnote">
          <strong>No recruiters.</strong> No spam. Just a small, verified list
          of working engineers in Bengaluru.
        </p>

        <div class="hero-badge" aria-hidden="true">
          <div class="hero-badge-inner">
            <div class="hero-badge-city">Bengaluru.dev</div>
            <div class="hero-badge-number">256</div>
            <div class="hero-badge-label">Member slots only</div>
          </div>
        </div>
      </div>
    </section>

    <!-- JOBS SECTION -->
    <section class="section">
      <div class="section-header">
        <div>
          <div class="section-title">Open roles in Bengaluru</div>
          <div class="section-subtitle">
            5 hand‑picked roles this week. No spam, no mass scraping.
          </div>
        </div>
        <a href="india-jobs" class="section-link">
          See all jobs
          <span>→</span>
        </a>
      </div>

      <div class="jobs">
        <div class="job-list">
          <!-- Job 1 -->
          <article class="job-card">
            <div class="job-header">
              <div class="job-logo">SW</div>
              <div class="job-title-wrap">
                <div class="job-title">Senior Backend Engineer (Go / Kotlin)</div>
                <div class="job-company">Swiggy · Bengaluru · Hybrid</div>
              </div>
            </div>
            <div class="job-meta">
              <span>₹45–55L · ESOP</span>
              <span>7+ years</span>
              <span>Golang · Kotlin · Postgres · Kafka</span>
            </div>
            <div class="job-footer">
              <div>Posted <strong>2 days ago</strong> · closes in 11 days</div>
              <a href="#" class="job-cta">
                View role
                <span>↗</span>
              </a>
            </div>
          </article>

          <!-- Job 2 -->
          <article class="job-card">
            <div class="job-header">
              <div class="job-logo">FL</div>
              <div class="job-title-wrap">
                <div class="job-title">Staff Engineer – Payments Platform</div>
                <div class="job-company">Flipkart · Bengaluru · On‑site</div>
              </div>
            </div>
            <div class="job-meta">
              <span>₹70–85L</span>
              <span>10+ years</span>
              <span>Java · Distributed Systems · Payments</span>
            </div>
            <div class="job-footer">
              <div>Posted <strong>5 days ago</strong> · closes in 7 days</div>
              <a href="#" class="job-cta">
                View role
                <span>↗</span>
              </a>
            </div>
          </article>

          <!-- Job 3 -->
          <article class="job-card">
            <div class="job-header">
              <div class="job-logo">ST</div>
              <div class="job-title-wrap">
                <div class="job-title">Founding Engineer – B2B SaaS</div>
                <div class="job-company">Stealth startup · HSR Layout</div>
              </div>
            </div>
            <div class="job-meta">
              <span>₹30–40L + meaningful equity</span>
              <span>5+ years</span>
              <span>TypeScript · Node · React · Postgres</span>
            </div>
            <div class="job-footer">
              <div>Posted <strong>1 day ago</strong> · closes in 20 days</div>
              <a href="#" class="job-cta">
                View role
                <span>↗</span>
              </a>
            </div>
          </article>

          <!-- Job 4 -->
          <article class="job-card">
            <div class="job-header">
              <div class="job-logo">GO</div>
              <div class="job-title-wrap">
                <div class="job-title">Platform Engineer – Observability</div>
                <div class="job-company">Gojek · Remote from BLR</div>
              </div>
            </div>
            <div class="job-meta">
              <span>₹35–45L</span>
              <span>6+ years</span>
              <span>Golang · Kubernetes · Grafana · Prometheus</span>
            </div>
            <div class="job-footer">
              <div>Posted <strong>3 days ago</strong> · closes in 14 days</div>
              <a href="#" class="job-cta">
                View role
                <span>↗</span>
              </a>
            </div>
          </article>

          <!-- Job 5 -->
          <article class="job-card">
            <div class="job-header">
              <div class="job-logo">ZE</div>
              <div class="job-title-wrap">
                <div class="job-title">Senior Frontend Engineer (Product)</div>
                <div class="job-company">Zepto · Bengaluru · Hybrid</div>
              </div>
            </div>
            <div class="job-meta">
              <span>₹32–38L</span>
              <span>5+ years</span>
              <span>React · TypeScript · Design Systems</span>
            </div>
            <div class="job-footer">
              <div>Posted <strong>6 days ago</strong> · closes in 9 days</div>
              <a href="#" class="job-cta">
                View role
                <span>↗</span>
              </a>
            </div>
          </article>
        </div>

        <div class="leaderboard-footer">
          <div>Showing 5 of 23 active roles in Bengaluru.</div>
          <a href="jobs.html" class="section-link">
            See all jobs
            <span>→</span>
          </a>
        </div>
      </div>
    </section>

    <!-- LEADERBOARD SECTION -->
    <section class="section">
      <div class="section-header">
        <div>
          <div class="section-title">Bengaluru.dev · Members</div>
          <div class="section-subtitle">
            A tiny, verified list of working engineers. 19 of 256 slots filled.
          </div>
        </div>
        <a href="leaderboard" class="section-link">
          See all 256
          <span>→</span>
        </a>
      </div>

      <div class="leaderboard">
        <div class="leaderboard-grid">
          <!-- Member 1 -->
          <article class="member-card">
            <div class="member-avatar">AK</div>
            <div class="member-info">
              <div class="member-name">Ankit Kumar</div>
              <div class="member-role">Staff Engineer · Swiggy</div>
              <div class="member-tag">Member #01 · Backend</div>
            </div>
          </article>

          <!-- Member 2 -->
          <article class="member-card">
            <div class="member-avatar">SP</div>
            <div class="member-info">
              <div class="member-name">Sneha Patel</div>
              <div class="member-role">Senior Product Engineer · Razorpay</div>
              <div class="member-tag">Member #02 · Payments</div>
            </div>
          </article>

          <!-- Member 3 -->
          <article class="member-card">
            <div class="member-avatar">RV</div>
            <div class="member-info">
              <div class="member-name">Rahul Verma</div>
              <div class="member-role">Platform Engineer · Gojek</div>
              <div class="member-tag">Member #03 · Infra</div>
            </div>
          </article>

          <!-- Member 4 -->
          <article class="member-card">
            <div class="member-avatar">NP</div>
            <div class="member-info">
              <div class="member-name">Nisha Prasad</div>
              <div class="member-role">Founding Engineer · B2B SaaS</div>
              <div class="member-tag">Member #04 · Product</div>
            </div>
          </article>

          <!-- Member 5 -->
          <article class="member-card">
            <div class="member-avatar">MK</div>
            <div class="member-info">
              <div class="member-name">Mohit Khanna</div>
              <div class="member-role">Senior Backend · Zepto</div>
              <div class="member-tag">Member #05 · Backend</div>
            </div>
          </article>

          <!-- Member 6 -->
          <article class="member-card">
            <div class="member-avatar">AS</div>
            <div class="member-info">
              <div class="member-name">Aditi Singh</div>
              <div class="member-role">Frontend Engineer · Meesho</div>
              <div class="member-tag">Member #06 · Frontend</div>
            </div>
          </article>
        </div>

        <div class="leaderboard-footer">
          <div>
            <strong>19</strong> of <strong>256</strong> slots filled ·
            <span>apply before it caps.</span>
          </div>
          <a href="leaderboard" class="section-link">
            View full leaderboard
            <span>→</span>
          </a>
        </div>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-inner">
      <div class="footer-top">
        <div>India.dev Network · Bengaluru · Hyderabad · Pune · New Delhi</div>
        <div class="footer-links">
          <a href="#">About</a>
          <a href="#">Terms</a>
          <a href="#">Contact</a>
        </div>
      </div>
      <div class="footer-note">
        Built in public by “Bobby the Wannabe Desi Dev” · 2026 · Dummy copy /
        dummy data.
      </div>
    </div>
  </footer>

  <script>
    const navMenuBtn = document.getElementById("navMenuBtn");
    const navMenu = document.getElementById("navMenu");

    navMenuBtn.addEventListener("click", () => {
      navMenu.classList.toggle("open");
    });
  </script>
</body>
</html>
