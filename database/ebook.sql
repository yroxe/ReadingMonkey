CREATE DATABASE ebook;

USE ebook;

CREATE TABLE autori (
autor_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
nume_autor VARCHAR(20) NOT NULL,
prenume_autor VARCHAR(20) DEFAULT NULL,
PRIMARY KEY (autor_id),
UNIQUE autor (nume_autor, prenume_autor)
) ENGINE=MyISAM;


INSERT INTO `autori` (`autor_id`, `nume_autor`, `prenume_autor`) VALUES
(1, 'Bolles', 'Richard Nelson'),
(2, 'Stone', 'Brad'),
(3, 'Branson', 'Richard'),
(4, 'Loomis', 'Carol J.'),
(5, 'Sharma', 'Robin S.'),
(6, 'Christie', 'Agatha'),
(7, 'Pop', 'Ligia'),
(8, 'Keating', 'Richard'),
(9, 'Butler', 'Alan'),
(10, 'Whitelaw', 'Jan'),
(11, 'Freud', 'Sigmund'),
(12, 'Messinger', 'Joseph'),
(13, 'Marotta', 'Millie'),
(14, 'Frank', 'Anne'),
(15, 'Grout', 'Pam'),
(16, 'Gremillon', 'Helen'),
(17, 'ytf', 'ilu'),
(18, 'Lebone', 'Mary');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `carti` (
  `carte_id` int(10) unsigned NOT NULL,
  `autor_id` int(10) unsigned NOT NULL,
  `nume_carte` varchar(60) NOT NULL,
  `pret_carte` decimal(6,2) unsigned NOT NULL,
  `pret_nou` decimal(6,2) unsigned NOT NULL,
  `descriere` varchar(1000) NOT NULL,
  `imagine` varchar(60) NOT NULL,
  `anul_aparitiei` varchar(4) NOT NULL,
  `numar_pagini` smallint(6) NOT NULL,
  `editura` varchar(20) NOT NULL,
  `categorie_id` int(10) unsigned NOT NULL,
  `data_inregistrare` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `exemplare` smallint(6) NOT NULL,
  `index_homepage` varchar(1) DEFAULT NULL,
  `stele` smallint(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;


INSERT INTO `carti` (`carte_id`, `autor_id`, `nume_carte`, `pret_carte`, `pret_nou`, `descriere`, `imagine`, `anul_aparitiei`, `numar_pagini`, `editura`, `categorie_id`, `data_inregistrare`, `exemplare`, `index_homepage`, `stele`) VALUES
(1, 1, 'Ce culoare are parasuta ta', '61.00', '41.00', 'Ce culoare are parasuta ta? este cea mai populara carte de management al carierei din lume, revista Time incluzand-o pe lista celor mai bune o suta de carti de non-fictiune, scrise incepand cu anul 1923. De asemenea, The Library of Congress a inclus-o in primele douazeci si cinci de carti din istorie cu un impact major asupra vietilor oamenilor. Pana la ora actuala, cartea s-a vandut in peste zece milioane de exemplare in toata lumea, fiind revizuita anual. A fost tradusa in douazeci de limbi si este utilizata ca ghid de dezvoltare in cariera in douazeci si sase de tari.', '9182576a434ee6393206e11b9f6846ff.jpg', '2013', 456, 'Publica', 5, '2016-07-18 19:32:33', 20, 'o', 3),
(2, 2, 'Jeff Bezos si epoca Amazon', '55.00', '29.00', 'Obiectivul acestei carti este de a spune povestea din spatele unuia dintre cele mai mari succese antreprenoriale de la zborul turbopropulsorului cu doua locuri al lui Sam Walton deasupra Sudului american pentru a evalua potentiale locatii pentru magazine Walmart. Este povestea unui copil talentat care a ajuns un director executiv extraordinar de motivat si de adaptabil si despre felul in care el, familia si colegii sai au pariat masiv pe o retea revolutionara numita internet si pe viziunea grandioasa a unui singur magazin care vinde de toate.', '75e7fedfca8c6f214f953cdb9cfa5c14.jpg', '2014', 300, 'Publica', 5, '2016-07-18 19:32:40', 15, 'o', 4),
(3, 3, 'Richard Branson-The virgin way', '49.00', '0.00', 'Volumul The Virgin Way  Cum sa asculti, sa inveti, sa razi si sa conduci cuprinde unele dintre cele mai pertinente sfaturi ale lui Richard Branson, oferite in urma experientelor si intamplarilor care l-au facut unul dintre cei mai cunoscuti si respectati antreprenori. Branson isi impartaseste cunostintele cu atentia si optimismul unui prieten apropiat, care te va invata sa fii mai inovator, iti va spune cum poti conduce o companie doar ascultand la ce se intampla in jurul tau, cum sa ajungi sa-ti placa munca ta si multe altele.', '67c078ca719c6bddc82e06a5d0d622b8.jpg', '2015', 360, 'Publica', 5, '2016-07-18 19:38:11', 23, 'n', 2),
(4, 4, 'Warren Buffett - Despre aproape orice', '49.00', '0.00', 'La sfarsitul lui 2013, averea sa a fost estimata la 59,1 miliarde de dolari. Este pe locul al patrulea in topul Forbes al miliardarilor lumii. A transformat Berkshire Hathaway, dintr-o fabrica de textile, intr-o forta uriasa a Americii corporatiste si a devenit unul dintre cei mai de succes oameni de afaceri de pe planeta.Volumul include cele mai bune articole publicate in revista Fortune de si despre Warren Buffett, oracolul din Omaha, ca si unele dintre scrisorile lui anuale catre actionarii Berkshire, de fiecare data examinate atent de cititori in cautarea revelatiilor sale despre ce a mai facut pe pietele de valori mobiliare.', '32ab115df195e08e4f30fb5458c7773c.jpg', '2014', 576, 'Litera', 5, '2016-07-18 19:29:15', 12, 's', 1),
(5, 5, 'Calugarul care si-a vandut Ferrari-ul', '37.00', '0.00', 'Bestseller ce a facut senzatie in intreaga lume, Calugarul care si-a vandut Ferrari-ul, iti va binecuvanta si imbogati viata, indiferent cine esti sau ce faci. Scrisa ca o fabula spirituala, cartea este povestea lui Julian Mantle, un avocat stralucit, care aflat pe culmile succesului si ducand un stil de viata dezechilibrat, se prabuseste intr-o sala de tribunal in urma unui atac de cord. Colapsul fizic ii genereaza o criza spirituala, obligandu-l sa isi infrunte propriile temeri si limitari si sa caute raspunsuri la cele mai apasatoare intrebari ale vietii.  Sperand sa-si gaseasca fericirea si implinirea, el porneste intr-o odisee extraordinara a unei culturi vechi, spre inima muntilor Himalaya unde intalneste un grup de calugari denumiti Inteleptii din Sivana.  Aici descopera un sistem remarcabil de eliberare a potentialului mintii, trupului si sufletelui si invata sa traiasca plenar fiecare moment al vietii, cu mai multa pasiune, cu un scop bine definit si intr-o pace deplina. Imbin', 'efaca4e8c96298ea3d96f1b5751bfbb6.jpg', '2010', 120, 'Vidia', 2, '2016-07-18 19:29:12', 25, 's', 2),
(6, 6, 'Ceasurile', '10.00', '0.00', 'Sheila Webb, o dactilografa liber-profesionista, soseste la Wilbraham Crescent pentru o slujba pentru care a fost angajata. Ceea ce gaseste insa este un cadavru bine imbracat, inconjurat de cinci ceasuri, fiecare indicand o alta ora. Dar pana la sosirea politistilor, patru dintre ceasuri au disparut - si, din nefericire, stapana casei, care este oarba, nu a vazut nimic. Hercule Poirot, pensionar acum, are din fericire suficient timp sa puna cap la cap indiciile din cel mai ciudat caz al carierei sale.', '8f8005e85a3e79dc30ec12227a42de24.jpg', '2010', 250, 'RAO', 1, '2016-07-18 19:29:09', 12, 'n', 2),
(7, 6, 'Crima din Mesopotamia', '20.00', '15.00', 'Este limpede ca se petrece ceva neobisnuit cu membrii expeditiei care lucreaza la situl arheologic de la Hassanieh: o tensiune stranie, ceva legat de prezenta preaiubitei sotii a profesorului Leidner, Frumoasa Louise. Lui Louise ii e frica de ceva. Este vorba oare doar despre atacuri de panica, despre halucinatii ? Ma tem ca o sa fiu ucisa! ii marturiseste sorei Leatheran, care a acceptat sa aiba grija de ea. Din nefericire, se dovedeste ca avea dreptate. Printr-o coincidenta insa, cel mai mare detectiv din lume se afla in apropiere: dupa ce a descalcit un scandal militar in Siria, Hercule Poirot ajunge la Hassanieh si incepe sa ancheteze moartea lui Louise. O crima care ii va pune la incercare abilitatile si al carei mister il va dezlega cu aceeasi iscusinta cu care ne-a obisnuit.', '4e18954954d2311c233bc3c046eee976.jpg', '2010', 250, 'RAO', 1, '2016-07-18 19:32:48', 12, 'o', 3),
(8, 7, 'Retete vegane fara foc', '35.00', '0.00', 'Aceasta carte va ajuta sa descoperiti 80 de retete delicioase, pornind de la paine din seminte, lapte si branzeturi din nuci, chiftele si diverse feluri de mancare vegana cruda, creme de prajituri, deserturi si torturi extrem de apetisante si sanatoase. Toate ingredientele folosite sunt netratate termic, pline de vitamine si enzime prezente doar in cruditati, de care corpul nostru are nevoie pentru o functionare optima.', '48253a6771333bb449bd64fea59eef47.jpg', '2014', 199, 'Curtea veche', 7, '2016-07-18 19:29:04', 27, 's', 3),
(9, 8, 'Fotografia digitala cu aparate foto DSLR', '40.00', '0.00', 'In ciuda aparitiei pe piata a unei game in continua diversificare de noutati electronice, fotografii adevarati raman credinciosi tot DSLR-urilor. Aceste aparate foto combina perfect cunostintele foto cu realizarile tehnologice, astfel nu este surprinzator ca DSLR-urile fac fata si in cele mai complicate situatii. Fotografiatul devine o joaca de copil cu aceste aparate, iar daca adaugam si creativitate la calitatea impecabila a imaginii, satisfactia este garantata.', 'af621e8f3a8d514b1c83bc133861c68a.jpg', '2012', 192, 'Casa', 9, '2016-07-18 19:28:48', 5, NULL, 3),
(10, 9, 'Cavalerii templieri- Misterul dezvaluit', '12.00', '0.00', 'Cavalerii Templieri - un mister vechi de secole. De unde aparut acesti Cavaleri ai lui Hristos invesmantati in alb - au fost doar o reflectare a gandirii crestine din secolul al XII-lea? Aceasta este intrebarea la care isi propun sa raspunda autorii. Templierii au fost o ramura a unei fratii monastice foarte putin intelese - cea a cistercienilor, cei care au ajuns sa fie un grup extrem de puternic in Burgundia si Flandra inca de pe vremea romanilor. In spatele Cavalerilor Templieri se afla un set de credinte aproape la fel de vechi ca omenirea si o mostenire deja straveche in momentul in care istoria a inceput sa fie consemnata. Povestea este totodata fascinanta si provocatoare, surprinzatoare si socanta, iar implicatiile ei pentru perspectiva ortodoxa asupra istoriei sunt uluitoare.', '0d5a954dfe3855ae36f71a942eab282d.jpg', '2010', 288, 'RAO', 8, '2016-07-18 19:28:44', 4, NULL, 2),
(11, 10, 'Oameni care au facut istorie', '40.00', '0.00', 'Personalitatile, barbati sau femei, sunt produsul timpului lor sau isi pun amprenta asupra perioadei in care traiesc? Fara indoiala, exista factori sociali, politici si economici care nu pot fi controlati, dar omul poate conferi evenimentelor un anumit caracter si o anumita directie. Cei care fac acest lucru pot deveni adevarate simboluri pentru o cauza sau o idee. Volumul prezinta tocmai biografiile unor astfel de oameni - liderii care au intruchipat o miscare si inovatorii al caror geniu i-a facut sa creeze ceva atat de special, incat ne-au adus in fata ochilor lucruri pe care nu ni le-am fi putut imagina.', '826e1779cf77bc0917bbb58f5936c2a4.jpg', '2011', 256, 'RAO', 8, '2016-07-18 19:28:42', 6, NULL, 1),
(14, 13, 'Taramul viselor.O aventura in culori.', '25.00', '0.00', 'Taramul viselor este populat cu o multime de animale si plante rasarite din imaginatia si talentul ilustratoarei Millie Marotta, cea supranumita de ziarele britanice regina cartilor de colorat pentru adulti. Millie a crescut intr-o ferma micuta din vestul Tarii Galilor si, acolo, a devenit obsedata de universul necuvantatoarelor, flora si fauna fiind sursele de inspiratie pentru toate ilustratiile ei. Acum ai ocazia sa personalizezi ilustratiile ei astfel incat sa se potriveasca propriilor tale vise si ai nevoie doar de cateva creioane colorate si de un pic de imaginatie pentru a insufla viata acestor creaturi minunate: exprima-ti creativitatea si scapa de stres creand o casa acvatica pentru un gratios monstru marin sau adaugand detalii fine carabusului stralucitor.', '230241e2f132a0b85ac52154b29d6611.jpg', '2015', 96, 'Corint', 9, '2016-07-18 19:28:39', 56, 'n', 4),
(15, 14, 'Jurnalul Annei Frank', '31.00', '0.00', 'Povestea tragica a Annei Frank e bine cunoscuta. impreuna cu familia ei si alti cunoscuti evrei, Anne a stat ascunsa timp de doi ani (6 iulie 1942–4 august 1944), de teama deportarii in lagar, in asa-numita Anexa a sediului firmei patronate de tatal sau, in Amsterdamul ocupat de germani. Avea 13 ani cand a intrat in Anexa. A tinut aici un jurnal (inceput anterior, in 12 iunie 1942), devenind la un moment dat constienta ca el va reprezenta un document important dupa ce razboiul se va sfarsi. In 4 august 1944, asadar nu mult dupa debarcarea Aliatilor in Normandia, cand finalul recluziunii parea foarte aproape, Anne si ceilalti sapte locatari ai Anexei sunt arestati si mai tarziu deportati cu ultimul transport spre Auschwitz. Cu exceptia lui Otto Frank, toti vor muri. Anne si sora ei se sting de tifos la Bergen-Belsen in februarie sau martie 1945. Eliberat din lagarul de la Auschwitz, tatal Annei va publica si va face cunoscut in toata lumea jurnalul fiicei sale.', '347ea975401916aeeba496a76296bc64.jpg', '2011', 392, 'Humanitas', 4, '2016-07-18 19:28:36', 35, NULL, 2),
(16, 3, 'Pierderea virginitatii', '64.00', '0.00', 'Richard Branson si-a scris propriile reguli ale succesului, creand un grup de companii care a impanzit toata lumea, dar fara sediu central, fara ierarhie de management si cu birocratie minima. Multe dintre afacerile lui – linii aeriene, retail, Virgin Coke, au aparut in domenii in care concurenta era destul de mare. A dat de cate o mina de aur pe piete unde consumatorii erau nemultumiti, unde confuzia era atotstapanitoare, iar firmele concurente stagnau.', '69fe05e07a90c44ae011353b2c3fdb1b.jpg', '2010', 648, 'Publica', 4, '2016-07-18 19:28:31', 20, NULL, 1),
(17, 6, 'Moartea vine ca un sfarsit', '12.00', '0.00', 'Cine ar fi zis ca sunt posibile crime in serie si in Egiptul antic? Numai ca acolo nu se afla nici Miss Marple, nici Hercule Poirot sa rezolve misterul si sa descopere criminalul! Este, in schimb, Renisenb, fiica unui preot al lui Ka.O vaduva tanara, Renisenb se intoarce in casa tatalui sau odata cu Nofret, concubina acestuia, care transforma intreaga gospodarie intr-un cuib de viespi ce fierbe de intrigi, de ura si amenintari. Nu peste mult timp Nofret moare, si dupa ea, cumnata lui Renisenb si chiar doi dintre fratii sai.', '7db1fb913b1ea336864f13b8a4e246ab.jpg', '2015', 272, 'Litera', 1, '2016-07-18 19:28:27', 17, 'n', 3),
(18, 15, 'E2', '25.00', '0.00', 'Iata o carte care este bestseller  New York Times si care are un titlu interesant si un continut incitant: E2. Noua experimente cu energie, pe care le puteti face singuri si care demonstreaza ca gandurile voastre sunt cele care va creeaza realitatea.Titlul, E2, este o parafraza a celebrei ecuatii a lui Einstein, insa cartea nu este un text despre fizica, ci un text de metafizica aplicata intr-un mod amuzant. Mai precis, cartea descrie noua experimente, pe care sa le faceti singuri fara niciun cost si care va vor deschide mintile si va vor bucura sufletele.', '2da93b4ae426adb079f22454b5571a8d.jpg', '2016', 230, 'For you', 2, '2016-07-18 19:36:52', 26, 'n', 2);

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `categorii` (
  `categorie_id` int(10) unsigned NOT NULL,
  `categorie_nume` varchar(80) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;


INSERT INTO `categorii` (`categorie_id`, `categorie_nume`) VALUES
(1, 'Fictiune'),
(2, 'Lecturi motivationale'),
(3, 'Carti de specialitate'),
(4, 'Biografii'),
(5, 'Business'),
(6, 'Economie'),
(7, 'Gastronomie'),
(8, 'Istorie'),
(9, 'Arta si design'),
(10, 'Programare');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `useri` (
  `user_id` int(10) unsigned NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` char(150) NOT NULL,
  `data_inregistrarii` datetime NOT NULL,
  `nume_user` varchar(20) DEFAULT NULL,
  `prenume_user` varchar(20) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

