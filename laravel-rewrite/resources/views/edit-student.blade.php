<x-layout :background="false" title="Edit - {{$student->name}}">
  <x-navbar />

  <form class="mt-30 w-fit mx-auto" enctype="multipart/form-data"
    hx-post="/student-update?id={{$student->id}}" hx-target="#res">
    @csrf

    <header class="mb-8 relative">
      <a class="text-3xl absolute top-[-2px] left-[-40px]"
        href="/student-detail?id={{$student->id}}" class="">&Larr;</a>
      <h1 class="font-bold text-3xl">{{ $student->name }}</h1>
      <p class="text-lg underline">{{ $student->email }}</p>
    </header>

    <div class="flex items-center gap-10 text-lg">
      <div class="flex flex-col gap-4">
        <div>
          <label class="block font-semibold" id="name">Name:</label>
          <input required class="border bg-white p-1" name="name" value="{{ $student->name }}" />
        </div>

        <div>
          <label class="block font-semibold" id="father_name">Father's Name:</label>
          <input required class="border bg-white p-1" name="father_name" value="{{ $student->father_name }}" />
        </div>

        <div>
          <label class="block font-semibold" id="email">Email:</label>
          <input required class="border bg-white p-1" name="email" value="{{ $student->email }}" />
        </div>

        <div>
          <label class="block font-semibold" id="mobile_no">Mobile No:</label>
          <input class="border bg-white p-1" name="mobile_no" placeholder="Not Mentioned" value="{{ $student->mobile_no }}" />
        </div>

        <div>
          <label class="block font-semibold" id="address">Address:</label>
          <input required class="border bg-white p-1" name="address" value="{{ $student->address }}" />
        </div>
      </div>

      <div>
        <label for="picture">Profile Picture</label>
        <img id="output-img" class="max-w-[20rem]" src="/storage/{{ $student->picture }}" />
        <input onchange="display_image(event)" class="underline cursor-pointer
          font-semibold" name="picture" type="file" accept="image/*" />
      </div>
    </div>

    <p class="mt-5" id="res"></p>
    <button class="px-4 py-2 mt-5 font-semibold text-lg cursor-pointer bg-zinc-800 text-white rounded-sm" type="submit">Update</button>
  </form>
</x-layout>

<script>
function display_image(event) {
  const link = document.getElementById("output-img");
  link.src = URL.createObjectURL(event.target.files[0]);
}
</script>
