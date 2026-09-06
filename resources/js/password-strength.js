const INACTIVE_BAR_CLASS = 'bg-gray4-light';

/** UI config per strength level (1–4). Level 0 means hidden / no input. */
const LEVELS = {
    1: { label: 'Weak', barColor: 'bg-red-light', textColor: 'text-red-light' },
    2: { label: 'Good', barColor: 'bg-amber-500', textColor: 'text-amber-500' },
    3: { label: 'Strong', barColor: 'bg-green2-contrast-light', textColor: 'text-green2-contrast-light' },
    4: { label: 'Very strong', barColor: 'bg-blue-contrast', textColor: 'text-blue-contrast' },
};

const BAR_COLORS = Object.values(LEVELS).map((level) => level.barColor);
const TEXT_COLORS = Object.values(LEVELS).map((level) => level.textColor);

/**
 * Returns password strength level 0–4.
 * One point each for length >= 8, mixed case, digit, special char.
 * Passwords shorter than 8 chars or with only one point are capped at Weak (1).
 *
 * @param {string} password
 * @returns {number} 0 = empty, 1 = Weak, 4 = Very strong
 */
function scorePassword(password) {
    if (!password) {
        return 0;
    }

    let score = 0;

    if (password.length >= 8) {
        score++;
    }

    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) {
        score++;
    }

    if (/\d/.test(password)) {
        score++;
    }

    if (/[^a-zA-Z0-9]/.test(password)) {
        score++;
    }

    if (password.length < 8 || score <= 1) {
        return 1;
    }

    return score;
}

/**
 * Applies active/inactive bar colors for the given level.
 *
 * @param {NodeListOf<Element>} bars
 * @param {number} level Strength level 1–4
 */
function setBarColors(bars, level) {
    const activeColor = LEVELS[level].barColor;

    bars.forEach((bar, index) => {
        bar.classList.remove(...BAR_COLORS, INACTIVE_BAR_CLASS);
        bar.classList.add(index < level ? activeColor : INACTIVE_BAR_CLASS);
    });
}

/**
 * Sets label text and text color for the given level.
 *
 * @param {HTMLElement} label
 * @param {number} level Strength level 1–4
 */
function setLabel(label, level) {
    label.textContent = LEVELS[level].label;
    label.classList.remove(...TEXT_COLORS);
    label.classList.add(LEVELS[level].textColor);
}

/**
 * Reads input value and updates panel visibility, bars, label, and submit button state.
 * Disables submit when level is Weak (1).
 *
 * @param {HTMLElement} root `[data-password-strength]` wrapper element
 */
function updateStrength(root) {
    const input = root.querySelector('input[type="password"], input[type="text"]');
    const panel = root.querySelector('[data-password-strength-panel]');
    const bars = root.querySelectorAll('[data-password-strength-bar]');
    const label = root.querySelector('[data-password-strength-label]');
    const form = root.closest('form');
    const submitButton = form?.querySelector('button[type="submit"]');

    if (!input || !panel || !label || bars.length === 0) {
        return;
    }

    const level = scorePassword(input.value);

    if (level === 0) {
        panel.classList.add('hidden');
        submitButton?.removeAttribute('disabled');

        return;
    }

    panel.classList.remove('hidden');
    setBarColors(bars, level);
    setLabel(label, level);

    if (level === 1) {
        submitButton?.setAttribute('disabled', 'disabled');
    } else {
        submitButton?.removeAttribute('disabled');
    }
}

/** Binds input and submit handlers for each `[data-password-strength]` wrapper. */
document.querySelectorAll('[data-password-strength]').forEach((root) => {
    const input = root.querySelector('input[type="password"], input[type="text"]');
    const form = root.closest('form');

    if (!input) {
        return;
    }

    input.addEventListener('input', () => updateStrength(root));

    form?.addEventListener('submit', (event) => {
        if (scorePassword(input.value) === 1) {
            event.preventDefault();
        }
    });

    updateStrength(root);
});
