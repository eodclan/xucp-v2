<?php 
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.2
// * 
// * Copyright (c) 2022 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
// * Prevent direct PHP call
// ************************************************************************************//
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {        
	header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
	setCookie("PHPSESSID", "", 0x7fffffff,  "/");
  	session_destroy();
	die( header( 'location: /404.php' ) );
}
const SITESTAFF = "Staff Tools";
const DASHBOARD = "Dashboard";
const HOME_NOLOGGED = "Startseite";
const USERPROFILE = "User Profil";
const USERACCOUNT = "Account Tools";
const USERPROFILECHANGE = "User Profil bearbeiten";
const USERSUPPORT = "Support";
const WELCOMETO = "Willkommen bei";
const STAFF_NEWSACP = "News System";
const STAFF_RULESACP = "Regelwerk System";
const SITE_LOGOUT = "Abmelden";
const FAQ = "FAQs";
const NEWS = "Neuigkeiten: ";
const SECURE_SYSTEM = "Secure System";
const MYCHARACTERS = "Mein Charakter";
const FROM_WL = "von";
const GSERVER_INFO_HEAD = "Client & Server";
const GSERVER_INFO_01 = "Hier in der Auflistung siehst du alle Informationen zu unseren Game Server!";
const GSERVER_INFO_02 = "F&uuml;r weitere Fragen wende dich bitte an den Support!";

// ************************************************************************************//
// * My Whitelist Status Language Section - Main 
// ************************************************************************************//
const MYWHITELIST_STATUS = "Deine Whitelist ist f&uuml;r unseren Server freigegeben. Wir w&uuml;nschen dir Viel Spa&szlig; bei uns!";
const MYWHITELIST_STATUS_2 = "Du hast noch keine Whitelist gestellt bzw. deine Whitelist ist vielleicht noch in Bearbeitung! <a href='/usercp/whitelist/index.php?mywhitelist=addwl'><button class='btn btn-dark'>Zur Whitelist</button></a>";
const MYWHITELIST_STATUS_3 = "Dein Whitelist Fragebogen wurde an unser Team gesendet. Bitte warte nun ab bis du zum Teamspeak Gespr&auml;ch eingeladen wirst.";
const MYWHITELIST_STATUS_4 = "Dein Whitelist Fragebogen konnte leider nicht an unser Team gesendet werden. Wende dich Bitte an unser Support Team.";
const MYWHITELIST_STATUS_5 = "Herzlich Willkommen im Whitelist System, Nimm dir bitte ausreichend Zeit und beantworte die Fragen nach deinen eigenen Ermessen!";
const MYWHITELIST_STATUS_6 = "Bedenke: Du hast 5 Minuten Zeit um den Fragebogen abzuschicken. Nach den 5 Minuten musst du von neu beginnen!";
const MYWHITELIST_USERNAME = "Dein Benutzername";
const MYWHITELIST_CHARNAME = "Dein Charaktername";
const MYWHITELIST_STORY = "Deine Charakter Story";
const MYWHITELIST_HEADER = "Whitelist System";

// ************************************************************************************//
// * Whitelist Language Section - Main 
// ************************************************************************************//
const FRAGE1 = "Frage 1";
const FRAGE2 = "Frage 2";
const FRAGE3 = "Frage 3";
const FRAGE4 = "Frage 4";
const FRAGE5 = "Frage 5";
const FRAGE6 = "Frage 6";
const FRAGE7 = "Frage 7";
const FRAGE8 = "Frage 8";
const FRAGE9 = "Frage 9";
const FRAGE10 = "Frage 10";
const FRAGE11 = "Frage 11";
const FRAGE12 = "Frage 12";
const FRAGEDONE = "Deine Eintr&auml;ge waren erfolgreich!";
const FRAGENOTE = "Es m&uuml;ssen alle Fragen eingetragen werden!";
const FRAGEDONEBTN = "Bearbeiten";
const FRAGE_HEADER = "Whitelist Fragen";
const FRAGE_HEADER_2 = "Whitelist Bewerbungen";
const FRAGE_VIEW = "Bewerbung anschauen";
const FRAGE_SEND = "Bewerbung abschicken";

