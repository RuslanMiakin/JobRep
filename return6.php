
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
   
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto+Slab');
        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            background-color: #535353;
            color: #fff;
        }

        .container {
            font-family: 'Roboto Slab', serif;
            width: 90%;
            margin: 15px auto;
        }
        .table-head {
            text-align: center;
            font-size: 2em;
        }
        .container>table {
            width: 100%;
            font-size: 1em;
            border-collapse: collapse;
        }

        td {
            border: 2px solid #fff;
            padding: 4px;
        }

    </style>

</head>


<body>
    <?php set_time_limit(800); echo ini_get('max_execution_time');
    
date_default_timezone_set('Europe/Moscow');
/* Класс для создания обектов по менеджерам с необходимыми полями */
class managerOrders {
    var $managerId;
    var $vertikalki;
    var $meat;
    var $other;
    var $weekmoneyMeat;
    var $weekmoneyVertikalki;
    var $weekmoneyCleaners;
    var $weekmoneyMicrowaves;
    var $weekmoneyBlenders;
    var $weekmoneyTea;
    var $weekmoneyPlanetarymixer;
    var $weekmoneyGrill;
    var $weekmoneyJuicer;
    var $weekmoneyOther;
    var $weekmoneycoffee;
    var $totalOrdersPerWeekMeat;
    var $totalOrdersPerWeekVertikalki;
    var $totalOrdersPerWeekCleaners;
    var $totalOrdersPerWeekMicrowaves;
    var $totalOrdersPerWeekBlenders;
    var $totalOrdersPerWeekTea;
    var $totalOrdersPerWeekPlanetarymixer;
    var $totalOrdersPerWeekGrill;
    var $totalOrdersPerWeekJuicer;
    var $totalOrdersPerWeekOther;
    var $totalOrdersPerWeekcoffee;
    var $successfulOrdersPerWeekMeat;
    var $successfulOrdersPerWeekVertikalki;
    var $successfulOrdersPerWeekCleaners;
    var $successfulOrdersPerWeekMicrowaves;
    var $successfulOrdersPerWeekBlenders;
    var $successfulOrdersPerWeekTea;
    var $successfulOrdersPerWeekPlanetarymixer;
    var $successfulOrdersPerWeekGrill;
    var $successfulOrdersPerWeekJuicer;
    var $successfulOrdersPerWeekOther;
    var $successfulOrdersPerWeekcoffee;
    var $celevoi;
    var $celevoimeat;
    var $celevoivert;
    var $celevoiclean;
    var $celevoimicro;
    var $celevoiblender;
    var $celevoitea;
    var $celevoipm;
    var $celevoigrill;
    var $celevoijuicer;
    var $celevoiother;
    var $celevoicoffee;
}

$today = date("Y-m-d");
$startday = date("Y-m-01");
// $date = date("M-d-Y", mktime(0, 0, 0, date('m'), date('d') - 1, date('Y')));


$dateStart = date(htmlspecialchars($_POST['actual_date3']));
$dateEnd = date(htmlspecialchars($_POST['actual_date4']));

$namegroup1 = htmlspecialchars($_POST['namegroup1']);
$namegroup2 = htmlspecialchars($_POST['namegroup2']);
$namegroup3 = htmlspecialchars($_POST['namegroup3']);
$namegroup4 = htmlspecialchars($_POST['namegroup4']);
$namegroup5 = htmlspecialchars($_POST['namegroup5']);
$namegroup6 = htmlspecialchars($_POST['namegroup6']);
$namegroup7 = htmlspecialchars($_POST['namegroup7']);
$namegroup8 = htmlspecialchars($_POST['namegroup8']);
$namegroup9 = htmlspecialchars($_POST['namegroup9']);
$namegroup11 = htmlspecialchars($_POST['namegroup11']);
$namegroup22 = htmlspecialchars($_POST['namegroup22']);
$namegroup33 = htmlspecialchars($_POST['namegroup33']);
$namegroup44 = htmlspecialchars($_POST['namegroup44']);
$namegroup55 = htmlspecialchars($_POST['namegroup55']);

$ng1 = ""; $ng2 = ""; $ng3 = ""; $ng4 =""; $ng5 = ""; $ng6 = ""; $ng7 = ""; $ng8 = ""; $ng9 = ""; $ng10 = ""; $ng11 = "";

function IsChecked($chkname,$value)
    {
        if(!empty($chkname))
        {
                if($chkname == $value)
                {
                    return true;
                }
            }
        return false;
    }
    
    
if(IsChecked($namegroup1,'b1')){
$ng1 = "meatgrinder";}
if(IsChecked($namegroup2,'b2')){
$ng2 = "vert_cleaner";}
if(IsChecked($namegroup3,'b3')){
$ng3 = "cleaners";}
if(IsChecked($namegroup4,'b4')){
$ng4 = "microwaves";}
if(IsChecked($namegroup5,'b5')){
$ng5 = "blenders";}
if(IsChecked($namegroup6,'b6')){
$ng6 = "tea";}
if(IsChecked($namegroup7,'b7')){
$ng7 = "planetary_mixer";}
if(IsChecked($namegroup8,'b8')){
$ng8 = "grill";}
if(IsChecked($namegroup9,'b9')){
$ng9 = "juicer";}
if(IsChecked($namegroup11,'b11')){
$ng11 = "daukenstore";}
if(IsChecked($namegroup22,'b22')){
$ng11 = "blender-su";}
if(IsChecked($namegroup33,'b33')){
$ng11 = "tehnoking";}
if(IsChecked($namegroup44,'b44')){
$ng11 = "voxmax";}
if(IsChecked($namegroup55,'b55')){
$ng11 = "rauberg";}




$sortId = 0;

$params = array(
    'by' => 'id',
    'apiKey' => $crmKey,
);

$requestOrders = json_decode(
    file_get_contents($crmDomain . '/api/v4/orders?' .'filter[createdAtFrom]'.'='.$dateStart. '&' .'filter[createdAtTo]='.$dateEnd.'?'. http_build_query($params)),
    true
);

