# BonusPlus PHP Integration

This project provides a PHP integration with the BonusPlus.Pro API. It includes services for connecting to the API and controllers for handling incoming requests.

## Project Structure

- `src/index.php`: Entry point of the application.
- `src/services/BonusPlusService.php`: Contains methods to interact with the BonusPlus.Pro API.
- `src/controllers/BonusPlusController.php`: Handles incoming requests and utilizes the BonusPlusService.
- `composer.json`: Configuration file for Composer, listing project dependencies.

## Setup Instructions

1. Clone the repository:
   ```
   git clone <repository-url>
   ```

2. Navigate to the project directory:
   ```
   cd bonusplus-php-integration
   ```

3. Install dependencies using Composer:
   ```
   composer install
   ```

## Usage Examples

- To initialize the application, run:
  ```
  php src/index.php
  ```

- Use the `BonusPlusController` to handle GET and POST requests to the BonusPlus.Pro API.

## License

This project is licensed under the MIT License.