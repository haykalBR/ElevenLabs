var Encore = require('@symfony/webpack-encore');
var dotenv = require('dotenv');
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}
Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/app.js')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .configureDefinePlugin(options => {
        const env = dotenv.config();
        if (env.error) {
            throw env.error;
        }
    })
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = 3;
    })
    .autoProvideVariables({
        $: 'jquery',
        jQuery: 'jquery'
    })
    .enableSassLoader()
    .enableTypeScriptLoader()
;
module.exports = Encore.getWebpackConfig();



