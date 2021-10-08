function signatureCapture() {
  var canvas = document.getElementById("newSignature");
  var context = canvas.getContext("2d");
  canvas.width = 276;
  canvas.height = 180;
  context.fillStyle = "#fff";
  context.strokeStyle = "#444";
  context.lineWidth = 5;
  context.lineCap = "round";
  context.fillRect(0, 0, canvas.width, canvas.height);
  
  var canvasblank = document.getElementById("blank");
  var contextblank = canvasblank.getContext("2d");
  canvasblank.width = 276;
  canvasblank.height = 180;
  contextblank.fillStyle = "#fff";
  contextblank.strokeStyle = "#444";
  contextblank.lineWidth = 1.5;
  contextblank.lineCap = "round";
  contextblank.fillRect(0, 0, canvas.width, canvas.height);
  var disableSave = true;
  var pixels = [];
  var cpixels = [];
  var xyLast = {};
  var xyAddLast = {};
  var calculate = false;
  {   //functions
    function remove_event_listeners() {
      canvas.removeEventListener('mousemove', on_mousemove, false);
      canvas.removeEventListener('mouseup', on_mouseup, false);
      canvas.removeEventListener('touchmove', on_mousemove, false);
      canvas.removeEventListener('touchend', on_mouseup, false);

      document.body.removeEventListener('mouseup', on_mouseup, false);
      document.body.removeEventListener('touchend', on_mouseup, false);
    }

    function get_coords(e) {
      var x, y;

      if (e.changedTouches && e.changedTouches[0]) {
        var offsety = canvas.offsetTop || 0;
        var offsetx = canvas.offsetLeft || 0;

        x = e.changedTouches[0].pageX - offsetx;
        y = e.changedTouches[0].pageY - offsety;
      } else if (e.layerX || 0 == e.layerX) {
        x = e.layerX;
        y = e.layerY;
      } else if (e.offsetX || 0 == e.offsetX) {
        x = e.offsetX;
        y = e.offsetY;
      }

      return {
        x : x, y : y
      };
    };

    function on_mousedown(e) {
      // console.log('mousedown');
      e.preventDefault();
      e.stopPropagation();

      canvas.addEventListener('mouseup', on_mouseup, false);
      canvas.addEventListener('mousemove', on_mousemove, false);
      canvas.addEventListener('touchend', on_mouseup, false);
      canvas.addEventListener('touchmove', on_mousemove, false);
      document.body.addEventListener('mouseup', on_mouseup, false);
      document.body.addEventListener('touchend', on_mouseup, false);

      empty = false;
      var xy = get_coords(e);
      context.beginPath();
      pixels.push('moveStart');
      context.moveTo(xy.x, xy.y);
      pixels.push(xy.x, xy.y);
      xyLast = xy;
    };

    function on_mousemove(e, finish) {
      // console.log('mousemove');
      e.preventDefault();
      e.stopPropagation();

      var xy = get_coords(e);
      // console.log(xy);
      var xyAdd = {
        x : (xyLast.x + xy.x) / 2,
        y : (xyLast.y + xy.y) / 2
      };

      // console.log(xyAdd);

      if (calculate) {
        var xLast = (xyAddLast.x + xyLast.x + xyAdd.x) / 3;
        var yLast = (xyAddLast.y + xyLast.y + xyAdd.y) / 3;
        pixels.push(xLast, yLast);
      } else {
        calculate = true;
      }

      // console.log('xyLast : ');
      // console.log(xyLast);
      // console.log('xyAdd : ');
      // console.log(xyAdd);
      context.quadraticCurveTo(xyLast.x, xyLast.y, xyAdd.x, xyAdd.y);
      // context.quadraticCurveTo(1, 50, 50, 50);
      pixels.push(xyAdd.x, xyAdd.y);
      context.stroke();
      context.beginPath();
      context.moveTo(xyAdd.x, xyAdd.y);
      xyAddLast = xyAdd;
      xyLast = xy;

    };

    function on_mouseup(e) {
      remove_event_listeners();
      disableSave = false;
      context.stroke();
      pixels.push('e');
      calculate = false;
    };
  }
  canvas.addEventListener('touchstart', on_mousedown, false);
  canvas.addEventListener('mousedown', on_mousedown, false);
}

function close_button(x, y, side) {


}

function signatureSave() {
  var canvas = document.getElementById("newSignature");
  var blank = document.getElementById("blank");
  if(canvas.toDataURL() == blank.toDataURL()){
    alert('Isi tanda tangan terlebih dahulu.');
  }else{
    var dataURL = canvas.toDataURL("image/png");
    window.location= "SPPADocFix.aspx?image=" + dataURL;
  }
};

function getDataURL(){
  console.log(document.forms[0]);
    var canvasImage = document.createElement("INPUT");
    canvasImage.type = "hidden";
    canvasImage.name = "canvasImage";
    canvasImage.value = document.getElementById("newSignature").toDataURL("image/png");
    document.forms[0].appendChild(canvasImage);
    var isCanvasEmpty = document.createElement("INPUT");
    isCanvasEmpty.type = "hidden";
    isCanvasEmpty.name = "isCanvasEmpty";
    isCanvasEmpty.value = document.getElementById('newSignature').toDataURL() == document.getElementById('blank').toDataURL()
    document.forms[0].appendChild(isCanvasEmpty);
};

function signatureClear() {
  var canvas = document.getElementById("newSignature");
  var context = canvas.getContext("2d");
  context.clearRect(0, 0, canvas.width, canvas.height);
  var canvasBlank = document.getElementById("blank");
  var context = canvasBlank.getContext("2d");
  context.clearRect(0, 0, canvasBlank.width, canvasBlank.height);
}

function signatureSave1() {
  var canvas = document.getElementById("newSignature");// save canvas image as data url (png format by default)
  var dataURL = canvas.toDataURL("image/png");
  document.getElementById("img").src = dataURL;
};

function CheckSignature(cnv,cnvblank) {
  if(canvas.toDataURL() == document.getElementById('blank').toDataURL())
    alert('It is blank');
  else
    alert('Save it!');
};


function loadImage(dataURL) {
    
    document.getElementById("<%= img.ClientID %>").src = dataURL;
}