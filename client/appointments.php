<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Services</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
        <link rel="stylesheet" href="/../styles/client_styles_root0.css">
        <link rel="stylesheet" href="/../styles/main_styles_root1.css">
        <link rel="stylesheet" href="/../styles/style.css">
        <script src="../scripts/appointFunction.js" ></script>
    </head>
    <body>
    <div id='noticeBox' class='notice'>
        <p id='externalMsg'class='noticeMessage'></p>
    </div>
    
    <?php $page = 'services'; include '../partial/header.php';?>
    <div id="bill" onclick="newManager.showPopBill(1)"> Bill</div>
    
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

                            
                                            <td id='Stylist' class='serviceDetailCellH'>
                                                <select id='stylistSelector' class='StylistSelector'>
                                                    <option value=1>Dion</option>
                                                    <option value=2>Mpho</option>
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
                                    <table id='dialogStylistTable2' class='dialogStylistTable' >
                                        <tr>
                                            <td class='DayPickCell'>
                                                <select id='daySelectorf' class='TimeSelection' >
                                                    <option value=1>1</option>
                                                    <option value=2>2</option>
                                                    <option value=3>3</option>
                                                    <option value=4>4</option>
                                                    <option value=5>5</option>
                                                    <option value=6>6</option>
                                                    <option value=7>7</option>
                                                    <option value=8>8</option>
                                                    <option value=9>9</option>
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
                                                    <option value=30>30</option>
                                                </select>   
                                            </td>  
                                        </tr>
                                        <tr>
                                            <td id='Stylist2' class='dialogStylistCell'>Day</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table id='dialogStylistTable3' class='dialogStylistTable' >
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
                                                    <option value=8>8</option>
                                                    <option value=9>9</option>
                                                    <option value=10>10</option>
                                                    <option value=11>11</option>
                                                    <option value=12>12</option>
                                                    <option value=13>13</option>
                                                    <option value=14>14</option>
                                                    <option value=15>15</option>
                                                    <option value=16>16</option>
                                                    <option value=17>17</option>
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
                                    <table id='dialogStylistTable4' class='dialogStylistTable' >
                                        <tr>
                                            <td id='Stylist' class='MonthPickCell'>
                                                <select id='sessionSelector' class='TimeSelection'>
                                                    <option value=1>1</option>
                                                    <option value=2>2</option>
                                                    <option value=3>3</option>
                                                    
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
    

        <button id='buttonBook' class="bookButton" onclick='newManager.bookService(1, true)'>Update</button>

        <button id='closePopup' class="closePopupAppointments" onclick='newformatter.removePop()'>Close</button>

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



    </div>

    </div>


    <p id="dataPlot">vv</p>

    <div id="popupBackBill" class="popupBackground"> <!--popup background-->

        <div class="popupBlockBill"  ><!--popup block-->
        <h2 id='serviceName' class='headingCol'>Bill</h2>
    <p id='billDescription' class='tableHeading'>Please see the list of service you want to purchase, to alter properties of the different services, please select from the appointment list.</p>
    
        <div id="filterPane">

            <div id="paneContentBill">
                

                            
                
            </div>
        </div>

        <div id='billContentApp'>
                            
                
        </div>         
    <button id="closePopupBill"  onclick='newformatter.removePopBill()'>Close</button>        

</div>
</div>

<div id="popupBackMap" class="popupBackground"> <!--popup background-->

    <div class="popupBlock"  ><!--popup block-->
    <h2 id='serviceName' class='headingCol'>Our Location</h2>
    <p id='description' class='locationDialogDecription'>Please use the map below to help you navigate to our salon, see you soon!</p>
    
        <div id="filterPane">

            <div id="paneContentMap">
                
                <div id="map"></div>
                <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHyl_gE4F5ee_unf3aYXdQSpVDA-UdC24&callback=newformatter.initMap">
                </script>
                                
                
            </div>

        </div>

        <button id="closePopupBill"  onclick='newformatter.removePopMap()'>Close</button>        

    </div>
</div>






    <script>
        var newformatter= new formatter(); 
        var newManager= new manager();
        //newformatter.showStatus();
        //newformatter.showAppointments();
        newManager.alterData();

    </script>

    <?php include '../partial/footer.php';?>    

    
</body>
</html>