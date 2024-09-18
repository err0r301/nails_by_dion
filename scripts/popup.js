
  
let id;  
var m_id;
var m_name;  
var m_email;
var m_cell;
var m_role;

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
function viewModal(pop, model_id,modal_name, modal_email, modal_cell, modal_role) {  
  var popup = document.getElementById(pop);  
  popup.classList.toggle("active");  

  
  var name = document.getElementById('modal-name');  
  var email = document.getElementById('modal-email');  
  var cell = document.getElementById('modal-cell');  
  var role = document.getElementById('modal-role'); 
  
  m_id = model_id;
  name.textContent  = m_name = modal_name;
  email.textContent = m_email = modal_email;
  cell.textContent  = m_cell= modal_cell;
  role.textContent  = m_role = modal_role;   
}

function editModal(pop) {  
  var popup = document.getElementById(pop);  
  popup.classList.toggle("active");  

  var id = document.getElementById('edit-member-id');
  var name = document.getElementById('edit-name');  
  var email = document.getElementById('edit-email');  
  var cell = document.getElementById('edit-cell');  
  var role = document.getElementById('edit-role'); 
  
  id.value = m_id;
  name.value = m_name;
  email.value = m_email;
  cell.value= m_cell;
  role.value= m_role;   
}

function togglePopup(popupId,saveId,rowId = null) {  
    const popup = document.getElementById(popupId);  
    if (rowId) {  
        id = rowId; 
        document.getElementById(saveId).value = rowId; 
    }  
    popup.classList.toggle("active");  
}

function storeID(id,container){
  document.getElementById(container).value = id;
}