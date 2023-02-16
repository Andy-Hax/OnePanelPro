<?php
ini_set("display_errors", 0);
error_reporting(0);

session_start();
require_once("includes/functions.php");
if (!isset($_SESSION[$authVar]) || !$dbIsLatest) {
  header("Location: index.php");
  exit;
}
$includePage = "dns.php";
$navCss = "active bg-gradient-secondary";
$subNavCss = "active";
$dnsClass = "";
$notificationsClass = "";
$profileClass = "";
$femtoClass = "";
$introClass = "";

if (isset($_GET['dns'])) {
  $dnsInfo = loadAllDNS();
  $dnsClass = $navCss;
} else if (isset($_GET['dns-add'])) {
  $dnsClass = $navCss;
  $includePage = "dns-add.php";
} else if (isset($_GET['notification-add'])) {
  $notificationsClass = $navCss;
  $includePage = "notification-add.php";
} else if (isset($_GET['message-add'])) {
  $messageClass = $navCss;
  $includePage = "message-add.php";
} else if (isset($_GET['notifications'])) {
  $notificationInfo = loadAllNotifications();
  $notificationsClass = $navCss;
  $includePage = "notifications.php";
} else if (isset($_GET['messages'])) {
  $messageInfo = loadAllMessages();
  $messageClass = $navCss;
  $includePage = "messages.php";
} else if (isset($_GET['notification-edit'])) {
  $notificationEditInfo = loadNotification($_GET['id']);
  $notificationsClass = $navCss;
  $includePage = "notification-edit.php";
} else if (isset($_GET['message-edit'])) {
  $messageEditInfo = loadMessage($_GET['id']);
  $messageClass = $navCss;
  $includePage = "message-edit.php";
} else if (isset($_GET['profile'])) {
  $userInfo = loadProfile(1);
  $panelRoot = loadPanelRoot();
  $profileClass = $navCss;
  $includePage = "profile.php";
} else if (isset($_GET['femto-settings'])) {
  $femtoClass = $navCss;
  $femtoOptions = loadFemtoOptions();
  $includePage = "femto.php";
} else if (isset($_GET['dns-edit'])) {
  $dnsClass = $navCss;
  $includePage = "dns-edit.php";
  $dnsId = $_GET['id'];
  $dnsEditInfo = loadDns($dnsId);
} else if (isset($_GET['ads'])) {
  $adsClass = $navCss;
  $includePage = "ads.php";
  $adInfo = loadAllAds();
} else if (isset($_GET['ad-edit'])) {
  $adEditInfo = loadAd($_GET['id']);
  $adsClass = $navCss;
  $includePage = "ad-edit.php";
} else if (isset($_GET['ad-add'])) {
  $adsClass = $navCss;
  $includePage = "ad-add.php";
} else if (isset($_GET['vpn'])) {
  $vpnClass = $navCss;
  $includePage = "vpn.php";
  $vpnInfo = loadAllVpn();
} else if (isset($_GET['vpn-edit'])) {
  $vpnEditInfo = loadVpn($_GET['id']);
  $vpnClass = $navCss;
  $includePage = "vpn-edit.php";
} else if (isset($_GET['vpn-add'])) {
  $vpnClass = $navCss;
  $includePage = "vpn-add.php";
} else if (isset($_GET['intro'])) {
  $introInfo = loadIntro();
  $introClass = $navCss;
  $includePage = "intro.php";
} else if (isset($_GET['smarters-settings'])) {
  $smartersInfo = loadSmartersOptions();
  $smartersClass = $navCss;
  $includePage = "smarters.php";
} else if (isset($_GET['xciptv-app-settings'])) {
  $xciptvInfo = loadXCIPTVOptions();
  $xciptvAppClass = $navCss;
  $includePage = "xciptv-app.php";
} else if (isset($_GET['xciptv-interface-settings'])) {
  $xciptvInfo = loadXCIPTVOptions();
  $xciptvButtonClass = $navCss;
  $includePage = "xciptv-interface.php";
} else if (isset($_GET['xciptv-player-settings'])) {
  $xciptvInfo = loadXCIPTVOptions();
  $xciptvPlayerClass = $navCss;
  $includePage = "xciptv-player.php";
} else if (isset($_GET['tivimate-settings'])) {
  $tiviInfo = loadTiviOptions();
  $tivimateClass = $navCss;
  $includePage = "tivimate.php";
} else if (isset($_GET['implayer-settings'])) {
  $imInfo = loadImPlayerOptions();
  $implayerClass = $navCss;
  $includePage = "implayer.php";
} else if (isset($_GET['ltq-settings'])) {
  $ltqInfo = loadLTQOptions();
  $ltqClass = $navCss;
  $includePage = "ltq.php";
} else if (isset($_GET['hardcode'])) {
  $hardcodeClass = $navCss;
  $includePage = "hardcode.php";
} else if (isset($_GET['sports'])) {
  $sportsInfo = loadSportsOptions();
  $sportsClass = $navCss;
  $includePage = "sports.php";
} else if (isset($_GET['purple-settings'])) {
  $purpleInfo = loadPurpleOptions();
  $purpleClass = $navCss;
  $purpleExpanded = "true";
  $purpleShow = " show ";
  $purpleAppClass = $subNavCss;
  $includePage = "purple-app.php";
} else if (isset($_GET['purple-interface-settings'])) {
  $purpleInfo = loadPurpleOptions();
  $purpleClass = $navCss;
  $purpleShow = " show ";
  $purpleExpanded = "true";
  $purpleInterfaceClass = $subNavCss;
  $includePage = "purple-interface.php";
} else if (isset($_GET['ltqd-settings'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdInfo = loadLTQDOptions();
  $ltqdAppClass = $subNavCss;
  $includePage = "ltqd-app.php";
} else if (isset($_GET['ltqd-sports-categories'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdCategoryInfo = loadLTQDSportsCategories();
  $ltqdCategoriesClass = $subNavCss;
  $includePage = "ltqd-sports-categories.php";
} else if (isset($_GET['ltqd-sports-categories-add'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdCategoriesClass = $subNavCss;
  $includePage = "ltqd-sports-categories-add.php";
} else if (isset($_GET['ltqd-sports-categories-edit'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdCategoryEditInfo = loadLTQDSportsCategory($_GET['id']);
  $ltqdCategoriesClass = $subNavCss;
  $includePage = "ltqd-sports-categories-edit.php";
} else if (isset($_GET['ltqd-sports-teams'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdTeamsInfo = loadLTQDSportsTeams();
  $ltqdTeamsClass = $subNavCss;
  $includePage = "ltqd-sports-teams.php";
} else if (isset($_GET['ltqd-sports-teams-add'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdTeamsClass = $subNavCss;
  $includePage = "ltqd-sports-teams-add.php";
} else if (isset($_GET['ltqd-sports-teams-edit'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdSportsTeamEditInfo = loadLTQDSportsTeam($_GET['id']);
  $ltqdTeamsClass = $subNavCss;
  $includePage = "ltqd-sports-teams-edit.php";
} else if (isset($_GET['ltqd-sports-events'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdEventsInfo = loadLTQDSportsEventsDisplay();
  $ltqdEventsClass = $subNavCss;
  $includePage = "ltqd-sports-events.php";
} else if (isset($_GET['ltqd-sports-events-edit'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdEventEditInfo = loadLTQDSportsEvent($_GET['id']);
  $ltqdTeamsInfo = loadLTQDSportsTeams();
  $ltqdCategoryInfo = loadLTQDSportsCategories();
  $ltqdEventsClass = $subNavCss;
  $includePage = "ltqd-sports-events-edit.php";
} else if (isset($_GET['ltqd-sports-events-add'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdTeamsInfo = loadLTQDSportsTeams();
  $ltqdCategoryInfo = loadLTQDSportsCategories();
  $ltqdEventsClass = $subNavCss;
  $includePage = "ltqd-sports-events-add.php";
} else if (isset($_GET['ltqd-themes'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdThemesInfo = loadLTQDThemes();
  $ltqdThemesClass = $subNavCss;
  $includePage = "ltqd-themes.php";
} else if (isset($_GET['ltqd-themes-edit'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdThemesEditInfo = loadLTQDTheme($_GET['id']);
  $ltqdThemesClass = $subNavCss;
  $includePage = "ltqd-themes-edit.php";
} else if (isset($_GET['ltqd-themes-add'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdThemesClass = $subNavCss;
  $includePage = "ltqd-themes-add.php";
} else if (isset($_GET['ltqd-appstore'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdAppstoreInfo = loadLTQDAppstore();
  $ltqdAppstoreClass = $subNavCss;
  $includePage = "ltqd-appstore.php";
} else if (isset($_GET['ltqd-appstore-edit'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdAppstoreEditInfo = loadLTQDAppstoreApp($_GET['id']);
  $ltqdAppstoreClass = $subNavCss;
  $includePage = "ltqd-appstore-edit.php";
} else if (isset($_GET['ltqd-appstore-add'])) {
  $ltqdClass = $navCss;
  $ltqdExpanded = "true";
  $ltqdShow = " show ";
  $ltqdAppstoreClass = $subNavCss;
  $includePage = "ltqd-appstore-add.php";
} else {
  $dnsInfo = loadAllDNS();
  $dnsClass = $navCss;
}

?><!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/fav/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/fav/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/fav/favicon-16x16.png">
  <link rel="manifest" href="site.webmanifest">
  <link rel="mask-icon" href="assets/fav/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <title>
    OnePanel <?php echo $appVersion; ?>
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.min.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <a class="navbar-brand m-0" style="text-align:center;">

        <span class="ms-1 font-weight-bold text-white">Logged in as <?php echo $_SESSION[$authVar]; ?></span>
      </a>

    </div>
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $dnsClass; ?>" href="dashboard.php?dns">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dns</i>
            </div>
            <span class="nav-link-text ms-1">DNS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $notificationsClass; ?>" href="dashboard.php?notifications">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">campaign</i>
            </div>
            <span class="nav-link-text ms-1">Announcements</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $messageClass; ?>" href="dashboard.php?messages">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">mail</i>
            </div>
            <span class="nav-link-text ms-1">Messages</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $adsClass; ?>" href="dashboard.php?ads">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">image</i>
            </div>
            <span class="nav-link-text ms-1">Ads</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $vpnClass; ?>" href="dashboard.php?vpn">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">vpn_lock</i>
            </div>
            <span class="nav-link-text ms-1">VPN</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $introClass; ?>" href="dashboard.php?intro">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">play_circle</i>
            </div>
            <span class="nav-link-text ms-1">Intro Video</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $sportsClass; ?>" href="dashboard.php?sports">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">sports_soccer</i>
            </div>
            <span class="nav-link-text ms-1">Sports Guide</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $hardcodeClass; ?>" href="dashboard.php?hardcode">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">link</i>
            </div>
            <span class="nav-link-text ms-1">Hardcoded Apps</span>
          </a>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#ltqdtab" class="nav-link text-white <?php echo $ltqdClass; ?>" aria-controls="ltqdtab" aria-expanded="<?php echo $ltqdExpanded; ?>">
            <span class="sidenav-mini-icon"> Q </span>
            <span class="nav-link-text ms-2 ps-1">LTQ Deluxe</span>
          </a>
          <div class="collapse <?php echo $ltqdShow; ?>" id="ltqdtab" style="">
            <ul class="nav ">
              <li class="nav-item <?php echo $ltqdAppClass; ?>">
                <a class="nav-link text-white <?php echo $ltqdAppClass; ?>" href="dashboard.php?ltqd-settings">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal  ms-2  ps-1"> App Settings </span>
                </a>
              </li>
              <li class="nav-item <?php echo $ltqdCategoriesClass; ?>">
                <a class="nav-link text-white <?php echo $ltqdCategoriesClass; ?>" href="dashboard.php?ltqd-sports-categories">
                  <span class="sidenav-mini-icon"> C </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Sports Categories </span>
                </a>
              </li>
              <li class="nav-item <?php echo $ltqdTeamsClass; ?>">
                <a class="nav-link text-white <?php echo $ltqdTeamsClass; ?>" href="dashboard.php?ltqd-sports-teams">
                  <span class="sidenav-mini-icon"> T </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Sports Teams </span>
                </a>
              </li>
              <li class="nav-item <?php echo $ltqdEventsClass; ?>">
                <a class="nav-link text-white <?php echo $ltqdEventsClass; ?>" href="dashboard.php?ltqd-sports-events">
                  <span class="sidenav-mini-icon"> E </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Sports Events </span>
                </a>
              </li>
              <li class="nav-item <?php echo $ltqdThemesClass; ?>">
                <a class="nav-link text-white <?php echo $ltqdThemesClass; ?>" href="dashboard.php?ltqd-themes">
                  <span class="sidenav-mini-icon"> T </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Themes </span>
                </a>
              </li>
              <li class="nav-item <?php echo $ltqdAppstoreClass; ?>">
                <a class="nav-link text-white <?php echo $ltqdAppstoreClass; ?>" href="dashboard.php?ltqd-appstore">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Appstore </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#puepleplayertab" class="nav-link text-white <?php echo $purpleClass; ?>" aria-controls="puepleplayertab" aria-expanded="<?php echo $purpleExpanded; ?>">
            <span class="sidenav-mini-icon"> P </span>
            <span class="nav-link-text ms-2 ps-1">Purple Player</span>
          </a>
          <div class="collapse <?php echo $purpleShow; ?>" id="puepleplayertab" style="">
            <ul class="nav ">
              <li class="nav-item <?php echo $purpleAppClass; ?>">
                <a class="nav-link text-white <?php echo $purpleAppClass; ?>" href="dashboard.php?purple-settings">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal  ms-2  ps-1"> App Settings </span>
                </a>
              </li>
              <li class="nav-item <?php echo $purpleInterfaceClass; ?>">
                <a class="nav-link text-white <?php echo $purpleInterfaceClass; ?>" href="dashboard.php?purple-interface-settings">
                  <span class="sidenav-mini-icon"> I </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Interface Settings </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $femtoClass; ?>" href="dashboard.php?femto-settings">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="assets/img/logos/femto.svg" class="material-icons opacity-10" style="height:20px;" />
            </div>
            <span class="nav-link-text ms-1">Femto Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $ltqClass; ?>" href="dashboard.php?ltq-settings">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="assets/img/logos/femto.svg" class="material-icons opacity-10" style="height:20px;" />
            </div>
            <span class="nav-link-text ms-1">LTQ Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $tivimateClass; ?>" href="dashboard.php?tivimate-settings">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="assets/img/logos/tivimate.svg" class="material-icons opacity-10" style="height:20px;" />
            </div>
            <span class="nav-link-text ms-1">Tivimate Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $implayerClass; ?>" href="dashboard.php?implayer-settings">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="assets/img/logos/implayer.svg" class="material-icons opacity-10" style="height:20px;" />
            </div>
            <span class="nav-link-text ms-1">IMPlayer Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $smartersClass; ?>" href="dashboard.php?smarters-settings">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="assets/img/logos/smarters.svg" class="material-icons opacity-10" style="height:20px;" />
            </div>
            <span class="nav-link-text ms-1">Smarters Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $xciptvAppClass; ?>" href="dashboard.php?xciptv-app-settings">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="assets/img/logos/xciptv.svg" class="material-icons opacity-10" style="height:20px;" />
            </div>
            <span class="nav-link-text ms-1">XCIPTV App Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $xciptvButtonClass; ?>" href="dashboard.php?xciptv-interface-settings">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="assets/img/logos/xciptv.svg" class="material-icons opacity-10" style="height:20px;" />
            </div>
            <span class="nav-link-text ms-1">XCIPTV Interface Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $xciptvPlayerClass; ?>" href="dashboard.php?xciptv-player-settings">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="assets/img/logos/xciptv.svg" class="material-icons opacity-10" style="height:20px;" />
            </div>
            <span class="nav-link-text ms-1">XCIPTV Player Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $profileClass; ?>" href="dashboard.php?profile">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">settings</i>
            </div>
            <span class="nav-link-text ms-1">Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="logout.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Log out</span>
          </a>
        </li>

      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a target="_blank" href="https://t.me/AndyHax">
          <img src="assets/img/OnePanel.png" style="max-width:100%;">
        </a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">

          <ul class="navbar-nav  justify-content-end">

            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <!--Start  include -->
      <?php include "includes/" . $includePage; ?>
      <!--End  include -->
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                OnePanel <?php echo $appVersion; ?>
                <br>
                <a target="_blank" href="https://t.me/AndyHax">
                  <img src="assets/img/logos/telegram.png" style="max-width:30px;"> AndyHax
                </a>

                <br>
              </div>
            </div>
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-end">
                <a href="https://www.buymeacoffee.com/AndyHax" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;"></a>
                <br>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.4"></script>
  <script>
    function toggleOvpnType(that) {

      if (that.value == "file") {
        document.getElementById("ovpnFileUpload").style.display = "";
        document.getElementById("ovpnPathEntry").style.display = "none";
      } else {
        document.getElementById("ovpnFileUpload").style.display = "none";
        document.getElementById("ovpnPathEntry").style.display = "";
      }
    }
  </script>
</body>

</html>