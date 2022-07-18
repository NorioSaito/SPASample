const mix = require('laravel-mix');

mix.ts('resources/ts/index.tsx', 'public/js')
    .sass('resources/saas/app.scss', 'public/css');

if (mix.inProduction()) {
    mix.version()
}