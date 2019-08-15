<html>
<head>
    <title>Admin Login Panel</title>
    <link rel="stylesheet" href="/assets/css/admin/login.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/js/login.js">
</head>
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form action="/admin/login/post" method="post" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Login</button>
                <?php view('admin/layouts/message', compact('errors')); ?>
            </form>
        </div>
    </div>