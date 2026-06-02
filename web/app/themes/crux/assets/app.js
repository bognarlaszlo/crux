import './styles/app.scss';

import { registerControllers } from './stimulus-factory';

registerControllers(require.context(
  './controllers', true, /\.[jt]sx?$/
));
