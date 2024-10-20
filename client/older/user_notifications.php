<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
    </script>
    <script type="text/javascript">
        (
            function()
            {
                emailjs.init
                (
                    {
                        publicKey: "",
                    }
                );
            }
        )();
    </script>
    
    <title>Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="stylesheet" href="/../styles/client_styles_root0.css">
    <link rel="stylesheet" href="/../styles/main_styles_root1.css">
    <link rel="stylesheet" href="/../styles/style.css">
    <script src="../scripts/notificationFunction.js" ></script>
</head>
<body>
    <?php $page = 'services'; include '../partial/header.php';?>
<div id='dataPlot'>

</div>

    <div id='noticeBox' class='notice'>
        <p id='externalMsg'class='noticeMessage'></p>
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
                
                <p id=paragraph>
                    
                </p>

                <table class='replyForm'>
                    <tr>
                        <td>Reply</td>
                        <td>
                            <input id='replyBox' type="text" class='replyBox'>
                        </td>
                        <td>
                            <button id='sendButton' onclick='newformatter.messageDion()'>Send</button>
                            <p id='msg'></p>
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