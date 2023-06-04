Progetto: JunkJedis - sito web di supporto ai cittadini per la raccolta differenziata
Gruppo: Sergio Tommaso Iovine, Francesco Corvaglia, Lorenzo Bellincampi

JunkJedis è una web application nata con lo scopo di fornire un supporto ai cittadini della capitale nella raccolta differenziata e nel corretto smaltimento dei rifiuti. L’app è costituita da quattro sezioni principali: Come funziona, Dove lo butto, Raccolta rifiuti ingombranti e Calendari.

Stile.css: foglio di stile incluso in vari file del progetto con specifiche per alcuni titoli e con classi che modificano il layout di alcune pagine.

Come funziona: homepage del sito, fornisce indicazioni sulle funzionalità delle varie sezioni e contiene un carousel con le ultime comunicazioni del Comune in merito alla pulizia della città.
Index.html: homepage contenente navigar di navigazione per le varie sezioni del sito (presente in tutte le sezioni), una lista puntata di funzionalità disponibili e un carosello responsivo con le news del Comune.

Dove lo butto: sezione in cui è possibile ottenere informazioni su come differenziare correttamente un prodotto inserendone il codice a barre all’interno di un campo testuale.
Ricerca.html: pagina di apertura della sezione con campo testuale dove inserire il codice a barre del prodotto.
Ricerca_codici.php: pagina php che prende in input il codice inserito è verifica se presente nel database, successivamente visualizza il tipo di rifiuto inserito e ne elabora il risultato indirizzando l’utente alla relativa pagina.
Prod_not_exist: pagina di errore alla quale si viene indirizzato se si inserisce un codice a barre non valido.
Carta.html/indifferenziato.html/plastica.html/organico.html: pagina che fornisce indicazioni sul cassonetto da utilizzare per smaltire il rifiuto inserito.
Create_codici.sql: crea la tabella relativa ai codici da inserire nel database.

Raccolta rifiuti ingombranti: sezione dove l’utente, una volta autenticato, può inoltrare richieste di ritiro per dei rifiuti ingombranti e visualizzare il riepilogo delle richieste effettuate monitorandone lo stato. Attraverso le credenziali email admin@roma.ti e password admin, i funzionari del comune possono visualizzare le richieste di tutti gli utenti e confermarle o respingerle.
Login_index.html: pagina che permette di effettuare il login la sezione ed accedere alla propria area privata, è costituita da una form che rimanda alla pagina php login.php.
Login.php: interagisce col database ed effettua controlli se l’utente è registrato al sito e se la password corrisponde all’email associata all’account. In seguito, viene avviata la sessione e vengono settati i parametri di sessione indirizzando l’utente alla pagina richiesta.php o comune php (nel caso in cui si effettuasse l’accesso con l’account del comune).
Richiesta.php: pagina che permette di inoltrare le richieste attraverso una form che reindirizza a ritiro.php e che permette di visualizzare il riepilogo delle richieste effettuate attraverso l’apposito tasto ‘Riepilogo prenotazioni’ che apre una modella con una tabella con i dati del database relativi all’account dell’utente.
Ritiro.php: pagina php che inserisce i dati della richiesta effettuata nel database associandola all’account che l’ha inoltrata e setta lo stato della richiesta ‘In attesa di conferma’ e reindirizza a request_ok.php.
Request.php: pagina php che notifica la presa in carico della richiesta e permette di tornare nella pagina di gestione dell’account (richiesta.php).
Comune.php: pagina php che permette di visualizzare tutte le richieste effettuate da tutti gli account e per ogni richiesta il funzionario del comune può respingerla o confermarla attraverso due appositi tasti.
Conferma.php/respingi.php: pagina php alla quale si viene reindirizzati quando vengono premuti i tasti Conferma/respingi e modificano lo stato della richiesta in esame.
Logout.php: distrugge la sessione in coro e reindirizza a login_index.html
Email_not_used.html: pagina di errore se si tenta di accedere con un’email non presente nel database.
Wrong_pswd.html: pagina di errore se si tenta di accedere con un’email valida ma digitando una password errata.
Create_prenotazioni.sql: codice per creare la tabella Prenotazioni bel database contenente tutte le richieste effettuate dagli account.
Directory registrazione
Regstrazione_index.html: pagina html contenente una form che reindirizza a registrazione.php.
Registazione_php: pagina php che salva nel database i dati inseriti nella form e crea un nuovo account verificando che l’email inserita non sia stata già utilizzata.
Email_used.html: pagina di errore se l’email inserita in fase di registrazione è già associata ad un account registrato.
Reg_ok.html: pagina che conferma l’avventura registrazione e reindirizza alla pagina di login.
Create_table.sql: codice per creare la tabella contenente tutti gli account degli utenti registrati nel database.

Calendari: sezione in cui l’utente può visualizzare il calendario della raccolta porta a porta relativo al proprio edificio e dove sono situate le principali isole ecologiche della città attraverso una mappa con dei tag.
Scelta.html: pagina dove, selezionando un municipio dal menù a tendina, è possibile visualizzare il relativo calendario della raccolta rifiuti porta a porta. Al centro della pagina è presente una leggenda con dei suggerimenti sui rifiuti più comuni da gettare nei vari cassonetti e, in fondo alla pagina, è presente una mappa della capitale con dei tag che evidenziano i punti in cui sono presenti le isole ecologiche.
Show_cal.js: definizioni delle due funzioni javascript che permettono con JQuery di aprire e chiudere i calendari dei vari municipi attraverso l’utilizzo di due bottoni.

Directory bootstrap e risorse: file importati per utilizzare rispettivamente le librerie bootstrap e per la realizzazione del carousel nella homepage.

Images: directory contenente tutte le immagini dell’applicazione.
