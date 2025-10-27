<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Middleware\Admin;
use App\Models\Emails;

// Sucks that can't simply use 'redirect' because of HTMX.
// Htmx doesn't reload/redirect if status code isn't 2xx.

// @TODO: Maybe I don't have to do this? https://htmx.org/docs/#requests
function hx_redirect(string $path = "/") {
  return response('redirect')->header("HX-Redirect", $path);
}

Route::get("/", function () {
  return view("home");
});

Route::get("/about-us", function() {
  return view("about-us");
});

Route::get("/contact-us", function() {
  return view("contact-us");
});

// Routes that only Admin's can access
Route::middleware(["auth", Admin::class])->group(function () {
  Route::get("/admin", function () {
    return view("admin");
  });

  Route::get("/emails", function () {
    return view("emails", ["emails" => Emails::all()]);
  });

  Route::get("/email", function (Request $request) {
    if (!$request->query("view")) {
      return redirect("/emails");
    }

    $id = (int)$request->query("view");
    return view("view-email", ["email" => Emails::find($id)]);
  });

  Route::delete("/email", function (Request $request) {
    if (!$request->query("remove")) {
      return response("Bad Request", 400);
    }

    $id = (int)$request->query("remove");
    Emails::destroy($id);
    return "<script>document.getElementById('$id').remove()</script>";
  });

  Route::get("/students", function () {
    return view("students", ["students" => User::all()]);
  });

  Route::get("/student-detail", function (Request $request) {
    if (!$request->query("id")) {
      return redirect("/students");
    }

    $id = $request->query("id");
    $user = User::find($id);

    $created_at = date_parse($user->created_at);
    $join_date = sprintf("%d-%d-%d", $created_at['year'], $created_at['month'], $created_at['day']);
    return view("student-detail", ["student" => User::find($id), "join_date" => $join_date]);
  });

  Route::get("/student-detail/edit", function(Request $request) {
    if (!$request->query("id")) {
      return back();
    }

    $id = (int)$request->query("id");
    $user = User::find($id);
    return view("edit-student", ["student" => $user]);
  });

  Route::post("/student-update", function (Request $request) {
    if (!$request->query("id")) {
      return back();
    }
    $id = (int)$request->query("id");

    $info = $request->validate([
      "name" => "required|string",
      "father_name" => "required|string",
      "email" => "required|email",
      "mobile_no" => "nullable|string",
      "picture" => "nullable|image",
      "address" => "required|string",
    ]);

    if ($request->file("picture")) {
      $info["picture"] = $request->file("picture")->store("uploads", "public");
    }

    User::where("id", $id)->update($info);
    return response("Successfully Updated", 200);
  });
});

Route::post("/contact-us", function(Request $request) {
  $info = $request->validate([
    "email" => "required|email",
    "subject" => "required|string",
    "name" => "required|string",
    "description" => "required|string",
    "mobile_no" => "nullable|string",
  ]);

  Emails::create($info);
  return view("components.email_created");
});

Route::get("/profile", function() {
  return view("profile", ["user" => Auth::user()]);
})->middleware("auth");

Route::post("/profile-update", function(Request $request) {
  $info = $request->validate([
    "name" => "required|string",
    "email" => "required|email",
    "mobile_no" => "nullable|string",
    "picture" => "nullable|image",
    "address" => "required|string",
  ]);

  if ($request->file("picture")) {
    $info["picture"] = $request->file("picture")->store("uploads", "public");
  }

  $user = Auth::user();
  User::where("id", $user->id)->update($info);
  return response("Successfully Updated", 200);
})->middleware("auth");

Route::get("/logout", function(Request $request) {
  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect('/');
})->middleware("auth");

Route::get("/login", function () {
  if (Auth::check()) { return redirect("/profile"); }
  return view("login");
})->name("login");

Route::post("/login", function (Request $request) {
  $creds = $request->validate([
    "email" => "required|email",
    "password" => "required|string",
  ]);

  if (Auth::attempt($creds, true)) {
    $request->session()->regenerate();
    return hx_redirect("/profile");
  }

  return "The provided credentials do not match our records";
});

Route::get("/register", function () {
  $courses = DB::select("select * from courses");
  return view("register", ["courses" => $courses]);
});

Route::post("/register", function (Request $request) {
  if ($request->input("course") === null) {
    return response("Missing courses", 400);
  }

  $info = $request->validate([
    "name" => "required|string",
    "picture" => "required|image",
    "email" => "required|email",
    "password" => "required|string",
    "father_name" => "required|string",
    "address" => "required|string",
    "mobile_no" => "nullable|string",
    "gender" => "required|string",
  ]);

  $info['picture'] = $request->file("picture")->store("uploads", "public") or function() {
    return response("File operation failed!", 500);
  };

  $user = User::create($info);
  Auth::login($user);
  return hx_redirect("/profile");
});
