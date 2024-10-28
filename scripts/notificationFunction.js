class formatter
        {
            showStatus()
            {
                var space=document.createElement('br');
                document.body.append(space); 

                var subheading=document.createElement('h3');
                subheading.textContent="Appointments' status ";//must point an array elemnt
                document.body.append(subheading); 

                var table=document.createElement('table');
                    document.body.appendChild(table);
                    table.setAttribute('class','appointmentTable');
                    table.setAttribute('id','table');

                    row=document.createElement('tr');
                    table.append(row);

                    cell=document.createElement('td');
                    cell.textContent="Appointment Deposit";//must point an array elemnt
                    row.append(cell); 

                    
                    cell=document.createElement('td');
                    cell.textContent=" ";//must point an array elemnt
                    row.append(cell); 
                    

                    cell=document.createElement('td');
                    cell.textContent="Appointment Status ";//must point an array elemnt
                    row.append(cell);

                    var row;
                    var rows=0;
                    var totalrows= localStorage.length;
                    var cells=0;
                    var cell;
                    var sets=0;
                    var numbering=0;
                    
                        
                        while(rows<1)
                        {
                            row=document.createElement('tr');
                            table.append(row);
                            numbering++;

                            cell=document.createElement('td');
                            cell.setAttribute('class', 'appointmentCell');
                            cell.textContent="R2 000.00 ";//must point an array elemnt
                            row.append(cell); 
                            numbering++;
                            
                            

                            cell=document.createElement('td');
                            cell.textContent="";
                            cell.setAttribute('class', 'appointmentCell');
                            row.append(cell);
                            numbering++;

                            cell=document.createElement('td');
                            cell.textContent="Awaiting Confirmation ";
                            cell.setAttribute('class', 'appointmentCell');
                            row.append(cell);
                            
                            rows++;
                        }

            }

            requestNotifications()
            {
                document.getElementById("dataPlot").innerHTML ="why does it...";
                
                 //this will pull from the server
                 var requestor = new XMLHttpRequest();
                    requestor.open("GET","/scripts/pullNotifications.php?k=8",true);
                    requestor.send();

                    requestor.onreadystatechange = function()
                    {
                        document.getElementById("dataPlot").innerHTML =requestor.responseText;//this.responseText
                    };
            }

            messageDion()
            {
                var requestor = new XMLHttpRequest();
                var messageBox=document.getElementById('replyBox');
                var sentMessage=messageBox.value;   

                var externalMsg=document.getElementById('externalMsg');
                  var noticeBox=document.getElementById('noticeBox');
                  
                  
                  externalMsg.textContent='Successfully Done!';
                  externalMsg.style.color='black';
                  noticeBox.style.backgroundColor='#fff3e7';
  
                  setTimeout(function()
                  {
                      externalMsg.textContent='';
                      noticeBox.style.backgroundColor='#ffffff00';
                  }
                  ,2500);

                requestor.open("GET","/scripts/pullNotifications.php?notificationReply="+replyBox.value,true);
                requestor.send();
                //document.getElementById("msg").innerHTML=sentMessage;
                this.sendEmail();

                
            }
// email function
            sendEmail()
            {
            
                var senderEmail='zenaninkosikho@gmail.com';
                var userName="sampleUser";
                const templateParams = {
                  from_name: userName,
                  from_email: senderEmail,
                  message: document.getElementById('replyBox').value
                };
              
                emailjs.send('', 'template_sbuuvm9', templateParams)
                  .then(function(response) {
                     console.log('SUCCESS!', response.status, response.text);
                     alert('Email sent successfully!');
                  }, function(error) {
                     console.log('FAILED...', error);
                     //alert('Failed to send email.');
                  });

                  
             
            }

            showAppointments()
            {
                var subheading=document.createElement('h3');
                subheading.textContent="Notifications";//must point an array elemnt
                subheading.setAttribute('class','subheading');
                document.body.append(subheading); 

                var table2=document.createElement('table');
                    document.body.appendChild(table2);

                    table2.setAttribute('class','table2');
                    table2.setAttribute('id','table2');
                    row2=document.createElement('tr');
                    table2.setAttribute('class','appointmentTable');
                    table2.append(row2);
                    
                    subheading=document.createElement('tr');
                    table2.append(subheading);
                    cell2=document.createElement('td');
                    cell2.textContent="Time";//must point an array elemnt
                    cell2.setAttribute('class','headingCellAppoint');
                    row2.append(cell2); 
                    
                    cell2=document.createElement('td');
                    cell2.textContent="Notification ";//must point an array elemnt
                    cell2.setAttribute('class','headingCellAppoint2');
                    row2.append(cell2);
                    
                    cell3=document.createElement('button');
                    cell3.textContent="Delete All";
                    cell3.setAttribute('class','cancelButtonAppoint');
                   
                    cell2=document.createElement('td');
                    cell2.textContent=" ";//must point an array elemnt
                    cell2.setAttribute('onclick','newformatter.removeAllRows()');
                    cell2.setAttribute('class','cancelAppointmentCell');
                    cell2.append(cell3);
                    row2.append(cell2);
                    
                    
                    var row2;
                    var rows2=0;
                    var totalrows= localStorage.length;
                    var cells=0;
                    var cell2;
                    var cell3;
                    var sets=0;
                    var numbering2=0;
                    var rowsCreated=Math.floor(Math.random()*15);
                    var rowNumber=0;


                        while(rows2<rowsCreated)
                        {
                            var idName='row'+rowNumber;
                            row2=document.createElement('tr');
                            if(rows2%2==0)
                            {
                                row2.setAttribute('class','evenRow');
                            }else
                            {
                                row2.setAttribute('class','oddRow');
                            }
                            row2.setAttribute('id',idName);
                            table2.append(row2);
                            numbering2++;

                            cell2=document.createElement('td');
                            cell2.setAttribute('class', 'leftAppointmentCell');
                            cell2.textContent=Math.floor(Math.random()*23)+":"+Math.floor(Math.random()*59);//must point an array elemnt
                            row2.append(cell2); 
                            numbering2++;
                            

                            

                           cell2=document.createElement('td');
                            cell2.textContent="This will be a brief description of the notification...";
                            cell2.setAttribute('id','appointmentDetails');
                            cell2.setAttribute('class', 'appointmentCell');
                            cell2.setAttribute('onclick','newformatter.showPop()');
                            row2.append(cell2);
                            numbering2++;

                            

                            cell3=document.createElement('button');
                            cell3.setAttribute('class','cancelButtonAppoint')
                            cell3.textContent="Delete";

                            
                            cell2=document.createElement('td');
                            cell2.setAttribute('onclick', 'newformatter.removeRows('+idName+')');
                            cell2.setAttribute('class','cancelAppointmentCell')

                            cell2.append(cell3);
                            row2.append(cell2);
                            
                            rows2++;
                            rowNumber++;
                        }
 
            }

            removeAllRows()
            {
                table2.remove();
               return 0;
            }

            removeRows(rowToDelete)
            {
                rowToDelete.remove();
                
            }


            showPop(info)
            {
                popupBack.classList.add("show");
                var textdata=document.getElementById('textdata');
                
                if(info==1)
                {
                    textdata.textContent="First";
                }
                
                if(info==2)
                {
                    textdata.textContent="Second";
                }

                if(info==1000)
                {
                    textdata.textContent="This is the shortlist";
                }

                var message=document.getElementById("paragraph");
                message.textContent=info;
            }

            removePop()
            {
                popupBack.classList.remove("show");
            }

            removeByBackground()
            {
                if (event.target == popupBack) 
                {
                    popupBack.classList.remove("show");
                }
            }

        }