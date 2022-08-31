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
        <h2 class="h4">All Product</h2>
        <p class="mb-0">Manage product item.</p>
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
              placeholder="Search Product"
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
    <div class="task-wrapper border bg-white shadow border-0 rounded">
      <div
        v-for="voucher in voucher.data"
        :key="voucher.id"
        class="card hover-state border-bottom rounded-0 rounded-top py-3"
      >
        <div
          class="
            card-body
            d-sm-flex
            align-items-center
            flex-wrap flex-lg-nowrap
            py-0
          "
        >
          <div
            class="col-2 text-left text-sm-center mb-2 mr-1 mb-sm-0"
            style="margin-right: 10px"
          >
            <img
              src="/images/product/itm1/itm1.jpg"
              style="border-radius: 15px 30px"
              role="presentation"
            />
          </div>
          <div class="col-11 col-lg-8 px-0 mb-4 mb-md-0">
            <div class="mb-2">
              <h3 class="h5">{{ `VOUCHER ${voucher.name}` }}</h3>
              <div class="d-block d-sm-flex">
                <div>
                  <h4 class="h6 fw-normal text-gray mb-3 mb-sm-0">
                    <svg
                      class="icon icon-xxs text-gray-500 me-2"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                    {{ voucher.type == "Money" ? "Rp. " : "" }}
                    {{ Number(voucher.value).toLocaleString() }}
                    {{ voucher.type == "Percent" ? "%" : "" }}
                  </h4>
                </div>
                <div class="ms-sm-3">
                  <span
                    v-if="voucher.status == 'Y'"
                    class="badge super-badge bg-success"
                  >
                    Aktif
                  </span>
                  <span v-else class="badge super-badge bg-warning">
                    Tidak Aktif
                  </span>
                </div>
              </div>
            </div>
            <div>
              <a href="#" class="fw-bold text-dark">
                <span class="fw-normal text-gray">
                  {{ voucher.description }}
                </span>
              </a>
            </div>
          </div>
          <div
            class="
              col-10 col-sm-2 col-lg-2 col-xl-2
              d-none d-lg-block d-xl-inline-flex
              align-items-center
              ms-lg-auto
              text-right
              justify-content-end
              px-md-0
            "
          >
            <div class="dropdown">
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
                <svg
                  class="icon icon-xs"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"
                  ></path>
                </svg>
                <span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <div
                class="
                  dropdown-menu
                  dashboard-dropdown
                  dropdown-menu-start
                  mt-2
                  py-1
                "
              >
                <a
                  class="dropdown-item d-flex align-items-center"
                  href="#"
                  @click="editModal(voucher)"
                >
                  <svg
                    class="dropdown-icon text-black-400 me-2"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"
                    ></path>
                    <path
                      fill-rule="evenodd"
                      d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                  Edit
                </a>
                <a
                  class="dropdown-item d-flex align-items-center"
                  href="#"
                  @click="changeStatus(voucher.id)"
                >
                  <template v-if="voucher.status == 'Y'">
                    <svg
                      class="dropdown-icon text-warning me-2"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                    Set Non-Active
                  </template>

                  <template v-else>
                    <svg
                      class="dropdown-icon text-success me-2"
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
                    Set Active
                  </template>
                </a>
                <a
                  class="dropdown-item d-flex align-items-center"
                  href="#"
                  @click="deleteAction(voucher.id)"
                >
                  <svg
                    class="dropdown-icon text-danger me-2"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                  Delete
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row p-4">
        <div class="col-7 mt-1">
          Showing <b>{{ from }}</b> to <b>{{ to }}</b> of
          <b>{{ total }}</b> entries
        </div>
        <div class="col-5">
          <div class="btn-group float-end">
            <pagination :data="voucher" @pagination-change-page="getData">
              <template #prev-nav>
                <span>Previous</span>
              </template>
              <template #next-nav>
                <span>Next</span>
              </template>
            </pagination>
          </div>
        </div>
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
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="h6 modal-title">Form Product</h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <form
            @submit.prevent="editMode ? updateAction() : createAction()"
            autocomplete="off"
          >
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group mb-1">
                    <label for="name">Name</label>
                    <input
                      v-model="form.name"
                      type="text"
                      class="form-control"
                      placeholder="Product Name"
                      id="name"
                      name="name"
                      autofocus
                      :class="{ 'is-invalid': form.errors.has('name') }"
                    />
                    <has-error :form="form" field="name"></has-error>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group mb-1">
                    <label for="description">Description</label>
                    <textarea
                      v-model="form.description"
                      type="description"
                      class="form-control"
                      placeholder="Lorem ipsum dolor sit amet"
                      id="description"
                      name="description"
                      :class="{
                        'is-invalid': form.errors.has('description'),
                      }"
                    >
                    </textarea>
                    <has-error :form="form" field="description"></has-error>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group mb-1">
                    <label for="voucher_code">Product Code</label>
                    <input
                      v-model="form.voucher_code"
                      type="text"
                      class="form-control"
                      placeholder="Product Code"
                      id="voucher_code"
                      name="voucher_code"
                      autofocus
                      :class="{
                        'is-invalid': form.errors.has('voucher_code'),
                      }"
                    />
                    <has-error :form="form" field="voucher_code"></has-error>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-1">
                    <label for="status">Status</label>
                    <select
                      v-model="form.status"
                      name="status"
                      id="status"
                      class="form-select"
                      :class="{ 'is-invalid': form.errors.has('status') }"
                    >
                      <option value="N">Tidak Aktif</option>
                      <option value="Y">Aktif</option>
                    </select>
                    <has-error :form="form" field="status"></has-error>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group mb-1">
                    <label for="type">Type</label>
                    <select
                      v-model="form.type"
                      name="type"
                      id="type"
                      class="form-select"
                      :class="{ 'is-invalid': form.errors.has('type') }"
                    >
                      <option value="Percent">Percent</option>
                      <option value="Money">Money</option>
                    </select>
                    <has-error :form="form" field="type"></has-error>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mb-1">
                    <label for="value">Value</label>
                    <input
                      v-model="form.value"
                      type="number"
                      class="form-control"
                      placeholder="Value"
                      id="value"
                      name="value"
                      autofocus
                      :class="{ 'is-invalid': form.errors.has('value') }"
                    />
                    <has-error :form="form" field="value"></has-error>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button v-show="editMode" type="submit" class="btn btn-secondary">
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
</template>

