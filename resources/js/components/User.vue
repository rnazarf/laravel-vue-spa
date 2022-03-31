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
      <div class="d-block mb-md-0">
        <h2 class="h4">All Users</h2>
        <p class="mb-0">Manage user login application.</p>
      </div>
      <div class="btn-toolbar mb-2 mb-md-0">
        <button
          @click="newModal"
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
          New
        </button>
      </div>
    </div>
    <div class="table-settings">
      <div class="row align-items-center justify-content-between mb-4">
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
              v-model="searchData"
              type="text"
              class="form-control"
              placeholder="Search User"
            />
            <button class="btn btn-sm btn-gray-800" @click="search">
              Search
            </button>
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
            <th class="border-gray-200">Name</th>
            <th class="border-gray-200">Email</th>
            <th class="border-gray-200">Status</th>
            <th class="border-gray-200">Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- Item -->
          <template v-if="users.data">
            <tr v-for="(user, index) in users.data" :key="user.id">
              <td>
                {{ (currentPage - 1) * perPage + index + 1 }}
              </td>
              <td>
                <span class="fw-normal">{{ user.name }}</span>
              </td>
              <td>
                <span class="fw-normal">{{ user.email }}</span>
              </td>
              <td>
                <span
                  v-if="user.email_verified_at != null"
                  class="fw-bold text-success"
                >
                  <svg
                    class="icon icon-xxs text-success me-1"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                  Verified
                </span>
                <span v-else class="fw-bold text-danger">
                  <svg
                    class="icon icon-xxs text-danger me-1"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                  Pending
                </span>
              </td>
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
                    <a class="dropdown-item" href="#" @click="editModal(user)"
                      ><span class="fas fa-edit me-2"></span>Edit</a
                    >
                    <a class="dropdown-item text-danger rounded-bottom" href="#"
                      ><span class="fas fa-trash-alt me-2"></span>Remove</a
                    >
                  </div>
                </div>
              </td>
            </tr>
          </template>
          <template v-else>
            <tr>
              <td colspan="5" class="text-center">
                <span class="text-muted">No data found</span>
              </td>
            </tr>
          </template>
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
        <pagination :data="users" @pagination-change-page="getResults">
          <template #prev-nav>
            <span>Previous</span>
          </template>
          <template #next-nav>
            <span>Next</span>
          </template>
        </pagination>
        <div class="fw-normal small mt-4 mt-lg-0">
          Showing <b>{{ from }}</b> to <b>{{ to }}</b> of
          <b>{{ total }}</b> entries
        </div>
      </div>

      <!-- Modal Content -->
      <div
        class="modal fade"
        id="formModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modal-default"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="h6 modal-title">Form User</h2>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <form @submit.prevent="editMode ? updateUser() : createUser()">
              <div class="modal-body">
                <!-- Form -->
                <div class="form-group mb-1">
                  <label for="name">Name</label>

                  <input
                    v-model="form.name"
                    type="text"
                    class="form-control"
                    placeholder="John Doe"
                    id="name"
                    name="name"
                    autofocus
                    :class="{ 'is-invalid': form.errors.has('name') }"
                  />
                  <has-error :form="form" field="name"></has-error>
                </div>
                <!-- End of Form -->
                <!-- Form -->
                <div class="form-group mb-1">
                  <label for="email">Email</label>
                  <input
                    v-model="form.email"
                    type="email"
                    class="form-control"
                    placeholder="example@company.com"
                    id="email"
                    name="email"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                  />
                  <has-error :form="form" field="email"></has-error>
                </div>
                <!-- End of Form -->
                <div class="form-group">
                  <!-- Form -->
                  <div class="form-group mb-1">
                    <label for="password">Password</label>
                    <input
                      v-model="form.password"
                      type="password"
                      placeholder="Password"
                      class="form-control"
                      id="password"
                      name="password"
                      :class="{ 'is-invalid': form.errors.has('password') }"
                    />
                    <has-error :form="form" field="password"></has-error>
                  </div>
                  <!-- End of Form -->
                  <!-- Form -->
                  <div class="form-group mb-1">
                    <label for="confirm_password">Confirm Password</label>
                    <div class="input-group">
                      <input
                        v-model="form.password_confirmation"
                        type="password"
                        placeholder="Confirm Password"
                        class="form-control"
                        id="password_confirmation"
                        name="password_confirmation"
                      />
                      <has-error
                        :form="form"
                        field="password_confirmation"
                      ></has-error>
                    </div>
                  </div>
                  <!-- End of Form -->
                </div>
              </div>
              <div class="modal-footer">
                <button
                  v-show="editMode"
                  type="submit"
                  class="btn btn-secondary"
                >
                  Update
                </button>
                <button
                  v-show="!editMode"
                  type="submit"
                  class="btn btn-secondary"
                >
                  Create
                </button>
                <button
                  type="button"
                  class="btn btn-link text-gray-600 ms-auto"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End of Modal Content -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      editMode: false,
      users: {},
      currentPage: 1,
      from: 0,
      to: 0,
      total: 0,
      perPage: 10,
      searchData: "",
      form: new Form({
        id: "",
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      }),
    };
  },
  mounted() {
    console.log("mounted");
  },
  methods: {
    search() {
      this.$Progress.start();
      this.getResults(1);
      this.$Progress.finish();
    },
    loadUsers() {
      this.$Progress.start();
      axios.get("api/v1/user").then(({ data }) => {
        this.users = data.data;
        this.currentPage = data.data.current_page;
        this.perPage = data.data.per_page;
        this.from = data.data.from;
        this.to = data.data.to;
        this.total = data.data.total;
      });
      this.$Progress.finish();
    },
    getResults(page = 1) {
      this.$Progress.start();
      axios
        .get("api/v1/user", {
          params: {
            page: page,
            search: this.searchData,
          },
        })
        .then(({ data }) => {
          this.users = data.data;
          this.currentPage = data.data.current_page;
          this.perPage = data.data.per_page;
          this.from = data.data.from;
          this.to = data.data.to;
          this.total = data.data.total;
        });
      this.$Progress.finish();
    },
    newModal() {
      this.editMode = false;
      this.form.reset();
      this.removeErrors();
      let modal = $("#formModal");
      modal.modal("show");
    },
    editModal(user) {
      this.editMode = true;
      this.form.reset();
      this.removeErrors();
      let modal = $("#formModal");
      modal.modal("show");
      this.form.fill(user);
    },
    createUser() {
      this.$Progress.start();
      this.form
        .post("api/v1/user")
        .then((response) => {
          $("#formModal").modal("hide");

          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.loadUsers();
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
      this.$Progress.finish();
    },
    updateUser() {
      this.form
        .put("api/v1/user/" + this.form.id)
        .then((response) => {
          // success
          $("#formModal").modal("hide");

          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.loadUsers();
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
    },
    removeErrors() {
      this.form.errors.clear();
    },
  },
  created() {
    this.$Progress.start();
    setTimeout(() => {
      this.loadUsers();
      this.$Progress.finish();
    }, 1000);
  },
};
</script>
