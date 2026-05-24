
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chicago.dev – The 89 Club</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tailwind CDN for quick prototyping --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <meta name="description" content="Chicago.dev – a tiny, opinionated dev hub for Chicago. The 89 Club, jobs, profiles, and more.">
</head>
<body class="bg-slate-950 text-slate-100 antialiased">

    {{-- Site wrapper --}}
    <div class="min-h-screen flex flex-col">

        {{-- Header / Nav --}}
        <header class="border-b border-slate-800 bg-slate-950/80 backdrop-blur">
            <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-red-600/10 border border-red-600/40 text-red-400 font-bold text-lg">
                        C
                    </span>
                    <div class="leading-tight">
                        <div class="font-semibold tracking-tight">Chicago.dev</div>
                        <div class="text-xs text-slate-400">A tiny dev hub for a big city</div>
                    </div>
                </div>

                <nav class="hidden md:flex items-center gap-6 text-sm text-slate-300">
                    <a href="#club" class="hover:text-red-400">The 89 Club</a>
                    <a href="#pages" class="hover:text-red-400">Dev Pages</a>
                    <a href="#email" class="hover:text-red-400">Email</a>
                    <a href="#jobs" class="hover:text-red-400">Jobs</a>
                    <a href="#faq" class="hover:text-red-400">FAQ</a>
                </nav>
            </div>
        </header>

        {{-- Main --}}
        <main class="flex-1">
            {{-- Hero --}}
            <section class="border-b border-slate-800 bg-gradient-to-b from-slate-950 to-slate-900">
                <div class="max-w-5xl mx-auto px-4 py-16 md:py-20 grid md:grid-cols-2 gap-10 items-center">
                    <div>
                        <p class="inline-flex items-center gap-2 text-xs font-mono uppercase tracking-[0.2em] text-red-400 mb-3">
                            <span class="h-[1px] w-6 bg-red-500"></span>
                            For Chicago developers
                        </p>
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-semibold tracking-tight mb-4">
                            An opinionated dev hub for <span class="text-red-400">Chicago</span>.
                        </h1>
                        <p class="text-slate-300 text-sm md:text-base mb-6">
                            Profiles, jobs, email handles, and a weirdly specific membership:
                            <span class="font-semibold text-slate-100">The 89 Club</span> — limited to 89 Chicago devs,
                            priced at <span class="font-mono text-red-300">$19.85</span> in honor of the ’85 Bears.
                        </p>

                        <div class="flex flex-wrap gap-3 mb-6">
                            <a href="#club" class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-red-500 text-sm font-medium hover:bg-red-400 transition">
                                Join the 89 Club
                            </a>
                            <a href="#pages" class="inline-flex items-center justify-center px-4 py-2 rounded-md border border-slate-700 text-sm font-medium text-slate-200 hover:border-slate-500 transition">
                                View dev page options
                            </a>
                        </div>

                        <div class="flex flex-wrap gap-4 text-xs text-slate-400">
                            <div class="flex items-center gap-2">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-400"></span>
                                No logins, no bloat, just static pages.
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="h-1.5 w-1.5 rounded-full bg-red-400"></span>
                                Built by a single dev, not a VC fund.
                            </div>
                        </div>
                    </div>

                    {{-- Hero preview card --}}
                    <div class="md:justify-self-end">
                        <div class="bg-slate-900/70 border border-slate-700 rounded-xl p-5 shadow-xl shadow-black/40">
                            <div class="flex items-center justify-between mb-4">
                                <div class="text-xs font-mono text-slate-400">
                                    rob.chicago.dev
                                </div>
                                <span class="inline-flex items-center gap-1 text-[10px] px-2 py-1 rounded-full bg-red-500/10 text-red-300 border border-red-500/40">
                                    <span class="h-1.5 w-1.5 rounded-full bg-red-400"></span>
                                    89 Club
                                </span>
                            </div>
                            <div class="flex items-center gap-4 mb-4">
                                <div class="h-12 w-12 rounded-full bg-slate-800 flex items-center justify-center text-lg">
                                    👾
                                </div>
                                <div>
                                    <div class="font-semibold text-sm">Rob – Chicago.dev member</div>
                                    <div class="text-xs text-slate-400">Full‑stack dev • Job boards • Weird domain ideas</div>
                                </div>
                            </div>
                            <div class="text-xs text-slate-300 mb-4">
                                Building small, profitable, Chicago‑flavored internet things. Available for remote work,
                                async collaboration, and extremely specific jokes about Ditka.
                            </div>
                            <div class="flex flex-wrap gap-2 text-[11px]">
                                <span class="px-2 py-1 rounded-md bg-slate-800 text-slate-200">Laravel</span>
                                <span class="px-2 py-1 rounded-md bg-slate-800 text-slate-200">Tailwind</span>
                                <span class="px-2 py-1 rounded-md bg-slate-800 text-slate-200">Job boards</span>
                                <span class="px-2 py-1 rounded-md bg-slate-800 text-slate-200">Remote‑only</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 89 Club section --}}
            <section id="club" class="border-b border-slate-800 bg-slate-950">
                <div class="max-w-5xl mx-auto px-4 py-12 md:py-16">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-8">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-semibold tracking-tight mb-2">
                                The 89 Club – limited to 89 Chicago devs.
                            </h2>
                            <p class="text-sm text-slate-300 max-w-xl">
                                A tiny, invite‑your‑friends‑only layer on top of Chicago.dev. You get a
                                <span class="font-semibold">yourname.chicago.dev</span> page, a “Founding 89” badge,
                                and a permanent spot on the <span class="font-mono text-slate-100">/89</span> wall.
                            </p>
                        </div>
                        <div class="text-right">
                            <div class="text-xs uppercase tracking-[0.2em] text-slate-400 mb-1">Price</div>
                            <div class="text-3xl font-semibold text-red-400">$19.85</div>
                            <div class="text-xs text-slate-500">per year • in honor of the ’85 Bears</div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-6">
                        {{-- Card: What you get --}}
                        <div class="bg-slate-900/70 border border-slate-800 rounded-xl p-5">
                            <h3 class="text-sm font-semibold mb-3">What you get</h3>
                            <ul class="space-y-2 text-sm text-slate-300">
                                <li>• <span class="font-mono text-slate-100">yourname.chicago.dev</span> profile</li>
                                <li>• “Founding 89” badge on your page</li>
                                <li>• Listed on <span class="font-mono text-slate-100">chicago.dev/89</span></li>
                                <li>• Links to GitHub, LinkedIn, portfolio</li>
                                <li>• Optional “Hire me” toggle</li>
                            </ul>
                        </div>

                        {{-- Card: Optional add‑ons --}}
                        <div class="bg-slate-900/70 border border-slate-800 rounded-xl p-5">
                            <h3 class="text-sm font-semibold mb-3">Optional add‑ons</h3>
                            <ul class="space-y-2 text-sm text-slate-300">
                                <li>• <span class="font-mono text-slate-100">email@chicago.dev</span> (+$29/yr)</li>
                                <li>• Redirect <span class="font-mono text-slate-100">yourname.chicago.dev</span> to your own site</li>
                                <li>• Company page on <span class="font-mono text-slate-100">company.chicago.dev</span></li>
                                <li>• Featured slot in the Chicago.dev newsletter</li>
                            </ul>
                        </div>

                        {{-- Card: Scarcity / vibe --}}
                        <div class="bg-slate-900/70 border border-slate-800 rounded-xl p-5">
                            <h3 class="text-sm font-semibold mb-3">Why only 89?</h3>
                            <p class="text-sm text-slate-300 mb-3">
                                Because not everything on the internet needs to scale to infinity. 89 is a joke,
                                a constraint, and a filter. If you get it, you get it.
                            </p>
                            <div class="text-xs text-slate-400">
                                Once 89 slots are taken, the club closes. No “waitlist,” no fake scarcity.
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-wrap items-center justify-between gap-4">
                        <button class="inline-flex items-center justify-center px-4 py-2 rounded-md bg-red-500 text-sm font-medium hover:bg-red-400 transition">
                            Reserve a spot in the 89 Club
                        </button>
                        <div class="text-xs text-slate-500">
                            You’ll see a simple checkout. No upsells, no dark patterns, no subscriptions you can’t cancel.
                        </div>
                    </div>
                </div>
            </section>

            {{-- Dev pages section --}}
            <section id="pages" class="border-b border-slate-800 bg-slate-950/90">
                <div class="max-w-5xl mx-auto px-4 py-12 md:py-16">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-8">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-semibold tracking-tight mb-2">
                                Dev pages on Chicago.dev
                            </h2>
                            <p class="text-sm text-slate-300 max-w-xl">
                                Simple, static, 1‑page sites for Chicago developers and teams. No dashboard, no CMS,
                                just a clean page you can point people to.
                            </p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-6">
                        {{-- Basic page --}}
                        <div class="bg-slate-900/70 border border-slate-800 rounded-xl p-5 flex flex-col">
                            <h3 class="text-sm font-semibold mb-1">Basic dev page</h3>
                            <div class="text-2xl font-semibold mb-1">$19<span class="text-base text-slate-400">/year</span></div>
                            <div class="text-xs text-slate-500 mb-4">For individual devs</div>
                            <ul class="space-y-2 text-sm text-slate-300 mb-4 flex-1">
                                <li>• <span class="font-mono text-slate-100">yourname.chicago.dev</span></li>
                                <li>• Bio, skills, links, projects</li>
                                <li>• Optional “Hire me” badge</li>
                            </ul>
                            <button class="mt-auto inline-flex items-center justify-center px-3 py-2 rounded-md bg-slate-800 text-xs font-medium hover:bg-slate-700 transition">
                                Preview layout
                            </button>
                        </div>

                        {{-- Page + email --}}
                        <div class="bg-slate-900 border border-red-500/60 rounded-xl p-5 flex flex-col relative overflow-hidden">
                            <span class="absolute top-2 right-2 text-[10px] px-2 py-1 rounded-full bg-red-500/10 text-red-300 border border-red-500/40">
                                Most popular
                            </span>
                            <h3 class="text-sm font-semibold mb-1">Page + email</h3>
                            <div class="text-2xl font-semibold mb-1">$49<span class="text-base text-slate-400">/year</span></div>
                            <div class="text-xs text-slate-500 mb-4">For devs who want a clean identity</div>
                            <ul class="space-y-2 text-sm text-slate-300 mb-4 flex-1">
                                <li>• Everything in Basic</li>
                                <li>• <span class="font-mono text-slate-100">email@chicago.dev</span></li>
                                <li>• Email forwarding to your inbox</li>
                                <li>• Optional redirect for your page</li>
                            </ul>
                            <button class="mt-auto inline-flex items-center justify-center px-3 py-2 rounded-md bg-red-500 text-xs font-medium hover:bg-red-400 transition">
                                See example profile
                            </button>
                        </div>

                        {{-- Company page --}}
                        <div class="bg-slate-900/70 border border-slate-800 rounded-xl p-5 flex flex-col">
                            <h3 class="text-sm font-semibold mb-1">Company / team page</h3>
                            <div class="text-2xl font-semibold mb-1">$99<span class="text-base text-slate-400">/year</span></div>
                            <div class="text-xs text-slate-500 mb-4">For Chicago‑based teams</div>
                            <ul class="space-y-2 text-sm text-slate-300 mb-4 flex-1">
                                <li>• <span class="font-mono text-slate-100">company.chicago.dev</span></li>
                                <li>• Team, stack, values, hiring status</li>
                                <li>• Integration with <span class="font-mono text-slate-100">jobs.chicago.dev</span></li>
                            </ul>
                            <button class="mt-auto inline-flex items-center justify-center px-3 py-2 rounded-md bg-slate-800 text-xs font-medium hover:bg-slate-700 transition">
                                View company layout
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Email section --}}
            <section id="email" class="border-b border-slate-800 bg-slate-950">
                <div class="max-w-5xl mx-auto px-4 py-12 md:py-16">
                    <div class="grid md:grid-cols-2 gap-10 items-start">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-semibold tracking-tight mb-2">
                                email@chicago.dev
                            </h2>
                            <p class="text-sm text-slate-300 mb-4">
                                A clean, city‑flavored email identity for devs, designers, and teams who actually like
                                living and working in Chicago.
                            </p>
                            <ul class="space-y-2 text-sm text-slate-300 mb-4">
                                <li>• <span class="font-mono text-slate-100">name@chicago.dev</span> → forwards to your real inbox</li>
                                <li>• Works with your dev page or standalone</li>
                                <li>• Great for resumes, portfolios, and conference badges</li>
                            </ul>
                            <div class="text-sm text-slate-400">
                                Pricing: starts at <span class="font-mono text-slate-100">$29/year</span> for individuals,
                                <span class="font-mono text-slate-100">$99/year</span> for teams.
                            </div>
                        </div>

                        <div class="bg-slate-900/70 border border-slate-800 rounded-xl p-5 text-xs font-mono text-slate-200">
                            <div class="mb-2 text-slate-400">Example usage:</div>
