var TutorService = {
  list: function() {
    $.get("rest/tutors", function(data) {
      $("#tutors-list").html("");
      var html = "";
      for (let i = 0; i < data.length; i++) {
        html += `
        <div class="row">
        <div class="card mb-3 justify-center" style="width: 750px;">
          <div class="row no-gutters">
            <div class="col-4">
              <img src="img_avatar.png" class="card-img" alt="...">
            </div>
            <div class="col-8">
              <div class="card-body">
                <h5 class="card-title">` + data[i].name + " " + data[i].surname + `</h5>
                <p class="card-text">` + data[i].city + `</p>
                <p class="card-description">` + data[i].description + `</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
            </div
          </div>
</div>
        `;
      }
      $("#tutors-list").html(html);
    });
  },









}
