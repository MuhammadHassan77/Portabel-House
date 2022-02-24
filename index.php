<?php
require("./func.php");
if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM `savechanges` WHERE id='$id'";

  $result = mysqli_query($mysqli, $query);
  foreach ($result as $row) {
    $data = $row['details'];
  }

  // echo $data ."<br> <hr>";
  $detail = json_decode($data);
  // print_r($detail);
  // exit;

  $modelId = $detail->modelId;
  $price = $detail->currentPrice;
  $roof_texture = $detail->roof_texture;
  $roof_wood = $detail->roof_wood;
  $out_wall = $detail->out_wall;
  $in_wall = $detail->in_wall;
  $floor = $detail->floor;
  $window_frame = $detail->window_frame;
  $window_frame_name = $detail->window_frame_name;
  $door = $detail->door;
  $door_name = $detail->door_name;
  $glass = $detail->glass;
  $glass_name = $detail->glass_name;
  $solar = $detail->solar;
  $solar_name = $detail->solar_name;
  $chimney = $detail->chimney;
  $chimney_name = $detail->chimney_name;
  $generator = $detail->generator;
  $generator_name = $detail->generator_name;
  // echo typeof($data);
}
// exit;
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/72a9c1090f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="scss/mystyle.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="./css/custom.css">
  <!-- <script type="text/javascript" src="./js/func.js"></script> -->

  <title>Portable House</title>

  <style>
    .claraplayer span,
    .claraplayer svg {
      display: none !important;
    }
  </style>

</head>

