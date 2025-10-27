<x-layout :background="false" title="Emails">
  <x-navbar/>

  <h1 class="text-center text-3xl font-bold my-5">
    <a href="/admin" class="text-3xl top-[-2px] left-[-40px]">&Larr;</a>
    Emails
  </h1>

  <div id="res"></div>

  <form class="flex mt-10 px-4 flex-col gap-5">
    @csrf

    @foreach ($emails as $email)
    <div id="{{$email->id}}" class="bg-white flex justify-between items-center p-2 border rounded-md">
      <a href="email?view={{$email->id}}">
        <div>
          <strong>From:</strong> <span class="underline">{{$email->email}}</span>
          <p class="mt-2"><strong>Subject</strong>: {{$email->subject}}</p>
        </div>
      </a>

      <button
        type="submit"
        hx-target="#res"
        hx-delete="/email?remove={{$email->id}}"
        title="Remove" class="cursor-pointer border-l">
        <svg
          class="w-7"
          xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M232.7 69.9L224 96L128 96C110.3 96 96 110.3 96 128C96 145.7 110.3 160 128 160L512 160C529.7 160 544 145.7 544 128C544 110.3 529.7 96 512 96L416 96L407.3 69.9C402.9 56.8 390.7 48 376.9 48L263.1 48C249.3 48 237.1 56.8 232.7 69.9zM512 208L128 208L149.1 531.1C150.7 556.4 171.7 576 197 576L443 576C468.3 576 489.3 556.4 490.9 531.1L512 208z"/></svg>
      </button>
    </div>
    @endforeach
  </form>
</x-layout>