if (isset($requestOrders)) {
    /* создаем два объекта класса managerOrders */
   
    $maria = new managerOrders;
    $ivan = new managerOrders;
    $ksu = new managerOrders;
    
    $maria->managerId = 34;
    $maria->meat = 0;
    $maria->vertikalki = 0;
    $maria->other = 0;
    $maria->money = 0;
    $maria->weekmoneyMeat = 0;
    $maria->weekmoneyVertikalki = 0;
    $maria->weekmoneyOther = 0;
    $maria->weekmoneycoffee = 0;
    $maria->totalOrdersPerWeekMeat = 0;
    $maria->totalOrdersPerWeekVertikalki = 0;
    $maria->totalOrdersPerWeekOther = 0;
     $maria->totalOrdersPerWeekcoffee = 0;
    $maria->successfulOrdersPerWeekMeat = 0;
    $maria->successfulOrdersPerWeekVertikalki = 0;
    $maria->successfulOrdersPerWeekOther = 0;
    $maria->successfulOrdersPerWeekcoffee = 0;
    $maria->weekmoneyCleaners = 0;
    $maria->weekmoneyMicrowaves = 0;
    $maria->weekmoneyBlenders = 0;
    $maria->weekmoneyTea = 0;
    $maria->weekmoneyPlanetarymixer = 0;
    $maria->weekmoneyGrill = 0;
    $maria->weekmoneyJuicer = 0;
    $maria->weekmoneyOther = 0;
    $maria->weekmoneycoffee = 0;
    $maria->totalOrdersPerWeekMeat = 0;
    $maria->totalOrdersPerWeekVertikalki = 0;
    $maria->totalOrdersPerWeekCleaners = 0;
    $maria->totalOrdersPerWeekMicrowaves = 0;
    $maria->totalOrdersPerWeekBlenders = 0;
    $maria->totalOrdersPerWeekTea = 0;
    $maria->totalOrdersPerWeekPlanetarymixer = 0;
    $maria->totalOrdersPerWeekGrill = 0;
    $maria->totalOrdersPerWeekJuicer = 0;
    $maria->totalOrdersPerWeekOther = 0;
    $maria->totalOrdersPerWeekcoffee = 0;
    $maria->successfulOrdersPerWeekCleaners = 0;
    $maria->successfulOrdersPerWeekMicrowaves = 0;
    $maria->successfulOrdersPerWeekBlenders = 0;
    $maria->successfulOrdersPerWeekTea = 0;
    $maria->successfulOrdersPerWeekPlanetarymixer = 0;
    $maria->successfulOrdersPerWeekGrill = 0;
    $maria->successfulOrdersPerWeekJuicer = 0;
    $maria->successfulOrdersPerWeekcoffee = 0;
    $maria->celevoi = 0;
    $maria->celevoimeat = 0;
    $maria->celevoivert = 0;
    $maria->celevoiclean = 0;
    $maria->celevoimicro = 0;
    $maria->celevoiblender = 0;
    $maria->celevoitea = 0;
    $maria->celevoipm = 0;
    $maria->celevoigrill = 0;
    $maria->celevoijuicer = 0;
    $maria->celevoiother = 0;
    $maria->celevoicoffee = 0;

    
    $ivan->managerId = 22;
    $ivan->meat = 0;
    $ivan->vertikalki = 0;
    $ivan->other = 0;
    $ivan->money = 0;
    $ivan->weekmoneyMeat = 0;
    $ivan->weekmoneyVertikalki = 0;
    $ivan->weekmoneyOther = 0;
    $ivan->weekmoneycoffee = 0;
    $ivan->totalOrdersPerWeekMeat = 0;
    $ivan->totalOrdersPerWeekVertikalki = 0;
    $ivan->totalOrdersPerWeekOther = 0;
    $ivan->successfulOrdersPerWeekMeat = 0;
    $ivan->successfulOrdersPerWeekVertikalki = 0;
    $ivan->successfulOrdersPerWeekOther = 0;
    $ivan->successfulOrdersPerWeekcoffee = 0;
    $ivan->weekmoneyCleaners = 0;
    $ivan->weekmoneyMicrowaves = 0;
    $ivan->weekmoneyBlenders = 0;
    $ivan->weekmoneyTea = 0;
    $ivan->weekmoneyPlanetarymixer = 0;
    $ivan->weekmoneyGrill = 0;
    $ivan->weekmoneyJuicer = 0;
    $ivan->weekmoneyOther = 0;
    $ivan->weekmoneycoffee = 0;
    $ivan->totalOrdersPerWeekMeat = 0;
    $ivan->totalOrdersPerWeekVertikalki = 0;
    $ivan->totalOrdersPerWeekCleaners = 0;
    $ivan->totalOrdersPerWeekMicrowaves = 0;
    $ivan->totalOrdersPerWeekBlenders = 0;
    $ivan->totalOrdersPerWeekTea = 0;
    $ivan->totalOrdersPerWeekPlanetarymixer = 0;
    $ivan->totalOrdersPerWeekGrill = 0;
    $ivan->totalOrdersPerWeekJuicer = 0;
    $ivan->totalOrdersPerWeekOther = 0;
    $ivan->totalOrdersPerWeekcoffee = 0;
    $ivan->successfulOrdersPerWeekCleaners = 0;
    $ivan->successfulOrdersPerWeekMicrowaves = 0;
    $ivan->successfulOrdersPerWeekBlenders = 0;
    $ivan->successfulOrdersPerWeekTea = 0;
    $ivan->successfulOrdersPerWeekPlanetarymixer = 0;
    $ivan->successfulOrdersPerWeekGrill = 0;
    $ivan->successfulOrdersPerWeekJuicer = 0;
    $ivan->successfulOrdersPerWeekcoffee = 0;
    $ivan->celevoi = 0;
    $ivan->celevoimeat = 0;
    $ivan->celevoivert = 0;
    $ivan->celevoiclean = 0;
    $ivan->celevoimicro = 0;
    $ivan->celevoiblender = 0;
    $ivan->celevoitea = 0;
    $ivan->celevoipm = 0;
    $ivan->celevoigrill = 0;
    $ivan->celevoijuicer = 0;
    $ivan->celevoiother = 0;
    $ivan->celevoicoffee = 0;
    
    $ksu->managerId = 11;
    $ksu->meat = 0;
    $ksu->vertikalki = 0;
    $ksu->other = 0;
    $ksu->money = 0;
    $ksu->weekmoneyMeat = 0;
    $ksu->weekmoneyVertikalki = 0;
    $ksu->weekmoneyOther = 0;
    $ksu->totalOrdersPerWeekMeat = 0;
    $ksu->totalOrdersPerWeekVertikalki = 0;
    $ksu->totalOrdersPerWeekOther = 0;
    $ksu->successfulOrdersPerWeekMeat = 0;
    $ksu->successfulOrdersPerWeekVertikalki = 0;
    $ksu->successfulOrdersPerWeekOther = 0;
    $ksu->successfulOrdersPerWeekcoffee = 0;
    $ksu->weekmoneyCleaners = 0;
    $ksu->weekmoneyMicrowaves = 0;
    $ksu->weekmoneyBlenders = 0;
    $ksu->weekmoneyTea = 0;
    $ksu->weekmoneyPlanetarymixer = 0;
    $ksu->weekmoneyGrill = 0;
    $ksu->weekmoneyJuicer = 0;
    $ksu->weekmoneyOther = 0;
    $ksu->weekmoneycoffee = 0;
    $ksu->totalOrdersPerWeekMeat = 0;
    $ksu->totalOrdersPerWeekVertikalki = 0;
    $ksu->totalOrdersPerWeekCleaners = 0;
    $ksu->totalOrdersPerWeekMicrowaves = 0;
    $ksu->totalOrdersPerWeekBlenders = 0;
    $ksu->totalOrdersPerWeekTea = 0;
    $ksu->totalOrdersPerWeekPlanetarymixer = 0;
    $ksu->totalOrdersPerWeekGrill = 0;
    $ksu->totalOrdersPerWeekJuicer = 0;
    $ksu->totalOrdersPerWeekOther = 0;
    $ksu->totalOrdersPerWeekcoffee = 0;
    $ksu->successfulOrdersPerWeekCleaners = 0;
    $ksu->successfulOrdersPerWeekMicrowaves = 0;
    $ksu->successfulOrdersPerWeekBlenders = 0;
    $ksu->successfulOrdersPerWeekTea = 0;
    $ksu->successfulOrdersPerWeekPlanetarymixer = 0;
    $ksu->successfulOrdersPerWeekGrill = 0;
    $ksu->successfulOrdersPerWeekJuicer = 0;
    $ksu->successfulOrdersPerWeekcoffee = 0;
    $ksu->celevoi = 0;
    $ksu->celevoimeat = 0;
    $ksu->celevoivert = 0;
    $ksu->celevoiclean = 0;
    $ksu->celevoimicro = 0;
    $ksu->celevoiblender = 0;
    $ksu->celevoitea = 0;
    $ksu->celevoipm = 0;
    $ksu->celevoigrill = 0;
    $ksu->celevoijuicer = 0;
    $ksu->celevoiother = 0;
    $ksu->celevoicoffee = 0;
    
}
   
    $sortId = $requestOrders['orders'][0]['id'];

    $actual = true;
    while ($actual) {
        
        /* промежуточный запрос. запрашиваем последнего созданного клиента */
        $tempRequest = json_decode( file_get_contents($crmDomain . '/api/v5/orders/' . $sortId . '?' . http_build_query($params)),true);
		
		while(!isset($tempRequest['order']['managerId'])){
		$sortId--;
		$tempRequest = json_decode( file_get_contents($crmDomain . '/api/v5/orders/' . $sortId . '?' . http_build_query($params)),true);
		}
		
        if ((((substr($tempRequest['order']['createdAt'], 0, 10))) >= $dateStart) && ((substr($tempRequest['order']['createdAt'], 0, 10))) <= $dateEnd) {
            /* если дата подходящая, то проверяем статус заказа и исключаем целевые */
            if ( ( ($tempRequest['order']['status'] == 'new-orders') || 
                ($tempRequest['order']['status'] == 'complete')  || 
                ($tempRequest['order']['status'] == 'send-to-delivery') || 
                ($tempRequest['order']['status'] == 'soglac-klient') || 
                ($tempRequest['order']['status'] == 'delivery-dost') ||
                ($tempRequest['order']['status'] == 'no-call') || 
                ($tempRequest['order']['status'] == 'delivering') || 
                ($tempRequest['order']['status'] == 'soglas-manager') || 
                ($tempRequest['order']['status'] == 'in-processing-to-call') || 
                ($tempRequest['order']['status'] == 'other-reason') || 
                ($tempRequest['order']['status'] == 'required-products') || 
                ($tempRequest['order']['status'] == 'nado-otkazat') || 
                ($tempRequest['order']['status'] == 'otkazano') || 
                ($tempRequest['order']['status'] == 'exchenge-done') ||
                ($tempRequest['order']['status'] == 'return-done') || 
                ($tempRequest['order']['status'] == 'trash') || 
                ($tempRequest['order']['status'] == 'predzakaz') || 
                ($tempRequest['order']['status'] == 'cancel-before-receive') || 
                ($tempRequest['order']['status'] == 'cancel-when-receive') )) {
                
                /* если заказ в нужном статусе то увеличиваем у нужного менеджера общее количество лидов на 1 */
                 if(!isset(($tempRequest['order']['managerId']))){}else{
                    switch ($tempRequest['order']['managerId']) {
                        case 34:
                            if($tempRequest['order']['customFields']['vector_z'] == "meatgrinder"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$maria->totalOrdersPerWeekMeat++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $maria->successfulOrdersPerWeekMeat++;
                                    $maria->weekmoneyMeat += $tempRequest['order']['summ'];
                                }}}
                                 if($tempRequest['order']['customFields']['vector_z'] == "vert_cleaner"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$maria->totalOrdersPerWeekVertikalki++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $maria->successfulOrdersPerWeekVertikalki++;
                                    $maria->weekmoneyVertikalki += $tempRequest['order']['summ'];
                                }}}
                                 if($tempRequest['order']['customFields']['vector_z'] == "cleaners"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$maria->totalOrdersPerWeekCleaners++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $maria->successfulOrdersPerWeekCleaners++;
                                    $maria->weekmoneyCleaners += $tempRequest['order']['summ'];
                                }}}
                                 if($tempRequest['order']['customFields']['vector_z'] == "microwaves"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$maria->totalOrdersPerWeekMicrowaves++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $maria->successfulOrdersPerWeekMicrowaves++;
                                    $maria->weekmoneyMicrowaves += $tempRequest['order']['summ'];
                                }}}
                                 if($tempRequest['order']['customFields']['vector_z'] == "blenders"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$maria->totalOrdersPerWeekBlenders++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $maria->successfulOrdersPerWeekBlenders++;
                                    $maria->weekmoneyBlenders += $tempRequest['order']['summ'];
                                }}}
                                 if($tempRequest['order']['customFields']['vector_z'] == "tea"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$maria->totalOrdersPerWeekTea++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $maria->successfulOrdersPerWeekTea++;
                                    $maria->weekmoneyTea += $tempRequest['order']['summ'];
                                }}}
                                if($tempRequest['order']['customFields']['vector_z'] == "planetary_mixer"){
                                if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$maria->totalOrdersPerWeekPlanetarymixer++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $maria->successfulOrdersPerWeekPlanetarymixer++;
                                    $maria->weekmoneyPlanetarymixer += $tempRequest['order']['summ'];
                                }}}
                                 if($tempRequest['order']['customFields']['vector_z'] == "grill"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$maria->totalOrdersPerWeekGrill++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $maria->successfulOrdersPerWeekGrill++;
                                    $maria->weekmoneyGrill += $tempRequest['order']['summ'];
                                }}}
                                  if($tempRequest['order']['customFields']['vector_z'] == "juicer"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$maria->totalOrdersPerWeekJuicer++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $maria->successfulOrdersPerWeekJuicer++;
                                    $maria->weekmoneyJuicer += $tempRequest['order']['summ'];
                                }}}
                                if($tempRequest['order']['customFields']['vector_z'] == "unknown"){
                                if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$maria->totalOrdersPerWeekOther++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $maria->successfulOrdersPerWeekOther++;
                                    $maria->weekmoneyOther += $tempRequest['order']['summ'];
                                }}}
                                
                                if($tempRequest['order']['customFields']['vector_z'] == "coffee"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$maria->totalOrdersPerWeekcoffee++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $maria->successfulOrdersPerWeekcoffee++;
                                    $maria->weekmoneycoffee += $tempRequest['order']['summ'];
                                }}}
                                
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] == true))  {
                                	$maria->celevoi++;
                                    if ($tempRequest['order']['customFields']['vector_z'] == "meatgrinder"){$maria->celevoimeat++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "vert_cleaner"){$maria->celevoivert++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "cleaners"){$maria->celevoiclean++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "microwaves"){$maria->celevoimicro++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "blenders"){$maria->celevoiblender++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "tea"){$maria->celevoitea++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "planetary_mixer"){$maria->celevoipm++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "grill"){$maria->celevoigrill++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "juicer"){$maria->celevoijuicer++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "unknown"){$maria->celevoiother++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "coffee"){$maria->celevoicoffee++;}
                                    }
                                
                            break;
                        case 22:
                           if($tempRequest['order']['customFields']['vector_z'] == "meatgrinder"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ivan->totalOrdersPerWeekMeat++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ivan->successfulOrdersPerWeekMeat++;
                                    $ivan->weekmoneyMeat += $tempRequest['order']['summ'];
                                }}}
                                if($tempRequest['order']['customFields']['vector_z'] == "vert_cleaner"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ivan->totalOrdersPerWeekVertikalki++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ivan->successfulOrdersPerWeekVertikalki++;
                                    $ivan->weekmoneyVertikalki += $tempRequest['order']['summ'];
                                }}}
                                if($tempRequest['order']['customFields']['vector_z'] == "cleaners"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ivan->totalOrdersPerWeekCleaners++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ivan->successfulOrdersPerWeekCleaners++;
                                    $ivan->weekmoneyCleaners += $tempRequest['order']['summ'];
                                }}}
                                if($tempRequest['order']['customFields']['vector_z'] == "microwaves"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ivan->totalOrdersPerWeekMicrowaves++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ivan->successfulOrdersPerWeekMicrowaves++;
                                    $ivan->weekmoneyMicrowaves += $tempRequest['order']['summ'];
                                }}}
                                if($tempRequest['order']['customFields']['vector_z'] == "blenders"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ivan->totalOrdersPerWeekBlenders++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ivan->successfulOrdersPerWeekBlenders++;
                                    $ivan->weekmoneyBlenders += $tempRequest['order']['summ'];
                                }}}
                                if($tempRequest['order']['customFields']['vector_z'] == "tea"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ivan->totalOrdersPerWeekTea++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ivan->successfulOrdersPerWeekTea++;
                                    $ivan->weekmoneyTea += $tempRequest['order']['summ'];
                                }}}
                                if($tempRequest['order']['customFields']['vector_z'] == "planetary_mixer"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ivan->totalOrdersPerWeekPlanetarymixer++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ivan->successfulOrdersPerWeekPlanetarymixer++;
                                    $ivan->weekmoneyPlanetarymixer += $tempRequest['order']['summ'];
                                }}}
                                if($tempRequest['order']['customFields']['vector_z'] == "grill"){
                                if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ivan->totalOrdersPerWeekGrill++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ivan->successfulOrdersPerWeekGrill++;
                                    $ivan->weekmoneyGrill += $tempRequest['order']['summ'];
                                }}}
                                if($tempRequest['order']['customFields']['vector_z'] == "juicer"){
                                if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ivan->totalOrdersPerWeekJuicer++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ivan->successfulOrdersPerWeekJuicer++;
                                    $ivan->weekmoneyJuicer += $tempRequest['order']['summ'];
                                }}}
                                if($tempRequest['order']['customFields']['vector_z'] == "unknown"){
                                if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ivan->totalOrdersPerWeekOther++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ivan->successfulOrdersPerWeekOther++;
                                    $ivan->weekmoneyOther += $tempRequest['order']['summ'];
                                }}}
                                
                                 if($tempRequest['order']['customFields']['vector_z'] == "coffee"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ivan->totalOrdersPerWeekcoffee++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ivan->successfulOrdersPerWeekcoffee++;
                                    $ivan->weekmoneycoffee += $tempRequest['order']['summ'];
                                }}}
                                
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] == true))  {
                                	$ivan->celevoi++;
                                if ($tempRequest['order']['customFields']['vector_z'] == "meatgrinder"){$ivan->celevoimeat++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "vert_cleaner"){$ivan->celevoivert++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "cleaners"){$ivan->celevoiclean++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "microwaves"){$ivan->celevoimicro++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "blenders"){$ivan->celevoiblender++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "tea"){$ivan->celevoitea++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "planetary_mixer"){$maria->celevoipm++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "grill"){$ivan->celevoigrill++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "juicer"){$ivan->celevoijuicer++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "unknown"){$ivan->celevoiother++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "coffee"){$ivan->celevoicoffee++;}
                                    }
                                
                            break;
                            case 11:
                            if($tempRequest['order']['customFields']['vector_z'] == "meatgrinder"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ksu->totalOrdersPerWeekMeat++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ksu->successfulOrdersPerWeekMeat++;
                                    $ksu->weekmoneyMeat += $tempRequest['order']['summ'];
                                }}}
                                 if($tempRequest['order']['customFields']['vector_z'] == "vert_cleaner"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ksu->totalOrdersPerWeekVertikalki++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ksu->successfulOrdersPerWeekVertikalki++;
                                    $ksu->weekmoneyVertikalki += $tempRequest['order']['summ'];
                                }}}
                                 if($tempRequest['order']['customFields']['vector_z'] == "cleaners"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ksu->totalOrdersPerWeekCleaners++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ksu->successfulOrdersPerWeekCleaners++;
                                    $ksu->weekmoneyCleaners += $tempRequest['order']['summ'];
                                }}}
                                 if($tempRequest['order']['customFields']['vector_z'] == "microwaves"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ksu->totalOrdersPerWeekMicrowaves++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ksu->successfulOrdersPerWeekMicrowaves++;
                                    $ksu->weekmoneyMicrowaves += $tempRequest['order']['summ'];
                                }}}
                                 if($tempRequest['order']['customFields']['vector_z'] == "blenders"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ksu->totalOrdersPerWeekBlenders++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ksu->successfulOrdersPerWeekBlenders++;
                                    $ksu->weekmoneyBlenders += $tempRequest['order']['summ'];
                                }}}
                                 if($tempRequest['order']['customFields']['vector_z'] == "tea"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ksu->totalOrdersPerWeekTea++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ksu->successfulOrdersPerWeekTea++;
                                    $ksu->weekmoneyTea += $tempRequest['order']['summ'];
                                }}}
                                if($tempRequest['order']['customFields']['vector_z'] == "planetary_mixer"){
                                if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ksu->totalOrdersPerWeekPlanetarymixer++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ksu->successfulOrdersPerWeekPlanetarymixer++;
                                    $ksu->weekmoneyPlanetarymixer += $tempRequest['order']['summ'];
                                }}}
                                 if($tempRequest['order']['customFields']['vector_z'] == "grill"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ksu->totalOrdersPerWeekGrill++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ksu->successfulOrdersPerWeekGrill++;
                                    $ksu->weekmoneyGrill += $tempRequest['order']['summ'];
                                }}}
                                  if($tempRequest['order']['customFields']['vector_z'] == "juicer"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ksu->totalOrdersPerWeekJuicer++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ksu->successfulOrdersPerWeekJuicer++;
                                    $ksu->weekmoneyJuicer += $tempRequest['order']['summ'];
                                }}}
                                if($tempRequest['order']['customFields']['vector_z'] == "unknown"){
                                if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ksu->totalOrdersPerWeekOther++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ksu->successfulOrdersPerWeekOther++;
                                    $ksu->weekmoneyOther += $tempRequest['order']['summ'];
                                }}}
                                
                                if($tempRequest['order']['customFields']['vector_z'] == "coffee"){
                            if ((substr($tempRequest['order']['createdAt'], 0, 10))) {
                                if ($tempRequest['order']['customFields']['typeorder'] != true){$ksu->totalOrdersPerWeekcoffee++;}
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] != true))  {
                                    $ksu->successfulOrdersPerWeekcoffee++;
                                    $ksu->weekmoneycoffee += $tempRequest['order']['summ'];
                                }}}
                                
                                if ((($tempRequest['order']['status'] == 'new-orders') || 
                                    ($tempRequest['order']['status'] == 'delivering') || 
                                    ($tempRequest['order']['status'] == 'delivery-dost') || 
                                    ($tempRequest['order']['status'] == 'half-delivery') ||
                                    ($tempRequest['order']['status'] == 'send-to-delivery') ||
                                    ($tempRequest['order']['status'] == 'complete')) 
                                    && ($tempRequest['order']['customFields']['typeorder'] == true))  {
                                	$ksu->celevoi++;
                                 if ($tempRequest['order']['customFields']['vector_z'] == "meatgrinder"){$ksu->celevoimeat++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "vert_cleaner"){$ksu->celevoivert++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "cleaners"){$ksu->celevoiclean++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "microwaves"){$ksu->celevoimicro++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "blenders"){$ksu->celevoiblender++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "tea"){$ksu->celevoitea++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "planetary_mixer"){$ksu->celevoipm++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "grill"){$ksu->celevoigrill++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "juicer"){$ksu->celevoijuicer++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "unknown"){$ksu->celevoiother++;}
                                    if ($tempRequest['order']['customFields']['vector_z'] == "coffee"){$ksu->celevoicoffee++;}
                                    }
                                
                            break;
                    }}   
                
            };
        
        $sortId--;
        } else {
            $sortId--;
                $tempRequest = json_decode( file_get_contents($crmDomain . '/api/v5/orders/' . $sortId . '?' . http_build_query($params)),true);
                 if ((((substr($tempRequest['order']['createdAt'], 0, 10))) >= $dateStart) && ((substr($tempRequest['order']['createdAt'], 0, 10))) <= $dateEnd) {
                 } else {
                $actual = false;
                }
        }
    
    
}
?>
    <div class="container">
	
	<div class="table-head">Данные по сайту: 
	<?php 
	if ($ng11 == ""){
	$ng11 = "Все";
}  
	
	echo $ng11;
	?>
           </div>  
	
	
           <div class="table-head">Информация за промежуток между
