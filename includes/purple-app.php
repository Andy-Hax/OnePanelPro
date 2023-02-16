<div class="row mb-4">
    <div class="col-lg-12 col-md-12 mb-md-0">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Purple App Settings</h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-12">
                            <div class="card card-plain">
                                <div class="card-body">
                                    <div class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg" style=" align-items: center;justify-content: center;">
                                        <div class="d-flex flex-column">
                                            <span style="vertical-align:middle;"><i class="material-icons opacity-10" style="font-size:40px;vertical-align:middle;">info</i>&nbsp;APK should be modified to point to <?php echo $GLOBALS['panelroot']; ?>purple/12/</span>
                                        </div>
                                    </div>
                                    <form action="action.php" method="post" role="form">
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">DNS Setting</label>
                                            <select class="form-control" id="select" name="proxy_traffic">
                                                <option value="0" <?php echo $purpleInfo['proxy_traffic'] == "0" ? "selected" : ""; ?>>Send DNS directly to app</option>
                                                <option value="1" <?php echo $purpleInfo['proxy_traffic'] == "1" ? "selected" : ""; ?>>Proxy DNS through panel</option>
                                            </select>
                                        </div>

                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">Startup Message</label>
                                            <input name="startup_msg" type="text" class="form-control" value="<?php echo $purpleInfo['startup_msg'] ?>">
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="allow_4k" name="allow_4k" <?php echo $purpleInfo['allow_4k'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="allow_4k">Allow 4K</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="vpn" name="vpn" <?php echo $purpleInfo['vpn'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="vpn">Enable VPN</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="vpn_login_screen" name="vpn_login_screen" <?php echo $purpleInfo['vpn_login_screen'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="vpn_login_screen">Enable VPN at Login Screen</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="allow_cast" name="allow_cast" <?php echo $purpleInfo['allow_cast'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="allow_cast">Enable Screen Casting</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="remote_support" name="remote_support" <?php echo $purpleInfo['remote_support'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="remote_support">Show Remote Support Button</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="wifi_option" name="wifi_option" <?php echo $purpleInfo['wifi_option'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="wifi_option">Show WiFi Button</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="setting_option" name="setting_option" <?php echo $purpleInfo['setting_option'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="setting_option">Show Settings Button</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="app_list_status" name="app_list_status" <?php echo $purpleInfo['app_list_status'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="app_list_status">Show App List</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="epg_timeshift" name="epg_timeshift" <?php echo $purpleInfo['epg_timeshift'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="epg_timeshift">Show Timeshift EPG</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="catchup" name="catchup" <?php echo $purpleInfo['catchup'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="catchup">Enable Catchup</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="epg_catchup" name="epg_catchup" <?php echo $purpleInfo['epg_catchup'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="epg_catchup">Show Catchup EPG</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="recording" name="recording" <?php echo $purpleInfo['recording'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="recording">Enable Recording</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="multi_recording" name="multi_recording" <?php echo $purpleInfo['multi_recording'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="multi_recording">Enable Multi Recording</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="intro_video" name="intro_video" <?php echo $purpleInfo['intro_video'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="intro_video">Enable Intro Video</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="theme_change_allow" name="theme_change_allow" <?php echo $purpleInfo['theme_change_allow'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="theme_change_allow">Allow Theme Change</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="multi_profile" name="multi_profile" <?php echo $purpleInfo['multi_profile'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="multi_profile">Allow Multi Profiles</label>
                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center mb-3">
                                            <input class="form-check-input" type="checkbox" id="server_selection" name="server_selection" <?php echo $purpleInfo['server_selection'] ? "Checked" : ""; ?>>
                                            <label class="form-check-label mb-0 ms-3" for="server_selection">Allow Server Selection</label>
                                        </div>
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">About - "Description"</label>
                                            <input name="about_description" type="text" class="form-control" value="<?php echo $purpleInfo['about_description'] ?>">
                                        </div>
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">About - "Developed"</label>
                                            <input name="about_developed" type="text" class="form-control" value="<?php echo $purpleInfo['about_developed'] ?>">
                                        </div>
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">About - "Name"</label>
                                            <input name="about_name" type="text" class="form-control" value="<?php echo $purpleInfo['about_name'] ?>">
                                        </div>
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">About - "Skype"</label>
                                            <input name="about_skype" type="text" class="form-control" value="<?php echo $purpleInfo['about_skype'] ?>">
                                        </div>
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">About - "Telegram"</label>
                                            <input name="about_telegram" type="text" class="form-control" value="<?php echo $purpleInfo['about_telegram'] ?>">
                                        </div>
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">About - "Whatsapp"</label>
                                            <input name="about_whatsapp" type="text" class="form-control" value="<?php echo $purpleInfo['about_whatsapp'] ?>">
                                        </div>
                                        <hr />
                                        <div class="text-center">
                                            <button name="updatepurple" type="submit" class="btn btn-lg bg-gradient-secondary btn-lg w-100 mt-4 mb-0">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>