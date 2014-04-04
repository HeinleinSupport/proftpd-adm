<?php
$language['name']['administrator'] 		= 'proFTPd Administrasjonsverkt&oslash;y';
$language['name']['sys_info_only'] 		= 'Systeminformasjon';

/* Generelt */
$language['general']['username'] 		= 'Brukernavn';
$language['general']['groups'] 			= 'Grupper';
$language['general']['primarygroup'] 	= 'Hovedgruppe';
$language['general']['homedirectory'] 	= 'Hjemmekatalog';
$language['general']['enabled'] 		= 'Aktivert';
$language['general']['disabled'] 		= 'Deaktivert';
$language['general']['expiration'] 		= 'Utl&oslash;psdato';
$language['general']['expiration_never']= 'Aldri';
$language['general']['password'] 		= 'Passord';
$language['general']['shell'] 			= 'Skall';
$language['general']['description'] 	= 'Beskrivelse';
$language['general']['delete'] 			= 'Slett';
$language['general']['numlogins'] 		= 'Innlogginger';
$language['general']['lastlogin'] 		= 'Siste innlogging';
$language['general']['lastlogout'] 		= 'Siste utlogging';
$language['general']['userid'] 			= 'Bruker-ID';
$language['general']['select_subsection']= 'Velg underseksjon';
$language['general']['error_occured'] 	= 'En feil har oppst&aring;tt';
$language['general']['error_type'] 		= 'Type';
$language['general']['error_details'] 	= 'Detaljer';
$language['general']['error_db_errors'] = 'Feilmeldinger og feils&oslash;kingsinformasjon for databasen';
$language['general']['log_in'] 			= 'Logg inn';

$language['general']['time_old'] 		= 'Bruk allerede satt verdi';
$language['general']['time_yesterday'] 	= 'I g&aring;r';
$language['general']['time_24h'] 		= 'I morgen';
$language['general']['time_1week'] 		= 'En uke';
$language['general']['time_2week'] 		= 'To uker';
$language['general']['time_1month'] 	= 'En m&aring;ned';
$language['general']['time_3month'] 	= 'Tre m&aring;neder';
$language['general']['time_6month'] 	= 'Seks m&aring;neder';
$language['general']['time_1year'] 		= 'Ett &aring;r';
$language['general']['time_never'] 		= 'Aldri';

$language['general']['name'] 			= 'Navn';
$language['general']['email'] 			= 'E-post';
$language['general']['adress'] 			= 'Adresse';
$language['general']['notes'] 			= 'Notater';

$language['general']['yes'] 			= 'Ja';
$language['general']['no'] 				= 'Nei';

/* Menyvalg */
$language['menu']['mainpage'] 			= 'Hovedside';
$language['menu']['users'] 				= 'Brukere';
$language['menu']['groups'] 			= 'Grupper';
$language['menu']['transfers'] 			= 'Overf&oslash;ringer';
$language['menu']['status'] 			= 'Status';
$language['menu']['about'] 				= 'Om';
$language['menu']['sysinfo'] 			= 'System Info.';
$language['menu']['configure'] 			= 'Konfigurer';
$language['menu']['reset'] 				= 'Tilbakestill';
$language['menu']['submit'] 			= 'Lagre';
$language['menu']['traffic'] 			= 'Trafikk';
$language['menu']['section'] 			= 'Seksjoner';
$language['menu']['transfer_log'] 		= 'Overf&oslash;ringslogg';
$language['menu']['statistics'] 		= 'Statistikk';
$language['menu']['toplists'] 			= 'Toppliste';
$language['menu']['manual'] 			= 'Manual';
$language['menu']['log_out'] 			= 'Logg ut';

/* Hovedside */
$language['mainpage']['ftp'] 			= 'FTP';
$language['mainpage']['terminal'] 		= 'Terminal';
$language['mainpage']['pid'] 			= 'PID';
$language['mainpage']['uptime'] 		= 'Oppetid';
$language['mainpage']['idle'] 			= 'Pause / %';
$language['mainpage']['command'] 		= 'Kommando';
$language['mainpage']['command_info']	= 'Kommandoinformasjon';
$language['mainpage']['device'] 		= 'Enhet';
$language['mainpage']['time_login']		= 'Tidspunkt for innlogging';

/* Brukere */
$language['users']['newuser'] 			= 'Ny bruker';
$language['users']['users'] 			= 'Brukere';
$language['users']['cmd_output'] 		= 'Utskrift fra kommando';
$language['users']['pers_info'] 		= 'Detaljer om bruker';
$language['users']['no_group'] 			= 'Utildelt';

/* Redigere bruker */
$language['userv']['user_error'] 		= 'Brukerfeil';
$language['userv']['user_no_such_user'] = <<<EOD
	En brukeridentifikasjon ble oppgitt, men det eksisterer ingen bruker med
	denne brukeridentifikasjonen - velg brukeren fra listen over brukerkontoer
	istedet for &aring; aksessere denne filen direkte.
