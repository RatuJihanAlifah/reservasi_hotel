let facility_s_form = document.getElementById('facility_s_form');

facility_s_form.addEventListener('submit', function(e){
  e.preventDefault();
  add_facility();
});

function add_facility()
{
  let data = new FormData();
  data.append('name',facility_s_form.elements['facility_name'].value);
  data.append('add_facility','');

  let xhr = new XMLHttpRequest();
  xhr.open("POST","ajax/facility.php")

  xhr.onload = function(){
    var myModal = document.getElementById('facility-s');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    if(this.responseText == 1){
      alert('success','new facility added!');
      facility_s_form.elements['facility_name'].value='';
      get_facility();
    }
    else{
      alert('error','Server Down!');
    }
  }
  xhr.send(data);
}

function get_facility()
{
  let xhr = new XMLHttpRequest();
  xhr.open("POST","ajax/facility.php",true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function(){
    document.getElementById('facility-data').innerHTML = this.responseText;
  }

  xhr.send('get_facility');
}

function rem_facility(val)
{
  let xhr = new XMLHttpRequest();
  xhr.open("POST","ajax/facility.php",true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function(){
    if(this.responseText==1){
      alert('success','facility removed!');
      get_facility();
    }
    else if(this.responseText == 'room_added'){
      alert('error','Facility is added in room!');
    }
    else{
      alert('error','Server down!');
    }
  }

  xhr.send('rem_facility='+val);
}

window.onload = function() {
  get_facility();
}
