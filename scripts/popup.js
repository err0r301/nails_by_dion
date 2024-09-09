
  
let id;  


// the following is the popup function structure
// function togglePopup (popup,CRUD function, rowId) 
function viewPopup(pop, data) {  
  var popup = document.getElementById(pop);  
  popup.classList.toggle("active");  

  var appointmentID = document.getElementById('view-id-value');  
  var name = document.getElementById('view-name-value');  
  var date = document.getElementById('view-date-value');  
  var time = document.getElementById('view-time-value');  
  var service = document.getElementById('view-service-value');  
  var status = document.getElementById('view-status-value');  
  
  if(data) {  
    console.log('date value: ',data);
    appointmentID.textContent = data.appointmentID; // Use dot notation  
    name.textContent = data.client;   
    date.textContent = data.date.substr(0, 10);  
    time.textContent = data.date.substr(11, 5);  
    service.textContent = data.service; // Ensure 'service' exists in your PHP array  
    status.textContent= data.status;  
  }  
}
function togglePopup(popupId,saveId,rowId = null) {  
    const popup = document.getElementById(popupId);  
    if (rowId) {  
        id = rowId; 
        document.getElementById(saveId).value = rowId; 
    }  
    popup.classList.toggle("active");  
}