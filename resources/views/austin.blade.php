<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="AustinTX .dev - Your premier Austin tech job board. Find software engineer, DevOps, data science jobs in Austin, TX.">
<title>AustinTX .dev | Austin Tech Jobs Board</title>
<style>
:root {
  --primary: #6366f1;
  --primary-dark: #4f46e5;
  --primary-light: #818cf8;
  --secondary: #10b981;
  --accent: #f59e0b;
  --bg: #ffffff;
  --bg-secondary: #f8fafc;
  --bg-tertiary: #f1f5f9;
  --text: #0f172a;
  --text-secondary: #475569;
  --text-tertiary: #94a3b8;
  --border: #e2e8f0;
  --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
  --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
  --shadow-lg: 0 20px 25px -5px rgb(0 0 0 / 0.1);
  --shadow-xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
  --radius: 12px;
  --radius-sm: 8px;
  --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  --header-height: 72px;
}

[data-theme="dark"] {
  --primary: #818cf8;
  --primary-dark: #6366f1;
  --primary-light: #a5b4fc;
  --secondary: #34d399;
  --accent: #fbbf24;
  --bg: #0f172a;
  --bg-secondary: #1e293b;
  --bg-tertiary: #334155;
  --text: #f8fafc;
  --text-secondary: #cbd5e1;
  --text-tertiary: #64748b;
  --border: #334155;
  --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.3);
  --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.4);
  --shadow-lg: 0 20px 25px -5px rgb(0 0 0 / 0.5);
  --shadow-xl: 0 25px 50px -12px rgb(0 0 0 / 0.6);
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  scroll-behavior: smooth;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Inter', sans-serif;
  background: var(--bg);
  color: var(--text);
  line-height: 1.6;
  transition: var(--transition);
  overflow-x: hidden;
}

.container {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 1.5rem;
}

/* Icons - Pure CSS */
.icon {
  display: inline-block;
  width: 1em;
  height: 1em;
  vertical-align: middle;
  stroke: currentColor;
  stroke-width: 2;
  stroke-linecap: round;
  stroke-linejoin: round;
  fill: none;
}

/* Header */
header {
  position: sticky;
  top: 0;
  z-index: 1000;
  border-bottom: 1px solid var(--border);
  backdrop-filter: blur(12px);
  background: rgba(255, 255, 255, 0.8);
  height: var(--header-height);
  transition: var(--transition);
}

[data-theme="dark"] header {
  background: rgba(15, 23, 42, 0.8);
}

.header-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: var(--header-height);
}

.logo {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  font-size: 1.5rem;
  font-weight: 800;
  color: var(--text);
  text-decoration: none;
}

.logo-icon {
  width: 40px;
  height: 40px;
  background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
  border-radius: var(--radius-sm);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-weight: 700;
}

.nav-links {
  display: flex;
  gap: 2rem;
  align-items: center;
}

.nav-links a {
  color: var(--text-secondary);
  text-decoration: none;
  font-weight: 500;
  transition: var(--transition);
  position: relative;
}

.nav-links a:hover {
  color: var(--primary);
}

.nav-links a::after {
  content: '';
  position: absolute;
  bottom: -4px;
  left: 0;
  width: 0;
  height: 2px;
  background: var(--primary);
  transition: var(--transition);
}

.nav-links a:hover::after {
  width: 100%;
}

.header-actions {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.icon-btn {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 1px solid var(--border);
  background: var(--bg);
  color: var(--text);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: var(--transition);
  font-size: 1.25rem;
}

.icon-btn:hover {
  background: var(--bg-secondary);
  transform: translateY(-2px);
  box-shadow: var(--shadow);
}

.mobile-menu-btn {
  display: none;
}

/* Mobile Menu */
.mobile-menu {
  position: fixed;
  top: 0;
  left: -100%;
  width: 80%;
  max-width: 320px;
  height: 100vh;
  background: var(--bg);
  box-shadow: var(--shadow-xl);
  z-index: 2000;
  transition: var(--transition);
  padding: 2rem 1.5rem;
  overflow-y: auto;
}

.mobile-menu.active {
  left: 0;
}

.mobile-menu-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(4px);
  z-index: 1999;
  opacity: 0;
  visibility: hidden;
  transition: var(--transition);
}

.mobile-menu-overlay.active {
  opacity: 1;
  visibility: visible;
}

.mobile-menu-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 2rem;
}

.mobile-nav {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.mobile-nav a {
  padding: 0.75rem;
  border-radius: var(--radius-sm);
  color: var(--text);
  text-decoration: none;
  font-weight: 500;
  transition: var(--transition);
}

.mobile-nav a:hover {
  background: var(--bg-secondary);
  color: var(--primary);
}

/* Hero Section */
.hero {
  background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
  padding: 6rem 0 8rem;
  position: relative;
  overflow: hidden;
}

.hero::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: 
    repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.05) 35px, rgba(255,255,255,.05) 70px);
}

.hero-content {
  position: relative;
  z-index: 1;
  text-align: center;
  color: white;
}

.hero h1 {
  font-size: 3.5rem;
  font-weight: 800;
  margin-bottom: 1rem;
  line-height: 1.1;
  animation: fadeInUp 0.6s ease-out;
}

.hero-subtitle {
  font-size: 1.25rem;
  opacity: 0.95;
  margin-bottom: 2.5rem;
  max-width: 600px;
  margin-left: auto;
  margin-right: auto;
  animation: fadeInUp 0.6s ease-out 0.1s backwards;
}

.search-bar {
  max-width: 700px;
  margin: 0 auto;
  background: white;
  border-radius: 16px;
  padding: 0.5rem;
  box-shadow: var(--shadow-xl);
  display: flex;
  gap: 0.5rem;
  animation: fadeInUp 0.6s ease-out 0.2s backwards;
}

.search-input-group {
  flex: 1;
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0 1rem;
}

.search-input-group::before {
  content: '🔍';
  font-size: 1.25rem;
}

.search-input-group input {
  flex: 1;
  border: none;
  outline: none;
  font-size: 1rem;
  color: #0f172a;
  background: transparent;
}

.search-btn {
  background: var(--primary);
  color: white;
  border: none;
  padding: 1rem 2rem;
  border-radius: var(--radius);
  font-weight: 600;
  cursor: pointer;
  transition: var(--transition);
  font-size: 1rem;
}

.search-btn:hover {
  background: var(--primary-dark);
  transform: translateY(-1px);
}

.hero-stats {
  display: flex;
  justify-content: center;
  gap: 3rem;
  margin-top: 3rem;
  animation: fadeInUp 0.6s ease-out 0.3s backwards;
}

.stat {
  text-align: center;
}

.stat-value {
  font-size: 2rem;
  font-weight: 700;
}

.stat-label {
  opacity: 0.9;
  font-size: 0.875rem;
}

/* Job of the Day */
.job-of-day {
  margin-top: -4rem;
  position: relative;
  z-index: 2;
  padding: 0 0 3rem;
}

.spotlight-card {
  background: var(--bg);
  border-radius: 20px;
  padding: 2rem;
  box-shadow: var(--shadow-xl);
  border: 2px solid transparent;
  background-image: linear-gradient(var(--bg), var(--bg)), linear-gradient(135deg, var(--primary), var(--secondary));
  background-origin: border-box;
  background-clip: padding-box, border-box;
  position: relative;
  overflow: hidden;
  animation: glow 3s ease-in-out infinite;
}

@keyframes glow {
  0%, 100% { box-shadow: var(--shadow-xl), 0 0 30px rgba(99, 102, 241, 0.3); }
  50% { box-shadow: var(--shadow-xl), 0 0 50px rgba(99, 102, 241, 0.5); }
}

.spotlight-badge {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  background: linear-gradient(135deg, var(--accent) 0%, #f97316 100%);
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 999px;
  font-size: 0.875rem;
  font-weight: 600;
  margin-bottom: 1rem;
}

.spotlight-badge::before {
  content: '⭐';
}

.spotlight-content {
  display: grid;
  grid-template-columns: 1fr auto;
  gap: 2rem;
  align-items: center;
}

/* Main Content */
.main-content {
  padding: 4rem 0;
}

.content-grid {
  display: grid;
  grid-template-columns: 280px 1fr;
  gap: 2rem;
}

/* Filters Sidebar */
.filters-sidebar {
  background: var(--bg-secondary);
  border-radius: var(--radius);
  padding: 1.5rem;
  height: fit-content;
  position: sticky;
  top: calc(var(--header-height) + 1.5rem);
  border: 1px solid var(--border);
}

.filter-section {
  margin-bottom: 2rem;
}

.filter-section:last-child {
  margin-bottom: 0;
}

.filter-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1rem;
  cursor: pointer;
}

