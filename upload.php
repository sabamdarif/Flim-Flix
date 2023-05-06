<?php

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get the form data
  $title = $_POST['title'];
  $poster = $_FILES['poster']['tmp_name'];
  $screenshot = $_FILES['screenshot']['tmp_name'];
  $language = $_POST['language'];
  $audio = $_POST['audio'];
  $type = $_POST['type'];
  $genre = $_POST['genre'];
  $description = $_POST['description'];
  $low = $_POST['low'];
  $medium = $_POST['medium'];
  $high = $_POST['high'];
  $date = $_POST['date'];
  $year = $_POST['year'];

  // Create a folder with the name of the title
  $folder = './movie-contents/' . str_replace(' ', '-', $title);
  mkdir($folder, 0777, true);

  // Move the files to the folder
  move_uploaded_file($poster, $folder . '/poster.jpg');
  move_uploaded_file($screenshot, $folder . '/screenshot.jpg');

  // Convert the date string to a Unix timestamp
  $timestamp = strtotime($date);

  // Convert the timestamp to a formatted date string
  $formatted_date = date('j F Y', $timestamp);

  // Load the existing data from the JSON file
  $json = file_get_contents('./data/movie.json');
  $data = json_decode($json, true);

  // Prepend the new data to the existing array
  array_unshift($data, [
    'name' => $title,
    'poster' => str_replace('\\', '/', $folder) . '/poster.jpg',
    'sshot' => str_replace('\\', '/', $folder) . '/screenshot.jpg',
    'lan' => $language,
    'audio' => $audio,
    'type' => $type,
    'genre' => $genre,
    'desc' => $description,
    'low' => $low,
    'medium' => $medium,
    'high' => $high,
    'date' => $formatted_date
  ]);

  // Save the data to the JSON file
  file_put_contents('./data/movie.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

  // Define the title name and code to be written to the HTML file
  function create_movie_html($title) {
$file_name = strtolower(str_replace(' ', '-', $title)) . '.html';
    $file_path = dirname(__FILE__) . '/movies/' . $file_name; // Set file path

    // HTML code to write to file
    $html = '<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/db5e68f97f.js" crossorigin="anonymous"></script>

  <title> </title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/download-page.css">
</head>

<body>

  <div class="header">
    <div id="sdbar">
      <label for="opn-sid-mnu" id="menu-icon">
        <i class="fa-solid fa-bars bartoside"></i>
      </label>
    </div>
    <div id="logozn">
      <a href="/index.html">
        <img id="logopng" src="/img/weblogo.png" alt="#">
      </a>
    </div>
    <div id="search">
      <label for="opn-serc-box">
        <i class="fa-solid fa-magnifying-glass srcico search-icon"></i>
      </label>
    </div>
  </div>
  <input type="checkbox" id="opn-serc-box">
  <div id="search-box">
    <input type="text" placeholder="Search here...." id="search_input">
    <div class="search_result">

      <!-- <a href="#" class="card">
 <img src="/movie-contents/Writer-Padmabhushan/Writer Padmabhushan 2023.jpg">
 <div class="cont">
 <h3>Writer Padmabhushan</h3>
 <div class="movie-info">
<p>
Action ,</p>
<p><span>series</span>
</p>
 </div>
</div>
</a> -->

    </div>
  </div>

  <div class="main">
    <input type="checkbox" id="opn-sid-mnu">
    <div id="slide-menu">
      <ul class="list-up">
        <div class="click-box">
          <a href="/catagory-pages/Bengali.html">
            <li class="list-cont">
              Bengali
            </li>
          </a>
        </div>
        <div class="click-box">
          <a href="/catagory-pages/hollywood-page.html">
            <li class="list-cont">Holly Wood</li>
          </a>
        </div>
        <div class="click-box">
          <a href="/catagory-pages/bollywood-page.html">
            <li class="list-cont">Bolly Wood</li>
          </a>
        </div>
        <div class="click-box">
          <a href="/catagory-pages/Dual-Audio.html">
            <li class="list-cont">Dual Audio</li>
          </a>
        </div>
        <div class="click-box">
          <a href="/catagory-pages/Hindi-Dubbed.html">
            <li class="list-cont">Hindi Dubbed</li>
          </a>
        </div>
        <div class="click-box">
          <a href="/catagory-pages/South-Hindi-Movies.html">
            <li class="list-cont">South Hindi Movies</li>
          </a>
        </div>
        <div class="click-box">
          <a href="/catagory-pages/HQ-SouthHindiDubs.html">
            <li class="list-cont">HQ-SouthHindiDubs</li>
          </a>
        </div>
        <div class="click-box">
          <a href="/catagory-pages/WEB-Series.html">
            <li class="list-cont">WEB-Series</li>
          </a>
        </div>
        <div class="click-box">
          <a href="/catagory-pages/TV-Shows.html">
            <li class="list-cont">TV-Shows</li>
          </a>
        </div>
        <div class="click-box">
          <a href="/catagory-pages/UnOfficial-Dubbed.html">
            <li class="list-cont">UnOfficial Dubbed</li>
          </a>
        </div>
        <div class="click-box">
          <a href="/catagory-pages/Action.html">
            <li class="list-cont">Action</li>
          </a>
        </div>
        <div class="click-box">
          <a href="/catagory-pages/Comedy.html">
            <li class="list-cont">Comedy</li>
          </a>
        </div>
        <div class="click-box">
          <a href="/movie-request.html">
            <li class="list-cont list-mv-rqst">! Request Movie !</li>
          </a>
        </div>
        <br><br>
      </ul>
    </div>

    <!-- RESPONSIVE AD START -->
    <div class="area-ad">
      <center>

        <p> Responsive AD</p>

      </center>
    </div>
    <!-- RESPONSIVE AD END -->

    <div class="movie-detail-cont">
      <div class="top-mv-heading">
        <h4>
          <i class="fa-solid fa-film"></i>
          Writer Padmabhushan (2023) WEB-DL Hindi (HQ-Dub) 1080p 720p & 480p [x264/HEVC] | Full Movie
        </h4>
      </div>

      <div class="mv-info">

        <div class="mv-release">
          <h4>
            <i class="fa-solid fa-calendar"></i>
            <span id="releated_date">
            </span>
          </h4>
        </div>
        <div class="mv-releated-cat">
          <h4>
            <i class="fa-solid fa-folder"></i>
            <a href="#">
              <span id="first_info_mv"></span>
            </a>
          </h4>
        </div>
        <div class="mv-releated-cat">
          <h4>
            <i class="fa-solid fa-folder"></i>
            <a href="#">
              <span id="second_info_mv"></span></a>
          </h4>
        </div>
        <div class="mv-releated-cat">
          <h4>
            <i class="fa-solid fa-folder"></i>
            <a href="#">
              <span id="third_info_mv"></span>
            </a>
          </h4>
        </div>
      </div>
      <hr class="underline-sep">

      <div class="movie-poster-img">
        <img src="#" id="poster_mv" alt="">


      </div>

      <div id="how-to-dl">
        <a href="/how-2-dl.html">
          [ ⚠️ How To Download ⚠️ ]
        </a>
      </div>
      <!-- RESPONSIVE AD START -->
      <div class="area-ad">
        <center>

          <p> Responsive Ad</p>

        </center>
      </div>
      <!-- RESPONSIVE AD END -->

      <hr class="underline-sep">
      <div class="underline-sep-divn">
        <div class="download-box">
          <label for="cbox-down-pq2">
            <i class="fa-sharp fa-solid fa-file-arrow-down"></i> Download Now <i class="fa-sharp fa-solid fa-file-arrow-down"></i>
          </label>
        </div>
      </div>
      <div class="avl-list-cont">
        <input type="checkbox" id="cbox-down-pq2">
        <div id="available-pq-list2">
          <ul class="avl-pq-top">
            <div class="avl-pq-nm">
              <a href="#" id="high_q">
                <li><i class="fa-sharp fa-solid fa-circle-down"></i>1080P
                </li>
              </a>
            </div>
            <div class="avl-pq-nm">
              <a href="#" id="medium_q">
                <li><i class="fa-sharp fa-solid fa-circle-down"></i>720P</li>
              </a>
            </div>
            <div class="avl-pq-nm">
              <a href="#" id="low_q">
                <li><i class="fa-sharp fa-solid fa-circle-down"></i>480P</li>
              </a>
            </div>
          </ul>
        </div>
      </div>



      <hr class="underline-sep">
      <div class="detail-lan-rate">
        <h4 id="title">Writer Padmabhushan (Hindi Dubbed)</h4>
        <p>
          <span>Genres:</span>
          <span id="gen">

          </span>
        </p>
        <p>
          Release Date: <span id="date">

          </span>
        </p>
        <p><span>Language:</span>
          <span id="lan">

          </span>
        </p>
        <p>
          Audio:
          <span id="audio">

          </span>
        </p>
        <p><span>Quality:</span>1080p | 720p | 480p
        </p>
      </div>

      <hr class="underline-sep">
    
        <h3>: Screen-Shots :</h3>
        <div id="movie-dtl-img">

          <img id="sshot" src="#">
        </div>
      
          <hr class="underline-sep">


          <div class="underline-sep-divn">
            <div class="download-box">
              <label for="cbox-down-pq">
                <i class="fa-sharp fa-solid fa-file-arrow-down"></i> Download Now <i class="fa-sharp fa-solid fa-file-arrow-down"></i>
              </label>
            </div>
          </div>


          <div class="avl-list-cont">
            <input type="checkbox" id="cbox-down-pq">
            <div id="available-pq-list">
              <ul class="avl-pq-top">
                <div class="avl-pq-nm">
                  <a href="#" id="high_q2">
                    <li><i class="fa-sharp fa-solid fa-circle-down"></i>1080P</li>
                  </a>
                </div>
                <div class="avl-pq-nm">
                  <a href="#" id="medium_q2">
                    <li><i class="fa-sharp fa-solid fa-circle-down"></i>720P</li>
                  </a>
                </div>
                <div class="avl-pq-nm">
                  <a href="#" id="low_q2">
                    <li><i class="fa-sharp fa-solid fa-circle-down"></i>480P</li>
                  </a>
                </div>
              </ul>
            </div>
          </div>


          <hr class="underline-sep">



          <div class="last-dec">
            <p>
              <span>DESCRIPTION: :</span>
              <span id="desc">

              </span>
            </p>

          </div>

          <!-- RESPONSIVE AD START -->
          <div class="area-ad">
            <center>

              <p> Responsive Ad</p>

            </center>
          </div>
          <!-- RESPONSIVE AD END -->

          <div class="bottom-txt">


            <div class="bottom-box-div">
              <div class="bottom-box">

                <h3><i class="fa-solid fa-crown"></i>Thank For Visit<i class="fa-solid fa-crown"></i></h3>

              </div>
            </div>
            <div class="copyright-info">
              <p>
                2023 © <span>
                  <a href="#">abc.com </a></span> | All Rights Reserved.
              </p>

            </div>

            <div class="btm-dis-gp">
              <div class="bdg-sub">
                <a href="/desclaimer.html">
                  Disclaimer
                </a>
              </div>
              <div class="bdg-sub">
                <a href="#">
                  Join Our Group !
                </a>

              </div>
              <div class="bdg-sub">
                <a href="/how-2-dl.html">
                  How To Download ?
                </a>
              </div>
              <div class="bdg-sub">
                <a href="/movie-request.html">
                  Movie Request Page
                </a>
              </div>
            </div>
          </div>
    </div>
  </div>
  <!-- SCRIPT -->
  <script>
    const searchIcon = document.querySelector(\'.search-icon\');

    searchIcon.addEventListener(\'click\', function() {
      this.classList.toggle(\'active\');
    });
  </script>
  <script src="/scripts/script.js"></script>
  <script>
    fetch(json_url).then(Response => Response.json()).then((data) => {
      let movie_arry = (data.filter(ele => {
        // Change this only
        return ele.name === "' . $title . '";
      }));
   // Do Not Change Anything Below 
      document.getElementById(\'title\').innerText = movie_arry[0].name;
      document.getElementById(\'gen\').innerText = movie_arry[0].genre;
      document.getElementById(\'date\').innerText = movie_arry[0].date;
      document.getElementById(\'lan\').innerText = movie_arry[0].lan;
      document.getElementById(\'audio\').innerText = movie_arry[0].audio;
      document.getElementById(\'desc\').innerText = movie_arry[0].desc;
      document.getElementById(\'poster_mv\').src = movie_arry[0].poster;
      document.getElementById(\'sshot\').src = movie_arry[0].sshot;
      document.getElementById(\'high_q\').href = movie_arry[0].high;
      document.getElementById(\'medium_q\').href = movie_arry[0].medium;
      document.getElementById(\'low_q\').href = movie_arry[0].low;
      document.getElementById(\'high_q2\').href = movie_arry[0].high;
      document.getElementById(\'medium_q2\').href = movie_arry[0].medium;
      document.getElementById(\'low_q2\').href = movie_arry[0].low;
      document.getElementById(\'releated_date\').innerText = movie_arry[0].date;
      document.getElementById(\'first_info_mv\').innerHTML = `<a href="/catagory-pages/${movie_arry[0].genre}.html">${movie_arry[0].genre}</a>`;
      document.getElementById(\'second_info_mv\').innerHTML = `<a href="/catagory-pages/${movie_arry[0].type}.html">${movie_arry[0].type}</a>`;
      document.getElementById(\'third_info_mv\').innerHTML = `<a href="/catagory-pages/${movie_arry[0].lan}.html">${movie_arry[0].lan}</a>`;
      document.title = "abcmovies - " + movie_arry[0].name;
    });
  </script>

</body>

</html>';
    
// Clear file contents
    file_put_contents($file_path, "");
    // Write HTML code to file
    file_put_contents($file_path, $html);
  }

  // Call the function to create the HTML file
  create_movie_html($title);

  // Redirect to the homepage
  header('Location: upload.html');

}

?>
