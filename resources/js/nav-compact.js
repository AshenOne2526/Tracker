const COMPACT_KEY = 'tracker-nav-compact';

const shell = document.documentElement;
const compactToggle = document.querySelector('[data-nav-compact-toggle]');

function isCompact() {
    return shell.hasAttribute('data-compact');
}

function setCompact(compact) {
    shell.toggleAttribute('data-compact', compact);

    try {
        localStorage.setItem(COMPACT_KEY, compact ? '1' : '0');
    } catch (e) {}

    if (compactToggle) {
        compactToggle.setAttribute('aria-pressed', compact ? 'true' : 'false');
        compactToggle.setAttribute('aria-label', compact ? 'Expanded view' : 'Simplified view');
        compactToggle.setAttribute('title', compact ? 'Expanded view' : 'Simplified view');
    }
}

try {
    if (localStorage.getItem(COMPACT_KEY) === '1') {
        setCompact(true);
    } else if (compactToggle) {
        compactToggle.setAttribute('aria-pressed', isCompact() ? 'true' : 'false');
    }
} catch (e) {
    if (compactToggle) {
        compactToggle.setAttribute('aria-pressed', isCompact() ? 'true' : 'false');
    }
}

compactToggle?.addEventListener('click', () => {
    setCompact(!isCompact());
});
