class manager {

        sessionNewValue=0;
        service1=['../_images/1.jpg','Classic','R400.00','0','1 hour', 'A natural look with individual lashes applied, enhancing length and subtle volume.'];
        service2=['../_images/2.jpg','Hybrid','R400.00','0','2 hours', 'A mix of classic and volume lashes, offering a fuller yet natural style.'];
        service3=['../_images/3.jpg','Strip Lash','R450.00','0','1.5 hours', 'Temporary lash strips applied for a dramatic, one-day look.'];
        service4=['../_images/20.png','Volume','R600.00','0','2 hours', 'Lightweight lashes applied in clusters, creating a dense, voluminous effect.'];
        service5=['../_images/21.jpg ','Mega Volume','R800.00','0','1.5 hour', 'Ultra-light lashes applied in multiple layers for maximum fullness and boldness.'];

        service6=['../_images/4.png','Nail Art','R30.00','0','2 hours', 'Custom designs painted or applied to nails, offering a unique and artistic finish.'];
        service7=['../_images/5.png','Acrylic','R420.00','0','2 hour', 'Durable nail extensions using a mix of powder and liquid, creating a strong, long-lasting look.'];
        service8=['../_images/6.png','Gel','R370.00','0','1.5 hour', 'A glossy, flexible finish using gel polish, cured under UV light for a chip-resistant shine.'];
        service9=['../_images/14.png','Silk','R390.00','0','1 hour', 'Thin silk wraps applied to nails, ideal for strengthening weak or damaged nails.'];
        service10=['../_images/16.png','Soak Off','R130.00','0','2 hours', 'Gentle removal of gel or acrylic nails using a soaking process to preserve the natural nail.'];

        service11=['../_images/17.png','Knotless','R850.00','0','1 hour', 'Braids without knots at the root, offering a lightweight and more natural-looking style.'];
        service12=['../_images/19.png','Small','R400.00','0','2 hours', 'Fine, closely packed braids, providing a detailed, intricate appearance.'];
        service13=['../_images/18.png','Medium','R450.00','0','1.5 hours', 'Moderately sized braids, balancing fullness and flexibility for easier styling.'];
        service14=['../_images/7.png','Large','R600.00','0','2 hours', 'Bigger braids, delivering a bold look with faster installation and lower maintenance.'];
        service15=['../_images/8.png ','Thick','R800.00','0','1.5 hour', 'Full, dense braids, ideal for voluminous hairstyles and a more dramatic effect.'];

        service16=['../_images/23.jpeg','Full Body','R30.00','0','2 hours', 'Complete hair removal from head to toe, covering all major areas for smooth, even skin.'];
        service17=['../_images/24.jpeg','Underarms','R420.00','0','2 hour', 'Hair removal from the underarm area, providing a clean and fresh look.'];
        service18=['../_images/12.jpg','Bikini','R370.00','0','1.5 hour', 'Hair removal along the bikini line, offering a neat and well-groomed appearance.'];
        service19=['../_images/10.jpg','Brazilian','R390.00','0','1 hour', 'Complete removal of hair from the bikini area, including the front and back for a smooth finish.'];
        service20=['../_images/11.jpg','Face','R130.00','0','2 hours', 'Gentle hair removal from the facial area, targeting the upper lip, chin, and cheeks for a flawless complexion.'];
        services=[this.service1, this.service2, this.service3, this.service4, this.service5,
                  this.service6, this.service7, this.service8, this.service9, this.service10,
                  this.service11, this.service12, this.service13, this.service14, this.service15,
                  this.service16, this.service17, this.service18, this.service19, this.service20];
    stylistState=[0,0,0,0,0,0];    
    serviceNumber=0;
    appointmentID=0;
    
    getDescription(serviceName)
    {
        var serviceInstance=0;
        var nameOfService=1;
        var serviceDescription=5;
        var description;

        while(this.services[serviceInstance]!=null || this.services[serviceInstance]!='undefined')
        {
            if(this.services[serviceInstance][nameOfService]==serviceName)
            {
                description=this.services[serviceInstance][serviceDescription];
                break;
            };
            serviceInstance++;
        }

        return "XX";
    }

