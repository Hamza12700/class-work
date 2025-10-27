<x-layout title="Profile">
  <x-navbar />

  <form class="mt-30 w-fit mx-auto" enctype="multipart/form-data"
    hx-post="/profile-update" hx-target="#res">
    @csrf

    <header class="mb-8 relative">
      <button
        onclick="history.back()"
        class="text-3xl absolute cursor-pointer top-[-2px] left-[-40px]">&Larr;</button>
      <h1 class="font-bold text-3xl">{{ $user->name }}</h1>
      <p class="text-lg underline">{{ $user->email }}</p>
    </header>

    <div class="flex items-center gap-10 text-lg">
      <div class="flex flex-col gap-4">
        <div>
          <label class="block font-semibold" id="name">Name:</label>
          <input class="border bg-white p-1" name="name" value="{{ $user->name }}" />
        </div>

        <div>
          <label class="block font-semibold" id="email">Email:</label>
          <input class="border bg-white p-1" name="email" value="{{ $user->email }}" />
        </div>

        @if ($user->mobile_no)
        <div>
          <label class="block font-semibold" id="mobile_no">Mobile No:</label>
          <input class="border bg-white p-1" name="mobile_no" value="{{ $user->mobile_no }}" />
        </div>
        @endif

        <div>
          <label class="block font-semibold" id="address">Address:</label>
          <input class="border bg-white p-1" name="address" value="{{ $user->address }}" />
        </div>
      </div>

      <div>
        <label for="picture">Profile Picture</label>
        <img id="output-img" class="h-[20rem] object-cover w-[20rem]" src="/storage/{{ $user->picture }}" />
        <input onchange="display_image(event)"
          class="underline cursor-pointer font-semibold"
          name="picture" type="file" accept="image/*" />
      </div>
    </div>

    <p class="mt-5" id="res"></p>
    <button
      class="px-4 py-2 font-semibold text-lg cursor-pointer bg-zinc-800 text-white rounded-sm"
      type="submit">Update</button>
    <a
      href="/logout"
      class="px-4 py-3 font-semibold text-lg cursor-pointer bg-zinc-800 text-white rounded-sm">Logout</a>
  </form>
</x-layout>

<script>
function display_image(event) {
  const link = document.getElementById("output-img");
  link.src = URL.createObjectURL(event.target.files[0]);
}
</script>
