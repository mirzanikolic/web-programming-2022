var ItemService = {
  getUsers: function(){
    $.get("rest/users", function(data) {

      $("#users-list").html("");

      var html = "";
      for(let i = 0; i < data.length; i++){
        html += `
        <div class="col-lg-4">
          <h2>`+ data[i].name +`</h2>
          <p>`+ data[i].surname +`</p>
          <p>
            <button type="button" class="btn btn-primary users-button" onclick="ItemService.showModal(`+data[i].id+`)" >
              Edit
            </button>
            <button type="button" class="btn btn-primary users-button" onclick="ItemService.showModal(`+data[i].id+`)" >
              Delete
            </button>
          </p>
        </div>`;
      }
      $("#users-list").html(html);
      console.log(data);
    });
  },

  showModal: function(id){
    $('.users-button').attr('disabled', true);
    $.get('rest/users/'+id, function(data){
      console.log(data);
      $("#id").val(data.id);
      $("#name").val(data.name);
      $("#surname").val(data.surname);
      $("#exampleModal").modal("show");
      $('.users-button').attr('disabled', false);
    })
  },

  saveUser: function(){
    $('.save-user-button').attr('disabled', true);
    var user = {};

    user.name = $('#name').val();
    user.surname = $('#surname').val();

    $.ajax({
      url: 'rest/users/'+$('#id').val(),
      type: 'PUT',
      data: JSON.stringify(user),
      contentType: "application/json",
      dataType: "json",
      success: function(result) {
          $("#exampleModal").modal("hide");
          $('.save-user-button').attr('disabled', false);
          $("#users-list").html('<div class="spinner-border" role="status"> <span class="sr-only"></span>  </div>');
          getUsers(); // perf optimization
          console.log(result);
      }
    });

    console.log(user);
  },



}
