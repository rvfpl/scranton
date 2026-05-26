<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Bengaluru.dev – 256 Dev Leaderboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="india-styles.css" />
</head>
<body>
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
        <a href="jobs.html" class="nav-link">Jobs</a>
        <a href="leaderboard.html" class="nav-link active">Leaderboard</a>
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
      <a href="jobs.html">Jobs · All openings</a>
      <a href="leaderboard.html"><strong>Leaderboard</strong> · 256 members</a>
      <a href="#" class="nav-menu-cta">Join the 256 · ₹2026 / year</a>
    </nav>
  </header>

  <main class="page">
    <section class="section">
      <div class="section-header">
        <div>
          <div class="section-title">Bengaluru.dev · 256 Dev Leaderboard</div>
          <div class="section-subtitle">
            Founding members listed in the order they joined. 19 of 256 slots filled.
          </div>
        </div>
      </div>

      <div class="leaderboard">
        <div class="leaderboard-grid">
          <!-- Fill first ~20 with dummy data, rest as empty slots -->
          <article class="member-card">
            <div class="member-avatar">AK</div>
            <div class="member-info">
              <div class="member-name">Ankit Kumar</div>
              <div class="member-role">Staff Engineer · Swiggy</div>
              <div class="member-tag">Member #01 of 256</div>
            </div>
          </article>

          <article class="member-card">
            <div class="member-avatar">SP</div>
            <div class="member-info">
              <div class="member-name">Sneha Patel</div>
              <div class="member-role">Senior Product Engineer · Razorpay</div>
              <div class="member-tag">Member #02 of 256</div>
            </div>
          </article>

          <article class="member-card">
            <div class="member-avatar">RV</div>
            <div class="member-info">
              <div class="member-name">Rahul Verma</div>
              <div class="member-role">Platform Engineer · Gojek</div>
              <div class="member-tag">Member #03 of 256</div>
            </div>
          </article>

          <!-- ... add more filled members up to #19 ... -->

          <!-- Empty slots -->
          <!-- You can visually show empties as greyed cards -->
          <!-- Example empty slot -->
          <article class="member-card" style="opacity:0.45;">
            <div class="member-avatar">+</div>
            <div class="member-info">
              <div class="member-name">Reserved slot</div>
              <div class="member-role">Future member of Bengaluru.dev</div>
              <div class="member-tag">Member #20 of 256</div>
            </div>
          </article>

          <!-- Repeat empty slots up to #256 as needed -->
        </div>

        <div class="leaderboard-footer">
          <div>
            <strong>19</strong> of <strong>256</strong> slots filled ·
            <span>apply to join before it caps.</span>
          </div>
          <a href="#" class="section-link">
            Apply now
            <span>→</span>
          </a>
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
        Dummy members. Replace with real data from your backend.
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
