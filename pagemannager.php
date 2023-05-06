<?php
// Get the current page number from the URL
$pageNumber = 1;
$currentPath = trim($_SERVER['REQUEST_URI'], '/');
if (preg_match('/(\d+)\.html$/', $currentPath, $matches)) {
    $pageNumber = intval($matches[1]);
}

// Set the maximum number of items per page
$itemsPerPage = 20;

// Load the JSON data
$json = file_get_contents('data.json');
$data = json_decode($json, true);

// Split the data into pages
$numPages = ceil(count($data) / $itemsPerPage);
if ($pageNumber > $numPages) {
    header('Location: ' . ($numPages > 1 ? $numPages . '.html' : 'index.html'));
    exit;
}

$startIndex = ($pageNumber - 1) * $itemsPerPage;
$pageData = array_slice($data, $startIndex, $itemsPerPage);

// Generate the HTML output for the current page
$html = '
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/db5e68f97f.js" crossorigin="anonymous"></script>

  <title>ABC MOVIES</title>
<link rel="icon" type="image/x-icon" href="/img/web-icon.ico">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/movie-home.css">
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
  <!-- Search start -->
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
  <!-- Search End -->
  
  
  <div class="main">
  <!-- Sidebar menu start -->
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
    <a href="/catagory-pages/Bollywood.html">
 <li class="list-cont">Bolly Wood</li>
          </a>
        </div>
  <div class="click-box">
   <a href="/catagory-pages/Dual.html">
   <li class="list-cont">Dual Audio</li>
          </a>
        </div>
  <div class="click-box">
          <a href="/catagory-pages/Dubbed.html">
  <li class="list-cont">Hindi Dubbed</li>
          </a>
        </div>
   <div class="click-box">
          <a href="/catagory-pages/South.html">
 <li class="list-cont">South Movies</li>
          </a>
        </div>
    <div class="click-box">
      <a href="/catagory-pages/Webseries.html">
   <li class="list-cont">WEB-Series</li>
      </a>
    </div>
    <div class="click-box">
      <a href="/catagory-pages/Si-fi.html">
            <li class="list-cont">Si-Fi</li>
          </a>
        </div>
        <div class="click-box">
          <a href="/catagory-pages/UnOfficial-dubbed.html">
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
 <!-- sidebar menu end -->
    
    <!-- RESPONSIVE AD START -->
<div class="area-ad">
  <center>
    
    <p> Responsive Ad</p>
    
  </center>
 </div>
  <!-- RESPONSIVE AD END -->
     
 <div class="dtl-box">
   <i class="fa-solid fa-fire"></i>
   Latest Movies
 </div>
 
 
   <!-- ALL MOVIES PUT HERE -->
 <div class="movies_chart">
<!--

  <a href="#" class="movie_cards">
 <img src="/movie-contents/image1.jpg">
<div class="mv-card-title">
  <h5>
    Writer Padmabhushan (2023) WEB-DL Hindi (HQ-Dub) 1080p 720p & 480p [x264/HEVC] | Full Movie
  </h5>
</div>
  </a-->
 </div>
 <!-- MOVIES END -->
 
<!-- pagination start-->
 <div class="pages-list">
<ul id="page_box_btn">

</ul>

 </div>
 <!-- pagination end-->

         <!-- RESPONSIVE AD START -->
<div class="area-ad">
  <center>
    
    <p> Responsive Ad</p>
    
  </center>
 </div>
  <!-- RESPONSIVE AD END -->
  
   <!-- Footer start -->
   <div class="bottom-txt">
  <div class="bottom-box-div">
    <div class="bottom-box">
   <h3><i class="fa-solid fa-crown"></i>Thank For Visit<i class="fa-solid fa-crown"></i></h3>
 </div>
 </div>
 
      <div class="copyright-info">
            <p>
   2023 © <span> 
   <a href="#">flimflix.com </a></span> | All Rights Reserved.
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
<!-- Footer end -->

  </div>
  <!-- script -->

<script>
const searchIcon = document.querySelector(\'.search-icon\');

searchIcon.addEventListener(\'click\', function() {
  this.classList.toggle(\'active\');
});
</script>

<script src="/scripts/script.js"></script>
<script>

let movie_cards = document.getElementsByClassName(\'movie_cards\');
let movies_chart = document.getElementsByClassName(\'movies_chart\')[0];

fetch(json_url)
.then(response => response.json())
.then(data => {
data.slice(0, 6).forEach((ele, i) => {
let { name, poster, date, url } = ele;
let movie_cards = document.createElement(\'a\');
movie_cards.classList.add(\'movie_cards\');
movie_cards.href = `/movies/${name.toLowerCase().replace(/\s+/g, '-')}.html`;
movie_cards.innerHTML = `
<img src="${poster}" class="movie_cards_img">
<div class="mv-card-title">
  <h5>
    ${name} (${date}) WEB-DL Hindi (HQ-Dub) 1080p 720p & 480p [x264/HEVC] | Full Movie
  </h5>
</div>
`;
movies_chart.appendChild(movie_cards);
});
});

</script>
<script src="/scripts/pagination.js"></script>
</body>

</html>
';
foreach ($pageData as $item) {
    // Generate HTML for each item in the current page
    $html .= '<div>' . $item['title'] . '</div>';
}

// Write the HTML output to a file
$pageFilename = $pageNumber . '.html';
$pagePath = 'pages/' . $pageFilename;
file_put_contents($pagePath, $html);

// Write the pagination HTML to a file
$paginationPath = 'pagination.html';
file_put_contents($paginationPath, $paginationHtml);

// Create new pages if necessary
$totalPages = count(glob('pages/*.html'));
if ($numPages > $totalPages) {
    for ($i = $totalPages + 1; $i <= $numPages; $i++) {
        $newPageFilename = $i . '.html';
        $newPagePath = 'pages/' . $newPageFilename;
        $newStartIndex = ($i - 1) * $itemsPerPage;
        $newPageData = array_slice($data, $newStartIndex, $itemsPerPage);
        $newHtml = '';
        foreach ($newPageData as $item) {
            $newHtml .= '<div>' . $item['title'] . '</div>';
        }
        file_put_contents($newPagePath, $newHtml);
    }
}
?>
