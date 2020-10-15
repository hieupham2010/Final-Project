window.onload = randomImgDisplay;
function randomImg() {
  var img = ['images/1.png', 'images/2.jpg', 'images/3.jpg','images/4.jpg', 'images/5.jpg', 'images/6.jpg', 'images/7.jpg'];
  var num = Math.floor(Math.random() * img.length);
  return img[num];
}
function randomImgDisplay(){
    var image = document.getElementsByClassName("card-img-top");
    for (var i = 0; i < image.length; i += 1) {
        image[i].src = randomImg();
    }
}
document.getElementById("error_user").style.visibility = "hidden";
    function checkForm() {
        
        var userName = document.getElementById('userName').value;
        var password = document.getElementById('password').value;
        if (userName == "") {
            document.getElementById("error_user").style.visibility = "visible"
            document.validateForm.userName.focus();
            return false;
        } else if (password.length < 8) {
        document.getElementById("error_user").style.visibility = "visible"
            return false;
        }
        else if (!(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(validateForm.email.value)))
        {
            return (false)
        }     
        return true;
}
$('#calendar').fullCalendar({
  header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listWeek'
  },
  defaultDate: '2018-11-16',
  navLinks: true,
  eventLimit: true,
  events: [{
          title: 'Front-End Conference',
          start: '2018-11-16',
          end: '2018-11-18'
      },
      {
          title: 'Hair stylist with Mike',
          start: '2018-11-20',
          allDay: true
      },
      {
          title: 'Car mechanic',
          start: '2018-11-14T09:00:00',
          end: '2018-11-14T11:00:00'
      },
      {
          title: 'Dinner with Mike',
          start: '2018-11-21T19:00:00',
          end: '2018-11-21T22:00:00'
      },
      {
          title: 'Chillout',
          start: '2018-11-15',
          allDay: true
      },
      {
          title: 'Vacation',
          start: '2018-11-23',
          end: '2018-11-29'
      },
  ]
});


window.addEventListener("load", myInit, true); function myInit(){fullCalendar};