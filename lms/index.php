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
    </div>

    <div id="page_container">

      <div class="who_we_are">
        <img src="images/who_we_are.jpg">

        <div>
          <h1>Who We Are?</h1>
          <p>
            LMS Online Courses have been educating students offline since 2014. We found out most of the students want to learn new skills online these days after the Covid 19. So we decided to bring our quality training courses online.

            We are aware that there are many big players in the market and platforms which are offering courses for really affordable prices. VA Online Courses is here to offer quality skill training for those students who are beginners and also those who are intermediate and want to sharpen their skills to the next level.

            We are very confident that our courses will help you to find the missing peace you were always looking for. You will get certified once you complete the course.
          </p>

        </div>
      </div> <!-- who_we_are -->





      <div class="why_choose_us">

        <div>
          <h1>Why Choose Us?</h1>
          <ol>
            <li>
              Our courses are made for bigger to advance level students. In other words, our courses are for young kids to 18+ students.
            </li>
            <li>
              We offer MCQ (Multiple Choice Quiz) with our courses. Once you buy any course, after a few lessons students will have to solve/answer quizzes.
            </li>
            <li> 
              Our online courses and teachers will help with practical knowledge as well as with the theory to find a perfect job for our students.   
            </li>
            <li> 
              We do offer after-sale support over the phone call. If our students have any doubts before or after completing the course they call on our given numbers.  
            </li>
          </ol>  

        </div> 

        <img src="images/online_class.jpg">
      </div> <!-- why_choose_us -->




      <div id="our_features_container">

        <div class="our_features">
          <i class="fas fa-check-circle"></i>
          <div>
            <h1>#1. Keep Courses Yours, For Lifetime.</h1>
            <p>
              Unlike other course-selling websites. We do not restrict the course to a yearly period. Once you buy the course, it's yours for a lifetime. You can re-watch your bought courses at any time. We do offer phone support for those students who have doubt. Our dedicated teachers are always online to help our students who bought our courses.    
            </p>
          </div>

          <img src="images/Exclusive-Access-Accountability.jpg" />

        </div>

        <hr>

        <div class="our_features">
          <i class="fas fa-check-circle"></i>
          <div>
            <h1>#2. Exclusive Access & Accountability.</h1>
            <p>
              VA Online Courses has been offering exclusive access to all of our courses. We are very serious about providing only quality content/courses for all the students who buy our courses. We know there are many other competitors who are selling courses online but we have a reputation to offer exclusive courses with accountability.
            </p>
          </div>

          <img src="images/Keep-Courses-Yours-For-Lifetime.jpg" />

        </div>

        <hr>

        <div class="our_features">
          <i class="fas fa-check-circle"></i>
          <div>
            <h1>#3. Huge Time Saver And Instant Access.</h1>
            <p>
              The best part is that you will not receive the course in parts. You can buy the course and even complete it in one day if you wish to. There are many other platforms that offer one lesson per day which we believe is a waste of time.  
            </p>
          </div>

          <img src="images/Huge-Time-Saver-Instant-Access.jpg" />

        </div>

      </div> <!-- our_features_container -->








    </div>  <!-- Page Container -->

    <?php 
    require('footer.php');
    ?>
    <script src="<?php echo $java_script; ?>"></script>
  </body>
</html>
