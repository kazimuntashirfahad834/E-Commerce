let userBox = document.querySelector('.header .header-2 .user-box');

document.querySelector('#user-btn').onclick = () =>{
   userBox.classList.toggle('active');
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .header-2 .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   userBox.classList.remove('active');
}

window.onscroll = () =>{
   userBox.classList.remove('active');
   navbar.classList.remove('active');

   if(window.scrollY > 60){
      document.querySelector('.header .header-2').classList.add('active');
   }else{
      document.querySelector('.header .header-2').classList.remove('active');
   }
}

function validate(){




   var fname = document.getElementById('fname').value;

   var lname = document.getElementById('lname').value;

   var email=document.getElementById('email').value;

   var pnumber=document.getElementById('pnumber').value;

   let address=document.getElementById('address').value;

   let password=document.getElementById('password').value;

   let cpassword=document.getElementById('cpassword').value;




 

  




   if(fname == ""){

       document.getElementById('p').innerHTML = "*FirstName required";

       document.getElementById('p').style.color = "red";

       return false;

   }




   else if(fname.length<2){

       document.getElementById('p').innerHTML = "*Length is too short";

       document.getElementById('p').style.color = "red";

       return false;

   }

  

   else if(lname == ""){

       document.getElementById('p').innerHTML = "";

       document.getElementById('a').innerHTML = "*LastName required";

       document.getElementById('a').style.color = "red";

       return false;

   }




   else if(lname.length<2){

       document.getElementById('a').innerHTML = "*Length is too short";

       document.getElementById('a').style.color = "red";

       document.getElementById('p').innerHTML = "";

       return false;

   }

  

   else if(email == ""){

       document.getElementById('a').innerHTML = "";

       document.getElementById('r').innerHTML = "*Email required";

       document.getElementById('r').style.color = "red";

       return false;

   }




   // else if(email.length<2){

   //  document.getElementById('r').innerHTML = "*Length is too short";

   //  document.getElementById('r').style.color = "red";

   //  document.getElementById('a').innerHTML = "";

   //  return false;

   // }

  

   else if(pnumber == ""){

       document.getElementById('r').innerHTML = "";

       document.getElementById('t').innerHTML = "*Phone required";

       document.getElementById('t').style.color = "red";

       return false;

   }




   else if(pnumber.length<11){

       document.getElementById('r').innerHTML = "";

       document.getElementById('t').innerHTML = "*Enter valid phone number";

       document.getElementById('t').style.color = "red";

       return false;

   }

  

   else if(address == ""){

       document.getElementById('t').innerHTML = "";

       document.getElementById('h').innerHTML = "*Address required";

       document.getElementById('h').style.color = "red";

       return false;

   }




   else if(address.length<2){

       document.getElementById('t').innerHTML = "";

       document.getElementById('h').innerHTML = "*Length is too short";

       document.getElementById('h').style.color = "red";

      

       return false;

   }

  

   else if(password == ""){

       document.getElementById('h').innerHTML = "";

       document.getElementById('eemail').innerHTML = "*Password required";

       document.getElementById('eemail').style.color = "red";

       return false;

   }




   else if(password.length<6){

       document.getElementById('h').innerHTML = "";

       document.getElementById('eemail').innerHTML = "*Enter At least 6 character";

       document.getElementById('eemail').style.color = "red";

       return false;

   }

  

   else if(cpassword == ""){

       document.getElementById('eemail').innerHTML = "";

       document.getElementById('doba').innerHTML = "*Confirm password required";

       document.getElementById('doba').style.color = "red";

       return false;

  

   }else{

       return true;

   }
}