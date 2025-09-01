# 🌸 Hello Kitty Characters & Lore Website

A beginner-friendly PHP website showcasing Hello Kitty characters and their stories, with extensive security features and educational comments.

## 🎯 What This Project Teaches

This project is designed to teach PHP fundamentals with a focus on security best practices:

- **PHP Basics**: Arrays, functions, loops, and HTML integration
- **Security Concepts**: Input validation, XSS prevention, and secure coding practices
- **Web Development**: Responsive design, user interaction, and form handling
- **Git & GitHub**: Version control and project management

## 🚀 Features

- **Character Showcase**: Beautiful display of 5 popular Sanrio characters
- **Search Functionality**: Find characters by name with real-time feedback
- **Responsive Design**: Works on desktop, tablet, and mobile devices
- **Security Features**: Input validation, XSS protection, and secure coding practices
- **Educational Comments**: Extensive documentation explaining every concept
- **Security Demo**: Additional script demonstrating security vulnerabilities and fixes

## 📁 Project Structure

```
hello-kitty-website/
├── index.php              # Main website file
├── security-demo.php      # Security learning script
├── .gitignore            # Git ignore rules
└── README.md             # This file
```

## 🛠️ How to Run the Website

### Option 1: Using PHP Built-in Server (Recommended for Learning)

1. **Open Terminal/Command Prompt**
2. **Navigate to the project folder**:
   ```bash
   cd hello-kitty-website
   ```
3. **Start the PHP server**:
   ```bash
   php -S localhost:8000
   ```
4. **Open your browser** and go to: `http://localhost:8000`

### Option 2: Using XAMPP/WAMP/MAMP

1. **Install XAMPP** (or similar local server)
2. **Copy the project folder** to your `htdocs` directory
3. **Start Apache** in XAMPP
4. **Open your browser** and go to: `http://localhost/hello-kitty-website`

## 🔒 Security Features Explained

### 1. Input Sanitization
```php
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}
```
- Prevents XSS (Cross-Site Scripting) attacks
- Removes extra whitespace
- Converts special characters to HTML entities

### 2. Input Validation
```php
function characterExists($characters, $characterName) {
    foreach ($characters as $character) {
        if (strtolower($character['name']) === strtolower($characterName)) {
            return true;
        }
    }
    return false;
}
```
- Validates data before processing
- Case-insensitive comparison
- Prevents errors from invalid input

### 3. Secure Form Handling
- Uses `GET` method for searches (appropriate for non-sensitive data)
- Sanitizes all user input before processing
- Validates input against known data

## 📚 Learning Resources

### PHP Concepts Demonstrated

1. **Arrays**: Associative arrays for character data
2. **Functions**: Reusable code blocks for security and validation
3. **Loops**: `foreach` loops to display character information
4. **Conditionals**: `if/else` statements for logic flow
5. **String Functions**: `strtolower()`, `trim()`, `htmlspecialchars()`
6. **Superglobals**: `$_GET` for form data

### Security Concepts

1. **XSS Prevention**: Escaping output to prevent script injection
2. **Input Validation**: Checking data before processing
3. **Data Sanitization**: Cleaning user input
4. **Secure Coding**: Following best practices

## 🐙 How to Add This to GitHub (Step-by-Step)

### Step 1: Create a GitHub Account
1. Go to [github.com](https://github.com)
2. Click "Sign up" and create your account
3. Verify your email address

### Step 2: Create a New Repository
1. **Click the "+" icon** in the top right corner
2. **Select "New repository"**
3. **Fill in the details**:
   - Repository name: `hello-kitty-website`
   - Description: `A beginner-friendly PHP website showcasing Hello Kitty characters with security features`
   - Make it **Public** (so others can see your work)
   - **Don't** initialize with README (we already have one)
4. **Click "Create repository"**

### Step 3: Initialize Git in Your Project
1. **Open Terminal/Command Prompt**
2. **Navigate to your project folder**:
   ```bash
   cd hello-kitty-website
   ```
3. **Initialize Git**:
   ```bash
   git init
   ```

### Step 4: Add Your Files to Git
1. **Add all files**:
   ```bash
   git add .
   ```
2. **Check what's being added**:
   ```bash
   git status
   ```
3. **Make your first commit**:
   ```bash
   git commit -m "Initial commit: Hello Kitty characters website with security features"
   ```

### Step 5: Connect to GitHub
1. **Add your GitHub repository as remote**:
   ```bash
   git remote add origin https://github.com/YOUR_USERNAME/hello-kitty-website.git
   ```
   (Replace `YOUR_USERNAME` with your actual GitHub username)

2. **Push your code to GitHub**:
   ```bash
   git push -u origin main
   ```

### Step 6: Verify Your Upload
1. **Go to your GitHub repository** in your browser
2. **You should see all your files** including:
   - `index.php`
   - `security-demo.php`
   - `.gitignore`
   - `README.md`

## 🎨 Customization Ideas

### Add More Characters
```php
// Add new characters to the $characters array
[
    'name' => 'New Character',
    'real_name' => 'Character Real Name',
    'birthday' => 'Date',
    'birthplace' => 'Location',
    'personality' => 'Description',
    'favorite_food' => 'Food',
    'hobby' => 'Activity',
    'lore' => 'Character story...',
    'image' => 'image.jpg',
    'color' => '#HEXCODE'
]
```

### Add New Features
- **Character images**: Add actual character images
- **Favorites system**: Let users mark favorite characters
- **Comments section**: Allow users to comment on characters
- **Character comparison**: Compare two characters side by side

### Improve Security
- **Rate limiting**: Prevent too many requests
- **CSRF protection**: Add tokens to forms
- **Input length limits**: Restrict input size
- **File upload validation**: If adding image uploads

## 🐛 Troubleshooting

### Common Issues

1. **"php: command not found"**
   - Install PHP on your system
   - On macOS: `brew install php`
   - On Windows: Download from php.net

2. **"Permission denied" errors**
   - Check file permissions
   - Make sure you have write access to the directory

3. **Website not loading**
   - Check if PHP server is running
   - Verify the correct URL (localhost:8000)
   - Check for PHP syntax errors

### Getting Help

- **PHP Documentation**: [php.net](https://php.net)
- **GitHub Help**: [help.github.com](https://help.github.com)
- **Stack Overflow**: For programming questions
- **PHP Security**: [OWASP PHP Security](https://owasp.org/www-project-php-security/)

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## 🤝 Contributing

This is a learning project, but if you find bugs or want to suggest improvements:

1. **Fork the repository**
2. **Create a feature branch**
3. **Make your changes**
4. **Submit a pull request**

## 🌟 Acknowledgments

- **Sanrio** for creating the amazing Hello Kitty characters
- **PHP Community** for excellent documentation and resources
- **Security Experts** for best practices and guidelines

---

**Happy Coding! 🌸**

*Remember: This project is designed for learning. Always prioritize security in real-world applications!*
