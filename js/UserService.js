var UserService = {
  init: function() {
    var token = localStorage.getItem("token");
    if (token) {
      window.location.replace("index.html");
    }
    $('#login-form').validate({
      submitHandler: function(form) {
        var entity = Object.fromEntries((new FormData(form)).entries());
        UserService.login(entity);
      }
    })
  },

  login: function(entity) {
    $.ajax({
      url: 'rest/users/login',
      type: 'POST',
      data: JSON.stringify(entity),
      contentType: "application/json",
      dataType: "json",
      success: function(result) {
        console.log(result);
        localStorage.setItem("token", result.token);
        window.location.replace('index.html');
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        toastr.error(XMLHttpRequest.responseJSON.message);
      }
    });
  },

  logout: function() {
    localStorage.clear();
    window.location.replace('login.html');
  },

  /* register: function(entity) {
    var register_info = {
      'name' : $('#name').val(),
      'surname' : $('#surname').val(),
      'email' : $('#email').val(),
      'password' : $('#password').val(),
      'city' : $('#city').val(),
      'added_at' : Math.floor(Date.now() / 1000)
    }
    $.ajax({
      url: 'rest/users/register',
      type: 'POST',
      data: JSON.stringify(register_info),
      contentType: "application/json",
      dataType: "json",
      success: function(result) {
        console.log(result);
        window.location.replace('login.html');
        toastr.success("Succesfully created account!");
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        toastr.error(XMLHttpRequest.responseJSON.message);
      }
    });
  }, */
}
