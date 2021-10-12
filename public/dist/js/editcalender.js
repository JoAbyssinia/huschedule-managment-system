
var classes = document.getElementsByClassName('classes');
var place = document.getElementsByTagName('tr');
var drugItem = null;


for (var i of classes) {
   
   i.addEventListener('drugstart',drugStart);
   i.addEventListener('drugend',drugEnd);
}

function drugStart() {
   console.log('am hire');
   drugItem = this;
   setTimeout(() =>this.style.display="none", 0);
}

function drugEnd() {
   console.log('am hire');
   setTimeout(() =>this.style.display="none", 0);
   drugItem = null;
}


console.log(classes);