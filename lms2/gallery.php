<!DOCTYPE html>
<html>
<head>
<!-- meta info -->
<?php 
require($_SERVER['DOCUMENT_ROOT'].'/lms/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/lms/meta.php');
?>
</head>

<body>
<?php 
require($_SERVER['DOCUMENT_ROOT'].'/lms/header.php');
?>





<div id="gallery_container">

<fieldset>
<legend>Memorable Moments</legend>
<div>
<div class="gallery_img_container" >
<img src="images/gallery/1/1.jpg"/>
</div>

<div class="gallery_img_container" >
<img src="images/gallery/1/2.jpg"/>
</div>

<div class="gallery_img_container" >
<img src="images/gallery/1/3.jpg"/>
</div>

<div class="gallery_img_container" >
<img src="images/gallery/1/4.jpg"/>
</div>

<div class="gallery_img_container" >
<img src="images/gallery/1/5.jpg"/>
</div>

<div class="gallery_img_container" >
<img src="images/gallery/1/6.jpg"/>
</div>

<div class="gallery_img_container" >
<img src="images/gallery/1/7.jpg"/>
</div>

</div>
</fieldset>

<fieldset>
<legend>Hardware Lab</legend>
<div>
<div class="gallery_img_container" >
<img src="images/gallery/2/1.jpg"/>
</div>
<div class="gallery_img_container" >
<img src="images/gallery/2/1.jpg"/>
</div>
<div class="gallery_img_container" >
<img src="images/gallery/2/1.jpg"/>
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
require($_SERVER['DOCUMENT_ROOT'].'/lms/footer.php');
?>


<script src="<?php echo $java_script; ?>"></script>
</body>
</html>








<style>
       #gallery_container{
/*              border:1px solid green;*/
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