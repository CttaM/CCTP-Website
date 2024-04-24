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
  document.getElementById("ticketQuantity").stepUp();
  updateTotal();

}

function subtraction()
{
  document.getElementById("ticketQuantity").stepDown();
  updateTotal();
}


function updateTotal(){
  let ticketQuantity = document.getElementById("ticketQuantity").value;
  let ticketPrice = document.getElementById("ticketPrice").innerHTML;
  let bookingFee = document.getElementById("bookingFee").innerHTML;
  let total = ticketQuantity * ticketPrice + Number(bookingFee);
  document.getElementById("total").innerHTML ="Total: £" + total;
}

function updateProgressBar(){
  let progress = 50;
  document.getElementById("progressBar").style=progress;
  console.log("updateProgressBar");
}
  

function loadPaymentScreen() {
  let eventNameElement = document.getElementById('event-name');
  let eventName = eventNameElement ? eventNameElement.textContent : 'Unknown Event';
  
  let url = 'paymentscreen.php?event=' + encodeURIComponent(eventName);
  window.location.href = url;
}

