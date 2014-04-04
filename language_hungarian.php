<?php
$language['name']['administrator'] 		= 'proFTPd Adminisztráció';
$language['name']['sys_info_only'] 		= 'Rendszer információk';

/* General */
$language['general']['username'] 		= 'Felhasználónév';
$language['general']['groups'] 			= 'Csoportok';
$language['general']['users'] 			= 'Felhasználók';
$language['general']['primarygroup'] 	= 'Elsődleges csoport';
$language['general']['homedirectory'] 	= 'Home könyvtár';
$language['general']['enabled'] 		= 'Engedélyezve';
$language['general']['disabled'] 		= 'Letiltva';
$language['general']['expiration'] 		= 'Lejárat';
$language['general']['expiration_never']= 'Soha';
$language['general']['password'] 		= 'Jelszó';
$language['general']['shell'] 			= 'Shell';
$language['general']['description'] 	= 'Leírás';
$language['general']['delete'] 			= 'Törlés';
$language['general']['delete_confirm']	= 'Biztosan ezt akarja tenni ?';
$language['general']['edit'] 			= 'Szerkesztés';
$language['general']['numlogins'] 		= '# bejeletnekzés';
$language['general']['lastlogin'] 		= 'Utolsó bejelentkezés';
$language['general']['lastlogout'] 		= 'Utolsó kijelentkezés';
$language['general']['userid'] 			= 'Felhasználó ID';
$language['general']['select_subsection']= 'Válasszon alszekciót';
$language['general']['error_occured'] 	= 'Hiba';
$language['general']['error_type'] 		= 'Típus';
$language['general']['error_details'] 	= 'Részletek';
$language['general']['error_db_errors'] = 'Adatbázis hibák és debug üzenetek';
$language['general']['log_in'] 			= 'Bejelentkezés';


$language['general']['time_old'] 		= 'A távozási idő már be van állítva';
$language['general']['time_yesterday'] 	= 'Tegnap';
$language['general']['time_24h'] 		= '24 óra';
$language['general']['time_1week'] 		= 'Egy hét';
$language['general']['time_2week'] 		= 'Két hét';
$language['general']['time_1month'] 	= 'Egy hónap';
$language['general']['time_3month'] 	= 'Három hónap';
$language['general']['time_6month'] 	= 'Hat hónap';
$language['general']['time_1year'] 		= 'Egy év';
$language['general']['time_never'] 		= 'Soha';
$language['general']['time_now'] 		= 'Most';

$language['general']['name'] 			= 'Név';
$language['general']['email'] 			= 'E-mail';
$language['general']['adress'] 			= 'Cím';
$language['general']['notes'] 			= 'Megjegyzés';

$language['general']['yes'] 			= 'Igen';
$language['general']['no'] 				= 'Nem';

$language['general']['file_name'] 		= 'Fájlnév';
$language['general']['file_size'] 		= 'Méret';
$language['general']['file_created'] 	= 'Létrehozva';
$language['general']['file_modified'] 	= 'Módosítva';

/* Menuitems */
$language['menu']['mainpage'] 			= 'Főoldal';
$language['menu']['users'] 				= 'Felhasználók';
$language['menu']['groups'] 			= 'Csoportok';
$language['menu']['transfers'] 			= 'Átvitelek';
$language['menu']['status'] 			= 'Státusz';
$language['menu']['about'] 				= 'About';
$language['menu']['sysinfo'] 			= 'Rendszerinfó';
$language['menu']['configure'] 			= 'Konfiguráció';
$language['menu']['reset'] 				= 'Alapértelmezés';
$language['menu']['submit'] 			= 'Mehet';
$language['menu']['traffic'] 			= 'Forgalom';
$language['menu']['section'] 			= 'Szekció';
$language['menu']['transfer_log'] 		= 'Átviteli Log';
$language['menu']['statistics'] 		= 'Statisztika';
$language['menu']['toplists'] 			= 'Toplista';
$language['menu']['manual'] 			= 'Manual';
$language['menu']['cleanup'] 			= 'Tisztítás';
$language['menu']['log_files'] 			= 'Logolás fájlba';
$language['menu']['log_out'] 			= 'Kijelentkezés';
$language['menu']['user_details'] 		= 'Felhasználóinformációk';


/* Main Page */
$language['mainpage']['ftp'] 			= 'FTP';
$language['mainpage']['terminal'] 		= 'Terminál';
$language['mainpage']['pid'] 			= 'PID';
$language['mainpage']['uptime'] 		= 'Uptime';
$language['mainpage']['idle'] 			= 'Idle / %';
$language['mainpage']['command'] 		= 'Parancs';
$language['mainpage']['command_info']	= 'Parancsinformációk';
$language['mainpage']['device'] 		= 'Eszköz';
$language['mainpage']['time_login']		= 'Bejelentkezés ideje';

/* Users */
$language['users']['newuser'] 			= 'Felhasználó felvétele';
$language['users']['users'] 			= 'Felhasználók';
$language['users']['cmd_output'] 		= 'Parancs kimenete';
$language['users']['pers_info'] 		= 'Személyes adatok';
$language['users']['no_group'] 			= 'Unassigned';

/* Userview */
$language['userv']['user_error'] 		= 'Hiba';
$language['userv']['user_no_such_user'] = <<<EOD
	Megadott egy felhasználó ID -t, de ilyen felhasználó nem létezik - válassza ki a felhasználót
	a listából.
