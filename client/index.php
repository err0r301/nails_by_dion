<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="stylesheet" href="/../styles/client_styles.css">
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/style.css">
    <script src="../scripts/client_script.js" defer></script>
    <script src="../scripts/serviceFunction.js" ></script>
    
</head>
<body>
    <?php /*$page = 'home'; include '../partial/header.php';*/?>
    <?php $page = 'home'; include '../partial/header.php';?>
    <br>
	<img src="_images\logo.png" id="shortlisted" onclick="myController2.showPop(1)">

    <div id="serviceList">

    <div id='noticeBox' class='notice'>
        <p id='externalMsg'class='noticeMessage'></p>
    </div>

    <h3 class='serviceCategories'>Eyebrows</h3>

    <table class=serviceTable>
        <tr>
            <td class='gridBlockImage'>
                <img src="../_images/1.jpg" width="150" height="150" class='gridImage' onclick="myController2.showPop(1)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Classic</p><p class='price'> R400.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'>
                            <div class='addButton' onclick='myController2.bookService(false)'>+</div>
                        </td>
                    </tr>
                </table>
            </td>
            
            <td class='gridBlockImage'>
                <img src="../_images\2.jpg" width="150" height="150" class='gridImage' onclick="myController2.showPop(2)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Hybrid</p><p class='price'> R500.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'>
                            <div class='addButton' onclick='myController2.bookService(false)'>+</div>
                        </td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\3.jpg" width="150" height="150" class='gridImage' onclick="myController2.showPop(3)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Strip Las</p><p class='price'> R450.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>


            <td class='gridBlockImage'>
                <img src="../_images\20.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(4)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Volume</p><p class='price'> R600.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\21.jpg" width="150" height="150" class='gridImage' onclick="myController2.showPop(5)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Mega Vol</p><p class='price'> R800.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>


        
            </td class='gridBlock'>
        </tr>
       
    </table>

    
    <br>

    <h3 class='serviceCategories'>Nails</h3>
    <table class=serviceTable>
        <tr>
            <td class='gridBlockImage'>
                <img src="../_images\4.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(6)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'>
                            <p id="sDetails" class='serviceLabel' >
                                <p id="sDetails" class='serviceLabel'>Nail Art</p>
                                <p class='price'> R30.00</p>
                            </p>
                            
                        </td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>
            
            <td class='gridBlockImage'>
                <img src="../_images\5.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(7)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Acrylic</p><p class='price'> R420.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\6.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(8)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Gel</p><p class='price'> R370.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>


            <td class='gridBlockImage'>
                <img src="../_images\14.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(9)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Silk</p><p class='price'> R390.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\16.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(10)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Soak off</p><p class='price'> R130.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>


        
            </td class='gridBlock'>
        </tr>
       
    </table>
    
    <h3 class='serviceCategories'>Hair</h3>
    <table class=serviceTable>
        <tr>
            <td class='gridBlockImage'>
                <img src="../_images\17.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(11)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Knotless</p><p class='price'> R850.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>
            
            <td class='gridBlockImage'>
                <img src="../_images\19.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(12)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Small</p><p class='price'> R900.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\18.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(13)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Medium</p><p class='price'> R800.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>


            <td class='gridBlockImage'>
                <img src="../_images\7.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(14)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Large</p><p class='price'> R750.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\8.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(15)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Thick</p><p class='price'> R700.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>


        
            </td class='gridBlock'>
        </tr>
       
    </table>

    <h3 class='serviceCategories'>Waxing</h3>
    <table class=serviceTable>
        <tr>
            <td class='gridBlockImage'>
                <img src="../_images\23.jpeg" width="150" height="150" class='gridImage' onclick="myController2.showPop(16)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Full Body</p><p class='price'> R110.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>
            
            <td class='gridBlockImage'>
                <img src="../_images\24.jpeg" width="150" height="150" class='gridImage' onclick="myController2.showPop(17)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Underarms</p><p class='price'> R120.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\12.jpg" width="150" height="150" class='gridImage' onclick="myController2.showPop(18)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Bikini</p><p class='price'> R160.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>


            <td class='gridBlockImage'>
                <img src="../_images\10.jpg" width="150" height="150" class='gridImage' onclick="myController2.showPop(19)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Brazilian</p><p class='price'> R335.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\11.jpg" width="150" height="150" class='gridImage' onclick="myController2.showPop(20)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Face</p><p class='price'> R225.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false)'>+</div></td>
                    </tr>
                </table>
            </td>


        
            </td class='gridBlock'>
        </tr>
       
    </table>
    <br>
    <br>
    <br>