// ************************************************************************************//
// * Keyboard Section - Main 
// ************************************************************************************//
const KEY1 = "Voice Range";
const KEY2 = "LSPD Police Shield (anlegen)";
const KEY3 = "LSPD Police Shield (ablegen)";
const KEY4 = "Auto Farming";
const KEY5 = "Dimension";
const KEY6 = "Tablet";
const KEY7 = "Staatliches Aktensystem";
const KEY8 = "Animationen";
const KEY9 = "Animation Stop";
const KEY10 = "Kleidungsrad";
const KEY11 = "Interagieren";
const KEY12 = "Inventar";
const KEY13 = "Zeigen";
const KEY14 = "Funk";
const KEY15 = "T&uuml;ren";
const KEY16 = "Sonstiges";
const KEY17 = "Siren Stummschalten";
const KEY18 = "Handy Hoch";
const KEY19 = "Handy Runter";
const KEYDONE = "Deine Eintr&auml;ge waren erfolgreich!";
const KEYNOTE = "Es m&uuml;ssen alle Keys eingetragen werden!";
const KEYERROR = "Das war nicht erfolgreich!";
const KEYDONEBTN = "Bearbeiten";
const KEY_HEADER = "Tastaturbelegung Manager";
const KEY_HEADER_2 = "Tastaturbelegung";

// ************************************************************************************//
// * English Language Section - Main Site Settings 
// ************************************************************************************//
const SITECONFIG_HEADER = "Seiteneinstellungen";
const SITECONFIG_HEADERNOTE = "Bitte beachten Sie, dass einige Einstellungen mit 0 oder 1 eingestellt werden müssen!";
const SITECONFIG_ONLINE = "Site Online Status";
const SITECONFIG_ONLINENOTE = "Unser UCP ist momentan nicht erreichbar!";
const SITECONFIG_NAME = "Site Name";
const SITECONFIG_DOWNLOAD_SECTION = "Download Section";
const SITECONFIG_RAGEMP = "Rage.MP";
const SITECONFIG_ALTV = "AltV";
const SITECONFIG_FIVEM = "FiveM";
const SITECONFIG_DONE = "<strong>Erfolgreich!</strong> Die Seiteneinstellungen wurden erfolgreich gespeichert!";
const SITECONFIG_ERROR = "<strong>Error!</strong> Die Seiteneinstellungen wurden nicht erfolgreich gespeichert!";
const SITECONFIG_TEAMSPEAK = "Teamspeak Adresse";
const SITECONFIG_REDM = "RedM";
const SITECONFIG_GSERVERNAME = "Game Server Name";
const SITECONFIG_GSERVERIP = "Game Server IP";
const SITECONFIG_GSERVERPORT = "Game Server Port";
const SITECONFIG_THEMES = "Design";
const SITECONFIG_THEMES_INFO = "W&auml;hlen Sie das Design, das Sie verwenden m&ouml;chten.";
const SITECONFIG_THEMES_BLACK = "dark";
const SITECONFIG_THEMES_BLUE = "light";
const SITECONFIG_ONLINE_INFO = "W&auml;hlen Sie den Online Status, den Sie verwenden m&ouml;chten.";
const SITECONFIG_ONLINE_ONLINE = "Online";
const SITECONFIG_ONLINE_OFFLINE = "Offline";
const SITECONFIG_CLIENT_INFO = "W&auml;hlen Sie den Status, den Sie verwenden m&ouml;chten.";
const SITECONFIG_CLIENT_YES = "Ja";
const SITECONFIG_CLIENT_NO = "Nein";
const SITECONFIG_UPGRADE_NOTE = "Upgrade Hinweis";
const SITECONFIG_UPGRADE_NOTE_INFO = "W&auml;hlen Sie die Upgrade Anzeige, den Sie verwenden m&ouml;chten.";

