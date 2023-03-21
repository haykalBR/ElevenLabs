import axios from "./Config/axios";
axios.get('http://localhost/api/comments?page=1&limit=15')
  .then(function (response) {
    var div = document.getElementById;
    let data =response.data.data;
    var    rows = '';
    data.forEach(element => {
       rows = rows + `
       <div class="col-sm-12 mt-4">
          <p class="card-text">${element.content}.</p>
      </div>
       `;
    });
     $('#comments').html(rows);

  })
  .catch(function (error) {
    // handle error
  })
  .finally(function () {
    // always executed
  });

  $("#add_comment").click(function(){
    let content = $('#content').val();
  
    if(userText.value === c && content!=""){
      axios.post('http://localhost/api/comment/create',{
        "comment": null,
        "content": content,
        "userId": 1
    })
      .then(function (response) {
        $('#comments').prepend(  `<div class="col-sm-12 mt-4">
        <p class="card-text">${content}.</p>
    </div> `);
    $('#content').val("");
      })
      .catch(function (error) {
        console.log(error);
      });
    }


  })

 //create simple captcha system 
let captchaText = document.querySelector('#captcha');
var ctx = captchaText.getContext("2d");
ctx.font = "30px Roboto";
ctx.fillStyle = "#08e5ff";


let userText = document.querySelector('#textBox');
let submitButton = document.querySelector('#submitButton');
let output = document.querySelector('#output');
let refreshButton = document.querySelector('#refreshButton');


// alphaNums contains the characters with which you want to create the CAPTCHA
let alphaNums = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
let emptyArr = [];

// This loop generates a random string of 7 characters using alphaNums
// Further this string is displayed as a CAPTCHA
for (let i = 1; i <= 7; i++) {
    emptyArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
}
var c = emptyArr.join('');
ctx.fillText(emptyArr.join(''),captchaText.width/4, captchaText.height/2);
userText.addEventListener('keyup', function(e) {
    // Key Code Value of "Enter" Button is 13
    if (e.keyCode === 13) {
        if (userText.value === c) {
            output.classList.add("correctCaptcha");
            output.innerHTML = "Correct!";
        } else {
            output.classList.add("incorrectCaptcha");
            output.innerHTML = "Incorrect, please try again";
        }
    }
});