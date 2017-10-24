<?php
session_start();
if(!isset($_SESSION['user_id'])) {
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway|Roboto|Arvo" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="temp/styles/styles.css">
    <title>Notepad</title>
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
              <a href="http://tommytran.xyz"><li class="header-link">About</li></a>
              <a href="http://tommytran.xyz"><li class="header-link">Contact</li></a>
              <li class="header-logout header-link logout-btn"><a href="index.php?logout=1">Logout</a></li>
            </ul>
            <div class="header-userinfo">Logged in as <strong><?php echo $_SESSION['username']?></strong></div>
          </nav>
        </div>

        
        <div class="header__menu-icon">
          <div class="header__menu-icon__middle"></div>
        </div>
    </header>

    <div class='message message--hidden'>
        <div class='message-container'>
            <div class="message-close">OK</div>
            <div class='message-content'></div>
        </div>
    </div>
    
    <div class="notes">
      <div class="notes__extra-container notes__extra-main">
        <h2 class="notes__extra-header">Your Notes</h2>
        <div class="notes__button-container notes__button--pull-right"><button id="addnote" class="notes__button notes__button-blue notes__button-add">Add Note</button></div>
      </div>
      <div class="notes__extra-container notes__extra-add notes--hidden">
        <div class="notes__button-container"><button class="notes__button notes__button-green notes__button-save">Save</button></div>
        <div class="notes__title" id="title" contenteditable="true">Title</div>
        <div class="notes__button-container notes__button--pull-right"><button class="notes__button notes__button-red notes__button-cancel">Cancel</button></div>
      </div>
      <div class="notes__list">
        <div class='notes__item' id='$note_id'>
          <div class='notes__item-title'>Loading</div>
          <div class='notes__item-date'></div>
          <div class='notes__item-note'></div>
        </div>
      </div>
      <div class="notes__notepad notes__notepad--hide"><textarea id="notepad" rows=14></textarea></div>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script src="/assets/scripts/modules/Notes.js"></script>
    <script src="/temp/scripts/App.js"></script>
  </body>
</html>