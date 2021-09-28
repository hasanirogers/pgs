import { html, css, LitElement } from 'lit';
import {
  serviceProduction,
  serviceContainment,
  serviceGreen,
  serviceWashing,
  serviceTesting,
  serviceDefense
} from '../../assets/svgs.js';

class PGSServices extends LitElement {
  static get styles() {
    return [
      css`
        :host {
          display: block;
          padding: 2rem;
          text-align: center;
          color: var(--color-rich-white);
          background: var(--color-red);
        }

        :host > * {
          margin: auto;
        }

        a {
          text-decoration: none;
          display: block;
          color: var(--color-rich-white);
          transition: color 300ms ease;
        }

        h2 {
          font-size: 2.5rem;
          padding: 2rem 4rem 2rem 4rem;
          margin: auto;
          margin-bottom: 4rem;
          max-width: var(--page-width);
          border-bottom: 1px solid var(--color-rich-white);
        }

        ul {
          display: flex;
          align-items: center;
          justify-content: space-around;
          padding: 0;
          list-style: none;
          margin: auto;
          max-width: 1440px;
          flex-wrap: wrap;
        }

        @media screen and (min-width: 1025px) {
          ul {
            flex-wrap: nowrap;
          }
        }

        li span {
          display: block;
          height: 128px;
        }

        li strong {
          display: block;
          height: 128px;
          margin-top: 1rem;
          padding: 0 1rem;
        }

        svg {
          width: 128px;
          height: 128px;
          fill: var(--color-rich-white);
          transition: all 300ms ease;
        }

        a:hover {
          color: var(--color-black);
        }

        a:hover svg {
          fill: var(--color-black);
        }

        #washing {
          width: 300px;
          height: auto;
          margin: -1rem -5rem;
        }
      `
    ]
  }

  render() {
    return html`
      <section>
        <h2>Our Services</h2>
        <ul>
          <li>
            <a href="/services/production-assembly-service-assembly">
              <span>${serviceProduction}</span>
              <strong>Production &amp; Service Assembly</strong>
            </a>
          </li>
          <li>
            <a href="/services/component-recertification">
              <span>${serviceContainment}</span>
              <strong>Recertification &amp; Containment</strong>
            </a>
          </li>
          <li>
            <a href="/services/global-green">
              <span>${serviceGreen}</span>
              <strong>Global Green Impact</strong>
            </a>
          </li>
          <li>
            <a href="/services/industrial-washing-derust">
              <span>${serviceWashing}</span>
              <strong>Derust &amp; Industrial Washing</strong>
            </a>
          </li>
          <li>
            <a href="/services/defect-testing">
              <span>${serviceTesting}</span>
              <strong>Detection &amp; Defect Testing</strong>
            </a>
          </li>
          <li>
            <a href="/services/defense">
              <span>${serviceDefense}</span>
              <strong>Defense</strong>
            </a>
          </li>
        </ul>
      </section>
    `;
  }
}

window.customElements.define('pgs-services', PGSServices);
