import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  connect() {
    this.element.innerHTML = "Stimulus is working!";
    console.log("Hello from Core Context!");
  }
}
