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
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="gallery2.css">
    <body>

        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <a href="Index2.php?imagesfolder=gallery/18Thailand/">Thailand 2018</a>
                <a href="Index2.php?imagesfolder=gallery/17NewportBeach/">California 2017</a>
                <a href="Index2.php?imagesfolder=gallery/17SanDiego/">San Diego 2017</a>
                <a href="Index2.php?imagesfolder=gallery/17Kauai2/">Kauai 2017-2</a>
                <a href="Index2.php?imagesfolder=gallery/17Kauai1/">Kauai 2017-1</a>
                <a href="Index2.php?imagesfolder=gallery/16maui/">Maui 2016</a>
                <a href="Index2.php?imagesfolder=gallery/16NewportBeach/">California 2016</a>
                <a href="Index2.php?imagesfolder=gallery/15Thailand/">Thailand 2015</a>
                <a href="Index2.php?imagesfolder=gallery/15Bali/">Bali 2015</a>
                <a href="Index2.php?imagesfolder=gallery/14Galapogos/">Galapagos 2014</a>
                 <a href="Index2.php?imagesfolder=gallery/13Kauai/">Kauai 2013</a>
            </div>
        </div>

        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Album List</span>



        <div class="row">
            <?php if ($images): ?>
                <?php foreach ($images as $image): ?>
                    <div class="column">

                        <img src="<?php
                        $x++;
                        echo $image['full'];
                        ?>" style="width:100%" onclick="openModal();currentSlide(<?php echo $x; ?>)" class="hover-shadow cursor">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                there are no images
            <?php endif; ?> 


        </div>

        <div id="myModal" class="modal">
            <span class="close cursor" onclick="closeModal()">&times;</span>
            <div class="modal-content">

                <?php if ($images): ?>
                    <?php foreach ($images as $image): ?>
                        <div class="mySlides">
                            <img src="<?php echo $image['full']; ?>" style="width:100%" >
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    there are no images
                <?php endif; ?> 




                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                <!--         
                       /*             <?php foreach ($images as $image): ?>  
                                                    <div class="column ">
                                                        <img class="demo cursor" src="<?php
                    $x++;
                    echo $image['full'];
                    ?>" style="width:100%" onclick="currentSlide(<?php echo $x; ?>)" >
                                                    </div>
                <?php endforeach; ?>
                */
                -->

            </div>
        </div>

        <script>
            function openModal() {
                document.getElementById('myModal').style.display = "block";
            }

            function closeModal() {
                document.getElementById('myModal').style.display = "none";
            }

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
        </script>
        <script>
            function openNav() {
                document.getElementById("myNav").style.height = "100%";
            }

            function closeNav() {
                document.getElementById("myNav").style.height = "0%";
            }
        </script>
    </body>
</html>
