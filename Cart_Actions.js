
  function deleteColumn(cell, columnID) {

    var index = cell.cellIndex;

    cats.splice(index - 2, 1);

    var dvSource = $('#dvSource');
    var img = cell.firstChild;

    $('#col' + columnID).children().appendTo("#unused");
    dvSource.append(img);
    $('#tab').find('tr').each(function () {
      this.removeChild(this.cells[index]);
    });

    //catCount--;

  }

  jQuery.moveColumn = function (table, from, to) {
    var rows = jQuery('tr', table);
    var cols;
    rows.each(function () {
      cols = jQuery(this).children('th, td');
      cols.eq(from).detach().insertBefore(cols.eq(to));
    });
  }


  function moveLeft(index, columnID) {
    jQuery.moveColumn($('#tab'), index, index - 1);
  }

// function addButtonHandlers() {


//   $('#btnAddCol').click(function () {

//     catCount++;

//     myform.find('tr').each(function () {

//       var trow = $(this);
//       if (trow.index() === 0) {
//         trow.append(generateCatHeader(catCount, "catQuestion.png", true));
//       } 
//       else {
//         trow.append('<td valign="top"><ul id="col' + catCount + '" class="sortableColumn"></ul></td>');
//       }

//     });

//     $("#sortable").sortable();
//     $("#sortable").disableSelection();

//     var cat = { name: "Unknown", screen: "", hex: "", data: "", save: "" };
//     cats.push(cat);

//     $("#col" + catCount).sortable({
//       connectWith: ".sortableColumn",
//       // receive: function (event, ui) {
//       //   alert("[" + this.id + "] received [" + ui.item.html() + "] from [" + ui.sender.attr("id") + "]");
//       // }
//     }).disableSelection();

//   });

//   $('#btnGetData').click(function () {

//     var output = '';
//     var colCount = $("#tab").find("tr:first td").length;

//     output = 'List;Discription;Title screen;Hex file;Data file;Save file;Likes;Developer<br>';
//     output += '0;Bootloader;arduboy-fx-loader.png;;;;;<br>'


//     alert(colCount);

//     for (var i = 1; i <= colCount - 2; i++) {

//       output += i;                            output += ";";
//       output += cats[i - 1].name;             output += ";";
//       output += cats[i - 1].screen;           output += ";";
//       output += cats[i - 1].hex;              output += ";";
//       output += cats[i - 1].data;             output += ";";
//       output += cats[i - 1].save;             output += ";;<br>";

//       var ul = $("#tab").find("tr:last td:eq(" + (i + 2) + ") ul:first");
//       var idsInOrder = ul.sortable("toArray");

//       for (const value of idsInOrder) {

//         output += i;
//         output += ";";

//         var index = value.substring(2);

//         output += items[index - 1].name;      output += ";";
//         output += items[index - 1].screen;    output += ";";
//         output += items[index - 1].hex;       output += ";";
//         output += items[index - 1].data;      output += ";";
//         output += items[index - 1].save;      output += ";;<br>";

//       }

//     }

//     // $('#output').remove();
//     $('#output').append(output);

//   });

// }