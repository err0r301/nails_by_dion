class controller //services' page
        {


            showPop(service)
            {
                var dialogThumbnail=document.getElementById('gallerythumbnailDialog');
                /*switch(service)
                {
                    case 1:
 
                    var thumbnail=document.getElementById('thumbnailDialog');
                    thumbnail.setAttribute('src','../_images/1.jpg');

                    buttonBook.setAttribute('onclick','myController.bookService(1)');
                    


                    break;

                    case 2:
 
                    var thumbnail=document.getElementById('thumbnailDialog');
                    thumbnail.setAttribute('src','../_images/2.jpg');
                    buttonBook.setAttribute('onclick','myController.bookService(2)');
                    
                    break;

                    case 3:
     
                        var thumbnail=document.getElementById('thumbnailDialog');
                        thumbnail.setAttribute('src','../_images/3.jpg');
    
                    break;
 
                    case 6:
 
                    var thumbnail=document.getElementById('thumbnailDialog');
                    thumbnail.setAttribute('src','../_images/4.png');

                    break;

                    case 7:
 
                    var thumbnail=document.getElementById('thumbnailDialog');
                    thumbnail.setAttribute('src','../_images/5.png');

                    break;

                    case 8:
 
                    var thumbnail=document.getElementById('thumbnailDialog');
                    thumbnail.setAttribute('src','../_images/6.png');

                    break;

    
                    default:
                    
                    break;
                }*/

                dialogThumbnail.setAttribute('src',service);
                popupBack.classList.add("show");
                
                
            }

            scrollImage(direction)
            {
                var imageNumber=0;
                var valueAssigned=Math.floor(Math.random()*14);
                var imageValues=['1.jpg', '2.jpg', '3.jpg', '20.png', '21.jpg',
                                 '4.png', '5.png', '6.png', '14.png', '16.png', 
                                 '17.png', '19.png', '18.png', '7.png', ',8.png',
                                 '23.jpeg', '24.jpeg', '12.jpg', '10.jpg', '11.jpg'];

                switch(direction)
                {
                    
                    case 'backward':
                        var gallerythumbnailDialog=document.getElementById("gallerythumbnailDialog");
                        gallerythumbnailDialog.setAttribute("src",'../_images/'+imageValues[valueAssigned]);
                        break;
                    
                    case 'forward':
                        var gallerythumbnailDialog=document.getElementById("gallerythumbnailDialog");
                        gallerythumbnailDialog.setAttribute("src",'../_images/'+imageValues[valueAssigned]);
                        break;
                    
                    default:

                        break;
                }

            }
            
            bookService(data)
            {

                var serviceOneData;
                var bookingNumber=sessionStorage.length+1;
                
                switch(data)
                {
                    case 1:

                        serviceOneData=['appointment 1','b','c'];

   
                        
                        var key='kserviceOneData'+bookingNumber.toString();
                        sessionStorage.setItem(key,JSON.stringify(serviceOneData));
                    break;

                    case 2:
      
                        serviceOneData=['appointment 2','b','c'];


                        
                        var key='kserviceOneData'+bookingNumber.toString();
                        sessionStorage.setItem(key,JSON.stringify(serviceOneData));
                    break;

                    default:

                    break;
                }
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

           

            applyImages()
            {

                var imageNumber=1;
                var imageValues=['1.jpg', '2.jpg', '3.jpg', '20.png', '21.jpg',
                                 '4.png', '5.png', '6.png', '14.png', '16.png', 
                                 '17.png', '19.png', '18.png', '7.png', '8.png',
                                 '23.jpeg', '24.jpeg', '12.jpg', '10.jpg', '11.jpg'];
                
                
                while(imageNumber<17)
                {
                    var valueAssigned=Math.floor(Math.random()*14);

                    var image=document.getElementById('galleryImage'+imageNumber);
                    image.setAttribute('src','../_images/'+imageValues[valueAssigned]);
                    image.setAttribute('onclick',"myController.showPop('../_images/"+imageValues[valueAssigned]+"')")
                    imageNumber++;
                }
            }
            
        }

        