<script>
export default {
  data() {
    return {
      editMode: false,
      voucher: {},
      currentPage: 1,
      from: 0,
      to: 0,
      total: 0,
      perPage: 10,
      searchData: "",
      form: new Form({
        id: "",
        name: "",
        description: "",
        voucher_code: "",
        status: "N",
        type: "Percent",
        value: 0,
      }),
    };
  },
  mounted() {
    console.log("mounted");
  },
  methods: {
    search() {
      this.$Progress.start();
      this.getData(1);
      this.$Progress.finish();
    },
    getData(page = this.currentPage, reload = false) {
      this.$Progress.start();
      axios
        .get("api/v1/voucher", {
          params: {
            page: !reload ? page : 1,
            search: this.searchData,
          },
        })
        .then(({ data }) => {
          this.voucher = data;
          this.pagination(data.meta);
        });
      this.$Progress.finish();
    },
    newModal() {
      this.editMode = false;
      this.clearForm();
      let modal = $("#formModal");
      modal.modal("show");
    },
    editModal(voucher) {
      this.editMode = true;
      this.clearForm();
      let modal = $("#formModal");
      modal.modal("show");
      this.form.fill(voucher);
    },
    createAction() {
      this.$Progress.start();
      this.form
        .post("api/v1/voucher")
        .then((response) => {
          $("#formModal").modal("hide");

          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.getData(1, true);
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
      this.$Progress.finish();
    },
    updateAction() {
      this.form
        .put("api/v1/voucher/" + this.form.id)
        .then((response) => {
          // success
          $("#formModal").modal("hide");

          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.getData();
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
    },
    deleteAction(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.value) {
          this.form
            .delete("api/v1/voucher/" + id)
            .then(() => {
              Swal.fire("Deleted!", "Data has been deleted.", "success");
              this.getData();
            })
            .catch((data) => {
              Swal.fire("Failed!", data.message, "warning");
            });
        }
      });
    },
    pagination(meta) {
      this.currentPage = meta.current_page;
      this.perPage = meta.per_page;
      this.from = meta.from ?? 0;
      this.to = meta.to ?? 0;
      this.total = meta.total;
    },
    clearForm() {
      this.form.reset();
      this.form.errors.clear();
    },
    changeStatus(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "Status voucher ini akan di ubah!",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes!",
      }).then((result) => {
        if (result.value) {
          this.form
            .put("api/v1/voucher/" + id + "/status")
            .then(() => {
              Swal.fire("Changed!", "Data has been change.", "success");
              this.getData();
            })
            .catch((data) => {
              Swal.fire("Failed!", data.message, "warning");
            });
        }
      });
    },
  },
  created() {
    this.$Progress.start();
    setTimeout(() => {
      this.getData();
      this.$Progress.finish();
    }, 1000);
  },
};
</script>
