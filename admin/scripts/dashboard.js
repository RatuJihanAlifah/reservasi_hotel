function booking_analytics() 
{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/dashboard.php", true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function() {
    let data = JSON.parse(this.responseText);
    document.getElementById('total_bookings').textContent = data.total_bookings;
    document.getElementById('active_bookings').textContent = data.active_bookings;
    document.getElementById('cancelled_bookings').textContent = data.cancelled_bookings;
  }

  xhr.send('booking_analytics=');
}

function user_analytics() 
{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/dashboard.php", true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function() {
    let data = JSON.parse(this.responseText);
    document.getElementById('total_new_reg').textContent = data.total_new_reg;
    document.getElementById('total_reviews').textContent = data.total_reviews;
    document.getElementById('total_reviews').textContent = data.total_reviews;
  }

  xhr.send('user_analytics=');
}

window.onload = function()
{
  booking_analytics();
  user_analytics();
}