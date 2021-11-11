import { html, css, LitElement } from 'lit';
import { unsafeHTML } from 'lit/directives/unsafe-html.js';
import Shuffle from 'shufflejs/dist/shuffle.esm.js';

class PGSCredentials extends LitElement {
  static get styles() {
    return [
      css`
        nav {
          display: flex;
          gap: 2rem;
          justify-content: center;
          flex-direction: column;
        }

        button {
          color: var(--color-red);
          cursor: pointer;
          font-size: 1.1rem;
          border: 0;
          position: relative;
          background: transparent;
        }

        button[active] {
          color: var(--color-black);
          cursor: auto;
        }

        button:not(:first-child)::before {
          content: ' ';
          width: 1px;
          height: 100%;
          display: block;
          position: absolute;
          left: -13%;
          background: var(--color-gray);
        }

        ul {
          list-style: none;
          padding: 0;
        }

        li {
          cursor: pointer;
          overflow: hidden;
          width: 100%;
          aspect-ratio: 1 / 1;
          border: 10px solid var(--color-white);
        }

        li > * {
          position: absolute;
        }

        li::before {
          content: " ";
          display: block;
          width: 100%;
          height: 100%;
          position: absolute;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          z-index: 1;
          opacity: 0;
          background-color: var(--color-red);
          transition: opacity ease-in-out 0.3s;
        }

        li:hover::before {
          opacity: 0.75;
        }

        img {
          position: static;
          width: 100%;
          height: 390;
          object-fit: cover;
          transition: transform ease-in-out 0.3s;
        }

        li:hover img {
          transform: scale(1.25);
        }

        p {
          text-align: center;
          line-height: 1.5;
          margin: 0;
          padding: 1rem;
          bottom: 0;
          z-index: 3;
          transform: translateY(100%);
          background-color: var(--color-white);
          transition: transform ease-in-out 0.3s;
        }

        li:hover p {
          transform: translateY(0);
        }

        h2 {
          color: var(--color-white);
          text-align: center;
          line-height: 1.2;
          width: 100%;
          opacity: 0;
          top: 0;
          z-index: 2;
          padding: 1rem 2rem;
          box-sizing: border-box;
          text-shadow: 1px 1px var(--color-black);
          transition: opacity ease-in-out 0.3s;
        }

        li:hover h2 {
          opacity: 1;
        }

        @media only screen and (min-width: 640px) {
          nav {
            flex-direction: row;
          }

          li {
            width: 50%;
          }
        }

        @media only screen and (min-width: 1024px) {
          li {
            width: 33.333333%;
          }
        }
      `
    ]
  }

  static get properties() {
    return {
      credentials: {
        type: Object
      },
      shuffleInstance: {
        type: Object
      },
      currentCategory: {
        type: String
      }
    }
  }

  constructor() {
    super();

    this.domain = window.location.origin;
    this.currentCategory = '';
  }

  firstUpdated() {
    const shuffleElement = this.shadowRoot.querySelector('ul');

    this.fetchCredentials();

    this.shuffleInstance = new Shuffle(shuffleElement, {
      itemSelector: 'li',
    });
  }

  updated() {
    setTimeout(() => {
      this.shuffleInstance.resetItems();
      this.shuffleInstance.update();
      this.shuffleInstance.filter(this.currentCategory);
    }, 1);
  }

  render() {
    return html`
      <nav>
        <button ?active="${this.currentCategory === ''}" @click="${() => this.filterCategory('')}">Show All</button>
        <button ?active="${this.currentCategory === 'associations'}" @click="${() => this.filterCategory('associations')}">Associations</button>
        <button ?active="${this.currentCategory === 'awards'}" @click="${() => this.filterCategory('awards')}">Awards</button>
        <button ?active="${this.currentCategory === 'certifications'}" @click="${() => this.filterCategory('certifications')}">Certifications</button>
      </nav>
      <ul>
        ${this.makeCredentials()}
      </ul>
    `;
  }

  async fetchCredentials() {
    const credentials = await fetch(`${this.domain}/?rest_route=/wp/v2/credentials&per_page=99&_embed&order=asc`)
      .then(response => response.text())
      .then(text => {
        try {
          return JSON.parse(text);
        } catch (error) {
          // eslint-disable-next-line no-console
          console.error(error);
          return null;
        }
      });

    this.credentials = credentials;
  }

  makeCredentials() {
    if (this.credentials) {
      return this.credentials.map((credential) => {
        const { category } = credential;
        const categoryArray = [category];
        const groups = JSON.stringify(categoryArray);

        return html`
          <li data-groups="${groups}">
            <img src="${credential._embedded['wp:featuredmedia'][0].source_url}" alt="${credential._embedded['wp:featuredmedia'][0].alt_txt}" />
            <h2>${unsafeHTML(credential.title.rendered)}</h2>
            ${unsafeHTML(credential.excerpt.rendered)}
          </li>
        `;
      });
    }

    return null
  }

  filterCategory(category) {
    this.currentCategory = category;
  }
}

window.customElements.define('pgs-credentials', PGSCredentials);
