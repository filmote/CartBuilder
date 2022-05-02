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

// V1.07

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


// Form valation, check length of field ..

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


// Form valation, does field value match a regex ?

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


// Genereate a GUID (of sorts) to make items unique ..

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

    output = 'List;Discription;Title;Hex;Data;Save;Version;Developer;Info;Likes<eol/>';
    output += '0;Bootloader;arduboy-fx-loader.png;;;;;;' + ((typeof fullList === "undefined" || fullList == "")? '' : fullList) + ';<eol/>'

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
            output += cat.info; output += ";<eol/>";

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
                output += items[index - 1].info; output += ";<eol/>";

            }

        }
        else {

            alert("Could not find column!");

        }

    }

    return output;

}

function resizeColumnHeights() {

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

}