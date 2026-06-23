import { Controller } from "@hotwired/stimulus";

import BlazeSlider from "blaze-slider";
import 'blaze-slider/dist/blaze.css';

import '@styles/base/components/slider.scss';

export default class extends Controller
{
  static values = {
    config: { type: Object, default: {} },
  };

  connect() {
    this.slider = new BlazeSlider(this.element, this.config);
  }

  disconnect() {
    this.slider?.destroy();
  }

  get config() {
    const { all, ...responsive } = this.configValue;

    return {
      all: {
        slidesToShow: 1,
        slideGap: '32px',
        ...all,
      },
      ...responsive,
    }
  }
}
