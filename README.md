# Cephas & Lynda — Wedding Website

This repository contains a small static wedding website for Cephas & Lynda. It's built with plain HTML, CSS and JavaScript and includes a programme outline page, background audio, and some simple interactive behaviors.

## What’s included

- `index.html` — The main invitation page (hero, RSVP links, etc.).
- `programmes.html` — Wedding programme outline with time-based highlighting.
- `thank-you.html` — Simple thank-you page.
- `contact-form-handler.php` — Backend handler used by the contact form (if deployed to a PHP-capable host).
- `css/`, `js/`, `images/`, `audio/`, `fonts/`, `sass/` — Static assets used by the site.

## Local preview

Because this is a static site, the easiest way to preview it locally is to open `index.html` or `programmes.html` directly in your browser. For a slightly better dev experience (so fetches behave like a server), run a simple local HTTP server.

Using Python 3 (works on Windows with WSL or Git Bash):

```bash
# From the project root
python -m http.server 8000
# Then open http://localhost:8000 in your browser
```

Or using Node (http-server):

```bash
npx http-server -p 8000
# Then open http://localhost:8000
```

## Notes / Behavior

- Background audio (file: `audio/bgaudio.mp3`) attempts to autoplay at a low volume. Modern browsers may block autoplay until the user interacts (click/keydown). The site adds a small fallback to play on the user's first interaction if autoplay is blocked.

- Programme highlighting (on `programmes.html`) is driven by client-side JavaScript. It reads `data-start` attributes on each `.list-group-item` and marks items as `past`, `on`, or `upcoming` depending on the current time. The script:

  - Runs on page load
  - Re-checks every 30 seconds
  - Re-checks when the page becomes visible again (e.g., after switching tabs)

- Times in the programme are interpreted as local times (HH:MM, 24-hour). Make sure the `data-start` attribute values match the displayed times if you edit the list.

## Editing

- Styles are in `css/style.css` and some page-specific inline styles in the HTML files. Sass sources are available in the `sass/` folder if you want to rebuild styles.

- JavaScript for interactions is in `js/main.js`, and small page-specific scripts are in each HTML file.

## License & Credits

This project is personal for Cephas & Lynda. See `LICENSE` for license details. Site made with ❤️ by Kojo Shaddy.

---

If you want, I can:

- Add a quick `start` script in package.json to run a local server,
- Add a small banner on pages to show audio status (playing/paused), or
- Add unit-like tests for the simple time-parsing function.

Tell me which (if any) of those you'd like next.