EOD;
$language['userv']['user_no_user_specified'] = <<<EOD
	Ingen brukeridentifikasjon ble oppgitt - velg brukeren fra listen over brukerkontoer
	istedet for &aring; aksessere denne filen direkte.
EOD;
$language['userv']['agu_info'] 			= 'Endre generell brukerinformasjon';
$language['userv']['deleteuser'] 		= 'Slette bruker';
$language['userv']['userdeleted'] 		= 'Brukeren har blitt slettet';
$language['userv']['assoc_ip'] 			= "IP adresser";
$language['userv']['geninfo'] 			= 'Endre info.';
$language['userv']['set_password'] 		= 'Passord';
$language['userv']['set_expiration'] 	= 'Utl&oslash;psdato';
$language['userv']['expirationdate'] 	= 'Sett utl&oslash;psdato';
$language['userv']['generated_traffic'] = 'Generert trafikk';
$language['userv']['down_sections'] 	= 'Nedlastinger, seksjonsvis';
$language['userv']['up_sections'] 		= 'Opplastinger, seksjonsvis';

$language['userv']['selectdate'] 		= 'Velg tidspunkt';
$language['userv']['customdate'] 		= 'Spesifiser n&aelig;rmere';

$language['userv']['quota'] 			= 'Kvote';
$language['userv']['quota_add'] 		= 'Sett kvote';
$language['userv']['quota_remove'] 		= 'Fjern kvote';
$language['userv']['quota_noquota'] 	= 'Ingen kvote er spesifisert for '
	. 'denne brukeren - klikk "' . $language['userv']['quota_add'] . '" '
	. 'for &aring; sette en kvote. Legg merke til at statistikkene for den '
	. 'nye kvoten vil være blank - hva dette betyr er at tidligere '
	. 'filoverføringer ikke vil bli tatt med i kvoten.';
$language['userv']['quota_used'] 		= 'Brukt kvote';

$language['userv']['alter_maingroup'] 	= 'Endre hovedgruppe';
$language['userv']['alter_addgroup'] 	= 'Tilleggsgrupper';
$language['userv']['memberof'] 			= 'Medlem av';
$language['userv']['joingroup'] 		= 'Legg til gruppemedlemskap';
$language['userv']['selectgroup'] 		= 'Velg gruppe';
$language['userv']['memberships'] 		= 'Medlemskaper';

$language['userv']['edit_user'] 		= 'Rediger bruker';

$language['userv']['setpassword'] 		= 'Sett passord';
$language['userv']['newpassword'] 		= 'Nytt passord';
$language['userv']['newpasswordagain'] 	= 'Nytt passord (gjenta)';
$language['userv']['onchoosingpassword']= 'Hvordan velge ett sikkert passord';
$language['userv']['howto_password'] 	= <<<EOD
	Generelt sett b&oslash;r passord best&aring; av minst 6 til 8 tegn, og inkludere
	elementer fra to eller flere av f&oslash;lgende kategorier:
	<ul>
		<li>Sm&aring; bokstaver
		<li>Store bokstaver
		<li>Tall fra 0 til 9
		<li>Punktumer og spesialtegn
	</ul>
	Kompromittert sikkerhet oppst&aring;r veldig ofte som resultat av d&aring;rlig utvalgte
	passord, eller h&aring;ndtering av passordene. P&aring; grunn av dette b&oslash;r du ikke
	velge ett passord som finnes i noen ordbok, eller noe som er s&aring; vanskelig
	at du m&aring; notere det ned. Passordet b&oslash;r heller ikke v&aelig;re ett navn,
	registreringsnummer, f&oslash;dselsdatoer eller adresser. Disse kan som oftest
	brukes som gjetninger for &aring; kompromittere systemsikkerheten.
	<br><br>
	Som tidligere nevnt b&oslash;r passordet v&aelig;re s&aring;pass enkelt &aring; huske at du ikke
	burde ha behov for &aring; notere det ned p&aring; ett ark eller Post-It. Andre
	metoder for &aring; lage ett sikkert passord involverer &aring; memorisere ett kjent
	sitat fra litteratur og s&aring; velge enten det siste eller f&oslash;rste tegnet fra
	hvert ord. Eksempel: "Ask not for whom the bell tolls", som da vil
	tilsvare "An4wtbt".
	<br><br>
	Du kan v&aelig;re rimelig sikker p&aring; at endel crackere allerede har inkludert
	dette passordet i ordb&oslash;kene sine. Du burde heller lage din egen metode
	for generering av sikre passord, istedenfor for &aring; utelukkende basere deg
	p&aring; metodene skissert her.
	<br><br>
	(l&oslash;st oversatt utdrag fra manualsidene for kommandoen "passwd")
EOD;

