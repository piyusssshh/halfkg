<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halfkg - Organic, Healthy, and Eco-Friendly Groceries</title>
    <style>
      /* Define the website's primary colors */
      body {
        background-color: #dfdfd8;
      }
      h1, h2 {
        color: #17433c;
      }
      /* Define the QR code's size and position */
      #qr-code {
        margin: auto;
        display: block;
        width: 50%;
        max-width: 300px;
      }
      /* Define the motivational line's position */
      #motivational-line {
        text-align: center;
        margin: 20px;
      }
        .card {
            width: 300px;
            height: 350px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            margin: 20px;
            float: left;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            padding: 2px 16px;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        h4 {
            font-size: 1.2em;
            margin-top: 10px;
        }

        p {
            margin: 10px 0;
            font-size: 0.9em;
        }
</style>
  </head>
  <body>
    <h1>Halfkg</h1>
    <h2>Organic, Healthy, and Eco-Friendly Groceries</h2>
    <div id="qr-code">
      <img src="https://chart.googleapis.com/chart?cht=qr&chl=https%3A%2F%2Fapp.halfkg.store&chs=180x180&choe=UTF-8&chld=L|2" alt="Download Halfkg's mobile app">
    </div>
    <div id="motivational-line">
      <p>Shop smart. Live well.</p>
    </div>

<?php

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    // Do something with the category parameter

  $api_key = 'patjPm0Xom3rKxbc2.e62e1e66195a6c9f8f7e20e043622e6d2f6667c9904919142faf0013e7718b04'; // replace with your Airtable API key
  $base_id = 'appttPmFTvYcBaktb'; // replace with your Airtable base ID
  $table_name = 'tblxrLasUV9sDBdbQ'; // replace with your Airtable table name

  // set up API endpoint URL
  $url = 'https://api.airtable.com/v0/' . $base_id . '/' . $table_name . '?filterByFormula=({categorycode}="'. $category .'")&fields%5B%5D=fld8nQhyGBzFyBS2N&fields%5B%5D=flduBp6mPcgpElqhC&fields%5B%5D=fld9i6vp72i91b7Vu&fields%5B%5D=flds4w76OuMT0kh6p';


  // set up request headers
  $headers = [
      'Authorization: Bearer ' . $api_key,
      'Content-Type: application/json'
  ];

  // make API request
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);

    $data = json_decode($response, true);

    echo '<div class="center">';


    foreach ($data['records'] as $record) {
        $product_url = preg_replace('/[ &\/]/', '-', strtolower($record['fields']['End product']));
        echo '<a href="http://halfkg.store/products.php?product=' . $product_url . '">';
        echo '<div class="card">';
        if (isset($record['fields']['image'])) {
            echo '<img src="' . $record['fields']['image'] . '">';
        } else {
            echo '<img src="https://via.placeholder.com/300x200.png?text=No+Image">';
        }
        echo '<div class="container">';
        echo '<h4>' . $record['fields']['End product'] . '</h4>';
        echo '<p>Rich in: ' . implode(', ', $record['fields']['Rich in']) . '</p>';
        echo '</div>';
        echo '</a>';
      }

}
?>



</body>

<footer>
  <nav>
    <ul>
      <li><a href="/policies/privacy-policy">Privacy Policy</a></li>
      <li><a href="/about-us">About Us</a></li>
      <li><a href="/contact-us">Contact Us</a></li>
    </ul>
  </nav>
  <p>&copy; 2023 Halfkg. All rights reserved.</p>
</footer>

</html>













       
