var demo = {
  init: function () {
  var img = new Image();
  img.onload = function () {
    var fImg = new fabric.Cropzoomimage(this, {
      originX: 'center',
      originY: 'center',
      left: canvas.getWidth() / 2,
      top: canvas.getHeight() / 2,
    //  scaleX: 150 / canvas.getWidth(),
    //  scaleY: 150 / canvas.getHeight(),
      width: 200,
      height : 150,
      opacity:1
      //hasControls:false
    });
    //fImg.setCrossOrigin('anonymous');
    canvas.add(fImg);
    canvas.setActiveObject(fImg);

  };
  //img.src = 'http://www.webgear.nl/pics/tulips.jpg';
  img.src = document.getElementById('llg').src;
  this.initKeyboard();
}
};


var product_id = 1;


var img = new Image();
var tempObj = '',
CanvasObj = '',
group = [],
text40 = '',
text41 = '',
state = [],
obj = '',
canvas = this.__canvas = new fabric.Canvas('c'),

center = {
  x: canvas.width / 2,
  y: canvas.height / 2
};



/* functions required are fontsize , fontstyle , change Language, change text color, change background color*/
/* look at functions like  LineTwoText to understand the postioning of fabric objects in the center*/
/* look at functions like  Chnagelng for hindi, english */

function FontChange(e) {
canvas.getActiveObject().fontSize = e.value,
canvas.renderAll()
}

function downloadCanvas(e, t) {
var n = Math.ceil(100000 * Math.random());
canvas.deactivateAll(),
canvas.renderAll(),
e.href = document.getElementById(t).toDataURL(),
e.download = n + '.jpg'
}

function rasterize() {                      /* known as preview */
canvas.deactivateAll(),
window.open(canvas.toDataURL('png'));
}

function deleteData() {                       /* select multiple and then delete all fabric object*/
canvas.getActiveGroup() ? (canvas.getActiveGroup().forEachObject(function (e) {
  canvas.remove(e)
}), canvas.discardActiveGroup().renderAll())  : null == canvas.getActiveObject().text && canvas.remove(canvas.getActiveObject())
}


