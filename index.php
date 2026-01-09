<?php

$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "hitv";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$movie_sql = "SELECT * FROM movies WHERE id = 1";
$movie_results = $conn->query($movie_sql);

$movie = $movie_results->fetch_assoc();

$stars_sql = "SELECT name FROM stars WHERE movie_id = 1";
$stars_results = $conn->query($stars_sql);




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    />
    <!-- CSS  -->
    <link rel="stylesheet" href="CSS/hitv.css" />

    <!-- Icon -->
     <link rel="icon" href="img/logo.png">
    <title>Hi-Tv</title>
  </head>
  <body>
    <div class="book">
      <div class="left">
        <img src="<?php echo $movie['image'] ?>" alt="<?php echo $movie['name'] ?>" />
        <div class="play">
          <i class="bi bi-play-fill" id="play"></i>
        </div>
        <div class="cont">
          <h6>Directed by:</h6>
          <p><?php echo $movie['director'] ?></p>
          <h6>Starring:</h6>
          <p>
            <?php
            $stars = [];
            while ($star = $stars_results->fetch_assoc()) {
                $stars[] = $star['name'];
            }
            echo implode(" / ", $stars);
            ?>
          </p>
          <h6>Edited by:</h6>
          <p><?php echo $movie['editor'] ?></p>
        </div>
      </div>

      <div class="right">
        <video src="<?php echo $movie['video'] ?>" id="video"></video>
        <div class="cover">
          <div class="head-time">
            <h3><?php echo $movie['name'] ?></h3>
            <div class="time">
              <h6><i class="bi bi-clock"></i><?php echo $movie['duration'] ?> minutes</h6>
              <button><?php echo $movie['rating'] ?></button>
            </div>
          </div>

          <div class="data-type">
            <div class="left-card">
              <h6 class="title">Thursday 4 May</h6>
              <div class="crd">
                
                <li>
                  <h6>Thu</h6>
                  <h6 class="date-point">30</h6>
                </li>
                <li>
                  <h6>Fri</h6>
                  <h6 class="date-point">1</h6>
                </li>
                <li>
                  <h6>Sat</h6>
                  <h6 class="date-point">2</h6>
                </li>
                <li>
                  <h6>Sun</h6>
                  <h6 class="date-point">3</h6>
                </li>
                <li>
                  <h6>Mon</h6>
                  <h6 class="date-point">4</h6>
                </li>
                <li>
                  <h6>Tue</h6>
                  <h6 class="date-point">5</h6>
                </li>
                <li>
                  <h6>Wed</h6>
                  <h6 class="date-point">6</h6>
                </li>
                <li>
                  <h6>Thu</h6>
                  <h6 class="date-point">7</h6>
                </li>
                <li>
                  <h6>Fri</h6>
                  <h6 class="date-point">8</h6>
                </li>
                <li>
                  <h6>Sat</h6>
                  <h6 class="date-point">9</h6>
                </li>
                <li>
                  <h6>Sun</h6>
                  <h6 class="date-point">10</h6>
                </li>
                <li>
                  <h6>Mon</h6>
                  <h6 class="date-point">11</h6>
                </li>
                <li>
                  <h6>Tue</h6>
                  <h6 class="date-point">12</h6>
                </li>
                <li>
                  <h6>Wed</h6>
                  <h6 class="date-point">13</h6>
                </li>
                <li>
                  <h6>Thu</h6>
                  <h6 class="date-point">14</h6>
                </li>
                <li>
                  <h6>Fri</h6>
                  <h6 class="date-point">15</h6>
                </li>
                <li>
                  <h6>Sat</h6>
                  <h6 class="date-point">16</h6>
                </li>
                <li>
                  <h6>Sun</h6>
                  <h6 class="date-point">17</h6>
                </li>
                <li>
                  <h6>Mon</h6>
                  <h6 class="date-point">18</h6>
                </li>
              </div>
            </div>

            <div class="right-card crd">
              <h6 class="title">Show Time</h6>
              <div class="crd">
                <li>
                  <h6>2D</h6>
                  <h6>10:00</h6>
                </li>
                <li>
                  <h6>2D</h6>
                  <h6>12:30</h6>
                </li>
                <li>
                  <h6>2D</h6>
                  <h6>12:30</h6>
                </li>
                <li>
                  <h6>2D</h6>
                  <h6>12:30</h6>
                </li>
                <li>
                  <h6>2D</h6>
                  <h6>12:30</h6>
                </li>
                <li>
                  <h6>3D</h6>
                  <h6>9:00</h6>
                </li>
                <li>
                  <h6>3D</h6>
                  <h6>11:30</h6>
                </li>
                <li>
                  <h6>3D</h6>
                  <h6>8:00</h6>
                </li>
                <li>
                  <h6>4D</h6>
                  <h6 class="h6_active">10:30</h6>
                </li>
                <li>
                  <h6>4D</h6>
                  <h6>1:00</h6>
                </li>
                <li>
                  <h6>4D</h6>
                  <h6>12:30</h6>
                </li>
                <li>
                  <h6>3D</h6>
                  <h6>2:30</h6>
                </li>
                <li>
                  <h6>4D</h6>
                  <h6>11:00</h6>
                </li>
                <li>
                  <h6>3D</h6>
                  <h6>12:30</h6>
                </li>
              </div>
            </div>
          </div>

          <div class="screen" id="screen">
            <p>Screen</p>
          </div>

          <!-- Chairs -->
            <div class="chair" id="chair">
        
           </div>

           <!-- ticket -->
            <div class="ticket" id="ticket">
              <div class="tic"></div>
            </div>
                


           <!-- Details -->
            <div class="details" id="det">
                <div class="det-chair" id="det-chair">
                    <li>Avaliable</li>
                    <li>Booked</li>
                    <li>Select</li>
                </div>
            </div>
            <button class="book-tic" id="book-tic">
                 <i class="bi bi-arrow-right"></i>
             </button>
             
             <button class="back-tic" id="back-tic"> 
                 <i class="bi bi-arrow-left"></i>
             </button>
        </div>
      
    </div>

    <script src="JS/hitv.js"></script>
    <!-- Barcode -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.12.1/JsBarcode.all.js" integrity="sha512-iKSej9nrLjdo6RKseKJcAZgTLj6ESwnUjj/vEFhuDhNTzULrk5RBPWeG2YIVWcI6hAIEccsY9Qf6+g39jpDfnw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        JsBarcode("#barcode", "J18800792025");
    </script>
  </body>
</html>