$language['userv']['delete_user'] 		= 'Slette bruker';
$language['userv']['delete_user_desc'] 	= <<<EOD
	Du har valgt &aring; slette denne brukeren, men v&aelig;r klar over at ved &aring; slette
	brukeren vil det v&aelig;re ugjenopprettelig. Den eneste m&aring;ten &aring; gjenopprette
	brukeren vil v&aelig;re &aring; opprette en helt ny bruker, og gi den nye brukeren den
	samme brukerdataen som den opprinnelige brukeren hadde.
	<br><br>
	Dersom denne brukeren har medlemskap i andre grupper utover hovedgruppen,
	m&aring; du fjerne disse medlemskapene f&oslash;r du kan g&aring; videre med &aring; slette
	brukeren - etter &aring; ha utf&oslash;rt dette vil du f&aring; frem valget "Slett" nedenfor.
	Gruppemedlemskaper kan endres i underseksjonen "Grupper".
EOD;

/* Grupper */
$language['groups']['delete_group'] 	= 'Slett gruppe';
$language['groups']['alter_group'] 		= 'Endre gruppeinformasjon';
$language['groups']['alter'] 			= 'Endre gruppe';
$language['groups']['delete'] 			= 'Slett gruppe';
$language['groups']['newgroup'] 		= 'Ny gruppe';
$language['groups']['groups'] 			= 'Grupper';
$language['groups']['groupname'] 		= 'Gruppenavn';
$language['groups']['addgroup'] 		= 'Opprett gruppe';
$language['groups']['groupid'] 			= 'Gruppe-ID';
$language['groups']['members'] 			= 'Medlemmer';
$language['groups']['desc_delete'] 		= <<<EOD
	Du har valgt &aring; slette denne gruppen. F&oslash;r du gj&oslash;r dette b&oslash;r
	du v&aelig;re klar over at ved sletting av gruppen vil den v&aelig;re
	borte for alltid. Dersom du sletter gruppen med ett uhell,
	vil eneste mulighet for &aring; f&aring; den tilbake v&aelig;re &aring; manuelt
	opprette en gruppe med samme navn for s&aring; etterp&aring; sette
	gruppemedlemskapene for brukerne.
EOD;
$language['groups']['desc_delete_prim']	= <<<EOD
	<br><br>
	Noen av brukerne har f&aring;tt denne gruppen tildelt som hovedgruppe
	- det er derfor anbefalt at du g&aring;r gjennom listen nedenfor og
	setter hovedgruppen deres til en av de andre gruppene. Spesifiserer
	du ikke nye hovedgrupper for brukerne i listen nedenfor kan du
	potensielt oppleve uforutsigbar oppf&oslash;rsel fra systemet.
	<br><br>
EOD;

/* Om */
$language['about']['about'] 			= 'Om';
$language['about']['revisions'] 		= 'Revisjoner';
$language['about']['version'] 			= 'Versjon';

$language['about']['newfeature']		= 'Lagt til funksjon';
$language['about']['bugfix'] 			= 'Feilretting';
$language['about']['restructuring']		= 'Restrukturering';
$language['about']['documentation']		= 'Dokumentering';

$language['about']['introduction'] 		= <<<EOD
	En stund tilbake, under arbeid med &aring; sette opp en lett administrerbar
	ftp-tjener kom jeg over shareware versjonen av Serv-U for Microsoft
	Windows(TM). Alt fungerte utmerket til pr&oslash;vetiden l&oslash;p ut, og det endte
	da gleden over produktet - tiden hadde kommet til &aring; enten betale eller &aring;
	bli kreativ. Det er ingen tvil om hva som skjedde da jeg allerede hadde
	min f&oslash;rste Slackware Linux-tjener allerede konfigurert og klar til bruk.
	<br><br>
	Etter en stund med leting etter alternativer for GNU/Linux, n&aring;r det kommer
	til de litt mer profesjonelle ftp-tjenerne endte valget med proFTPd.
	Dessverre var jeg rask &aring; oppdage at tjeneren var n&aelig;rmest ett mareritt &aring;
	kompilere (iallefall dersom du trenger andre tilleggsmoduler), konfigurere
	og administrere. De to f&oslash;rste kan l&oslash;ses med en skikkelig guide, og
	implementasjonen av den siste delen er det du ser p&aring; n&aring;.
EOD;

/* Manual */
$language['manual']['manual'] 			= 'Manual';
$language['manual']['introduction'] 	= <<<EOD
	I denne seksjonen vil du finne manualer og diverse dokumenter
	som for &oslash;yeblikket er tilgjengelig for dette verktøyet. Legg
	merke til at disse filene også er tilgjengelige i form av vanlige
	filer - disse kan du finne i katalogen der du installerte proFTPd
	Administrator. Innholdet i disse filene er for &oslash;yeblikket ikke
	prioritert for oversettelse grunnet dette verkt&oslash;yets midlertidige
	natur under utviklingsfasen.
EOD;

