# Configuration Instructions

To set up the configuration for different development environments, follow these steps:

1. **Copy the Example Configuration File**:
    - Navigate to the `config` directory.
    - Copy the `database-example.php` file and rename the copy to `database.php`.

    ```sh
    cp config/database-example.php config/database.php
    ```

2. **Modify the Configuration File**:
    - Open the `config/database.php` file in your preferred text editor.
    - Update the configuration settings according to your development environment (e.g., database host, username, password, database name).

3. **Environment-Specific Configuration**:
    - Ensure that the `database.php` file is correctly configured for the specific environment you are working in (development, staging, production).

By following these steps, you will have a properly configured `database.php` file tailored to your development environment.