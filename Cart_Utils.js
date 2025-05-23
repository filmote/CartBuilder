/* -------------------------------------------------------------------------------

BSD 3-Clause License

Copyright (c) 2019, Filmote and Mr.Blinky
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this
   list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice,
   this list of conditions and the following disclaimer in the documentation
   and/or other materials provided with the distribution.

3. Neither the name of the copyright holder nor the names of its
   contributors may be used to endorse or promote products derived from
   this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

------------------------------------------------------------------------------- */

// V2.45

var suppressOpenInfoDlg = false;

function deleteColumn(cell, columnID) {

    clearSearch();
    
    var index = cell.cellIndex;
    var dvCategories = $('#dvCategories');
    var img = cell.firstChild.firstChild;

    $('#search').val("");
    $('#searchLabel').val("Search Games:");
    $('#col' + columnID).children().appendTo("#dvUnused");
    if (img.currentSrc.indexOf('catQuestion.png') == -1) {
        dvCategories.append(img);
    }
    $('#tab').find('tr').each(function () {
        this.removeChild(this.cells[index]);
    });

    resizeColumnHeights(true);

}


// Move a coumn within a table from 'oldPos' to 'newPos' ..

jQuery.moveColumn = function (table, oldPos, newPos) {
    var rows = jQuery('tr', table);
    var cols;

    if (newPos < $("#tab").find("tr:first th").length) {

        rows.each(function () {
            cols = jQuery(this).children('th, td');
            cols.eq(oldPos).detach().insertBefore(cols.eq(newPos));
        });

    }
    else {

        rows.each(function () {
            cols = jQuery(this).children('th, td');
            cols.eq(oldPos).detach().insertAfter(cols.eq(newPos - 1));
        });

    }

}


// Move a column left (valid for columns 3+) ..

function moveLeft(index) {
    if (index == 2) return;
    jQuery.moveColumn($('#tab'), index, index - 1);
}


// Move a column to the left most position (valid for columns 3+) ..

function moveLeftMost(index) {
    if (index == 2) return;
    jQuery.moveColumn($('#tab'), index, 2);
}


// Move a column right (unless its the rightmost column) ..

function moveRight(index) {
    var colCount = $("#tab").find("tr:first th").length;
    if (index == colCount - 1) return;
    jQuery.moveColumn($('#tab'), index, index + 2);
}


// Move a column to the right most position (unless its the rightmost column) ..

function moveRightMost(index) {
    var colCount = $("#tab").find("tr:first th").length;
    if (index == colCount - 1) return;
    jQuery.moveColumn($('#tab'), index, colCount);
}


// --------------------------------------------------------------------------
//  Drag and Drop functions: used for re-arranging column headers ..

// Can an image be dropped ?  

function allowDrop(ev) {
    ev.preventDefault();
}


// Capture image being dragged on start of drag ..

function drag(ev) {

    if (ev.dataTransfer == undefined) { return; }
    ev.dataTransfer.setData("imgID", ev.target.id);

}


// Handle drop event ..

function drop(ev) {

    ev.preventDefault();

    var data = ev.dataTransfer.getData("imgID");
    var sourceElement = document.getElementById(data);
    var targetElement = document.getElementById(ev.target.id);
    var list = document.getElementById("dvCategories");


    //Move the image back to the dvUnused catagories section ..

    if ($('#' + data).parent().prop("id") != "dvCategories") {

        var sourceParentElement = sourceElement.parentNode;
        targetElement.parentNode.appendChild(sourceElement);
        sourceParentElement.appendChild(targetElement);

    }
    else {


        // Image moved from the left hand column  ..

        targetElement.parentNode.appendChild(sourceElement);
        targetElement.parentNode.removeChild(targetElement);

        if (targetElement.id != "catQuestion") {
            list.appendChild(targetElement);
        }

    }

}

