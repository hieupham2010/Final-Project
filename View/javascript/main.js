window.onload = randomImgDisplay;

function randomImg() {
    var img = ['images/1.png', 'images/2.jpg', 'images/3.jpg', 'images/4.jpg', 'images/5.jpg', 'images/6.jpg', 'images/7.jpg'];
    var num = Math.floor(Math.random() * img.length);
    return img[num];
}

function randomImgDisplay() {
    var image = document.getElementsByClassName("card-img-top");
    for (var i = 0; i < image.length; i += 1) {
        image[i].src = randomImg();
    }
}