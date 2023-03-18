# Bug-Bounty

This is the front-end for the Bug Bounty program application.

## Installation

To install the Bug-Bounty project, please follow the steps below:

1. First, clone the repository from GitHub using the command below:

   ```
   git clone <https://github.com/199ocero/Bug-Bounty-Frontend.git>
   ```

2. Change into the project directory by running:

   ```
   cd Bug-Bounty-Frontend
   ```

3. Run the following command to install the project dependencies:

   ```
   composer install
   npm install
   ```

4. Create a copy of the `.env.example` file and rename it to `.env`:

   ```
   cp .env.example .env
   ```

5. Update the API\_\_API_URL value in the `.env` file to point to the URL of the Bug-Bounty back-end API.
6. Finally, start the application by running:

   ```
   php artisan serve --port=4011
   npm run dev
   ```

## Usage

The Bug-Bounty project is a front-end application that provides a user interface for managing bug bounty programs.

## Contributing

If you're interested in contributing to the Bug-Bounty project, please feel free to fork the repository and submit a pull request.