    showPope(appointmentID,service, stylistoption, day, month, hour, min, sessions,thumbnailsrc)
    {
            
            this.appointmentID=appointmentID;
            this.serviceNumber=service-1;
            var thumbnail=document.getElementById('thumbnailDialog');
            var serviceName=document.getElementById('serviceName');
            var description=document.getElementById('description');
            var price=document.getElementById('price');
            var duration =document.getElementById('duration');

            thumbnail.setAttribute('src', thumbnailsrc);
            serviceName.textContent=this.services[service-1][1];
            description.textContent=this.services[service-1][5];//this.getDescription(service);
            price.textContent=this.services[service-1][2];
            duration.textContent=this.services[service-1][4];

    //                    unitIncrement.setAttribute('onclick',"newManager.changeSessions(true, 1)");
    //                  unitDecrement.setAttribute('onclick',"newManager.changeSessions(false, 1)");
            
            var stylist=1;
            var stylistTables=[null,dialogStylistTable2,dialogStylistTable3,
            dialogStylistTable4];
            
            for(stylist=1;stylist<stylistTables.length;stylist++)
            {
                //stylistTables[stylist].setAttribute('onclick', 'newManager.markStylist('+stylist+','+service+')');
            }

            //have an array of all table values
            //collect table record values and assign
            //use the service number to target by id on DOM
            //get inner values, target all columns
            //var tablestylist=document.getElementById('stylist'+service).innerHTML;
            //find above variable in options by comparing option IDs
            //compare them to options, function(tablestylist, optionid)=>return found/not found
            
            //if match, set the value on the selector>stylistSelector
            //var stylistSelector=document.getElementById('stylistSelector');
            
            if(this.checkdata())//if getElementbyid('optionX1').value==tablestylist
            {
            // stylistSelector.value=tablestylist;
            }
            //set if statement for each selector
            
            //selector variables
            document.getElementById("stylistSelector").value=stylistoption;//table cell value
            document.getElementById("daySelectorf").value=day;
            document.getElementById("monthSelector").value=month;
            document.getElementById("hourSelector").value=hour;
            document.getElementById("minSelector").value=min;
            document.getElementById("sessionSelector").value=sessions;  

            buttonBook.setAttribute('onclick','newManager.bookService('+service+',true)');

        popupBack.classList.add("show");

    }

    requestor = new XMLHttpRequest();

    deleteAppointment(AppointmentID,rowID)
    {
        var rowToDelete=document.getElementById(rowID);
        rowToDelete.remove();
        
        this.requestor.open("GET",'/scripts/pullAppointments.php?'+"appointmentID="+AppointmentID+"&path=3"                    
            ,true);
        this.requestor.send();

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
                
    }

    deleteAllAppointments()
    {
        this.requestor.open("GET",'/scripts/pullAppointments.php?'+"path=4"                    
            ,true);
        this.requestor.send();

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
                
    }

    getBillData()
    {
        var billContent=document.getElementById('billContentApp');               
        var requestor1 = new XMLHttpRequest();

        //newElement.setAttribute('class','gridBlockImage')
        requestor1.open("GET",'/scripts/logBookings.php?path=4',true);
        requestor1.send();

        requestor1.onreadystatechange = function()
        {
          //targetTable.appendChild(newElement);
          //newElement.innerHTML=requestor2.responseText+"<p>appendedX</p>";    
          billContent.innerHTML=requestor1.responseText;    

        };
    }

    showPopBill(service)
            {       
                //buttonBook.setAttribute('onclick','myController2.bookService('+service+',true)');
                this.getBillData();
                popupBackBill.classList.add("show");

            }
    
    showPopMap()
    {       
        //buttonBook.setAttribute('onclick','myController2.bookService('+service+',true)');

        popupBackMap.classList.add("show");

    }

