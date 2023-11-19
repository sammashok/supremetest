<x-app title="Wallets"  :links="['Admin', 'Wallets']">
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid " >
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-xxl ">
                    @if(request()->routeIs('users.wallets.index', user()) && $wallets->isEmpty())
                        <!--begin::Card-->
                        <div class="card ">
                            <!--begin::Card body-->
                            <div class="card-body p-0">
                                <!--begin::Wrapper-->
                                <div class="card-px text-center py-10 my-10">
                                    <!--begin::Title-->
                                    <h2 class="fs-2x fw-bold mb-10">Hi, {{ user()->name }}! 👋</h2>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <p class="text-gray-400 fs-4 fw-semibold mb-0">
                                        You have not added any Wallet yet.<br/>
                                        Kindly click on the button, let's create your first wallet
                                    </p>
                                    <!--end::Description-->
                                    <!--begin::Illustration-->
                                    <div class="text-center px-3 mb-10">
                                        <img class="mw-100 mh-300px" src="{{ asset('admin/media/illustrations/sketchy-1/2.png') }}" alt="" />
                                    </div>
                                    <!--end::Illustration-->
                                    <!--begin::Action-->
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-wallet-modal">Create Wallet</a>
                                    <!--end::Action-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    @else
                        <div class="card card-flush">
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"/>
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <input type="text" id="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Wallets" aria-label="search">
                                </div>
                                <!--end::Search-->
                            </div>
                            @if(request()->routeIs('users.wallets.index', user()))
                                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add-wallet-modal">Add New Wallet</a>
                                </div>
                            @endif
                        </div>
                        <div class="card-body pt-0">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" data-table data-search-using="#search">
                                <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>Reference ID</th>
                                    <th>Type</th>
                                    <th>Balance</th>
                                    <th>Min. Balance</th>
                                    <th>Monthly Interest rate</th>
                                    <th>Owner</th>
                                </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach($wallets as $wallet)
                                        <tr>
                                            <td data-order="{{ $wallet->reference }}" class="min-w-50px">
                                                <a href="{{ route('wallets.show', $wallet) }}" class="text-gray-800 text-hover-primary fw-bold">#{{ $wallet->reference }}</a>
                                            </td>
                                            <td class="pe-0">
                                                <span @class([
                                                        'badge',
                                                        'badge-light-primary' => $wallet->isClassic(),
                                                        'badge-light-success' => $wallet->isPremium(),
                                                        'badge-light-warning' => $wallet->isGolden()
                                                ])>
                                                    {{ str($wallet->type->name)->title() }}
                                                </span>
                                            </td>
                                            <td class="pe-0" data-order="">
                                                <span class="fw-bold">₦{{ $wallet->balance }}</span>
                                            </td>
                                            <td data-order="">
                                                <span class="fw-bold">₦{{ $wallet->type->min_balance }}</span>
                                            </td>
                                            <td class="min-w-50px" data-order="}">
                                                <span class="fw-bold">{{ number_format($wallet->type->monthly_interest_rate,0,'','') }}%</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-circle symbol-35px overflow-hidden me-2">
                                                        <a href="{{ route('users.show', $wallet->user) }}">
                                                            <div class="symbol-label">
                                                                <img src="{{ $wallet->user->photo }}" alt="" class="w-100" />
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="ms-2">
                                                        <a href="{{ route('users.show', $wallet->user) }}" class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $wallet->user->name }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->
    <!--begin:: Add Wallet Modal-->
    <div class="modal fade" id="add-wallet-modal" tabindex="-1" aria-labelledby="add-wallet-modal-label" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Wallet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form x-data="{ min : 1000 }" x-submit action="{{ route('api.wallets.store') }}" method="POST"
                    >
                        <div class="mb-10">
                            <label for="type" class="form-label">Wallet Type</label>
                            <select id="type" name="type_id" class="form-control form-select form-select-solid form-select-lg fw-semibold" required @change="min = $event.target.selectedOptions[0].dataset.min">
                                <option></option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" data-min="{{ $type->min_balance }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-10">
                            <label for="balance" class="form-label">Fund Wallet</label>
                            <input class="form-control" type="number" name="balance" :value="min" :min="min" required>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create Wallet</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end:: Add Wallet Modal-->

</x-app>