EOD;
$language['userv']['user_no_user_specified'] = <<<EOD
	Nem adott meg felhasználó ID -t - válasszon ki felhasználót a listából
	
EOD;
$language['userv']['agu_info'] 			= 'Általános felhasználó információk rendezése';
$language['userv']['deleteuser'] 		= 'Felhasználó törlése';
$language['userv']['userdeleted'] 		= 'A felhasználó törölve';
$language['userv']['assoc_ip'] 			= "IP címek";
$language['userv']['geninfo'] 			= 'Általános infó';
$language['userv']['set_password'] 		= 'Jelszó beállítása';
$language['userv']['set_expiration'] 	= 'Lejárat beállítása';
$language['userv']['expirationdate'] 	= 'Lejárati dátum beállítása';
$language['userv']['generated_traffic'] = 'Generált forgalom';
$language['userv']['down_sections'] 	= 'Szekciónkénti letöltések';
$language['userv']['up_sections'] 		= 'Szekciónkénti feltöltések';

$language['userv']['selectdate'] 		= 'Válasszon dátumot';
$language['userv']['customdate'] 		= 'Egyéni dátum';

$language['userv']['quota'] 			= 'Kvóta';
$language['userv']['quota_add'] 		= 'Kvóta felvétele';
$language['userv']['quota_remove'] 		= 'Eltávolítás';
$language['userv']['quota_noquota'] 	= 'Nincs kvóta beállítva ide: '
	. 'Kattintson ide: "' . $language['userv']['quota_add'] . '" kvóta felvételéhez. '
	. 'Take note that the quota set will be a blank one - what this '
	. 'means is that previous filetransfers won&acute;t be taken into account.';
$language['userv']['quota_used'] 		= 'Kvóta használat';

$language['userv']['vhuser']	 		= 'Virtuális hosztok';
$language['userv']['vhusertitle'] 		= 'Felhasználók virtuális hosztjai';
$language['userv']['vhuseraddnext'] 	= 'Új virtuális hoszt felvétele a felhasználóhoz';
$language['userv']['vhname']	 		= 'Új virtuális hosztnév';
$language['userv']['vhpath']	 		= 'Virtuális hoszt útvonala';

$language['userv']['alter_maingroup'] 	= 'Elsődleges csoport rendezése';
$language['userv']['alter_addgroup'] 	= 'További csoportok';
$language['userv']['memberof'] 			= 'Tagja a';
$language['userv']['joingroup'] 		= 'Csatlakozás csoporthoz';
$language['userv']['selectgroup'] 		= 'Csoport kiválasztása';
$language['userv']['memberships'] 		= 'Tagság';

$language['userv']['edit_user'] 		= 'Felhasználó szerkesztése';

$language['userv']['setpassword'] 		= 'Jelszó beállítása';
$language['userv']['newpassword'] 		= 'Új jelszó';
$language['userv']['newpasswordagain'] 	= 'Új jelszó (mégegyzser)';
$language['userv']['onchoosingpassword']= 'jó jelszó választás:';
$language['userv']['howto_password'] 	= <<<EOD
	A jelészónak 6 -8 karakternek kell lennie
	a következők alapján:
	<ul>
		<li>kisbetűk
		<li>nagybetűk
		<li>0 - 9 -ig számjegyek
		<li>Használjon központozást
	</ul>

	Compromises in  password  security  normally  result  from careless
	password selection or handling.  For this reason, you should not select
	a password which appears in  a  dictionary or  which  must  be  written
	down. The password should also not be a proper  name,  your  license
	number, birth  date,  or street address.  Any of these may be used as
	guesses to violate system security.
	<br><br>
	Your password must easily remembered so that you will  not be  forced  to
	write it on a piece of paper. Other methods of construction involve
	selecting an  easily remembered  phrase from literature and selecting the
	first or last letter from each word. An example of this is: "Ask not for
	whom the bell tolls", which produces "An4wtbt".
	<br><br>
	You may be reasonably sure few crackers will have included this  in  their
	dictionaries.  You should, however, select your own methods for
	constructing passwords and  not  rely exclusively on the methods given
	here.
	<br><br>
	(excerpt from the manual pages for passwd)
EOD;

$language['userv']['delete_user'] 		= 'Felhasználó törlése';
$language['userv']['delete_user_desc'] 	= <<<EOD
	Ön a felhasználó törlése mellett döntött.
	Biztosan törölni szeretné a felhasználót ?
	<br><br>
	Ha a felhasználó több csoport tagja, először meg kell szüntetnie a csoporttagságokat. Ezután meg fog jelenni a törlés gomb.
EOD;


/* Groups */
$language['groups']['delete_group'] 	= 'Csoport törlése';
$language['groups']['alter_group'] 		= 'Csoportadatok rendezése';
$language['groups']['alter'] 			= 'Rendezés';
$language['groups']['delete'] 			= 'Törlés';
$language['groups']['newgroup'] 		= 'Csoport felvétele';
$language['groups']['groups'] 			= 'Csoportok';
$language['groups']['groupname'] 		= 'Csoportnevek';
$language['groups']['addgroup'] 		= 'Csoport felvétele';
$language['groups']['groupid'] 			= 'Csoport ID';
$language['groups']['members'] 			= 'Tagok';
$language['groups']['desc_delete'] 		= <<<EOD
	Őn a csoport törlése mellett döntött.
	Biztosan törölni szeretné a csoportot ?
