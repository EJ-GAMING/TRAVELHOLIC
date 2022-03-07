             
//Bookers Profile
function triggerClick(){
 document.querySelector('#profileImage').click();
}

function displayImage(e){
 if(e.files[0]){
   var reader = new FileReader();

   reader.onload=function(e) {
     document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
   }
   reader.readAsDataURL(e.files[0]);
 }
}


//Valid
function idClicked(){
 document.querySelector('#idImage').click();
}

function displayId(e){
 if(e.files[0]){
   var reader = new FileReader();

   reader.onload=function(e) {
     document.querySelector('#idDisplay').setAttribute('src', e.target.result);
   }
   reader.readAsDataURL(e.files[0]);
 }
}

             
//Vaccination Card
function triggered(){

  alert("hello");
//   document.querySelector('#vacImage').click();
//  }
 
//  function displayVac(e){
//   if(e.files[0]){
//     var reader = new FileReader();
 
//     reader.onload=function(e) {
//       document.querySelector('#vacDisplay').setAttribute('src', e.target.result);
//     }
//     reader.readAsDataURL(e.files[0]);
//   }
 }
 