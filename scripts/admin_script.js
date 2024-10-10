// SIDEBAR TOGGLE

let sidebarOpen = false;
const sidebar = document.getElementById('sidebar');

function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add('sidebar-responsive');
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove('sidebar-responsive');
    sidebarOpen = false;
  }
}

// NOTIFICATIONS

document.addEventListener('DOMContentLoaded', function () {
  // Get all message boxes
  var messageBoxes = document.querySelectorAll('.message-box');

  // Get the element displaying the number of unread notifications
  var unreadCountElement = document.getElementById('notification-count');

  // Initialize unread count
  var unreadCount = messageBoxes.length;

  // Update unread count display
  unreadCountElement.textContent = unreadCount;

  // Loop through each message box
  messageBoxes.forEach(function (messageBox) {
    // Add click event listener to each message box
    messageBox.addEventListener('click', function () {
      // Toggle the class for message-read
      this.classList.toggle('message-read');

      // Update unread count based on the class change
      if (this.classList.contains('message-read')) {
        unreadCount--;
      } else {
        unreadCount++;
      }

      // Update the display of unread count
      unreadCountElement.textContent = unreadCount;
    });
  });
});

document.querySelectorAll('.message-box').forEach(box => {
  box.addEventListener('click', () => {
    box.querySelector('.full-message').classList.toggle('show');
  });
});


// CHARTS
let page = window.location.pathname;
if (page == '/admin/dashboard.php') {
  displayMonthlySales('dashboard-sales-monthly');
  displayWeeklySales('dashboard-sales-weekly');
  displayServiceRevenue('dashboard-service-revenue');
  displayCustomerNumber('dashboard-customer-number');
} else
  if (page == '/admin/sale.php') {
    displayMonthlySales('sales-monthly');
    displayWeeklySales('sales-weekly');
    displayServiceRevenue('service-revenue');
  } else
    if (page == '/admin/customer.php') {
      displayCustomerNumber('customer-number');
    }
function displayMonthlySales(id) {
  let monthlySales = document.getElementById(id).getContext('2d');

  let dashboardSalesMonthly = new Chart(monthlySales, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [{
        label: 'Monthly Sales',
        data: [50000, 45000, 30000, 35000, 40000, 55000, 50000, 52000, 60000, 55000, 60000, 75000],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1,
        hoverOffset: 4,
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
}

function displayWeeklySales(id) {
  let weeklySales = document.getElementById(id).getContext('2d');

  let dashboardSalesWeekly = new Chart(weeklySales, {
    type: 'bar',
    data: {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
      datasets: [{
        label: 'Daily Sales',
        data: [5000, 4500, 3000, 3500, 4000, 5500, 5000],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)'
        ],
        borderWidth: 1,
        hoverOffset: 4,
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  })
};

function displayServiceRevenue(id) {
  let serviceRevenue = document.getElementById(id).getContext('2d');

  let dashboardServiceRevenue = new Chart(serviceRevenue, {
    type: 'bar',
    data: {
      labels: ['Classic Eyebrow', 'Full Body Wax', 'Hybrid Eyebrows', 'Nail Art', 'Gel Nails', 'Knotless Hair', 'Face Wax', 'Brazilian Wax', 'Silk Mails', 'Strip las'],
      datasets: [{
        label: 'Top Service this Month',
        data: [5000, 7500, 6500, 4000, 9000, 5000, 4500, 8200, 4000, 5500],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)','rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)'
        ],
        borderWidth: 1,
        hoverOffset: 4,
      }]
    },
    options: {
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true
        }
      },
      indexAxis: 'y'
    }
  })
};

