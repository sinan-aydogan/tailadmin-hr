## TailAdmin HR Sponsors

We would like to extend our thanks to the following sponsors for funding TailAdmin HR development. If you are interested in becoming a sponsor, please visit the [Buy me a coffee](https://buymeacoffee.com/sinanaydogan).

## Demo

- Demo Panel: [https://hr.tailadmin.dev](https://hr.tailadmin.dev)
- Username: `admin@tailadmin.dev`
- Password: `tailadmin`

## Installation

- Clone the repository with `git clone https://github.com/sinan-aydogan/tailadmin-hr.git`
- Copy `.env.example` to `.env` and configure your environment
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate --seed`
- Run `php artisan storage:link`
- Run `php artisan serve`
- Visit `http://localhost:8000` in your browser
- Login with the following credentials:
  - Username: `admin@tailadmin.dev`
  - Password: `tailadmin`
  - You can change the password from the profile settings.
  - You can also create a new user from the user management panel.
- Enjoy!

## Security Vulnerabilities

If you discover a security vulnerability within TailAdmin HR, please send an e-mail to Sinan AYDOĞAN via [sinan.aydogan@tailadmin.dev](mailto:sinan.aydogan@tailadmin.dev). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
