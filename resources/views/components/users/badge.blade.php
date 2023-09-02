<span
    @class([
        'fw-bold fs-8 px-2 py-1 ms-2 badge',
        'badge-light-success' => $user->isAdmin(),
        'badge-light-warning' => ! $user->isAdmin(),
    ])>
    {{ ucwords($user->type) }}
</span>
