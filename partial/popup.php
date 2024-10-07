
<div class="popup active" id="<?php echo $confirmationID?>">
    <div class="overlay" onclick="togglePopup('<?php echo $confirmationID?>')"></div>
    <div class="content">
        <div class="close-btn" onclick="togglePopup('<?php echo $confirmationID?>')">&times;</div>
        <div class="confirmation-img">
            <div class="circle">
                <img src="<?php echo $confirmationImage?>" alt="Confirmation Icon">
            </div>
        </div>
        <h2><?php echo $confirmationMessage?></h2>
        <button class="confirm-btn" onclick="togglePopup('<?php echo $confirmationID?>')">OK</button>
    </div>
</div>