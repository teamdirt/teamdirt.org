<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	  function of_options()
	  {
		// Avada edit
		//Register sidebar options for blog/portfolio/woocommerce category/archive pages
		global $wp_registered_sidebars;
		$sidebar_options[] = 'None';
		for($i=0;$i<1;$i++){
			$sidebars = $wp_registered_sidebars;// sidebar_generator::get_sidebars();
			//var_dump($sidebars);
			if(is_array($sidebars) && !empty($sidebars)){
				foreach($sidebars as $sidebar){
					$sidebar_options[] = $sidebar['name'];
				}
			}

			$sidebars = sidebar_generator::get_sidebars();
			if(is_array($sidebars) && !empty($sidebars)){
				foreach($sidebars as $key => $value){
					$sidebar_options[] = $value;
				}
			}
		}
		
		// End Avada edit


			// Begin Avada edit
			// Social Icon default order
			$of_options_social_links_ordering = array
			(
				  "default" => array (
						'facebook' => 'Facebook',
						'flickr' => 'Flickr',
						'rss' => 'RSS',
						'twitter' => 'Twitter',
						'vimeo' => 'Vimeo',
						'youtube' => 'Youtube',
						'instagram' => 'Instagram',
						'pinterest' => 'Pinerest',
						'tumblr' => 'Tumblr',
						'google' => 'Googleplus',
						'dribbble' => 'Dribble',
						'digg' => 'Digg',
						'linkedin' => 'LinkedIn',
						'blogger' => 'Blogger',
						'skype' => 'Skype',
						'forrst' => 'Forrst',
						'myspace' => 'Myspace',
						'deviantart' => 'Deviantart',
						'yahoo' => 'Yahoo',
						'reddit' => 'Reddit',
						'paypal' => 'Paypal',
						'dropbox' => 'Dropbox',
						'soundcloud' => 'Soundcloud',
						'vk' => 'VK',
				  ),
				  "custom" => array (
				  ),
			);
			// End Avada edit

			//More Options
			$body_repeat			= array(__("no-repeat", "Avada"),__("repeat-x", "Avada"),__("repeat-y", "Avada"),__("repeat", "Avada"));
			$body_pos			   = array(__("top left", "Avada"),__("top center", "Avada"),__("top right", "Avada"),__("center left", "Avada"),__("center center", "Avada"),__("center right", "Avada"),__("bottom left", "Avada"),__("bottom center", "Avada"),__("bottom right", "Avada"));


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

// Avada Edit
		$google_fonts = array(
			"None" => "None",
			"ABeeZee" => "ABeeZee",
			"Abel" => "Abel",
			"Abril Fatface" => "Abril Fatface",
			"Aclonica" => "Aclonica",
			"Acme" => "Acme",
			"Actor" => "Actor",
			"Adamina" => "Adamina",
			"Advent Pro" => "Advent Pro",
			"Aguafina Script" => "Aguafina Script",
			"Akronim" => "Akronim",
			"Aladin" => "Aladin",
			"Aldrich" => "Aldrich",
			"Alef" => "Alef",
			"Alegreya" => "Alegreya",
			"Alegreya SC" => "Alegreya SC",
			"Alegreya Sans" => "Alegreya Sans",
			"Alegreya Sans SC" => "Alegreya Sans SC",
			"Alex Brush" => "Alex Brush",
			"Alfa Slab One" => "Alfa Slab One",
			"Alice" => "Alice",
			"Alike" => "Alike",
			"Alike Angular" => "Alike Angular",
			"Allan" => "Allan",
			"Allerta" => "Allerta",
			"Allerta Stencil" => "Allerta Stencil",
			"Allura" => "Allura",
			"Almendra" => "Almendra",
			"Almendra Display" => "Almendra Display",
			"Almendra SC" => "Almendra SC",
			"Amarante" => "Amarante",
			"Amaranth" => "Amaranth",
			"Amatic SC" => "Amatic SC",
			"Amethysta" => "Amethysta",
			"Anaheim" => "Anaheim",
			"Andada" => "Andada",
			"Andika" => "Andika",
			"Angkor" => "Angkor",
			"Annie Use Your Telescope" => "Annie Use Your Telescope",
			"Anonymous Pro" => "Anonymous Pro",
			"Antic" => "Antic",
			"Antic Didone" => "Antic Didone",
			"Antic Slab" => "Antic Slab",
			"Anton" => "Anton",
			"Arapey" => "Arapey",
			"Arbutus" => "Arbutus",
			"Arbutus Slab" => "Arbutus Slab",
			"Architects Daughter" => "Architects Daughter",
			"Archivo Black" => "Archivo Black",
			"Archivo Narrow" => "Archivo Narrow",
			"Arimo" => "Arimo",
			"Arizonia" => "Arizonia",
			"Armata" => "Armata",
			"Artifika" => "Artifika",
			"Arvo" => "Arvo",
			"Asap" => "Asap",
			"Asset" => "Asset",
			"Astloch" => "Astloch",
			"Asul" => "Asul",
			"Atomic Age" => "Atomic Age",
			"Aubrey" => "Aubrey",
			"Audiowide" => "Audiowide",
			"Autour One" => "Autour One",
			"Average" => "Average",
			"Average Sans" => "Average Sans",
			"Averia Gruesa Libre" => "Averia Gruesa Libre",
			"Averia Libre" => "Averia Libre",
			"Averia Sans Libre" => "Averia Sans Libre",
			"Averia Serif Libre" => "Averia Serif Libre",
			"Bad Script" => "Bad Script",
			"Balthazar" => "Balthazar",
			"Bangers" => "Bangers",
			"Basic" => "Basic",
			"Battambang" => "Battambang",
			"Baumans" => "Baumans",
			"Bayon" => "Bayon",
			"Belgrano" => "Belgrano",
			"Belleza" => "Belleza",
			"BenchNine" => "BenchNine",
			"Bentham" => "Bentham",
			"Berkshire Swash" => "Berkshire Swash",
			"Bevan" => "Bevan",
			"Bigelow Rules" => "Bigelow Rules",
			"Bigshot One" => "Bigshot One",
			"Bilbo" => "Bilbo",
			"Bilbo Swash Caps" => "Bilbo Swash Caps",
			"Bitter" => "Bitter",
			"Black Ops One" => "Black Ops One",
			"Bokor" => "Bokor",
			"Bonbon" => "Bonbon",
			"Boogaloo" => "Boogaloo",
			"Bowlby One" => "Bowlby One",
			"Bowlby One SC" => "Bowlby One SC",
			"Brawler" => "Brawler",
			"Bree Serif" => "Bree Serif",
			"Bubblegum Sans" => "Bubblegum Sans",
			"Bubbler One" => "Bubbler One",
			"Buda" => "Buda",
			"Buenard" => "Buenard",
			"Butcherman" => "Butcherman",
			"Butterfly Kids" => "Butterfly Kids",
			"Cabin" => "Cabin",
			"Cabin Condensed" => "Cabin Condensed",
			"Cabin Sketch" => "Cabin Sketch",
			"Caesar Dressing" => "Caesar Dressing",
			"Cagliostro" => "Cagliostro",
			"Calligraffitti" => "Calligraffitti",
			"Cambo" => "Cambo",
			"Candal" => "Candal",
			"Cantarell" => "Cantarell",
			"Cantata One" => "Cantata One",
			"Cantora One" => "Cantora One",
			"Capriola" => "Capriola",
			"Cardo" => "Cardo",
			"Carme" => "Carme",
			"Carrois Gothic" => "Carrois Gothic",
			"Carrois Gothic SC" => "Carrois Gothic SC",
			"Carter One" => "Carter One",
			"Caudex" => "Caudex",
			"Cedarville Cursive" => "Cedarville Cursive",
			"Ceviche One" => "Ceviche One",
			"Changa One" => "Changa One",
			"Chango" => "Chango",
			"Chau Philomene One" => "Chau Philomene One",
			"Chela One" => "Chela One",
			"Chelsea Market" => "Chelsea Market",
			"Chenla" => "Chenla",
			"Cherry Cream Soda" => "Cherry Cream Soda",
			"Cherry Swash" => "Cherry Swash",
			"Chewy" => "Chewy",
			"Chicle" => "Chicle",
			"Chivo" => "Chivo",
			"Cinzel" => "Cinzel",
			"Cinzel Decorative" => "Cinzel Decorative",
			"Clicker Script" => "Clicker Script",
			"Coda" => "Coda",
			"Coda Caption" => "Coda Caption",
			"Codystar" => "Codystar",
			"Combo" => "Combo",
			"Comfortaa" => "Comfortaa",
			"Coming Soon" => "Coming Soon",
			"Concert One" => "Concert One",
			"Condiment" => "Condiment",
			"Content" => "Content",
			"Contrail One" => "Contrail One",
			"Convergence" => "Convergence",
			"Cookie" => "Cookie",
			"Copse" => "Copse",
			"Corben" => "Corben",
			"Courgette" => "Courgette",
			"Cousine" => "Cousine",
			"Coustard" => "Coustard",
			"Covered By Your Grace" => "Covered By Your Grace",
			"Crafty Girls" => "Crafty Girls",
			"Creepster" => "Creepster",
			"Crete Round" => "Crete Round",
			"Crimson Text" => "Crimson Text",
			"Croissant One" => "Croissant One",
			"Crushed" => "Crushed",
			"Cuprum" => "Cuprum",
			"Cutive" => "Cutive",
			"Cutive Mono" => "Cutive Mono",
			"Damion" => "Damion",
			"Dancing Script" => "Dancing Script",
			"Dangrek" => "Dangrek",
			"Dawning of a New Day" => "Dawning of a New Day",
			"Days One" => "Days One",
			"Delius" => "Delius",
			"Delius Swash Caps" => "Delius Swash Caps",
			"Delius Unicase" => "Delius Unicase",
			"Della Respira" => "Della Respira",
			"Denk One" => "Denk One",
			"Devonshire" => "Devonshire",
			"Didact Gothic" => "Didact Gothic",
			"Diplomata" => "Diplomata",
			"Diplomata SC" => "Diplomata SC",
			"Domine" => "Domine",
			"Donegal One" => "Donegal One",
			"Doppio One" => "Doppio One",
			"Dorsa" => "Dorsa",
			"Dosis" => "Dosis",
			"Dr Sugiyama" => "Dr Sugiyama",
			"Droid Sans" => "Droid Sans",
			"Droid Sans Mono" => "Droid Sans Mono",
			"Droid Serif" => "Droid Serif",
			"Duru Sans" => "Duru Sans",
			"Dynalight" => "Dynalight",
			"EB Garamond" => "EB Garamond",
			"Eagle Lake" => "Eagle Lake",
			"Eater" => "Eater",
			"Economica" => "Economica",
			"Ek Mukta" => "Ek Mukta",
			"Electrolize" => "Electrolize",
			"Elsie" => "Elsie",
			"Elsie Swash Caps" => "Elsie Swash Caps",
			"Emblema One" => "Emblema One",
			"Emilys Candy" => "Emilys Candy",
			"Engagement" => "Engagement",
			"Englebert" => "Englebert",
			"Enriqueta" => "Enriqueta",
			"Erica One" => "Erica One",
			"Esteban" => "Esteban",
			"Euphoria Script" => "Euphoria Script",
			"Ewert" => "Ewert",
			"Exo" => "Exo",
			"Exo 2" => "Exo 2",
			"Expletus Sans" => "Expletus Sans",
			"Fanwood Text" => "Fanwood Text",
			"Fascinate" => "Fascinate",
			"Fascinate Inline" => "Fascinate Inline",
			"Faster One" => "Faster One",
			"Fasthand" => "Fasthand",
			"Fauna One" => "Fauna One",
			"Federant" => "Federant",
			"Federo" => "Federo",
			"Felipa" => "Felipa",
			"Fenix" => "Fenix",
			"Finger Paint" => "Finger Paint",
			"Fira Mono" => "Fira Mono",
			"Fira Sans" => "Fira Sans",
			"Fjalla One" => "Fjalla One",
			"Fjord One" => "Fjord One",
			"Flamenco" => "Flamenco",
			"Flavors" => "Flavors",
			"Fondamento" => "Fondamento",
			"Fontdiner Swanky" => "Fontdiner Swanky",
			"Forum" => "Forum",
			"Francois One" => "Francois One",
			"Freckle Face" => "Freckle Face",
			"Fredericka the Great" => "Fredericka the Great",
			"Fredoka One" => "Fredoka One",
			"Freehand" => "Freehand",
			"Fresca" => "Fresca",
			"Frijole" => "Frijole",
			"Fruktur" => "Fruktur",
			"Fugaz One" => "Fugaz One",
			"GFS Didot" => "GFS Didot",
			"GFS Neohellenic" => "GFS Neohellenic",
			"Gabriela" => "Gabriela",
			"Gafata" => "Gafata",
			"Galdeano" => "Galdeano",
			"Galindo" => "Galindo",
			"Gentium Basic" => "Gentium Basic",
			"Gentium Book Basic" => "Gentium Book Basic",
			"Geo" => "Geo",
			"Geostar" => "Geostar",
			"Geostar Fill" => "Geostar Fill",
			"Germania One" => "Germania One",
			"Gilda Display" => "Gilda Display",
			"Give You Glory" => "Give You Glory",
			"Glass Antiqua" => "Glass Antiqua",
			"Glegoo" => "Glegoo",
			"Gloria Hallelujah" => "Gloria Hallelujah",
			"Goblin One" => "Goblin One",
			"Gochi Hand" => "Gochi Hand",
			"Gorditas" => "Gorditas",
			"Goudy Bookletter 1911" => "Goudy Bookletter 1911",
			"Graduate" => "Graduate",
			"Grand Hotel" => "Grand Hotel",
			"Gravitas One" => "Gravitas One",
			"Great Vibes" => "Great Vibes",
			"Griffy" => "Griffy",
			"Gruppo" => "Gruppo",
			"Gudea" => "Gudea",
			"Habibi" => "Habibi",
			"Halant" => "Halant",
			"Hammersmith One" => "Hammersmith One",
			"Hanalei" => "Hanalei",
			"Hanalei Fill" => "Hanalei Fill",
			"Handlee" => "Handlee",
			"Hanuman" => "Hanuman",
			"Happy Monkey" => "Happy Monkey",
			"Headland One" => "Headland One",
			"Henny Penny" => "Henny Penny",
			"Herr Von Muellerhoff" => "Herr Von Muellerhoff",
			"Hind" => "Hind",
			"Holtwood One SC" => "Holtwood One SC",
			"Homemade Apple" => "Homemade Apple",
			"Homenaje" => "Homenaje",
			"IM Fell DW Pica" => "IM Fell DW Pica",
			"IM Fell DW Pica SC" => "IM Fell DW Pica SC",
			"IM Fell Double Pica" => "IM Fell Double Pica",
			"IM Fell Double Pica SC" => "IM Fell Double Pica SC",
			"IM Fell English" => "IM Fell English",
			"IM Fell English SC" => "IM Fell English SC",
			"IM Fell French Canon" => "IM Fell French Canon",
			"IM Fell French Canon SC" => "IM Fell French Canon SC",
			"IM Fell Great Primer" => "IM Fell Great Primer",
			"IM Fell Great Primer SC" => "IM Fell Great Primer SC",
			"Iceberg" => "Iceberg",
			"Iceland" => "Iceland",
			"Imprima" => "Imprima",
			"Inconsolata" => "Inconsolata",
			"Inder" => "Inder",
			"Indie Flower" => "Indie Flower",
			"Inika" => "Inika",
			"Irish Grover" => "Irish Grover",
			"Istok Web" => "Istok Web",
			"Italiana" => "Italiana",
			"Italianno" => "Italianno",
			"Jacques Francois" => "Jacques Francois",
			"Jacques Francois Shadow" => "Jacques Francois Shadow",
			"Jim Nightshade" => "Jim Nightshade",
			"Jockey One" => "Jockey One",
			"Jolly Lodger" => "Jolly Lodger",
			"Josefin Sans" => "Josefin Sans",
			"Josefin Slab" => "Josefin Slab",
			"Joti One" => "Joti One",
			"Judson" => "Judson",
			"Julee" => "Julee",
			"Julius Sans One" => "Julius Sans One",
			"Junge" => "Junge",
			"Jura" => "Jura",
			"Just Another Hand" => "Just Another Hand",
			"Just Me Again Down Here" => "Just Me Again Down Here",
			"Kalam" => "Kalam",
			"Kameron" => "Kameron",
			"Kantumruy" => "Kantumruy",
			"Karla" => "Karla",
			"Karma" => "Karma",
			"Kaushan Script" => "Kaushan Script",
			"Kavoon" => "Kavoon",
			"Kdam Thmor" => "Kdam Thmor",
			"Keania One" => "Keania One",
			"Kelly Slab" => "Kelly Slab",
			"Kenia" => "Kenia",
			"Khand" => "Khand",
			"Khmer" => "Khmer",
			"Kite One" => "Kite One",
			"Knewave" => "Knewave",
			"Kotta One" => "Kotta One",
			"Koulen" => "Koulen",
			"Kranky" => "Kranky",
			"Kreon" => "Kreon",
			"Kristi" => "Kristi",
			"Krona One" => "Krona One",
			"La Belle Aurore" => "La Belle Aurore",
			"Laila" => "Laila",
			"Lancelot" => "Lancelot",
			"Lato" => "Lato",
			"League Script" => "League Script",
			"Leckerli One" => "Leckerli One",
			"Ledger" => "Ledger",
			"Lekton" => "Lekton",
			"Lemon" => "Lemon",
			"Libre Baskerville" => "Libre Baskerville",
			"Life Savers" => "Life Savers",
			"Lilita One" => "Lilita One",
			"Lily Script One" => "Lily Script One",
			"Limelight" => "Limelight",
			"Linden Hill" => "Linden Hill",
			"Lobster" => "Lobster",
			"Lobster Two" => "Lobster Two",
			"Londrina Outline" => "Londrina Outline",
			"Londrina Shadow" => "Londrina Shadow",
			"Londrina Sketch" => "Londrina Sketch",
			"Londrina Solid" => "Londrina Solid",
			"Lora" => "Lora",
			"Love Ya Like A Sister" => "Love Ya Like A Sister",
			"Loved by the King" => "Loved by the King",
			"Lovers Quarrel" => "Lovers Quarrel",
			"Luckiest Guy" => "Luckiest Guy",
			"Lusitana" => "Lusitana",
			"Lustria" => "Lustria",
			"Macondo" => "Macondo",
			"Macondo Swash Caps" => "Macondo Swash Caps",
			"Magra" => "Magra",
			"Maiden Orange" => "Maiden Orange",
			"Mako" => "Mako",
			"Marcellus" => "Marcellus",
			"Marcellus SC" => "Marcellus SC",
			"Marck Script" => "Marck Script",
			"Margarine" => "Margarine",
			"Marko One" => "Marko One",
			"Marmelad" => "Marmelad",
			"Marvel" => "Marvel",
			"Mate" => "Mate",
			"Mate SC" => "Mate SC",
			"Maven Pro" => "Maven Pro",
			"McLaren" => "McLaren",
			"Meddon" => "Meddon",
			"MedievalSharp" => "MedievalSharp",
			"Medula One" => "Medula One",
			"Megrim" => "Megrim",
			"Meie Script" => "Meie Script",
			"Merienda" => "Merienda",
			"Merienda One" => "Merienda One",
			"Merriweather" => "Merriweather",
			"Merriweather Sans" => "Merriweather Sans",
			"Metal" => "Metal",
			"Metal Mania" => "Metal Mania",
			"Metamorphous" => "Metamorphous",
			"Metrophobic" => "Metrophobic",
			"Michroma" => "Michroma",
			"Milonga" => "Milonga",
			"Miltonian" => "Miltonian",
			"Miltonian Tattoo" => "Miltonian Tattoo",
			"Miniver" => "Miniver",
			"Miss Fajardose" => "Miss Fajardose",
			"Modern Antiqua" => "Modern Antiqua",
			"Molengo" => "Molengo",
			"Molle" => "Molle",
			"Monda" => "Monda",
			"Monofett" => "Monofett",
			"Monoton" => "Monoton",
			"Monsieur La Doulaise" => "Monsieur La Doulaise",
			"Montaga" => "Montaga",
			"Montez" => "Montez",
			"Montserrat" => "Montserrat",
			"Montserrat Alternates" => "Montserrat Alternates",
			"Montserrat Subrayada" => "Montserrat Subrayada",
			"Moul" => "Moul",
			"Moulpali" => "Moulpali",
			"Mountains of Christmas" => "Mountains of Christmas",
			"Mouse Memoirs" => "Mouse Memoirs",
			"Mr Bedfort" => "Mr Bedfort",
			"Mr Dafoe" => "Mr Dafoe",
			"Mr De Haviland" => "Mr De Haviland",
			"Mrs Saint Delafield" => "Mrs Saint Delafield",
			"Mrs Sheppards" => "Mrs Sheppards",
			"Muli" => "Muli",
			"Mystery Quest" => "Mystery Quest",
			"Neucha" => "Neucha",
			"Neuton" => "Neuton",
			"New Rocker" => "New Rocker",
			"News Cycle" => "News Cycle",
			"Niconne" => "Niconne",
			"Nixie One" => "Nixie One",
			"Nobile" => "Nobile",
			"Nokora" => "Nokora",
			"Norican" => "Norican",
			"Nosifer" => "Nosifer",
			"Nothing You Could Do" => "Nothing You Could Do",
			"Noticia Text" => "Noticia Text",
			"Noto Sans" => "Noto Sans",
			"Noto Serif" => "Noto Serif",
			"Nova Cut" => "Nova Cut",
			"Nova Flat" => "Nova Flat",
			"Nova Mono" => "Nova Mono",
			"Nova Oval" => "Nova Oval",
			"Nova Round" => "Nova Round",
			"Nova Script" => "Nova Script",
			"Nova Slim" => "Nova Slim",
			"Nova Square" => "Nova Square",
			"Numans" => "Numans",
			"Nunito" => "Nunito",
			"Odor Mean Chey" => "Odor Mean Chey",
			"Offside" => "Offside",
			"Old Standard TT" => "Old Standard TT",
			"Oldenburg" => "Oldenburg",
			"Oleo Script" => "Oleo Script",
			"Oleo Script Swash Caps" => "Oleo Script Swash Caps",
			"Open Sans" => "Open Sans",
			"Open Sans Condensed" => "Open Sans Condensed",
			"Oranienbaum" => "Oranienbaum",
			"Orbitron" => "Orbitron",
			"Oregano" => "Oregano",
			"Orienta" => "Orienta",
			"Original Surfer" => "Original Surfer",
			"Oswald" => "Oswald",
			"Over the Rainbow" => "Over the Rainbow",
			"Overlock" => "Overlock",
			"Overlock SC" => "Overlock SC",
			"Ovo" => "Ovo",
			"Oxygen" => "Oxygen",
			"Oxygen Mono" => "Oxygen Mono",
			"PT Mono" => "PT Mono",
			"PT Sans" => "PT Sans",
			"PT Sans Caption" => "PT Sans Caption",
			"PT Sans Narrow" => "PT Sans Narrow",
			"PT Serif" => "PT Serif",
			"PT Serif Caption" => "PT Serif Caption",
			"Pacifico" => "Pacifico",
			"Paprika" => "Paprika",
			"Parisienne" => "Parisienne",
			"Passero One" => "Passero One",
			"Passion One" => "Passion One",
			"Pathway Gothic One" => "Pathway Gothic One",
			"Patrick Hand" => "Patrick Hand",
			"Patrick Hand SC" => "Patrick Hand SC",
			"Patua One" => "Patua One",
			"Paytone One" => "Paytone One",
			"Peralta" => "Peralta",
			"Permanent Marker" => "Permanent Marker",
			"Petit Formal Script" => "Petit Formal Script",
			"Petrona" => "Petrona",
			"Philosopher" => "Philosopher",
			"Piedra" => "Piedra",
			"Pinyon Script" => "Pinyon Script",
			"Pirata One" => "Pirata One",
			"Plaster" => "Plaster",
			"Play" => "Play",
			"Playball" => "Playball",
			"Playfair Display" => "Playfair Display",
			"Playfair Display SC" => "Playfair Display SC",
			"Podkova" => "Podkova",
			"Poiret One" => "Poiret One",
			"Poller One" => "Poller One",
			"Poly" => "Poly",
			"Pompiere" => "Pompiere",
			"Pontano Sans" => "Pontano Sans",
			"Port Lligat Sans" => "Port Lligat Sans",
			"Port Lligat Slab" => "Port Lligat Slab",
			"Prata" => "Prata",
			"Preahvihear" => "Preahvihear",
			"Press Start 2P" => "Press Start 2P",
			"Princess Sofia" => "Princess Sofia",
			"Prociono" => "Prociono",
			"Prosto One" => "Prosto One",
			"Puritan" => "Puritan",
			"Purple Purse" => "Purple Purse",
			"Quando" => "Quando",
			"Quantico" => "Quantico",
			"Quattrocento" => "Quattrocento",
			"Quattrocento Sans" => "Quattrocento Sans",
			"Questrial" => "Questrial",
			"Quicksand" => "Quicksand",
			"Quintessential" => "Quintessential",
			"Qwigley" => "Qwigley",
			"Racing Sans One" => "Racing Sans One",
			"Radley" => "Radley",
			"Rajdhani" => "Rajdhani",
			"Raleway" => "Raleway",
			"Raleway Dots" => "Raleway Dots",
			"Rambla" => "Rambla",
			"Rammetto One" => "Rammetto One",
			"Ranchers" => "Ranchers",
			"Rancho" => "Rancho",
			"Rationale" => "Rationale",
			"Redressed" => "Redressed",
			"Reenie Beanie" => "Reenie Beanie",
			"Revalia" => "Revalia",
			"Ribeye" => "Ribeye",
			"Ribeye Marrow" => "Ribeye Marrow",
			"Righteous" => "Righteous",
			"Risque" => "Risque",
			"Roboto" => "Roboto",
			"Roboto Condensed" => "Roboto Condensed",
			"Roboto Slab" => "Roboto Slab",
			"Rochester" => "Rochester",
			"Rock Salt" => "Rock Salt",
			"Rokkitt" => "Rokkitt",
			"Romanesco" => "Romanesco",
			"Ropa Sans" => "Ropa Sans",
			"Rosario" => "Rosario",
			"Rosarivo" => "Rosarivo",
			"Rouge Script" => "Rouge Script",
			"Rozha One" => "Rozha One",
			"Rubik Mono One" => "Rubik Mono One",
			"Rubik One" => "Rubik One",
			"Ruda" => "Ruda",
			"Rufina" => "Rufina",
			"Ruge Boogie" => "Ruge Boogie",
			"Ruluko" => "Ruluko",
			"Rum Raisin" => "Rum Raisin",
			"Ruslan Display" => "Ruslan Display",
			"Russo One" => "Russo One",
			"Ruthie" => "Ruthie",
			"Rye" => "Rye",
			"Sacramento" => "Sacramento",
			"Sail" => "Sail",
			"Salsa" => "Salsa",
			"Sanchez" => "Sanchez",
			"Sancreek" => "Sancreek",
			"Sansita One" => "Sansita One",
			"Sarina" => "Sarina",
			"Sarpanch" => "Sarpanch",
			"Satisfy" => "Satisfy",
			"Scada" => "Scada",
			"Schoolbell" => "Schoolbell",
			"Seaweed Script" => "Seaweed Script",
			"Sevillana" => "Sevillana",
			"Seymour One" => "Seymour One",
			"Shadows Into Light" => "Shadows Into Light",
			"Shadows Into Light Two" => "Shadows Into Light Two",
			"Shanti" => "Shanti",
			"Share" => "Share",
			"Share Tech" => "Share Tech",
			"Share Tech Mono" => "Share Tech Mono",
			"Shojumaru" => "Shojumaru",
			"Short Stack" => "Short Stack",
			"Siemreap" => "Siemreap",
			"Sigmar One" => "Sigmar One",
			"Signika" => "Signika",
			"Signika Negative" => "Signika Negative",
			"Simonetta" => "Simonetta",
			"Sintony" => "Sintony",
			"Sirin Stencil" => "Sirin Stencil",
			"Six Caps" => "Six Caps",
			"Skranji" => "Skranji",
			"Slabo 13px" => "Slabo 13px",
			"Slabo 27px" => "Slabo 27px",
			"Slackey" => "Slackey",
			"Smokum" => "Smokum",
			"Smythe" => "Smythe",
			"Sniglet" => "Sniglet",
			"Snippet" => "Snippet",
			"Snowburst One" => "Snowburst One",
			"Sofadi One" => "Sofadi One",
			"Sofia" => "Sofia",
			"Sonsie One" => "Sonsie One",
			"Sorts Mill Goudy" => "Sorts Mill Goudy",
			"Source Code Pro" => "Source Code Pro",
			"Source Sans Pro" => "Source Sans Pro",
			"Source Serif Pro" => "Source Serif Pro",
			"Special Elite" => "Special Elite",
			"Spicy Rice" => "Spicy Rice",
			"Spinnaker" => "Spinnaker",
			"Spirax" => "Spirax",
			"Squada One" => "Squada One",
			"Stalemate" => "Stalemate",
			"Stalinist One" => "Stalinist One",
			"Stardos Stencil" => "Stardos Stencil",
			"Stint Ultra Condensed" => "Stint Ultra Condensed",
			"Stint Ultra Expanded" => "Stint Ultra Expanded",
			"Stoke" => "Stoke",
			"Strait" => "Strait",
			"Sue Ellen Francisco" => "Sue Ellen Francisco",
			"Sunshiney" => "Sunshiney",
			"Supermercado One" => "Supermercado One",
			"Suwannaphum" => "Suwannaphum",
			"Swanky and Moo Moo" => "Swanky and Moo Moo",
			"Syncopate" => "Syncopate",
			"Tangerine" => "Tangerine",
			"Taprom" => "Taprom",
			"Tauri" => "Tauri",
			"Teko" => "Teko",
			"Telex" => "Telex",
			"Tenor Sans" => "Tenor Sans",
			"Text Me One" => "Text Me One",
			"The Girl Next Door" => "The Girl Next Door",
			"Tienne" => "Tienne",
			"Tinos" => "Tinos",
			"Titan One" => "Titan One",
			"Titillium Web" => "Titillium Web",
			"Trade Winds" => "Trade Winds",
			"Trocchi" => "Trocchi",
			"Trochut" => "Trochut",
			"Trykker" => "Trykker",
			"Tulpen One" => "Tulpen One",
			"Ubuntu" => "Ubuntu",
			"Ubuntu Condensed" => "Ubuntu Condensed",
			"Ubuntu Mono" => "Ubuntu Mono",
			"Ultra" => "Ultra",
			"Uncial Antiqua" => "Uncial Antiqua",
			"Underdog" => "Underdog",
			"Unica One" => "Unica One",
			"UnifrakturCook" => "UnifrakturCook",
			"UnifrakturMaguntia" => "UnifrakturMaguntia",
			"Unkempt" => "Unkempt",
			"Unlock" => "Unlock",
			"Unna" => "Unna",
			"VT323" => "VT323",
			"Vampiro One" => "Vampiro One",
			"Varela" => "Varela",
			"Varela Round" => "Varela Round",
			"Vast Shadow" => "Vast Shadow",
			"Vesper Libre" => "Vesper Libre",
			"Vibur" => "Vibur",
			"Vidaloka" => "Vidaloka",
			"Viga" => "Viga",
			"Voces" => "Voces",
			"Volkhov" => "Volkhov",
			"Vollkorn" => "Vollkorn",
			"Voltaire" => "Voltaire",
			"Waiting for the Sunrise" => "Waiting for the Sunrise",
			"Wallpoet" => "Wallpoet",
			"Walter Turncoat" => "Walter Turncoat",
			"Warnes" => "Warnes",
			"Wellfleet" => "Wellfleet",
			"Wendy One" => "Wendy One",
			"Wire One" => "Wire One",
			"Yanone Kaffeesatz" => "Yanone Kaffeesatz",
			"Yellowtail" => "Yellowtail",
			"Yeseva One" => "Yeseva One",
			"Yesteryear" => "Yesteryear",
			"Zeyada" => "Zeyada",
		);

		/*-----------------------------------------------------------------------------------*/
		/* The Options Array */
		/*-----------------------------------------------------------------------------------*/

// Set the Options Array
		global $of_options;
		$of_options = array();

		$of_options[] = array( "name" => __("General", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Import Demo Content", "Avada"),
			"desc" => __("Select Which Demo To Import. Please ensure our plugins are activated before content is imported.", "Avada"),
			"id" => "demo_data",
			"std" => "",
			"btntext" => __('Import Demo Content', 'Avada'),
			"type" => "button",
			"options" => array(
				'classic' => __('Classic Demo', 'Avada'),
				'agency' => __('Agency Demo', 'Avada'),
			));

		$of_options[] = array( "name" => __("Responsive", "Avada"),
			"desc" => "",
			"id" => "responsive",
			"std" => "<h3 style='margin: 0;'>" . __("Responsive Options", "Avada") . "</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Responsive Design", "Avada"),
			"desc" => __("Check this box to use the responsive design features. If left unchecked then the fixed layout is used.", "Avada"),
			"id" => "responsive",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Use Fixed Layout for iPad Portrait", "Avada"),
			"desc" => __("Check this box to use the fixed layout for the iPad in portrait view.", "Avada"),
			"id" => "ipad_potrait",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Code", "Avada"),
			"desc" => "",
			"id" => "code",
			"std" => "<h3 style='margin: 0;'>" . __("Tracking / Space Before Head / Space Before Body Code", "Avada") . "</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Tracking Code", "Avada"),
			"desc" => __("Paste your Google Analytics (or other) tracking code here. This will be added into the header template of your theme. Please put code inside script tags.", "Avada"),
			"id" => "google_analytics",
			"std" => "",
			"type" => "textarea");

		$of_options[] = array( "name" => __("Space before &lt;/head&gt;", "Avada"),
			"desc" => __("Add code before the &lt;/head&gt; tag.", "Avada"),
			"id" => "space_head",
			"std" => "",
			"type" => "textarea");

		$of_options[] = array( "name" => __("Space before &lt;/body&gt;", "Avada"),
			"desc" => __("Add code before the &lt;/body&gt; tag.", "Avada"),
			"id" => "space_body",
			"std" => "",
			"type" => "textarea");

		$of_options[] = array( "name" => __("Site Width", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Layout", "Avada"),
			"desc" => __("Select boxed or wide layout.", "Avada"),
			"id" => "layout",
			"std" => "Wide",
			"type" => "select",
			"options" => array(
				'Boxed' => __('Boxed', 'Avada'),
				'Wide' => __('Wide', 'Avada'),
			));

		$of_options[] = array( "name" => __("Site Width", "Avada"),
			"desc" => __("Controls the overall site width. In px or %, ex: 100% or 1170px.", "Avada"),
			"id" => "site_width",
			"std" => "1100px",
			"type" => "text");

	   $of_options[] = array( "name" => __("Content + Sidebar Width", "Avada"),
			"desc" => "",
			"id" => "content_sidebar_width",
			"std" => "<h3 style='margin: 0;'>" . __("Content + Sidebar Width", "Avada") . "</h3><p>" . __("These settings are used on pages with 1 sidebar. Total values must add up to 100.", "Avada") . "</p>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Content Width", "Avada"),
			"desc" => __("Controls the width of the content area. In px or %, ex: 100% or 1170px.", "Avada"),
			"id" => "content_width",
			"std" => "77%",
			"type" => "text");

		$of_options[] = array( "name" => __("Sidebar Width", "Avada"),
			"desc" => __("Controls the width of the sidebar. In px or %, ex: 100% or 1170px.", "Avada"),
			"id" => "sidebar_width",
			"std" => "23%",
			"type" => "text");

	   $of_options[] = array( "name" => __("Content + Sidebar Width", "Avada"),
			"desc" => "",
			"id" => "content_sidebar_width",
			"std" => "<h3 style='margin: 0;'>" . __("Content + Sidebar Width", "Avada") . "</h3><p>" . __("These settings are used on pages with 1 sidebar. Total values must add up to 100.", "Avada") . "</p>",
			"position" => "end",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Content + Sidebar + Sidebar Width", "Avada"),
			"desc" => "",
			"id" => "content_sidebar_sidebar_width",
			"std" => "<h3 style='margin: 0;'>" . __("Content + Sidebar + Sidebar Width", "Avada") . "</h3><p>" . __("These settings are used on pages with 2 sidebars. Total values must add up to 100.", "Avada") . "</p>",
			"position" => "start",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Content Width", "Avada"),
			"desc" => __("Controls the width of the content area. In px or %, ex: 100% or 1170px.", "Avada"),
			"id" => "content_width_2",
			"std" => "58%",
			"type" => "text");

		$of_options[] = array( "name" => __("Sidebar 1 Width", "Avada"),
			"desc" => __("Controls the width of the sidebar 1. In px or %, ex: 100% or 1170px.", "Avada"),
			"id" => "sidebar_2_1_width",
			"std" => "21%",
			"type" => "text");

		$of_options[] = array( "name" => __("Sidebar 2 Width", "Avada"),
			"desc" => __("Controls the width of the sidebar 2. In px or %, ex: 100% or 1170px.", "Avada"),
			"id" => "sidebar_2_2_width",
			"std" => "21%",
			"type" => "text");

	   $of_options[] = array( "name" => __("Content + Sidebar + Sidebar Width", "Avada"),
			"desc" => "",
			"id" => "content_sidebar_sidebar_width",
			"std" => "<h3 style='margin: 0;'>" . __("Content + Sidebar + Sidebar Width", "Avada") . "</h3><p>" . __("These settings are used on pages with 2 sidebars. Total values must add up to 100.", "Avada") . "</p>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Header", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Header Info", "Avada"),
			"desc" => "",
			"id" => "header_info_1",
			"std" => "<h3 style='margin: 0;'>" . __("Header Content Options", "Avada") . "</h3>",
			"icon" => true,
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Header Position", "Avada"),
			"desc" => __("Select the position of header. Left/Right position will not display the header content options 1-3 on mobile devices, only on desktop.", "Avada"),
			"id" => "header_position",
			"std" => "Top",
			"type" => "select",
			"options" => array('Top' => __('Top', 'Avada'), 'Left' => __('Left', 'Avada'), 'Right' => __('Right', 'Avada')));

		$of_options[] = array( "name" => __("Select a Header Layout", "Avada"),
			"desc" => "",
			"id" => "header_layout",
			"std" => "v1",
			"type" => "images",
			"options" => array(
				"v1" => get_template_directory_uri()."/images/patterns/header1.jpg",
				"v2" => get_template_directory_uri()."/images/patterns/header2.jpg",
				"v3" => get_template_directory_uri()."/images/patterns/header3.jpg",
				"v4" => get_template_directory_uri()."/images/patterns/header4.jpg",
				"v5" => get_template_directory_uri()."/images/patterns/header5.jpg"
			));

		$of_options[] = array( "name" => __("Header Width For Left/Right Position", "Avada"),
			"desc" => __("Controls width of the left or right side header. In pixels, ex: 170px.", "Avada"),
			"id" => "side_header_width",
			"std" => "280px",
			"type" => "text");

		$of_options[] = array( "name" => __("Header Shadow", "Avada"),
			"desc" => __("Check this box to show a header drop shadow.", "Avada"),
			"id" => "header_shadow",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("100% Header Width", "Avada"),
			"desc" => __("Check this box to set the header to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.", "Avada"),
			"id" => "header_100_width",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Slider Position", "Avada"),
			"desc" => __("Select if the slider shows below or above the header.", "Avada"),
			"id" => "slider_position",
			"std" => "Below",
			"type" => "select",
			"options" => array('Below' => 'Below', 'Above' => 'Above'));

		$of_options[] = array( "name" => __("Header Content 1", "Avada"),
			"desc" => __("Select which content displays in the first content area.", "Avada"),
			"id" => "header_left_content",
			"std" => "Contact Info",
			"type" => "select",
			"options" => array('Contact Info' => 'Contact Info', 'Social Links' => 'Social Links', 'Navigation' => 'Navigation', 'Leave Empty' => 'Leave Empty'));

		$of_options[] = array( "name" => __("Header Content 2", "Avada"),
			"desc" => __("Select which content displays in the second content area.", "Avada"),
			"id" => "header_right_content",
			"std" => "Navigation",
			"type" => "select",
			 "options" => array('Contact Info' => 'Contact Info', 'Social Links' => 'Social Links', 'Navigation' => 'Navigation', 'Leave Empty' => 'Leave Empty'));

		$of_options[] = array( "name" => __("Header Content 3", "Avada"),
			"desc" => __("Select which content displays in the third content area.", "Avada"),
			"id" => "header_v4_content",
			"std" => "Tagline And Search",
			"type" => "select",
			"options" => array('Tagline' => 'Tagline', 'Search' => 'Search', 'Tagline And Search' => 'Tagline And Search', 'Banner' => 'Banner', 'None' => 'Leave Empty'));

		$of_options[] = array( "name" => __("Phone Number For Contact Info", "Avada"),
			"desc" => __("Phone number will display in the Contact Info section of your top header.", "Avada"),
			"id" => "header_number",
			"std" => "Call Us Today! 1.555.555.555",
			"type" => "textarea");

		$of_options[] = array( "name" => __("Email Address For Contact Info", "Avada"),
			"desc" => __("Email address will display in the Contact Info section of your top header.", "Avada"),
			"id" => "header_email",
			"std" => "info@yourdomain.com",
			"type" => "text");

		$of_options[] = array( "name" => __("Banner Code For Content 3", "Avada"),
			"desc" => __("Add HTML banner code for Header Content 3. The banner or image will display as long as you have Banner selected for the Header Content 3 option above.", "Avada"),
			"id" => "header_banner_code",
			"std" => '',
			"type" => "textarea");

		$of_options[] = array( "name" => __("Tagline For Content 3", "Avada"),
			"desc" => __("Tagline will display as long as you have Tagline selected for the Header Content 3 option above.", "Avada"),
			"id" => "header_tagline",
			"std" => "Insert Tagline Here",
			"type" => "text");

		$of_options[] = array( "name" => __("Header Info", "Avada"),
			"desc" => "",
			"id" => "header_info_1",
			"std" => "<h3 style='margin: 0;'>" . __("Header Content Options", "Avada") . "</h3>",
			"icon" => true,
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Header Info", "Avada"),
			"desc" => "",
			"id" => "header_info_2",
			"std" => "<h3 style='margin: 0;'>" . __("Header Background", "Avada") . "</h3>",
			"icon" => true,
			"position" => "start",
			"type" => "accordion");	

		$of_options[] = array( "name" => __("Background Image For Header Area", "Avada"),
			"desc" => __("Select an image or insert an image url to use for the header background.", "Avada"),
			"id" => "header_bg_image",
			"std" => "",
			"mod" => "",
			"type" => "media");

		$of_options[] = array( "name" => __("100% Background Image", "Avada"),
			"desc" => __("Check this box to have the header background image display at 100% in width and height and scale according to the browser size.", "Avada"),
			"id" => "header_bg_full",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Parallax Background Image", "Avada"),
			"desc" => __("Check this box to enable parallax scrolling on the background image for header top positions.", "Avada"),
			"id" => "header_bg_parallax",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Background Repeat", "Avada"),
			"desc" => __("Select how the background image repeats.", "Avada"),
			"id" => "header_bg_repeat",
			"std" => "",
			"type" => "select",
			"options" => array('repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y', 'no-repeat' => 'no-repeat'));

		// this is for padding, the id is wrong but there for legacy users
		$of_options[] = array( "name" => __("Header Top Padding", "Avada"),
			"desc" => __("In pixels, ex: 10px", "Avada"),
			"id" => "margin_header_top",
			"std" => "0px",
			"type" => "text");

		// this is for padding, the id is wrong but there for legacy users
		$of_options[] = array( "name" => __("Header Bottom Padding", "Avada"),
			"desc" => __("In pixels, ex: 10px", "Avada"),
			"id" => "margin_header_bottom",
			"std" => "0px",
			"type" => "text");

		$of_options[] = array( "name" => __("Header Left Padding", "Avada"),
			"desc" => __("In pixels, ex: 10px", "Avada"),
			"id" => "padding_header_left",
			"std" => "0px",
			"type" => "text");

		$of_options[] = array( "name" => __("Header Right Padding", "Avada"),
			"desc" => __("In pixels, ex: 10px", "Avada"),
			"id" => "padding_header_right",
			"std" => "0px",
			"type" => "text");

		$of_options[] = array( "name" => __("Header Info", "Avada"),
			"desc" => "",
			"id" => "header_info_2",
			"std" => "<h3 style='margin: 0;'>" . __("Header Background", "Avada") . "</h3>",
			"icon" => true,
			"position" => "end",
			"type" => "accordion");	

		$of_options[] = array( "name" => __("Header Info", "Avada"),
			"desc" => "",
			"id" => "header_info_3",
			"std" => "<h3 style='margin: 0;'>" . __("Header Social Icons", "Avada") . "</h3>",
			"icon" => true,
			"position" => "start",
			"type" => "accordion");	

		$of_options[] = array( "name" => __("Header Social Icons Custom Color", "Avada"),
			"desc" => __("Select a custom social icon color. For a different color per icon, separate the value with the | symbol. ex: #000|#fff", "Avada"),
			"id" => "header_social_links_icon_color",
			"std" => "#bebdbd",
			"type" => "color");

		$of_options[] = array( "name" => __("Header Social Icons Boxed", "Avada"),
			"desc" => __("Controls the color of the social icons in the footer.", "Avada"),
			"id" => "header_social_links_boxed",
			"std" => "No",
			"type" => "select",
			"options" => array('No' => 'No', 'Yes' => 'Yes'));

		$of_options[] = array( "name" => __("Header Social Icons Custom Box Color", "Avada"),
			"desc" => __("Select a custom social icon box color. For a different color per icon, separate the value with the | symbol. ex: #000|#fff", "Avada"),
			"id" => "header_social_links_box_color",
			"std" => "#e8e8e8",
			"type" => "color");

		$of_options[] = array( "name" => __("Header Social Icons Boxed Radius", "Avada"),
			"desc" => __("Boxradius for the social icons. In pixels, ex: 4px.", "Avada"),
			"id" => "header_social_links_boxed_radius",
			"std" => "4px",
			"type" => "text");

		$of_options[] = array( "name" => __("Header Social Icons Tooltip Position", "Avada"),
			"desc" => __("Controls the tooltip position of the social icons in the footer.", "Avada"),
			"id" => "header_social_links_tooltip_placement",
			"std" => "Bottom",
			"type" => "select",
			"options" => array( 'Top' => 'Top', 'Right' => 'Right', 'Bottom' => 'Bottom', 'Left' => 'Left', 'None' => 'None' ));

		$of_options[] = array( "name" => __("Header Info", "Avada"),
			"desc" => "",
			"id" => "header_info_3",
			"std" => "<h3 style='margin: 0;'>" . __("Header Social Icons", "Avada") . "</h3>",
			"icon" => true,
			"position" => "end",
			"type" => "accordion");	

		$of_options[] = array( "name" => __("Sticky Header", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Sticky Header Info", "Avada"),
			"desc" => "",
			"id" => "sticky_header_info",
			"std" => "<h3 style='margin: 0;'>" . __("Sticky Header Options", "Avada") . "</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Enable Sticky Header", "Avada"),
			"desc" => __("Check to enable a fixed header when scrolling, uncheck to disable.", "Avada"),
			"id" => "header_sticky",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Enable Sticky Header on Tablets", "Avada"),
			"desc" => __("Check to enable a fixed header when scrolling on tablets, uncheck to disable.", "Avada"),
			"id" => "header_sticky_tablet",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Enable Sticky Header on Mobiles", "Avada"),
			"desc" => __("Check to enable a fixed header when scrolling on mobiles, uncheck to disable.", "Avada"),
			"id" => "header_sticky_mobile",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Sticky Header Menu Item Padding", "Avada"),
			"desc" => __("Controls the space between each menu item in the sticky header. Use a number without 'px', default is 35. ex: 35", "Avada"),
			"id" => "header_sticky_nav_padding",
			"std" => "",
			"type" => "text");

		$of_options[] = array( "name" => __("Sticky Header Navigation Font Size", "Avada"),
			"desc" => __("Controls the font size of the menu items in the sticky header. Use a number without 'px', default is 14. ex: 14", "Avada"),
			"id" => "header_sticky_nav_font_size",
			"std" => "",
			"type" => "text");

		$of_options[] = array( "name" => __("Sticky Header Logo Width", "Avada"),
			"desc" => __("Controls the max-width of the sticky header logo. If your logo is too large and does not allow the menu to fit on one line, then use this option and insert a smaller width for your logo. ex: 120", "Avada"),
			"id" => "header_sticky_logo_max_width",
			"std" => "",
			"type" => "text");

		$of_options[] = array( "name" => __("Logo", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Header Info", "Avada"),
			"desc" => "",
			"id" => "header_info",
			"std" => "<h3 style='margin: 0;'>" . __("Logo Options", "Avada") . "</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Logo", "Avada"),
			"desc" => __("Select an image file for your logo.", "Avada"),
			"id" => "logo",
			"std" => get_template_directory_uri()."/images/logo.png",
			"mod" => "",
			"type" => "media");

		$of_options[] = array( "name" => __("Logo (Retina Version @2x)", "Avada"),
			"desc" => __("Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo.", "Avada"),
			"id" => "logo_retina",
			"std" => "",
			"mod" => "",
			"type" => "media");

		$of_options[] = array( "name" => __("Standard Logo Width for Retina Logo", "Avada"),
			"desc" => __("If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width.", "Avada"),
			"id" => "retina_logo_width",
			"std" => "",
			"type" => "text");

		$of_options[] = array( "name" => __("Standard Logo Height for Retina Logo", "Avada"),
			"desc" => __("If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height.", "Avada"),
			"id" => "retina_logo_height",
			"std" => "",
			"type" => "text");

		$of_options[] = array( "name" => __("Logo Alignment", "Avada"),
			"desc" => __("'Center' only works on Top Header 5 and on Side Headers.", "Avada"),
			"id" => "logo_alignment",
			"std" => "Left",
			"type" => "select",
			"options" => array('Left' => 'Left', 'Center' => 'Center', 'Right' => 'Right',));

		$of_options[] = array( "name" => __("Logo Left Margin", "Avada"),
			"desc" => __("In pixels, ex: 10px", "Avada"),
			"id" => "margin_logo_left",
			"std" => "0px",
			"type" => "text");

		$of_options[] = array( "name" => __("Logo Right Margin", "Avada"),
			"desc" => __("In pixels, ex: 10px", "Avada"),
			"id" => "margin_logo_right",
			"std" => "0px",
			"type" => "text");

		$of_options[] = array( "name" => __("Logo Top Margin", "Avada"),
			"desc" => __("In pixels, ex: 10px", "Avada"),
			"id" => "margin_logo_top",
			"std" => "31px",
			"type" => "text");

		$of_options[] = array( "name" => __("Logo Bottom Margin", "Avada"),
			"desc" => __("In pixels, ex: 10px", "Avada"),
			"id" => "margin_logo_bottom",
			"std" => "31px",
			"type" => "text");

		$of_options[] = array( "name" => __("Favicon Options", "Avada"),
			"desc" => "",
			"id" => "favicons",
			"std" => "<h3 style='margin: 0;'>" . __("Favicon Options", "Avada") . "</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Favicon", "Avada"),
			"desc" => __("Favicon for your website (16px x 16px).", "Avada"),
			"id" => "favicon",
			"std" => "",
			"type" => "upload");

		$of_options[] = array( "name" => __("Apple iPhone Icon Upload", "Avada"),
			"desc" => __("Favicon for Apple iPhone (57px x 57px).", "Avada"),
			"id" => "iphone_icon",
			"std" => "",
			"type" => "upload");

		$of_options[] = array( "name" => __("Apple iPhone Retina Icon Upload", "Avada"),
			"desc" => __("Favicon for Apple iPhone Retina Version (114px x 114px).", "Avada"),
			"id" => "iphone_icon_retina",
			"std" => "",
			"type" => "upload");

		$of_options[] = array( "name" => __("Apple iPad Icon Upload", "Avada"),
			"desc" => __("Favicon for Apple iPad (72px x 72px).", "Avada"),
			"id" => "ipad_icon",
			"std" => "",
			"type" => "upload");

		$of_options[] = array( "name" => __("Apple iPad Retina Icon Upload", "Avada"),
			"desc" => __("Favicon for Apple iPad Retina Version (144px x 144px).", "Avada"),
			"id" => "ipad_icon_retina",
			"std" => "",
			"type" => "upload");

		$of_options[] = array( "name" => __("Menu", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Header Info", "Avada"),
			"desc" => "",
			"id" => "header_info",
			"std" => "<h3 style='margin: 0;'>" . __("Menu Options", "Avada") . "</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Mobile Menu Design Style", "Avada"),
			"desc" => __("Select between classic or modern mobile design.", "Avada"),
			"id" => "mobile_menu_design",
			"std" => "classic",
			"options" => array('classic' => 'Classic', 'modern' => 'Modern'),
			"type" => "select");

		$of_options[] = array( "name" => __("Main Nav Height", "Avada"),
			"desc" => __("Controls menu height. Use a number without 'px', default is 83. ex: 83", "Avada"),
			"id" => "nav_height",
			"std" => "83",
			"type" => "text");
			
		$of_options[] = array( "name" => __("Main Menu Highlight Bar Size", "Avada"),
			"desc" => __("Controls the border size of the menu highlight bar. Use a number without 'px', default is 3, enter 0 to hide it. ex: 3.", "Avada"),
			"id" => "nav_highlight_border",
			"std" => "3",
			"type" => "text");			

		$of_options[] = array( "name" => __("Menu Item Padding", "Avada"),
			"desc" => __("Controls right (left on RTL) menu padding. Use a number without 'px', default is 45. ex: 45", "Avada"),
			"id" => "nav_padding",
			"std" => "45",
			"type" => "text");

		$of_options[] = array( "name" => __("Mobile Menu Item Padding", "Avada"),
			"desc" => __("Controls right (left on RTL) menu padding on mobile devices when the normal menu is used. Use a number without 'px', default is 25. ex: 25", "Avada"),
			"id" => "mobile_nav_padding",
			"std" => "25",
			"type" => "text");

		$of_options[] = array( "name" => __("Main Menu Dropdown Width", "Avada"),
			"desc" => __("In pixels, ex: 170px", "Avada"),
			"id" => "dropdown_menu_width",
			"std" => "170px",
			"type" => "text");
			
		$of_options[] = array( "name" => __("Top Menu Dropdown Width", "Avada"),
			"desc" => __("In pixels, ex: 100px", "Avada"),
			"id" => "topmenu_dropwdown_width",
			"std" => "100px",
			"type" => "text");
			
		$of_options[] = array( "name" => "Mega Menu Max-Width",
			"desc" => __('Controls the the max width of the mega menu. In pixels, ex: 1100px.', 'Avada'),
			"id" => "megamenu_max_width",
			"std" => "1100px",
			"type" => "text");			  

		$of_options[] = array( "name" => __("Mega Menu Column Title Size", "Avada"),
			"desc" => __("Set the font size for mega menu column titles (menu 2nd level labels). In pixels, ex: 18px", "Avada"),
			"id" => "megamenu_title_size",
			"std" => "18px",
			"type" => "text");

		$of_options[] = array( "name" => __("Menu Drop Shadow", "Avada"),
			"desc" => __("Check to enable the dropshadow for menu dropdowns, uncheck to disable.", "Avada"),
			"id" => "megamenu_shadow",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Show Search Icon in Main Nav?", "Avada"),
			"desc" => __("Check to enable the search icon in the menu, uncheck to disable.", "Avada"),
			"id" => "main_nav_search_icon",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Enable Circle Border On Menu Icons", "Avada"),
			"desc" => __("Check to enable a circle border on the main menu cart and search icons.", "Avada"),
			"id" => "main_nav_icon_circle",
			"std" => 0,
			"type" => "checkbox");
			
		$of_options[] = array( "name" => __("Mobile Menu Submenu Slide Outs", "Avada"),
			"desc" => __("Check to group submenu to slideout elements on mobile menu.", "Avada"),
			"id" => "mobile_nav_submenu_slideout",
			"std" => 1,
			"type" => "checkbox");			  

		$of_options[] = array( "name" => __("Page Title Bar", "Avada"),
			"type" => "heading");

			$of_options[] = array( "name" => __("Header Info", "Avada"),
			"desc" => "",
			"id" => "header_info",
			"std" => "<h3 style='margin: 0;'>" . __("Page Title Bar Options", "Avada") . "</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Page Title Bar", "Avada"),
			"desc" => __("Check the box to show the page title bar. This is a global option for every page or post, and this can be overridden by individual page/post options.", "Avada"),
			"id" => "page_title_bar",
			"std" => 1,
			"type" => "checkbox");
			
		$of_options[] = array( "name" => __("100% Page Title Width", "Avada"),
			"desc" => __("Check this box to set the page title content to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.", "Avada"),
			"id" => "page_title_100_width",
			"std" => 0,
			"type" => "checkbox");			

		$of_options[] = array( "name" => __("Page Title Bar Height", "Avada"),
			"desc" => __("In pixels, ex: 10px", "Avada"),
			"id" => "page_title_height",
			"std" => "87px",
			"type" => "text");
			
		$of_options[] = array( "name" => __("Page Title Bar Text Alignment", "Avada"),
			"desc" => __("Choose the title and subhead text alignment", "Avada"),
			"id" => "page_title_alignment",
			"std" => "left",
			"options" => array('left' => 'Left', 'center' => 'Center', 'right' => 'Right'),
			"type" => "select");

		$of_options[] = array( "name" => __("Page Title Bar Background", "Avada"),
			"desc" => __("Select an image or insert an image url to use for the page title bar background.", "Avada"),
			"id" => "page_title_bg",
			"std" => get_template_directory_uri()."/images/page_title_bg.png",
			"mod" => "",
			"type" => "media");

		$of_options[] = array( "name" => __("Page Title Bar Background (Retina Version @2x)", "Avada"),
			"desc" => __("Select an image or insert an image url to use for the retina page title bar background.", "Avada"),
			"id" => "page_title_bg_retina",
			"std" => "",
			"mod" => "",
			"type" => "media");

		$of_options[] = array( "name" => __("100% Background Image", "Avada"),
			"desc" => __("Check this box to have the page title bar background image display at 100% in width and height and scale according to the browser size.", "Avada"),
			"id" => "page_title_bg_full",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Parallax Background Image", "Avada"),
			"desc" => __("Check to enable parallax background image when scrolling.", "Avada"),
			"id" => "page_title_bg_parallax",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Fading Animation", "Avada"),
			"desc" => __("Choose to have the page title text fade on scroll.", "Avada"),
			"id" => "page_title_fading",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Header Info", "Avada"),
			"desc" => "",
			"id" => "header_info",
			"std" => "<h3 style='margin: 0;'>" . __("Breadcrumb Options", "Avada") . "</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Display Breadcrumbs/Search Bar", "Avada"),
			"desc" => __("Check to display the breadcrumbs or search bar in general. Uncheck to hide them.", "Avada"),
			"id" => "breadcrumb",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Breadcrumbs or Search Box?", "Avada"),
			"desc" => __("Choose to display breadcrumbs or search box in the page title bar.", "Avada"),
			"id" => "page_title_bar_bs",
			"std" => "Breadcrumbs",
			"options" => array('Breadcrumbs' => 'Breadcrumbs', 'Search Box' => 'Search Box'),
			"type" => "select");

		$of_options[] = array( "name" => __("Breadcrumbs on Mobile Devices", "Avada"),
			"desc" => __("Check to display breadcrumbs on mobile devices.", "Avada"),
			"id" => "breadcrumb_mobile",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Breadcrumb Menu Prefix", "Avada"),
			"desc" => __("The text before the breadcrumb menu.", "Avada"),
			"id" => "breacrumb_prefix",
			"std" => "",
			"type" => "text");

		$of_options[] = array( "name" => __("Sliding Bar", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Sliding Bar", "Avada"),
			"desc" => "",
			"id" => "sliding_bar",
			"std" => "<h3 style='margin: 0;'>" . __("Sliding Bar Options", "Avada") . "</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Enable Sliding Bar", "Avada"),
			"desc" => __("Check to enable the top Sliding Bar.", "Avada"),
			"id" => "slidingbar_widgets",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Sliding Bar On Mobile", "Avada"),
			"desc" => __("Check to disable the top Sliding Bar on mobile devices.", "Avada"),
			"id" => "mobile_slidingbar_widgets",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Enable Top Border on Sliding Bar", "Avada"),
			"desc" => __("Check to enable a top border on the Sliding Bar.", "Avada"),
			"id" => "slidingbar_top_border",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Sliding Bar Open On Page Load", "Avada"),
			"desc" => __("Check the box to have the sliding bar open when the page loads.", "Avada"),
			"id" => "slidingbar_open_on_load",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Number of Sliding Bar Columns", "Avada"),
			"desc" => __("Select the number of columns to display in the Sliding Bar.", "Avada"),
			"id" => "slidingbar_widgets_columns",
			"std" => "2",
			"options" => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'),
			"type" => "select");

		$of_options[] = array( "name" => __("Footer", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Footer Widgets Area", "Avada"),
			"desc" => "",
			"id" => "footer_widgets_area_title",
			"std" => "<h3 style='margin: 0;'>" . __("Footer Widgets Area Options", "Avada") . "</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Footer Widgets", "Avada"),
			"desc" => __("Check the box to display footer widgets.", "Avada"),
			"id" => "footer_widgets",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("100% Footer Width", "Avada"),
			"desc" => __("Check this box to set footer width to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.", "Avada"),
			"id" => "footer_100_width",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Number of Footer Columns", "Avada"),
			"desc" => __("Select the number of columns to display in the footer.", "Avada"),
			"id" => "footer_widgets_columns",
			"std" => "4",
			"options" => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'),
			"type" => "select");

		$of_options[] = array( "name" => __("Background Image For Footer Area", "Avada"),
			"desc" => __("Select an image or insert an image url to use for the footer widget area backgroud.", "Avada"),
			"id" => "footerw_bg_image",
			"std" => "",
			"mod" => "",
			"type" => "media");

		$of_options[] = array( "name" => __("100% Background Image", "Avada"),
			"desc" => __("Check this box to have the footer background image display at 100% in width and height and scale according to the browser size.", "Avada"),
			"id" => "footerw_bg_full",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Parallax Background Image", "Avada"),
			"desc" => __("Check to enable parallax background image when scrolling.", "Avada"),
			"id" => "footer_area_bg_parallax",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Background Repeat", "Avada"),
			"desc" => __("Select how the background image repeats.", "Avada"),
			"id" => "footerw_bg_repeat",
			"std" => "",
			"type" => "select",
			"options" => array('repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y', 'no-repeat' => 'no-repeat'));

		$of_options[] = array( "name" => __("Background Position", "Avada"),
			"desc" => __("Select the position from where background image starts.", "Avada"),
			"id" => "footerw_bg_pos",
			"std" => "center center",
			"type" => "select",
			"options" => $body_pos);

		$of_options[] = array( "name" => __("Footer Top Padding", "Avada"),
			"desc" => __("In pixels, ex: 20px", "Avada"),
			"id" => "footer_area_top_padding",
			"std" => "43px",
			"type" => "text");

		$of_options[] = array( "name" => __("Footer Bottom Padding", "Avada"),
			"desc" => __("In pixels, ex: 20px", "Avada"),
			"id" => "footer_area_bottom_padding",
			"std" => "40px",
			"type" => "text");


		$of_options[] = array( "name" => __("Footer Left Padding", "Avada"),
			"desc" => __("In pixels, ex: 20px", "Avada"),
			"id" => "footer_area_left_padding",
			"std" => "0px",
			"type" => "text");

		$of_options[] = array( "name" => __("Footer Right Padding", "Avada"),
			"desc" => __("In pixels, ex: 20px", "Avada"),
			"id" => "footer_area_right_padding",
			"std" => "0px",
			"type" => "text");

		$of_options[] = array( "name" => __("Copyright Area / Social Icon Options", "Avada"),
			"desc" => "",
			"id" => "copyright_area_title",
			"std" => "<h3 style='margin: 0;'>". __("Copyright Options", "Avada"). "</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Copyright Bar", "Avada"),
			"desc" => __("Check the box to display the copyright bar.", "Avada"),
			"id" => "footer_copyright",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Copyright Text", "Avada"),
			"desc" => __("Enter the text that displays in the copyright bar. HTML markup can be used.", "Avada"),
			"id" => "footer_text",
			"std" => 'Copyright 2012 Avada | All Rights Reserved | Powered by <a href="http://wordpress.org">WordPress</a>  |  <a href="http://theme-fusion.com">Theme Fusion</a>',
			"type" => "textarea");

		$of_options[] = array( "name" => __("Copyright Top Padding", "Avada"),
			"desc" => __("In pixels, ex: 18px", "Avada"),
			"id" => "copyright_top_padding",
			"std" => "18px",
			"type" => "text");

		$of_options[] = array( "name" => __("Copyright Bottom Padding", "Avada"),
			"desc" => __("In pixels, ex: 18px", "Avada"),
			"id" => "copyright_bottom_padding",
			"std" => "16px",
			"type" => "text");

		$of_options[] = array( "name" => __("Social Icon Options", "Avada"),
			"desc" => "",
			"id" => "footer_social_icon_title",
			"std" => "<h3 style='margin: 0;'>" . __("Social Icon Options", "Avada") . "</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Display Social Icons on Footer of the Page", "Avada"),
			"desc" => __("Select the checkbox to show social media icons on the footer of the page.", "Avada"),
			"id" => "icons_footer",
			"std" => 1,
			"type" => "checkbox");
		
		$of_options[] = array( "name" => __("Footer Social Icons Custom Color", "Avada"),
			"desc" => __("Select a custom social icon color. For a different color per icon, separate the value with the | symbol. ex: #000|#fff", "Avada"),
			"id" => "footer_social_links_icon_color",
			"std" => "#46494a",
			"type" => "color");

		$of_options[] = array( "name" => __("Footer Social Icons Boxed", "Avada"),
			"desc" => __("Controls the color of the social icons in the footer.", "Avada"),
			"id" => "footer_social_links_boxed",
			"std" => "No",
			"type" => "select",
			"options" => array('No' => 'No', 'Yes' => 'Yes'));

		$of_options[] = array( "name" => __("Footer Social Icons Custom Box Color", "Avada"),
			"desc" => __("Select a custom social icon box color. For a different color per icon, separate the value with the | symbol. ex: #000|#fff", "Avada"),
			"id" => "footer_social_links_box_color",
			"std" => "#222222",
			"type" => "color");

		$of_options[] = array( "name" => __("Footer Social Icons Boxed Radius", "Avada"),
			"desc" => __("Boxradius for the social icons. In pixels, ex: 4px.", "Avada"),
			"id" => "footer_social_links_boxed_radius",
			"std" => "4px",
			"type" => "text");

		$of_options[] = array( "name" => __("Footer Social Icons Tooltip Position", "Avada"),
			"desc" => __("Controls the tooltip position of the social icons in the footer.", "Avada"),
			"id" => "footer_social_links_tooltip_placement",
			"std" => "Top",
			"type" => "select",
			"options" => array( 'Top' => 'Top', 'Right' => 'Right', 'Bottom' => 'Bottom', 'Left' => 'Left', 'None' => 'None' ));

		$of_options[] = array( "name" => __("Sidebars", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Pages", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>Pages</h3>",
			"icon" => true,
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Activate Global Sidebar", "Avada"),
			"desc" => __("Check the box if you want to use a global sidebar on all pages. This option overrides the page options.", "Avada"),
			"id" => "pages_global_sidebar",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Global Sidebar 1", "Avada"),
			"desc" => __("Select sidebar 1 that will display on all pages.", "Avada"),
			"id" => "pages_sidebar",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Global Sidebar 2", "Avada"),
			"desc" => __("Select sidebar 2 that will display on all pages. Sidebar 2 can only be used if sidebar 1 is selected", "Avada"),
			"id" => "pages_sidebar_2",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Global Sidebar Position", "Avada"),
			"desc" => __("Select the sidebar 1 position for pages. If sidebar 2 is selected, it will display on the opposite side.", "Avada"),
			"id" => "default_sidebar_pos",
			"std" => "Right",
			"options" => array('Right' => 'Right', 'Left' => 'Left'),
			"type" => "select");

		$of_options[] = array( "name" => __("Pages", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>Pages</h3>",
			"icon" => true,
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Portfolio Posts", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>Portfolio Posts</h3>",
			"icon" => true,
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Activate Global Sidebar", "Avada"),
			"desc" => __("Check the box if you want to use a global sidebar on all single portfolio posts. This option overrides the portfolio options.", "Avada"),
			"id" => "portfolio_global_sidebar",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Global Sidebar 1", "Avada"),
			"desc" => __("Select sidebar 1 that will display on all single portfolio posts.", "Avada"),
			"id" => "portfolio_sidebar",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Global Sidebar 2", "Avada"),
			"desc" => __("Select sidebar 2 that will display on all single portfolio posts. Sidebar 2 can only be used if sidebar 1 is selected", "Avada"),
			"id" => "portfolio_sidebar_2",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Global Portfolio Sidebar Position", "Avada"),
			"desc" => __("Select the sidebar 1 position for the portfolio. If sidebar 2 is selected, it will display on the opposite side.", "Avada"),
			"id" => "portfolio_sidebar_position",
			"std" => "Right",
			"type" => "select",
			"options" => array(
				'Right' => 'Right',
				'Left' => 'Left',
			));

		$of_options[] = array( "name" => __("Portfolio Posts", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>Portfolio Posts</h3>",
			"icon" => true,
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Portfolio Archive/Category Pages", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>Portfolio Archive/Category Pages</h3>",
			"icon" => true,
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Portfolio Archive/Category Sidebar 1", "Avada"),
			"desc" => __("Select sidebar 1 that will display on the archive/category pages.", "Avada"),
			"id" => "portfolio_archive_sidebar",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Portfolio Archive/Category Sidebar 2", "Avada"),
			"desc" => __("Select sidebar 2 that will display on the archive/category pages. Sidebar 2 can only be used if sidebar 1 is selected.", "Avada"),
			"id" => "portfolio_archive_sidebar_2",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Portfolio Archive/Category Pages", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>Portfolio Archive/Category Pages</h3>",
			"icon" => true,
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Blog Posts", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>Blog Posts</h3>",
			"icon" => true,
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Activate Global Sidebar", "Avada"),
			"desc" => __("Check the box if you want to use a global sidebar on all single posts. This option overrides the post options.", "Avada"),
			"id" => "posts_global_sidebar",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Global Sidebar 1", "Avada"),
			"desc" => __("Select sidebar 1 that will display on all single posts.", "Avada"),
			"id" => "posts_sidebar",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Global Sidebar 2", "Avada"),
			"desc" => __("Select sidebar 2 that will display on all single posts.", "Avada"),
			"id" => "posts_sidebar_2",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Global Blog Sidebar Position", "Avada"),
			"desc" => __("Select the sidebar 1 position for the blog pages. If sidebar 2 is selected, it will display on the opposite side.", "Avada"),
			"id" => "blog_sidebar_position",
			"std" => "Right",
			"type" => "select",
			"options" => array(
				'Right' => 'Right',
				'Left' => 'Left',
			));

		$of_options[] = array( "name" => __("Blog Posts", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>Blog Posts</h3>",
			"icon" => true,
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Blog Archive/Category Pages", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>Blog Archive/Category Pages</h3>",
			"icon" => true,
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Blog Archive/Category Sidebar 1", "Avada"),
			"desc" => __("Select the sidebar 1 that will display on the blog archive/category pages.", "Avada"),
			"id" => "blog_archive_sidebar",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Blog Archive/Category Sidebar 2", "Avada"),
			"desc" => __("Select the sidebar 2 that will display on the blog archive/category pages. Sidebar 2 can only be used if sidebar 1 is selected.", "Avada"),
			"id" => "blog_archive_sidebar_2",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Blog Archive/Category Pages", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>Blog Archive/Category Pages</h3>",
			"icon" => true,
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Woocommerce Products", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>Woocommerce Products</h3>",
			"icon" => true,
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Activate Global Sidebar", "Avada"),
			"desc" => __("Check the box if you want to use a global sidebar on the main shop page and all single product pages. This option overrides the woocommerce options.", "Avada"),
			"id" => "woo_global_sidebar",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Global Sidebar 1", "Avada"),
			"desc" => __("Select sidebar 1 that will display on all single product pages.", "Avada"),
			"id" => "woo_sidebar",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Global Sidebar 2", "Avada"),
			"desc" => __("Select sidebar 2 that will display on all single product pages. Sidebar 2 can only be used if sidebar 1 is selected", "Avada"),
			"id" => "woo_sidebar_2",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Global Woocommerce Sidebar Position", "Avada"),
			"desc" => __("Select the sidebar 1 position for woocommerce. If sidebar 2 is selected, it will display on the opposite side.", "Avada"),
			"id" => "woo_sidebar_position",
			"std" => "Right",
			"type" => "select",
			"options" => array(
				'Right' => 'Right',
				'Left' => 'Left',
			));

		$of_options[] = array( "name" => __("Woocommerce Products", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>Woocommerce Products</h3>",
			"icon" => true,
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("WooCommerce Archive/Category Pages", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>WooCommerce Archive/Category Pages</h3>",
			"icon" => true,
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Woocommerce Archive/Category Sidebar 1", "Avada"),
			"desc" => __("Select sidebar 1 that will display on the archive/category pages.", "Avada"),
			"id" => "woocommerce_archive_sidebar",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Woocommerce Archive/Category Sidebar 2", "Avada"),
			"desc" => __("Select sidebar 2 that will display on the archive/category pages. Sidebar 2 can only be used if sidebar 1 is selected.", "Avada"),
			"id" => "woocommerce_archive_sidebar_2",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("WooCommerce Archive/Category Pages", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>WooCommerce Archive/Category Pages</h3>",
			"icon" => true,
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("BBPress", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>BBPress</h3>",
			"icon" => true,
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Activate Global Sidebar", "Avada"),
			"desc" => __("Check the box if you want to use global sidebars on all forum pages. Forums index page, profile page and search page does not need this option checked to display the sidebars selected below.", "Avada"),
			"id" => "bbpress_global_sidebar",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Global Sidebar 1", "Avada"),
			"desc" => __("Select sidebar 1 that will display on forum pages globally.", "Avada"),
			"id" => "ppbress_sidebar",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Global Sidebar 2", "Avada"),
			"desc" => __("Select sidebar 2 that will display on forum pages globally. Sidebar 2 can only be used if sidebar 1 is selected.", "Avada"),
			"id" => "ppbress_sidebar_2",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Global bbPress Sidebar Position", "Avada"),
			"desc" => __("Select the sidebar 1 position for bbPress. If sidebar 2 is selected, it will display on the opposite side.", "Avada"),
			"id" => "bbpress_sidebar_position",
			"std" => "Right",
			"type" => "select",
			"options" => array(
				'Right' => 'Right',
				'Left' => 'Left',
			));

		$of_options[] = array( "name" => __("BBPress", "Avada"),
			"desc" => "",
			"id" => "bbpress_only",
			"std" => "<h3 style='margin: 0;'>BBPress</h3>",
			"icon" => true,
			"position" => "end",
			"type" => "accordion");
			
		$of_options[] = array( "name" => __("Search Page", "Avada"),
			"desc" => "",
			"id" => "search_only",
			"std" => "<h3 style='margin: 0;'>Search Page</h3>",
			"icon" => true,
			"position" => "start",
			"type" => "accordion");			

		$of_options[] = array( "name" => __("Search Page Sidebar 1", "Avada"),
			"desc" => __("Select sidebar 1 that will display on the search results page.", "Avada"),
			"id" => "search_sidebar",
			"std" => "Blog Sidebar",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Search Page Sidebar 2", "Avada"),
			"desc" => __("Select sidebar 2 that will display on the search results page. Sidebar 2 can only be used if sidebar 1 is selected.", "Avada"),
			"id" => "search_sidebar_2",
			"std" => "None",
			"type" => "select",
			"options" => $sidebar_options
		);

		$of_options[] = array( "name" => __("Search Sidebar Position", "Avada"),
			"desc" => __("Select the sidebar 1 position for the search pages. If sidebar 2 is selected, it will display on the opposite side.", "Avada"),
			"id" => "search_sidebar_position",
			"std" => "Right",
			"type" => "select",
			"options" => array(
				'Right' => 'Right',
				'Left' => 'Left',
			));

		$of_options[] = array( "name" => __("Search Page", "Avada"),
			"desc" => "",
			"id" => "search_only",
			"std" => "<h3 style='margin: 0;'>Search Page</h3>",
			"icon" => true,
			"position" => "end",
			"type" => "accordion");			

		$of_options[] = array( "name" => __("Background", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Boxed Mode Only", "Avada"),
			"desc" => "",
			"id" => "boxed_mode_only",
			"std" => "<h3 style='margin: 0;'>" . __("Background options below only work in boxed mode", "Avada") . "</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Background Image For Outer Areas In Boxed Mode", "Avada"),
			"desc" => __("Select an image or insert an image url to use for the backgroud.", "Avada"),
			"id" => "bg_image",
			"std" => "",
			"mod" => "",
			"type" => "media");

		$of_options[] = array( "name" => __("100% Background Image", "Avada"),
			"desc" => __("Check this box to have the background image display at 100% in width and height and scale according to the browser size.", "Avada"),
			"id" => "bg_full",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Background Repeat", "Avada"),
			"desc" => __("Select how the background image repeats.", "Avada"),
			"id" => "bg_repeat",
			"std" => "",
			"type" => "select",
			"options" => array('repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y', 'no-repeat' => 'no-repeat'));

		$of_options[] = array( "name" => __("Background Color For Outer Areas In Boxed Mode", "Avada"),
			"desc" => __("Select a background color.", "Avada"),
			"id" => "bg_color",
			"std" => "#d7d6d6",
			"type" => "color");

		$of_options[] = array( "name" => __("Background Pattern", "Avada"),
			"desc" => __("Check the box to display a pattern in the background. If checked, select the pattern from below.", "Avada"),
			"id" => "bg_pattern_option",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Select a Background Pattern", "Avada"),
			"desc" => "",
			"id" => "bg_pattern",
			"std" => "pattern1",
			"type" => "images",
			"options" => array(
				"pattern1" => get_template_directory_uri()."/images/patterns/pattern1.png",
				"pattern2" => get_template_directory_uri()."/images/patterns/pattern2.png",
				"pattern3" => get_template_directory_uri()."/images/patterns/pattern3.png",
				"pattern4" => get_template_directory_uri()."/images/patterns/pattern4.png",
				"pattern5" => get_template_directory_uri()."/images/patterns/pattern5.png",
				"pattern6" => get_template_directory_uri()."/images/patterns/pattern6.png",
				"pattern7" => get_template_directory_uri()."/images/patterns/pattern7.png",
				"pattern8" => get_template_directory_uri()."/images/patterns/pattern8.png",
				"pattern9" => get_template_directory_uri()."/images/patterns/pattern9.png",
				"pattern10" => get_template_directory_uri()."/images/patterns/pattern10.png",
			));

		$of_options[] = array( "name" => __("Both Modes", "Avada"),
			"desc" => "",
			"id" => "both_modes_only",
			"std" => "<h3 style='margin: 0;'>" . __("Background Options Below Work For Boxed & Wide Mode", "Avada") . "</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Background Image For Main Content Area", "Avada"),
			"desc" => __("Select an image or insert an image url to use for the main content area backgroud.", "Avada"),
			"id" => "content_bg_image",
			"std" => "",
			"mod" => "",
			"type" => "media");

		$of_options[] = array( "name" => __("100% Background Image", "Avada"),
			"desc" => __("Check this box to have the background image display at 100% in width and height and scale according to the browser size.", "Avada"),
			"id" => "content_bg_full",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Background Repeat", "Avada"),
			"desc" => __("Select how the background image repeats.", "Avada"),
			"id" => "content_bg_repeat",
			"std" => "",
			"type" => "select",
			"options" => array('repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y', 'no-repeat' => 'no-repeat'));

		$of_options[] = array( "name" => __("Typography", "Avada"),
			"type" => "heading");

	   $of_options[] = array( "name" => __("Custom Nav / Headings Font", "Avada"),
			"desc" => "",
			"id" => "custom_heading_font",
			"std" => "<h3 style='margin: 0;'>" . __("Custom Font For Menus And Headings", "Avada") . "</h3><p style='margin-bottom:0;'>" . __("This will override the google / standard font options. All 4 files are required.", "Avada") . "</p>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Custom Font .woff", "Avada"),
			"desc" => __("Upload the .woff font file.", "Avada"),
			"id" => "custom_font_woff",
			"std" => "",
			"type" => "upload");

		$of_options[] = array( "name" => __("Custom Font .ttf", "Avada"),
			"desc" => __("Upload the .ttf font file.", "Avada"),
			"id" => "custom_font_ttf",
			"std" => "",
			"type" => "upload");

		$of_options[] = array( "name" => __("Custom Font .svg", "Avada"),
			"desc" => __("Upload the .svg font file.", "Avada"),
			"id" => "custom_font_svg",
			"std" => "",
			"type" => "upload");

		$of_options[] = array( "name" => __("Custom Font .eot", "Avada"),
			"desc" => __("Upload the .eot font file.", "Avada"),
			"id" => "custom_font_eot",
			"std" => "",
			"type" => "upload");

	   $of_options[] = array( "name" => __("Custom Nav / Headings Font", "Avada"),
			"desc" => "",
			"id" => "custom_heading_font",
			"std" => "<h3 style='margin: 0;'>Custom Font For Menus And Headings.</h3><p style='margin-bottom:0;'>This will override the google / standard font options. All 4 files are required.</p>",
			"position" => "end",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Google Fonts", "Avada"),
			"desc" => "",
			"id" => "google_fonts_intro",
			"std" => "<h3 style='margin: 0;'>Google Fonts</h3><p style='margin-bottom:0;'>This will override standard font options.</p>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Select Body Font Family", "Avada"),
			"desc" => __("Select a font family for body text", "Avada"),
			"id" => "google_body",
			"std" => "PT Sans",
			"type" => "select",
			"options" => $google_fonts);

		$of_options[] = array( "name" => __("Select Menu Font", "Avada"),
			"desc" => __("Select a font family for navigation", "Avada"),
			"id" => "google_nav",
			"std" => "Antic Slab",
			"type" => "select",
			"options" => $google_fonts);

		$of_options[] = array( "name" => __("Select Headings Font", "Avada"),
			"desc" => __("Select a font family for headings", "Avada"),
			"id" => "google_headings",
			"std" => "Antic Slab",
			"type" => "select",
			"options" => $google_fonts);

		$of_options[] = array( "name" => __("Select Footer Headings Font", "Avada"),
			"desc" => __("Select a font family for footer headings", "Avada"),
			"id" => "google_footer_headings",
			"std" => "PT Sans",
			"type" => "select",
			"options" => $google_fonts);

		$of_options[] = array( "name" => __("Google Font Settings", "Avada"),
			"desc" => __("Adjust the settings below to load different character sets and types for fonts. More character sets and types equals to slower page load. Please read <a href='http://theme-fusion.com/?p=275938'>How to configure google web fonts settings</a> for more info.", "Avada"),
			"id" => "gfont_settings",
			"std" => "400,400italic,700,700italic:latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese",
			"type" => "text");

	   $of_options[] = array( "name" => __("Google Fonts", "Avada"),
			"desc" => "",
			"id" => "google_fonts_intro",
			"std" => "<h3 style='margin: 0;'>Google Fonts</h3><p style='margin-bottom:0;'>This will override standard font options.</p>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Standard Fonts", "Avada"),
			"desc" => "",
			"id" => "standard_fonts_intro",
			"std" => "<h3 style='margin: 0;'>Standards</h3>",
			"position" => "start",
			"type" => "accordion");

		$standard_fonts = array(
			'0' => 'Select Font',
			'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
			"'Arial Black', Gadget, sans-serif" => "'Arial Black', Gadget, sans-serif",
			"'Bookman Old Style', serif" => "'Bookman Old Style', serif",
			"'Comic Sans MS', cursive" => "'Comic Sans MS', cursive",
			"Courier, monospace" => "Courier, monospace",
			"Garamond, serif" => "Garamond, serif",
			"Georgia, serif" => "Georgia, serif",
			"Impact, Charcoal, sans-serif" => "Impact, Charcoal, sans-serif",
			"'Lucida Console', Monaco, monospace" => "'Lucida Console', Monaco, monospace",
			"'Lucida Sans Unicode', 'Lucida Grande', sans-serif" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
			"'MS Sans Serif', Geneva, sans-serif" => "'MS Sans Serif', Geneva, sans-serif",
			"'MS Serif', 'New York', sans-serif" => "'MS Serif', 'New York', sans-serif",
			"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
			"Tahoma, Geneva, sans-serif" => "Tahoma, Geneva, sans-serif",
			"'Times New Roman', Times, serif" => "'Times New Roman', Times, serif",
			"'Trebuchet MS', Helvetica, sans-serif" => "'Trebuchet MS', Helvetica, sans-serif",
			"Verdana, Geneva, sans-serif" => "Verdana, Geneva, sans-serif"
		);

		$of_options[] = array( "name" => __("Select Body Font Family", "Avada"),
			"desc" => __("Select a font family for body text", "Avada"),
			"id" => "standard_body",
			"std" => "",
			"type" => "select",
			"options" => $standard_fonts);

		$of_options[] = array( "name" => __("Select Menu Font Family", "Avada"),
			"desc" => __("Select a font family for menu / navigation", "Avada"),
			"id" => "standard_nav",
			"std" => "",
			"type" => "select",
			"options" => $standard_fonts);

		$of_options[] = array( "name" => __("Select Headings Font Family", "Avada"),
			"desc" => __("Select a font family for headings", "Avada"),
			"id" => "standard_headings",
			"std" => "",
			"type" => "select",
			"options" => $standard_fonts);

		$of_options[] = array( "name" => __("Select Footer Headings Font Family", "Avada"),
			"desc" => __("Select a font family for footer headings", "Avada"),
			"id" => "standard_footer_headings",
			"std" => "",
			"type" => "select",
			"options" => $standard_fonts);

		$of_options[] = array( "name" => __("Standard Fonts", "Avada"),
			"desc" => "",
			"id" => "standard_fonts_intro",
			"std" => "<h3 style='margin: 0;'>Standards</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Font Size", "Avada"),
			"desc" => "",
			"id" => "font_size_intro",
			"std" => "<h3 style='margin: 0;'>Font Sizes</h3>",
			"position" => "start",
			"type" => "accordion");
			
		$of_options[] = array( 	"name" => __("Body Font Size", "Avada"),
						"desc" 		=> __("In pixels, default is 13", "Avada"),
						"id" 		=> "body_font_size",
						"std" 		=> "13",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	
							
		$of_options[] = array( "name" => __("Main Menu Font Size", "Avada"),
			"desc" => __("In pixels, default is 14", "Avada"),
			"id" => "nav_font_size",
			"std" => "14",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Main Menu Dropdown Font Size", "Avada"),
			"desc" => __("In pixels, default is 13", "Avada"),
			"id" => "nav_dropdown_font_size",
			"std" => "13",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Secondary Menu & Top Contact Info Font Size", "Avada"),
			"desc" => __("In pixels, default is 12", "Avada"),
			"id" => "snav_font_size",
			"std" => "12",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Side Menu Font Size", "Avada"),
			"desc" => __("In pixels, default is 14", "Avada"),
			"id" => "side_nav_font_size",
			"std" => "14",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Breadcrumbs Font Size", "Avada"),
			"desc" => __("In pixels, default is 10", "Avada"),
			"id" => "breadcrumbs_font_size",
			"std" => "10",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Sidebar Widget Heading Font Size", "Avada"),
			"desc" => __("In pixels, default is 13", "Avada"),
			"id" => "sidew_font_size",
			"std" => "13",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Sliding Bar Widget Heading Font Size", "Avada"),
			"desc" => __("In pixels, default is 13", "Avada"),
			"id" => "slidingbar_font_size",
			"std" => "13",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Footer Widget Heading Font Size", "Avada"),
			"desc" => __("In pixels, default is 13", "Avada"),
			"id" => "footw_font_size",
			"std" => "13",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Copyright Font Size", "Avada"),
			"desc" => __("In pixels, default is 12", "Avada"),
			"id" => "copyright_font_size",
			"std" => "12",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Heading Font Size H1", "Avada"),
			"desc" => __("In pixels, default is 34", "Avada"),
			"id" => "h1_font_size",
			"std" => "34",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Heading Font Size H2", "Avada"),
			"desc" => __("In pixels, default is 18", "Avada"),
			"id" => "h2_font_size",
			"std" => "18",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Heading Font Size H3", "Avada"),
			"desc" => __("In pixels, default is 16", "Avada"),
			"id" => "h3_font_size",
			"std" => "16",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Heading Font Size H4", "Avada"),
			"desc" => __("In pixels, default is 13", "Avada"),
			"id" => "h4_font_size",
			"std" => "13",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Heading Font Size H5", "Avada"),
			"desc" => __("In pixels, default is 12", "Avada"),
			"id" => "h5_font_size",
			"std" => "12",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Heading Font Size H6", "Avada"),
			"desc" => __("In pixels, default is 11", "Avada"),
			"id" => "h6_font_size",
			"std" => "11",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Header Tagline Font Size", "Avada"),
			"desc" => __("In pixels, default is 16", "Avada"),
			"id" => "tagline_font_size",
			"std" => "16",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Meta Data Font Size", "Avada"),
			"desc" => __("In pixels, default is 12", "Avada"),
			"id" => "meta_font_size",
			"std" => "12",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Page Title Font Size", "Avada"),
			"desc" => __("In pixels, default is 18", "Avada"),
			"id" => "page_title_font_size",
			"std" => "18",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Page Title Subheader Font Size", "Avada"),
			"desc" => __("In pixels, default is 14", "Avada"),
			"id" => "page_title_subheader_font_size",
			"std" => "14",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Pagination Font Size", "Avada"),
			"desc" => __("In pixels, default is 12", "Avada"),
			"id" => "pagination_font_size",
			"std" => "12",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("WooCommerce Icon Font Size", "Avada"),
			"desc" => __("In pixels, default is 12", "Avada"),
			"id" => "woo_icon_font_size",
			"std" => "12",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Font Size", "Avada"),
			"desc" => "",
			"id" => "font_size_intro",
			"std" => "<h3 style='margin: 0;'>Font Sizes</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Font Line Heights", "Avada"),
			"desc" => "",
			"id" => "font_line_heights_wrapper",
			"std" => "<h3 style='margin: 0;''>Font Line Heights</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Body Font Line Height", "Avada"),
			"desc" => __("In pixels, default is 20", "Avada"),
			"id" => "body_font_lh",
			"std" => "20",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Heading Font Line Height H1", "Avada"),
			"desc" => __("In pixels, default is 48", "Avada"),
			"id" => "h1_font_lh",
			"std" => "48",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Heading Font Line Height H2", "Avada"),
			"desc" => __("In pixels, default is 27", "Avada"),
			"id" => "h2_font_lh",
			"std" => "27",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Heading Font Line Height H3", "Avada"),
			"desc" => __("In pixels, default is 24", "Avada"),
			"id" => "h3_font_lh",
			"std" => "24",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Heading Font Line Height H4", "Avada"),
			"desc" => __("In pixels, default is 20", "Avada"),
			"id" => "h4_font_lh",
			"std" => "20",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Heading Font Line Height H5", "Avada"),
			"desc" => __("In pixels, default is 18", "Avada"),
			"id" => "h5_font_lh",
			"std" => "18",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Heading Font Line Height H6", "Avada"),
			"desc" => __("In pixels, default is 17", "Avada"),
			"id" => "h6_font_lh",
			"std" => "17",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Secondary Menu Line Height", "Avada"),
			"desc" => __("In pixels, default is 44", "Avada"),
			"id" => "sec_menu_lh",
			"std" => "44",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);	

		$of_options[] = array( "name" => __("Font Line Heights", "Avada"),
			"desc" => "",
			"id" => "font_line_heights_wrapper",
			"std" => "<h3 style='margin: 0;''>Font Line Heights</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Styling", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Select Theme Skin", "Avada"),
			"desc" => __("Select a skin, all color options will automatically change to the defined skin.", "Avada"),
			"id" => "scheme_type",
			"std" => "Light",
			"type" => "select",
			"options" => array('Light' => 'Light', 'Dark' => 'Dark'));

		$of_options[] = array( "name" => __("Predefined Color Scheme", "Avada"),
			"desc" => __("Select a scheme, all color options will automatically change to the defined scheme.", "Avada"),
			"id" => "color_scheme",
			"std" => "Green",
			"type" => "select",
			"options" => array('Red' => 'Red', 'Light Red' => 'Light Red', 'Blue' => 'Blue', 'Light Blue' => 'Light Blue', 'Green' => 'Green', 'Dark Green' => 'Dark Green', 'Orange' => 'Orange', 'Pink' => 'Pink', 'Brown' => 'Brown', 'Light Grey' => 'Light Grey'));

	   $of_options[] = array( "name" => __("Background Colors", "Avada"),
			"desc" => "",
			"id" => "bg_colors_wrapper",
			"std" => "<h3 style='margin: 0;'>Background Colors</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Primary Color", "Avada"),
			"desc" => __("Controls several items, ex: link hovers, highlights, and more.", "Avada"),
			"id" => "primary_color",
			"std" => "#a0ce4e",
			"type" => "color");

		$of_options[] = array( "name" => __("Sliding Bar Background Color and Opacity", "Avada"),
			"desc" => __("Controls the background color and opacity of the top sliding bar. Opacity ranges between 0 (transparent) and 1 (opaque). ex: .4", "Avada"),
			"id" => "slidingbar_bg_color",
			"std" => array(
						'color' => "#363839",
						'opacity' => '1'
					 ),
			"type" => "backgroundcolor");
		
		$of_options[] = array( "name" => __("Header Background Color and Opacity", "Avada"),
			"desc" => __("Controls the background color and opacity for the header. Opacity only works with header top position and ranges between 0 (transparent) and 1 (opaque). ex: .4", "Avada"),
			"id" => "header_bg_color",
			"std" => array(
						'color' => "#ffffff",
						'opacity' => '1'
					 ),
			"type" => "backgroundcolor");

		$of_options[] = array( "name" => __("Sticky Header Background Color and Opacity.", "Avada"),
			"desc" => __("Controls the background color for the sticky header. Opacity ranges between 0 (transparent) and 1 (opaque). ex: .4", "Avada"),
			"id" => "header_sticky_bg_color",
			"std" => array(
						'color' => "#ffffff",
						'opacity' => '0.97'
					 ),
			"type" => "backgroundcolor");


		$of_options[] = array( "name" => __("Header Border Color", "Avada"),
			"desc" => __("Controls the border colors for the header.", "Avada"),
			"id" => "header_border_color",
			"std" => "#e5e5e5",
			"type" => "color");

		$of_options[] = array( "name" => __("Header Top Background Color", "Avada"),
			"desc" => __("Controls the background color of the top header section used in Headers 2-5.", "Avada"),
			"id" => "header_top_bg_color",
			"std" => "#a0ce4e",
			"type" => "color");

		$of_options[] = array( "name" => __("Page Title Bar Background Color", "Avada"),
			"desc" => __("Select a color for the page title bar background.", "Avada"),
			"id" => "page_title_bg_color",
			"std" => "#F6F6F6",
			"type" => "color");

		$of_options[] = array( "name" => __("Page Title Bar Borders Color", "Avada"),
			"desc" => __("Select a color for the page title bar borders.", "Avada"),
			"id" => "page_title_border_color",
			"std" => "#d2d3d4",
			"type" => "color");

		$of_options[] = array( "name" => __("Content Background Color", "Avada"),
			"desc" => __("Controls the background color of the main content area.", "Avada"),
			"id" => "content_bg_color",
			"std" => "#ffffff",
			"type" => "color");

		$of_options[] = array( "name" => __("Sidebar Background Color", "Avada"),
			"desc" => __("Controls the background color of the sidebar.", "Avada"),
			"id" => "sidebar_bg_color",
			"std" => "transparent",
			"type" => "color");

		$of_options[] = array( "name" => __("Footer Background Color", "Avada"),
			"desc" => __("Controls the background color of the footer.", "Avada"),
			"id" => "footer_bg_color",
			"std" => "#363839",
			"type" => "color");

		$of_options[] = array( "name" => __("Footer Border Color", "Avada"),
			"desc" => __("Controls the border colors for the footer.", "Avada"),
			"id" => "footer_border_color",
			"std" => "#e9eaee",
			"type" => "color");

		$of_options[] = array( "name" => __("Copyright Background Color", "Avada"),
			"desc" => __("Controls the background color of the footer copyright.", "Avada"),
			"id" => "copyright_bg_color",
			"std" => "#282a2b",
			"type" => "color");

		$of_options[] = array( "name" => __("Copyright Border Color", "Avada"),
			"desc" => __("Controls the border colors for the footer copyright.", "Avada"),
			"id" => "copyright_border_color",
			"std" => "#4b4c4d",
			"type" => "color");

	   $of_options[] = array( "name" => __("Background Colors", "Avada"),
			"desc" => "",
			"id" => "bg_colors_wrapper",
			"std" => "<h3 style='margin: 0;'>Background Colors</h3>",
			"position" => "end",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Element Colors", "Avada"),
			"desc" => "",
			"id" => "element_colors_wrapper",
			"std" => "<h3 style='margin: 0;'>Element Colors</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Rollover Image Gradient Top Color and Opacity", "Avada"),
			"desc" => __("Controls the top color of the image rollover gradients. Opacity ranges between 0 (transparent) and 1 (opaque). ex: .4", "Avada"),
			"id" => "image_gradient_top_color",
			"std" => array(
						'color' => "#a0ce4e",
						'opacity' => '0.8'
					 ),
			"type" => "backgroundcolor");

		$of_options[] = array( "name" => __("Rollover Image Gradient Bottom Color", "Avada"),
			"desc" => __("Controls the bottom color of the image rollover gradients.", "Avada"),
			"id" => "image_gradient_bottom_color",
			"std" => "#a0ce4e",
			"type" => "color");

		$of_options[] = array( "name" => __("Rollover Image Element Color", "Avada"),
			"desc" => __("This option controls the color of image rollover text and the icon circle backgrounds.", "Avada"),
			"id" => "image_rollover_text_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Sliding Bar Item Divider Color", "Avada"),
			"desc" => __("Controls the divider color in the sliding bar.", "Avada"),
			"id" => "slidingbar_divider_color",
			"std" => "#282A2B",
			"type" => "color");

		$of_options[] = array( "name" => __("Footer Widget Divider Color", "Avada"),
			"desc" => __("Controls the divider color in the footer.", "Avada"),
			"id" => "footer_divider_color",
			"std" => "#505152",
			"type" => "color");

		$of_options[] = array( "name" => __("Form Background Color", "Avada"),
			"desc" => __("Controls the background color of form fields.", "Avada"),
			"id" => "form_bg_color",
			"std" => "#ffffff",
			"type" => "color");

		$of_options[] = array( "name" => __("Form Text Color", "Avada"),
			"desc" => __("Controls the text color for forms.", "Avada"),
			"id" => "form_text_color",
			"std" => "#aaa9a9",
			"type" => "color");

		$of_options[] = array( "name" => __("Form Border Color", "Avada"),
			"desc" => __("Controls the border color of form fields.", "Avada"),
			"id" => "form_border_color",
			"std" => "#d2d2d2",

			"type" => "color");

		$of_options[] = array( "name" => __("Grid Box Color", "Avada"),
			"desc" => __("Controls blog grid, timeline, portfolio boxed items and Woocommerce post box background color.", "Avada"),
			"id" => "timeline_bg_color",
			"std" => "transparent",
			"type" => "color");

		$of_options[] = array( "name" => __("Grid Element Color", "Avada"),
			"desc" => __("Controls blog grid, timeline, portfolio boxed items, Woocommerce post box border, divider lines, date box and border, timeline dots, timeline icon, timeline arrow.", "Avada"),
			"id" => "timeline_color",
			"std" => "#ebeaea",
			"type" => "color");

		$of_options[] = array( "name" => __("Woo Quantity Box Background Color", "Avada"),
			"desc" => __("Controls the background color of the woocommerce quantity box.", "Avada"),
			"id" => "qty_bg_color",
			"std" => "#fbfaf9",
			"type" => "color");

		$of_options[] = array( "name" => __("Woo Quantity Box Hover Background Color", "Avada"),
			"desc" => __("Controls the hover color of the woocommerce quantity box.", "Avada"),
			"id" => "qty_bg_hover_color",
			"std" => "#ffffff",
			"type" => "color");

		$of_options[] = array( "name" => __("bbPress Forum Header Background Color", "Avada"),
			"desc" => __("Controls the background color for forum header rows.", "Avada"),
			"id" => "bbp_forum_header_bg",
			"std" => "#ebeaea",
			"type" => "color");

		$of_options[] = array( "name" => __("bbPress Forum Border Color", "Avada"),
			"desc" => __("Controls the border color for all forum surrounding borders.", "Avada"),
			"id" => "bbp_forum_border_color",
			"std" => "#ebeaea",
			"type" => "color");

	   $of_options[] = array( "name" => __("Element Colors", "Avada"),
			"desc" => "",
			"id" => "element_colors_wrapper",
			"std" => "<h3 style='margin: 0;'>Element Colors</h3>",
			"position" => "end",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Layout Options", "Avada"),
			"desc" => "",
			"id" => "element_options_wrapper",
			"std" => "<h3 style='margin: 0;'>Layout Options</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Page Content Top Padding", "Avada"),
			"desc" => __("(in pixels ex: 20px)", "Avada"),
			"id" => "main_top_padding",
			"std" => "55px",
			"type" => "text");

		$of_options[] = array( "name" => __("Page Content Bottom Padding", "Avada"),
			"desc" => __("(in pixels ex: 20px)", "Avada"),
			"id" => "main_bottom_padding",
			"std" => "40px",
			"type" => "text");

		$of_options[] = array( "name" => __("100% Width Left/Right Padding", "Avada"),
			"desc" => __("This option controls the left/right padding for page content when using 100% site width or 100% width page template.  Enter value in px. ex: 30px", "Avada"),
			"id" => "hundredp_padding",
			"std" => "30px",
			"type" => "text");
			
		$of_options[] = array( "name" => __("Sidebar Padding", "Avada"),
			"desc" => __("Enter a value (based on percentage) without % sign, ex: 5px or 5%", "Avada"),
			"id" => "sidebar_padding",
			"std" => "0",
			"type" => "text");
		
		$of_options[] = array( "name" => __("Disable Sliding Bar Text Shadow", "Avada"),
			"desc" => __("Check to disable the text shadow in the Sliding Bar.", "Avada"),
			"id" => "slidingbar_text_shadow",
			"std" => 1,
			"type" => "checkbox");
			
		$of_options[] = array( "name" => __("Disable Rollover Text Shadow", "Avada"),
			"desc" => __("Check to disable the text shadow on rollovers.", "Avada"),
			"id" => "rollover_text_shadow",
			"std" => 1,
			"type" => "checkbox");			

		$of_options[] = array( "name" => __("Disable Footer Text Shadow", "Avada"),
			"desc" => __("Check to disable the text shadow in the footer.", "Avada"),
			"id" => "footer_text_shadow",
			"std" => 1,
			"type" => "checkbox");

	   $of_options[] = array( "name" => __("Layout Options", "Avada"),
			"desc" => "",
			"id" => "element_options_wrapper",
			"std" => "<h3 style='margin: 0;'>Layout Options</h3>",
			"position" => "end",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Font Colors", "Avada"),
			"desc" => "",
			"id" => "font_colors_wrapper",
			"std" => "<h3 style='margin: 0;'>Font Colors</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Header Tagline Font Color", "Avada"),
			"desc" => __("Controls the text color of the header tagline font.", "Avada"),
			"id" => "tagline_font_color",
			"std" => "#747474",
			"type" => "color");

		$of_options[] = array( "name" => __("Page Title Font Color", "Avada"),
			"desc" => __("Controls the text color of the page title font.", "Avada"),
			"id" => "page_title_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Heading 1 (H1) Font Color", "Avada"),
			"desc" => __("Controls the text color of H1 headings.", "Avada"),
			"id" => "h1_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Heading 2 (H2) Font Color", "Avada"),
			"desc" => __("Controls the text color of H2 headings.", "Avada"),
			"id" => "h2_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Heading 3 (H3) Font Color", "Avada"),
			"desc" => __("Controls the text color of H3 headings.", "Avada"),
			"id" => "h3_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Heading 4 (H4) Font Color", "Avada"),
			"desc" => __("Controls the text color of H4 headings.", "Avada"),
			"id" => "h4_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Heading 5 (H5) Font Color", "Avada"),
			"desc" => __("Controls the text color of H5 headings.", "Avada"),
			"id" => "h5_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Heading 6 (H6) Font Color", "Avada"),
			"desc" => __("Controls the text color of H6 headings.", "Avada"),
			"id" => "h6_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Body Text Color", "Avada"),
			"desc" => __("Controls the text color of body font.", "Avada"),
			"id" => "body_text_color",
			"std" => "#747474",
			"type" => "color");

		$of_options[] = array( "name" => __("Link Color", "Avada"),
			"desc" => __("Controls the color of all text links as well as the '>' in certain areas.", "Avada"),
			"id" => "link_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Breadcrumbs Text Color", "Avada"),
			"desc" => __("Controls the text color of the breadcrumb font.", "Avada"),
			"id" => "breadcrumbs_text_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Sliding Bar Headings Color", "Avada"),
			"desc" => __("Controls the text color of the sliding bar heading font.", "Avada"),
			"id" => "slidingbar_headings_color",
			"std" => "#DDDDDD",
			"type" => "color");

		$of_options[] = array( "name" => __("Sliding Bar Font Color", "Avada"),
			"desc" => __("Controls the font color of the sliding bar font.", "Avada"),
			"id" => "slidingbar_text_color",
			"std" => "#8C8989",
			"type" => "color");

		$of_options[] = array( "name" => __("Sliding Bar Link Color", "Avada"),
			"desc" => __("Controls the text color of the sliding bar link font.", "Avada"),
			"id" => "slidingbar_link_color",
			"std" => "#BFBFBF",
			"type" => "color");

		$of_options[] = array( "name" => __("Sidebar Widget Headings Color", "Avada"),
			"desc" => __("Controls the text color of the sidebar widget headings.", "Avada"),
			"id" => "sidebar_heading_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Footer Headings Color", "Avada"),
			"desc" => __("Controls the text color of the footer heading font.", "Avada"),
			"id" => "footer_headings_color",
			"std" => "#DDDDDD",
			"type" => "color");

		$of_options[] = array( "name" => __("Footer Font Color", "Avada"),
			"desc" => __("Controls the text color of the footer font.", "Avada"),
			"id" => "footer_text_color",
			"std" => "#8C8989",
			"type" => "color");

		$of_options[] = array( "name" => __("Footer Link Color", "Avada"),
			"desc" => __("Controls the text color of the footer link font.", "Avada"),
			"id" => "footer_link_color",
			"std" => "#BFBFBF",
			"type" => "color");

	   $of_options[] = array( "name" => __("Font Colors", "Avada"),
			"desc" => "",
			"id" => "font_colors_wrapper",
			"std" => "<h3 style='margin: 0;'>Font Colors</h3>",
			"position" => "end",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Main Menu Colors", "Avada"),
			"desc" => "",
			"id" => "main_menu_colors_wrapper",
			"std" => "<h3 style='margin: 0;'>Main Menu Colors</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Main Menu Background Color For Header 4 & 5", "Avada"),
			"desc" => __("Controls the background color of the menu when using header 4 or 5.", "Avada"),
			"id" => "menu_h45_bg_color",
			"std" => "#FFFFFF",
			"type" => "color");

		$of_options[] = array( "name" => __("Main Menu Font Color - First Level", "Avada"),
			"desc" => __("Controls the text color of first level menu items.", "Avada"),
			"id" => "menu_first_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Main Menu Font Hover Color - First Level", "Avada"),
			"desc" => __("Controls the main menu hover, hover border & dropdown border color.", "Avada"),
			"id" => "menu_hover_first_color",
			"std" => "#a0ce4e",
			"type" => "color");

		$of_options[] = array( "name" => __("Main Menu Background Color - Sublevels", "Avada"),
			"desc" => __("Controls the color of the menu sublevel background.", "Avada"),
			"id" => "menu_sub_bg_color",
			"std" => "#f2efef",
			"type" => "color");

		$of_options[] = array( "name" => __("Main Menu Background Hover Color - Sublevels", "Avada"),
			"desc" => __("Controls the hover color of the menu sublevel background.", "Avada"),
			"id" => "menu_bg_hover_color",
			"std" => "#f8f8f8",
			"type" => "color");

		$of_options[] = array( "name" => __("Main Menu Font Color - Sublevels", "Avada"),
			"desc" => __("Controls the color of the menu font sublevels.", "Avada"),
			"id" => "menu_sub_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Main Menu Separator - Sublevels", "Avada"),
			"desc" => __("Controls the color of the menu separator sublevels.", "Avada"),
			"id" => "menu_sub_sep_color",
			"std" => "#dcdadb",
			"type" => "color");

		$of_options[] = array( "name" => __("Woo Cart Menu Background Color", "Avada"),
			"desc" => __("Controls the bottom section background color of the woocommerce cart dropdown.", "Avada"),
			"id" => "woo_cart_bg_color",
			"std" => "#fafafa",
			"type" => "color");

	   $of_options[] = array( "name" => __("Main Menu Colors", "Avada"),
			"desc" => "",
			"id" => "main_menu_colors_wrapper",
			"std" => "<h3 style='margin: 0;'>Main Menu Colors</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Secondary Menu Colors", "Avada"),
			"desc" => "",
			"id" => "menu_colors_intro",
			"std" => "<h3 style='margin: 0;'>Secondary Menu Colors</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Secondary Menu Font Color - First Level & Contact Info", "Avada"),
			"desc" => __("Controls the color of the secondary menu first level and contact info font.", "Avada"),
			"id" => "snav_color",
			"std" => "#747474",
			"type" => "color");

		$of_options[] = array( "name" => __("Secondary Menu Divider Color - First Level", "Avada"),
			"desc" => __("Controls the divider color of the first level secondary menu.", "Avada"),
			"id" => "header_top_first_border_color",
			"std" => "#e5e5e5",
			"type" => "color");

		$of_options[] = array( "name" => __("Secondary Menu Background Color - Sublevels", "Avada"),
			"desc" => __("Controls the background color of the secondary menu sublevels.", "Avada"),
			"id" => "header_top_sub_bg_color",
			"std" => "#ffffff",
			"type" => "color");

		$of_options[] = array( "name" => __("Secondary Menu Font Color - Sublevels", "Avada"),
			"desc" => __("Controls the text color of the secondary menu font sublevels.", "Avada"),
			"id" => "header_top_menu_sub_color",
			"std" => "#747474",
			"type" => "color");

		$of_options[] = array( "name" => __("Secondary Menu Hover Background Color - Sublevels", "Avada"),
			"desc" => __("Controls the hover color of the secondary menu background sublevels.", "Avada"),
			"id" => "header_top_menu_bg_hover_color",
			"std" => "#fafafa",
			"type" => "color");

		$of_options[] = array( "name" => __("Secondary Menu Hover Font Color - Sublevels", "Avada"),
			"desc" => __("Controls the hover text color of the secondary menu font sublevels.", "Avada"),
			"id" => "header_top_menu_sub_hover_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Secondary Menu Border  - Sublevels", "Avada"),
			"desc" => __("Controls the border color of the secondary menu sublevels.", "Avada"),
			"id" => "header_top_menu_sub_sep_color",
			"std" => "#e5e5e5",
			"type" => "color");

		$of_options[] = array( "name" => __("Secondary Menu Colors", "Avada"),
			"desc" => "",
			"id" => "menu_colors_intro",
			"std" => "<h3 style='margin: 0;'>Secondary Menu Colors</h3>",
			"position" => "end",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Mobile Menu Colors", "Avada"),
			"desc" => "",
			"id" => "mobile_menu_colors_wrapper",
			"std" => "<h3 style='margin: 0;'>Mobile Menu Colors</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Mobile Menu Background Color", "Avada"),
			"desc" => __("Controls the background color of the mobile menu box and dropdown.", "Avada"),
			"id" => "mobile_menu_background_color",
			"std" => "#f9f9f9",
			"type" => "color");

		$of_options[] = array( "name" => __("Mobile Menu Border Color", "Avada"),
			"desc" => __("Controls the border, divider and icon colors of the mobile menu.", "Avada"),
			"id" => "mobile_menu_border_color",
			"std" => "#dadada",
			"type" => "color");			

		$of_options[] = array( "name" => __("Mobile Menu Hover Color", "Avada"),
			"desc" => __("Controls the hover color of the mobile menu items.", "Avada"),
			"id" => "mobile_menu_hover_color",
			"std" => "#f6f6f6",
			"type" => "color");

	   $of_options[] = array( "name" => __("Mobile Menu Colors", "Avada"),
			"desc" => "",
			"id" => "mobile_menu_colors_wrapper",
			"std" => "<h3 style='margin: 0;'>Mobile Menu Colors</h3>",
			"position" => "end",
			"type" => "accordion");  

		$of_options[] = array( "name" => __("Shortcode Styling", "Avada"),
			"type" => "heading");

	   $of_options[] = array( "name" => __("Blog Shortcode", "Avada"),
			"desc" => "",
			"id" => "blog_shortcode",
			"std" => "<h3 style='margin: 0;'>Blog Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Blog Date Box Color", "Avada"),
			"desc" => __("Controls the color of the date box in blog alternate and recent posts layouts.", "Avada"),
			"id" => "dates_box_color",
			"std" => "#eef0f2",
			"type" => "color");

	   $of_options[] = array( "name" => __("Blog Shortcode", "Avada"),
			"desc" => "",
			"id" => "blog_shortcode",
			"std" => "<h3 style='margin: 0;'>Blog Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Button Shortcode", "Avada"),
			"desc" => "",
			"id" => "button_shortcode",
			"std" => "<h3 style='margin: 0;'>Button Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");		  
			
		$of_options[] = array( "name" => __("Button Size", "Avada"),
			"desc" => __("Select the default button size.", "Avada"),
			"id" => "button_size",
			"std" => "Large",
			"type" => "select",
			"options" => array('Small' => 'Small', 'Medium' => 'Medium', 'Large' => 'Large', 'XLarge' => 'XLarge'));

		$of_options[] = array( "name" => __("Button Shape", "Avada"),
			"desc" => __("Select the default shape for buttons.", "Avada"),
			"id" => "button_shape",
			"std" => "Round",
			"type" => "select",
			"options" => array('Square' => 'Square', 'Round' => 'Round', 'Pill' => 'Pill'));

		$of_options[] = array( "name" => __("Button Type", "Avada"),
			"desc" => __("Select the default button type.", "Avada"),
			"id" => "button_type",
			"std" => "Flat",
			"type" => "select",
			"options" => array('Flat' => 'Flat', '3d' => '3d'));						
			
		$of_options[] = array( "name" => __("Button Gradient Top Color", "Avada"),
			"desc" => __("Set the top color of the button background.", "Avada"),
			"id" => "button_gradient_top_color",
			"std" => "#a0ce4e",
			"type" => "color");

		$of_options[] = array( "name" => __("Button Gradient Bottom Color", "Avada"),
			"desc" => __("Set the bottom color of the button background or leave empty for solid color.", "Avada"),
			"id" => "button_gradient_bottom_color",
			"std" => "#a0ce4e",
			"type" => "color");

		$of_options[] = array( "name" => __("Button Gradient Top Hover Color", "Avada"),
			"desc" => __("Set the top hover color of the button background.", "Avada"),
			"id" => "button_gradient_top_color_hover",
			"std" => "#96c346",
			"type" => "color");

		$of_options[] = array( "name" => __("Button Gradient Bottom Hover Color", "Avada"),
			"desc" => __("Set the bottom hover color of the button background or leave empty for solid color. ", "Avada"),
			"id" => "button_gradient_bottom_color_hover",
			"std" => "#96c346",
			"type" => "color");
			
		$of_options[] = array( "name" => __("Button Accent Color", "Avada"),
			"desc" => __("This option controls the color of the button border, divider, text and icon.", "Avada"),
			"id" => "button_accent_color",
			"std" => "#fff",
			"type" => "color");

		$of_options[] = array( "name" => __("Button Accent Hover Color", "Avada"),
			"desc" => __("This option controls the hover color of the button border, divider, text and icon.", "Avada"),
			"id" => "button_accent_hover_color",
			"std" => "#fff",
			"type" => "color");		

		$of_options[] = array( "name" => __("Button Bevel Color (3D Mode only)", "Avada"),
			"desc" => __("Controls the default bevel color of the buttons.", "Avada"),
			"id" => "button_bevel_color",
			"std" => "#54770F",
			"type" => "color");			

		$of_options[] = array( "name" => __("Button Border Width", "Avada"),
			"desc" => __("Select the border width for buttons. Enter value in px. ex: 1px", "Avada"),
			"id" => "button_border_width",
			"std" => "0px",
			"type" => "text");

		$of_options[] = array( "name" => __("Button Shadow", "Avada"),
			"desc" => __("Select the box to disable the bottom button shadow and text shadow.", "Avada"),
			"id" => "button_text_shadow",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Button Shortcode", "Avada"),
			"desc" => "",
			"id" => "button_shortcode",
			"std" => "<h3 style='margin: 0;'>Button Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Carousel Shortcode", "Avada"),
			"desc" => "",
			"id" => "carousel_shortcode",
			"std" => "<h3 style='margin: 0;'>Carousel Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Carousel Default Nav Box Color", "Avada"),
			"desc" => __("Controls the color of the default navigation box for carousel sliders.", "Avada"),
			"id" => "carousel_nav_color",
			"std" => "#999999",
			"type" => "color");

		$of_options[] = array( "name" => __("Carousel Hover Nav Box Color", "Avada"),
			"desc" => __("Controls the color of the hover navigation box for carousel sliders.", "Avada"),
			"id" => "carousel_hover_color",
			"std" => "#808080",
			"type" => "color");

		$of_options[] = array( "name" => __("Carousel Shortcode", "Avada"),
			"desc" => "",
			"id" => "carousel_shortcode",
			"std" => "<h3 style='margin: 0;'>Carousel Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Content Box Shortcode", "Avada"),
			"desc" => "",
			"id" => "cb_shortcode",
			"std" => "<h3 style='margin: 0;'>Content Box Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Content Box Background Color", "Avada"),
			"desc" => __("Controls the color of the background for content boxes. Only use for 'icon-boxed' style. Leave transparent for other styles.", "Avada"),
			"id" => "content_box_bg_color",
			"std" => "transparent",
			"type" => "color");

		$of_options[] = array( "name" => __("Content Box Shortcode", "Avada"),
			"desc" => "",
			"id" => "cb_shortcode",
			"std" => "<h3 style='margin: 0;'>Content Box Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Checklist Shortcode", "Avada"),
			"desc" => "",
			"id" => "checklist_shortcode",
			"std" => "<h3 style='margin: 0;'>Checklist Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");
			
		$of_options[] = array( "name" => __("Checklist Circle", "Avada"),
			"desc" => __("Check the box if you want to use circles on checklists.", "Avada"),
			"id" => "checklist_circle",
			"std" => 1,
			"type" => "checkbox");			

		$of_options[] = array( "name" => __("Checklist Circle Color", "Avada"),
			"desc" => __("Controls the color of the checklist circle.", "Avada"),
			"id" => "checklist_circle_color",
			"std" => "#a0ce4e",
			"type" => "color");

		$of_options[] = array( "name" => __("Checklist Icon Color", "Avada"),
			"desc" => __("Controls the color of the checklist icon.", "Avada"),
			"id" => "checklist_icons_color",
			"std" => "#ffffff",
			"type" => "color");

		$of_options[] = array( "name" => __("Checklist Shortcode", "Avada"),
			"desc" => "",
			"id" => "checklist_shortcode",
			"std" => "<h3 style='margin: 0;'>Checklist Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Counter Circle Shortcode", "Avada"),
			"desc" => "",
			"id" => "cc_shortcode",
			"std" => "<h3 style='margin: 0;'>Counter Circles Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Counter Circle Filled Color", "Avada"),
			"desc" => __("Controls the color of the counter text and icon.", "Avada"),
			"id" => "counter_filled_color",
			"std" => "#a0ce4e",
			"type" => "color");

		$of_options[] = array( "name" => __("Counter Circle Unfilled Color", "Avada"),
			"desc" => __("Controls the color of the counter text and icon.", "Avada"),
			"id" => "counter_unfilled_color",
			"std" => "#f6f6f6",
			"type" => "color");

		$of_options[] = array( "name" => __("Counter Circle Shortcode", "Avada"),
			"desc" => "",
			"id" => "cc_shortcode",
			"std" => "<h3 style='margin: 0;'>Counter Circle Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Counter Boxes Shortcode", "Avada"),
			"desc" => "",
			"id" => "counterb_shortcode",
			"std" => "<h3 style='margin: 0;'>Counter Boxes Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Counter Box Title Font Color", "Avada"),
			"desc" => __("Controls the color of the counter \"value\" and icon.", "Avada"),
			"id" => "counter_box_color",
			"std" => "#a0ce4e",
			"type" => "color");

		$of_options[] = array( "name" => __("Counter Box Title Font Size (px)", "Avada"),
			"desc" => __("Controls the size of the counter \"value\" and icon. Enter the font size without 'px'. Default is 50.", "Avada"),
			"id" => "counter_box_title_size",
			"std" => "50",
			"type" => "text");

		$of_options[] = array( "name" => __("Counter Box Icon Size (px)", "Avada"),
			"desc" => __("Controls the size of the icon. Enter the font size without 'px'. Default is 50.", "Avada"),
			"id" => "counter_box_icon_size",
			"std" => "50",
			"type" => "text");

		$of_options[] = array( "name" => __("Counter Box Body Font Color", "Avada"),
			"desc" => __("Controls the color of the counter body text.", "Avada"),
			"id" => "counter_box_body_color",
			"std" => '#747474',
			"type" => "color");

		$of_options[] = array( "name" => __("Counter Box Body Font Size (px)", "Avada"),
			"desc" => __("Controls the size of the counter body text. Enter the font size without 'px'. Default is 13.", "Avada"),
			"id" => "counter_box_body_size",
			"std" => "13",
			"type" => "text");

		$of_options[] = array( "name" => __("Counter Box Border Color", "Avada"),
			"desc" => __("Controls the color of the border.", "Avada"),
			"id" => "counter_box_border_color",
			"std" => "#e0dede",
			"type" => "color");

		$of_options[] = array( "name" => __("Counter Boxes Shortcode", "Avada"),
			"desc" => "",
			"id" => "counterb_shortcode",
			"std" => "<h3 style='margin: 0;'>Counter Boxes Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Dropcap Shortcode", "Avada"),
			"desc" => "",
			"id" => "dropcap_shortcode",
			"std" => "<h3 style='margin: 0;'>Dropcap Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Dropcap Color", "Avada"),
			"desc" => __("Controls the color of the dropcap text, or the dropcap box is a box is used.", "Avada"),
			"id" => "dropcap_color",
			"std" => "#a0ce4e",
			"type" => "color");

		$of_options[] = array( "name" => __("Dropcap Shortcode", "Avada"),
			"desc" => "",
			"id" => "dropcap_shortcode",
			"std" => "<h3 style='margin: 0;'>Dropcap Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Flip Boxes Shortcode", "Avada"),
			"desc" => "",
			"id" => "flipb_shortcode",
			"std" => "<h3 style='margin: 0;'>Flip Boxes Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Flip Box Background Color Frontside", "Avada"),
			"desc" => __("Controls the color of frontside background color.", "Avada"),
			"id" => "flip_boxes_front_bg",
			"std" => "#f6f6f6",
			"type" => "color");

		$of_options[] = array( "name" => __("Flip Box Heading Color Frontside", "Avada"),
			"desc" => __("Controls the color of frontside heading color.", "Avada"),
			"id" => "flip_boxes_front_heading",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Flip Box Text Color Frontside", "Avada"),
			"desc" => __("Controls the color of frontside text color.", "Avada"),
			"id" => "flip_boxes_front_text",
			"std" => "#747474",
			"type" => "color");

		$of_options[] = array( "name" => __("Flip Box Background Color Backside", "Avada"),
			"desc" => __("Controls the color of backside background color.", "Avada"),
			"id" => "flip_boxes_back_bg",
			"std" => "#a0ce4e",
			"type" => "color");

		$of_options[] = array( "name" => __("Flip Box Heading Color Backside", "Avada"),
			"desc" => __("Controls the color of backside heading color.", "Avada"),
			"id" => "flip_boxes_back_heading",
			"std" => "#eeeded",
			"type" => "color");

		$of_options[] = array( "name" => __("Flip Box Text Color Backside", "Avada"),
			"desc" => __("Controls the color of backside text color.", "Avada"),
			"id" => "flip_boxes_back_text",
			"std" => "#ffffff",
			"type" => "color");


		$of_options[] = array( "name" => __("Flip Box Border Size", "Avada"),
			"desc" => __("Controls the border size of flip boxes.", "Avada"),
			"id" => "flip_boxes_border_size",
			"std" => "1px",
			"type" => "text");

		$of_options[] = array( "name" => __("Flip Box Border Color", "Avada"),
			"desc" => __("Controls the border color of flip boxes.", "Avada"),
			"id" => "flip_boxes_border_color",
			"std" => "transparent",
			"type" => "color");

		$of_options[] = array( "name" => __("Flip Box Border Radius", "Avada"),
			"desc" => __("Controls the border radius (roundness) of flip boxes.", "Avada"),
			"id" => "flip_boxes_border_radius",
			"std" => "4px",
			"type" => "text");

		$of_options[] = array( "name" => __("Flip Boxes Shortcode", "Avada"),
			"desc" => "",
			"id" => "flipb_shortcode",
			"std" => "<h3 style='margin: 0;'>Flip Boxes Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Full Width Shortcode", "Avada"),
			"desc" => "",
			"id" => "fullwidth_shortcode",
			"std" => "<h3 style='margin: 0;'>Full Width Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Full Width Background Color", "Avada"),
			"desc" => __("Controls the background color of the full width section.", "Avada"),
			"id" => "full_width_bg_color",
			"std" => "",
			"type" => "color");

	   $of_options[] = array( "name" => __("Full Width Border Size", "Avada"),
			"desc" => __("Controls the border size of the full width section.", "Avada"),
			"id" => "full_width_border_size",
			"std" => "0px",
			"type" => "text");

	   $of_options[] = array( "name" => __("Full Width Border Color", "Avada"),
			"desc" => __("Controls the border color of the full width section.", "Avada"),
			"id" => "full_width_border_color",
			"std" => "#eae9e9",
			"type" => "color");

		$of_options[] = array( "name" => __("Full Width Shortcode", "Avada"),
			"desc" => "",
			"id" => "fullwidth_shortcode",
			"std" => "<h3 style='margin: 0;'>Full Width Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Icon Shortcode", "Avada"),
			"desc" => "",
			"id" => "icon_shortcode",
			"std" => "<h3 style='margin: 0;'>Icon Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Icon Circle Background Color", "Avada"),
			"desc" => __("Controls the color of the circle when used with icons.", "Avada"),
			"id" => "icon_circle_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Icon Circle Border Color", "Avada"),
			"desc" => __("Controls the color of the circle border when used with icons.", "Avada"),
			"id" => "icon_border_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Icon Color", "Avada"),
			"desc" => __("Controls the color of the icons.", "Avada"),
			"id" => "icon_color",
			"std" => "#ffffff",
			"type" => "color");

		$of_options[] = array( "name" => __("Icon Shortcode", "Avada"),
			"desc" => "",
			"id" => "icon_shortcode",
			"std" => "<h3 style='margin: 0;'>Icon Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Image Frame Shortcode", "Avada"),
			"desc" => "",
			"id" => "imgf_shortcode",
			"std" => "<h3 style='margin: 0;'>Image Frame Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Image Frame Border Color", "Avada"),
			"desc" => __("Controls the border color of the image frame.", "Avada"),
			"id" => "imgframe_border_color",
			"std" => "#f6f6f6",
			"type" => "color");

		$of_options[] = array( "name" => __("Image Frame Border Size", "Avada"),
			"desc" => __("Controls the border size of the image.", "Avada"),
			"id" => "imageframe_border_size",
			"std" => "0",
			"type" => "text");
			
		$of_options[] = array( "name" => __("Image Frame Border Radius", "Avada"),
			"desc" => __("Controls the border radius of the image. In pixels, ex: 4px.", "Avada"),
			"id" => "imageframe_border_radius",
			"std" => "0",
			"type" => "text");				

		$of_options[] = array( "name" => __("Image Frame Style Color", "Avada"),
			"desc" => __("Controls the style color of the image frame. Only works for glow and dropshadow style.", "Avada"),
			"id" => "imgframe_style_color",
			"std" => "#000000",
			"type" => "color");

		$of_options[] = array( "name" => __("Image Frame Shortcode", "Avada"),
			"desc" => "",
			"id" => "imgf_shortcode",
			"std" => "<h3 style='margin: 0;'>Image Frame Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Modal Shortcode", "Avada"),
			"desc" => "",
			"id" => "modal_shortcode",
			"std" => "<h3 style='margin: 0;'>Modal Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Modal Background Color", "Avada"),
			"desc" => __("Controls the background color of the modal popup box", "Avada"),
			"id" => "modal_bg_color",
			"std" => "#f6f6f6",
			"type" => "color");

	   $of_options[] = array( "name" => __("Modal Border Color", "Avada"),
			"desc" => __("Controls the border color of the modal popup box", "Avada"),
			"id" => "modal_border_color",
			"std" => "#ebebeb",
			"type" => "color");

		$of_options[] = array( "name" => __("Modal Shortcode", "Avada"),
			"desc" => "",
			"id" => "modal_shortcode",
			"std" => "<h3 style='margin: 0;'>Modal Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Person Shortcode", "Avada"),
			"desc" => "",
			"id" => "person_shortcode",
			"std" => "<h3 style='margin: 0;'>Person Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Person Border Color", "Avada"),
			"desc" => __("Controls the border color of the of the image.", "Avada"),
			"id" => "person_border_color",
			"std" => "#f6f6f6",
			"type" => "color");

		$of_options[] = array( "name" => __("Person Border Size", "Avada"),
			"desc" => __("Controls the border size of the image.", "Avada"),
			"id" => "person_border_size",
			"std" => "0",
			"type" => "text");
			
		$of_options[] = array( "name" => __("Person Border Radius", "Avada"),
			"desc" => __("Controls the border radius of the image. In pixels, ex: 4px.", "Avada"),
			"id" => "person_border_radius",
			"std" => "0",
			"type" => "text");		

		$of_options[] = array( "name" => __("Person Style Color", "Avada"),
			"desc" => __("For all style types except border. Controls the style color. ", "Avada"),
			"id" => "person_style_color",
			"std" => "#000000",
			"type" => "color");

		$of_options[] = array( "name" => __("Person Shortcode", "Avada"),
			"desc" => "",
			"id" => "person_shortcode",
			"std" => "<h3 style='margin: 0;'>Person Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Popover Shortcode", "Avada"),
			"desc" => "",
			"id" => "popover_shortcode",
			"std" => "<h3 style='margin: 0;'>Popover Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Popover Heading Background Color", "Avada"),
			"desc" => __("Controls the background color of popover heading area.", "Avada"),
			"id" => "popover_heading_bg_color",
			"std" => "#f6f6f6",
			"type" => "color");

		$of_options[] = array( "name" => __("Popover Content Background Color", "Avada"),
			"desc" => __("Controls the background color of popover content area.", "Avada"),
			"id" => "popover_content_bg_color",
			"std" => "#ffffff",
			"type" => "color");

		$of_options[] = array( "name" => __("Popover Border Color", "Avada"),
			"desc" => __("Controls the border color of popover box.", "Avada"),
			"id" => "popover_border_color",
			"std" => "#ebebeb",
			"type" => "color");

		$of_options[] = array( "name" => __("Popover Text Color", "Avada"),
			"desc" => __("Controls the text color inside the popover box. ", "Avada"),
			"id" => "popover_text_color",
			"std" => "#747474",
			"type" => "color");
			
		$of_options[] = array( "name" => __("Popover Position", "Avada"),
			"desc" => __("Controls the position of the popover in reference to the triggering text.", "Avada"),
			"id" => "popover_placement",
			"std" => "Top",
			"type" => "select",
			"options" => array( 'Top' => 'Top', 'Right' => 'Right', 'Bottom' => 'Bottom', 'Left' => 'Left' ));			

		$of_options[] = array( "name" => __("Popover Shortcode", "Avada"),
			"desc" => "",
			"id" => "popover_shortcode",
			"std" => "<h3 style='margin: 0;'>Popover Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Pricing Table Shortcode", "Avada"),
			"desc" => "",
			"id" => "pricingtable_shortcode",
			"std" => "<h3 style='margin: 0;'>Pricing Table Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Pricing Box Style 1 Heading Color", "Avada"),
			"desc" => __("Controls the heading color of full boxed pricing tables.", "Avada"),
			"id" => "full_boxed_pricing_box_heading_color",
			"std" => "#333333",
			"type" => "color");
		
		$of_options[] = array( "name" => __("Pricing Box Style 2 Heading Color", "Avada"),
			"desc" => __("Controls the heading color of separate pricing boxes.", "Avada"),
			"id" => "sep_pricing_box_heading_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Pricing Box Color", "Avada"),
			"desc" => __("Controls the color portions of pricing boxes.", "Avada"),
			"id" => "pricing_box_color",
			"std" => "#a0ce4e",
			"type" => "color");

		$of_options[] = array( "name" => __("Pricing Box Bg Color", "Avada"),
			"desc" => __("Controls the color of main background and title background.", "Avada"),
			"id" => "pricing_bg_color",
			"std" => "#ffffff",
			"type" => "color");

		$of_options[] = array( "name" => __("Pricing Box Border Color", "Avada"),
			"desc" => __("Controls the color of the outer border, pricing row and footer row backgrounds.", "Avada"),
			"id" => "pricing_border_color",
			"std" => "#f8f8f8",
			"type" => "color");

		$of_options[] = array( "name" => __("Pricing Box Divider Color", "Avada"),
			"desc" => __("Controls the color of the dividers in-between pricing rows.", "Avada"),
			"id" => "pricing_divider_color",
			"std" => "#ededed",
			"type" => "color");

		$of_options[] = array( "name" => __("Pricing Table Shortcode", "Avada"),
			"desc" => "",
			"id" => "pricingtable_shortcode",
			"std" => "<h3 style='margin: 0;'>Pricing Table Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Progress Bar Shortcode", "Avada"),
			"desc" => "",
			"id" => "progressbar_shortcode",
			"std" => "<h3 style='margin: 0;'>Progress Bar Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Progress Bar Filled Color", "Avada"),
			"desc" => __("Controls the color of the filled area in progress bars.", "Avada"),
			"id" => "progressbar_filled_color",
			"std" => "#a0ce4e",
			"type" => "color");

		$of_options[] = array( "name" => __("Progress Bar Unfilled Color", "Avada"),
			"desc" => __("Controls the color of the unfilled area in progress bars.", "Avada"),
			"id" => "progressbar_unfilled_color",
			"std" => "#f6f6f6",
			"type" => "color");

		$of_options[] = array( "name" => __("Progress Bar Text Color", "Avada"),
			"desc" => __("Controls the color of the text in progress bars.", "Avada"),
			"id" => "progressbar_text_color",
			"std" => "#ffffff",
			"type" => "color");

		$of_options[] = array( "name" => __("Progress Bar Shortcode", "Avada"),
			"desc" => "",
			"id" => "progressbar_shortcode",
			"std" => "<h3 style='margin: 0;'>Progress Bar Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Separator Shortcode", "Avada"),
			"desc" => "",
			"id" => "separator_shortcode",
			"std" => "<h3 style='margin: 0;'>Separator Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Separators Color", "Avada"),
			"desc" => __("Controls the color of all separators, divider lines and borders for meta, previous & next, filters, category page, boxes around number pagination, sidebar widgets, accordion divider lines, counter boxes and more.", "Avada"),
			"id" => "sep_color",
			"std" => "#e0dede",
			"type" => "color");

		$of_options[] = array( "name" => __("Separator Shortcode", "Avada"),
			"desc" => "",
			"id" => "separator_shortcode",
			"std" => "<h3 style='margin: 0;'>Separator Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Section Separator Shortcode", "Avada"),
			"desc" => "",
			"id" => "sectionseparator_shortcode",
			"std" => "<h3 style='margin: 0;'>Section Separator Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Section Separator Border Size", "Avada"),
			"desc" => __("Controls the border size of the section separator.", "Avada"),
			"id" => "section_sep_border_size",
			"std" => "1px",
			"type" => "text");


		$of_options[] = array( "name" => __("Section Separator Background Color of Divider Candy", "Avada"),
			"desc" => __("Controls the background color of the divider candy.", "Avada"),
			"id" => "section_sep_bg",
			"std" => "#f6f6f6",
			"type" => "color");

		$of_options[] = array( "name" => __("Section Separator Border Color", "Avada"),
			"desc" => __("Controls the border color of the separator.", "Avada"),
			"id" => "section_sep_border_color",
			"std" => '#f6f6f6',
			"type" => "color");

	   $of_options[] = array( "name" => __("Section Separator Shortcode", "Avada"),
			"desc" => "",
			"id" => "sectionseparator_shortcode",
			"std" => "<h3 style='margin: 0;'>Section Separator Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Sharing Box Shortcode", "Avada"),
			"desc" => "",
			"id" => "sharingbox_shortcode",
			"std" => "<h3 style='margin: 0;'>Sharing Box Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Sharing Box Background Color", "Avada"),
			"desc" => __("Controls the background color of the sharing box.", "Avada"),
			"id" => "sharing_box_bg_color",
			"std" => '#f6f6f6',
			"type" => "color");

		$of_options[] = array( "name" => __("Sharing Box Tagline Text Color", "Avada"),
			"desc" => __("Controls the text color of the tagline text.", "Avada"),
			"id" => "sharing_box_tagline_text_color",
			"std" => '#333333',
			"type" => "color");

	   $of_options[] = array( "name" => __("Sharing Box Shortcode", "Avada"),
			"desc" => "",
			"id" => "sharingbox_shortcode",
			"std" => "<h3 style='margin: 0;'>Sharing Box Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Social Links Shortcode", "Avada"),
			"desc" => "",
			"id" => "sociallinks_shortcode",
			"std" => "<h3 style='margin: 0;'>Social Links Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Social Links Custom Icons Color", "Avada"),
			"desc" => __("Select a custom social icon color.", "Avada"),
			"id" => "social_links_icon_color",
			"std" => "#bebdbd",
			"type" => "color");

		$of_options[] = array( "name" => __("Social Links Icons Boxed", "Avada"),
			"desc" => __("Controls the color of the social icons in the sharing box.", "Avada"),
			"id" => "social_links_boxed",
			"std" => "No",
			"type" => "select",
			"options" => array('No' => 'No', 'Yes' => 'Yes'));

		$of_options[] = array( "name" => __("Social Links Icons Custom Box Color", "Avada"),
			"desc" => __("Select a custom social icon box color.", "Avada"),
			"id" => "social_links_box_color",
			"std" => "#e8e8e8",
			"type" => "color");

		$of_options[] = array( "name" => __("Social Links Icons Boxed Radius", "Avada"),
			"desc" => __("Boxradius for the social icons. In pixels, ex: 4px.", "Avada"),
			"id" => "social_links_boxed_radius",
			"std" => "4px",
			"type" => "text");

		$of_options[] = array( "name" => __("Social Links Icons Tooltip Position", "Avada"),
			"desc" => __("Controls the tooltip position of the social icons in the sharing box.", "Avada"),
			"id" => "social_links_tooltip_placement",
			"std" => "Top",
			"type" => "select",
			"options" => array( 'Top' => 'Top', 'Right' => 'Right', 'Bottom' => 'Bottom', 'Left' => 'Left', 'None' => 'None' ));

	   $of_options[] = array( "name" => __("Social Links Shortcode", "Avada"),
			"desc" => "",
			"id" => "sociallinks_shortcode",
			"std" => "<h3 style='margin: 0;'>Social Links Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Tabs Shortcode", "Avada"),
			"desc" => "",
			"id" => "tabs_shortcode",
			"std" => "<h3 style='margin: 0;'>Tabs Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Tabs Background Color + Hover Color", "Avada"),
			"desc" => __("Controls the color of the active tab, content background color and tab hover.", "Avada"),
			"id" => "tabs_bg_color",
			"std" => "#ffffff",
			"type" => "color");

		$of_options[] = array( "name" => __("Tabs Inactive Color", "Avada"),
			"desc" => __("Controls the color of the inactive tabs.", "Avada"),
			"id" => "tabs_inactive_color",
			"std" => "#ebeaea",
			"type" => "color");
			
		$of_options[] = array( "name" => __("Tabs Border Color", "Avada"),
			"desc" => __("Controls the color of the outer tab border.", "Avada"),
			"id" => "tabs_border_color",
			"std" => "#ebeaea",
			"type" => "color");			

	   $of_options[] = array( "name" => __("Tabs Shortcode", "Avada"),
			"desc" => "",
			"id" => "tabs_shortcode",
			"std" => "<h3 style='margin: 0;'>Tabs Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Tagline Shortcode", "Avada"),
			"desc" => "",
			"id" => "tagline_shortcode",
			"std" => "<h3 style='margin: 0;'>Tagline Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Tagline Box Background Color", "Avada"),
			"desc" => __("Controls the background color of the tagline box.", "Avada"),
			"id" => "tagline_bg",
			"std" => "#f6f6f6",
			"type" => "color");

		$of_options[] = array( "name" => __("Tagline Box Border Color", "Avada"),
			"desc" => __("Controls the border color of the tagline box.", "Avada"),
			"id" => "tagline_border_color",
			"std" => "#f6f6f6",
			"type" => "color");

	   $of_options[] = array( "name" => __("Tagline Shortcode", "Avada"),
			"desc" => "",
			"id" => "tagline_shortcode",
			"std" => "<h3 style='margin: 0;'>Tagline Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Testimonials Shortcode", "Avada"),
			"desc" => "",
			"id" => "testimonials_shortcode",
			"std" => "<h3 style='margin: 0;'>Testimonials Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Testimonial Background Color", "Avada"),
			"desc" => __("Controls the background color of the testimonial.", "Avada"),
			"id" => "testimonial_bg_color",
			"std" => "#f6f6f6",
			"type" => "color");

		$of_options[] = array( "name" => __("Testimonial Text Color", "Avada"),
			"desc" => __("Controls the text color of the testimonial font.", "Avada"),
			"id" => "testimonial_text_color",
			"std" => "#747474",
			"type" => "color");

		$of_options[] = array( "name" => __("Testimonials Speed", "Avada"),
			"desc" => __("Select the slideshow speed, 1000 = 1 second.", "Avada"),
			"id" => "testimonials_speed",
			"std" => "4000",
			"type" => "text");		
		
	   $of_options[] = array( "name" => __("Testimonials Shortcode", "Avada"),
			"desc" => "",
			"id" => "testimonials_shortcode",
			"std" => "<h3 style='margin: 0;'>Testimonials Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Title Shortcode", "Avada"),
			"desc" => "",
			"id" => "title_shortcode",
			"std" => "<h3 style='margin: 0;'>Title Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Title Separator Color", "Avada"),
			"desc" => __("Controls the color of the title separators", "Avada"),
			"id" => "title_border_color",
			"std" => "#e0dede",
			"type" => "color");

		$of_options[] = array( "name" => __("Title Shortcode", "Avada"),
			"desc" => "",
			"id" => "title_shortcode",
			"std" => "<h3 style='margin: 0;'>Title Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

	   $of_options[] = array( "name" => __("Toggles Shortcode", "Avada"),
			"desc" => "",
			"id" => "accordion_shortcode",
			"std" => "<h3 style='margin: 0;'>Toggles Shortcode</h3>",
			"position" => "start",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Toggles Inactive Box Color", "Avada"),
			"desc" => __("Controls the color of the inactive boxes behind the '+' icons.", "Avada"),
			"id" => "accordian_inactive_color",
			"std" => "#333333",
			"type" => "color");

	   $of_options[] = array( "name" => __("Toggles Shortcode", "Avada"),
			"desc" => "",
			"id" => "accordion_shortcode",
			"std" => "<h3 style='margin: 0;'>Toggles Shortcode</h3>",
			"position" => "end",
			"type" => "accordion");

		$of_options[] = array( "name" => __("Blog", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("General Blog Options", "Avada"),
			"desc" => "",
			"id" => "blog_single_post",
			"std" => "<h3 style='margin: 0;'>General Blog Options</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Blog Page Title", "Avada"),
			"desc" => __("This text will display in the page title bar of the assigned blog page.", "Avada"),
			"id" => "blog_title",
			"std" => "Blog",
			"type" => "text");

		$of_options[] = array( "name" => __("Blog Page Subtitle", "Avada"),
			"desc" => __("This text will display as subheading in the page title bar of the assigned blog page.", "Avada"),
			"id" => "blog_subtitle",
			"std" => "",
			"type" => "text");
			
		$of_options[] = array( "name" => __("Page Title Bar", "Avada"),
			"desc" => __("Check the box to show the page title bar for the assigned blog page.", "Avada"),
			"id" => "blog_show_page_title_bar",
			"std" => 1,
			"type" => "checkbox");			

		$of_options[] = array( "name" => __("Blog Layout", "Avada"),
			"desc" => __("Select the layout for the assigned blog page in settings > reading.", "Avada"),
			"id" => "blog_layout",
			"std" => "Large",
			"type" => "select",
			"options" => array(
				'Large' => 'Large',
				'Medium' => 'Medium',
				'Large Alternate' => 'Large Alternate',
				'Medium Alternate' => 'Medium Alternate',
				'Grid' => 'Grid',
				'Timeline' => 'Timeline'
			));

		$of_options[] = array( "name" => __("Blog Archive/Category Layout", "Avada"),
			"desc" => __("Select the layout for the blog archive/category pages.", "Avada"),
			"id" => "blog_archive_layout",
			"std" => "Large",
			"type" => "select",
			"options" => array(
				'Large' => 'Large',
				'Medium' => 'Medium',
				'Large Alternate' => 'Large Alternate',
				'Medium Alternate' => 'Medium Alternate',
				'Grid' => 'Grid',
				'Timeline' => 'Timeline'
			));

		$of_options[] = array( "name" => __("Pagination Type", "Avada"),
			"desc" => __("Select the pagination type for the assigned blog page in settings > reading.", "Avada"),
			"id" => "blog_pagination_type",
			"std" => "pagination",
			"type" => "select",
			"options" => array(
				'Pagination' => 'Pagination',
				'Infinite Scroll' => 'Infinite Scroll',
			));

		$of_options[] = array( "name" => __("Grid Layout # of Columns", "Avada"),
			"desc" => __("Select whether to display the grid layout in 2, 3 or 4 columns.", "Avada"),
			"id" => "blog_grid_columns",
			"std" => "3",
			"type" => "select",
			"options" => array(
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',
			));
			
		$of_options[] = array( "name" => __("Grid Layout Column Spacing", "Avada"),
			"desc" => __("Insert the amount of spacing between grid items without 'px'. ex: 40", "Avada"),
			"id" => "blog_grid_column_spacing",
			"std" => "40",
			"type" => "text");			

		$of_options[] = array( "name" => __("Excerpt or Full Blog Content", "Avada"),
			"desc" => __("Choose to display an excerpt or full content on blog pages.", "Avada"),
			"id" => "content_length",
			"std" => "Excerpt",
			"type" => "select",
			"options" => array('Excerpt' => 'Excerpt', 'Full Content' => 'Full Content'));

		$of_options[] = array( "name" => __("Excerpt Length", "Avada"),
			"desc" => __("Insert the number of words you want to show in the post excerpts.", "Avada"),
			"id" => "excerpt_length_blog",
			"std" => "55",
			"type" => "text");

		$of_options[] = array( "name" => __("Strip HTML from Excerpt", "Avada"),
			"desc" => __("Check the box if you want to strip HTML from the excerpt content only.", "Avada"),
			"id" => "strip_html_excerpt",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Featured Image On Blog Archive Page", "Avada"),
			"desc" => __("Check the box to display featured images on blog archive page.", "Avada"),
			"id" => "featured_images",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Blog Alternate Date Format - Month and Year", "Avada"),
			"desc" => __("<a href='http://codex.wordpress.org/Formatting_Date_and_Time'>Formatting Date and Time</a>", "Avada"),
			"id" => "alternate_date_format_month_year",
			"std" => "m, Y",
			"type" => "text");

		$of_options[] = array( "name" => __("Blog Alternate Date Format - Day", "Avada"),
			"desc" => __("<a href='http://codex.wordpress.org/Formatting_Date_and_Time'>Formatting Date and Time</a>", "Avada"),
			"id" => "alternate_date_format_day",
			"std" => "j",
			"type" => "text");

		$of_options[] = array( "name" => __("Blog Timeline Date Format - Timeline Labels", "Avada"),
			"desc" => __("<a href='http://codex.wordpress.org/Formatting_Date_and_Time'>Formatting Date</a>", "Avada"),
			"id" => "timeline_date_format",
			"std" => "F Y",
			"type" => "text");

		$of_options[] = array( "name" => __("Blog Single Post", "Avada"),
			"desc" => "",
			"id" => "blog_single_post",
			"std" => "<h3 style='margin: 0;'>Blog Single Post Page Options</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Featured Image / Video on Single Post Page", "Avada"),
			"desc" => __("Check the box to display featured images and videos on single post pages.", "Avada"),
			"id" => "featured_images_single",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Previous/Next Pagination", "Avada"),
			"desc" => __("Check the box to disable previous/next pagination.", "Avada"),
			"id" => "blog_pn_nav",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Post Title", "Avada"),
			"desc" => __("Check the box to display the post title that goes below the featured images.", "Avada"),
			"id" => "blog_post_title",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Author Info Box", "Avada"),
			"desc" => __("Check the box to display the author info box below posts.", "Avada"),
			"id" => "author_info",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Social Sharing Box", "Avada"),
			"desc" => __("Check the box to display the social sharing box.", "Avada"),
			"id" => "social_sharing_box",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Related Posts", "Avada"),
			"desc" => __("Check the box to display related posts.", "Avada"),
			"id" => "related_posts",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Comments", "Avada"),
			"desc" => __("Check the box to display comments.", "Avada"),
			"id" => "blog_comments",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Blog Meta", "Avada"),
			"desc" => "",
			"id" => "blog_meta",
			"std" => "<h3 style='margin: 0;'>Blog Meta Options</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Post Meta", "Avada"),
			"desc" => __("Check the box to display post meta on blog posts.", "Avada"),
			"id" => "post_meta",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Post Meta Author", "Avada"),
			"desc" => __("Check the box to hide the author name from post meta.", "Avada"),
			"id" => "post_meta_author",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Post Meta Date", "Avada"),
			"desc" => __("Check the box to hide the date from post meta.", "Avada"),
			"id" => "post_meta_date",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Post Meta Categories", "Avada"),
			"desc" => __("Check the box to hide the categories from post meta.", "Avada"),
			"id" => "post_meta_cats",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Post Meta Comments", "Avada"),
			"desc" => __("Check the box to hide the comments from post meta.", "Avada"),
			"id" => "post_meta_comments",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Post Meta Read More Link", "Avada"),
			"desc" => __("Check the box to hide the read more link from post meta.", "Avada"),
			"id" => "post_meta_read",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Post Meta Tags", "Avada"),
			"desc" => __("Check the box to hide the tags from post meta.", "Avada"),
			"id" => "post_meta_tags",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Date Format", "Avada"),
			"desc" => __("<a href='http://codex.wordpress.org/Formatting_Date_and_Time'>Formatting Date and Time</a>", "Avada"),
			"id" => "date_format",
			"std" => "F jS, Y",
			"type" => "text");

		$of_options[] = array( "name" => __("Portfolio", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("General Portfolio Options", "Avada"),
			"desc" => "",
			"id" => "blog_single_post",
			"std" => "<h3 style='margin: 0;'>General Portfolio Options</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Number of Portfolio Items Per Page", "Avada"),
			"desc" => __("Insert the number of posts to display per page.", "Avada"),
			"id" => "portfolio_items",
			"std" => "10",
			"type" => "text");

		$of_options[] = array( "name" => __("Portfolio Archive/Category Layout", "Avada"),
			"desc" => __("Select the layout for only the archive/category pages.", "Avada"),
			"id" => "portfolio_archive_layout",
			"std" => "Portfolio One Column",
			"type" => "select",
			"options" => array(
				'Portfolio One Column' => 'Portfolio One Column',
				'Portfolio Two Column' => 'Portfolio Two Column',
				'Portfolio Three Column' => 'Portfolio Three Column',
				'Portfolio Four Column' => 'Portfolio Four Column',
				'Portfolio Five Column' => 'Portfolio Five Column',
				'Portfolio Six Column' => 'Portfolio Six Column',
				'Portfolio One Column Text' => 'Portfolio One Column Text',
				'Portfolio Two Column Text' => 'Portfolio Two Column Text',
				'Portfolio Three Column Text' => 'Portfolio Three Column Text',
				'Portfolio Four Column Text' => 'Portfolio Four Column Text',
				'Portfolio Five Column Text' => 'Portfolio Five Column Text',
				'Portfolio Six Column Text' => 'Portfolio Six Column Text',				
				'Portfolio Grid' => 'Portfolio Grid',
			));
			
		$of_options[] = array( "name" => __("Portfolio Archive/Category Column Spacing", "Avada"),
			"desc" => __("Insert the amount of spacing between portfolio items without'px'.<br />ex: 12", "Avada"),
			"id" => "portfolio_column_spacing",
			"std" => "12",
			"type" => "text");				

		$of_options[] = array( "name" => __("Excerpt or Full Portfolio Content", "Avada"),
			"desc" => __("Choose to show a text excerpt or full content.", "Avada"),
			"id" => "portfolio_content_length",
			"std" => "Excerpt",
			"type" => "select",
			"options" => array('Excerpt' => 'Excerpt', 'Full Content' => 'Full Content'));

		$of_options[] = array( "name" => __("Excerpt Length", "Avada"),
			"desc" => __("Insert the number of words you want to show in the post excerpts.", "Avada"),
			"id" => "excerpt_length_portfolio",
			"std" => "55",
			"type" => "text");

		$of_options[] = array( "name" => __("Pagination Type", "Avada"),
			"desc" => __("Select the pagination type for Portfolio layouts.", "Avada"),
			"id" => "grid_pagination_type",
			"std" => "pagination",
			"type" => "select",
			"options" => array(
				'Pagination' => 'Pagination',
				'Infinite Scroll' => 'Infinite Scroll',
			));

		$of_options[] = array( "name" => __("Portfolio Text Layout", "Avada"),
			"desc" => __("Select if the portfolio text layouts are boxed or unboxed.", "Avada"),
			"id" => "portfolio_text_layout",
			"std" => "unboxed",
			"type" => "select",
			"options" => array(
				'boxed' => 'Boxed',
				'unboxed' => 'Unboxed',
			));

		$of_options[] = array( "name" => __("Portfolio Slug", "Avada"),
			"desc" => __("Change/Rewrite the permalink when you use the permalink type as %postname%. <strong>Make sure to regenerate permalinks.</strong>", "Avada"),
			"id" => "portfolio_slug",
			"std" => "portfolio-items",
			"type" => "text");
			
		$of_options[] = array( "name" => __("Portfolio Featured Image Size ", "Avada"),
			"desc" => __("Choose if the featured images are fixed (cropped) or auto (full image ratio) for all portfolio column page templates. IMPORTANT: Fixed images work best with smaller site widths. Auto images work best with larger site widths.", "Avada"),
			"id" => "portfolio_featured_image_size",
			"std" => "fixed",
			"type" => "select",
			"options" => array(
				'cropped' => 'Fixed',
				'full' => 'Auto',
			));			

		$of_options[] = array( "name" => __("Portfolio Single Post Page Options", "Avada"),
			"desc" => "",
			"id" => "blog_single_post",
			"std" => "<h3 style='margin: 0;'>Portfolio Single Post Page Options</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Featured Image / Video on Single Post Page", "Avada"),
			"desc" => __("Check the box to display featured images and videos on single post pages.", "Avada"),
			"id" => "portfolio_featured_images",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Previous/Next Pagination", "Avada"),
			"desc" => __("Check the box to disable previous/next pagination.", "Avada"),
			"id" => "portfolio_pn_nav",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Show Comments", "Avada"),
			"desc" => __("Check the box to enable comments on portfolio items.", "Avada"),
			"id" => "portfolio_comments",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Show Author", "Avada"),
			"desc" => __("Check the box to enable Author on portfolio items.", "Avada"),
			"id" => "portfolio_author",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Social Sharing Box", "Avada"),
			"desc" => __("Check the box to display the social sharing box.", "Avada"),
			"id" => "portfolio_social_sharing_box",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Related Posts", "Avada"),
			"desc" => __("Check the box to display related posts.", "Avada"),
			"id" => "portfolio_related_posts",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Social Sharing Box", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Social Share Box Icon Options", "Avada"),
			"desc" => "",
			"id" => "social_share_box_icon_options_title",
			"std" => "<h3 style='margin: 0;'>Social Share Box Icon Options</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Social Share Box Background Color", "Avada"),
			"desc" => __("Controls the background color of the social share box.", "Avada"),
			"id" => "social_bg_color",
			"std" => "#f6f6f6",
			"type" => "color");

		$of_options[] = array( "name" => __("Social Sharing Box Custom Icons Color", "Avada"),
			"desc" => __("Select a custom social icon color.", "Avada"),
			"id" => "sharing_social_links_icon_color",
			"std" => "#bebdbd",
			"type" => "color");

		$of_options[] = array( "name" => __("Social Sharing Box Icons Boxed", "Avada"),
			"desc" => __("Controls the color of the social icons in the sharing box.", "Avada"),
			"id" => "sharing_social_links_boxed",
			"std" => "No",
			"type" => "select",
			"options" => array('No' => 'No', 'Yes' => 'Yes'));

		$of_options[] = array( "name" => __("Social Sharing Box Icons Custom Box Color", "Avada"),
			"desc" => __("Select a custom social icon box color.", "Avada"),
			"id" => "sharing_social_links_box_color",
			"std" => "#e8e8e8",
			"type" => "color");

		$of_options[] = array( "name" => __("Social Sharing Box Icons Boxed Radius", "Avada"),
			"desc" => __("Boxradius for the social icons. In pixels, ex: 4px.", "Avada"),
			"id" => "sharing_social_links_boxed_radius",
			"std" => "4px",
			"type" => "text");

		$of_options[] = array( "name" => __("Social Sharing Box Icons Tooltip Position", "Avada"),
			"desc" => __("Controls the tooltip position of the social icons in the sharing box.", "Avada"),
			"id" => "sharing_social_links_tooltip_placement",
			"std" => "Top",
			"type" => "select",
			"options" => array( 'Top' => 'Top', 'Right' => 'Right', 'Bottom' => 'Bottom', 'Left' => 'Left', 'None' => 'None' ));

		$of_options[] = array( "name" => __("Social Share Box Links", "Avada"),
			"desc" => "",
			"id" => "social_share_box_links_title",
			"std" => "<h3 style='margin: 0;'>Social Share Box Links</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Facebook", "Avada"),
			"desc" => __("Check the box to show the facebook sharing icon in blog posts.", "Avada"),
			"id" => "sharing_facebook",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Twitter", "Avada"),
			"desc" => __("Check the box to show the twitter sharing icon in blog posts.", "Avada"),
			"id" => "sharing_twitter",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Reddit", "Avada"),
			"desc" => __("Check the box to show the reddit sharing icon in blog posts.", "Avada"),
			"id" => "sharing_reddit",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("LinkedIn", "Avada"),
			"desc" => __("Check the box to show the linkedin sharing icon in blog posts.", "Avada"),
			"id" => "sharing_linkedin",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Google Plus", "Avada"),
			"desc" => __("Check the box to show the g+ sharing icon in blog posts.", "Avada"),
			"id" => "sharing_google",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Tumblr", "Avada"),
			"desc" => __("Check the box to show the tumblr sharing icon in blog posts.", "Avada"),
			"id" => "sharing_tumblr",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Pinterest", "Avada"),
			"desc" => __("Check the box to show the pinterest sharing icon in blog posts.", "Avada"),
			"id" => "sharing_pinterest",
			"std" => 1,
			"type" => "checkbox");
			
		$of_options[] = array( "name" => __("VK", "Avada"),
			"desc" => __("Check the box to show the vk sharing icon in blog posts.", "Avada"),
			"id" => "sharing_vk",
			"std" => 1,
			"type" => "checkbox");			

		$of_options[] = array( "name" => __("Email", "Avada"),
			"desc" => __("Check the box to show the email sharing icon in blog posts.", "Avada"),
			"id" => "sharing_email",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Social Media", "Avada"),
			"type" => "heading");

		$social_links[] = array( "name" => __("Facebook", "Avada"),
			"desc" => __("Insert your custom link to show the Facebook icon. Leave blank to hide icon.", "Avada"),
			"id" => "facebook_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Flickr", "Avada"),
			"desc" => __("Insert your custom link to show the Flickr icon. Leave blank to hide icon.", "Avada"),
			"id" => "flickr_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("RSS", "Avada"),
			"desc" => __("Insert your custom link to show the RSS icon. Leave blank to hide icon.", "Avada"),
			"id" => "rss_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Twitter", "Avada"),
			"desc" => __("Insert your custom link to show the Twitter icon. Leave blank to hide icon.", "Avada"),
			"id" => "twitter_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Vimeo", "Avada"),
			"desc" => __("Insert your custom link to show the Vimeo icon. Leave blank to hide icon.", "Avada"),
			"id" => "vimeo_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Youtube", "Avada"),
			"desc" => __("Insert your custom link to show the Youtube icon. Leave blank to hide icon.", "Avada"),
			"id" => "youtube_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Instagram", "Avada"),
			"desc" => __("Insert your custom link to show the Instagram icon. Leave blank to hide icon.", "Avada"),
			"id" => "instagram_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Pinterest", "Avada"),
			"desc" => __("Insert your custom link to show the Pinterest icon. Leave blank to hide icon.", "Avada"),
			"id" => "pinterest_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Tumblr", "Avada"),
			"desc" => __("Insert your custom link to show the Tumblr icon. Leave blank to hide icon.", "Avada"),
			"id" => "tumblr_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Google+", "Avada"),
			"desc" => __("Insert your custom link to show the Google+ icon. Leave blank to hide icon.", "Avada"),
			"id" => "google_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Dribbble", "Avada"),
			"desc" => __("Insert your custom link to show the Dribbble icon. Leave blank to hide icon.", "Avada"),
			"id" => "dribbble_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Digg", "Avada"),
			"desc" => __("Insert your custom link to show the Digg icon. Leave blank to hide icon.", "Avada"),
			"id" => "digg_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("LinkedIn", "Avada"),
			"desc" => __("Insert your custom link to show the LinkedIn icon. Leave blank to hide icon.", "Avada"),
			"id" => "linkedin_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Blogger", "Avada"),
			"desc" => __("Insert your custom link to show the Blogger icon. Leave blank to hide icon.", "Avada"),
			"id" => "blogger_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Skype", "Avada"),
			"desc" => __("Insert your custom link to show the Skype icon. Leave blank to hide icon.", "Avada"),
			"id" => "skype_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Forrst", "Avada"),
			"desc" => __("Insert your custom link to show the Forrst icon. Leave blank to hide icon.", "Avada"),
			"id" => "forrst_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Myspace", "Avada"),
			"desc" => __("Insert your custom link to show the Myspace icon. Leave blank to hide icon.", "Avada"),
			"id" => "myspace_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Deviantart", "Avada"),
			"desc" => __("Insert your custom link to show the Deviantart icon. Leave blank to hide icon.", "Avada"),
			"id" => "deviantart_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Yahoo", "Avada"),
			"desc" => __("Insert your custom link to show the Yahoo icon. Leave blank to hide icon.", "Avada"),
			"id" => "yahoo_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Reddit", "Avada"),
			"desc" => __("Insert your custom link to show the Redditt icon. Leave blank to hide icon.", "Avada"),
			"id" => "reddit_link",
			"std" => "",
			"type" => "text");
			
		$social_links[] = array( "name" => __("Paypal", "Avada"),
			"desc" => __("Insert your custom link to show the Paypal icon. Leave blank to hide icon.", "Avada"),
			"id" => "paypal_link",
			"std" => "",
			"type" => "text");	
			
		$social_links[] = array( "name" => __("Dropbox", "Avada"),
			"desc" => __("Insert your custom link to show the Dropbox icon. Leave blank to hide icon.", "Avada"),
			"id" => "dropbox_link",
			"std" => "",
			"type" => "text");	
			
		$social_links[] = array( "name" => __("Soundclound", "Avada"),
			"desc" => __("Insert your custom link to show the Soundcloud icon. Leave blank to hide icon.", "Avada"),
			"id" => "soundcloud_link",
			"std" => "",
			"type" => "text");				
			
		$social_links[] = array( "name" => __("VK", "Avada"),
			"desc" => __("Insert your custom link to show the VK icon. Leave blank to hide icon.", "Avada"),
			"id" => "vk_link",
			"std" => "",
			"type" => "text");

		$social_links[] = array( "name" => __("Email Address", "Avada"),
			"desc" => __("Insert your custom link to show the mail icon. Leave blank to hide icon.", "Avada"),
			"id" => "email_link",
			"std" => "",
			"type" => "text");

		$of_options[] = array( "name" => "",
			"desc" => "",
			"id" => "social_sorter",
			"std" => "",
			"type" => "fusion_sorter",
			"fields" => $social_links,
		);

		$of_options[] = array( "name" => __("Custom Social Icon", "Avada"),
			"desc" => "",
			"id" => "custom_color_scheme_element",
			"std" => "<h3 style='margin: 0;'>Custom Social Icon</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Custom Icon Name", "Avada"),
			"desc" => __("This is the icon name that shows in the hover tooltip.", "Avada"),
			"id" => "custom_icon_name",
			"std" => "",
			"type" => "text");

		$of_options[] = array( "name" => __("Custom Icon Image", "Avada"),
			"desc" => __("Select an image file for your custom icon.", "Avada"),
			"id" => "custom_icon_image",
			"std" => "",
			"mod" => "",
			"type" => "media");

		$of_options[] = array( "name" => __("Custom Icon Image Retina", "Avada"),
			"desc" => __("Select an image file for the retina version of the icon. It should be 2x the size of main icon.", "Avada"),
			"id" => "custom_icon_image_retina",
			"std" => "",
			"mod" => "",
			"type" => "media");

		$of_options[] = array( "name" => __("Standard Icon Width for Retina Icon", "Avada"),
			"desc" => __("If retina icon is added, enter the standard icon (1x) version width, do not enter the retina icon width.", "Avada"),
			"id" => "retina_icon_width",
			"std" => "",
			"type" => "text");

		$of_options[] = array( "name" => __("Standard Icon Height for Retina Icon", "Avada"),
			"desc" => __("If retina icon is added, enter the standard icon (1x) version height, do not enter the retina icon height.", "Avada"),
			"id" => "retina_icon_height",
			"std" => "",
			"type" => "text");

		$of_options[] = array( "name" => __("Custom Icon Link", "Avada"),
			"desc" => __("Insert a link for your custom icon.", "Avada"),
			"id" => "custom_icon_link",
			"std" => "",
			"type" => "text");		

		$of_options[] = array( "name" => __("Slideshows", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Posts Slideshow Images", "Avada"),
			"desc" => __("This option controls the number of featured image boxes for blog/portfolio slideshows.", "Avada"),
			"id" => "posts_slideshow_number",
			"std" => "5",
			"type" => "text");

		$of_options[] = array( "name" => __("Autoplay", "Avada"),
			"desc" => __("Check the box to autoplay the slideshow.", "Avada"),
			"id" => "slideshow_autoplay",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Enable Smooth Height", "Avada"),
			"desc" => __("Check the box to enable smooth height on slideshows when using images with different heights. Please note, smooth height is disabled on blog grid layout.", "Avada"),
			"id" => "slideshow_smooth_height",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Slideshow speed", "Avada"),
			"desc" => __("Controls the speed of slideshows for the [slider] shortcode and sliders within posts. ex: 1000 = 1 second.", "Avada"),
			"id" => "slideshow_speed",
			"std" => "7000",
			"type" => "text");

		$of_options[] = array( "name" => __("Pagination circles below video slides", "Avada"),
			"desc" => __("Check the box if you want to show pagination circles below a video slide for the slider shortcode. Leave it unchecked to hide them on video slides.", "Avada"),
			"id" => "pagination_video_slide",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Elastic Slider", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Slider Width", "Avada"),
			"desc" => __("In pixels or percentage, ex: 100% or 100.", "Avada"),
			"id" => "tfes_slider_width",
			"std" => "100%",
			"type" => "text");

		$of_options[] = array( "name" => __("Slider Height", "Avada"),
			"desc" => __("In pixels, ex: 100px.", "Avada"),
			"id" => "tfes_slider_height",
			"std" => "400px",
			"type" => "text");

		$of_options[] = array( "name" => __("Animation", "Avada"),
			"desc" => __("Slides animate from sides or center.", "Avada"),
			"id" => "tfes_animation",
			"std" => "sides",
			"options" => array('sides' => 'sides', 'center' => 'center'),
			"type" => "select");

		$of_options[] = array( "name" => __("Autoplay", "Avada"),
			"desc" => __("Check the box to autoplay the slides.", "Avada"),
			"id" => "tfes_autoplay",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Slideshow Interval", "Avada"),
			"desc" => __("Select the slideshow speed, 1000 = 1 second.", "Avada"),
			"id" => "tfes_interval",
			"std" => "3000",
			"type" => "text");

		$of_options[] = array( "name" => __("Sliding Speed", "Avada"),
			"desc" => __("Select the animation speed, 1000 = 1 second.", "Avada"),
			"id" => "tfes_speed",
			"std" => "800",
			"type" => "text");

		$of_options[] = array( "name" => __("Thumbnail Width", "Avada"),
			"desc" => __("Enter the width for thumbnail without 'px' ex: 100.", "Avada"),
			"id" => "tfes_width",
			"std" => "150",
			"type" => "text");
			
		$of_options[] = array( 	"name" => __("Title Font Size", "Avada"),
						"desc" 		=> __("In pixels, default is 42", "Avada"),
						"id" 		=> "es_title_font_size",
						"std" 		=> "42",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);				

		$of_options[] = array( 	"name" => __("Caption Font Size", "Avada"),
						"desc" 		=> __("In pixels, default is 20", "Avada"),
						"id" 		=> "es_caption_font_size",
						"std" 		=> "20",
						"min" 		=> "1",
						"step"		=> "1",
						"max" 		=> "100",
						"edit"		=> "yes",
						"type" 		=> "sliderui" 
				);

		$of_options[] = array( "name" => __("Title Color", "Avada"),
			"desc" => __("Controls the text color of the title font.", "Avada"),
			"id" => "es_title_color",
			"std" => "#333333",
			"type" => "color");

		$of_options[] = array( "name" => __("Caption Color", "Avada"),
			"desc" => __("Controls the text color of the caption font.", "Avada"),
			"id" => "es_caption_color",
			"std" => "#747474",
			"type" => "color");

		$of_options[] = array( "name" => __("Lightbox", "Avada"),
			"type" => "heading");
			
		$of_options[] = array( "name" => __("Lightbox", "Avada"),
			"desc" => "",
			"id" => "lightbox",
			"std" => "<h3 style='margin: 0;'>Lightbox Options</h3>",
			"icon" => true,
			"type" => "info");			
			
		$of_options[] = array( "name" => __("Disable Lightbox", "Avada"),
			"desc" => __("Check to disable Lightbox.", "Avada"),
			"id" => "status_lightbox",
			"std" => 0,
			"type" => "checkbox");
			
		$of_options[] = array( "name" => __("Disable Lightbox On Mobile", "Avada"),
			"desc" => __("Check to disable Lightbox on mobile devices.", "Avada"),
			"id" => "status_lightbox_mobile",
			"std" => 1,
			"type" => "checkbox");			

		$of_options[] = array( "name" => __("Disable Lightbox On Single Posts Pages Only", "Avada"),
			"desc" => __("Check the box to disable Lightbox only on single posts and portfolio pages..", "Avada"),
			"id" => "status_lightbox_single",
			"std" => 0,
			"type" => "checkbox");		

		$of_options[] = array( "name" => __("Animation Speed", "Avada"),
			"desc" => __("Set the speed of the animation.", "Avada"),
			"id" => "lightbox_animation_speed",
			"std" => "fast",
			"type" => "select",
			"options" => array('Fast' => 'Fast', 'Slow' => 'Slow', 'Normal' => 'Normal'));

		$of_options[] = array( "name" => __("Show gallery", "Avada"),
			"desc" => __("Check the box to show the gallery.", "Avada"),
			"id" => "lightbox_gallery",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Autoplay the Lightbox Gallery", "Avada"),
			"desc" => __("Check the box to autoplay the lightbox gallery.", "Avada"),
			"id" => "lightbox_autoplay",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Slideshow Speed", "Avada"),
			"desc" => __("If autoplay is enabled, set the slideshow speed, 1000 = 1 second.", "Avada"),
			"id" => "lightbox_slideshow_speed",
			"std" => "5000",
			"type" => "text");

		$of_options[] = array( "name" => __("Background Opacity", "Avada"),
			"desc" => __("Set the opacity of background, <br />0.1 (lowest) to 1 (highest).", "Avada"),
			"id" => "lightbox_opacity",
			"std" => "0.8",
			"type" => "text");

		$of_options[] = array( "name" => __("Show Caption", "Avada"),
			"desc" => __("Check the box to show the image caption.", "Avada"),
			"id" => "lightbox_title",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Show Description", "Avada"),
			"desc" => __("Check the box to show the image description. The Alternative text field is used for the description.", "Avada"),
			"id" => "lightbox_desc",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Social Sharing", "Avada"),
			"desc" => __("Check the box to show social sharing buttons on lightbox.", "Avada"),
			"id" => "lightbox_social",
			"std" => 1,
			"type" => "checkbox");
			
		$of_options[] = array( "name" => __("Deeplinking", "Avada"),
			"desc" => __("Check the box to deeplink images in the lightbox.", "Avada"),
			"id" => "lightbox_deeplinking",
			"std" => 1,
			"type" => "checkbox");			

		$of_options[] = array( "name" => __("Show Post Images in Lightbox", "Avada"),
			"desc" => __("Check the box to show post images that are inside the post content area in the lightbox.", "Avada"),
			"id" => "lightbox_post_images",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Contact", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Google Map", "Avada"),
			"desc" => "",
			"id" => "google_map",
			"std" => "<h3 style='margin: 0;'>Google Map Options</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Google Map Type", "Avada"),
			"desc" => __("Select the type of google map to show on the contact page.", "Avada"),
			"id" => "gmap_type",
			"std" => "roadmap",
			"options" => array('roadmap' => 'roadmap', 'satellite' => 'satellite', 'hybrid' => 'hybrid', 'terrain' => 'terrain'),
			"type" => "select");

		$of_options[] = array( "name" => __("Google Map Width", "Avada"),
			"desc" => __("In pixels or percentage, ex: 100% or 100px.", "Avada"),
			"id" => "gmap_width",
			"std" => "100%",
			"type" => "text");

		$of_options[] = array( "name" => __("Google Map Height", "Avada"),
			"desc" => __("In pixels, ex: 100px.", "Avada"),
			"id" => "gmap_height",
			"std" => "415px",
			"type" => "text");

		$of_options[] = array( "name" => __("Google Map Top Margin", "Avada"),
			"desc" => __("This will only be applied to maps that are not 100% width. It controls the distance to menu/page title. In pixels, ex: 100px.", "Avada"),
			"id" => "gmap_topmargin",
			"std" => "55px",
			"type" => "text");

		$of_options[] = array( "name" => __("Google Map Address", "Avada"),
			"desc" => __("Single address ex: 775 New York Ave, Brooklyn, Kings, New York 11203. <br />For multiple markers, separate the addresses with the | symbol.<br /> ex: Address 1|Address 2|Address 3.<br />You can also use coordinates. ex: latlng=40.714224,-73.961452.", "Avada"),
			"id" => "gmap_address",
			"std" => "775 New York Ave, Brooklyn, Kings, New York 11203",
			"type" => "textarea");

		$of_options[] = array( "name" => __("Email Address", "Avada"),
			"desc" => __("Enter the email adress the form will be sent to.", "Avada"),
			"id" => "email_address",
			"std" => "",
			"type" => "text");

		$of_options[] = array( "name" => __("Map Zoom Level", "Avada"),
			"desc" => __("Higher number will be more zoomed in.", "Avada"),
			"id" => "map_zoom_level",
			"std" => "8",
			"type" => "text");

		$of_options[] = array( "name" => __("Hide Address Pin", "Avada"),
			"desc" => __("Check the box to hide the address pin.", "Avada"),
			"id" => "map_pin",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Show Map Popup On Click", "Avada"),
			"desc" => __("Check the box to keep the popup graphic with address info hidden when the google map loads. It will only show when the pin on the map is clicked.", "Avada"),
			"id" => "map_popup",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Map Scrollwheel", "Avada"),
			"desc" => __("Check the box to disable scrollwheel on google maps.", "Avada"),
			"id" => "map_scrollwheel",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Map Scale", "Avada"),
			"desc" => __("Check the box to disable scale on google maps.", "Avada"),
			"id" => "map_scale",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Map Zoom & Pan Control Icons", "Avada"),
			"desc" => __("Check the box to disable zoom control icon and pan control icon on google maps.", "Avada"),
			"id" => "map_zoomcontrol",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Google Map Design Styling", "Avada"),
			"desc" => "",
			"id" => "google_map",
			"std" => "<h3 style='margin: 0;'>Google Map Design Styling</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Select the Map Styling", "Avada"),
			"desc" => __("Choose default styling for classic google map styles. Choose theme styling for our custom style. Choose custom styling to make your own with the advanced options below.", "Avada"),
			"id" => "map_styling",
			"std" => "default",
			"options" => array('default' => 'Default Styling', 'theme' => 'Theme Styling', 'custom' => 'Custom Styling'),
			"type" => "select");

		$of_options[] = array( "name" => __("Map Overlay Color", "Avada"),
			"desc" => __("Custom styling setting only. Pick an overlaying color for the map. Works best with \"roadmap\" type.", "Avada"),
			"id" => "map_overlay_color",
			"std" => "",
			"type" => "color");

		$of_options[] = array( "name" => __("Info Box Styling", "Avada"),
			"desc" => __("Custom styling setting only. Choose between default or custom info box.", "Avada"),
			"id" => "map_infobox_styling",
			"std" => "default",
			"options" => array('default' => 'Default Infobox', 'custom' => 'Custom Infobox'),
			"type" => "select");

		$of_options[] = array( "name" => __("Info Box Content", "Avada"),
			"desc" => __("Custom styling setting only. Type in custom info box content to replace address string. For multiple addresses, separate info box contents by using the | symbol. ex: InfoBox 1|InfoBox 2|InfoBox 3", "Avada"),
			"id" => "map_infobox_content",
			"std" => "",
			"type" => "textarea");

		$of_options[] = array( "name" => __("Info Box Background Color", "Avada"),
			"desc" => __("Custom styling setting only. Pick a color for the info box background.", "Avada"),
			"id" => "map_infobox_bg_color",
			"std" => "",
			"type" => "color");

		$of_options[] = array( "name" => __("Info Box Text Color", "Avada"),
			"desc" => __("Custom styling setting only. Pick a color for the info box text.", "Avada"),
			"id" => "map_infobox_text_color",
			"std" => "",
			"type" => "color");

		$of_options[] = array( "name" => __("Custom Marker Icon", "Avada"),
			"desc" => __("Custom styling setting only. Use full image urls for custom marker icons or input \"theme\" for our custom marker. For multiple addresses, separate icons by using the | symbol or use one for all. ex: Icon 1|Icon 2|Icon 3", "Avada"),
			"id" => "map_custom_marker_icon",
			"std" => "",
			"type" => "textarea");

		$of_options[] = array( "name" => __("ReCaptcha", "Avada"),
			"desc" => "",
			"id" => "recaptcha",
			"std" => "<h3 style='margin: 0;'>ReCaptcha Spam Options</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("ReCaptcha Public Key", "Avada"),
			"desc" => __("Follow the steps in <a href='http://theme-fusion.com/avada-doc/pages/setting-up-contact-page/'> our docs</a> to get key.", "Avada"),
			"id" => "recaptcha_public",
			"std" => "",
			"type" => "text");

		$of_options[] = array( "name" => __("ReCaptcha Private Key", "Avada"),
			"desc" => __("Follow the steps in <a href='http://theme-fusion.com/avada-doc/pages/setting-up-contact-page/'> our docs</a> to get key.", "Avada"),
			"id" => "recaptcha_private",
			"std" => "",
			"type" => "text");

		$of_options[] = array( "name" => __("ReCaptcha Color Scheme", "Avada"),
			"desc" => __("Select the recaptcha color scheme.", "Avada"),
			"id" => "recaptcha_color_scheme",
			"std" => "Clean",
			"type" => "select",
			"options" => array('red' => 'red', 'blackglass' => 'blackglass', 'clean' => 'clean', 'white' => 'white'));

		$of_options[] = array( "name" => __("Search Page", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Search", "Avada"),
			"desc" => "",
			"id" => "search",
			"std" => "<h3 style='margin: 0;'>Search Options</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Search Results Layout", "Avada"),
			"desc" => __("Select the layout for the search results page.", "Avada"),
			"id" => "search_layout",
			"std" => "Grid",
			"type" => "select",
			"options" => array(
				'Large' => 'Large',
				'Medium' => 'Medium',
				'Large Alternate' => 'Large Alternate',
				'Medium Alternate' => 'Medium Alternate',
				'Grid' => 'Grid',
				'Timeline' => 'Timeline'
			));

		$of_options[] = array( "name" => __("Search Results Content", "Avada"),
			"desc" => __("Select the type of content to display in search results.", "Avada"),
			"id" => "search_content",
			"std" => "Posts and Pages",
			"type" => "select",
			"options" => array('Posts and Pages' => 'Posts and Pages', 'Only Posts' => 'Only Posts', 'Only Pages' => 'Only Pages'));

		$of_options[] = array( "name" => __("Hide Search Results Excerpt", "Avada"),
			"desc" => __("Check the box if you want to hide excerpt for search results.", "Avada"),
			"id" => "search_excerpt",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Number of Search Results Per Page", "Avada"),
			"desc" => __("Set the number of search results per page.", "Avada"),
			"id" => "search_results_per_page",
			"std" => "10",
			"type" => "text");

		$of_options[] = array( "name" => __("Hide Featured Images from Search Results", "Avada"),
			"desc" => __("Check the box if you want to hide featured images for search results.", "Avada"),
			"id" => "search_featured_images",
			"std" => 0,
			"type" => "checkbox");

