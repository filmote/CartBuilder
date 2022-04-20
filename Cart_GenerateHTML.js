
function generateHtmlCategories(data) {

  if (typeof (data[0]) === 'undefined') {

    return null;

  }

  catCount = 255;

  $.each(data, function (index, row) {

    // ignore header

    if (index == 0) { } else {

      if (catCount != row[0] && row[0] != 0) {

        // Does the cateogries collection already contain this category?

        var pos = cats.map(function (e) {
          return e.name;
        }).indexOf(row[1]);

        if (pos < 0) {

          catCount = row[0];
          $("#dvCategories").append(generateCatImage(row[1], row[2]));


          // Add category details to global collection..

          var cat = { name: row[1], screen: row[2], hex: row[3], data: row[4], save: row[5] };
          cats.push(cat);
        }

      }

    }

  });

}

function generateHtmlTable(data) {

  if (typeof (data[0]) === 'undefined') {

    return null;

  }

  var html = '<table id=tab class="AltTable"><tr><td valign="top" style="background-color: #25AAE2; column-width:600px;">';
  html += '<button type="button" id="btnGetData" style="width: 135px; height: 25px; background-color: #156f96;border: 0px;">Download CSV</button><div style="height:4px;"></div>';
  html += '<button type="button" id="btnUploadFile" style="width: 135px; height: 25px; background-color: #156f96;border: 0px;">Upload CSV</button>';
  html += '</td><td valign="top" style="background-color: #25AAE2; column-width:600px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';

  catCount = 255;

  $.each(data, function (index, row) {

    // ignore header

    if (index == 0) { } else {

      if (catCount != row[0] && row[0] != 0) {

        catCount = row[0];
        html += generateCatHeader(catCount, row[1], row[2], false);


        // Add category details to global collection..

        var cat = { name: row[1], screen: row[2], hex: row[3], data: row[4], save: row[5] };
        cats.push(cat);

      }

    }

  });


  html += '</tr>';
  html += '<tr><td valign="top" style="background-color: #156f96; width: 145px;">';
  html += '<div id="dvCategories"><button type="button" id="btnCreateCategory" style="width: 140px; background-color: #25AAE2;border: 0px;">Create Category</button></div><br/>';
  html += '</td><td valign="top" style="background-color: #156f96; width: 145px;"><button type="button" id="btnUploadHEXFile" style="width: 154px; background-color: #25AAE2;border: 0px;">Upload Game</button><ul id="dvUnused" class="sortableColumn" style="margin-top:-5px; margin-bottom: 75px;"></ul></td>';


  catCount = 255;
  var itemIndex = 1;

  $.each(data, function (index, row) {

    //bind header

    if (index == 0) {


    } else {

      if (catCount != row[0] && row[0] != 0) {

        if (catCount != 255 && catCount != 0) {
          html += '</ul></td>';

        }

        catCount = row[0];
        html += '<td valign="top">';
        html += '<ul id="col' + catCount + '" class="sortableColumn">';

      }
      else {

        if (catCount != 255 && catCount != 0) {

          html += '<li id="li' + itemIndex + '"><img class="game" src="' + row[2] + '" /></li>';
          itemIndex++;


          // Add game details to global collection..

          var item = { name: row[1], screen: row[2], hex: row[3], data: row[4], save: row[5] };
          items.push(item);

        }

      }

    }

  });

  html += '</ul></td></tr></table>';

  $('#csv-display').append(html);
  $("#sortable").sortable();
  $("#sortable").disableSelection();

  $("#dvUnused").sortable({
    connectWith: ".sortableColumn",
  }).disableSelection();

  for (var i = 1; i <= catCount; i++) {
    var columnName = "#col" + i;
    $(columnName).sortable({
      connectWith: ".sortableColumn",
    }).disableSelection();

  }

}

function generateCatHeader(catCount, catName, imgName, temporaryImage) {

  var html = '';
  html += '<td valign="top">';
  html += '<div id="div' + catName + '" ondrop="drop(event)" ondragover="allowDrop(event)">';

  if (temporaryImage) {
    html += '<img class="game" id="catQuestion" draggable="true" ondragstart="drag(event)" src="catQuestion.png" />';
  }
  else {
    html += '<img class="game" id="' + catName + '" draggable="true" ondragstart="drag(event)" src="' + imgName + '" />';
  }

  html += '</div>';
  html += '<div>&nbsp;<img size=16px src="ArrowLeft.png" onclick="moveLeft(this.parentNode.parentNode.cellIndex);">';
  html += '&nbsp;<img size=16px src="ArrowRight.png" onclick="moveRight(this.parentNode.parentNode.cellIndex);">';
  html += '&nbsp;<img size=16px src="Delete.png" onclick="deleteColumn(this.parentNode.parentNode,' + catCount + ');">';
  html += '</div></td>';

  return html;

}

function generateCatImage(catName, imgName) {

  var html = '';

  html += '<img class="game" id="' + catName + '" draggable="true" ondragstart="drag(event)" src="' + imgName + '" />';
  return html;

}
