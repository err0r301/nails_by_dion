<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta property="og:url"           content="http://localhost/client/index.php" />
    <meta property="og:type"          content="www.nailsbydion.com" />
    <meta property="og:title"         content="Nails by Dion" />
    <meta property="og:description"   content="Welcome to nails by dion" />
    <meta property="og:image"         content="_images\1.jpg" />

    
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="stylesheet" href="/../styles/client_styles_root0.css">
    <link rel="stylesheet" href="/../styles/main_styles_root1.css">
    <link rel="stylesheet" href="/../styles/style.css">
    <script src="../scripts/client_script.js" defer></script>
    <script src="../scripts/serviceFunction.js" ></script>
    <script src="../scripts/appointFunction.js" ></script>
    
</head>
<body>
    <?php /*$page = 'home'; include '../partial/header.php';*/?>
    <?php $page = 'services'; include '../partial/header.php';?>
    <br>
	<button onclick="myController2.addService()">Add Service</button>
    <div id='texter'></div>
    
    <div id="bill" onclick="myController2.showPopBill(1)"> Bill</div>
    <div id="serviceList">

    <div id='noticeBox' class='notice'>
        <p id='externalMsg'class='noticeMessage'></p>
    </div>

    <table>
        <tr>
            <td>
                <h3 class='serviceCategories'>Eyebrows</h3>
            </td>

            <td>
                <div class="fb-share-button" 
                    data-href="http://localhost/client/index.php" 
                    data-layout="button_count">  
                </div>
            </td>
        </tr>
    </table>

    <table id='eyebrowsTable' class=serviceTable>
        <tr>
            <td class='gridBlockImage'>
                <div class='store'>
                    <img src="../_images/1.jpg" width="150" height="150" class='gridImage' onclick="myController2.showPop(1)">           
                    
                </div>
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Classic</p><p class='price'> R400.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'>
                            <div class='addButton' onclick='myController2.bookService(false,"../_images/1.jpg", "Classic")'>+</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        
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
                            <div class='addButton' onclick='myController2.bookService(false, "../_images/2.jpg", "Hybrid")'>+</div>
                        </td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\3.jpg" width="150" height="150" class='gridImage' onclick="myController2.showPop(3)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Strip Lash</p><p class='price'> R450.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/3.jpg", "Strip Lash")'>+</div></td>
                    </tr>
                </table>
            </td>


            <td class='gridBlockImage'>
                <img src="../_images\20.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(4)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Volume</p><p class='price'> R600.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/20.png", "Volume")'>+</div></td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\21.jpg" width="150" height="150" class='gridImage' onclick="myController2.showPop(5)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Mega Vol</p><p class='price'> R800.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/21.jpg", "Mega Vol")'>+</div></td>
                    </tr>
                </table>
            </td>


        
            </td class='gridBlock'>
        </tr>
       
    </table>

    <table>
        <tr>
            <td>
                <h3 class='serviceCategories'>Nails</h3>
            </td>

            <td>
                <div class="fb-share-button" 
                    data-href="http://127.0.0.1:5501/index.html" 
                    data-layout="button_count">  
                </div>
            </td>
        </tr>
    </table>
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
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/4.png", "Nail Art")'>+</div></td>
                    </tr>
                </table>
            </td>
            
            <td class='gridBlockImage'>
                <img src="../_images\5.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(7)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Acrylic</p><p class='price'> R420.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/5.png", "Acrylic")'>+</div></td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\6.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(8)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Gel</p><p class='price'> R370.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/6.png", "Gel")'>+</div></td>
                    </tr>
                </table>
            </td>


            <td class='gridBlockImage'>
                <img src="../_images\14.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(9)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Silk</p><p class='price'> R390.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/14.png", "Silk")'>+</div></td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\16.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(10)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Soak off</p><p class='price'> R130.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/16.png", "Soak off")'>+</div></td>
                    </tr>
                </table>
            </td>


        
            </td class='gridBlock'>
        </tr>
       
    </table>
    
    <table>
        <tr>
            <td>
                <h3 class='serviceCategories'>Hair</h3>
            </td>

            <td>
                <div class="fb-share-button" 
                    data-href="http://127.0.0.1:5501/index.html" 
                    data-layout="button_count">  
                </div>
            </td>
        </tr>
    </table>
    <table class=serviceTable>
        <tr>
            <td class='gridBlockImage'>
                <img src="../_images\17.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(11)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Knotless</p><p class='price'> R850.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/17.png", "Knotless")'>+</div></td>
                    </tr>
                </table>
            </td>
            
            <td class='gridBlockImage'>
                <img src="../_images\19.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(12)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Small</p><p class='price'> R900.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/19.png", "Small")'>+</div></td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\18.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(13)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Medium</p><p class='price'> R800.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/18.png", "Medium")'>+</div></td>
                    </tr>
                </table>
            </td>


            <td class='gridBlockImage'>
                <img src="../_images\7.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(14)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Large</p><p class='price'> R750.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/7.png", "Large")'>+</div></td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\8.png" width="150" height="150" class='gridImage' onclick="myController2.showPop(15)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Thick</p><p class='price'> R700.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/8.png", "Thick")'>+</div></td>
                    </tr>
                </table>
            </td>


        
            </td class='gridBlock'>
        </tr>
       
    </table>

    <table>
        <tr>
            <td>
                <h3 class='serviceCategories'>Waxing</h3>
            </td>

            <td>
                <div class="fb-share-button" 
                    data-href="http://127.0.0.1:5501/index.html" 
                    data-layout="button_count">  
                </div>
            </td>
        </tr>
    </table>
    <table class=serviceTable>
        <tr>
            <td class='gridBlockImage'>
                <img src="../_images\23.jpeg" width="150" height="150" class='gridImage' onclick="myController2.showPop(16)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Full Body</p><p class='price'> R110.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/23.jpeg", "Full Body")'>+</div></td>
                    </tr>
                </table>
            </td>
            
            <td class='gridBlockImage'>
                <img src="../_images\24.jpeg" width="150" height="150" class='gridImage' onclick="myController2.showPop(17)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Underarms</p><p class='price'> R120.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/24.jpeg", "Underarms")'>+</div></td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\12.jpg" width="150" height="150" class='gridImage' onclick="myController2.showPop(18)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Bikini</p><p class='price'> R160.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/12.jpg", "Bikini")'>+</div></td>
                    </tr>
                </table>
            </td>


            <td class='gridBlockImage'>
                <img src="../_images\10.jpg" width="150" height="150" class='gridImage' onclick="myController2.showPop(19)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Brazilian</p><p class='price'> R335.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/10.jpg", "Brazilian")'>+</div></td>
                    </tr>
                </table>
            </td>

            <td class='gridBlockImage'>
                <img src="../_images\11.jpg" width="150" height="150" class='gridImage' onclick="myController2.showPop(20)">            
                <table class='labelTable'>
                    <tr >
                        <td class='labelTableCell'><p id="sDetails" class='serviceLabel' ><p id="sDetails" class='serviceLabel'>Face</p><p class='price'> R225.00</p></p></td class='gridBlock'></td>
                        <td class='labelTableCellAdd'><div class='addButton' onclick='myController2.bookService(false, "../_images/11.jpg", "Face")'>+</div></td>
                    </tr>
                </table>
            </td>


        
            </td class='gridBlock'>
        </tr>
       
    </table>

