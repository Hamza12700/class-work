<?php require("header.php"); ?>
<link rel="stylesheet" href="style.css">

<div id="contact-container">
  <div>
    <h1 id="contact-title"><span id="contact-special">Connect</span> with our Team of Experts</h1>
    <p style="font-size: large;">Contact our excellence-driven team of experts</p>
    <ul id="contact-list">
      <li>Phone: 0238-2332-2343</li>
      <li>Email: company@gmail.com</li>
      <li>Location: Somewhere</li>
    </ul>

  <form method="post">
    <div>
      <label for="fullname">Full Name</label>
      <input name="fullname"  />

      <label for="email">Email</label>
      <input name="email"  />
    </div>

    <label for="phone">Phone Number</label>
    <input name="phone"  />

    <label for="location">Location</label>
    <input name="location"  />

    <div style="margin: 12px 0;">
      <label for="desc">Description</label>
      <textarea name="desc"></textarea>
    </div>

    <button type="submit">Submit</button>
  </form>
</div>
