function get_users()
  {
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/users.php",true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('users-data').innerHTML = this.responseText;
    }
    xhr.send('get_users');
}

function search_user(username) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/users.php", true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function () {
      document.getElementById('users-data').innerHTML = this.responseText;
  }

  xhr.send('search_user=' + username); // Ganti dari "search_user$name="+username menjadi "search_user="+username
}



window.onload = function()
{
  get_users();
}