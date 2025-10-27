<x-layout :background="false" title="Admin Page">
  <x-navbar />

  <main class="flex flex-wrap gap-5 p-4">
    <x-admin-action link="/students" title="Students List">
      <p>List of all the registered students</p>
    </x-admin-action>

    <x-admin-action link="/emails" title="Emails">
      <p>View sent emails</p>
    </x-admin-action>
  </main>
</x-layout>