.filter-title {
  font-weight: 600;
  font-size: 0.875rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  color: var(--text-secondary);
}

.filter-options {
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
  max-height: 500px;
  overflow: hidden;
  transition: max-height 0.3s ease;
}

.filter-options.collapsed {
  max-height: 0;
}

.checkbox-label {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  cursor: pointer;
  color: var(--text);
  font-size: 0.9375rem;
  transition: var(--transition);
}

.checkbox-label:hover {
  color: var(--primary);
}

input[type="checkbox"] {
  width: 18px;
  height: 18px;
  accent-color: var(--primary);
  cursor: pointer;
}

.tag-cloud {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
}

.tag-filter {
  padding: 0.5rem 1rem;
  border: 1px solid var(--border);
  background: var(--bg);
  border-radius: 999px;
  font-size: 0.875rem;
  cursor: pointer;
  transition: var(--transition);
  color: var(--text);
}

.tag-filter:hover, .tag-filter.active {
  background: var(--primary);
  color: white;
  border-color: var(--primary);
}

.clear-filters {
  width: 100%;
  padding: 0.75rem;
  border: 1px solid var(--border);
  background: var(--bg);
  border-radius: var(--radius-sm);
  color: var(--text);
  font-weight: 500;
  cursor: pointer;
  transition: var(--transition);
}

.clear-filters:hover {
  background: var(--bg-tertiary);
}

/* Mobile Filter Drawer */
.mobile-filter-toggle {
  display: none;
}

.filter-drawer {
  display: none;
}

/* Jobs Section */
.jobs-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 2rem;
  flex-wrap: wrap;
  gap: 1rem;
}

.jobs-count {
  font-size: 1.125rem;
  font-weight: 600;
}

.sort-controls {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.sort-controls select {
  padding: 0.625rem 1rem;
  border: 1px solid var(--border);
  background: var(--bg);
  color: var(--text);
  border-radius: var(--radius-sm);
  font-size: 0.9375rem;
  cursor: pointer;
  outline: none;
  transition: var(--transition);
}

.sort-controls select:hover {
  border-color: var(--primary);
}

/* Job Cards Grid */
.jobs-grid {
  display: grid;
  gap: 1.25rem;
}

.job-card {
  background: var(--bg);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 1.5rem;
  transition: var(--transition);
  cursor: pointer;
  opacity: 0;
  transform: translateY(20px);
  animation: fadeInUp 0.4s ease-out forwards;
}

.job-card:hover {
  border-color: var(--primary);
  box-shadow: var(--shadow-lg);
  transform: translateY(-4px);
}

.job-card-header {
  display: flex;
  justify-content: space-between;
  align-items: start;
  margin-bottom: 0.875rem;
}

.company-info {
  display: flex;
  gap: 1rem;
  align-items: center;
  flex: 1;
}

.company-logo {
  width: 56px;
  height: 56px;
  border-radius: var(--radius-sm);
  background: linear-gradient(135deg, var(--primary-light) 0%, var(--secondary) 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-weight: 700;
  font-size: 1.25rem;
  flex-shrink: 0;
}

.job-title {
  font-size: 1.25rem;
  font-weight: 700;
  margin-bottom: 0.25rem;
  color: var(--text);
}

.company-name {
  color: var(--text-secondary);
  font-size: 0.9375rem;
}

.save-btn {
  background: transparent;
  border: none;
  color: var(--text-tertiary);
  font-size: 1.5rem;
  cursor: pointer;
  transition: var(--transition);
  padding: 0.5rem;
  line-height: 1;
}

.save-btn:hover {
  transform: scale(1.1);
}

.save-btn.saved {
  color: #ef4444;
}

.job-details {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  margin-bottom: 0.875rem;
  font-size: 0.875rem;
}

.job-detail-item {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: var(--text-secondary);
}

.job-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
}

.job-tag {
  padding: 0.375rem 0.75rem;
  background: var(--bg-secondary);
  border-radius: 6px;
  font-size: 0.8125rem;
  color: var(--text-secondary);
  font-weight: 500;
}

.job-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 1rem;
  border-top: 1px solid var(--border);
  margin-top: 0.875rem;
}

.posted-date {
  font-size: 0.875rem;
  color: var(--text-tertiary);
}

.apply-btn {
  padding: 0.625rem 1.5rem;
  background: var(--primary);
  color: white;
  border: none;
  border-radius: var(--radius-sm);
  font-weight: 600;
  cursor: pointer;
  transition: var(--transition);
  text-decoration: none;
  display: inline-block;
}

.apply-btn:hover {
  background: var(--primary-dark);
  transform: translateY(-2px);
  box-shadow: var(--shadow);
}

/* Desktop Compact Layout - >= 1024px */
@media (min-width: 1024px) {
  .job-card {
    padding: 1.125rem 1.5rem;
    line-height: 1.5;
  }
  
  .job-card-header {
    margin-bottom: 0.75rem;
  }
  
  .job-details {
    margin-bottom: 0.75rem;
  }
  
  .job-footer {
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 1rem;
    align-items: center;
  }
  
  .company-logo {
    width: 48px;
    height: 48px;
    font-size: 1.125rem;
  }
  
  .job-title {
    font-size: 1.125rem;
  }
  
  .apply-btn {
    padding: 0.5rem 1.25rem;
    font-size: 0.9375rem;
  }
  
  .jobs-grid {
    gap: 1rem;
  }
}

/* Mobile Layout - < 1024px */
@media (max-width: 1023px) {
  .job-card {
    padding: 20px;
  }
  
  .job-card-header {
    margin-bottom: 1rem;
  }
  
  .company-info {
    align-items: start;
  }
  
  .company-logo {
    width: 48px;
    height: 48px;
    font-size: 1rem;
  }
  
  .job-title {
    font-size: 1.125rem;
  }
  
  .job-details {
    margin-bottom: 1rem;
  }
  
  .job-tags {
    margin-bottom: 1rem;
  }
  
  .job-footer {
    flex-direction: column;
    align-items: stretch;
    gap: 0.75rem;
    padding-top: 1rem;
    margin-top: 0;
  }
  
  .posted-date {
    order: 1;
  }
  
  .apply-btn {
    order: 2;
    width: 100%;
    padding: 0.75rem 1.5rem;
    text-align: center;
  }
}
  .job-tags {
    margin-bottom: 1rem;
  }
  
  .job-footer {
    flex-direction: column;
    align-items: stretch;
    gap: 0.75rem;
    padding-top: 1rem;
    margin-top: 0;
  }
  
  .posted-date {
    order: 1;
  }
  
  .apply-btn {
    order: 2;
    width: 100%;
    padding: 0.75rem 1.5rem;
    text-align: center;
  }
}

/* Company Spotlight */
.company-spotlight {
  padding: 4rem 0;
  background: var(--bg-secondary);
}

.section-header {
  text-align: center;
  margin-bottom: 3rem;
}

.section-title {
  font-size: 2.5rem;
  font-weight: 800;
  margin-bottom: 0.5rem;
}

.section-subtitle {
  color: var(--text-secondary);
  font-size: 1.125rem;
}

.companies-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 2rem;
}

.company-spotlight-card {
  background: var(--bg);
  border-radius: var(--radius);
  padding: 2rem;
  text-align: center;
  transition: var(--transition);
  border: 1px solid var(--border);
}

.company-spotlight-card:hover {
  transform: translateY(-8px);
  box-shadow: var(--shadow-xl);
}

.company-spotlight-logo {
  width: 80px;
  height: 80px;
  margin: 0 auto 1.5rem;
  border-radius: var(--radius);
  background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 2rem;
  font-weight: 700;
}

.company-spotlight-name {
  font-size: 1.25rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
}

.company-spotlight-desc {
  color: var(--text-secondary);
  font-size: 0.9375rem;
  margin-bottom: 1rem;
}

