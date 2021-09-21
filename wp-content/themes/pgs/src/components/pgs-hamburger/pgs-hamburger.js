import { html, css, LitElement } from 'lit';
import 'kemet-ui';

class PGSHamburger extends LitElement {
  static get styles() {
    return [
      css`
        button {
          cursor: pointer;
          color: var(--color-rich-white);
          border: 0;
          background: none;
        }
      `
    ]
  }

  render() {
    return html`
      <button @click="${() => {this.handleClick()}}">
        <kemet-icon set="bootstrap" icon="list" size="32" ></kemet-icon>
      </button>
    `;
 }

 // eslint-disable-next-line class-methods-use-this
 handleClick() {
   const drawer = document.querySelector('kemet-drawer');
   drawer.opened = !drawer.opened;
 }
}

window.customElements.define('pgs-hamburger', PGSHamburger);