function openInfo(itemIndex) {

    if (suppressOpenInfoDlg == false) {

        var item = items[itemIndex - 1];
        var gamenr = 0;
        var gamecount = 0;
        for (var i = 0; i < $("#tab").find("tr:first th").length - 2; i++) {
            var ul = $("#tab").find("tr:last td:eq(" + (i + 2) + ") ul:first");
            var idsInOrder = ul.sortable("toArray");
            for (const value of idsInOrder) {
                gamecount++;
                if (itemIndex == value.substring(2)) gamenr = gamecount;
            }
        }
        var gameinfo = ""
        if (gamenr > 0) gameinfo = " (Game " + gamenr + " of " +gamecount + ")";
        if (item.name !="" || gameinfo != "") $('#ui-id-4').text(item.name + gameinfo);
        $('#infoImg').attr("src", item.screen);
        $('#infoDeveloper').text(item.developer);
        if (item.version != "") $('#infoVersion').text("Version " + item.version + " (" + item.size.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",") + " bytes)");
        $('#infoInfo').html(item.info);
        var data = item.data;
        if  (data != "") data = "&data=http://www.bloggingadeadhorse.com/cart/" + data;
        var saveFile = item.save;
        if  (saveFile != "") saveFile = "&save=http://www.bloggingadeadhorse.com/cart/" + saveFile;
        // var urlParams = item.params;
        // $('#infoPreview').attr("src", "projectABE/index.html?url=../" + item.hex + data + "&skin=BareFit");
        //alert("http://www.bloggingadeadhorse.com/cart/" + item.hex);
        $('#infoPreview').attr("src", "");
        $('#infoPreview').attr("src", "arduboy_sim_web/player.html?blah=http://www.bloggingadeadhorse.com/cart/" + item.hex + data + saveFile);


        // http://www.bloggingadeadhorse.com/ppot/arduboy_sim_web/player.html?blah=https://github.com/Press-Play-On-Tape/PrinceOfArabia/releases/download/V1.01-Beta.016/PrinceOfArabia.hex&blah=https://github.com/Press-Play-On-Tape/PrinceOfArabia/releases/download/V1.01-Beta.016/fxdata.bin

        var eepromInfo = "EEPROM Usage: None";

        if (item.start != "na" && item.start != "") {
            eepromInfo = "EEPROM Usage: start " + item.start + ", end " + item.end;
            if (item.hash == 1) {
                eepromInfo = eepromInfo + ", hash protected.";
            }
            else {
                eepromInfo = eepromInfo + ", unprotected.";
            }
        }

        $('#infoEEPROMUsage').html(eepromInfo);


        // Download zip or Hex?

        if (item.data != "" || item.save != "") {

            $('#downloadLink').attr("href", item.hex.substring(0, item.hex.length - 3) + "fx.zip");

        }
        else {

            $('#downloadLink').attr("href", item.hex);

        }


        
        // Upload to device, zip or bin?

        if (item.data != "" || item.save != "") {

            $('#uploadToDeviceLink').attr("href", item.hex.substring(0, item.hex.length - 3) + "fx.zip");

        }
        else {

            $('#uploadToDeviceLink').attr("href", item.hex);

        }


        // Hide delete button?

        $('#itemId').val(itemIndex);
        if ($('#li' + itemIndex).parent().attr("id") == "dvUnused") {
            $('#deleteBin').hide();
        }
        else {
            $('#deleteBin').show();
        }

        if (!(item.url === undefined) && item.url != "") {
            $('#url').show();
            $('#url').attr("href", item.url);
        }
        else {
            $('#url').hide();
        }

        if (!(item.source === undefined) && item.source != "") {
            $('#source').show();
            $('#source').attr("href", item.source);
        }
        else {
            $('#source').hide();
        }

        $.ajax({
            type: "GET",
            url: "./Cart_GetLikes.php?hex=" + item.hex,
            dataType: "text",

        }).done(function (data) {

            const details = data.split(";");
            $('#titleID').val(details[0]);

            if (details[2] == "0") {

                if (details[1] == "0") {
                    $('#likeImg').attr("src", "icons/Like_Empty.png");
                    $('#likeNumber').text("Be the first to like this title.");
                }
                else {
                    $('#likeImg').attr("src", "icons/Like_HasLikes.png");
                    $('#likeNumber').text(details[1] + " Likes");
                }

                $("#likeImg").attr("onclick","incLikes()");

            }
            else {

                $('#likeImg').attr("src", "icons/Like_Selected.png");
                $('#likeNumber').text(details[1] + " Likes");
                $("#likeImg").attr("onclick","decLikes()");

            }

        }).fail(function () {

            // uploadHEXDialog.dialog("close");
            // $('#errorMessage').text("An error occurred, the files couldn't be sent!");
            // errorDialog.dialog("open");

        });


        infoPanel.dialog("open");
        infoPreview.focus();
    }

    suppressOpenInfoDlg = false;

}