/* Overføringer */
$language['transfers']['transfers'] 	= 'Overf&oslash;ringer';
$language['transfers']['downloaders'] 	= 'nedlastere';
$language['transfers']['uploaders'] 	= 'opplastere';
$language['transfers']['down_sections'] = 'Nedlastinger, seksjonsvis';
$language['transfers']['up_sections'] 	= 'Opplastinger, seksjonsvis';
$language['transfers']['traffic_stats']	= 'Overf&oslash;ringsstatistikk';
$language['transfers']['transfer_log'] 	= 'Overf&oslash;ringslogg';

/* Util */
$language['util']['top'] 				= 'Topp';
$language['util']['downloaded'] 		= 'Nedlastet';
$language['util']['numfiles'] 			= 'Antall filer';
$language['util']['uploaded'] 			= 'Lastet opp';
$language['util']['total_amount'] 		= 'Mengde totalt';
$language['util']['mostactive'] 		= 'Mest aktiv';

$language['util']['time_1hour'] 		= 'Siste time';
$language['util']['time_24hour'] 		= 'Siste 24 timer';
$language['util']['time_7days'] 		= 'Siste 7 dager';
$language['util']['time_30days'] 		= 'Siste 30 dager';
$language['util']['time_total'] 		= 'Totalt';

$language['util']['transfer_log'] 		= 'Overf&oslash;ringslogg';
$language['util']['user'] 				= 'Bruker';
$language['util']['timestamp'] 			= 'Tidsstempel';
$language['util']['filename'] 			= 'Filnavn';
$language['util']['size'] 				= 'St&oslash;rrelse';
$language['util']['command'] 			= 'Kommando';
$language['util']['duration'] 			= 'Tid';

/* Status */
$language['status']['nosupport']		= 'Status feil';
$language['status']['nosupport_desc'] 	= <<<EOD
	Du bruker ett operativsystem som for &oslash;yeblikket ikke er st&oslash;ttet, Denne
	delen av applikasjonen krever veldig mange operativsystem-spesifikk kode,
	men forh&aring;pentligvis en gang i fremtiden vil dette bli implementert. Resten
	av administratorverkt&oslash;yet b&oslash;r derimot fungere uten noen problemer.
EOD;
$language['status']['status'] 			= 'Status';
$language['status']['system'] 			= 'System';
$language['status']['version'] 			= 'Versjon';
$language['status']['name'] 			= 'Informasjon';
$language['status']['value'] 			= 'Verdi';
$language['status']['program'] 			= 'Program';

$language['status']['ip'] 				= 'Svarende IP';
$language['status']['http'] 			= 'HTTP-tjener';
$language['status']['kernel_version'] 	= 'Kjerneversjon';
$language['status']['db_server'] 		= 'MySQL-tjener';
$language['status']['uptime'] 			= 'Oppetid';
$language['status']['php_version'] 		= 'PHP-versjon';
$language['status']['idle_time'] 		= 'D&oslash;dgang';
$language['status']['zend_version'] 	= 'Zend PHP Engine';
$language['status']['term_users'] 		= 'Terminalbrukere';
$language['status']['ftp_users'] 		= 'Ftp brukere';
$language['status']['proftpd_version'] 	= 'proFTPd';
$language['status']['load'] 			= 'Prosessorbruk';
$language['status']['web_interface'] 	= 'Web-grensesnitt';

$language['status']['menu_processlist'] = 'Prosesser';
$language['status']['menu_resources'] 	= 'Ressurser';
$language['status']['menu_hardware'] 	= 'Maskinvare';
$language['status']['menu_kernel'] 		= 'Kjerne';
$language['status']['menu_database'] 	= 'Database';
$language['status']['menu_proftpd'] 	= 'ProFTPd';

$language['status']['server_down'] 		= 'Tjener nede';
$language['status']['secured_apache'] 	= 'Sikrede tjenere rapporterer kun navnet, Apache.';
$language['status']['uptime_linux'] 	= 'Prosessorbruk over henholdsvis det f&oslash;rste, samt de 5 og 15 siste minuttene.';

$language['status']['ps_processlist'] 	= 'Prosesser';
$language['status']['ps_name'] 			= 'Prosessnavn';
$language['status']['ps_pid'] 			= 'PID';
$language['status']['ps_uid'] 			= 'UID';
$language['status']['ps_defunctprocess']= 'Foreldreprosessen eksisterer ikke, p&aring; ett *Nix betyr det at programvaren din har feil.';

$language['status']['pro_proftpd'] 		= 'ProFTPd';
$language['status']['pro_compiled_in'] 	= 'Moduler som er kompilert inn';
$language['status']['pro_module_field'] = 'Modul';
$language['status']['pro_module_desc'] 	= 'Beskrivelse';