<pre class="whitespace-pre-wrap">
name:        "Rob"
email:       "rob@chicago.dev"
page:        "rob.chicago.dev"
redirects:   "rob.chicago.dev → rob.dev or GitHub"
use cases:   • resumes
             • conference badges
             • GitHub profile
             • LinkedIn contact
</pre>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Jobs section --}}
            <section id="jobs" class="border-b border-slate-800 bg-slate-950/90">
                <div class="max-w-5xl mx-auto px-4 py-12 md:py-16">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-8">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-semibold tracking-tight mb-2">
                                Jobs.Chicago.dev – small, focused, not Indeed.
                            </h2>
                            <p class="text-sm text-slate-300 max-w-xl">
                                A tiny job board focused on Chicago tech roles. No scraped garbage, no expired listings,
                                no “we’re totally remote but actually PST only” nonsense.
                            </p>
                        </div>
                        <div class="text-right text-sm text-slate-400">
                            <div class="font-mono text-slate-100">$29–$49</div>
                            <div>per listing • 5–10 posts/month cap per company</div>
                        </div>
                    </div>

                    <div class="bg-slate-900/70 border border-slate-800 rounded-xl p-5 text-sm text-slate-200">
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-xs uppercase tracking-[0.2em] text-slate-400">Sample listing</div>
                            <span class="text-[10px] px-2 py-1 rounded-full bg-green-500/10 text-green-300 border border-green-500/40">
                                Hiring
                            </span>
                        </div>
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-2">
                            <div>
                                <div class="font-semibold">Senior Laravel Developer</div>
                                <div class="text-xs text-slate-400">Local fintech • Hybrid in Chicago • $130k–$150k</div>
                            </div>
                            <button class="inline-flex items-center justify-center px-3 py-1.5 rounded-md bg-slate-800 text-xs font-medium hover:bg-slate-700 transition">
                                View job layout
                            </button>
                        </div>
                        <div class="text-xs text-slate-400">
                            Jobs are manually reviewed. No spam, no crypto casinos, no “exposure” internships.
                        </div>
                    </div>
                </div>
            </section>

            {{-- FAQ / Footer info --}}
            <section id="faq" class="bg-slate-950">
                <div class="max-w-5xl mx-auto px-4 py-12 md:py-16">
                    <h2 class="text-xl md:text-2xl font-semibold tracking-tight mb-4">
                        Quick questions
                    </h2>
                    <div class="grid md:grid-cols-2 gap-8 text-sm text-slate-300">
                        <div>
                            <h3 class="font-semibold mb-2">Is this official?</h3>
                            <p class="mb-4">
                                No. Chicago.dev is not affiliated with the city, the Bears, or any official body.
                                It’s a small, independent project for people who build things and happen to live in Chicago.
                            </p>

                            <h3 class="font-semibold mb-2">Who is this for?</h3>
                            <p>
                                Developers, designers, indie hackers, small teams, and weirdos who like the idea of
                                having a tiny, opinionated corner of the internet that says “I’m in Chicago and I build stuff.”
                            </p>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-2">Can I cancel?</h3>
                            <p class="mb-4">
                                Yes. Everything is yearly, no dark patterns. If you don’t renew, your page and email
                                quietly go offline after a grace period.
                            </p>

                            <h3 class="font-semibold mb-2">Will this get huge?</h3>
                            <p>
                                Probably not. That’s the point. This is meant to be small, sustainable, and human‑sized.
                                If you want a giant platform, there are already plenty of those.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        {{-- Footer --}}
        <footer class="border-t border-slate-800 bg-slate-950">
            <div class="max-w-5xl mx-auto px-4 py-6 flex flex-col md:flex-row items-center justify-between gap-3 text-xs text-slate-500">
                <div>
                    Chicago.dev – a small, independent project for Chicago’s dev scene.
                </div>
                <div class="flex flex-wrap gap-4">
                    <span>v0.1 – prototype layout</span>
                    <span>Made by a tired human who prefers small, weird internet things.</span>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>
