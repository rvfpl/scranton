<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Bengaluru.dev – All Jobs</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="india-styles.css" />
</head>
<body>
  <!-- reuse same nav styles: copy nav HTML + CSS from index OR extract to styles.css -->
  <!-- For brevity, assume you extracted the CSS from index.html into styles.css
       and reuse the same nav/footer structure. Only main content differs. -->

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
        <a href="index.html" class="nav-link">City</a>
        <a href="jobs.html" class="nav-link active">Jobs</a>
        <a href="leaderboard.html" class="nav-link">Leaderboard</a>
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
      <a href="index.html">City · Overview</a>
      <a href="jobs.html"><strong>Jobs</strong> · All openings</a>
      <a href="leaderboard.html">Leaderboard · 256 members</a>
      <a href="#" class="nav-menu-cta">Join the 256 · ₹2026 / year</a>
    </nav>
  </header>

  <main class="page">
    <section class="section">
      <div class="section-header">
        <div>
          <div class="section-title">All roles in Bengaluru</div>
          <div class="section-subtitle">
            Curated roles for working engineers. No mass scraping, no recruiter spam.
          </div>
        </div>
      </div>

      <div class="jobs">
        <div class="job-list">
          <!-- Reuse the 5 jobs from index + add a few more dummy ones -->
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

          <!-- Add more dummy jobs -->
          <article class="job-card">
            <div class="job-header">
              <div class="job-logo">RA</div>
              <div class="job-title-wrap">
                <div class="job-title">Senior Data Engineer</div>
                <div class="job-company">Razorpay · Bengaluru · Hybrid</div>
              </div>
            </div>
            <div class="job-meta">
              <span>₹38–48L</span>
              <span>6+ years</span>
              <span>Python · Spark · Airflow · Snowflake</span>
            </div>
            <div class="job-footer">
              <div>Posted <strong>4 days ago</strong> · closes in 15 days</div>
              <a href="#" class="job-cta">
                View role
                <span>↗</span>
              </a>
            </div>
          </article>

          <article class="job-card">
            <div class="job-header">
              <div class="job-logo">ME</div>
              <div class="job-title-wrap">
                <div class="job-title">Senior Frontend Engineer</div>
                <div class="job-company">Meesho · Bengaluru · Remote‑friendly</div>
              </div>
            </div>
            <div class="job-meta">
              <span>₹30–38L</span>
              <span>5+ years</span>
              <span>React · TypeScript · Performance</span>
            </div>
            <div class="job-footer">
              <div>Posted <strong>7 days ago</strong> · closes in 10 days</div>
              <a href="#" class="job-cta">
                View role
                <span>↗</span>
              </a>
            </div>
          </article>

          <article class="job-card">
            <div class="job-header">
              <div class="job-logo">PH</div>
              <div class="job-title-wrap">
                <div class="job-title">Principal Engineer – Infra</div>
                <div class="job-company">PhonePe · Bengaluru · On‑site</div>
              </div>
            </div>
            <div class="job-meta">
              <span>₹70–90L</span>
              <span>10+ years</span>
              <span>Distributed Systems · SRE · Scale</span>
            </div>
            <div class="job-footer">
              <div>Posted <strong>9 days ago</strong> · closes in 5 days</div>
              <a href="#" class="job-cta">
                View role
                <span>↗</span>
              </a>
            </div>
          </article>

          <!-- etc… add as many dummy jobs as you like -->
        </div>
      </div>
    </section>
  </main>

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
        Dummy jobs. For layout only. Replace with real data.
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