// ************************************************************************************//
// * German Language Section - Message System 
// ************************************************************************************//
const MSG_1 = "Sie sollten sich zuerst <a href='/usercp/login/index.php'>einloggen</a>!";
const MSG_2 = "Du bist kein Supporter!";
const MSG_3 = "<b>Du hast den Account erfolgreich bearbeitet!</b>";
const MSG_4 = "<b>Dein Ticket wurde gesendet!</b><br><br><a href='support.php'>Zurück</a>";
const MSG_5 = "<b>Dein Tweet wurde erfolgreich gesendet!</b><br><br><a href='dashboard.php'>Zur&uuml;ck zum Dashboard</a>";
const MSG_6 = "<b>Dein Like in den Tweet wurde erfolgreich gesetzt!</b><br><br><a href='dashboard.php'>Zur&uuml;ck zum Dashboard</a>";
const MSG_7 = "<b>Deine Änderungen konnten nicht gespeichert werden!</b>";
const MSG_8 = "<b>Du hast dein Account erfolgreich bearbeitet!</b>";
const MSG_9 = "<b>Deine Registrierung ist abgeschlossen!</b>";
const MSG_10 = "<b>Bitte f&uuml;llen Sie sowohl den Benutzernamen als auch das Passwortfeld aus!</b>";
const MSG_11 = "<b>Falsches Passwort!</b>";
const MSG_12 = "<b>Kein Benutzer gefunden!</b>";
const MSG_13 = "<b>Die E-Mail ist keine g&uuml;ltige!</b>";
const MSG_14 = "<b>Username nicht g&uuml;ltig</b>";
const MSG_15 = "<b>Das Passwort muss zwischen 5 und 20 Zeichen lang sein!</b>";
const MSG_16 = "<b>Account schon vorhanden</b>";
const MSG_17 = "<b>Dein Logout war erfolgreich!</b>";
const MSG_18 = "<b>Dein News Eintrag war nicht erfolgreich!</b>";
const MSG_19 = "<b>Bitte geben Sie sowohl den deutschen als auch den englischen Titel ein!</b>";
const MSG_20 = "<b>Bitte f&uuml;llen Sie sowohl den deutschen als auch den englischen Kontent aus!</b>";
const MSG_21 = "<b>Dein News Eintrag war erfolgreich!</b>";
const MSG_22 = "<b>Dein Regelwerk Eintrag war erfolgreich!</b>";
const MSG_23 = "<b>Dein Regelwerk Eintrag war nicht erfolgreich!</b>";
const MSG_24 = "<b>Dein FAQ Eintrag war erfolgreich!</b>";
const MSG_25 = "<b>Dein FAQ Eintrag war nicht erfolgreich!</b>";
const MSG_26 = "<b>Dein Rang ist f&uuml;r diese Seite nicht freigeschaltet!</b>";

// ************************************************************************************//
// * German Language Section - My Profile Change
// ************************************************************************************//
const WHITELIST = "F&uuml;r die Whitelist";
const TWITTER = "F&uuml;r das Twitter Modul";
const RPSERVER = "UCP sowie f&uuml;r den Game Server";
const MYPROFILENOTE = "Du musst bei jeder Änderung alle Felder ausf&uuml;hlen!";
const SIGNATUR = "Signatur";
const SIGNOTE = "Deine Signatur f&uuml;r deine Profil Ansicht!";
const AVATAR = "Avatar URL";
const AVANOTE = "Dein Avatar Bild f&uuml;r dein Profil!";
const MYPROFILESAVE = "Speichern";
const LANGUAGE = "Webseiten Sprache";
const LANGUAGENOTE = "Du hast hier die M&ouml;glichkeit die Sprache des UCP zu &auml;ndern.";
const CHANGE_MYPROFILE_DASHNOTE = "Bitte beachten";
const CHANGE_MYPROFILE_PASSWORD = "Passwort &auml;ndern";
const CHANGE_MYPROFILE_SIGNATUR = "Signatur &auml;ndern";
const CHANGE_MYPROFILE_USERNAME = "Benutzername &auml;ndern";
const CHANGE_MYPROFILE_EMAIL = "E-Mail Adresse &auml;ndern";
const CHANGE_MYPROFILE_AVATAR = "Avatar &auml;ndern";
const CHANGE_MYPROFILE_AVATARNOTE = "Legen Sie Dateien hier ab oder klicken Sie zum Hochladen.";
const CHANGE_MYPROFILE_LANGUAGE = "Webseiten Sprache &auml;ndern";
const CHANGE_MYPROFILE_LANGUAGENOTE = "Bitte ausw&auml;hlen";
const CHANGE_MYPROFILE_LANGUAGE_SELECT_EN = "Englisch";
const CHANGE_MYPROFILE_LANGUAGE_SELECT_DE = "Deutsch";