</div>
    
<div id="popupBack" class="popupBackground"><!--popup background-->

<div class="popupBlock"  ><!--popup block-->
    
    <div class="contentblock">
    <button id='sometext'>Share</button>
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
                                                <select id='stylistSelector' class='StylistSelector'>
                                                    <option value=1>Dion</option>
                                                    <option value=2 >Mpho</option>
                                                    <option value=3>Vusi</option>
                                                    <option value=4>Jacob</option>
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
                                                    <option value=1>4</option>
                                                    <option value=2>5</option>
                                                    <option value=3>6</option>
                                                    <option value=1>7</option>
                                                    <option value=2>8</option>
                                                    <option value=3>9</option>
                                                    <option value=1>10</option>
                                                    <option value=2>11</option>
                                                    <option value=3>12</option>
                                                    <option value=1>13</option>
                                                    <option value=2>14</option>
                                                    <option value=3>15</option>
                                                    <option value=1>16</option>
                                                    <option value=2>17</option>
                                                    <option value=3>18</option>
                                                    <option value=1>19</option>
                                                    <option value=2>20</option>
                                                    <option value=3>21</option>
                                                    <option value=1>22</option>
                                                    <option value=2>23</option>
                                                    <option value=3>24</option>
                                                    <option value=1>25</option>
                                                    <option value=2>26</option>
                                                    <option value=3>27</option>
                                                    <option value=1>28</option>
                                                    <option value=2>29</option>
                                                    <option value=3>31</option>
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
                                            <select id='monthSelector' class='TimeSelection'>
                                                    <option value=1>JAN</option>
                                                    <option value=2>FEB</option>
                                                    <option value=3>MAR</option>
                                                    <option value=4>APR</option>
                                                    <option value=5>MAY</option>
                                                    <option value=6>JUN</option>
                                                    <option value=7>JUL</option>
                                                    <option value=8>AUG</option>
                                                    <option value=9>SEP</option>
                                                    <option value=10>OCT</option>
                                                    <option value=11>NOV</option>
                                                    <option value=12>DEC</option>
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
                                            <select id='hourSelector' class='TimeSelection'>
                                                    <option value=2>8</option>
                                                    <option value=3>9</option>
                                                    <option value=1>10</option>
                                                    <option value=2>11</option>
                                                    <option value=3>12</option>
                                                    <option value=1>13</option>
                                                    <option value=2>14</option>
                                                    <option value=3>15</option>
                                                    <option value=1>16</option>
                                                    <option value=2>17</option>

                                                </select>
                                                hr:
                                                <select id='minSelector' class='TimeSelection'>
                                                    <option value=0>00</option>
                                                    <option value=1>01</option>
                                                    <option value=2>02</option>
                                                    <option value=3>03</option>
                                                    <option value=4>04</option>
                                                    <option value=5>05</option>
                                                    <option value=6>06</option>
                                                    <option value=7>07</option>
                                                    <option value=8>08</option>
                                                    <option value=9>09</option>
                                                    <option value=10>10</option>
                                                    <option value=11>11</option>
                                                    <option value=12>12</option>
                                                    <option value=13>13</option>
                                                    <option value=14>14</option>
                                                    <option value=15>15</option>
                                                    <option value=16>16</option>
                                                    <option value=17>17</option>
                                                    <option value=18>18</option>
                                                    <option value=19>19</option>
                                                    <option value=20>20</option>
                                                    <option value=21>21</option>
                                                    <option value=22>22</option>
                                                    <option value=23>23</option>
                                                    <option value=24>24</option>
                                                    <option value=25>25</option>
                                                    <option value=26>26</option>
                                                    <option value=27>27</option>
                                                    <option value=28>28</option>
                                                    <option value=29>29</option>
                                                    <option value=31>31</option>
                                                    <option value=32>32</option>
                                                    <option value=33>33</option>
                                                    <option value=34>34</option>
                                                    <option value=35>35</option>
                                                    <option value=36>36</option>
                                                    <option value=37>37</option>
                                                    <option value=38>38</option>
                                                    <option value=39>39</option>
                                                    <option value=40>40</option>
                                                    <option value=41>41</option>
                                                    <option value=42>42</option>
                                                    <option value=43>43</option>
                                                    <option value=44>44</option>
                                                    <option value=45>45</option>
                                                    <option value=46>46</option>
                                                    <option value=47>47</option>
                                                    <option value=48>48</option>
                                                    <option value=49>49</option>
                                                    <option value=50>50</option>
                                                    <option value=51>51</option>
                                                    <option value=52>52</option>
                                                    <option value=53>53</option>
                                                    <option value=54>54</option>
                                                    <option value=55>55</option>
                                                    <option value=56>56</option>
                                                    <option value=57>57</option>
                                                    <option value=58>58</option>
                                                    <option value=59>59</option>
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
                                                <select id='sessionSelector' class='TimeSelection'>
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

                    <button id='closePopup' class="closePopupAppointments" onclick='myController2.removePop()'>Close</button>

                
                <!--<button id='closePopup' class="closePopup" onclick='myController2.shareOnSocial()'>Share</button>-->

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


