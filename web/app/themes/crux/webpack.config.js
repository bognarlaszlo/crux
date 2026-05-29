const Encore = require('@symfony/webpack-encore');

Encore
  .setOutputPath('public/build/')
  .setPublicPath('/app/themes/crux/public/build')

  .addEntry('app', './assets/app.js')

  .enableStimulusBridge('./assets/controllers.json')

  .configureCssLoader((options) => {
    options.url = false
  })
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
