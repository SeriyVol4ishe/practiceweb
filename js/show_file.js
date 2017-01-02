function showFile(e){
	var image = e.target.files;
	   var fr = new FileReader();
	   fr.onload = (function(theFile){
	      return function(e) {
		      var span = document.createElement('span');
		      span.innerHTML = "<img src='" + e.target.result + "' id='user_img' class='img-circle'/>";
		      document.getElementById('loadImg').insertBefore(span, null);
	     	};
	   })(image[0]);
	   fr.readAsDataURL(image[0]);
};
document.getElementById('registroImg').addEventListener('change', showFile, false);