    bookService(service, inDialog)
    {
        var serviceOneData;
        var bookingNumber=sessionStorage.length+1;
        var sessionsNeeded=this.sessionNewValue;

        var internalMsg =document.getElementById('internalMsg');
        var externalMsg=document.getElementById('externalMsg');
        var noticeBox=document.getElementById('noticeBox');
        
        var requestor = new XMLHttpRequest();
        
        if(inDialog)
        {
            //get selector values

            var stylistValue=document.getElementById('stylistSelector');
            var stylistValuefinal=stylistValue.options[stylistValue.selectedIndex].text;
            var dayValue=document.getElementById('daySelectorf');
            var dayValuefinal=dayValue.options[dayValue.selectedIndex].text;
            var monthValue=document.getElementById('monthSelector');
            var monthValuefinal=monthValue.value;
            var hourValue=document.getElementById('hourSelector');
            var hourValuefinal=hourValue.options[hourValue.selectedIndex].text;
            var minValue=document.getElementById('minSelector');
            var minValuefinal=minValue.options[minValue.selectedIndex].text;
            var sessionValue=document.getElementById('sessionSelector');
            var sessionValuefinal=sessionValue.options[sessionValue.selectedIndex].text;

            //if, these codes for in and out of dialog
        
        // var dayfound=document.getElementById('daySelectorf').value;
        requestor.open("GET",'/scripts/pullAppointments.php?log='+service
            +"&appointmentID="+this.appointmentID+"&service="+this.activeService
            +"&stylist="+stylistValuefinal
            +"&day="+dayValuefinal
            +"&month="+monthValuefinal
            +"&hour="+hourValuefinal+"&min="+minValuefinal+"&sessions="+sessionValuefinal+"&path=2"                    
            ,true);
        requestor.send();

            internalMsg.textContent='Successfully Done!!';    


            setTimeout(function()
            {
                internalMsg.textContent='.'
            }
            ,2500);
        }else //if(!inDialog)
        {
            requestor.open("GET",'/scripts/logBookings.php?log='+service+"&day="+1,true);
            requestor.send();

            externalMsg.textContent='Successfully Done!!';
            externalMsg.style.color='black';
            noticeBox.style.backgroundColor='white';

            setTimeout(function()
            {
                externalMsg.textContent='.';
                externalMsg.style.backgroundColor='#ffffff00';
                noticeBox.style.backgroundColor='#ffffff00';
            }
            ,2500);
        }

    }



    activeService='make-up';
    stylist='Dion';
    day=2;
    month=3;
    hour=2;
    min=3;
    sessions=2;

    updateUnits(option,unit)
    {
        //set the service
        
        this.activeService=this.services[this.serviceNumber][1];

        switch(unit)
        {
            
            case 'stylist':
                this.stylist=option;
                break;
            
            case 'day':
                this.day=option;
                break;
            case 'month':

            //convert to numerical values
                this.month=7;
                break;
            case 'hour':
                this.hour=option;
                break;
            
            case 'min':
                this.min=option;
                break;
            case 'sessions':
                this.session=option;
                break;

        }

        //
    }

    checkdata(tableValue, optionid)
    {
        //take stylist match it against all 3 options
        var stylists=['Dion','Vusi','mpho'];
        var isfound=false;
        var runs=0;
        while(runs<3)
        {
            //if exists return true or else false
            if(tableValue==stylists[runs])
            {
                isfound=true;
                break;
            }
            runs++;
        }

        return isfound;
    }

    markStylist(stylist,service)
    {
    
                    var dialogStylistTable1=document.getElementById('dialogStylistTable'+stylist);
                    var stylist1=document.getElementById('Stylist'+stylist);
                    
                    if(this.stylistState[stylist-1]==0)
                    {
                        //dialogStylistTable1.style.backgroundColor="#eed3bc";
                        stylist1.style.color='white';
                        stylist1.style.fontSize='12pt';
                        this.stylistState[stylist-1]=1;

                        this.services[service-1].push('Stylist: Dion');
            
                    }else if(this.stylistState[stylist-1]==1)
                    {
                        //dialogStylistTable1.style.backgroundColor="#f7f5f5";
                        stylist1.style.color='black';
                        stylist1.style.fontSize='10pt';
                        this.stylistState[stylist-1]=0;

                        var pointToAddOn=this.services[service-1].length+1;
                        var stylistIndex=this.services[service-1].indexOf('Dion');
                        this.services[service-1].splice(stylistIndex,1);

                    }

    }

