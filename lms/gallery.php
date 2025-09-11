<!DOCTYPE html>
<html>
  <head>
    <!-- meta info -->
    <?php 
    require('config.php');
    require('meta.php');
    ?>
  </head>

  <body>
    <?php 
    require('header.php');
    ?>

    <div id="slider">
      <div>
        <h3>"Transforming Kids into Leaders"</h3>
        <p>Hand-picked Instructor and expertly crafted courses, designed for the modern students and entrepreneur.</p>
        <div>
          <button >Browse Courses</button>
          <button >Are you Instructor?</button>
        </div>

      </div> 

      <img src="images/hero-img.png" />
    </div> <!-- Slider -->

    <div id="gallery_container">
      <fieldset>
        <legend>Award Ceremony</legend>
        <div>
          <div class="gallery_img_container" >
            <img src="images/Exclusive-Access-Accountability.jpg"/>
          </div>
          <div class="gallery_img_container" >
            <img src="images/Keep-Courses-Yours-For-Lifetime.jpg"/>
          </div>
          <div class="gallery_img_container" >
            <img src="images/Huge-Time-Saver-Instant-Access.jpg"/>
          </div>
          <div class="gallery_img_container" >
            <img src="images/Exclusive-Access-Accountability.jpg"/>
          </div>
          <div class="gallery_img_container" >
            <img src="images/Keep-Courses-Yours-For-Lifetime.jpg"/>
          </div>
        </div>
      </fieldset>

      <fieldset>
        <legend>Hardware Lab</legend>
        <div>
          <div class="gallery_img_container" >
            <img src="images/Exclusive-Access-Accountability.jpg"/>
          </div>
          <div class="gallery_img_container" >
            <img src="images/Keep-Courses-Yours-For-Lifetime.jpg"/>
          </div>
          <div class="gallery_img_container" >
            <img src="images/Huge-Time-Saver-Instant-Access.jpg"/>
          </div>
          <div class="gallery_img_container" >
            <img src="images/Exclusive-Access-Accountability.jpg"/>
          </div>
          <div class="gallery_img_container" >
            <img src="images/Keep-Courses-Yours-For-Lifetime.jpg"/>
          </div>
          <div class="gallery_img_container" >
            <img src="images/Exclusive-Access-Accountability.jpg"/>
          </div>
        </div>
      </fieldset>

      <fieldset>
        <legend>Linguistic Section</legend>
        <div>
          <div class="gallery_img_container" >
            <img src="images/Exclusive-Access-Accountability.jpg"/>
          </div>
          <div class="gallery_img_container" >
            <img src="images/Keep-Courses-Yours-For-Lifetime.jpg"/>
          </div>
          <div class="gallery_img_container" >
            <img src="images/Huge-Time-Saver-Instant-Access.jpg"/>
          </div>
          <div class="gallery_img_container" >
            <img src="images/Exclusive-Access-Accountability.jpg"/>
          </div>
        </div>
      </fieldset>
    </div> <!-- gallery_container -->

    <?php 
    require('footer.php');
    ?>
    <script src="<?php echo $java_script; ?>"></script>
  </body>
</html>


<style>
#gallery_container{
  /*  border:1px solid green;*/
  padding:10px;
  display:flex;
  flex-direction:column;
  flex-wrap: wrap;

}

#gallery_container p { 
  text-align:center;
  padding:10px;
  border:1px solid blue;
}

#gallery_container div{
  display:flex;
  flex-direction:row;
  flex-wrap:wrap;
  justify-content:center;
  margin:5px;
  /*          border: 2px solid blue;*/
}


.gallery_img_container {
  width:350px;
  height:300px;
  border:10px solid #fff;
  box-shadow:0 0 5px #000;
  display:flex;
  transition: 0.3s all ease-in;

}



.gallery_img_container img{
  width:100%;
  height:100%;
  object-fit:cover;
  transition: 0.3s all ease-in;
  /* opacity: 0.7; */
}


.gallery_img_container img:hover {
  /* opacity:1; */
  filter: brightness(130%);
  border:1px solid blue;

}

.gallery_img_container:hover {
  border:10px solid #0d2d62;
}

@media only screen and (max-width:410px){
  .gallery_img_container {
    width:250px;
    height:200px;

  }
  #gallery_container div{
    margin: 5px 0;
  }
  #gallery_container{

    padding: 0;
  }
  fieldset{
    padding:10px 0; 
    border:    0;


  }
  legend{
    text-align: center;
  }
}
</style>
