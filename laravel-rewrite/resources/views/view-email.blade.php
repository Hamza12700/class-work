<x-layout :background="false" :title="$email->name">
  <main class="my-20 w-[70rem] p-4 mx-auto bg-white border-r border-l">
    <a class="underline font-semibold" href="/emails">&larrhk; Back</a>

    <a href="mailto:{{$email->email}}" class="text-3xl hover:underline block mb-1 mt-3"><strong>From:</strong> {{$email->email}}</a>
    <p class="mb-10"><strong>Subject:</strong> {{$email->subject}}</p>

    <p class="mb-5">{{$email->description}}</p>
    <a
      class="bg-zinc-800 font-semibold hover:underline px-4 py-2 rounded-sm text-white"
      href="mailto:{{$email->email}}">Reply</a>
  </main>
</x-layout>
