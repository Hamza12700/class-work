<x-layout title="Contact Us">
  <x-navbar/>

  <form hx-target="this" hx-post="contact-us" class="form max-w-[70rem] mx-auto px-4 my-30">
    @csrf

    <fieldset>
      <legend class="rounded-sm font-semibold">Contact Us</legend>

      <div class="email-container">
        <input required type="email" name="email" placeholder="Email address" />
        <input required name="subject" placeholder="Subject" />
      </div>

      <div class="email-container">
        <input required name="name" placeholder="Full Name" />
        <input name="mobile_no" placeholder="Phone Number" />
      </div>

      <textarea name="description" placeholder="Description" required maxlength="1000"></textarea>
    </fieldset>

    <button type="submit">Submit</button>
  </form>

  <x-footer/>
</x-layout>

<style>
.email-container {
  display: flex;
  justify-content: center;
  gap: 2rem;
  margin: 1rem 0;

  input {
    width: 100%;
  }
}

fieldset {
  padding: 1rem;
  background-color: #F2F0EF;
}

.form button {
  background: white;
  padding: 0.6em 1.3em;
  font-weight: 900;
  font-size: 18px;
  border: 3px solid black;
  border-radius: 0.4em;
  box-shadow: 0.1em 0.1em;
  cursor: pointer;
  margin: 1rem 0;
  display: flex;
  justify-self: end;
}

.form button:hover {
  transform: translate(-0.05em, -0.05em);
  box-shadow: 0.15em 0.15em;
}

.form button:active {
  transform: translate(0.05em, 0.05em);
  box-shadow: 0.05em 0.05em;
}

legend {
  background-color: black;
  color: white;
  padding: 10px;
  font-size: 1.5rem;
}

/* From Uiverse.io by anniekoop */
.form input, textarea {
  padding: 0.875rem;
  font-size: 1rem;
  border: 1.5px solid #000;
  border-radius: 0.5rem;
  box-shadow: 2.5px 3px 0 #000;
  outline: none;
  transition: ease 0.25s;
}

.form textarea {
  resize: none;
  width: 100%;
  height: 200px;
}

.form input:focus {
  box-shadow: 5.5px 7px 0 black;
}
</style>
