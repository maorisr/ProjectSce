<?php

  $default_country = "ISR";
  
  include("timezones.php");
  $cou_list = get_timezone("", TZ_COUNTRIES);

  if (isset($_GET["cou"])) {
    $cou = strtoupper($_GET["cou"]);
	if (!isset($cou_list[$cou])) $cou = $default_country;
    }
  else $cou = $default_country;

  $select_code = '';
  foreach ($cou_list as $abbr => $cou_name) {
    $abbr == $cou ? $sel_add = ' selected' : $sel_add = '';
    $select_code .= '<option value="' . $abbr . '"' . $sel_add . '>' . $cou_name . '</option>';
    }

  $cinfo = get_timezone($cou, TZ_FULLINFO);
  
  $t = time();
  $zone_code = '';
  $odd = 0;
  $js = "var maxZone=" . $cinfo["max_tz"] . ";\nvar zoneInfo=new Array();\nvar phpTime=" . time() . "000;\n";
  for ($i = 0; $i < $cinfo["max_tz"]; $i++) {
    date_default_timezone_set($cinfo[$i]["value"]);
	$dst_image = 'b.gif'; $dst_alt = "Doesn't use DST rules";
	if ($cinfo[$i]["uses_dst_rule"]) {
	  $x = date("I", $t);
	  $dst_image = "dst$x.gif";
	  if ($x==1) {
	    if ($cou=='AUS' && $i==9) $dst_alt = "Active DST +00:30";
		else $dst_alt = "Active DST +01:00";
		}
	  else $dst_alt = "Inactive DST at the moment";
	  }
	$odd == 0 ? $col = '#ffffff' : $col = 'ffffcc';
	$day = date("l, F jS, Y", $t);
	$act_time = date("H", $t) . ':' . date("i", $t) . ':' . date("s", $t);
    $zone_code .= '<tr valign="middle" bgcolor="' . $col . '"><td align="center" title="' . $cinfo[$i]["zone"] . '">' . $cinfo[$i]["gmt_standard_time"] . '</td><td align="center" title="' . $dst_alt . '"><img src="img/' . $dst_image . '" width="15" height="15"></td><td title="$php_timezone=&quot;' . $cinfo[$i]["value"] . '&quot;;">' . $cinfo[$i]["cities"] . '</td><td id="timer' . $i . '" align="center" title="' .$day. '">' . $act_time . '</td></tr>';
	$odd++;
	if ($odd > 1) $odd = 0;
	$js .= "zoneInfo[$i]='" . date("d") . ";" . date("m") . ";" . date("Y") . ";" . date("H") . ";" . date("i") . ";" . date("s") . "';\n";
    }
  
  #UTC/GMT time
  date_default_timezone_set("UTC");
  $day = date("l, F jS, Y", $t);
  $act_time = date("H", $t) . ':' . date("i", $t) . ':' . date("s", $t);
  $js .= "zoneInfo[" . $cinfo["max_tz"] . "]='" . date("d") . ";" . date("m") . ";" . date("Y") . ";" . date("H") . ";" . date("i") . ";" . date("s") . "';\n";

?>
<html>
<head>
<title>TimeZones :: PHP OpenSource</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#f0f0f0" text="#000000" link="#0000FF" vlink="#0000FF" alink="#0000FF" leftmargin="20" topmargin="20" marginwidth="20" marginheight="20" onLoad="initT()">
<style type="text/css">
<!--
.cou {
  font-family: "courier new",verdana,tahoma,arial;
  font-size:12px;
  color: #000000;
  background-color: #ffdd15;
  border: solid 1px #000000;
  width: 500px;
  padding: 2px;
  }
td#tx1 {
  font-family: verdana;
  font-size:12px;
  color: #000000;
  }
.chead {
  border: solid 1px #000000;
  font-family: verdana,tahoma,arial;
  color: #000000;
}
table#zones {
  font-family: verdana;
  font-size:12px;
  color: #000000;
  border: solid 1px #494949;
}
-->
</style>
<table width="526" border="0" cellpadding="15" cellspacing="0" bgcolor="#FF9900" style="border:solid 1px #000000">
  <tr>
    <td style="font-family:verdana"><span style="font-size:18px">WORLD CLOCK</span><br>
  </tr>
