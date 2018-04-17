$(function () {
    var files;
    $("#uploadImage").on('change', function () {
        var file = this.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/jpg"];
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
            alert('Please select a valid image file (JPEG/JPG/PNG).');
            $("#file").val('');
            return false;
        }
        files = event.target.files;
//        console.log(files);
        if (typeof (FileReader) != "undefined") {
            var image_holder = $("#image-holder");
            image_holder.empty();
            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                }).appendTo(image_holder);
            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });

    $('#uploadForm').on('submit', function (e) {

//        event.stopPropagation()
        e.preventDefault();
//        alert('test');
        // Create a formdata object and add the files
        var data = new FormData($(this)[0]);
//        $.each(files, function (key, value)
//        {
//            data.append(key, value);
//        });
        $.ajax({
            type: 'POST',
            url: './ajax/user/upload.php',
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('.bnt-submit').attr("disabled", "disabled");
                $('#uploadForm').css("opacity", ".5");
            },
            success: function (msg) {
                $('#message').html('');
                if (msg.status == 'success') {
                    $('#uploadForm')[0].reset();
                    $('#message').html('<span style="font-size:18px;color:#34A853">' + msg.message + '</span>');
                } else {
                    $('#message').html('<span style="font-size:18px;color:#EA4335">' + msg.message + '</span>');
                }
                $('#message').css("opacity", "");
                $(".btn-submit").removeAttr("disabled");
            }
        });
    });
});




