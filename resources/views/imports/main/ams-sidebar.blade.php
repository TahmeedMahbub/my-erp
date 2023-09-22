{{-- <li class="menu-label mt-0 text-primary font-12 fw-semibold"><span>Account Management</span><br>
    <span class="font-10 text-secondary fw-normal">Tracking System of Business</span>
</li>
--}}

<li class="nav-item">
    <a class="nav-link" href="#sidebarOrganization" data-bs-toggle="collapse" role="button"
        aria-expanded="false" aria-controls="sidebarOrganization">
        <i class="mdi mdi-store menu-icon"></i>
        <span>Organization</span>
    </a>
    <div class="collapse" id="sidebarOrganization">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('branch') }}">Branch</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('access_level') }}">Roles Accessibility</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('access_level_user') }}">Users Accessibility</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('history') }}">History</a>
            </li>
        </ul>
    </div>
</li>


<li class="nav-item">
    <a class="nav-link" href="#sidebarContacts" data-bs-toggle="collapse" role="button"
        aria-expanded="false" aria-controls="sidebarContacts">
        <i class="mdi mdi-account-multiple-outline menu-icon"></i>
        <span>Contact</span>
    </a>
    <div class="collapse " id="sidebarContacts">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="index.html">All Contacts (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('roles') }}">User Roles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user')}}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('contact_category')}}">Contact Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">Contacts (!!!)</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="#sidebarInventory" data-bs-toggle="collapse" role="button"
        aria-expanded="false" aria-controls="sidebarInventory">
        <i class="ti ti-package menu-icon"></i>
        <span>Inventory</span>
    </a>
    <div class="collapse " id="sidebarInventory">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{route('item_category')}}"> Item Category </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('unit')}}">Unit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('brand')}}">Brand</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('item')}}">Item / Service</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Asset (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Minimum Stock (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Stock Transfer (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Stock Request (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Damage (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Manufacture (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Costing Sheet (!!!)</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="#sidebarBank" data-bs-toggle="collapse" role="button"
        aria-expanded="false" aria-controls="sidebarBank">
        <i class="mdi mdi-bank menu-icon"></i>
        <span>Bank</span>
    </a>
    <div class="collapse " id="sidebarBank">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Deposit (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Withdraw (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Cheque Books (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Bank Reports (!!!)</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="#sidebarMoneyIn" data-bs-toggle="collapse" role="button"
        aria-expanded="false" aria-controls="sidebarMoneyIn">
        <i class="mdi mdi-currency-usd menu-icon"></i>
        <span>Money In</span>
    </a>
    <div class="collapse " id="sidebarMoneyIn">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Primary Sale (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Depo Sale (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Distributor Sale (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Money Received (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Other Income (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Quotation (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Quotation Request (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Purchase Return (!!!)</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="#sidebarMoneyOut" data-bs-toggle="collapse" role="button"
        aria-expanded="false" aria-controls="sidebarMoneyOut">
        <i class="mdi mdi-currency-usd-off menu-icon"></i>
        <span>Money Out</span>
    </a>
    <div class="collapse " id="sidebarMoneyOut">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('purchase') }}">Purchase (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Payment (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Expense (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Refund (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Sale Return (!!!)</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="#sidebarAccounting" data-bs-toggle="collapse" role="button"
        aria-expanded="false" aria-controls="sidebarAccounting">
        <i class="mdi mdi-calculator-variant menu-icon"></i>
        <span>Accounting</span>
    </a>
    <div class="collapse " id="sidebarAccounting">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Chart of Accounts (!!!)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Manual Journal (!!!)</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="#sidebarReport">
        <i class="ti ti-report-money menu-icon"></i>
        <span>Reports</span>
    </a>
</li>


{{-- DESIGN OF INVOICE --}}
{{--
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <meta charset="utf-8" />
        <title> | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        App favicon
        <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

        <meta charset="utf-8" />
        <title>Invoice</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <style>
            td paddin{}
        </style>
    </head>

    <body id="body" class="dark-sidebar">
        <!-- leftbar-tab-menu -->
        <div class="left-sidebar">
            <!-- LOGO -->
            <div class="brand">
                <a href="index.html" class="logo">
                    <span>
                        <img src="assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <img src="assets/images/logo.png" alt="logo-large" class="logo-lg logo-light">
                        <img src="assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
                    </span>
                </a>
            </div>
            <div class="sidebar-user-pro media border-end">
                <div class="position-relative mx-auto">
                    <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-md">
                    <span class="online-icon position-absolute end-0"><i class="mdi mdi-record text-success"></i></span>
                </div>
                <div class="media-body ms-2 user-detail align-self-center">
                    <h5 class="font-14 m-0 fw-bold">Mr. Michael Hill </h5>
                    <p class="opacity-50 mb-0">michael.hill@exemple.com</p>
                </div>
            </div>
            <div class="border-end">
                <ul class="nav nav-tabs menu-tab nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#Main" role="tab" aria-selected="true">M<span>ain</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#Extra" role="tab" aria-selected="false">E<span>xtra</span></a>
                    </li>
                </ul>
            </div>
            <!-- Tab panes -->

            <!--end logo-->
            <div class="menu-content h-100" data-simplebar>
                <div class="menu-body navbar-vertical">
                    <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
                        <!-- Navigation -->
                        <ul class="navbar-nav tab-pane active" id="Main" role="tabpanel">
                            <li class="menu-label mt-0 text-primary font-12 fw-semibold">M<span>ain</span><br><span class="font-10 text-secondary fw-normal">Unique Dashboard</span></li>
                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarAnalytics">
                                    <i class="ti ti-stack menu-icon"></i>
                                    <span>Analytics</span>
                                </a>
                                <div class="collapse " id="sidebarAnalytics">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.html">Dashboard</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a href="analytics-customers.html" class="nav-link ">Customers</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a href="analytics-reports.html" class="nav-link ">Reports</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarAnalytics-->
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarCrypto" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCrypto">
                                    <i class="ti ti-currency-bitcoin menu-icon"></i>
                                    <span>Crypto</span>
                                </a>
                                <div class="collapse " id="sidebarCrypto">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="crypto-index.html">Dashboard</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="crypto-exchange.html">Exchange</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="crypto-wallet.html">Wallet</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="crypto-news.html">Crypto News</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="crypto-ico.html">ICO List</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="crypto-settings.html">Settings</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarCrypto-->
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarProjects" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarProjects">
                                    <i class="ti ti-brand-asana menu-icon"></i>
                                    <span>Projects</span>
                                </a>
                                <div class="collapse " id="sidebarProjects">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="projects-index.html">Dashboard</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="projects-clients.html">Clients</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="projects-team.html">Team</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="projects-project.html">Project</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="projects-task.html">Task</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="projects-kanban-board.html">Kanban Board</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="projects-chat.html">Chat</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="projects-users.html">Users</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="projects-create.html">Project Create</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarProjects-->
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarEcommerce" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarEcommerce">
                                    <i class="ti ti-shopping-cart menu-icon"></i>
                                    <span>Ecommerce</span>
                                </a>
                                <div class="collapse " id="sidebarEcommerce">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="ecommerce-index.html">Dashboard</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ecommerce-products.html">Products</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ecommerce-product-list.html">Product List</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ecommerce-product-detail.html">Product Detail</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ecommerce-cart.html">Cart</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ecommerce-checkout.html">Checkout</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarEcommerce-->
                            </li><!--end nav-item-->

                            <li class="menu-label mt-0 text-primary font-12 fw-semibold">A<span>pps</span><br><span class="font-10 text-secondary fw-normal">Morder Applications</span></li>

                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarEmail" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmail">
                                    <i class="ti ti-mail menu-icon"></i>
                                    <span>Email</span>
                                </a>
                                <div class="collapse " id="sidebarEmail">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="apps-email-inbox.html">Inbox</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="apps-email-read.html">Read Email</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarEmail-->
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class="nav-link" href="apps-chat.html"><i class="ti ti-brand-hipchat menu-icon"></i><span>Chat</span></a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="apps-contact-list.html"><i class="ti ti-headphones menu-icon"></i><span>Contact List</span></a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="apps-calendar.html"><i class="ti ti-calendar menu-icon"></i><span>Calendar</span></a>
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="apps-invoice.html"><i class="ti ti-file-invoice menu-icon"></i><span>Invoice</span></a>
                            </li><!--end nav-item-->
                            <li class="menu-label mt-0 text-primary font-12 fw-semibold">C<span>omponents</span><br><span class="font-10 text-secondary fw-normal">Bootstrap & Custom</span></li>
                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarElements" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarElements">
                                    <i class="ti ti-planet menu-icon"></i>
                                <span>UI Elements</span>
                                </a>
                                <div class="collapse " id="sidebarElements">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-alerts.html">Alerts</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-avatar.html">Avatar</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-buttons.html">Buttons</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-badges.html">Badges</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-cards.html">Cards</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-carousels.html">Carousels</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-dropdowns.html">Dropdowns</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-grids.html">Grids</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-images.html">Images</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-list.html">List</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-modals.html">Modals</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-navs.html">Navs</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-navbar.html">Navbar</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-paginations.html">Paginations</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-popover-tooltips.html">Popover & Tooltips</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-progress.html">Progress</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-spinners.html">Spinners</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-tabs-accordions.html">Tabs & Accordions</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-typography.html">Typography</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="ui-videos.html">Videos</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarElements-->
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarAdvancedUI" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarAdvancedUI">
                                    <i class="ti ti-chart-bubble menu-icon"></i>
                                    <span>Advanced UI</span>
                                </a>
                                <div class="collapse " id="sidebarAdvancedUI">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="advanced-animation.html">Animation</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="advanced-clipboard.html">Clip Board</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="advanced-dragula.html">Dragula</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="advanced-files.html">File Manager</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="advanced-highlight.html">Highlight</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="advanced-rangeslider.html">Range Slider</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="advanced-ratings.html">Ratings</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="advanced-ribbons.html">Ribbons</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="advanced-sweetalerts.html">Sweet Alerts</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="advanced-toasts.html">Toasts</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarAdvancedUI-->
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarForms">
                                    <i class="ti ti-forms menu-icon"></i>
                                    <span>Forms</span>
                                </a>
                                <div class="collapse " id="sidebarForms">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="forms-elements.html">Basic Elements</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="forms-advanced.html">Advance Elements</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="forms-validation.html">Validation</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="forms-wizard.html">Wizard</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="forms-editors.html">Editors</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="forms-uploads.html">File Upload</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="forms-img-crop.html">Image Crop</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarForms-->
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarCharts">
                                    <i class="ti ti-chart-donut menu-icon"></i>
                                <span>Charts</span>
                                </a>
                                <div class="collapse " id="sidebarCharts">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="charts-apex.html">Apex</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="charts-justgage.html">JustGage</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="charts-chartjs.html">Chartjs</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="charts-toast-ui.html">Toast</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarCharts-->
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarTables">
                                    <i class="ti ti-table menu-icon"></i>
                                    <span>Tables</span>
                                </a>
                                <div class="collapse " id="sidebarTables">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="tables-basic.html">Basic</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="tables-datatable.html">Datatables</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="tables-editable.html">Editable</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarTables-->
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarIcons">
                                    <i class="ti ti-parachute menu-icon"></i>
                                <span>Icons</span>
                                </a>
                                <div class="collapse " id="sidebarIcons">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="icons-materialdesign.html">Material Design</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="icons-fontawesome.html">Font awesome</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="icons-tabler.html">Tabler</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="icons-feather.html">Feather</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarIcons-->
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarMaps" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarMaps">
                                    <i class="ti ti-map menu-icon"></i>
                                    <span>Maps</span>
                                </a>
                                <div class="collapse " id="sidebarMaps">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="maps-google.html">Google Maps</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="maps-leaflet.html">Leaflet Maps</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="maps-vector.html">Vector Maps</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarMaps-->
                            </li><!--end nav-item-->

                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarEmailTemplates" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarEmailTemplates">
                                    <i class="ti ti-target menu-icon"></i>
                                    <span>Email Templates</span>
                                </a>
                                <div class="collapse " id="sidebarEmailTemplates">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="email-templates-basic.html">Basic Action Email</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="email-templates-alert.html">Alert Email</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="email-templates-billing.html">Billing Email</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarEmailTemplates-->
                            </li><!--end nav-item-->
                            <li class="menu-label mt-0 text-primary font-12 fw-semibold">C<span>rafted</span><br><span class="font-10 text-secondary fw-normal">Unique Extra Pages</span></li>
                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarPages">
                                    <i class="ti ti-file-diff menu-icon"></i>
                                    <span>Pages</span>
                                </a>
                                <div class="collapse " id="sidebarPages">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages-profile.html">Profile</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages-tour.html">Tour</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages-timeline.html">Timeline</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages-treeview.html">Treeview</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages-starter.html">Starter Page</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages-pricing.html">Pricing</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages-blogs.html">Blogs</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages-faq.html">FAQs</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages-gallery.html">Gallery</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarPages-->
                            </li><!--end nav-item-->
                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarAuthentication" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarAuthentication">
                                    <i class="ti ti-shield-lock menu-icon"></i>
                                    <span>Authentication</span>
                                </a>
                                <div class="collapse " id="sidebarAuthentication">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="auth-login.html">Log in</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="auth-register.html">Register</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="auth-recover-pw.html">Re-Password</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="auth-lock-screen.html">Lock Screen</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="auth-404.html">Error 404</a>
                                        </li><!--end nav-item-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="auth-500.html">Error 500</a>
                                        </li><!--end nav-item-->
                                    </ul><!--end nav-->
                                </div><!--end sidebarAuthentication-->
                            </li><!--end nav-item-->
                        </ul>
                        <ul class="navbar-nav tab-pane" id="Extra" role="tabpanel">
                            <li>
                                <div class="update-msg text-center position-relative">
                                    <button type="button" class="btn-close position-absolute end-0 me-2" aria-label="Close"></button>
                                    <img src="assets/images/speaker-light.png" alt="" class="" height="110">
                                    <h5 class="mt-0">Mannat Themes</h5>
                                    <p class="mb-3">We Design and Develop Clean and High Quality Web Applications</p>
                                    <a href="javascript: void(0);" class="btn btn-outline-warning btn-sm">Upgrade your plan</a>
                                </div>
                            </li>
                        </ul><!--end navbar-nav--->
                    </div><!--end sidebarCollapse-->
                </div>
            </div>
        </div>
        <!-- end left-sidenav-->
        <!-- end leftbar-menu-->

        <!-- Top Bar Start -->
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- Navbar -->
            <nav class="navbar-custom" id="navbar-custom">
                <ul class="list-unstyled topbar-nav float-end mb-0">
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/flags/us_flag.jpg" alt="" class="thumb-xxs rounded">
                    </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><img src="assets/images/flags/us_flag.jpg" alt="" height="15" class="me-2">English</a>
                            <a class="dropdown-item" href="#"><img src="assets/images/flags/spain_flag.jpg" alt="" height="15" class="me-2">Spanish</a>
                            <a class="dropdown-item" href="#"><img src="assets/images/flags/germany_flag.jpg" alt="" height="15" class="me-2">German</a>
                            <a class="dropdown-item" href="#"><img src="assets/images/flags/french_flag.jpg" alt="" height="15" class="me-2">French</a>
                        </div>
                    </li><!--end topbar-language-->

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-mail"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">

                            <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                                Emails <span class="badge bg-soft-primary badge-pill">3</span>
                            </h6>
                            <div class="notification-menu" data-simplebar>
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-end text-muted ps-2">2 min ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-soft-primary">
                                            <img src="assets/images/users/user-1.jpg" alt="" class="thumb-sm rounded-circle">
                                        </div>
                                        <div class="media-body align-self-center ms-2 text-truncate">
                                            <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                                            <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-end text-muted ps-2">10 min ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-soft-primary">
                                            <img src="assets/images/users/user-4.jpg" alt="" class="thumb-sm rounded-circle">
                                        </div>
                                        <div class="media-body align-self-center ms-2 text-truncate">
                                            <h6 class="my-0 fw-normal text-dark">Meeting with designers</h6>
                                            <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-end text-muted ps-2">40 min ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-soft-primary">
                                            <img src="assets/images/users/user-2.jpg" alt="" class="thumb-sm rounded-circle">
                                        </div>
                                        <div class="media-body align-self-center ms-2 text-truncate">
                                            <h6 class="my-0 fw-normal text-dark">UX 3 Task complete.</h6>
                                            <small class="text-muted mb-0">Dummy text of the printing.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-end text-muted ps-2">1 hr ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-soft-primary">
                                            <img src="assets/images/users/user-5.jpg" alt="" class="thumb-sm rounded-circle">
                                        </div>
                                        <div class="media-body align-self-center ms-2 text-truncate">
                                            <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                                            <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-end text-muted ps-2">2 hrs ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-soft-primary">
                                            <img src="assets/images/users/user-3.jpg" alt="" class="thumb-sm rounded-circle">
                                        </div>
                                        <div class="media-body align-self-center ms-2 text-truncate">
                                            <h6 class="my-0 fw-normal text-dark">Payment Successfull</h6>
                                            <small class="text-muted mb-0">Dummy text of the printing.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-bell"></i>
                            <span class="alert-badge"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">

                            <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                                Notifications <span class="badge bg-soft-primary badge-pill">2</span>
                            </h6>
                            <div class="notification-menu" data-simplebar>
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-end text-muted ps-2">2 min ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-soft-primary">
                                            <i class="ti ti-chart-arcs"></i>
                                        </div>
                                        <div class="media-body align-self-center ms-2 text-truncate">
                                            <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                                            <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-end text-muted ps-2">10 min ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-soft-primary">
                                            <i class="ti ti-device-computer-camera"></i>
                                        </div>
                                        <div class="media-body align-self-center ms-2 text-truncate">
                                            <h6 class="my-0 fw-normal text-dark">Meeting with designers</h6>
                                            <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-end text-muted ps-2">40 min ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-soft-primary">
                                            <i class="ti ti-diamond"></i>
                                        </div>
                                        <div class="media-body align-self-center ms-2 text-truncate">
                                            <h6 class="my-0 fw-normal text-dark">UX 3 Task complete.</h6>
                                            <small class="text-muted mb-0">Dummy text of the printing.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-end text-muted ps-2">1 hr ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-soft-primary">
                                            <i class="ti ti-drone"></i>
                                        </div>
                                        <div class="media-body align-self-center ms-2 text-truncate">
                                            <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                                            <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-end text-muted ps-2">2 hrs ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-soft-primary">
                                            <i class="ti ti-users"></i>
                                        </div>
                                        <div class="media-body align-self-center ms-2 text-truncate">
                                            <h6 class="my-0 fw-normal text-dark">Payment Successfull</h6>
                                            <small class="text-muted mb-0">Dummy text of the printing.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <img src="assets/images/users/user-4.jpg" alt="profile-user" class="rounded-circle me-2 thumb-sm" />
                                <div>
                                    <small class="d-none d-md-block font-11">Admin</small>
                                    <span class="d-none d-md-block fw-semibold font-12">Maria Gibson <i
                                            class="mdi mdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#"><i class="ti ti-user font-16 me-1 align-text-bottom"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="ti ti-settings font-16 me-1 align-text-bottom"></i> Settings</a>
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item" href="#"><i class="ti ti-power font-16 me-1 align-text-bottom"></i> Logout</a>
                        </div>
                    </li><!--end topbar-profile-->
                    <li class="notification-list">
                        <a class="nav-link arrow-none nav-icon offcanvas-btn" href="#" data-bs-toggle="offcanvas" data-bs-target="#Appearance" role="button" aria-controls="Rightbar">
                            <i class="ti ti-settings ti-spin"></i>
                        </a>
                    </li>
                </ul><!--end topbar-nav-->

                <ul class="list-unstyled topbar-nav mb-0">
                    <li>
                        <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
                            <i class="ti ti-menu-2"></i>
                        </button>
                    </li>
                    <li class="hide-phone app-search">
                        <form role="search" action="#" method="get">
                            <input type="search" name="search" class="form-control top-search mb-0" placeholder="Type text...">
                            <button type="submit"><i class="ti ti-search"></i></button>
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        <!-- Top Bar End -->

        <div class="page-wrapper">

            <!-- Page Content-->
            <div class="page-content-tab">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Unikit</a>
                                        </li><!--end nav-item-->
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                        </li><!--end nav-item-->
                                        <li class="breadcrumb-item active">Analytics</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Invoice Create</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->


















                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="">Customer Name</label>
                                            <select id="customer" class="form-select" name="customer" required>
                                                <option value="">Select Customer</option>
                                                <option value="">Mr ABC (01685412365), CN-4325</option>
                                                <option value="">Mr XYZ (01756845214), CN-6542</option>
                                            </select>
                                            <!-- <span class="text-danger">{{ $errors->first('customer') }}</span> -->
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="">Delivery Person</label>
                                            <select id="delivery" class="form-select" name="delivery" required>
                                                <option value="">Select Delivery</option>
                                                <option value="">Mr ABC (01685412365), DP-4325</option>
                                                <option value="">Mr XYZ (01756845214), DP-6542</option>
                                            </select>
                                            <!-- <span class="text-danger">{{ $errors->first('delivery') }}</span> -->
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="">Branch Name</label>
                                            <select id="branch" class="form-select" name="branch" required>
                                                <option value="">Select Branch</option>
                                                <option value="">Head Office</option>
                                                <option value="">Comilla</option>
                                            </select>
                                            <!-- <span class="text-danger">{{ $errors->first('branch') }}</span> -->
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="">Date</label>
                                            <input type="date" class="form-control" id="" value="2023-05-22" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table-sm mb-0">
                                            <thead class="thead-light">
                                                <tr class="border-bottom">
                                                    <th class="p-2" style="width: 2%;">#</th>
                                                    <th class="p-2" style="width: 5%;">Image</th>
                                                    <th class="p-2" style="width: 27%;">Item / Service</th>
                                                    <th class="p-2" style="width: 8%;">Lot No</th>
                                                    <th class="p-2" style="width: 11%;">Quantity <small>(Carton)</small></th>
                                                    <th class="p-2" style="width: 13%;">Quantity <small>(Base Unit)</small></th>
                                                    <th class="p-2" style="width: 13%;">Rate Per Unit</th>
                                                    <th class="p-2" style="width: 12%;">Discount</th>
                                                    <th class="p-2" style="width: 5%;">Amount</th>
                                                    <th class="p-2 text-center" style="width: 6%;"><a href="" title="Add Item" class="text-secondary-custom"><i class="mdi mdi-plus-box pe-2 fs-2"></i></a></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="border-bottom">
                                                <th scope="row">1</th>
                                                <td class="p-2 text-center"><img src="https://www.masters-in-business.net/wp-content/uploads/2014/08/product-innovation.jpg" alt="item" style="height: 40px;"></td>
                                                <td class="p-2">
                                                    <select id="item_0" class="form-select" name="item[]" required>
                                                        <option value="">Select Item</option>
                                                        <option value="">Item 0, code no</option>
                                                        <option value="">Item 1, code no</option>
                                                    </select>
                                                    <!-- <span class="text-danger">{{ $errors->first('item_0') }}</span> -->
                                                </td>
                                                <td class="p-2">
                                                    <select id="lot_0" class="form-select" name="lot[]" required>
                                                        <option value="">Lot Select</option>
                                                        <option value="">Lot No.: 01</option>
                                                        <option value="">Lot No.: 02</option>
                                                    </select>
                                                    <!-- <span class="text-danger">{{ $errors->first('lot_0') }}</span> -->
                                                </td>
                                                <td class="p-2">
                                                    <input class="form-control" type="number" id="carton_0" value="0.00" step="0.001" name="carton_qty[]" placeholder="Carton QTY">
                                                    <!-- <span class="text-danger">{{ $errors->first('carton_0') }}</span> -->
                                                </td>
                                                <td class="p-2">
                                                    <div class="input-group">
                                                        <input class="form-control" type="number" style="width: 90px;" id="base_0" value="0.00" step="0.001" name="base_qty[]" placeholder="Base QTY">
                                                        <select id="lot_0" class="form-select" name="unit[]" required>
                                                            <option value="Unit_0">Unit_0</option>
                                                            <option value="Unit_1">Unit_1</option>
                                                            <option value="Unit_2">Unit_2</option>
                                                        </select>
                                                    </div>
                                                    <!-- <span class="text-danger">{{ $errors->first('base_0') }}</span> -->
                                                </td>
                                                <td class="p-2">
                                                    <div class="input-group">
                                                        <input class="form-control" type="number" style="width: 70px;" id="amount_0" value="0.00" step="0.01" name="amount[]" placeholder="amount">
                                                        <select id="lot_0" class="form-select" name="unit[]" required>
                                                            <option value="base">Base</option>
                                                            <option value="ctn">Ctn</option>
                                                        </select>
                                                    </div>
                                                    <!-- <span class="text-danger">{{ $errors->first('amount_0') }}</span> -->
                                                </td>
                                                <td class="p-2">
                                                    <div class="input-group">
                                                        <input class="form-control" type="number" style="width: 70px;" id="discount_0" value="0.00" step="0.001" name="discount[]" placeholder="Discount">
                                                        <select id="lot_0" class="form-select" name="discount_type[]" required>
                                                            <option value="tk">TK</option>
                                                            <option value="%">%</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div id="amount_0" class="text-end">12,000.00</div>
                                                </td>
                                                <td class="p-2">
                                                    <div id="remove_0" class="text-center"><a href="" title="Delete" class="text-secondary-custom"><i class="mdi mdi-delete-empty pe-2 fs-2"></i></a></div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th scope="row">2</th>
                                                <td class="p-2 text-center"><img src="https://www.masters-in-business.net/wp-content/uploads/2014/08/product-innovation.jpg" alt="item" style="height: 40px;"></td>
                                                <td class="p-2">
                                                    <select id="item_0" class="form-select" name="item[]" required>
                                                        <option value="">Select Item</option>
                                                        <option value="">Item 0, code no</option>
                                                        <option value="">Item 1, code no</option>
                                                    </select>
                                                    <!-- <span class="text-danger">{{ $errors->first('item_0') }}</span> -->
                                                </td>
                                                <td class="p-2">
                                                    <select id="lot_0" class="form-select" name="lot[]" required>
                                                        <option value="">Lot Select</option>
                                                        <option value="">Lot No.: 01</option>
                                                        <option value="">Lot No.: 02</option>
                                                    </select>
                                                    <!-- <span class="text-danger">{{ $errors->first('lot_0') }}</span> -->
                                                </td>
                                                <td class="p-2">
                                                    <input class="form-control" type="number" id="carton_0" value="0.00" step="0.001" name="carton_qty[]" placeholder="Carton QTY">
                                                    <!-- <span class="text-danger">{{ $errors->first('carton_0') }}</span> -->
                                                </td>
                                                <td class="p-2">
                                                    <div class="input-group">
                                                        <input class="form-control" type="number" style="width: 90px;" id="base_0" value="0.00" step="0.001" name="base_qty[]" placeholder="Base QTY">
                                                        <select id="lot_0" class="form-select" name="unit[]" required>
                                                            <option value="Unit_0">Unit_0</option>
                                                            <option value="Unit_1">Unit_1</option>
                                                            <option value="Unit_2">Unit_2</option>
                                                        </select>
                                                    </div>
                                                    <!-- <span class="text-danger">{{ $errors->first('base_0') }}</span> -->
                                                </td>
                                                <td class="p-2">
                                                    <div class="input-group">
                                                        <input class="form-control" type="number" style="width: 70px;" id="amount_0" value="0.00" step="0.01" name="amount[]" placeholder="amount">
                                                        <select id="lot_0" class="form-select" name="unit[]" required>
                                                            <option value="base">Base</option>
                                                            <option value="ctn">Ctn</option>
                                                        </select>
                                                    </div>
                                                    <!-- <span class="text-danger">{{ $errors->first('amount_0') }}</span> -->
                                                </td>
                                                <td class="p-2">
                                                    <div class="input-group">
                                                        <input class="form-control" type="number" style="width: 70px;" id="discount_0" value="0.00" step="0.001" name="discount[]" placeholder="Discount">
                                                        <select id="lot_0" class="form-select" name="discount_type[]" required>
                                                            <option value="tk">TK</option>
                                                            <option value="%">%</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="p-2">
                                                    <div id="amount_0" class="text-end">12,000.00</div>
                                                </td>
                                                <td class="p-2">
                                                    <div id="remove_0" class="text-center"><a href="" title="Delete" class="text-secondary-custom"><i class="mdi mdi-delete-empty pe-2 fs-2"></i></a></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" rowspan="7" class="align-top bg-light">
                                                    <h4 class="page-title">Payment Section</h4>

                                                    <div class="row p-2">
                                                        <div class="col-lg-6">
                                                            <label for="">Amount</label>
                                                            <input type="number" class="form-control" name="amount" id="" min="0" step="0.01" placeholder="Payment Amount">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="">Payment Account</label>
                                                            <select id="payment_account" class="form-select" name="payment_account" required>
                                                                <option value="">Select Payment Account</option>
                                                                <option value="">Mr ABC (01685412365), CN-4325</option>
                                                                <option value="">Mr XYZ (01756845214), CN-6542</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row p-2">
                                                        <div class="col-lg-6">
                                                            <label for="">Cheque Number</label>
                                                            <input type="text" class="form-control" name="cheque" placeholder="Cheque Number">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="">Cheque Issue Date</label>
                                                            <input type="date" class="form-control" name="cheque_date">
                                                        </div>
                                                    </div>

                                                    <div class="row p-2">
                                                        <div class="col-lg-12">
                                                            <label for="">Comment</label>
                                                            <input type="text" class="form-control" name="payment_comment" id="" placeholder="Payment Comment">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">Sub Total <span class="text-muted">(+)</span></td>
                                                <td colspan="2"></td>
                                                <td class="p-2 text-end">53,521.25</td>
                                                <td>TK</td>
                                            </tr>
                                            <tr>
                                                <td class="text-end">Discount <span class="text-muted">(-)</span></td>
                                                <td colspan="2" class="text-center">
                                                    <div class="input-group" style="width: 290px;">&emsp;&emsp;
                                                        <input class="form-control" type="number" id="main_discount" value="0.00" step="0.01" name="main_discount" placeholder="Discount">
                                                        <select id="main_discount_type" class="form-select" name="main_discount_type" style="width: 30px;">
                                                            <option value="tk">TK</option>
                                                            <option value="%">%</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="p-2 text-end">545.75</td>
                                                <td>TK</td>
                                            </tr>
                                            <tr>
                                                <td class="text-end">Vat / Tax <span class="text-muted">(+)</span></td>
                                                <td colspan="2" class="text-center">
                                                    <div class="input-group" style="width: 290px;">&emsp;&emsp;
                                                        <input class="form-control" type="number" id="main_discount" value="0.00" step="0.01" name="main_discount" placeholder="Discount">
                                                        <select id="main_discount_type" class="form-select" name="main_discount_type" style="width: 30px;">
                                                            <option value="%">%</option>
                                                            <option value="tk">TK</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="p-2 text-end">545.75</td>
                                                <td>TK</td>
                                            </tr>
                                            <tr>
                                                <td class="text-end border-bottom">Shipping Charge <span class="text-muted">(+)</span></td>
                                                <td colspan="2" class="text-end border-bottom">
                                                    <div class="input-group" style="width: 290px;">&emsp;&emsp;
                                                        <input class="form-control" type="number" id="main_discount" value="0.00" step="0.01" name="main_discount" placeholder="Discount">
                                                        <select id="main_discount_type" class="form-select" name="main_discount_type" style="width: 30px;">
                                                            <option value="tk">TK</option>
                                                            <option value="%">%</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="p-2 text-end border-bottom">100.00</td>
                                                <td class="border-bottom">TK</td>
                                            </tr>
                                            <tr>
                                                <td class="text-end fw-bold">Total Amount <span class="text-muted">(+)</span></td>
                                                <td colspan="2"></td>
                                                <td class="p-2 text-end fw-bold">67,569.37</td>
                                                <td class="fw-bold">TK</td>
                                            </tr>
                                            <tr>
                                                <td class="text-end border-bottom fw-bold">Paid Amount <span class="text-muted">(-)</span></td>
                                                <td colspan="2" class="text-end border-bottom"></td>
                                                <td class="p-2 text-end border-bottom fw-bold">14,654.00</td>
                                                <td class="border-bottom fw-bold">TK</td>
                                            </tr>
                                            <tr>
                                                <td class="text-end fw-bold">Due Amount <span class="text-muted">(+)</span></td>
                                                <td colspan="2"></td>
                                                <td class="p-2 text-end fw-bold">34,624.36</td>
                                                <td class="fw-bold">TK</td>
                                            </tr>
                                            </tbody>
                                        </table><!--end /table-->
                                    </div><!--end /tableresponsive-->


                                    <div class="row justify-content-center mt-4">
                                        <div class="col-lg-3">
                                            <input class="form-control btn btn-purple" type="Submit" value="Create Invoice">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>












                <!--Start Rightbar-->
                <!--Start Rightbar/offcanvas-->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                    <div class="offcanvas-header border-bottom">
                      <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                      <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <h6>Account Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch1">
                                <label class="form-check-label" for="settings-switch1">Auto updates</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                                <label class="form-check-label" for="settings-switch2">Location Permission</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch3">
                                <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->
                        <h6>General Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch4">
                                <label class="form-check-label" for="settings-switch4">Show me Online</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                                <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch6">
                                <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->
                    </div><!--end offcanvas-body-->
                </div>
                <!--end Rightbar/offcanvas-->
                <!--end Rightbar-->

                <!--Start Footer-->
                <!-- Footer Start -->
                <footer class="footer text-center text-sm-start">
                    &copy; <script>
                        document.write(new Date().getFullYear())
                    </script> Unikit <span class="text-muted d-none d-sm-inline-block float-end">Crafted with <i
                            class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
                </footer>
                <!-- end Footer -->
                <!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        <!-- Javascript  -->

        <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
        <script src="assets/pages/analytics-index.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
    <!--end body-->
</html>
 --}}