.company-jobs-count {
  display: inline-block;
  padding: 0.5rem 1rem;
  background: var(--bg-secondary);
  border-radius: 999px;
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--primary);
}

/* Salary Insights - Pure CSS Chart */
.salary-insights {
  padding: 4rem 0;
}

.chart-wrapper {
  background: var(--bg-secondary);
  border-radius: var(--radius);
  padding: 2rem;
  border: 1px solid var(--border);
}

.css-bar-chart {
  display: flex;
  align-items: flex-end;
  justify-content: space-around;
  height: 400px;
  padding: 2rem 1rem 3rem;
  gap: 1rem;
}

.bar-column {
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.5rem;
}

.bar {
  width: 100%;
  max-width: 80px;
  background: linear-gradient(to top, var(--primary), var(--primary-light));
  border-radius: 8px 8px 0 0;
  transition: var(--transition);
  position: relative;
  display: flex;
  align-items: flex-start;
  justify-content: center;
  padding-top: 0.5rem;
  color: white;
  font-weight: 600;
  font-size: 0.75rem;
  animation: growBar 1s ease-out;
}

@keyframes growBar {
  from { height: 0 !important; }
}

.bar:hover {
  transform: translateY(-4px);
  box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
}

.bar-label {
  text-align: center;
  font-size: 0.875rem;
  color: var(--text-secondary);
  font-weight: 500;
}

/* Newsletter */
.newsletter {
  padding: 4rem 0;
  background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
  color: white;
}

.newsletter-content {
  max-width: 600px;
  margin: 0 auto;
  text-align: center;
}

.newsletter h2 {
  font-size: 2rem;
  margin-bottom: 1rem;
}

.newsletter-form {
  display: flex;
  gap: 0.75rem;
  margin-top: 2rem;
}

.newsletter-form input {
  flex: 1;
  padding: 1rem 1.5rem;
  border: none;
  border-radius: var(--radius-sm);
  font-size: 1rem;
  outline: none;
}

.newsletter-form button {
  padding: 1rem 2rem;
  background: white;
  color: var(--primary);
  border: none;
  border-radius: var(--radius-sm);
  font-weight: 700;
  cursor: pointer;
  transition: var(--transition);
}

.newsletter-form button:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-lg);
}

/* Modal */
.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  backdrop-filter: blur(8px);
  z-index: 3000;
  overflow-y: auto;
  padding: 2rem 1rem;
}

.modal.active {
  display: flex;
  align-items: center;
  justify-content: center;
}

