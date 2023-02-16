<?php
ini_set("display_errors", 0);
error_reporting(0);
$functionsFile = "../../includes/functions.php";
include($functionsFile);
$purpleInfo = loadPurpleOptions();

if ($purpleInfo['proxy_traffic'] == 1 || $purpleInfo['proxy_traffic'] == 2) {
    $subfolder = "proxy";
    $dns = $GLOBALS['panelroot'] . $subfolder .  "/";
    $dnsInfo = '{
        "dns_title": "IPTV",
        "url": "' . $dns . '",
        "live_dns": "",
        "epg_dns": "",
        "movie_dns": "",
        "series_dns": "",
        "catchup_dns": ""
    }';
} else {
    $dnsInfo = "";
    $dnsEntries = loadAllDNS(true);
    foreach ($dnsEntries as $dns) {
        if ($dnsInfo) {
            $dnsInfo .= ",";
        }
        $dnsInfo .= '{
            "dns_title": "' . $dns['name'] . '",
            "url": "' . $dns['portal'] . '",
            "live_dns": "",
            "epg_dns": "",
            "movie_dns": "",
            "series_dns": "",
            "catchup_dns": ""
        }';
    }
}
//purpleInfo
$string = '{
    "app_mode": "Xstream",
    "code_login": "false",
    "app_mode_universal": "",
    "in_app_purchase": {
        "in_app_purchase_id": "",
        "lic_key": "",
        "in_app_status": "false"
    },
    "ads": {
        "ads_app_id": "#",
        "ads_banner": "#",
        "ads_intrestial": "#",
        "ads_rewarded": "#",
        "ads_native": "\/200463343\/InHouse_Native",
        "ads_intrestial_time_delay": "3600",
        "ads_ios_status": "false",
        "ads_status": "false"
    },
    "app_conf": {
        "allow_4k": "' . ($purpleInfo['allow_4k'] ? "true" : "false") . '",
        "content_4k": "",
        "domain_url": "http:\/\/example.com",
        "login_url": "http:\/\/example.com",
        "package_name": "com.andyhax.purple.player",
        "privacy_policy": "https:\/\/dreamy-ritchie-12629b.netlify.com\/purpletv\/privacy_policy.html",
        "private_access": "true",
        "private_video_url": "https:\/\/hiboss.b-cdn.net",
        "startup_msg": "' . $purpleInfo['startup_msg'] . '",
        "vpn": "' . ($purpleInfo['vpn'] ? "true" : "false") . '",
        "vpn_sub_splash": "false",
        "vpn_login_screen": "' . ($purpleInfo['vpn_login_screen'] ? "true" : "false") . '",
        "allow_cast": "' . ($purpleInfo['allow_cast'] ? "true" : "false") . '",
        "remote_support": "' . ($purpleInfo['remote_support'] ? "true" : "false") . '",
        "wifi_option": "' . ($purpleInfo['wifi_option'] ? "true" : "false") . '",
        "sub_splash": "true",
        "clear_catch": "true",
        "setting_option": "' . ($purpleInfo['setting_option'] ? "true" : "false") . '",
        "app_list_status": "' . ($purpleInfo['app_list_status'] ? "true" : "false") . '",
        "private_menu": "' . ($purpleInfo['private_menu'] ? "true" : "false") . '",
        "epg_timeshift": "' . ($purpleInfo['epg_timeshift'] ? "true" : "false") . '",
        "epg_catchup": "' . ($purpleInfo['epg_catchup'] ? "true" : "false") . '",
        "catchup": "' . ($purpleInfo['catchup'] ? "true" : "false") . '",
        "epg_roku": "false",
        "dashbord_ticker": "' . ($purpleInfo['dashbord_ticker'] ? "true" : "false") . '",
        "login_ticker": "' . ($purpleInfo['login_ticker'] ? "true" : "false") . '",
        "sub_profile": "true",
        "set_default_play": "' . ($purpleInfo['set_default_play'] ? "true" : "false") . '",
        "set_recent_play": "' . ($purpleInfo['set_recent_play'] ? "true" : "false") . '",
        "remind_me": "false",
        "cloud_remind_me": "#",
        "cloud_remind_me_url": "#",
        "cloud_recording": "true",
        "cloud_recent_fav": "false",
        "cloud_recent_fav_url": "#",
        "multi_recording": "' . ($purpleInfo['multi_recording'] ? "true" : "false") . '",
        "recording": "' . ($purpleInfo['recording'] ? "true" : "false") . '",
        "app_external_plugin": "' . ($purpleInfo['app_external_plugin'] ? "true" : "false") . '",
        "chat_url": "",
        "startup_plugin_install": "' . ($purpleInfo['startup_plugin_install'] ? "true" : "false") . '",
        "startup_archive_category": "false",
        "startup_auto_boot": "' . ($purpleInfo['startup_auto_boot'] ? "true" : "false") . '",
        "startup_device_select": "' . ($purpleInfo['startup_device_select'] ? "true" : "false") . '",
        "manual_device_select": "' . ($purpleInfo['manual_device_select'] ? "true" : "false") . '",
        "header_key": "Purple",
        "header_value": "User-Agent",
        "smtp_server": "",
        "smtp_port": "",
        "smtp_username": "",
        "smtp_password": "",
        "smtp_from_email": "",
        "channel_reporting": "false",
        "channel_reporting_to_email": "",
        "movie_show_reqest": "false",
        "movie_show_reqest_to_email": "",
        "channel_report_email_subject": "",
        "movie_shows_reqest_email_subject": "",
        "p2p": "false",
        "p2p_signal": "wss:\/\/signalcloud.cdnbye.com",
        "p2p_setting_default": "false",
        "intro_video": "' . ($purpleInfo['intro_video'] ? "true" : "false") . '",
        "theme_change_allow": "' . ($purpleInfo['theme_change_allow'] ? "true" : "false") . '",
        "theme_change_layout": "L1,L2,L4,L5,L6,L7,L8,L9,L10,L12,L13,L14,L15,L16,L17,L18",
        "report_issue_from_email": "support@purplesmarttv.com",
        "report_issue_to_email": "info@purplesmarttv.com",
        "report_issue": "false",
        "reporting_api": "#",
        "mqtt_server": "#",
        "mqtt_endpoint": "#",
        "auto_login": "false",
        "multi_profile": "' . ($purpleInfo['multi_profile'] ? "true" : "false") . '",
        "server_selection": "' . ($purpleInfo['server_selection'] ? "true" : "false") . '",
        "app_settings": "' . ($purpleInfo['app_settings'] ? "true" : "false") . '",
        "app_settings_passcode": "0000",
        "app_general_settings": "true",
        "multi_profile_auto_login": "true",
        "sub_user_profile": "false",
        "sub_user_profile_allow": "5",
        "sub_user_profile_default": "false",
        "sub_user_profile_setting": "true",
        "sub_user_profile_select_on_start": "false",
        "stream_format": "' . $purpleInfo['stream_format'] . '",
        "default_device_select": {
            "detect": "false",
            "device": "TV"
        },
        "sub_user_profile_settings": "false"
    },
    "app_dns": [
        ' . $dnsInfo . '
    ],
    "app_image": {
        "app_img": "' . ($purpleInfo['app_img'] ? "true" : "false") . '",
        "app_logo": "' . $purpleInfo['app_logo'] . '",
        "app_mobile_icon": "' . $purpleInfo['app_mobile_icon'] . '",
        "app_tv_banner": "' . $purpleInfo['app_tv_banner'] . '",
        "splash_image": "' . $purpleInfo['splash_image'] . '",
        "back_image": "' . $purpleInfo['back_image'] . '"
    },
    "about": {
        "description": "' . $purpleInfo['about_description'] . '",
        "developed": "' . $purpleInfo['about_developed'] . '",
        "name": "' . $purpleInfo['about_name'] . '",
        "skype": "' . $purpleInfo['about_skype'] . '",
        "telegram": "' . $purpleInfo['about_telegram'] . '",
        "whatsapp": "' . $purpleInfo['about_whatsapp'] . '"
    },
    "support": {
        "email": "support@purplesmarttv.net",
        "web": "http:\/\/purplesmarttv.net",
        "skype": "skype:\/\/live:.cid.8068bbaec03ede66",
        "telegram": "https:\/\/t.me\/purpletvsupport",
        "whatsapp": "+19092777171"
    },
    "version": {
        "version_check": "false",
        "version_code": "21",
        "version_name": "5.0",
        "version_download_url": "",
        "version_download_url_apk": "",
        "version_force_update": "false",
        "version_update_msg": ""
    },
    "endpoint": {
        "m3u_parse": "#",
        "login": "#",
        "register": "#",
        "list_get": "#",
        "list_xstream_update": "#",
        "deleteurl": "#",
        "list_m3u_update": "#",
        "list_update_epg": "#"
    },
    "api_key": {
        "imdb_api": "https:\/\/omdbapi.b-cdn.net\/?t=%s&apikey=f608cd74",
        "g_api_key": "AIzaSyCXTlsFcriBtNmakgbCoP7XGfRGcB_Mc0c",
        "image_imdb": "https:\/\/images.metahub.space\/poster\/large\/%s\/img",
        "trakt_api_key": "9f2897b7a0dac4606e3074622cf6c52581f8dc208bc1520381b18bd90b74e257",
        "vpn_url": "#",
        "vpn_username": "#",
        "vpn_password": "#",
        "ip_stack_key": "75a3f0c901c3b0c9ef6b9decd12cc58e",
        "check_ip": "https:\/\/checkip.justwatch.com"
    },
    "background": {
        "background_auto_change": "' . ($purpleInfo['background_auto_change'] ? "true" : "false") . '",
        "background_mannual_change": "' . ($purpleInfo['background_mannual_change'] ? "true" : "false") . '",
        "background_orverlay_color_code": "' . $purpleInfo['background_orverlay_color_code'] . '",
        "background_url": [
            {
                "url": "' . $purpleInfo['background_url1'] . '"
            },
            {
                "url": "' . $purpleInfo['background_url2'] . '"
            },
            {
                "url": "' . $purpleInfo['background_url3'] . '"
            },
            {
                "url": "' . $purpleInfo['background_url4'] . '"
            }
        ]
    },
    "language": {
        "defult_language": "EN",
        "firstime_select_language": "true"
    },
    "themes": {
        "theme_defult_layout": "L10",
        "theme_color_1": "   #000000",
        "theme_color_2": "   #FFFFFF",
        "theme_color_3": "   #",
        "theme_change": null
    },
    "private_menu": [],
    "plugin_list": []
}';
echo base64_encode(base64_encode(base64_encode(base64_encode(json_encode(json_decode($string))))));
