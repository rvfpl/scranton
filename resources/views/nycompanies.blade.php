<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Founding Partners</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>

:root{
    --bg:#f8f8fb;
    --surface:#ffffff;
    --text:#171717;
    --text-secondary:#6b7280;

    --border:#e5e7eb;

    --accent:#7c3aed;
    --accent-soft:#f3e8ff;

    --shadow:
        0 10px 30px rgba(0,0,0,.05);

    --shadow-hover:
        0 15px 40px rgba(124,58,237,.10);
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Inter',sans-serif;
    color:var(--text);

    background:
        radial-gradient(
            circle at top right,
            rgba(124,58,237,.08),
            transparent 35%
        ),
        var(--bg);
}

a{
    text-decoration:none;
    color:inherit;
}

.container{
    width:min(1280px,92%);
    margin:auto;
}

/* ================================= */
/* NAVBAR */
/* ================================= */

.navbar{

    position:sticky;
    top:0;
    z-index:1000;

    background:
        rgba(255,255,255,.85);

    backdrop-filter:blur(16px);

    border-bottom:1px solid rgba(0,0,0,.05);
}

.nav-inner{

    height:72px;

    display:flex;
    align-items:center;
    justify-content:space-between;
}

.logo{
    font-size:1.2rem;
    font-weight:800;
}

.logo span{
    color:var(--accent);
}

.nav-links{

    display:flex;
    gap:28px;
}

.nav-links a{

    font-size:.95rem;
    color:var(--text-secondary);

    transition:.2s;
}

.nav-links a:hover{
    color:var(--accent);
}

.cta-btn{

    background:linear-gradient(
        135deg,
        #8b5cf6,
        #7c3aed
    );

    color:white;

    padding:12px 18px;

    border-radius:12px;

    font-weight:600;

    box-shadow:
        0 8px 20px rgba(124,58,237,.20);
}

/* ================================= */
/* MOBILE */
/* ================================= */

.hamburger{
    display:none;
    cursor:pointer;
    font-size:1.6rem;
}

.mobile-menu{

    display:none;

    flex-direction:column;

    padding:20px;

    gap:16px;

    border-top:1px solid var(--border);

    background:white;
}

.mobile-menu.active{
    display:flex;
}

/* ================================= */
/* HERO */
/* ================================= */

.hero{

    padding:80px 0 60px;
    text-align:center;
}

.hero h1{

    font-size:clamp(2rem,5vw,4rem);

    font-weight:800;

    margin-bottom:16px;
}

.hero h1 span{
    color:var(--accent);
}

.hero p{

    max-width:700px;

    margin:auto;

    color:var(--text-secondary);

    line-height:1.7;
}

/* ================================= */
/* STATS */
/* ================================= */

.stats{

    display:flex;
    justify-content:center;
    gap:40px;

    margin-top:40px;
}

.stat{
    text-align:center;
}

.stat-number{

    font-size:1.8rem;
    font-weight:800;

    color:var(--accent);
}

.stat-label{
    color:var(--text-secondary);
}

/* ================================= */
/* PARTNERS */
/* ================================= */

.section{

    padding:30px 0 80px;
}

.section-title{

    font-size:2rem;
    font-weight:700;

    margin-bottom:10px;
}

.section-subtitle{

    color:var(--text-secondary);

    margin-bottom:32px;
}

.partner-grid{

    display:grid;

    grid-template-columns:
        repeat(auto-fill,minmax(180px,1fr));

    gap:16px;
}

.partner-card{

    background:white;

    border:1px solid var(--border);

    border-radius:18px;

    padding:15px;

    display:flex;
    gap:12px;
    align-items:center;

    transition:.2s;

    box-shadow:
        0 1px 2px rgba(0,0,0,.03);
}

.partner-card:hover{

    transform:translateY(-3px);

    border-color:#d8b4fe;

    box-shadow:var(--shadow-hover);
}

