<?php
header('Content-Type: application/json');

// URL of the hosted JSON file
$jsonUrl = 'https://littleman190.github.io/bloxlabstest/versions.json';

// Fetch the JSON from the hosted website
$jsonData = file_get_contents($jsonUrl);

// Check if the fetch was successful
if ($jsonData === false) {
    echo json_encode(['error' => 'Failed to fetch version data']);
    exit;
}

// Decode the JSON
$versionData = json_decode($jsonData, true);

// Check if the version data is valid
if (!$versionData || !isset($versionData['latest_version'])) {
    echo json_encode(['error' => 'Invalid version data']);
    exit;
}

// Return the latest version
echo json_encode(['latest_version' => $versionData['latest_version']]);
?>
