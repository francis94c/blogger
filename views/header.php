<head>
  <?php
  $app =& get_app_instance();
  ?>
  <title><?=isset($title) ? $title : "Blogger App"?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-<?=$app->fetch_param("w3_theme", "teal")?>.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
  <style>
  a.link{text-decoration: none;}
  a.white-link{color: white;}
  a.black-link{color: black;}
  body{font-family:'Source Code Pro',monospace;}
  .zoom {background-size:cover;background-repeat:no-repeat;-webkit-transition:all 10s;
  -moz-transition:all 10s;-o-transition: all 10s;transition:all 10s;min-height:500px;}
  .blink{animation: blink 1s steps(2,start) infinite;-webkit-animation:blink 1s steps(2,start)infinite;}
  @keyframes blink{to{visibility:hidden;}}
  @-webkit-keyframes blink{to{visibility:hidden;}}
  </style>
</head>
<body class="<?=isset($color) ? "$color": ""?>">
  <div class="w3-bar w3-card w3-theme">
    <a href="<?=app_url()?>" class="w3-bar-item link">
      <i class="fab fa-blogger-b fa-4x"></i>
    </a>
    <span class="w3-bar-item w3-margin-top w3-large w3-mobile"><?=isset($header_name) ? $header_name : "Blog"?></span>
  </div>
