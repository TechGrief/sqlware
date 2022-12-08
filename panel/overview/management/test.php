<?php
$bneriheygnbweohn = "";
for ($x = 0; $x <= 32; $x++) {
    echo('<script>console.log("attemp:'.$x.'->'.$bneriheygnbweohn."php/class.php".'")</script>');
    if(file_exists($bneriheygnbweohn. "php/class.php")){ require($bneriheygnbweohn. "php/class.php"); echo('<script>console.log("Class.php Found! ('.$bneriheygnbweohn. "php/class.php".')")</script>'); break; } 
    $bneriheygnbweohn .= "../";
}
beginHeadLoad();
defstyles();
//print_r(json_encode(getcountrycodes_class()));
//popup_box_select_generate2("testpopup", "TEST", "dashboard", "test", "get", '{"1":"Enabled","0":"Disabled"}', "0");
$o1 = popup_box_generate(null, "THE MOON", "The Moon is Earth's only natural satellite and the fifth largest moon in the solar system. The Moon's presence helps stabilize our planet's wobble and moderate our climate. The Moon's distance from Earth is about 240,000 miles (385,000km). The Moon has a very thin atmosphere called an exosphere.", "get", "alert", 0, "Save",0, "https://cdn.pixabay.com/photo/2015/09/22/15/28/banner-951877_960_720.jpg");
$o2 = popup_box_generate(null, "James Webb", "The James Webb Space Telescope is an ambitious scientific endeavor to answer these questions. Webb builds on the legacy of previous space-based telescopes to push the boundaries of human knowledge even further, to the formation of the first galaxies and the horizons of other worlds.", "get", "alert", 0, "Save", 0, "https://i.postimg.cc/MK4nkqHW/webb-telescope-hero-2200x880.jpg");

$p1 = new PopUp(title: "Profile Data", description: "Your Profile and Account Information", type: "input_1", img: "https://i.postimg.cc/RVq3YD8t/d4oo2gh-b8d494fb-774b-459f-9ae9-8126c719f6582.png");
$p1->addInput(new Input("username", "text", "Username", "Your Username"));
$p1->addInput(new Input("email", "email", "Mail", "Your Mail-Address"));
$p1->addInput(new Input("password", "password", "Password", "Use a save Password"));
$p1->addInput(new Input("country", "dropdown", "Country of residence ", "Your Country", json_encode(getcountrycodes_class()), ip_info(getclientip_class(), "countrycode")));
if($p1->generateCode()){
    echo $p1->getCode();
}

echo('
    <div style="position: absolute;
    top: 50%;
    left: 50%;
    width:360px;
    transform: translate(-50%, -50%);">

    <button '.on_click(popup_box_generate_show_script($o1)).' 
    style="width:360px;padding:13px 0 13px 0;background:#FF7F50; color:#FFFAF0; opacity:0.7; font-size:43px; font-weight: Bold; cursor:pointer; border-radius:15px; text-align:center;">
    '.$o1.'
    </button>
    <br>
    <br>
    <button '.on_click(popup_box_generate_show_script($o2)).' 
    style="width:360px;padding:13px 0 13px 0;background:indianred; color:#FFFAF0; opacity:0.7; font-size:43px; font-weight: Bold; cursor:pointer; border-radius:15px; text-align:center;">
    '.$o2.'
    </button>
    <br>
    <br>
    <button '.on_click($p1->script_js()).' 
    style="width:360px;padding:13px 0 13px 0;background:grey; color:#FFFAF0; opacity:0.7; font-size:43px; font-weight: Bold; cursor:pointer; border-radius:15px; text-align:center;">
    '.$p1->id.'
    </button>
    </div>'
);
//phpinfo();

?>
<style>
body{
    background:black;
    height:100%;
    width:100%;
    position: relative;
}
    </style>