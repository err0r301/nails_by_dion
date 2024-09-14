class controller2 //services' page
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

            activeService='make-up';
            stylist='Vusi';
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

            selectedService=0;
        //get service from popup
           bookService( inDialog)
            {
                
                var st=['Vusi','Dion','Mpho']
               var  activeService='make-up';
               var stylist=st[Math.floor(Math.random()*3)];

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
                    //if, these codes for in and out of dialog
                
                   // var dayfound=document.getElementById('daySelectorf').value;
                   requestor.open("GET",'/scripts/logBookings.php?log='+this.selectedService
                    +"&service="+this.activeService
                    +"&stylist="+stylist+"&day="+day+"&month="+month
                    +"&hour="+hour+"&min="+min+"&sessions="+sessions                    
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
                    requestor.open("GET",'/scripts/logBookings.php?log='+this.selectedService
                        +"&service="+this.activeService
                        +"&stylist="+stylist+"&day="+day+"&month="+month
                        +"&hour="+hour+"&min="+min+"&sessions="+sessions                    
                        ,true);
                        requestor.send();

                    externalMsg.textContent='Service Booked SuccessfullyTEEST!';
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