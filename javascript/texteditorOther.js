$(document).ready(function () {
var _nextUnusedID = 0;
var _currentDocument = 0;

setInterval(getDocuments, 2000);

$("#saveform").submit(function () {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
		formData.append("filename", $("#filename").val());
        formData.append("data", $("#editor iframe").contents().find("body").html());
        $.ajax({
            type: 'POST',
            url: '/php/other.php',
            data: formData,
            processData: false,
            contentType: false
        });
    });


function getDocuments() {
        $.ajax({
            type: 'GET',
            url: '/php/other.php?opt=0',
            success: function (documents) {
                var existent = [];
                $(".document").each(function (i, e) { existent[i] = e.innerHTML; });

                var newDocuments = [];
                $.each(JSON.parse(documents), function (i, d) {
                    if ($.inArray(d, existent) == -1) {
                        newDocuments[newDocuments.length] = d;
                    }
                });

                var unavailableDocuments = [];
                $.each(existent, function (i, d) {
                    if ($.inArray(d, JSON.parse(documents)) == -1) {
                        unavailableDocuments[unavailableDocuments.length] = d;
                    }
                });

                $.each(newDocuments, function (i, d) {
                    $("#left_nav").children().append("<li><button id=\"document_" + _nextUnusedID + "\" class='document styledButton'>" + d + "</button></li>");
                    $("#document_" + _nextUnusedID).click(function () {
                        $("#filename").val(d);
                        $("#editor iframe").contents().find("body").html("");
                        getDocumentContent(d);
                        $("#document_" + _currentDocument).removeClass("greenBackground");
                        $("#" + this.id).addClass("greenBackground");
                        _currentDocument = this.id.split("_")[1];
                    });
                _nextUnusedID++;
                });
            
                $(".document").each(function (i, documentButton) {
                    if ($.inArray(documentButton.innerHTML, unavailableDocuments) != -1) {
                        $(documentButton).parent().remove();
                    }
                });
                regenerateDocumentIDs();
            }
        });
    }

     function regenerateDocumentIDs() {
        var id = 0;
        $(".document").each(function (i, documentButton) {
            documentButton.id = "document_" + id;
            id++;
        });
    }

    function getDocumentContent(filename){
        console.log(filename);
        $.ajax({
            type: 'GET',
            url: '/php/other.php?opt=1&filename=' + filename,
            success: function (c) {
                $("#editor iframe").contents().find("body").html(JSON.parse(c));
            }
        });
    }

    getDocuments();
});