$language['status']['krnl_kernel'] 		= 'Kjerneinformasjon';
$language['status']['krnl_kernelconf'] 	= 'Kjernekonfigurasjon';
$language['status']['krnl_kernelparams']= 'Kjerneparametere';
$language['status']['krnl_compiledin']	= 'Funksjon kompilert inn';
$language['status']['krnl_modularized']	= 'Kompilert som modul';
$language['status']['krnl_conf_file'] 	= 'Konfigurasjonsfil for kjernen';

$language['status']['hw_hardware'] 		= 'Maskinvareinformasjon';
$language['status']['hw_processor'] 	= 'Prosessor';
$language['status']['hw_pci'] 			= 'PCI-enheter';
$language['status']['hw_pciadress'] 	= 'Adresse';
$language['status']['hw_pcivalue'] 		= 'Beskrivelse';
$language['status']['hw_ide'] 			= 'IDE-enheter';
$language['status']['hw_idedevice'] 	= 'Enhet';
$language['status']['hw_idefield'] 		= 'Felter';
$language['status']['hw_idevalues'] 	= 'Verdi';

$language['status']['db_database'] 		= 'Databasestatistikk';
$language['status']['db_tablename']		= 'Tabellnavn';
$language['status']['db_rows'] 			= 'Rader';
$language['status']['db_rowformat'] 	= 'Radformat';
$language['status']['db_tablesize'] 	= 'St&oslash;rrelse';
$language['status']['db_created'] 		= 'Opprettet';
$language['status']['db_updated'] 		= 'Sist oppdatert';
$language['status']['db_checktime'] 	= 'Konsistensitetssjekket';
$language['status']['db_var_name']		= 'Variabelnavn';
$language['status']['db_var_value']		= 'Verdi';
$language['status']['db_sec_tablestats']= 'Tabellstatistikk';
$language['status']['db_sec_status']	= 'Database status';
$language['status']['db_sec_processes']	= 'Prosess liste';
$language['status']['db_process_user']	= 'Bruker';
$language['status']['db_process_db']	= 'Database';
$language['status']['db_process_cmd']	= 'Kommando';
$language['status']['db_process_time']	= 'Tid';
$language['status']['db_process_state']	= 'Status';
$language['status']['db_process_info']	= 'Informasjon';

$language['status']['res_totalt']		= 'Total kapasitet';
$language['status']['res_resources']	= 'Ressurser';
$language['status']['res_storage']		= 'Lagring';
$language['status']['res_mountpoint']	= 'Monteringspunkt';
$language['status']['res_perc_capacity']= 'Prosent kapasitet';
$language['status']['res_free']			= 'Ledig';
$language['status']['res_used']			= 'Brukt';
$language['status']['res_size']			= 'St&oslash;rrelse';
$language['status']['res_phys_device']	= 'Fysisk enhet';
$language['status']['res_withfs']		= 'med filsystem';

$language['status']['res_memory']		= 'Minne';
$language['status']['res_memcategory']	= 'Kategori';
$language['status']['res_memphysical']	= 'Fysisk minne';
$language['status']['res_memvirtual']	= 'Virtuelt minne';

$language['status']['res_network']		= 'Nettverk';
$language['status']['res_devname']		= 'Enhetsnavn';
$language['status']['res_netrecv']		= 'Mottatt';
$language['status']['res_netsend']		= 'Sendt';
$language['status']['res_neterror']		= 'Feil/Droppet';

$language['status']['res_netnic']		= 'Nettverkskort';
$language['status']['res_netlocnic']	= 'localhost (tilbakekoblingsenhet)';
$language['status']['res_netppp']		= 'Punkt til punkt protokollenhet';
$language['status']['res_netsit']		= 'Enkel Internettoversettingsenhet (ipv6 over ipv4)';

/* Konfigurer */
$language['configure']['configure']		= 'Konfigurer';
$language['configure']['menu_database']	= 'Database';
$language['configure']['menu_proftpd']	= 'ProFTPd';
$language['configure']['menu_interface']= 'Grensesnitt';
$language['configure']['menu_mpoint']	= 'Monteringspunkter';
$language['configure']['menu_sections']	= 'Seksjoner';
$language['configure']['menu_filepaths']= 'Filstier';
$language['configure']['menu_quota']	= 'Kvote';
$language['configure']['menu_extension']= 'Utvidelser';

$language['configure']['db_type']		= 'Database tjener';
$language['configure']['db_suptype']	= 'Subtype';
$language['configure']['db_st_notused']	= '&lt; Ikke i bruk &gt;';
$language['configure']['db_database']	= 'Database';
$language['configure']['db_hostname']	= 'Vertsnavn';
$language['configure']['db_database']	= 'Database';
$language['configure']['db_connectfail']= <<<EOD
	Fors&oslash;k p&aring; &aring; koble seg til MySQL-tjeneren med de brukerdata du har oppgitt
	feilet - den mest sannsynlige feilen er mest trolig feilstavet brukernavn
	eller passord. En standard nyinstallasjon av MySQL bruker brukernavnet
	"root" og ett blankt passord. For mer informasjon om feilen som oppsto,
	oppfordres det at du tar en titt p&aring; feilmeldingen fra databasen vist
	nedenfor.
