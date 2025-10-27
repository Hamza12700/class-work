<x-layout :background="false" :title="$student->name">
  <x-navbar/>

  <main class="flex gap-4 justify-center mt-40">
    <a class="text-3xl" href="/students" class="">&Larr;</a>

    <div class="flex gap-10">
      <img class="w-[20rem]" src="/storage/{{ $student->picture }}" />

      <div class="text-lg flex flex-col">
        <h1 class="text-3xl mb-5 underline font-semibold">{{ $student->name }}</h1>
        <p>Roll no: {{ $student->id }}</p>
        <p>Date: {{ $join_date }}</p>

        <a
          class="bg-zinc-700 text-white py-2 px-4 mt-2 w-fit rounded-sm"
          href="/student-detail/edit?id={{ $student->id }}">Edit Profile</a>
      </div>
    </div>
  </main>
</x-layout>