// Do all columns have a valid category image?

function allHeadersOK(colCount) {


    // Do any categories not have a proper image?

    for (var i = 0; i < colCount - 2; i++) {

        var img = $("#tab").find("tr:first th:eq(" + (i + 2) + ") img:first");

        var pos = cats.map(function (e) {
            return e.name;
        }).indexOf(img.attr('id'));

        if (pos == -1) {

            $('#errorMessage').text("You need to add a category image to every column!");
            errorDialog.dialog("open");
            return false;

        }

    }

    return true;

}


// Form validation, check length of field ..

function checkLength(tip, o, n, min, max) {

    if (o.val().length > max || o.val().length < min) {
        o.addClass("ui-state-error");
        updateTips(tip, "Length of " + n + " must be between " + min + " and " + max + ".");
        return false;
    }
    else {
        return true;
    }

}


// Form validation, does field value match a regex ?

function checkRegexp(tip, o, regexp, n) {

    if (!(regexp.test(o.val()))) {
        o.addClass("ui-state-error");
        updateTips(tip, n);
        return false;
    }
    else {
        return true;
    }

}


// Update tips on form ..

function updateTips(tip, t) {

    tip
        .text(t)
        .addClass("ui-state-highlight");
    setTimeout(function () {
        tip.removeClass("ui-state-highlight", 1500);
    }, 500);

}


// Generate a GUID (of sorts) to make items unique ..

function generateGUID() {

    var d = new Date().getTime();

    var guid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
        var r = (d + Math.random() * 16) % 16 | 0;
        d = Math.floor(d / 16);
        return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
    });

    return guid;
}


// Create a Cart Image (CSV) file ..

function createCSV(colCount) {


    // If all OK, generate data ..

    var output = '';

    output = 'List;Description;Title;Hex;Data;Save;Version;Developer;Info;Likes;URL;Source;Start;End;Hash<eol/>';
    if ($("#rtc").is(":checked")) {
        output += '0;Bootloader;' + $("#loader").val() + ';;FXFiles/RTC-data.bin;;;' + ((typeof extraCats === "undefined" || extraCats == "")? '' : extraCats) + ';' + ((typeof fullList === "undefined" || fullList == "")? '' : fullList) + ';;;;;;<eol/>'
    }
    else {
        output += '0;Bootloader;' + $("#loader").val() + ';;;;;' + ((typeof extraCats === "undefined" || extraCats == "")? '' : extraCats) + ';' + ((typeof fullList === "undefined" || fullList == "")? '' : fullList) + ';;;;;;<eol/>'
    }

    for (var i = 0; i < colCount - 2; i++) {

        var img = $("#tab").find("tr:first th:eq(" + (i + 2) + ") img:first");

        var pos = cats.map(function (e) {
            return e.name;
        }).indexOf(img.attr('id'));

        if (pos >= 0) {

            var cat = cats[pos];

            output += (i + 1); output += ";";
            output += cat.name; output += ";";
            output += cat.screen; output += ";";
            output += cat.hex; output += ";";
            output += cat.data; output += ";";
            // output += cat.save; output += ";;;;<eol/>";
            output += cat.save; output += ";";
            output += cat.version; output += ";";
            output += cat.developer; output += ";";
            output += cat.info; output += ";;;;;;;<eol/>";

            var ul = $("#tab").find("tr:last td:eq(" + (i + 2) + ") ul:first");
            var idsInOrder = ul.sortable("toArray");

            for (const value of idsInOrder) {

                output += (i + 1);
                output += ";";

                var index = value.substring(2);

                output += items[index - 1].name; output += ";";
                output += items[index - 1].screen; output += ";";
                output += items[index - 1].hex; output += ";";
                output += items[index - 1].data; output += ";";
                output += items[index - 1].save; output += ";";
                output += items[index - 1].version; output += ";";
                output += items[index - 1].developer; output += ";";  
                output += items[index - 1].info; output += ";;";  // <<likes

                if (items[index - 1].url == undefined) {
                    output += ";";
                }
                else {
                    output += items[index - 1].url; output += ";";
                }

                if (items[index - 1].source == undefined) {
                    output += ";";
                }
                else {
                    output += items[index - 1].source; output += ";";
                }

                if (items[index - 1].start == undefined) {
                    output += ";";
                }
                else {
                    output += items[index - 1].start; output += ";";
                }

                if (items[index - 1].end == undefined) {
                    output += ";";
                }
                else {
                    output += items[index - 1].end; output += ";";
                }

                if (items[index - 1].hash == undefined) {
                    output += ";<eol/>";
                }
                else {
                    output += items[index - 1].hash; output += ";<eol/>";
                }
            }

        }
        else {

            alert("Could not find column!");

        }

    }

    return output;

}