.partner-logo{

    width:56px;
    height:56px;

    border-radius:14px;

    background:var(--accent-soft);

    display:flex;
    align-items:center;
    justify-content:center;

    font-weight:800;

    color:var(--accent);

    flex-shrink:0;
}

.partner-name{

    font-weight:600;
    margin-bottom:4px;
}

.partner-meta{

    font-size:.85rem;
    color:var(--text-secondary);
}

/* ================================= */
/* FOOTER */
/* ================================= */

footer{

    background:white;

    border-top:1px solid var(--border);

    margin-top:80px;
}

.footer-inner{

    padding:40px 0;

    display:flex;
    justify-content:space-between;
    align-items:center;
}

.footer-links{

    display:flex;
    gap:24px;
}

.footer-links a{
    color:var(--text-secondary);
}

.footer-links a:hover{
    color:var(--accent);
}

/* ================================= */
/* RESPONSIVE */
/* ================================= */

@media(max-width:900px){

    .nav-links,
    .cta-btn{
        display:none;
    }

    .hamburger{
        display:block;
    }

    .stats{
        flex-direction:column;
        gap:20px;
    }

    .footer-inner{

        flex-direction:column;
        gap:20px;
    }
}

</style>
</head>
<body>

<!-- NAVBAR -->

<nav class="navbar">

    <div class="container nav-inner">

        <div class="logo">
           NY<span>Jobs</span>
        </div>

        <div class="nav-links">
            <a href="#">Jobs</a>
            <a href="#">Companies</a>
            <a href="#">Founding Partners</a>
            <a href="#">Pricing</a>
        </div>

        <a href="#" class="cta-btn">
            Post Job
        </a>

        <div class="hamburger" onclick="toggleMenu()">
            ☰
        </div>

    </div>

    <div id="mobileMenu" class="mobile-menu">
        <a href="#">Jobs</a>
        <a href="#">Companies</a>
        <a href="#">Founding Partners</a>
        <a href="#">Pricing</a>
        <a href="#">Post Job</a>
    </div>

</nav>

<!-- HERO -->

<section class="hero">

    <div class="container">

        <h1>
            Meet Our
            <span>Founding Partners</span>
        </h1>

        <p>
            Sixty-four pioneering companies helping shape the future of AI,
            software engineering, research, infrastructure and developer tools.
        </p>

        <div class="stats">

            <div class="stat">
                <div class="stat-number">64</div>
                <div class="stat-label">Partners</div>
            </div>

            <div class="stat">
                <div class="stat-number">12k+</div>
                <div class="stat-label">Jobs Posted</div>
            </div>

            <div class="stat">
                <div class="stat-number">250k+</div>
                <div class="stat-label">Applicants</div>
            </div>

        </div>

    </div>

</section>

<!-- PARTNERS -->

<section class="section">

    <div class="container">

        <h2 class="section-title">
            Founding Partner Directory
        </h2>

        <p class="section-subtitle">
            Click any company to view its profile page.
        </p>

        <div class="partner-grid" id="partnerGrid">
        </div>

    </div>

</section>

<!-- FOOTER -->

<footer>

    <div class="container footer-inner">

        <div>
            © 2026 AIJobs. All rights reserved.
        </div>

        <div class="footer-links">
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
            <a href="#">Contact</a>
            <a href="#">Twitter</a>
        </div>

    </div>

</footer>

<script>

function toggleMenu() {

    document
        .getElementById('mobileMenu')
        .classList
        .toggle('active');
}

const grid =
    document.getElementById('partnerGrid');

for(let i=1;i<=64;i++){

    const companyNumber =
        String(i).padStart(2,'0');

    grid.innerHTML += `
        <a href="/companies/company-${i}"
           class="partner-card">

            <div class="partner-logo">
                ${companyNumber}
            </div>

            <div>

                <div class="partner-name">
                    Founding Partner ${companyNumber}
                </div>

                <div class="partner-meta">
                    View company profile →
                </div>

            </div>

        </a>
    `;
}

</script>

</body>
</html>