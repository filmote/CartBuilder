
  function allowDrop(ev) {
    ev.preventDefault();
  }

  function drag(ev) {
    
    if (ev.dataTransfer == undefined) { return; }
    ev.dataTransfer.setData("imgID", ev.target.id);

  }

  function drop(ev) {

    ev.preventDefault();
    var data = ev.dataTransfer.getData("imgID");
    var sourceElement = document.getElementById(data);
    var targetElement = document.getElementById(ev.target.id);
    var list = document.getElementById("dvCategories");


    //Move the image back to the dvUnused catagories section ..

    if ($('#' + data).parent().prop("id") != "dvCategories") {

      // Image moved from one column heading to another ..

      var sourceParentElement = sourceElement.parentNode.parentNode;
      targetElement.parentNode.appendChild(sourceElement);
      targetElement.parentNode.removeChild(targetElement);

      var t = sourceElement.parentNode;
      catCount++;
      var s = generateCatHeader(catCount, "catQuestion" + catCount, "", true);
      sourceParentElement.outerHTML = generateCatHeader(catCount, "catQuestion" + catCount, "", true);
//      sourceElement.parentNode.appendChild(generateCatImage("catQuestion", "catQuestion.png"));

      if (targetElement.id != "catQuestion") {
        list.appendChild(targetElement);
      }

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
