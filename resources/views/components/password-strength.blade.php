<div class="mt-3 hidden" data-password-strength-panel>
    <div class="flex gap-1.5" aria-hidden="true">
        @for ($i = 0; $i < 4; $i++)
            <div
                class="h-1 flex-1 rounded-full bg-gray4-light transition-[background-color] duration-fast ease-smooth"
                data-password-strength-bar
            ></div>
        @endfor
    </div>

    <p class="mt-2 text-s" aria-live="polite">
        <span class="font-bold" data-password-strength-label></span><span class="text-gray2-dark"> password strength</span>
    </p>
</div>