<body>

  <!-- start-header -->
  <header>

    <!-- PAGE LOADER -->
    <div class="loadingDiv">
      <div class="lds-grid">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    <!-- PAGE LOADER END -->


    <nav class="navbar navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="img/logo.png" class="img-fluid w-100 p-0 m-0">
        </a>
      </div>
    </nav>

    <nav class="menu-tabs">
      <ul>
        <li class="navigator" data-tab="#tab-01">
          <img src="./images/model.svg" class="img-fluid w-50 p-0 m-0">
          <p class="tab-text m-0">Models</p>
        </li>
        <li class="navigator" data-tab="#tab-02">
          <img src="./images/walls.svg" class="img-fluid w-50 p-0 m-0">
          <p class="tab-text m-0">materials</p>
        </li>
        <li class="navigator switch-li-1" data-tab="#tab-03">
          <img src="./images/door-n-window.svg" class="img-fluid w-50 p-0 m-0">
          <p class="tab-text m-0">door &<br class="d-none d-sm-none"> window</p>
        </li>
        <li class="navigator switch-li-2 d-none" data-tab="#tab-04">
          <img src="./images/floor.svg" class="img-fluid w-50 p-0 m-0">
          <p class="tab-text m-0">Floor</p>
        </li>
        <li class="tab-switch">
          <p class="tab-text m-0">interior</p>
          <label class="switch">
            <input type="checkbox" checked>
            <span class="slider"></span>
          </label>
          <p class="tab-text toggle-text-btm mb-0">exterior</p>
        </li>

        <div class="enq-save-btn">
          <button type="button" class="btn my-btn savemodel" data-bs-target="#changes-model" data-bs-toggle="modal">Enqury now</button>
        </div>

      </ul>
    </nav>

  </header>
  <!-- end-header -->


  <!-- start-section -->
  <section>

    <!-- start-canvas -->
    <div class="canvas-div">
      <div id="clara-embed" style="width: 100%; height: 100vh;"></div>
      <script src="https://clara.io/js/claraplayer.min.js"></script>
      <!-- <script src="./js/claraplayer.min.js"></script> -->
      <script type="text/javascript" src="./js/var.js"></script>
      <script type="text/javascript" src="./js/func.js"></script>
      <script>
        let clara = claraplayer('clara-embed');
        clara.on('loaded', function() {
          console.log('Clara player is loaded and ready');
          $(".loadingDiv").addClass("d-none");

          <?php if (!empty($modelId)) { ?>
            $(".selectModel[data-modelid='<?= $modelId; ?>']").trigger("click");
            if (`<?= ($price) ?>` != '') $(".total-price").val("<?= ($price) ?>"); $(".dyn-price").text("<?= ($price) ?>"); 

            if (`<?= ($out_wall) ?>` != '') setImage("eXTERIOR", `<?= ($out_wall) ?>`);

            if (`<?= ($in_wall) ?>` != '') setImage("interior", `<?= ($in_wall) ?>`);

            if (`<?= ($roof_texture) ?>` != '') setImage("ROOF", `<?= ($roof_texture) ?>`);

            if (`<?= ($roof_wood) ?>` != '') setImage("Roof Wood", `<?= ($roof_wood) ?>`);

            if (`<?= ($floor) ?>` != '') setImage("FLOR", `<?= ($floor) ?>`);

            if (`<?= ($window_frame) ?>` != '') setColor(`<?= ($window_frame_name) ?>`, `<?= ($window_frame) ?>`);

            if (`<?= ($door) ?>` != '' && `<?= ($door) ?>` == "on") showModel(`<?= ($door_name) ?>`);
            if (`<?= ($door) ?>` != '' && `<?= ($door) ?>` == "off") hideModel(`<?= ($door_name) ?>`);

            if (`<?= ($glass) ?>` != '' && `<?= ($glass) ?>` == "on") showModel(`<?= ($glass_name) ?>`);
            if (`<?= ($glass) ?>` != '' && `<?= ($glass) ?>` == "off") hideModel(`<?= ($glass_name) ?>`);

            if (`<?= ($solar) ?>` != '' && `<?= ($solar) ?>` == "on") showModel(`<?= ($solar_name) ?>`);
            if (`<?= ($solar) ?>` != '' && `<?= ($solar) ?>` == "off") hideModel(`<?= ($solar_name) ?>`);


            if (`<?= ($chimney) ?>` != '' && `<?= ($chimney) ?>` == "on") showModel(`<?= ($chimney_name) ?>`);
            if (`<?= ($chimney) ?>` != '' && `<?= ($chimney) ?>` == "off") hideModel(`<?= ($chimney_name) ?>`);

            if (`<?= ($generator) ?>` != '' && `<?= ($generator) ?>` == "on") showModel(`<?= ($generator_name) ?>`);
            if (`<?= ($generator) ?>` != '' && `<?= ($generator) ?>` == "off") hideModel(`<?= ($generator_name) ?>`);



          <?php } else { ?>
            // $(document).ready(() => {
              $(".selectModel").first().trigger("click");
              // let p = $(".selectModel").find("input[type='radio']:checked").parent().parent().data("price");
              $(".total-price").val(p);
              // $(".dyn-price").text(p);
            // })
          <?php } ?>


        });

        // Fetch and initialize the sceneId
        clara.sceneIO.fetchAndUse(model_id);
      </script>
    </div>
    <!-- end-canvas -->


    <!-- start-model-popup -->
    <div class="col-12 col-sm-3 right-popup d-none" id="tab-01">

      <!-- start-model-heading -->
      <div class="row heading-row p-0 m-0">
        <div class="col-1 p-0 m-0">
          <span class="close-btn"><i class="fas fa-times"></i></span>
        </div>
        <div class="col-10 p-0 m-0">
          <h2 class="popup-heading">Models</h2>
        </div>
      </div>
      <!-- end-model-heading -->

      <!-- start-popup-content-div -->
      <div class="content-div">


        <!-- start-model-selection -->

        <!-- start-style-content -->
        <div class="style-content">

          <?php
          $res = mysqli_query($mysqli, "SELECT * FROM models");
          foreach ($res as $row) {
            $id = $row['id'];
            $name = $row['name'];
            $img = $row['image'];
            $price = $row['price'];

          ?>
            <div class="row models-rw p-0 m-0">
              <div class="col-8 p-0 m-0 mx-auto selectModel default_camera" role="button" data-price="<?= $price; ?>" data-modelid="Model <?= $id; ?>">
                <img src="<?= $img; ?>" class="img-fluid w-50">
                <p class="m-0"><?= $name; ?></p>
                <label class="labelrd">
                  <input type="radio" name="" <?= $id == 1 ? "checked" : ""; ?>>
                  <span class="checkmark"></span>
                </label>
                <p class="m-0 price-text">$ <?= $price; ?></p>
              </div>
            </div>
          <?php } ?>
        </div>
        <!-- end-style-content -->

        <!-- end-model-selection -->

        <!-- start-see-more-text -->
        <div class="row p-0 m-0 see-more-1 d-none">
          <div class="col-12 p-0 m-0">

            <span>see more<i class="fas fa-caret-down"></i></span>

          </div>
        </div>
        <!-- end-see-more-text -->

      </div>
      <!-- end-popup-content-div -->

    </div>
    <!-- end-model-popup -->

    <!-- start-model-popup-2 -->
    <div class="col-12 col-sm-3 right-popup d-none" id="tab-02">
      <!-- start-model-heading -->
      <div class="row heading-row p-0 m-0">
        <div class="col-1 p-0 m-0">
          <span class="close-btn"><i class="fas fa-times"></i></span>
        </div>
        <div class="col-10 p-0 m-0">
          <h2 class="popup-heading">materials</h2>
        </div>
      </div>
      <!-- end-model-heading -->

      <!-- start-popup-content-div -->
      <div class="content-div">

        <div class="row p-0 m-0">
          <div class="col-12 p-0 m-0  text-center">
            <span class="point-text">Choose your side</span>
          </div>
        </div>

        <!-- start-popup-button -->
        <div class="row popbtn-row  p-0 m-0">
          <div class="col-12 p-0 m-0 d-flex justify-content-center materials">
            <button type="button" class="btn popup-btn active-btn" id="roof_camera" data-tab=".roof-div">Roof</button>
            <button type="button" class="btn popup-btn" id="wall_camera" data-tab=".wall-div">walls</button>
            <button type="button" class="btn popup-btn d-none" data-tab=".generator-div">generator</button>
          </div>
        </div>
        <!-- end-popup-button -->

        <!-- start-roof -->
        <div class="row models-rw textures p-0 m-0 roof-div">
          <!-- start-popup-button -->
          <div class="row popbtn-row p-0 m-0">
            <div class="col-12 p-0 m-0 d-flex justify-content-center">
              <button type="button" class="btn inner-btn active-btn out-roof">Outter side</button>
              <button type="button" class="btn inner-btn in-roof">roof wood</button>
            </div>
          </div>
          <!-- end-popup-button -->
          <h6>TEXTURES</h6>
          <?php
          $res = mysqli_query($mysqli, "SELECT * FROM patterns WHERE part_type='roof' ");
          foreach ($res as $rows) {
            $id = $rows['id'];
            $name = $rows['name'];
            $price = $rows['price'];
            $url = $rows['url'];
          ?>
            <div class="col-4 p-0 m-0 roof roof-out" role="button" data-price="<?= $price; ?>" data-url="https://3dsium.com/portable-house/<?= $url; ?>">
              <img src="https://3dsium.com/portable-house/<?= $url; ?>" class="img-fluid">
              <p class="m-0"><?= $name; ?></p>
              <label class="labelrd">
                <input type="radio" name="radio" class="">
                <span class="checkmark"></span>
              </label>
              <p class="m-0 price-text">$ <?= $price; ?></p>
            </div>
          <?php  } ?>
        </div>
        <!-- end-roof -->

        <!-- start-wall -->
        <div class="row models-rw textures p-0 m-0 wall-div d-none">
          <!-- start-popup-button -->
          <div class="row popbtn-row p-0 m-0">
            <div class="col-12 p-0 m-0 d-flex justify-content-center">
              <button type="button" class="btn inner-btn active-btn out-wall">Outter side</button>
              <button type="button" class="btn inner-btn in-wall">Inner side</button>
            </div>
          </div>
          <!-- end-popup-button -->
          <h6>TEXTURES</h6>
          <?php
          $res = mysqli_query($mysqli, "SELECT * FROM patterns WHERE part_type='wall' ");
          foreach ($res as $rows) {
            $id = $rows['id'];
            $name = $rows['name'];
            $price = $rows['price'];
            $url = $rows['url'];
          ?>
            <div class="col-4 p-0 m-0 wall wall-out" role="button" data-price="<?= $price; ?>" data-url="https://3dsium.com/portable-house/<?= $url; ?>">
              <img src="https://3dsium.com/portable-house/<?= $url; ?>" class="img-fluid">
              <p class="m-0"><?= $name; ?></p>
              <label class="labelrd">
                <input type="radio" name="radio" class="">
                <span class="checkmark"></span>
              </label>
              <p class="m-0 price-text">$ <?= $price; ?></p>
            </div>
          <?php  } ?>
        </div>
        <!-- end-wall -->

        <!-- start-generator -->
        <div class="row models-rw textures p-0 m-0 generator-div d-none">


          <h4>Generator</h4>

          <!-- start-panel -->
          <div class="row models-rw generator  p-0 m-0 panel-div">
            <div class="col-12 p-0 m-0">
              <h6>Solar Panel</h6>
              <div class="d-flex justify-content-center">
                <label class="switch1 panelToggle">
                  <input type="checkbox" checked data-propname="solar panels">
                  <span class="slider">ON</span>
                </label>
              </div>
            </div>
          </div>
          <!-- end-panel -->

          <!-- start-panel -->
          <div class="row models-rw generator  p-0 m-0 chimney-div">
            <div class="col-12 p-0 m-0">
              <h6>Chimney</h6>
              <div class="d-flex justify-content-center">
                <label class="switch1 chimneyToggle">
                  <input type="checkbox" checked data-propname="cover">
                  <span class="slider">ON</span>
                </label>
              </div>
            </div>
          </div>
          <!-- end-panel -->

          <!-- start-panel -->
          <div class="row models-rw generator  p-0 m-0 generator-div">
            <div class="col-12 p-0 m-0">
              <h6>Generator</h6>
              <div class="d-flex justify-content-center">
                <label class="switch1 generatorToggle">
                  <input type="checkbox" checked data-propname="generator">
                  <span class="slider">ON</span>
                </label>
              </div>
            </div>
          </div>
          <!-- end-panel -->
        </div>
        <!-- end-generator -->

      </div>
      <!-- end-popup-content-div -->
    </div>
    <!-- end-model-popup-2 -->


    <!-- start-model-popup-3 -->
    <div class="col-12 col-sm-3 right-popup d-none" id="tab-03">
      <!-- start-model-heading -->
      <div class="row heading-row p-0 m-0">
        <div class="col-1 p-0 m-0">
          <span class="close-btn"><i class="fas fa-times"></i></span>
        </div>
        <div class="col-10 p-0 m-0">
          <h2 class="popup-heading">Doors & Window</h2>
        </div>
      </div>
      <!-- end-model-heading -->

      <!-- start-popup-content-div -->
      <div class="content-div">

        <div class="row p-0 m-0">
          <div class="col-12 p-0 m-0  text-center">
            <span class="point-text">Choose your side</span>
          </div>
        </div>

        <!-- start-popup-button -->
        <div class="row popbtn-row wall-btn-rw p-0 m-0">
          <div class="col-12 p-0 m-0 d-flex justify-content-center door-wind">
            <button type="button" class="btn popup-btn active-btn" data-tab=".door-div">Door</button>
            <button type="button" class="btn popup-btn" data-tab=".window-div">Window</button>
          </div>
        </div>
        <!-- end-popup-button -->


        <!-- start-door -->
        <div class="row models-rw  door-window p-0 m-0 door-div">

          <div class="col-12 p-0 m-0">
            <h6>Door </h6>
            <div class="d-flex justify-content-center">
              <label class="switch1 doorToggle">
                <input type="checkbox" checked id="Door" data-propname="no window">
                <span class="slider">OFF</span>
              </label>
            </div>
          </div>
        </div>
        <!-- end-door -->


        <!-- start-window -->
        <div class="row models-rw  door-window p-0 m-0 window-div d-none">

          <div class="col-12 p-0 m-0 glass-div">
            <h6>Window Glass</h6>
            <div class="d-flex justify-content-center">
              <label class="switch1 glassToggle">
                <input type="checkbox" checked id="Glass" data-propname="windows">
                <span class="slider">ON</span>
              </label>
            </div>
          </div>

          <h6 class="text-center glassFrame">Window Frame</h6>
          <div class="col-12 p-0 m-0 d-flex justify-content-center">
            <div class="col-4 p-0 m-0 glassFrame" data-color="77,63,22">
              <i class="fas fa-square fa-6x" style="color: rgb(77 63 22);"></i>
              <label class="labelrd">
                <input type="radio" name="radio">
                <span class="checkmark"></span>
              </label>
              <p class="m-0 price-text">Color 1</p>
            </div>
            <div class="col-4 p-0 m-0 glassFrame" data-color="77,32,22">
              <i class="fas fa-square fa-6x" style="color: rgb(77 32 22);"></i>
              <label class="labelrd">
                <input type="radio" name="radio">
                <span class="checkmark"></span>
              </label>
              <p class="m-0 price-text">Color 2</p>
            </div>
            <div class="col-4 p-0 m-0 glassFrame" data-color="119,117,116">
              <i class="fas fa-square fa-6x" style="color: rgb(119 117 116);"></i>
              <label class="labelrd">
                <input type="radio" name="radio">
                <span class="checkmark"></span>
              </label>
              <p class="m-0 price-text">Color 3</p>
            </div>
          </div>
        </div>
        <!-- end-window -->

      </div>
      <!-- end-popup-content-div -->
    </div>
    <!-- end-model-popup-3 -->

    <!-- start-model-popup-4 -->
    <div class="col-12 col-sm-3 right-popup d-none" id="tab-04">
      <!-- start-model-heading -->
      <div class="row heading-row p-0 m-0">
        <div class="col-1 p-0 m-0">
          <span class="close-btn"><i class="fas fa-times"></i></span>
        </div>
        <div class="col-10 p-0 m-0">
          <h2 class="popup-heading">Floor</h2>
        </div>
      </div>
      <!-- end-model-heading -->

      <!-- start-popup-content-div -->
      <div class="content-div">

        <div class="row p-0 m-0">
          <div class="col-12 p-0 m-0 text-center">
            <span class="point-text">Choose your material</span>
          </div>
        </div>

        <!-- start-marble-content -->
        <div class="marble-content floor-types" id="floor-t1">

          <!-- start-row-model-1st -->
          <div class="row models-rw p-0 m-0">
            <?php
            $res = mysqli_query($mysqli, "SELECT * FROM patterns WHERE part_type='floor' ");
            foreach ($res as $rows) {
              $id = $rows['id'];
              $name = $rows['name'];
              $price = $rows['price'];
              $url = $rows['url'];
            ?>
              <div class="col-4 p-0 m-0 floor" role="button" data-price="<?= $price; ?>" data-url="https://3dsium.com/portable-house/<?= $url; ?>">
                <img src="https://3dsium.com/portable-house/<?= $url; ?>" class="img-fluid">
                <p class="m-0"><?= $name; ?></p>
                <label class="labelrd">
                  <input type="radio" name="radio" class="">
                  <span class="checkmark"></span>
                </label>
                <p class="m-0 price-text">$ <?= $price; ?></p>
              </div>
            <?php  } ?>
          </div>
          <!-- end-row-model-1st -->
        </div>
        <!-- end-marble-content -->
      </div>
      <!-- end-popup-content-div -->
    </div>
    <!-- end-model-popup-4 -->


  </section>
  <!-- end-section -->

  <!-- start-footer -->
  <section>

    <footer class="footer-position">
      <div class="cart-btn">
        <p class="total-text">Total</p>
        <p><sup><i class="fas fa-dollar-sign"></i></sup><span class="dyn-price">1000.00</span></p>
        <!-- <button type="button" class="btn my-btn">Add Cart</button> -->
      </div>

      <div class="copyright-text">Made with <i class="fas fa-heart"></i> 3dsium.com</div>
    </footer>

  </section>

  <input type="hidden" class="total-price" value="11.445">
  <input type="hidden" class="model_id" value="Model <?= !empty($modelId) ? $modelId : "1"; ?>">
  <input type="hidden" class="roof_texture" value="<?= !empty($roof_texture) ? $roof_texture : ""; ?>">
  <input type="hidden" class="roof_wood" value="<?= !empty($roof_wood) ? $roof_wood : ""; ?>">
  <input type="hidden" class="outer_wall" value="<?= !empty($out_wall) ? $out_wall : ""; ?>">
  <input type="hidden" class="inner_wall" value="<?= !empty($in_wall) ? $in_wall : ""; ?>">
  <input type="hidden" class="floor" value="<?= !empty($floor) ? $floor : ""; ?>">
  <input type="hidden" class="door_val" value="<?= !empty($door) ? $door : ""; ?>" data-name="<?= !empty($door_name) ? $door_name : ""; ?>">
  <input type="hidden" class="window_frame" value="<?= !empty($window_frame) ? $window_frame : ""; ?>" data-name="<?= !empty($window_frame_name) ? $window_frame_name : ""; ?>">
  <input type="hidden" class="window_glass" value="<?= !empty($window_glass) ? $window_glass : ""; ?>" data-name="<?= !empty($glass_name) ? $glass_name : ""; ?>">
  <input type="hidden" class="solar_panel" value="<?= !empty($solar) ? $solar : ""; ?>" data-name="<?= !empty($solar_name) ? $solar_name : ""; ?>">
  <input type="hidden" class="chimney" value="<?= !empty($chimney) ? $chimney : ""; ?>" data-name="<?= !empty($chimney_name) ? $chimney_name : ""; ?>">
  <input type="hidden" class="gernator" value="<?= !empty($generator) ? $generator : ""; ?>" data-name="<?= !empty($generator_name) ? $generator_name : ""; ?>">

  <!-- end-footer -->


  <!-- ORDER MODAL -->
  <div class="modal fade" id="changes-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Enquiry Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="order_form">
          <div class="modal-body">
            <div class="enquiryNotify"></div>
            <div class="form-group">
              <label for="fullName">Full Name</label>
              <input type="text" class="form-control" id="full_name" name="full_name" />
            </div>
            <div class="form-group">
              <label for="enquiryEmail">Email address</label>
              <input type="email" class="form-control" id="enquiryEmail" name="enquiryEmail" />
            </div>
            <div class="form-group">
              <label for="contactNumber">Contact Number</label>
              <input type="number" class="form-control" id="contactNumber" name="contactNumber" />
            </div>

            <div class="form-group">
              <label for="contactNumber">Save URL</label>
              <input type="text" class="form-control" readonly="readonly" id="design_url" name="design_url" />
            </div>

            <div class="form-group">
              <label for="enquiryDetail">Enquiry Detail</label>
              <textarea class="form-control" id="enquiryDetail" name="enquiryDetail" rows="3" style="resize:none;"></textarea>
            </div>
            <div class="form-group formprice">
              <span>Total Price : </span>
              <span class="dyn-price"></span>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary mybtn2" id="enquiryBtn">Enquiry</button>
            <button type="button" class="btn btn-outline-secondary mybtn2" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- ORDER MODAL END -->
  <!-- CHANGES MODAL -->
  <!-- <div class="modal fade" id="changes-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Save Changes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="changesNotify"></div>
          <div class="form-group">
            <label for="saveChanges">Click Ok to open with Save Changes.</label>
            <input type="text" class="form-control" id="saveChanges" readonly />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary mybtn2" id="applyChangesBtn">Ok</button>
          <button type="button" class="btn btn-outline-secondary mybtn2" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div> -->
  <!-- CHANGES MODAL END -->

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>-->

  <script>
    function setColor(prop_name, colors) {
      // let colors = '173,30,33';
      let c = colors.split(",");

      clara.scene.set({
        name: prop_name,
        plug: 'Material',
        property: 'baseColor'
      }, {
        r: c[0] / 255,
        g: c[1] / 255,
        b: c[2] / 255
      });
    }

    let showPart = prop_name => {
      clara.scene.set({
        type: 'PolyMesh',
        name: prop_name,
        plug: 'Properties',
        property: 'visible'
      }, true);
    }

    let hidePart = prop_name => {
      clara.scene.set({
        name: prop_name,
        plug: 'Properties',
        property: 'visible'
      }, false);
    }

    let showModel = prop_name => {
      clara.scene.set({
        name: prop_name,
        plug: 'Properties',
        property: 'visible'
      }, true);
    }

    let hideModel = prop_name => {
      clara.scene.set({
        name: prop_name,
        plug: 'Properties',
        property: 'visible'
      }, false);
    }
    let setImage = (prop_name, imgsrc) => {

      clara.assets.importImage(imgsrc, {
        resizeTo: 1024,
        targetFormat: 'jpg',
        quality: 60
      }).then(handleImport).catch(handleError);

      function handleImport(attrs) {
        clara.scene.set({
          name: prop_name,
          plug: 'Material',
          property: 'baseMap'
        }, attrs.imageNodeId);
      };

      function handleError(err) {
        console.log('Import image error: ', err);
      }
    }
  </script>
  <script type="text/javascript" src="./js/myjs.js"></script>

</body>

</html>