



var form = document.getElementById('loginForm');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  var form = event.target;
  var formData = new FormData(form);

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'login_c.php',true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
      if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
             
          alert("cant login");
          } 
       else {
          console.error('Error: ' + xhr.status);
      }
  };
  xhr.send(formData);
});
/*
addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
  
    var searchText = input.value; // Get the search text
  
    // Send the search text to PHP using AJAX
    var xhr = new XMLHttpRequest();
    var url = 'search.php';
    var method = 'POST';
    var data = 'searchText=' + searchText;
  
    xhr.open(method, url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
    xhr.onload = function() {
      if (xhr.status === 200) {
        
        var response = JSON.parse(xhr.responseText);
     displayResults(response);
    } else {
        console.error('Error: ' + xhr.status);
      }
    };
  
    xhr.send(data);
  });*/