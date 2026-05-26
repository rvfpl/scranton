<!DOCTYPE html>
<html lang="en" class="bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SV // Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&family=JetBrains+Mono:wght@400;700&display=swap');
        body { font-family: 'Inter', sans-serif; -webkit-font-smoothing: antialiased; }
        h1, h2, nav, button { font-family: 'JetBrains Mono', monospace; text-transform: uppercase; }
        .active-tab { color: #818cf8; border-bottom: 1px solid #818cf8; }
        #menu-btn {
    transition: transform 0.2s ease-in-out;
}

#menu-btn:active {
    transform: scale(0.9); /* Makes the button feel 'clickable' */
}
    </style>
</head>
<body class="text-gray-900 min-h-screen flex flex-col">

    <nav class="sticky top-0 bg-black text-gray-300 px-6 py-4 z-50 border-b border-gray-800">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
           <a href="#">
             <h1 class="text-sm font-bold tracking-tighter">Silicon<span class="text-indigo-300">Valley.dev</span></h1>
           </a>
    
            <div class="gap-8 text-[10px] font-bold tracking-widest">      
<?php 
echo date('F j, Y');
?>
</div>   

            <div class="hidden md:flex gap-8 text-[10px] font-bold tracking-widest">
                <button onclick="showTab('spotlight', this)" class="nav-btn hover:text-white transition active-tab">Spotlight</button>
                <button onclick="showTab('directory', this)" class="nav-btn hover:text-white transition">Directory</button>
                 <a href="#founding-members" class="block w-full text-left pl-4 hover:text-indigo-600">FoundingMembers</a>
                 <a href="#blog" class="block w-full text-left pl-4 hover:text-indigo-600">Blog</a>
            </div>
            
            <button id="menu-btn" class="md:hidden text-white text-xl">☰</button>
        </div>
        
        <div id="mobile-menu" class="hidden md:hidden pt-4 pb-2 text-[10px] font-bold tracking-widest space-y-3 bg-black">
            <button onclick="showTab('spotlight', this); toggleMenu()" class="block w-full text-left pl-4 hover:text-indigo-600">Spotlight</button>
            <button onclick="showTab('directory', this); toggleMenu()" class="block w-full text-left pl-4 hover:text-indigo-600">Directory</button>
             <a href="#founding-members" class="block w-full text-left pl-4 hover:text-indigo-600">FoundingMembers</a>
             <a href="#blog" class="block w-full text-left pl-4 hover:text-indigo-600">Blog</a>

        </div>
    </nav>
 


 
        <div class="max-w-7xl mx-auto justify-between items-center"> 

            <div class="flex gap-4  text-[10px] font-bold tracking-widest py-2">

                 <a href="#founding-members" class="block w-full text-left pl-4 hover:text-indigo-600">FoundingPartners</a>
                 <a href="#blog" class="block w-full text-left pl-4 hover:text-indigo-600">Vlog</a>
                 <a href="#founding-members" class="block w-full text-left pl-4 hover:text-indigo-600">FoundingMembers</a>
           
            </div>
         
        </div>
        
  
    




    <main class="flex-grow p-6 md:p-12 max-w-5xl mx-auto w-full"> 

        
        <section id="tab-spotlight" class="tab-content">
            <div class="mb-10">
                <span class="text-[9px] font-bold text-indigo-600 tracking-[0.2em] uppercase"> Featured Builder { </span>
                <h2 class="text-3xl font-extrabold mt-2 tracking-tight">Rob 'Bobby' Fantana</h2> 
                aka: Native, Fanta, Fantana, Robbo, ElBoberino, Bober, Gandalf the Wiseguy, < redacted >, Yo Bobbbbaaayy, MC BO!
                <p class="text-gray-500 text-sm mt-1">Creator of: <a href="/" class="text-indigo-600 hover:text-indigo-800">Scranton.dev };</a></p> 
            </div>




            <div class="bg-white border border-gray-200 shadow-sm overflow-hidden grid md:grid-cols-2 ">
                <div class="relative group w-full h-64 md:h-full">
    
    <img src="/img/sc6.jpg" alt="Spotlight" class="w-full h-full object-cover border-4 border-indigo-400">
    
    <div class="absolute top-4 left-4 bg-black/80 backdrop-blur-sm border border-indigo-500/50 px-3 py-1 flex items-center gap-2">
      
        <span class="text-[9px] font-bold text-white uppercase tracking-widest">Vetted_Dev</span>
    </div>
     <div class="absolute top-10 left-4 bg-black/80 backdrop-blur-sm border border-indigo-500/50 px-3 py-1 flex items-center gap-2">
        <span class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"></span>
        <span class="text-[9px] font-bold text-white uppercase tracking-widest">Potato_Cam</span>
    </div>
