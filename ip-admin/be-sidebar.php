<?php
?>
<div class="col be-sidebar">
    <ul class="be-nav">
        <li <?php  if($_GET['D']=='1')print 'class="nav-active"';?>>
        <a href="home?D=1" ><i class="fa fa-fw fa-home"></i> Home</a>
        </li>
        <li <?php  if($_GET['D']=='2')print 'class="nav-active"';?>>
            <a href="content?D=2" ><i class="fas fa-folder-open"></i> Content</a>
        </li>
        <li <?php  if($_GET['D']=='3')print 'class="nav-active"';?>>
            <a href="settings?D=3"><i class="fa fa-fw fa-cog"></i> Settings</a>
        </li>
        <li <?php  if($_GET['D']=='4')print 'class="nav-active"';?>>
            <a href="user-settings?D=4"><i class="fa fa-fw fa-user-cog"></i> Profil</a>
        </li>
        <li <?php  if($_GET['D']=='5')print 'class="nav-active"';?>>
            <a href="user?D=5"><i class="fas fa-user-friends"></i> User</a>
        </li>
    </ul>
</div>
<?php
?>