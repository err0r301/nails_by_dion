<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="stylesheet" href="/../styles/client_styles.css">
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/style.css">
    <script src="../scripts/galleryFunction.js" ></script>
</head>
<body>
    <?php $page = 'gallery'; include '../partial/header.php';?>
    <img src="_images\logo.png" id="shortlisted" onclick="myController.showPop(1000)">
    

    <div class='notice'>
        <p class='noticeMessage'>Service added to appointments</p>
    </div>

    <table id='galleryTable'>
        <tr>
            <td>
            <h3 class='monthHeading'>September</h3>
        
            </td>
        </tr>
        <tr >
            <td class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage1' class='galleryImage' src="../_images\14.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            
            <td  class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage2' class='galleryImage' src="../_images\5.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>

            <td  class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage3' class='galleryImage' src="../_images\4.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>

            <td  class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage4' class='galleryImage' src="../_images\4.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td  class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage5' class='galleryImage' src="../_images\4.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            
            <td  class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage6' class='galleryImage' src="../_images\4.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>

            <td  class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage7' class='galleryImage' src="../_images\4.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>

            <td  class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage8' class='galleryImage' src="../_images\4.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
            <h3 class='monthHeading'>October</h3>
        
            </td>
        </tr>
        <tr>
            <td class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage9' class='galleryImage' src="../_images\4.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            
            <td  class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage10' class='galleryImage' src="../_images\4.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>

            <td  class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage11' class='galleryImage' src="../_images\4.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>

            <td class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage12' class='galleryImage' src="../_images\4.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage13' class='galleryImage' src="../_images\4.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            
            <td class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage14' class='galleryImage' src="../_images\4.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>

            <td class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage15' class='galleryImage' src="../_images\4.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>

            <td class='galleryTableRow'>
                <table class='imageTable'>
                    <tr>
                        <td class='imageColumn'>
                            <img id='galleryImage16' class='galleryImage' src="../_images\4.png"  onclick="myController.showPop()">
                        </td>
                        <td >
                            <table>
                                <tr><td class='imageDetailGallery'>Name of service</td></tr>
                                <tr><td class='imageDetailGallery2'>Date of service</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        
    </table>

    <div id="popupBack" class="popupBackground"><!--popup background-->

		<div class="popupBlock"  ><!--popup block-->
            
            <div class="contentblock">
            <h2 class='headingCol'>heading</h2>
            <p  class='tableHeading'>This will be the description of the service selected by a user</p>
                <table class='dialogServicesInfo'>
                    
                    <tr class='detailsRow'>
                        <td class='dialogServiceCell'>
                            <img id='thumbnailDialog' class='dialogThumbnail' src="../_images\10.jpg" >
                        </td>
                        <td class='dialogDescriptionCell'>
                            
                            <table class ='dialogInfoTable'>
                                
                                <tr>
                                    <td class='serviceDetailCellH'>Price</td>
                                    <td class='serviceDetailCellH'>duration</td>
                                    <td class='serviceDetailCellH' >time</td>
                                    <td class='serviceDetailCellH' >
                                        <p class='tableHeadingRed'>
                                            Sessions Required
                                        </p>
                                    </td>   
                                </tr>
                                <tr>
                                    <td class='serviceDetailCell'>R 100.00</td>
                                    <td class='serviceDetailCell'>2 hrs</td>
                                    <td class='serviceDetailCell'>14:30</td>
                                    <td class='serviceDetailCell'>
                                    <table class='sessionTable'>
                                        <tr>
                                            <td class='sessionCol'>
                                            <img src="../_images\addButton.png" class='addButtonDialog'>
                                            </td>
                                            <td class='sessionColvalue'>1</td>
                                            <td class='sessionCol'>
                                                <img src="../_images\addButton.png" class='addButtonDialog'>
                                            </td>
                                        </tr>
                                    </table>
                                    </td>   
                                </tr>
                            </table>
                        </td>
                        <td class='headingCol'>
                        
                                    
                                
                            
                        </td>
                    </tr>
                </table>

                            <table class='mainStylistTable'>
                                    <tr>
                                        <td>
                                            <table class='dialogStylistTable'>
                                                <tr>
                                                    <td class='dialogStylistCell'>
                                                        <img class='stylistThumbnail' src="../_images\7.png"  width="20">
                                                    </td>    
                                                </tr>
                                                <tr>
                                                    <td class='dialogStylistCell'>Dion</td>
                                                </tr>
                                            </table >
                                        </td>
                                        <td>
                                            <table class='dialogStylistTable'>
                                                <tr>
                                                    <td class='dialogStylistCell'>
                                                        <img class='stylistThumbnail' src="../_images\4.png"  width="20">
                                                    </td>  
                                                </tr>
                                                <tr>
                                                    <td class='dialogStylistCell'>Thando</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table class='dialogStylistTable'>
                                                <tr>
                                                    <td class='dialogStylistCell'>
                                                        <img class='stylistThumbnail' src="../_images\2.jpg"  width="20">
                                                    </td>   
                                                </tr>
                                                <tr>
                                                    <td class='dialogStylistCell'>Mpho</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table class='dialogStylistTable'>
                                                <tr>
                                                    <td class='dialogStylistCell'>
                                                        <img class='stylistThumbnail' src="../_images\4.png"  width="20">
                                                    </td>   
                                                </tr>
                                                <tr>
                                                    <td class='dialogStylistCell'>Sipho</td> 
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table class='dialogStylistTable'>
                                                <tr>
                                                    <td class='dialogStylistCell'>
                                                        <img class='stylistThumbnail' src="../_images\4.png"  width="20">
                                                    </td>   
                                                </tr>
                                                <tr>
                                                    <td class='dialogStylistCell'>Sizwe</td> 
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table class='dialogStylistTable'>
                                                <tr>
                                                    <td class='dialogStylistCell'>
                                                        <img class='stylistThumbnail' src="../_images\4.png"  width="20">
                                                    </td>   
                                                </tr>
                                                <tr>
                                                    <td class='dialogStylistCell'>Vusi</td> 
                                                </tr>
                                            </table>
                                        </td>
                                        
                                       
                                           
                                    </tr>
                            </table>
                            <p  class='tableHeading'>Please select a stylist from the list.</p>
            
                            
                            
                            
                            
                        
                   

                
                <button id='buttonBook' class="bookButton" >Book</button>

                <button id='closePopup' class="closePopup" >Close</button>

            </div>

        <table id='lastButtons'>
            <tr>
                <td>
                </td>
                    
                <td>
                
                </td>
            </tr>
        </table>

        </div>

	</div>



<button></button>

<script>



myController=new controller();
        myController.applyImages();
        shortlisted.addEventListener("click", function () { myController.showPop(); });
        closePopup.addEventListener("click", function () { myController.removePop();});
        window.addEventListener("click", function (event) {myController.removeByBackground();});

</script>


    <?php include '../partial/footer.php';?>
</body>
</html>