function displayCustomerNumber(id) {
  let CustomerNumber = document.getElementById(id).getContext('2d');

  let NumOfCustomers = new Chart(CustomerNumber, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [
        {
          label: 'Subscribers',
          data: [100, 150, 140, 250, 350, 320, 380, 450, 400, 420, 490, 550],
          borderColor: 'blue',
          fill: false
        },
        {
          label: 'Loyalty Members',
          data: [50, 70, 100, 90, 110, 150, 140, 165, 180, 203, 227, 225],
          borderColor: 'green',
          fill: false
        }]
    },
    options: {
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
}

// Services
document.querySelector(".service-grid").addEventListener("click", function () {
  document.querySelector(".service-list").classList.remove("active");
  document.querySelector(".service-grid").classList.add("active");
  document.querySelector(".service-area-wrapper").classList.add("gridView");
  document.querySelector(".service-area-wrapper").classList.remove("tableView");
  console.log("grid");
});

document.querySelector(".service-list").addEventListener("click", function () {
  document.querySelector(".service-list").classList.add("active");
  document.querySelector(".service-grid").classList.remove("active");
  document.querySelector(".service-area-wrapper").classList.remove("gridView");
  document.querySelector(".service-area-wrapper").classList.add("tableView");
  console.log("list");
});

function togglePopup_delete(id) {
  var popup = document.getElementById('popup-delete-appointment');
  popup.classList.toggle("active");
  if (id != null) {
    var inputID = popup.querySelector("input");
    inputID.value = id;
  }
}

function togglePopup_edit(data) {
  var popup = document.getElementById('popup-edit-appointment');
  popup.classList.toggle("active");
  if (data != null) {
    var inputID = popup.querySelector(".id");
    var inputName = popup.querySelector(".name");
    var inputEmail = popup.querySelector(".email");
    var inputDate = popup.querySelector(".date");
    var inputTime = popup.querySelector(".time");
    var inputService = popup.querySelector(".service");
    var inputStatus = popup.querySelector(".status");

    inputID.value = data['id'];
    inputName.value = data['name']; 
    inputEmail.value = data['email'];
    inputDate.value = data['date'];
    inputTime.value = data['time'];
    inputService.value = data['service'];
    inputStatus.value = data['status'];
  } 
}

function togglePopup_view(data) {
  var popup = document.getElementById('popup-view-appointment');
  popup.classList.toggle("active");
  if(data != null) {
    var inputID = popup.querySelector(".view-id");
    var inputName = popup.querySelector(".view-name");
    var inputEmail = popup.querySelector(".view-email");
    var inputDate = popup.querySelector(".view-date");
    var inputTime = popup.querySelector(".view-time");
    var inputService = popup.querySelector(".view-service");
    var inputStatus = popup.querySelector(".view-status");

    inputID.innerHTML = 'ID:' + data['id'];
    inputName.innerHTML = 'Name: ' + data['name']; 
    inputEmail.innerHTML = 'Email: ' + data['email'];
    inputDate.innerHTML = 'Date: ' + data['date'];
    inputTime.innerHTML = 'Time: ' + data['time'];
    inputStatus.innerHTML = 'Status: ' + data['status'];
    inputService.innerHTML = 'Service: ' + data['service'];
  }
}

function togglePopup_add(id) {
  const popup = document.getElementById(id);
  popup.classList.toggle("active");
}

    document.querySelector('.search-bar').addEventListener('input', function() {

        let searchTerm = this.value.toLowerCase();

        let serviceRows = document.querySelectorAll('.service-row');

        serviceRows.forEach(function(row) {
            let serviceName = row.querySelector('.service-cell.image span').textContent.toLowerCase(); 
            let serviceCategory = row.querySelector('.service-cell.category').textContent.toLowerCase(); 
            let serviceStatus = row.querySelector('.service-cell.status-cell').textContent.toLowerCase(); 
            let servicePrice = row.querySelector('.service-cell.price').textContent.toLowerCase(); 

            if (
                serviceName.includes(searchTerm) ||
                serviceCategory.includes(searchTerm) ||
                serviceStatus.includes(searchTerm) ||
                servicePrice.includes(searchTerm)
            ) {
                row.style.display = '';  
            } else {
                row.style.display = 'none';  
            }
        });
    });


// INVENTORY

document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.querySelector('.search-bar');

  if (searchInput) {  
      searchInput.addEventListener('input', function () {
          let searchTerm = this.value.toLowerCase();  
          let tableRows = document.querySelectorAll('#product_table tbody tr');  

          tableRows.forEach(function (row) {
              let itemName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
              let itemStock = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
              let itemPrice = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

              if (itemName.includes(searchTerm) || itemStock.includes(searchTerm) || itemPrice.includes(searchTerm)) {
                  row.style.display = '';  
              } else {
                  row.style.display = 'none';  
              }
          });
      });
  } else {
      console.log("Search bar not found.");
  }
});



// TEAM


viewButtons.forEach(function (button, index) {
  button.onclick = function () {
    showTeamModal(teamMembers[index]);
  }
});


span.onclick = function () {
  teamModal.classList.remove('fade-in');
  teamModal.classList.add('fade-out');
  setTimeout(function () {
    teamModal.style.display = "none";
  }, 400); 
}



function sortTable(column,tableID,arrow) {
  var column = column;
  var table = document.getElementById(tableID);
  var arrow = document.getElementById(arrow);
  sort(column, table,arrow);
  
}

function sort(column, table,arrow) {
  var rows = Array.from(table.querySelectorAll('tr')).slice(1);
    var ascending = !table.getAttribute('data-isAscending') || table.getAttribute('data-isAscending') === 'false';

    rows.sort(function(a, b) {
      var cellA = a.cells[column].textContent.trim();
      var cellB = b.cells[column].textContent.trim();
      return ascending ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
    });

    table.setAttribute('data-isAscending', ascending ? 'true' : 'false');

    const arrows = document.querySelectorAll('.arrow');

    
    arrows.forEach(a => {
      a.style.display = 'none';
    });
    
    
    if (ascending) {
      arrow.innerHTML = '&#x25B2';
      arrow.style.display = "inline-block";
    } else {
      arrow.innerHTML = '&#x25BC';
      arrow.style.display = "inline-block";
    }

    table.querySelector('tbody').innerHTML = "";
    rows.forEach(function(row) {
      table.querySelector('tbody').appendChild(row);
    });
}

//filter the appointments by status
function getValue(id) {
    var selectElement = document.getElementById(id);
    var selectedValue = selectElement.value;
    //console.log(selectedValue);    //used for testing
    var table = document.getElementById("appointment_table");
    var rows = table.getElementsByTagName("tr");
    if (id == "status") {
      filter1(rows,selectedValue);
    }else{
      filter2(rows,selectedValue); 
    }
}

function filter1(rows, status){
  for (var i = 1; i < rows.length; i++) {
      var row = rows[i];
      var cell = row.getElementsByTagName("td")[5];
      if(status == "All"){
          row.style.display = "table-row";
      }else{
        if (cell.innerHTML == status) {
            row.style.display = "table-row";
        } else {
            row.style.display = "none";
        }
      }
      
  }
  console.log(status);
}

function filter2(rows, stylist){
  for (var i = 1; i < rows.length; i++) {
      var row = rows[i];
      var cell = row.getElementsByTagName("td")[4];
      if(stylist == "All"){
          row.style.display = "table-row";
      }else{
        if (cell.innerHTML == stylist) {
            row.style.display = "table-row";
        } else {
            row.style.display = "none";
        }
      }
      
  }
  console.log(status);
}