function resizeColumnHeights(recalc) {

    var maxHeight = 0;
    var colCount = $("#tab").find("tr:first th").length;

    for (var i = 0; i < colCount; i++) {

        var numberOfImages = $("#tab").find("tr:last td:eq(" + i + ") img").length;

        if (numberOfImages * 76 > maxHeight) {
            maxHeight = numberOfImages * 76;
        }

    }

    for (var i = 0; i < colCount; i++) {

        switch (i) {

            case 0:
                $("#dvCategories").height(maxHeight) - 80;
                break;

            case 1:
                $("#dvUnused").height(maxHeight) - 80;
                break;

            default:
                $("#col" + (i - 1)).height(maxHeight) - 80;
                break;

        }

    }

    if (recalc) {
        var overallSize = calculateCartSize();
        $("#cartSize").val(overallSize.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",") + " (" + (Math.round((overallSize / 16777216)*1000)/10).toFixed(1) + "%)");

        if (overallSize / 16777216 > 1) {

            $("#btnFlashDevice").prop( "disabled", true );
            $("#btnGetBin").prop( "disabled", true );
            $("#cartSize").css({
                "background-color": "#c24e4e",
                "color": "white"
            });

        }
        else {

            $("#btnFlashDevice").prop( "disabled", false );
            $("#btnGetBin").prop( "disabled", false );
            $("#cartSize").css({
                "background-color": "#45c4fa",
                "color": "black"
            });
        }

    }

}


function calculateCartSize() {

    var colCount = $("#tab").find("tr:first th").length;

    // If all OK, generate data ..

    var overallSize = 0;

    for (var i = 0; i < colCount - 2; i++) {

        var ul = $("#tab").find("tr:last td:eq(" + (i + 2) + ") ul:first");
        var idsInOrder = ul.sortable("toArray");
        
        for (const value of idsInOrder) {

            var index = value.substring(2);
            overallSize = overallSize + Number(items[index - 1].size);

        }

    }

    return overallSize;

}

function clearSearch() {

    $('#dvHidden').children().appendTo("#dvUnused");
    $('#searchLabel').html("Search Games:&nbsp&nbsp;&nbsp;&nbsp;&nbsp;");

    // Clear highlighting ..

    for (var idx = 0; idx < items.length; idx++) {

        $('#li' + (idx + 1)).show();

    }

}

