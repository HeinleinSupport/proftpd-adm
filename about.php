<?php
require_once('include_general.php');
doHeader();
?>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['about']['about']; ?></td>
	</tr>
	<tr>
		<td>
			<table class="box" style="border-style: none;">
				<tr>
					<td   class="box-sel" align="justify">
						<?php echo $GLOBALS['language']['about']['introduction']; ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>
<br>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['about']['revisions']; ?></td>
	</tr>
	<tr>
		<td>
		<table class="box" style="border-style: none;">
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
			<!-- Version 1.2 Revision descriptions -->
			<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['about']['version']; ?> 1.2</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Dobák Péter has updated the hungarian translation.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Added a couple parameters used with the scripts called upon creation of users (if configured to do so) as well as there is now added support for running a script when a user is deleted.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">The ability to run a script upon creating users have been crippled due to a bug that was introduced with version 0.9 - this manifested itself in the way that the script were always handed the value 0 as the new users userid. This has now been fixed.</td></tr>
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>

			<!-- Version 1.1 Revision descriptions -->
			<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['about']['version']; ?> 1.1</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">While using proftpd 1.2.10 and a recent version of MySQL you may have noticed that newer installations of the software may constantly report that a wrong login password has been supplied - this is due to this version of proftpd hasn't been updated to reflect the changes made to MySQL's password format. An option for fixing this is that you now, in addition to upgrading proftpd to a more recent version, also have the option to enforce use of the old password system by activating it on the database configuration section (any passwords already set must be changed to be usable).</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Fixed a typo in the file "include_prepare.php" that on some configurations resulted in a white page with some PHP-code on it.</td></tr>
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>

			<!-- Version 1.0 Revision descriptions -->
			<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['about']['version']; ?> 1.0</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">By request I've made a subset of the page that users can log into and view their current account status including transfer logs and current quota. The scripts can be found in <i>misc/user_info</i>, and is configured using configuration-files in the same format as the main tool - as an effect of this you can make them share a configuration by making a symbolic link to the actual configuration although for security reasons I'd recommend using a copy of the file with a far more limited MySQL-user configured.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['documentation']; ?></td><td class="box-sel" align="justify">Updated the rather dated installation procedures and documentation from what was initially written for version 0.3, and now reflects the current version.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Darek Moszkowicz has added functionality for controlling PowerDNS from within proFTPd Administrator - this functionality can be activated via the extensions-section on the configuration-page.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">With assistance from Mike Davis you now have the ability to select quotas using a drop-down menu instead of manually entering values. If the default selection of values isn't to your liking they can be altered by editing "include_config.php". If you prefer this way over entering values yourself you can activate the functionality under <i>Interface</i> on the configuration-page.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Added a short description for most of the more common modules used with ProFTPd available via the status-page.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">You now have the ability to clean out the transfer logs stored in the database via the transfers-section. You have the choice between simply deleting the entries, or having them written to files in the logs directory of this tool.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Not a bugfix per-se. I've altered the code so that the configuration-section warns you if you've deactivated support for Quotas within ProFTPd Administrator, but there are still quotas set for some of the user-accounts.</td></tr>
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>

			<!-- Version 0.9 Revision descriptions -->
			<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['about']['version']; ?> 0.9</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Extra functionality like support for quotas and such will be possible to activate via the Configure tab for PHP5-users. This page will also take care of checking wether your configuration is able to support the functionality being activated as well as giving a few pointers to what should be done to enable the functionality in question.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Support for integrating this tool with virtual hosting in Apache via MySQL has been added by Darek Moszkowicz and can be activated via the extensions-section.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Support for mod_quotatab - this is at the moment a bit limited, but atleast you can assign quotas on a per-user basis. In order to use quotas you not only need to enable support for it in the configuration, but you also need to make sure that support is compiled into the server and that the relevant configuration options have been added in you "proftpd.conf"-file. Big thanks goes out to Darek Moszkowicz for providing me with the code needed to implement this often-requested functionality.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Added a new section to the main menu named "Manual" - this is the location where the manual will eventually be located at some point in time. At the moment you'll have access to the installation instructions and troubleshooting information, previously only provided as a standalone file, via this section.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">With assistance from Dobák Péter and his team over at <a href="http://www.veganetwork.tk/">VegaNetworkTeam</a> this tool has been translated to hungarian. The translation isn't complete at the moment, but covers most of the general interface.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['restructuring']; ?></td><td class="box-sel" align="justify">Altered sysinfo-mode so that a few of the irrelevant configuration sections are hidden while this mode is activated - if you activated this by accident you can deactivate it via configuration-section named "interface".</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['restructuring']; ?></td><td class="box-sel" align="justify">The sample configurations have been updated so that they no longer employ directives that have, since the start of developing this tool, been marked as deprecated - in other words directives marked for removal. If you're simply upgrading you should take a look at the sample configuration and update accordingly.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Fixed a bug where statistics generated would point to the page displaying user information even though the user had previously been deleted from the database. The way this tool is implemented, logs aren't cleaned out when a user is deleted.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Fixed a bug where some links on the group_view-page didn't work - this was due to some whitespace sneakings its way into a string comparison.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Inadvertenly used some code that was introduced with PHP5 in general code - the result of this was that users running PHP4 wasn't able to leave or add additional groups to a user. This has been fixed.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Error message due to a division by zero-error on the status page - this was caused by the script assuming the computer had any swap-memory. The error has been corrected.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Did some work on making the pages look better when viewed on a desktop system running Linux - appearantly rendering isn't all that uniform when it comes to comparing Firefox for Linux and Firefox for Windows. The result is a more usable system on Linux - I do however recommend installing "msttcorefonts", but it shouldn't really be an issue. Microsoft Internet Explorer and Opera still seem to have their own ideas about how things should be displayed - this leads to a few tiny glitches here and there (could make a styleset for these separately, but I don't tend to bend over for mediocre browsers - in short; use Mozilla Firefox instead).</td></tr>
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>

			<!-- Version 0.8 Revision descriptions -->
			<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['about']['version']; ?> 0.8</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['restructuring']; ?></td><td class="box-sel" align="justify">Renamed the old-style configuration file, it is now called "include_config_oldstyle.php", so that it looked a little less cluttered.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['restructuring']; ?></td><td class="box-sel" align="justify">Rewrote 100% of the database specific code, and moved out into a separate file to ease the work of implementing support for alternative databases such as PostgreSQL (this was requested, but due to my lack of experience with PostgreSQL I probably won't be doing this myself). If anyone would like to take a look at converting the code, all you would have to do is reimplement the code in the file called "class_database_mysql.php" - if you intend to do this you should turn on debugging i the class inherited from.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">When viewing details for a group, the members may now be clicked to access details for that specific user. The list of group memberships listed on the userlist also works this way now.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Because I had to rewrite all database specific code, I also had to take apart the status part for the database - in the end this resulted in an expanded amount of information displayed in that section.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Version 0.7 was supposed to work fine on PHP4 but I forgot that I included some code that needed PHP5 resulting in critical errors - this has for the most part been filtered out and moved into a separate file only to be included when parsed by PHP5.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Fixed the fact that the message stating that the user has been deleted after pressing delete was missing in the previous version.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">When viewing the configuration part of the system using PHP5 you will now get more than an anonymous PHP-error if the configuration file is not writeable.</td></tr>
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>

			<!-- Version 0.7 Revision descriptions -->
			<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['about']['version']; ?> 0.7</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Rewrote one heck of a lot of code in order to move all textual content into a single file for easy translation. This tool is now available in both English and Norwegian - you can select language under the section "Configure", and from there select the subsection called "Interface". Revision-descriptions in the "About"-section are not considered a part of the tool itself and will not be translated into any other language than English. At a later point in time I may move the content from the language files into XML-files instead - thus introducing the possibility for language packs.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Added a processlist on status page which should work for WinNT (not tested), Linux and FreeBSD (not tested). WinNT however will only display one process if the names are identical - this was a limitation I didn't predict when I made the util-pack (this'll get fixed when I get around to it).</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">PHP-version added to the status page.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Adjusted the menu code so that the about-page is also available in "System Information"-only mode.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Feature request: Added the ability to customize the expiration date for accounts upon creation (previously only had a drop-down box with predefined options).</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">The contents of the configuration-file has been moved to an XML-file instead. Ideally this should create a basis for which to create a system where the configuration can be altered without editing code. This is mainly untested and the underlying functionality, SimpleXML, is subject to change according to the PHP homepage - the extension used is also only available in PHP5 (if you're still using PHP4, the settings will be read from the file "include_old_config.php" instead).</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">System information on Linux: Added a mouseover for hard-drive mount points displaying physical device and filesystem.</td></tr>
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>

			<!-- Version 0.6.1 Revision descriptions -->
			<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['about']['version']; ?> 0.6.1</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">With the help of Jostein Martinsen some of my rather arcane code has been replaced with the newer equivalents. This should clear up some warnings showing up on some newer PHP installations.</td></tr>
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>

			<!-- Version 0.6 Revision descriptions -->
			<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['about']['version']; ?> 0.6</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Added an option in the config-file that will button down this interface - this will effectively leave only the status part.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Due to a user request I've added the ability to run a script every time a new user is created (an example script that you can play around with can be found in the "misc/create_user"-folder). Run the script through and the variables used should be fairly apparant if you've ever used bash before.</td></tr>
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>

			<!-- Version 0.5 Revision descriptions -->
			<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['about']['version']; ?> 0.5</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['restructuring']; ?></td><td class="box-sel" align="justify">Reprogrammed most of the functionality that gathers information about the system, so that this would not result in lots of errors when the pages are parsed on a non-Linux platform. ProFTPd only runs on *Nix systems, but there is no reason as to why the webinterface shouldn't function on other platforms since the MySQL-server can be located elsewhere.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Some basic status information for FreeBSD has been added to the status pages.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Some basic status information for Windows NT has been added to the status pages. I know it sounds strange to implement that kind of functionality, but I wanted to make something like phpSysInfo that works on Windows. Also see note above on "restructuring".</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">On the status page there was added another subsection called "kernel" - it was a function I was mainly using while developing Status-code for FreeBSD, but I might as well leave it as a feature. This section contains kernel parameters (output from sysctl) and a parsed presentation of the kernel's configuration-file (this is only available for Linux and FreeBSD).</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Added another style named "blueish_hue". It's an OK looking ... erm bluish theme.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['documentation']; ?></td><td class="box-sel" align="justify">Installation guide now includes a command-by-command description to installing both MySQL and ProFTPd on FreeBSD and Mandrake Linux.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['documentation']; ?></td><td class="box-sel" align="justify">Added a troubleshooting section that hopefully contains most of the problems you'll run into while installing proFTPd and proFTPd-admin.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">FTP-version should now display the correct version of the proFTPd server.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Made a complete rewrite of the code that displays FTP-connections on the main page - it should now work like it was supposed to. This is in reality the same bugfix mentioned in the 0.4 release, but I erm... forgot to include it.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Fixed memory information for Linux on resources part of status. Appearantly they changed the format of "/proc/meminfo" and thus broke my code when using Linux 2.6.x-kernel.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Some of the newer packaged version of coreutils changed the default behavior for the command "df" (posix-compliant output obviously not the default anymore) - and thus broke hard-drive section in resources. This has been fixed.</td></tr>
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>

			<!-- Version 0.4 Revision descriptions -->
			<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['about']['version']; ?> 0.4</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['restructuring']; ?></td><td class="box-sel" align="justify">Cleaned up some of the variable names concerning configuration file in order to avoid accidental mangling.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['restructuring']; ?></td><td class="box-sel" align="justify">Files meant as repositories for functions and misc. common code has been prepended the text "include_".</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Added the ability to choose which style you want the tool to use. Another style named "easy_gray" has been added, and made the default style for this release.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Added some fields for GECOS information that would normally have gone in "/etc/passwd" had we not been using SQL-authentication. Fields added are for realname, e-mail, adress and a field for notes.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">A copy of the GPL-license has been added to the release alongwith some other files to make it look more GPL-ish.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Stop filenames in logs from ruining the layout by stretching the tables.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Made a complete rewrite of the code that displays FTP-connections on the main page - it should now work like it was supposed to.</td></tr>
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>

			<!-- Version 0.3 Revision descriptions -->
			<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['about']['version']; ?> 0.3</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">About page was added.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Groups can now be deleted via interface.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Users can now be deleted via interface.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['documentation']; ?></td><td class="box-sel" align="justify">Howto: Installing MySQL</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['documentation']; ?></td><td class="box-sel" align="justify">Howto: Installing proFTPd</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['documentation']; ?></td><td class="box-sel" align="justify">Howto: Installing proFTPd Admin</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">CSS now validates as CSS version 2 without any errors or warnings.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Page now validates as valid Html 4.01 transitional - well 99% of it anyway (still some problems due to some of my forms wrapping around a table-element).</td></tr>
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>

			<!-- Version 0.2 Revision descriptions -->
			<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['about']['version']; ?> 0.2</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['restructuring']; ?></td><td class="box-sel" align="justify">Names and structure of the filenames has been revised and altered considerably. In addition more of the interface elements have been generalized and now exists as scripts in a single location instead of slightly differing versions in every file.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['restructuring']; ?></td><td class="box-sel" align="justify">The section previously named "Statistics" is now called "Transfers" because this name more suitably describes the functionality found in this section.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">"Transfers"-section now has a subsection called "Transfer Logs" that can be used to view the transfers logged. This was previously only available on a per-user basis.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">Groups was implemented. A group can be created and assigned a small description for your own preference. The users may belong to one primary group as well as several additional groups.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">User accounts can be set to expire at a certain date.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['newfeature']; ?></td><td class="box-sel" align="justify">User accounts can now be disabled.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Altering user-information now actually works.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">CSS has been cleaned up so that the page looks the way it was supposed to in Mozilla-based (Mozilla, Mozilla Firefox, Netscape Navigator) web-browsers. Opera is unfortunately still throwing fits - hate Opera anyway so don't expect me to do anything about it.</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['about']['bugfix']; ?></td><td class="box-sel" align="justify">Added DOCTYPE tag to pages as a first step in getting this page to verify as HTML 4.01 Transitional (Still a few bugs to work out).</td></tr>
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>

			<!-- Version 0.1 Revision descriptions -->
			<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['about']['version']; ?> 0.1</td></tr>
			<tr><td style="width: 90px;" class="box-sel-head" valign="top">&nbsp;</td><td class="box-sel" align="justify">Initial release</td></tr>
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
		</table>
		</td>
	</tr>
</table>

<?php
doFooter();
?>
