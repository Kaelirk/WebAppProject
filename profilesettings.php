<?php
  include_once "header.php";

  include "classes/dbh.class.php";
  include "classes/profileinfo.class.php";
  include "classes/profileinfo-ctrl.class.php";
  include "classes/profileinfo-view.class.php";

  $profileInfo = new ProfileInfoView();
  ?>
<body class="bg-secondary-subtle">
 <section class="profile" >
    <div class="wrapper d-flex justify-content-center" >
        <div class="profile-bg bg-secondary mt-2 p-3 rounded-4" style="width: 600px">
            <div class="profile-setings">
                <h3>PROFILE SETTINGS</h3>
                <form action="includes/profileinfo.inc.php" method="post">
                    <input type="text" name="introtitle" placeholder="Profile title...">
                    <br>
                    <p>Update your profile page intro here: </p>
                    <textarea name="introtext" rows="10" cols="74" placeholder="Update your profile introduction here..."></textarea>
                    <br><br>
                    <p>Update your about section: </p>
                    <textarea name="about" rows="10" cols="74" placeholder="Update your profile about section here..."></textarea>
                    <br>
                    <button type="submit" name="submit">SAVE</button>
                </form>
            </div>
        </div>
    </div>
 </section>
</body>
</html>