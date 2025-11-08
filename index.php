<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\JobRepository\JobRepository;

$dbFunctions = new JobRepository();

echo "Choose operation from the list: 1. Create Job, 2. List All Jobs, 3. Delete Job, 4. Exit" . PHP_EOL;
$userInput = readLine();

switch ($userInput) {
    case "1": {
        $title = readLine("Enter job title: ");
        $company_id = readLine("Enter company ID: ");
        $is_active = readLine("Enter is_active: ");
        $salary = readLine("Enter salary: ");

        $result = $dbFunctions->createJob($title, $company_id, $is_active, $salary);
        echo "Job created successfully with ID: $result";
        break;
    }
    case "2": {
        $result = $dbFunctions->listAllJobs();
        forEach($result as $row) {
            echo $row['id'] . " - " . $row['title'] . " - " . $row['company_id'] . " - " . $row['is_active'] . " - " . $row['salary'] . PHP_EOL;
        }
        break;
    }
    case "3": {
        $id = readLine("Enter job ID to delete: ");
        $dbFunctions->deleteJob($id);
        break;
    }
    case "4": {
        echo "Exiting...";
        break;
    }
    default:
        echo "Invalid option. Please try again.";
}