@php
    $user = $user ?? auth()->user();

    $triggerClass = 'flex w-full min-h-10 cursor-pointer items-center gap-2.5 rounded-action border-0 bg-transparent px-3 py-2 text-left text-m font-medium text-gray2-dark no-underline transition-colors duration-fast ease-smooth hover:text-gray3-dark focus-visible:outline-none group-data-active/item:font-bold group-data-active/item:text-gray6-dark group-data-active/item:hover:text-gray6-dark group-data-compact/shell:mx-auto group-data-compact/shell:h-12 group-data-compact/shell:w-12 group-data-compact/shell:min-h-12 group-data-compact/shell:min-w-12 group-data-compact/shell:justify-center group-data-compact/shell:gap-0 group-data-compact/shell:rounded-form group-data-compact/shell:p-0';
    $iconClass = 'size-icon shrink-0 overflow-visible fill-current text-gray2-dark transition-colors duration-fast ease-smooth group-hover/item:text-gray3-dark group-data-active/item:text-primary';
    $labelClass = 'min-w-0 flex-1 leading-[1.25] group-data-compact/shell:hidden';
    $headerBtnClass = 'flex size-8 shrink-0 cursor-pointer items-center justify-center rounded-action border-0 bg-transparent text-gray2-dark transition-colors duration-fast ease-smooth hover:text-gray3-dark focus-visible:outline-none group-data-compact/shell:size-12 group-data-compact/shell:rounded-form';
@endphp

<aside
    data-sidebar
    class="fixed top-header left-0 z-20 flex h-[calc(100vh-var(--spacing-header))] w-nav min-w-nav flex-col overflow-hidden border-r border-overlay-6 bg-background-main transition-[width,min-width] duration-fast ease-smooth group-data-compact/shell:w-nav-compact group-data-compact/shell:min-w-nav-compact"
    role="navigation"
    aria-label="Main menu"
>
    <div class="flex h-full min-h-0 flex-1 flex-col overflow-x-hidden overflow-y-auto px-3 pt-4 pb-4 group-data-compact/shell:px-2">
        <div class="mb-4 mx-3 flex items-center justify-between gap-2 group-data-compact/shell:mb-3 group-data-compact/shell:flex-col group-data-compact/shell:gap-1">
            <span class="truncate text-l font-bold text-headline group-data-compact/shell:hidden">Tracker</span>
            <div class="flex shrink-0 items-center gap-0.5 group-data-compact/shell:flex-col-reverse">
                <button type="button" class="{{ $headerBtnClass }}" aria-label="Search" title="Search">
                    <svg class="size-icon fill-current" aria-hidden="true"><use href="#icon-search"></use></svg>
                </button>
                <button
                    type="button"
                    class="{{ $headerBtnClass }}"
                    data-nav-compact-toggle
                    aria-pressed="false"
                    aria-label="Simplified view"
                    title="Simplified view"
                >
                    <svg class="size-icon fill-current" aria-hidden="true"><use href="#icon-sidebar"></use></svg>
                </button>
            </div>
        </div>

        <a
            href="{{ route('tasks.create') }}"
            class="mb-4 mx-3 flex h-9 items-center justify-center gap-2 rounded-action bg-primary px-3 text-s font-medium text-btn-primary no-underline transition-colors duration-fast ease-smooth hover:bg-primary-hover group-data-compact/shell:mx-auto group-data-compact/shell:mb-8 group-data-compact/shell:h-8 group-data-compact/shell:w-8 group-data-compact/shell:p-0"
            aria-label="Create task"
            title="Create task"
        >
            <svg class="size-4 shrink-0 fill-current" aria-hidden="true"><use href="#icon-plus"></use></svg>
            <span class="group-data-compact/shell:hidden">Create task</span>
        </a>

        <ul class="m-0 flex list-none flex-col gap-1 p-0">
            <li @class(['sidebar-item group/item relative']) @if (request()->routeIs('home')) data-active @endif>
                <a
                    href="{{ route('home') }}"
                    class="{{ $triggerClass }}"
                    aria-label="Home"
                    title="Home"
                    @if (request()->routeIs('home')) aria-current="page" @endif
                >
                    <svg class="{{ $iconClass }}" aria-hidden="true"><use href="#icon-home"></use></svg>
                    <span class="{{ $labelClass }}">Home</span>
                </a>
            </li>

            <li @class(['sidebar-item group/item relative']) @if (request()->routeIs('tasks', 'tasks.create')) data-active @endif>
                <a
                    href="{{ route('tasks') }}"
                    class="{{ $triggerClass }}"
                    aria-label="Tasks"
                    title="Tasks"
                    @if (request()->routeIs('tasks')) aria-current="page" @endif
                >
                    <svg class="{{ $iconClass }}" aria-hidden="true"><use href="#icon-clipboard-clock"></use></svg>
                    <span class="{{ $labelClass }}">Tasks</span>
                </a>
            </li>
        </ul>

        <div class="min-h-0 flex-1" aria-hidden="true"></div>

        <div class="flex flex-none flex-col">

            <ul class="m-0 flex list-none flex-col gap-1 p-0">
                <li @class(['sidebar-item group/item relative']) @if (request()->routeIs('settings')) data-active @endif>
                    <a
                        href="#"
                        class="{{ $triggerClass }}"
                        aria-label="Settings"
                        title="Settings"
                        @if (request()->routeIs('settings')) aria-current="page" @endif
                    >
                        <svg class="{{ $iconClass }}" aria-hidden="true"><use href="#icon-settings"></use></svg>
                        <span class="{{ $labelClass }}">Settings</span>
                    </a>
                </li>
                <li @class(['sidebar-item group/item relative']) @if (request()->routeIs('help')) data-active @endif>
                    <a
                        href="#"
                        class="{{ $triggerClass }}"
                        aria-label="Help"
                        title="Help"
                        @if (request()->routeIs('help')) aria-current="page" @endif
                    >
                        <svg class="{{ $iconClass }}" aria-hidden="true"><use href="#icon-info-circle"></use></svg>
                        <span class="{{ $labelClass }}">Help</span>
                    </a>
                </li>
            </ul>

            <div class="mt-3 flex items-center gap-2.5 border-t border-overlay-6 px-2 pt-3 group-data-compact/shell:justify-center group-data-compact/shell:px-0">
                @if ($user)
                    <div class="flex size-9 shrink-0 items-center justify-center rounded-full bg-gray5-light text-[11px] font-semibold tracking-letter text-headline" aria-hidden="true">
                        {{ $user->initials() }}
                    </div>
                    <div class="min-w-0 flex-1 group-data-compact/shell:hidden">
                        <p class="truncate text-s leading-tight font-semibold text-headline">{{ $user->name }}</p>
                        <p class="truncate text-[12px] leading-tight text-gray2-dark">{{ $user->email }}</p>
                    </div>

                    <form method="POST" action="{{ route('logout') }}" class="shrink-0 group-data-compact/shell:hidden">
                        @csrf
                        <button
                            type="submit"
                            class="flex size-8 shrink-0 cursor-pointer items-center justify-center rounded-action border-0 bg-transparent text-gray2-dark transition-colors duration-fast ease-smooth hover:text-gray3-dark focus-visible:outline-none group-data-compact/shell:hidden"
                            aria-label="Log out"
                            title="Log out"
                        >
                            <svg class="size-icon fill-current" aria-hidden="true"><use href="#icon-logout"></use></svg>
                        </button>
                    </form>
                @else
                    <svg class="{{ $iconClass }}" aria-hidden="true"><use href="#icon-user"></use></svg>
                @endif
            </div>
        </div>
    </div>
</aside>
