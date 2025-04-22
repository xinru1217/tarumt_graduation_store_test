<?php
require 'vendor/autoload.php'; // AWS SDK

use Aws\SecretsManager\SecretsManagerClient;
use Aws\Exception\AwsException;

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Create the Secrets Manager client
$client = new SecretsManagerClient([
    'version' => 'latest',
    'region' => 'us-east-1',
]);

$secretName = 'graduation-store-db-secret';

try {
    // Fetch the secret
    $result = $client->getSecretValue([
        'SecretId' => $secretName,
    ]);

    // Decode the secret string (assumes JSON structure)
    if (isset($result['SecretString'])) {
        $secret = json_decode($result['SecretString'], true);

        $host = $secret['host'];
        $port = $secret['port'];
        $dbname = $secret['dbname'];
        $username = $secret['username'];
        $password = $secret['password'];

        // Connect to the database
        $conn = new mysqli($host, $username, $password, $dbname, $port);

        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        // Optional success message
        // echo "DB connection successful!";

    } else {
        throw new Exception("SecretString not found in result.");
    }

} catch (AwsException $e) {
    die("AWS Error: " . $e->getMessage());
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
