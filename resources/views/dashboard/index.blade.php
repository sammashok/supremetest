<x-app title="Dashboard" :links="['Home', 'Dashboard']">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10">
                    <div class="col-12 mb-5 mb-xl-10">
                        <div class="card card-flush rounded-4" data-bs-theme="light"
                             style="background-color: #202B46; background-image:url('{{ asset('admin/media/svg/shapes/widget-bg-2.png') }}')"
                        >
                            <div class="card-body mt-6 bgi-no-repeat bgi-size-cover bgi-position-x-center">
                                <div class="text-white mb-9">
                                    <h4 class="text-white">Promo! Promo! Promo!
                                        <span class="svg-icon svg-icon-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"/>
                                                <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"/>
                                            </svg>
                                        </span>
                                    </h4>
                                    <div class="mt-5">
                                        <span>You stand a chance of winning something special on each deposit you make. - </span>
                                        <span class="position-relative d-inline-block">
                                            <span class="text-success opacity-75-hover"> You may be our lucky winner .</span>
                                            <span class="position-absolute opacity-25 bottom-0 start-0 border-4 border-success border-bottom w-100"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5 g-xl-10">
                    <div class="col-12 mb-5 mb-xl-10">
                        <div class="card card-flush">
                            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                <div class="card-title">
                                    <h4>My Wallets</h4>
                                </div>
                                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                    <a href="" class="btn btn-sm btn-primary">View All</a>
                                </div>
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
                    </div>
                </div>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</x-app>
