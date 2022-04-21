// V1.0
var categoryDialog;
var uploadDialog;
var uploadHEXDialog;

$(document).ready(function () {


    // -------------------------------------------------------------------------------------------
    //  Category Name
    // -------------------------------------------------------------------------------------------

    $(function () {

        var form,
            name = $("#categoryName"),
            allFields = $([]).add(name),
            tips = $(".validateTips");

        function checkLength(o, n, min, max) {
            if (o.val().length > max || o.val().length < min) {
                o.addClass("ui-state-error");
                updateTips("Length of " + n + " must be between " +
                    min + " and " + max + ".");
                return false;
            } else {
                return true;
            }
        }

        function checkRegexp(o, regexp, n) {
            if (!(regexp.test(o.val()))) {
                o.addClass("ui-state-error");
                updateTips(n);
                return false;
            } else {
                return true;
            }
        }

        function updateTips(t) {
            tips
                .text(t)
                .addClass("ui-state-highlight");
            setTimeout(function () {
                tips.removeClass("ui-state-highlight", 1500);
            }, 500);
        }

        function addCategory() {

            event.preventDefault();
            var valid = true;
            allFields.removeClass("ui-state-error");

            valid = valid && checkLength(name, "category name", 1, 99);
            valid = valid && checkRegexp(name, /^[a-z]([0-9a-z_\s])+$/i, "Category name may consist of a-z, 0-9, underscores, spaces and must begin with a letter.");

            if (valid) {

                var $categoryName = $('#categoryName').val();
                var $guid = $('#guid').val();

                $.post("Cart_CreateCSV.php",
                    {
                        categoryName: $categoryName,
                        guid: $guid,
                        mode: "createCategory"
                    },
                    function (data) {

                        $("#dvCategories").append(generateCatImage($categoryName, "temp/" + $guid + ".png"));
                        var cat = { name: $categoryName, screen: "temp/" + $guid + ".png", hex: "", data: "", save: "" };
                        cats.push(cat);
                        $('#categoryName').val("");

                    }

                );

                categoryDialog.dialog("close");

            }
            return valid;
        }

        categoryDialog = $("#dlgCatergory").dialog({
            autoOpen: false,
            height: "auto",
            width: 380,
            modal: true,
            open: function (event, ui) {
                $('#guid').val(generateGUID());
                $('#dlgCatergory').css('overflow', 'hidden'); //this line does the actual hiding
            },
            buttons: {
                "Create": addCategory,
                Cancel: function () {
                    categoryDialog.dialog("close");
                }
            },
            close: function () {
                form[0].reset();
                allFields.removeClass("ui-state-error");
            }
        });

        form = categoryDialog.find("form").on("submit", function (event) {
            event.preventDefault();
            addCategory();
        });

    });


    // -------------------------------------------------------------------------------------------
    //  CSV File Upload 
    // -------------------------------------------------------------------------------------------

    $(function () {
        var form,
            name = $("#fileName"),
            allFields = $([]).add(name),
            tips = $(".validateTips");

        function updateTips(t) {
            tips
                .text(t)
                .addClass("ui-state-highlight");
            setTimeout(function () {
                tips.removeClass("ui-state-highlight", 1500);
            }, 500);
        }

        function uploadFile() {

            event.preventDefault();
            var valid = true;
            allFields.removeClass("ui-state-error");
            var session_id = /SESS\w*ID=([^;]+)/i.test(document.cookie) ? RegExp.$1 : false;

            if (typeof $('#fileName')[0].files[0] == "undefined") {
                name.addClass("ui-state-error");
                updateTips("Please select a CSV file to upload.");
                valid = false;
            }

            if (valid) {

                var size = $('#fileName')[0].files[0].size;
                var mime = $('#fileName')[0].files[0].type;
                var extension = $('#fileName').val().replace(/^.*\./, '');

                if (size > 20000 || mime != "text/csv" || extension != "csv") {
                    name.addClass("ui-state-error");
                    updateTips("Invalid CSV file selected.");
                    valid = false;
                }

            }

            if (valid) {

                var $guid = $('#guid').val();
                var formData = new FormData($("#frmUploadCSVForm")[0]);

                $.ajax({

                    url: "./Cart_UploadCSV.php",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,

                }).done(function (data) {

                    if (data != "Invalid File") {

                        var url = String(window.location);
                        if (url.indexOf("?") != -1) {
                            url = url.substring(0, url.indexOf("?")) + "?file=" + session_id + ".csv";
                        }
                        else {
                            url = url + "?file=" + session_id + ".csv";
                        }
                        window.location.replace(url);

                    }
                    else {
                        alert("Invalid file type.");
                    }

                }).fail(function () {

                    alert("An error occurred, the files couldn't be sent!");

                });

                uploadDialog.dialog("close");

            }
            return valid;
        }

        uploadDialog = $("#dlgUploadCSV").dialog({
            autoOpen: false,
            height: "auto",
            width: 460,
            modal: true,
            open: function (event, ui) {
                var t = $('#guid');
                $('#guid').val(generateGUID());
                $('#dlgUploadCSV').css('overflow', 'hidden'); //this line does the actual hiding
            },
            buttons: {
                "Upload": uploadFile,
                Cancel: function () {
                    uploadDialog.dialog("close");
                }
            },
            close: function () {
                form[0].reset();
                allFields.removeClass("ui-state-error");
            }
        });

        form = uploadDialog.find("form").on("submit", function (event) {
            event.preventDefault();
            uploadFile();
        });

    });


    // -------------------------------------------------------------------------------------------
    //  Hex File Upload 
    // -------------------------------------------------------------------------------------------

    $(function () {
        var form,
            fileName = $("#hexName"),
            graphicName = $("#graphicName"),
            allFields = $([]).add(fileName).add(graphicName),
            tips = $(".validateTips");

        function updateTips(t) {
            tips
                .text(t)
                .addClass("ui-state-highlight");
            setTimeout(function () {
                tips.removeClass("ui-state-highlight", 1500);
            }, 500);
        }

        function uploadFile() {

            event.preventDefault();
            var valid = true;
            allFields.removeClass("ui-state-error");
            var session_id = /SESS\w*ID=([^;]+)/i.test(document.cookie) ? RegExp.$1 : false;

            var a = $('#hexName')[0];
            var b = $('#hexName')[0].files[0]

            if (typeof $('#hexName')[0].files[0] == "undefined") {
                fileName.addClass("ui-state-error");
                updateTips("Please select a HEX file to upload.");
                valid = false;
            }

            if (valid) {

                var size = $('#hexName')[0].files[0].size;
                var mime = $('#hexName')[0].files[0].type;
                var extension = $('#hexName').val().replace(/^.*\./, '');

                if (size > 85000 || mime != "" || extension != "hex") { // mime application/octet-stream
                    fileName.addClass("ui-state-error");
                    updateTips("Invalid HEX file selected.");
                    valid = false;
                }

            }

            if (valid && typeof $('#graphicName')[0].files[0] == "undefined") {
                graphicName.addClass("ui-state-error");
                updateTips("Please select a PNG file to upload.");
                valid = false;
            }

            if (valid) {

                var size = $('#graphicName')[0].files[0].size;
                var mime = $('#graphicName')[0].files[0].type;
                var extension = $('#graphicName').val().replace(/^.*\./, '');

                if (size > 10000 || mime != "image/png" || extension != "png") {
                    graphicName.addClass("ui-state-error");
                    updateTips("Invalid PNG file selected.");
                    valid = false;
                }

            }

            if (valid) {

                var $guid = $('#guid').val();
                var formData = new FormData($("#frmUploadHEXForm")[0]);

                $.ajax({
                    url: "./Cart_UploadHEX.php",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,

                }).done(function (data) {

                    if (data == "Invalid HEX File") {

                        alert("Invalid HEX File");

                    }
                    else if (data == "Invalid PNG File") {

                        alert("Invalid PNG File");

                    }
                    else if (data == "Upload of HEX Failed") {

                        alert("Upload of HEX Failed");

                    }
                    else if (data == "Upload of PNG Failed") {

                        alert("Upload of PNG Failed");

                    }
                    else {

                        var newIndex = items.length + 1;
                        var baseFileName = data.substring(9, 99999);
                        html = '<li id="li' + newIndex + '"><img class="game" src="temp/' + baseFileName + '.png" /></li>';
                        $('#dvUnused').append(html);

                        // Add game details to global collection..

                        var item = { name: "sds", screen: "temp/" + baseFileName + ".png", hex: "temp/" + baseFileName + ".hex", data: "", save: "" };
                        items.push(item);

                    }

                }).fail(function () {

                    alert("An error occurred, the files couldn't be sent!");

                });


                uploadHEXDialog.dialog("close");

            }
            return valid;
        }

        uploadHEXDialog = $("#dlgUploadHEX").dialog({
            autoOpen: false,
            height: "auto",
            width: 460,
            modal: true,
            open: function (event, ui) {
                var t = $('#guid');
                $('#guid').val(generateGUID());
                $('#dlgUploadHEX').css('overflow', 'hidden'); //this line does the actual hiding
            },
            buttons: {
                "Upload": uploadFile,
                Cancel: function () {
                    uploadHEXDialog.dialog("close");
                }
            },
            close: function () {
                form[0].reset();
                allFields.removeClass("ui-state-error");
            }
        });

        form = uploadHEXDialog.find("form").on("submit", function (event) {
            event.preventDefault();
            uploadFile();
        });

    });



    // Read the cart file and create the table ..

    var fileName = "./flashcart-index.csv";
    let searchParams = new URLSearchParams(window.location.search);

    if (searchParams.has('file')) {
        fileName = "temp/" + searchParams.get('file');
    }


    $.ajax({

        type: "GET",
        url: fileName,
        dataType: "text",

        success: function (response) {

            tabledata = response.replace(/\;/g, ",");
            urldata = tabledata.replace(/\\/g, "/");
            csvdata = $.csv.toArrays(urldata);
            generateHtmlTable(csvdata);


            // Read the categories file and add any unused categories ..

            $.ajax({

                type: "GET",
                url: "./categories.csv",
                dataType: "text",

                success: function (response) {

                    tabledata = response.replace(/\;/g, ",");
                    urldata = tabledata.replace(/\\/g, "/");
                    csvdata = $.csv.toArrays(urldata);
                    generateHtmlCategories(csvdata);


                    // Connect the events after the HTML table has been rendered ..

                    $("#btnCreateCategory").on("click", function () {
                        categoryDialog.dialog("open");
                    });

                    $("#btnUploadFile").on("click", function () {
                        uploadDialog.dialog("open");
                    });

                    $("#btnUploadHEXFile").on("click", function () {
                        uploadHEXDialog.dialog("open");
                    });

                    $('#btnGetData').click(function () {

                        var colCount = $("#tab").find("tr:first td").length;

                        if (allHeadersOK(colCount)) {

                            $('#output').val(createCSV(colCount));
                            $('#mode').val('csv');

                            $("#cartForm").submit();

                        }

                    });


                }

            });




            $('#btnAddCol').click(function () {

                catCount++;

                $('#cartForm').find('tr').each(function () {

                    var trow = $(this);
                    if (trow.index() === 0) {
                        trow.append(generateCatHeader(catCount, "catQuestion", "catQuestion.png", true));
                    }
                    else {
                        trow.append('<td valign="top"><ul id="col' + catCount + '" class="sortableColumn"></ul></td>');
                    }

                });

                $("#sortable").sortable();
                $("#sortable").disableSelection();

                $("#col" + catCount).sortable({
                    connectWith: ".sortableColumn",
                }).disableSelection();

            });

            $('#btnGetBin').click(function () {

                var colCount = $("#tab").find("tr:first td").length;


                if (allHeadersOK(colCount)) {

                    $('#output').val(createCSV(colCount));
                    $('#mode').val('bin');

                    $("#cartForm").submit();

                }

            });

        }

    });

});


function allHeadersOK(colCount) {


    // Do any categories not have a proper image?

    for (var i = 0; i < colCount - 2; i++) {

        var img = $("#tab").find("tr:first td:eq(" + (i + 2) + ") img:first");

        var pos = cats.map(function (e) {
            return e.name;
        }).indexOf(img.attr('id'));

        if (pos == -1) {
            alert("You need to add a category image to every column!");
            return false;
        }

    }

    return true;
}
