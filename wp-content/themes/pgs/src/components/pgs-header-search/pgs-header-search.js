import { html, css, LitElement } from 'lit';
import 'kemet-ui';

export class PGSHeaderSearch extends LitElement {
  static get styles() {
    return [
      css`
        :host {
          display: flex;
          align-items: center;
          height: 100%;
        }

        button {
          font: inherit;
          color: var(--color-rich-white);
          cursor: pointer;
          border: 0;
          background: transparent;
        }

        :host([expanded]) button {
          margin-left: 1rem;
          font-weight: 500;
          font-size: 0.9rem;
          padding: 0.4rem 0.75rem;
          border: 2px solid var(--color-rich-white);
          border-radius: 6px;
          background: var(--color-rich-white);
          color: var(--color-red);
        }

        form {
          margin: 0;
          max-width: 0;
          overflow: hidden;

        }

        :host([expanded]) form {
          max-width: none;
        }

        input {
          border: 0;
          width: 0;
          padding: 0.6rem;
          transition: all 300ms ease;
        }

        :host([expanded]) input {
          width: 220px;
        }
      `
    ];
  }

  static get properties() {
    return {
      expanded: {
        type: Boolean,
        reflect: true,
      }
    }
  }

  constructor() {
    super();

    this.expanded = false;
  }

  render() {
    return html`
      <form @submit="${(event) => this.handleSubmit(event)}">
        <input type="text" />
      </form>
      <button @click="${() => this.handleClick()}">
        ${this.makeButton()}
      </button>
    `;
  }

  search() {
    const terms = this.shadowRoot.querySelector('input').value;
    window.location.href = `${window.location.origin}/?s=${terms}`;
  }

  handleClick() {
    if (!this.expanded) {
      this.expanded = true;
      console.log('expand');
    } else {
      this.search();
    }
  }

  handleSubmit(event) {
    event.preventDefault();
    this.search();
  }

  makeButton() {
    if (this.expanded) {
      return html`Search`;
    }

    return html`<kemet-icon set="bootstrap" icon="search" size="24"></kemet-icon>`;
  }
}

window.customElements.define('pgs-header-search', PGSHeaderSearch);
