<?php

require 'PHP/config.php';

include "comments.php";
  //Database Connection
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "instagramdatabase";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/login.style.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
    <title>Instagräm</title>
  </head>
  <body>
    <nav class="navbar">
      <div class="nav-wrapper" class="dropdown">
      <a href="index.php"><img src="img/instagram-logga.png" class="insta-img" alt="" /></a>

        <input type="text" class="search" placeholder="Sök" />
        <div class="navigering-items">

          <div class="ikon">
            <i class="fas fa-home"></i>
          </div>
          <div class="ikon">
            <a class="utan" href="upload.php"><i class="far fa-plus-square"></i></a>
          </div>
          <div class="ikon">
            <i class="far fa-paper-plane"></i>
          </div>
          <div class="ikon">
            <i class="far fa-compass"></i>
          </div>
          <div class="ikon">
            <i class="far fa-heart"></i>
          </div>
          
          
          <div class="dropdown">
            <div class="dropbtn"><i class="fas fa-user-circle"></i></div>
            <div class="dropdown-content">
              <a class="storlek" href="#"><div class="ikon "><i class="fas fa-user-circle"></i></div>Profil</a>
              <a class="storlek" href="#"><div class="ikon "><i class="far fa-bookmark"></i></div>Spara</a>
              <a class="storlek" href="#"><div class="ikon "><i class="fas fa-user-circle"></i></div>Inställningar</a>
              <a class="storlek" href="#"><div class="ikon "><i class="fas fa-user-circle"></i></div>Byt konto</a>
              <a class="storlek linje" href="SignInIndex.php"><div class="ikon"><i class="fas fa-user-circle"></i></div>Logga ut</a>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <section class="main">
      <div class="wrapper">
        <div class="left-col">
          <div class="statu-wrapper">
            <div class="status-card">
              <div class="profile-pic"><img src="img/profil.jpg" alt="" /></div>
              <p class="username">Joel_Stolt</p>
            </div>
            <div class="status-card">
              <div class="profile-pic"><img src="img/p1.jpg" alt="" /></div>
              <p class="username">Filip_falk</p>
            </div>
            <div class="status-card">
              <div class="profile-pic"><img src="img/p2.jpg" alt="" /></div>
              <p class="username">Karin_jonsson</p>
            </div>
            <div class="status-card">
              <div class="profile-pic"><img src="img/p3.jpg" alt="" /></div>
              <p class="username">Melker_A</p>
            </div>
            <div class="status-card">
              <div class="profile-pic"><img src="img/p4.jpg" alt="" /></div>
              <p class="username">Knasen102</p>
            </div>
            <div class="status-card">
              <div class="profile-pic"><img src="img/p5.jpg" alt="" /></div>
              <p class="username">troll_konto</p>
            </div>
            <div class="status-card">
              <div class="profile-pic"><img src="img/p6.jpg" alt="" /></div>
              <p class="username">Bengtsson</p>
            </div>
            <div class="status-card">
              <div class="profile-pic"><img src="img/p7.jpg" alt="" /></div>
              <p class="username">Milko</p>
            </div>
          </div>

          <div class="post">
            <div class="info">
              <div class="user">
                <div class="profile-pic"><img src="img/p1.jpg" alt="" /></div>
                <p class="username">Instagrm_grupp5</p>
              </div>
              <div class="options"><i class="fas fa-ellipsis-h"></i></div>
            </div>
            <img src="img/randon-foto.jpg" class="post-image" alt="" />
            <div class="post-content">
              <div class="reaction-wrapper">
                <div class="ikon">
                  <i class="far fa-heart" class="ikon"></i>
                </div>
                <div class="ikon">
                  <i class="far fa-comment-alt"></i>
                </div>
                <div class="ikon">
                  <i class="far fa-paper-plane" class="ikon"></i>
                </div>
                <div class="save ikon">
                  <i class="far fa-bookmark"></i>
                </div>
              </div>
              <p class="likes">55 likes</p>
              <?php
              //SQL to fetch
              $SQLFetch = "SELECT comment FROM comments";
              //run sql
              $resultSQLFetch = $conn->query($SQLFetch);
              //Check if data exists
              if ($resultSQLFetch->num_rows > 0){
                //Repeat for each row
                while($row = $resultSQLFetch->fetch_assoc()){
                  ?>
                  <p class="description">
                  <span>Användarnamn</span>
                  <!--php echo comment -->
                  <?= $row["comment"]; ?>
                  </p>
                  <?php
                }
              }
              ?>
            </div>
            <div class="comment-wrapper">
              <div class="ikon">
                <i class="far fa-smile"></i>
              </div>
              <form method="POST" id="commentForm">
                  <input type="hidden" name="user_id" value="user_id" >
                  <input type="text" class="comment-box" name="comment_section" placeholder="Lägg till kommentar"/>
                  <button name="submit_comment" type="submit" class="comment-btn">Post</button>
                </form>
              <button class="comment-btn">Post</button>
            </div>
          </div>
          <div class="post">
            <div class="info">
              <div class="user">
                <div class="profile-pic"><img src="img/p1.jpg" alt="" /></div>
                <p class="username">Instagrm_grupp5</p>
              </div>
              <div class="options"><i class="fas fa-ellipsis-h"></i></div>
            </div>
            <img src="img/randon-foto6.jpg" class="post-image" alt="" />
            <div class="post-content">
              <div class="reaction-wrapper">
                <div class="ikon">
                  <i class="far fa-heart" class="ikon"></i>
                </div>
                <div class="ikon">
                  <i class="far fa-comment-alt"></i>
                </div>
                <div class="ikon">
                  <i class="far fa-paper-plane" class="ikon"></i>
                </div>
                <div class="save ikon">
                  <i class="far fa-bookmark"></i>
                </div>
              </div>
              <p class="likes">55 likes</p>
              <p class="description">
                <span>Användarnamn</span>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta,
                recusandae facere dolore animi labore, inventore tempora
                corrupti temporibus optio cupiditate ad eaque! Amet quisquam
                voluptatibus perspiciatis nisi quis ut laudantium.
              </p>
              <p class="post-time">2 min</p>
            </div>
            <div class="comment-wrapper">
              <div class="ikon">
                <i class="far fa-smile"></i>
              </div>
              <input
                type="text"
                class="comment-box"
                placeholder="lägg till kommentar"
              />
              <button class="comment-btn">Post</button>
            </div>
          </div>
          <div class="post">
            <div class="info">
              <div class="user">
                <div class="profile-pic"><img src="img/p1.jpg" alt="" /></div>
                <p class="username">Instagrm_grupp5</p>
              </div>
              <div class="options"><i class="fas fa-ellipsis-h"></i></div>
            </div>
            <img src="img/randon-foto1.jpg" class="post-image" alt="" />
            <div class="post-content">
              <div class="reaction-wrapper">
                <div class="ikon">
                  <i class="far fa-heart" class="ikon"></i>
                </div>
                <div class="ikon">
                  <i class="far fa-comment-alt"></i>
                </div>
                <div class="ikon">
                  <i class="far fa-paper-plane" class="ikon"></i>
                </div>
                <div class="save ikon">
                  <i class="far fa-bookmark"></i>
                </div>
              </div>
              <p class="likes">55 likes</p>
              <p class="description">
                <span>Användarnamn</span>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta,
                recusandae facere dolore animi labore, inventore tempora
                corrupti temporibus optio cupiditate ad eaque! Amet quisquam
                voluptatibus perspiciatis nisi quis ut laudantium.
              </p>
              <p class="post-time">2 min</p>
            </div>
            <div class="comment-wrapper">
              <div class="ikon">
                <i class="far fa-smile"></i>
              </div>
              <input
                type="text"
                class="comment-box"
                placeholder="lägg till kommentar"
              />
              <button class="comment-btn">Post</button>
            </div>
          </div>
          <div class="post">
            <div class="info">
              <div class="user">
                <div class="profile-pic"><img src="img/p1.jpg" alt="" /></div>
                <p class="username">Instagrm_grupp5</p>
              </div>
              <div class="options"><i class="fas fa-ellipsis-h"></i></div>
            </div>
            <img src="img/randon-foto2.jpg" class="post-image" alt="" />
            <div class="post-content">
              <div class="reaction-wrapper">
                <div class="ikon">
                  <i class="far fa-heart" class="ikon"></i>
                </div>
                <div class="ikon">
                  <i class="far fa-comment-alt"></i>
                </div>
                <div class="ikon">
                  <i class="far fa-paper-plane" class="ikon"></i>
                </div>
                <div class="save ikon">
                  <i class="far fa-bookmark"></i>
                </div>
              </div>
              <p class="likes">55 likes</p>
              <p class="description">
                <span>Användarnamn</span>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta,
                recusandae facere dolore animi labore, inventore tempora
                corrupti temporibus optio cupiditate ad eaque! Amet quisquam
                voluptatibus perspiciatis nisi quis ut laudantium.
              </p>
              <p class="post-time">2 min</p>
            </div>
            <div class="comment-wrapper">
              <div class="ikon">
                <i class="far fa-smile"></i>
              </div>
              <input
                type="text"
                class="comment-box"
                placeholder="lägg till kommentar"
              />
              <button class="comment-btn">Post</button>
            </div>
          </div>
          <div class="post">
            <div class="info">
              <div class="user">
                <div class="profile-pic"><img src="img/p1.jpg" alt="" /></div>
                <p class="username">Instagrm_grupp5</p>
              </div>
              <div class="options"><i class="fas fa-ellipsis-h"></i></div>
            </div>
            <img src="img/randon-foto3.jpg" class="post-image" alt="" />
            <div class="post-content">
              <div class="reaction-wrapper">
                <div class="ikon">
                  <i class="far fa-heart" class="ikon"></i>
                </div>
                <div class="ikon">
                  <i class="far fa-comment-alt"></i>
                </div>
                <div class="ikon">
                  <i class="far fa-paper-plane" class="ikon"></i>
                </div>
                <div class="save ikon">
                  <i class="far fa-bookmark"></i>
                </div>
              </div>
              <p class="likes">55 likes</p>
              <p class="description">
                <span>Användarnamn</span>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta,
                recusandae facere dolore animi labore, inventore tempora
                corrupti temporibus optio cupiditate ad eaque! Amet quisquam
                voluptatibus perspiciatis nisi quis ut laudantium.
              </p>
              <p class="post-time">2 min</p>
            </div>
            <div class="comment-wrapper">
              <div class="ikon">
                <i class="far fa-smile"></i>
              </div>
              <input
                type="text"
                class="comment-box"
                placeholder="lägg till kommentar"
              />
              <button class="comment-btn">Post</button>
            </div>
          </div>
          <div class="post">
            <div class="info">
              <div class="user">
                <div class="profile-pic"><img src="img/p1.jpg" alt="" /></div>
                <p class="username">Instagrm_grupp5</p>
              </div>
              <div class="options"><i class="fas fa-ellipsis-h"></i></div>
            </div>
            <img src="img/randon-foto4.jpg" class="post-image" alt="" />
            <div class="post-content">
              <div class="reaction-wrapper">
                <div class="ikon">
                  <i class="far fa-heart" class="ikon"></i>
                </div>
                <div class="ikon">
                  <i class="far fa-comment-alt"></i>
                </div>
                <div class="ikon">
                  <i class="far fa-paper-plane" class="ikon"></i>
                </div>
                <div class="save ikon">
                  <i class="far fa-bookmark"></i>
                </div>
              </div>
              <p class="likes">55 likes</p>
              <p class="description">
                <span>Användarnamn</span>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta,
                recusandae facere dolore animi labore, inventore tempora
                corrupti temporibus optio cupiditate ad eaque! Amet quisquam
                voluptatibus perspiciatis nisi quis ut laudantium.
              </p>
              <p class="post-time">2 min</p>
            </div>
            <div class="comment-wrapper">
              <div class="ikon">
                <i class="far fa-smile"></i>
              </div>
              <input
                type="text"
                class="comment-box"
                placeholder="lägg till kommentar"
              />
              <button class="comment-btn">Post</button>
            </div>
          </div>
        </div>

        <div class="right-col">
          <p class="Suggestion-text">Förslag att följa</p>
          <div class="profile-card">
            <div class="profile-pic">
              <img src="img/randon-foto8.jpg" alt="" />
            </div>
            <div>
              <p class="username">Pontus</p>
              <p class="sub-text">Ponta_1</p>
            </div>
            <button class="action-btn">Följ</button>
          </div>
          <div class="profile-card">
            <div class="profile-pic">
              <img src="img/randon-foto6.jpg" alt="" />
            </div>
            <div>
              <p class="username">Micke</p>
              <p class="sub-text">Micke_1</p>
            </div>
            <button class="action-btn">Följ</button>
          </div>
          <div class="profile-card">
            <div class="profile-pic">
              <img src="img/randon-foto2.jpg" alt="" />
            </div>
            <div>
              <p class="username">Åsa</p>
              <p class="sub-text">Åsa_1</p>
            </div>
            <button class="action-btn">Följ</button>
          </div>
        </div>
      </div>
    </section>
    <script>
      //Stops the form from submiting each time
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
    </script>
    <script src="script.js"></script>
  </body>
</html>
