
$(document).ready(function () {

    $(function () {
        var categoryDialog, form,

            // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            name = $("#categoryName"),
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

                        $("#dvCategories").append(generateCatImage($categoryName, "category-screens/temp/" + $guid + ".png"));
                        var cat = { name: $categoryName, screen: "category-screens/temp/" + $guid + ".png", hex: "", data: "", save: "" };
                        cats.push(cat);
                        $('#categoryName').val("");

                    }

                );

                categoryDialog.dialog("close");

            }
            return valid;
        }

        categoryDialog = $("#categoryDialog-form").dialog({
            autoOpen: false,
            height: 260,
            width: 360,
            modal: true,
            open: function (event, ui) {
                console.log(generateGUID());
                var t = $('#guid');
                $('#guid').val(generateGUID());
                $('#categoryDialog-form').css('overflow', 'hidden'); //this line does the actual hiding
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

        $("#btnCreateCategory").button().on("click", function () {
            categoryDialog.dialog("open");
        });

    });



    $(function () {
        var uploadDialog, form,

            // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
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

            // valid = valid && checkLength(name, "file name", 1, 99);
            // valid = valid && checkRegexp(name, /^[a-z]([0-9a-z_\s])+$/i, "Category name may consist of a-z, 0-9, underscores, spaces and must begin with a letter.");

            if (valid) {

                var $categoryName = $('#categoryName').val();
                var $guid = $('#guid').val();

                $.ajax({
                    // Your server script to process the upload
                    url: 'Cart_FileUpload.php',
                    type: 'POST',
                
                    // Form data
                    data: new FormData($('uploadForm')[0]),
                
                    // Tell jQuery not to process data or worry about content-type
                    // You *must* include these options!
                    cache: false,
                    contentType: false,
                    processData: false,
                
                    // Custom XMLHttpRequest
                    xhr: function () {
                      var myXhr = $.ajaxSettings.xhr();
                      if (myXhr.upload) {
                        // For handling the progress of the upload
                        myXhr.upload.addEventListener('progress', function (e) {
                          if (e.lengthComputable) {
                            $('progress').attr({
                              value: e.loaded,
                              max: e.total,
                            });
                          }
                        }, false);
                      }
                      return myXhr;
                    }
                  });

                uploadDialog.dialog("close");

            }
            return valid;
        }

        uploadDialog = $("#uploadDialog-form").dialog({
            autoOpen: false,
            height: 260,
            width: 360,
            modal: true,
            open: function (event, ui) {
                console.log(generateGUID());
                var t = $('#guid');
                $('#guid').val(generateGUID());
                $('#uploadDialog-form').css('overflow', 'hidden'); //this line does the actual hiding
            },
            buttons: {
                "Create": uploadFile,
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

        $("#btnUploadFile").button().on("click", function () {
            uploadDialog.dialog("open");
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
        //      url: "./flashcart-index.csv",
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

    $('#btnGetData').click(function () {

        var colCount = $("#tab").find("tr:first td").length;

        if (allHeadersOK(colCount)) {

            $('#output').val(createCSV(colCount));
            $('#mode').val('csv');

            $("#cartForm").submit();

        }

    });

    $('#btnGetBin').click(function () {

        var colCount = $("#tab").find("tr:first td").length;


        if (allHeadersOK(colCount)) {

            $('#output').val(createCSV(colCount));
            $('#mode').val('bin');

            $("#cartForm").submit();

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