function doSearch() {

  var matchCount = 0;

  if ($('#search').val() == "") {

    clearSearch();

  }
  else {
    
    $('#dvUnused').children().appendTo("#dvHidden");


    // Items not in use ..

    var ul = $("#dvHidden");
    var idsInOrder = ul.sortable("toArray");
    const matches = new Map();

    for (const value of idsInOrder) {

        var index = value.substring(2);

        if (items[index - 1].name.toLowerCase().indexOf($('#search').val().toLowerCase()) > -1 || items[index - 1].developer.toLowerCase().startsWith($('#search').val().toLowerCase())) {

            matches.set(value, value);
            matchCount++;

        }

    }
 

    for (const match of matches) {

        var item = $('#' + match);
        $('#dvUnused').append(item);
        
    }


    // Items in use ..

    for (var idx = 0; idx < items.length; idx++) {

        var item = items[idx];

        if (item.name.toLowerCase().indexOf($('#search').val().toLowerCase()) > -1 || item.developer.toLowerCase().startsWith($('#search').val().toLowerCase())) {

            if (!matches.has("li" + (idx+1))) {
                $('#li' + (idx + 1)).show();
                matchCount++;
            }

        }
        else {

            $('#li' + (idx + 1)).hide();

        }

    }

    var found = "Search: " + "(" + matchCount + " of " + items.length + ")";
    $('#searchLabel').text(found);

  }

  resizeColumnHeights(7);

}


$("#deleteBin").click(function() {

    var itemId = $("#itemId").val();
    var sourceElement = document.getElementById(itemId);

    if (sourceElement.parentElement.id != "dvUnused") {

        var targetElement = document.getElementById("dvUnused");//$("#dvUnused");
        var sourceParentElement = sourceElement.parentNode;
        targetElement.appendChild(sourceElement);
        $('#deleteBin').hide();
        $("#dlgInfoPanel").dialog("close");
    }

});


// FlashCode
$("#uploadToDeviceLink").click(function() {
//uploadToDeviceID


    var itemId = $("#itemId").val();
    var sourceElement = document.getElementById(itemId);
    var itemX = items[itemId - 1];

    $('#fileName').text(itemX.hex);
    $('#dataFileName').val(itemX.data);
    $('#saveFileName').val(itemX.save);

    $('#hasDataFile').val(itemX.data == "" ? "N" : "Y");
    $('#hasSaveFile').val(itemX.save == "" ? "N" : "Y");
    
    $('#infoPreview').attr("src", "");
    $("#dlgInfoPanel").dialog("close");
    $("#dlgUploadToDevice").dialog("open");

});

function incLikes() {

    var id = $('#titleID').val();

    $.ajax({
        type: "GET",
        url: "./Cart_IncLikes.php?id=" + id,
        dataType: "text",

    }).done(function (data) {

        const details = data.split(";");
        $('#titleID').val(details[0]);

        if (details[2] == "0") {

            if (details[1] == "0") {
                $('#likeImg').attr("src", "icons/Like_Empty.png");
                $('#likeNumber').text("Be the first to like this title.");
            }
            else {
                $('#likeImg').attr("src", "icons/Like_HasLikes.png");
                $('#likeNumber').text(details[1] + " Likes");
            }

            $("#likeImg").attr("onclick","incLikes()");

        }
        else {

            $('#likeImg').attr("src", "icons/Like_Selected.png");
            $('#likeNumber').text(details[1] + " Likes");
            $("#likeImg").attr("onclick","decLikes()");

        }

    }).fail(function () {

        // uploadHEXDialog.dialog("close");
        // $('#errorMessage').text("An error occurred, the files couldn't be sent!");
        // errorDialog.dialog("open");

    });
}

function decLikes() {

    var id = $('#titleID').val();

    $.ajax({
        type: "GET",
        url: "./Cart_DecLikes.php?id=" + id,
        dataType: "text",

    }).done(function (data) {

        const details = data.split(";");
        $('#titleID').val(details[0]);

        if (details[2] == "0") {

            if (details[1] == "0") {
                $('#likeImg').attr("src", "icons/Like_Empty.png");
                $('#likeNumber').text("Be the first to like this title.");
            }
            else {
                $('#likeImg').attr("src", "icons/Like_HasLikes.png");
                $('#likeNumber').text(details[1] + " Likes");
            }

            $("#likeImg").attr("onclick","incLikes()");

        }
        else {

            $('#likeImg').attr("src", "icons/Like_Selected.png");
            $('#likeNumber').text(details[1] + " Likes");
            $("#likeImg").attr("onclick","decLikes()");

        }

    }).fail(function () {

        // uploadHEXDialog.dialog("close");
        // $('#errorMessage').text("An error occurred, the files couldn't be sent!");
        // errorDialog.dialog("open");

    });
}