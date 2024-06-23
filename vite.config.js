import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import istanbul from 'vite-plugin-istanbul';

export default defineConfig({
    build: {
        open: true,
        port: 3000,
        assetsInlineLimit: 0,
        outDir: './public/build'
    },
    plugins: [
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        laravel({
            input: [
               // 'resources/css/app.css',
              // 'resources/js/app.js',
              //  'userfiles/modules/piksera/api/live-edit-app/index.js',
               // 'userfiles/modules/piksera/api/live-edit-app/app.js',
                'src/PikseraPackages/LiveEdit/resources/js/ui/live-edit-app.js',
                'src/PikseraPackages/LiveEdit/resources/js/ui/live-edit-page-scripts.js',
                'src/PikseraPackages/LiveEdit/resources/js/ui/admin-app.js',
                'src/PikseraPackages/LiveEdit/resources/js/ui/apps/ElementStyleEditor/element-style-editor-app.js',

               /// 'resources/css/piksera-admin-filament.css',
            ],
            publicDirectory: "public",
            refresh: true,
        }),


        istanbul({
            include: 'src/PikseraPackages/LiveEdit/*',
            exclude: ['node_modules', 'tests/'],
            extension: [ '.js', '.ts', '.vue' ],
            forceBuildInstrument: true,
            requireEnv: true,
            //requireEnv: false,
        })

    ]
});