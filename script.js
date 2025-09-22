// start security code

// document.body.onkeydown = (e) => {

// 	if (e.keyCode == '123') { // inspect window F12 key 
//         e.preventDefault();
//     }

//     if (e.ctrlKey && e.shiftKey && e.key == 'I') { // inspect window
//         e.preventDefault();
//     }
//     if (e.ctrlKey && e.shiftKey && e.key == 'i') { // inspect window
//         e.preventDefault();
//     }
//     if (e.ctrlKey && e.shiftKey && e.key == 'C') { // inspect window
//         e.preventDefault();
//     }
//     if (e.ctrlKey && e.shiftKey && e.key == 'c') { // inspect window
//         e.preventDefault();
//     }
//     if (e.ctrlKey && e.shiftKey && e.key == 'J') { // inspect window
//         e.preventDefault();
//     }
//     if (e.ctrlKey && e.shiftKey && e.key == 'j') { // inspect window
//         e.preventDefault();
//     }
//     if (e.ctrlKey && e.key == 'U') { // source code 
//         e.preventDefault();
//     }

//     if (e.ctrlKey && e.key == 'u') { // source code 
//         e.preventDefault();
//     }


// };


// end security code

// image slider
// let banner = document.querySelector('#banner');
// let banner_images = [];
// banner_images[0] = "images/banner_1.png";
// banner_images[1] = "images/banner_2.png";
// banner_images[2] = "images/banner_3.png";
// let count = 0;
// function next_banner_img(){
// if(count == banner_images.length-1){
// count = 0
// banner.style.backgroundImage = "url('"+banner_images[count]+"')"; 
// }
// else {
// count++;
// banner.style.backgroundImage  = "url('"+banner_images[count]+"')"; 
// }
// }
// setInterval(next_banner_img, 2000);

//////////////////////////////////////////////////////////////////////////////////////////

// tabbed content
function openTab(evt, tabName) {
var i, tabcontent, buttons;
tabcontent = document.getElementsByClassName("tabcontent");
for (i = 0; i < tabcontent.length; i++) {
tabcontent[i].style.display = "none";
}
buttons = document.getElementsByClassName("buttons");
for (i = 0; i < buttons.length; i++) {
buttons[i].className = buttons[i].className.replace(" active", "");
}
document.getElementById(tabName).style.display = "block";
evt.currentTarget.className += " active";
}

//////////////////////////////////////////////////////////////////////////////////////////






// onclick button show menu box

var show_menu_button = document.getElementsByClassName('show_menu_button');

for (var k = show_menu_button.length - 1; k>=0; k--){

show_menu_button[k].onclick = function () {

button_for = this.getAttribute('data-button-for'); 

if (button_for == 'filter_menu'){

// user menus
var product_filter_container = document.getElementById("product_filter_container");
// Cancel Button
var product_filter_cancel_button = document.getElementById("product_filter_cancel_button");

product_filter_container.style.display = "block";

// When the user clicks on cancel button, close the modal
product_filter_cancel_button.onclick = function() {
product_filter_container.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
product_filter_container.onclick = function(event) {
if (event.target == product_filter_container) {
product_filter_container.style.display = "none";
}
}

// When the user press esc key, close it
document.addEventListener('keydown', function(event){
if(event.key === "Escape"){
product_filter_container.style.display = "none";
}
});

}

/////////////////////////////////////

}
}

///////////////////////////////////////////////////////////////////



// change url

function change_url(parameter_name,parameter_value){
var url = new URL(window.location.href);
var parameter_to_change = url.searchParams;

// new value of "id" is set to "101"
parameter_to_change.set(parameter_name, parameter_value);

// change the search property of the main url
url.search = parameter_to_change.toString();

// the new url string
var new_url = url.toString();

// console.log(new_url);
window.open(new_url,'_SELF')
}



// notification

function notification(message,time,availability){
const notifications = document.getElementById('notifications');
notifications.innerHTML = message;
setTimeout(function() {
notifications.style.display = availability;
}, time);
}


 
// auto fee calculate
const course_fee_input = document.getElementById('course_fee_input'); // Target input field
const checkboxes = document.querySelectorAll('.checkbox_course_name');

function totalCourseFee() {
var sum = 0;
for (i=0;i<checkboxes.length;i++) {
if (checkboxes[i].checked) {
sum = sum + parseInt(checkboxes[i].value);
}
}
course_fee_input.value = sum;
}