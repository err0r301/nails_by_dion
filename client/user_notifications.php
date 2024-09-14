<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="stylesheet" href="/../styles/client_styles.css">
    <link rel="stylesheet" href="/../styles/main_styles.css">
    <link rel="stylesheet" href="/../styles/style.css">
    <script src="../scripts/notificationFunction.js" ></script>
</head>
<body>
    <?php $page = 'services'; include '../partial/header.php';?>
<div id='dataPlot'>

</div>

<div id="popupBack" class="popupBackground"> <!--popup background-->

        <div class="popupBlock"  ><!--popup block-->
        
        <div id="filterPane">

            <div id="paneContent">
                <h3>Notification <p id='timestamp'>5 May 2024, 12:45</p></h3>

                            <div id="filterDetails">
                                <p></p>
                                <p></p>
                            </div>
                        

                <p id='textdata'>Information about Notifications:</p>
                
                <p id=paragraph>This is a notification that will be viewed by anybody viewing this notification page. it requires an actual 
                    database to be more authentic than what it is right. This is for demonstration purposes.
                </p>

                <table class='replyForm'>
                    <tr>
                        <td>Reply</td>
                        <td>
                            <input type="text" class='replyBox'>
                        </td>
                        <td>
                            <button id='sendButton'>Send</button>
                        </td>
                    </tr>
                </table>
                
                
            </div>
        </div>

    <button id="closePopupNotice"  onclick='newformatter.removePop()'>Close</button>        
</div>

</div>
    <script>
        var newformatter= new formatter(); 
        newformatter.requestNotifications();
        
        // newformatter.showStatus();
        //newformatter.showAppointments();

        //newformatter.runPopup();
       // newformatter.addEventListener("click", function () { newformatter.removePop(); });
    </script>
    
    <?php include '../partial/footer.php';?>    

</body>
</html>