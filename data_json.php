<?php
  date_default_timezone_set('America/New_York');
  require_once 'vendor/autoload.php'; // or wherever autoload.php is located

  require_once "Google/Client.php";
  require_once "Google/Service/Calendar.php";
  require_once "Google/Service/Oauth2.php";


  $client = new Google_Client();
  $client->setApplicationName("Client_Library_Examples");
  $client->setDeveloperKey("AIzaSyCUPJ7jtcjIOCCnALaJz2hw8NoCbXdr6OA");

  $cal = new Google_Service_Calendar($client);

  $optParams = array('singleEvents' => 'true', 'timeMin' => '2015-07-03T10:00:00-07:00', 'timeMax' => '2016-06-03T10:00:00-07:00');
  $result = $cal->events->listEvents('lifepatch.org_g3nr21ngdusi5ug93o6v8imbes@group.calendar.google.com', $optParams);

//print_r($result);

$array_to_json = array();

foreach ($result as $value) {
  $array_to_json[] = array(
      summary => $value['summary'],
      startDate => $value['start']['date'],
      startDateTime => $value['start']['dateTime'],
      endDate => $value['end']['date'],
      endDateTime => $value['end']['dateTime'],      
    );
}

echo json_encode($array_to_json);

