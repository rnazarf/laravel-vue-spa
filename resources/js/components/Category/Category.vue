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
        <h2 class="h4">All Category</h2>
        <p class="mb-0">Manage category for product.</p>
      </div>
      <div class="btn-toolbar mb-2 mb-md-0">
        <button
          @click="openCreateModal"
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
              placeholder="Search Category"
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
            <th class="border-gray-200">Description</th>
            <th class="border-gray-200">Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- Item -->
          <template v-if="category.data && category.total > 0">
            <tr v-for="(category, index) in category.data" :key="category.id">
              <td>
                {{ (currentPage - 1) * perPage + index + 1 }}
              </td>
              <td>
                <span class="fw-normal">{{ category.name }}</span>
              </td>
              <td>
                <span class="fw-normal">{{ category.description }}</span>
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
                    <a
                      class="dropdown-item"
                      href="#"
                      @click="openEditModal(category)"
                      ><span class="fas fa-edit me-2"></span>Edit</a
                    >
                    <a
                      class="dropdown-item text-danger rounded-bottom"
                      href="#"
                      @click="deleteAction(category.id)"
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
          pb-5
          border-0
          d-flex
          flex-column flex-lg-row
          align-items-center
          justify-content-between
        "
      >
        <pagination :data="category" @pagination-change-page="getData">
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

      <modal-form
        v-show="isModalVisible"
        @close-modal="closeModal"
        @refresh-data="getData"
        :dataCategory="categoryData"
        :isEdit="isEdit"
      />
    </div>
  </div>
</template>

<script>
import formModal from "./Modal";

export default {
  components: {
    "modal-form": formModal,
  },
  data() {
    return {
      isEdit: false,
      isModalVisible: false,
      categoryData: {},
      category: {},
      currentPage: 1,
      from: 0,
      to: 0,
      total: 0,
      perPage: 10,
      searchData: "",
      form: new Form({
        id: "",
      }),
    };
  },
  methods: {
    openCreateModal() {
      this.isEdit = false;
      this.isModalVisible = true;
      this.categoryData = {};
      console.log(this.categoryData);
    },
    openEditModal(category) {
      this.isEdit = true;
      this.isModalVisible = true;
      this.categoryData = category;
      console.log(this.categoryData);
    },
    closeModal() {
      this.isModalVisible = false;
    },
    search() {
      this.$Progress.start();
      this.getData(1);
      this.$Progress.finish();
    },
    getData(page = this.currentPage, reload = false) {
      this.$Progress.start();
      axios
        .get("api/v1/category", {
          params: {
            page: !reload ? page : 1,
            search: this.searchData,
          },
        })
        .then(({ data }) => {
          this.category = data.data;
          this.pagination(data);
        });
      this.$Progress.finish();
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
            .delete("api/v1/category/" + id)
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
      this.currentPage = meta.data.current_page;
      this.perPage = meta.data.per_page;
      this.from = meta.data.from ?? 0;
      this.to = meta.data.to ?? 0;
      this.total = meta.data.total;
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
