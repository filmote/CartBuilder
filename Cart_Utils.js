
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

      


function generateGUID() {

  var d = new Date().getTime();

  var guid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
    var r = (d + Math.random() * 16) % 16 | 0;
    d = Math.floor(d / 16);

    return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
  });

  return guid;
}

function createCSV(colCount) {


  // If all OK, generate data ..

  var output = '';

  output = 'List;Discription;Title screen;Hex file;Data file;Save file;Likes;Developer<br/>';
  output += '0;Bootloader;arduboy-fx-loader.png;;;;;<br/>'

  for (var i = 0; i < colCount - 2; i++) {

    var img = $("#tab").find("tr:first td:eq(" + (i + 2) + ") img:first");

    var pos = cats.map(function (e) {
      return e.name;
    }).indexOf(img.attr('id'));

    console.log(img.attr('id'));
    if (pos >= 0) {

      var cat = cats[pos];

      output += (i + 1); output += ";";
      output += cat.name; output += ";";
      output += cat.screen; output += ";";
      output += cat.hex; output += ";";
      output += cat.data; output += ";";
      output += cat.save; output += ";;<br/>";

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
        output += items[index - 1].save; output += ";;<br/>";

      }

    }
    else {

      alert("Pos sux");

    }

  }

  return output;

}
