<?php
// José Antonio Rosales
$url = 'https://api.nasa.gov/planetary/apod?api_key=N3lpiKRo3n1gD2s5X8Qk7PefxGe3817tJNCZ9DGC';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);


if ($response) {
  $data = json_decode($response);

  if ($data !== null) {
    $image_url = $data->hdurl;
    $title = $data->title;
    $date = $data->date;
    $desc = $data->explanation;
  }
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Astronomy Picture of the Day</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" />
  <script src="https://kit.fontawesome.com/a41d3240c2.js" crossorigin="anonymous"></script>
</head>

<body>

  <main class="container">
    <nav aria-label="breadcrumb">
      <ul>
        <li><a href="https://www.nasa.gov/">NASA</a></li>
        <li><a href="https://api.nasa.gov/">APIs</a></li>
        <li>Astronomy Picture of the Day</li>
      </ul>
    </nav>
    <article style="margin-top: 0px;">

      <hgroup>
        <h2><?php echo $title; ?></h2>
        <h3><?php echo date("F d, Y", strtotime($date)); ?></h3>
      </hgroup>

      <img src="<?php echo $image_url; ?>" alt="NASA Picture of the Day" style="margin-bottom: 2em;">

      <details>
        <summary role="button" class="contrast"> Explanation</summary>
        <p><?php echo $desc; ?></p>
      </details>

      <p><button role="button" id="themeButton" class="contrast" data-tooltip="Toggle theme" style="width: auto; height: auto; float: left; margin-right: 20px;"><i class="fa-solid fa-circle-half-stroke"></i></button></p>
      <div>
        <div style="float: left; clear: none;">
          <p>By José Antonio Rosales &copy;</p>
        </div>
        <div style="float: right; clear: none;">
          <a target="_blank" href="https://www.instagram.com/antonnn_o/" class="secondary"><i class="fa-brands fa-instagram fa-xl"></i></a>
          <a target="_blank" href="https://www.linkedin.com/in/antonio-rosales-207793263/" class="secondary"><i class="fa-brands fa-linkedin fa-xl"></i></a>
          <a target="_blank" href="https://github.com/xrimsonn/" class="secondary"><i class="fa-brands fa-github fa-xl"></i></a>
        </div>
      </div>

    </article>
  </main>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const themeButton = document.getElementById("themeButton");
      const themeStatus = document.getElementById("themeStatus");
      const htmlElement = document.documentElement;

      themeButton.addEventListener("click", function() {
        if (htmlElement.getAttribute("data-theme") === "light") {
          htmlElement.setAttribute("data-theme", "dark");
          themeStatus.textContent = "Dark";
        } else {
          htmlElement.setAttribute("data-theme", "light");
          themeStatus.textContent = "Light";
        }
      });
    });
  </script>
</body>

</html>