EOD;
$language['configure']['db_dbfail']= <<<EOD
	Det gikk bra &aring; koble seg til databasen med de brukerdata du har oppgitt,
	men det oppstod desverre en feil under fors&oslash;k p&aring; spesifisering av database.
	Sjekk at du har stavet databasenavnet korrekt, samt at denne databasen
	faktisk eksisterer. En standard installasjon av proFTPd Administrator slik
	beskrevet i installasjonsinstruksjonene spesifiserer som standard en
	database kalt "<a href="javascript:void();" onclick="document.config_database.frm_database_database.value = 'proftpd_admin';">proftpd_admin</a>".
	For mer informasjon om feilen som oppstod anbefales det at du ser
	feilmeldingen fra databasen vist under.
EOD;

$language['configure']['ftp_ftp']		= 'ProFTPd';
$language['configure']['ftp_ftproot']	= 'FTP-ens rotkatalog';
$language['configure']['ftp_defhome']	= 'Standard hjemmekatalog';
$language['configure']['ftp_createcmd']	= '"Lag bruker"-kommando';
$language['configure']['ftp_defshell']	= 'Standard skall';

$language['configure']['ext_ext']		= 'Utvidelser';
$language['configure']['ext_no_db']		= <<<EOD
	De fleste av funksjonene på denne siden krever tilgang til en database for
	å fungere, men du har for øyeblikket ingen fungerende databasekonfigurasjon
	- konfigurer databasen først. Dersom denne er installert trenger du bare å
	oppgi de korrekte tilkoblingsdetaljene i seksjonen for
	<a href="configure.php?section=database">database-innstillinger</a>.
EOD;
$language['configure']['ext_vhost']		= 'Apache Virtual Hosts';
$language['configure']['ext_vhost_no_table_activated']= <<<EOD
	Du har aktivert funksjonalitet for å konfigurere Apache Virtual Hosts fra
	dette verktøyet, men de nødvendige tabellene i databasen ser ut til å være
	manglende - importer databasestrukturen fra filen "vhtable.sql". Dersom du
	ikke allerede vet hva denne funksjonaliteten skal brukes til anbefales det
	at deaktiverer denne funksjonaliteten.
EOD;
$language['configure']['ext_vhost_no_table']= <<<EOD
	Funksjonalitet for å konfigurere Apache Virtual Hosts er mulig fra dette
	verktøyet, men de nødvendige tabellene i databasen ser ut til å være
	manglende - importer databasestrukturen fra filen "vhtable.sql". Dersom du
	ikke allerede vet hva denne funksjonaliteten skal brukes til anbefales det
	at lar denne funksjonaliteten forbli deaktivert.
EOD;
$language['configure']['ext_quota']			= 'Quota';
$language['configure']['ext_quota_no_table_activated']= <<<EOD
	Du har aktivert støtte for funksjonalitet for modulen "mod_quotatab", gir
	støtte for bruk av kvoter, i dette verktøyet, men du har ennå ikke lagt til
	de nødvendige tabellene i databasen - importer databasestrukturen fra filen
	"upgrade_to_v0.9.sql". Legg også merke til at modulen "mod_quotatab" må være
	kompilert inn i proftpd først.
EOD;
$language['configure']['ext_quota_no_table']= <<<EOD
	Funksjonalitet for modulen "mod_quotatab", gir støtte for bruk av kvoter, i
	dette verktøyet, men du har ennå ikke lagt til de nødvendige tabellene i
	databasen - importer databasestrukturen fra filen "upgrade_to_v0.9.sql" for
	å muliggjøre bruken av denne funksjonaliteten. Legg også merke til at modulen
	"mod_quotatab" må være kompilert inn i proftpd først.
EOD;
$language['configure']['ext_quota_no_mods']	= <<<EOD
	For å kunne bruke støtte for kvoter behøver du støtte for en rekke moduler
	kompilert inn i proftpd - mer spesifikt trenger du, i tillegg til
	standardmoduler som "mod_sql", støtte for modulene "mod_quotatab" og
	"mod_quotatab_sql". Legg merke til at denne beskjeden også vil bli vist
	dersom du ikke har konfigurert den korrekte stien til proftpd i seksjonen
	<a href="configure.php?section=paths">"Filstier"</a>.
EOD;
$language['configure']['ext_quota_still_active'] = <<<EOD
	Du har deaktivert støtte for bruk av kvoter, men du bør være klar over at
	dette ikke direkte påvirker ftp-tjeneren direkte - med andre ord vil kvoter
	som allerede er satt fortsette å være aktive. Aktiver støtten for kvoter,
	fjern kvotene som er satt på brukerne før du igjen deaktiverer støtten for
	kvoter - kun på denne måten vil du være sikker på at ingenting blir
	"hengende" igjen.
