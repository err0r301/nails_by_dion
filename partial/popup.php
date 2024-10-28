
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
        <?php if (isset($link)) { ?>
            <a href="<?php echo $link?>">
                <button class="confirm-btn" onclick="togglePopup('<?php echo $confirmationID?>')">OK</button>
            </a>
        <?php }else{?>
            <button class="confirm-btn" onclick="togglePopup('<?php echo $confirmationID?>')">OK</button>
        <?php } CheckSession($killSession)?>
    </div>
</div>
<?php 
function CheckSession($killSession){
    if(isset($killSession)){
        session_destroy();
    }
}
?>