<x-layout>
  <x-navbar />

  <div id="slider">
    <div>
      <h1 class="font-bold text-white text-2xl">"Transforming Kids into Leaders"</h1>
      <p>Hand-picked Instructor and expertly crafted courses, designed for the modern students and entrepreneur.</p>

      <div>
        <button >Browse Courses</button>
        <button >Are you Instructor?</button>
      </div>
    </div>

    <img src="hero-img.png" />
  </div>

  <div id="page_container">
    <div class="who_we_are">
      <img src="who_we_are.jpg">

      <div>
        <h2 class="text-3xl font-bold text-blue-900">Who We Are?</h2>
        <p>
          LMS Online Courses have been educating students offline since 2014. We found out most of the students want to learn new skills online these days after the Covid 19. So we decided to bring our quality training courses online.

          We are aware that there are many big players in the market and platforms which are offering courses for really affordable prices. VA Online Courses is here to offer quality skill training for those students who are beginners and also those who are intermediate and want to sharpen their skills to the next level.

          We are very confident that our courses will help you to find the missing peace you were always looking for. You will get certified once you complete the course.
        </p>
      </div>
    </div> <!-- who_we_are -->

    <div class="why_choose_us">
      <div>
        <h2 class="text-3xl font-bold text-blue-900">Why Choose Us?</h2>
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

      <img src="online_class.jpg">
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

        <img src="Exclusive-Access-Accountability.jpg" />
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

        <img src="Keep-Courses-Yours-For-Lifetime.jpg" />
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
        <img src="Huge-Time-Saver-Instant-Access.jpg" />
      </div>
    </div> <!-- our_features_container -->
  </div>  <!-- Page Container -->

  <x-footer />
</x-layout>

<style>
#page_container{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

#slider {
  display: flex;
  height:400px;
  background-color: #754ffe;
  justify-content: center;
}

#slider  div:first-child{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  /* border:1px solid black; */
  width:400px;
  height:100%;
}

#slider h3{
  color:#fff;
  font-size:35px;
  padding:10px;
}


#slider p{
  color:#baa7ff;
  font-size:20px;
  padding:10px;

}


#slider  div:last-child{
  display: flex;
  width: 100%;
  /* background-color: black; */
  justify-content: flex-start;
  padding: 20px 0;
}

#slider  div:last-child button{
  padding: 10px;
  font-weight: bold;
}

#slider  div:last-child button{
  border:0;
  margin:0 6px;
  border-radius: 5px;
  padding: 15px 20px;
}

#slider  div:last-child button:first-child{
  background-color: #15ad81;
  color:#fff;
}

#slider  div:last-child button:last-child{
  background-color: #e4f5f6;
}


#choose_course_heading {
  padding:10px;
  text-align:center;
}

/* ----------------------------------- */

.who_we_are{
  display: flex;
  /* border:5px solid #dc0727; */
  align-items: center;

  width:1200px;
  margin: 50px 5px;
  padding:10px;
  background-color: #fff;
}
.who_we_are div{
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.who_we_are h1{
  color: #124e9a;
  padding:5px;
  font-weight: bold;
}

.who_we_are p{
  color: #000;
  padding:5px;
  line-height: 30px;
}


.who_we_are img{
  /* border:1px solid green; */
  height:300px;
}

/* ----------------------------------- */

.why_choose_us{
  display: flex;
  /* border:5px solid #dc0727; */
  align-items: center;

  width:1200px;
  margin: 50px 5px;
  padding:10px;
  background-color: #fff;
}
.why_choose_us div{
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.why_choose_us h1{
  color: #124e9a;
  padding:5px;
  font-weight: bold;
}

.why_choose_us li{
  color: #000;
  padding:5px;
  line-height: 30px;
}


.why_choose_us img{
  border:5px solid #124e9a;
  border-radius:20px;
  height:300px;
}

/* ----------------------------------- */
#our_features_container{
  display: flex;
  flex-direction: column;
  background-color: #124e9a;
  width:100%;
  align-items: center;
}
.our_features{
  display: flex;
  /* border:5px solid #dc0727; */
  align-items: center;

  width:1200px;
  margin: 10px 5px;
  padding:10px;
  /* background-color: #fff; */
}
.our_features i {
  color:green;
  font-size: 50px;
  padding:0 20px;

  /* background-color:yellow ; */



}

.our_features div{
  display: flex;
  flex-direction: column;
  justify-content: center;
  /* background-color: #000; */
  padding:0 40px;
}

.our_features h1{
  color: #fff;
  padding:5px;
  font-weight: bold;
}

.our_features p{
  color: #fff;
  padding:5px;
  line-height: 30px;
}


.our_features img{
  border:5px solid #fff;
  border-radius:20px;
  height:200px;
}

hr{
  height:4px;
  width:1200px;
  /* margin:0 auto; */
  color:#fff;
  background-color:#fff;
}
</style>