.modal-content {
  background: var(--bg);
  border-radius: 20px;
  max-width: 800px;
  width: 100%;
  max-height: 90vh;
  overflow-y: auto;
  position: relative;
  animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
  from {
    opacity: 0;
    transform: translateY(50px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.modal-header {
  padding: 2rem;
  border-bottom: 1px solid var(--border);
  position: sticky;
  top: 0;
  background: var(--bg);
  z-index: 10;
}

.modal-close {
  position: absolute;
  top: 1.5rem;
  right: 1.5rem;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  border: 1px solid var(--border);
  background: var(--bg);
  color: var(--text);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: var(--transition);
  font-size: 1.5rem;
  line-height: 1;
}

.modal-close:hover {
  background: var(--bg-secondary);
  transform: rotate(90deg);
}

.modal-body {
  padding: 2rem;
}

.modal-footer {
  position: sticky;
  bottom: 0;
  padding: 1.5rem 2rem;
  border-top: 1px solid var(--border);
  background: var(--bg);
  display: flex;
  gap: 1rem;
}

/* Footer */
footer {
  background: var(--bg-secondary);
  border-top: 1px solid var(--border);
  padding: 3rem 0 1.5rem;
}

.footer-content {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr 1fr;
  gap: 3rem;
  margin-bottom: 2rem;
}

.footer-section h3 {
  margin-bottom: 1rem;
  font-size: 1rem;
}

.footer-links {
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}

.footer-links a {
  color: var(--text-secondary);
  text-decoration: none;
  transition: var(--transition);
  font-size: 0.9375rem;
}

.footer-links a:hover {
  color: var(--primary);
}

.social-links {
  display: flex;
  gap: 1rem;
  margin-top: 1rem;
}

.social-links a {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: var(--bg);
  border: 1px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text);
  transition: var(--transition);
  text-decoration: none;
}

.social-links a:hover {
  background: var(--primary);
  color: white;
  transform: translateY(-2px);
}

.footer-bottom {
  padding-top: 2rem;
  border-top: 1px solid var(--border);
  text-align: center;
  color: var(--text-tertiary);
  font-size: 0.875rem;
}

/* Animations */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsive */
@media (max-width: 1023px) {
  .content-grid {
    grid-template-columns: 1fr;
  }
  
  .filters-sidebar {
    display: none;
  }
  
  .mobile-filter-toggle {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.25rem;
    background: var(--bg-secondary);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    cursor: pointer;
    font-weight: 500;
  }

  .filter-drawer {
    display: block;
    position: fixed;
    bottom: -100%;
    left: 0;
    right: 0;
    background: var(--bg);
    border-radius: 20px 20px 0 0;
    box-shadow: var(--shadow-xl);
    z-index: 2000;
    transition: var(--transition);
    max-height: 80vh;
    overflow-y: auto;
    padding: 2rem 1.5rem;
  }

  .filter-drawer.active {
    bottom: 0;
  }

  .hero h1 {
    font-size: 2.5rem;
  }

  .footer-content {
    grid-template-columns: 1fr 1fr;
  }

  .spotlight-content {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 768px) {
  .nav-links {
    display: none;
  }

  .mobile-menu-btn {
    display: flex;
  }

  .hero {
    padding: 4rem 0 6rem;
  }

  .hero h1 {
    font-size: 2rem;
  }

  .hero-subtitle {
    font-size: 1rem;
  }

  .search-bar {
    flex-direction: column;
  }

  .hero-stats {
    gap: 1.5rem;
  }

  .stat-value {
    font-size: 1.5rem;
  }

  .jobs-header {
    flex-direction: column;
    align-items: stretch;
  }

  .sort-controls {
    justify-content: space-between;
  }

  .footer-content {
    grid-template-columns: 1fr;
    gap: 2rem;
  }

  .newsletter-form {
    flex-direction: column;
  }

  .companies-grid {
    grid-template-columns: 1fr;
  }

  .section-title {
    font-size: 2rem;
  }

  .css-bar-chart {
    height: 300px;
  }
}

.no-results {
  text-align: center;
  padding: 4rem 1rem;
  color: var(--text-secondary);
}

.no-results::before {
  content: '🔍';
  font-size: 4rem;
  display: block;
  margin-bottom: 1rem;
  opacity: 0.3;
}

.sticky-apply {
  display: none;
}

@media (max-width: 768px) {
  .sticky-apply {
    display: block;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 1rem;
    background: var(--bg);
    border-top: 1px solid var(--border);
    z-index: 100;
    transform: translateY(100%);
    transition: var(--transition);
  }

  .sticky-apply.active {
    transform: translateY(0);
  }
}

.pulse {
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.05); }
}
</style>
</head>
<body data-theme="light">
<!-- Header -->
<header>
  <div class="container">
    <div class="header-content">
      <a href="#" class="logo">
        <div class="logo-icon">ATX</div>
        <span>AustinTX .dev</span>
      </a>
      <nav class="nav-links">
        <a href="#jobs">Find Jobs</a>
        <a href="#companies">Companies</a>
        <a href="#insights">Salary Insights</a>
        <a href="#newsletter">Resources</a>
      </nav>
      <div class="header-actions">
        <button class="icon-btn" id="theme-toggle" aria-label="Toggle theme">🌙</button>
        <button class="icon-btn mobile-menu-btn" id="mobile-menu-btn" aria-label="Menu">☰</button>
      </div>
    </div>
  </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>
<div class="mobile-menu" id="mobile-menu">
  <div class="mobile-menu-header">
    <div class="logo">
      <div class="logo-icon">ATX</div>
      <span>AustinTX .dev</span>
    </div>
    <button class="icon-btn" id="close-menu-btn">✕</button>
  </div>
  <nav class="mobile-nav">
    <a href="#jobs">Find Jobs</a>
    <a href="#companies">Companies</a>
    <a href="#insights">Salary Insights</a>
    <a href="#newsletter">Resources</a>
    <a href="#">Post a Job</a>
    <a href="#">Saved Jobs <span id="saved-count-mobile">(0)</span></a>
  </nav>
</div>

<!-- Hero -->
<section class="hero">
  <div class="container">
    <div class="hero-content">
      <h1>Find Your Next Tech Role in Austin</h1>
      <p class="hero-subtitle">Discover 500+ opportunities from Austin's top tech companies and fastest-growing startups</p>
      <div class="search-bar">
        <div class="search-input-group">
          <input type="text" id="search-input" placeholder="Job title, keywords, or company">
        </div>
        <button class="search-btn" id="search-btn">Search Jobs</button>
      </div>
      <div class="hero-stats">
        <div class="stat">
          <div class="stat-value">842+</div>
          <div class="stat-label">Active Jobs</div>
        </div>
        <div class="stat">
          <div class="stat-value">200+</div>
          <div class="stat-label">Companies</div>
        </div>
        <div class="stat">
          <div class="stat-value">15K+</div>
          <div class="stat-label">Tech Pros</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Job of the Day -->
<section class="job-of-day">
  <div class="container">
    <div class="spotlight-card">
      <span class="spotlight-badge">Job of the Day</span>
      <div class="spotlight-content">
        <div>
          <h2 style="font-size: 1.75rem; margin-bottom: 0.5rem;">Senior Full Stack Engineer</h2>
          <p style="color: var(--text-secondary); margin-bottom: 1rem;">Tesla • South Austin • $165K - $210K • Remote OK</p>
          <div class="job-tags">
            <span class="job-tag">React</span>
            <span class="job-tag">Node.js</span>
            <span class="job-tag">Python</span>
            <span class="job-tag">AWS</span>
            <span class="job-tag">TypeScript</span>
          </div>
          <p style="color: var(--text-secondary); margin-bottom: 1.5rem;">Join Tesla's Cloud Engineering team to build next-gen automotive software. Work on systems that power 2M+ vehicles globally.</p>
        </div>
        <button class="apply-btn pulse" onclick="openJobModal(0)" style="padding: 1rem 2rem; font-size: 1.125rem;">
          View Details →
        </button>
      </div>
    </div>
  </div>
</section>

<!-- Main Content -->
<section class="main-content" id="jobs">
  <div class="container">
    <div class="content-grid">
      <!-- Filters Sidebar -->
      <aside class="filters-sidebar">
        <div class="filter-section">
          <h3 style="margin-bottom: 1.5rem; font-size: 1.25rem;">Filters</h3>
          <button class="clear-filters" id="clear-filters">Clear All Filters</button>
        </div>

        <div class="filter-section">
          <div class="filter-header" onclick="toggleFilterSection(this)">
            <span class="filter-title">Job Type</span>
            <span>▼</span>
          </div>
          <div class="filter-options" id="job-type-filters">
            <label class="checkbox-label">
              <input type="checkbox" value="Full-time" class="job-type-filter">
              <span>Full-time</span>
            </label>
            <label class="checkbox-label">
              <input type="checkbox" value="Contract" class="job-type-filter">
              <span>Contract</span>
            </label>
            <label class="checkbox-label">
              <input type="checkbox" value="Intern" class="job-type-filter">
              <span>Internship</span>
            </label>
          </div>
        </div>

        <div class="filter-section">
          <div class="filter-header" onclick="toggleFilterSection(this)">
            <span class="filter-title">Experience Level</span>
            <span>▼</span>
          </div>
          <div class="filter-options" id="experience-filters">
            <label class="checkbox-label">
              <input type="checkbox" value="Entry" class="exp-filter">
              <span>Entry Level</span>
            </label>
            <label class="checkbox-label">
              <input type="checkbox" value="Mid" class="exp-filter">
              <span>Mid Level</span>
            </label>
            <label class="checkbox-label">
              <input type="checkbox" value="Senior" class="exp-filter">
              <span>Senior</span>
            </label>
            <label class="checkbox-label">
              <input type="checkbox" value="Lead" class="exp-filter">
              <span>Lead/Principal</span>
            </label>
          </div>
        </div>

        <div class="filter-section">
          <div class="filter-header" onclick="toggleFilterSection(this)">
            <span class="filter-title">Work Location</span>
            <span>▼</span>
          </div>
          <div class="filter-options" id="remote-filters">
            <label class="checkbox-label">
              <input type="checkbox" value="Remote" class="remote-filter">
              <span>Remote</span>
            </label>
            <label class="checkbox-label">
              <input type="checkbox" value="Hybrid" class="remote-filter">
              <span>Hybrid</span>
            </label>
            <label class="checkbox-label">
              <input type="checkbox" value="On-site" class="remote-filter">
              <span>On-site</span>
            </label>
          </div>
        </div>

        <div class="filter-section">
          <div class="filter-header" onclick="toggleFilterSection(this)">
            <span class="filter-title">Tech Stack</span>
            <span>▼</span>
          </div>
          <div class="tag-cloud" id="tech-filters">
            <button class="tag-filter" data-tech="React">React</button>
            <button class="tag-filter" data-tech="Python">Python</button>
            <button class="tag-filter" data-tech="AWS">AWS</button>
            <button class="tag-filter" data-tech="Node.js">Node.js</button>
            <button class="tag-filter" data-tech="TypeScript">TypeScript</button>
            <button class="tag-filter" data-tech="Go">Go</button>
            <button class="tag-filter" data-tech="Kubernetes">K8s</button>
            <button class="tag-filter" data-tech="SQL">SQL</button>
          </div>
        </div>
      </aside>

      <!-- Jobs Section -->
      <main>
        <div class="jobs-header">
          <div style="display: flex; align-items: center; gap: 1rem;">
            <h2 class="jobs-count">Showing <span id="results-count">13</span> jobs</h2>
            <button class="mobile-filter-toggle" id="mobile-filter-btn">
              🔧 Filters
            </button>
          </div>
          <div class="sort-controls">
            <label for="sort-select" style="color: var(--text-secondary); font-size: 0.9375rem;">Sort by:</label>
            <select id="sort-select">
              <option value="newest">Newest</option>
              <option value="salary">Salary: High to Low</option>
              <option value="company">Company: A-Z</option>
            </select>
          </div>
        </div>

        <div class="jobs-grid" id="jobs-grid"></div>
        <div class="no-results" id="no-results" style="display: none;">
          <h3>No jobs found</h3>
          <p>Try adjusting your filters or search terms</p>
        </div>
      </main>
    </div>
  </div>
</section>

<!-- Company Spotlight -->
<section class="company-spotlight" id="companies">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Company Spotlight</h2>
      <p class="section-subtitle">Featured Austin tech companies hiring now</p>
    </div>
    <div class="companies-grid">
      <div class="company-spotlight-card">
        <div class="company-spotlight-logo">T</div>
        <h3 class="company-spotlight-name">Tesla</h3>
        <p class="company-spotlight-desc">Accelerating the world's transition to sustainable energy through EVs, solar, and integrated energy solutions.</p>
        <span class="company-jobs-count">24 Open Roles</span>
      </div>
      <div class="company-spotlight-card">
        <div class="company-spotlight-logo">I</div>
        <h3 class="company-spotlight-name">Indeed</h3>
        <p class="company-spotlight-desc">World's #1 job site helping people get jobs. Austin HQ leading product and engineering innovation.</p>
        <span class="company-jobs-count">18 Open Roles</span>
      </div>
      <div class="company-spotlight-card">
        <div class="company-spotlight-logo">O</div>
        <h3 class="company-spotlight-name">Oracle</h3>
        <p class="company-spotlight-desc">Cloud infrastructure leader building the future of enterprise tech from its Austin campus.</p>
        <span class="company-jobs-count">31 Open Roles</span>
      </div>
      <div class="company-spotlight-card">
        <div class="company-spotlight-logo">D</div>
        <h3 class="company-spotlight-name">Dell Technologies</h3>
        <p class="company-spotlight-desc">Global tech leader headquartered in Round Rock, driving innovation in cloud, AI, and digital transformation.</p>
        <span class="company-jobs-count">42 Open Roles</span>
      </div>
    </div>
  </div>
</section>

<!-- Salary Insights - Pure CSS Chart -->
<section class="salary-insights" id="insights">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Austin Tech Salary Insights</h2>
      <p class="section-subtitle">Average compensation by role in Austin, TX</p>
    </div>
    <div class="chart-wrapper">
      <div class="css-bar-chart">
        <div class="bar-column">
          <div class="bar" style="height: 30%;">$85K</div>
          <div class="bar-label">Entry Level</div>
        </div>
        <div class="bar-column">
          <div class="bar" style="height: 44%;">$125K</div>
          <div class="bar-label">Mid Level</div>
        </div>
        <div class="bar-column">
          <div class="bar" style="height: 58%;">$165K</div>
          <div class="bar-label">Senior</div>
        </div>
        <div class="bar-column">
          <div class="bar" style="height: 75%;">$215K</div>
          <div class="bar-label">Lead/Principal</div>
        </div>
        <div class="bar-column">
          <div class="bar" style="height: 100%;">$285K</div>
          <div class="bar-label">Staff+</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Newsletter -->
<section class="newsletter" id="newsletter">
  <div class="container">
    <div class="newsletter-content">
      <h2>Get Austin Tech Jobs Weekly</h2>
      <p>Top opportunities from Tesla, Indeed, Oracle & 200+ Austin companies delivered to your inbox</p>
      <form class="newsletter-form" id="newsletter-form">
        <input type="email" placeholder="Enter your email" required id="newsletter-email">
        <button type="submit">Subscribe Free</button>
      </form>
    </div>
  </div>
</section>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="footer-content">
      <div class="footer-section">
        <div class="logo" style="margin-bottom: 1rem;">
          <div class="logo-icon">ATX</div>
          <span>AustinTX .dev</span>
        </div>
        <p style="color: var(--text-secondary); font-size: 0.9375rem; margin-bottom: 1rem;">Austin's premier tech job board connecting top talent with innovative companies.</p>
        <div class="social-links">
          <a href="#" aria-label="Twitter">𝕏</a>
          <a href="#" aria-label="LinkedIn">in</a>
          <a href="#" aria-label="GitHub">gh</a>
          <a href="#" aria-label="Discord">💬</a>
        </div>
      </div>
      <div class="footer-section">
        <h3>For Job Seekers</h3>
        <div class="footer-links">
          <a href="#jobs">Browse Jobs</a>
          <a href="#insights">Salary Calculator</a>
          <a href="#">Resume Tips</a>
          <a href="#">Interview Prep</a>
        </div>
      </div>
      <div class="footer-section">
        <h3>For Companies</h3>
        <div class="footer-links">
          <a href="#">Post a Job</a>
          <a href="#">Pricing</a>
          <a href="#">Employer Brand</a>
          <a href="#">Talent Search</a>
        </div>
      </div>
      <div class="footer-section">
        <h3>Austin Tech</h3>
        <div class="footer-links">
          <a href="#">Built In Austin</a>
          <a href="#">Capital Factory</a>
          <a href="#">Austin Tech Events</a>
          <a href="#">ATX Tech Community</a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 AustinTX.dev. Keep Austin Coding.</p>
    </div>
  </div>
</footer>

<!-- Mobile Filter Drawer -->
<div class="mobile-menu-overlay" id="filter-overlay"></div>
<div class="filter-drawer" id="filter-drawer">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h3 style="font-size: 1.25rem;">Filters</h3>
    <button class="icon-btn" id="close-filter-btn">✕</button>
  </div>
  <div id="mobile-filters-content"></div>
  <button class="apply-btn" style="width: 100%; margin-top: 1.5rem;" id="apply-mobile-filters">Apply Filters</button>
</div>

<!-- Job Detail Modal -->
<div class="modal" id="job-modal">
  <div class="modal-content">
    <div class="modal-header">
      <button class="modal-close" id="close-modal">✕</button>
      <div id="modal-header-content"></div>
    </div>
    <div class="modal-body" id="modal-body"></div>
    <div class="modal-footer">
      <button class="save-btn" id="modal-save-btn" style="flex: 0 0 auto; padding: 0.75rem 1.5rem; border: 1px solid var(--border); border-radius: var(--radius-sm); background: var(--bg);">
        ♡ Save
      </button>
      <a href="#" target="_blank" class="apply-btn" id="modal-apply-btn" style="flex: 1; text-align: center;">
        Apply Now ↗
      </a>
    </div>
  </div>
</div>

<!-- Sticky Apply Button Mobile -->
<div class="sticky-apply" id="sticky-apply">
  <a href="#" target="_blank" class="apply-btn" style="width: 100%; text-align: center; display: block;">
    Apply Now ↗
  </a>
</div>

<script>
// Job Data
const jobsData = [
  {
    id: 0,
    title: "Senior Full Stack Engineer",
    company: "Tesla",
    logo: "T",
    location: "South Austin",
    salaryMin: 165000,
    salaryMax: 210000,
    type: "Full-time",
    experience: "Senior",
    remote: "Hybrid",
    tags: ["React", "Node.js", "Python", "AWS", "TypeScript"],
    postedDays: 1,
    description: "Join Tesla's Cloud Engineering team to build next-gen automotive software. You'll work on systems that power 2M+ vehicles globally, designing scalable microservices and real-time data pipelines. Lead technical initiatives and mentor junior engineers.",
    responsibilities: [
      "Design and implement scalable backend services using Node.js and Python",
      "Build responsive front-end applications with React and TypeScript",
      "Collaborate with cross-functional teams on vehicle software integration",
      "Optimize AWS infrastructure for performance and cost efficiency",
      "Participate in code reviews and maintain high coding standards"
    ],
    applyUrl: "https://tesla.com/careers"
  },
  {
    id: 1,
    title: "DevOps Engineer",
    company: "Indeed",
    logo: "I",
    location: "Downtown Austin",
    salaryMin: 135000,
    salaryMax: 175000,
    type: "Full-time",
    experience: "Mid",
    remote: "Hybrid",
    tags: ["Kubernetes", "AWS", "Docker", "Terraform", "Go"],
    postedDays: 2,
    description: "Indeed is seeking a DevOps Engineer to scale infrastructure for the world's #1 job site. You'll manage Kubernetes clusters serving 300M+ users monthly and implement CI/CD pipelines for rapid deployment.",
    responsibilities: [
      "Manage and scale Kubernetes clusters across multiple AWS regions",
      "Build and maintain CI/CD pipelines using Jenkins and GitLab",
      "Implement Infrastructure as Code with Terraform",
      "Monitor system performance and optimize for reliability",
      "Collaborate with development teams on deployment strategies"
    ],
    applyUrl: "https://indeed.com/careers"
  },
  {
    id: 2,
    title: "Data Scientist",
    company: "Oracle",
    logo: "O",
    location: "North Austin",
    salaryMin: 145000,
    salaryMax: 185000,
    type: "Full-time",
    experience: "Senior",
    remote: "On-site",
    tags: ["Python", "SQL", "Machine Learning", "TensorFlow", "Spark"],
    postedDays: 3,
    description: "Oracle Cloud Infrastructure is hiring a Data Scientist to build ML models for enterprise clients. Work with petabyte-scale datasets and deploy models to production serving Fortune 500 companies.",
    responsibilities: [
      "Develop machine learning models for predictive analytics",
      "Process large-scale datasets using Spark and SQL",
      "Deploy ML models to production OCI environments",
      "Collaborate with product teams on data strategy",
      "Present insights to stakeholders and executives"
    ],
    applyUrl: "https://oracle.com/careers"
  },
  {
    id: 3,
    title: "Product Manager - Cloud",
    company: "Dell Technologies",
    logo: "D",
    location: "Round Rock",
    salaryMin: 155000,
    salaryMax: 195000,
    type: "Full-time",
    experience: "Senior",
    remote: "Hybrid",
    tags: ["Product Strategy", "Agile", "Cloud", "B2B", "Analytics"],
    postedDays: 4,
    description: "Lead product strategy for Dell's cloud infrastructure portfolio. Define roadmap, work with engineering on feature delivery, and drive go-to-market for enterprise cloud solutions.",
    responsibilities: [
      "Define product vision and roadmap for cloud infrastructure",
      "Gather requirements from enterprise customers and sales",
      "Partner with engineering on agile development cycles",
      "Analyze market trends and competitive landscape",
      "Drive product launches and adoption metrics"
    ],
    applyUrl: "https://dell.com/careers"
  },
  {
    id: 4,
    title: "Frontend Engineer",
    company: "HomeAway",
    logo: "H",
    location: "Downtown Austin",
    salaryMin: 120000,
    salaryMax: 160000,
    type: "Full-time",
    experience: "Mid",
    remote: "Remote",
    tags: ["React", "TypeScript", "Next.js", "GraphQL", "CSS"],
    postedDays: 5,
    description: "Build beautiful, performant web experiences for HomeAway's vacation rental marketplace. Work on consumer-facing products used by millions of travelers worldwide.",
    responsibilities: [
      "Develop React components with TypeScript and Next.js",
      "Implement GraphQL queries for efficient data fetching",
      "Optimize web performance and Core Web Vitals",
      "Collaborate with design on UI/UX implementation",
      "Write comprehensive unit and integration tests"
    ],
    applyUrl: "https://homeaway.com/careers"
  },
  {
    id: 5,
    title: "Backend Engineer",
    company: "WP Engine",
    logo: "W",
    location: "East Austin",
    salaryMin: 125000,
    salaryMax: 165000,
    type: "Full-time",
    experience: "Mid",
    remote: "Hybrid",
    tags: ["Go", "Kubernetes", "PostgreSQL", "Redis", "gRPC"],
    postedDays: 6,
    description: "WP Engine powers WordPress for 1.5M+ sites. Join our platform team building high-performance infrastructure serving billions of requests daily. Work with Go, K8s, and cutting-edge tech.",
    responsibilities: [
      "Build scalable Go microservices on Kubernetes",
      "Design database schemas and optimize PostgreSQL queries",
      "Implement caching strategies with Redis",
      "Build internal APIs using gRPC",
      "Participate in on-call rotation for platform reliability"
    ],
    applyUrl: "https://wpengine.com/careers"
  },
  {
    id: 6,
    title: "Software Engineering Intern",
    company: "Canva",
    logo: "C",
    location: "South Austin",
    salaryMin: 50000,
    salaryMax: 60000,
    type: "Intern",
    experience: "Entry",
    remote: "Hybrid",
    tags: ["React", "TypeScript", "Python", "Testing"],
    postedDays: 7,
    description: "12-week summer internship at Canva's Austin office. Work on real features shipping to 100M+ users. Mentorship, tech talks, and potential full-time offer. Great for CS students!",
    responsibilities: [
      "Ship features to production with mentorship from senior engineers",
      "Write clean, tested code in React and TypeScript",
      "Participate in design reviews and sprint planning",
      "Present internship project to engineering leadership",
      "Network with Austin tech community at Canva events"
    ],
    applyUrl: "https://canva.com/careers"
  },
  {
    id: 7,
    title: "ML Engineer",
    company: "Sana Biotechnology",
    logo: "S",
    location: "East Austin",
    salaryMin: 150000,
    salaryMax: 190000,
    type: "Full-time",
    experience: "Senior",
    remote: "On-site",
    tags: ["Python", "PyTorch", "Bioinformatics", "AWS", "MLOps"],
    postedDays: 8,
    description: "Apply machine learning to revolutionize gene therapy. Build models that analyze genomics data to develop next-gen treatments. Unique opportunity at the intersection of AI and biotech.",
    responsibilities: [
      "Develop ML models for genomics data analysis",
      "Build MLOps pipelines for model training and deployment",
      "Collaborate with bioinformaticians and biologists",
      "Optimize deep learning models with PyTorch",
      "Present research findings to scientific teams"
    ],
    applyUrl: "https://sana.com/careers"
  },
  {
    id: 8,
    title: "Site Reliability Engineer",
    company: "Procore",
    logo: "P",
    location: "West Austin",
    salaryMin: 140000,
    salaryMax: 180000,
    type: "Full-time",
    experience: "Mid",
    remote: "Remote",
    tags: ["GCP", "Terraform", "Prometheus", "Python", "SRE"],
    postedDays: 9,
    description: "Ensure reliability for Procore's construction management platform used on $1T+ of projects. Build observability, automate toil, and maintain 99.99% uptime SLA.",
    responsibilities: [
      "Design and implement monitoring with Prometheus and Grafana",
      "Automate infrastructure with Terraform and GCP",
      "Lead incident response and postmortem processes",
      "Improve system reliability and performance",
      "Build tools to reduce operational toil"
    ],
    applyUrl: "https://procore.com/careers"
  },
  {
    id: 9,
    title: "Principal Engineer",
    company: "GM (General Motors)",
    logo: "G",
    location: "North Austin",
    salaryMin: 200000,
    salaryMax: 280000,
    type: "Full-time",
    experience: "Lead",
    remote: "Hybrid",
    tags: ["C++", "Python", "Autonomous Vehicles", "ROS", "Leadership"],
    postedDays: 10,
    description: "Technical leadership role for GM's autonomous vehicle division in Austin. Architect systems for self-driving cars, mentor engineers, and drive technical strategy across the org.",
    responsibilities: [
      "Set technical direction for autonomous vehicle software",
      "Lead architecture reviews and design decisions",
      "Mentor senior and staff engineers",
      "Collaborate with research teams on innovation",
      "Interface with executive leadership on technical strategy"
    ],
    applyUrl: "https://gm.com/careers"
  },
  {
    id: 10,
    title: "Security Engineer",
    company: "Cloudflare",
    logo: "CF",
    location: "Downtown Austin",
    salaryMin: 160000,
    salaryMax: 200000,
    type: "Full-time",
    experience: "Senior",
    remote: "Hybrid",
    tags: ["Security", "Go", "Network Engineering", "Rust", "DDoS"],
    postedDays: 11,
    description: "Protect 20% of the internet at Cloudflare. Build security products that defend against DDoS attacks, bots, and vulnerabilities. Work with Rust, Go, and distributed systems at massive scale.",
    responsibilities: [
      "Design security features for DDoS mitigation",
      "Develop low-latency network code in Rust and Go",
      "Analyze attack patterns and implement defenses",
      "Collaborate with research on threat intelligence",
      "Contribute to open-source security projects"
    ],
    applyUrl: "https://cloudflare.com/careers"
  },
  {
    id: 11,
    title: "iOS Engineer",
    company: "Bumble",
    logo: "B",
    location: "East Austin",
    salaryMin: 130000,
    salaryMax: 170000,
    type: "Full-time",
    experience: "Mid",
    remote: "Hybrid",
    tags: ["Swift", "iOS", "UIKit", "SwiftUI", "Mobile"],
    postedDays: 12,
    description: "Build the Bumble app used by 100M+ people to connect. Ship features millions love, optimize performance, and create delightful mobile experiences. Austin HQ with global impact.",
    responsibilities: [
      "Develop iOS features using Swift and SwiftUI",
      "Optimize app performance and battery usage",
      "Collaborate with design on mobile UI/UX",
      "Write comprehensive unit and UI tests",
      "Participate in App Store release process"
    ],
    applyUrl: "https://bumble.com/careers"
  },
  {
    id: 12,
    title: "Data Engineer",
    company: "Electronic Arts",
    logo: "EA",
    location: "North Austin",
    salaryMin: 125000,
    salaryMax: 165000,
    type: "Contract",
    experience: "Mid",
    remote: "Hybrid",
    tags: ["Python", "Spark", "Airflow", "SQL", "BigQuery"],
    postedDays: 13,
    description: "6-month contract with EA Austin. Build data pipelines for game analytics processing billions of events daily. Work on telemetry for Apex Legends, FIFA, and other hit games.",
    responsibilities: [
      "Build ETL pipelines with Spark and Airflow",
      "Design data models in BigQuery for analytics",
      "Optimize query performance for large datasets",
      "Collaborate with data science on telemetry",
      "Maintain data quality and monitoring"
    ],
    applyUrl: "https://ea.com/careers"
  }
];

// State
let filteredJobs = [...jobsData];
let savedJobs = JSON.parse(localStorage.getItem('savedJobs') || '[]');
let activeFilters = {
  search: '',
  jobTypes: [],
  experience: [],
  remote: [],
  tech: []
};
let currentSort = 'newest';

// DOM Elements
const jobsGrid = document.getElementById('jobs-grid');
const resultsCount = document.getElementById('results-count');
const noResults = document.getElementById('no-results');
const searchInput = document.getElementById('search-input');
const searchBtn = document.getElementById('search-btn');
const sortSelect = document.getElementById('sort-select');
const themeToggle = document.getElementById('theme-toggle');
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const closeMenuBtn = document.getElementById('close-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');
const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
const mobileFilterBtn = document.getElementById('mobile-filter-btn');
const filterDrawer = document.getElementById('filter-drawer');
const filterOverlay = document.getElementById('filter-overlay');
const closeFilterBtn = document.getElementById('close-filter-btn');
const clearFiltersBtn = document.getElementById('clear-filters');
const jobModal = document.getElementById('job-modal');
const closeModalBtn = document.getElementById('close-modal');

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  initTheme();
  renderJobs(jobsData);
  initFilters();
  initSearch();
  initSort();
  initMobileMenu();
  initModal();
  initNewsletter();
  initIntersectionObserver();
  updateSavedCount();
});

