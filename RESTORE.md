# RESTORE.md — How to undo / recover the Rooval Roofing site

**Read this first, before you panic-click anything.**

This site is "split-brain" for backups, and understanding that is the whole game:

| Where it lives | Examples | How you get it back |
|---|---|---|
| **WordPress database** (on Hostinger) | Every page's text & Elementor layout, the menu, plugin settings, Rank Math, WPForms leads, reviews | **Backups + built-in revisions.** Git canNOT restore these. |
| **This Git repo** | The WPCode snippet *code*, schema, meta text, content drafts, the menu *reference* | A human/AI copies the saved text back into WordPress. It is a **history & reference**, not a live restore. |

> ⚠️ **The single most important truth:** This repo does **not** back up the live website. It is a *typed history* of the code-like pieces. The thing that actually saves you when a page breaks or an update goes wrong is a **database/site backup** (Hostinger + UpdraftPlus) and **built-in revisions** — see below. Keep both layers alive.

---

## 🟢 OWNER-ALONE card — safe things you can do yourself, no help needed

1. **A page looks wrong right after you edited it** → open it in **Elementor → hamburger menu → History/Revisions**, click the previous version. Instant, undoes only that page. (For a non-Elementor page: **WordPress editor → Revisions** in the right sidebar.)
2. **Restore the whole site to an earlier day** (after a bad plugin update, a setting you can't trace, or "everything looks broken") → **hPanel → Files → Backups → Restore**, pick the date *just before* the problem. Takes ~10–15 min. ⚠️ This rewinds **everything** to that date — see the lead warning below.
3. **Restore from the off-site copy** (if Hostinger itself is down/unavailable) → **WordPress admin → UpdraftPlus → Restore**, pick a backup. *(Only works once UpdraftPlus is installed — see Setup status.)*

If the fix you need isn't one of these three, it's a "needs help" task → call your developer/AI. Don't hand-edit code or databases under pressure.

> 💰 **BEFORE you do any full restore (#2 or #3): export your leads first.**
> A full restore **erases every form submission since the backup date** — those are customer inquiries (money). Go to **WordPress → WPForms → Entries → Export** (CSV) and save it, *then* restore. If the site is too broken to reach WPForms, ask for help pulling leads from the database before rewinding.

---

## Restore playbook by situation

### 1. A single page's content looks wrong (most common)
Use **built-in revisions first** — granular, instant, touches nothing else.
- Elementor page → Elementor editor → History → Revisions → restore prior version.
- Normal page/post → WP editor → Revisions panel → restore.
- No backup needed. This is owner-safe.

### 2. A WPCode snippet broke something (or you want the old version)
- The repo holds the last-known-good code: `snippets/*.html` / `snippets/*.php`.
- **If the site still loads:** WordPress → Code Snippets → open the snippet → paste the repo copy back → Update. (For a quick "stop the bleeding," just toggle the snippet **off**.)
- **If a PHP snippet caused a white screen / fatal error** (only `city-pages-faq-faqpage-schema-2621.php` is PHP): this can take the whole site down. Recover by restoring the database from the most recent pre-change backup (playbook #4), **or** have a developer disable WPCode via the host file manager. *Needs help.*

### 3. An Elementor page's whole layout got mangled (not just one widget)
- **Best:** Elementor → History/Revisions on that page (see #1).
- **If revisions are gone:** restore the database from a backup (playbook #4). The repo does **not** store full Elementor layouts (they're 1–2 MB DB blobs that restore lossily) — backups own this.
- After any structural restore, do **Elementor → Tools → Regenerate CSS & Data** so it doesn't serve a stale cached render.

### 4. Bad plugin/theme/core update, or a setting change you can't trace
- This is a **database-level** problem. Git can't fix it. Restore from a backup:
  - **Fastest:** hPanel → Files → Backups → pick the date *just before* the change → Restore.
  - **Off-site alternative:** UpdraftPlus → Restore.
- ⚠️ Point-in-time = rewinds **everything** since that date. **Export WPForms leads first** (see the 💰 warning).

### 5. The Header menu got wiped or reordered
- Rebuild by reference from `config/nav-menu-header-6.json` in **Appearance → Menus** (this is a reference copy, not an auto-restore — menus are DB-only).
- Or, if the change was recent and isolated, a DB backup (playbook #4) is faster.

### 6. Worst case — the Hostinger account itself is lost/compromised
- Hostinger's own backups are gone with it (same provider = single point of failure).
- Recover from the **off-site UpdraftPlus copy** (Google Drive) onto a fresh WordPress install. This is the disaster floor and the entire reason the off-site layer exists.
- You'll also need account access (see Account & access recovery).

**Rule of thumb:** revisions for one page → Git text for one snippet → a backup for real breakage. Always pick the backup **date** carefully; a restore is a point-in-time rewind, not a merge.

---

## Setup status of the backup layers (keep this current)

- [ ] **Hostinger native backups** — confirm plan tier & frequency (Premium/Single = weekly; Business/Cloud = daily). hPanel → Files → Backups. *Needs owner: verify/enable.*
- [ ] **One baseline manual backup taken** (hPanel → Files → Backups → Generate new backup). *Limit: one manual backup per 24 h.*
- [ ] **UpdraftPlus Free installed** + scheduled (daily DB, weekly files) to the owner's Google Drive. *Needs owner: install + Google Drive auth (OAuth).*
- [ ] **Restore test done once** (confirm a backup actually restores, ideally to a staging copy) — "a backup never test-restored is not a backup."
- [x] **Built-in revisions** — on by default in WordPress + Elementor (free, already working).
- [x] **Git history of code-like artifacts** — this repo (snippets, schema, meta, menu, content docs).

> **Media/images gap (be aware):** uploaded job photos and per-city images live in the WordPress Media Library (files on the host). They are covered by Hostinger backups and UpdraftPlus *weekly file* backups — so up to ~7 days of new photos could be missing from the off-site copy. Don't treat the off-site DB copy alone as a full restore of images.

> **Verify the off-site job is actually running:** UpdraftPlus Free won't email you on failure. Put a recurring reminder (monthly) to open UpdraftPlus and confirm the last successful backup date is recent.

---

## Account & access recovery (record where these live — NOT the passwords)

If you ever have to rebuild from scratch, you need access to all of these. Keep credentials in a password manager; keep *pointers* here:
- **Hosting / DB / native backups:** Hostinger hPanel (login: roovalroofing1@gmail.com). Keep 2FA recovery codes.
- **Domain registrar:** Squarespace Domains (formerly Google Domains) — but **DNS is managed in Hostinger** (NS → dns-parking.com). Restoring files to a new host is useless if you can't repoint DNS, so keep Squarespace login too.
- **Off-site backups:** Google Drive (roovalroofing1@gmail.com) + any UpdraftPlus encryption passphrase (if set) recorded **outside** WordPress.
- **Analytics/tracking:** GA4 `G-7D5VK6JDVE` (direct gtag via WPCode Global Header); GTM web `GTM-K9Q9S982` / server `GTM-57PQW8MG`; FB Pixel `470867249167206`.
- **Git/GitHub:** github.com/roovalroofing1-png (push over SSH from this machine).
- **Elementor Pro:** license currently inactive — pages still render/edit; note the active Elementor version before importing any old layout, as imports can behave differently across versions.

---

*This file is the single source of truth for "how do I undo this." Update it whenever the backup setup or the artifact list changes.*
