<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway|Roboto|Arvo" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="temp/styles/styles.css">
    <title>Profile</title>
    <script src="/temp/scripts/Vendor.js"></script>
    
  </head>
  <body>
    <header class="header">
        <span class="header-title">Noted</span>
        <div class="header__menu-content">
          <div class="header__btn-container"></div>
          <nav class="primary-nav">
            <ul>
            <!--Links-->
              <a href="#"><li class="header-link">Profile</li></a>
              <a href="#"><li class="header-link">Help</li></a>
              <a href="#"><li class="header-link">Contact</li></a>
              <li class="header-logout header-link logout-btn">Logout</li>
            </ul>
            <div class="header-userinfo">Logged in as username</div>
          </nav>
        </div>

        
        <div class="header__menu-icon">
          <div class="header__menu-icon__middle"></div>
        </div>
    </header>

    <div class="modal-container modal-container--hidden">
        <!--Change Email-->
        <form method="post" class="modal modal-changeemail modal-changeemail--hidden">
            <div class="modal__close">X</div>
            <div class="modal__header">Want to change your current registered email?</div>
            <div class="modal__content">
                <div id="changeemail-message"></div>
                <input type="email" class="modal__content-input" id="change-email"name="change-email" placeholder="New Email">
                <input class="button changeemail-submit" type="submit">
            </div>
        </form>

        <!--Change Email-->
        <form method="post" class="modal modal-changepassword modal-changepassword--hidden">
            <div class="modal__close">X</div>
            <div class="modal__header">Want to change your current password?</div>
            <div class="modal__content">
                <div id="changepassword-message"></div>
                <input type="password" class="modal__content-input" id="change-password"name="change-password" placeholder="New Password">
                <input class="button changepassword-submit" type="submit">
            </div>
        </form>
    </div>

    <div class="profile">
        <div class="profile__container">
            <h2 class="profile-header">Profile</h2>
            <table class="profile__information">
                <tr class="profile__information-row profile-username">
                    <td>Username</td>
                    <td>XD</td>
                </tr>
                <tr class="profile__information-row profile-email">
                    <td>Email</td>
                    <td>Jimmy</td>
                </tr>
                <tr class="profile__information-row profile-password">
                    <div>
                        <td>Password</td>
                        <td>******</td>
                    </div>
                </tr>
                <tr class="profile__information-row profile-joindate">
                    <td>Join Date</td>
                    <td>10-03-1994</td>
                </tr>
            </table>
        </div>
    </div>





    <div class="footer">
      <p>Created by Tommy Tran</p>
    </div>

    <script src="/temp/scripts/App.js"></script>
  </body>
</html>