<div id="popupBackBill" class="popupBackground"> <!--popup background-->

        <div class="popupBlockBill"  ><!--popup block-->
        <h2 id='serviceName' class='headingCol'>Bill</h2>
        <p id='billDescription' class='tableHeading'>Please see the list of service you want to purchase, to alter properties of the different services, please select from the appointment list.</p>
    
        <div id="filterPane">

            <div id="paneContentBill">
            <div id='noticeBox2' class='notice'>
        <p id='externalMsg2'class='noticeMessage'></p>
    </div>
            <?php 
                class appointer
                {
                    function flipData($string, $type )
                    {
                        $run=0;
                        $index=0;
                        switch($type)
                        {
                        
                        //'2024-01-01 04:45:00'
                        case 'stylist':

                            $stylists=array('Dion','Mpho','Vusi','jacob');
                            

                            while($run<4)
                            {
                            if(strcasecmp($string, $stylists[$run])==0)
                            {
                                $index=$run+1;
                                break;
                            }

                            $run++;
                            }

                            break;

                            //'2024-01-01 04:45:00'
                            case 'day':

                            //trim string
                            $dayMarked=substr($string,9,1);
                            $days=array(1,2,3);

                            while($run<3)
                            {
                                //compare string
                                if(strcasecmp($dayMarked, $days[$run])==0)
                                {
                                $index=$run+1;
                                break;
                                }

                                $run++;
                            }

                            break;
                            
                            //'2024-01-01 04:45:00'
                            case 'month':

                            //trim string
                            $dayMarked=substr($string,6,1);
                            $days=array(1,2,3);

                            while($run<3)
                            {
                                //compare string
                                if(strcasecmp($dayMarked, $days[$run])==0)
                                {
                                $index=$run+1;
                                break;
                                }

                                $run++;
                            }
                            break;

                            //'2024-01-01 04:45:00'
                            case 'hour':

                            $dayMarked=substr($string,12,1);
                            $days=array(1,2,3);

                            while($run<3)
                            {
                                //compare string
                                if(strcasecmp($dayMarked, $days[$run])==0)
                                {
                                $index=$run+1;
                                break;
                                }

                                $run++;
                            }
                            break;
                            
                            //'2024-01-01 04:45:00'
                            case 'min':

                            $dayMarked=substr($string,14,2);
                            $days=array("01","02","03");

                            while($run<3)
                            {
                                //compare string
                                if(strcasecmp($dayMarked, $days[$run])==0)
                                {
                                $index=$run+1;
                                break;
                                }

                                $run++;
                            }
                            break;
                        }

                        return $index;
                    }

                function makeRequests()
                {
                  //$key = intval($_GET['k']);
                  
                  $serverName="localhost";
                  $userName="root";
                  $password="";
                  $dbName="nails_by_dion_database";
                
                  $con=mysqli_connect($serverName, $userName, $password, $dbName);
                
                  if (!$con) 
                  {
                    die('Could not connect: ' . mysqli_connect_error($con));
                  }
                  
                  

                  mysqli_select_db($con,$dbName);
                  $records="select count(*) from appointments;";
                  $result = mysqli_query($con,$records);
                  $row = mysqli_fetch_array($result);
                  if($row['count(*)']!=0)
                  {
                    echo "<table class='statusTableBill'>
                  <tr>
                  
                  <th class='headingCellBill'></th>
                  <th class='headingCellBill'>Service</th>
                  <th class='headingCellBill'>date</th>
                      <th class='headingCellBill'>Stylist</th>
                  <th class='headingCellBill'>Sessions</th>
                  
              
                  <th class='headingCellBill'>Cost</th>
                  </tr>";
                  }else
                  {
                    echo"<p id='billDescription' class='tableHeading'>---Bill Empty, Please Select Service to Book, Bookings will appear here.---</p>";
                  }

                  $sql='select * from appointments;';
                  $result = mysqli_query($con,$sql);

                $rowNum=1;
                $count=1;
                $statusID='status'. $count;
                $sessionsID='sessions'. $count;
                $showheader=false;
                while($row = mysqli_fetch_array($result)) 
                { 

                  $timeID='"time'. $count . '"';
                  $serviceID='service'. $count;
                  $sessionsID='sessions'. $count;
                  $stylistID='stylist'. $count;
                  $statusID='status'. $count;
                  $thumbnailsrc='"'.$row['serviceThumbnail'].'"';
                    if($rowNum==1)
                    {
                      echo "<tr class='oddRow' )'>";
                      $rowNum=0;
                    }else
                    {
                      echo "<tr class='evenRow' '>";
                      $rowNum=1;
                    } 
              
                    //convert string to integers
                    echo "<td id=". 'recordThumbnail'.$count ." class='appointmentTimeCell' >" ."<img src='".$row['serviceThumbnail']."' width='50' height='50' class='appointmentImage'>" . "</td>";
                    echo "<td id=". $serviceID ." class='appointmentCell' >" .  $row['serviceID'] . "</td>";
                    echo "<td id=".$timeID." class='leftAppointmentCell'>" . $row['scheduledDateTime'] . "</td>";
                    echo "<td id=". $stylistID ." class='appointmentTimeCell' >"  . $row['stylist'] . "</td>";//
                    echo "<td id=". $sessionsID ." class='appointmentTimeCell'>" . $row['sessions'] . "</td>";//
               
                    echo "<td id=". $statusID ." class='appointmentCell'>" . $row['servicePrice'] . "</td>";
                    echo "<td id=". 'delete'." class='appointmentCell' >" . "<button class='deleteButton' onclick='newManager.deleteAppointment(". $row['appointmentID'] .")' >Delete</button></td>";
      
                    echo "</tr>";
              
                    $count++;
                }

                $total="select sum(servicePrice) from appointments;";
                $row = mysqli_fetch_array(mysqli_query($con,$total));
                //$onclickAttribute="onclick='newManager.showPope(". $row['appointmentID'] .",". 1 .",". $this->flipData($row['stylist'],'stylist') ;
              
                echo "<tr class='evenRow' "  . ">";
                echo"<td></td>";
                echo"<td></td>";
                echo"<td></td>";
                echo"<td></td>";

                $result = mysqli_query($con,$records);

                  $row = mysqli_fetch_array($result);
                  if($row['count(*)']!=0)
                  {
                    $result = mysqli_query($con,$total);
                    $row = mysqli_fetch_array($result);
                    echo "<td id=". $sessionsID ." class='appointmentTimeCell'>" . "Total" . "</td>";
                    echo "<td id=". $statusID ." class='appointmentCell'>" . "R ".$row['sum(servicePrice)']. "</td>";
                
                  }
                echo "</tr>";
                //attributes need to have properties that will be caught by the showpop function
              
                echo "</table>";
              
                  mysqli_close($con);
                }

                }

                $appointer=new appointer();
                $appointer->makeRequests();
            ?>
                            
                
            </div>
        </div>

                
    <button id="closePopupBill"  onclick='myController2.removePopBill()'>Close</button>        

</div>
<?php
    //echo '<p id="UserId">'.$_SESSION['user'] .'</p>';
?>
</div>

                    
    <script>

        myController2=new controller2();
        var newManager= new manager();
        bill.addEventListener("click", function () { myController2.showPop(); });
        closePopup.addEventListener("click", function () { myController2.removePop();});
        window.addEventListener("click", function (event) {myController2.removeByBackground();});
        var hasBeenClearedForStart=false;
        myController2.share();
    </script>
    <?php include '../partial/footer.php';?>

</body>
</html>