EOD;

$language['configure']['quota_activate']	= 'Aktiver st&oslash;tte for kvoter';
$language['configure']['quota_whattype']	= 'Standard kvote per';
$language['configure']['quota_whatlimit']	= 'Kvotebegrensning';
$language['configure']['quota_whatsession']	= 'Ny kvote for hver &oslash;kt';
$language['configure']['quota_details']		= 'Detaljer for standardkvoter';
$language['configure']['quota_down_mb']		= 'Nedlastet i MB';
$language['configure']['quota_up_mb']		= 'Opplastet i MB';
$language['configure']['quota_trans_mb']	= 'Overf&oslash;rt i MB';
$language['configure']['quota_down_files']	= 'Nedlastede filer';
$language['configure']['quota_up_files']	= 'Opplastede filer';
$language['configure']['quota_trans_files']	= 'Overf&oslash;rte filer';

$language['configure']['ui_ui']			= 'Grensesnitt';
$language['configure']['ui_numnames']	= 'Topplistenavn';
$language['configure']['ui_numlogitems']= 'Loggelementer';
$language['configure']['ui_padtoplist']	= 'Fyll toppliste';
$language['configure']['ui_striplogs']	= 'Stripp logstier';
$language['configure']['ui_sysonly']	= 'Kun systeminfo.';
$language['configure']['ui_style']		= 'Valgt stil';
$language['configure']['ui_language']	= 'Spr&aring;k';

$language['configure']['mp_mp']			= 'Monteringspunkter';
$language['configure']['mp_skipped_mp']	= 'Skjulte monteringspunkter';
$language['configure']['mp_hide_mp']	= 'Skjul monteringspunkt';
$language['configure']['mp_select_mp']	= 'Velg monteringspunkt';

$language['configure']['sec_downloads']	= 'Seksjoner: Nedlasting';
$language['configure']['sec_uploads']	= 'Seksjoner: Opplasting';
$language['configure']['sec_adddownload']= 'Legg til nedlastingsseksjon i overf&oslash;ringsstatistikken';
$language['configure']['sec_addupload']	= 'Legg til opplastingsseksjon i overf&oslash;ringsstatistikken';
$language['configure']['sec_relpath']	= 'Relativ seksjonssti';
$language['configure']['sec_down_topic']= '<acronym title="FTP-rotkatalog, sammenf&oslash;yd med grunnsti for &aring; danne fullstendig filbane.">Grunnsti:</acronym><br>Nedlastingsseksjoner:';
$language['configure']['sec_up_topic']	= '<acronym title="FTP-rotkatalog, sammenf&oslash;yd med grunnsti for &aring; danne fullstendig filbane.">Grunnsti:</acronym><br>Opplastingsseksjoner:';

$language['configure']['fp_fp']			= 'Filstier';
$language['configure']['fp_generic_cmd']= 'Sti til vanlige kommandoer';
$language['configure']['fp_cmdspecific']= '-spesifikt';
$language['configure']['fp_conf_file']	= 'Konfigurasjonsfil for kjernen';

