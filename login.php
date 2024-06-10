<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login | Laundry Management System</title>
  <link rel="shortcut" href="megs.jpg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background:#00A9C0;
      font-family: 'Poppins', sans-serif;
    }
    #login-container {
      display: flex;
      height: 80%;
      width: 80%;
      max-width: 1000px;
      max-height: 600px;
      background-color: #004f83;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    #login-left {
      flex: 1;
      background-color: #59b6ec61;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }
    #login-left img {
      max-width: 100%;
      max-height: 100%;
      object-fit: cover;
      border-radius: 10px;
    }
    #login-right {
      flex: 1;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: #f7f8fc;
    }
    .logo {
      margin: auto;
      font-size: 4rem;
      background: white;
      padding: 0.5em 0.7em;
      border-radius: 50%;
      color: #007bff;
      text-align: center;
      width: 100px;
      height: 100px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    .card {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
      color: #333;
    }
    .input-group {
      position: relative;
      display: flex;
      align-items: center;
    }
    .input-group input[type="text"], .input-group input[type="password"] {
      flex: 1;
      padding: 10px 40px 10px 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      transition: border-color 0.3s;
      font-family: 'Poppins', sans-serif;
      font-size: 16px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .input-group i {
      position: absolute;
      right: 10px;
      color: #007bff;
      cursor: pointer;
      font-size: 18px;
    }
    .input-group input[type="text"]:focus, .input-group input[type="password"]:focus {
      border-color: #007bff;
      outline: none;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    button.btn-login {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s, box-shadow 0.3s;
      margin-top: 10px;
      font-family: 'Poppins', sans-serif;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    button.btn-login:hover {
      background-color: #0056b3;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    .alert {
      color: red;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .text-info {
      color: #007bff;
      margin-bottom: 20px;
      text-align: center;
    }
    button.btn-register {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #28a745;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s, box-shadow 0.3s;
      margin-top: 10px;
      font-family: 'Poppins', sans-serif;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    button.btn-register:hover {
      background-color: #218838;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    #login-right .form-container {
      text-align: left;
    }
  </style>
</head>
<body>
  <div id="login-container">
    <div id="login-left">
      <img src="laundry.jpg" alt="Laundry Image">
    </div>
    <div id="login-right">
      <div class="logo">LMS</div>
      <h4 class="text-info">Laundry Management System</h4>
      <div class="card">
        <div class="card-body">
          <div class="form-container">
            <form id="login-form">
              <div class="form-group">
                <label for="username">Username</label>
                <div class="input-group">
                  <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
                  <i class="fas fa-user"></i>
                </div>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                  <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                  <i class="fas fa-lock"></i>
                </div>
              </div>
              <div class="alert" style="display: none;"></div>
              <button type="submit" class="btn-login">Login</button>
            </form>
            <!-- <button onclick="location.href='registration.php'" class="btn-register">Register</button> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#login-form').on('submit', function(e) {
        e.preventDefault();
        var $loginBtn = $('#login-form button.btn-login');
        $loginBtn.attr('disabled', true).text('Logging in...');
        $('.alert').hide().text('');
        $.ajax({
          url: 'ajax.php?action=login',
          method: 'POST',
          data: $(this).serialize(),
          error: function(err) {
            console.error(err);
            $('.alert').text('An error occurred. Please try again.').show();
            $loginBtn.removeAttr('disabled').text('Login');
          },
          success: function(resp) {
            if (resp == 1) {
              location.href = 'index.php';
            } else if (resp == 2) {
              location.href = 'user_navbar.php';
            } else {
              $('.alert').text('Username or password is incorrect.').show();
              $loginBtn.removeAttr('disabled').text('Login');
            }
          }
        });
      });
    });
  </script>
</body>
</html>
