var ItemService = {
  init: function(){
      $('#addUserForm').validate({
        submitHandler: function(form) {
          var newUser = Object.fromEntries((new FormData(form)).entries());
          ItemService.add(newUser);
        }
      });
      ItemService.list();
    },

  list: function() {
    $.get("rest/users", function(data) {

      $("#users-list").html("");

      var html = "";
      for (let i = 0; i < data.length; i++) {
        html += `
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card mb-3" style="max-width: 18rem;">
            <img class="card-img-top" src="img_avatar.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">` + data[i].name + `</h5>
              <p class="card-text">` + data[i].surname + `</p>
              <div class="btn-group" role="group">
              <button type="button" class="btn btn-secondary user-button" onclick="ItemService.get(` + data[i].id + `)">Edit</button>
              <button type="button" class="btn btn-danger users-button" onclick="ItemService.delete(` + data[i].id + `)">Delete</button>
              </div>
          </div>
        </div>
      </div>`;
      }
      $("#users-list").html(html);
    });
  },

  add: function(newUser){
    $.ajax({
      url: 'rest/users',
        type: 'POST',
        data: JSON.stringify(newUser),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
            $('#addUserModal').modal("hide");
            $("#users-list").html('<div class="spinner-border" role="status"> <span class="sr-only"></span>  </div>');
            ItemService.list();
            toastr.success("New user added succesfully");
          }
    });
  },

  get: function(id) {
    $('.user-button').attr('disabled', true);
    $.get('rest/users/' + id, function(data) {
      $("#id").val(data.id);
      $("#name").val(data.name);
      $("#surname").val(data.surname);
      $("#exampleModal").modal("show");
      $('.user-button').attr('disabled', false);
    });
  },

  update: function() {
    $('.save-user-button').attr('disabled', true);
    var user = {};

    user.name = $('#name').val();
    user.surname = $('#surname').val();

    $.ajax({
      url: 'rest/users/' + $('#id').val(),
      type: 'PUT',
      data: JSON.stringify(user),
      contentType: "application/json",
      dataType: "json",
      success: function(result) {
        $("#exampleModal").modal("hide");
        $('.save-user-button').attr('disabled', false);
        $("#users-list").html('<div class="spinner-border" role="status"> <span class="sr-only"></span>  </div>');
        ItemService.list();
      }
    });
  },

  delete: function(id) {
    $('.users-button').attr('disabled', true);
    $.ajax({
      url: 'rest/users/' + id,
      type: 'DELETE',
      success: function(result) {
        $("#users-list").html('<div class="spinner-border" role="status"> <span class="sr-only"></span>  </div>');
        ItemService.list();
        toastr.success("User deleted succesfully");
      }
    });
  },
}
