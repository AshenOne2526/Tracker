document.querySelectorAll('[data-password-toggle]').forEach((toggle) => {
    toggle.addEventListener('click', () => {
        const input = document.getElementById(toggle.getAttribute('aria-controls'));

        if (!input) {
            return;
        }

        const visible = input.type === 'password';
        input.type = visible ? 'text' : 'password';
        toggle.setAttribute('aria-pressed', visible ? 'true' : 'false');
        toggle.setAttribute('aria-label', visible ? 'Hide password' : 'Show password');
        toggle.querySelector('[data-password-icon="show"]')?.classList.toggle('hidden', visible);
        toggle.querySelector('[data-password-icon="hide"]')?.classList.toggle('hidden', !visible);
    });
});
