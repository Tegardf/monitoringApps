const dotenv = require('dotenv');
dotenv.config();

module.exports = {
    apps: [
      {
        name: 'laravel',
        script: 'php',
        args: 'artisan serve --host=0.0.0.0 --port=8000',
        env: {
            APP_NAME: process.env.APP_NAME,
            APP_ENV: process.env.APP_ENV,
            APP_KEY: process.env.APP_KEY,
            APP_DEBUG: process.env.APP_DEBUG,
            APP_TIMEZONE: process.env.APP_TIMEZONE,
            APP_URL: process.env.APP_URL,
            APP_LOCALE: process.env.APP_LOCALE,
            APP_FALLBACK_LOCALE: process.env.APP_FALLBACK_LOCALE,
            APP_FAKER_LOCALE: process.env.APP_FAKER_LOCALE,
            APP_MAINTENANCE_DRIVER: process.env.APP_MAINTENANCE_DRIVER,
            APP_MAINTENANCE_STORE: process.env.APP_MAINTENANCE_STORE,
            BCRYPT_ROUNDS: process.env.BCRYPT_ROUNDS,
            LOG_CHANNEL: process.env.LOG_CHANNEL,
            LOG_STACK: process.env.LOG_STACK,
            LOG_DEPRECATIONS_CHANNEL: process.env.LOG_DEPRECATIONS_CHANNEL,
            LOG_LEVEL: process.env.LOG_LEVEL,
            DB_CONNECTION: process.env.DB_CONNECTION,
            DB_HOST: process.env.DB_HOST,
            DB_PORT: process.env.DB_PORT,
            DB_DATABASE: process.env.DB_DATABASE,
            DB_USERNAME: process.env.DB_USERNAME,
            DB_PASSWORD: process.env.DB_PASSWORD,
            SESSION_DRIVER: process.env.SESSION_DRIVER,
            SESSION_LIFETIME: process.env.SESSION_LIFETIME,
            SESSION_ENCRYPT: process.env.SESSION_ENCRYPT,
            SESSION_PATH: process.env.SESSION_PATH,
            SESSION_DOMAIN: process.env.SESSION_DOMAIN,
        },
      },
      {
        name: 'vite',
        script: 'npm',
        args: 'run dev',
        watch: false,
      },
    ],
  };