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

function displayDate() {
    var dt = new Date();
    document.getElementById("datetime").innerHTML = dt.toLocaleString();
    document.getElementById("due-datetime").innerHTML = dt.toLocaleString();
    var x = document.getElementById("share-idea");

}


$(document).ready(function() {
    activaTab('home');
});

function activaTab() {
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};

$("#share-idea").click(function() {
    $("#share-idea").hide("slow", function() {});
    $("#collapseShow").show("slow", function() {
        // Animation complete.
    });


});




$("#cancel").click(function() {
    $("#collapseShow").hide("slow", function() {});
    $("#share-idea").show("slow", function() {
        $("#share-idea").show("slow", function() {


        });

    });
});

$(document).ready(function() {
    $(".nav-tabs a").click(function() {
        $(this).tab('show');
    });
});