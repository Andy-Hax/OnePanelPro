<?php
ini_set("display_errors", 0);
error_reporting(0);
$functionsFile = "../../includes/functions.php";
include($functionsFile);
$string='{
    "package_name": "com.andyhax.purple.player",
    "login_id_pin": false,
    "login_activate": false,
    "login_qr": false,
    "login_code_universal": false,
    "login_mac_key": false,
    "verifyDevice": "https://app.purpletv.app/api/verifyDeviceCode",
    "playlist": "https://app.purpletv.app/api/playlistByDevice",
    "qr_data": "https://app.purpletv.app",
    "register": "http://dev.api.purplesmarttv.com/register",
    "login": "http://dev.api.purplesmarttv.com/login",
    "create_playlist": "http://dev.api.purplesmarttv.com/createplaylist",
    "create_subprofile": "http://dev.api.purplesmarttv.com/subprofile",
    "create_history": "http://dev.api.purplesmarttv.com/createhistory",
    "create_fav": "http://dev.api.purplesmarttv.com/createfavorites",
    "update_playlist": "http://dev.api.purplesmarttv.com/updateplaylist",
    "get_subprofile": "http://dev.api.purplesmarttv.com/getsubprofile",
    "list_get": "http://dev.api.purplesmarttv.com/getList",
    "list_m3u_update": "http://dev.api.purplesmarttv.com/m3u",
    "deleteurl": "http://dev.api.purplesmarttv.com/deleteurl",
    "list_xstream_update": "http://dev.api.purplesmarttv.com/xstream",
    "app_api_endpoint": "' . $GLOBALS['panelroot'] . 'purple/12/1.php?code=ahx",
    "m3u_parse": "http://vithani.org/api/m3uparse/m3u.php?url=",
    "movie_call": "https://coequalsnails.backendless.app/api/data/P_10100010",
    "show_call": "https://coequalsnails.backendless.app/api/data/P_10100010?property=x01100111&property=x01110011&where=x01110000%20%3D%20%27com.stream.for.us%27",
    "content": {},
    "ads_status": false,
    "ads_app_id": "",
    "ads_banner": "",
    "ads_intrestial": "",
    "startup_msg": "",
    "ads_rewarded": "",
    "vast_ads": {
        "live_tv": {
            "app_vast_ads_s_status": "false",
            "app_vast_ads_s_full": "false",
            "app_vast_ads_s_type": "Google",
            "app_vast_ads_s": "https://pubads.g.doubleclick.net/gampad/live/ads?iu=/206696744,22518463368/PurpleTv/purplesmartv_video&description_url=https%3A%2F%2Fpurplesmarttv.com%2F&tfcd=0&npa=0&sz=640x480&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=",
            "app_vast_ads_h_status": "true",
            "app_vast_ads_h_type": "Google",
            "app_vast_ads_h": "https://pubads.g.doubleclick.net/gampad/live/ads?iu=/206696744,22518463368/PurpleTv/purplesmartv_video&description_url=https%3A%2F%2Fpurplesmarttv.com%2F&tfcd=0&npa=0&sz=640x480&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator="
        },
        "vod": {
            "app_vast_ads_s_status": "false",
            "app_vast_ads_s_type": "Google",
            "app_vast_ads_s": "https://pubads.g.doubleclick.net/gampad/live/ads?iu=/206696744,22518463368/PurpleTv/purplesmartv_video&description_url=https%3A%2F%2Fpurplesmarttv.com%2F&tfcd=0&npa=0&sz=640x480&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=",
            "app_vast_ads_h_status": "false",
            "app_vast_ads_h_type": "Google",
            "app_vast_ads_h": "https://pubads.g.doubleclick.net/gampad/live/ads?iu=/206696744,22518463368/PurpleTv/purplesmartv_video&description_url=https%3A%2F%2Fpurplesmarttv.com%2F&tfcd=0&npa=0&sz=640x480&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator="
        },
        "show": {
            "app_vast_ads_s_status": "false",
            "app_vast_ads_s_type": "Google",
            "app_vast_ads_s": "https://pubads.g.doubleclick.net/gampad/live/ads?iu=/206696744,22518463368/PurpleTv/purplesmartv_video&description_url=https%3A%2F%2Fpurplesmarttv.com%2F&tfcd=0&npa=0&sz=640x480&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=",
            "app_vast_ads_h_status": "false",
            "app_vast_ads_h_type": "Google",
            "app_vast_ads_h": "https://pubads.g.doubleclick.net/gampad/live/ads?iu=/206696744,22518463368/PurpleTv/purplesmartv_video&description_url=https%3A%2F%2Fpurplesmarttv.com%2F&tfcd=0&npa=0&sz=640x480&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator="
        }
    },
    "pro_feature": [{
            "title": "Six Month",
            "status": true,
            "Description": "Unlock Access for All Device \n\nSYNC All Devices with Cloud \n\nSwitch Video Player \n\nRemove Ads \n\nMultiple Sub Profile \n\nSwitch Theme \n\nContinue Watching \n\nUpcoming New Features"
        }, {
            "title": "Yearly",
            "status": true,
            "Description": "Unlock Access for All Device \n\nSYNC All Devices with Cloud \n\nSwitch Video Player \n\nRemove Ads \n\nMultiple Sub Profile \n\nSwitch Theme \n\nContinue Watching \n\nUpcoming New Features"
        }, {
            "title": "LifeTime",
            "status": true,
            "Description": "Unlock Access for All Device \n\nSYNC All Devices with Cloud \n\nSwitch Video Player \n\nRemove Ads \n\nMultiple Sub Profile \n\nSwitch Theme \n\nContinue Watching \n\nUpcoming New Features"
        }
    ],
    "yandex_key": "d016e0b4-9da3-4bd1-bce9-6b775230493b",
    "imdb_api": "https://omdbapi.b-cdn.net/?t=%s&apikey=f608cd74",
    "g_api_key": "AIzaSyCXTlsFcriBtNmakgbCoP7XGfRGcB_Mc0c",
    "ip_stack_key": "75a3f0c901c3b0c9ef6b9decd12cc58e",
    "check_ip": "https://checkip.justwatch.com",
    "header_key": "User-Agent",
    "header_value": "Purple IPTV Player",
    "version_code": 8,
    "version_name": "3.0",
    "version_update_msg": "Update your app : Recording and MultiScreen Avilable Now!",
    "version_download_url": "https://play.google.com/store/apps/details?id=com.purple.iptv.player",
    "version_force_update": "false",
    "privacy_policy": "https://www.iubenda.com/privacy-policy/68919995",
    "version_download_url_apk": "",
    "private_video_url": "",
    "allow_4k": true,
    "allow_cast": true,
    "support_aboutus": "https://pastebin.com/raw/LxvyscnG",
    "image_imdb": "https://images.metahub.space/poster/large/%s/img",
    "trakt_api_key": "9f2897b7a0dac4606e3074622cf6c52581f8dc208bc1520381b18bd90b74e257",
    "vpn_url": "https://xvpn.b-cdn.net/test.php",
    "vpn_username": "tLe7XxPXgnnb7fj6Egt68LnM",
    "vpn_password": "ZB6pZk6dv6uFp6SZGqZ99HZA",
    "purpleiptv_url": "' . $GLOBALS['panelroot'] . 'purple/12/1.php?code=ahx",
    "app_mode": {
        "app_mode": {
            "0": "Full",
            "1": "Xstream",
            "2": "M3u",
            "3": "Universal"
        }
    },
    "mqtt_server": "",
    "mqtt_endpoint": "",
    "cloud_recent_fav_url": "http://cloud.purplesmarttv.com/apimongo/crud.php",
    "cloud_recent_fav": false,
    "remind_me": true,
    "cloud_recording": false,
    "cloud_remind_me": false,
    "cloud_remind_me_url": "http://cloud.purplesmarttv.com/apimongo/remind.php",
    "plugin_list": [{
            "name": "Mx Player Plugin",
            "version": 1,
            "playstore_url": "https://play.google.com/store/apps/details?id=com.purple.timeshift.plugin",
            "apk_url": "",
            "status": true,
            "pkg_name": "com.purple.timeshift.plugin"
        }, {
            "name": "Recording Plugin",
            "version": 15,
            "playstore_url": "",
            "apk_url": "http://192.168.1.52\/PLUGINS/RecordingPlugin.apk",
            "status": false,
            "pkg_name": "com.purple.recording.plugin"
        }
    ],
    "smtp_server": "",
    "smtp_port": "",
    "smtp_username": "",
    "smtp_password": "",
    "smtp_from_email": "inquiry@purplesmarttv.com",
    "channel_reporting": true,
    "channel_reporting_to_email": "support@purplesmarttv.com",
    "movie_show_reqest": true,
    "movie_show_reqest_to_email": "support@purplesmarttv.com",
    "channel_report_email_subject": "Purple App Channel Report",
    "movie_shows_reqest_email_subject": "Movie Request",
    "reporting_api": "' . $GLOBALS['panelroot'] . 'purple/12/",
    "sport_guide": "' . $GLOBALS['panelroot'] . 'purple/sports.php?",
    "apple_tv_code_mode": true
}';
echo json_encode(json_decode($string));