</table><form name="couchange" method="get" action="">
  <table border="0" cellpadding="10" cellspacing="0" bgcolor="#f5f5f5" style="border:solid 1px #999999">
    <tr>
      <td><table width="500" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td id="tx1">Select country:</td>
          </tr>
          <tr> 
            <td><select name="cou" id="cou" class="cou" onChange="couchange.submit()">
                <?php echo $select_code; ?></select></td>
          </tr>
          <tr> 
            <td><img src="img/b.gif" width="1" height="5"></td>
          </tr>
          <tr> 
            <td><table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#CCCCCC" style="border:solid 1px #000000">
                <tr> 
                  <td><table width="100%" border="0" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF" class="chead">
                      <tr> 
                        <td width="42" height="33" align="center" valign="middle"><img src="img/f/<?php echo strtolower($cou); ?>.png" width="32" height="32"></td>
                        <td style="font-size:18px"><?php echo $cinfo["country"]; ?></td>
                        <td style="font-size:12px;color:#0000cc" width="50" align="center" title="International Olympic Committee (IOC) code of <?php echo $cinfo["country"]; ?>">[<?php echo $cou; ?>]</td>
                      </tr>
                    </table></td>
                </tr>
                <tr> 
                  <td><table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#494949" id="zones">
                      <tr bgcolor="#FFCC66"> 
                        <td width="50" align="center" nowrap>GMT/UTC</td>
                        <td width="15">DST</td>
                        <td nowrap>Cities/Regions/Provinces/States</td>
                        <td align="center">Time</td>
                      </tr>
                      <?php echo $zone_code; ?> </table><p align="center" style="font-family:tahoma;font-size:11px;color:#494949">note: move mouse pointer over fields in zone-table to see more info.</p></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </table></form>
<script language="JavaScript">
<!--
<?php echo $js; ?>

function initT() {
  setTimeout("showTimers()", 1000);
  }

function showTimers() {
  d = new Date();
  delta = Math.round((d.getTime() - phpTime) / 1000);
  tnDay = Math.floor(delta/86400);
  delta = delta - (tnDay * 86400);
  tnHour = Math.floor(delta/3600);
  delta = delta - (tnHour * 3600);
  tnMin = Math.floor(delta/60);
  delta = delta - (tnMin * 60);
  tnSec = delta;
  for (i=0; i<=maxZone; i++) {
    x = ' ('+delta+')';
    dateParts = zoneInfo[i].split(';');
	tzDay = parseInt(dateParts[0]);
	tzMonth = parseInt(dateParts[1]);
	tzYear = parseInt(dateParts[2]);

	tzHour = dateParts[3]; if (tzHour[0]=='0') tzHour = parseInt(tzHour[1]); else tzHour = parseInt(tzHour);
	tzMin = dateParts[4]; if (tzMin[0]=='0') tzMin = parseInt(tzMin[1]); else tzMin = parseInt(tzMin);
	tzSec = dateParts[5]; if (tzSec[0]=='0') tzSec = parseInt(tzSec[1]); else tzSec = parseInt(tzSec);

	tzSec += tnSec;
	if (tzSec>=60) {
	  tzSec -= 60;
	  tzMin++;
	  }
	tzMin += tnMin;
	if (tzMin>=60) {
	  tzMin -= 60;
	  tzHour++;
	  }
	
	tzHour += tnHour;
	tzHour -= (Math.floor(tzHour/24) * 24);
	if (tzHour<10) tzHour = '0'+tzHour;
	if (tzMin<10) tzMin = '0'+tzMin;
	if (tzSec<10) tzSec = '0'+tzSec;
	document.getElementById('timer'+i).innerHTML = tzHour+':'+tzMin+':'+tzSec;
    }
  
  setTimeout("showTimers()", 1000);
  }

-->
</script>
</body>
</html>
