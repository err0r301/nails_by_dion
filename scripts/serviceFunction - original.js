class controller2 //services' page
        {
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
            selectedService;

            showPop(service)
            {       this.selectedService=service;
                    this.serviceNumber=service-1;
                    var thumbnail=document.getElementById('thumbnailDialog');
                    var serviceName=document.getElementById('serviceName');
                    var description=document.getElementById('description');
                    var price=document.getElementById('price');
                    var duration =document.getElementById('duration');

                    thumbnail.setAttribute('src', this.services[service-1][0]);
                    serviceName.textContent=this.services[service-1][1];
                    description.textContent=this.services[service-1][5];
                    price.textContent=this.services[service-1][2];
                    duration.textContent=this.services[service-1][4];

//                    unitIncrement.setAttribute('onclick',"myController2.changeSessions(true, 1)");
  //                  unitDecrement.setAttribute('onclick',"myController2.changeSessions(false, 1)");
                    
                    var stylist=1;
                    var stylistTables=[null,dialogStylistTable2,dialogStylistTable3,
                    dialogStylistTable4];
                    
                    for(stylist=1;stylist<stylistTables.length;stylist++)
                    {
                        stylistTables[stylist].setAttribute('onclick', 'myController2.markStylist('+stylist+','+service+')');
                    }

                    buttonBook.setAttribute('onclick','myController2.bookService('+service+',true)');
                    popupBack.classList.add("show");

            }

            showPopBill(service)
            {       
                //buttonBook.setAttribute('onclick','myController2.bookService('+service+',true)');

                popupBackBill.classList.add("show");

            }


            

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

            
        //get service from popup
        
        /*(in dialog)function must use selectedService above
        , based on that, exploit arrays to post*/
        //get service number
        //get service name and image number/name
        //get selector values
        //send to server

        activeService='Massage3';

        stylist='Vusi';
        day=2;
        month=3;
        hour=2;
        min=3;
        sessions=2;
        
        servicePrice=20;
        bookService(inDialog, Thumbnail, choiceService)
        {
            

            
            var st=['Vusi','Dion','Mpho']
            var  activeService='Massage';
            var stylist=st[Math.floor(Math.random()*3)];

            //get values on selectors
            var serviceThumnail=document.getElementById('thumbnailDialog');
            var thumbnailsrc=serviceThumnail.getAttribute('src');
            
            //get selector values
            var stylistValue=document.getElementById('stylistSelector');
            var stylistValuefinal=stylistValue.options[stylistValue.selectedIndex].text;
            var dayValue=document.getElementById('daySelectorf');
            var dayValuefinal=dayValue.options[dayValue.selectedIndex].text;
            var monthValue=document.getElementById('monthSelector');
            var monthValuefinal=monthValue.options[monthValue.selectedIndex].value;
            var hourValue=document.getElementById('hourSelector');
            var hourValuefinal=hourValue.options[hourValue.selectedIndex].text;
            var minValue=document.getElementById('minSelector');
            var minValuefinal=minValue.options[minValue.selectedIndex].text;
            var sessionValue=document.getElementById('sessionSelector');
            var sessionValuefinal=sessionValue.options[sessionValue.selectedIndex].text;
            var sessionInt=parseInt(sessionValuefinal, 10);

            var day=Math.floor(Math.random()*30)+1;
            var month=Math.floor(Math.random()*12)+1;
            var hour=Math.floor(Math.random()*24);
            var min=Math.floor(Math.random()*60);
            var sessions=Math.floor(Math.random()*5)+1;

                 var serviceOneData;
                var bookingNumber=sessionStorage.length+1;
                var sessionsNeeded=this.sessionNewValue;

                var internalMsg =document.getElementById('internalMsg');
                var externalMsg=document.getElementById('externalMsg');
                var noticeBox=document.getElementById('noticeBox');
                
                
                var requestor = new XMLHttpRequest();
                
                if(inDialog)
                {
                    //if(this.selectedService==1)
                    {
                        //this.servicePrice=400;
                    }

                    switch(this.selectedService)
                    {
                        case 1:
                            this.servicePrice=400;
                            break;
                        case 2:
                            this.servicePrice=500;
                            break;
                        case 3:
                            this.servicePrice=450;
                            break;
                        case 4:
                            this.servicePrice=600;
                            break;
                        case 5:
                            this.servicePrice=800;
                            break;
                        case 6:
                            this.servicePrice=30;
                            break;
                        case 7:
                            this.servicePrice=420;
                            break;
                        case 8:
                            this.servicePrice=370;
                            break;
                        case 9:
                            this.servicePrice=390;
                            break;
                        case 10:
                            this.servicePrice=130;
                            break;
                        case 11:
                            this.servicePrice=850;
                            break;
                        case 12:
                            this.servicePrice=900;
                            break;
                        case 13:
                            this.servicePrice=800;
                            break;
                        case 14:
                            this.servicePrice=750;
                            break;
                        case 15:
                            this.servicePrice=700;
                            break;
                        case 16:
                            this.servicePrice=110;
                            break;
                        case 17:
                            this.servicePrice=120;
                            break;
                        case 18:
                            this.servicePrice=160;
                            break;
                        case 19:
                            this.servicePrice=335;
                            break;
                        case 20:
                            this.servicePrice=225;
                            break;                   
                        
                        default:
                            break;
                    }
                    //if, these codes for in and out of dialog
                
                   // var dayfound=document.getElementById('daySelectorf').value;
                   requestor.open("GET",'/scripts/logBookings.php?log='+this.selectedService
                    +"&service="+this.services[this.selectedService-1][1]
                    +"&stylist="+stylistValuefinal+"&day="+dayValuefinal+"&month="+monthValuefinal
                    +"&hour="+hourValuefinal+"&min="+minValuefinal+"&sessions="+sessionValuefinal
                    +"&serviceThumbnail="+thumbnailsrc+"&servicePrice="+(this.servicePrice*sessionInt)                    
                    +"&path=1",true);
                   requestor.send();

                    internalMsg.textContent='Successfully Done, refresh to see changes!';    


                    setTimeout(function()
                    {
                        internalMsg.textContent='.'
                    }
                    ,2500);
                    
                }else //if(!inDialog)
                {
                    switch(choiceService)
                    {
                        case 'Classic':
                            this.servicePrice=400;
                            break;
                        case 'Hybrid':
                            this.servicePrice=500;
                            break;
                        case 'Strip Lash':
                            this.servicePrice=450;
                            break;
                        case 'Volume':
                            this.servicePrice=600;
                            break;
                        case 'Mega Vol':
                            this.servicePrice=800;
                            break;
                        case 'Nail Art':
                            this.servicePrice=30;
                            break;
                        case 'Acrylic':
                            this.servicePrice=420;
                            break;
                        case 'Gel':
                            this.servicePrice=370;
                            break;
                        case 'Silk':
                            this.servicePrice=390;
                            break;
                        case 'Soak off':
                            this.servicePrice=130;
                            break;

                        case 'Hybrid':
                            this.servicePrice=400;
                            break;
                        case 'Knotless':
                            this.servicePrice=850;
                            break;
                        case 'Small':
                            this.servicePrice=900;
                            break;
                        case 'Medium':
                            this.servicePrice=800;
                            break;
                        case 'Large':
                            this.servicePrice=750;
                            break;
                        case 'Thick':
                            this.servicePrice=700;
                            break;
                        case 'Full Body':
                            this.servicePrice=110;
                            break;
                        
                        case 'Underarms':
                            this.servicePrice=120;
                            break;
                        case 'Bikini':
                            this.servicePrice=160;
                            break;
                        case 'Brazilian':
                            this.servicePrice=335;
                            break;
                        case 'Face':
                            this.servicePrice=225;
                            break;                   
                        
                        default:
                            break;
                    }

                    var thumbnailsrc=Thumbnail;
                    requestor.open("GET",'/scripts/logBookings.php?log='+this.selectedService
                        +"&service="+choiceService
                        +"&stylist="+stylistValuefinal+"&day="+dayValuefinal+"&month="+monthValuefinal
                        +"&hour="+hourValuefinal+"&min="+minValuefinal+"&sessions="+sessionValuefinal
                        +"&serviceThumbnail="+thumbnailsrc+"&servicePrice="+this.servicePrice                    
                        +"&path=1",true);
                        requestor.send();

                    externalMsg.textContent='Successfully Done, refresh to see changes!!';
                    externalMsg.style.color='black';
                    noticeBox.style.backgroundColor='#fff3e7';

                    setTimeout(function()
                    {
                        externalMsg.textContent='.';
                        externalMsg.style.backgroundColor='#ffffff00';
                        noticeBox.style.backgroundColor='#ffffff00';
                    }
                    ,2500);
                }

            }

            shareOnSocial()
            {

            }
            
            share()
            {
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                    fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
            }    
    

            removePop()
            {
                this.activeService=0;
                popupBack.classList.remove("show");

                this.sessionNewValue=1;
                //sessionValue.textContent=this.sessionNewValue;
                //this.restoreStylistsStates();
            }

            removePopBill()
            {
                this.activeService=0;
                popupBackBill.classList.remove("show");

                this.sessionNewValue=1;
                //sessionValue.textContent=this.sessionNewValue;
                //this.restoreStylistsStates();
            }

            removeByBackground()
            {
                if (event.target == popupBack) 
                {
                    popupBack.classList.remove("show");
                }

            }

            
            changeSessions(toPositive,service)
            {                        
                var sessionValue=document.getElementById('sessionValue');                
                var sessionValuefinal=parseInt(sessionValue.innerText);
                    
                        if(!toPositive)
                        {    
                            if(sessionValuefinal>1)
                            {
                                this.sessionNewValue--;
                                
                                var currentSessions=parseInt(this.services[service-1][2]);
                                currentSessions--;
                                this.services[service-1][2]=currentSessions;
                            }
        //
                            sessionValue.textContent=this.sessionNewValue;
                            
                        }else if(toPositive)
                        {
                            this.sessionNewValue++;

                            var currentSessions=parseInt(this.services[service-1][2]);
                            currentSessions++;
                            this.services[service-1][2]=currentSessions;

                            sessionValue.textContent=this.sessionNewValue;
                        }

            }


            
            restoreStylistsStates()
            {

                var stylistPoint=1;
                while(stylistPoint<7)
                {
                    var dialogStylistTable1=document.getElementById('dialogStylistTable'+stylistPoint);
                    var stylist1=document.getElementById('Stylist'+stylistPoint);
                    //dialogStylistTable1.style.backgroundColor="#f7f5f5";
                    stylist1.style.color='black';
                    stylist1.style.fontSize='10pt';
                    this.stylistState[stylistPoint-1]=0;
                    
                    stylistPoint++;
                }
                           
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
            
            addService()
            {
                //get values from the database
                //place service by creating js elements
                var targetTable=document.getElementById('eyebrowsTable');
                var newElement=document.createElement('td');                
                var requestor2 = new XMLHttpRequest();

                newElement.setAttribute('class','gridBlockImage')
                requestor2.open("GET",'/scripts/logBookings.php?path=2',true);
        
                requestor2.send();
                requestor2.onreadystatechange = function()
                {
                  targetTable.appendChild(newElement);
                  newElement.innerHTML=requestor2.responseText+"<p>appendedX</p>";    
                };

                var externalMsg=document.getElementById('externalMsg');
                var noticeBox=document.getElementById('noticeBox');
                
                
                externalMsg.textContent='Successfully Done, refresh to see changes!';
                externalMsg.style.color='black';
                noticeBox.style.backgroundColor='#fff3e7';

                setTimeout(function()
                {
                    externalMsg.textContent='';
                    noticeBox.style.backgroundColor='#ffffff00';
                }
                ,2500);
                
            }

            requestor = new XMLHttpRequest();
            deleteAppointment(AppointmentID)
            {
                this.requestor.open("GET",'/scripts/logBookings.php?'+"appointmentID="+AppointmentID+"&path=3"                    
                    ,true);
                this.requestor.send();

                var externalMsg=document.getElementById('externalMsg');
                var noticeBox=document.getElementById('noticeBox');
                
                
                externalMsg.textContent='Successfully Done, refresh to see changes!!';
                externalMsg.style.color='black';
                noticeBox.style.backgroundColor='#fff3e7';

                setTimeout(function()
                {
                    externalMsg.textContent='';
                    noticeBox.style.backgroundColor='#ffffff00';
                }
                ,2500);
            }
        }

/*class controller //services' page
        {
            sessionNewValue=0;
            service1=['../_images/1.jpg','Classic','R400.00','0','1 hour', 'a description of service'];
            service2=['../_images/2.jpg','Hybrid','R400.00','0','2 hours', 'b description of service'];
            service3=['../_images/3.jpg','Strip Lash','R450.00','0','1.5 hours', 'c description of service which may be long or short, it will depend on the service at hand'];
            service4=['../_images/20.png','Volume','R600.00','0','2 hours', 'd description of service'];
            service5=['../_images/21.jpg ','Mega Volume','R800.00','0','1.5 hour', 'e description of service'];
            service6=['../_images/4.png','Nail Art','R30.00','0','2 hours', 'f description of service'];
            service7=['../_images/5.png','Acrylic','R420.00','0','2 hour', 'g description of service'];
            service8=['../_images/6.png','Gel','R370.00','0','1.5 hour', 'h description of service'];
            service9=['../_images/14.png','Silk','R390.00','0','1 hour', 'i description of service'];
            service10=['../_images/16.png','Soak Off','R130.00','0','2 hours', 'j description of service'];
            services=[this.service1, this.service2, this.service3, this.service4, this.service5,
                      this.service6, this.service7, this.service8, this.service9, this.service10];
            stylistState=[0,0,0,0,0,0];    
            serviceNumber=0;
        
            showPop(service)
            {
                    this.serviceNumber=service-1;
                    var thumbnail=document.getElementById('thumbnailDialog');
                    var serviceName=document.getElementById('serviceName');
                    var description=document.getElementById('description');
                    var price=document.getElementById('price');
                    var duration =document.getElementById('duration');

                    thumbnail.setAttribute('src', this.services[service-1][0]);
                    serviceName.textContent=this.services[service-1][1];
                    description.textContent=this.services[service-1][5];
                    price.textContent=this.services[service-1][2];
                    duration.textContent=this.services[service-1][4];

//                    unitIncrement.setAttribute('onclick',"myController.changeSessions(true, 1)");
  //                  unitDecrement.setAttribute('onclick',"myController.changeSessions(false, 1)");
                    
                    var stylist=1;
                    var stylistTables=[null,dialogStylistTable2,dialogStylistTable3,
                    dialogStylistTable4];
                    
                    for(stylist=1;stylist<stylistTables.length;stylist++)
                    {
                        stylistTables[stylist].setAttribute('onclick', 'myController.markStylist('+stylist+','+service+')');
                    }

                    buttonBook.setAttribute('onclick','myController.bookService('+service+',true)');

                popupBack.classList.add("show");

            }

            activeService='make-up';
            stylist="mpho";
            day=1
            month=1;
            hour=4;
            min=45;
            sessions=9;

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

        //get service from popup
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
                    //if, these codes for in and out of dialog
                
                   // var dayfound=document.getElementById('daySelectorf').value;
                   requestor.open("GET",'/scripts/logBookings.php?log='+service
                    +"&service="+this.activeService
                    +"&stylist="+this.stylist+"&day="+this.day+"&month="+this.month
                    +"&hour="+this.hour+"&min="+this.min+"&sessions="+this.sessions                    
                    ,true);
                   requestor.send();

                    internalMsg.textContent='Service Booked Successfully!';    


                    setTimeout(function()
                    {
                        internalMsg.textContent='.'
                    }
                    ,2500);
                }else //if(!inDialog)
                {
                    requestor.open("GET",'/scripts/logBookings.php?log='+service+"&day="+1,true);
                    requestor.send();

                    externalMsg.textContent='Service Booked Successfully!';
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
            
            removePop()
            {
                this.activeService=0;
                popupBack.classList.remove("show");

                this.sessionNewValue=1;
                //sessionValue.textContent=this.sessionNewValue;
                //this.restoreStylistsStates();
            }

            removeByBackground()
            {
                if (event.target == popupBack) 
                {
                    popupBack.classList.remove("show");
                }

            }

            
            changeSessions(toPositive,service)
            {                        
                var sessionValue=document.getElementById('sessionValue');                
                var sessionValuefinal=parseInt(sessionValue.innerText);
                    
                        if(!toPositive)
                        {    
                            if(sessionValuefinal>1)
                            {
                                this.sessionNewValue--;
                                
                                var currentSessions=parseInt(this.services[service-1][2]);
                                currentSessions--;
                                this.services[service-1][2]=currentSessions;
                            }
        //
                            sessionValue.textContent=this.sessionNewValue;
                            
                        }else if(toPositive)
                        {
                            this.sessionNewValue++;

                            var currentSessions=parseInt(this.services[service-1][2]);
                            currentSessions++;
                            this.services[service-1][2]=currentSessions;

                            sessionValue.textContent=this.sessionNewValue;
                        }

            }


            
            restoreStylistsStates()
            {

                var stylistPoint=1;
                while(stylistPoint<7)
                {
                    var dialogStylistTable1=document.getElementById('dialogStylistTable'+stylistPoint);
                    var stylist1=document.getElementById('Stylist'+stylistPoint);
                    //dialogStylistTable1.style.backgroundColor="#f7f5f5";
                    stylist1.style.color='black';
                    stylist1.style.fontSize='10pt';
                    this.stylistState[stylistPoint-1]=0;
                    
                    stylistPoint++;
                }
                           
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
 
        }
*/