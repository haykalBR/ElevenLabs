import axios from "./Config/axios";
axios.get('http://localhost/api/comments?page=1&limit=15')
  .then(function (response) {
    var div = document.getElementById;
    let data =response.data.data;
    var    rows = '';
    data.forEach(element => {
       rows = rows + `
       <div class="col-sm-3 mt-4">
       <div class="card" style="width: 18rem;">
        <div class="card-body">
          <p class="card-text">${element.content}.</p>
          <a href="#" class="btn btn-primary">Content</a>
        </div>
      </div>
      </div>
       `;
    });
     $('#articles').html(rows);

  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .finally(function () {
    // always executed
  });