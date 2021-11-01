<div class="uk-navbar-flip">
    <ul class="uk-navbar-nav user_actions">
        <li class="adminNotification" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
            <a href="#" class="user_action_icon"><i  class="material-icons md-24 md-light lightIcon">&#xE7F4;</i><!--<span class="uk-badge">16</span>--></a>
            <div class="uk-dropdown uk-dropdown-xlarge">
                <div class="md-card-content">
                    <!-- <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                        <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Messages (12)</a></li>
                    </ul> -->
                    <!-- <ul id="header_alerts" class="uk-switcher uk-margin">
                        <li>
                            <ul class="md-list md-list-addon">
                                <li>
                                    <div class="md-list-addon-element">
                                        <span class="md-user-letters md-bg-cyan">yd</span>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><a href="#">Enim neque est.</a></span>
                                        <span class="uk-text-small uk-text-muted">Fugit non sit neque commodi molestiae quia nobis quia.</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <img class="md-user-image md-list-addon-avatar" src="<?= base_url(); ?>assets/admin/assets/img/avatars/avatar_07_tn.png" alt=""/>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><a href="#">Occaecati aut.</a></span>
                                        <span class="uk-text-small uk-text-muted">Quis incidunt facere corrupti dolor at aut harum eum a sed.</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <span class="md-user-letters md-bg-light-green">hr</span>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><a href="#">Saepe est.</a></span>
                                        <span class="uk-text-small uk-text-muted">Repellat veritatis et illum magnam a dignissimos consequuntur molestiae.</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <img class="md-user-image md-list-addon-avatar" src="<?= base_url(); ?>assets/admin/assets/img/avatars/avatar_02_tn.png" alt=""/>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><a href="#">Non necessitatibus inventore.</a></span>
                                        <span class="uk-text-small uk-text-muted">Enim et explicabo laboriosam enim voluptatum odio ut.</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <img class="md-user-image md-list-addon-avatar" src="<?= base_url(); ?>assets/admin/assets/img/avatars/avatar_02_tn.png" alt=""/>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><a href="#">Voluptatem ratione maxime.</a></span>
                                        <span class="uk-text-small uk-text-muted">Dignissimos occaecati in voluptatem eos reiciendis.</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                                <a href="page_mailbox.html" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>
                            </div>
                        </li>
                    </ul> -->
                </div>
                <h3 class="text-center"><b>Coming Soon....</b></h3>
            </div>
        </li>
        <li style="margin-top: 9px;" class=" signINMobile marginLabelSetting">
            <span>
            Signed in as<br>
            <b><?= $userdata['first_name']; ?> <?= $userdata['last_name']; ?></b>
        </span></li>
        <li class=" signINMobile" data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
            <a href="#" class="user_action_image">
                <?php if($userdata['profile_image']!='') { ?>
                    <img class="md-user-image" src="<?= base_url('assets/uploads/images/').$userdata['profile_image']; ?>" alt=""/>
                <?php } else{ ?>
                    <div id="profileImageUser"></div>
                <?php } ?>
            </a>
            <div style="padding: 15px; border-radius: 10px;" class="uk-dropdown uk-dropdown-small">
                <span style="margin-left: 27px; margin-bottom: 10px;"><label>Hi, <?= $userdata['first_name']; ?></label></span>
                <ul class="uk-nav js-uk-prevent">
                    <li><a href="<?= site_url('doctor/profile'); ?>"><span class="material-icons">person</span>&nbsp&nbsp&nbsp&nbsp<span>My profile</span></a></li>
                    <li><a href="<?= site_url('login/logout'); ?>"><span class="material-icons">logout</span>&nbsp&nbsp&nbsp&nbsp<span>Logout</span></a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
</nav>
</div>
</header><!-- main header end -->
<script type="text/javascript">
    $(document).ready(function(){
      var firstName = '<?= $userdata['first_name']; ?>';
      var lastName = '<?= $userdata['last_name']; ?>';
      var intials = firstName.charAt(0) + lastName.charAt(0);
      var profileImage = $('#profileImageUser').text(intials);
    });
</script>