
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
    var element = document.getElementById(ev.target.id);

    // if (element.nodeName == "DIV") {

    //   element.appendChild(document.getElementById(data));

    // }
    // else {

      //Move the image back to the unused catagories section ..

      element.parentNode.appendChild(document.getElementById(data));
      element.parentNode.removeChild(element);

      var list = document.getElementById("dvSource");

      if (element.id != "catQuestion") {
        list.appendChild(element);
      }

    // }

  }
