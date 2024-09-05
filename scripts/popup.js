
  
let id;  


// the following is the popup function structure
// function togglePopup (popup,CRUD function, rowId) 
function togglePopup (pop){
  var popup = document.getElementById(pop);
  popup.classList.toggle("active");
}
function togglePopup(popupId,saveId,rowId = null) {  
    const popup = document.getElementById(popupId);  
    if (rowId) {  
        id = rowId; 
        document.getElementById(saveId).value = rowId; 
    }  
    popup.classList.toggle("active");  
}