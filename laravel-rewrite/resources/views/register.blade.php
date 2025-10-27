<x-layout>
  <x-navbar />

  <div id="res"></div>
  <h1 class="text-3xl text-center mt-12 mb-5 underline font-bold">Register Online</h1>
  <form class="flex mb-15 max-w-[80rem] py-4 flex-col items-center px-4 mx-auto"
    hx-post="/register" hx-target="#res" enctype="multipart/form-data">
    @csrf

    <img id="output-img" class="w-[20rem] border rounded-sm" src="no-img.jpg" />
    <input name="picture" required onchange="display_image(event)" class="p-1 underline cursor-pointer" type="file" accept="images/png,jpg,jpeg" />

    <fieldset class="border my-10 bg-white rounded-sm flex flex-col p-2">
      <legend class="bg-zinc-800 text-white px-2 py-1 mb-2 text-lg">Student Information</legend>

      <div class="flex flex-col gap-1">
        <input class="p-2 border w-[30rem]" name="name" required placeholder="Student Name" />
        <input class="p-2 border w-[30rem]" name="email" type="email" required placeholder="Email" />
        <input class="p-2 border w-[30rem]" name="password" type="password" required placeholder="Password" />
        <input class="p-2 border w-[30rem]" name="father_name" required placeholder="Father's name" />
        <input class="p-2 border w-[30rem]" name="address" required placeholder="Address" />
        <input class="p-2 border w-[30rem]" name="mobile_no" placeholder="Mobile Number" />
        <select class="p-2 border w-[30rem]" name="gender">
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
    </fieldset>

    <p id="select-one-course" class="mb-5 text-red-500 font-semibold hidden">Please select one course to continue your registration!</p>
    <fieldset class="border bg-white rounded-sm flex flex-col p-2">
      <legend class="bg-zinc-800 text-white px-2 py-1 mb-2 text-lg">Choose Courses</legend>

      <div class="flex flex-col gap-1 w-[30rem] courses-list">
        @foreach ($courses as $course)
        <div class="flex items-center gap-2 py-1">
          <input value="{{ $course->name }}" type="checkbox" class="p-2 border" name="course[]" />
          <label class="text-lg" for="course[]">{{ $course->name }} ({{ $course->duration }})</label>
        </div>
        @endforeach
      </div>
    </fieldset>

    <button onclick="sanity_check()" class="bg-black mt-5 cursor-pointer text-white px-6 py-2 font-semibold text-lg rounded-sm" type="submit">Register</button>
  </form>

  <x-footer />
</x-layout>

<script>
function display_image(event) {
  const link = document.getElementById("output-img");
  link.src = URL.createObjectURL(event.target.files[0]);
}

function sanity_check() {
  const container = document.querySelectorAll(".courses-list input");
  const msg = document.getElementById("select-one-course");
  let pass = false;

  container.forEach((input) => {
    if (input.checked) { pass = true; }
  });

  if (!pass) {
    msg.hidden = false;
    msg.style.display = "block";
  }
}
</script>
