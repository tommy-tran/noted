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
        <span>Noted</span>
        <div class="header__menu-content">
          <div class="header__btn-container"></div>
          <nav class="primary-nav">
            <ul>
            <!--Links-->
              <a href="#"><li class="header-link">Home</li></a>
              <a href="#"><li class="header-link">Help</li></a>
              <a href="#"><li class="header-link">Contact</li></a>
            <!--Icon-->
            </ul>
          </nav>
        </div>

        <div class="header-login login-btn">Login</div>
        <div class="header__menu-icon">
          <div class="header__menu-icon__middle"></div>
        </div>
    </header>

    <div class="modal-container modal-container--hidden">
      <form class="modal modal-signup modal-signup--hidden">
        <div class="modal__close">X</div>
        <div class="modal__header">Register</div>
        <div class="modal__content">
          <div id="message"></div>
          <input type="text" id="username" placeholder="Username">
          <input type="email" id="placeholder" placeholder="Email Address">
          <input type="password" id="password" placeholder="Choose a password">
          <input type="password" id="confirmpassword" placeholder="Confirm password">
          <input class="button" type="submit">
        </div>
      </form>

      <form class="modal modal-login modal-login--hidden">
        <div class="modal__close">X</div>
        <div class="modal__header">Log in</div>
        <div class="modal__content">
          <div id="message"></div>
          <input type="text" id="username" placeholder="Username">
          <input type="password" id="password" placeholder="Password">
          <input class="button" type="submit">
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