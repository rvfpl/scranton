
<!DOCTYPE html>
<html lang="en-US">
<head id="head">
  <meta charset="utf-8">
  <title id="title">Community ⚡ Zig Programming Language</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <style>
    /* Basic Layout Styling */
    body { font-family: sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 20px; background: #121212;   }
    .container { max-width: 800px; margin: 0 auto; }
    h1, h2 { color: #f7a41d; } /* Zig-themed orange */
    a { color: #f7a41d; text-decoration: none; }
    a:hover { text-decoration: underline; }
    
    /* Navbar styling */
    .nav { background: #eee; padding: 10px; border-radius: 5px; margin-bottom: 20px; }
    .navbar-item { margin-right: 15px; font-weight: bold; }
    
    /* Content spacing */
    #content { margin-top: 20px; }
    ul { margin-bottom: 20px; }
    li { margin-bottom: 5px; }
  </style>

  <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('css/navigation.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
  <body>
    <div class="container">
      <a href="/"><span id="header-image"></span></a>
    </div>
    <nav id="mobile-navbar" class="nav container">
      <span style="overflow:hidden; max-width: 80%; display: inline-block; vertical-align:bottom;">Community
      </span>
      <label for="mobile-toggle" id="hamburger">
        <svg style="width:2em;height:2em;" viewBox="0 0 24 24">
          <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z"/>
        </svg>
      </label>
    </nav>
    <div id="mobile-subnav">
      <input type="checkbox" name="mobile-toggle" id="mobile-toggle">
      <div class="" id="menu">
        
          <a class="navbar-item" href="/download/">Download</a>
        
        
          <a class="navbar-item" href="/learn/">Learn</a>
        
        
          <a class="navbar-item" href="/news/">News</a>
        
        <a href="https://codeberg.org/ziglang/zig" class="navbar-item external-link external-link-light">Source</a>
        <a href="/community" class="navbar-item">Join a Community</a>
        
          <a class="navbar-item" href="/zsf/">ZSF</a>
        
        
          <a class="navbar-item" href="/devlog/2026/">Devlog</a>
        
      </div>
    </div>
    <nav id="navbar" class="nav">
      <div class="container" style="display:flex; justify-content: space-between;">
        <div>
          
            <a class="navbar-item" href="/download/">Download</a>
          
          
            <a class="navbar-item" href="/learn/">Learn</a>
          
          
            <a class="navbar-item" href="/news/">News</a>
          
          
            <a class="navbar-item" href="/zsf/">Zig Software Foundation</a>
          
          
            <a class="navbar-item" href="/devlog/2026/">Devlog</a>
          
          <a href="https://codeberg.org/ziglang/zig" class="navbar-item external-link external-link-light">Source</a>
          <a href="/community" class="navbar-item">Join a Community</a>
        </div>
      </div>
    </nav>
    <div id="content" role="main">
      
  <div class="container">
    
      <a id="back" href="/">
        ← Back to
        <b>Home</b>
      </a>
    
    <h1 class="title">Community</h1>
    
    <p>The Zig community is decentralized. Anyone is free to start and maintain their own space for the community to gather and submit a pull request to edit this page to add a link.</p><p>There is no concept of “official” or “unofficial”, however, each gathering place has its own moderators and rules.</p><p>When adding a new community, please append it at the end of the existing list as a form of courtesy.</p><p>See the Compiler Development section (near the end of this page) for communities dedicated to Zig compiler development collaboration.</p><p>Due to time constraints, the Zig Core Team reserves the right to arbitrarily curate this page based on opaque, subjective opinions, as well as to neglect to curate this page for long periods of time.</p><h1>General discussion</h1><h2>IRC</h2><ul><li><code>#zig</code> on irc.libera.chat<ul><li>Moderators:<ul><li><a href="https://andrewkelley.me/" target="_blank">Andrew Kelley</a></li><li><a href="https://isaacfreund.com/" target="_blank">Isaac Freund</a></li></ul></li><li><a href="/code-of-conduct/">Code of Conduct</a></li></ul></li></ul><h2>Discord (English)</h2><ul><li><a href="https://discord.gg/zig" target="_blank">Zig Programming Language Discord</a><ul><li>Moderators: <a href="https://github.com/MasterQ32" target="_blank">Felix Queißner</a>, <a href="https://github.com/InKryption" target="_blank">InKryption</a>, <a href="https://github.com/kristoff-it" target="_blank">Loris Cro</a>, <a href="https://github.com/sin-ack" target="_blank">Agni</a>, <a href="https://github.com/leecannon" target="_blank">Lee Cannon</a>, <a href="https://github.com/Snektron" target="_blank">Robin Voetter</a>, <a href="https://github.com/mattnite" target="_blank">Matt Knight</a></li><li>Rules:<ul><li>See #info upon joining</li><li>Follow <a href="https://discord.com/guidelines" target="_blank">Discord’s Community Guidelines</a></li></ul></li></ul></li><li><a href="https://discord.gg/bbVRwX4KEf" target="_blank">Zig Embedded Group</a><ul><li>Moderators: <a href="https://github.com/mattnite" target="_blank">mattnite</a>, <a href="https://github.com/MasterQ32" target="_blank">MasterQ32</a></li><li>Rules:<ul><li>Be kind and respectful,</li><li>Follow <a href="https://discord.com/guidelines" target="_blank">Discord’s Community Guidelines</a></li></ul></li></ul></li><li><a href="https://discord.gg/yEBzfgHrNF" target="_blank">cod1r’s Zig discord</a><ul><li>Moderators: <a href="https://github.com/cod1r" target="_blank">cod1r</a>, <a href="https://github.com/haze" target="_blank">haze</a></li><li>Rules:<ul><li>Be kind and respectful</li><li>Follow <a href="https://discord.com/guidelines" target="_blank">Discord’s Community Guidelines</a></li></ul></li></ul></li></ul><h2>Discord (International)</h2><ul><li><p><a href="https://discord.gg/brNYwrtncu" target="_blank">Zig-JP(Japanese)</a></p><ul><li>Moderators: <a href="https://github.com/aiotter" target="_blank">aiotter</a></li><li>Rules: follows <a href="https://discord.gg/gxsFFjE" target="_blank">Zig Programming Language Discord</a>’s rule</li></ul></li><li><p><a href="https://discord.zig-kr.org" target="_blank">Zig-KR(Korean)</a></p><ul><li>Moderators: <a href="https://github.com/Pribess" target="_blank">Pribess</a></li><li>Rules: follows <a href="https://discord.gg/gxsFFjE" target="_blank">Zig Programming Language Discord</a>’s rule</li></ul></li><li><p><a href="https://discord.com/invite/BguRbZrP" target="_blank">Zig-AR(عربي)</a></p><ul><li>Moderators: <a href="https://github.com/hajsf" target="_blank">Hasan Yousef</a></li><li>Rules: follows <a href="https://discord.gg/gxsFFjE" target="_blank">Zig Programming Language Discord</a>’s rule</li></ul></li><li><p><a href="https://discord.ziglang.org.cn" target="_blank">Zig-CN(汉语)</a></p><ul><li>Moderators: <a href="https://github.com/liuchong" target="_blank">liuchong</a></li><li>Rules: follows <a href="https://discord.gg/gxsFFjE" target="_blank">Zig Programming Language Discord</a>’s rule</li></ul></li><li><p><a href="https://discord.gg/G8HgRJaqbB" target="_blank">Zig-DE(German)</a></p><ul><li>Moderators: <a href="https://github.com/shadowdara" target="_blank">Shadowdara</a></li><li>Rules: follows <a href="https://discord.gg/gxsFFjE" target="_blank">Zig Programming Language Discord</a>’s rule</li></ul></li></ul><h2>Tencent QQ</h2><ul><li><a href="https://qm.qq.com/cgi-bin/qm/qr?k=Grsz9EpZRobM3P_K9Ch5e59N6xXQFYUB&authKey=DBD1qC54GFzwHo1B5aK/Ola6sgoQdxHBZWc5gHfhZ0LU6nEf/0d6cr6rnTpaOSrt&noverify=0" target="_blank">Expert Zig(Chinese)</a>: 930564004</li></ul><h2>Telegram</h2><ul><li><a href="https://t.me/+TuqWR0w6W5o1MDAx" target="_blank">Zig Telegram (Español)</a><ul><li>Owner: <a href="https://github.com/SamuelBonilla" target="_blank">Samuel Bonilla</a></li></ul></li><li><a href="https://t.me/ZigChinese" target="_blank">Zig 中文社区 (Chinese)</a><ul><li>Owner: <a href="https://github.com/lemonhx" target="_blank">LemonHX</a></li></ul></li><li><a href="https://t.me/ziglang_ru" target="_blank">Zig Telegram (Russian-speaking)</a><ul><li>Admin: <a href="https://github.com/BratishkaErik" target="_blank">BratishkaErik</a></li></ul></li><li><a href="https://t.me/ziglang_br" target="_blank">Zig Telegram (Portuguese)</a><ul><li>Owner: <a href="https://github.com/kassane" target="_blank">Matheus C. França</a></li></ul></li><li><a href="https://t.me/zig_fa" target="_blank">Zig Telegram (Persian)</a><ul><li>Owner: <a href="https://github.com/devraymondsh" target="_blank">Mahdi Sharifi</a></li></ul></li><li><a href="https://t.me/ziglang_uz" target="_blank">Zig Telegram (Uzbek)</a><ul><li>Owner: <a href="https://github.com/katsuki-yuri" target="_blank">yuri</a></li></ul></li><li><a href="https://t.me/zig_Arabic" target="_blank">Zig Telegram (عربي)</a><ul><li>Owner: <a href="https://github.com/hajsf" target="_blank">Hasan Yousef</a></li></ul></li><li><a href="https://t.me/ziglang_it" target="_blank">Zig Telegram (Italian)</a><ul><li>Owner: <a href="https://github.com/kristoff-it" target="_blank">kristoff</a></li></ul></li><li><a href="https://t.me/zigindia" target="_blank">Zig India</a><ul><li>Owner: <a href="https://t.me/tushar_lol" target="_blank">Tushar Sadhwani</a></li></ul></li><li><a href="https://t.me/addstickers/Ziglang" target="_blank">Zig Lang Stickers</a></li><li><a href="https://t.me/zigindonesia" target="_blank">Zig Language Indonesia (Indonesian)</a><ul><li>Owner: <a href="https://t.me/hadihammurabi" target="_blank">Hadi Hidayat (Robi) Hammurabi</a></li></ul></li><li><a href="https://t.me/ziglang_il" target="_blank">Zig Telegram (Hebrew)</a><ul><li>Owner: <a href="https://github.com/tal2" target="_blank">Tal Z</a></li></ul></li></ul><h2>Matrix / Element</h2><ul><li><a href="https://matrix.to/#/#zig:tchncs.de" target="_blank">#zig:tchncs.de</a><ul><li>Moderators: <a href="https://gracefulliberty.com" target="_blank">Anna Liberty</a>, <a href="https://github.com/tauoverpi" target="_blank">Simon A. Nielsen Knights</a></li><li>Rules: Same as IRC</li></ul></li><li><a href="https://matrix.to/#/#bayareazig:matrix.org" target="_blank">#bayareazig:matrix.org</a><ul><li>Moderators: <a href="https://github.com/softinio" target="_blank">Salar Rahmanian</a></li><li>Rules: Same as IRC</li></ul></li></ul><h2>Zulip</h2><ul><li><a href="https://zig-lang.zulipchat.com/join/fbhff4nwoyop6j5fpbu3yqfx/" target="_blank">zig-lang</a><ul><li>Admin: Aria Elfren (Zulip username)</li><li>Rules: Same as IRC (for now)</li></ul></li></ul><h2>Stoat</h2><ul><li><a href="https://old.stoat.chat/invite/zM0bnVNJ" target="_blank">Zig Programming Language</a><ul><li>Moderators: <a href="https://github.com/alichraghi" target="_blank">Ali Cheraghi</a></li></ul></li></ul><h2>Slack</h2><ul><li><a href="https://join.slack.com/t/ziglang/shared_invite/zt-2t5c84dtz-VLkkveTO_tcejLnliesHmg" target="_blank">ziglang.slack.com</a><ul><li>Moderator: <a href="mailto:longxianwen@outlook.com" target="_blank">Loong</a></li><li>Rules: Same as IRC</li></ul></li><li><a href="https://join.slack.com/t/zigprogramming/shared_invite/zt-1zqm0mmu9-66~IkF3Bnw5HjVOOEhWIag" target="_blank">Zig programming language</a><ul><li>Moderator: <a href="mailto:mail@anniiii.xyz" target="_blank">Annie Herrmann</a></li><li>Rules: Same as IRC</li></ul></li></ul><h2>WhatsApp</h2><ul><li><a href="https://chat.whatsapp.com/Cv6PA8uBoEB9BoxnDOpKQI" target="_blank">Zig Nigeria</a><ul><li>Moderator: <a href="mailto:adeoti.15.jude@gmail.com" target="_blank">Ayodeji Adeoti</a></li><li>Rules: Same as IRC</li></ul></li><li><a href="https://chat.whatsapp.com/El49FFSVtPfCZoRmd4Ag4q" target="_blank">Zig lang Israel</a><ul><li>Rules:<ul><li>Be kind.</li><li>Stay on topic.</li></ul></li></ul></li></ul><h2>Email List</h2><ul><li><a href="https://groups.google.com/g/zig-brasil" target="_blank">zig-brasil@googlegroups.com</a><ul><li>Moderator: <a href="https://github.com/kassane" target="_blank">Matheus C. França</a></li><li>Rules: Same as IRC</li></ul></li></ul><h2>Forums</h2><ul><li><p><a href="https://ziggit.dev" target="_blank">Ziggit</a></p><ul><li>Moderators:<ul><li><a href="https://github.com/jecolon" target="_blank">@jecolon</a></li><li><a href="https://github.com/zraineri" target="_blank">Zach Raineri</a></li><li><a href="https://github.com/andrewCodeDev" target="_blank">@andrewCodeDev</a></li></ul></li><li><a href="https://ziggit.dev/tos" target="_blank">Terms of Service</a></li><li><a href="https://ziggit.dev/faq" target="_blank">FAQ</a></li></ul></li><li><p><a href="https://github.com/zigcc/forum/discussions" target="_blank">Zig 中文社区论坛</a></p></li><li><p><a href="https://github.com/nektro/zigquestions" target="_blank">ZigQuestions</a></p></li></ul><h2>Merchandise</h2><ul><li><a href="https://teespring.com/stores/wilsons-store-12" target="_blank">Teespring Store run by @wilsonk</a><ul><li>Store above includes new Logos, Zero, Ziggy and Zigfast designs</li><li>OLD Designs (<a href="https://teespring.com/stores/wilsons-store-5" target="_blank">https://teespring.com/stores/wilsons-store-5</a>)</li><li>Profits support Zig (@andrewrk: I confirm this)</li></ul></li></ul><h2>MAX</h2><ul><li><a href="https://max.ru/join/22ertAE9dW5hIelAlVta988HPkLHYJrodNV_KXif0uk" target="_blank">Zig (Russian)</a><ul><li>Owner: <a href="https://github.com/nchistov" target="_blank">Nickolay Chistov</a></li></ul></li></ul><h2>X (formerly Twitter)</h2><ul><li><a href="https://x.com/i/communities/1830711127354851778" target="_blank">Zig Programming Language</a><ul><li>Moderator: <a href="https://x.com/jontec8" target="_blank">gdjohn4s</a></li><li>Rules: You can find them on Community Profile</li></ul></li></ul><h2>Reddit</h2><p>(This section written by Andrew Kelley)</p><p>I used to moderate the /r/zig subreddit. During the Reddit protests in June 2023, I decided to permanently shut down /r/zig, making it private, encouraging users to head to ziggit.dev instead.</p><p>A troll messaged Reddit admins and gained moderator access to /r/zig, re-opened the subreddit, and started doing juvenile vandalism for a few weeks, before deciding they had enough fun and abandoning the place.</p><p>Next, <a href="https://github.com/Aransentin" target="_blank">Jens Goldberg</a> messaged the Reddit admins and managed to become a moderator of /r/zig. He’s pretty hands-off, does not do a lot of moderation, lets the Reddit voting system handle disagreements.</p><p>While the subreddit was private, the vast majority of valuable people moved to other communities. Most of the people who remained were riff raff, willing to tolerate trolling and more interested in Reddit as a platform than Zig as a project.</p><p>Now, the Zig subreddit is a complete wasteland, and I personally advise against going there. In fact I have deleted my entire Reddit account.</p><p>I don’t have the time or energy to evaluate most Zig communities so I can neither endorse nor anti-endorse them, however, the Zig subreddit is an exception.</p><p>It’s an awful place and I stand by my decision to permanently close it. I am unhappy that it was reopened against my will.</p><h1>Streams</h1><h2>SHOWTIME</h2><p>The show where members of the Zig community share code and ideas.</p><p><a href="https://zig.show/" target="_blank">https://zig.show/</a></p><ul><li><a href="https://www.youtube.com/channel/UC2EQzAewrC10KCDFSS4j-zA" target="_blank">YouTube</a></li><li><a href="https://zig.show/newsletter" target="_blank">Newsletter</a></li><li><a href="https://zig.show/speak" target="_blank">Apply to Speak</a></li><li><a href="https://discord.gg/B73sGxF" target="_blank">Discord</a><br>The Zig SHOWTIME Discord server serves as a coordination tool for organizing the show, and as a place where people invested in the success of Zig can socialize and collaborate together on new projects. The main goal of this space is to create a community of creators (be it code, blogs, videos, or undefined), so that we can all make the most out of our Zig experience. Nobody is born knowing Zig so everyone is welcome to have fun in this server but, if you’re unsure whether Zig is the right language for you, it’s recommended you check out first other Zig communities as they might be more focused on helping newcomers to the language.</li></ul><h2>Individuals</h2><ul><li><a href="https://www.twitch.tv/andrewrok" target="_blank">Andrew Kelley</a> - Zig project development</li><li><a href="https://www.twitch.tv/kristoff_it" target="_blank">Loris Cro</a> - Showtime stuff, event-loop stuff, miscellaneous</li><li><a href="https://www.twitch.tv/fengb" target="_blank">Benjamin Feng</a> - GameBoy emulators, web assembly, allocators</li><li><a href="https://www.twitch.tv/nektro77" target="_blank">Meghan Denny</a> - Zigmod package manager, web servers, and more</li><li><a href="https://www.twitch.tv/komarispaghetti" target="_blank">KomariSpaghetti</a></li><li><a href="https://www.twitch.tv/daurnimator" target="_blank">daurnimator</a></li><li><a href="https://www.twitch.tv/danbokser" target="_blank">Dan B</a> - Custom OS in Zig and apps for it</li><li><a href="https://www.twitch.tv/spex_guy" target="_blank">Spex_Guy</a></li><li><a href="https://www.twitch.tv/dr_deano" target="_blank">Dr_Deano</a> - Custom Kernel in Zig</li><li><a href="https://www.twitch.tv/ifreund_" target="_blank">Isaac Freund</a> - River, a Wayland compositor in Zig</li><li><a href="https://www.twitch.tv/SuperAuguste" target="_blank">Auguste Rame</a> - Zig + Java stuff (JNI, JVM impl in Zig), random Zig projects, Zig meme making, and more - <a href="https://www.youtube.com/channel/UC8JUunJCTUo0icqJzUfbT2A" target="_blank">Archived Videos</a>, <a href="https://www.youtube.com/watch?v=6Zw6llGGRwA" target="_blank">Recommended Video</a></li><li><a href="https://www.twitch.tv/sphaerophoria" target="_blank">sphaerophoria</a> - Various projects in Zig and Rust - <a href="https://www.youtube.com/@sphaerophoria/videos" target="_blank">Archived Videos</a></li><li><a href="https://www.twitch.tv/softinio" target="_blank">Salar Rahmanian</a> - Zig related streaming, including Bay Area Zig User Group online events streamed</li></ul><h1>Compiler Development</h1><p>These communities are focused on Zig compiler development collaboration.</p><p>Warning: If you’re a newcomer and want help learning Zig, instead look into general discussion communities that have a space dedicated to onboarding newcomers.</p><h2>Zulip</h2><ul><li><a href="https://zsf.zulipchat.com/" target="_blank">ZSF Compiler Development</a><ul><li>Moderators:<ul><li><a href="https://andrewkelley.me/" target="_blank">Andrew Kelley</a></li></ul></li><li><a href="/code-of-conduct/">Code of Conduct</a></li></ul></li></ul>
  </div>

    </div>
    <div class="container" style="text-align: center; padding: 2em 0;">
      <div id="languages-menu">
  
  <span>This page is also available in the following languages:</span>
  <br>
  <div>
    <a href="/community/" style="white-space: nowrap;">English (original)</a>
  </div>
</div>
    </div>
  </body>
</html>
