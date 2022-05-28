var TutorService = {
  list: function() {
    $.get("rest/tutors", function(data) {
      $("#tutors-list").html("");
      var html = "";
      for (let i = 0; i < data.length; i++) {
        html += `
        <div class="row justify-content-center">
          <div class="card mb-3" style="max-width: 600px;">
            <div class="row g-0 no-gutters">
                <div class="col-sm-5">
                  <img src="img_avatar.png" class="card-img-top h-100" alt="...">
                </div>
            <div class="col-sm-7 d-flex flex-colum mb-2">
              <div class="card-body">
                  <h5 class="card-title">` + data[i].name + " " + data[i].surname + `</h5>
                  <h5 class="card-subtitle">` + data[i].city + `</h5>
                  <p class="card-text">` + data[i].description + `</p>
                  </div>
                  <div class="btn-group align-self-end" role="group">
                    <button type="button" class="btn btn-secondary user-button" onclick="ItemService.get(` + data[i].id + `)">Edit</button>
                    <button type="button" class="btn btn-danger users-button" onclick="ItemService.delete(` + data[i].id + `)">Delete</button>                  </div>
                   </div>
                </div>
              </div>
          </div>
        </div>
      </div>`;
      }
      $("#tutors-list").html(html);
    });
  },









}
