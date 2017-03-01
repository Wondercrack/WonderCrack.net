$(document).ready(function () {

$("#saveform").submit(function () {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
		formData.append("filename", $("#filename").val());
        formData.append("data", $("#editor iframe").contents().find("body").html());
        $.ajax({
            type: 'POST',
            url: '/php/editor.php',
            data: formData,
            processData: false,
            contentType: false
        });
    });


});
