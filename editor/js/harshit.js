var canvas = new fabric.Canvas('canvas', {
    backgroundColor: 'rgb(240,240,240)'
});

var text=new fabric.IText('Harshit');
    canvas.add(text);

var imageLoader = document.getElementById('imageLoader');
imageLoader.addEventListener('change', handleImage, false);

function handleImage(e) {
  var reader = new FileReader();
  reader.onload = function (event) {
    var img = new Image();
    img.onload = function () {
        var imgInstance = new fabric.Image(img, {
            left:50,
            top:50,
            scaleX: 0.5,
            scaleY: 0.5
        })
        canvas.add(imgInstance);
    }
    img.src = event.target.result;
}
reader.readAsDataURL(e.target.files[0]);
}

//var imageRemove = document.getElementById('imageRemove');
//imageLoader.addEventListener('change', handleRemove, true);

function handleRemove() {
canvas.clear().renderAll();
}