// ************************************************************************************//
// * German Language Section - My Profile
// ************************************************************************************//
const PLAYERID = "Spieler ID";
const PLAYERSOCIALCLUB = "Social Club";
const PLAYEREMAIL = "E-Mail";
const PLAYERBANNED = "Gebannt";
const PLAYERADMIN = "Admin Level";
const PLAYERWHITELISTED = "Whitelistet";
const PLAYERFIRSTLOGIN = "Erster Login";
const PLAYERNOTE1 = "Auf unseren Projekt wird jede Whitelist in unseren Teamspeak Server abgehalten.";
const PLAYERNOTE2 = "Unser Motto";
const PLAYERSIGNATURE = "Signatur";
const PLAYERABOUTME = "&uuml;BER MICH";
const AVATAR_CHECK_BACK = "Deine Avatar URL ist nicht erlaubt!";
const AVATAR_CHECK_OKAY = "Deine Avatar URL wurde erlaubt!!";

// ************************************************************************************//
// * German Language Section - Dashboard
// ************************************************************************************//
const DASHBOARDUSERS = "Registrierte Users";
const DASHBOARDSUPPORT = "Support Tickets";

// ************************************************************************************//
// * German Language Section - News System
// ************************************************************************************//
const NEWS_HEADER = "News System";
const NEWS_INFO = "Du musst alle Felder ausf&uuml;hlen!";
const NEWS_TITLE_EN = "Titel Englisch";
const NEWS_TITLE_EN_TEXT = "Der Englische Titel";
const NEWS_TITLE_DE = "Titel Deutsch";
const NEWS_TITLE_DE_TEXT = "Der Deutsche Titel";
const NEWS_CONTENT_EN = "Kontent Englisch";
const NEWS_CONTENT_EN_TEXT = "Der Englische Content";
const NEWS_CONTENT_DE = "Kontent Deutsch";
const NEWS_CONTENT_DE_TEXT = "Der Deutsche Kontent";
const NEWS_SAVE = "Speichern";

// ************************************************************************************//
// * German Language Section - Rules System
// ************************************************************************************//
const RULES_INFO = "Du musst alle Felder ausfühlen!";
const RULES_TITLE_EN = "Titel Englisch";
const RULES_TITLE_EN_TEXT = "Der Englische Titel";
const RULES_TITLE_DE = "Titel Deutsch";
const RULES_TITLE_DE_TEXT = "Der Deutsche Titel";
const RULES_CONTENT_EN = "Kontent Englisch";
const RULES_CONTENT_EN_TEXT = "Der Englische Kontent";
const RULES_CONTENT_DE = "Kontent Deutsch";
const RULES_CONTENT_DE_TEXT = "Der Deutsche Kontent";
const RULES_SAVE = "Speichern";

// ************************************************************************************//
// * German Language Section - Support
// ************************************************************************************//
const SUPPORTUSERID = "Spieler ID";
const SUPPORTINFO = "Dein Support Ticket sollte m&ouml;glichst genau beschrieben werden.";
const SUPPORTUSERINFO1 = "Gebe dein Username ein";
const SUPPORTUSERINFO2 = "Welchen Bug hast du gefunden?";
const SUPPORTUSERINFO3 = "Deine Beschreibung sollte m&ouml;glichst genau beschrieben sein.";
const SUPPORTUSERNAME = "Username";
const SUPPORTEMAIL = "E-Mail";
const SUPPORTSUBJECT = "Betreff";
const SUPPORTMSG = "Nachricht";
const SUPPORTDATE = "Datum";
const SUPPORTSAVE = "Speichern";
const SUPPORTDELETEINFO = "Du hast alle Support Tickets gel&ouml;scht";
const SUPPORTDELETE1 = "<b>Gehe nun zur&uuml;ck zu den <a href='support.php'>Support Tickets</a>!</b>";
const SUPPORTDELETE2 = "Tickets l&ouml;schen!";
const SUPPORTADDTICKET1 = "Erstelle nun dein Ticket!";
const SUPPORTADDTICKET2 = "Klick mich";
const SUPPORTADDDONE = "Dein Support Ticket wurde gesendet!";
const SUPPORT_HEADER_LIST = "Support Tickets";