// Theme Specific Options
		$of_options[] = array( "name" => __("Extra", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Misc Options", "Avada"),
			"desc" => "",
			"id" => "misc_options",
			"std" => "<h3 style='margin: 0;'>Miscellaneous Options</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Sidenav Behavior", "Avada"),
			"desc" => __("Controls the side navigation animation for child pages, on click or hover.", "Avada"),
			"id" => "sidenav_behavior",
			"std" => "hover",
			"options" => array('Hover' => 'Hover', 'Click' => 'Click'),
			"type" => "select");

		$of_options[] = array( "name" => __("Number of Related Posts / Projects", "Avada"),
			"desc" => __("This option controls the amount of related projects / posts that show up on each single portfolio and blog post. ex: 5", "Avada"),
			"id" => "number_related_posts",
			"std" => "5",
			"type" => "text");

		$of_options[] = array( "name" => __("Basis for Excerpt Length", "Avada"),
			"desc" => __("Choose if the excerpt length should be based on words or characters.", "Avada"),
			"id" => "excerpt_base",
			"std" => "words",
			"options" => array('Words' => 'Words', 'Characters' => 'Characters'),
			"type" => "select");

		$of_options[] = array( "name" => __("Disable [...] on Excerpts", "Avada"),
			"desc" => __("Check the box to disable the read more sign [...] on excerpts throughout the site.", "Avada"),
			"id" => "disable_excerpts",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Make [...] Link to Single Post Page", "Avada"),
			"desc" => __("Check the box to have the read more sign [...] on excerpts link to single post page.", "Avada"),
			"id" => "link_read_more",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Allow Comments on Pages", "Avada"),
			"desc" => __("Check the box to allow comments on regular pages.", "Avada"),
			"id" => "comments_pages",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Featured Images on Pages", "Avada"),
			"desc" => __("Check the box to disable featured images on regular pages.", "Avada"),
			"id" => "featured_images_pages",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("FAQ Featured Images", "Avada"),
			"desc" => __("Check the box to show featured images on FAQ archive page.", "Avada"),
			"id" => "faq_featured_image",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Add 'nofollow' to social links", "Avada"),
			"desc" => __("Check to add 'nofollow' attribute to all social links.", "Avada"),
			"id" => "nofollow_social_links",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Open Social Icons in a New Window", "Avada"),
			"desc" => __("Check the box to allow social icons to open in a new window.", "Avada"),
			"id" => "social_icons_new",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Rollover", "Avada"),
			"desc" => "",
			"id" => "rollovers",
			"std" => "<h3 style='margin: 0;'>Image Rollover Options</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Image Rollover", "Avada"),
			"desc" => __("Check the box to show the rollover box on images.", "Avada"),
			"id" => "image_rollover",
			"std" => 1,
			"type" => "checkbox");
			
		$of_options[] = array( "name" => __("Image Rollover Direction", "Avada"),
			"desc" => __("Selet from which direction the rollover should start.", "Avada"),
			"id" => "image_rollover_direction",
			"std" => 'left',
			"options" => array('left' => 'Left', 'right' => 'Right', 'bottom' => 'Bottom', 'top' => 'Top', 'center_horiz' => 'Center Horizontal', 'center_vertical' => 'Center Vertical'),
			"type" => "select");			

		$of_options[] = array( "name" => __("Disable Link Icon From Image Rollover", "Avada"),
			"desc" => __("Check the box to disable the link icon from image rollovers. Note: This option will override the post settings.", "Avada"),
			"id" => "link_image_rollover",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Image Icon From Image Rollover", "Avada"),
			"desc" => __("Check the box to disable the image icon from image rollovers. Note: This option will override the post settings.", "Avada"),
			"id" => "zoom_image_rollover",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Title From Image Rollover", "Avada"),
			"desc" => __("Check the box to disable the title from image rollovers.", "Avada"),
			"id" => "title_image_rollover",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Categories From Image Rollover", "Avada"),
			"desc" => __("Check the box to disable the categories from image rollovers.", "Avada"),
			"id" => "cats_image_rollover",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Advanced", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("enable_disable_heading", "Avada"),
			"desc" => "",
			"id" => "enable_disable_heading",
			"std" => "<h3 style='margin: 0;'>Enable / Disable Theme Features & Plugin Support</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("Disable Fusion Builder", "Avada"),
			"desc" => __("Check to disable the fusion builder button on pages/posts.", "Avada"),
			"id" => "disable_builder",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Mega Menu", "Avada"),
			"desc" => __("Check to disable the theme's mega menu.", "Avada"),
			"id" => "disable_megamenu",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Avada Styles For Revolution Slider", "Avada"),
			"desc" => __("Check the box to disable the Avada styles and use the default Revolution Slider styles.", "Avada"),
			"id" => "avada_rev_styles",
			"std" => 0,
			"type" => "checkbox");
			
		$of_options[] = array( "name" => __("Disable Avada Dropdown Styles", "Avada"),
			"desc" => __("Check the box to disable the Avada styles for dropdown/select fields site wide. This should be done if you experience any issues with 3rd party plugin dropdowns.", "Avada"),
			"id" => "avada_styles_dropdowns",
			"std" => 0,
			"type" => "checkbox");			

		$of_options[] = array( "name" => __("UberMenu Plugin Support", "Avada"),
			"desc" => __("Check the box if you are are using UberMenu, this option adds UberMenu support without editing any code.", "Avada"),
			"id" => "ubermenu",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable CSS Animations", "Avada"),
			"desc" => __("Check the box to disable CSS animations on shortcode items.", "Avada"),
			"id" => "use_animate_css",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable CSS Animations on Mobiles Only", "Avada"),
			"desc" => __("Check the box to disable CSS animations on mobiles only.", "Avada"),
			"id" => "disable_mobile_animate_css",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Youtube API Scripts", "Avada"),
			"desc" => __("Check the box to disable Youtube API scripts.", "Avada"),
			"id" => "status_yt",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Vimeo API Scripts", "Avada"),
			"desc" => __("Check the box to disable Vimeo API scripts.", "Avada"),
			"id" => "status_vimeo",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Google Map Scripts", "Avada"),
			"desc" => __("Check the box to disable google map.", "Avada"),
			"id" => "status_gmap",
			"std" => 0,
			"type" => "checkbox");
		
		$of_options[] = array( "name" => __("Disable ToTop Script", "Avada"),
			"desc" => __("Check the box to disable the ToTop script which adds the scrolling to top functionality.", "Avada"),
			"id" => "status_totop",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Enable ToTop Script on mobile", "Avada"),
			"desc" => __("Check the box to enable the ToTop script on mobile devices.", "Avada"),
			"id" => "status_totop_mobile",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Fusion Slider", "Avada"),
			"desc" => __("Check the box to disable fusion slider.", "Avada"),
			"id" => "status_fusion_slider",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Elastic Slider", "Avada"),
			"desc" => __("Check the box to disable elastic slider.", "Avada"),
			"id" => "status_eslider",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable FontAwesome", "Avada"),
			"desc" => __("Check the box to disable font awesome.", "Avada"),
			"id" => "status_fontawesome",
			"std" => 0,
			"type" => "checkbox");
			
		$of_options[] = array( "name" => __("Disable Open Graph Meta Tags", "Avada"),
			"desc" => __("Check the box to disable open graph meta tags which is mainly used when sharing pages on social networking sites like Facebook.", "Avada"),
			"id" => "status_opengraph",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Disable Rich Snippets Sitewide", "Avada"),
			"desc" => __("Check the box to disable rich snippets data sitewide.", "Avada"),
			"id" => "disable_date_rich_snippet_pages",
			"std" => 0,
			"type" => "checkbox");	

		$of_options[] = array( "name" => __("Disable Avada's Woocommerce Product Gallery Slider", "Avada"),
			"desc" => __("Enable / disable product gallery slider that is built-in with Avada. This is only useful for plugin compatibility.", "Avada"),
			"id" => "disable_woo_gallery",
			"std" => 0,
			"type" => "checkbox");	

		$of_options[] = array( "name" => __("Woocommerce", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Woocommerce Number of Products per Page", "Avada"),
			"desc" => __("Insert the number of posts to display per page.", "Avada"),
			"id" => "woo_items",
			"std" => "12",
			"type" => "text");
			
		$of_options[] = array( "name" => __("Woocommerce Number of Product Columns", "Avada"),
			"desc" => __("Select the number of columns for the main shop page.", "Avada"),
			"id" => "woocommerce_shop_page_columns",
			"std" => "4",
			"type" => "select",
			"options" => array( 
				  "1" => "1",
				  "2" => "2",
				  "3" => "3",
				  "4" => "4",
				  "5" => "5",
				  "6" => "6",				   
			)
		);

		$of_options[] = array( "name" => __("Woocommerce Related/Up-Sell/Cross-Sell Product Number of Columns", "Avada"),
			"desc" => __("Select the number of columns for the related and up-sell products on single post pages and cross-sells on cart page.", "Avada"),
			"id" => "woocommerce_related_columns",
			"std" => "4",
			"type" => "select",
			"options" => array( 
				  "1" => "1",
				  "2" => "2",
				  "3" => "3",
				  "4" => "4",
				  "5" => "5",
				  "6" => "6",				   
			)
		);
		
		$of_options[] = array( "name" => __("Woocommerce Archive/Category Number of Product Columns", "Avada"),
			"desc" => __("Select the number of columns for the archive/category pages.", "Avada"),
			"id" => "woocommerce_archive_page_columns",
			"std" => "3",
			"type" => "select",
			"options" => array( 
				  "1" => "1",
				  "2" => "2",
				  "3" => "3",
				  "4" => "4",
						"5" => "5",
						"6" => "6",				   
			)
		);		   

		$of_options[] = array( "name" => __("Disable Woocommerce Shop Page Ordering Boxes", "Avada"),
			"desc" => __("Check the box to disable the ordering boxes displayed on the shop page.", "Avada"),
			"id" => "woocommerce_avada_ordering",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Use Woocommerce One Page Checkout", "Avada"),
			"desc" => __("Check the box to use Avada's one page checkout template.", "Avada"),
			"id" => "woocommerce_one_page_checkout",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Show Woocommerce Order Notes on Checkout", "Avada"),
			"desc" => __("Check the box to show the order notes on the checkout page..", "Avada"),
			"id" => "woocommerce_enable_order_notes",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Show Woocommerce My Account Link in Secondary Menu", "Avada"),
			"desc" => __("Check the box to show My Account link, uncheck to disable. Please note this will not show with Ubermenu.", "Avada"),
			"id" => "woocommerce_acc_link_top_nav",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Show Woocommerce Cart Icon in Secondary Menu", "Avada"),
			"desc" => __("Check the box to show the Cart icon, uncheck to disable. Please note this will not show with Ubermenu.", "Avada"),
			"id" => "woocommerce_cart_link_top_nav",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Show Woocommerce My Account Link in Main Menu", "Avada"),
			"desc" => __("Check the box to show My Account link, uncheck to disable. Please note these will not show with Ubermenu.", "Avada"),
			"id" => "woocommerce_acc_link_main_nav",
			"std" => 0,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Show Woocommerce Cart Link in Main Menu", "Avada"),
			"desc" => __("Check the box to show the Cart icon, uncheck to disable. Please note these will not show with Ubermenu.", "Avada"),
			"id" => "woocommerce_cart_link_main_nav",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Show Woocommerce Social Icons", "Avada"),
			"desc" => __("Check the box to show the social icons on product pages, uncheck to disable.", "Avada"),
			"id" => "woocommerce_social_links",
			"std" => 1,
			"type" => "checkbox");

		$of_options[] = array( "name" => __("Account Area Message 1", "Avada"),
			"desc" => __("Insert your text and it will appear in the first message box on the acount page.", "Avada"),
			"id" => "woo_acc_msg_1",
			"std" => "Need Assistance? Call customer service at 888-555-5555.",
			"type" => "textarea");

		$of_options[] = array( "name" => __("Account Area Message 2", "Avada"),
			"desc" => __("Insert your text and it will appear in the second message box on the acount page.", "Avada"),
			"id" => "woo_acc_msg_2",
			"std" => "E-mail them at info@yourshop.com",
			"type" => "textarea");

		$of_options[] = array( "name" => __("Custom CSS", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Advanced CSS Customizations", "Avada"),
			"desc" => "",
			"id" => "advanced_css_intro",
			"std" => "<h3 style='margin: 0;'>Advanced CSS Customizations</h3>",
			"icon" => true,
			"type" => "info");

		$of_options[] = array( "name" => __("CSS Code", "Avada"),
			"desc" => __("Paste your CSS code, do not include any tags or HTML in thie field. Any custom CSS entered here will override the theme CSS. In some cases, the !important tag may be needed.", "Avada"),
			"id" => "custom_css",
			"std" => "",
			"type" => "textarea");

		$of_options[] = array( "name" => __("Backup", "Avada"),
			"type" => "heading");

		$of_options[] = array( "name" => __("Backup and Restore Options", "Avada"),
			"id" => "of_backup",
			"std" => "",
			"type" => "backup",
			"desc" => __('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.', 'Avada'),
		);

		$of_options[] = array( "name" => __("Transfer Theme Options Data", "Avada"),
			"id" => "of_transfer",
			"std" => "",
			"type" => "transfer",
			"desc" => __("Import Options", "Avada"),
		);
		$of_options[] = array( "name" => __("Auto Updates", "Avada"), 'type' => 'heading' );
		$of_options[] = array( "name" => __("Theme Updater", "Avada"),
			"desc" => "",
			"id" => "theme_updater",
			"std" => "<h3 style='margin: 0;'>Enter all 3 required fields below!</h3>",
			"icon" => true,
			"type" => "info");
		$of_options[] = array( "name" => __("ThemeForest Username", "Avada"),
			"desc" => "",
			"id" => "tf_username",
			"std" => "",
			"type" => "text");
		$of_options[] = array( "name" => __("ThemeForest Secret API Key", "Avada"),
			"desc" => __("You can create one from ThemeForest's user settings page.", "Avada"),
			"id" => "tf_api",
			"std" => "",
			"type" => "text");
		$of_options[] = array( "name" => __("ThemeForest Purchase Code", "Avada"),
			"desc" => "",
			"id" => "tf_purchase_code",
			"std" => "",
			"type" => "text");
			// End Avada Edit
	  }//End function: of_options()
}//End chack if function exists: of_options()
?>
