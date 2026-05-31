import './styles/app.css';

import { registerControllers } from './stimulus-factory';

registerControllers(require.context(
  './controllers', true, /\.[jt]sx?$/
));
