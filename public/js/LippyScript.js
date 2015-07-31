// Variables
var $fileinfo = document.getElementsByName('file_info').value;
var $file = document.getElementsByName('file_upload').value;
var $valid = false;
var canvas = document.getElementById('canvas_picker').getContext('2d');
var $overlay = $('<div id="overlay" onclick="nooverlay()" class="overlay"></div>');

var allowedExtensions = {
        '.jpg' :1,
        '.png' :1,
};


function changefile(val){
    //Sets Value of input to picture name
var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
    document.getElementById("file_info").value = fileName;
    
    // Validates Image Data    
    var match = /\..+$/;
    var ext = val.match(match);
    
    if (allowedExtensions[ext]) 
    {
        // Correct file format
        console.log('Correct file');
        document.getElementById('Message').style.display = "none";
        //$valid = true;
        var fsize = $('#file_upload')[0].files[0].size;

        if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        console.log("This the size" + fsize);

        if(fsize>1048576){
            console.log("too big");
            document.getElementById('Message').style.display = "block";
            document.getElementById('Message').innerHTML = 'File is too big, please choose a smaller file';
        } else {
            console.log("right size");
            document.getElementById('Message').style.display = "none";
        }
    
        } else{
            
         alert("Please upgrade your browser, because your current browser lacks some new features we need!");
            }
        
        return true;

    } 
    else 
    {
        //If file format is incorrect
        console.log('Wrong file');
        document.getElementById('Message').style.display = "block";
        document.getElementById('Message').innerHTML = 'Please make sure you file is the correct format: Png or Jpg';
        return false;

    }
}


function validation(e)
    // Validates Image Data
{
  
    if (document.getElementById('file_info').value != ""){
        
    load();
    $("body").append($overlay);
    $overlay.show();
    $overlay.fadeIn();
    $('#PictureUpload').show();
    document.getElementById('Message').style.display = "none";
    var $files = document.getElementById('file_upload').files[0];
    var $f = document.getElementById('file_upload').files;
    var reader = new FileReader();
    reader.onload = imageIsLoaded;
    reader.readAsDataURL($files);  
    return false;
        
    } else {
    
        document.getElementById('Message').style.display = "block";
        document.getElementById('Message').innerHTML = 'Dont forget to choose an image';
        
        }
   
    }

       
function nooverlay(){
    $overlay.hide();
    $overlay.fadeOut();
    $('#PictureUpload').hide();
}

function nonedisplay(){
// Gets rid of welcome pop up box
    document.getElementById('close').style.display = "none";
}

function load(){
// Shows Loader gif
    $("#loader").show();
    
}
    var canvas = $('#canvas_picker')[0];
    var context = canvas.getContext('2d');
    var x = 0;
    var y = 0;
    var width = 600;
    var height = 440;
    var $picked = $("#picked");
    var img = new Image();

function imageIsLoaded(e) {
    // If image is loaded - Draw it
    img.onload = function(){
    canvas.width  = 600;
    canvas.height = 440;   
    context.drawImage(img, x, y,width,height);
    $("#loader").hide().fadeOut("slow");
        
  };
  img.src = e.target.result;
    
    }

$('#canvas_picker').click(function(event){
      var x = event.pageX - $(this).offset().left; // Fixed coordinates
      var y = event.pageY - $(this).offset().top; // respective to canvas offs.
      var img_data = context.getImageData(x,y , 1, 1).data;
      var R = img_data[0];
      var G = img_data[1];
      var B = img_data[2];  
      var rgb = R + ',' + G + ',' + B ;
      var hex = rgbToHex(R,G,B);
      $('#rgb input').val(rgb);
        var n_match  = ntc.name(hex);
      $('#hex input').val('#' + hex);
    $('#colour input').val(n_match[1]);
    $picked.css('background-color','#'+hex);
    
});

function rgbToHex(R, G, B) {
  return toHex(R) + toHex(G) + toHex(B);
}

