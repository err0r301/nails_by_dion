let id;

function togglePopup(popupId, saveId, rowId = null) {
  const popup = document.getElementById(popupId);
  if (rowId) {
    id = rowId;
    document.getElementById(saveId).value = rowId;
  }
  popup.classList.toggle("active");
}

function storeID(id, container) {
  document.getElementById(container).value = id;
}