     alterData()
            {
                document.getElementById("dataPlot").innerHTML ="why does it...";
                
                 //this will pull from the server
                 var requestor = new XMLHttpRequest();
                    requestor.open("GET","/scripts/pullAppointments.php?k=8&path=1",true);
                    requestor.send();

                    requestor.onreadystatechange = function()
                    {
                        document.getElementById("dataPlot").innerHTML =requestor.responseText;//this.responseText
                    };
            }
}
class formatter
        {
            initMap() {
                // The location you want to center the map on (latitude, longitude)
                const location = { lat: -26.03436001195125, lng: 28.00879726679443 };
            
                // Initialize the map
                const map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 13,
                    center: location
                });
            
                // Add a marker
                const marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            }

            showStatus()
            {
                var space=document.createElement('br');
                document.body.append(space); 

                var subheading=document.createElement('h3');
                subheading.textContent="Appointments' status ";//must point an array elemnt
                subheading.setAttribute('class','subheading');
                document.body.append(subheading); 

                var table=document.createElement('table');
                    document.body.appendChild(table);
                    table.setAttribute('class','statusTable');
                    table.setAttribute('id','table');

                    row=document.createElement('tr');
                    table.append(row);


                    cell=document.createElement('td');
                    cell.textContent="Appointment Deposit";//must point an array elemnt
                    cell.setAttribute('class','headingCellAppoint');
                    row.append(cell); 

                    
                    
                    

                    cell=document.createElement('td');
                    cell.textContent="Appointment Status ";//must point an array elemnt
                    cell.setAttribute('class','headingCellAppointStatus');
                    row.append(cell);

                    var row;
                    var rows=0;
                    var totalrows= localStorage.length;
                    var cells=0;
                    var cell;
                    var sets=0;
                    var numbering=0;
                    var deposit=Math.floor(Math.random()*2000);
                        
                        while(rows<1)
                        {
                            row=document.createElement('tr');
                            row.setAttribute('class','statusRow');
                            table.append(row);
                            numbering++;

                            cell=document.createElement('td');
                            cell.setAttribute('class', 'statusCell');
                            cell.textContent='R '+deposit;//must point an array elemnt
                            row.append(cell); 
                            numbering++;
                            
                            

                            

                            cell=document.createElement('td');
                            cell.setAttribute('class', 'statusCell2');
                            cell.textContent="Awaiting Confirmation ";
                            row.append(cell);
                            
                            rows++;
                        }

            }

            

            //pull from the server
            
            showAppointments()
            {


                var space=document.createElement('br');
               document.body.append(space); 
                var space=document.createElement('br');
                document.body.append(space); 
                
                var space=document.createElement('br');
                document.body.append(space); 

                var subheading=document.createElement('h3');
                subheading.textContent="Appointments ";//must point an array elemnt
                subheading.setAttribute('class','subheading');
                document.body.append(subheading); 

              


                var table2=document.createElement('table');
                    document.body.appendChild(table2);

                    table2.setAttribute('class','table2');
                    table2.setAttribute('id','table2');
                    table2.setAttribute('class','appointmentTable');
                    row2=document.createElement('tr');
                    table2.append(row2);
                    
                    subheading=document.createElement('tr');
                    table2.append(subheading);
                    cell2=document.createElement('td');
                    cell2.setAttribute('class','headingCellAppoint');
                    cell2.textContent="Service";//must point an array elemnt
                    row2.append(cell2);
                    
                    cell2=document.createElement('td');
                    cell2.setAttribute('class','headingCellAppoint');
                    cell2.textContent="what the hell??";//must point an array elemnt
                    row2.append(cell2);
                    

                    cell2=document.createElement('td');
                    cell2.textContent="Time";//must point an array elemnt
                    cell2.setAttribute('class','headingCellAppoint3');
                    row2.append(cell2);
                    
                    cell2=document.createElement('td');
                    cell2.textContent="Appointment";//must point an array elemnt
                    cell2.setAttribute('class','headingCellAppoint1');
                    row2.append(cell2);
                    
                    cell3=document.createElement('button');
                    cell3.textContent="Cancel All";
                    cell3.setAttribute('class','cancelButtonAppoint');
                    cell3.setAttribute('id',cancelButtonID);
                    cell3.setAttribute('onclick',cancelFunction);
                    

                    cell2=document.createElement('td');
                    
                    cell2.setAttribute('class','cancelAppointmentCell');
                    cell2.setAttribute('id','cancelCell');
                    cell2.setAttribute('onclick','newformatter.removeAllRows()');
                    cell2.append(cell3);
                    row2.append(cell2);
                    
                   

                    document.getElementById("dataPlot").innerHTML ="22222";
                    var row2;
                    var rows2=0;
 
                    var cells=0;
                    var cell2;
                    var cell3;
                    var sets=0;
                    var numbering2=0;
                    var rowsCreated=sessionStorage.length;
                    
                    
                    var rowNumber=0;
                    
                        if(rowsCreated>0)
                        {
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
                                cell2.textContent=rows2+1;//must point an array elemnt
                                cell2.setAttribute('class', 'leftAppointmentCell');
                                cell2.setAttribute('onclick','newformatter.showPop()');
                                row2.append(cell2); 
                                numbering2++;



                                var key=sessionStorage.key(rows2);

                                var stringArray=sessionStorage.getItem(key);

                               var actualArray=JSON.parse(stringArray);



                                cell2=document.createElement('td');
                                cell2.textContent=Math.floor(Math.random()*23)+":"+Math.floor(Math.random()*59);;
                                cell2.setAttribute('class', 'appointmentTimeCell');
                                cell2.setAttribute('id','appointmentDetails');
                                cell2.setAttribute('onclick','newformatter.showPop()');
                                row2.append(cell2);
                                numbering2++;

                                cell2=document.createElement('td');
                                cell2.textContent=actualArray[1];
                                cell2.setAttribute('class', 'appointmentCell');
                                cell2.setAttribute('id','appointmentDetails');
                                cell2.setAttribute('onclick','newformatter.showPop()');
                                row2.append(cell2);
                                numbering2++;

                                var cancelButtonID='cancelAppointButton'+rows2.toString();
                                var cancelFunction='newformatter.cancelAppointment('+rows2+')';
                                cell3=document.createElement('button');
                                cell3.setAttribute('class','cancelButtonAppoint');
                                cell3.setAttribute('id',cancelButtonID);
                                cell3.setAttribute('onclick',cancelFunction);
                                
                                cell3.textContent="Cancel";

                                
                                cell2=document.createElement('td');
                                //cell2.textContent="Cancel";
                                cell2.setAttribute('class', 'appointmentCell');
                                cell2.setAttribute('onclick', 'newformatter.removeRows('+idName+')');
                                cell2.setAttribute('class','cancelAppointmentCell')

                                cell2.append(cell3);
                                row2.append(cell2);
                                
                                
                                
                                rows2++;
                                rowNumber++;
                            }

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
                
            }

            dayStart=1;
            incDay()
            {
                var day=document.getElementById('day');
                
                this.dayStart++;
                day.textContent=this.dayStart;
            }

            months=['Jan','Feb','March','April','May','June'];
            point=-1;
            incMonth()
            {
                this.point++;

                if(this.point==6)
                {
                              this.point=0;      
                }
                var month=document.getElementById('month');
                
                month.textContent=this.months[this.point];
                
            }

            removePop()
            {
                this.alterData();
                popupBack.classList.remove("show");
            }
            
            alterData()
            {
                document.getElementById("dataPlot").innerHTML ="why does it...";
                
                 //this will pull from the server
                 var requestor = new XMLHttpRequest();
                    requestor.open("GET","/scripts/pullAppointments.php?k=8&path=1",true);
                    requestor.send();

                    requestor.onreadystatechange = function()
                    {
                        document.getElementById("dataPlot").innerHTML =requestor.responseText;//this.responseText
                    };
            }

            removePopBill()
            {
                this.alterData();
                popupBackBill.classList.remove("show");
            }

            removePopMap()
            {
                popupBackMap.classList.remove("show");
            }

            removeByBackground()
            {
                if (event.target == popupBack) 
                {
                    popupBack.classList.remove("show");
                }
            }

            start=7;
            addhour()
            {
                var hAdder=document.getElementById('hour');
                this.start++;

                hAdder.textContent=this.start;
            }

            subhour()
            {
                var hAdder2=document.getElementById('hour');
                this.start--;

                hAdder2.textContent=this.start;
            }

            minStart=10;
            addmin()
            {
                var hAdder=document.getElementById('minute');
                this.minStart++;

                hAdder.textContent=this.minStart;
            }

            submin()
            {
                var hAdder2=document.getElementById('minute');
                this.minStart--;

                hAdder2.textContent=this.minStart;
            }

            cancelAppointment(record)
            {
                var key=sessionStorage.key(record);
                sessionStorage.removeItem(key);
            }
            base()
            {

            }

        }

        