function toHex(n) {
  n = parseInt(n, 10);
  if (isNaN(n))  return "00";
  n = Math.max(0, Math.min(n, 255));
  return "0123456789ABCDEF".charAt((n - n % 16) / 16)  + "0123456789ABCDEF".charAt(n % 16);
	}


function reminder(){
    $('html, body').animate({ scrollTop: 0 }, 'slow');
    document.getElementById('Message').style.display = "block";
    document.getElementById('Message').innerHTML = "Upload a photo and pick a colour Don't worry its easy!";
}

function changeadd(val){
    
    var allowedExtensions = {
        '.jpg'  :1,
        '.png' :1,
        '.gif' :1,

};
    
    var match = /\..+$/;
    var ext = val.match(match);
    
     if (allowedExtensions[ext]) 
    {
        var imagesize = $('#addfile')[0].files[0].size;
         if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        if(imagesize>1048976){
document.getElementById('addmessage').innerHTML = "Whoa! File too big, choose smaller image";            
        } else {
            document.getElementById('addmessage').innerHTML = "";   
        }
        
    } else{
        
     alert("Please upgrade your browser, because your current browser lacks some new    features we need!");
    }
    
    } else {
    
       document.getElementById('addmessage').innerHTML = "Make sure file is correct format! PNG or JPG";
        return false;

    }
    
    //show image
    var $fileadd = document.getElementById('addfile').files[0];
    var $f = document.getElementById('addfile').files;
    var readerfile = new FileReader();

    readerfile.onload = showImage;
    readerfile.readAsDataURL($fileadd);  
    

}

function uploadmessage(){
    if( document.getElementById("addfile").files.length == 0 ){
    document.getElementById('addmessage').innerHTML = "Please upload an image first to get HEX and RBG values";   
    } else{
    document.getElementById('addmessage').innerHTML = "Click on the image to choose a colour!";   
    }
}
 

function showImage(i) {
    // canvas on add page
    var canvasadd = document.getElementById('canvasadd').getContext('2d');
    var canvasadd = $('#canvasadd')[0];
    var contextadd = canvasadd.getContext('2d');
    var xa = 0;
    var ya = 0;
    var widtha = 400;
    var heighta = 300;
    var $pickedadd = $("#pickedadd");
    var imgadd = new Image();
    
    imgadd.onload = function(){
    canvasadd.width  = 400;
    canvasadd.height = 300;   
    contextadd.drawImage(imgadd, xa, ya,widtha,heighta);
    $("#loader").hide().fadeOut("slow");
        
  };
  imgadd.src = i.target.result;
    
     $('#canvasadd').click(function(event){
        document.getElementById('addmessage').innerHTML = "";   
         var xa = event.pageX - $(this).offset().left; // Fixed coordinates
         var ya = event.pageY - $(this).offset().top; //
         var img_data = contextadd.getImageData(xa,ya , 1, 1).data;
         
          var R = img_data[0];
          var G = img_data[1];
          var B = img_data[2]; 
          var rgb = R + ',' + G + ',' + B ;
          var hex = rgbToHex(R,G,B);
          var n_match  = ntc.name(hex);
          $('#RGB').val( rgb );
          $('#color').val(  );
          $('#HEX').val('#' + hex);
          $('#colour input').val(n_match[1]);
             
    $pickedadd.css('background-color','#'+hex);       
}); 
    
    }

function backhome(){
    // Exits to home screen
window.location.href = "/";
}

function validateadd(){
//disabled button
$("#submitadd").attr("disabled", "disabled"); 
    
    //if valadation passes do ajax request
   // m.preventDefault();
    var name = document.getElementById('#name').value;
    var brand = document.getElementById('#brand').value;
    var price = document.getElementById('#price').value;
    var description = document.getElementById('#description').value;
    var Hex = document.getElementById('#HEX').value;
    var Rgb = document.getElementById('#RGB').value;
    var colour =  document.getElementById('#colour input').value;
    var colourList = document.getElementById('#ColourList').value;
    var picture = document.getElementById('#addfile').files;


    
}