// Theme Toggle
function initTheme() {
  const savedTheme = localStorage.getItem('theme') || 'light';
  document.body.setAttribute('data-theme', savedTheme);
  updateThemeIcon(savedTheme);
  
  themeToggle.addEventListener('click', () => {
    const currentTheme = document.body.getAttribute('data-theme');
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
    document.body.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    updateThemeIcon(newTheme);
  });
}

function updateThemeIcon(theme) {
  themeToggle.textContent = theme === 'light' ? '🌙' : '☀️';
}

// Render Jobs
function renderJobs(jobs) {
  if (jobs.length === 0) {
    jobsGrid.style.display = 'none';
    noResults.style.display = 'block';
    resultsCount.textContent = '0';
    return;
  }
  
  jobsGrid.style.display = 'grid';
  noResults.style.display = 'none';
  resultsCount.textContent = jobs.length;
  
  jobsGrid.innerHTML = jobs.map((job, idx) => `
    <article class="job-card" data-id="${job.id}" style="animation-delay: ${idx * 0.05}s">
      <div class="job-card-header">
        <div class="company-info">
          <div class="company-logo">${job.logo}</div>
          <div>
            <h3 class="job-title">${job.title}</h3>
            <p class="company-name">${job.company}</p>
          </div>
        </div>
        <button class="save-btn ${savedJobs.includes(job.id) ? 'saved' : ''}" onclick="toggleSave(${job.id}, event)">
          ${savedJobs.includes(job.id) ? '♥' : '♡'}
        </button>
      </div>
      <div class="job-details">
        <div class="job-detail-item">
          📍 <span>${job.location}</span>
        </div>
        <div class="job-detail-item">
          💰 <span>$${(job.salaryMin / 1000).toFixed(0)}K - $${(job.salaryMax / 1000).toFixed(0)}K</span>
        </div>
        <div class="job-detail-item">
          💼 <span>${job.type}</span>
        </div>
        <div class="job-detail-item">
          🏠 <span>${job.remote}</span>
        </div>
      </div>
      <div class="job-tags">
        ${job.tags.slice(0, 4).map(tag => `<span class="job-tag">${tag}</span>`).join('')}
        ${job.tags.length > 4 ? `<span class="job-tag">+${job.tags.length - 4}</span>` : ''}
      </div>
      <div class="job-footer">
        <span class="posted-date">🕐 ${job.postedDays} day${job.postedDays !== 1 ? 's' : ''} ago</span>
        <button class="apply-btn" onclick="openJobModal(${job.id})">View Details</button>
      </div>
    </article>
  `).join('');
  
  // Add click handler to cards
  document.querySelectorAll('.job-card').forEach(card => {
    card.addEventListener('click', (e) => {
      if (!e.target.closest('.save-btn') && !e.target.closest('.apply-btn')) {
        openJobModal(parseInt(card.dataset.id));
      }
    });
  });
}

