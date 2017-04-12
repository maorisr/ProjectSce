<?php

  define("TZ_QUICK",0); define("TZ_FULLINFO",1); define("TZ_COUNTRIES",2);
  
  function get_timezone($country_abbr, $mode=TZ_QUICK) {
    $bkp_zone = date_default_timezone_get();
    # timezone arrays
	$zone_labels = array(
	  "GMT"=>"Greenwich Mean Time [GMT]",
	  "WAT"=>"Western African Time [WAT]",
	  "CAT"=>"Central African Time [CAT]",
	  "EAT"=>"Eastern African Time [EAT]",
	  "CET"=>"Central European Time [CET]",
	  "EET"=>"Eastern European Time [EET]",
	  "WET"=>"Western European Time [WET]",
	  "AST"=>"Atlantic Standard Time [AST]",
	  "CST"=>"Central Standard Time [CST]",
	  "MST"=>"Mountain Standard Time [MST]",
	  "EST"=>"Eastern Standard Time [EST]",
	  "IST"=>"India Standard Time [IST]",
	  "CBRT"=>"Brazil Central Time",
	  "AMBT"=>"Brazil Amazone Time",
	  "ATLT"=>"Atlantic Time",
	  "EAST"=>"Eastern Time",
	  "CENT"=>"Central Time",
	  "MOUT"=>"Mountain Time",
	  "PACT"=>"Pacific Time",
	  "CHIT"=>"China Standard Time",
	  "ARAB"=>"Middle East Time",
	  "ANET"=>"Near East Time",
	  "ASCT"=>"Central Asian Time",
	  "ASCW"=>"Central-Eastern Asian Time",
	  "ASAW"=>"Eastern Asian Time",
	  "AUSC"=>"Australia Central Time",
	  "AUSE"=>"Australia Eastern Time",
	  "JRKT"=>"Japan/Korea Time",
	  "WPCT"=>"Western Pacific Time",
	  "ARST"=>"Argentina Standard Time",
	  "ARcT"=>"Argentina Time",
	  );
    $ENV_TIMEZONES = array(
	  "AFG"=>array("country"=>"Afghanistan","default_value"=>"Asia/Kabul","max_tz"=>1,0=>array("value"=>"Asia/Kabul","cities"=>"Kabul","zone"=>"Afghanistan Time")),
	  "ALB"=>array("country"=>"Albania","default_value"=>"Europe/Tirane","max_tz"=>1,0=>array("value"=>"Europe/Tirane","cities"=>"Tirane","zone"=>$zone_labels["CET"])),
	  "ALG"=>array("country"=>"Algeria","default_value"=>"Africa/Algiers","max_tz"=>1,0=>array("value"=>"Africa/Algiers","cities"=>"Algiers","zone"=>$zone_labels["WAT"])),
	  "ASA"=>array("country"=>"American Samoa","default_value"=>"Pacific/Pago_Pago","max_tz"=>1,0=>array("value"=>"Pacific/Pago_Pago","cities"=>"Pago Pago","zone"=>"")),
	  "AND"=>array("country"=>"Andorra","default_value"=>"Europe/Andorra","max_tz"=>1,0=>array("value"=>"Europe/Andorra","cities"=>"Andorra la Vella","zone"=>$zone_labels["CET"])),
	  "ANG"=>array("country"=>"Angola","default_value"=>"Africa/Luanda","max_tz"=>1,0=>array("value"=>"Africa/Luanda","cities"=>"Luanda","zone"=>$zone_labels["WAT"])),
	  "AIA"=>array("country"=>"Anguilla","default_value"=>"America/Anguilla","max_tz"=>1,0=>array("value"=>"America/Anguilla","cities"=>"The Valley","zone"=>"")),
	  "ANT"=>array("country"=>"Antigua & Barbuda","default_value"=>"America/Antigua","max_tz"=>1,0=>array("value"=>"America/Antigua","cities"=>"Saint John's","zone"=>$zone_labels["AST"])),
	  "ARG"=>array("country"=>"Argentina","default_value"=>"America/Buenos_Aires","max_tz"=>12,0=>array("value"=>"America/Buenos_Aires","cities"=>"Ciudad de Buenos Aires, Capital Federal","zone"=>$zone_labels["ARcT"]),1=>array("value"=>"America/Cordoba","cities"=>"Cordoba, Santa Fe, Entre Rios, Corrientes, Misiones, Chaco, Formosa, Santiago del Estero","zone"=>$zone_labels["ARcT"]),2=>array("value"=>"America/Argentina/Tucuman","cities"=>"Tucuman","zone"=>$zone_labels["ARcT"]),3=>array("value"=>"America/Argentina/San_Luis","cities"=>"San Luis","zone"=>$zone_labels["ARST"]),4=>array("value"=>"America/Argentina/La_Rioja","cities"=>"La Rioja","zone"=>$zone_labels["ARST"]),5=>array("value"=>"America/Argentina/Salta","cities"=>"Salta, La Pampa, Neuquen, Rio Negro","zone"=>$zone_labels["ARST"]),6=>array("value"=>"America/Argentina/San_Juan","cities"=>"San Juan","zone"=>$zone_labels["ARST"]),7=>array("value"=>"America/Jujuy","cities"=>"Jujuy","zone"=>$zone_labels["ARST"]),8=>array("value"=>"America/Catamarca","cities"=>"Catamarca, Chubut","zone"=>$zone_labels["ARST"]),9=>array("value"=>"America/Mendoza","cities"=>"Mendoza","zone"=>$zone_labels["ARST"]),10=>array("value"=>"America/Argentina/Rio_Gallegos","cities"=>"Santa Cruz","zone"=>$zone_labels["ARST"]),11=>array("value"=>"America/Argentina/Ushuaia","cities"=>"Tierra del Fuego, Antartida e Islas del Atlantico Sur","zone"=>$zone_labels["ARST"])),
	  "ARM"=>array("country"=>"Armenia","default_value"=>"Asia/Yerevan","max_tz"=>1,0=>array("value"=>"Asia/Yerevan","cities"=>"Yerevan","zone"=>$zone_labels["ANET"].": Russia/Armenia")),
	  "ARU"=>array("country"=>"Aruba","default_value"=>"America/Aruba","max_tz"=>1,0=>array("value"=>"America/Aruba","cities"=>"Oranjestad","zone"=>"")),
	  "AUS"=>array("country"=>"Australia","default_value"=>"Australia/Canberra","max_tz"=>10,0=>array("value"=>"Australia/Perth","cities"=>"Western Australia (Perth)","zone"=>"Australia Western Time"),1=>array("value"=>"Australia/Eucla","cities"=>"Central Western Australia (Eucla)","zone"=>"Australia Central-Western Time"),2=>array("value"=>"Australia/Darwin","cities"=>"Northern Territory (Darwin)","zone"=>$zone_labels["AUSC"]),3=>array("value"=>"Australia/Adelaide","cities"=>"South Australia (Adelaide)","zone"=>$zone_labels["AUSC"]),4=>array("value"=>"Australia/Broken_Hill","cities"=>"New South Wales (Broken Hill)","zone"=>$zone_labels["AUSC"]),5=>array("value"=>"Australia/Brisbane","cities"=>"Queensland (Brisbane, Lindeman)","zone"=>$zone_labels["AUSE"]),6=>array("value"=>"Australia/Hobart","cities"=>"Tasmania (Hobart, Currie)","zone"=>$zone_labels["AUSE"]),7=>array("value"=>"Australia/Melbourne","cities"=>"Victoria (Melbourne)","zone"=>$zone_labels["AUSE"]),8=>array("value"=>"Australia/Sydney","cities"=>"New South Wales (Sydney)","zone"=>$zone_labels["AUSE"]),9=>array("value"=>"Australia/Lord_Howe","cities"=>"Lord Howe Island","zone"=>"Lord Howe Time")),
	  "AUT"=>array("country"=>"Austria","default_value"=>"Europe/Vienna","max_tz"=>1,0=>array("value"=>"Europe/Vienna","cities"=>"Vienna, Salzburg","zone"=>$zone_labels["CET"])),
	  "AZE"=>array("country"=>"Azerbaijan","default_value"=>"Asia/Baku","max_tz"=>1,0=>array("value"=>"Asia/Baku","cities"=>"Baku","zone"=>"Azerbaijan Time")),
	  "BAH"=>array("country"=>"Bahamas","default_value"=>"America/Nassau","max_tz"=>1,0=>array("value"=>"America/Nassau","cities"=>"Nassau","zone"=>"")),
	  "BRN"=>array("country"=>"Bahrain","default_value"=>"Asia/Bahrain","max_tz"=>1,0=>array("value"=>"Asia/Bahrain","cities"=>"Manama","zone"=>$zone_labels["ARAB"])),
	  "BAN"=>array("country"=>"Bangladesh","default_value"=>"Asia/Dhaka","max_tz"=>1,0=>array("value"=>"Asia/Dhaka","cities"=>"Dhaka","zone"=>$zone_labels["ASCT"])),
	  "BAR"=>array("country"=>"Barbados","default_value"=>"America/Barbados","max_tz"=>1,0=>array("value"=>"America/Barbados","cities"=>"Bridgetown","zone"=>"")),
	  "BLR"=>array("country"=>"Belarus","default_value"=>"Europe/Minsk","max_tz"=>1,0=>array("value"=>"Europe/Minsk","cities"=>"Minsk","zone"=>$zone_labels["EET"])),
	  "BEL"=>array("country"=>"Belgium","default_value"=>"Europe/Brussels","max_tz"=>1,0=>array("value"=>"Europe/Brussels","cities"=>"Brussels","zone"=>$zone_labels["CET"])),
	  "BIZ"=>array("country"=>"Belize","default_value"=>"America/Belize","max_tz"=>1,0=>array("value"=>"America/Belize","cities"=>"Belmopan","zone"=>"")),
	  "BEN"=>array("country"=>"Benin","default_value"=>"Africa/Porto-Novo","max_tz"=>1,0=>array("value"=>"Africa/Porto-Novo","cities"=>"Porto-Novo","zone"=>$zone_labels["WAT"])),
	  "BER"=>array("country"=>"Bermuda","default_value"=>"Atlantic/Bermuda","max_tz"=>1,0=>array("value"=>"Atlantic/Bermuda","cities"=>"Hamilton","zone"=>"")),
	  "BHU"=>array("country"=>"Bhutan","default_value"=>"Asia/Thimphu","max_tz"=>1,0=>array("value"=>"Asia/Thimphu","cities"=>"Thimphu","zone"=>$zone_labels["ASCT"])),
	  "BOL"=>array("country"=>"Bolivia","default_value"=>"America/La_Paz","max_tz"=>1,0=>array("value"=>"America/La_Paz","cities"=>"La Paz","zone"=>"")),
	  "BIH"=>array("country"=>"Bosnia & Herzegovina","default_value"=>"Europe/Sarajevo","max_tz"=>1,0=>array("value"=>"Europe/Sarajevo","cities"=>"Sarajevo, Mostar, Tuzla, Banja Luka","zone"=>$zone_labels["CET"])),
	  "BOT"=>array("country"=>"Botswana","default_value"=>"Africa/Gaborone","max_tz"=>1,0=>array("value"=>"Africa/Gaborone","cities"=>"Gaborone","zone"=>$zone_labels["CAT"])),
	  "BRA"=>array("country"=>"Brazil","default_value"=>"America/Sao_Paulo","max_tz"=>16,0=>array("value"=>"America/Campo_Grande","cities"=>"Mato Grosso do Sul (Campo Grande)","zone"=>$zone_labels["AMBT"]),1=>array("value"=>"America/Cuiaba","cities"=>"Mato Grosso (Cuiaba)","zone"=>$zone_labels["AMBT"]),2=>array("value"=>"America/Porto_Velho","cities"=>"Rondônia (Porto Velho)","zone"=>$zone_labels["AMBT"]),3=>array("value"=>"America/Boa_Vista","cities"=>"Roraima (Boa Vista)","zone"=>$zone_labels["AMBT"]),4=>array("value"=>"America/Manaus","cities"=>"East Amazonas (Manaus)","zone"=>$zone_labels["AMBT"]),5=>array("value"=>"America/Eirunepe","cities"=>"West Amazonas (Eirunepe)","zone"=>$zone_labels["AMBT"]),6=>array("value"=>"America/Rio_Branco","cities"=>"Acre (Rio Branco)","zone"=>$zone_labels["AMBT"]),7=>array("value"=>"America/Sao_Paulo","cities"=>"Goiás, Distrito Federal, Minas Gerais, Espírito Santo, Rio de Janeiro, São Paulo, Paraná, Santa Catarina, Rio Grande do Sul","zone"=>$zone_labels["CBRT"]),8=>array("value"=>"America/Belem","cities"=>"Amapá, East Pará","zone"=>$zone_labels["CBRT"]),9=>array("value"=>"America/Fortaleza","cities"=>"Maranhão, Piauí, Ceará, Rio Grande do Norte, Paraíba","zone"=>$zone_labels["CBRT"]),10=>array("value"=>"America/Recife","cities"=>"Pernambuco (Recife)","zone"=>$zone_labels["CBRT"]),11=>array("value"=>"America/Araguaina","cities"=>"Tocantins (Araguaina)","zone"=>$zone_labels["CBRT"]),12=>array("value"=>"America/Maceio","cities"=>"Alagoas, Sergipe","zone"=>$zone_labels["CBRT"]),13=>array("value"=>"America/Bahia","cities"=>"Bahia","zone"=>$zone_labels["CBRT"]),14=>array("value"=>"America/Santarem","cities"=>"West Pará (Santarem)","zone"=>$zone_labels["CBRT"]),15=>array("value"=>"America/Noronha","cities"=>"Atlantic islands (Noronha)","zone"=>"Brazil Atlantic Time")),
	  "IOT"=>array("country"=>"British Indian Ocean Territory","default_value"=>"Indian/Chagos","max_tz"=>1,0=>array("value"=>"Indian/Chagos","cities"=>"Chagos","zone"=>"Indian Ocean Time")),
	  "BRU"=>array("country"=>"Brunei","default_value"=>"Asia/Brunei","max_tz"=>1,0=>array("value"=>"Asia/Brunei","cities"=>"Bandar Seri Begawan","zone"=>$zone_labels["ASAW"])),
	  "BUL"=>array("country"=>"Bulgaria","default_value"=>"Europe/Sofia","max_tz"=>1,0=>array("value"=>"Europe/Sofia","cities"=>"Sofia","zone"=>$zone_labels["EET"])),
	  "BUR"=>array("country"=>"Bukina Faso","default_value"=>"Africa/Ouagadougou","max_tz"=>1,0=>array("value"=>"Africa/Ouagadougou","cities"=>"Ouagadougou","zone"=>$zone_labels["GMT"])),
	  "BDI"=>array("country"=>"Burundi","default_value"=>"Africa/Bujumbura","max_tz"=>1,0=>array("value"=>"Africa/Bujumbura","cities"=>"Bujumbura","zone"=>$zone_labels["CAT"])),
	  "CAM"=>array("country"=>"Cambodia","default_value"=>"Asia/Phnom_Penh","max_tz"=>1,0=>array("value"=>"Asia/Phnom_Penh","cities"=>"Phnom Penh","zone"=>$zone_labels["ASCW"])),
	  "CMR"=>array("country"=>"Cameroon","default_value"=>"Africa/Douala","max_tz"=>1,0=>array("value"=>"Africa/Douala","cities"=>"Douala","zone"=>$zone_labels["WAT"])),
	  "CAN"=>array("country"=>"Canada","default_value"=>"America/Toronto","max_tz"=>25,0=>array("value"=>"America/Vancouver","cities"=>"British Columbia (Vancouver; west)","zone"=>$zone_labels["PACT"]),1=>array("value"=>"America/Whitehorse","cities"=>"Yukon (Whitehorse; south)","zone"=>$zone_labels["PACT"]),2=>array("value"=>"America/Dawson","cities"=>"Yukon (Dawson; north)","zone"=>$zone_labels["PACT"]),3=>array("value"=>"America/Cambridge_Bay","cities"=>"Nunavut (Cambridge Bay; west)","zone"=>$zone_labels["CENT"]),4=>array("value"=>"America/Edmonton","cities"=>"Alberta (Edmonton), British Columbia (east), Saskatchewan (west)","zone"=>$zone_labels["MOUT"]),5=>array("value"=>"America/Yellowknife","cities"=>"Northwest Territories (Yellowknife; central)","zone"=>$zone_labels["MOUT"]),6=>array("value"=>"America/Inuvik","cities"=>"Northwest Territories (Inuvik; west)","zone"=>$zone_labels["MOUT"]),7=>array("value"=>"America/Dawson_Creek","cities"=>"British Columbia (Dawson Creek, Fort Saint John)","zone"=>$zone_labels["MST"]),8=>array("value"=>"America/Rankin_Inlet","cities"=>"Nunavut (Iqaluktuuttiaq)","zone"=>$zone_labels["CENT"]),9=>array("value"=>"America/Winnipeg","cities"=>"Manitoba (Winnipeg), Ontario (west)","zone"=>$zone_labels["CENT"]),10=>array("value"=>"America/Rainy_River","cities"=>"Ontario (Rainy River, Fort Frances)","zone"=>$zone_labels["CENT"]),11=>array("value"=>"America/Regina","cities"=>"Saskatchewan (Regina)","zone"=>$zone_labels["CST"]),12=>array("value"=>"America/Swift_Current","cities"=>"Saskatchewan (midwest)","zone"=>$zone_labels["CST"]),13=>array("value"=>"America/Montreal","cities"=>"Québec (Montreal)","zone"=>$zone_labels["EAST"]),14=>array("value"=>"America/Toronto","cities"=>"Québec (Toronto)","zone"=>$zone_labels["EAST"]),15=>array("value"=>"America/Nipigon","cities"=>"Ontario (Nipigon), Québec","zone"=>$zone_labels["EAST"]),16=>array("value"=>"America/Thunder_Bay","cities"=>"Ontario (Thunder Bay)","zone"=>$zone_labels["EAST"]),17=>array("value"=>"America/Pangnirtung","cities"=>"Nunavut (Pangnirtung)","zone"=>$zone_labels["EAST"]),18=>array("value"=>"America/Iqaluit","cities"=>"Nunavut (Iqaluit; east)","zone"=>$zone_labels["EAST"]),19=>array("value"=>"America/Coral_Harbour","cities"=>"Nunavut (Southampton Island)","zone"=>"Eastern Standard Time"),20=>array("value"=>"America/Halifax","cities"=>"Nova Scotia (Halifax), Labrador (west), Québec (east) & Prince Edward Island","zone"=>$zone_labels["ATLT"]),21=>array("value"=>"America/Glace_Bay","cities"=>"Nova Scotia (Glace Bay)","zone"=>$zone_labels["ATLT"]),22=>array("value"=>"America/Moncton","cities"=>"New Brunswick (Moncton)","zone"=>$zone_labels["ATLT"]),23=>array("value"=>"America/Goose_Bay","cities"=>"Labrador (Happy Valley-Goose Bay; east)","zone"=>$zone_labels["ATLT"]),24=>array("value"=>"America/St_Johns","cities"=>"Newfoundland Island (St.John's), Labrador (Port Hope Simpson; south-east)","zone"=>"Newfoundland Time")),
	  "CPV"=>array("country"=>"Cape Verde","default_value"=>"Atlantic/Cape_Verde","max_tz"=>1,0=>array("value"=>"Atlantic/Cape_Verde","cities"=>"Praia","zone"=>"Cape Verde Time")),
	  "CAY"=>array("country"=>"Cayman Islands","default_value"=>"America/Cayman","max_tz"=>1,0=>array("value"=>"America/Cayman","cities"=>"Georgetown","zone"=>$zone_labels["EST"])),
	  "CAF"=>array("country"=>"Central African Republic","default_value"=>"Africa/Bangui","max_tz"=>1,0=>array("value"=>"Africa/Bangui","cities"=>"Bangui","zone"=>$zone_labels["WAT"])),
      "CHA"=>array("country"=>"Chad","default_value"=>"Africa/Ndjamena","max_tz"=>1,0=>array("value"=>"Africa/Ndjamena","cities"=>"N'Djamena","zone"=>$zone_labels["WAT"])),
      "CHI"=>array(
	    "country"=>"Chile",
	    "default_value"=>"America/Santiago",
	    "max_tz"=>2,
	    0=>array(
		  "value"=>"Pacific/Easter",
		  "cities"=>"Easter Island, Sala y Gomez Island",
		  "zone"=>"Chile Easter Time"
		  ),
	    1=>array(
		  "value"=>"America/Santiago",
		  "cities"=>"Santiago",
		  "zone"=>"Chile Continental Time"
		  )
		),
      "CHN"=>array(
	    "country"=>"China",
	    "default_value"=>"Asia/Shanghai",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Shanghai",
		  "cities"=>"Beijing, Shanghai",
		  "zone"=>$zone_labels["CHIT"]
		  )
		),
      "CXR"=>array(
	    "country"=>"Christmas Island",
	    "default_value"=>"Indian/Christmas",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Indian/Christmas",
		  "cities"=>"The Settlement",
		  "zone"=>$zone_labels["ASCW"]
		  )
		),
      "CCK"=>array(
	    "country"=>"Cocos (Keeling) Islands",
	    "default_value"=>"Indian/Cocos",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Indian/Cocos",
		  "cities"=>"West Island",
		  "zone"=>"Myanmar-Cocos Time"
		  )
		),
      "COL"=>array(
	    "country"=>"Colombia",
	    "default_value"=>"America/Bogota",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Bogota",
		  "cities"=>"Bogota",
		  "zone"=>""
		  )
		),
      "COM"=>array(
	    "country"=>"Comoros",
	    "default_value"=>"Indian/Comoro",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Indian/Comoro",
		  "cities"=>"Moroni",
		  "zone"=>$zone_labels["EAT"]
		  )
		),
      "CGO"=>array(
	    "country"=>"Congo",
	    "default_value"=>"Africa/Brazzaville",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Brazzaville",
		  "cities"=>"Brazzaville",
		  "zone"=>$zone_labels["WAT"]
		  )
		),
      "COD"=>array(
	    "country"=>"Congo, DR",
	    "default_value"=>"Africa/Kinshasa",
	    "max_tz"=>2,
	    0=>array(
		  "value"=>"Africa/Kinshasa",
		  "cities"=>"Kinshasa, Bandungu, Bas-Congo, Équateur",
		  "zone"=>$zone_labels["WAT"]
		  ),
	    1=>array(
		  "value"=>"Africa/Lubumbashi",
		  "cities"=>"Kasaï, Katanga, Kivu, Lubumbashi, Maniema, Oriental",
		  "zone"=>$zone_labels["CAT"]
		  )
		),
      "COK"=>array(
	    "country"=>"Cook Islands",
	    "default_value"=>"Pacific/Rarotonga",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Rarotonga",
		  "cities"=>"Avarua",
		  "zone"=>"Pacific Cook Islands Time"
		  )
	    ),
      "CRC"=>array(
	    "country"=>"Costa Rica",
	    "default_value"=>"America/Costa_Rica",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Costa_Rica",
		  "cities"=>"San José",
		  "zone"=>""
		  )
	    ),
      "CIV"=>array(
	    "country"=>"Côte d'Ivoire",
	    "default_value"=>"Africa/Abidjan",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Abidjan",
		  "cities"=>"Abidjan, Yamoussoukro",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "CRO"=>array(
	    "country"=>"Croatia",
	    "default_value"=>"Europe/Zagreb",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Zagreb",
		  "cities"=>"Zagreb, Split, Rijeka, Dubrovnik, Pula",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "CUB"=>array(
	    "country"=>"Cuba",
	    "default_value"=>"America/Havana",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Havana",
		  "cities"=>"Havana",
		  "zone"=>""
		  )
	    ),
      "CYP"=>array(
	    "country"=>"Cyprus",
	    "default_value"=>"Europe/Nicosia",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Nicosia",
		  "cities"=>"Nicosia",
		  "zone"=>$zone_labels["EET"]
		  )
	    ),
      "CZE"=>array(
	    "country"=>"Czech Republic",
	    "default_value"=>"Europe/Prague",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Prague",
		  "cities"=>"Prague",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "DEN"=>array(
	    "country"=>"Denmark",
	    "default_value"=>"Europe/Copenhagen",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Copenhagen",
		  "cities"=>"Copenhagen",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "DJI"=>array(
	    "country"=>"Djibouti",
	    "default_value"=>"Africa/Djibouti",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Djibouti",
		  "cities"=>"Djibouti City",
		  "zone"=>$zone_labels["EAT"]
		  )
	    ),
      "DMA"=>array(
	    "country"=>"Dominica",
	    "default_value"=>"America/Dominica",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Dominica",
		  "cities"=>"Roseau",
		  "zone"=>""
		  )
	    ),
      "DOM"=>array(
	    "country"=>"Dominican Republic",
	    "default_value"=>"America/Santo_Domingo",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Santo_Domingo",
		  "cities"=>"Santo Domingo",
		  "zone"=>""
		  )
	    ),
      "ECU"=>array(
	    "country"=>"Ecuador",
	    "default_value"=>"America/Guayaquil",
	    "max_tz"=>2,
	    0=>array(
		  "value"=>"Pacific/Galapagos",
		  "cities"=>"Galapagos Islands",
		  "zone"=>""
		  ),
	    1=>array(
		  "value"=>"America/Guayaquil",
		  "cities"=>"Quito",
		  "zone"=>""
		  )
	    ),
      "EGY"=>array(
	    "country"=>"Egypt",
	    "default_value"=>"Africa/Cairo",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Cairo",
		  "cities"=>"Cairo, Alexandria",
		  "zone"=>$zone_labels["CAT"] . ": Egypt"
		  )
	    ),
      "ESA"=>array(
	    "country"=>"El Salvador",
	    "default_value"=>"America/El_Salvador",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/El_Salvador",
		  "cities"=>"San Salvador",
		  "zone"=>""
		  )
	    ),
      "GEQ"=>array(
	    "country"=>"Equatorial Guinea",
	    "default_value"=>"Africa/Malabo",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Malabo",
		  "cities"=>"Malabo",
		  "zone"=>$zone_labels["WAT"]
		  )
	    ),
      "ERI"=>array(
	    "country"=>"Eritrea",
	    "default_value"=>"Africa/Asmara",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Asmara",
		  "cities"=>"Asmara",
		  "zone"=>$zone_labels["EAT"]
		  )
	    ),
      "EST"=>array(
	    "country"=>"Estonia",
	    "default_value"=>"Europe/Tallinn",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Tallinn",
		  "cities"=>"Tallinn",
		  "zone"=>$zone_labels["EET"]
		  )
	    ),
      "ETH"=>array(
	    "country"=>"Ethiopia",
	    "default_value"=>"Africa/Addis_Ababa",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Addis_Ababa",
		  "cities"=>"Addis Ababa",
		  "zone"=>$zone_labels["EAT"]
		  )
	    ),
      "FLK"=>array(
	    "country"=>"Falkland Islands",
	    "default_value"=>"Atlantic/Stanley",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Atlantic/Stanley",
		  "cities"=>"Stanley",
		  "zone"=>"Falkland Time"
		  )
	    ),
      "FAR"=>array(
	    "country"=>"Faroe Islands",
	    "default_value"=>"Atlantic/Faroe",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Atlantic/Faroe",
		  "cities"=>"Tórshavn",
		  "zone"=>$zone_labels["WET"]
		  )
	    ),
      "FIJ"=>array(
	    "country"=>"Fiji",
	    "default_value"=>"Pacific/Fiji",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Fiji",
		  "cities"=>"Suva",
		  "zone"=>""
		  )
	    ),
      "FIN"=>array(
	    "country"=>"Finland",
	    "default_value"=>"Europe/Helsinki",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Helsinki",
		  "cities"=>"Helsinki, Åland Islands",
		  "zone"=>$zone_labels["EET"]
		  )
	    ),
      "FRA"=>array(
	    "country"=>"France",
	    "default_value"=>"Europe/Paris",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Paris",
		  "cities"=>"Paris, Metz, Lion",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "FGU"=>array(
	    "country"=>"French Guiana",
	    "default_value"=>"America/Cayenne",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Cayenne",
		  "cities"=>"Cayenne",
		  "zone"=>""
		  )
	    ),
      "FPO"=>array(
	    "country"=>"French Polynesia",
	    "default_value"=>"Pacific/Tahiti",
	    "max_tz"=>3,
	    0=>array(
		  "value"=>"Pacific/Tahiti",
		  "cities"=>"Papeete (Tahiti)",
		  "zone"=>"Pacific Tahiti Time"
		  ),
	    1=>array(
		  "value"=>"Pacific/Marquesas",
		  "cities"=>"Marquesas",
		  "zone"=>"Pacific Marquesas Time"
		  ),
	    2=>array(
		  "value"=>"Pacific/Gambier",
		  "cities"=>"Rikitea (Gambier)",
		  "zone"=>"Pacific Gambier Time"
		  )
	    ),
      "GAB"=>array(
	    "country"=>"Gabon",
	    "default_value"=>"Africa/Libreville",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Libreville",
		  "cities"=>"Libreville",
		  "zone"=>$zone_labels["WAT"]
		  )
	    ),
      "GAM"=>array(
	    "country"=>"Gambia",
	    "default_value"=>"Africa/Banjul",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Banjul",
		  "cities"=>"Banjul",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "GEO"=>array(
	    "country"=>"Georgia",
	    "default_value"=>"Asia/Tbilisi",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Tbilisi",
		  "cities"=>"Tbilisi",
		  "zone"=>$zone_labels["ANET"]
		  )
	    ),
      "GER"=>array(
	    "country"=>"Germany",
	    "default_value"=>"Europe/Berlin",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Berlin",
		  "cities"=>"Berlin, Munich, Frankfurt, Koln, Hanover, Stuttgart",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "GHA"=>array(
	    "country"=>"Ghana",
	    "default_value"=>"Africa/Accra",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Accra",
		  "cities"=>"Accra",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "GIB"=>array(
	    "country"=>"Gibraltar",
	    "default_value"=>"Europe/Gibraltar",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Gibraltar",
		  "cities"=>"Gibraltar",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "GRE"=>array(
	    "country"=>"Greece",
	    "default_value"=>"Europe/Athens",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Athens",
		  "cities"=>"Athens",
		  "zone"=>$zone_labels["EET"]
		  )
	    ),
      "GRL"=>array(
	    "country"=>"Greenland",
	    "default_value"=>"America/Godthab",
	    "max_tz"=>4,
	    0=>array(
		  "value"=>"America/Thule",
		  "cities"=>"Thule",
		  "zone"=>$zone_labels["ATLT"]
		  ),
	    1=>array(
		  "value"=>"America/Godthab",
		  "cities"=>"Godthab (Nuuk)",
		  "zone"=>"Greenland Godthab Time"
		  ),
	    2=>array(
		  "value"=>"America/Scoresbysund",
		  "cities"=>"Scoresbysund (Ittoqqortoormiit)",
		  "zone"=>"Azores Time"
		  ),
	    3=>array(
		  "value"=>"America/Danmarkshavn",
		  "cities"=>"Danmarkshavn",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "GRN"=>array(
	    "country"=>"Grenada",
	    "default_value"=>"America/Grenada",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Grenada",
		  "cities"=>"St.George's",
		  "zone"=>""
		  )
	    ),
      "GUD"=>array(
	    "country"=>"Guadeloupe",
	    "default_value"=>"America/Guadeloupe",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Guadeloupe",
		  "cities"=>"Basse-Terre, Pointe a Pitre, Saint Barthélemy, Saint Martin (Fr.)",
		  "zone"=>"AST"
		  )
	    ),
      "GUM"=>array(
	    "country"=>"Guam",
	    "default_value"=>"Pacific/Guam",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Guam",
		  "cities"=>"Hagåtña",
		  "zone"=>"US Chamorro Standard Time"
		  )
	    ),
      "GUA"=>array(
	    "country"=>"Guatemala",
	    "default_value"=>"America/Guatemala",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Guatemala",
		  "cities"=>"Guatemala City",
		  "zone"=>$zone_labels["WPCT"]
		  )
	    ),
      "GGY"=>array(
	    "country"=>"Guernsey",
	    "default_value"=>"Europe/Guernsey",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Guernsey",
		  "cities"=>"St.Peter Port",
		  "zone"=>$zone_labels["WET"]
		  )
	    ),
      "GUI"=>array(
	    "country"=>"Guinea",
	    "default_value"=>"Africa/Conakry",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Conakry",
		  "cities"=>"Conakry",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "GBS"=>array(
	    "country"=>"Guinea-Bissau",
	    "default_value"=>"Africa/Bissau",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Bissau",
		  "cities"=>"Bissau",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "GUY"=>array(
	    "country"=>"Guyana",
	    "default_value"=>"America/Guyana",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Guyana",
		  "cities"=>"Georgetown",
		  "zone"=>"GYT"
		  )
	    ),
      "HAI"=>array(
	    "country"=>"Haiti",
	    "default_value"=>"America/Port-au-Prince",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Port-au-Prince",
		  "cities"=>"Port-au-Prince",
		  "zone"=>"EST"
		  )
	    ),
      "HON"=>array(
	    "country"=>"Honduras",
	    "default_value"=>"America/Tegucigalpa",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Tegucigalpa",
		  "cities"=>"Tegucigalpa",
		  "zone"=>"CST"
		  )
	    ),
      "HKG"=>array(
	    "country"=>"Hong Kong",
	    "default_value"=>"Asia/Hong_Kong",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Hong_Kong",
		  "cities"=>"Xianggang",
		  "zone"=>$zone_labels["CHIT"]
		  )
	    ),
      "HUN"=>array(
	    "country"=>"Hungary",
	    "default_value"=>"Europe/Budapest",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Budapest",
		  "cities"=>"Budapest",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "ISL"=>array(
	    "country"=>"Iceland",
	    "default_value"=>"Atlantic/Reykjavik",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Atlantic/Reykjavik",
		  "cities"=>"Reykjavík",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "IND"=>array(
	    "country"=>"India",
	    "default_value"=>"Asia/Calcutta",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Calcutta",
		  "cities"=>"Calcutta, New Delhi",
		  "zone"=>$zone_labels["IST"]
		  )
	    ),
      "INA"=>array(
	    "country"=>"Indonesia",
	    "default_value"=>"Asia/Jakarta",
	    "max_tz"=>3,
	    0=>array(
		  "value"=>"Asia/Jakarta",
		  "cities"=>"Borneo (west), Java (Jakarta), Sumatera",
		  "zone"=>"Western Indonesian Time"
		  ),
	    1=>array(
		  "value"=>"Asia/Makassar",
		  "cities"=>"Bali, Borneo (east), Nusa Tenggara Barat, Sulawesi",
		  "zone"=>"Central Indonesian Time"
		  ),
	    2=>array(
		  "value"=>"Asia/Jayapura",
		  "cities"=>"Maluku, Papua",
		  "zone"=>"Eastern Indonesian Time"
		  )
	    ),
      "IRI"=>array(
	    "country"=>"Iran",
	    "default_value"=>"Asia/Tehran",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Tehran",
		  "cities"=>"Tehran",
		  "zone"=>"Iran Time"
		  )
	    ),
      "IRQ"=>array(
	    "country"=>"Iraq",
	    "default_value"=>"Asia/Baghdad",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Baghdad",
		  "cities"=>"Baghdad",
		  "zone"=>$zone_labels["ARAB"]
		  )
	    ),
      "IRL"=>array(
	    "country"=>"Ireland",
	    "default_value"=>"Europe/Dublin",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Dublin",
		  "cities"=>"Dublin",
		  "zone"=>$zone_labels["WET"]
		  )
	    ),
      "IMN"=>array(
	    "country"=>"Isle of Man",
	    "default_value"=>"Europe/Isle_of_Man",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Isle_of_Man",
		  "cities"=>"Douglas",
		  "zone"=>$zone_labels["WET"]
		  )
	    ),
      "ISR"=>array(
	    "country"=>"Israel",
	    "default_value"=>"Asia/Jerusalem",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Jerusalem",
		  "cities"=>"Jerusalem, Tel Aviv",
		  "zone"=>"Israel Time"
		  )
	    ),
      "ITA"=>array(
	    "country"=>"Italy",
	    "default_value"=>"Europe/Rome",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Rome",
		  "cities"=>"Rome, Milan, Palermo, Napoli, Udine, Verona",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "JAM"=>array(
	    "country"=>"Jamaica",
	    "default_value"=>"America/Jamaica",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Jamaica",
		  "cities"=>"Kingston",
		  "zone"=>"EST"
		  )
	    ),
      "JPN"=>array(
	    "country"=>"Japan",
	    "default_value"=>"Asia/Tokyo",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Tokyo",
		  "cities"=>"Tokyo",
		  "zone"=>$zone_labels["JRKT"]
		  )
	    ),
      "JEY"=>array(
	    "country"=>"Jersey",
	    "default_value"=>"Europe/Jersey",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Jersey",
		  "cities"=>"St.Helier",
		  "zone"=>$zone_labels["WET"]
		  )
	    ),
      "JOR"=>array(
	    "country"=>"Jordan",
	    "default_value"=>"Asia/Amman",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Amman",
		  "cities"=>"Amman",
		  "zone"=>"Jordan Time"
		  )
	    ),
      "KAZ"=>array(
	    "country"=>"Kazakhstan",
	    "default_value"=>"Asia/Almaty",
	    "max_tz"=>2,
	    0=>array(
		  "value"=>"Asia/Aqtobe",
		  "cities"=>"Aqtobe (Aktobe), Mangghystau, Ural'sk",
		  "zone"=>"Western Kazakhstan Time"
		  ),
	    1=>array(
		  "value"=>"Asia/Almaty",
		  "cities"=>"Almaty (Alma-Ata), Qyzylorda (Kyzylorda)",
		  "zone"=>"Eastern Kazakhstan Time"
		  )
	    ),
      "KEN"=>array(
	    "country"=>"Kenya",
	    "default_value"=>"Africa/Nairobi",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Nairobi",
		  "cities"=>"Nairobi",
		  "zone"=>$zone_labels["EAT"]
		  )
	    ),
      "KIR"=>array(
	    "country"=>"Kiribati",
	    "default_value"=>"Pacific/Tarawa",
	    "max_tz"=>3,
	    0=>array(
		  "value"=>"Pacific/Tarawa",
		  "cities"=>"Gilbert Islands: South Tarawa, Biriki",
		  "zone"=>""
		  ),
	    1=>array(
		  "value"=>"Pacific/Enderbury",
		  "cities"=>"Phoenix Islands",
		  "zone"=>""
		  ),
	    2=>array(
		  "value"=>"Pacific/Kiritimati",
		  "cities"=>"Line Islands",
		  "zone"=>""
		  )
	    ),
      "KOR"=>array(
	    "country"=>"Korea",
	    "default_value"=>"Asia/Seoul",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Seoul",
		  "cities"=>"Seoul",
		  "zone"=>$zone_labels["JRKT"]
		  )
	    ),
      "KUW"=>array(
	    "country"=>"Kuwait",
	    "default_value"=>"Asia/Kuwait",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Kuwait",
		  "cities"=>"Kuwait City",
		  "zone"=>$zone_labels["ARAB"]
		  )
	    ),
      "KGZ"=>array(
	    "country"=>"Kyrgyzstan",
	    "default_value"=>"Asia/Bishkek",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Bishkek",
		  "cities"=>"Bishkek",
		  "zone"=>$zone_labels["ASCT"]
		  )
	    ),
      "LAO"=>array(
	    "country"=>"Laos",
	    "default_value"=>"Asia/Vientiane",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Vientiane",
		  "cities"=>"Vientiane (Viang Chan)",
		  "zone"=>$zone_labels["ASCW"]
		  )
	    ),
      "LAT"=>array(
	    "country"=>"Latvia",
	    "default_value"=>"Europe/Riga",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Riga",
		  "cities"=>"Riga",
		  "zone"=>$zone_labels["EET"]
		  )
	    ),
      "LIB"=>array(
	    "country"=>"Lebanon",
	    "default_value"=>"Asia/Beirut",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Beirut",
		  "cities"=>"Beirut",
		  "zone"=>"Lebanon Time"
		  )
	    ),
      "LES"=>array(
	    "country"=>"Lesotho",
	    "default_value"=>"Africa/Maseru",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Maseru",
		  "cities"=>"Maseru",
		  "zone"=>$zone_labels["CAT"]
		  )
	    ),
      "LBR"=>array(
	    "country"=>"Liberia",
	    "default_value"=>"Africa/Monrovia",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Monrovia",
		  "cities"=>"Monrovia",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "LBA"=>array(
	    "country"=>"Libya",
	    "default_value"=>"Africa/Tripoli",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Tripoli",
		  "cities"=>"Tripoli",
		  "zone"=>$zone_labels["CAT"]
		  )
	    ),
      "LIE"=>array(
	    "country"=>"Liechtenstein",
	    "default_value"=>"Europe/Vaduz",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Vaduz",
		  "cities"=>"Vaduz",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "LTU"=>array(
	    "country"=>"Lithuania",
	    "default_value"=>"Europe/Vilnius",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Vilnius",
		  "cities"=>"Vilnius",
		  "zone"=>$zone_labels["EET"]
		  )
	    ),
      "LUX"=>array(
	    "country"=>"Luxembourg",
	    "default_value"=>"Europe/Luxembourg",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Luxembourg",
		  "cities"=>"Luxembourg",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "MAC"=>array(
	    "country"=>"Macau",
	    "default_value"=>"Asia/Macau",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Macau",
		  "cities"=>"Macao, Aomen",
		  "zone"=>$zone_labels["CHIT"]
		  )
	    ),
      "MKD"=>array(
	    "country"=>"Macedonia, FYR",
	    "default_value"=>"Europe/Skopje",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Skopje",
		  "cities"=>"Skopje, Ohrid, Vardar",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "MAD"=>array(
	    "country"=>"Madagascar",
	    "default_value"=>"Indian/Antananarivo",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Indian/Antananarivo",
		  "cities"=>"Antananarivo",
		  "zone"=>$zone_labels["EAT"]
		  )
	    ),
      "MAW"=>array(
	    "country"=>"Malawi",
	    "default_value"=>"Africa/Blantyre",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Blantyre",
		  "cities"=>"Lilongwe, Blantyre",
		  "zone"=>$zone_labels["CAT"]
		  )
	    ),
      "MAS"=>array(
	    "country"=>"Malaysia",
	    "default_value"=>"Asia/Kuala_Lumpur",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Kuala_Lumpur",
		  "cities"=>"Kuala Lumpur",
		  "zone"=>$zone_labels["ASAW"]
		  )
	    ),
      "MDV"=>array(
	    "country"=>"Maldives",
	    "default_value"=>"Indian/Maldives",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Indian/Maldives",
		  "cities"=>"Malé",
		  "zone"=>"MVT"
		  )
	    ),
      "MLI"=>array(
	    "country"=>"Mali",
	    "default_value"=>"Africa/Bamako",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Bamako",
		  "cities"=>"Bamako, Timbuktu",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "MLT"=>array(
	    "country"=>"Malta",
	    "default_value"=>"Europe/Malta",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Malta",
		  "cities"=>"Valletta",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "MHL"=>array(
	    "country"=>"Marshall Islands",
	    "default_value"=>"Pacific/Majuro",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Majuro",
		  "cities"=>"Majuro, Kwajalein",
		  "zone"=>"MHT"
		  )
	    ),
      "MRT"=>array(
	    "country"=>"Martinique",
	    "default_value"=>"America/Martinique",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Martinique",
		  "cities"=>"Fort-de-France",
		  "zone"=>"AST"
		  )
	    ),
      "MTN"=>array(
	    "country"=>"Mauritania",
	    "default_value"=>"Africa/Nouakchott",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Nouakchott",
		  "cities"=>"Nouakchott",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "MRI"=>array(
	    "country"=>"Mauritius",
	    "default_value"=>"Indian/Mauritius",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Indian/Mauritius",
		  "cities"=>"Port Louis",
		  "zone"=>"Mauritius Time"
		  )
	    ),
      "MAY"=>array(
	    "country"=>"Mayotte",
	    "default_value"=>"Indian/Mayotte",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Indian/Mayotte",
		  "cities"=>"Mamoudzou",
		  "zone"=>$zone_labels["EAT"]
		  )
	    ),
      "MEX"=>array(
	    "country"=>"Mexico",
	    "default_value"=>"America/Mexico_City",
	    "max_tz"=>8,
	    0=>array(
		  "value"=>"America/Tijuana",
		  "cities"=>"Baja California (Tijuana)",
		  "zone"=>$zone_labels["PACT"]
		  ),
	    1=>array(
		  "value"=>"America/Chihuahua",
		  "cities"=>"Chihuahua",
		  "zone"=>$zone_labels["MOUT"]
		  ),
	    2=>array(
		  "value"=>"America/Mazatlan",
		  "cities"=>"Baja California Sur, Nayarit, Sinaloa",
		  "zone"=>$zone_labels["MOUT"]
		  ),
	    3=>array(
		  "value"=>"America/Hermosillo",
		  "cities"=>"Sonora",
		  "zone"=>$zone_labels["MST"]
		  ),
	    4=>array(
		  "value"=>"America/Mexico_City",
		  "cities"=>"Central Mexico (Mexico City)",
		  "zone"=>$zone_labels["CENT"]
		  ),
	    5=>array(
		  "value"=>"America/Cancun",
		  "cities"=>"Quintana Roo",
		  "zone"=>$zone_labels["CENT"]
		  ),
	    6=>array(
		  "value"=>"America/Merida",
		  "cities"=>"Campeche, Yucatan",
		  "zone"=>$zone_labels["CENT"]
		  ),
	    7=>array(
		  "value"=>"America/Monterrey",
		  "cities"=>"Coahuila, Durango, Nuevo Leon, Tamaulipas",
		  "zone"=>$zone_labels["CENT"]
		  )
	    ),
      "FSM"=>array(
	    "country"=>"Micronesia, FS",
	    "default_value"=>"Pacific/Ponape",
	    "max_tz"=>4,
	    0=>array(
		  "value"=>"Pacific/Yap",
		  "cities"=>"Yap",
		  "zone"=>$zone_labels["WPCT"]
		  ),
	    1=>array(
		  "value"=>"Pacific/Truk",
		  "cities"=>"Chuuk/Truk",
		  "zone"=>$zone_labels["WPCT"]
		  ),
	    2=>array(
		  "value"=>"Pacific/Ponape",
		  "cities"=>"Pohnpei/Ponape (Palikir)",
		  "zone"=>""
		  ),
	    3=>array(
		  "value"=>"Pacific/Kosrae",
		  "cities"=>"Kosrae (Tofol)",
		  "zone"=>""
		  )
	    ),
      "MDA"=>array(
	    "country"=>"Moldova",
	    "default_value"=>"Europe/Chisinau",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Chisinau",
		  "cities"=>"Chisinau",
		  "zone"=>$zone_labels["EET"]
		  )
	    ),
      "MON"=>array(
	    "country"=>"Monaco",
	    "default_value"=>"Europe/Monaco",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Monaco",
		  "cities"=>"Monaco",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "MGL"=>array(
	    "country"=>"Mongolia",
	    "default_value"=>"Asia/Ulaanbaatar",
	    "max_tz"=>3,
	    0=>array(
		  "value"=>"Asia/Hovd",
		  "cities"=>"Hovd/Chovd",
		  "zone"=>$zone_labels["ASCW"]
		  ),
	    1=>array(
		  "value"=>"Asia/Ulaanbaatar",
		  "cities"=>"Ulaanbaatar/Ulan Bator",
		  "zone"=>$zone_labels["ASAW"]
		  ),
	    2=>array(
		  "value"=>"Asia/Choibalsan",
		  "cities"=>"Choibalsan/Bajan Tuemen",
		  "zone"=>$zone_labels["ASAW"]
		  )
	    ),
      "MNE"=>array(
	    "country"=>"Montenegro",
	    "default_value"=>"Europe/Podgorica",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Podgorica",
		  "cities"=>"Podgorica, Bar, Cetinje, Ulcinj, Kotor, Tivat",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "MNT"=>array(
	    "country"=>"Montserrat",
	    "default_value"=>"America/Montserrat",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Montserrat",
		  "cities"=>"Brades Estate, Cork Hill",
		  "zone"=>"AST"
		  )
	    ),
      "MAR"=>array(
	    "country"=>"Morocco",
	    "default_value"=>"Africa/Casablanca",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Casablanca",
		  "cities"=>"Rabat, Casablanca",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "MOZ"=>array(
	    "country"=>"Mozambique",
	    "default_value"=>"Africa/Maputo",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Maputo",
		  "cities"=>"Maputo",
		  "zone"=>$zone_labels["CAT"]
		  )
	    ),
      "MYA"=>array(
	    "country"=>"Myanmar",
	    "default_value"=>"Asia/Rangoon",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Rangoon",
		  "cities"=>"Naypyidaw, Rangoon (Yangon)",
		  "zone"=>"Myanmar-Cocos Time"
		  )
	    ),
      "NAM"=>array(
	    "country"=>"Namibia",
	    "default_value"=>"Africa/Windhoek",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Windhoek",
		  "cities"=>"Windhoek",
		  "zone"=>$zone_labels["WAT"] . ": Namibia"
		  )
	    ),
      "NRU"=>array(
	    "country"=>"Nauru",
	    "default_value"=>"Pacific/Nauru",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Nauru",
		  "cities"=>"Uaobe, Yaren",
		  "zone"=>"NRT"
		  )
	    ),
      "NEP"=>array(
	    "country"=>"Nepal",
	    "default_value"=>"Asia/Katmandu",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Katmandu",
		  "cities"=>"Kathmandu",
		  "zone"=>"Nepal Time"
		  )
	    ),
      "NED"=>array(
	    "country"=>"Netherlands",
	    "default_value"=>"Europe/Amsterdam",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Amsterdam",
		  "cities"=>"Amsterdam, Hague, Rotterdam",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "AHO"=>array(
	    "country"=>"Netherlands Antilles",
	    "default_value"=>"America/Curacao",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Curacao",
		  "cities"=>"Bonaire, Curaçao (Willemstad)",
		  "zone"=>"AST"
		  )
	    ),
      "NCD"=>array(
	    "country"=>"New Caledonia",
	    "default_value"=>"Pacific/Noumea",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Noumea",
		  "cities"=>"Nouméa, Loyalty Islands (Îles Loyauté)",
		  "zone"=>"NCT"
		  )
	    ),
      "NZL"=>array(
	    "country"=>"New Zealand",
	    "default_value"=>"Pacific/Auckland",
	    "max_tz"=>2,
	    0=>array(
		  "value"=>"Pacific/Auckland",
		  "cities"=>"Wellington, Auckland",
		  "zone"=>"NZ"
		  ),
	    1=>array(
		  "value"=>"Pacific/Chatham",
		  "cities"=>"Chatham",
		  "zone"=>"Chatham Time"
		  )
	    ),
      "NCA"=>array(
	    "country"=>"Nicaragua",
	    "default_value"=>"America/Managua",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Managua",
		  "cities"=>"Managua",
		  "zone"=>"CST"
		  )
	    ),
      "NIG"=>array(
	    "country"=>"Niger",
	    "default_value"=>"Africa/Niamey",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Niamey",
		  "cities"=>"Niamey",
		  "zone"=>$zone_labels["WAT"]
		  )
	    ),
      "NGR"=>array(
	    "country"=>"Nigeria",
	    "default_value"=>"Africa/Lagos",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Lagos",
		  "cities"=>"Abuja, Lagos",
		  "zone"=>$zone_labels["WAT"]
		  )
	    ),
      "NIU"=>array(
	    "country"=>"Niue",
	    "default_value"=>"Pacific/Niue",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Niue",
		  "cities"=>"Alofi",
		  "zone"=>"NUT"
		  )
	    ),
      "NFI"=>array(
	    "country"=>"Norfolk Island",
	    "default_value"=>"Pacific/Norfolk",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Norfolk",
		  "cities"=>"Kingston",
		  "zone"=>"NFT"
		  )
	    ),
      "PRK"=>array(
	    "country"=>"North Korea",
	    "default_value"=>"Asia/Pyongyang",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Pyongyang",
		  "cities"=>"Pyongyang",
		  "zone"=>$zone_labels["JRKT"]
		  )
	    ),
      "NMA"=>array(
	    "country"=>"Northern Mariana Islands",
	    "default_value"=>"Pacific/Saipan",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Saipan",
		  "cities"=>"Saipan",
		  "zone"=>$zone_labels["WPCT"]
		  )
	    ),
      "NOR"=>array(
	    "country"=>"Norway",
	    "default_value"=>"Europe/Oslo",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Oslo",
		  "cities"=>"Oslo",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "OMA"=>array(
	    "country"=>"Oman",
	    "default_value"=>"Asia/Muscat",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Muscat",
		  "cities"=>"Muscat",
		  "zone"=>$zone_labels["ANET"]
		  )
	    ),
      "PAK"=>array(
	    "country"=>"Pakistan",
	    "default_value"=>"Asia/Karachi",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Karachi",
		  "cities"=>"Islamabad, Karachi",
		  "zone"=>"Pakistan Lahore Time"
		  )
	    ),
      "PLW"=>array(
	    "country"=>"Palau",
	    "default_value"=>"Pacific/Palau",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Palau",
		  "cities"=>"Koror, Ngerulmud",
		  "zone"=>$zone_labels["JRKT"]
		  )
	    ),
      "PLE"=>array(
	    "country"=>"Palestine",
	    "default_value"=>"Asia/Gaza",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Gaza",
		  "cities"=>"Ramallah, Gaza",
		  "zone"=>"Palestine Time"
		  )
	    ),
      "PAN"=>array(
	    "country"=>"Panama",
	    "default_value"=>"America/Panama",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Panama",
		  "cities"=>"Panamá City",
		  "zone"=>"EST"
		  )
	    ),
      "PNG"=>array(
	    "country"=>"Papua New Guinea",
	    "default_value"=>"Pacific/Port_Moresby",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Port_Moresby",
		  "cities"=>"Port Moresby",
		  "zone"=>$zone_labels["WPCT"]
		  )
	    ),
      "PAR"=>array(
	    "country"=>"Paraguay",
	    "default_value"=>"America/Asuncion",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Asuncion",
		  "cities"=>"Asunción",
		  "zone"=>"Paraguay Time"
		  )
	    ),
      "PER"=>array(
	    "country"=>"Peru",
	    "default_value"=>"America/Lima",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Lima",
		  "cities"=>"Lima",
		  "zone"=>"PET"
		  )
	    ),
      "PHI"=>array(
	    "country"=>"Philippines",
	    "default_value"=>"Asia/Manila",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Manila",
		  "cities"=>"Manila",
		  "zone"=>$zone_labels["ASAW"]
		  )
	    ),
      "PCN"=>array(
	    "country"=>"Pitcairn Island",
	    "default_value"=>"Pacific/Pitcairn",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Pitcairn",
		  "cities"=>"Adamstown",
		  "zone"=>"PST"
		  )
	    ),
      "POL"=>array(
	    "country"=>"Poland",
	    "default_value"=>"Europe/Warsaw",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Warsaw",
		  "cities"=>"Warsaw",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "POR"=>array(
	    "country"=>"Portugal",
	    "default_value"=>"Europe/Lisbon",
	    "max_tz"=>2,
	    0=>array(
		  "value"=>"Atlantic/Azores",
		  "cities"=>"Ponta Delgada",
		  "zone"=>"Azores Time"
		  ),
	    1=>array(
		  "value"=>"Europe/Lisbon",
		  "cities"=>"Lisbon, Madeira (Funchal)",
		  "zone"=>$zone_labels["WET"]
		  )
	    ),
      "PUR"=>array(
	    "country"=>"Puerto Rico",
	    "default_value"=>"America/Puerto_Rico",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Puerto_Rico",
		  "cities"=>"San Juan",
		  "zone"=>"AST"
		  )
	    ),
      "QAT"=>array(
	    "country"=>"Qatar",
	    "default_value"=>"Asia/Qatar",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Qatar",
		  "cities"=>"Doha (Al Dawhah)",
		  "zone"=>$zone_labels["ARAB"]
		  )
	    ),
      "REU"=>array(
	    "country"=>"Réunion",
	    "default_value"=>"Indian/Reunion",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Indian/Reunion",
		  "cities"=>"Saint-Denis",
		  "zone"=>$zone_labels["ANET"]
		  )
	    ),
      "ROU"=>array(
	    "country"=>"Romania",
	    "default_value"=>"Europe/Bucharest",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Bucharest",
		  "cities"=>"Bucharest, Cluj",
		  "zone"=>$zone_labels["EET"]
		  )
	    ),
      "RUS"=>array(
	    "country"=>"Russia",
	    "default_value"=>"Europe/Moscow",
	    "max_tz"=>11,
	    0=>array(
		  "value"=>"Europe/Kaliningrad",
		  "cities"=>"Kaliningrad",
		  "zone"=>$zone_labels["EET"]
		  ),
	    1=>array(
		  "value"=>"Europe/Moscow",
		  "cities"=>"Moscow, Volgograd",
		  "zone"=>"Moscow Time"
		  ),
	    2=>array(
		  "value"=>"Europe/Samara",
		  "cities"=>"Samara",
		  "zone"=>$zone_labels["ANET"] . ": Russia/Armenia"
		  ),
	    3=>array(
		  "value"=>"Asia/Yekaterinburg",
		  "cities"=>"Yekaterinburg",
		  "zone"=>"Yekaterinburg Time"
		  ),
	    4=>array(
		  "value"=>"Asia/Omsk",
		  "cities"=>"Omsk, Novosibirsk, Novokuznetsk",
		  "zone"=>"Novosibirsk Time"
		  ),
	    5=>array(
		  "value"=>"Asia/Krasnoyarsk",
		  "cities"=>"Krasnoyarsk",
		  "zone"=>"Krasnoyarsk Time"
		  ),
	    6=>array(
		  "value"=>"Asia/Irkutsk",
		  "cities"=>"Irkutsk",
		  "zone"=>"Irkutsk Time"
		  ),
	    7=>array(
		  "value"=>"Asia/Yakutsk",
		  "cities"=>"Yakutsk",
		  "zone"=>"Yakutsk Time"
		  ),
	    8=>array(
		  "value"=>"Asia/Vladivostok",
		  "cities"=>"Vladivostok, Sakhalin",
		  "zone"=>"Vladivostok Time"
		  ),
	    9=>array(
		  "value"=>"Asia/Magadan",
		  "cities"=>"Magadan",
		  "zone"=>"Magadan Time"
		  ),
	    10=>array(
		  "value"=>"Asia/Kamchatka",
		  "cities"=>"Kamchatka, Anadyr",
		  "zone"=>"Kamchatka Time"
		  )
	    ),
      "RWA"=>array(
	    "country"=>"Rwanda",
	    "default_value"=>"Africa/Kigali",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Kigali",
		  "cities"=>"Kigali",
		  "zone"=>$zone_labels["CAT"]
		  )
	    ),
      "HEL"=>array(
	    "country"=>"Saint Helena",
	    "default_value"=>"Atlantic/St_Helena",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Atlantic/St_Helena",
		  "cities"=>"Jamestown",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "SKN"=>array(
	    "country"=>"Saint Kitts and Nevis",
	    "default_value"=>"America/St_Kitts",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/St_Kitts",
		  "cities"=>"Basseterre",
		  "zone"=>"AST"
		  )
	    ),
      "LCA"=>array(
	    "country"=>"Saint Lucia",
	    "default_value"=>"America/St_Lucia",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/St_Lucia",
		  "cities"=>"Castries",
		  "zone"=>"AST"
		  )
	    ),
      "SPM"=>array(
	    "country"=>"Saint Pierre and Miquelon",
	    "default_value"=>"America/Miquelon",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Miquelon",
		  "cities"=>"Saint-Pierre",
		  "zone"=>$zone_labels["PACT"]
		  )
	    ),
      "VIN"=>array(
	    "country"=>"Saint Vincent and the Grenadines",
	    "default_value"=>"America/St_Vincent",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/St_Vincent",
		  "cities"=>"Kingstown",
		  "zone"=>"AST"
		  )
	    ),
      "SAM"=>array(
	    "country"=>"Samoa",
	    "default_value"=>"Pacific/Apia",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Apia",
		  "cities"=>"Apia",
		  "zone"=>""
		  )
	    ),
      "SMR"=>array(
	    "country"=>"San Marino",
	    "default_value"=>"Europe/San_Marino",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/San_Marino",
		  "cities"=>"San Marino",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "STP"=>array(
	    "country"=>"Sao Tome and Principe",
	    "default_value"=>"Africa/Sao_Tome",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Sao_Tome",
		  "cities"=>"São Tomé",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "KSA"=>array(
	    "country"=>"Saudi Arabia",
	    "default_value"=>"Asia/Riyadh",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Riyadh",
		  "cities"=>"Riyadh",
		  "zone"=>$zone_labels["ARAB"]
		  )
	    ),
      "SEN"=>array(
	    "country"=>"Senegal",
	    "default_value"=>"Africa/Dakar",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Dakar",
		  "cities"=>"Dakar",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "SRB"=>array(
	    "country"=>"Serbia",
	    "default_value"=>"Europe/Belgrade",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Belgrade",
		  "cities"=>"Belgrade, Novi Sad, Nis, Kragujevac, Uzice",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "SEY"=>array(
	    "country"=>"Seychelles",
	    "default_value"=>"Indian/Mahe",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Indian/Mahe",
		  "cities"=>"Port Victoria",
		  "zone"=>$zone_labels["ANET"]
		  )
	    ),
      "SLE"=>array(
	    "country"=>"Sierra Leone",
	    "default_value"=>"Africa/Freetown",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Freetown",
		  "cities"=>"Freetown",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "SIN"=>array(
	    "country"=>"Singapore",
	    "default_value"=>"Asia/Singapore",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Singapore",
		  "cities"=>"Singapore",
		  "zone"=>$zone_labels["ASAW"]
		  )
	    ),
      "SVK"=>array(
	    "country"=>"Slovakia",
	    "default_value"=>"Europe/Bratislava",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Bratislava",
		  "cities"=>"Bratislava",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "SLO"=>array(
	    "country"=>"Slovenia",
	    "default_value"=>"Europe/Ljubljana",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Ljubljana",
		  "cities"=>"Ljubljana",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "SOL"=>array(
	    "country"=>"Solomon Islands",
	    "default_value"=>"Pacific/Guadalcanal",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Guadalcanal",
		  "cities"=>"Honiara",
		  "zone"=>"SBT"
		  )
	    ),
      "SOM"=>array(
	    "country"=>"Somalia",
	    "default_value"=>"Africa/Mogadishu",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Mogadishu",
		  "cities"=>"Mogadishu",
		  "zone"=>$zone_labels["EAT"]
		  )
	    ),
      "RSA"=>array(
	    "country"=>"South Africa",
	    "default_value"=>"Africa/Johannesburg",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Johannesburg",
		  "cities"=>"Pretoria, Johannesburg, Cape Town, Bloemfontein",
		  "zone"=>$zone_labels["CAT"]
		  )
	    ),
      "SGS"=>array(
	    "country"=>"South Georgia",
	    "default_value"=>"Atlantic/South_Georgia",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Atlantic/South_Georgia",
		  "cities"=>"Grytviken",
		  "zone"=>"Eastern Atlantic Time"
		  )
	    ),
      "ESP"=>array(
	    "country"=>"Spain",
	    "default_value"=>"Europe/Madrid",
	    "max_tz"=>2,
	    0=>array(
		  "value"=>"Atlantic/Canary",
		  "cities"=>"Canary Islands (Las Palmas de Gran Canaria)",
		  "zone"=>$zone_labels["WET"]
		  ),
	    1=>array(
		  "value"=>"Europe/Madrid",
		  "cities"=>"Madrid, Ceuta (Africa)",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "SRI"=>array(
	    "country"=>"Sri Lanka",
	    "default_value"=>"Asia/Colombo",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Colombo",
		  "cities"=>"Colombo, Sri Jayawardenepura Kotte",
		  "zone"=>$zone_labels["IST"]
		  )
	    ),
      "SUD"=>array(
	    "country"=>"Sudan",
	    "default_value"=>"Africa/Khartoum",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Khartoum",
		  "cities"=>"Khartoum",
		  "zone"=>$zone_labels["EAT"]
		  )
	    ),
      "SUR"=>array(
	    "country"=>"Suriname",
	    "default_value"=>"America/Paramaribo",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Paramaribo",
		  "cities"=>"Paramaribo",
		  "zone"=>"SRT"
		  )
	    ),
      "SJM"=>array(
	    "country"=>"Svalbard",
	    "default_value"=>"Arctic/Longyearbyen",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Arctic/Longyearbyen",
		  "cities"=>"Longyearbyen",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "SWZ"=>array(
	    "country"=>"Swaziland",
	    "default_value"=>"Africa/Mbabane",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Mbabane",
		  "cities"=>"Mbabane",
		  "zone"=>$zone_labels["CAT"]
		  )
	    ),
      "SWE"=>array(
	    "country"=>"Sweden",
	    "default_value"=>"Europe/Stockholm",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Stockholm",
		  "cities"=>"Stockholm",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "SUI"=>array(
	    "country"=>"Switzerland",
	    "default_value"=>"Europe/Zurich",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Zurich",
		  "cities"=>"Bern, Zurich",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "SYR"=>array(
	    "country"=>"Syria",
	    "default_value"=>"Asia/Damascus",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Damascus",
		  "cities"=>"Damascus",
		  "zone"=>"Syria Time"
		  )
	    ),
      "TPE"=>array(
	    "country"=>"Taiwan",
	    "default_value"=>"Asia/Taipei",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Taipei",
		  "cities"=>"Taipei",
		  "zone"=>$zone_labels["CHIT"]
		  )
	    ),
      "TJK"=>array(
	    "country"=>"Tajikistan",
	    "default_value"=>"Asia/Dushanbe",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Dushanbe",
		  "cities"=>"Dushanbe",
		  "zone"=>"TJT"
		  )
	    ),
      "TAN"=>array(
	    "country"=>"Tanzania",
	    "default_value"=>"Africa/Dar_es_Salaam",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Dar_es_Salaam",
		  "cities"=>"Dodoma, Dar es Salaam",
		  "zone"=>$zone_labels["EAT"]
		  )
	    ),
      "THA"=>array(
	    "country"=>"Thailand",
	    "default_value"=>"Asia/Bangkok",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Bangkok",
		  "cities"=>"Bangkok",
		  "zone"=>$zone_labels["ASCW"]
		  )
	    ),
      "TLS"=>array(
	    "country"=>"Timor-Leste",
	    "default_value"=>"Asia/Dili",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Dili",
		  "cities"=>"Dili",
		  "zone"=>$zone_labels["JRKT"]
		  )
	    ),
      "TOG"=>array(
	    "country"=>"Togo",
	    "default_value"=>"Africa/Lome",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Lome",
		  "cities"=>"Lomé",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "TKL"=>array(
	    "country"=>"Tokelau Islands",
	    "default_value"=>"Pacific/Fakaofo",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Fakaofo",
		  "cities"=>"Fakaofo",
		  "zone"=>"TKT"
		  )
	    ),
      "TGA"=>array(
	    "country"=>"Tonga",
	    "default_value"=>"Pacific/Tongatapu",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Tongatapu",
		  "cities"=>"Tongatapu (Nuku'alofa)",
		  "zone"=>"TOT"
		  )
	    ),
      "TRI"=>array(
	    "country"=>"Trinidad & Tobago",
	    "default_value"=>"America/Port_of_Spain",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Port_of_Spain",
		  "cities"=>"Port-of-Spain",
		  "zone"=>$zone_labels["AST"]
		  )
	    ),
      "TUN"=>array(
	    "country"=>"Tunisia",
	    "default_value"=>"Africa/Tunis",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Tunis",
		  "cities"=>"Tunis",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "TUR"=>array(
	    "country"=>"Turkey",
	    "default_value"=>"Europe/Istanbul",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Istanbul",
		  "cities"=>"Ankara, Istanbul",
		  "zone"=>$zone_labels["EET"]
		  )
	    ),
      "TKM"=>array(
	    "country"=>"Turkmenistan",
	    "default_value"=>"Asia/Ashgabat",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Ashgabat",
		  "cities"=>"Ashgabat",
		  "zone"=>"TMT"
		  )
	    ),
      "TKS"=>array(
	    "country"=>"Turks and Caicos Islands",
	    "default_value"=>"America/Grand_Turk",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Grand_Turk",
		  "cities"=>"Cockburn Town, Kingston",
		  "zone"=>$zone_labels["EAST"]
		  )
	    ),
      "TUV"=>array(
	    "country"=>"Tuvalu",
	    "default_value"=>"Pacific/Funafuti",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Funafuti",
		  "cities"=>"Funafuti (Fongafale)",
		  "zone"=>"TVT"
		  )
	    ),
      "UGA"=>array(
	    "country"=>"Uganda",
	    "default_value"=>"Africa/Kampala",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Kampala",
		  "cities"=>"Kampala",
		  "zone"=>$zone_labels["EAT"]
		  )
	    ),
      "UKR"=>array(
	    "country"=>"Ukraine",
	    "default_value"=>"Europe/Kiev",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Kiev",
		  "cities"=>"Kiev, Uzhgorod, Zaporozhye, Simferopol",
		  "zone"=>$zone_labels["EET"]
		  )
	    ),
      "UAE"=>array(
	    "country"=>"United Arab Emirates",
	    "default_value"=>"Asia/Dubai",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Dubai",
		  "cities"=>"Abu Dhabi, Dubai",
		  "zone"=>$zone_labels["ANET"]
		  )
	    ),
      "GBR"=>array(
	    "country"=>"United Kingdom",
	    "default_value"=>"Europe/London",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/London",
		  "cities"=>"London, Cardiff, Belfast, Edinburg",
		  "zone"=>$zone_labels["WET"]
		  )
	    ),
      "USA"=>array(
	    "country"=>"United States",
	    "default_value"=>"America/New_York",
	    "max_tz"=>8,
	    0=>array(
		  "value"=>"America/Adak",
		  "cities"=>"Aleutian Islands/AK",
		  "zone"=>"Aleutian Time"
		  ),
	    1=>array(
		  "value"=>"Pacific/Honolulu",
		  "cities"=>"Honolulu/HI",
		  "zone"=>"Hawaii Time"
		  ),
	    2=>array(
		  "value"=>"America/Anchorage",
		  "cities"=>"AK (Anchorage, Nome, Juneau, Yakutat)",
		  "zone"=>"Alaska Time"
		  ),
	    3=>array(
		  "value"=>"America/Los_Angeles",
		  "cities"=>"Los Angeles/CA",
		  "zone"=>$zone_labels["PACT"]
		  ),
	    4=>array(
		  "value"=>"America/Denver",
		  "cities"=>"Denver/CO",
		  "zone"=>$zone_labels["MOUT"]
		  ),
	    5=>array(
		  "value"=>"America/Phoenix",
		  "cities"=>"Phoenix/AZ",
		  "zone"=>$zone_labels["MST"]
		  ),
	    6=>array(
		  "value"=>"America/Chicago",
		  "cities"=>"Chicago/IL",
		  "zone"=>$zone_labels["CENT"]
		  ),
	    7=>array(
		  "value"=>"America/New_York",
		  "cities"=>"New York/NY, Washington/DC",
		  "zone"=>$zone_labels["EAST"]
		  )
	    ),
      "URU"=>array(
	    "country"=>"Uruguay",
	    "default_value"=>"America/Montevideo",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Montevideo",
		  "cities"=>"Montevideo",
		  "zone"=>"Uruguay Time"
		  )
	    ),
      "UZB"=>array(
	    "country"=>"Uzbekistan",
	    "default_value"=>"Asia/Tashkent",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Tashkent",
		  "cities"=>"Tashkent, Samarkand",
		  "zone"=>"UZT"
		  )
	    ),
      "VAN"=>array(
	    "country"=>"Vanuatu",
	    "default_value"=>"Pacific/Efate",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Efate",
		  "cities"=>"Port Vila",
		  "zone"=>"VUT"
		  )
	    ),
      "VAT"=>array(
	    "country"=>"Vatican",
	    "default_value"=>"Europe/Vatican",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Europe/Vatican",
		  "cities"=>"Vatican City",
		  "zone"=>$zone_labels["CET"]
		  )
	    ),
      "VEN"=>array(
	    "country"=>"Venezuela",
	    "default_value"=>"America/Caracas",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Caracas",
		  "cities"=>"Caracas",
		  "zone"=>"Venezuela Time"
		  )
	    ),
      "VIE"=>array(
	    "country"=>"Vietnam",
	    "default_value"=>"Asia/Saigon",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Saigon",
		  "cities"=>"Hanoi, Saigon",
		  "zone"=>$zone_labels["ASCW"]
		  )
	    ),
      "IVB"=>array(
	    "country"=>"Virgin Islands (UK)",
	    "default_value"=>"America/Tortola",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/Tortola",
		  "cities"=>"Road Town",
		  "zone"=>$zone_labels["AST"]
		  )
	    ),
      "ISV"=>array(
	    "country"=>"Virgin Islands (US)",
	    "default_value"=>"America/St_Thomas",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"America/St_Thomas",
		  "cities"=>"Charlotte Amalie",
		  "zone"=>$zone_labels["AST"]
		  )
	    ),
      "WAF"=>array(
	    "country"=>"Wallis and Futuna Islands",
	    "default_value"=>"Pacific/Wallis",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Pacific/Wallis",
		  "cities"=>"Matâ'Utu",
		  "zone"=>"WFT"
		  )
	    ),
      "ESH"=>array(
	    "country"=>"Western Sahara",
	    "default_value"=>"Africa/El_Aaiun",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/El_Aaiun",
		  "cities"=>"El-Aaiún (Laayoune)",
		  "zone"=>$zone_labels["GMT"]
		  )
	    ),
      "YEM"=>array(
	    "country"=>"Yemen",
	    "default_value"=>"Asia/Aden",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Asia/Aden",
		  "cities"=>"Sana'a",
		  "zone"=>$zone_labels["ARAB"]
		  )
	    ),
      "ZAM"=>array(
	    "country"=>"Zambia",
	    "default_value"=>"Africa/Lusaka",
	    "max_tz"=>1,
	    0=>array(
		  "value"=>"Africa/Lusaka",
		  "cities"=>"Lusaka",
		  "zone"=>$zone_labels["CAT"]
		  )
	    ),
      "ZIM"=>array("country"=>"Zimbabwe","default_value"=>"Africa/Harare","max_tz"=>1,0=>array("value"=>"Africa/Harare","cities"=>"Harare","zone"=>$zone_labels["CAT"]))
      );
    $res = isset($ENV_TIMEZONES[$country_abbr]);
	if ($res && $mode == TZ_QUICK)
	  $res=$ENV_TIMEZONES[$country_abbr]["default_value"];
	elseif ($res && $mode == TZ_FULLINFO) {
	  $res = $ENV_TIMEZONES[$country_abbr];
	  for ($i=0; $i<$res["max_tz"]; $i++) {
	    $new_zone = $res[$i]["value"];
		date_default_timezone_set($new_zone);
		$dst = false; $gmt = false;
		$year = getdate(time()); $year = $year["year"];
		$new_date = strtotime("1 January " . $year);
		for ($j = 0; $j < 12; $j++) {
		  $new_date += $j * 2592000;
		  $date_DST = date("I", $new_date);
		  if (!$dst) {
		    if ($date_DST == 1) $dst = true;
			}
		  if (!$gmt) {
		    if ($date_DST == 0) {
			  $gmt = date("O", $new_date);
			  }
		    }
		  }
		$res[$i]["gmt_standard_time"] = substr($gmt, 0, 3) . ":" . substr($gmt, 3, 2);
		$res[$i]["uses_dst_rule"] = $dst;
	    }
	  }
	elseif ($mode == TZ_COUNTRIES) {
	  $res = array();
	  foreach ($ENV_TIMEZONES as $abbr=>$info) {
	    $res[$abbr] = $info["country"];
	    }
	  }
	date_default_timezone_set($bkp_zone);
	return $res;
    }
  
  //var_dump(get_timezone("KIR", TZ_COUNTRIES));
?>