$language['configure']['fp_who_rel']= <<<EOD
	Filstien du har oppgitt er enten en relativ sti, eller den oppgitte stien
	er tom. Vanligvis burde dette ikke v&aelig;re noe problem for generelle kommandoer
	slik som disse, men likevel er det anbefalt at du oppgir den komplette fil-
	stien - om enn bare for &aring; fjerne denne advarselen. Standardverdien
	("<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_who.value = '/usr/bin/who';">/usr/bin/who</a>")
	burde fungere for Linux og *BSD-systemer.
EOD;
$language['configure']['fp_who_no']= <<<EOD
	Filen du har oppgitt ser ikke ut til &aring; eksistere - juster og fyll inn hele
	stien til denne kommandoen. Standardverdien er
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_who.value = '/usr/bin/who';">/usr/bin/who</a>".
EOD;

$language['configure']['fp_df_rel']= <<<EOD
	Filstien du har oppgitt er enten en relativ sti, eller den oppgitte stien
	er tom. Vanligvis burde dette ikke v&aelig;re noe problem for generelle kommandoer
	slik som disse, men likevel er det anbefalt at du oppgir den komplette fil-
	stien - om enn bare for &aring; fjerne denne advarselen. Standardverdien
	("<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_df.value = '/usr/bin/df';">/usr/bin/df</a>")
	burde fungere for Linux og *BSD-systemer.
EOD;
$language['configure']['fp_df_no']= <<<EOD
	Filen du har oppgitt ser ikke ut til &aring; eksistere - juster og fyll inn hele
	stien til denne kommandoen. Standardverdien er
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_df.value = '/usr/bin/df';">/usr/bin/df</a>".
EOD;

$language['configure']['fp_ps_rel']= <<<EOD
	Filstien du har oppgitt er enten en relativ sti, eller den oppgitte stien
	er tom. Vanligvis burde dette ikke v&aelig;re noe problem for generelle kommandoer
	slik som disse, men likevel er det anbefalt at du oppgir den komplette fil-
	stien - om enn bare for &aring; fjerne denne advarselen. Standardverdien
	("<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_ps.value = '/bin/ps';">/bin/ps</a>")
	burde fungere for Linux og *BSD-systemer.
EOD;
$language['configure']['fp_ps_no']= <<<EOD
	Filen du har oppgitt ser ikke ut til &aring; eksistere - juster og fyll inn hele
	stien til denne kommandoen. Standardverdien er
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_ps.value = '/bin/ps';">/bin/ps</a>".
EOD;

$language['configure']['fp_sysctl_rel']= <<<EOD
	Filstien du har oppgitt er enten en relativ sti, eller den oppgitte stien
	er tom. Standardverdien
	("<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_sysctl.value = '/sbin/sysctl';">/sbin/sysctl</a>")
	burde fungere for Linux og *BSD-systemer.
EOD;
$language['configure']['fp_sysctl_no']= <<<EOD
	Filen du har oppgitt ser ikke ut til &aring; eksistere - juster og fyll inn hele
	stien til denne kommandoen. Standardverdien er
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_sysctl.value = '/sbin/sysctl';">/sbin/sysctl</a>".
EOD;

$language['configure']['fp_ftpwho_rel']= <<<EOD
	Filstien du har oppgitt er enten en relativ sti, eller den oppgitte stien
	er tom. Standardverdien
	("<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_ftpwho.value = '/usr/local/bin/ftpwho';">/usr/local/bin/ftpwho</a>")
	burde fungere for Linux og *BSD-systemer.
EOD;
$language['configure']['fp_ftpwho_no']= <<<EOD
	Filen du har oppgitt ser ikke ut til &aring; eksistere - juster og fyll inn hele
	stien til denne kommandoen. Standardverdien er
	("<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_ftpwho.value = '/usr/local/bin/ftpwho';">/usr/local/bin/ftpwho</a>")
	og burde fungere for Linux og *BSD-systemer.
EOD;

$language['configure']['fp_proftpd_rel']= <<<EOD
	Filstien du har oppgitt er enten en relativ sti, eller den oppgitte stien
	er tom. Dersom du kompilerte programvaren fra kildekode vil denne filen
	mest trolig ha stien
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_proftpd.value = '/usr/local/sbin/proftpd';">/usr/local/sbin/proftpd</a>".
	Bruker du FreeBSD, og installerte proFTPd ved bruk av portage vil denne
	filen v&aelig;re plassert i
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_proftpd.value = '/usr/local/libexec/proftpd';">/usr/local/libexec/proftpd</a>".
EOD;
$language['configure']['fp_proftpd_no']= <<<EOD
	Filstien du har oppgitt er enten en relativ sti, eller den oppgitte stien
	er tom. Dersom du kompilerte programvaren fra kildekode vil denne filen
	mest trolig ha stien
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_proftpd.value = '/usr/local/sbin/proftpd';">/usr/local/sbin/proftpd</a>".
	Bruker du FreeBSD, og installerte proFTPd ved bruk av portage vil denne
	filen v&aelig;re plassert i
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_proftpd.value = '/usr/local/libexec/proftpd';">/usr/local/libexec/proftpd</a>".
EOD;

$language['configure']['fp_nokernel']= <<<EOD
	Filen du har spesifisert ser ikke ut til &aring; eksistere - juster og fyll inn
	hele stien til konfigurasjonsfilen for kjernen. De ulike Linux-
	distribusjonene plasserer denne filen p&aring; ulike steder, men du b&oslash;r i f&oslash;rste
	rekke pr&oslash;ve enten
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_kernel.value = '/boot/config';">/boot/config</a>"
	eller "<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_kernel.value = '/usr/src/linux/.config';">/usr/src/linux/.config</a>".

	De ulike BSD-variantene, hvis jeg ikke tar feil, plasserer vanligvis denne
	filen i
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_kernel.value = '/usr/src/sys/i386/conf/GENERIC';">/usr/src/sys/i386/conf/GENERIC</a>".
EOD;

$language['configure']['no_write_config']= <<<EOD
	Tjeneren har IKKE skrivetilgang til konfigurasjonsfilen, filen kalt
	"configuration.xml" og som en f&oslash;lge av dette vil du ikke v&aelig;re i stand
	til &aring; endre p&aring; noen av innstillingene f&oslash;r web-tjeneren er gitt skrivetilgang
	til denne filen - sjekk manualen for mer informasjon om hvordan dette kan
	gj&oslash;res. Underseksjonene for denne seksjonen vil ikke v&aelig;re tilgjengelig f&oslash;r
	denne feilen er blitt utbedret.
EOD;
?>