// Intersection Observer for animations
function initIntersectionObserver() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, { threshold: 0.1 });
  
  document.querySelectorAll('.job-card').forEach(card => observer.observe(card));
}

// Collapsible Filter Sections
function toggleFilterSection(header) {
  const options = header.nextElementSibling;
  const arrow = header.querySelector('span:last-child');
  options.classList.toggle('collapsed');
  arrow.textContent = options.classList.contains('collapsed') ? '▶' : '▼';
}

// Filters
function initFilters() {
  // Job Type
  document.querySelectorAll('.job-type-filter').forEach(cb => {
    cb.addEventListener('change', () => {
      activeFilters.jobTypes = Array.from(document.querySelectorAll('.job-type-filter:checked')).map(cb => cb.value);
      applyFilters();
    });
  });
  
  // Experience
  document.querySelectorAll('.exp-filter').forEach(cb => {
    cb.addEventListener('change', () => {
      activeFilters.experience = Array.from(document.querySelectorAll('.exp-filter:checked')).map(cb => cb.value);
      applyFilters();
    });
  });
  
  // Remote
  document.querySelectorAll('.remote-filter').forEach(cb => {
    cb.addEventListener('change', () => {
      activeFilters.remote = Array.from(document.querySelectorAll('.remote-filter:checked')).map(cb => cb.value);
      applyFilters();
    });
  });
  
  // Tech Stack
  document.querySelectorAll('.tag-filter').forEach(btn => {
    btn.addEventListener('click', () => {
      btn.classList.toggle('active');
      activeFilters.tech = Array.from(document.querySelectorAll('.tag-filter.active')).map(b => b.dataset.tech);
      applyFilters();
    });
  });
  
  // Clear Filters
  clearFiltersBtn.addEventListener('click', () => {
    document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
    document.querySelectorAll('.tag-filter').forEach(btn => btn.classList.remove('active'));
    searchInput.value = '';
    activeFilters = { search: '', jobTypes: [], experience: [], remote: [], tech: [] };
    applyFilters();
  });
  
  // Mobile Filter Drawer
  mobileFilterBtn.addEventListener('click', () => {
    filterDrawer.classList.add('active');
    filterOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
    cloneFiltersToMobile();
  });
  
  closeFilterBtn.addEventListener('click', closeFilterDrawer);
  filterOverlay.addEventListener('click', closeFilterDrawer);
  
  document.getElementById('apply-mobile-filters').addEventListener('click', closeFilterDrawer);
}

