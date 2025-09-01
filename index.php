<?php
/**
 * Hello Kitty Characters Website
 * A beginner-friendly PHP application showcasing Hello Kitty characters and their lore
 * 
 * This file demonstrates:
 * - Basic PHP syntax and structure
 * - Arrays and how to use them
 * - Functions and their purpose
 * - Security best practices
 * - HTML/PHP integration
 */

// SECURITY TIP: Always start PHP files with <?php (not <?) for better security
// This prevents potential code injection attacks

// ============================================================================
// CHARACTER DATA ARRAY
// ============================================================================
// Arrays in PHP are like containers that hold multiple pieces of data
// Think of them like a filing cabinet with labeled drawers
// Syntax: $arrayName = array('item1', 'item2', 'item3');
// Or the newer syntax: $arrayName = ['item1', 'item2', 'item3'];

$characters = [
    // Each character is an "associative array" - like a dictionary
    // Instead of numbers (0, 1, 2), we use meaningful names as "keys"
    [
        'name' => 'Hello Kitty',
        'real_name' => 'Kitty White',
        'birthday' => 'November 1st',
        'birthplace' => 'London, England',
        'personality' => 'Sweet, kind, and loves to make friends',
        'favorite_food' => 'Apple pie',
        'hobby' => 'Baking cookies',
        'lore' => 'Hello Kitty is the most famous Sanrio character. She lives in London with her family and loves to travel. Despite her simple appearance, she has a rich personality and represents friendship and kindness.',
        'image' => 'hello-kitty.jpg',
        'color' => '#FF69B4' // Pink color for styling
    ],
    [
        'name' => 'My Melody',
        'real_name' => 'My Melody',
        'birthday' => 'January 18th',
        'birthplace' => 'Mariland',
        'personality' => 'Gentle, caring, and loves nature',
        'favorite_food' => 'Almond pound cake',
        'hobby' => 'Collecting flowers',
        'lore' => 'My Melody is Hello Kitty\'s best friend. She wears a red hood and loves to help others. She\'s known for her gentle nature and her ability to make everyone feel comfortable.',
        'image' => 'my-melody.jpg',
        'color' => '#FFB6C1' // Light pink
    ],
    [
        'name' => 'Kuromi',
        'real_name' => 'Kuromi',
        'birthday' => 'October 31st',
        'birthplace' => 'Mariland',
        'personality' => 'Mischievous, energetic, and secretly sweet',
        'favorite_food' => 'Chocolate',
        'hobby' => 'Writing in her diary',
        'lore' => 'Kuromi is My Melody\'s rival and friend. Despite her tough exterior and punk style, she has a soft heart. She loves to write in her diary and dreams of becoming a nurse.',
        'image' => 'kuromi.jpg',
        'color' => '#9370DB' // Purple
    ],
    [
        'name' => 'Cinnamoroll',
        'real_name' => 'Cinnamoroll',
        'birthday' => 'March 6th',
        'birthplace' => 'Café Cinnamon',
        'personality' => 'Shy, gentle, and loves to fly',
        'favorite_food' => 'Cinnamon rolls',
        'hobby' => 'Flying and napping',
        'lore' => 'Cinnamoroll is a white puppy with long ears that allow him to fly. He\'s very shy but incredibly sweet. He lives at Café Cinnamon and loves to help customers.',
        'image' => 'cinnamoroll.jpg',
        'color' => '#87CEEB' // Sky blue
    ],
    [
        'name' => 'Pompompurin',
        'real_name' => 'Pompompurin',
        'birthday' => 'April 16th',
        'birthplace' => 'Golden Retriever Village',
        'personality' => 'Lazy, friendly, and loves pudding',
        'favorite_food' => 'Pudding',
        'hobby' => 'Collecting shoes and napping',
        'lore' => 'Pompompurin is a golden retriever who loves pudding and naps. He\'s always wearing his brown beret and is known for his laid-back personality and love of collecting shoes.',
        'image' => 'pompompurin.jpg',
        'color' => '#DAA520' // Goldenrod
    ]
];

// ============================================================================
// SECURITY FUNCTIONS
// ============================================================================

/**
 * Function to sanitize user input
 * SECURITY TIP: Always validate and sanitize user input to prevent XSS attacks
 * 
 * @param string $input - The user input to sanitize
 * @return string - The sanitized input
 */
