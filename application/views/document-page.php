<?php
require_once realpath(dirname(__FILE__) . '/gac/src/Google/autoload.php');

$client = new Google_Client();

session_start();

$client->setClientId('781723026165-e2oqaroqojv01jc6cvbdvrc3umtprvid.apps.googleusercontent.com');
$client->setClientSecret('cnYd7q7vjTfhjhSAXe3HffVF');
$client->setRedirectUri('http://www.my-website-name.com/drive_test');
$client->setScopes(array('https://www.googleapis.com/auth/drive.file'));

if (isset($_GET['code']) || (isset($_SESSION['access_token']) && $_SESSION['access_token'])) {
    if (isset($_GET['code'])) {
        $client->authenticate($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken();
    } else
        $client->setAccessToken($_SESSION['access_token']);

    $service = new Google_Service_Drive($client);

    echo "<pre>";
    $all_files = "";
    $all_files = retrieveAllFiles($service);
    print_r($all_files);
    die;

} else {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . $authUrl);
    exit();
}


/**
 * Retrieve a list of File resources.
 *
 * @param Google_Service_Drive $service Drive API service instance.
 * @return Array List of Google_Service_Drive_DriveFile resources.
 */
function retrieveAllFiles($service) {
  $result = array();
  $pageToken = NULL;

  do {
    try {
      $parameters = array();
      if ($pageToken) {
        $parameters['pageToken'] = $pageToken;
      }
      $files = $service->files->listFiles($parameters);

      $result = array_merge($result, $files->getItems());
      $pageToken = $files->getNextPageToken();
    } catch (Exception $e) {
      print "An error occurred: " . $e->getMessage();
      $pageToken = NULL;
    }
  } while ($pageToken);
  return $result;
}

?>