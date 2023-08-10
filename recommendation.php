<?php
global $conn;
include "frontend/includes/header.php";

// Calculate TF-IDF for each package's description
$query = "SELECT id, description FROM packages";
$result = mysqli_query($conn, $query);

$packageDescriptions = [];
while ($row = mysqli_fetch_assoc($result)) {
    $packageDescriptions[$row['id']] = $row['description'];
}

// Preprocessing: Tokenization and stemming (use appropriate libraries or functions)

// Calculate TF-IDF for each term in the descriptions
// Store the TF-IDF values in a suitable data structure

// Calculate cosine similarity between packages
function cosineSimilarity($vector1, $vector2) {
    // Calculate dot product of vectors
    $dotProduct = 0;
    foreach ($vector1 as $term => $tfidf) {
        if (isset($vector2[$term])) {
            $dotProduct += $tfidf * $vector2[$term];
        }
    }
    
    // Calculate magnitudes of vectors
    $magnitude1 = sqrt(array_sum(array_map(function($tfidf) { return $tfidf * $tfidf; }, $vector1)));
    $magnitude2 = sqrt(array_sum(array_map(function($tfidf) { return $tfidf * $tfidf; }, $vector2)));
    
    // Calculate cosine similarity
    if ($magnitude1 > 0 && $magnitude2 > 0) {
        return $dotProduct / ($magnitude1 * $magnitude2);
    } else {
        return 0; // Handle division by zero
    }
}

// $currentPackageId = $_GET['id']; 
$currentPackageId = 5;
// Assuming you're passing the package_id as a parameter

$currentPackageVector = []; // Store the TF-IDF vector for the current package
// Calculate the TF-IDF values for the terms in the current package's description
// and populate the $currentPackageVector array

// Find similar packages based on cosine similarity
$similarPackages = [];
foreach ($packageDescriptions as $packageId => $description) {
    if ($packageId != $currentPackageId) {
        $packageVector = []; // Store the TF-IDF vector for the package
        // Calculate the TF-IDF values for the terms in the package's description
        // and populate the $packageVector array
        
        // Calculate cosine similarity between current package and the package in the loop
        $similarity = cosineSimilarity($currentPackageVector, $packageVector);
        
        // Store the similarity value in the $similarPackages array
        $similarPackages[$packageId] = $similarity;
    }
}

// Sort similar packages based on similarity values
arsort($similarPackages);

//Display similar packages
foreach ($similarPackages as $packageId => $similarity) {
    echo "<div class='similar-package'>";
    echo "<h3>{$packageId} - Similarity: {$similarity}</h3>";
    echo "<p>{$packageDescriptions[$packageId]}</p>";
    echo "</div>";
}

include "frontend/includes/footer.php";
?>