/* Using AJAX to save image in databse for future reference  or if he wishes to come back later and edit it. */
function facebook() {
canvas.deactivateAll(),
canvas.renderAll();
var e = canvas.toDataURL();
$.ajax({
  type: 'POST',
  url: 'saveme.php',
  data: {
    imgBase64: e
  }
}).done(function (e) {
  window.open('//www.facebook.com/share.php?m2w&s=100&p[url]=' + encodeURIComponent('http://www.dekhbhai.com') + '&p[images][0]=' + encodeURIComponent('http://www.deskhbhai.com/' + e) + '&p[title]=' + encodeURIComponent('hello') + '&p[summary]=' + encodeURIComponent('Its Free'), 'Facebook', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600')
})
}






//    ADDING TEXT

canvas.backgroundColor = '#F5F5F5',
$('#language').val('en'),
document.getElementById('add-text').onclick = function() {
      var text = $("#text-string").val();
        var textSample = new fabric.Text(text, {
          left: center.x,
          top: center.y + 15,
          angle: 0,
          textAlign: 'center',
          fontFamily: 'helvetica',
          fill: '#000000',
          scaleX: 0.5,
          scaleY: 0.5,
          fontWeight: '',
          hasRotatingPoint:true
        });       
            canvas.add(textSample); 
            canvas.item(canvas.item.length-1).hasRotatingPoint = true;    
            $("#texteditor").css('display', 'block');
            $("#imageeditor").css('display', 'block');
      };
      $("#text-string").keyup(function(){       
        var activeObject = canvas.getActiveObject();
          if (activeObject && activeObject.type === 'text') {
            activeObject.text = this.value;
            canvas.renderAll();
          }
      });

$('.targetDiv a img').click(function () {
  demo.init();

  /* var imgElement = document.getElementById('llg');
                var imgInstance = new fabric.Image(imgElement, {
                  left: 80,
                  top: 160,
         
                 
                  width :260,
                  height : 172

                });
                canvas.add(imgInstance);
                canvas.setActiveObject(imgInstance);
                canvas.renderAll();*/
});
/*
           var imgElement = document.getElementById('llg');
                var scalee = 1;
                var wi = imgElement.width;
                var hi = imgElement.height;
                var finalwi ;
                var finalhi;
                var ratio = wi/hi;
                if(wi > 260){
                  if(hi > 172 ){
                    finalhi = 172;
                    finalwi = wi*ratio;
                  }
                  else{
                    finalwi = 260;
                    finalhi = hi*ratio;
                  }

                 
                }
                else{
                  if(hi > 172 ){
                    finalhi = 172;
                    finalwi = wi*ratio;
                  }
                  else{
                    finalwi = wi;
                    finalhi = hi;
                  }


                }
                
                if(imgElement.get)
                var imgInstance = new fabric.Image(imgElement, {
                  left: 100,
                  top: 100,
          
                  width :finalwi,
                  height : finalhi

                });
                canvas.add(imgInstance);
                canvas.renderAll();

*/
canvas.on('object:modified',function () {
  /*if(canvas.item(1))
  {
    canvas.item(0).remove();
  }*/
  
  //removeFromArray();
  if(product_id == 1)                                   /// cup
  {   
      if(! canvas.getActiveObject.getOpacity)
      {
        canvas.getActiveObject().setOpacity(1);
      }

      cupwrapp();
      canvas.getActiveObject().setOpacity(0);
  }

});  
function cupwrapp()
{
  var positionLeft = canvas.getActiveObject().getLeft();
  var positionTop = canvas.getActiveObject().getTop();
  var imgWidth = canvas.getActiveObject().getWidth();
  var imgHeight = canvas.getActiveObject().getHeight();
  var positionAngle = canvas.getActiveObject().getAngle();
  var rxx = canvas.width - imgWidth/2 - positionLeft;
  var lxx = positionLeft - imgWidth/2;
   console.log(imgHeight);
  /*  console.log(lxx);
  console.log(rxx);

  console.log(positionTop);
 
  //console.log(positionTop);
  console.log(positionLeft);
 
  console.log(imgWidth);*/
  //console.log(canvas.width);
  //canvas.remove(obj);
  /*fabric.Image.fromURL('images/logo.png', function(img) {
                    obj = img.set({ left: positionLeft, top: positionTop, angle: positionAngle })
                    canvas.add(obj);
                    canvas.item(0).scale(positionScale);
                    canvas.renderAll();
                });*/
  var faceCanvas = document.getElementById('face');
  var faceCtx = faceCanvas.getContext('2d');
   var test = document.getElementById('test');
  var testCtx = test.getContext('2d');
  var vas = document.getElementById('vas');
  var ctx = vas.getContext('2d');
  var cw;
  var ch;
  //$myslider = $('#myslider');
  // $myslider.val(50);
  var PI = Math.PI;
  var cupTop = 155;
  var cupBottom = 379;
  var dxx = 35;                      /// to do
  var dyy = 28;
  var l = {
    x0: 133,
    y0: cupTop,
    x1: 166,
    y1: cupBottom
  };
  var r = {
    x0: 338,
    y0: cupTop,
    x1: 304,
    y1: cupBottom
  };
  var t = {
    x0: l.x0,
    y0: l.y0,
    x1: l.x0 + dxx,
    y1: r.y0 + dyy,
    x2: r.x0 - dxx,
    y2: r.y0 + dyy,
    x3: r.x0,
    y3: r.y0
  };
  var b = {
    x0: l.x1,
    y0: l.y1,
    x1: l.x1 + dxx,
    y1: r.y1 + dyy,
    x2: r.x1 - dxx,
    y2: r.y1 + dyy,
    x3: r.x1,
    y3: r.y1
  };
  var topOffset = positionTop - imgHeight/2 - l.y0 - 20;
  /* console.log(positionTop);
  console.log(imgHeight/2);
  console.log(topOffset);*/

  var cup = new Image();
  cup.onload = function() {
      ctx.drawImage(cup, 0,0,473,500);
  }

  cup.src = 'editor/images/papercup2.png';
  var pic = new Image();
  pic.crossOrigin = 'anonymous';
  pic.onload = start;
  
  var pcc = canvas.getActiveObject();
  pic.src = pcc.toDataURL();

  function start() {
    
    cw = test.width = faceCanvas.width = vas.width;
    ch = test.height = faceCanvas.height = vas.height;
    draw();
    face();
    /*$myslider.change(function () {
      var value = parseInt($(this).val()) / 100;
      topOffset = (l.y1 - l.y0 - pic.height) * value;
      draw();
      face();
    });*/
  }
  function face() 
  {

    var lm = (l.y1 - l.y0) / (l.x1 - l.x0);
    var lb = l.y1 - (lm * l.x1);
  
    var rm = (r.y1 - r.y0) / (r.x1 - r.x0);
    var rb = r.y1 - (rm * r.x1);

   
    var startx;
    var endx;
    var nitinl = ((positionTop - lb) / lm);
    var nitinr = ((positionTop - rb) / rm);
    var checkl =  lxx - ((positionTop - lb) / lm);          // distance of left slope of cup to the image's left vertical line 
    var kush =  cupBottom - (positionTop + imgHeight/2);
    var bihari =  cupTop - (positionTop - imgHeight/2) +23 ;          
    console.log(bihari);
    var harshit ;
    var mittal;
    if(kush > 0)
    {
      harshit = pic.height;
    }
    else
    {
      harshit = pic.height + kush;
    }
    if(bihari < 0)
    {
      mittal = 0;
    }
    else
    {
      mittal = bihari;
    }
  

    var rona = nitinr - positionLeft - imgWidth/2 ;          // distance of right slope of cup to the image's right vertical line
    /*    
    console.log(positionTop);
     console.log(positionLeft);
      console.log(imgWidth);*/
      console.log(checkl);
      console.log(rona);
    
    
  
    if((checkl > -4) && (rona > -4))                          //    image is completely inside the papercup
    {                                      
       
        faceCtx.clearRect(0, 0, faceCanvas.width, faceCanvas.height); 
        var cc = cupTop + topOffset ;
        var leftX = (cc - lb) / lm;
        var rightX = (cc - rb) / rm;
        var width = rightX - leftX ; 
        var did = imgWidth/width;
        var wrapinsideC = cc - lm*lxx;
        var wrapinsideX = lxx;
        var y = mittal;
        while(y < harshit) {
          yy = cc + y;
          leftX = (yy - lb) / lm;
          rightX = (yy - rb) / rm;
          width = rightX - leftX ;
          wrapinsideX = (yy - wrapinsideC) / lm;


          faceCtx.drawImage(pic, 0, y, pic.width, 0.2, wrapinsideX, yy, width*did, 0.2);
          y= y+0.2
        }
    
        var yy = cupTop + topOffset;
        var p0 = {
          x: (yy - lb) / lm,
          y: cupTop + topOffset
        };
        var p3 = {
          x: (yy - rb) / rm,
          y: cupTop + topOffset
        };
        var p1 = {
          x: p0.x + dxx,
          y: p0.y + dyy
        };
        var p2 = {
          x: p3.x - dxx,
          y: p3.y + dyy
        };
        testCtx.clearRect(0, 0, faceCanvas.width, faceCanvas.height); 
        var points = calcPointsOnBezier(p0, p1, p2, p3);
        for (var x in points) {
          var y = points[x];
          testCtx.drawImage(faceCanvas, x, 0, 1, ch, x, y - yy, 1, ch);
        }
        for (var x in points) {
          var y = points[x];
          ctx.drawImage(faceCanvas, x, 0, 1, ch, x, y - yy, 1, ch);
        }
        var myFabricImage=new fabric.Image(test, {
          left: 0,
          top: 0,
          selectable : false
        });
        canvas.add(myFabricImage);
        myFabricImage.sendToBack();
    }
    if((checkl < -4) && (rona > -4))                //    right part of image is inside the papercup and left is outside
    {                                    
       
        faceCtx.clearRect(0, 0, faceCanvas.width, faceCanvas.height); 
        var cc = cupTop + topOffset ;
        var leftX = (cc - lb) / lm;
        var rightX = (cc - rb) / rm;
        var width = rightX - leftX ; 
        var did = imgWidth/width;
        var y = mittal;
        while(y < harshit) {
          yy = cc + y;
          leftX = (yy - lb) / lm;
          rightX = (yy - rb) / rm;
          width = rightX - leftX ;  
          faceCtx.drawImage(pic, leftX-lxx, y, pic.width, 0.2, leftX, yy, width*did, 0.2);
          y = y+ 0.2;
        }
    
        var yy = cupTop + topOffset;
        var p0 = {
          x: (yy - lb) / lm,
          y: cupTop + topOffset
        };
        var p3 = {
          x: (yy - rb) / rm,
          y: cupTop + topOffset
        };
        var p1 = {
          x: p0.x + dxx,
          y: p0.y + dyy
        };
        var p2 = {
          x: p3.x - dxx,
          y: p3.y + dyy
        };
        var points = calcPointsOnBezier(p0, p1, p2, p3);
        /*for (var x in points) {
          var y = points[x];
          ctx.drawImage(faceCanvas, x, 0, 1, ch, x, y - yy, 1, ch);
        }*/
        for (var x in points) {
          var y = points[x];
          testCtx.drawImage(faceCanvas, x, 0, 1, ch, x, y - yy, 1, ch);
        }
        var myFabricImage=new fabric.Image(test, {
          left: 0,
          top: 0,
          selectable : false
        });
        canvas.add(myFabricImage);
        myFabricImage.sendToBack();
    }
    if((checkl > -4) && (rona < -4))                         //    left part of image is inside the papercup and right is outside
    {                                     
       
        faceCtx.clearRect(0, 0, faceCanvas.width, faceCanvas.height); 
        var cc = cupTop + topOffset ;
        var leftX = (cc - lb) / lm;
        var rightX = (cc - rb) / rm;
        var width = rightX - leftX ; 
        var did = imgWidth/width;
        var wrapinsideC = cc - lm*lxx;
        var wrapinsideX = lxx;
       var y = mittal;
        while(y < harshit) {
          yy = cc + y;
          leftX = (yy - lb) / lm;
          rightX = (yy - rb) / rm;
          width = rightX - leftX ;
          wrapinsideX = (yy - wrapinsideC) / lm;
          faceCtx.drawImage(pic, 0, y, rightX - lxx, 0.2, wrapinsideX, yy, rightX - wrapinsideX, 0.2);
          y = y+0.2;
        }
    
        var yy = cupTop + topOffset;
        var p0 = {
          x: (yy - lb) / lm,
          y: cupTop + topOffset
        };
        var p3 = {
          x: (yy - rb) / rm,
          y: cupTop + topOffset
        };
        var p1 = {
          x: p0.x + dxx,
          y: p0.y + dyy
        };
        var p2 = {
          x: p3.x - dxx,
          y: p3.y + dyy
        };
        var points = calcPointsOnBezier(p0, p1, p2, p3);
        /*for (var x in points) {
          var y = points[x];
          ctx.drawImage(faceCanvas, x, 0, 1, ch, x, y - yy, 1, ch);
        }*/
        for (var x in points) {
          var y = points[x];
          testCtx.drawImage(faceCanvas, x, 0, 1, ch, x, y - yy, 1, ch);
        }
        var myFabricImage=new fabric.Image(test, {
          left: 0,
          top: 0,
          selectable : false
        });
        canvas.add(myFabricImage);
        myFabricImage.sendToBack();


    }
    if((checkl < -4) && (rona < -4))                          //    image is completely outside the papercup
    {                                      
       
        faceCtx.clearRect(0, 0, faceCanvas.width, faceCanvas.height); 
        var cc = cupTop + topOffset ;
        var leftX = (cc - lb) / lm;
        var rightX = (cc - rb) / rm;
        var width = rightX - leftX ; 
        var did = imgWidth/width;
        var y = mittal;
        while(y < harshit) {
          yy = cc + y;
          leftX = (yy - lb) / lm;
          rightX = (yy - rb) / rm;
          width = rightX - leftX ;  
          faceCtx.drawImage(pic, leftX - lxx, y, width, 0.2, leftX, yy, width, 0.2);
          y = y + 0.2;
        }
    
        var yy = cupTop + topOffset;
        var p0 = {
          x: (yy - lb) / lm,
          y: cupTop + topOffset
        };
        var p3 = {
          x: (yy - rb) / rm,
          y: cupTop + topOffset
        };
        var p1 = {
          x: p0.x + dxx,
          y: p0.y + dyy
        };
        var p2 = {
          x: p3.x - dxx,
          y: p3.y + dyy
        };
        var points = calcPointsOnBezier(p0, p1, p2, p3);
       /* for (var x in points) {
          var y = points[x];
          ctx.drawImage(faceCanvas, x, 0, 1, ch, x, y - yy, 1, ch);
        }*/
        for (var x in points) {
          var y = points[x];
          testCtx.drawImage(faceCanvas, x, 0, 1, ch, x, y - yy, 1, ch);
        }
        var myFabricImage=new fabric.Image(test, {
          left: 0,
          top: 0,
          selectable : false
        });
        canvas.add(myFabricImage);
        myFabricImage.sendToBack();
    }
  }
  function calcPointsOnBezier(p0, p1, p2, p3) {
    var points = {
    };
    for (var x = parseInt(p0.x); x < parseInt(p3.x + 1); x++) {
      points[x] = p0.y;
    }
    for (var i = 0; i < 1000; i++) {
      var t = i / 1000;
      var pt = getCubicBezierXYatT(p0, p1, p2, p3, t);
      points[parseInt(pt.x)] = parseInt(pt.y);
    }
    return (points);
  }
  function draw() {
    ctx.strokeStyle = 'gold';
    //ctx.clearRect(0, 0, cw, ch);
    //ctx.drawImage(cup, 0, 0);
    diagnostic();
  }
  function diagnostic() {
    ctx.beginPath();
    ctx.moveTo(l.x0, l.y0);
    ctx.lineTo(l.x1, l.y1);
    ctx.moveTo(r.x0, r.y0);
    ctx.lineTo(r.x1, r.y1);
    ctx.lineWidth = 3;
    ctx.stroke();
    ctx.beginPath();
    ctx.moveTo(t.x0, t.y0);
    ctx.bezierCurveTo(t.x1, t.y1, t.x2, t.y2, t.x3, t.y3);
    ctx.stroke();
    ctx.beginPath();
    ctx.moveTo(b.x0, b.y0);
    ctx.bezierCurveTo(b.x1, b.y1, b.x2, b.y2, b.x3, b.y3);
    ctx.stroke();
  }
  function getCubicBezierXYatT(startPt, controlPt1, controlPt2, endPt, T) {
    var x = CubicN(T, startPt.x, controlPt1.x, controlPt2.x, endPt.x);
    var y = CubicN(T, startPt.y, controlPt1.y, controlPt2.y, endPt.y);
    return ({
      x: x,
      y: y
    });
  }
  // cubic helper formula at T distance

  function CubicN(T, a, b, c, d) {
    var t2 = T * T;
    var t3 = t2 * T;
    return a + ( - a * 3 + T * (3 * a - a * T)) * T
    + (3 * b + T * ( - 6 * b + b * 3 * T)) * T
    + (c * 3 - c * 3 * T) * t2
    + d * t3;
  }
}


function napkin()
{

}

var product_src = "editor/images/papercup2.png" ;
var img = new Image();
img.onload = function () {
  canvas.setBackgroundImage(img.src, canvas.renderAll.bind(canvas), {
    originX: 'left',
    originY: 'top',
    width: 479,
    height: 500
  });
};
img.src = product_src;

var removeobj = document.getElementById('remove-object');
removeobj && (removeobj.onclick = function () {
  var a = canvas.getActiveObject();
  a && (a.remove(), canvas.renderAll())
});
var imagegray = document.getElementById('image-gray');
imagegray && (imagegray.onclick = function () {
  var a = canvas.getActiveObject();
  a && 'image' === a.type && (a.filters.push(new fabric.Image.filters.Grayscale), a.applyFilters(canvas.renderAll.bind(canvas)))
});
var imagesepia = document.getElementById('image-sepia');
imagesepia && (imagesepia.onclick = function () {
  var a = canvas.getActiveObject();
  a && 'image' === a.type && (a.filters.push(new fabric.Image.filters.Sepia2), a.applyFilters(canvas.renderAll.bind(canvas)))
});
var imagenofilter = document.getElementById('image-nofilter');
imagenofilter && (imagenofilter.onclick = function () {
  var a = canvas.getActiveObject();
  if (a && 'image' === a.type) {
    var b = a.height,
    c = a.width;
    a.filters = [
    ],
    a.applyFilters(),
    a.set({
      scaleX: 1,
      scaleY: 1,
      width: c,
      height: b
    }),
    canvas.renderAll()
  }
});
var opacityslider = document.getElementById('opacity-slider');
opacityslider && (opacityslider.onchange = function () {
  var a = canvas.getActiveObject();
  a.setOpacity(parseInt(this.value, 10) / 100),
  canvas.renderAll()
});
var objscale = document.getElementById('obj-scale');
objscale && (objscale.onchange = function () {
  var a = canvas.getActiveObject();
  a.scaleX = this.value,
  a.scaleY = this.value,
  canvas.renderAll()
});
var bringfront = document.getElementById('bring-front');
bringfront && (bringfront.onclick = function () {
  var a = canvas.getActiveObject();
  canvas.bringForward(a),
  canvas.renderAll()
});
var sendback = document.getElementById('send-back');
sendback && (sendback.onclick = function () {
  var a = canvas.getActiveObject();
  canvas.sendBackwards(a),
  canvas.renderAll()
});
document.getElementById('imgLoader').onchange = function (e) {
  var t = new FileReader;
  t.onload = function (e) {
    
    var t = new Image;
    t.src = e.target.result,
    t.onload = function () {
      var e = new fabric.Image(t);
      e.set({
        originX: 'center',
        originY: 'center',
        left: canvas.getWidth() / 2,
        top: canvas.getHeight() / 2,
      //  scaleX: 150 / canvas.getWidth(),
      //  scaleY: 150 / canvas.getHeight(),
        width: 200,
        height : 150,
        opacity:1
      }),
      canvas.add(e)
    }
  },
  t.readAsDataURL(e.target.files[0])
};

$(document).ready(function () {
for ($('#data_one_temp').click(), i = 1; 100 >= i; i++) document.getElementById('data_size').innerHTML += '<option value=\'' + i + '\'>' + i + ' px</option>';
$('.text_bg').click(function () {
  $('#btn1').hasClass('active_btn') ? canvas.backgroundColor = $(this).css('background-color')  : $('#btn2').hasClass('active_btn') && tempObj.setColor($(this).css('background-color')),
  canvas.renderAll()
}),
$('.text_color div p').click(function () {
  tempObj.setColor($(this).css('background-color')),
  canvas.renderAll()
}),
$('#btn1').click(function () {
  $('#btn2').removeClass('active_btn'),
  $('#btn1').removeClass('active_btn'),
  $('#btn1').addClass('active_btn')
}),
$('.product').on('click', function(e) {
  e.preventDefault();
  product_src = $(this).find('img').attr("src");
   product_id = $(this).data('item');
   canvas.clear();
  var img = new Image();
  img.onload = function () {
  canvas.setBackgroundImage(img.src, canvas.renderAll.bind(canvas), {
    originX: 'left',
    originY: 'top',
    width: 479,
    height: 500
  });
  };

  img.src = product_src;
  


   
}),
$('#btn2').click(function () {
  $('#btn1').removeClass('active_btn'),
  $('#btn2').removeClass('active_btn'),
  $('#btn2').addClass('active_btn')
})
});