function cloneFiltersToMobile() {
  const mobileContent = document.getElementById('mobile-filters-content');
  const desktopFilters = document.querySelector('.filters-sidebar').cloneNode(true);
  desktopFilters.querySelector('h3').remove();
  desktopFilters.querySelector('.clear-filters').remove();
  mobileContent.innerHTML = desktopFilters.innerHTML;
  
  // Re-attach listeners for mobile
  mobileContent.querySelectorAll('.job-type-filter').forEach((cb, idx) => {
    cb.addEventListener('change', () => {
      document.querySelectorAll('.filters-sidebar .job-type-filter')[idx].checked = cb.checked;
      document.querySelectorAll('.filters-sidebar .job-type-filter')[idx].dispatchEvent(new Event('change'));
    });
  });
  
  mobileContent.querySelectorAll('.exp-filter').forEach((cb, idx) => {
    cb.addEventListener('change', () => {
      document.querySelectorAll('.filters-sidebar .exp-filter')[idx].checked = cb.checked;
      document.querySelectorAll('.filters-sidebar .exp-filter')[idx].dispatchEvent(new Event('change'));
    });
  });
  
  mobileContent.querySelectorAll('.remote-filter').forEach((cb, idx) => {
    cb.addEventListener('change', () => {
      document.querySelectorAll('.filters-sidebar .remote-filter')[idx].checked = cb.checked;
      document.querySelectorAll('.filters-sidebar .remote-filter')[idx].dispatchEvent(new Event('change'));
    });
  });
  
  mobileContent.querySelectorAll('.tag-filter').forEach((btn, idx) => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.filters-sidebar .tag-filter')[idx].click();
      btn.classList.toggle('active');
    });
  });
}

function closeFilterDrawer() {
  filterDrawer.classList.remove('active');
  filterOverlay.classList.remove('active');
  document.body.style.overflow = '';
}