EOD;
$language['groups']['desc_delete_prim']	= <<<EOD
	<br><br>
	Néhány felhasználónak ez az elsődleges csoportja.
	Először rakja át azokat a felhasználókat másik csoportba akik ide tartoznak.
	<br><br>
EOD;

/* About */
$language['about']['about'] 			= 'About';
$language['about']['revisions'] 		= 'Revízió';
$language['about']['version'] 			= 'Verzió';

$language['about']['newfeature'] 		= 'Hozzáadott opció';
$language['about']['bugfix'] 			= 'Bugfix';
$language['about']['restructuring']		= 'Újraépítés';
$language['about']['documentation']		= 'Dokumentáció';

$language['about']['introduction'] 		= <<<EOD
	A while back ago working to set up an easily administered
	ftp I found the	shareware ftp-server Serv-U for Microsoft
	Windows(TM). All was great until the trial timed out
	effectively ending all the rejoycing (is this word spelled
	out	correctly anyway?) - the time had come to either pay
	up or get creative. There's no question what became of that
	question since my Slackware-server was up and ready to go.
	<br><br>
	After considering the alternatives for GNU/Linux when it
	comes to more professional ftp-servers I ended up choosing
	proFTPd. Unfortunately as I was quick to discover was that
	this server was a nightmare to compile (atleast if you needed
	additional modules compiled in), configure and administer.
	The two first can be solved with a proper-quality tutorial,
	and the implementation for the last part is what you're
	looking at right now.
EOD;

/* Manual */
$language['manual']['manual'] 			= 'Manual';
$language['manual']['introduction'] 	= <<<EOD
	In this section you will be able to access the manual and
	the various documents that are available to you at this
	moment. Take note that the documents available here is also
	available as standalone files that can be found in the
	location where you installed proFTPd Administrator. The content
	in these files are at the moment not applicable for translation
	due to their temporary nature during development.
EOD;

/* Transfers */
$language['transfers']['transfers'] 	= 'Átvitelek';
$language['transfers']['downloaders'] 	= 'letöltők';
$language['transfers']['uploaders'] 	= 'feltöltők';
$language['transfers']['down_sections'] = 'Letöltések szekciók szerint';
$language['transfers']['up_sections'] 	= 'Feltöltések szekciók szerint';
$language['transfers']['traffic_stats']	= 'Forgalom statisztikák';
$language['transfers']['transfer_log'] 	= 'Átviteli log';
$language['transfers']['on_file_title'] = 'Logolás fájlba';
$language['transfers']['delete_logs']	= 'Logok törlése';
$language['transfers']['write_logs']	= 'Logok kiírása';
$language['transfers']['write_to_file']	= 'Logok kiírása';
$language['transfers']['err_no_open']	= 'Nem sikerült megynyitni a könyvtárat, ';
$language['transfers']['num_deleted']	= 'törölve...';
$language['transfers']['delete_desc']	= <<<EOD
	Using this menu you'll have the ability to delete older logs so that
	they don't clog up your database - this can be convenient if you want
	to stay in control, but don't want to maintain long term logs. If you
	want to keep your logs, but move them to a file instead then you're in
	the wrong place and should select the option named "Write out logs". You
	should notice however that the sections named "Statistics", "Top Lists"
	and "Section" base their displayed results on the data in this data -
	for that reason I'd keep a representative amount of data in the database
	for example by regularly removing items older that six months.
EOD;
$language['transfers']['write_desc']	= <<<EOD
	Using this menu you'll have the ability to move older logs to individual
	files so that they don't clog up your database - this can be convenient
	if you want to stay in control, but don't want to maintain long term logs.
	The log files can be viewed via the section named "Logs on file". You
	should notice however that the sections named "Statistics", "Top Lists"
	and "Section" base their displayed results on the data in this data -
	for that reason I'd keep a representative amount of data in the database
	for example by regularly removing items older that six months.
EOD;
$language['transfers']['log_snippet_notice'] = <<<EOD
------------------------------------------------------------------------------------------------------

	In order to keep the size of the transferred data down to a minimum, only the
	200 latest entries are shown below. In order to view the whole log, press the
	button named "Full log" below.

------------------------------------------------------------------------------------------------------


EOD;

$language['transfers']['del_older_than']= 'Ennél régebbiek törlése:';
$language['transfers']['wrt_older_than']= 'Ennél régebbiek kiírása:';
$language['transfers']['full_log_bt']	= 'Teljes log';
$language['transfers']['delete_logs_bt']= 'Logok törlése';
$language['transfers']['write_logs_bt'] = 'Logok írása';


/* Util */
$language['util']['top'] 				= 'Top';
$language['util']['downloaded'] 		= 'Letöltött';
$language['util']['numfiles'] 			= '# fájl';
$language['util']['uploaded'] 			= 'Feltöltött';
$language['util']['total_amount'] 		= 'Összesen';
$language['util']['mostactive'] 		= 'Legaktívabb';

$language['util']['time_1hour'] 		= 'Utolsó óra';
$language['util']['time_24hour'] 		= 'Utolsó 24 óra';
$language['util']['time_7days'] 		= 'Utolsó 7 nap';
$language['util']['time_30days'] 		= 'Utolsó 30 nap';
$language['util']['time_total'] 		= 'Összesen';

$language['util']['transfer_log'] 		= 'Átviteli log';
$language['util']['user'] 				= 'Felhasználó';
$language['util']['timestamp'] 			= 'Időpont';
$language['util']['filename'] 			= 'Fájlnév';
$language['util']['size'] 				= 'Méret';
$language['util']['command'] 			= 'Parancs';
$language['util']['duration'] 			= 'Idő';

