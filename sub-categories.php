<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halfkg - Organic, Healthy, and Eco-Friendly Groceries</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="./img/fav.svg">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="reset.css">

</head>

<body>
  <div class="d-flex flex-column justify-content-between main-body py-4">


    <?php
    if (isset($_GET['sub-category'])) {
      $sub_category = $_GET['sub-category'];
      // print($category);
      // Do something with the category parameter
    
      $api_key = 'patjPm0Xom3rKxbc2.e62e1e66195a6c9f8f7e20e043622e6d2f6667c9904919142faf0013e7718b04'; // replace with your Airtable API key
      $base_id = 'appttPmFTvYcBaktb'; // replace with your Airtable base ID
      $table_name = 'tblxrLasUV9sDBdbQ'; // replace with your Airtable table name
    
      // set up API endpoint URL
      // $url = 'https://api.airtable.com/v0/appttPmFTvYcBaktb/tblxrLasUV9sDBdbQ?filterByFormula=({categorycode}="'.$sub_category.'")&fields[]=fld8nQhyGBzFyBS2N&fields[]=fld8nQhyGBzFyBS2N&fields[]=fldC9eRGrCj6ZTAtq';
      // $url = 'https://api.airtable.com/v0/appttPmFTvYcBaktb/tbl99n5BqHp10Qs3K?filterByFormula=({sub-category}="' . $sub_category . '")&fields[]=fld8XXbW2NBFX6Fx1&fields[]=fld42FDkyg2WV8Q3e&fields[]=fldgbFBBOZ0DN6zIa';
      $url = 'https://api.airtable.com/v0/appttPmFTvYcBaktb/tbl99n5BqHp10Qs3K?filterByFormula=({productcode}="' . $sub_category . '")&fields[]=fld8XXbW2NBFX6Fx1&fields[]=fld42FDkyg2WV8Q3e&fields[]=fldgbFBBOZ0DN6zIa&fields[]=fldaDYIrv3IVUQBG3';

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
    }
    ;
    $data = json_decode($response, true);
    // var_dump($data);
    // echo $url;
    // var_dump($sub_category);
    ?>
    <div>
    
      <div class="container d-flex align-items-center justify-content-between py-4">
        <a href="/"><span class="c-fs-2 c-text-col-one">
            < Home</span></a>
        <span class="c-fs-2 c-text-col-one text-capitalize">
          <?php 
          $replacedString = str_replace('-', ' ', $sub_category);
          echo $replacedString;
          ?>
        </span>
        <span>

      </div>
      <div
        class="container px-4 d-flex flex-wrap gap-sm-4 gap-md-5 gap-3  justify-content-between justify-content-sm-start mt-3">
        <?php foreach ($data['records'] as $record): ?>
          <?php $product_url = preg_replace('/[ &\/]/', '-', strtolower($record['fields']['Handle'])); ?>

           <a href="/products.php?product=<?php echo $product_url; ?> ">
            <div class="d-flex flex-column gap-3 px-4 c-cat-bg rounded justify-content-center align-items-start">
              <h2 class="cat-text">
                <?php echo $record['fields']['Product Title'] ?>
              </h2>
              <p class="c-fs-5 c-text-col-two c-f-b">
                Rich In :
                <?php
                $names = $record['fields']['Rich_in_Text'];
                if (empty($names)) {
                  echo "No rich in found.";
              } else {
                  echo $names;
              }
                ?>
              </p>
            </div>
            </a>

          
        <?php endforeach; ?>
      </div>

    </div>
    <div>
      <div class="container my-4">
        <h2 class="c-fs-1 c-f-b smart-text">Shop Smart. Live Well</h2>
      </div>




      <div class="footer-bg col-12">
        <div class=" flex-wrap container  py-4 gap-3 d-flex justify-content-between">
          <div class="flex-wrap d-flex gap-3">
            <a class="f-link" href="#"> About Us</a>
            <span class="f-link">|</span>
            <a class="f-link" href="#">Contact Us</a>
            <span class="f-link">|</span>
            <a class="f-link" href="#">Privacy Policy</a>
            <span class="f-link">|</span>
            <a class="f-link" href="#"> Terms & Conditions</a>
            <span class="f-link">|</span>
            <a class="f-link" href="#">Are you a Brand?</a>
            <span class="f-link">|</span>
            <a class="f-link" href="#">Are you a Retailer?</a>
          </div>
          <div class="d-flex gap-3">
            <a class="f-link" href="#"><img src="./img/youtube.svg"></a>
            <a class="f-link" href="#"><img src="./img/insta.svg"></a>
            <a class="f-link" href="#"><img src="./img/twitter.svg"></a>


          </div>

        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>

</html>