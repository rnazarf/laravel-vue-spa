<template>
  <div
    class="modal"
    id="formModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modal-default"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="h6 modal-title">
            Form Category : {{ dataCategory.name }}
          </h2>
          <button
            type="button"
            class="btn-close"
            @click="closeModal"
            aria-label="Close"
          ></button>
        </div>
        <form
          @submit.prevent="isEdit ? updateAction() : createAction()"
          autocomplete="off"
        >
          <div class="modal-body">
            <!-- Form -->
            <div class="form-group mb-1">
              <label for="name">Name</label>
              <input
                v-model="dataCategory.name"
                type="text"
                class="form-control"
                placeholder="Category Name"
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
              <label for="description">Description</label>
              <textarea
                v-model="dataCategory.description"
                type="description"
                class="form-control"
                placeholder="Lorem ipsum dolor sit amet"
                id="description"
                name="description"
                :class="{ 'is-invalid': form.errors.has('description') }"
              >
              </textarea>
              <has-error :form="form" field="description"></has-error>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary">
              {{ isEdit ? "Update" : "Create" }}
            </button>
            <button
              type="button"
              class="btn btn-link text-gray-600 ms-auto"
              @click="closeModal"
            >
              Close
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "modal",
  props: {
    isEdit: {
      type: Boolean,
      default: false,
    },
    dataCategory: {
      id: {
        type: Number,
        default: 0,
      },
      name: {
        type: String,
        default: "",
      },
      description: {
        type: String,
        default: "",
      },
    },
  },
  data() {
    return {
      form: new Form({
        id: "",
        name: "",
        description: "",
      }),
    };
  },
  methods: {
    clearForm() {
      this.form.reset();
      this.form.errors.clear();
    },
    closeModal() {
      this.$emit("close-modal");
    },
    createAction() {
      this.$Progress.start();
      this.clearForm();
      this.form.fill(this.dataCategory);

      this.form
        .post("api/v1/category")
        .then((response) => {
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.$emit("refresh-data", 1, true);
          this.$emit("close-modal");
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
      this.$Progress.start();
      this.clearForm();
      this.form.fill(this.dataCategory);

      this.form
        .put("api/v1/category/" + this.form.id)
        .then((response) => {
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.$emit("refresh-data");
          this.$emit("close-modal");
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
    },
  },
};
</script>

<style scoped>
.modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1050;
  display: block;
  /* overflow: hidden; */
  outline: 0;
  background-color: rgba(0, 0, 0, 0.6);
  transition: opacity 0.15s linear;
}
</style>