/* Status */
$language['status']['nosupport']		= 'Státusz hiba';
$language['status']['nosupport_desc'] 	= <<<EOD
	YOlyan operációsrendszert használ ami nincs teljesen támogatva.
	A csomag ezen része elég rendszerfüggő. Rövidesen támogatottá válik a rendszere.
EOD;
$language['status']['status'] 			= 'Státusz';
$language['status']['system'] 			= 'Rendszer';
$language['status']['version'] 			= 'Verzió';
$language['status']['name'] 			= 'Név';
$language['status']['value'] 			= 'Érték';
$language['status']['program'] 			= 'Program';

$language['status']['ip'] 				= 'Figyelt IP';
$language['status']['http'] 			= 'HTTP szerver';
$language['status']['kernel_version'] 	= 'Kernel verzió';
$language['status']['db_server'] 		= 'MySQL szerver';
$language['status']['uptime'] 			= 'Uptime';
$language['status']['php_version'] 		= 'PHP verzió';
$language['status']['idle_time'] 		= 'Üresjárati idő';
$language['status']['zend_version'] 	= 'Zend PHP Engine';
$language['status']['term_users'] 		= 'Terminál felhasználók';
$language['status']['ftp_users'] 		= 'Ftp felhasználók';
$language['status']['proftpd_version'] 	= 'proFTPd';
$language['status']['load'] 			= 'Load';
$language['status']['web_interface'] 	= 'Web-interface';

$language['status']['menu_processlist'] = 'Folyamatlista';
$language['status']['menu_resources'] 	= 'Források';
$language['status']['menu_hardware'] 	= 'Hardware';
$language['status']['menu_kernel'] 		= 'Kernel';
$language['status']['menu_database'] 	= 'Adatbázis';
$language['status']['menu_proftpd'] 	= 'ProFTPd';

$language['status']['server_down'] 		= 'Szerver leállítása';
$language['status']['secured_apache'] 	= 'A biztonságos szerverek csak a nevüket írják ki, Apache.';
$language['status']['uptime_linux'] 	= 'A rendszer terhelése az utolsó 1, 5, 15 percben.';

$language['status']['ps_processlist'] 	= 'Folyamatlista';
$language['status']['ps_name'] 			= 'Név';
$language['status']['ps_pid'] 			= 'PID';
$language['status']['ps_uid'] 			= 'UID';
$language['status']['ps_defunctprocess']= 'A szülő folyamat nem létezik. Linux rendszeren ez egy szoftverhibát jelent.';

$language['status']['pro_proftpd'] 		= 'ProFTPd';
$language['status']['pro_compiled_in'] 	= 'Beépített modulok';
$language['status']['pro_module_field'] = 'Modul';
$language['status']['pro_module_desc'] 	= 'Leírás';

$language['status']['krnl_kernel'] 		= 'Kernel információk';
$language['status']['krnl_kernelconf'] 	= 'Kernel konfiguráció';
$language['status']['krnl_kernelparams']= 'Kernel paraméterek';
$language['status']['krnl_compiledin']	= 'Beépített opciók';
$language['status']['krnl_modularized']	= 'Modularizált';
$language['status']['krnl_conf_file'] 	= 'Kernel konfigurációs fájl';

$language['status']['hw_hardware'] 		= 'Hardware információk';
$language['status']['hw_processor'] 	= 'Processzor';
$language['status']['hw_pci'] 			= 'PCI-eszközök';
$language['status']['hw_pciadress'] 	= 'Cím';
$language['status']['hw_pcivalue'] 		= 'Leírás';
$language['status']['hw_ide'] 			= 'IDE-eszközök';
$language['status']['hw_idedevice'] 	= 'Eszköz';
$language['status']['hw_idefield'] 		= 'Mező';
$language['status']['hw_idevalues'] 	= 'Érték';

$language['status']['db_database'] 		= 'Adatbázis statisztikák';
$language['status']['db_tablename']		= 'Név';
$language['status']['db_rows'] 			= 'Sorok';
$language['status']['db_rowformat'] 	= 'Sor formátuma';
$language['status']['db_tablesize'] 	= 'Méret';
$language['status']['db_created'] 		= 'Létrehozási idő';
$language['status']['db_updated'] 		= 'Utolsó frissítés';
$language['status']['db_checktime'] 	= 'Ellenőrzési idő';
$language['status']['db_var_name']		= 'Változó neve';
$language['status']['db_var_value']		= 'Érték';
$language['status']['db_sec_tablestats']= 'Tábla statisztikák';
$language['status']['db_sec_status']	= 'Adatbázis státusz';
$language['status']['db_sec_processes']	= 'Folyamatlista';
$language['status']['db_process_user']	= 'Felhasználó';
$language['status']['db_process_db']	= 'Adatbázis';
$language['status']['db_process_cmd']	= 'Parancs';
$language['status']['db_process_time']	= 'Idő';
$language['status']['db_process_state']	= 'Állapot';
$language['status']['db_process_info']	= 'Információk';


$language['status']['res_totalt']		= 'Teljes kapacitás';
$language['status']['res_resources']	= 'Források';
$language['status']['res_storage']		= 'Tárolók';
$language['status']['res_mountpoint']	= 'Mountolási pont';
$language['status']['res_perc_capacity']= 'Százalékos kapacitás';
$language['status']['res_free']			= 'Szabad';
$language['status']['res_used']			= 'Használt';
$language['status']['res_size']			= 'Méret';
$language['status']['res_phys_device']	= 'Fizikai eszköz';
$language['status']['res_withfs']		= 'fájlrendszerrel';

