const Encore = require('@symfony/webpack-encore');

const THEME_PUBLIC_PATH = '/app/themes/crux/public';

Encore
  .setOutputPath('public/build/')
  .setPublicPath(`${THEME_PUBLIC_PATH}/build`)

  .addEntry('app', './assets/app.js')
  .addEntry('home', './assets/home.js')

  .configureCssLoader((options) => {
    options.url = {
      filter: (url) => {
        return !url.startsWith(`${THEME_PUBLIC_PATH}`);
      },
    };
  })

  .enableStimulusBridge('./assets/controllers.json')
  .enableSassLoader((options) => {
    options.sassOptions = {
      quietDeps: true,
      silenceDeprecations: ['import'],
    }
  })
  .enablePostCssLoader()

  .splitEntryChunks()
  .enableSingleRuntimeChunk()
  .enableBuildNotifications()
  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())
  .cleanupOutputBeforeBuild()

  .autoProvideVariables({
    bootstrap: 'bootstrap'
  });

module.exports = Encore.getWebpackConfig();
