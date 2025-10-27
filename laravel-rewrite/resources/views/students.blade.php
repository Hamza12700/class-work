<x-layout :background="false" title="Registered Students">
  <x-navbar/>

  <header class="relative items-center flex justify-center">
    <a class="font-semibold mr-3" href="/admin">&larrhk;</a>
    <h1 class="font-semibold w-fit text-3xl my-10">Registered Students</h1>
  </header>
  <main class="px-4 flex flex-wrap gap-4">
    @foreach ($students as $student)
    <div onclick="navigate({{ $student->id }})" class="border rounded-md p-3 bg-neutral-100 cursor-pointer w-fit">
      <p class="font-bold text-center mt-2 mb-4 text-xl">{{ $student->name }} - {{ $student->id }}</p>
      <img class="w-[15rem] h-[15rem] object-cover rounded-sm" src="/storage/{{ $student->picture }}" />
      <address>

        @php
        $join_date = date_parse($student->created_at);
        $year = $join_date["year"];
        $month = $join_date["month"];
        $day = $join_date["day"];
        @endphp
        <p class="mt-2 text-center">Joined: <strong>{{ $year."-".$month."-".$day }}</strong></p>

      </address>
    </div>
    @endforeach
  </main>

</x-layout>

<script>
function navigate(id) {
  window.location.replace(`/student-detail?id=${id}`);
}
</script>
