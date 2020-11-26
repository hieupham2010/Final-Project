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



function activaTab() {
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};



$("#share-idea").click(function() {
    $("#share-idea").hide(function() {});
    $("#collapseShow").show(function() {
        // Animation complete.
    });
});




$("#cancel").click(function() {
    $("#collapseShow").hide(function() {});
    $("#share-idea").show(function() {
        $("#share-idea").show(function() {

        });
    });
});

$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$(document).ready(function() {
    $(".Comment").hide();
    $(".CommentHide").click(function() {
        $(".Comment").toggle(300);
    });
});
$(document).ready(function() {

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".chooseImg").on('change', function() {
        readURL(this);
    });

    $(".chooseFile").on('click', function() {
        $(".chooseImg").click();
    });
});