$language['status']['res_memory']		= 'Memória';
$language['status']['res_memcategory']	= 'Típus';
$language['status']['res_memphysical']	= 'Fizikai memória';
$language['status']['res_memvirtual']	= 'Virtuális memória';

$language['status']['res_network']		= 'Hálózat';
$language['status']['res_devname']		= 'Eszköz neve';
$language['status']['res_netrecv']		= 'Fogadott';
$language['status']['res_netsend']		= 'Küldött';
$language['status']['res_neterror']		= 'Hibás/dobott';

$language['status']['res_netnic']		= 'Hálózati kártya';
$language['status']['res_netlocnic']	= 'localhost (loopback eszköz)';
$language['status']['res_netppp']		= 'P2P eszköz';
$language['status']['res_netsit']		= 'Általános hálózati eszköz (ipv6 - ipv4)';

/* Configure */
$language['configure']['configure']		= 'Konfiguráció';
$language['configure']['menu_database']	= 'Adatbázis';
$language['configure']['menu_proftpd']	= 'ProFTPd';
$language['configure']['menu_interface']= 'Interface';
$language['configure']['menu_mpoint']	= 'Mountolási pontok';
$language['configure']['menu_sections']	= 'Szekciók';
$language['configure']['menu_filepaths']= 'Fájlelérési utak';
$language['configure']['menu_quota']	= 'Kvóta';
$language['configure']['menu_pdns']	= 'PowerDNS';
$language['configure']['menu_extension']= 'Kiterjesztések';

$language['configure']['db_type']		= 'Adatbázis szerver';
$language['configure']['db_suptype']	= 'Altípus';
$language['configure']['db_st_notused']	= '&lt; nincs használatban &gt;';
$language['configure']['db_st_standard']= 'Általános';
$language['configure']['db_st_old_pass']= 'Régi adatbázisjelszó...';
$language['configure']['db_database']	= 'Adatbázis';
$language['configure']['db_hostname']	= 'Hosztnév';
$language['configure']['db_database']	= 'Adatbázis';
$language['configure']['db_connectfail']= <<<EOD
	Nem sikerült csatlakozni az adatbázisszerverhez a megadott adatokkal.
	Ellenőrizze a felhasználónevet és a jelszót.
	Az alapértelmezett MySQL-telepítést root felhasználóval és üres jelszóval érheti el. 
EOD;
$language['configure']['db_dbfail']= <<<EOD
	Sikerült csatlakozni az adatbázisszerverhez de az adatbázis nem elérhető.
	Az alapértelmezett adatbázis: "<a href="javascript:void();" onclick="document.config_database.frm_database_database.value = 'proftpd_admin';">proftpd_admin</a>".
	További információt a szervertől kapott hibaüzenetben olvashat.
EOD;

$language['configure']['pdns_pdns']		= 'PowerDNS';
$language['configure']['pdns_domain_list']	= 'Válasszon domain nevet a listából';

$language['configure']['ftp_ftp']		= 'ProFTPd';
$language['configure']['ftp_ftproot']	= 'FTP root';
$language['configure']['ftp_defhome']	= 'Alapértelmezett home könyvtár';
$language['configure']['ftp_createcmd']	= 'Flehasználóparancs létrehozása';
$language['configure']['ftp_defshell']	= 'Alapértelmezett shell';

$language['configure']['ext_ext']		= 'Kiterjesztések';
$language['configure']['ext_no_db']		= <<<EOD
	A legtöbb kiterjesztésnek szüksége van működő adatbáziselérésre a működéshez.
	Ha már beállította az adatbáziskapcsolatot kattintson <a href="configure.php?section=database">IDE</a> a "proFTPd Administrator" konfigurációjához.
EOD;
$language['configure']['ext_vhost']		= 'Apache Virtuális Hosztok';
$language['configure']['ext_vhost_pdns_record']	= 'PowerDNS bejegyzés létrehozása virtuális hosztokhoz';
$language['configure']['ext_vhost_no_table_activated']= <<<EOD
	Ön bekapcsolta az Apache Virtuális hoszt konfigurációs modult, de még nem hozta létre a megfelelő táblákat az adatbázisban.
	Importálja a "vhtable.sql" fájlt az adatbázisba.
	Ha nincs szüksége a modulra késöbb kikapcsolhatja.
EOD;
$language['configure']['ext_vhost_no_table']= <<<EOD
	A Virtuális hoszt konfigurációs modulnak szüksége van néhány táblára az adatbázisban, de ezeket még nem hozta létre.
	Importálja a "vhtable.sql" fájlt az adatbázisba.
	Ha nincs szüksége a modulra késöbb kikapcsolhatja.
EOD;
$language['configure']['ext_quota']			= 'Quota';
$language['configure']['ext_quota_no_table_activated']= <<<EOD
	Ön bekapcsolta a "mod_quotatab" modult, a kvóták támogatásához.
	A modulnak szüksége van egy új táblára az adatbázisban, amit még nem hozott létre. Importálja a "upgrade_to_v0.9.sql" fájlt az adatbázisba.
	A modul csak akkor működik a ProFTPd szerver is támogatja ezt a funkciót.