// ************************************************************************************//
// * German Language Section - No Logged & Logged Section
// ************************************************************************************//
const REGISTER = "Registrieren";
const LOGIN = "Einloggen";
const LOGOUT = "Ausloggen";
const SOCIALCLUBNAME = "Social Club Name";
const USERNAME = "Benutzername";
const EMAIL = "E-Mail";
const PASSWORD = "Passwort";
const SUBMIT = "Senden";
const RULES = "Regeln";
const NOTE = "<b>Hinweis:</b> Felder mit <span class='pflichtfeld'>*</span> m&uuml;ssen ausgef&uuml;llt werden.";
const NOTE2 = "<b>Hinweis:</b> Der Username sowie der Social Club Name m&uuml;ssen gleich sein.";
const NOTE3 = "<b>Hinweis:</b> Sie haben kein Konto?";
const NOTE4 = "<b>Hinweis:</b> Sie haben ein Konto?";
const INFO1 = "Benutzername eingeben";
const INFO2 = "Passwort eingeben";
const INDEXTEXT = "Wir Bringen Das Roleplay Auf Ein Neues Level, Mit Unserer Realistischen Handhabung, Sind Uns Keine Grenzen Gesetzt!";
const PROFILE_SETTINGS = "Settings";
const PROFILE_ABOUT = "About";
const PROFILE_PORTFOLIO = "Portfolio";
const PROFILE_PORTFOLIO_WEBSITE = "Website";
const PROFILE_PORTFOLIO_DISCORDTAG = "Mein Discordtag";

// ************************************************************************************//
// * German Language Section - Staff Member 
// ************************************************************************************//
const STAFF_USERCAHNEGED = "Spieler bearbeiten";
const STAFF_USERCONTROL = "Spielerliste";
const STAFF_USERCONTROLUSERID = "Spieler ID";
const STAFF_USERCONTROLUSERNAME = "Spieler Username";
const STAFF_USERCONTROLSOCIALCLUB = "Spieler Social Club";
const STAFF_USERCONTROLEMAIL = "Spieler E-Mail";
const STAFF_USERCONTROLACCOUNTWHITELIST = "Spieler Whitelisted";
const STAFF_USERCONTROLOPTION = "Einstellung";
const STAFF_USERCONTROLSAVE = "Speichern";
const STAFF_USERCONTROLDELETE = "L&ouml;schen";
const STAFF_USERCONTROL_WL_STATUS = "W&auml;hlen Sie den Whitelist Status aus.";

// ************************************************************************************//
// * German Language Section - Server Status 
// ************************************************************************************//
const SERVER_STATUS = "Server Status";
const SERVER_STATUS_DESC = "Dedicated Server Status";
const SERVER_STATUS_FINAL_MEMORY = "Final Memory";
const SERVER_STATUS_PEAK = "Peak";
const SERVER_STATUS_CPU_USAGE = "CPU usage";
const SERVER_STATUS_ALL_USAGE_MEMORY = "All Used Memory";
const SERVER_STATUS_SMEMORY_USAGE = "Server Memory Usage";
const SERVER_STATUS_CPU_USAGE_INFO = "CPU-Last nicht absch�tzbar (evtl. zu altes Windows oder fehlende Rechte bei Linux oder Windows)";
const SERVER_STATUS_STORAGE_STAGE = "Speicherplatz";

// ************************************************************************************//
// * German Language Section - Whitelist System 
// ************************************************************************************//
const WHITELIST_HEADER = "Whitelist Fragen &Uuml;bersicht";

// ************************************************************************************//
// * German Language Section - BB-Code-Editor System
// ************************************************************************************//
const BBCODE_EDITOR = "Zitat";
const BBCODE_EDITOR_INFO = "1 schrieb:";
const BBCODE_EDITOR_REMOVE_FORMATTING = "Formatierung entfernen";
const BBCODE_EDITOR_FONTS = "Schriftart";
const BBCODE_EDITOR_SIZE = "Gr��e";
const BBCODE_EDITOR_BOLD = "Fett";
const BBCODE_EDITOR_ITALIC = "Italic";
const BBCODE_EDITOR_UNDERLINE = "Unterstrichen";
const BBCODE_EDITOR_BLETTERS = "Blockschrift";
const BBCODE_EDITOR_COLOR = "Textfarbe";
const BBCODE_EDITOR_CENTER = "Zentriert";
const BBCODE_EDITOR_URL = "URL Link";
const BBCODE_EDITOR_URL_REMOVE = "Links entfernen";
const BBCODE_EDITOR_IMAGE = "Bild";
const BBCODE_EDITOR_NUMBERLIST = "nummerierte Liste";
const BBCODE_EDITOR_NORMAL_NUMBERLIST = "normale Liste";
?>