

 function send(){
    event.preventDefault();
    var form_data = new FormData();
    form_data.append('user', $('#user').val());
    form_data.append('password',$('#password').val());


    $.ajax({
      url: '../server/check_login.php',
      dataType: "text",
      cache: false,
      processData: false,
      contentType: false,
      data: form_data,
      type: 'POST',
      success: function(data){

        if (data == "OK") {
          window.location.href = 'main.html';
        }else {
          alert("datos incorrectos");
        }

      }
    })
  }