EOD;
$language['configure']['ext_quota_no_table']= <<<EOD
	A "mod_quotatab" modulnak szüksége van néhány táblára az adatbázisban, de ezeket még nem hozta létre.
	Importálja a "upgrade_to_v0.9.sql" fájlt az adatbázisba.
	A modul csak akkor működik a ProFTPd szerver is támogatja ezt a funkciót.
EOD;
$language['configure']['ext_quota_no_mods']	= <<<EOD
	A "mod_quotatab" modul csak akkor működik helyesen ha a ProFTPd szerver is támogatja ezt a funkciót - szükség van még a "mod_sql" modulra és a "mod_quotatab",
	"mod_quotatab_sql" modulra. Ez az üzenet jelenik meg akkor is ha rosszul állította be a proftpd futtatható állomány helyét:
	<a href="configure.php?section=paths">"Fájlelérési utak"</a>.
EOD;
$language['configure']['ext_quota_no_activated'] = <<<EOD
	A kvóták támogatása ki lett kapcsolva, de vannak kvóták amik még aktívak néhány felhasználónál.
	A kvóták teljes kikapcsolásához vissza kell kapcsolnia a kvótatámogatást és
	el kell távolítani a beállított aktív értékeket.
	Ezután kapcsolja ki a modult.
EOD;
$language['configure']['ext_pdns']			= 'PowerDNS';
$language['configure']['pdns_delete']			= 'Domain törlése';
$language['configure']['pdns_delete_desc']= <<<EOD
	Ön úgy döntött, hogy törli a teljes domaint az összes bejegyzésével.
	Ha törli a domaint a PowerDNS rendszer nem fogja tovább kezelni és teljesen törli.
	<br><br>
	Ha tényleg ezt szeretné kattintson a folytatásra.
EOD;
$language['configure']['ext_pdns_no_table_activated']= <<<EOD
	Ön bekapcsolta a "Power DNS" támogatást, de még nem vette fel a megfelelő táblákat az adatbázisba.
	Importálja a "powerdns.sql" fájlt az adatbázisba.
	A Power DNS támogatáshoz megfelelően beállított szerver alkalmazás kell.
EOD;
$language['configure']['ext_pdns_no_table']= <<<EOD
	A Power DNS támogatás helyes működéséhez szükség van néhány új tábla felvételére az adatbázisba.
	Importálja a "powerdns.sql" fájlt az adatbázisba.
	A Power DNS támogatáshoz megfelelően beállított szerver alkalmazás kell.
EOD;
$language['configure']['pdns_no_domain_records']= <<<EOD
	Nem található rekord. Használja a formot új rekord létrehozásához.
EOD;
$language['configure']['pdns_new_domain_records']= <<<EOD
	A domain felvéve. Használja a formot új rekordok felvételéhez.
EOD;
$language['configure']['pdns_domain_exists_true']= <<<EOD
	Az új rekordok fel lettek véve a PowerDNS adatbázisába a domainhez.<br>
	A domaint a PowerDNS rendszer támogatja.<br><br>
EOD;
$language['configure']['pdns_domain_exists_false']= <<<EOD
	Nincs rekord felvéve a Power DNS adatbázisába.<br>Nincs Power DNS támogatás a rendszerben.<br><br>
EOD;

$language['configure']['quota_activate']	= 'Kvóták támogatásának bekapcsolása';
$language['configure']['quota_whattype']	= 'Alapértelmezett kvóta typus';
$language['configure']['quota_whatlimit']	= 'Alapértelmezett limit';
$language['configure']['quota_whatsession']	= 'Kvóta folyamatonként';
$language['configure']['quota_details']		= 'Általános kvóta részletei';
$language['configure']['quota_down_mb']		= 'Letöltött MB';
$language['configure']['quota_up_mb']		= 'Feltöltött MB';
$language['configure']['quota_trans_mb']	= 'Átvitt MB';
$language['configure']['quota_down_files']	= 'Letöltött fájlok';
$language['configure']['quota_up_files']	= 'Feltöltött fájlok';
$language['configure']['quota_trans_files']	= 'Átvitt fájlok';
$language['configure']['quota_no_limit']	= 'Nincs kvóta';

$language['configure']['ui_ui']			= 'Interface';
$language['configure']['ui_numnames']	= 'Nevek a toplistában';
$language['configure']['ui_numlogitems']= 'Logitems shown';
$language['configure']['ui_padtoplist']	= 'Toplist padding';
$language['configure']['ui_striplogs']	= 'Strip logpaths';
$language['configure']['ui_sysonly']	= 'Csak rendzserinfo';
$language['configure']['ui_style']		= 'Kiválasztott stílus';
$language['configure']['ui_language']	= 'Nyelv';
$language['configure']['ui_sel_quota']	= 'Drop-down quotas';

$language['configure']['mp_mp']			= 'Mountpontok';
$language['configure']['mp_skipped_mp']	= 'Kihagyott mountpontok';
$language['configure']['mp_hide_mp']	= 'Elrejteni kívánt mountpontok';
$language['configure']['mp_select_mp']	= 'Válasszon mountpontot';

