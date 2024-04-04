function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");
  
    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = "Read less";
      moreText.style.display = "none";
    } else {
      dots.style.display = "none";
      btnText.innerHTML = "Read more";
      moreText.style.display = "inline";
    }
  }

//   https://www.w3schools.com/howto/howto_js_read_more.asp (26/2/24)



function addition(){
  document.getElementById("firstReleaseTickets").stepUp();
}

function subtraction(){
  document.getElementById("firstReleaseTickets").stepDown();
}

function addition2(){
  document.getElementById("secondReleaseTickets").stepUp();
}

function subtraction2(){
  document.getElementById("secondReleaseTickets").stepDown();
}

function addition3(){
  document.getElementById("thirdReleaseTickets").stepUp();
}

function subtraction3(){
  document.getElementById("thirdReleaseTickets").stepDown();
}

function updateProgressBar(){
  let progress = 50;
  document.getElementById("progressBar").style=progress;
  console.log("updateProgressBar");
}
  


// function ticketSelectionPopUp(){
//     var x = document.getElementById("ticket-selecetion");
//     if (x.style.display === "none") {
//       x.style.display = "block";
//     } else {
//       x.style.display = "none";
//     }
// }
 
