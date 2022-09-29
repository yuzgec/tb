@extends('backend.layout.app')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-3">Kullanılan Alan <strong>276MB </strong>of 8 GB</p>
                <div class="progress progress-separated mb-3">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 44%"></div>
                    <div class="progress-bar bg-info" role="progressbar" style="width: 19%"></div>
                    <div class="progress-bar bg-success" role="progressbar" style="width: 9%"></div>
                </div>
                <div class="row">
                    <div class="col-auto d-flex align-items-center pe-2">
                        <span class="legend me-2 bg-primary"></span>
                        <span>Regular</span>
                        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">915MB</span>
                    </div>
                    <div class="col-auto d-flex align-items-center px-2">
                        <span class="legend me-2 bg-info"></span>
                        <span>System</span>
                        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">415MB</span>
                    </div>
                    <div class="col-auto d-flex align-items-center px-2">
                        <span class="legend me-2 bg-success"></span>
                        <span>Shared</span>
                        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">201MB</span>
                    </div>
                    <div class="col-auto d-flex align-items-center ps-2">
                        <span class="legend me-2"></span>
                        <span>Free</span>
                        <span class="d-none d-md-inline d-lg-none d-xxl-inline ms-2 text-muted">612MB</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-6 col-xl-3 mb-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            78 Orders
                                        </div>
                                        <div class="text-muted">
                                            32 shipped
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            78 Orders
                                        </div>
                                        <div class="text-muted">
                                            32 shipped
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            78 Orders
                                        </div>
                                        <div class="text-muted">
                                            32 shipped
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            78 Orders
                                        </div>
                                        <div class="text-muted">
                                            32 shipped
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            78 Orders
                                        </div>
                                        <div class="text-muted">
                                            32 shipped
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            78 Orders
                                        </div>
                                        <div class="text-muted">
                                            32 shipped
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-2">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            78 Orders
                                        </div>
                                        <div class="text-muted">
                                            32 shipped
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-2">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="6" cy="19" r="2"></circle><circle cx="17" cy="19" r="2"></circle><path d="M17 17h-11v-14h-2"></path><path d="M6 5l14 1l-1 7h-13"></path></svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    78 Orders
                                </div>
                                <div class="text-muted">
                                    32 shipped
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Siparişler</h3>
            </div>
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="text-muted">
                        Show
                        <div class="mx-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                        </div>
                        entries
                    </div>
                    <div class="ms-auto text-muted">
                        Search:
                        <div class="ms-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                        <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="6 15 12 9 18 15"></polyline></svg>
                        </th>
                        <th>Invoice Subject</th>
                        <th>Client</th>
                        <th>VAT No.</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001401</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Design Works</a></td>
                        <td>
                            <span class="flag flag-country-us"></span>
                            Carlson Limited
                        </td>
                        <td>
                            87956621
                        </td>
                        <td>
                            15 Dec 2017
                        </td>
                        <td>
                            <span class="badge bg-success me-1"></span> Paid
                        </td>
                        <td>$887</td>
                        <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001402</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">UX Wireframes</a></td>
                        <td>
                            <span class="flag flag-country-gb"></span>
                            Adobe
                        </td>
                        <td>
                            87956421
                        </td>
                        <td>
                            12 Apr 2017
                        </td>
                        <td>
                            <span class="badge bg-warning me-1"></span> Pending
                        </td>
                        <td>$1200</td>
                        <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001403</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">New Dashboard</a></td>
                        <td>
                            <span class="flag flag-country-de"></span>
                            Bluewolf
                        </td>
                        <td>
                            87952621
                        </td>
                        <td>
                            23 Oct 2017
                        </td>
                        <td>
                            <span class="badge bg-warning me-1"></span> Pending
                        </td>
                        <td>$534</td>
                        <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001404</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Landing Page</a></td>
                        <td>
                            <span class="flag flag-country-br"></span>
                            Salesforce
                        </td>
                        <td>
                            87953421
                        </td>
                        <td>
                            2 Sep 2017
                        </td>
                        <td>
                            <span class="badge bg-secondary me-1"></span> Due in 2 Weeks
                        </td>
                        <td>$1500</td>
                        <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001405</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Marketing Templates</a></td>
                        <td>
                            <span class="flag flag-country-pl"></span>
                            Printic
                        </td>
                        <td>
                            87956621
                        </td>
                        <td>
                            29 Jan 2018
                        </td>
                        <td>
                            <span class="badge bg-danger me-1"></span> Paid Today
                        </td>
                        <td>$648</td>
                        <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001406</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Sales Presentation</a></td>
                        <td>
                            <span class="flag flag-country-br"></span>
                            Tabdaq
                        </td>
                        <td>
                            87956621
                        </td>
                        <td>
                            4 Feb 2018
                        </td>
                        <td>
                            <span class="badge bg-secondary me-1"></span> Due in 3 Weeks
                        </td>
                        <td>$300</td>
                        <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001407</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Logo &amp; Print</a></td>
                        <td>
                            <span class="flag flag-country-us"></span>
                            Apple
                        </td>
                        <td>
                            87956621
                        </td>
                        <td>
                            22 Mar 2018
                        </td>
                        <td>
                            <span class="badge bg-success me-1"></span> Paid Today
                        </td>
                        <td>$2500</td>
                        <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                        <td><span class="text-muted">001408</span></td>
                        <td><a href="invoice.html" class="text-reset" tabindex="-1">Icons</a></td>
                        <td>
                            <span class="flag flag-country-pl"></span>
                            Tookapic
                        </td>
                        <td>
                            87956621
                        </td>
                        <td>
                            13 May 2018
                        </td>
                        <td>
                            <span class="badge bg-success me-1"></span> Paid Today
                        </td>
                        <td>$940</td>
                        <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
                <ul class="pagination m-0 ms-auto">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="15 6 9 12 15 18"></polyline></svg>
                            prev
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="9 6 15 12 9 18"></polyline></svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-9 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">En Çok Bakılan Kitaplar</h3>
            </div>
            <table class="table card-table table-vcenter">
                <thead>
                <tr>
                    <th>Kitap Adı</th>
                    <th colspan="2">Ziyaret Sayısı</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kitap Adı</td>
                        <td>3,550</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-12 col-md-3 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Aranan Kelimeler</h3>
            </div>
            <table class="table card-table table-vcenter">
                <thead>
                <tr>
                    <th>Aranan Kelime</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Search as $item)
                <tr>
                    <td>{{ $item->key }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