</div>
                <div class="p-8 flex flex-col justify-center bg-gray-900 text-gray-100">
                    <p class="text-lg italic text-gray-200 font-serif">"My code? 60% of the time it works Everytime!"</p>
                    <div class="mt-8">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-gray-300">Favorite Tech Stack</span>
                        <p class="font-mono text-sm mt-1"> I Love LAMP  / XAMPP  // PHP Tools // VB6 // Obj-C  </p>
                    </div>
                     <div class="mt-6">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-gray-200">Base of Operations</span>
                        <p class="font-mono text-sm mt-1"> Toronto (3 days/week) // NiagaraFalls, NY // Tricity, PL // Mordor (Orky Waaaagh!)</p>
                    </div>
                    <div class="mt-6">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-gray-200">Socials</span>
                        <p class="font-mono text-sm mt-1"> <a href="https://siliconvalley.dev/im/bobby" target="_blank" class="text-indigo-600 hover:text-indigo-500">SiliconValley.dev/im/bobby</a></p>
                        <p class="font-mono text-sm mt-1"> Github: https://github.com/rvfpl</p> 
                        <p class="font-mono text-sm mt-1"> repo.or.cz/ remember  this lil ditty? Pepperidge Farms Remembers</p> 
                    </div>

                     <div class="mt-4">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-gray-200">Secret Sauce:</span>
                        <p class="font-mono text-sm mt-1"> Old Code, Low Code, Break Shit, Eat Stuff, Refactor. Quabity Ashuance, Repeat. Always Repeat. </p>
                    </div>
                    <div class="mt-6">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-gray-200">The REAL Secret Sauce:</span>
                        <p class="font-mono text-sm mt-1"> RTD,KISS,Coffee, <i>TheOffice</i>Reruns</p>
                    </div>

 
                   
                   


                </div>
            </div>
        </section>

 <a href="/"> 
 <div class="relative w-full h-64 sm: h-80 bg-[url('/img/scindex.jpg')] bg-cover bg-center mt-12 group cursor-pointer">
  <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition duration-500"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <h2 class="text-4xl font-black text-white tracking-widest uppercase">scranton.dev</h2>
    <span class="text-lg font-black text-white tracking-widest uppercase z-10 flex items-center justify-center">   [click to visit me] </span>
     </a>  </div>
</div>

 

        <section id="tab-directory" class="tab-content hidden">
            <h2 class="text-xs font-bold uppercase tracking-widest mb-6 border-l-2 border-indigo-600 pl-3">Verified Builders</h2>
            <div class="space-y-2">
                <div class="p-4 bg-white border border-gray-200 flex justify-between items-center text-xs">
                    <span class="font-bold">John_Smith</span>
                    <span class="text-[8px] bg-green-50 text-green-700 px-2 py-0.5 rounded uppercase font-bold">Verified</span>
                </div>
            </div>
        </section>
    </main>

    <footer class="p-6 text-center text-[9px] text-gray-400 uppercase tracking-widest border-t border-gray-200">
        2026 // SiliconValley.dev
    </footer>

 <script>
    function showTab(tabName, el) {
        document.querySelectorAll('.tab-content').forEach(t => t.classList.add('hidden'));
        document.getElementById('tab-' + tabName).classList.remove('hidden');
        document.querySelectorAll('.nav-btn').forEach(btn => btn.classList.remove('active-tab'));
        if(el) el.classList.add('active-tab');
    }

    function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        const btn = document.getElementById('menu-btn');
        
        menu.classList.toggle('hidden');
        
        // If menu is open (hidden class is gone), show X, otherwise show ☰
        const isOpen = !menu.classList.contains('hidden');
        btn.textContent = isOpen ? '✕' : '☰';
    }

    // Attach the event listener to the button
    document.getElementById('menu-btn').addEventListener('click', toggleMenu);
</script>
</body>
</html>