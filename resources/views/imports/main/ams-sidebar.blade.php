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
                <a class="nav-link" href="{{ route('roles') }}">Role</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('branch') }}">Branch</a>
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
                <a class="nav-link" href="index.html">All Contacts (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user')}}">Users (Running)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Contacts (Remaining)</a>
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
                <a class="nav-link" href="index.html">Product / Service (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Asset (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Attributes (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Offers (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Damage (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Manufacture (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Costing Sheet (Remaining)</a>
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
                <a class="nav-link" href="index.html">Deposit (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Withdraw (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Cheque Books (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Bank Reports (Remaining)</a>
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
                <a class="nav-link" href="index.html">Primary Sale (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Depo Sale (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Distributor Sale (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Money Received (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Other Income (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Quotation (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Quotation Request (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Purchase Return (Remaining)</a>
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
                <a class="nav-link" href="index.html">Purchase (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Payment (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Expense (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Refund (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Sale Return (Remaining)</a>
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
                <a class="nav-link" href="index.html">Chart of Accounts (Remaining)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">Manual Journal (Remaining)</a>
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
