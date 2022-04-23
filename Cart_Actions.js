// V1.02

// Delete a column and move all the games to the 'unsued' column ..

function deleteColumn(cell, columnID) {

    var index = cell.cellIndex;
    var dvCategories = $('#dvCategories');
    var img = cell.firstChild.firstChild;

    $('#col' + columnID).children().appendTo("#dvUnused");
    dvCategories.append(img);
    $('#tab').find('tr').each(function () {
        this.removeChild(this.cells[index]);
    });

}


// Move a coumn within a table from 'oldPos' to 'newPos' ..

jQuery.moveColumn = function (table, oldPos, newPos) {
    var rows = jQuery('tr', table);
    var cols;
    rows.each(function () {
        cols = jQuery(this).children('th, td');
        cols.eq(oldPos).detach().insertBefore(cols.eq(newPos));
    });
}


// Move a column left (valid for columns 3+) ..

function moveLeft(index) {
    if (index == 2) return;
    jQuery.moveColumn($('#tab'), index, index - 1);
}


// Move a column right (unless its the rightmost column) ..

function moveRight(index) {
    var colCount = $("#tab").find("tr:first td").length;
    if (index == colCount - 1) return;
    jQuery.moveColumn($('#tab'), index, index + 2);
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
