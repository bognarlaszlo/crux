import { startStimulusApp } from '@symfony/stimulus-bridge';
import { definitionsFromContext } from '@hotwired/stimulus-webpack-helpers';

export const app = startStimulusApp(require.context(
  '@symfony/stimulus-bridge/lazy-controller-loader!./controllers',
  true,
  /\.[jt]sx?$/
));

export function registerControllers(context) {
  app.load(definitionsFromContext(context));
}
