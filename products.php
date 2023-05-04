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
      
      /* Define the motivational line's position */
      #motivational-line {
        text-align: center;
        margin: 20px;
      }
    </style>
  </head>
  <body>
    <h1>Halfkg</h1>
    <h2>Organic, Healthy, and Eco-Friendly Groceries</h2>
    <div id="motivational-line">
      <p>Shop smart. Live well.</p>
    </div>

<?php

if (isset($_GET['product'])) {
    $product = $_GET['product'];
    // Do something with the category parameter

  $api_key = 'patjPm0Xom3rKxbc2.e62e1e66195a6c9f8f7e20e043622e6d2f6667c9904919142faf0013e7718b04'; // replace with your Airtable API key
  $base_id = 'appttPmFTvYcBaktb'; // replace with your Airtable base ID
  $table_name = 'tbl99n5BqHp10Qs3K'; // replace with your Airtable table name

  // set up API endpoint URL
  $url = 'https://api.airtable.com/v0/' . $base_id . '/' . $table_name . '?filterByFormula=({productcode}="'. $product .'")&fields%5B%5D=flduS8yz2fsXVZEkE&fields%5B%5D=fldcirNHK7G1yUfj9&fields%5B%5D=fldsUrLFBKojwcO7D';


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

echo '<div style="display:flex;justify-content:center;">'; // center align cards

foreach ($data['records'] as $record) {
    $image = isset($record['fields']['Images from Link']) ? $record['fields']['Images from Link'] : 'https://via.placeholder.com/300x200.png?text=No+Image';
    echo '<div style="width: 200px;margin: 10px;text-align: center;">'; // set card width and margin, and center align card content
    echo '<img src="' . $image . '" style="max-width:100px;max-height:100px;">'; // set max width and height of image
    echo '<div>';
    echo '<h4>' . $record['fields']['Product name (S>A)'] . '</h4>';
    echo '<p>' . implode(', ', $record['fields']['Vendor']) . '</p>';
    echo '</div>';
    echo '</div>';
}

echo '</div>';

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