function sanitizeInput($input) {
    // htmlspecialchars() converts special characters to HTML entities
    // This prevents XSS (Cross-Site Scripting) attacks
    // ENT_QUOTES handles both single and double quotes
    // UTF-8 encoding ensures proper character handling
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Function to validate if a character exists
 * SECURITY TIP: Always validate data before using it
 * 
 * @param array $characters - The characters array
 * @param string $characterName - The name to search for
 * @return bool - True if character exists, false otherwise
 */
function characterExists($characters, $characterName) {
    // Loop through each character in the array
    foreach ($characters as $character) {
        // strtolower() converts to lowercase for case-insensitive comparison
        if (strtolower($character['name']) === strtolower($characterName)) {
            return true;
        }
    }
    return false;
}

/**
 * Function to get character by name
 * 
 * @param array $characters - The characters array
 * @param string $characterName - The name to search for
 * @return array|null - The character data or null if not found
 */
function getCharacterByName($characters, $characterName) {
    foreach ($characters as $character) {
        if (strtolower($character['name']) === strtolower($characterName)) {
            return $character;
        }
    }
    return null;
}

// ============================================================================
// PROCESS USER INPUT (if any)
// ============================================================================

// SECURITY TIP: Always check if form data exists before processing
// $_GET contains URL parameters, $_POST contains form data
$selectedCharacter = null;
$searchMessage = '';

// Check if user submitted a search
if (isset($_GET['search']) && !empty($_GET['search'])) {
    // Sanitize the search input
    $searchTerm = sanitizeInput($_GET['search']);
    
    // Validate that the character exists
    if (characterExists($characters, $searchTerm)) {
        $selectedCharacter = getCharacterByName($characters, $searchTerm);
        $searchMessage = "Found: " . $selectedCharacter['name'];
    } else {
        $searchMessage = "Character not found. Please try again!";
    }
}

// ============================================================================
// HTML OUTPUT STARTS HERE
// ============================================================================
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- SECURITY TIP: Always specify charset to prevent encoding attacks -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello Kitty Characters & Lore</title>
    <style>
        /* CSS for styling our website */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #FFB6C1, #87CEEB, #DDA0DD);
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .search-section {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .search-input {
            padding: 12px;
            border: 2px solid #FF69B4;
            border-radius: 25px;
            width: 300px;
            font-size: 16px;
            margin-right: 10px;
        }
        
        .search-button {
            padding: 12px 25px;
            background: #FF69B4;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .search-button:hover {
            background: #FF1493;
        }
        
        .message {
            margin-top: 15px;
            padding: 10px;
            border-radius: 10px;
            font-weight: bold;
        }
        
        .success {
            background: #90EE90;
            color: #006400;
        }
        
        .error {
            background: #FFB6C1;
            color: #8B0000;
        }
        
        .character-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .character-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            border-left: 5px solid;
        }
        
        .character-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }
        
        .character-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        
        .character-info {
            margin-bottom: 8px;
        }
        
        .character-info strong {
            color: #666;
        }
        
        .character-lore {
            margin-top: 15px;
            padding: 15px;
            background: rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            font-style: italic;
            line-height: 1.6;
        }
        
        .selected-character {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border-left: 5px solid;
        }
        
        .footer {
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Website Header -->
        <div class="header">
            <h1>🌸 Hello Kitty Characters & Lore 🌸</h1>
            <p>Discover the magical world of Sanrio characters and their stories!</p>
        </div>
        
        <!-- Search Section -->
        <div class="search-section">
            <h2>🔍 Search for a Character</h2>
            <!-- SECURITY TIP: Always use method="GET" for searches, method="POST" for sensitive data -->
            <form method="GET" action="">
                <input type="text" name="search" class="search-input" 
                       placeholder="Enter character name (e.g., Hello Kitty)" 
                       value="<?php echo isset($_GET['search']) ? sanitizeInput($_GET['search']) : ''; ?>">
                <button type="submit" class="search-button">Search</button>
            </form>
            
            <?php if (!empty($searchMessage)): ?>
                <div class="message <?php echo $selectedCharacter ? 'success' : 'error'; ?>">
                    <?php echo $searchMessage; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Selected Character Display -->
        <?php if ($selectedCharacter): ?>
            <div class="selected-character" style="border-left-color: <?php echo $selectedCharacter['color']; ?>">
                <h2 style="color: <?php echo $selectedCharacter['color']; ?>">
                    🌟 <?php echo $selectedCharacter['name']; ?> 🌟
                </h2>
                <div class="character-info">
                    <strong>Real Name:</strong> <?php echo $selectedCharacter['real_name']; ?><br>
                    <strong>Birthday:</strong> <?php echo $selectedCharacter['birthday']; ?><br>
                    <strong>Birthplace:</strong> <?php echo $selectedCharacter['birthplace']; ?><br>
                    <strong>Personality:</strong> <?php echo $selectedCharacter['personality']; ?><br>
                    <strong>Favorite Food:</strong> <?php echo $selectedCharacter['favorite_food']; ?><br>
                    <strong>Hobby:</strong> <?php echo $selectedCharacter['hobby']; ?>
                </div>
                <div class="character-lore">
                    <strong>Lore:</strong><br>
                    <?php echo $selectedCharacter['lore']; ?>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- All Characters Grid -->
        <h2>�� All Characters</h2>
        <div class="character-grid">
            <?php
            // Loop through each character in our array
            // This is called a "foreach" loop - it goes through each item in an array
            foreach ($characters as $character) {
                // Each time through the loop, $character contains one character's data
                echo '<div class="character-card" style="border-left-color: ' . $character['color'] . '">';
                echo '<div class="character-name" style="color: ' . $character['color'] . '">';
                echo '🌸 ' . $character['name'] . ' 🌸';
                echo '</div>';
                echo '<div class="character-info">';
                echo '<strong>Real Name:</strong> ' . $character['real_name'] . '<br>';
                echo '<strong>Birthday:</strong> ' . $character['birthday'] . '<br>';
                echo '<strong>Birthplace:</strong> ' . $character['birthplace'] . '<br>';
                echo '<strong>Personality:</strong> ' . $character['personality'] . '<br>';
                echo '<strong>Favorite Food:</strong> ' . $character['favorite_food'] . '<br>';
                echo '<strong>Hobby:</strong> ' . $character['hobby'];
                echo '</div>';
                echo '<div class="character-lore">';
                echo '<strong>Lore:</strong><br>' . $character['lore'];
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p>🌸 Made with love for Hello Kitty fans! 🌸</p>
            <p><strong>Learning PHP:</strong> This website demonstrates arrays, functions, security practices, and more!</p>
        </div>
    </div>
</body>
</html>