function applyFilters() {
  filteredJobs = jobsData.filter(job => {
    const matchesSearch = !activeFilters.search || 
      job.title.toLowerCase().includes(activeFilters.search.toLowerCase()) ||
      job.company.toLowerCase().includes(activeFilters.search.toLowerCase()) ||
      job.tags.some(tag => tag.toLowerCase().includes(activeFilters.search.toLowerCase()));
    
    const matchesType = activeFilters.jobTypes.length === 0 || activeFilters.jobTypes.includes(job.type);
    const matchesExp = activeFilters.experience.length === 0 || activeFilters.experience.includes(job.experience);
    const matchesRemote = activeFilters.remote.length === 0 || activeFilters.remote.includes(job.remote);
    const matchesTech = activeFilters.tech.length === 0 || activeFilters.tech.some(tech => job.tags.includes(tech));
    
    return matchesSearch && matchesType && matchesExp && matchesRemote && matchesTech;
  });
  
  applySort();
}

// Search
function initSearch() {
  searchBtn.addEventListener('click', () => {
    activeFilters.search = searchInput.value.trim();
    applyFilters();
    document.getElementById('jobs').scrollIntoView({ behavior: 'smooth' });
  });
  
  searchInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
      activeFilters.search = searchInput.value.trim();
      applyFilters();
      document.getElementById('jobs').scrollIntoView({ behavior: 'smooth' });
    }
  });
}

// Sort
function initSort() {
  sortSelect.addEventListener('change', (e) => {
    currentSort = e.target.value;
    applySort();
  });
}

function applySort() {
  let sorted = [...filteredJobs];
  
  switch (currentSort) {
    case 'newest':
      sorted.sort((a, b) => a.postedDays - b.postedDays);
      break;
    case 'salary':
      sorted.sort((a, b) => b.salaryMax - a.salaryMax);
      break;
    case 'company':
      sorted.sort((a, b) => a.company.localeCompare(b.company));
      break;
  }
  
  renderJobs(sorted);
  initIntersectionObserver();
}

// Mobile Menu
function initMobileMenu() {
  mobileMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.add('active');
    mobileMenuOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  });
  
  closeMenuBtn.addEventListener('click', closeMobileMenu);
  mobileMenuOverlay.addEventListener('click', closeMobileMenu);
  
  document.querySelectorAll('.mobile-nav a').forEach(link => {
    link.addEventListener('click', closeMobileMenu);
  });
}

function closeMobileMenu() {
  mobileMenu.classList.remove('active');
  mobileMenuOverlay.classList.remove('active');
  document.body.style.overflow = '';
}

// Save Jobs
function toggleSave(jobId, event) {
  event.stopPropagation();
  const index = savedJobs.indexOf(jobId);
  
  if (index > -1) {
    savedJobs.splice(index, 1);
  } else {
    savedJobs.push(jobId);
  }
  
  localStorage.setItem('savedJobs', JSON.stringify(savedJobs));
  updateSavedCount();
  
  // Update UI
  const btn = event.currentTarget;
  btn.classList.toggle('saved');
  btn.textContent = savedJobs.includes(jobId) ? '♥' : '♡';
}

function updateSavedCount() {
  const count = savedJobs.length;
  const mobileCount = document.getElementById('saved-count-mobile');
  if (mobileCount) mobileCount.textContent = `(${count})`;
}

// Modal
function initModal() {
  closeModalBtn.addEventListener('click', closeJobModal);
  jobModal.addEventListener('click', (e) => {
    if (e.target === jobModal) closeJobModal();
  });
  
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && jobModal.classList.contains('active')) {
      closeJobModal();
    }
  });
}

function openJobModal(jobId) {
  const job = jobsData.find(j => j.id === jobId);
  if (!job) return;
  
  document.getElementById('modal-header-content').innerHTML = `
    <div style="display: flex; gap: 1.5rem; align-items: center; margin-bottom: 1rem;">
      <div class="company-logo" style="width: 64px; height: 64px; font-size: 1.5rem;">${job.logo}</div>
      <div>
        <h2 style="font-size: 1.75rem; margin-bottom: 0.25rem;">${job.title}</h2>
        <p style="color: var(--text-secondary); font-size: 1.125rem;">${job.company}</p>
      </div>
    <div class="job-details">
      <div class="job-detail-item">
        📍 <span>${job.location}</span>
      </div>
      <div class="job-detail-item">
        💰 <span>$${(job.salaryMin / 1000).toFixed(0)}K - $${(job.salaryMax / 1000).toFixed(0)}K</span>
      </div>
      <div class="job-detail-item">
        💼 <span>${job.type}</span>
      </div>
      <div class="job-detail-item">
        🏠 <span>${job.remote}</span>
      </div>
    </div>
  `;
  
  document.getElementById('modal-body').innerHTML = `
    <div style="margin-bottom: 2rem;">
      <h3 style="margin-bottom: 1rem; font-size: 1.25rem;">About the Role</h3>
      <p style="color: var(--text-secondary); line-height: 1.8;">${job.description}</p>
    </div>
    
    <div style="margin-bottom: 2rem;">
      <h3 style="margin-bottom: 1rem; font-size: 1.25rem;">Responsibilities</h3>
      <ul style="list-style: none; padding: 0;">
        ${job.responsibilities.map(r => `
          <li style="padding: 0.75rem 0; border-bottom: 1px solid var(--border); display: flex; gap: 0.75rem;">
            <span style="color: var(--secondary);">✓</span>
            <span style="color: var(--text-secondary);">${r}</span>
          </li>
        `).join('')}
      </ul>
    </div>
    
    <div style="margin-bottom: 2rem;">
      <h3 style="margin-bottom: 1rem; font-size: 1.25rem;">Tech Stack</h3>
      <div class="job-tags">
        ${job.tags.map(tag => `<span class="job-tag">${tag}</span>`).join('')}
      </div>
    </div>
    
    <div>
      <h3 style="margin-bottom: 1rem; font-size: 1.25rem;">Similar Jobs</h3>
      <div style="display: flex; flex-direction: column; gap: 1rem;">
        ${jobsData.filter(j => j.id !== jobId && j.tags.some(t => job.tags.includes(t))).slice(0, 3).map(similar => `
          <div style="padding: 1rem; border: 1px solid var(--border); border-radius: var(--radius-sm); cursor: pointer;" onclick="closeJobModal(); setTimeout(() => openJobModal(${similar.id}), 300);">
            <h4 style="margin-bottom: 0.25rem;">${similar.title}</h4>
            <p style="color: var(--text-secondary); font-size: 0.875rem;">${similar.company} • $${(similar.salaryMin / 1000).toFixed(0)}K - $${(similar.salaryMax / 1000).toFixed(0)}K</p>
          </div>
        `).join('')}
      </div>
    </div>
  `;
  
  document.getElementById('modal-apply-btn').href = job.applyUrl;
  
  const modalSaveBtn = document.getElementById('modal-save-btn');
  modalSaveBtn.textContent = savedJobs.includes(jobId) ? '♥ Saved' : '♡ Save';
  modalSaveBtn.onclick = (e) => {
    e.stopPropagation();
    toggleSave(jobId, e);
    modalSaveBtn.textContent = savedJobs.includes(jobId) ? '♥ Saved' : '♡ Save';
  };
  
  jobModal.classList.add('active');
  document.body.style.overflow = 'hidden';
  
  // Sticky apply on mobile
  if (window.innerWidth <= 768) {
    document.getElementById('sticky-apply').classList.add('active');
    document.getElementById('sticky-apply').querySelector('a').href = job.applyUrl;
  }
}

function closeJobModal() {
  jobModal.classList.remove('active');
  document.body.style.overflow = '';
  document.getElementById('sticky-apply').classList.remove('active');
}

// Newsletter
function initNewsletter() {
  document.getElementById('newsletter-form').addEventListener('submit', (e) => {
    e.preventDefault();
    const email = document.getElementById('newsletter-email').value;
    alert(`Thanks for subscribing! We'll send Austin tech jobs to ${email}`);
    document.getElementById('newsletter-email').value = '';
  });
}

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    const href = this.getAttribute('href');
    if (href !== '#' && href.length > 1) {
      e.preventDefault();
      const target = document.querySelector(href);
      if (target) {
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }
  });
});
</script>
<script>(function(){document.addEventListener("click",function(e){var a=e.target.closest("[data-product-id]");if(!a)return;e.preventDefault();var pid=a.getAttribute("data-product-id");if(pid)parent.postMessage({type:"ecto-artifact-link-click",productId:pid},"*")})})();</script>
</body>
</html>