$language['configure']['sec_downloads']	= 'Szekció: Letöltés';
$language['configure']['sec_uploads']	= 'Szekció: Feltöltés';
$language['configure']['sec_adddownload']= 'Letöltési szekció hozzáadása az átviteli oldalhoz';
$language['configure']['sec_addupload']	= 'Feltöltési szekció hozzáadása az átviteli oldalhoz';
$language['configure']['sec_relpath']	= 'Relativ elérési út a szekciókhoz';
$language['configure']['sec_down_topic']= '<acronym title="FTP root, to be concatenated with the relative section paths to form complete paths.">Basepath:</acronym><br>Download sections:';
$language['configure']['sec_up_topic']	= '<acronym title="FTP root, to be concatenated with the relative section paths to form complete paths.">Basepath:</acronym><br>Upload sections:';

$language['configure']['fp_fp']			= 'Fájlelérések';
$language['configure']['fp_generic_cmd']= 'Általános parancsok elérése';
$language['configure']['fp_cmdspecific']= '-speciális';
$language['configure']['fp_conf_file']	= 'Kernel konfigurációs fájl';

$language['configure']['pdns_domain_details']			= 'Domain részletei:';
$language['configure']['pdns_domain_edit']				= 'Domain szerkesztése:';
$language['configure']['pdns_add_new_domain']			= 'Új domain létrehozása';
$language['configure']['pdns_add_new_domain_name']		= 'Adja meg az új domain nevet';
$language['configure']['pdns_add_new_domain_type']		= 'Domain típus kiválasztása';
$language['configure']['pdns_add_new_domain_masters_ip']= 'Adja meg a Master IP címét';
$language['configure']['new_domain_record']				= 'Új rekord felvétele a domainhez';
$language['configure']['edit_domain_record']			= 'Meglévő rekord szerkesztése';

