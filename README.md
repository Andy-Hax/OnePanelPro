OnePanel v1.1

In this release
- Purple Player V12 (Should also work for other versions of Purple) support. Please note this is experimental and there are configurables that I have not implemented yet - but this should be good to test.
- Removed option to forward DNS (It just wasn't reliable)
- Rewrite of the DNS proxying process - this should now be more reliable
- XCIPTV button options for each portal (1-5)
- General bugfixes
- Hardcoded apps section to show URL to make hardcoded apps multi-dns

--------------------------------------------------------------------------------------------

OnePanel v1.0

In this release
- PHP 8 Compatibility (tested with 8 and 8.1)
- Fixed bug with double slash being added to proxy/forward URLs
- Fixed bug with XCIPTV announcements
- Added path to add to APK in each player section
- Added XCIPTV messages
- Updated authentication session tokens so multiple instances of OnePanel can run on a domain without auth interfering
- Clear DNS user session cache when DNS is updated or deleted so incorrect links aren't maintained

--------------------------------------------------------------------------------------------

OnePanel v0.4a (ALPHA)

In this release:
- Bug with XCIPTV fixed
- Bug with Femto fixed
- Installer script updated

--------------------------------------------------------------------------------------------
OnePanel v0.3a (ALPHA)

IMPORTANT NOTES - please read:
- I appreciate everyone taking the time to help me test, thank you! *However please only report an issue if you're willing to give me the APK/info to recreate the issue*. Reporting an issue without the ability for me to recreate and therefore fix the issue is like going to a garage to say "my car is broken" but not allowing them to take a look under the bonnet.
- Please read the notes from 0.1a below, they are still very relevant.

Features:
- LTQ compatibility added, including section in the panel to encrypt the URL to paste into the smali of the APK. (your APK should be modified to point to YOURURL/onepanel/ltq/ (no /api on the end). Tested with v161 currently. The most common AES key (yugofuckyourself) is default.
- Root panel URL is now stored as a parameter which you can manage in the settings tab. If DNS forwarding/proxying isn't working for you please check this is correct. This should hopefully help those behind load-balancers and cloudflare etc having trouble with proxying & forwarding.
- Improved XCIPTV licV4 compatibility - you can now select how the player (ort_settings) are sent in the licV4 response, some apps require it as part of the overall json object, some require it as a string which is decoded on the client side and some require it encrypted. If you're having issues with licV4 not loggin in or not loading at all, try them one at a time.
- Improved XCIPTV licV3 compatibility - if your app has a custom encryption key and IV, you can change this in the XCIPTV app settings. In most cases the default OTTRun key and IV should be fine unless it's a specifically modified app.
- Choose XCIPTV theme in interface settings, standard is default.
- Improved portal forwarding and proxying process
- Improved IMPlayer, now sends multi-DNS when using direct-to-app DNS and supports version 1.9

Installation instructions
*Clean Install*
- Copy the onepanel folder to your server
- Create a blank MySQL database
- Add these database details to includes/db.php
- Open the URL you have copied it to and you should be walked through the installation

*Upgrade from 0.2a*
- If you are upgrading from a previous version, copy the onepanel folder over the top of the old one and go to the login page - this should walk you through the upgrade.

--------------------------------------------------------------------------------------------

OnePanel v0.2a (ALPHA)

IMPORTANT NOTES - please read:
- I appreciate everyone taking the time to help me test, thank you! *However please only report an issue if you're willing to give me the APK/info to recreate the issue*. Reporting an issue without the ability for me to recreate and therefore fix the issue is like going to a garage to say "my car is broken" but not allowing them to take a look under the bonnet.
- Please read the notes from 0.1a below, they are still very relevant.

Features:
- Send DNS directly to app, a third option to send DNS to the app (like traditional panels)
- Smarters v3 AES compatibility
- Improved XCIPTV licV3 compatibility
- Announcements sent to XCIPTV (all versions)
- (EXPERIMENTAL) TiviMate 3.X panelled compatibility - NOTE - Single DNS only unless you forward or proxy the requests - first DNS in the list will be sent (your APK should be modified to point to YOURURL/onepanel/tivi/ (no /api on the end)
- (EXPERIMENTAL) IMPlayer 1.8 panelled compatibility - NOTE - Single DNS only unless you forward or proxy the requests - first DNS in the list will be sent (your APK should be modified to point to YOURURL/onepanel/implayer/ (no /api on the end)
- New section in Profile page to troubleshoot .htaccess issues for forwarding/proxying requests

Installation instructions
- Copy the onepanel folder to your server
- Create a blank MySQL database
- Add these database details to includes/db.php
- Open the URL you have copied it to and you should be walked through the installation

- If you are upgrading from a previous version most of the settings from 0.1a will be lost - I'll improve this upgrade process when I move towards BETA releases.

--------------------------------------------------------------------------------------------
OnePanel v0.1a (ALPHA)

Features:
- Automatic DNS - add all your DNS, point your APK and let the panel do the work.
- DNS memory - store connections securely in the database for an instant connection next time the user connects.
- Femto Support - your APK should be modified to point to YOURURL/onepanel/femto/ (no /api on the end)
- Smarters support - your APK should be modified to point to YOURURL/onepanel/smarters/ (no /api on the end)
- XCIPTV <= 725 (licV3) Support - your APK should be modified to point to YOURURL/onepanel/xciptv/ (no /api on the end)
- XCIPTV > 725 (licV4) Support - your APK should be modified to point to YOURURL/onepanel/xciptv/ (no /api on the end)
- ANY hardcoded app can be made multi-dns with this panel, just point to YOURURL/onepanel/forward/ (to forwards the requests - try this first) or YOURURL/onepanel/proxy/ (to proxy the requests)

IMPORTANT NOTES - please read:
- I hope it goes without saying that this is an ALPHA release with known and unknown bugs, and as such should not yet be used in production environments.
- There are some licV4 APKs I've seen which expect the data in a slightly different format to what is implemented (some need the "ort_settings" paramater as part of the json object, some need it as an escaped string and some need it as an encrypted string) - I'm working on improving compatibility but need more working APKs.
- This should be installed on an Apache server, nginx/LiteSpeed etc will not honour the .htaccess files needed for rewrites/redirects - There's no reason it shouldn't work on nginx/LiteSpeed but you will have to analyse the .htaccess files and recreate the rewrite rules. I'll look to improve compatibility with these in the future
- The installer page will build the database and generate a secure password - Please make a note of this password as if you navigate away form the login page this will be lost forever and you will need to reinstall OnePanel
- Some issues were reported regarding the Femto compatibility of my separate Femto panbel, Femto is working for me but the issues have not been investigated so may or may not work for you.
- There are several features that I had planned to implement which aren't fully conmplete in this initial release
	- announcements & messages in XCIPTV don't work
	- VPN may work for smarters if the uploaded VPN files include embedded authentication, VPN will not work for XCIPTV yet, VPN on the whole is untested and will be looked at next.
	- Intro should work fine for any Smarters version that point to the API for the intro video - Generally XC intros are embedded into the APK so won't pick this up.
- Each app has the option to proxy portal requests through the panel. Ideally this should be disabled but can be enabled if forwarding the requests is not working - in short, try with it disabled first! Only API calls are proxied, streaming will be direct between the portal and the user.
- As a developer, it is very difficult to fix bugs without being able to recreate them yourself - so you may be required to share your APK/DNS/login details if you want a bug fixed.

Installation instructions
- Copy the onepanel folder to your server
- Create a blank MySQL database
- Add thee database details to includes/db.php
- Open the URL you have copied it to and you should be walked through the installation