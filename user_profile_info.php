<div class="user_profile_info gray-bg padding_4x4_40">
    <div class="upload_user_logo">
        <img src="assets/images/luffy_face.png" alt="image">
    </div>
    <div class="dealer_info">
        <h5><?php echo htmlentities($result->FullName); ?></h5>
        <p><?php echo htmlentities($result->Address); ?><br>
            <?php echo htmlentities($result->City); ?>, &nbsp;<?php echo htmlentities($result->Country); ?></p>
    </div>
</div>