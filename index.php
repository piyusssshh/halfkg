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
    <nav class="c-navbar d-flex">
        <div class=" px-1 px-md-0 container align-items-center text-dark justify-content-center my-auto d-flex">
            <p class=" c-fs-4 d-md-block d-none">Join 1000+ families on the journey of healthy & Eco-friendly lifestyle
            </p>
            <div class=" d-flex gap-3  justify-content-center col-12 col-sm-7 col-md-6 col-lg-6 col-xl-5">
                <a href="https://goo.gl/maps/MGG2znqEbQMihnoT7" target="_blank">
                <button class="c-btn btn c-btn-primary c-fs-6  py-2 px-3 px-sm-4">Get Directions</button>
                </a>
                <a href="https://app.halfkg.store" target="_blank">
                <button class="c-btn btn c-btn-seccond c-fs-6  py-2 px-3 px-sm-4">Download App</button>
                </a>
            </div>
        </div>
    </nav>
    <a href="https://wa.me/+917024100855" target="_blank">
        <img src="./img/chat-w.svg" class="chat-w d-none d-lg-block">
        <a href="https://wa.me/+917024100855" target="_blank">
    <img src="./img/chat-sm.svg" class="d-blovk d-lg-none chat-w"></a>
    <div class="d-flex">
        <img class="halfkg-logo mx-auto" src="./img/halfkg-logo.svg" alt="Halfkg">
    </div>
    <div class="container hero-sec d-flex justify-content-between px-4">
        <div class="w-100 h-auto d-flex flex-column justify-content-start justify-content-md-center">
            <div>
                <span>BEST</span>
                <span>🌾</span>
                <span>🥗</span>
                <SPAN> AND LOWEST</SPAN>
                <SPAN>💰</SPAN>
            </div>
            <h1 class=" c-fs-1 c-text-col-one c-f-h-b mt-1">Give the premium fuel to your body,<br> for extra mileage. </h1>
            <p class="c-fs-3 c-text-col-one c-f-b mt-4 mt-md-5 pt-2 pt-md-3 pt-md-4 ">Buy with expert research,<br>not with impulse.</p>
            <div class="d-flex justify-content-center justify-content-sm-start gap-2 gap-md-3  mt-2 mt-md-2">
                <a href="https://play.google.com/store/apps/details?id=com.walkover.halfkg" class="app-store-btn">
                    <div class="bg-white w-100  c-fs-1 px-3 px-md-3 py-1 py-sm-2 rounded justify-content-center d-flex">
                        <img class="app-store-logo " src="./img/playstore-logo.svg">
                        <div flex-column
                            class="ms-1  c-text-col-two h-100 d-flex flex-column justify-content-between">
                            <p class="c-fs-5 c-f-b text-uppercase ">Get it on </p>
                            <p class="c-fs-4 c-f-b-b ">Google Play</p>

                        </div>
                    </div>
                </a>
                        <a href="https://play.google.com/store/apps/details?id=com.walkover.halfkg"
                            class="app-store-btn">
                            <div class="bg-white w-100 c-fs-1 px-3 px-md-3 py-1 py-sm-2 rounded  justify-content-center d-flex">
                                <img class="app-store-logo " src="./img/appstore-ico.svg">
                                <div flex-column
                                    class="ms-1 c-text-col-two h-100 d-flex flex-column justify-content-between">
                                    <p class="c-fs-5 c-f-b text-uppercase">Download on the</p>
                                    <p class="c-fs-4 c-f-b-b">App Store</p>
                                </div>
                            </div>
                        </a>
            </div>

        </div>
        <div class="d-none d-lg-flex ms-auto">
            <img class="qr-code" src="./img/qr-code.svg" alt="Halfkg QR code for mobile app download">
        </div>
    </div>
    <div class="container d-flex px-4">
        <h3>Explore Our Curations</h3>
        <img class="col-2 d-none d-md-block" src="./img/arrow-img.png" alt="">
    </div>




<?php
$api_key = 'patjPm0Xom3rKxbc2.e62e1e66195a6c9f8f7e20e043622e6d2f6667c9904919142faf0013e7718b04'; // replace with your Airtable API key
$base_id = 'appttPmFTvYcBaktb'; // replace with your Airtable base ID
$table_name = 'tbllmWBpWIm117t7v'; // replace with your Airtable table name

// set up API endpoint URL
$url = 'https://api.airtable.com/v0/' . $base_id . '/' . $table_name . '?maxRecords=1000&fields%5B%5D=fldufkrlAlbeDJuKC&fields%5B%5D=fldt56Q0y2QmROucZ';

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


$json = $response;

$data = json_decode($json, true);

// Sort by category A to Z
usort($data['records'], function($a, $b) {
    return strcmp($a['fields']['Category'], $b['fields']['Category']);
});

?>

<div class="container px-4 d-flex flex-wrap gap-sm-4 gap-md-5 gap-3 justify-content-between justify-content-sm-start mt-3">
    <?php foreach ($data['records'] as $record): ?>
        <?php $category_url = preg_replace('/\s|&/', '-', strtolower($record['fields']['Category'])); ?>
        <a href="http://halfkg.store/categories.php?category=<?php echo $category_url; ?>">
        	<div class="d-flex gap-3 px-4 c-cat-bg rounded justify-content-start align-items-center">
            <img class="catico" id="catimg" src="<?php echo $record['fields']['Image'] ?>" alt="<?php echo $record['fields']['Category'] ?>" >
            <h2 class="cat-text"><?php echo $record['fields']['Category'] ?></h2>
        </div>
    </a>
    <?php endforeach; ?>
</div>



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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>

</html>



