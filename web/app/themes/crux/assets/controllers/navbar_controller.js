import { Controller } from '@hotwired/stimulus';

import { toggleClassList } from "../utils/dom-utils";

export default class extends Controller {
  static values = {
    theme: { type: String, default: 'light' },
  };

  static classes = ['visible'];

  show() {
    this.update(true);
  }

  hide() {
    this.update(false);
  }

  update(visible) {
    this.element.dataset.bsTheme = visible ? 'light' : this.themeValue;
    toggleClassList(this.element, this.visibleClasses, visible);
  }
}
