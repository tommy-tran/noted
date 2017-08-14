<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="temp/styles/styles.css">
    <title>Notepad</title>
    <script src="/temp/scripts/Vendor.js"></script>
    
  </head>
  <body>
    <header class="header">
        <span class="header-title">Noted</span>
        <div class="header__menu-content">
          <nav class="primary-nav">
            <ul>
            <!--Links-->
              <a href="#"><li class="header-link">Home</li></a>
              <a href="#"><li class="header-link">Help</li></a>
              <a href="#"><li class="header-link">Contact</li></a>
              <li class="header-login header-link login-btn">Login</li>
            <!--Icon-->
            </ul>
          </nav>
        </div>
        <div class="header__menu-icon">
          <div class="header__menu-icon__middle"></div>
        </div>
    </header>

    

    <div class="modal-container modal-container--hidden">
      <div class="message message--hidden">
        <div class="message-container">
          <div class="message-header"></div>
          <div class="message-content"></div>
        </div>
        <button class="button message-close">OK</button>
      </div>
    <!--Sign Up-->
      <form method="post" id="signupform" class="modal modal-signup modal-signup--hidden">
        <div class="modal__close">X</div>
        <div class="modal__header">Register</div>
        <div class="modal__content">
          <input class="modal__content-input" type="text" id="signup-username" name="signup-username" placeholder="Username">
          <input class="modal__content-input" type="email" id="signup-email" name="signup-email" placeholder="Email Address">
          <input class="modal__content-input" type="password" id="signup-password" name="signup-password" placeholder="Choose a password">
          <input class="modal__content-input" type="password" id="signup-confirm" name="signup-confirm" placeholder="Confirm password">
          <input class="button signup-submit" type="submit">
        </div>
      </form>

    <!--Login-->
      <form method="post" id="loginform" class="modal modal-login modal-login--hidden">
        <div class="modal__close">X</div>
        <div class="modal__header">Log in</div>
        <div class="modal__content">

          <input type="text" class="modal__content-input" id="login-email"name="login-email" placeholder="Email">
          <input type="password" class="modal__content-input" id="login-password" name="login-password" placeholder="Password">
          <div class="modal__extra">
            <div class="modal__extra-rememberme">
              <label class="modal__extra--pullleft">
                <input type="checkbox" name="rememberme" id="rememberme">
                Remember me
              </label>
            </div>
            <div class="modal__extra-forgot-container"><a class="modal__extra-forgot modal__extra--pullright ">Forgot Username/Password?</a></div>
          </div>
          <input class="button login-submit" type="submit">
        </div>
      </form>

      <!--Forgot information-->
      <form method="post" class="modal modal-forgot modal-forgot--hidden">
        <div class="modal__close">X</div>
        <div class="modal__header">Forgot Password?</div>
        <div class="modal__content">
          <input type="email" class="modal__content-input" id="forgot-email"name="forgot-email" placeholder="Email">
          <input class="button forgot-submit" type="submit">
        </div>
      </form>
    </div>
    
    <div class="jumbotron">
      <h1>Noted</h1>
      <p>Free, safe and easy to use online notes!</p>
      <button class="signup-btn">Sign up for free!</button>
    </div>

    <div class="footer">
      <p>Created by Tommy Tran</p>
    </div>

    <script src="/temp/scripts/App.js"></script>
  </body>
</html>