</div>
    
<div id="popupBack" class="popupBackground"><!--popup background-->

<div class="popupBlock"  ><!--popup block-->
    
    <div class="contentblock">
    <h2 id='serviceName' class='headingCol'>heading</h2>
    <p id='description' class='tableHeading'>This will be the description of the service selected by a user</p>
        <table class='dialogServicesInfo'>
            
            <tr class='detailsRow'>
                <td class='dialogServiceCell'>
                    <img id='thumbnailDialog' class='dialogThumbnail' src="../_images\10.jpg" >
                </td>
                <td class='dialogDescriptionCell'>
                    
                    <table class ='dialogInfoTable'>
                        
                        <tr>
                            <td class='serviceDetailCellH'>Price</td>
                            <td class='serviceDetailCellH'>Duration</td>
                            <td class='serviceDetailCellH' >Stylistd</td>
                            
                        </tr>
                        
                        <tr>
                            <td id='price' class='serviceDetailCell'>R 100.00</td>
                            <td id='duration' class='serviceDetailCell'>2 hrs</td>

                            
                                            <td id='Stylist1' class='serviceDetailCellH'>
                                                <select class='StylistSelector'>
                                                    <option>Dion</option>
                                                    <option>Mpho</option>
                                                    <option>Vusi</option>
                                                </select>
                                            </td>
                                        </tr>
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
                                    <table id='dialogStylistTable2' class='dialogStylistTable' onclick='myController2.markStylist(2)'>
                                        <tr>
                                            <td class='DayPickCell'>
                                                <select id='daySelectorf' class='TimeSelection' onchange="myController2.updateUnits(this.value,'day')">
                                                    <option value=1>1</option>
                                                    <option value=2>2</option>
                                                    <option value=3>3</option>
                                                </select>   
                                            </td>  
                                        </tr>
                                        <tr>
                                            <td id='Stylist2' class='dialogStylistCell'>Day</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table id='dialogStylistTable3' class='dialogStylistTable' onclick='myController2.markStylist(3)'>
                                        <tr>
                                            <td class='MonthPickCell'>
                                            <select class='TimeSelection'>
                                                    <option>JAN</option>
                                                    <option>FEB</option>
                                                    <option>MAR</option>
                                                    
                                                </select>   
                                            </td>   
                                        </tr>
                                        <tr>
                                            <td id='Stylist3' class='dialogStylistCell'>Month</td>
                                        </tr>
                                    </table>
                                </td>

                                <td>
                                    <table  class='dialogStylistTable' >
                                        <tr>
                                            <td class='TimePickCell'>
                                            <select class='TimeSelection'>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                </select>
                                                hr:
                                                <select class='TimeSelection'>
                                                    <option>01</option>
                                                    <option>02</option>
                                                    <option>03</option>
                                                </select>  
                                                mm
                                            </td>   
                                        </tr>
                                        <tr>
                                            <td id='Stylist4' class='dialogStylistCell'>Time</td> 
                                        </tr>
                                    </table>
                                </td>

                                <td>
                                    <table id='dialogStylistTable4' class='dialogStylistTable' onclick='myController2.markStylist(4)'>
                                        <tr>
                                            <td class='MonthPickCell'>
                                                <select class='TimeSelection'>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                </select>   
                                            </td>   
                                        </tr>
                                        <tr>
                                            <td id='Stylist4' class='dialogStylistCell'>Sessions</td> 
                                        </tr>
                                    </table>
                                </td>

                                
                                
                                
                            
                               
                                   
                            </tr>
                    </table>
                    <p id='internalMsg' class='tableHeading'>.</p>
    

        <button id='buttonBook' class="bookButton" onclick='myController2.bookService(true)'>Book</button>

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
    
    <script>

        myController2=new controller2();
        shortlisted.addEventListener("click", function () { myController2.showPop(); });
        closePopup.addEventListener("click", function () { myController2.removePop();});
        window.addEventListener("click", function (event) {myController2.removeByBackground();});
        var hasBeenClearedForStart=false;
        
    </script>
    <?php include '../partial/footer.php';?>

</body>
</html>