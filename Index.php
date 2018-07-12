<?php
require 'gallery/Gallery.php';

$imagefolder = $_GET['imagesfolder'];
/*
  $gallery = new Gallery();
  $gallery->setPath('gallery/images/');
  $images = $gallery->getImages(array('jpg'));
 */
$gallery2 = new Gallery();
$gallery2->setPath($imagefolder);
$images = $gallery2->getImages(array('jpg'));
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <link rel="stylesheet" href="gallery.css">

        <title>Image Gallery</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    </head>
    <body >



        <div id="main" >


            <nav class="navbar  navbar-dark">
                <a  onclick="openNav()" class="navbar-brand" href="#" style="color: #818181; font-size: 25px;">Menu</a>
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="Index.php?imagesfolder=gallery/18Thailand/">Thailand 2018</a>
                    <a href="Index.php?imagesfolder=gallery/17NewportBeach/">California 2017</a>
                    <a href="Index.php?imagesfolder=gallery/17Kauai2/">Kauai 2017-2</a>
                      <a href="Index.php?imagesfolder=gallery/17Kauai1/">Kauai 2017-1</a>
                    <a href="Index.php?imagesfolder=gallery/16maui/">Maui 2016</a>
                    <a href="Index.php?imagesfolder=gallery/16NewportBeach/">California 2016</a>
                    <a href="Index.php?imagesfolder=gallery/15Thailand/">Thailand 2015</a>
                      <a href="Index.php?imagesfolder=gallery/15Bali/">Bali 2015</a>
                    <a href="Index.php?imagesfolder=gallery/14Galapogos/">Galapagos 2014</a>
                </div>
            </nav>

            <div class="flex-container" style="margin-top:20px" >
                <div class="col-sm-12">
                    <h2>TITLE HEADING</h2>
                    <h5>Testing</h5>
                    <?php if ($images): ?>
                        <?php foreach ($images as $image): ?>
                            <div class="mySlides ">
                                <img src="<?php echo $image['full']; ?>" class="img-fluid " >
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        there are no images
                    <?php endif; ?> 


                    <a class="carousel-control-prev" onclick="plusSlides(-1)">❮</a>
                    <a class="carousel-control-next" onclick="plusSlides(1)">❯</a>

                    <div class="row" id="thumbs">
                        <div class="col-sm-12">
                            <?php foreach ($images as $image): ?>
                                <div class="column hover ">
                                    <img class="demo cursor" src="<?php
                                    $x++;
                                    echo $image['full'];
                                    ?>" style="width:100%" onclick="currentSlide(<?php echo $x; ?>)" >
                                </div>
                        
                            <?php endforeach; ?>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <script>

            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                var captionText = document.getElementById("caption");
                if (n > slides.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                captionText.innerHTML = dots[slideIndex - 1].alt;
            }






            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
            }


        </script>

    </body>
</html>
