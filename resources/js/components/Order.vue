<template>
  <div>
    <div
      class="
        d-flex
        justify-content-between
        flex-wrap flex-md-nowrap
        align-items-center
        py-4
      "
    >
      <div class="d-block mb-4 mb-md-0">
        <h2 class="h4">All Orders</h2>
        <p class="mb-0">Your web analytics dashboard template.</p>
      </div>
      <div class="btn-toolbar mb-2 mb-md-0">
        <a
          href="#"
          class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"
        >
          <svg
            class="icon icon-xs me-2"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 6v6m0 0v6m0-6h6m-6 0H6"
            ></path>
          </svg>
          New Plan
        </a>
        <div class="btn-group ms-2 ms-lg-3">
          <button type="button" class="btn btn-sm btn-outline-gray-600">
            Share
          </button>
          <button type="button" class="btn btn-sm btn-outline-gray-600">
            Export
          </button>
        </div>
      </div>
    </div>
    <div class="table-settings mb-4">
      <div class="row align-items-center justify-content-between">
        <div class="col col-md-6 col-lg-3 col-xl-4">
          <div class="input-group me-2 me-lg-3 fmxw-400">
            <span class="input-group-text">
              <svg
                class="icon icon-xs"
                x-description="Heroicon name: solid/search"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </span>
            <input
              type="text"
              class="form-control"
              placeholder="Search orders"
            />
          </div>
        </div>
        <div class="col-4 col-md-2 col-xl-1 ps-md-0 text-end">
          <div class="dropdown">
            <button
              class="
                btn btn-link
                text-dark
                dropdown-toggle dropdown-toggle-split
                m-0
                p-1
              "
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <svg
                class="icon icon-sm"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end pb-0">
              <span class="small ps-3 fw-bold text-dark">Show</span>
              <a
                class="dropdown-item d-flex align-items-center fw-bold"
                href="#"
                >10
                <svg
                  class="icon icon-xxs ms-auto"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"
                  ></path></svg
              ></a>
              <a class="dropdown-item fw-bold" href="#">20</a>
              <a class="dropdown-item fw-bold rounded-bottom" href="#">30</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="border-gray-200">#</th>
            <th class="border-gray-200">Bill For</th>
            <th class="border-gray-200">Issue Date</th>
            <th class="border-gray-200">Due Date</th>
            <th class="border-gray-200">Total</th>
            <th class="border-gray-200">Status</th>
            <th class="border-gray-200">Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- Item -->
          <tr>
            <td>
              <a href="#" class="fw-bold"> 456478 </a>
            </td>
            <td>
              <span class="fw-normal">Platinum Subscription Plan</span>
            </td>
            <td><span class="fw-normal">1 May 2020</span></td>
            <td><span class="fw-normal">1 Jun 2020</span></td>
            <td><span class="fw-bold">$799,00</span></td>
            <td><span class="fw-bold text-warning">Due</span></td>
            <td>
              <div class="btn-group">
                <button
                  class="
                    btn btn-link
                    text-dark
                    dropdown-toggle dropdown-toggle-split
                    m-0
                    p-0
                  "
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="icon icon-sm">
                    <span class="fas fa-ellipsis-h icon-dark"></span>
                  </span>
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu py-0">
                  <a class="dropdown-item rounded-top" href="#"
                    ><span class="fas fa-eye me-2"></span>View Details</a
                  >
                  <a class="dropdown-item" href="#"
                    ><span class="fas fa-edit me-2"></span>Edit</a
                  >
                  <a class="dropdown-item text-danger rounded-bottom" href="#"
                    ><span class="fas fa-trash-alt me-2"></span>Remove</a
                  >
                </div>
              </div>
            </td>
          </tr>
          <!-- Item -->
          <tr>
            <td>
              <a href="#" class="fw-bold"> 456423 </a>
            </td>
            <td>
              <span class="fw-normal">Platinum Subscription Plan</span>
            </td>
            <td><span class="fw-normal">1 Apr 2020</span></td>
            <td><span class="fw-normal">1 May 2020</span></td>
            <td><span class="fw-bold">$799,00</span></td>
            <td><span class="fw-bold text-success">Paid</span></td>
            <td>
              <div class="btn-group">
                <button
                  class="
                    btn btn-link
                    text-dark
                    dropdown-toggle dropdown-toggle-split
                    m-0
                    p-0
                  "
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="icon icon-sm">
                    <span class="fas fa-ellipsis-h icon-dark"></span>
                  </span>
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu py-0">
                  <a class="dropdown-item rounded-top" href="#"
                    ><span class="fas fa-eye me-2"></span>View Details</a
                  >
                  <a class="dropdown-item" href="#"
                    ><span class="fas fa-edit me-2"></span>Edit</a
                  >
                  <a class="dropdown-item text-danger rounded-bottom" href="#"
                    ><span class="fas fa-trash-alt me-2"></span>Remove</a
                  >
                </div>
              </div>
            </td>
          </tr>
          <!-- Item -->
          <tr>
            <td>
              <a href="#" class="fw-bold"> 456420 </a>
            </td>
            <td>
              <span class="fw-normal">Platinum Subscription Plan</span>
            </td>
            <td><span class="fw-normal">1 Mar 2020</span></td>
            <td><span class="fw-normal">1 Apr 2020</span></td>
            <td><span class="fw-bold">$799,00</span></td>
            <td><span class="fw-bold text-success">Paid</span></td>
            <td>
              <div class="btn-group">
                <button
                  class="
                    btn btn-link
                    text-dark
                    dropdown-toggle dropdown-toggle-split
                    m-0
                    p-0
                  "
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="icon icon-sm">
                    <span class="fas fa-ellipsis-h icon-dark"></span>
                  </span>
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu py-0">
                  <a class="dropdown-item rounded-top" href="#"
                    ><span class="fas fa-eye me-2"></span>View Details</a
                  >
                  <a class="dropdown-item" href="#"
                    ><span class="fas fa-edit me-2"></span>Edit</a
                  >
                  <a class="dropdown-item text-danger rounded-bottom" href="#"
                    ><span class="fas fa-trash-alt me-2"></span>Remove</a
                  >
                </div>
              </div>
            </td>
          </tr>
          <!-- Item -->
          <tr>
            <td>
              <a href="#" class="fw-bold"> 456421 </a>
            </td>
            <td>
              <span class="fw-normal">Platinum Subscription Plan</span>
            </td>
            <td><span class="fw-normal">1 Feb 2020</span></td>
            <td><span class="fw-normal">1 Mar 2020</span></td>
            <td><span class="fw-bold">$799,00</span></td>
            <td><span class="fw-bold text-success">Paid</span></td>
            <td>
              <div class="btn-group">
                <button
                  class="
                    btn btn-link
                    text-dark
                    dropdown-toggle dropdown-toggle-split
                    m-0
                    p-0
                  "
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="icon icon-sm">
                    <span class="fas fa-ellipsis-h icon-dark"></span>
                  </span>
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu py-0">
                  <a class="dropdown-item rounded-top" href="#"
                    ><span class="fas fa-eye me-2"></span>View Details</a
                  >
                  <a class="dropdown-item" href="#"
                    ><span class="fas fa-edit me-2"></span>Edit</a
                  >
                  <a class="dropdown-item text-danger rounded-bottom" href="#"
                    ><span class="fas fa-trash-alt me-2"></span>Remove</a
                  >
                </div>
              </div>
            </td>
          </tr>
          <!-- Item -->
          <tr>
            <td>
              <a href="#" class="fw-bold"> 456420 </a>
            </td>
            <td>
              <span class="fw-normal">Platinum Subscription Plan</span>
            </td>
            <td><span class="fw-normal">1 Jan 2020</span></td>
            <td><span class="fw-normal">1 Feb 2020</span></td>
            <td><span class="fw-bold">$799,00</span></td>
            <td><span class="fw-bold text-success">Paid</span></td>
            <td>
              <div class="btn-group">
                <button
                  class="
                    btn btn-link
                    text-dark
                    dropdown-toggle dropdown-toggle-split
                    m-0
                    p-0
                  "
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="icon icon-sm">
                    <span class="fas fa-ellipsis-h icon-dark"></span>
                  </span>
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu py-0">
                  <a class="dropdown-item rounded-top" href="#"
                    ><span class="fas fa-eye me-2"></span>View Details</a
                  >
                  <a class="dropdown-item" href="#"
                    ><span class="fas fa-edit me-2"></span>Edit</a
                  >
                  <a class="dropdown-item text-danger rounded-bottom" href="#"
                    ><span class="fas fa-trash-alt me-2"></span>Remove</a
                  >
                </div>
              </div>
            </td>
          </tr>
          <!-- Item -->
          <tr>
            <td>
              <a href="#" class="fw-bold"> 456479 </a>
            </td>
            <td>
              <span class="fw-normal">Platinum Subscription Plan</span>
            </td>
            <td><span class="fw-normal">1 Dec 2019</span></td>
            <td><span class="fw-normal">1 Jan 2020</span></td>
            <td><span class="fw-bold">$799,00</span></td>
            <td><span class="fw-bold text-success">Paid</span></td>
            <td>
              <div class="btn-group">
                <button
                  class="
                    btn btn-link
                    text-dark
                    dropdown-toggle dropdown-toggle-split
                    m-0
                    p-0
                  "
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="icon icon-sm">
                    <span class="fas fa-ellipsis-h icon-dark"></span>
                  </span>
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu py-0">
                  <a class="dropdown-item rounded-top" href="#"
                    ><span class="fas fa-eye me-2"></span>View Details</a
                  >
                  <a class="dropdown-item" href="#"
                    ><span class="fas fa-edit me-2"></span>Edit</a
                  >
                  <a class="dropdown-item text-danger rounded-bottom" href="#"
                    ><span class="fas fa-trash-alt me-2"></span>Remove</a
                  >
                </div>
              </div>
            </td>
          </tr>
          <!-- Item -->
          <!-- Item -->
          <tr>
            <td>
              <a href="#" class="fw-bold"> 456478 </a>
            </td>
            <td>
              <span class="fw-normal">Platinum Subscription Plan</span>
            </td>
            <td><span class="fw-normal">1 Nov 2019</span></td>
            <td><span class="fw-normal">1 Dec 2019</span></td>
            <td><span class="fw-bold">$799,00</span></td>
            <td><span class="fw-bold text-success">Paid</span></td>
            <td>
              <div class="btn-group">
                <button
                  class="
                    btn btn-link
                    text-dark
                    dropdown-toggle dropdown-toggle-split
                    m-0
                    p-0
                  "
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="icon icon-sm">
                    <span class="fas fa-ellipsis-h icon-dark"></span>
                  </span>
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu py-0">
                  <a class="dropdown-item rounded-top" href="#"
                    ><span class="fas fa-eye me-2"></span>View Details</a
                  >
                  <a class="dropdown-item" href="#"
                    ><span class="fas fa-edit me-2"></span>Edit</a
                  >
                  <a class="dropdown-item text-danger rounded-bottom" href="#"
                    ><span class="fas fa-trash-alt me-2"></span>Remove</a
                  >
                </div>
              </div>
            </td>
          </tr>
          <!-- Item -->
          <tr>
            <td>
              <a href="#" class="fw-bold"> 453673 </a>
            </td>
            <td>
              <span class="fw-normal">Gold Subscription Plan</span>
            </td>
            <td><span class="fw-normal">1 Oct 2019</span></td>
            <td><span class="fw-normal">1 Nov 2019</span></td>
            <td><span class="fw-bold">$533,42</span></td>
            <td><span class="fw-bold text-danger">Cancelled</span></td>
            <td>
              <div class="btn-group">
                <button
                  class="
                    btn btn-link
                    text-dark
                    dropdown-toggle dropdown-toggle-split
                    m-0
                    p-0
                  "
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="icon icon-sm">
                    <span class="fas fa-ellipsis-h icon-dark"></span>
                  </span>
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu py-0">
                  <a class="dropdown-item rounded-top" href="#"
                    ><span class="fas fa-eye me-2"></span>View Details</a
                  >
                  <a class="dropdown-item" href="#"
                    ><span class="fas fa-edit me-2"></span>Edit</a
                  >
                  <a class="dropdown-item text-danger rounded-bottom" href="#"
                    ><span class="fas fa-trash-alt me-2"></span>Remove</a
                  >
                </div>
              </div>
            </td>
          </tr>
          <!-- Item -->
          <tr>
            <td>
              <a href="#" class="fw-bold"> 456468 </a>
            </td>
            <td>
              <span class="fw-normal">Gold Subscription Plan</span>
            </td>
            <td><span class="fw-normal">1 Sep 2019</span></td>
            <td><span class="fw-normal">1 Oct 2019</span></td>
            <td><span class="fw-bold">$533,42</span></td>
            <td><span class="fw-bold text-success">Paid</span></td>
            <td>
              <div class="btn-group">
                <button
                  class="
                    btn btn-link
                    text-dark
                    dropdown-toggle dropdown-toggle-split
                    m-0
                    p-0
                  "
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="icon icon-sm">
                    <span class="fas fa-ellipsis-h icon-dark"></span>
                  </span>
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu py-0">
                  <a class="dropdown-item rounded-top" href="#"
                    ><span class="fas fa-eye me-2"></span>View Details</a
                  >
                  <a class="dropdown-item" href="#"
                    ><span class="fas fa-edit me-2"></span>Edit</a
                  >
                  <a class="dropdown-item text-danger rounded-bottom" href="#"
                    ><span class="fas fa-trash-alt me-2"></span>Remove</a
                  >
                </div>
              </div>
            </td>
          </tr>
          <!-- Item -->
          <tr>
            <td>
              <a href="#" class="fw-bold"> 456478 </a>
            </td>
            <td>
              <span class="fw-normal">Flexible Subscription Plan</span>
            </td>
            <td><span class="fw-normal">1 Aug 2019</span></td>
            <td><span class="fw-normal">1 Sep 2019</span></td>
            <td><span class="fw-bold">$233,42</span></td>
            <td><span class="fw-bold text-success">Paid</span></td>
            <td>
              <div class="btn-group">
                <button
                  class="
                    btn btn-link
                    text-dark
                    dropdown-toggle dropdown-toggle-split
                    m-0
                    p-0
                  "
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="icon icon-sm">
                    <span class="fas fa-ellipsis-h icon-dark"></span>
                  </span>
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu py-0">
                  <a class="dropdown-item rounded-top" href="#"
                    ><span class="fas fa-eye me-2"></span>View Details</a
                  >
                  <a class="dropdown-item" href="#"
                    ><span class="fas fa-edit me-2"></span>Edit</a
                  >
                  <a class="dropdown-item text-danger rounded-bottom" href="#"
                    ><span class="fas fa-trash-alt me-2"></span>Remove</a
                  >
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <div
        class="
          card-footer
          px-3
          border-0
          d-flex
          flex-column flex-lg-row
          align-items-center
          justify-content-between
        "
      >
        <nav aria-label="Page navigation example">
          <ul class="pagination mb-0">
            <li class="page-item">
              <a class="page-link" href="#">Previous</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">5</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>
        <div class="fw-normal small mt-4 mt-lg-0">
          Showing <b>5</b> out of <b>25</b> entries
        </div>
      </div>
    </div>
    <div
      class="theme-settings card bg-gray-800 pt-2 collapse"
      id="theme-settings"
    >
      <div class="card-body bg-gray-800 text-white pt-4">
        <button
          type="button"
          class="btn-close theme-settings-close"
          aria-label="Close"
          data-bs-toggle="collapse"
          href="#theme-settings"
          role="button"
          aria-expanded="false"
          aria-controls="theme-settings"
        ></button>
        <div class="d-flex justify-content-between align-items-center mb-3">
          <p class="m-0 mb-1 me-4 fs-7">
            Open source <span role="img" aria-label="gratitude">💛</span>
          </p>
          <a
            class="github-button"
            href="https://github.com/themesberg/volt-bootstrap-5-dashboard"
            data-color-scheme="no-preference: dark; light: light; dark: light;"
            data-icon="octicon-star"
            data-size="large"
            data-show-count="true"
            aria-label="Star themesberg/volt-bootstrap-5-dashboard on GitHub"
            >Star</a
          >
        </div>
        <a
          href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard"
          target="_blank"
          class="
            btn btn-secondary
            d-inline-flex
            align-items-center
            justify-content-center
            mb-3
            w-100
          "
        >
          Download
          <svg
            class="icon icon-xs ms-2"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </a>
        <p class="fs-7 text-gray-300 text-center">
          Available in the following technologies:
        </p>
        <div class="d-flex justify-content-center">
          <a
            class="me-3"
            href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard"
            target="_blank"
          >
            <img
              src="/dist/assets/img/technologies/bootstrap-5-logo.svg"
              class="image image-xs"
            />
          </a>
          <a
            href="https://demo.themesberg.com/volt-react-dashboard/#/"
            target="_blank"
          >
            <img
              src="/dist/assets/img/technologies/react-logo.svg"
              class="image image-xs"
            />
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.$Progress.start();
    setTimeout(() => {
      this.$Progress.finish();
    }, 1000);
  },
};
</script>
