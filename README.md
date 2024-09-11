## OTP Verification System Using Africa's Talking API (Sandbox)

This project is a basic OTP (One-Time Password) sending and verification system, built with PHP, Bootstrap, and Composer. It utilizes the Africa's Talking API (Sandbox environment) to generate and send OTPs via SMS to users, ensuring secure authentication. The system includes both sending the OTP and verifying it for user login or account validation.

### Features:
- OTP generation and sending via SMS using Africa's Talking API (Sandbox)
- OTP verification for secure user authentication
- Simple user interface built with Bootstrap
- PHP backend for managing OTP generation and verification
- Composer for managing dependencies

### Installation:
1. Clone the repository:
   ```bash
   git clone https://github.com/Maithy-a/OTP-Africa-s-talking.git
   cd OTP-Africa-s-talking
   ```

2. Install dependencies with Composer:
   ```bash
   composer require africastalking/africastalking
   composer require vlucas/phpdotenv
   ```

3. Set up your Africa's Talking Sandbox API credentials in the `.env` file:
   ```env
   AFRICASTALKING_USERNAME=sandbox
   AFRICASTALKING_API_KEY=your_api_key_here
   ```

4. Create a `.env` file at the root of the project and add the following environment variables:
   ```env
   AFRICASTALKING_USERNAME=sandbox
   AFRICASTALKING_API_KEY=your_api_key_here
   ```

5. Run the project on a local PHP server:
   ```bash
   php -S localhost:8000
   ```

### Requirements:
- Africa's Talking API credentials (Sandbox)
- PHP 7.4+
- Composer
- `vlucas/phpdotenv` for environment variable management
