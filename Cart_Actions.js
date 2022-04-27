// V1.06

// Delete a column and move all the games to the 'unsued' column ..

var suppressOpenInfoDlg = false;

function deleteColumn(cell, columnID) {

    var index = cell.cellIndex;
    var dvCategories = $('#dvCategories');
    var img = cell.firstChild.firstChild;

    $('#col' + columnID).children().appendTo("#dvUnused");
    if (img.currentSrc.indexOf('catQuestion.png') == -1) {
        dvCategories.append(img);
    }
    $('#tab').find('tr').each(function () {
        this.removeChild(this.cells[index]);
    });

    resizeColumnHeights();

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

        $('#infoImg').attr("src", item.screen);
        $('#infoDeveloper').text(item.developer);
        $('#infoVersion').text(item.version);
        $('#infoInfo').html(item.info);
        var data = item.data;
        if  (data != "") data = "&data=../" + data;
        $('#infoPreview').attr("src", "projectABE/index.html?url=../" + item.hex + data + "&skin=BareFit");
        infoPanel.dialog("open");
        infoPreview.focus();
    }

    suppressOpenInfoDlg = false;

}
