<x-app title="Wallet {{ $wallet->reference }}" :links="['Admin', 'Wallet', $wallet->reference]">
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-xxl ">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
                            <a href="#" class="btn btn-light-primary btn-sm ms-auto me-lg-n7" data-bs-toggle="modal" data-bs-target="#transfer-modal">
                                <i class="ki-duotone ki-arrow-right-left fs-2"><i class="path1"></i><i class="path2"></i></i>
                                Transfer Funds
                            </a>
                            <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#deposit-modal">
                                <i class="ki-duotone ki-credit-cart fs-2"><i class="path1"></i><i class="path2"></i></i>
                                Fund Wallet
                            </a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="transfer_details" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4 flex-row-fluid">
                                        <div class="card-header border-0 cursor-pointer" role="button">
                                            <div class="card-title">
                                                <h2>
                                                    <span @class([
                                                        'badge', 'badge-xl', 'fs-3',
                                                        'badge-light-primary' => $wallet->isClassic(),
                                                        'badge-light-success' => $wallet->isPremium(),
                                                        'badge-light-warning' => $wallet->isGolden()
                                                    ])>
                                                        {{ str($wallet->type->name)->title() }}
                                                    </span>
                                                    Wallet Details
                                                </h2>
                                            </div>
                                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                                <a href="#" class="btn btn-lg btn-info">Available Bal. - ₦{{ $wallet->availableBalance }}</a>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                    <thead>
                                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="min-w-100px">Reference id</th>
                                                        <th class="min-w-150px">Owner</th>
                                                        <th class="min-w-100px">Balance</th>
                                                        <th class="min-w-150px">Min. Balance</th>
                                                        <th class="min-w-100px">Monthly Interest Rate</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="fw-semibold text-gray-700">
                                                    <tr>
                                                        <td>{{ $wallet->reference }}</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                                    <a href="{{ route('users.show', $wallet->user) }}">
                                                                        <div class="symbol-label">
                                                                            <img src="{{ $wallet->user->photo }}" alt="" class="w-100" />
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="ms-5">
                                                                    <a href="{{ route('users.show', $wallet->user) }}" class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $wallet->user->name }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>₦{{ $wallet->balance }}</td>
                                                        <td>₦{{ $wallet->type->min_balance }}</td>
                                                        <td>{{ number_format($wallet->type->monthly_interest_rate,0,'','') }}%</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
    </div>
    <!--end::Main-->
    <!--begin:: Deposit Modal-->
    <div class="modal fade" id="deposit-modal" tabindex="-1" aria-labelledby="deposit-modal-label" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Fund {{ $wallet->reference }} Wallet
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form x-data x-submit action="{{ route('api.deposits.store') }}" method="POST" @finish="location.reload()"
                    >
                        <div class="mb-10">
                            <label class="form-label">Wallet Type</label>
                            <input class="form-control" value="{{ $wallet->type->name }}" disabled>
                            <input type="hidden" name="wallet_id" value="{{ $wallet->id }}">
                        </div>
                        <div class="mb-10">
                            <label for="amount" class="form-label">Amount</label>
                            <input class="form-control" type="number" name="amount" value="100.00" min="100.00" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Fund Wallet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end:: Deposit Modal-->
    <!--begin:: Transfer Modal-->
    <div class="modal fade" id="transfer-modal" tabindex="-1" aria-labelledby="transfer-modal-label" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Funds Transfer
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form x-data x-submit action="{{ route('api.transfers.store') }}" method="POST" @finish="location.reload()"
                    >
                        <div class="mb-10">
                            <div>
                                <label class="form-label">From wallet</label>
                                <input class="form-control" value="{{ $wallet->reference.' ('.$wallet->type->name }})" disabled>
                                <input type="hidden" name="from_wallet_id" value="{{ $wallet->id }}">
                            </div>
                            <div>
                                <label for="ref" class="form-label">To wallet</label>
                                <input id="ref" class="form-control" name="reference" placeholder="Input wallet reference Id" required>
                            </div>
                        </div>
                        <div class="mb-10">
                            <label for="amount" class="form-label">Amount</label>
                            <input class="form-control" type="number" name="amount" value="100.00" min="100.00" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Transfer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end:: Transfer Modal-->
</x-app>
