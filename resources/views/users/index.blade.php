<x-app title="Users"  :links="['Admin', 'Users']">
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content  flex-column-fluid " >
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container  container-xxl ">
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
                                    <input type="text" id="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Users" aria-label="search">
                                </div>
                                <!--end::Search-->
                            </div>
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add-wallet-modal">Add New User</a>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" data-table data-search-using="#search">
                                <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Gender</th>
                                    <th>Phone Number</th>
                                </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                @foreach($users as $user)
                                    <tr>
                                        <td class="d-flex align-items-center">
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="{{ route('users.show', $user) }}">
                                                    <div class="symbol-label">
                                                        <img src="{{ $user->photo }}" alt="Customer" class="w-100">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('users.show', $user) }}" class="text-gray-800 text-hover-primary mb-1">{{ $user->name }}</a>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('users.show', $user) }}" class="text-gray-600 text-hover-primary mb-1">{{ $user->email ?? 'None' }}</a>
                                        </td>
                                        <td>
                                            <div @class([
                                                    'badge',
                                                    'badge-light-success'    => $user->isAdmin(),
                                                    'badge-light-primary'   => $user->isCustomer()
                                                ])>
                                                {{ str($user->type)->title() }}
                                            </div>
                                        </td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->
</x-app>
