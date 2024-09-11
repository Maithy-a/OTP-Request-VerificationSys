# OTP-Africa-s-talking

This project implements a One-Time Password (OTP) generation and verification system using the Africa's Talking API. The application allows users to securely send and verify OTPs via SMS, enhancing security for user authentication processes. The project is built using PHP, Composer, and Bootstrap.

## Features

- **OTP Generation**: Users can generate an OTP that is sent to their mobile number.
- **OTP Verification**: The system allows verification of the OTP entered by the user.
- **Time Management**: Users can check the elapsed time since the OTP was generated and the remaining time until it expires.

## Getting Started

To set up the project, clone the repository and install the necessary dependencies using Composer. You will need to register for an API key on the Africa's Talking portal and update the configuration file with your credentials.

## API Endpoints

- **POST /api/v1/otp**: Generates an OTP and sends it to the specified phone number.
- **POST /api/v1/otp/verify**: Verifies the validity of the OTP entered by the user.
- **GET /api/v1/otp/time/elapsed**: Retrieves the elapsed time since the OTP was generated.
- **GET /api/v1/otp/time/remaining**: Retrieves the remaining time until the OTP expires.

This project is built with PHP, utilizing the Africa's Talking SMS gateway for OTP delivery. It uses Composer for dependency management and Bootstrap for styling and responsive design. It is designed for developers looking to implement secure user authentication in their applications.
