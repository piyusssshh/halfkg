<!DOCTYPE html>
<html>

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
  <?php
  if (isset($_GET['product'])) {
    $product = $_GET['product'];
    // Do something with the category parameter
  
    $api_key = 'patjPm0Xom3rKxbc2.e62e1e66195a6c9f8f7e20e043622e6d2f6667c9904919142faf0013e7718b04'; // replace with your Airtable API key
    $base_id = 'appttPmFTvYcBaktb'; // replace with your Airtable base ID
    $table_name = 'tblxrLasUV9sDBdbQ'; // replace with your Airtable table name
  
    // set up API endpoint URL
    $url = 'https://api.airtable.com/v0/appttPmFTvYcBaktb/tblxrLasUV9sDBdbQ?filterByFormula=({productcode}="' . $product . '")&fields%5B%5D=flds4w76OuMT0kh6p&fields%5B%5D=fldCVY4pIbSQ85709&fields%5B%5D=fldWfc5kAZ5aK4U8u&fields%5B%5D=fld8nQhyGBzFyBS2N';
    // var_dump($url);
  
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
    // var_dump($response);
  
    $data = json_decode($response, true);
  }
  ?>
  <?php foreach ($data['records'] as $record): ?>
    <div class="container d-flex align-items-center justify-content-between py-4">
      <a href="/"><span class="c-fs-3 c-text-col-one">
          < Home</span></a>
      <span class="c-fs-2 c-text-col-one text-capitalize">
        <?php echo $record['fields']['End product'] ?>
      </span>
      <span>

    </div>
    <div class="container rounded pro-cont p-4 d-flex">
      <div class="col-4">

      </div>
      <div class="col-8">
        <h3 class=" c-f-b-b c-fs-6">
          Uses of
          <?php echo $record['fields']['End product'] ?> :
        </h3>
        <p class="c-fs-6 mt-2">
          <?php echo $record['fields']['Description'] ?>
        </p>
        <h3 class="c-f-b-b c-fs-6 mt-3">
          Rich in :
        </h3>
        <p class="c-fs-6 mt-2">
          <?php
          $names = $record['fields']['Rich in'];
          if (is_array($names)) {
            $nameString = implode(', ', $names);
            echo $nameString, "here";
          } else {
            echo "No names found.";
          }
          ?>
        </p>
      </div>
    </div>
  <?php endforeach; ?>
  <div>
    <div class="container my-4">
      <h2 class="c-fs-1 c-f-b smart-text">Shop Smart. Live Smart</h2>
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

</body>

</html>