
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
     git clone https://github.com/Maithy-a/OTP-Request-VerificationSys.git
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

5. **Obtain your OTP code via Africa's Talking Simulator**:  
   Since this project uses Africa's Talking Sandbox, the OTP will not be sent to your physical phone. Instead, follow these steps to use the simulator to retrieve the OTP:

   - Go to the [Africa's Talking Dashboard](https://account.africastalking.com).
   - Click on the "Sandbox" section.
   - You will be redirected to your Sandbox Dashboard. From there, click on "Launch Simulator" on the left sidebar.
   - In the Simulator, you'll get a virtual phone interface. Enter a phone number you wish to use for receiving the OTP (e.g., a fake number starting with `+254` for Kenyan numbers) and click "Connect."
   - Once connected, you'll see a virtual phone screen with options for SMS, Calls, and Payments.
   - Click on the "SMS" app on the virtual phone screen to open the SMS inbox.
   - Now, when you send the OTP using your application, it will appear in the SMS inbox of the simulator.

6. Run the project on a local PHP server:
   ```bash
   php -S localhost:8000
   ```

### Requirements:
- Africa's Talking API credentials (Sandbox)
- PHP 7.4+
- Composer
- `vlucas/phpdotenv` for environment variable management
