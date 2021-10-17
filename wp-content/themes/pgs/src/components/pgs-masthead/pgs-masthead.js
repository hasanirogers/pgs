import { html, css, LitElement } from 'lit';
import { unsafeHTML } from 'lit/directives/unsafe-html.js';
import 'kemet-ui';
import Glide from '@glidejs/glide';

import { backArrow, forwardArrow } from '../../assets/svgs.js';

class PGSMasthead extends LitElement {
  static get styles() {
    return [
      css`
        :host {
          display: block;

        }

        img {
          object-fit: cover;
          width: 100%;
          height: 100%;
          min-width: 100vh;
          filter: brightness(0.85);
        }

        h2 {
          font-weight: 600;
          font-size: 2.5rem;
          background: rgba(0,0,0,0.5);
          display: inline-block;
          margin: 0;
          padding: 1rem;
          text-shadow: 2px 2px var(--color-black);
        }

        h3 {
          font-weight: 400;
          font-size: 1.5rem;
          margin: 1rem;
          text-shadow: 1px 1px var(--color-black);
        }

        section {
          overflow: hidden;
          height: 540px;
        }

        .glide__title {
          position: absolute;
          bottom: 2rem;
          left: 2rem;
          width: 100%;
          color: var(--color-rich-white);
          padding-right: 2rem;
        }

        .glide__title > div {
          width: 100%;
          max-width: var(--page-width);
          margin: auto;
        }

        .glide__arrow {
          display: none;
        }

        .glide__slide {
          position: relative;
        }

        .glide__track,
        .glide__slides {
          height: 100%;
        }

        .glide__bullets {
          display: flex;
          gap: 0.75rem;
          position: absolute;
          bottom: 1rem;
          right: 10%;
        }

        .glide__bullet {
          cursor: pointer;
          width: 18px;
          height: 18px;
          border-radius: 3px;
          border: 2px solid var(--color-rich-white);
          background: var(--color-rich-white);
        }

        .glide__bullet--active {
          cursor: auto;
          background: transparent;
        }

        @media only screen and (min-width: 768px) {
          .glide__arrow {
            cursor: pointer;
            display: block;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            border: 0;
            opacity: 0;
            background: transparent;
            transition: opacity 300ms ease;
          }

          .glide__arrow svg {
            width: 128px;
            fill: var(--color-rich-white);
          }

          section:hover .glide__arrow {
            opacity: 1;
          }

          .glide__arrow--left {
            left: 2rem;
          }

          .glide__arrow--right {
            right: 2rem;
          }
        }
      `
    ];
  }

  static get properties() {
    return {
      slidesData: {
        type: Object
      }
    }
  }

  constructor() {
    super();

    this.domain = window.location.origin;
  }

  firstUpdated() {
    this.fetchSlides();
  }

  updated() {
    if (this.slidesData) this.initGlide();
  }

  render() {
    return html`
      <link rel="stylesheet" href="${this.domain}/wp-content/themes/pgs/bundles/frontend.css" />
      <section class="glide">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            ${this.makeSlides()}
          </ul>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
          <button class="glide__arrow glide__arrow--left" data-glide-dir="&gt;">
            ${backArrow}
          </button>
          <button class="glide__arrow glide__arrow--right" data-glide-dir="&lt;">
            ${forwardArrow}
          </button>
        </div>
        <div class="glide__bullets" data-glide-el="controls[nav]">
          ${this.makePagination()}
        </div>
      </section>
    `;
  }

  async fetchSlides() {
    const slides = await fetch(`${this.domain}/?rest_route=/wp/v2/slider&per_page=99&_embed&order=asc`)
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

    this.slidesData = slides;
  }

  makeSlides() {
    if (this.slidesData) {
      return this.slidesData.map((slide) => html`
        <li class="glide__slide">
          <img src="${slide._embedded['wp:featuredmedia'][0].source_url}" alt="${slide._embedded['wp:featuredmedia'][0].alt_txt}" />
          <div class="glide__title">
            <div>
              <h2>${unsafeHTML(slide.title.rendered)}</h2>
              <h3>${unsafeHTML(slide.metadata.meta_box_slider_options_subtitle[0])}</h3>
            </div>
          </div>
        </li>
      `);
    }

    return null
  }

  makePagination() {
    if (this.slidesData) {
      const slides = this.slidesData.map((slide, index) => {
        const slideID = `=${index}`;

        return html`
          <button class="glide__bullet" data-glide-dir="${slideID}" aria-label="${slide.title.rendered}"></button>
        `;
      });

      return slides;
    }

    return null;
  }

  initGlide() {
    const glideElement = this.shadowRoot.querySelector('.glide');
    this.glide = new Glide(glideElement).mount();
  }
}

window.customElements.define('pgs-masthead', PGSMasthead);
