function validation(){
  var result=true;
  var i=document.getElementById("fname");
  if(i.value.length===0){
        alert("fill the form");
        result=false;
      }
  return(result);
}