$language['configure']['fp_who_rel']= <<<EOD
	A megadott útvonal relatív elérési út, vagy üres.
	Ez nem probléma csak adja meg a teljes elérési utat. Az alapértelmezett érték:
	("<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_who.value = '/opt/lampp/bin/who';">/opt/lampp/bin/who</a>")
EOD;
$language['configure']['fp_who_no']= <<<EOD
	A megadott fájl nem létezik.
	Adja meg a teljes elérési utat. Az alapértelmezett érték:
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_who.value = '/opt/lampp/bin/who';">/opt/lampp/bin/who</a>".
EOD;

$language['configure']['fp_df_rel']= <<<EOD
	A megadott útvonal relatív elérési út, vagy üres.
	Ez nem probléma csak adja meg a teljes elérési utat. Az alapértelmezett érték: ("
	<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_df.value = '/usr/bin/df';">/usr/bin/df</a>")
EOD;
$language['configure']['fp_df_no']= <<<EOD
	A megadott fájl nem létezik.
	Adja meg a teljes elérési utat. Az alapértelmezett érték: "
	<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_df.value = '/usr/bin/df';">/usr/bin/df</a>".
EOD;

$language['configure']['fp_ps_rel']= <<<EOD
	A megadott útvonal relatív elérési út, vagy üres.
	Ez nem probléma csak adja meg a teljes elérési utat. Az alapértelmezett érték: (
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_ps.value = '/bin/ps';">/bin/ps</a>")
EOD;
$language['configure']['fp_ps_no']= <<<EOD
	A megadott fájl nem létezik.
	Adja meg a teljes elérési utat. Az alapértelmezett érték:
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_ps.value = '/bin/ps';">/bin/ps</a>".
EOD;

$language['configure']['fp_sysctl_rel']= <<<EOD
	A megadott útvonal relatív elérési út, vagy üres.
	Ez nem probléma csak adja meg a teljes elérési utat. Az alapértelmezett érték:
	("<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_sysctl.value = '/sbin/sysctl';">/sbin/sysctl</a>")
EOD;
$language['configure']['fp_sysctl_no']= <<<EOD
	A megadott fájl nem létezik.
	Adja meg a teljes elérési utat. Az alapértelmezett érték:
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_sysctl.value = '/sbin/sysctl';">/sbin/sysctl</a>".
EOD;

$language['configure']['fp_ftpwho_rel']= <<<EOD
	A megadott útvonal relatív elérési út, vagy üres.
	Ez nem probléma csak adja meg a teljes elérési utat. Az alapértelmezett érték:
	("<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_ftpwho.value = '/opt/lampp/bin/ftpwho';">/opt/lampp/bin/ftpwho</a>")
EOD;
$language['configure']['fp_ftpwho_no']= <<<EOD
	A megadott fájl nem létezik.
	Adja meg a teljes elérési utat. Az alapértelmezett érték:
	("<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_ftpwho.value = '/opt/lampp/bin/ftpwho';">/opt/lampp/bin/ftpwho</a>")
EOD;

$language['configure']['fp_proftpd_rel']= <<<EOD
	A megadott útvonal relatív elérési út, vagy üres. Ha manuálissan fordította a programot a fájl a következő helyen lehet:
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_proftpd.value = '/opt/lampp/sbin/proftpd';">/opt/lampp/sbin/proftpd</a>".
EOD;
$language['configure']['fp_proftpd_no']= <<<EOD
	A megadott fájl nem létezik. Adja meg a teljes elérési utat a fájlhoz. Ha manuálissan fordította a programot a fájl a következő helyen lehet: "<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_proftpd.value = '/opt/lampp/sbin/proftpd';">/opt/lampp/sbin/proftpd</a>".
EOD;

$language['configure']['fp_nokernel']= <<<EOD
	A megadott fájl nem létezik. Adja meg a kernel konfigurációs fájl teljes elérési útját. Minden Linux disztribúcióban máshol lehet ez a fájl, próbálja a következő értékeket:
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_kernel.value = '/boot/config';">/boot/config</a>"
	vagy "<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_kernel.value = '/usr/src/linux/.config';">/usr/src/linux/.config</a>".
	BSD rendszereken a fájl helye:
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_kernel.value = '/usr/src/sys/i386/conf/GENERIC';">/usr/src/sys/i386/conf/GENERIC</a>".
EOD;

$language['configure']['no_write_config']= <<<EOD
	A konfigurációs fájl "configuration.xml", nem írható ezért nem tudja menteni a beállításokat. Állítsa be a fájl jogosultságait. Az alszekciók rejtve maradnak amíg meg nem oldja a problémát.
EOD;

/* ProFTPd Modules, and their descriptions. */
$language['status']['ftp_module']['mod_core.c']			= 'Core modul.';
$language['status']['ftp_module']['mod_xfer.c']			= 'Átviteli modul.';
$language['status']['ftp_module']['mod_auth_unix.c']	= 'Azonosítás engedélyezése UNIX szerűen.';
$language['status']['ftp_module']['mod_auth_file.c']	= 'Fájlalapú azonosítás.';
$language['status']['ftp_module']['mod_auth_pam.c']		= 'PAM alapú azonosítás.';
$language['status']['ftp_module']['mod_auth.c']			= 'Azonosítási modul';
$language['status']['ftp_module']['mod_rewrite.c']		= 'Felülírás támogatása';
$language['status']['ftp_module']['mod_ls.c']			= 'Fájllistázási funkció.';
$language['status']['ftp_module']['mod_log.c']			= 'Logolási funkció.';
$language['status']['ftp_module']['mod_site.c']			= 'SITE parancsok támogatása.';
$language['status']['ftp_module']['mod_sql_mysql.c']	= 'MySQL támogatás.';
$language['status']['ftp_module']['mod_cap.c']			= 'Capabilities module.';
$language['status']['ftp_module']['mod_ldap.c']			= 'LDAP támogatás.';
$language['status']['ftp_module']['mod_ratio.c']		= 'Fájl/Byte arány.';
$language['status']['ftp_module']['mod_quotatab_sql.c']	= <<<EOD
	Ez a modul teszi lehetővé SQL adabázis használatát a kvóta táblákhoz.
EOD;
$language['status']['ftp_module']['mod_readme.c']		= <<<EOD
	"README" fájl támogatás (egy felhasználó értesítése fájlmódosításkor).
EOD;
$language['status']['ftp_module']['mod_sql.c']			= <<<EOD
	A mod_sql modul egy authentikációs funkció a ProFTPD szerverhez.
EOD;
$language['status']['ftp_module']['mod_radius.c']		= <<<EOD
	Ezzel a modullal a RADIUS protokollal jelentkezhetnek be a felhasználók.
	(Lehet logolásra is használni).
EOD;
$language['status']['ftp_module']['mod_wrap.c']			= <<<EOD
	libwrap interface amely lehetővé teszi a démonnak a tcpwrappers
	használatát.
EOD;
$language['status']['ftp_module']['mod_site_misc.c']	= <<<EOD
	A mod_site_misc modul néhány SITE parancsot implementál, például:

	<ul>
	    <li>SITE MKDIR</li>
	    <li>SITE RMDIR</li>
	    <li>SITE SYMLINK</li>
    	<li>SITE UTIME</li>
    </ul>
EOD;
$language['status']['ftp_module']['mod_tls.c']			= <<<EOD
	A TLS használatát teszi lehetővé.
EOD;
$language['status']['ftp_module']['mod_quotatab_ldap.c']= <<<EOD
	This submodule provides the LDAP-specific "driver" for retrieving quota
	limit table information from an LDAP server. LDAP-based quota tables
	(source-type of "ldap") can only be used for limit tables, not for tally
	tables. The frequent updates needed for maintaining tally tables mean
	that LDAP is not well-suited to handle tally table storage.
EOD;
$language['status']['ftp_module']['mod_quotatab_file.c']= <<<EOD
	This submodule provides the file-specific "driver" for storing quota table
	information in files. Using file-based quota tables (source-type of "file")
	the data will be stored in binary fixed-record format. This module is
	accompanied by a tool, ftpquota, to help in creating and managing these
	file-based tables.
EOD;
$language['status']['ftp_module']['mod_quotatab.c']		= <<<EOD
	This module is designed to impose quotas, both byte- and file-based, on
	FTP accounts, based on user, group, class, or for all accounts. It is
	based on the ideas contained in Eric Estabrook's mod_quota; however, this
	module has been written from scratch to implement quotas in a very
	different manner.
EOD;
$language['status']['ftp_module']['mod_ifsession.c']	= <<<EOD
	The purpose of mod_ifsession is to provide a flexible way of specifying
	that certain configuration directives only apply to certain sessions,
	based on credentials such as connection class, user, or group membership.
EOD;
$language['status']['ftp_module']['mod_ctrls_admin.c']	= <<<EOD
	This module implements administrative control actions for the ftpdctl
	program.
EOD;
$language['status']['ftp_module']['mod_delay.c']		= <<<EOD
	The mod_delay module is designed to make a certain type of information
	leak, known as a "timing attack", harder.
EOD;

/*
$language['status']['ftp_module']['']					= '';
$language['status']['ftp_module']['']					= '';
$language['status']['ftp_module']['']					= '';
$language['status']['ftp_module']['']					= '';
$language['status']['ftp_module']['']					= <<<EOD
EOD;
*/
?>