<?php
$dateStart = date(htmlspecialchars($_POST['actual_date3']));
$dateEnd = date(htmlspecialchars($_POST['actual_date4']));
echo $dateStart . " и " . $dateEnd;?>
           </div>      
            <table>
                <tr>
                    <td>Имя</td>
                    <td>></td>
                    <td>Целевых лидов</td>
                    <td>Нецелевых лидов</td>
                    <td>Нецелевых продаж</td>
                    <td>Мусор</td>
                    <td>Текущая конверсия (-15% мусор)</td>
                     <td>Суммарный оборот за месяц***</td>
                     <td>ЗП</td>
                </tr>
                      </tr>
                <tr>
                    <td>Мария</td>
                    <td style="text-align: center;"> </td>
                    <td style="text-align: center;">Σ=<?php echo $maria->celevoi; ?></td>
                    <td style="text-align: center;"> </td>
                    <td style="text-align: center;"> </td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">
                        μ=<?php
                        $Mmeat = $maria->successfulOrdersPerWeekMeat;
                        $Mmeat2 = $maria->totalOrdersPerWeekMeat;
                        $Vert = $maria->successfulOrdersPerWeekVertikalki;
                        $Vert2 = $maria->totalOrdersPerWeekVertikalki;
                        $Clean = $maria->successfulOrdersPerWeekCleaners;
                        $Clean2 = $maria->totalOrdersPerWeekCleaners;
                        $Micro = $maria->successfulOrdersPerWeekMicrowaves;
                        $Micro2 = $maria->totalOrdersPerWeekMicrowaves;
                        $Blender = $maria->successfulOrdersPerWeekBlenders;
                        $Blender2 = $maria->totalOrdersPerWeekBlenders;
                        $Tea = $maria->successfulOrdersPerWeekTea;
                        $Tea2 = $maria->totalOrdersPerWeekTea;
                        $Planmix = $maria->successfulOrdersPerWeekPlanetarymixer;
                        $Planmix2 = $maria->totalOrdersPerWeekPlanetarymixer;
                        $grill = $maria->successfulOrdersPerWeekGrill;
                        $grill2 = $maria->totalOrdersPerWeekGrill;
                        $juicer = $maria->successfulOrdersPerWeekJuicer;
                        $juicer2 = $maria->totalOrdersPerWeekJuicer;
                        
                        if($ng1 != "meatgrinder"){$Mmeat = 0; $Mmeat2 = 0;}
                        if($ng2 != "vert_cleaner"){$Vert = 0; $Vert2 = 0;}
                        if($ng3 != "cleaners"){$Clean = 0; $Clean2 = 0;}
                        if($ng4 != "microwaves"){$Micro = 0; $Micro2 = 0;}
                        if($ng5 != "blenders"){$Blender = 0; $Blender2 = 0;}
                        if($ng6 != "tea"){$Tea = 0; $Tea2 = 0;}
                        if($ng7 != "planetary_mixer"){$Planmix = 0; $Planmix2 = 0;}
                        if($ng8 != "grill"){$grill = 0; $grill2 = 0;}
                        if($ng9 != "juicer"){$juicer = 0; $juicer2 = 0;}
                        
                        
                        $KonversSum1Mary = 0;
                        $KonversSum2Mary = 0;
                        $KonversSum1Mary = $Mmeat + $Vert + $Clean + $Micro + $Blender + $Tea + $Planmix + $grill + $juicer;
                        $KonversSum2Mary = $Mmeat2 + $Vert2 + $Clean2 + $Micro2 + $Blender2 + $Tea2 + $Planmix2 + $grill2 + $juicer2;
                        $rezMariaKonvers = 0;
                        
                        if (($KonversSum1Mary) == 0) {
                            echo 0;   
                        } else {
                            
                            $rezMariaKonvers = (round(((($KonversSum1Mary) / (($KonversSum2Mary)*0.85)) * 100), 2));
                            echo $rezMariaKonvers;
                        }
                        ?>%
                    </td>
                    <td style="text-align: center;">Σ=<?php 
                    $sumMoneyMaria = 0;
                    $sumMoneyMaria =  $maria->weekmoneyMeat+$maria->weekmoneyVertikalki+
                    $maria->weekmoneyBlenders+$maria->weekmoneyCleaners+$maria->weekmoneyGrill+$maria->weekmoneyPlanetarymixer+$maria->weekmoneyJuicer+$maria->weekmoneyMicrowaves+$maria->weekmoneyTea;
                    echo $sumMoneyMaria; ?>₽ </td>
                    <td style="text-align: center;">
                     
                     <?php 
                  
                            $mariastat = date(htmlspecialchars($_POST['plan_1']));
                            $mariastat2 = date(htmlspecialchars($_POST['plan_2']));
                            $mariastat3 = date(htmlspecialchars($_POST['plan_3']));
                            $mariastat4 = date(htmlspecialchars($_POST['plan_4']));

                            $mariastatrez1 = date(htmlspecialchars($_POST['planrez_1']));
                            $mariastatrez2 = date(htmlspecialchars($_POST['planrez_2']));
                            $mariastatrez3 = date(htmlspecialchars($_POST['planrez_4']));
                            $mariastatrez4 = date(htmlspecialchars($_POST['planrez_5']));

                            $rez2 = 0;

                        if($sumMoneyMaria <= $mariastat){
                                if ($rezMariaKonvers <= 30 ){
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez1) * 0.9)),2));
                            }
                            if ( $rezMariaKonvers > 30 && $rezMariaKonvers <=35 ){
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez1) * 1.0)),2));
                            }
                            if ($rezMariaKonvers > 35 && $rezMariaKonvers <= 41 ){
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez1) * 1.1)),2));   
                            }
                            if ($rezMariaKonvers > 41) {
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez1) * 1.2)),2));   
                            }
                        }
                        if($sumMoneyMaria >= $mariastat2 && $maria->weekmoney <=$mariastat3){
                                if ($rezMariaKonvers <=30 ){
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez2) * 0.9)),2));
                            }
                            if ($rezMariaKonvers > 30 && $rezMariaKonvers <=35 ){
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez2) * 1.0)),2));
                            }
                            if ($rezMariaKonvers > 35 && $rezMariaKonvers <= 41 ){
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez2) * 1.1)),2));   
                            }
                            if ($rezMariaKonvers > 41) {
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez2) * 1.2)),2));   
                            }
                        }
                       if($sumMoneyMaria > $mariastat3 && $maria->weekmoney <= $mariastat4){
                                if ($rezMariaKonvers <=30 ){
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez3) * 0.9)),2));
                            }
                            if ($rezMariaKonvers > 30 && $rezMariaKonvers <=35 ){
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez3) * 1.0)),2));
                            }
                            if ($rezMariaKonvers > 35 && $rezMariaKonvers <= 41 ){
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez3) * 1.1)),2));   
                            }
                            if ($rezMariaKonvers > 41) {
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez3) * 1.2)),2));   
                            }
                        }
                        if($sumMoneyMaria > $mariastat4){
                                if ($rezMariaKonvers <=30 ){
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez4) * 0.9)),2));
                            }
                            if ($rezMariaKonvers > 30 && $rezMariaKonvers <=35 ){
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez4) * 1.0)),2));
                            }
                            if ($rezMariaKonvers > 35 && $rezMariaKonvers <= 41 ){
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez4) * 1.1)),2));   
                            }
                            if ($rezMariaKonvers > 41) {
                                $rez2 = (round((($maria->celevoi * 200) + (($sumMoneyMaria * $mariastatrez4) * 1.2)),2));   
                            }
                        }

                        echo $rez2;

                         ?>₽
                     
                     </td>
                </tr>        
                <tr>
                    <td></td>
                    <td style="text-align: center;">МЯСОРУБКИ</td>
                    <td style="text-align: center;"><?php echo $maria->celevoimeat; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekMeat; ?></td>
                    <td style="text-align: center;"><?php echo $maria->successfulOrdersPerWeekMeat; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekMeat * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($maria->totalOrdersPerWeekMeat == 0) {
                            echo 0;
                        } else {
                            echo (round((($maria->successfulOrdersPerWeekMeat / ($maria->totalOrdersPerWeekMeat * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($maria->weekmoneyMeat == 0) {
                            echo 0;
                        } else {
                            echo $maria->weekmoneyMeat;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">ВЕРТИКАЛКИ</td>
                    <td style="text-align: center;"><?php echo $maria->celevoivert; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekVertikalki; ?></td>
                    <td style="text-align: center;"><?php echo $maria->successfulOrdersPerWeekVertikalki; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekVertikalki * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($maria->totalOrdersPerWeekVertikalki == 0) {
                            echo 0;
                        } else {
                            echo (round((($maria->successfulOrdersPerWeekVertikalki / ($maria->totalOrdersPerWeekVertikalki * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                    <td style="text-align: center;">
					<?php
                        if ($maria->weekmoneyVertikalki == 0) {
                            echo 0;
                        } else {
                            echo $maria->weekmoneyVertikalki;
                        }
                        ?>₽
                    </td>
                    <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">ПЫЛЕСОСЫ</td>
                    <td style="text-align: center;"><?php echo $maria->celevoiclean; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekCleaners; ?></td>
                    <td style="text-align: center;"><?php echo $maria->successfulOrdersPerWeekCleaners; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekCleaners * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($maria->totalOrdersPerWeekCleaners == 0) {
                            echo 0;
                        } else {
                            echo (round((($maria->successfulOrdersPerWeekCleaners / ($maria->totalOrdersPerWeekCleaners * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($maria->weekmoneyCleaners == 0) {
                            echo 0;
                        } else {
                            echo $maria->weekmoneyCleaners;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">МИКРОВОЛНОВКИ</td>
                    <td style="text-align: center;"><?php echo $maria->celevoimicro; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekMicrowaves; ?></td>
                    <td style="text-align: center;"><?php echo $maria->successfulOrdersPerWeekMicrowaves; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekMicrowaves * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($maria->totalOrdersPerWeekMicrowaves == 0) {
                            echo 0;
                        } else {
                            echo (round((($maria->successfulOrdersPerWeekMicrowaves / ($maria->totalOrdersPerWeekMicrowaves * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($maria->weekmoneyMicrowaves == 0) {
                            echo 0;
                        } else {
                            echo $maria->weekmoneyMicrowaves;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">БЛЕНДЕРЫ</td>
                    <td style="text-align: center;"><?php echo $maria->celevoiblender; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekBlenders; ?></td>
                    <td style="text-align: center;"><?php echo $maria->successfulOrdersPerWeekBlenders; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekBlenders * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($maria->totalOrdersPerWeekBlenders == 0) {
                            echo 0;
                        } else {
                            echo (round((($maria->successfulOrdersPerWeekBlenders / ($maria->totalOrdersPerWeekBlenders * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($maria->weekmoneyBlenders == 0) {
                            echo 0;
                        } else {
                            echo $maria->weekmoneyBlenders;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">ПМ</td>
                    <td style="text-align: center;"><?php echo $maria->celevoipm; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekPlanetarymixer; ?></td>
                    <td style="text-align: center;"><?php echo $maria->successfulOrdersPerWeekPlanetarymixer; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekPlanetarymixer * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($maria->totalOrdersPerWeekPlanetarymixer == 0) {
                            echo 0;
                        } else {
                            echo (round((($maria->successfulOrdersPerWeekPlanetarymixer / ($maria->totalOrdersPerWeekPlanetarymixer * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($maria->weekmoneyPlanetarymixer == 0) {
                            echo 0;
                        } else {
                            echo $maria->weekmoneyPlanetarymixer;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">ГРИЛИ</td>
                    <td style="text-align: center;"><?php echo $maria->celevoigrill; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekGrill; ?></td>
                    <td style="text-align: center;"><?php echo $maria->successfulOrdersPerWeekGrill; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekGrill * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($maria->totalOrdersPerWeekGrill == 0) {
                            echo 0;
                        } else {
                            echo (round((($maria->successfulOrdersPerWeekGrill / ($maria->totalOrdersPerWeekGrill * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($maria->weekmoneyGrill == 0) {
                            echo 0;
                        } else {
                            echo $maria->weekmoneyGrill;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">СОКОВЫЖИМАЛКИ</td>
                    <td style="text-align: center;"><?php echo $maria->celevoijuicer; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekJuicer; ?></td>
                    <td style="text-align: center;"><?php echo $maria->successfulOrdersPerWeekJuicer; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekJuicer * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($maria->totalOrdersPerWeekJuicer == 0) {
                            echo 0;
                        } else {
                            echo (round((($maria->successfulOrdersPerWeekJuicer / ($maria->totalOrdersPerWeekJuicer * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($maria->weekmoneyJuicer == 0) {
                            echo 0;
                        } else {
                            echo $maria->weekmoneyJuicer;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">ПРОЧЕЕ</td>
                    <td style="text-align: center;"><?php echo $maria->celevoiother; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekOther; ?></td>
                    <td style="text-align: center;"><?php echo $maria->successfulOrdersPerWeekOther; ?></td>
                    <td style="text-align: center;"><?php echo $maria->totalOrdersPerWeekOther * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($maria->totalOrdersPerWeekOther == 0) {
                            echo 0;
                        } else {
                            echo (round((($maria->successfulOrdersPerWeekOther / ($maria->totalOrdersPerWeekOther * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($maria->weekmoneyOther == 0) {
                            echo 0;
                        } else {
                            echo $maria->weekmoneyOther;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                
                
                
                
                
                <tr>
                    <td>Оксана</td>
                    <td style="text-align: center;"> </td>
                    <td style="text-align: center;">Σ=<?php echo $ksu->celevoi; ?></td>
                    <td style="text-align: center;"> </td>
                    <td style="text-align: center;"> </td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">
                        μ=<?php
                        $Mmeat = $ksu->successfulOrdersPerWeekMeat;
                        $Mmeat2 = $ksu->totalOrdersPerWeekMeat;
                        $Vert = $ksu->successfulOrdersPerWeekVertikalki;
                        $Vert2 = $ksu->totalOrdersPerWeekVertikalki;
                        $Clean = $ksu->successfulOrdersPerWeekCleaners;
                        $Clean2 = $ksu->totalOrdersPerWeekCleaners;
                        $Micro = $ksu->successfulOrdersPerWeekMicrowaves;
                        $Micro2 = $ksu->totalOrdersPerWeekMicrowaves;
                        $Blender = $ksu->successfulOrdersPerWeekBlenders;
                        $Blender2 = $ksu->totalOrdersPerWeekBlenders;
                        $Tea = $ksu->successfulOrdersPerWeekTea;
                        $Tea2 = $ksu->totalOrdersPerWeekTea;
                        $Planmix = $ksu->successfulOrdersPerWeekPlanetarymixer;
                        $Planmix2 = $ksu->totalOrdersPerWeekPlanetarymixer;
                        $grill = $ksu->successfulOrdersPerWeekGrill;
                        $grill2 = $ksu->totalOrdersPerWeekGrill;
                        $juicer = $ksu->successfulOrdersPerWeekJuicer;
                        $juicer2 = $ksu->totalOrdersPerWeekJuicer;
                        
                        if($ng1 != "meatgrinder"){$Mmeat = 0; $Mmeat2 = 0;}
                        if($ng2 != "vert_cleaner"){$Vert = 0; $Vert2 = 0;}
                        if($ng3 != "cleaners"){$Clean = 0; $Clean2 = 0;}
                        if($ng4 != "microwaves"){$Micro = 0; $Micro2 = 0;}
                        if($ng5 != "blenders"){$Blender = 0; $Blender2 = 0;}
                        if($ng6 != "tea"){$Tea = 0; $Tea2 = 0;}
                        if($ng7 != "planetary_mixer"){$Planmix = 0; $Planmix2 = 0;}
                        if($ng8 != "grill"){$grill = 0; $grill2 = 0;}
                        if($ng9 != "juicer"){$juicer = 0; $juicer2 = 0;}
                        
                        
                        $KonversSum1ksu = 0;
                        $KonversSum2ksu = 0;
                        $KonversSum1ksu = $Mmeat + $Vert + $Clean + $Micro + $Blender + $Tea + $Planmix + $grill + $juicer;
                        $KonversSum2ksu = $Mmeat2 + $Vert2 + $Clean2 + $Micro2 + $Blender2 + $Tea2 + $Planmix2 + $grill2 + $juicer2;
                        $rezKsuKonvers = 0;
                        
                        if (($KonversSum1ksu) == 0) {
                            echo 0;   
                        } else {
                            
                            $rezKsuKonvers = (round(((($KonversSum1ksu) / (($KonversSum2ksu)*0.85)) * 100), 2));
                            echo $rezKsuKonvers;
                        }
                        ?>%
                    </td>
                    <td style="text-align: center;">Σ=<?php 
                    $sumMoneyKsu = 0;
                    $sumMoneyKsu =  $ksu->weekmoneyMeat+$ksu->weekmoneyVertikalki+
                    $ksu->weekmoneyBlenders+$ksu->weekmoneyCleaners+$ksu->weekmoneyGrill+$ksu->weekmoneyPlanetarymixer+$ksu->weekmoneyJuicer+$ksu->weekmoneyMicrowaves+$ksu->weekmoneyTea;
                    echo $sumMoneyKsu; ?>₽ </td>
                    <td style="text-align: center;">
                     
                     <?php 
                  
                            $ksustat = date(htmlspecialchars($_POST['plan_1']));
                            $ksustat2 = date(htmlspecialchars($_POST['plan_2']));
                            $ksustat3 = date(htmlspecialchars($_POST['plan_3']));
                            $ksustat4 = date(htmlspecialchars($_POST['plan_4']));

                            $ksustatrez1 = date(htmlspecialchars($_POST['planrez_1']));
                            $ksustatrez2 = date(htmlspecialchars($_POST['planrez_2']));
                            $ksustatrez3 = date(htmlspecialchars($_POST['planrez_4']));
                            $ksustatrez4 = date(htmlspecialchars($_POST['planrez_5']));

                            $rez2 = 0;

                        if($sumMoneyKsu <= $ksustat){
                                if ($rezKsuKonvers <= 30 ){
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez1) * 0.9)),2));
                            }
                            if ( $rezMariaKonvers > 30 && $rezMariaKonvers <=35 ){
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez1) * 1.0)),2));
                            }
                            if ($rezMariaKonvers > 35 && $rezMariaKonvers <= 41 ){
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez1) * 1.1)),2));   
                            }
                            if ($rezMariaKonvers > 41) {
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez1) * 1.2)),2));   
                            }
                        }
                        if($sumMoneyKsu >= $ksustat2 && $ksu->weekmoney <=$ksustat3){
                                if ($rezMariaKonvers <=30 ){
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez2) * 0.9)),2));
                            }
                            if ($rezMariaKonvers > 30 && $rezMariaKonvers <=35 ){
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez2) * 1.0)),2));
                            }
                            if ($rezMariaKonvers > 35 && $rezMariaKonvers <= 41 ){
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez2) * 1.1)),2));   
                            }
                            if ($rezMariaKonvers > 41) {
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez2) * 1.2)),2));   
                            }
                        }
                       if($sumMoneyKsu > $ksustat3 && $ksu->weekmoney <= $ksustat4){
                                if ($rezMariaKonvers <=30 ){
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez3) * 0.9)),2));
                            }
                            if ($rezMariaKonvers > 30 && $rezMariaKonvers <=35 ){
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez3) * 1.0)),2));
                            }
                            if ($rezMariaKonvers > 35 && $rezMariaKonvers <= 41 ){
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez3) * 1.1)),2));   
                            }
                            if ($rezMariaKonvers > 41) {
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez3) * 1.2)),2));   
                            }
                        }
                        if($sumMoneyKsu >$ksustat4){
                                if ($rezMariaKonvers <=30 ){
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez4) * 0.9)),2));
                            }
                            if ($rezMariaKonvers > 30 && $rezMariaKonvers <=35 ){
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez4) * 1.0)),2));
                            }
                            if ($rezMariaKonvers > 35 && $rezMariaKonvers <= 41 ){
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez4) * 1.1)),2));   
                            }
                            if ($rezMariaKonvers > 41) {
                                $rez2 = (round((($ksu->celevoi * 200) + (($sumMoneyKsu * $ksustatrez4) * 1.2)),2));   
                            }
                        }

                        echo $rez2;

                         ?>₽
                     
                     </td>
                </tr>        
                <tr>
                    <td></td>
                    <td style="text-align: center;">МЯСОРУБКИ</td>
                    <td style="text-align: center;"><?php echo $ksu->celevoimeat; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekMeat; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->successfulOrdersPerWeekMeat; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekMeat * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ksu->totalOrdersPerWeekMeat == 0) {
                            echo 0;
                        } else {
                            echo (round((($ksu->successfulOrdersPerWeekMeat / ($ksu->totalOrdersPerWeekMeat * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($ksu->weekmoneyMeat == 0) {
                            echo 0;
                        } else {
                            echo $ksu->weekmoneyMeat;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">ВЕРТИКАЛКИ</td>
                    <td style="text-align: center;"><?php echo $ksu->celevoivert; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekVertikalki; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->successfulOrdersPerWeekVertikalki; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekVertikalki * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ksu->totalOrdersPerWeekVertikalki == 0) {
                            echo 0;
                        } else {
                            echo (round((($ksu->successfulOrdersPerWeekVertikalki / ($ksu->totalOrdersPerWeekVertikalki * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                    <td style="text-align: center;">
					<?php
                        if ($ksu->weekmoneyVertikalki == 0) {
                            echo 0;
                        } else {
                            echo $ksu->weekmoneyVertikalki;
                        }
                        ?>₽
                    </td>
                    <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">ПЫЛЕСОСЫ</td>
                    <td style="text-align: center;"><?php echo $ksu->celevoiclean; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekCleaners; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->successfulOrdersPerWeekCleaners; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekCleaners * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ksu->totalOrdersPerWeekCleaners == 0) {
                            echo 0;
                        } else {
                            echo (round((($ksu->successfulOrdersPerWeekCleaners / ($ksu->totalOrdersPerWeekCleaners * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($ksu->weekmoneyCleaners == 0) {
                            echo 0;
                        } else {
                            echo $ksu->weekmoneyCleaners;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">МИКРОВОЛНОВКИ</td>
                    <td style="text-align: center;"><?php echo $ksu->celevoimicro; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekMicrowaves; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->successfulOrdersPerWeekMicrowaves; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekMicrowaves * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ksu->totalOrdersPerWeekMicrowaves == 0) {
                            echo 0;
                        } else {
                            echo (round((($ksu->successfulOrdersPerWeekMicrowaves / ($ksu->totalOrdersPerWeekMicrowaves * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($ksu->weekmoneyMicrowaves == 0) {
                            echo 0;
                        } else {
                            echo $ksu->weekmoneyMicrowaves;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">БЛЕНДЕРЫ</td>
                    <td style="text-align: center;"><?php echo $ksu->celevoiblender; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekBlenders; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->successfulOrdersPerWeekBlenders; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekBlenders * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ksu->totalOrdersPerWeekBlenders == 0) {
                            echo 0;
                        } else {
                            echo (round((($ksu->successfulOrdersPerWeekBlenders / ($ksu->totalOrdersPerWeekBlenders * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($ksu->weekmoneyBlenders == 0) {
                            echo 0;
                        } else {
                            echo $ksu->weekmoneyBlenders;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">ПМ</td>
                    <td style="text-align: center;"><?php echo $ksu->celevoipm; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekPlanetarymixer; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->successfulOrdersPerWeekPlanetarymixer; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekPlanetarymixer * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ksu->totalOrdersPerWeekPlanetarymixer == 0) {
                            echo 0;
                        } else {
                            echo (round((($ksu->successfulOrdersPerWeekPlanetarymixer / ($ksu->totalOrdersPerWeekPlanetarymixer * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($ksu->weekmoneyPlanetarymixer == 0) {
                            echo 0;
                        } else {
                            echo $ksu->weekmoneyPlanetarymixer;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">ГРИЛИ</td>
                    <td style="text-align: center;"><?php echo $ksu->celevoigrill; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekGrill; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->successfulOrdersPerWeekGrill; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekGrill * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ksu->totalOrdersPerWeekGrill == 0) {
                            echo 0;
                        } else {
                            echo (round((($ksu->successfulOrdersPerWeekGrill / ($ksu->totalOrdersPerWeekGrill * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($ksu->weekmoneyGrill == 0) {
                            echo 0;
                        } else {
                            echo $ksu->weekmoneyGrill;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">СОКОВЫЖИМАЛКИ</td>
                    <td style="text-align: center;"><?php echo $ksu->celevoijuicer; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekJuicer; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->successfulOrdersPerWeekJuicer; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekJuicer * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ksu->totalOrdersPerWeekJuicer == 0) {
                            echo 0;
                        } else {
                            echo (round((($ksu->successfulOrdersPerWeekJuicer / ($ksu->totalOrdersPerWeekJuicer * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($ksu->weekmoneyJuicer == 0) {
                            echo 0;
                        } else {
                            echo $ksu->weekmoneyJuicer;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                <tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">ПРОЧЕЕ</td>
                    <td style="text-align: center;"><?php echo $ksu->celevoiother; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekOther; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->successfulOrdersPerWeekOther; ?></td>
                    <td style="text-align: center;"><?php echo $ksu->totalOrdersPerWeekOther * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ksu->totalOrdersPerWeekOther == 0) {
                            echo 0;
                        } else {
                            echo (round((($ksu->successfulOrdersPerWeekOther / ($ksu->totalOrdersPerWeekOther * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                   <td style="text-align: center;"><?php
                        if ($ksu->weekmoneyOther == 0) {
                            echo 0;
                        } else {
                            echo $ksu->weekmoneyOther;
                        }
                        ?>₽</td>
                        <td style="text-align: center;"></td>
                </tr>
                

                <tr>
                    <td>Иван</td>
                    <td style="text-align: center;"> </td>
                    <td style="text-align: center;">Σ=<?php echo $ivan->celevoi; ?></td>
                    <td style="text-align: center;"> </td>
                    <td style="text-align: center;"> </td>
                    <td style="text-align: center;"> </td>
                    <td style="text-align: center;">
                        μ=<?php
                        
                        $MmeatIvan = $ivan->successfulOrdersPerWeekMeat;
                        $MmeatIvan2 = $ivan->totalOrdersPerWeekMeat;
                        $VertIvan = $ivan->successfulOrdersPerWeekVertikalki;
                        $VertIvan2 = $ivan->totalOrdersPerWeekVertikalki;
                        $CleanIvan = $ivan->successfulOrdersPerWeekCleaners;
                        $CleanIvan2 = $ivan->totalOrdersPerWeekCleaners;
                        $MicroIvan = $ivan->successfulOrdersPerWeekMicrowaves;
                        $MicroIvan2 = $ivan->totalOrdersPerWeekMicrowaves;
                        $BlenderIvan = $ivan->successfulOrdersPerWeekBlenders;
                        $BlenderIvan2 = $ivan->totalOrdersPerWeekBlenders;
                        $TeaIvan = $ivan->successfulOrdersPerWeekTea;
                        $TeaIvan2 = $ivan->totalOrdersPerWeekTea;
                        $PlanmixIvan = $ivan->successfulOrdersPerWeekPlanetarymixer;
                        $PlanmixIvan2 = $ivan->totalOrdersPerWeekPlanetarymixer;
                        $grillIvan = $ivan->successfulOrdersPerWeekGrill;
                        $grillIvan2 = $ivan->totalOrdersPerWeekGrill;
                        $juicerIvan = $ivan->successfulOrdersPerWeekJuicer;
                        $juicerIvan2 = $ivan->totalOrdersPerWeekJuicer;
                        
                        if($ng1 != "meatgrinder"){$MmeatIvan = 0; $MmeatIvan2 = 0;}
                        if($ng2 != "vert_cleaner"){$VertIvan = 0; $VertIvan2 = 0;}
                        if($ng3 != "cleaners"){$CleanIvan = 0; $CleanIvan2 = 0;}
                        if($ng4 != "microwaves"){$MicroIvan = 0; $MicroIvan2 = 0;}
                        if($ng5 != "blenders"){$BlenderIvan = 0; $BlenderIvan2 = 0;}
                        if($ng6 != "tea"){$TeaIvan = 0; $Tea2 = 0;}
                        if($ng7 != "planetary_mixer"){$PlanmixIvan = 0; $PlanmixIvan2 = 0;}
                        if($ng8 != "grill"){$grillIvan = 0; $grillIvan2 = 0;}
                        if($ng9 != "juicer"){$juicerIvan = 0; $juicerIvan2 = 0;}
                        
                        $rezIVANKonvers = 0;
                        $KonversSum1Ivan = $MmeatIvan + $VertIvan + $CleanIvan + $MicroIvan + $BlenderIvan + $TeaIvan + $PlanmixIvan + $grillIvan + $juicerIvan;
                        $KonversSum2Ivan = $MmeatIvan2 + $VertIvan2 + $CleanIvan2 + $MicroIvan2 + $BlenderIvan2 + $TeaIvan2 + $PlanmixIvan2 + $grillIvan2 + $juicerIvan2;
                        
                        if (($KonversSum1Ivan) == 0) {
                            echo 0;   
                        } else {
                       
                        $rezIVANKonvers = (round(((($KonversSum1Ivan) / (($KonversSum2Ivan)*0.85)) * 100), 2));
                            echo $rezIVANKonvers;
                        }
                        ?>%
                    </td>
                    <td style="text-align: center;">Σ=<?php 
                    $sumMoneyIVAN = $ivan->weekmoneyMeat+$ivan->weekmoneyVertikalki+$ivan->weekmoneyCleaners+$ivan->weekmoneyMicrowaves+$ivan->weekmoneyPlanetarymixer+$ivan->weekmoneyGrill+$ivan->weekmoneyBlenders+$ivan->weekmoneyJuicer+$ivan->weekmoneyTea;
                    echo $sumMoneyIVAN; ?>₽ </td>
                    
                    <td style="text-align: center;">
                    <?php 
                            $ivanstat = date(htmlspecialchars($_POST['plan_1']));
                            $ivanstat2 = date(htmlspecialchars($_POST['plan_2']));
                            $ivanstat3 = date(htmlspecialchars($_POST['plan_3']));
                            $ivanstat4 = date(htmlspecialchars($_POST['plan_4']));

                            $ivanstatrez1 = date(htmlspecialchars($_POST['planrez_1']));
                            $ivanstatrez2 = date(htmlspecialchars($_POST['planrez_2']));
                            $ivanstatrez3 = date(htmlspecialchars($_POST['planrez_4']));
                            $ivanstatrez4 = date(htmlspecialchars($_POST['planrez_5']));

                            $rez3 = 0;

                        if($sumMoneyIVAN <= $ivanstat){
                                if ($rezIVANKonvers <=30 ){
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez1) * 0.9)),2));
                            }
                            if ($rezIVANKonvers > 30 && $rezIVANKonvers <=35 ){
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez1) * 1.0)),2));
                            }
                            if ($rezIVANKonvers > 35 && $rezIVANKonvers <= 41 ){
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez1) * 1.1)),2));  
                            }
                            if ($rezIVANKonvers > 41) {
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez1) * 1.2)),2));  
                            }
                        }
                        if($sumMoneyIVAN >= $ivanstat2 && $ivan->weekmoney <= $ivanstat3){
                                if ($rezIVANKonvers <=30 ){
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez2) * 0.9)),2));
                            }
                            if ($rezIVANKonvers > 30 && $rezIVANKonvers <=35 ){
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez2) * 1.0)),2));
                            }
                            if ($rezIVANKonvers > 35 && $rezIVANKonvers <= 41 ){
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez2) * 1.1)),2));  
                            }
                            if ($rezIVANKonvers > 41) {
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez2) * 1.2)),2));  
                            }
                        }
                       if($sumMoneyIVAN > $ivanstat3 && $ivan->weekmoney <= $ivanstat4){
                                if ($rezIVANKonvers <=30 ){
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez3) * 0.9)),2));
                            }
                            if ($rezIVANKonvers > 30 && $rezIVANKonvers <=35 ){
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez3) * 1.0)),2));
                            }
                            if ($rezIVANKonvers > 35 && $rezIVANKonvers <= 41 ){
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez3) * 1.1)),2));  
                            }
                            if ($rezIVANKonvers > 41) {
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez3) * 1.2)),2));  
                            }
                        }
                        if($sumMoneyIVAN > $ivanstat4){
                                if ($rezIVANKonvers <=30 ){
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez4) * 0.9)),2));
                            }
                            if ($rezIVANKonvers > 30 && $rezIVANKonvers <=35 ){
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez4) * 1.0)),2));
                            }
                            if ($rezIVANKonvers > 35 && $rezIVANKonvers <= 41 ){
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez4) * 1.1)),2));  
                            }
                            if ($rezIVANKonvers > 41) {
                                $rez3 = (round((($ivan->celevoi * 200) + (($sumMoneyIVAN * $ivanstatrez4) * 1.2)),2));  
                            }
                        }

                        echo $rez3;
                         ?>₽
                    </td>
                </tr>   
                <tr>
                    <td></td>
                    <td style="text-align: center;">МЯСОРУБКИ</td>
                    <td style="text-align: center;"><?php echo $ivan->celevoimeat; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekMeat; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->successfulOrdersPerWeekMeat; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekMeat * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->totalOrdersPerWeekMeat == 0) {
                            echo 0;
                        } else {
                            echo (round((($ivan->successfulOrdersPerWeekMeat / ($ivan->totalOrdersPerWeekMeat * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->weekmoneyMeat == 0) {
                            echo 0;
                        } else {
                            echo $ivan->weekmoneyMeat;
                        }
                        ?>₽
                    </td>
                    <td style="text-align: center;"></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: center;">ВЕРТИКАЛКИ</td>
                    <td style="text-align: center;"><?php echo $ivan->celevoivert; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekVertikalki; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->successfulOrdersPerWeekVertikalki; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekVertikalki * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->totalOrdersPerWeekVertikalki == 0) {
                            echo 0;
                        } else {
                            echo (round((($ivan->successfulOrdersPerWeekVertikalki / ($ivan->totalOrdersPerWeekVertikalki * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->weekmoneyVertikalki == 0) {
                            echo 0;
                        } else {
                            echo $ivan->weekmoneyVertikalki;
                        }
                        ?>₽
                    </td>
                    <td style="text-align: center;"></td>
                </tr>
                
                 <tr>
                    <td></td>
                    <td style="text-align: center;">ПЫЛЕСОСЫ</td>
                    <td style="text-align: center;"><?php echo $ivan->celevoiclean; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekCleaners; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->successfulOrdersPerWeekCleaners; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekCleaners * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->totalOrdersPerWeekCleaners == 0) {
                            echo 0;
                        } else {
                            echo (round((($ivan->successfulOrdersPerWeekCleaners / ($ivan->totalOrdersPerWeekCleaners * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->weekmoneyCleaners == 0) {
                            echo 0;
                        } else {
                            echo $ivan->weekmoneyCleaners;
                        }
                        ?>₽
                    </td>
                    <td style="text-align: center;"></td>
                </tr>
                
                 <tr>
                    <td></td>
                    <td style="text-align: center;">МИКРОВОЛОВКИ</td>
                    <td style="text-align: center;"><?php echo $ivan->celevoimicro; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekMicrowaves; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->successfulOrdersPerWeekMicrowaves; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekMicrowaves * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->totalOrdersPerWeekMicrowaves == 0) {
                            echo 0;
                        } else {
                            echo (round((($ivan->successfulOrdersPerWeekMicrowaves / ($ivan->totalOrdersPerWeekMicrowaves * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->weekmoneyMicrowaves == 0) {
                            echo 0;
                        } else {
                            echo $ivan->weekmoneyMicrowaves;
                        }
                        ?>₽
                    </td>
                    <td style="text-align: center;"></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">БЛЕНДЕРЫ</td>
                    <td style="text-align: center;"><?php echo $ivan->celevoiblender; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekBlenders; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->successfulOrdersPerWeekBlenders; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekBlenders * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->totalOrdersPerWeekBlenders == 0) {
                            echo 0;
                        } else {
                            echo (round((($ivan->successfulOrdersPerWeekBlenders / ($ivan->totalOrdersPerWeekBlenders * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->weekmoneyBlenders == 0) {
                            echo 0;
                        } else {
                            echo $ivan->weekmoneyBlenders;
                        }
                        ?>₽
                    </td>
                    <td style="text-align: center;"></td>
                </tr>
                
                 <tr>
                    <td></td>
                    <td style="text-align: center;">ЧАЙНИКИ</td>
                    <td style="text-align: center;"><?php echo $ivan->celevoitea; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekTea; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->successfulOrdersPerWeekTea; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekTea * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->totalOrdersPerWeekTea == 0) {
                            echo 0;
                        } else {
                            echo (round((($ivan->successfulOrdersPerWeekTea / ($ivan->totalOrdersPerWeekTea * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->weekmoneyTea == 0) {
                            echo 0;
                        } else {
                            echo $ivan->weekmoneyTea;
                        }
                        ?>₽
                    </td>
                    <td style="text-align: center;"></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">ГРИЛИ</td>
                    <td style="text-align: center;"><?php echo $ivan->celevoigrill; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekGrill; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->successfulOrdersPerWeekGrill; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekGrill * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->totalOrdersPerWeekGrill == 0) {
                            echo 0;
                        } else {
                            echo (round((($ivan->successfulOrdersPerWeekGrill / ($ivan->totalOrdersPerWeekGrill * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->weekmoneyGrill == 0) {
                            echo 0;
                        } else {
                            echo $ivan->weekmoneyGrill;
                        }
                        ?>₽
                    </td>
                    <td style="text-align: center;"></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td style="text-align: center;">СОКОВЫЖИМАЛКИ</td>
                    <td style="text-align: center;"><?php echo $ivan->celevoijuicer; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekJuicer; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->successfulOrdersPerWeekJuicer; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekJuicer * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->totalOrdersPerWeekJuicer == 0) {
                            echo 0;
                        } else {
                            echo (round((($ivan->successfulOrdersPerWeekJuicer / ($ivan->totalOrdersPerWeekJuicer * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->weekmoneyJuicer == 0) {
                            echo 0;
                        } else {
                            echo $ivan->weekmoneyJuicer;
                        }
                        ?>₽
                    </td>
                    <td style="text-align: center;"></td>
                </tr>
                
                 <tr>
                    <td></td>
                    <td style="text-align: center;">ПРОЧЕЕ</td>
                    <td style="text-align: center;"><?php echo $ivan->celevoiother; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekOther; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->successfulOrdersPerWeekOther; ?></td>
                    <td style="text-align: center;"><?php echo $ivan->totalOrdersPerWeekOther * 0.15; ?></td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->totalOrdersPerWeekOther == 0) {
                            echo 0;
                        } else {
                            echo (round((($ivan->successfulOrdersPerWeekOther / ($ivan->totalOrdersPerWeekOther * 0.85)) * 100), 2));
                        }
                        ?>%
                    </td>
                    <td style="text-align: center;">
                        <?php
                        if ($ivan->weekmoneyOther == 0) {
                            echo 0;
                        } else {
                            echo $ivan->weekmoneyOther;
                        }
                        ?>₽
                    </td>
                    <td style="text-align: center;"></td>
                </tr>
                

                <tr>
                    <td>Всего</td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">
                        <?php echo (($maria->totalOrdersPerWeekMeat+$maria->totalOrdersPerWeekVertikalki+$maria->totalOrdersPerWeekOther) + $ivan->totalOrdersPerWeekMeat + $ivan->totalOrdersPerWeekVertikalki + $ivan->totalOrdersPerWeekOther+$ksu->totalOrdersPerWeekMeat + $ksu->totalOrdersPerWeekVertikalki + $ksu->totalOrdersPerWeekOther); ?>
                    </td>
                    <td style="text-align: center;">
                        <?php echo (($maria->successfulOrdersPerWeekMeat + $maria->successfulOrdersPerWeekVertikalki + $maria->successfulOrdersPerWeekOther) +  $ivan->successfulOrdersPerWeekMeat + $ivan->successfulOrdersPerWeekVertikalki+ $ivan->successfulOrdersPerWeekOther + $ksu->successfulOrdersPerWeekMeat + $ksu->successfulOrdersPerWeekVertikalki+ $ksu->successfulOrdersPerWeekOther); ?>
                    </td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">
                    </td>
                    <td style="text-align: center;"><?php echo ($maria->weekmoneyMeat + $maria->weekmoneyVertikalki + $maria->weekmoneyOther +  $ivan->weekmoneyMeat + $ivan->weekmoneyVertikalki + $ivan->weekmoneyOther + $ksu->weekmoneyMeat + $ksu->weekmoneyVertikalki + $ksu->weekmoneyOther); ?>₽
                    </td>
                    <td style="text-align: center;"></td>
                </tr>
            </table>
            <div>Время проверки:
                <?php echo (date("H:i:s")); ?>
            </div>
            <div>
            ** - из сегодняшних клиентов, *** - без учета стоимости доставки, <br>
            μ - средняя конверсия, Σ - сумма продаж, > - направление,<br>
            М - Мясорубки, В - Вертикальные пылесосы, П - Прочее.
           
            </div> 
        </div>
</body>
