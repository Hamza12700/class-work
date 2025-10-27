<nav class="bg-sky-100">
  <div class="flex justify-between items-center py-4 px-8">
    <img
      class="w-[5rem] cursor-pointer"
      onclick="window.open('/','_SELF')"
      src="/logo.png"/>

    <form class="flex gap-2">
      <input class="border w-[25rem] py-2 p-1 bg-white rounded-sm" type="search" placeholder="Search Courses...">
      <button class="flex gap-1 cursor-pointer bg-red-500 text-white py-2 px-3 rounded-sm" type="submit">
        <svg class="fill-white w-[1rem]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
        Search
      </button>
    </form>

    @if (!$signed_in)
      <div class="flex gap-2">
        <a href="/register" class="px-3 hover:text-white hover:bg-black py-2 border
        rounded-sm">Register</a>
        <a href="/login" class="px-3 hover:text-white hover:bg-black py-2 border rounded-sm">Login</a>
      </div>
    @else
      <div>
        <a href="/profile" class="px-3 hover:underline font-semibold text-white bg-black py-2 border rounded-sm">Profile</a>
        <a href="/admin" class="px-3 hover:underline font-semibold text-white bg-black py-2 border rounded-sm">Admin</a>
      </div>
    @endif
  </div>

  <div class="flex bg-blue-800 text-white font-semibold justify-around">
    <a class="nav-links p-2" href="/about-us">About Us</a>
    <a class="nav-links p-2" href="/programs">Programs</a>
    <a class="nav-links p-2" href="/gallery">Student Gallery</a>
    <a class="nav-links p-2" href="/scholarship">Scholarship</a>
    <a class="nav-links p-2" href="/contact-us">Contact Us</a>
  </div>
</nav>

<style>
.nav-links {
  color:#fff;

  background: linear-gradient(to left, transparent 50%, #754ffe 50%) right;
  background-size: 200%;
  transition: .4s ease-out;

}

.nav-links:hover {
  background-position: left;
}
</style>
