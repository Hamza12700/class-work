<x-layout>
  <x-navbar />

  <form
    class="flex mt-70 items-center flex-col"
    hx-post="login" hx-target="#res" hx-no:htmx:after-request="console.log('nice')">
    @csrf

    <h1 class="text-4xl mb-5 font-bold">Login</h1>
    <div class="text-red-500 font-semibold mb-2" id="res"></div>

    <div class="flex flex-col w-[25rem] gap-4">
      <input name="email" class="border rounded-md p-2" required placeholder="Email" type="email" />
      <input name="password" class="border rounded-md p-2" required placeholder="Password" type="password" />
      <a class="underline" href="/register">Don't have an account?</a>
    </div>

    <button class="py-2 px-4 border rounded-md text-xl font-semibold mt-8 cursor-pointer
      text-white bg-black" type="submit">Login</button>
  </form>
</x-layout>
