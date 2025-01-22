<div class="navbar glass">
  <div class="flex-1 mx-5">
    <img class="w-16" src={{ asset('img/logo_pgi.png') }} alt="Logo">
    <a class="btn btn-ghost text-xl">PGI Kota Malang</a>
  </div>
  <div class="flex-none px-5">
    <div class="block lg:hidden">
      <button class="btn btn-ghost" onclick="toggleMenu()">☰</button>
    </div>
    <ul class="menu menu-horizontal px-5 hidden lg:flex">
      <li><a href="/">Homepage</a></li>
      <li><a href="/blogs">Blog</a></li>
      <li><a href="/gallery">Gallery</a></li>
      <li>
        <details>
          <summary>Other</summary>
          <ul class="bg-slate-100 rounded-t-none p-2">
            <li><a href="/about">About</a></li>
            <li><a href="/organization">Organization</a></li>
          </ul>
        </details>
      </li>
    </ul>
    <ul id="mobileMenu" class="menu menu-compact lg:hidden p-2 hidden">
      <li><a href="/">Homepage</a></li>
      <li><a href="/blogs">Blog</a></li>
      <li><a href="/gallery">Gallery</a></li>
      <li>
        <details>
          <summary>Other</summary>
          <ul class="bg-slate-100 rounded-t-none p-2">
            <li><a href="/about">About</a></li>
            <li><a href="/organization">Organization</a></li>
          </ul>
        </details>
      </li>
    </ul>
  </div>
</div>

<script>
  function toggleMenu() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('hidden');
  }
</script>
