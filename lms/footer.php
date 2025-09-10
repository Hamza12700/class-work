<style>
#footer {
display: flex;
flex-direction: column;

border:0;
border-top: 7px solid;
border-bottom: 5px solid;
border-image: linear-gradient(to right, #fed330 0%,#fed330 20%,#e63841 20%,#e63841 20%,#e63841 40%,#5ed6fd 40%,#5ed6fd 40%,#e63841 40%,#5ed6fd 40%,#5ed6fd 40%,#5ed6fd 60%,#45c33b 60%,#45c33b 80%,#1172c0 80%,#1172c0 80%,#1172c0 100%) 1 stretch repeat; /* W3C */
background: #FFF;
/* background-image: url('images/footer.jpg'); */
background-image: url('images/texture.png');

/*background-repeat: no-repeat;*/
background-size: auto 100%; 
background-position: center;
/*border:10px solid green;*/
}
/**************************************************/
#footer_1st_row {
/*border:1px solid blue;*/
padding:10px;
}
#footer_1st_row div {
display: flex;
justify-content: center;
/*border-bottom:1px solid black;	*/
padding: 10px;
text-align: left;
background-color: #15AD81; 
/*width: fit-content;*/
border-radius: 5px;
color:#fff;
text-shadow: 0 0 2px black;
margin:5px ;
}
#footer_1st_row div a {
border-right:1px solid white;
padding: 10px 35px;
font-size: 25px;
cursor: pointer;
text-decoration: none;
color:#fff;
}
#footer_1st_row div a:last-child {
border:0;
}

/**************************************************/

#footer_2nd_row {
display: flex;
flex-direction: row;
/*border:1px solid green;*/
justify-content: center;
width:60%;
margin:0 auto;
}
#footer_2nd_row div{
/*border:1px solid blue;*/
flex:1; /* equal full width*/
}

#footer_2nd_row p{
margin:12px;
background-color: #15AD81; 

/*width: fit-content;*/
text-align: left;
border-radius: 5px;
padding: 10px;
color:#fff;
text-shadow: 0 0 2px black;
}



#footer_2nd_row p span{
	/*border:1px solid blue;*/
	width:150px;
	
display: inline-block;
}


h3{
padding: 10px 15px;
text-align: left;
/*border:1px solid blue;*/
text-decoration: underline;	
width: fit-content;
border-radius: 20px;
}






.copyright {
padding: 20px 5px;
text-align: center;
background: #181a1b;
color:#fff;
}


@media only screen and (max-width:1150px){

#footer_2nd_row {
width: 80%;
}


}



@media only screen and (max-width:850px){

#footer_2nd_row {
width: 100%;
}


}


@media only screen and (max-width:690px){

#footer_2nd_row {
flex-direction: column;
}


}


@media only screen and (max-width:460px){

#footer_2nd_row {
flex-direction: column;
}

#footer_1st_row div a {
padding: 10px 20px;


}

}



@media only screen and (max-width:350px){

#footer_2nd_row {
flex-direction: column;
}

#footer_1st_row div a {
padding: 10px 15px;


}

}

</style>


<div id="footer">

<div id="footer_1st_row">

<h3>Social Links</h3>
<div>
<a href="mailto:<?php echo $email;?>" target="_BLANK" class="far fa-envelope"></a>
<a href="<?php echo $facebook_account;?>" target="_BLANK" class="fab fa-facebook"></a>
<a href="<?php echo $youtube_account;?>" target="_BLANK"class="fab fa-youtube"></a>
<a href="<?php echo $tiktok_account;?>" target="_BLANK" class="fab fa-tiktok"></a>
<a href="<?php echo $instagram_account;?>" target="_BLANK" class="fab fa-instagram"></a>
</div>
</div>

<div id="footer_2nd_row">

<div>	
<h3>Working Hours</h3>
<p><span><i class="fal fa-clock"> &nbsp; </i>Monday</span> <?php echo "monday";?></p>
<p><span><i class="fal fa-clock"> &nbsp; </i>Tuesday</span> <?php echo "tuesday";?></p>
<p><span><i class="fal fa-clock"> &nbsp; </i>Wednesday</span> <?php echo "wednesday";?></p>
<p><span><i class="fal fa-clock"> &nbsp; </i>Thursday</span> <?php echo "thursday";?></p>
<p><span><i class="fal fa-clock"> &nbsp; </i>Friday</span> <?php echo "friday";?></p>
<p><span><i class="fal fa-clock"> &nbsp; </i>Saturday</span> <?php echo "saturday";?></p>
<p><span><i class="fal fa-clock"> &nbsp; </i>Sunday</span> <?php echo "sunday";?></p>












</div>



<div>
<h3>Contact Us</h3>

<p><i class="fal fa-phone-alt"></i> <?php echo $mobile_no; ?></p>
<p><i class="fal fa-envelope"></i> <?php echo $web_email; ?></p>
<p><i class="fal fa-map-marker-alt"></i> <?php echo $address_name; ?></p>
</div>


</div>
</div>












<p class="copyright">
Developed by <a href="https://www.federalinstituteofskills.com" target="_BLANK">FITS</a> Soft Corporation.
</p>




