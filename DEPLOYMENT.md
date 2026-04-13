# Deployment Pipeline

Rhino Custom Builds uses GitHub Actions + SSH + rsync to deploy the theme directory. Only theme files are deployed — WordPress core, plugins, uploads, and the database are managed separately on the server.

---

## Architecture

```
Developer machine (Local by Flywheel)
  │
  ├─ npm run build   →  compile SCSS + JS
  ├─ git commit + push
  │
  ▼
GitHub (Gregerl01/rhino-custom-builds)
  │
  ├─ push to dev     →  .github/workflows/deploy-staging.yml
  ├─ push to main    →  .github/workflows/deploy-production.yml
  │
  ▼
Remote server (SSH + rsync)
  │
  └─ /home/.../wp-content/themes/rhino-custom-builds-theme/
```

Theme files only. No database migrations, no plugin installs, no wp-config changes.

---

## Environments

| Environment | Domain | Branch | Deploy Trigger |
|-------------|--------|--------|---------------|
| Local | `rhino-custom-build.local` | any | Manual (Local by Flywheel) |
| Staging | `stg.rhinocustombuilds.com` | `dev` | Auto on push to `dev` |
| Production | `rhinocustombuilds.com` | `main` | Auto on push to `main` |

Staging is optional — if `STG_DEPLOY_PATH` is not set in GitHub secrets, the staging workflow exits gracefully with a notice.

---

## Daily Workflow

```
1. Work on `dev` branch locally
2. npm run build              (compile CSS + JS)
3. git add + commit + push    (push to dev)
4. Staging deploys automatically
5. Review on stg.rhinocustombuilds.com
6. Merge dev → main           (via PR or direct merge)
7. Production deploys automatically
8. Verify on rhinocustombuilds.com
```

---

## What Goes Through Git (and what doesn't)

### Deployed via rsync

- PHP templates, includes, page templates
- Compiled CSS (`css/`) and JS (`js/`)
- Theme assets (`assets/img/`, fonts, etc.)
- `style.css`, `functions.php`, `screenshot.png`

### Excluded from rsync

| Path | Reason |
|------|--------|
| `node_modules/` | Build dependencies — not needed on server |
| `src/` | Source SCSS/JS — compiled output is deployed |
| `.env` | Local environment config |
| `*.log` | Log files |
| `.DS_Store` | macOS metadata |
| `Thumbs.db` | Windows metadata |
| `.git/` | Git history |
| `.github/` | CI/CD workflows |

### Not managed by this pipeline

- WordPress core files — managed by hosting provider or WP auto-updates
- Plugins — installed/updated via wp-admin
- Media uploads (`wp-content/uploads/`) — managed on server
- `wp-config.php` — server-specific, never in Git
- Database — no migration tooling in V1

---

## Three Safety Layers

Every deploy (staging and production) runs three safety checks before any files are transferred.

### Layer 1 — Path Format Validation

No SSH connection needed. Validates the deploy path string:

- Is not empty
- Starts with `/home/`
- Ends with `wp-content/themes/rhino-custom-builds-theme/`

If any check fails, the workflow exits immediately with a clear error message. This prevents misconfigured secrets from deploying to the wrong directory.

### Layer 2 — Remote Directory Verification

SSHs into the server and inspects the target directory:

| Scenario | Result |
|----------|--------|
| Directory doesn't exist | Abort with `NO_DIR` error |
| Directory exists but is empty | Allow (first deploy) |
| `style.css` exists with "Rhino Custom Builds" | Allow (correct theme) |
| `style.css` exists with a different theme name | Abort with `WRONG_THEME` error |
| `style.css` missing but dir has files | Warn and proceed |

This prevents overwriting another theme or site if the path is pointed at the wrong directory.

### Layer 3 — Dry-Run Audit

Runs `rsync --dry-run` and counts lines starting with `deleting `. If more than 100 files would be deleted, emits a `::warning` annotation on the GitHub Actions run. Does not block the deploy — mass deletions can be legitimate (e.g., removing legacy files) but warrant a review.

---

## GitHub Secrets

Configure these in the repository settings: Settings > Secrets and variables > Actions.

| Secret | Example | Required |
|--------|---------|----------|
| `SSH_HOST` | `198.51.100.42` or `rhinocustombuilds.com` | Yes |
| `SSH_PORT` | `22` (or custom port like `2222`) | Yes |
| `SSH_USER` | `deploy` or `rhinocust` | Yes |
| `SSH_KEY` | Full private key (ed25519 or RSA) | Yes |
| `PROD_DEPLOY_PATH` | `/home/rhinocust/public_html/wp-content/themes/rhino-custom-builds-theme/` | Yes |
| `STG_DEPLOY_PATH` | `/home/rhinocust/stg.rhinocustombuilds.com/wp-content/themes/rhino-custom-builds-theme/` | No (staging is optional) |

**SSH key setup on the server:**

```bash
# On the server — add the public key to authorized_keys
mkdir -p ~/.ssh && chmod 700 ~/.ssh
echo "ssh-ed25519 AAAA... deploy@github-actions" >> ~/.ssh/authorized_keys
chmod 600 ~/.ssh/authorized_keys
```

**Path must end with a trailing slash** — rsync behavior depends on it.

---

## Post-Deploy

After a successful rsync, the workflow SSHs back in and runs:

```bash
wp litespeed-purge all
```

This clears the LiteSpeed cache so visitors see the updated theme immediately. This step uses `continue-on-error: true` — if WP-CLI isn't available or LiteSpeed isn't installed, the deploy still succeeds.

---

## Release Checklist

Before merging `dev` → `main` for a production deploy:

- [ ] All changes tested locally on `rhino-custom-build.local`
- [ ] `npm run build` runs clean (no errors, no warnings)
- [ ] CSS and JS compiled output is committed (check `css/` and `js/` directories)
- [ ] Staging deploy succeeded (if configured) and reviewed on `stg.rhinocustombuilds.com`
- [ ] No `.env`, credentials, or API keys in the commit
- [ ] Commit messages use standard prefixes (`feat:`, `fix:`, `content:`, `docs:`, `refactor:`)
- [ ] PR created from `dev` → `main` (or direct merge if solo)
- [ ] After merge: verify production deploy succeeded in GitHub Actions
- [ ] After deploy: hard-refresh `rhinocustombuilds.com` and spot-check key pages
