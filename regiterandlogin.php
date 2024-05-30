<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="logIn.css">
</head>
<body>
  
    <div class="container" id="signup" style="display:none;">
      <h1 class="form-title">Register</h1>
      <form method="post" action="registerpage.php">
        <div class="input-group">
           <i class="fas fa-user"></i>
           <input type="text" name="YourName" id="YourName" placeholder="First Name" required>
           <label for="YourName">Your Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="Mobile_number" id="" placeholder=" Mobile_number" required>
            <label for="Mobile_number">Mobile Number</label>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="email" required>
            <label for="email">Email</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="Username" id="" placeholder="Username" required>
            <label for="Username">Username</label>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="Password" name="Password" id="Password" placeholder="Password" required>
            <label for="Password">Password</label>
        </div>
       <input type="submit" class="btn" value="Sign Up" name="signUp">
      </form>
      <p class="or">
        <!-- ----------or-------- -->
      </p>
     
      <div class="links">
        <p>Already Ragister ?</p>
        <button id="signInButton">Sign In</button>
      </div>
    </div>

    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="registerpage.php">
          <div class="input-group">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" id="email" placeholder="email" required>
              <label for="email">Email</label>
          </div>
          <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="Password" name="Password" id="Password" placeholder="Password" required>
              <label for="Password">Password</label>
          </div>
          <p class="recover">
            <!-- <a href="#">Recover Password</a> -->
          </p>
         <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <!-- <p class="or"> -->
          <!-- ----------or-------- -->
        </p>
        <div class="icons">
          <!-- <i class="fab fa-google"></i> -->
          <!-- <i class="fab fa-facebook"></i> -->
        </div>
        <div class="links">
          <p>Create New Account.</p>
          <button id="signUpButton">Sign Up</button>
        </div>
      </div>
      <script src="resscript.js"></script>
</body>
</html>
